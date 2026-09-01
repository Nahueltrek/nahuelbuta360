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

*Nota: "Restaurant Ruiz" (camino al parque) parece un negocio distinto del
"Hotel Ruiz" (Bernardo O'Higgins 331) ya listado en Alojamiento — mismo
apellido, no confirmado si es la misma familia. Verificar antes de cargar
ambos como negocios separados.*

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
