# Catastro real — Angol, Región de La Araucanía

Catastro piloto de negocios y atractivos para Nahuelbuta 360, comuna de Angol.
Investigado vía búsqueda web con fuentes verificables (misma disciplina que
Cajón del Maipo: **nada inventado**).

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
  bosques de araucaria milenaria. Administración/camping en sector Pehuenco.
  Distancia desde Angol: **34–42 km según la fuente** (discrepancia sin
  zanjar, camino de tierra). Horario 9:00–18:00. Contacto:
  parque.nahuelbuta@conaf.cl.
  Fuente: [CONAF](https://www.conaf.cl/parques/parque-nacional-nahuelbuta/)
  (vía snippet, no fetch directo).
  Coordenadas: no verificadas por fetch directo (Wikipedia reporta
  37°47′00″S 72°59′00″W vía snippet — reconfirmar).
- **Sendero Piedra del Águila** — circuito 4,5 km desde el camping hasta el
  mirador homónimo, bosque de ñirre/coihue/araucaria/lenga, apto todo público.
  Fuente: [Andeshandbook](https://www.andeshandbook.org/senderismo/ruta/575/Piedra_del_Aguila)
  (vía snippet).
- **Sendero Casa de Piedra** — conecta la entrada Oeste del parque con Piedra
  del Águila.
  Fuente: [Chile Es Tuyo](https://chileestuyo.cl/parque-nacional-nahuelbuta-y-sus-senderos/)
  (vía snippet).
- **Sendero Cerro Anay** — 5 km, ~3 h ida/vuelta, todo público.
  Misma fuente que el anterior.
- **Sendero Estero Los Gringos** — hacia el Cerro Anay (1.378 msnm).
  Misma fuente.
- **Sendero interpretativo "El Camino del Árbol"** — 200 m autoguiado, 12
  estaciones, bosque nativo. Misma fuente.
- **Camping Pehuenco (CONAF)** — 10 sitios, mesas, fogones, baños rústicos,
  agua; abierto todo el año. Fuente: snippet CONAF/Cañete Turístico.

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

## Gastronomía

- **El Quincho de Manolo** — cocina chilena, "picada" reconocida, música en
  vivo, decoración con reliquias; mérito turístico (mención gastronomía) de
  Angol, 3° mejor picada de La Araucanía según reseñas, #3 de 23 restaurantes
  de Angol en Tripadvisor. Julio Sepúlveda #645, Angol. Tel. +56 9 4047 6589.
  Fuente: [Tripadvisor](https://www.tripadvisor.com/Restaurant_Review-g2444676-d5990145-Reviews-El_Quincho_de_Manolo-Angol_Araucania_Region.html) ·
  [SERNATUR](https://serviciosturisticos.sernatur.cl/12662-el-quincho-de-angol).
- **Ristorante La Vecchia Signora** — italiano, 27 reseñas, valorado como el
  mejor italiano de Angol por usuarios. Dirección no verificada.
  Fuente: [Tripadvisor — Restaurantes en Angol](https://www.tripadvisor.com/Restaurants-g2444676-Angol_Araucania_Region.html).
- **Restaurante Dublé** — pizzería, 19 reseñas, $$-$$$. Misma fuente.
- **Pastelería Garrido** — café chileno, 19 reseñas. Misma fuente.

## Cultura / historia

- **Museo Histórico Dillman S. Bullock** — museo privado, piezas
  etnográficas y arqueológicas precolombinas (cultura mapuche y
  pre-mapuche), fauna endémica taxidermizada; 3 salas. KM 5 camino
  Angol–Collipulli, sector El Vergel. Horario L–V 08:30–13:00 y 14:00–16:30.
  Fuente: [Wikipedia](https://es.wikipedia.org/wiki/Museo_Hist%C3%B3rico_Dillman_S._Bullock)
  (vía snippet) · [Registro de Museos de Chile](https://www.registromuseoschile.cl/663/w3-article-93561.html) ·
  [Instagram oficial](https://www.instagram.com/museo.dillman_bullock/).
- **Plaza de Armas de Angol (Plaza Siete Fundaciones / Aníbal Pinto)** —
  espejo de agua rectangular y 4 esculturas de mármol de Virginio Arias
  (1892, representan los continentes); Monumento Nacional desde el
  4/8/1986. Junto a la Iglesia Inmaculada Concepción.
  Fuente: [Consejo de Monumentos Nacionales](https://www.monumentos.gob.cl/monumentos/monumentos-historicos/esculturas-y-espejo-de-agua-ubicadas-en-la-plaza-de-armas-de-angol)
  (vía snippet) · [Wikipedia](https://es.m.wikipedia.org/wiki/Plaza_de_Armas_de_Angol).
- **Fuerte Cancura (Fuerte de Angol)** — sitio histórico de 1867, junto a la
  ruta hacia Collipulli, terreno municipal; vinculado a la ocupación militar
  de la Araucanía (refundación de Angol, 7/12/1862). Prensa de 2019 reporta
  deterioro del sitio — verificar estado actual antes de publicar como
  atractivo visitable.
  Fuente: [Cooperativa.cl](https://cooperativa.cl/noticias/pais/region-de-la-araucania/denuncian-destruccion-en-fuerte-de-angol-que-data-de-1867/2019-06-02/093901.html).
- **Festival Folclórico "Brotes de Chile"** — +35 años de historia (40°
  edición en 2025); incluye Muestra de Arte Popular en Plaza Siete
  Fundaciones (~40 expositores de artesanía en greda, madera, plata y
  cuero) y feria de las pulgas en Parque Vergara. **Evento anual, no un
  local permanente** — cargar como evento con fecha, no como negocio fijo.
  Fuente: [Araucanía Noticias](https://araucanianoticias.cl/2025/angol-se-prepara-para-los-40-anos-del-festival-brotes-de-chile-una-fiesta-de-identidad-arte-y-tradicion/1106293227) ·
  [Las Noticias de Malleco](https://lasnoticiasdemalleco.cl/informacion-general/feria-de-las-pulgas-de-brotes-de-chile-se-instalara-en-parque-vergara-de-angol-no-mas-de-300-comerciantes/).

## Turismo aventura

- **Servicios Nahuelbuta (sector Itraque)** — operador creado el
  9/11/2015: rapel en puente ferroviario histórico, rapel en Canteras de
  Deuco, trekking sector Nahuelbuta, cabalgatas sector Itraque, kayak en La
  Arcadia, astroturismo. **Verificar el sitio manualmente** antes de
  publicar datos de contacto (fetch no confirmó lectura completa).
  Fuente: [borderiodeitraque.cl](https://borderiodeitraque.cl/home-3/).

## Transporte

- **Terminal de Buses de Angol** — Gral. Óscar Bonilla 448 (una fuente dice
  "428" — **confirmar numeración exacta**). Empresas: Turbus, Buses JAC,
  Pullman Bus, Intersur, Pullman Cbeysur, Pullman JC, CruzMar. Destinos:
  Santiago, Victoria, Valdivia, Osorno, Temuco, entre otros.
  Fuente: [Kupos](https://kupos.cl/es/terminales-de-buses/terminal-de-buses-de-angol) ·
  [Recorrido.cl](https://www.recorrido.cl/en/bus/terminals/terminal-angol).
- **Buses JAC** — cubre Angol–Temuco (y otras rutas centro-sur), parte del
  grupo Turbus, fundada en 1959. Terminal en Temuco: Balmaceda 1005.
  Fuente: [Kupos](https://kupos.cl/en/bus/tickets/buses-jac).

## Categorías sin datos verificables suficientes

- **Camping** privado (fuera de CONAF/Pehuenco): no se encontró ninguno con
  fuente independiente confiable en Angol o alrededores.
- **Comercio** turístico permanente (souvenirs, productos locales): sin
  hallazgos verificables más allá de la feria estacional "Brotes de Chile".
- **Artesanía/cultura mapuche permanente** (centro o feria activa todo el
  año en la comuna de Angol): no se encontró — sí hay ferias mapuche en
  otras comunas (Cañete, Osorno, Villarrica) pero quedan fuera del alcance
  del piloto (Angol).

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
