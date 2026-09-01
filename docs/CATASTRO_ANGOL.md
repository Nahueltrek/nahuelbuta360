# Catastro real — Angol, Región de La Araucanía

Catastro piloto de negocios y atractivos para Nahuelbuta 360, comuna de Angol.
Investigado vía búsqueda web y fuentes oficiales aportadas directamente
(guía municipal en PDF), con la misma disciplina que Cajón del Maipo:
**nada inventado**.

**Este documento es insumo para carga manual vía el panel de admin, no un
seeder.** Ningún ítem trae coordenadas precisas verificadas — el esquema exige
`location` (`POINT`, `NOT NULL`, con índice spatial) en `businesses` y
`attractions`, así que cada ítem necesita que alguien confirme la ubicación
exacta (ej. buscando la dirección en Google Maps y tomando el pin) al cargarlo
en el admin. No se debe sembrar con coordenadas estimadas por IA como si
fueran reales.

Varias fuentes (`turismo.angol.cl`, `wikiexplora.com`, `conaf.cl`,
`wikipedia.org`, `andeshandbook.org`) no pudieron leerse en directo desde este
entorno (bloqueadas por el proxy de salida) — esos datos vienen de los
*snippets* de búsqueda, no de lectura completa del HTML. Están marcados abajo
y conviene reconfirmarlos abriendo el link antes de publicar.

---

## Parque Nacional Nahuelbuta (CONAF)

- **Parque Nacional Nahuelbuta** — ~6.832 ha en la Cordillera de la Costa,
  bosques de araucaria milenaria. Se divide en 3 sectores: **Pehuenco**,
  **Coimallín** y **Cótico**, cada uno con paisajes propios. Administración
  y camping principal en sector Pehuenco. Horario 9:00–18:00. Contacto:
  parque.nahuelbuta@conaf.cl.
  Fuente: [CONAF](https://www.conaf.cl/parques/parque-nacional-nahuelbuta/)
  (vía snippet, no fetch directo) · Afiche oficial "Atractivos Turísticos
  Nahuelbuta" (Municipalidad de Angol / Depto. Turismo, subido por el
  usuario).
  Coordenadas: no verificadas por fetch directo (Wikipedia reporta
  37°47′00″S 72°59′00″W vía snippet — reconfirmar).
- **Senderos del parque — tabla oficial** (distancia, tiempo y altitud
  máxima confirmados por el afiche municipal; reemplaza estimaciones
  previas de fuentes secundarias):

  | Sendero | Distancia | Tiempo | Altitud máx. | Dificultad |
  |---|---|---|---|---|
  | El Aguilucho | 1,8 km | 1 h | 1.275 msnm | Media |
  | Piedra del Águila | 4,5 km | 2 h | 1.375 msnm | Media |
  | Casa de Piedra | 1,5 km | 1 h | 1.379 msnm | Baja |
  | Cerro Anay | 0,8 km | 0,5 h | 1.400 msnm | Media |
  | Estero Los Gringos | 5 km | 2,3 h | 1.400 msnm | Media |
  | Camino del Árbol | 0,2 km | 0,3 h | 1.075 msnm | Baja |

  Desde Piedra del Águila se observa el océano Pacífico, el valle central y
  los volcanes andinos en días despejados. Fauna reportada en el parque:
  pudú, zorro Chilote/de Darwin, monito del monte, puma, carpintero negro,
  chucao, lagarto torcuato.
  Fuente: Afiche oficial "Atractivos Turísticos Nahuelbuta" (Municipalidad
  de Angol / Depto. Turismo).
- **Astroturismo en el parque** — la Cordillera de Nahuelbuta alcanza su
  **altitud máxima oficial de 1.560 msnm en el Cerro Alto Nahuelbuta**
  (corrige el dato de 1.532 msnm que se había usado provisionalmente en el
  hero del sitio, tomado de una fuente secundaria — este valor municipal es
  más autoritativo). Baja contaminación lumínica, apto para observación de
  Vía Láctea y fotografía nocturna.
  Fuente: Afiche oficial "Atractivos Turísticos Nahuelbuta".
- **Camping Pehuenco (CONAF)** — 10 sitios, mesas, fogones, baños rústicos,
  agua; abierto todo el año. Ubicado al sur del parque, **42,5 km de
  Angol** (confirma el rango previo de 34-42 km — el número oficial es 42,5
  km). Tel. 9 9643 6927.
  Fuente: snippet CONAF/Cañete Turístico · Afiches oficiales municipales
  (alojamiento y atractivos).
- **Sendero El Avellano** (nombre correcto — un segundo afiche municipal lo
  nombra distinto al primero, que decía "Los Avellanos" en plural) —
  bifurcación izquierda, sector Los Toldos - Vegas Blancas. Sendero natural
  de baja dificultad, bosque nativo, flora y fauna de la Cordillera de
  Nahuelbuta. Tel. 9 7703 4035.
  Fuente: Afiches oficiales "Servicios de Alojamiento" (Municipalidad de
  Angol / Depto. Turismo), 1ra y 2da versión.

## Alojamiento

- **Hotel Ruiz** — 3 estrellas, wifi gratis, jardín. Bernardo O'Higgins 331,
  Angol. Tel. +56 45 271 9156.
  Fuente: [Booking.com](https://www.booking.com/hotel/cl/ruiz-angol.es.html).
- **202 Hotel Boutique** — piscina exterior de temporada, jardín, salón
  compartido, wifi, a 0,7 km del centro. Colipí Nº202, Angol.
  Tel. +56 9 9887 6022. También listado en SERNATUR.
  Fuente: [SERNATUR](https://serviciosturisticos.sernatur.cl/60051-202-hotel-boutique) ·
  [Booking.com](https://www.booking.com/hotel/cl/202-boutique.html).
- **Hostal Gina (Ginna Medina)** — vistas a jardín, terraza, estacionamiento
  privado gratuito. Listado en el sitio municipal de turismo.
  Fuente: [turismo.angol.cl](https://turismo.angol.cl/hoteleria/hostales.html)
  (vía snippet, fetch directo bloqueado).
- **Hostal el Valle** — alojamiento con desayuno americano.
  Fuente: listing agregado en Booking.com (misma fuente que Hostal Gina).

**Excluidos por falta de segunda fuente** (revisar manualmente antes de
sumarlos): "Cabañas Loteo Mónaco", "Hostal Rancel" — aparecen en listados
agregados pero sin confirmación independiente de vigencia/contacto.

### Alojamiento camino al Parque Nacional Nahuelbuta — fuente oficial (afiche municipal)

Fuente: afiche "Servicios de Alojamiento — Camino al Parque Nacional
Nahuelbuta", Ilustre Municipalidad de Angol / Departamento de Turismo,
Cultura y Deporte, sello Municipalidad Turística SERNATUR — subido
directamente por el usuario. Ubicaciones dadas por km de camino/sector, sin
dirección postal ni coordenadas — hay que geolocalizar por el kilómetro
indicado (los caminos de referencia son Angol–Vegas Blancas y Angol–Chanleo,
Ruta R-126) al cargar en el admin.

| Nombre | Ubicación | Teléfono | Descripción |
|---|---|---|---|
| Cabañas Bellavista | Sitio 5-B, final calle Colima, camino Angol–Vegas Blancas | 9 6627 9043 | Vista panorámica hacia Angol, cabañas equipadas, tinajas |
| Cabañas Piedra Blanca | Piedra Blanca 235, Sector Las Acequias | 9 9438 4250 | Cabañas para 2 a 6 personas, vista a la montaña |
| Cabañas Estero Las Minas, Arrayán y Coihue | Parcela Piedra de Afilar N°5, Sector Piedra Blanca | 9 3262 3014 | Cabañas en bosque nativo, vistas panorámicas |
| Observatorio Pewen | Cruce Chanleo, aprox. 14 km de Angol | 9 4847 0261 | Astroturismo, observación astronómica |
| Refugio Bosque Nativo | Ruta R-126, km 15, camino Angol–Chanleo | 9 4071 5131 | Refugio de montaña, astroturismo, turismo rural |
| Cabañas El Manzano | Sector El Manzano, Km 20 | 9 5654 3632 | Cabañas, camping, kiosco, junto al río Picoiquén |
| Domo y Ruka Nahuelbuta | Sector El Manzano, Km 21 | 9 3177 9863 | Alojamiento en domos, tinajas |
| Domo Ecoturismo Chanleo | Ruta R-126, km 14,5, camino Angol–Chanleo | 9 4245 7181 | Eco-lodge, domo, tinaja, hot tub |
| Domo Nahuelbuta | Ruta 126, N° 15.600, sector Chanleo | 9 2726 0285 | Domos junto al río Picoiquén, senderos |
| Cabañas Lomas el Carmen | Sector El Manzano, Km 22 | 9 9731 3786 | Cabañas equipadas, entorno natural |
| Cabañas Cordillera de Nahuelbuta | Sector El Manzano, Km 27 | 9 7888 3700 | Piscina, tinajas, calefacción a leña, arriendo de bicicletas |
| Cabañas Refugio Nahuelbuta | Sector Vegas Blancas, Km 24 | 9 7669 8618 | Tinaja privada, terraza, piscina |
| Loft Alto Nahuelbuta | Camino a la Cordillera de Nahuelbuta, aprox. Km 24 (7 km del parque) | 9 2628 7010 | Equipado para 6 personas, estero natural, tinaja privada |
| Centro de eventos Los Robles de Vegas Blancas | Km 31, camino Angol–Vegas Blancas–Parque Nacional Nahuelbuta | 9 4565 8067 | Eventos familiares, gastronomía típica campesina |
| Cabaña Los Robles (hospedaje) | Sector Vegas Blancas, Km 31 | 9 4565 8067 | Tinajas, camping, arriendo de caballos |
| Cabañas Nahuelbuta de Vegas Blancas | Camino Angol–Vegas Blancas 30 km, bifurcación San Ramón 1,5 km | 9 7876 2616 | Cabaña rústica de montaña |
| Cabañas/Ecocamping El Rincón | Vegas Blancas 30 km, bifurcación San Ramón 2 km | 9 8741 6030 | Turismo ecológico, cabaña + camping |
| Casona Gastronomía de Montaña | Km 32, Angol–Vegas Blancas | 9 3576 1581 | Almuerzos, cafetería, atención de eventos |
| Refugio de Montaña María Sylvester Rasch | Sector Vegas Blancas, Km 32 | 9 9126 9814 | Refugio de amplia capacidad para grupos, piscina |
| Cabaña Viejo Roble | Sector Vegas Blancas, Km 32 | 9 9913 4777 | Tinajas, camping, desayunos |
| Cabaña Coimallín | Sector Los Corrales, Vegas Blancas, Km 34 | 9 4922 5871 | Tinaja, senderos, acceso al río |
| Cabañas El Cajón de Nahuelbuta | Sector Los Corrales, Vegas Blancas, Km 32 | 9 9101 2443 | 3 cabañas, senderos, camping, tinajas |
| Cabañas Alto los Corrales | Km 35, camino Parque Nacional Nahuelbuta | 9 7106 3313 | Sendero "El Chucao", tinajas |
| Cabañas Ruiz | Km 36, camino Parque Nacional Nahuelbuta | 9 8837 5655 | Mismo negocio que "Restaurant Ruiz" (ver Gastronomía) |

**Servicios complementarios (misma fuente):**

| Servicio | Teléfono | Descripción |
|---|---|---|
| Los Hornitos de Nahuelbuta | 9 9614 7592 | Tortillas, empanadas y almuerzos |
| Almacén Don Fernando | 9 9591 6482 | Almacén / comercio local |

### Alojamiento — catastro ampliado (2do afiche oficial @angolturismo / Depto. Turismo Municipal)

Segundo afiche municipal, más completo que el anterior — agrega categorías
enteras (campings, cabañas urbanas, hoteles, hospedajes, hostales) y repite
parcialmente las cabañas camino al parque **con datos que no siempre
coinciden con el primer afiche**. Ver el aviso de discrepancias al final de
esta subsección antes de cargar nada — varias requieren una llamada de
confirmación antes de publicar.

**Campings camino al Parque Nacional Nahuelbuta**

| Nombre | Ubicación | Teléfono | Descripción |
|---|---|---|---|
| Camping Las Quilas | Km. 22, camino Angol–El Manzano | 9 7377 1969 | A orillas del río en El Manzano, sitios sombreados |
| Camping Pehuenco (CONAF) | Km. 42,5, sector Pehuenco | 9 9643 6927 | En el corazón del parque, rodeado de araucarias — **primer teléfono verificado para este camping CONAF, antes no lo teníamos** |
| Camping El Manzano | Km. 20, camino Angol–El Manzano | 9 7981 4825 / 9 5654 3632 | Piscina, áreas verdes, mesones, acceso al río |
| Camping Los Panchos | Ruta Angol–Renaico, pasado puente Malleco, 900 m al interior | 9 4281 2725 | Ambiente tranquilo, áreas verdes |
| Cabaña/Camping El Rincón | Vegas Blancas Km. 35, San Ramón 2 km | 9 8741 6030 | Refugio ecológico, también ofrece camping (ver también en Alojamiento) |

**Cabañas en Angol y alrededores (zona urbana/periurbana, no camino al parque)**

| Nombre | Ubicación | Teléfono | Descripción |
|---|---|---|---|
| Cabañas Canteras Deuco | Km. 8 sur de Angol | 9 9847 5321 / 9 9067 0969 | Piscina temperada y fría, sauna, kayak, canopy, cabalgatas |
| Cabañas Rehue | Sector urbano de Angol (sin dirección exacta en la fuente) | 9 7748 4940 | WiFi, TV cable, calefacción, cercanía a servicios |
| Cabañas Alto de Mónaco | Km. 1, Angol–Los Sauces | 9 9599 0940 | Departamentos de 2 dormitorios, admiten mascotas |
| Cabaña Lomas del Rosario | Sector El Rosario | 9 3426 8807 / 9 3426 8792 | 3 dormitorios, piscina privada, jardín |
| Cabaña El Ermitaño | Ruta Angol–Renaico, Km. 4,5 | 9 5517 5297 / 9 6681 0440 | Mismo negocio que "Restaurante El Ermitaño" (ver Gastronomía) — mismo km y teléfono principal |
| Cabañas Quillay | Valle de San Juan | 9 3547 6861 | Tinajas de agua caliente, aire acondicionado, desayuno |
| Cabañas Vanisi | Km. 6, Fundo El Parque | 9 9932 6722 | Áreas verdes, piscina, tinaja |
| Cabañas Colinas de Villa Verde | Km 1, Ruta 180 Angol–Renaico | 45 2 711973 / 9 7495 0873 | Hotel + cabañas, piscina, quincho |
| Cabañas Los Confines | Ruta Nahuelbuta a Renaico, bifurcación Calle Los Confines Sur | 9 2050 5713 | Refugio para parejas, tinaja y sauna, a 1 km de Angol |

**Hoteles (zona urbana)**

| Nombre | Dirección | Teléfono | Descripción |
|---|---|---|---|
| Apart Hotel Bellavista | Copihue N° 029, Edificio Don Gregorio | 9 7969 7365 | Cabañas estándar/familiares/de lujo, hidromasaje |
| Departamentos Entre Ríos | Pedro Aguirre Cerda N° 07, Sector El Rosario | 9 8136 0824 | Departamentos amoblados, 2 habitaciones, canchas de pádel |
| Hostel Millaray Inn Express | Av. O'Higgins N° 1037 | 5 2 711570 / 45 271 2022 | Baño privado, escritorio, desayuno continental |
| Hotel Duhatao | Prat N° 420 | 45 2 714320 | Estilo moderno, WiFi de alta velocidad, restaurante |
| Hotel y Cabañas Angol | Av. O'Higgins N° 2598 | 9 5901 2603 | Hotel + cabañas 2-3 dormitorios; misma dirección que "Choza Andina" (ver Gastronomía) — verificar si es el mismo complejo |
| Hotel Club Social | Caupolicán N° 492 | 45 2 599150 / 9 9789 5639 | Restaurante, bar, piscina en temporada estival; mismo teléfono que "Restaurant Club Social" (Caupolicán 498, ver Gastronomía) — es el mismo negocio, complejo hotel+restaurant |

**Hospedajes**

| Nombre | Dirección | Teléfono | Descripción |
|---|---|---|---|
| Hospedaje Araucaria Angol | Andrés Bello N° 236 | 9 9773 5578 | Ambiente hogareño, atención personalizada |
| Hospedaje Centro Spa | Vergara N° 273 | 45 2 712323 / 9 3494 5303 | Atención al detalle, tranquilidad |
| Hospedaje Corazón de Cordillera | Julio Sepúlveda N° 698 | 9 7219 3955 / 9 9343 0041 | En pleno centro de Angol |
| Hospedaje El Ensueño | Pedro Aguirre Cerda N° 1135 | 9 6106 0954 | Reconocido por su limpieza y trato amable |
| Hospedaje Juana Diosa Orellana | O'Higgins N° 2884 | 9 5819 4798 / 45 2 714092 | Alojamiento residencial sencillo y económico |
| Hospedaje Los Rieles | Calle La Paz N° 70 | 9 9153 5698 | Hospedaje + complejo de cabañas |
| Hospedaje Valdivia | Andrés Bello 236 | 9 9773 5578 | **Misma dirección y teléfono que "Hospedaje Araucaria Angol" — probable duplicado en la fuente, verificar cuál nombre es el vigente antes de cargar ambos** |
| Hospedaje Victoria MG | Colipí N° 1358 | 9 4051 0629 | Combina hospedaje y agroturismo |
| Hospedaje La Nona | Gral. Óscar Bonilla, Angol (sin número en la fuente) | 9 9819 7119 | Alojamiento completo, ambiente tranquilo |

**Hostales**

| Nombre | Dirección | Teléfono | Descripción |
|---|---|---|---|
| Hostal Rancel | Ilabaca N° 524 | 44 3 050411 / 9 7994 8379 | Mismo negocio que "Restaurant Rancel Tour" / "Terminal Rancel Tour" (ver Gastronomía y Transporte) |
| Hostal Bilbao | Bilbao N° 157 | 9 7748 3697 | Ambiente familiar y tranquilo |
| Hostal Bostón | Julio Sepúlveda N° 328 | 9 7915 6015 / 9 8245 5518 | Funcional, ambiente tranquilo |
| Hostal El Valle | Julio Sepúlveda N° 1060 | 9 6715 6906 | Orientado a viajeros de paso o corporativos — antes solo lo teníamos sin dirección (Booking.com) |
| Hostal El Vergel | Km 5, camino Angol–Collipulli | 9 9538 4919 | Vinculado a la tradición agrícola local |
| Hostal Florecer | Esmeralda N° 172 | 9 9347 3406 | Ambiente familiar |
| Hostal Gina Medina | Covadonga N° 55 | 9 9123 8085 | Antes solo lo teníamos sin dirección (turismo.angol.cl) — confirmado acá |
| Hostal La Casona | Alberto Larraguibel N° 168 | 9 9646 1606 | Habitaciones cómodas, calefacción y WiFi |
| Aladin Hostal | Lote 7 El Naranjal, camino Villa El Parque, Angol | 9 9221 8789 | Cerca de Huequén |

**⚠️ Discrepancias entre los dos afiches municipales — verificar antes de cargar:**

- **Hotel Ruiz**: el listado de hoteles de este 2do afiche da el mismo
  domicilio que ya teníamos por Booking.com (Av. O'Higgins/Bernardo
  O'Higgins N° 331) pero con **teléfono distinto: 9 8837 5655** — que es
  el mismo número que "Cabañas Ruiz" y "Restaurant Ruiz" camino al parque.
  Posible explicación: la familia Ruiz administra las tres cosas con un
  solo contacto. Llamar para confirmar antes de cargar como 3 negocios
  separados vs. 1 solo negocio con 3 ubicaciones.
- **Hotel Boutique 202**: Booking.com daba tel. +56 9 9887 6022; este
  afiche da **45 2 649030**. Confirmar cuál es el vigente.
- **Cabaña Coimallín**: 1er afiche decía Km 34, sector Los Corrales; este
  dice **Km 35**. Diferencia menor, puede ser redondeo.
- **Refugio de Montaña María Sylvester Rasch**: 1er afiche decía Km 32,
  tel. 9 9126 9814; este dice **Km 33, tel. 9 9991 6680 / 9 4974 8682**
  (teléfono totalmente distinto). Confirmar antes de cargar.
- **Cabañas Cordillera de Nahuelbuta**: 1er afiche decía Km 27; este dice
  **Km 21**. Diferencia grande — confirmar con el negocio.
- **Ecoturismo Chanleo / Domo Ecoturismo Chanleo**: 1er afiche la ubica en
  "Ruta R-126, km 14,5, camino Angol–Chanleo"; este la ubica en **"Vegas
  Blancas Km 35, San Ramón 2 km"** — son descripciones de zona bastante
  distintas para el mismo nombre de negocio. Podrían ser dos
  emprendimientos distintos con nombre parecido, o un error de alguna de
  las dos fuentes.
- **Domos Nahuelbuta**: 1er afiche la ubica en "Ruta 126 N°15.600, sector
  Chanleo"; este dice **"Sector El Manzano, km 21"** — misma situación que
  el punto anterior, confirmar si son el mismo lugar.
- **Loft Alto Nahuelbuta**: 1er afiche tel. 9 2628 7010; este dice
  **9 2050 5713** (que además es el mismo teléfono que "Cabañas Los
  Confines", un negocio urbano distinto — revisar con más cuidado).
- **Los Hornitos de Nahuelbuta**: 9614 7592 (1er afiche) vs. **9614 7595**
  (este) — último dígito distinto, podría ser typo en cualquiera de las
  dos fuentes.

### Agrupación oficial "Ruta Ecoturismo Nahuelbuta"

La misma fuente incluye un mapa y listado numerado de 14 emprendimientos
asociados formalmente en la "Agrupación Ruta Ecoturismo Nahuelbuta"
(sitio web `agrupacionecoturismonahuelbuta.cl`, Instagram
`@ecoruta_nahuelbuta`), con ubicación aproximada por sector en el mapa:
Los Toldos, Vegas Blancas, El Manzano, Chanleo y Junquillar (bosque
Junquillar de CMPC, con web propia `bosquevivocmpc.com/parques/`). Todos
menos el primero ya están en la tabla de arriba — este listado sirve para
confirmar cuáles tienen respaldo de la agrupación oficial (útil como señal
de "verificado" al decidir el orden de carga):

Parque CMPC Junquillar · Cabañas Cordillera de Nahuelbuta · Refugio Bosque
Nativo · Ecoturismo Chanleo · Almacén Don Fernando · Cabañas Nahuelbuta ·
Ecocamping El Rincón · Sendero Los Avellanos · La Casona "Gastronomía de
Montaña" · Los Hornitos de Nahuelbuta · Cabaña y Desayunos Viejo Roble ·
Cabaña Coimallín · Cabañas El Cajón de Nahuelbuta · Cabañas Alto los
Corrales.

## Gastronomía

- **El Quincho de Manolo** — cocina chilena, "picada" reconocida, música en
  vivo, decoración con reliquias; mérito turístico (mención gastronomía) de
  Angol, 3° mejor picada de La Araucanía según reseñas, #3 de 23 restaurantes
  de Angol en Tripadvisor. Julio Sepúlveda 645, Angol. Tel. +56 9 4047 6589 /
  45 3 214025 / 9 3219 2719 (confirmado también en la guía @angolturismo,
  "carnes a las brasas y parrilladas tradicionales, ambiente rústico y
  familiar").
  Fuente: [Tripadvisor](https://www.tripadvisor.com/Restaurant_Review-g2444676-d5990145-Reviews-El_Quincho_de_Manolo-Angol_Araucania_Region.html) ·
  [SERNATUR](https://serviciosturisticos.sernatur.cl/12662-el-quincho-de-angol) ·
  Guía "Servicios Gastronómicos Angol" (@angolturismo).
- **Ristorante La Vecchia Signora** — italiano, 27 reseñas, valorado como el
  mejor italiano de Angol por usuarios. Dirección confirmada por la guía
  @angolturismo: Pedro Aguirre Cerda 566. Tel. 9 9099 7050 / 9 3749 0719.
  "Gastronomía italiana y pastas artesanales, recetas tradicionales."
  Fuente: [Tripadvisor — Restaurantes en Angol](https://www.tripadvisor.com/Restaurants-g2444676-Angol_Araucania_Region.html) ·
  Guía "Servicios Gastronómicos Angol" (@angolturismo).
- **Restaurante Dublé** — pizzería, 19 reseñas, $$-$$$. Misma fuente
  (Tripadvisor). No aparece en la guía @angolturismo — dirección aún sin
  confirmar por segunda fuente.
- **Pastelería Garrido** — café chileno, 19 reseñas en Tripadvisor.
  Confirmado como **"Restaurant Pastelería Garrido"** en la guía
  @angolturismo: Lautaro 144. Tel. 45 2 463904 / 9 8137 7492. "Combina
  gastronomía casera y pastelería tradicional, colaciones abundantes y
  repostería artesanal."
  Fuente: Tripadvisor · Guía "Servicios Gastronómicos Angol" (@angolturismo).

### Catastro ampliado — Guía oficial "Servicios Gastronómicos Angol" (@angolturismo)

Fuente completa para todo lo que sigue en esta subsección: guía turística
municipal en PDF, cuenta oficial de Instagram `@angolturismo` — subida
directamente por el usuario, no vía web search. Domicilios y teléfonos tal
como figuran impresos (varios negocios listan más de un teléfono). Sin
coordenadas en la fuente — igual que el resto del documento, se geocodifican
al cargar en el admin.

**Restaurantes**

| Nombre | Dirección | Teléfono | Descripción |
|---|---|---|---|
| Restaurant Don Matías | Pedro Aguirre Cerda 213 | 9 8839 1921 | Cocina tradicional chilena, colaciones y preparaciones criollas |
| Hostería Sabores de Mamy | Valle San Juan, Parcela 107 | 9 8127 9087 | Gastronomía de campo y platos tradicionales |
| Fuente Angolina | Óscar Bonilla 456 | 9 8613 4888 | Fuente de soda tradicional, sándwiches y completos |
| Don Julián | Av. O'Higgins 1340, Los Pablos | 9 7547 5077 | Carnes a las brasas y parrilladas, cocina chilena tradicional |
| Restaurant Club Social | Caupolicán 498 | 45 2 717593 / 9 9789 5639 | Gastronomía tradicional de larga trayectoria, carta refinada |
| Restaurant Odas al Cárnico | Caupolicán 520 | 9 5195 1873 | Cortes de carne premium y parrilladas, cocción a las brasas |
| Restaurante El Ermitaño | Km 4,5 Ruta Angol–Renaico | 9 5517 5297 | Carnes a las brasas y gastronomía típica chilena, entorno natural |
| Restaurant Ruiz | Km 37 camino Parque Nacional Nahuelbuta | 9 8837 5655 | Gastronomía de montaña y cocina casera, camino al parque |
| Tentaciones M&J | Prat N°90, esquina Julio Sepúlveda | 9 4083 0726 | Preparaciones dulces y saladas, sabores caseros |

*Nota (actualizada): "Restaurant Ruiz" (Km 37, tel. 9 8837 5655) y
"Cabañas Ruiz" (Km 36, mismo teléfono — ver sección Alojamiento) son el
**mismo negocio familiar**, combinando restaurant + cabañas camino al
parque. Ambos son distintos del "Hotel Ruiz" en el centro de Angol
(Bernardo O'Higgins 331, tel. +56 45 271 9156) — mismo apellido, sin
confirmar relación familiar, pero son 3 negocios separados a cargar.*

**Cocinerías**

| Nombre | Dirección | Teléfono | Descripción |
|---|---|---|---|
| Donde Pelluco | Manuel Bunster 551 | 9 8439 5581 | Cocina criolla, platos caseros abundantes |
| Cocinería el Fogón | Caupolicán 202 | 9 9664 2980 | Cocina tradicional del sur de Chile, menús diarios |
| Don Choche Restaurant | Vergara 191 | 9 9991 6680 / 9 4974 8682 | Comida casera y preparaciones de estilo campestre |
| Restaurant La Morena | Chorrillos 551 | 9 7678 5545 | Comida casera y colaciones tradicionales |
| Sociedad de Artesanos | Arturo Prat 343 | 45 2 714626 / 9 7510 1420 | Gastronomía tradicional y cocina casera, ambiente familiar |
| Restaurant Rancel Tour | Ilabaca 524 | 9 8815 9015 / 44 305 0411 | Junto a terminal de buses privado; cocina chilena + transporte |
| Carloncho Restaurant | Manuel Bunster 897 | 45 2 715709 / 9 7577 9274 | Cocina tradicional y casera, carnes y parrilladas |

**Cafeterías y pastelerías**

| Nombre | Dirección | Teléfono | Descripción |
|---|---|---|---|
| Café Café | Chorrillos 468, interior | 45 2 716471 | Café, bebidas calientes y pastelería |
| Cafetería Laulhere | Chorrillos 342 | 9 8206 3132 | Bebidas y pastelería artesanal |
| Cafetería y Heladería Central | Chorrillos 350 | 9 6140 0090 | Café, bebidas y helados |
| El Canelo | Bilbao 202 | 9 2166 4349 | Bebidas y repostería artesanal; espacio de meditación |
| Espacio Work Angol | Óscar Bonilla 448 | 9 2837 4298 | Cafetería + espacio de coworking/reuniones |
| Finnis Coffee | Maipú 047 | 9 8817 6552 | Café y bebidas calientes, panadería/repostería |
| Pili's Coffee | Av. O'Higgins 1677 B | 9 4857 0117 | Café de especialidad y pastelería |
| Pukara Café | Vergara 397 B | 9 8414 5366 | Café y pastelería artesanal, ambiente rústico |
| Tetería Dulce Pecado | Av. O'Higgins 1744 | 9 9918 8176 | Té, café y pastelería, espacio para onces |

**Comida internacional**

| Nombre | Dirección | Teléfono | Descripción |
|---|---|---|---|
| Restaurant Waki | Caupolicán 601, 2° piso | 9 9577 8735 | Gastronomía peruana, pastas artesanales, tragos |
| Chef Diego | Juan Sallato 2699 | 45 2 719149 | Gastronomía típica peruana, ceviches, tragos |
| Bar Restaurant Ancash | Manuel Bunster 598 | 9 2246 7809 | Gastronomía peruana tradicional |
| Choza Andina | Av. O'Higgins N° 2598 | 9 4169 0542 | Gastronomía peruana, platos tradicionales |
| Cocinería La Limeña | Óscar Bonilla 750 | 9 8624 5228 | Gastronomía peruana auténtica |
| Comidas Árabes Angol | 2,5 camino Angol-Collipulli, parcela 7 | 9 5771 3044 | Gastronomía árabe y comida casera |
| Árabia Shawarma | José Bunster esq. Peteroa, Las Naciones | 9 5230 4191 | Gastronomía árabe y comida casera |
| Restaurante VEN GEN | Prat N° 65D | 9 5658 0058 | Comida asiática |
| Rincón Oriental | Campo de Marte 082B | (45) 321 9844 | Gastronomía oriental china tradicional |

**Comida italiana y pizzas**

| Nombre | Dirección | Teléfono | Descripción |
|---|---|---|---|
| Modo Pizza | Av. O'Higgins 350 | 9 6483 2691 / 45 2 426470 | Pizzas variadas, formato rápido |
| Pizzería Deja Vu | Chacabuco 029 | 45 2 517099 | Pizzas variadas, sándwiches, delivery |
| Las Pizzas de Don Pedro | Lautaro 589 | 9 8134 8432 / 45 2 717737 | Pizzas tradicionales, cocteles/cervezas |
| Taglis Angol | José Luis Osorio 390 | 45 2 516968 / 45 2 517968 | Pizzas, tragos, pastas, carnes, terraza y eventos |
| Sparlatto Pizza | Manuel Bunster 202 | 45 2 716272 / 9 5790 5804 | Pizzas para llevar, atención rápida |
| Turbo Pizzas | Av. O'Higgins 579 | 9 8467 8556 | Pizzas venta rápida |
| Mc Pizza | O'Higgins 247/253 | 9 4278 4257 | Pizzas variadas |
| La Rebeldía | Bernardo O'Higgins N°805 | 9 5635 9595 | Pizzería napolitana, horno a leña, pet friendly, accesible |

**Sushi y comida fusión**

| Nombre | Dirección | Teléfono | Descripción |
|---|---|---|---|
| Sushi Maso | Julio Sepúlveda 312 | 45 2 746864 / 9 6282 3587 | Sushi, pedidos directos |
| Taberu Angol | Av. O'Higgins 1354 | 9 7601 3676 | Cocina japonesa, sushi y platos preparados |
| Secreto Nikkei | Colima 442 | 9 9768 4112 | Cocina nikkei (fusión peruana-japonesa) |
| Sushi Extremo | Av. O'Higgins 268 | 9 8969 3692 | Rolls variados, preparaciones japonesas frescas |
| Seijaku Sushi | Artesanos N°296 | 9 3405 8230 | Sushi de inspiración japonesa |
| Maki Sushi | Inés de Suárez 30 | 9 8786 4930 | Rolls clásicos, servicio rápido |

**Comida rápida**

| Nombre | Dirección | Teléfono | Descripción |
|---|---|---|---|
| Comida Rápida El Huaso | Quino 2, Huequén | 45 2 711382 / 9 4070 9316 | Preparaciones chilenas y sándwiches |
| El Angolino Sanguchería 2 | Av. O'Higgins 331 | 9 8820 9482 | Sándwiches, completos |
| Matambre Angol | Arturo Prat 364 | 9 7511 3083 / 45 2 712389 | Carne, sándwiches, comida rápida |
| El Churrascón Sureño | Av. O'Higgins 2212 | 9 9779 2566 | Churrascos y sándwiches |
| El Rincón de la Mechada | Av. O'Higgins 229 G | 9 7760 2189 | Sándwiches y carne mechada |
| El Churrascón Criollo | Av. O'Higgins 508 D | 9 9779 2566 | Churrascos y sándwiches |
| Kame House Comida Rápida | Av. O'Higgins 215 B | 9 9578 7573 / 9 3764 1455 | Hamburguesas, papas fritas, sándwiches |
| Rustik Burger | Los Pablos 1340 | 44 303 3214 / 9 4178 4169 | Hamburguesas y comida rápida |
| Salchipap | Av. O'Higgins #1315 | 9 8191 3367 | Salchipapas, completos, papas fritas |
| Mr Burguer | Gral. Óscar Bonilla 428, local 10 | 9 9362 8297 | Hamburguesas artesanales, papas fritas |

*Nota: "El Churrascón Sureño" y "El Churrascón Criollo" comparten el mismo
teléfono (9 9779 2566) en la fuente pese a tener direcciones distintas —
verificar si son dos locales de un mismo dueño o un error de la guía antes
de cargar ambos.*

**Pubs y restobares**

| Nombre | Dirección | Teléfono | Descripción |
|---|---|---|---|
| Baguales Restobar | Av. O'Higgins 545 | 9 8466 0946 | Bebidas, tragos y ambiente nocturno |
| Club Catedral | Bernardo O'Higgins 247 | 9 8206 3132 | Gastropub, coctelería, gastronomía urbana |
| Entre Gallos | Pedro Aguirre Cerda 514 | 9 5863 0894 / 9 8461 5498 | Gastronomía urbana y coctelería |
| Fuente de Soda y Shopería Bukanova | Av. O'Higgins 202 | 9 2065 9682 / 9 2187 1550 | Fuente de soda y shopería tradicional |
| Místico | Pedro Aguirre Cerda 347 | 9 7252 0290 / 9 3770 4160 | Restobar y espacio cultural, ambiente artístico |
| Santo's | Chorrillos 466 | 9 9091 6143 | Hamburguesas artesanales y coctelería |
| Shopería María Victoria | Manuel Bunster 638 | 45 2 711718 / 9 6778 3186 | Restobar y shopería tradicional, cocina casera |
| Sky Restobar | Club Aéreo, Bonilla S/N | 9 5211 3069 / 9 8155 6732 | Platos tradicionales y coctelería |
| Tipo Tranquilo Beer & Bistró | Av. O'Higgins 350, 2° piso | 9 6908 3423 / 9 7389 5733 | Cocina y cervezas, ambiente acogedor |
| Las Totoras | Ilabaca 806 | 9 5234 6197 | Cocina chilena y platos caseros |
| Restaurant Tía Jenny | Manuel Bunster 533 | 9 9820 1328 | Restobar, gastronomía casera, opciones para compartir |
| Aguas Frescas Resto-Bar | Av. O'Higgins 345 | 9 3631 4932 | Coctelería, ambiente relajado |
| Lumbeer Restobar | Arturo Prat #442 | 9 4999 8642 | Tragos, cervezas, picoteo |

## Cultura / historia

- **Museo Histórico Dillman S. Bullock** — museo de arqueología, piezas
  etnográficas y precolombinas (cultura mapuche y pre-mapuche), fauna
  endémica taxidermizada. Ubicación corregida por fuente oficial: **Km 8,
  Centro Turístico El Vergel** (una fuente secundaria decía Km 5 — el
  afiche municipal es más confiable). Horario L–V 08:30–13:00 y
  14:00–16:30.
  Fuente: [Wikipedia](https://es.wikipedia.org/wiki/Museo_Hist%C3%B3rico_Dillman_S._Bullock)
  (vía snippet) · [Registro de Museos de Chile](https://www.registromuseoschile.cl/663/w3-article-93561.html) ·
  [Instagram oficial](https://www.instagram.com/museo.dillman_bullock/) ·
  Afiche oficial "Atractivos Turísticos Nahuelbuta" (Municipalidad de
  Angol).
- **Plaza de Armas de Angol (Plaza Siete Fundaciones / Aníbal Pinto)** —
  espejo de agua rectangular y 4 esculturas de mármol de Virginio Arias
  (1892, representan los continentes); Monumento Nacional desde el
  4/8/1986. Junto a la Iglesia Inmaculada Concepción.
  Fuente: [Consejo de Monumentos Nacionales](https://www.monumentos.gob.cl/monumentos/monumentos-historicos/esculturas-y-espejo-de-agua-ubicadas-en-la-plaza-de-armas-de-angol)
  (vía snippet) · [Wikipedia](https://es.m.wikipedia.org/wiki/Plaza_de_Armas_de_Angol) ·
  confirmado por afiche oficial municipal.
- **Fuerte Cancura (Fuerte de Angol)** — sitio histórico de 1867, junto a la
  ruta hacia Collipulli, terreno municipal; vinculado a la ocupación militar
  de la Araucanía (refundación de Angol, 7/12/1862). Prensa de 2019 reporta
  deterioro del sitio — verificar estado actual antes de publicar como
  atractivo visitable.
  Fuente: [Cooperativa.cl](https://cooperativa.cl/noticias/pais/region-de-la-araucania/denuncian-destruccion-en-fuerte-de-angol-que-data-de-1867/2019-06-02/093901.html).
- **Festival Folclórico "Brotes de Chile"** — +35 años de historia (40°
  edición en 2025); "el festival folclórico más grande de la región" según
  el afiche municipal. Incluye Muestra de Arte Popular en Plaza Siete
  Fundaciones (~40 expositores de artesanía en greda, madera, plata y
  cuero) y feria de las pulgas en Parque Vergara. **Evento anual, no un
  local permanente** — cargar como evento con fecha, no como negocio fijo.
  Fuente: [Araucanía Noticias](https://araucanianoticias.cl/2025/angol-se-prepara-para-los-40-anos-del-festival-brotes-de-chile-una-fiesta-de-identidad-arte-y-tradicion/1106293227) ·
  [Las Noticias de Malleco](https://lasnoticiasdemalleco.cl/informacion-general/feria-de-las-pulgas-de-brotes-de-chile-se-instalara-en-parque-vergara-de-angol-no-mas-de-300-comerciantes/) ·
  Afiche oficial municipal.

### Circuito de museos — fuente oficial (afiche "Atractivos Turísticos Nahuelbuta")

| Museo | Dirección | Descripción |
|---|---|---|
| Museo Histórico Julio Abasolo | Caupolicán #901 | Historia urbana, social y patrimonial de Angol |
| Museo Dillman Bullock | Km 8, Centro Turístico El Vergel | Arqueología, legado del naturalista Dillman Bullock |
| Sala Histórica Regimiento Húsares N°3 | Los Confines N° 330 | Uniformes y objetos de la historia militar del Regimiento |
| Parroquia Inmaculada Concepción | Avenida Manuel Bunster 337 | Templo religioso emblemático, valor histórico y arquitectónico |
| Museo Hermanas Franciscanas | Traiguén 750 | Objetos educativos, litúrgicos y comunitarios de las Hermanas Franciscanas |

### Atractivos naturales y urbanos — fuente oficial

| Atractivo | Ubicación | Descripción |
|---|---|---|
| Centro Turístico El Vergel | Km 8 al este de Angol, ruta a Collipulli | Áreas verdes, incluye el Museo Dillman Bullock y un criadero de plantas ornamentales |
| Parque Alberto Larraguibel | Sector Huequén, Angol | Área verde urbana, recreación y actividades culturales |
| Canteras de Deuco | 8 km al sur de Angol, camino a Los Sauces | Lagunas de aguas tranquilas en antiguos tajos de roca, fotografía y paseos |
| Balneario La Peta | 600 m al oeste de la Plaza de Armas, orillas del río Picoiquén | Balneario de recreación, ribera arbolada |
| Parque Escuela Normal (Vergara) | Costanera Rehue, junto a Universidad La Frontera | Áreas verdes, skatepark, patinódromo, senderos peatonales |

### Sector Maitenrehue — fuente oficial (afiche "Atractivos Turísticos Nahuelbuta")

Sector rural a **40 km al norte de Angol**, con paisajes rurales, bosque
nativo y biodiversidad. Contiene varios atractivos puntuales listados por
el afiche sin dirección exacta (requiere geolocalizar con quien administre
el sector antes de cargar como puntos individuales):

- Salto de la Sabanilla (cascada)
- Zona de Picnic Sector Puente Las Ánimas
- Balneario Maitenrehue
- Capilla de La Candelaria
- Parque Santuario (Lomas del Toro – Sector Roble Bonito)
- Vivero de Copihues "Maitenrehue"
- Viñas y Vinos Artesanales
- Mujeres Productoras de Merkén
- **Rehue (Altar Sagrado Mapuche)** — el elemento de cultura mapuche
  verificable que el plan original pedía y no se había encontrado; sin
  más detalle de ubicación en la fuente, requiere contacto directo con la
  comunidad antes de publicar coordenadas.

También se reporta la presencia estacional de la **luciérnaga chilena**
(*Lamprohiza splendidula*), protagonista de la "Fiesta de las Candelillas"
en los meses cálidos — atractivo de temporada, no cargar como negocio fijo.

Fuente: Afiche oficial "Atractivos Turísticos Nahuelbuta" (Municipalidad de
Angol / Depto. Turismo).

### Angol, capital del Mountain Bike — fuente oficial

- **Parque CMPC Junquillar** (sector Acequias, final calle Colima) —
  escenario de eventos regionales/nacionales de mountain bike: International
  Cup, XCO CMPC Angol, Campeonato Nacional de Downhill Chile.
- **Acequias Paradise** — festival de mountain bike en el sector Las
  Acequias, Junquillar.
- **Raid Angol – Nahuelbuta** — competencia 4x4 desde 1992, organizada por
  el Club Raid Nahuelbuta 4x4 Angol con apoyo municipal; recorridos hacia
  Maitenrehue y Vegas Blancas.

Fuente: Afiche oficial "Atractivos Turísticos Nahuelbuta".

### Atractivos de recreación — fuente oficial (confirma/complementa camping ya listado)

| Atractivo | Ubicación | Descripción |
|---|---|---|
| Piscina Municipal | Complejo Deportivo Alberto Larraguibel Morales | Recreación acuática, temporada de verano |
| Sector Arcadia | Sector Huequén, Ruta R-182 Km 8 | Espacio natural junto al río para descanso |
| Parque Vergara | Av. O'Higgins, costado puente Vergara, Costanera Rehue | Áreas verdes familiares |
| Ciclovía Puente Malleco – ex línea férrea | Hacia Canteras de Deuco | Proyecto de ciclovía, baja dificultad |
| Parque Junquillar | Final calle Colima | Circuitos de ciclismo y senderos, apto niños y adultos |
| Trekking Parque Junquilla | Calle Colima hasta Ruta Las Acequias (R-150-P, km 0) | Senderos de distintos niveles de dificultad |
| Camping El Manzano | Sector El Manzano, 20 km de Angol | Playa natural, ambiente rural |
| Camping Las Quilas | Km 22, Angol–El Manzano | Camping familiar, servicios básicos |

## Turismo aventura

- **Servicios Nahuelbuta (sector Itraque)** — operador creado el
  9/11/2015: rapel en puente ferroviario histórico, rapel en Canteras de
  Deuco, trekking sector Nahuelbuta, cabalgatas sector Itraque, kayak en La
  Arcadia, astroturismo. Tel. +56 9 6313 0618 (confirmado por la fuente
  oficial de abajo).
  Fuente: [borderiodeitraque.cl](https://borderiodeitraque.cl/home-3/) ·
  Afiche oficial "Tour Operadores — Servicios de Transporte Angol 2026"
  (Municipalidad de Angol / Depto. Turismo, Cultura y Deporte).

### Tour operadores — fuente oficial (afiche municipal "Angol 2026")

Aportado directamente por el usuario (no web search): afiche de la Ilustre
Municipalidad de Angol, Departamento de Turismo, Cultura y Deporte, con el
sello de Municipalidad Turística SERNATUR. Sin direcciones — son operadores
que trabajan a pedido/WhatsApp, no locales con local físico fijo. Cargar
como negocios de categoría "Turismo aventura" con `address` vacía o "Angol"
según lo que permita el admin, y coordenadas del centro de Angol solo si el
sistema exige un punto — de lo contrario, mejor esperar a confirmar oficina
física o punto de encuentro real de cada uno antes de ponerles un pin.

| Operador | Teléfono |
|---|---|
| Servicios Nahuelbuta | +56 9 6313 0618 |
| Turismo Weñitours | +56 9 6230 0788 |
| Turismo Piedra del Águila | +56 9 8904 6597 |
| Nahueltour | 45 2 715457 / +56 9 8988 7826 |
| Nahueltrek | +56 9 6814 9431 / +56 9 9854 3632 |
| Nahuelbuta Overland | +56 9 7888 3700 / +56 9 7669 8618 |

*Nota: un tercer afiche oficial ("Atractivos Turísticos Nahuelbuta") lista
2 operadores adicionales — "Turismo piedra del aguila" (9 8904 6597,
coincide) y confirma los mismos 4 restantes — pero da "Weñitour" con tel.
**9 6330 0788**, distinto al 9 6230 0788 de arriba. Confirmar antes de
cargar.*

## Transporte

- **Terminal de Buses de Angol** — Gral. Óscar Bonilla 448 (una fuente dice
  "428" — **confirmar numeración exacta**). Empresas: Turbus, Buses JAC,
  Pullman Bus, Intersur, Pullman Cbeysur, Pullman JC, CruzMar. Destinos:
  Santiago, Victoria, Valdivia, Osorno, Temuco, entre otros. El afiche
  municipal (abajo) confirma que en realidad hay **varios terminales
  distintos en Angol**, no uno solo — probablemente este listado por web
  search corresponde a uno de ellos ("Terminal Rodoviario" es el candidato
  más probable, verificar).
  Fuente: [Kupos](https://kupos.cl/es/terminales-de-buses/terminal-de-buses-de-angol) ·
  [Recorrido.cl](https://www.recorrido.cl/en/bus/terminals/terminal-angol).
- **Buses JAC** — cubre Angol–Temuco (y otras rutas centro-sur), parte del
  grupo Turbus, fundada en 1959. Terminal en Temuco: Balmaceda 1005.
  Fuente: [Kupos](https://kupos.cl/en/bus/tickets/buses-jac).

### Terminales y servicios de transporte — fuente oficial (afiche municipal "Angol 2026")

Mismo afiche municipal que los tour operadores de arriba. Sin direcciones
en la fuente (solo nombre + teléfono) — buscar cada uno en Google Maps al
cargar.

**Terminales de buses**

| Terminal | Teléfono |
|---|---|
| Terminal de Buses Bío Bío | 45 2 464388 |
| Terminal Rodoviario | 45 2 711854 |
| Terminal Rancel Tour | +56 4430 50411 |
| Terminal Rural | 45 2 712021 |
| Buses Nahuelbuta | +56 9 8428 0416 |

*Nota: "Terminal Rancel Tour" comparte teléfono con "Restaurant Rancel
Tour" (Ilabaca 524, ya listado en Cocinerías) — confirma que es un mismo
negocio que combina terminal privado + restaurant, tal como se anotó ahí.*

**Transporte individual / fletes / radiotaxi**

| Servicio | Teléfono |
|---|---|
| Radio taxi — Sr. Óscar Garrido | +56 9 8934 8017 |
| Transporte Rivant | +56 9 9940 6423 / +56 9 7574 1105 |
| Transporte Urra (Sra. Nancy Urra Jara) | +56 9 7609 7250 |
| Buses Aguilera (Sr. Iván Aguilera Godoy) | +56 9 6615 9619 |
| Buses Moncada (Sr. Guillermo Moncada) | +56 9 9419 0033 / 45 2 714090 |
| Edison Castro — Verde Araucano | +56 9 7745 1972 |
| Turismo Salgatur | +56 9 9874 2349 |
| Trascender Transporte y Turismo | +56 9 7582 0128 |

*Nota: el afiche "Atractivos Turísticos Nahuelbuta" repite "Buses
Aguilera" dos veces con teléfonos distintos (9 7609 7250 y 9 6615 9619) —
el primero coincide con "Transporte Urra" de la tabla de arriba, no con
Buses Aguilera. Parece un error de esa fuente (mezcló dos filas); usar los
datos de esta tabla como la versión correcta hasta confirmar por teléfono.*

## Categorías sin datos verificables suficientes

- **Camping** privado (fuera de CONAF/Pehuenco): **actualizado** — ya no
  aplica, ver "Atractivos de recreación" en Cultura/historia: Camping El
  Manzano y Camping Las Quilas son privados/municipales y están
  confirmados por fuente oficial, además de Camping Pehuenco (CONAF) y
  Camping Los Panchos (ver Alojamiento ampliado).
- **Comercio** turístico permanente (souvenirs, productos locales): sin
  hallazgos verificables más allá de la feria estacional "Brotes de Chile"
  y "Artesanía Las Rosas de Nahuelbuta" (Vegas Blancas km 36, ver
  Alojamiento ampliado — venta de artesanía local, no es un evento).
- **Artesanía/cultura mapuche permanente**: **actualizado** — el sector
  Maitenrehue (40 km al norte de Angol, ver Cultura/historia) aporta un
  **Rehue (Altar Sagrado Mapuche)** y "Mujeres Productoras de Merkén",
  ambos sin dirección exacta en la fuente — requieren contacto directo con
  la comunidad de Maitenrehue antes de publicar ubicación. Sigue sin
  encontrarse un centro o feria de artesanía mapuche de funcionamiento
  regular *dentro* de la ciudad de Angol misma.

---

## Cómo cargar esto

1. Para cada ítem, abrí la fuente citada y confirmá que sigue vigente.
2. Buscá la dirección en Google Maps / OpenStreetMap y tomá coordenadas
   reales del pin — no reutilizar un punto genérico "centro de Angol" para
   todos los negocios, generaría un catastro visualmente falso en el mapa.
3. Cargá vía el panel de admin (`business_category_id` según el seeder de
   categorías ya sembrado, `commune_id` = Angol).
4. Los ítems marcados "vía snippet" o "verificar manualmente" conviene
   reconfirmarlos abriendo el link antes de publicar, no tomarlos como
   definitivos.
