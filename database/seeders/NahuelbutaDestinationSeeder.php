<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NahuelbutaDestinationSeeder extends Seeder
{
    // Este seeder es el ÚNICO lugar donde "Nahuelbuta" aparece como dato,
    // nunca como código hardcodeado en el núcleo del sistema — mismo
    // principio de arquitectura multi-destino que Cajón del Maipo.
    public function run(): void
    {
        // Jerarquía territorial real (códigos oficiales INE) — piloto acotado
        // a la comuna de Angol, la más asociada al Parque Nacional Nahuelbuta,
        // dentro de la Región de La Araucanía.
        DB::table('regions')->updateOrInsert(
            ['code' => '09'],
            ['name' => 'Región de La Araucanía', 'created_at' => now(), 'updated_at' => now()]
        );
        $regionId = DB::table('regions')->where('code', '09')->value('id');

        DB::table('provinces')->updateOrInsert(
            ['code' => '091'],
            [
                'region_id' => $regionId,
                'name' => 'Provincia de Malleco',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        $provinceId = DB::table('provinces')->where('code', '091')->value('id');

        DB::table('communes')->updateOrInsert(
            ['code' => '09101'],
            [
                'province_id' => $provinceId,
                'name' => 'Angol',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('destinations')->updateOrInsert(
            ['slug' => 'nahuelbuta-360'],
            [
                'name' => 'Nahuelbuta 360',
                'description' => 'Destino piloto de Ruta 360 en la Región de La Araucanía — bosque nativo, Parque Nacional Nahuelbuta, cultura mapuche y turismo rural, con foco inicial en la comuna de Angol.',
                'is_active' => true,
                'active_layers' => json_encode([
                    'alojamiento', 'gastronomia', 'trekking', 'camping',
                    'atractivos', 'transporte', 'turismo_aventura', 'cultura', 'comercio', 'eventos',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Mismas categorías que Cajón del Maipo, sin "termas" (no es un atractivo
        // relevante en Nahuelbuta) — el resto del catálogo de negocios/atractivos
        // reales se carga después, vía el panel de admin, con fuentes verificables.
        $categories = [
            ['name' => 'Alojamiento', 'slug' => 'alojamiento', 'map_layer' => 'alojamiento'],
            ['name' => 'Gastronomía', 'slug' => 'gastronomia', 'map_layer' => 'gastronomia'],
            ['name' => 'Trekking', 'slug' => 'trekking', 'map_layer' => 'trekking'],
            ['name' => 'Camping', 'slug' => 'camping', 'map_layer' => 'camping'],
            ['name' => 'Turismo aventura', 'slug' => 'turismo-aventura', 'map_layer' => 'turismo_aventura'],
            ['name' => 'Transporte', 'slug' => 'transporte', 'map_layer' => 'transporte'],
            ['name' => 'Cultura', 'slug' => 'cultura', 'map_layer' => 'cultura'],
            ['name' => 'Comercio', 'slug' => 'comercio', 'map_layer' => 'comercio'],
        ];

        foreach ($categories as $category) {
            DB::table('business_categories')->updateOrInsert(
                ['slug' => $category['slug']],
                array_merge($category, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}
