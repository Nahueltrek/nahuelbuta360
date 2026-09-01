<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Carga el catastro real de negocios/atractivos/rutas de Angol reunido en
 * docs/CATASTRO_ANGOL.md (4 fuentes oficiales + guías municipales, todas
 * subidas directamente por el usuario o investigadas con fuente citada).
 *
 * COORDENADAS: no hay geocodificación real disponible desde este entorno
 * (sin acceso a red externa a Nominatim/Google Maps ni a la base de
 * producción). Por decisión explícita del usuario, se usan coordenadas
 * APROXIMADAS calculadas por rumbo+distancia desde puntos de referencia
 * reales (Plaza de Armas de Angol), NUNCA al azar. Todo registro queda
 * marcado con `source_type = 'aproximado_sector'` para que se pueda
 * auditar/corregir después desde el admin con la dirección real (columna
 * `address`, que sí es exacta, tal como figura en la fuente).
 *
 * Confianza de los rumbos usados (ver docs/CATASTRO_ANGOL.md para el
 * detalle de cada fuente):
 *  - collipulli (90°, "al este"): confirmado por texto de la fuente.
 *  - los_sauces (180°, "al sur"): confirmado por texto de la fuente.
 *  - maitenrehue (0°, "al norte"): confirmado por texto de la fuente.
 *  - camino_parque (250°, WSW): ESTIMADO — la Cordillera de la Costa /
 *    Parque Nahuelbuta está al oeste-suroeste de Angol, pero no hay
 *    confirmación textual del rumbo exacto en ninguna fuente.
 *  - renaico (340°, NNO): ESTIMADO, baja confianza — ninguna fuente indica
 *    el rumbo hacia Renaico.
 */
class NahuelbutaCatastroSeeder extends Seeder
{
    private const CENTRO = [-37.7963, -72.7169]; // Plaza de Armas / Siete Fundaciones

    private const BEARINGS = [
        'camino_parque' => 250,
        'collipulli' => 90,
        'los_sauces' => 180,
        'renaico' => 340,
        'maitenrehue' => 0,
    ];

    private function offset(float $lat, float $lng, float $bearingDeg, float $km): array
    {
        $R = 6371.0;
        $bearing = deg2rad($bearingDeg);
        $lat1 = deg2rad($lat);
        $lng1 = deg2rad($lng);
        $angDist = $km / $R;
        $lat2 = asin(sin($lat1) * cos($angDist) + cos($lat1) * sin($angDist) * cos($bearing));
        $lng2 = $lng1 + atan2(sin($bearing) * sin($angDist) * cos($lat1), cos($angDist) - sin($lat1) * sin($lat2));

        return [rad2deg($lat2), rad2deg($lng2)];
    }

    /** Offset determinístico (por hash del nombre, no al azar) para que
     *  negocios sin km dato no queden apilados en el mismo píxel. */
    private function jitter(string $seed, float $lat, float $lng, float $maxKm = 0.45): array
    {
        $h = crc32($seed);
        $bearing = $h % 360;
        $km = (($h >> 9) % 100) / 100 * $maxKm;

        return $this->offset($lat, $lng, $bearing, $km);
    }

    private function point(?string $ref, ?float $km, string $seedForJitter): array
    {
        [$clat, $clng] = self::CENTRO;

        if ($ref === null || $km === null) {
            return $this->jitter($seedForJitter, $clat, $clng);
        }

        [$lat, $lng] = $this->offset($clat, $clng, self::BEARINGS[$ref], $km);

        // pequeño jitter extra para no apilar dos negocios en el mismo km exacto
        return $this->jitter($seedForJitter, $lat, $lng, 0.15);
    }

    private function pointWkt(float $lat, float $lng): string
    {
        return sprintf("ST_GeomFromText('POINT(%F %F)', 4326)", $lng, $lat);
    }

    private function uniqueSlug(string $name, array &$usedSlugs): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 2;
        while (in_array($slug, $usedSlugs, true)) {
            $slug = "{$base}-{$i}";
            $i++;
        }
        $usedSlugs[] = $slug;

        return $slug;
    }

    public function run(): void
    {
        $destinationId = DB::table('destinations')->where('slug', 'nahuelbuta-360')->value('id');
        $communeId = DB::table('communes')->where('code', '09101')->value('id'); // Angol
        $categoryIds = DB::table('business_categories')->pluck('id', 'slug');

        if (! $destinationId || ! $communeId) {
            $this->command?->error('Corré NahuelbutaDestinationSeeder primero.');

            return;
        }

        $now = now();
        $usedBusinessSlugs = DB::table('businesses')->pluck('slug')->all();
        $usedAttractionSlugs = DB::table('attractions')->pluck('slug')->all();
        $usedRouteSlugs = DB::table('routes')->pluck('slug')->all();

        // name, cat_slug, ref, km, address, phone, description
        $businesses = [
            // --- GASTRONOMÍA (guía oficial @angolturismo) ---
            ['Restaurant Don Matías', 'gastronomia', null, null, 'Pedro Aguirre Cerda 213', '9 8839 1921', 'Cocina tradicional chilena, colaciones y preparaciones criollas.'],
            ['Restaurant Pastelería Garrido', 'gastronomia', null, null, 'Lautaro 144', '45 2 463904 / 9 8137 7492', 'Gastronomía casera y pastelería tradicional.'],
            ['Hostería Sabores de Mamy', 'gastronomia', null, null, 'Valle San Juan, Parcela 107', '9 8127 9087', 'Gastronomía de campo y platos tradicionales.'],
            ['Fuente Angolina', 'gastronomia', null, null, 'Óscar Bonilla 456', '9 8613 4888', 'Fuente de soda tradicional, sándwiches y completos.'],
            ['El Quincho de Manolo', 'gastronomia', null, null, 'Julio Sepúlveda 645', '45 3 214025 / 9 3219 2719', 'Carnes a las brasas y parrilladas tradicionales. "Picada" reconocida.'],
            ['Don Julián', 'gastronomia', null, null, 'Av. O\'Higgins 1340, Los Pablos', '9 7547 5077', 'Carnes a las brasas y parrilladas, cocina chilena tradicional.'],
            ['Restaurant Club Social', 'gastronomia', null, null, 'Caupolicán 492-498', '45 2 599150 / 9 9789 5639', 'Gastronomía tradicional de larga trayectoria. También funciona como hotel (Hotel Club Social).'],
            ['Restaurant Odas al Cárnico', 'gastronomia', null, null, 'Caupolicán 520', '9 5195 1873', 'Cortes de carne premium y parrilladas.'],
            ['Restaurante El Ermitaño', 'gastronomia', 'renaico', 4.5, 'Km 4,5 Ruta Angol–Renaico', '9 5517 5297 / 9 6681 0440', 'Carnes a las brasas y gastronomía típica chilena. También ofrece cabañas.'],
            ['Restaurant y Cabañas Ruiz', 'gastronomia', 'camino_parque', 36.5, 'Km 36-37, camino Parque Nacional Nahuelbuta', '9 8837 5655', 'Gastronomía de montaña y cocina casera + cabañas equipadas, camino al parque.'],
            ['Tentaciones M&J', 'gastronomia', null, null, 'Prat N°90, esquina Julio Sepúlveda', '9 4083 0726', 'Preparaciones dulces y saladas, sabores caseros.'],
            ['Ristorante La Vecchia Signora', 'gastronomia', null, null, 'Pedro Aguirre Cerda 566', '9 9099 7050 / 9 3749 0719', 'Gastronomía italiana y pastas artesanales.'],
            ['Donde Pelluco', 'gastronomia', null, null, 'Manuel Bunster 551', '9 8439 5581', 'Cocina criolla, platos caseros abundantes.'],
            ['Cocinería el Fogón', 'gastronomia', null, null, 'Caupolicán 202', '9 9664 2980', 'Cocina tradicional del sur de Chile, menús diarios.'],
            ['Don Choche Restaurant', 'gastronomia', null, null, 'Vergara 191', '9 9991 6680 / 9 4974 8682', 'Comida casera y preparaciones de estilo campestre.'],
            ['Restaurant La Morena', 'gastronomia', null, null, 'Chorrillos 551', '9 7678 5545', 'Comida casera y colaciones tradicionales.'],
            ['Sociedad de Artesanos', 'gastronomia', null, null, 'Arturo Prat 343', '45 2 714626 / 9 7510 1420', 'Gastronomía tradicional y cocina casera, ambiente familiar.'],
            ['Restaurant y Hostal Rancel Tour', 'gastronomia', null, null, 'Ilabaca 524', '44 3 050411 / 9 7994 8379', 'Junto a terminal de buses privado; cocina chilena + hostal + transporte.'],
            ['Carloncho Restaurant', 'gastronomia', null, null, 'Manuel Bunster 897', '45 2 715709 / 9 7577 9274', 'Cocina tradicional y casera, carnes y parrilladas.'],
            ['Café Café', 'gastronomia', null, null, 'Chorrillos 468, interior', '45 2 716471', 'Café, bebidas calientes y pastelería.'],
            ['Cafetería Laulhere', 'gastronomia', null, null, 'Chorrillos 342', '9 8206 3132', 'Bebidas y pastelería artesanal.'],
            ['Cafetería y Heladería Central', 'gastronomia', null, null, 'Chorrillos 350', '9 6140 0090', 'Café, bebidas y helados.'],
            ['El Canelo', 'gastronomia', null, null, 'Bilbao 202', '9 2166 4349', 'Bebidas y repostería artesanal; espacio de meditación.'],
            ['Espacio Work Angol', 'gastronomia', null, null, 'Óscar Bonilla 448', '9 2837 4298', 'Cafetería + espacio de coworking/reuniones.'],
            ['Finnis Coffee', 'gastronomia', null, null, 'Maipú 047', '9 8817 6552', 'Café y bebidas calientes, panadería/repostería.'],
            ["Pili's Coffee", 'gastronomia', null, null, "Av. O'Higgins 1677 B", '9 4857 0117', 'Café de especialidad y pastelería.'],
            ['Pukara Café', 'gastronomia', null, null, 'Vergara 397 B', '9 8414 5366', 'Café y pastelería artesanal, ambiente rústico.'],
            ['Tetería Dulce Pecado', 'gastronomia', null, null, "Av. O'Higgins 1744", '9 9918 8176', 'Té, café y pastelería, espacio para onces.'],
            ['Restaurant Waki', 'gastronomia', null, null, 'Caupolicán 601, 2° piso', '9 9577 8735', 'Gastronomía peruana, pastas artesanales, tragos.'],
            ['Chef Diego', 'gastronomia', null, null, 'Juan Sallato 2699', '45 2 719149', 'Gastronomía típica peruana, ceviches, tragos.'],
            ['Bar Restaurant Ancash', 'gastronomia', null, null, 'Manuel Bunster 598', '9 2246 7809', 'Gastronomía peruana tradicional.'],
            ['Choza Andina', 'gastronomia', null, null, "Av. O'Higgins N° 2598", '9 4169 0542', 'Gastronomía peruana, platos tradicionales.'],
            ['Cocinería La Limeña', 'gastronomia', null, null, 'Óscar Bonilla 750', '9 8624 5228', 'Gastronomía peruana auténtica.'],
            ['Comidas Árabes Angol', 'gastronomia', null, null, '2,5 camino Angol-Collipulli, parcela 7', '9 5771 3044', 'Gastronomía árabe y comida casera.'],
            ['Árabia Shawarma', 'gastronomia', null, null, 'José Bunster esq. Peteroa, Las Naciones', '9 5230 4191', 'Gastronomía árabe y comida casera.'],
            ['Restaurante VEN GEN', 'gastronomia', null, null, 'Prat N° 65D', '9 5658 0058', 'Comida asiática.'],
            ['Rincón Oriental', 'gastronomia', null, null, 'Campo de Marte 082B', '(45) 321 9844', 'Gastronomía oriental china tradicional.'],
            ['Modo Pizza', 'gastronomia', null, null, "Av. O'Higgins 350", '9 6483 2691 / 45 2 426470', 'Pizzas variadas, formato rápido.'],
            ['Pizzería Deja Vu', 'gastronomia', null, null, 'Chacabuco 029', '45 2 517099', 'Pizzas variadas, sándwiches, delivery.'],
            ['Las Pizzas de Don Pedro', 'gastronomia', null, null, 'Lautaro 589', '9 8134 8432 / 45 2 717737', 'Pizzas tradicionales, cocteles/cervezas.'],
            ['Taglis Angol', 'gastronomia', null, null, 'José Luis Osorio 390', '45 2 516968 / 45 2 517968', 'Pizzas, tragos, pastas, carnes, terraza y eventos. También funciona como restobar.'],
            ['Sparlatto Pizza', 'gastronomia', null, null, 'Manuel Bunster 202', '45 2 716272 / 9 5790 5804', 'Pizzas para llevar, atención rápida.'],
            ['Turbo Pizzas', 'gastronomia', null, null, "Av. O'Higgins 579", '9 8467 8556', 'Pizzas venta rápida.'],
            ['Mc Pizza', 'gastronomia', null, null, "O'Higgins 247/253", '9 4278 4257', 'Pizzas variadas.'],
            ['La Rebeldía', 'gastronomia', null, null, "Bernardo O'Higgins N°805", '9 5635 9595', 'Pizzería napolitana, horno a leña, pet friendly, accesible.'],
            ['Sushi Maso', 'gastronomia', null, null, 'Julio Sepúlveda 312', '45 2 746864 / 9 6282 3587', 'Sushi, pedidos directos.'],
            ['Taberu Angol', 'gastronomia', null, null, "Av. O'Higgins 1354", '9 7601 3676', 'Cocina japonesa, sushi y platos preparados.'],
            ['Secreto Nikkei', 'gastronomia', null, null, 'Colima 442', '9 9768 4112', 'Cocina nikkei (fusión peruana-japonesa).'],
            ['Sushi Extremo', 'gastronomia', null, null, "Av. O'Higgins 268", '9 8969 3692', 'Rolls variados, preparaciones japonesas frescas.'],
            ['Seijaku Sushi', 'gastronomia', null, null, 'Artesanos N°296', '9 3405 8230', 'Sushi de inspiración japonesa.'],
            ['Maki Sushi', 'gastronomia', null, null, 'Inés de Suárez 30', '9 8786 4930', 'Rolls clásicos, servicio rápido.'],
            ['Comida Rápida El Huaso', 'gastronomia', null, null, 'Quino 2, Huequén', '45 2 711382 / 9 4070 9316', 'Preparaciones chilenas y sándwiches.'],
            ['El Angolino Sanguchería 2', 'gastronomia', null, null, "Av. O'Higgins 331", '9 8820 9482', 'Sándwiches, completos.'],
            ['Matambre Angol', 'gastronomia', null, null, 'Arturo Prat 364', '9 7511 3083 / 45 2 712389', 'Carne, sándwiches, comida rápida.'],
            ['El Churrascón Sureño', 'gastronomia', null, null, "Av. O'Higgins 2212", '9 9779 2566', 'Churrascos y sándwiches.'],
            ['El Rincón de la Mechada', 'gastronomia', null, null, "Av. O'Higgins 229 G", '9 7760 2189', 'Sándwiches y carne mechada.'],
            ['El Churrascón Criollo', 'gastronomia', null, null, "Av. O'Higgins 508 D", '9 9779 2566', 'Churrascos y sándwiches.'],
            ['Kame House Comida Rápida', 'gastronomia', null, null, "Av. O'Higgins 215 B", '9 9578 7573 / 9 3764 1455', 'Hamburguesas, papas fritas, sándwiches.'],
            ['Rustik Burger', 'gastronomia', null, null, 'Los Pablos 1340', '44 303 3214 / 9 4178 4169', 'Hamburguesas y comida rápida.'],
            ['Salchipap', 'gastronomia', null, null, "Av. O'Higgins #1315", '9 8191 3367', 'Salchipapas, completos, papas fritas.'],
            ['Mr Burguer', 'gastronomia', null, null, 'Gral. Óscar Bonilla 428, local 10', '9 9362 8297', 'Hamburguesas artesanales, papas fritas.'],
            ['Baguales Restobar', 'gastronomia', null, null, "Av. O'Higgins 545", '9 8466 0946', 'Bebidas, tragos y ambiente nocturno.'],
            ['Club Catedral', 'gastronomia', null, null, "Bernardo O'Higgins 247", '9 8206 3132', 'Gastropub, coctelería, gastronomía urbana.'],
            ['Entre Gallos', 'gastronomia', null, null, 'Pedro Aguirre Cerda 514', '9 5863 0894 / 9 8461 5498', 'Gastronomía urbana y coctelería.'],
            ['Fuente de Soda y Shopería Bukanova', 'gastronomia', null, null, "Av. O'Higgins 202", '9 2065 9682 / 9 2187 1550', 'Fuente de soda y shopería tradicional.'],
            ['Místico', 'gastronomia', null, null, 'Pedro Aguirre Cerda 347', '9 7252 0290 / 9 3770 4160', 'Restobar y espacio cultural, ambiente artístico.'],
            ["Santo's", 'gastronomia', null, null, 'Chorrillos 466', '9 9091 6143', 'Hamburguesas artesanales y coctelería.'],
            ['Shopería María Victoria', 'gastronomia', null, null, 'Manuel Bunster 638', '45 2 711718 / 9 6778 3186', 'Restobar y shopería tradicional, cocina casera.'],
            ['Sky Restobar', 'gastronomia', null, null, 'Club Aéreo, Bonilla S/N', '9 5211 3069 / 9 8155 6732', 'Platos tradicionales y coctelería.'],
            ['Tipo Tranquilo Beer & Bistró', 'gastronomia', null, null, "Av. O'Higgins 350, 2° piso", '9 6908 3423 / 9 7389 5733', 'Cocina y cervezas, ambiente acogedor.'],
            ['Las Totoras', 'gastronomia', null, null, 'Ilabaca 806', '9 5234 6197', 'Cocina chilena y platos caseros.'],
            ['Restaurant Tía Jenny', 'gastronomia', null, null, 'Manuel Bunster 533', '9 9820 1328', 'Restobar, gastronomía casera, opciones para compartir.'],
            ['Aguas Frescas Resto-Bar', 'gastronomia', null, null, "Av. O'Higgins 345", '9 3631 4932', 'Coctelería, ambiente relajado.'],
            ['Lumbeer Restobar', 'gastronomia', null, null, 'Arturo Prat #442', '9 4999 8642', 'Tragos, cervezas, picoteo.'],
            ['Los Hornitos de Nahuelbuta', 'comercio', 'camino_parque', 34, 'Camino Vegas Blancas, Km 34', '9 9614 7592', 'Tortillas, empanadas y almuerzos.'],
            ['Almacén Don Fernando', 'comercio', 'camino_parque', 20, 'R-232, Col. Miraflores, camino a Vegas Blancas', '9 9591 6482', 'Almacén rural con productos básicos, alimentos y artículos locales.'],
            ['Artesanía Las Rosas de Nahuelbuta', 'comercio', 'camino_parque', 36, 'Vegas Blancas, km 36', '9 4922 5871', 'Artesanía local inspirada en la identidad cultural y natural de Nahuelbuta.'],

            // --- ALOJAMIENTO urbano ---
            ['Hotel Ruiz', 'alojamiento', null, null, "Av. O'Higgins 331", '+56 45 271 9156', 'Hotel 3 estrellas, wifi gratis, jardín. Single, dobles y familiares.'],
            ['202 Hotel Boutique', 'alojamiento', null, null, 'Colipí Nº222', '+56 9 9887 6022 / 45 2 649030', 'Piscina exterior de temporada, jardín, salón compartido, desayuno buffet.'],
            ['Hostal Gina Medina', 'alojamiento', null, null, 'Covadonga N° 55', '9 9123 8085', 'Vistas a jardín, terraza, estacionamiento privado gratuito.'],
            ['Hostal el Valle', 'alojamiento', null, null, 'Julio Sepúlveda N° 1060', '9 6715 6906', 'Orientado a viajeros de paso o corporativos.'],
            ['Apart Hotel Bellavista', 'alojamiento', null, null, 'Copihue N° 029, Edificio Don Gregorio', '9 7969 7365', 'Cabañas estándar/familiares/de lujo, hidromasaje.'],
            ['Departamentos Entre Ríos', 'alojamiento', null, null, 'Pedro Aguirre Cerda N° 07, Sector El Rosario', '9 8136 0824', 'Departamentos amoblados, 2 habitaciones, canchas de pádel.'],
            ['Hostel Millaray Inn Express', 'alojamiento', null, null, "Av. O'Higgins N° 1037", '5 2 711570 / 45 271 2022', 'Baño privado, escritorio, desayuno continental.'],
            ['Hotel Duhatao', 'alojamiento', null, null, 'Prat N° 420', '45 2 714320', 'Estilo moderno, WiFi de alta velocidad, restaurante.'],
            ['Hotel y Cabañas Angol', 'alojamiento', null, null, "Av. O'Higgins N° 2598", '9 5901 2603', 'Hotel + cabañas 2-3 dormitorios.'],
            ['Hospedaje Araucaria Angol', 'alojamiento', null, null, 'Andrés Bello N° 236', '9 9773 5578', 'Ambiente hogareño, atención personalizada.'],
            ['Hospedaje Centro Spa', 'alojamiento', null, null, 'Vergara N° 273', '45 2 712323 / 9 3494 5303', 'Atención al detalle, tranquilidad.'],
            ['Hospedaje Corazón de Cordillera', 'alojamiento', null, null, 'Julio Sepúlveda N° 698', '9 7219 3955 / 9 9343 0041', 'En pleno centro de Angol.'],
            ['Hospedaje El Ensueño', 'alojamiento', null, null, 'Pedro Aguirre Cerda N° 1135', '9 6106 0954', 'Reconocido por su limpieza y trato amable.'],
            ['Hospedaje Juana Diosa Orellana', 'alojamiento', null, null, "O'Higgins N° 2884", '9 5819 4798 / 45 2 714092', 'Alojamiento residencial sencillo y económico.'],
            ['Hospedaje Los Rieles', 'alojamiento', null, null, 'Calle La Paz N° 70', '9 9153 5698', 'Hospedaje + complejo de cabañas.'],
            ['Hospedaje Victoria MG', 'alojamiento', null, null, 'Colipí N° 1358', '9 4051 0629', 'Combina hospedaje y agroturismo.'],
            ['Hospedaje La Nona', 'alojamiento', null, null, 'Gral. Óscar Bonilla, Angol', '9 9819 7119', 'Alojamiento completo, ambiente tranquilo.'],
            ['Hostal Bilbao', 'alojamiento', null, null, 'Bilbao N° 157', '9 7748 3697', 'Ambiente familiar y tranquilo.'],
            ['Hostal Bostón', 'alojamiento', null, null, 'Julio Sepúlveda N° 328', '9 7915 6015 / 9 8245 5518', 'Funcional, ambiente tranquilo.'],
            ['Hostal Florecer', 'alojamiento', null, null, 'Esmeralda N° 172', '9 9347 3406', 'Ambiente familiar.'],
            ['Hostal La Casona', 'alojamiento', null, null, 'Alberto Larraguibel N° 168', '9 9646 1606', 'Habitaciones cómodas, calefacción y WiFi.'],
            ['Aladin Hostal', 'alojamiento', null, null, 'Lote 7 El Naranjal, camino Villa El Parque, cerca de Huequén', '9 9221 8789', 'Alojamiento amplio y moderno.'],
            ['Cabañas Canteras Deuco', 'alojamiento', 'los_sauces', 8, 'Km. 8 sur de Angol, camino a Los Sauces', '9 9847 5321 / 9 9067 0969', 'Piscina temperada y fría, sauna, kayak, canopy, cabalgatas.'],
            ['Cabañas Rehue', 'alojamiento', null, null, 'Sector urbano de Angol', '9 7748 4940', 'WiFi, TV cable, calefacción, cercanía a servicios.'],
            ['Cabañas Alto de Mónaco', 'alojamiento', 'los_sauces', 1, 'Km. 1, Angol–Los Sauces', '9 9599 0940', 'Departamentos de 2 dormitorios, admiten mascotas.'],
            ['Cabaña Lomas del Rosario', 'alojamiento', null, null, 'Sector El Rosario', '9 3426 8807 / 9 3426 8792', '3 dormitorios, piscina privada, jardín.'],
            ['Cabañas Quillay', 'alojamiento', null, null, 'Valle de San Juan', '9 3547 6861', 'Tinajas de agua caliente, aire acondicionado, desayuno.'],
            ['Cabañas Vanisi', 'alojamiento', 'camino_parque', 6, 'Km. 6 Fundo El Parque', '9 9932 6722', 'Áreas verdes, piscina, tinaja.'],
            ['Cabañas Colinas de Villa Verde', 'alojamiento', 'renaico', 1, 'Km 1, Ruta 180 Angol–Renaico', '45 2 711973 / 9 7495 0873', 'Hotel + cabañas, piscina, quincho.'],
            ['Cabañas Los Confines', 'alojamiento', 'renaico', 1, 'Ruta Nahuelbuta a Renaico, bifurcación Calle Los Confines Sur', '9 2050 5713', 'Refugio para parejas, tinaja y sauna, a 1 km de Angol.'],

            // --- ALOJAMIENTO camino al Parque Nacional Nahuelbuta ---
            ['Cabañas Bellavista', 'alojamiento', 'camino_parque', 5, 'Sitio 5-B, final calle Colima, camino Angol–Vegas Blancas', '9 6627 9043 / 45 2 713589', 'Vista panorámica hacia Angol, cabañas equipadas, tinajas.'],
            ['Cabañas Piedra Blanca', 'alojamiento', 'camino_parque', 20, 'Piedra Blanca 235, Sector Las Acequias', '9 9438 4250', 'Cabañas para 2 a 6 personas, vista a la montaña.'],
            ['Cabañas Estero Las Minas, Arrayán y Coihue', 'alojamiento', 'camino_parque', 20, 'Parcela Piedra de Afilar N°5, Sector Piedra Blanca', '9 3262 3014', 'Cabañas en bosque nativo, vistas panorámicas.'],
            ['Observatorio Pewen', 'turismo-aventura', 'camino_parque', 14, 'Cruce Chanleo, aprox. 14 km de Angol', '9 4847 0261', 'Astroturismo, observación astronómica.'],
            ['Refugio Bosque Nativo', 'alojamiento', 'camino_parque', 15, 'Ruta R-126, km 15, camino Angol–Chanleo', '9 4071 5131', 'Refugio de montaña, astroturismo, turismo rural.'],
            ['Cabañas El Manzano', 'alojamiento', 'camino_parque', 20, 'Sector El Manzano, Km 20', '9 5654 3632 / 9 7981 4825', 'Cabañas, camping, kiosco, junto al río Picoiquén.'],
            ['Domo y Ruka Nahuelbuta', 'alojamiento', 'camino_parque', 20, 'Sector El Manzano, Km 20-21', '9 3177 9863 / 9 8185 0399 / 9 4408 0089', 'Alojamiento en domos, tinajas.'],
            ['Ecoturismo Chanleo (Domo)', 'alojamiento', 'camino_parque', 15, 'Ruta R-126, km 14,5, camino Angol–Chanleo', '9 4245 7181', 'Eco-lodge, domo, tinaja, hot tub.'],
            ['Domos Nahuelbuta', 'alojamiento', 'camino_parque', 21, 'Ruta 126, sector Chanleo/El Manzano, km 20-21', '9 2726 0285', 'Domos junto al río Picoiquén, senderos.'],
            ['Cabañas Lomas el Carmen', 'alojamiento', 'camino_parque', 22, 'Sector El Manzano, Km 22', '9 9731 3786', 'Cabañas equipadas, entorno natural.'],
            ['Cabañas Cordillera de Nahuelbuta', 'alojamiento', 'camino_parque', 24, 'Sector El Manzano/Vegas Blancas, Km 21-27', '9 7888 3700', 'Piscina, tinajas, calefacción a leña, arriendo de bicicletas.'],
            ['Cabañas Refugio Nahuelbuta', 'alojamiento', 'camino_parque', 24, 'Sector Vegas Blancas, Km 24', '9 7669 8618', 'Tinaja privada, terraza, piscina.'],
            ['Loft Alto Nahuelbuta', 'alojamiento', 'camino_parque', 24, 'Camino a la Cordillera de Nahuelbuta, Km 24 (7 km del parque)', '9 2628 7010 / 9 2050 5713', 'Equipado para 6 personas, estero natural, tinaja privada.'],
            ['Centro de Eventos y Cabaña Los Robles de Vegas Blancas', 'alojamiento', 'camino_parque', 31, 'Km 31, camino Angol–Vegas Blancas–Parque Nacional Nahuelbuta', '9 4565 8067', 'Eventos familiares y gastronomía típica + hospedaje. Agroturismo, camping, arriendo de caballos.'],
            ['Cabañas Nahuelbuta de Vegas Blancas', 'alojamiento', 'camino_parque', 30, 'Camino Angol–Vegas Blancas 30 km, bifurcación San Ramón 1,5 km', '9 7876 2616', 'Cabaña rústica de montaña.'],
            ['Cabañas/Ecocamping El Rincón', 'camping', 'camino_parque', 30, 'Vegas Blancas 30-35 km, bifurcación San Ramón 2 km', '9 8741 6030', 'Refugio ecológico, cabaña + camping.'],
            ['Casona Gastronomía de Montaña', 'gastronomia', 'camino_parque', 32, 'Km 32, Angol–Vegas Blancas', '9 3576 1581', 'Almuerzos, cafetería, atención de eventos.'],
            ['Refugio de Montaña María Sylvester Rasch', 'alojamiento', 'camino_parque', 32, 'Sector Vegas Blancas, Km 32-33', '9 9126 9814 / 9 9991 6680', 'Refugio de amplia capacidad para grupos, piscina.'],
            ['Cabaña Viejo Roble', 'alojamiento', 'camino_parque', 32, 'Sector Vegas Blancas, Km 32', '9 9913 4777', 'Tinajas, camping, desayunos.'],
            ['Cabaña Coimallín', 'alojamiento', 'camino_parque', 35, 'Sector Los Corrales, Vegas Blancas, Km 34-35', '9 4922 5871', 'Tinaja, senderos, acceso al río.'],
            ['Cabañas El Cajón de Nahuelbuta', 'alojamiento', 'camino_parque', 32, 'Sector Los Corrales, Vegas Blancas, Km 32', '9 9101 2443', '3 cabañas, senderos, camping, tinajas.'],
            ['Cabañas Alto los Corrales', 'alojamiento', 'camino_parque', 35, 'Km 35, camino Parque Nacional Nahuelbuta', '9 7106 3313', 'Sendero "El Chucao", tinajas.'],

            // --- CAMPING ---
            ['Camping Pehuenco (CONAF)', 'camping', 'camino_parque', 42.5, 'Sector Pehuenco, sur del Parque Nacional Nahuelbuta, 42,5 km de Angol', '9 9643 6927', '10 sitios, mesas, fogones, baños rústicos, agua; abierto todo el año.'],
            ['Camping Las Quilas', 'camping', 'camino_parque', 22, 'Km. 22, camino Angol–El Manzano', '9 7377 1969', 'A orillas del río en El Manzano, sitios sombreados.'],
            ['Camping El Manzano', 'camping', 'camino_parque', 20, 'Km. 20, camino Angol–El Manzano', '9 7981 4825 / 9 5654 3632', 'Piscina, áreas verdes, mesones, acceso al río, playa natural.'],
            ['Camping Los Panchos', 'camping', 'renaico', 1, 'Ruta Angol–Renaico, pasado puente Malleco, 900 m al interior', '9 4281 2725', 'Ambiente tranquilo, áreas verdes.'],

            // --- SECTOR MAITENREHUE (40km al norte) ---
            ['Salto de la Sabanilla', 'turismo-aventura', 'maitenrehue', 40, 'Sector Maitenrehue, 40 km al norte de Angol', null, 'Cascada, atractivo natural del sector Maitenrehue.'],
            ['Balneario Maitenrehue', 'turismo-aventura', 'maitenrehue', 40, 'Sector Maitenrehue, 40 km al norte de Angol', null, 'Balneario de recreación en el sector rural de Maitenrehue.'],
            ['Vivero de Copihues "Maitenrehue"', 'comercio', 'maitenrehue', 40, 'Sector Maitenrehue, 40 km al norte de Angol', null, 'Vivero de copihues, flor nacional de Chile.'],

            // --- TURISMO AVENTURA (operadores, sin dirección fija — punto de encuentro en Angol) ---
            ['Servicios Nahuelbuta', 'turismo-aventura', null, null, 'Sector Itraque / Angol (punto de encuentro, sin oficina fija reportada)', '+56 9 6313 0618', 'Rapel, trekking, cabalgatas, kayak, astroturismo.'],
            ['Turismo Weñitours', 'turismo-aventura', null, null, 'Angol (punto de encuentro, sin oficina fija reportada)', '+56 9 6230 0788 / 9 6330 0788', 'Expediciones al aire libre y salidas guiadas recreativas.'],
            ['Turismo Piedra del Águila', 'turismo-aventura', null, null, 'Angol (punto de encuentro, sin oficina fija reportada)', '+56 9 8904 6597', 'Transporte turístico y traslados privados al Parque Nacional Nahuelbuta.'],
            ['Nahueltour', 'turismo-aventura', null, null, 'Angol (agencia, sin dirección exacta reportada)', '45 2 715457 / +56 9 8988 7826', 'Agencia de viajes internacionales, itinerarios cultura y patrimonio.'],
            ['Nahueltrek', 'turismo-aventura', null, null, 'Angol (punto de encuentro, sin oficina fija reportada)', '+56 9 6814 9431 / +56 9 9854 3632', 'Trekking y senderismo guiado, avistamiento de flora y fauna.'],
            ['Nahuelbuta Overland', 'turismo-aventura', null, null, 'Angol (punto de encuentro, sin oficina fija reportada)', '+56 9 7888 3700 / +56 9 7669 8618', 'Rutas 4x4 y travesías guiadas por zonas naturales y rurales.'],

            // --- TRANSPORTE ---
            ['Terminal Rodoviario', 'transporte', null, null, 'Angol (dirección exacta sin confirmar)', '45 2 711854', 'Terminal de buses interurbano.'],
            ['Terminal de Buses Bío Bío', 'transporte', null, null, 'Angol (dirección exacta sin confirmar)', '45 2 464388', 'Terminal de buses.'],
            ['Terminal Rural', 'transporte', null, null, 'Angol (dirección exacta sin confirmar)', '45 2 712021', 'Terminal de buses rurales.'],
            ['Buses Nahuelbuta', 'transporte', null, null, 'Angol (dirección exacta sin confirmar)', '+56 9 8428 0416', 'Servicio de buses.'],
            ['Radio Taxi — Sr. Óscar Garrido', 'transporte', null, null, 'Angol', '+56 9 8934 8017', 'Servicio de radiotaxi.'],
            ['Transporte Rivant', 'transporte', null, null, 'Angol', '+56 9 9940 6423 / +56 9 7574 1105', 'Transporte de pasajeros.'],
            ['Transporte Urra (Sra. Nancy Urra Jara)', 'transporte', null, null, 'Angol', '+56 9 7609 7250', 'Transporte de pasajeros.'],
            ['Buses Aguilera (Sr. Iván Aguilera Godoy)', 'transporte', null, null, 'Angol', '+56 9 6615 9619', 'Transporte de pasajeros.'],
            ['Buses Moncada (Sr. Guillermo Moncada)', 'transporte', null, null, 'Angol', '+56 9 9419 0033 / 45 2 714090', 'Transporte de pasajeros.'],
            ['Edison Castro — Verde Araucano', 'transporte', null, null, 'Angol', '+56 9 7745 1972', 'Transporte turístico.'],
            ['Turismo Salgatur', 'transporte', null, null, 'Angol', '+56 9 9874 2349', 'Transporte turístico.'],
            ['Trascender Transporte y Turismo', 'transporte', null, null, 'Angol', '+56 9 7582 0128', 'Transporte turístico.'],
        ];

        $businessRows = [];
        foreach ($businesses as [$name, $cat, $ref, $km, $address, $phone, $desc]) {
            if (! isset($categoryIds[$cat])) {
                continue;
            }
            [$lat, $lng] = $this->point($ref, $km, $name);
            $slug = $this->uniqueSlug($name, $usedBusinessSlugs);

            DB::table('businesses')->insert([
                'destination_id' => $destinationId,
                'business_category_id' => $categoryIds[$cat],
                'commune_id' => $communeId,
                'name' => $name,
                'slug' => $slug,
                'description' => $desc,
                'address' => $address,
                'sernatur_status' => 'sin_registro',
                'verification_status' => 'unverified',
                'claim_status' => 'unclaimed',
                'is_active' => true,
                'source' => 'admin',
                'source_type' => 'aproximado_sector',
                'imported_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
                'location' => DB::raw($this->pointWkt($lat, $lng)),
            ]);

            if ($phone) {
                $businessRows[] = ['slug' => $slug, 'phone' => $phone];
            }
        }

        // Teléfonos: se insertan en un segundo paso, ya con business_id resuelto.
        $idsBySlug = DB::table('businesses')->whereIn('slug', array_column($businessRows, 'slug'))->pluck('id', 'slug');
        foreach ($businessRows as $row) {
            if (! isset($idsBySlug[$row['slug']])) {
                continue;
            }
            DB::table('business_contacts')->insert([
                'business_id' => $idsBySlug[$row['slug']],
                'phone' => $row['phone'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // --- ATRACTIVOS ---
        // name, ref, km, category, description
        $attractions = [
            ['Parque Nacional Nahuelbuta', 'camino_parque', 38, 'parque nacional', 'Área Silvestre Protegida, ~6.832 ha, bosques de araucaria milenaria. 3 sectores: Pehuenco, Coimallín y Cótico.'],
            ['Museo Histórico Dillman Bullock', 'collipulli', 8, 'museo', 'Arqueología, legado del naturalista Dillman Bullock. Km 8, Centro Turístico El Vergel.'],
            ['Museo Histórico Julio Abasolo', null, null, 'museo', 'Historia urbana, social y patrimonial de Angol. Caupolicán #901.'],
            ['Sala Histórica Regimiento Húsares N°3', null, null, 'museo', 'Uniformes y objetos de la historia militar del Regimiento. Los Confines N° 330.'],
            ['Museo Hermanas Franciscanas', null, null, 'museo', 'Objetos educativos, litúrgicos y comunitarios. Traiguén 750.'],
            ['Plaza de Armas de Angol (Plaza Siete Fundaciones)', null, null, 'monumento', 'Espejo de agua y 4 esculturas de mármol de Virginio Arias (1892). Monumento Nacional desde 1986.'],
            ['Parroquia Inmaculada Concepción', null, null, 'iglesia', 'Templo religioso emblemático de Angol. Avenida Manuel Bunster 337.'],
            ['Fuerte Cancura (Fuerte de Angol)', null, null, 'sitio histórico', 'Sitio histórico de 1867, junto a la ruta hacia Collipulli. Reportado en deterioro (2019).'],
            ['Centro Turístico El Vergel', 'collipulli', 8, 'atractivo natural', 'Km 8 al este de Angol. Áreas verdes, criadero de plantas ornamentales.'],
            ['Parque Alberto Larraguibel', null, null, 'atractivo urbano', 'Área verde urbana, sector Huequén.'],
            ['Canteras de Deuco', 'los_sauces', 8, 'atractivo natural', 'Lagunas de aguas tranquilas en antiguos tajos de roca. 8 km al sur de Angol.'],
            ['Balneario La Peta', null, 0.6, 'atractivo natural', '600 m al oeste de la Plaza de Armas, orillas del río Picoiquén.'],
            ['Parque Escuela Normal (Vergara)', null, null, 'atractivo urbano', 'Costanera Rehue, junto a Universidad La Frontera. Skatepark, patinódromo.'],
            ['Sector Maitenrehue', 'maitenrehue', 40, 'sector rural', '40 km al norte de Angol. Bosque nativo, biodiversidad, alto valor recreativo.'],
            ['Rehue (Altar Sagrado Mapuche) — Maitenrehue', 'maitenrehue', 40, 'sitio ceremonial mapuche', 'Altar sagrado mapuche en el sector Maitenrehue. Requiere contacto con la comunidad antes de publicar detalle.'],
            ['Mujeres Productoras de Merkén — Maitenrehue', 'maitenrehue', 40, 'producción artesanal', 'Productoras locales de merkén en el sector Maitenrehue.'],
            ['Zona de Picnic Sector Puente Las Ánimas', 'maitenrehue', 40, 'atractivo recreativo', 'Zona de picnic en el sector Maitenrehue.'],
            ['Capilla de La Candelaria', 'maitenrehue', 40, 'sitio religioso', 'Capilla en el sector Maitenrehue.'],
            ['Parque Santuario (Lomas del Toro – Sector Roble Bonito)', 'maitenrehue', 40, 'atractivo natural', 'Parque santuario en el sector Maitenrehue.'],
            ['Parque CMPC Junquillar', null, null, 'deporte outdoor', 'Sector Acequias, final calle Colima. Escenario de mountain bike (International Cup, Downhill Chile).'],
            ['Ciclovía Puente Malleco – ex línea férrea', null, null, 'atractivo recreativo', 'Proyecto de ciclovía hacia Canteras de Deuco.'],
        ];

        foreach ($attractions as [$name, $ref, $km, $cat, $desc]) {
            [$lat, $lng] = $this->point($ref, $km, $name);
            $slug = $this->uniqueSlug($name, $usedAttractionSlugs);

            DB::table('attractions')->insert([
                'destination_id' => $destinationId,
                'commune_id' => $communeId,
                'name' => $name,
                'slug' => $slug,
                'description' => $desc,
                'category' => $cat,
                'source' => 'admin',
                'source_type' => 'aproximado_sector',
                'imported_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
                'location' => DB::raw($this->pointWkt($lat, $lng)),
            ]);
        }

        // --- RUTAS / SENDEROS (tabla oficial del Parque Nacional Nahuelbuta) ---
        // name, distance_km, hours, difficulty, max_elevation (solo informativo, en la descripción)
        $senderos = [
            ['El Aguilucho', 1.8, 1, 'media', 1275],
            ['Piedra del Águila', 4.5, 2, 'media', 1375],
            ['Casa de Piedra', 1.5, 1, 'facil', 1379],
            ['Cerro Anay', 0.8, 0.5, 'media', 1400],
            ['Estero Los Gringos', 5, 2.3, 'media', 1400],
            ['Camino del Árbol', 0.2, 0.3, 'facil', 1075],
        ];

        foreach ($senderos as [$name, $distanceKm, $hours, $difficulty, $elevation]) {
            $slug = $this->uniqueSlug("Sendero {$name}", $usedRouteSlugs);

            DB::table('routes')->insert([
                'destination_id' => $destinationId,
                'name' => "Sendero {$name}",
                'slug' => $slug,
                'description' => "Sendero del Parque Nacional Nahuelbuta. Altitud máxima {$elevation} msnm. Fuente: afiche oficial \"Atractivos Turísticos Nahuelbuta\", Municipalidad de Angol.",
                'distance_km' => $distanceKm,
                'duration_minutes' => (int) round($hours * 60),
                'difficulty' => $difficulty,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $this->command?->info(sprintf(
            'Catastro cargado: %d negocios, %d atractivos, %d senderos.',
            count($businesses),
            count($attractions),
            count($senderos)
        ));
    }
}
