<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Sony PlayStation 5 Slim Chassis D + FIFA 24',
                'description' => "Compra la consola PlayStation 5 Slim Chassis D más el juego EA Sports FC24 y descubre una nueva era de fútbol de nueva generación para The World's Game: más de 19 000 futbolistas con licencia, 700 equipos y 30 ligas en la experiencia futbolística más auténtica hasta la fecha.

                Siente cada partido como nunca antes con tres tecnologías de vanguardia que ofrecen un realismo sin parangón en todos los partidos: HyperMotionV, PlayStyles optimizado por Opta y el nuevo motor de Frostbite.
                
                Mantén tus títulos favoritos listos para jugar con 1 TB de almacenamiento SSD integrado y gracias la integración de sistemas personalizados que permite obtener datos del SSD tan rápidamente para la creación de juegos únicos y exclusivos.
                
                Sumérgete en nuevos mundos con un nuevo nivel de realismo total mientras los rayos de luz se simulan individualmente, creando sombras y reflejos realistas en los juegos gracias a tu televisor o monitor 4K.
                
                Disfruta de un juego fluido con una velocidad de hasta 120 fps en juegos, con soporte para salida de 120 Hz en pantallas 4K y tecnología HDR en donde los juegos de PS5 compatibles muestran una gama de colores increíblemente vibrante y realista.
                
                Déjate envolver por el entorno sonoro, como si el sonido se emitiera en todas direcciones. A través de tus auriculares, altavoces, barra de sonido, etc, tu entorno cobra vida con Tempest 3D AudioTech en los juegos compatibles.
                
                Disfruta de la retroalimentación háptica a través del mando inalámbrico DualSense y siente los efectos y el impacto de tus acciones en el juego a través de la retroalimentación sensorial dinámica.
                
                Descubre botones adaptativos inmersivos, con niveles de resistencia dinámica que simulan el impacto físico de las actividades del juego.
                
                La consola PS5 es compatible con más de 4000 juegos de PS4. Con la función de juego mejorada, puedes incluso disfrutar de velocidades de fotogramas más rápidas y fluidas en algunos de los mejores juegos de la consola de antigua generación.",
                'release_date' => '2024-02-26',
                'developers' => 'Sony',
                'category_id' => 3,
                'genre_id' => null,
                'platform_id' => 6,
                'image_path' => 'console-fifa24-ps5.png',
                'price' => 599.99,
                'stock' => 3
            ],
            [
                'name' => 'Grand Theft Auto 5 PS5',
                'description' => "Compra el juego de Grand Theft Auto V para PS5 y disfruta de toda la potencia de la nueva generación para este superventas con esta increíble remasterización.

                Incluye Grand Theft Auto V: Modo Historia y Grand Theft Auto Online.
                
                Continúa tu aventura en PS5 y transfiere tanto tu progreso en el Modo Historia de GTAV, como tus personajes y progreso de GTA Online a PS5, con una migración única.
                
                Disfruta de los superventas del entretenimiento Grand Theft Auto V y GTA Online, ahora en PlayStation 5.
                
                Cuando un joven estafador callejero, un ladrón de bancos retirado y un psicópata aterrador se ven involucrados con lo peor y más desquiciado del mundo criminal, el gobierno de los EE. UU. y la industria del espectáculo, deberán llevar a cabo una serie de peligrosos golpes para sobrevivir en una ciudad implacable en la que no pueden confiar en nadie. Y mucho menos los unos en los otros.
                
                Disfruta de GTA Online, un universo dinámico y en constante evolución para hasta 30 jugadores, donde podrás pasar de ser un estafador callejero a convertirte en el capo de tu propio imperio criminal.
                
                Los jugadores de PlayStation 5 pueden disfrutar de nuevas mejoras para vehículos de alto rendimiento, del Creador de Profesiones, así como de todas las actualizaciones, expansiones y contenidos de GTA Online actuales y previos, tanto en solitario como con amigos. Lleva a cabo elaborados golpes cooperativos, participa en carreras acrobáticas llenas de adrenalina, compite en Modos Adversario únicos o pasa el tiempo en espacios sociales como clubes nocturnos, salones recreativos, fiestas en el ático, reuniones en el car meet y mucho más.
                
                Explora Los Santos y el condado de Blaine con más nivel de detalle que nunca:
                
                GRÁFICOS IMPRESIONANTES: niveles de fidelidad y rendimiento mejorados, con nuevos modos gráficos que ofrecen resoluciones de hasta 4K, 60 fotogramas por segundo, opciones HDR, trazado de rayos, mejoras en la calidad de las texturas y mucho más.
                
                CARGA MÁS RÁPIDA: entra en la acción rápidamente, ya que el mundo de Los Santos y el condado de Blaine ahora se carga más rápido que nunca.
                
                GATILLOS ADAPTATIVOS Y RESPUESTA HÁPTICA: siente cada momento a través del mando DualSense, desde el daño direccional hasta los efectos atmosféricos, baches en las carreteras, explosiones y mucho más.
                
                SONIDO TEMPEST 3D: oye los sonidos del mundo con una precisión milimétrica, desde la aceleración de un supercoche robado hasta los disparos de un tiroteo cercano, el estruendo de un helicóptero sobre tu cabeza y mucho más.
                
                Además, nuevas mejoras en el mundo en constante evolución de GTA Online, entre las que se incluyen:
                
                NUEVO CONTENIDO EXCLUSIVO: ve a Hao's Special Works en el Car Meet de Los Santos, donde encontrarás nuevas mejoras para vehículos de élite y modificaciones exclusivas. Después, participa con estos vehículos de alto rendimiento en carreras de HSW, contrarrelojes y mucho más.
                
                EL CREADOR DE PROFESIONES: ponte en marcha en GTA Online con las herramientas del oficio. Accede rápidamente a uno de los cuatro negocios ilícitos (Motero, Ejecutivo, Propietario de un club nocturno o Traficante de armas) y elige entre una selección de propiedades, potentes vehículos y armamento para poner en marcha tu negocio.
                
                NUEVO DISEÑO DEL MENÚ: accede al instante a todo lo que te ofrece GTA Online directamente desde el menú principal, incluidas las actualizaciones más recientes y populares.
                
                ACCEDE A TODAS LAS ACTUALIZACIONES ACTUALES Y PREVIAS: sumérgete en más de 40 actualizaciones masivas y las que vendrán, que incluyen desde la búsqueda de los archivos musicales desaparecidos de Dr. Dre con Franklin Clinton en The Contract, hasta las trepidantes carreras callejeras clandestinas de Los Santos Tuners, pasando por golpes en la frondosa isla tropical de Cayo Perico y la vida nocturna de After Hours y The Diamond Casino & Resort. Además, una amplia variedad de carreras, modos, actividades y espacios sociales para disfrutar solo o con amigos, como campos de golf, clubes nocturnos, salones recreativos, salones junto a la piscina y mucho más.",
                'release_date' => '2022-04-12',
                'developers' => 'Rockstar Games',
                'category_id' => 1,
                'genre_id' => 5,
                'platform_id' => 6,
                'image_path' => 'gta-v-ps5.png',
                'price' => 19.99,
                'stock' => 100
            ],
            [
                'name' => 'Bob Esponja: Battle for Bikini Bottom - Rehydrated Xbox One',
                'description' => "Compra Bob Esponja Battle for Bikini Botton o SpongeBob SquarePants Battle for Bikini Bottom – Rehydrated para Playstation 4, Xbox One y Nintendo Switch en GAME y juega como Bob Esponja, Patricio o Arenita y usa sus habilidades únicas y frustra el malvado plan de Plankton para hacerse con Fondo de Bikini con su ejército de alocados robots mientras conoces a los personajes de la amada serie.

                Características:
                 
                
                Un fiel remake de uno de los mejores juegos de Bob Esponja hasta la fecha.
                Una alta calidad visual, resolución moderna y una jugabilidad cuidadosamente pulida.
                Un nuevo modo multijugador con hordas para hasta dos jugadores, online o en pantalla partida. 
                Contenido rescatado que fue quitado del juego original, como la batalla contra Robo Calamardo y mucho más.
                 
                
                ¿Estáis listos, chicos? ¡Vuelve un clásico de culto recreado con todo el esponjoso esplendor del original! Juega como Bob Esponja, Patricio y Arenita y demuéstrale a Plankton que el crimen paga aún menos que el Sr. Cangrejo. SpongeBob SquarePants: Battle for Bikini Bottom - Rehydrated es un videojuego de plataforma basado en la serie animada de Nickelodeon Bob Esponja.
                
                 
                
                El clásico de culto ha vuelto, recreado respetando el esplendor esponjoso del original. Métete en la piel de Bob Esponja, Patricio o Arenita y demuestra al malvado Plankton que el único crimen son sus hamburguesas. ¿Quieres salvar Fondo de Bikini de los robots locos? ¡Pues claro! ¿Hacer puenting en ropa interior? ¡Sí! ¿Unirte al nuevo modo multijugador? Pues ¡a luchar!
                
                 
                
                Características de esta versión
                
                Versión fiel de uno de los mejores juegos de Bob Esponja jamás creado
                Gráficos mejorados, resoluciones adaptadas y una jugabilidad estudiada en profundidad
                Nuevo modo multijugador para dos jugadores, tanto en línea como sin conexión
                Incluye el contenido eliminado del juego original, como la batalla contra Calamardo Robot, y mucho más",
                'release_date' => '2020-06-22',
                'developers' => 'Purple Lamp Studios',
                'category_id' => 1,
                'genre_id' => 2,
                'platform_id' => 9,
                'image_path' => 'sponge-bob-battle-for-bikini-bottom-rehydrated-xboxone.png',
                'price' => 19.95,
                'stock' => 100
            ],
            [
                'name' => 'Prince of Persia The Lost Crown Nintendo Switch',
                'description' => "Compra Prince of Persia The Lost Crown para Nintendo Switch, adéntrate en un emocionante y estilizado juego de plataformas repleto de acción y aventura.

                Viaja por la mitología persa y manipula los límites del espacio y el tiempo. Juega como Sargón y pasa de ser un prodigio de la espada a toda una leyenda a medida que dominas el combate acrobático y desbloqueas nuevos poderes del tiempo y habilidades especiales únicas.
                
                Libera a tu guerrero interior
                Usa tus poderes del tiempo, habilidades de combate y movimientos para ejecutar combos letales y derrotar a criaturas mitológicas y enemigos corrompidos por el tiempo.
                
                Sumérgete en el prodigioso Monte Qaf
                Descubre un mundo maldito lleno de lugares exuberantes inspirado en Persia. Explora una gran variedad de biomas, cada uno con su propia identidad, maravillas y peligros.
                
                Vive una aventura épica
                Sumérgete en una fantasía mitológica persa a través de una historia original y misteriosa, mientras usas tu ingenio para resolver puzles, encontrar tesoros ocultos y cumplir misiones que te permitirán saber más sobre este lugar corrupto.",
                'release_date' => '2024-01-10',
                'developers' => 'Ubisoft Montpellier',
                'category_id' => 1,
                'genre_id' => 2,
                'platform_id' => 13,
                'image_path' => 'prince-of-persia-lost-crown-switch.png',
                'price' => 49.99,
                'stock' => 100
            ],
            [
                'name' => 'Mando Inalámbrico DualSense PS5',
                'description' => "Compra el nuevo mando de Playstation 5 DualSense Blanco, el mando que multiplicará tus sensaciones ofreciendote un nuevo concepto de inmersión. Haz que los mundos de juego cobren vida y empieza a crear nuevos y épicos recuerdos.

                Siente la respuesta táctil capaz de transmitir las acciones del juego con dos activadores que sustituyen a los motores de vibración tradicionales. Cuando lo tienes en las manos, estas vibraciones dinámicas son capaces de simular todo tipo de sensaciones, como los elementos del entorno o el retroceso de diferentes armas.
                
                Gatillos adaptables
                
                Experimenta distintos niveles de fuerza y tensión al interactuar con tu entorno y tu equipo mientras juegas. Ya tenses un arco o pises el freno de un coche de carreras, te sentirás conectado físicamente a las acciones que se desarrollan en pantalla.
                
                Altavoz integrado y conector para auriculares
                
                Charla con tus amigos online con el micrófono integrado o conectando unos auriculares al conector de 3,5 mm. Desactiva fácilmente la captura de voz en cualquier momento con el botón de silenciado específico.
                
                Botón Crear
                
                Captura y transmite tus momentos de juego más épicos con el botón de creación. Basado en el éxito del pionero botón SHARE, el botón 'Crear' ofrece a los jugadores más maneras de producir contenido de juegos y transmitir sus aventuras en directo para que las vea todo el mundo.
                
                Un icono de los videojuegos a tu alcance
                
                Toma el control con un diseño evolucionado de dos tonos que combina la icónica disposición intuitiva con analógicos mejorados y una barra luminosa reinventada.",
                'release_date' => '2020-04-07',
                'developers' => 'Sony',
                'category_id' => 2,
                'genre_id' => null,
                'platform_id' => 6,
                'image_path' => 'controller-white-ps5.png',
                'price' => 71.99,
                'stock' => 100
            ],
            [
                'name' => 'Like a Dragon Ininite Wealth PS5',
                'description' => "Compra Like a Dragon Infinite Wealth para PlayStation 5, disfruta de la vida en Japón y explora todo lo que ofrece Hawái en una aventura tan grande que abarca todo el Pacífico.

                Un drama épico y emotivo
                Dos héroes más grandes que la vida misma se unen guiados por el destino, o quizás, por algo más siniestro… Ichiban Kasuga, un perdedor imparable que sabe lo que es tener que recuperarse después de tocar fondo, y Kazuma Kiryu, un hombre roto que debe enfrentar sus últimos días.
                
                Un RPG de acción de primera categoría
                Experimenta un sistema de combate único con batallas dinámicas y frenéticas de RPG donde el campo de batalla se convierte en tu arma, y en el que todo vale. Adapta las habilidades de tu grupo a la situación con trabajos y personalizaciones esperpénticos para someter estratégicamente a tus enemigos con movimientos excéntricos.
                
                Aventuras infinitas
                Disfruta de la vida en Japón y explora todo lo que ofrece Hawái en una aventura tan grande que abarca todo el Pacífico. Te esperan momentos inolvidables a cada paso con una mezcla única de misiones y actividades que puedes disfrutar a tu ritmo.",
                'release_date' => '2024-01-25',
                'developers' => 'Ryu ga Gotoku',
                'category_id' => 1,
                'genre_id' => 4,
                'platform_id' => 6,
                'image_path' => 'like-a-dragon-infinite-wealth-ps5.png',
                'price' => 69.99,
                'stock' => 100
            ],
            [
                'name' => 'Alone In The Dark XBOX SERIES X',
                'description' => "Compra Alone in the Dark para Xbox, el aclamado juego de terror psicológico se une al gótico sureño en esta reinvención del clásico juego de supervivencia de culto.

                Esta carta de amor al innovador juego original te permite vivir una inquietante historia a través de los ojos de uno de los dos protagonistas. Juega como Edward Carnby o como Emily Hartwood y explora tu entorno, lucha contra monstruos, resuelve puzles y descubre la sórdida verdad de la mansión Derceto…
                
                Estamos en el sur profundo de los años 20, y el tío de Emily Hartwood ha desaparecido. La joven se embarca junto al investigador privado Edward Carnby en un viaje a la mansión Derceto, un hogar para enfermos mentales sobre el que se cierne algo misterioso.
                
                Se encontrará con extraños residentes, reinos de pesadilla, monstruos peligrosos y, en última instancia, descubrirá una trama de intensa maldad. En la intersección de la realidad, el misterio y la locura, te espera una aventura que desafiará tus creencias más íntimas. ¿En quién puedes confiar, en qué creerás y qué harás a continuación?",
                'release_date' => '2024-03-20',
                'developers' => 'Pieces Interactive',
                'category_id' => 1,
                'genre_id' => 2,
                'platform_id' => 10,
                'image_path' => 'alone-in-the-dark-xbox-series-x.png',
                'price' => 59.99,
                'stock' => 100
            ],
            [
                'name' => 'Skull and Bones Special Edition XBOX SERIES X',
                'description' => "Compra Skull & Bones Special Edition para Xbox Series X y adéntrate en la Edad de Oro de la piratería navegando por el Oceano Índico a medida que superas el increíble reto de pasar de ser un marginado a un infame pirata.

                Esta edición Especial incluye:
                 
                
                - Juego base
                - Misión adicional 'El Legado de Hueso Sangriento'
                - Pack 'Alteza de Alta Mar': Atuendo de notoriedad y fuegos artificiales de la Coronación
                 
                
                Características:
                 
                
                Aumenta tu fama y accede a más recursos y oportunidades, embarcándote en misiones cada vez más arriesgadas para conseguir más botín.
                Fabrica hasta 12 barcos y personalízalos con diversas armas y blindajes para aumentar tus probabilidades de éxito.
                Ten cuidado con el indómito mundo abierto inspirado en el océano Índico. Hay depredadores acechando en cada rincón.
                Elige cómo quieres surcar los mares. Navega en solitario o forma equipo con dos amigos para cubriros las espaldas mutuamente en JcE o JcEcJ.
                
                *Debes haber llegado al nivel de infamia Bucanero para acceder a la misión.
                
                 
                
                *Se necesita una cuenta de Xbox y una suscripción a Xbox Live Gold (se venden por separado), además de una conexión estable a Internet y una cuenta de Ubisoft. ",
                'release_date' => '2024-02-13',
                'developers' => 'Ubisoft Singapore',
                'category_id' => 1,
                'genre_id' => 1,
                'platform_id' => 10,
                'image_path' => 'skull-and-bones-special-edition-xbox-series-x.png',
                'price' => 79.99,
                'stock' => 50
            ],
            [
                'name' => 'Batman Arkham Trilogy SWITCH',
                'description' => "Compra Batman Arkham Trilogy y métete en la piel de uno de los superhéroes de DC para hacer frente a los mayores villanos de Gotham City y adéntrate en el mundo de las sombras para acabar con la amenaza definitiva.

                Esta edición incluye:
                 
                
                Los 3 juegos y todos los DLC
                
                Haz frente a los infames supervillanos de DC, como el Joker, el Espantapájaros, Hiedra Venenosa y más en Batman Arkham Asylum.
                
                Adéntrate en las sombras del mundo abierto de Batman Arkham City, el nuevo hogar de máxima seguridad para matones, gánsteres y genios del crimen.
                
                En Batman Arkham Knight recorre las calles de Gotham y acaba con la amenaza definitiva en el final épico de esta trilogía
                
                Disfruta de estas aventuras de acción triple A aclamados por la crítica, con un sistema de juego e historias originales y propias y todo el contenido descargable en un solo paquete.",
                'release_date' => '2023-12-31',
                'developers' => 'Rocksteady Studios',
                'category_id' => 1,
                'genre_id' => 2,
                'platform_id' => 13,
                'image_path' => 'batman-arkham-trilogy-switch.png',
                'price' => 59.99,
                'stock' => 100
            ],
            [
                'name' => 'Farming Simulator 22 Premiun Edition WINDOWS',
                'description' => "Compra Farming Simulator 22: Premium Edition para Ordenador e inicia tu aventura agraria en uno de los cuatro entornos distintivos de Europa y América y enfréntate a la agricultura, la silvicultura y la ganadería.


                El sueño de cualquier granjero se hace realidad con la Edición Premium de Farming Simulator 22: ¡seis mapas y una flota gigantesca de cientos de máquinas auténticas!
                
                
                Tanto principiantes como granjeros veteranos podrán disfrutar de una enorme cantidad de contenido para toda la familia y un sinfín de horas de juego cooperativo y competitivo con esta edición, que incluye el juego base premiado internacionalmente, siete paquetes de contenido oficial y dos expansiones.
                
                También disponible por separado, la Expansión Premium está incluida en edición y te lleva hasta Zielonka, un nuevo entorno situado en Europa Central perfecto para cultivar hortalizas. A la lista de 20 cultivos se añaden la zanahoria, la chirivía y la remolacha roja, además de nuevas fábricas.
                
                 
                
                La Expansión Premium incluye:
                
                
                Más de 35 vehículos y herramientas fielmente digitalizadas con más detalles que nunca. A la serie llegan fabricantes como Dewulf, Gorenc, Agrio y WIFO, y más máquinas de BEDNAR, Fiat, GRIMME, Kverneland, SaMASZ y demás.
                
                
                Esta edición de Farming Simulator 22 también contiene los siguientes paquetes: Pack Antonio Carraro, Pack Kubota, Pack Vermeer, Pack Göweil, Pack Heno y Forraje y otros dos paquetes por anunciar.
                
                
                Además, también incluye la Expansión Platino, que se centra en la silvicultura e introdujo en la serie marcas como Volvo, mecánicas de juego, un mapa nuevo y más novedades.
                
                 
                
                Características:
                
                Contenido de la Edición Premium: juego + 7 paquetes + 2 expansiones.
                Novedades: la Expansión Premium introduce cultivos, un mapa y máquinas.
                Incluye el contenido del Año 1 y Año 2.",
                'release_date' => '2021-11-21',
                'developers' => 'GIANTS Software',
                'category_id' => 1,
                'genre_id' => 6,
                'platform_id' => 1,
                'image_path' => 'farming-simulator-22-pc.png',
                'price' => 39.99,
                'stock' => 50
            ],
            [
                'name' => 'Sifu XBOX SERIES X',
                'description' => "Compra el juego de SIFU para la consola Xbox. ¿Basta una vida para aprender kung fu?. SIFU es la historia de un joven estudiante de kung fu que persigue a los asesinos de su familia en busca de venganza.

                Solo contra todos, tendrá que enfrentarse a incontables enemigos sin aliados. Deberá confiar en su dominio del kung fu y en un misterioso colgante para sobrevivir y preservar el legado de su familia.
                
                Características:
                
                En busca de venganza
                La persecución de tus enemigos te llevará a los rincones más escondidos de la ciudad, desde los suburbios plagados de bandas criminales hasta los fríos pasillos de las torres corporativas. Tienes un día y un sinfín de enemigos
                
                La adaptación es clave
                Elegir bien la posición y el uso inteligente del entorno en tu beneficio son la clave de la supervivencia. Usa todo lo que tengas a tu disposición: objetos arrojadizos, armas improvisadas, ventanas y cornisas... La suerte no está a tu favor y no tendrán piedad contigo
                
                El entrenamiento nunca termina
                El kung fu se domina a través de la práctica y es una senda que deberán recorrer el cuerpo y la mente. Aprende de tus errores, desbloquea habilidades especiales y encuentra la fuerza en tu interior para dominar las devastadoras técnicas del kung fu Pak-Mei.",
                'release_date' => '2021-05-03',
                'developers' => 'Sloclap, H2 Interactive',
                'category_id' => 1,
                'genre_id' => 3,
                'platform_id' => 10,
                'image_path' => 'sifu-xbox-series-x.png',
                'price' => 39.99,
                'stock' => 100
            ],
            [
                'name' => 'JOY-CON (SET IZDA/DCHA) MORADO - VERDE',
                'description' => "Un mando o dos, en vertical o en horizontal, control por movimiento o mediante botones… Con los nuevos mandos Joy-Con para Nintendo Switch tendrás flexibilidad total a la hora de jugar y descubrirás nuevas formas de interactuar que transformarán por completo tus experiencias de juego.

                Su diseño incluye la sofisticada función de vibración HD, que ofrece una vibración mucho más realista que antes, y permite utilizar uno en cada mano o compartirlos con un amigo; además de poder incorporarlos al armazón para controles Joy-Con (venta por separado) que los transformará en un mando de estilo tradicional. Cada Joy-Con contiene sus propios botones, sensor de acelerómetro y sensor de movimiento que posibilita que puedan funcionar como un mando independiente.
                
                Además, los Joy-Con integran nuevas prestaciones que hacen de Nintendo Switch más interactiva. Por un lado, el Joy-Con izquierdo tiene un botón de captura para hacer capturas de pantalla durante tus partidas y compartirlas a través de las redes sociales. El Joy-Con derecho, por su parte, dispone de un punto NFC para usar figuras amiibo, así como una cámara infrarroja de movimiento que detecta la distancia, forma y movimiento de objetos cercanos en los juegos diseñados para esta tecnología.",
                'release_date' => '2023-06-30',
                'developers' => 'Nintendo',
                'category_id' => 2,
                'genre_id' => null,
                'platform_id' => 13,
                'image_path' => 'controller-pink-green-switch.png',
                'price' => 79.99,
                'stock' => 50
            ],
            [
                'name' => 'AURICULARES FR-TEC TYPHOON RGB PC-PS5-PS4-XSX-XONE-NSW',
                'description' => "Compra el Gaming Headset Typhoon desarrollado y lanzado por FR-TEC el periférico gaming de la marca que destaca por sus prestaciones superiores, ofreciendo comodidad para largas sesiones de juego.

                Contiene luz LED, control de volumen y mute integrado en el cable.
                
                Características
                 
                
                Auricular ligero y cómodo: Admiten largas sesiones de juego gracias a las almohadillas transpirables.
                Altavoz de 40mm: Elevada calidad de sonido.
                Jack de 3,5mm y USB 2.0: Facilidad de conexión. Plug and Play.",
                'release_date' => null,
                'developers' => null,
                'category_id' => 5,
                'genre_id' => null,
                'platform_id' => null,
                'image_path' => 'auriculares-fr-tec-rgb.png',
                'price' => 14.99,
                'stock' => 50
            ],
            [
                'name' => "SAMSUNG LF27T450FZU 27'' LED FULL HD",
                'description' => "Samsung LF27T450FZU. Diagonal de la pantalla: 68,6 cm (27''), Resolución de la pantalla: 1920 x 1080 Pixeles, Tipo HD: Full HD, Tecnología de visualización: LED, Tiempo de respuesta: 5 ms, Relación de aspecto nativa: 16:9, Ángulo de visión, horizontal: 178°, Ángulo de visión, vertical: 178°. Altavoces incorporados. Conector USB incorporado, Versión de conector USB: 2.0. montaje VESA, Ajustes de altura. Color del producto: Negro",
                'release_date' => null,
                'developers' => 'Samsung',
                'category_id' => 6,
                'genre_id' => null,
                'platform_id' => null,
                'image_path' => 'monitor-samsung-LF27T450FZU-27.png',
                'price' => 144.99,
                'stock' => 50
            ],
            [
                'name' => 'IPHONE 12 128GB NEGRO',
                'description' => "Más allá de la velocidad. Tecnología 5G. Chip A14 Bionic, el más veloz en un smartphone. Pantalla OLED de borde a borde. Ceramic Shield, cuatro veces más resistente a las caídas. Modo Noche en cada una de las cámaras. Y dos tamaños: ideal y perfecto. Sí, el iPhone 12 lo tiene todo.

 

                Ceramic Shield. Más duro que cualquier vidrio de smartphone. Cuatro veces más resistente a las caídas.
                
                Velocidad 5G OMGGGGG. Con la conexión 5G, el iPhone no corre, vuela. Lo notarás al descargar pelis fuera de casa, reproducir vídeos a máxima calidad o usar FaceTime HD tirando de datos. Todo con mucha menos latencia. Podrás hacer eso y lo que quieras en muchos más sitios porque el iPhone 12 tiene la mayor cobertura en el mundo entero.4 El iPhone sabe aprovechar al máximo el 5G.
                
                 
                
                El chip A14 Bionic es el más veloz en un smartphone. Supera cualquier expectativa con su capacidad de procesar billones de operaciones en el Neural Engine o de grabar en Dolby Vision, algo que ni las cámaras profesionales pueden hacer. Además tiene una alta eficiencia energética que asegura una gran duración de la batería. Es un chip revolucionario, preparado para prácticamente todo lo que nos depara el futuro.
                
                 
                
                La mejor pantalla de iPhone hasta la fecha. Un contraste infinitamente superior. Una precisión cromática asombrosa. Un paso de gigante en la densidad de píxeles.5 Es que no has visto cosa igual. Con la tecnología OLED, los blancos son más brillantes, los negros, más intensos y la resolución, altísima en todo. Es la mejor pantalla de iPhone que existe, el resultado de llevar la innovación al límite.
                
                 
                
                Sistema de Cámara Dual, pásate al Oscuro. Ahora el modo Noche funciona también con el gran angular y el ultra gran angular. Pero eso no es todo. También lo hemos mejorado para que puedas hacer fotazas incluso en la penumbra. Como el nuevo gran angular deja pasar un 27 % más de luz, obtendrás mayor detalle y un color sin precedentes a cualquier hora, madrugues o trasnoches.
                
                 
                
                El modo Noche sabe cuándo escasea la iluminación ambiental y se activa automáticamente, manteniendo la claridad y mostrando unos colores que brillan con luz propia. Tú disparas y listo. Esas escenas que antes eran difíciles de fotografiar, como un cielo nublado a la luz de la luna, tienen ahora una nitidez impresio­nante.
                
                 
                
                Deep Fusion entra en acción en ambientes con poca luz o en penumbra, y analiza las distintas exposiciones para componer la foto más detallada posible. Fíjate en la textura de la madera, el tejido y el cristal. Para rematar, el ultra gran angular te ofrece unas perspectivas de vértigo.
                
                 
                
                Magia Automática. El HDR Inteligente 3 equilibra los elementos de la foto: aquí, por ejemplo, resalta los detalles del protagonista y de los árboles, y mantiene el color intenso del cielo, incluso cuando el sol está más alto.
                
                 
                
                Incluso a plena luz del día, el HDR Inteligente reproduce con un realismo pasmoso las texturas, los tonos de piel, la saturación del color y hasta el más mínimo detalle de la imagen.
                
                 
                
                Gracias al aprendizaje automático, el HDR Inteligente reconoce no solo caras, sino también escenas, y retoca la nitidez, el color y el balance de blancos donde haga falta.
                
                 
                
                Modo Retrato. Nadie te mira con tan buenos ojos. El modo Retrato da un toque artístico a tus fotos difuminando el fondo para resaltar al protagonista. El resultado es espectacular. Pasa de fotos a fotones con alguno de los seis efectos de iluminación, como Luz en Clave Alta Mono, Luz Natural y Luz de Estudio.
                
                 
                
                Vídeo, Fuera luces, Cámara y Acción. ¿Cómo mejorar la máxima calidad de vídeo en un smartphone? Fácil: con una resolución un 27 % superior cuando hay poca luz. Eso significa que puedes grabar vídeos sin miedo a que caiga el sol. Por si eso fuera poco, el modo Noche también funciona con time-lapse. Deja el iPhone fijo en un lugar y que las luces hagan su magia.
                
                 
                
                En tu bolsillo caben unos estudios de cine. Ahora puedes grabar un vídeo en 4K HDR con Dolby Vision, editarlo en Fotos o iMovie y enviarlo a la tele por AirPlay6 para verlo con todo lujo de detalles. Es una experiencia cinematográfica de principio a fin y solo está disponible en el iPhone. Verás qué útil cuando tu perro haga esas monerías suyas.
                
                 
                
                Selfies con modo Noche. Nada te hace sombra. ¿El mejor momento para hacerse selfies? Después del atardecer, por supuesto. Ahora la cámara frontal tiene modo Noche, Deep Fusion, HDR Inteligente 3, grabación en Dolby Vision y mucho más. Te verás espectacular incluso a oscuras.
                
                 
                
                Accesorios MagSafe, Todo hace clic. Ponle una funda o una cartera con MagSafe. O ambas cosas. Y no te preocupes: la cartera tiene una protección que impide que la banda de las tarjetas de crédito se desmagnetice.
                
                 
                
                Carga exprés.Los imanes se alinean siempre a la perfección para ofrecerte una carga inalámbrica ultrarrápida.",
                'release_date' => '2020-10-13',
                'developers' => 'Apple',
                'category_id' => 7,
                'genre_id' => null,
                'platform_id' => null,
                'image_path' => 'iphone-12-128gb-negro.png',
                'price' => 499.99,
                'stock' => 30
            ]
        ];

        /*
            [
                'name' => '',
                'description' => "",
                'release_date' => '',
                'developers' => '',
                'category_id' => ,
                'genre_id' => ,
                'platform_id' => ,
                'image_path' => 'storage/images/products/',
                'price' => ,
                'stock' =>
            ]
        */

        foreach ($products as $product) {
            Product::create([
                'name'         => $product['name'],
                'description'  => $product['description'],
                'release_date' => $product['release_date'],
                'developers'   => $product['developers'],
                'category_id'  => $product['category_id'],
                'genre_id'     => $product['genre_id'],
                'platform_id'  => $product['platform_id'],
                'image_path'   => $product['image_path'],
                'price'        => $product['price'],
                'stock'        => $product['stock'],
            ]);
        }
    }
}
