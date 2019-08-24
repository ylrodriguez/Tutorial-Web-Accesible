-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2016 at 07:19 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arqtutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `leccion_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `user_id`, `leccion_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(38, 1, 10, 'La lección número dos ya se encuentra disponible. Espero que lo vean y dejen sus opiniones.', '2016-04-13 01:58:15', '2016-06-13 01:58:15'),
(39, 1, 9, 'La primer lección del tutorial de arquitectura de celulares ya se encuentra disponible. Espero que lo vean y dejen sus opiniones.', '2016-04-14 01:59:00', '2016-06-13 01:59:00'),
(43, 1, 11, 'La lección número tres ya se encuentra disponible. Espero que lo vean y dejen sus opiniones.', '2016-04-14 02:09:20', '2016-06-13 02:09:20'),
(44, 1, 12, 'La lección número cuatro ya se encuentra disponible. Espero que lo vean y dejen sus opiniones.', '2016-04-15 03:42:48', '2016-06-13 03:42:48'),
(45, 1, 13, 'La lección número cinco ya se encuentra disponible. Espero que lo vean y dejen sus opiniones.', '2016-04-16 03:42:57', '2016-06-13 03:42:57'),
(46, 2, 9, 'Buen aporte!', '2016-04-16 04:11:01', '2016-06-13 04:11:01'),
(47, 2, 10, 'Excelente video', '2016-04-16 04:11:10', '2016-06-13 04:11:10'),
(48, 2, 11, 'La tecnología EDGE es bastante interesante.', '2016-04-17 04:11:31', '2016-06-13 04:11:31'),
(49, 2, 12, 'Asi se me daño mi ultimo celular.', '2016-04-19 04:12:04', '2016-06-13 04:12:04'),
(50, 2, 13, 'Bastante útil, pronto vendrá la segunda serie de videos.', '2016-04-20 04:12:41', '2016-06-13 04:12:41'),
(51, 1, 12, 'Lo siento mucho por eso jaja.', '2016-04-23 04:13:09', '2016-06-13 04:13:09'),
(52, 3, 9, 'Este curso se ve bastante interesante', '2016-04-23 04:14:31', '2016-06-13 04:14:31'),
(53, 3, 11, 'Totalemente de acuerdo', '2016-04-24 04:16:54', '2016-06-13 04:16:54'),
(54, 4, 9, 'Gracias por el material compartido. Espero con ansias el siguiente video.', '2016-04-26 04:18:04', '2016-06-13 04:18:04'),
(55, 4, 10, 'Espero con ansias el próximo video!', '2016-04-29 04:18:34', '2016-06-13 04:18:34'),
(56, 4, 11, 'Bastante util el material compartido.', '2016-05-03 04:19:19', '2016-06-13 04:19:19'),
(57, 5, 9, 'Mi primer video, muchas gracias por la adaptación de la página a propósito.', '2016-05-13 04:20:26', '2016-06-13 04:20:26'),
(58, 5, 10, 'Gracias por el video.', '2016-05-19 04:21:03', '2016-06-13 04:21:03'),
(59, 5, 10, 'Gracias por el video.', '2016-05-19 04:21:03', '2016-06-13 04:21:03'),
(60, 5, 11, 'GSM termino que hay que analizar de fondo', '2016-05-20 04:21:57', '2016-06-13 04:21:57'),
(61, 7, 9, 'Que buen sitio', '2016-05-20 04:55:36', '2016-06-13 04:55:36'),
(62, 7, 11, 'Me encanta que provee los subtitulos ayuda demasiado', '2016-06-04 04:55:52', '2016-06-13 04:55:52'),
(63, 7, 13, 'Termine la primera sesión por favor notificarme cuando salga la segunda parte', '2016-06-05 04:56:08', '2016-06-13 04:56:08'),
(64, 9, 9, 'Voy a empezar con el tutorial, espero que sea interesante', '2016-06-05 04:56:47', '2016-06-13 04:56:47'),
(65, 10, 9, 'Gracias infinitas', '2016-06-06 04:57:40', '2016-06-13 04:57:40'),
(66, 10, 10, 'Saludos', '2016-06-09 04:57:48', '2016-06-13 04:57:48'),
(67, 10, 12, 'Genial!', '2016-06-09 04:57:55', '2016-06-13 04:57:55'),
(68, 17, 10, 'Falle solo una respuesta en la evaluacion', '2016-06-08 05:05:25', '2016-06-13 05:05:25'),
(69, 17, 11, 'Genial genial genial! La adaptacion de la pagina', '2016-06-09 05:05:57', '2016-06-13 05:05:57'),
(70, 12, 9, 'Gran proyecto', '2016-06-13 05:06:34', '2016-06-13 05:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`id`, `titulo`, `descripcion`, `imagen`, `created_at`, `updated_at`) VALUES
(3, 'Arquitectura de celulares', 'Curso básico de la arquitectura de celulares actuales. Este curso comenzará explicando qué es y como es la arquitectura de un celular.', 'arquitecturadecelulares1457037025.jpg', '2016-02-29 04:16:33', '2016-05-03 20:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `leccion_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evaluaciones`
--

INSERT INTO `evaluaciones` (`id`, `leccion_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(9, 10, 'Se evaluaran los conceptos aprendidos en la lección número dos.', '2016-06-13 03:48:23', '2016-06-13 03:48:23'),
(10, 9, 'Se evaluaran los conceptos aprendidos en la lección número uno.', '2016-06-13 03:49:53', '2016-06-13 03:49:53'),
(11, 11, 'Se evaluaran los conceptos aprendidos en la lección número tres.', '2016-06-13 03:49:58', '2016-06-13 03:49:58'),
(12, 12, 'Se evaluaran los conceptos aprendidos en la lección número cuatro.', '2016-06-13 03:50:06', '2016-06-13 03:50:06'),
(13, 13, 'Se evaluaran los conceptos aprendidos en la lección número cinco.', '2016-06-13 03:50:12', '2016-06-13 03:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `lecciones`
--

CREATE TABLE `lecciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `teoria` text COLLATE utf8_unicode_ci NOT NULL,
  `linkvideo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lecciones`
--

INSERT INTO `lecciones` (`id`, `curso_id`, `titulo`, `descripcion`, `teoria`, `linkvideo`, `slug`, `created_at`, `updated_at`) VALUES
(9, 3, 'Introducción', '¿Estas interesado en iniciar en un campo de alta demanda laboral?, te invitamos a participar del Arquitectura de Teléfonos Celulares a Distancia.   ', '<p><strong>¿Cómo funciona este Sistema?</strong></p><br><p>Desarrollamos una serie de capítulos en los cuales podrás aprender todo lo necesario para poder iniciar en este apasionante campo de la Telefonía Celular. &nbsp;</p><p>Este curso no requiere requisitos previos ya que nuestro programa apunta a un Sistema, desde CERO, te explicaremos todo lo necesario que debes saber antes de proceder a desarmar el primer teléfono.</p><p>Solo requieres de ganas de aprender e invertir un poco de tiempo para ello.</p><p>Y si ya tienes experiencia en esto, podrás ampliar tus conocimientos ya que desarrollamos diferentes TIPs desde lo más simple a lo más complejo de una falla.</p><p>Sin más tiempo que perder, iniciemos el curso ahora!</p>&nbsp;<br><p><strong>¿Qué herramientas necesito para empezar?</strong></p><br><p>Las herramientas se dividen en dos grupos, las necesarias para reparaciones a nivel de hardware y las herramientas necesarias para reparaciones a nivel de software.</p>', 'h8DA_aLqk58', 'introduccion', '2016-04-23 01:28:16', '2016-06-13 01:34:28'),
(10, 3, 'Herramientas', 'Las herramientas se dividen en dos grupos, las necesarias para reparaciones a nivel de hardware y las herramientas necesarias para reparaciones a nivel de software.\r\n', '<p class="MsoNormal" style="line-height: 21.4286px;"><span style="line-height: 1.42857;">Multímetro: Sirve para medir el voltaje de corriente, resistencia y continuidad eléctrica. Se compone de cables con punta, bornes de conexión, perilla y pantalla.</span><br><o:p></o:p></p><p class="MsoNormal" style="line-height: 21.4286px;">Estación de soldadura: Se usa para retirar integrados de las tarjetas de los celulares, tablets o cualquier aparato electrónico.<o:p></o:p></p><p class="MsoNormal" style="line-height: 21.4286px;">Microscopio digital USB: Esta herramienta genera una imagen real aumentada del objeto, ideal para reparaciones de circuitos pequeños como los de un celular. El microscopio digital viene con su respectivo software para observarla imagen en el computador<o:p></o:p></p><p class="MsoNormal" style="line-height: 21.4286px;">Fuente de alimentación regulable: Nos permite encender teléfonos que no cuentan con la batería, despegar baterías, identificar cortocircuitos, entre otras cosas.<o:p></o:p></p><p class="MsoNormal" style="line-height: 21.4286px;">Juego de destornilladores de precisión: Es una herramienta que se utiliza para apretar y aflojar tornillos y otros elementos de máquinas que requieren poca fuerza de apriete y que generalmente son de diámetro pequeño.<o:p></o:p></p><p class="MsoNormal" style="line-height: 21.4286px;">Pinzas:&nbsp; Son&nbsp; muy&nbsp; importantes&nbsp;&nbsp; para&nbsp; poder&nbsp; coger elementos&nbsp; pequeños&nbsp; y en&nbsp; el&nbsp; proceso&nbsp; de soldado&nbsp;&nbsp; nos&nbsp; ayudan&nbsp; mucho también&nbsp; con los&nbsp; componentes&nbsp; que están&nbsp; muy&nbsp; calientes.<o:p></o:p></p><p class="MsoNormal" style="line-height: 21.4286px;">Cautín&nbsp; o&nbsp; soldador: Con el&nbsp; cautín&nbsp; ya empezamos&nbsp; a corregir ciertas fallas&nbsp; tales&nbsp; como&nbsp; soldar&nbsp; componentes&nbsp; que estén despegados,&nbsp; cambiar&nbsp; micrófonos, parlantes, entre otras cosas.<o:p></o:p></p><p class="MsoNormal" style="line-height: 21.4286px;">Cajas de liberación: Sirven para reparaciones vía computadora de celulares; se emplean para liberar, flashear y en algunos casos para reparar el imei de los teléfonos celulares que han sido dañados.<o:p></o:p></p><p class="MsoNormal" style="line-height: 21.4286px;">Cable de datos: Es un cable que permita transferir información de un dispositivo a otro. Usualmente se utiliza para hacer referencia al cable que conecta el teléfono móvil con la computadora</p>', 'VCdTDZakgPA', 'herramientas', '2016-04-13 01:54:59', '2016-06-13 01:57:27'),
(11, 3, 'Conceptos básicos', 'Aquí se discutirá la terminología más común que se utiliza para identificar importantes aspectos o componentes que necesitas conocer de tu teléfono celular.', '<p class="MsoNormal"><strong>¿Qué es el celular?</strong></p><p class="MsoNormal"><strong>Dispositivo electrónico que permite realizar múltiples operaciones de forma inalámbrica en cualquier lugar donde tenga señal.</strong></p><p class="MsoNormal"><strong>Entre las múltiples operaciones se incluyen la realización de llamadas telefónicas, navegación por internet, envío de mensajes de texto (SMS), captura de fotos y sonidos, reloj, agenda, realización de pagos, etc.</strong></p><p class="MsoNormal"><strong>Aplicación</strong></p><p class="MsoNormal"><strong>Es un software que es creado para correr en dispositivos móviles. Existen tres tipos de aplicación: Web app, App nativas, Web App nativa.</strong></p><p class="MsoNormal"><strong>App nativas</strong></p><p class="MsoNormal"><strong>Una aplicación nativa es la que se desarrolla de forma específica para un determinado &nbsp;sistema operativo, llamado Software Development Kit o SDK, para cada una de las plataformas, Android, iOS o Windows Phone, entre otros</strong></p><p class="MsoNormal"><strong>Web app</strong></p><p class="MsoNormal"><strong>Una aplicación web o webapp es la desarrollada con lenguajes muy conocidos por los programadores, como es el HTML, Javascript y CSS. La principal ventaja con respecto a la nativa es la posibilidad de programar independiente del sistema operativo en el que se usará la aplicación.</strong></p><p class="MsoNormal"><strong>Web App nativa</strong></p><p class="MsoNormal"><strong>Una aplicación híbrida es una combinación de las dos anteriores, se podría decir que recoge lo mejor de cada una de ellas. Las apps híbridas se desarrollan con lenguajes propios de las Web App, es decir, HTML, Javascript y CSS por lo que permite su uso en diferentes plataformas, pero también dan la posibilidad de acceder a gran parte de las características del hardware del dispositivo.</strong></p><p class="MsoNormal"><strong>Bluetooth</strong></p><p class="MsoNormal"><strong>Es una tecnología inalámbrica que admite conectar dispositivos en distancias cortas sin cables, usados frecuentemente para transmitir información entre ellos. Un ejemplo son los auriculares Bluetooth que permiten hablar por el celular sin usar las manos.</strong></p><p class="MsoNormal"><strong>EDGE</strong></p><p class="MsoNormal"><strong>Es el acrónimo de Enhanced Data GSM Environment. Es la versión más rápida del GSM, diseñado para alcanzar velocidades de hasta 384 kilobites por segundo (Kbps). Actua como puente entre las redes de segunda y tercera generación de la tecnología móvil celular.</strong></p><p class="MsoNormal"><strong>IMEI: es un número de varios dígitos (14 o 15) pregrabados en los teléfonos celulares, que funciona como un código único, a nivel mundial, para la identificación de cada equipo móvil. Es como la huella digital de una persona.</strong></p><p class="MsoNormal"><strong>Interfaz de usuario: es el medio que utiliza el usuario para comunicarse con cualquier equipo electrónico o máquina, como un celular o una computadora.</strong></p><p class="MsoNormal"><strong>Firmware: es un software con la capacidad de actualizarse que tiene el teléfono celular, el cual forma parte del sistema operativo (Android, Windows, Blackberry, Symbian, etc.) con el que cuenta el equipo.</strong></p><p class="MsoNormal"><strong>Flash: en un teléfono móvil o celular equivale al disco duro de una computadora y su memoria RAM. En algunos equipos se puede cambiar, a lo cual se le denomina flashear.</strong></p><p class="MsoNormal"><strong>Generic Access Network: (GAN), era anteriormente conocida como Unlicensed Mobile Access(UMA), es un sistema de comunicaciones que permite hacer llamadas desde un teléfono móvil a través de servicios móbiles y WiFi. El celular ha de ser de modo dual.</strong></p><p class="MsoNormal"><strong>Gigabyte: Gigabyte es una unidad de medida informática equivalente a un billón de bytes. El gigabyte se utiliza para cuantificar memoria o capacidad de disco. Un gigabyte es igual a 1.024 megabytes. Su abreviatura es GB.</strong></p><p class="MsoNormal"><strong>GPS: se refiere a las siglas del Sistema de Posicionamiento Global, el cual sirve para determinan la posición en que nos encontramos en cuanto a latitud, longitud y altura. El citado sistema trabaja vía satelital.</strong></p><p class="MsoNormal"><strong>GPRS: Es el acrónimo de General Packet Radio Service o en español servicio general de paquetes vía radio. Se refiere al servicio wireless o redes inalámbricas que permite velocidades de 115 kilobits por segundo, comparado con el GSM que alcanza 9.6 kilobits.</strong></p><p class="MsoNormal"><strong>GSM: Proviene del francés groupe spécial mobile es un sistema estándar, libre de regalías, de telefonía móvil digital. El GSM es ahora uno de los estándares digitales inalámbricos 2G más importantes del mundo, utilizado en más de 160 países. Debido a su velocidad de transmisión, 9.6 kilobites por segundo, un estándar de segunda generación.</strong></p><p class="MsoNormal"><strong>Java (J2ME): es un programa que permite la activación de aplicaciones pequeñas e instalables por el usuario, que proveen funciones específicas.</strong></p><p class="MsoNormal"><br></p>', 'bzjz4YItaDs', 'conceptos-basicos', '2016-06-13 02:07:14', '2016-06-13 03:41:03'),
(12, 3, 'Fallas de hardware', 'En esta lección se repasará las fallas del hardware más comunes en los equipos inteligentes.', '<p>Fallas del hardware:</p><p>En la actualidad, los fabricantes de equipos móviles tienen producción automatizada y altos estándares de calidad por ello, es difícil que un equipo tenga fallas de fábrica, si llega a tenerlas entra en garantía.</p><p>Entonces, la mayoría de los problemas son por un mal uso del equipo. Los malos usos más comunes en un equipo son golpes o caídas pueden afectar algunos componentes o daña la carcasa, y dependiendo de la severidad dejar el aparato irreparable.</p><p>Display estrellado o dañado le quita lo estético al equipo la solución es cambiarlo. Esta reparación es la más costosa.&nbsp;</p><p>Daños causados por agua o humedad si se presentan se considera pérdida total del equipo porque la humedad interna causa cortocircuito. Puede saber si un equipo se mojó cuando los indicadores de contacto líquido que son blancos, cambiaron a rojo. Se encuentran en varios puntos internos según el modelo Solo en casos &nbsp;con daño muy leve puede solucionarlo con una lavadora ultrasónica que retira la corrosión</p><p>Carga errónea de la batería sucede cuando el equipo se deja descargado por mucho tiempo acorta la vida de la misma y es una de las causas de que el dispositivo no encienda. Puedes resolverlo cargando la batería con una fuente regulable hasta completar su capacidad y no es recomendable usar accesorios genéricos para la carga</p><br>', 'uVgqgGJVc5Q', 'fallas-de-hardware', '2016-06-13 02:15:45', '2016-06-13 02:15:45'),
(13, 3, 'Fallas de software', 'En esta ultima lección en esta primera sesión de videos se estudiara los fallos del software más comunes en un celular.', '<p>Fallas de software</p><p>Las fallas se presentan en dos componentes las aplicaciones y el sistema operativo Las más comunes son:</p><p>El teléfono se reinicia solo, Los ajustes o configuración no se ejecutan, Los botones o la pantalla táctil no responden, Alguna aplicación no abre o inesperadamente se cierra</p><p>Memoria saturada:</p><p>Otro problema común Es cuando el teléfono esta lento Debido a que las memorias flash o RAM están llenas, para solucionarlo Entra al menú ajustes o configuración. Busca la opción de memoria o almacenamiento &nbsp;para verificar la RAM se identifica el tipo de archivo que ocupa más espacio. Ahora, ve a la opción de liberador de espacio o administrador de aplicaciones. Luego, ve a la opción de análisis inteligente aquí se muestra el progreso del análisis en la parte de abajo, muestra los elementos no deseados en la memoria caché Seleccionamos eliminar se ha liberado espacio en la memoria RAM. Si la memoria RAM está &nbsp;llena se debe eliminar archivos como juegos, música, fotos, documentos. Puedes pasarlos al computador y entregarlos &nbsp;en una memoria USB o guardarlos en la nube &nbsp;</p><p>Problemas de la apps</p><p>Cuando una aplicación no inicia o se cierra inesperadamente puedes solucionarlo, reinstalándolo o actualizándolo. Para la primera, se debe ir a la tienda de apps ir a la opción de menú ve a la opción mis aplicaciones y juegos te mostrará todas las aplicaciones que requieren actualización luego seleccionar actualizar. Para reinstalarla ve a la opción mis aplicaciones y juegos te mostrará todas las aplicaciones seleccionas la aplicación &nbsp;luego seleccionar desinstalar reinicias el teléfono, volver a la tienda de apps busca la aplicación y descárgala cuando este instalada ejecútala para verificar el funcionamiento</p><p>Problemas en el S.O</p><p>Cuando el teléfono se reinicia, esta lento, los ajustes no se ejecutan o todas las aplicaciones tienen problemas entonces hay un problema en el sistema operativo que se soluciona con reinstalación o actualización. Para esta última, entra al menú ajustes o configuración ve a la opción general o acerca del teléfono si en la parte de actualización del sistema indica que hay una nueva versión seleccionar esta, para descargarla. Por ahora, no hay actualizaciones. Para reinstalar el sistema operativo si el equipo te lo permite, respalda la información actual ya que se pierden todos los datos, instale en el computador el software indicado por el fabricante algunos son de uso libre luego, conectar el dispositivo al computador algunas marcas, además del cable necesitan una caja especial de conexión</p><br>', 'W1ZznOUfq_0', 'fallas-de-software', '2016-06-13 03:39:41', '2016-06-13 03:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_02_20_173056_create_cursos_table', 1),
('2016_02_20_173722_create_lecciones_table', 1),
('2016_02_21_175019_create_comentarios_table', 1),
('2016_02_26_044518_create_evaluaciones_table', 1),
('2016_02_26_044555_create_preguntas_table', 1),
('2016_02_26_044940_create_opciones_table', 1),
('2016_03_02_213102_add_userstatus_column', 2),
('2016_03_04_091435_add_leccionslug_column', 3),
('2016_03_04_092458_add_slug_to_lecciones_table', 4),
('2016_03_05_103811_add_userimagen_column', 5),
('2016_03_10_173737_add_slug_to_users_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `opciones`
--

CREATE TABLE `opciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `pregunta_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `puntaje` enum('correcto','incorrecto') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'incorrecto',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `opciones`
--

INSERT INTO `opciones` (`id`, `pregunta_id`, `descripcion`, `puntaje`, `created_at`, `updated_at`) VALUES
(49, 55, 'Encender teléfonos sin batería', 'incorrecto', '2016-06-13 03:51:17', '2016-06-13 03:51:17'),
(50, 55, 'Flashear celulares', 'correcto', '2016-06-13 03:51:25', '2016-06-13 03:51:44'),
(51, 55, 'Reparación de circuitos pequeños', 'incorrecto', '2016-06-13 03:51:36', '2016-06-13 03:51:36'),
(52, 55, 'Retirar integrados de las tarjetas', 'incorrecto', '2016-06-13 03:51:42', '2016-06-13 03:51:42'),
(53, 56, 'Caja de liberación', 'incorrecto', '2016-06-13 03:52:08', '2016-06-13 03:52:08'),
(54, 56, 'Microscopio digital USB', 'correcto', '2016-06-13 03:52:12', '2016-06-13 03:52:24'),
(55, 56, 'Estación de soldadura', 'incorrecto', '2016-06-13 03:52:17', '2016-06-13 03:52:17'),
(56, 56, 'Ninguna de las anteriores', 'incorrecto', '2016-06-13 03:52:20', '2016-06-13 03:52:20'),
(57, 57, 'Voltaje', 'incorrecto', '2016-06-13 03:52:39', '2016-06-13 03:52:39'),
(58, 57, 'Resistencia', 'incorrecto', '2016-06-13 03:52:47', '2016-06-13 03:52:47'),
(59, 57, 'Corriente', 'incorrecto', '2016-06-13 03:52:49', '2016-06-13 03:52:49'),
(60, 57, 'Todas las anteriores', 'correcto', '2016-06-13 03:52:54', '2016-06-13 03:52:56'),
(61, 58, 'Estación de soldadura', 'incorrecto', '2016-06-13 03:53:18', '2016-06-13 03:53:18'),
(62, 58, 'Juego de destornilladores', 'incorrecto', '2016-06-13 03:53:23', '2016-06-13 03:53:23'),
(63, 58, 'Microscopio digital USB', 'correcto', '2016-06-13 03:53:27', '2016-06-13 03:53:33'),
(64, 58, 'Pinzas ', 'incorrecto', '2016-06-13 03:53:31', '2016-06-13 03:53:31'),
(65, 59, 'App nativas, web app y web app nativas', 'correcto', '2016-06-13 03:54:37', '2016-06-13 03:55:05'),
(67, 59, 'App nativas, app java', 'incorrecto', '2016-06-13 03:54:47', '2016-06-13 03:54:47'),
(68, 59, 'Web app nativas, app software', 'incorrecto', '2016-06-13 03:54:52', '2016-06-13 03:54:52'),
(69, 59, 'Web app, app nativas y app web nativas', 'incorrecto', '2016-06-13 03:54:59', '2016-06-13 03:54:59'),
(70, 60, 'Es la combinación de las web app nativas y web nativas', 'incorrecto', '2016-06-13 03:55:27', '2016-06-13 03:55:27'),
(71, 60, 'Es una combinación de Javascript y CSS', 'incorrecto', '2016-06-13 03:55:31', '2016-06-13 03:55:31'),
(72, 60, 'Es la combinación de las app nativas y webapp', 'correcto', '2016-06-13 03:55:36', '2016-06-13 03:55:44'),
(73, 60, 'Es una combinación de Javascript y HTML', 'incorrecto', '2016-06-13 03:55:39', '2016-06-13 03:55:39'),
(74, 61, 'Código único, para identificación de cada equipo movil', 'correcto', '2016-06-13 03:55:59', '2016-06-13 03:56:14'),
(75, 61, 'Codigo de 14 o 15 digitos para traspaso de información', 'incorrecto', '2016-06-13 03:56:02', '2016-06-13 03:56:02'),
(76, 61, 'Codigo que permite trasnferencia de de música, fotos y juegos', 'incorrecto', '2016-06-13 03:56:06', '2016-06-13 03:56:06'),
(77, 61, 'Todas las anteriores', 'incorrecto', '2016-06-13 03:56:11', '2016-06-13 03:56:11'),
(78, 62, 'IMAP Y 15002', 'incorrecto', '2016-06-13 03:56:29', '2016-06-13 03:56:29'),
(79, 62, '90010 y NFC', 'incorrecto', '2016-06-13 03:56:32', '2016-06-13 03:56:32'),
(80, 62, 'EDGE Y POP3', 'incorrecto', '2016-06-13 03:56:37', '2016-06-13 03:56:37'),
(81, 62, 'IMAP y POP3 ', 'correcto', '2016-06-13 03:56:40', '2016-06-13 03:56:42'),
(82, 63, 'Si, el celular entra en garantía si llega a tener fallas', 'correcto', '2016-06-13 03:57:46', '2016-06-13 03:58:01'),
(83, 63, 'No es posible, porque tiene altos estándares de calidad', 'incorrecto', '2016-06-13 03:57:51', '2016-06-13 03:57:51'),
(84, 63, 'Si, porque los celulares son aparatos de mucho cuidado', 'incorrecto', '2016-06-13 03:57:55', '2016-06-13 03:57:55'),
(85, 63, 'No es posible, porque tiene producción automatizada', 'incorrecto', '2016-06-13 03:57:58', '2016-06-13 03:57:58'),
(86, 64, 'Blanco', 'incorrecto', '2016-06-13 03:58:22', '2016-06-13 03:58:22'),
(87, 64, 'Azul', 'incorrecto', '2016-06-13 03:58:25', '2016-06-13 03:58:25'),
(88, 64, 'Rojo', 'correcto', '2016-06-13 03:58:28', '2016-06-13 03:58:32'),
(89, 64, 'Verde', 'incorrecto', '2016-06-13 03:58:30', '2016-06-13 03:58:30'),
(90, 65, 'Si, si se utiliza este aparato el equipo vuelve a funcionar', 'incorrecto', '2016-06-13 03:59:01', '2016-06-13 03:59:01'),
(91, 65, 'No, solo sirve para reparar algunos equipos', 'incorrecto', '2016-06-13 03:59:05', '2016-06-13 03:59:05'),
(92, 65, 'Si, si el equipo tuvo un daño leve referente al agua, puede salvarse', 'correcto', '2016-06-13 03:59:08', '2016-06-13 03:59:16'),
(93, 65, 'No, el celular queda como pérdida total', 'incorrecto', '2016-06-13 03:59:12', '2016-06-13 03:59:12'),
(94, 66, 'Porque no lo cargo con el cargador original', 'incorrecto', '2016-06-13 03:59:32', '2016-06-13 03:59:32'),
(95, 66, 'Porque lo sobrecargo', 'incorrecto', '2016-06-13 03:59:36', '2016-06-13 03:59:36'),
(96, 66, 'Porque retiro el equipo antes de completar el celular', 'incorrecto', '2016-06-13 03:59:40', '2016-06-13 03:59:40'),
(97, 66, 'Porque el equipo duro mucho tiempo descargado', 'correcto', '2016-06-13 03:59:43', '2016-06-13 03:59:46'),
(98, 67, 'Aplicaciones y desactualización', 'incorrecto', '2016-06-13 04:03:02', '2016-06-13 04:03:02'),
(99, 67, 'Equipo lento y sistema operativo', 'incorrecto', '2016-06-13 04:03:05', '2016-06-13 04:03:05'),
(100, 67, 'Aplicaciones y sistema operativo', 'correcto', '2016-06-13 04:03:09', '2016-06-13 04:03:19'),
(101, 67, 'Ninguna de las anteriores', 'incorrecto', '2016-06-13 04:03:16', '2016-06-13 04:03:16'),
(102, 68, 'Quitar la batería y volverlo a encender', 'incorrecto', '2016-06-13 04:03:42', '2016-06-13 04:03:42'),
(103, 68, 'Ir a la tienda de app, buscar la aplicación y dar en actualizar', 'correcto', '2016-06-13 04:03:46', '2016-06-13 04:03:55'),
(104, 68, 'Ir a la tienda de app, eliminar la aplicación', 'incorrecto', '2016-06-13 04:03:49', '2016-06-13 04:03:49'),
(105, 68, 'Ir gestor de aplicaciones, buscar la aplicación y dar en actualizar', 'incorrecto', '2016-06-13 04:03:53', '2016-06-13 04:03:53'),
(106, 69, 'Problema de aplicaciones', 'incorrecto', '2016-06-13 04:04:09', '2016-06-13 04:04:09'),
(107, 69, 'Problema de la RAM', 'incorrecto', '2016-06-13 04:04:12', '2016-06-13 04:04:12'),
(108, 69, 'Problema eléctrico del celular', 'incorrecto', '2016-06-13 04:04:16', '2016-06-13 04:04:16'),
(109, 69, 'Problema del sistema operativo', 'correcto', '2016-06-13 04:04:19', '2016-06-13 04:04:21'),
(110, 70, 'Si es posible, si el equipo tiene una actualización disponible lo hara', 'correcto', '2016-06-13 04:04:36', '2016-06-13 04:04:49'),
(111, 70, 'No es posible, el sistema operativo no puede actualizarse', 'incorrecto', '2016-06-13 04:04:40', '2016-06-13 04:04:40'),
(112, 70, 'Si es posible, debe usar una caja de conexión especial para hacer esto', 'incorrecto', '2016-06-13 04:04:43', '2016-06-13 04:04:43'),
(113, 70, 'No es posible, porque el celular no tiene sistema operativo ', 'incorrecto', '2016-06-13 04:04:46', '2016-06-13 04:04:46'),
(114, 71, 'Desarrollo de software', 'incorrecto', '2016-06-13 04:05:49', '2016-06-13 04:05:49'),
(115, 71, 'Arquitectura de celulares', 'correcto', '2016-06-13 04:05:55', '2016-06-13 04:06:09'),
(116, 71, 'Arquitectura de computadores', 'incorrecto', '2016-06-13 04:05:59', '2016-06-13 04:05:59'),
(117, 71, 'Ingenieria de software', 'incorrecto', '2016-06-13 04:06:06', '2016-06-13 04:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('YojhanR95@gmail.com', '32b38eff9677460c0119369e320aab46a451ded21de514ab3dca7c0fd75d1a5a', '2016-03-14 21:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(10) UNSIGNED NOT NULL,
  `evaluacion_id` int(10) UNSIGNED NOT NULL,
  `pregunta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `preguntas`
--

INSERT INTO `preguntas` (`id`, `evaluacion_id`, `pregunta`, `created_at`, `updated_at`) VALUES
(55, 9, 'La caja de liberación sirve para', '2016-06-13 03:50:25', '2016-06-13 03:50:25'),
(56, 9, '¿Qué aparato tiene su propio software?', '2016-06-13 03:50:35', '2016-06-13 03:50:35'),
(57, 9, 'El multimetro sirve para medir', '2016-06-13 03:50:40', '2016-06-13 03:50:40'),
(58, 9, 'Sirve para reparar circuitos demasiado pequeños', '2016-06-13 03:50:43', '2016-06-13 03:50:43'),
(59, 11, '¿Cuales son los tipos de aplicaciones que existen?', '2016-06-13 03:54:09', '2016-06-13 03:54:09'),
(60, 11, '¿Qué es una aplicación hibrida?', '2016-06-13 03:54:19', '2016-06-13 03:54:19'),
(61, 11, '¿Para que sirve el IMEI?', '2016-06-13 03:54:25', '2016-06-13 03:54:25'),
(62, 11, '¿Son dos protocolos de recepción de correos?', '2016-06-13 03:54:30', '2016-06-13 03:54:30'),
(63, 12, 'Es posible que un celular tenga fallas de fabrica', '2016-06-13 03:57:25', '2016-06-13 03:57:25'),
(64, 12, 'De que color es el indicador de contacto liquido, cuando el equipo ha sido mojado', '2016-06-13 03:57:30', '2016-06-13 03:57:30'),
(65, 12, 'La lavadora ultrasónica puede reparar un celular mojado', '2016-06-13 03:57:34', '2016-06-13 03:57:34'),
(66, 12, 'Es una de las causas de que el equipo no encienda', '2016-06-13 03:57:37', '2016-06-13 03:57:37'),
(67, 13, '¿Cuales son los dos componentes de las fallas de software?', '2016-06-13 04:02:39', '2016-06-13 04:02:39'),
(68, 13, 'Pasos para actualizar una aplicación', '2016-06-13 04:02:45', '2016-06-13 04:02:45'),
(69, 13, 'Si el teléfono se reinicia, esta lento o algunas aplicaciones fallan, es problema de', '2016-06-13 04:02:49', '2016-06-13 04:02:49'),
(70, 13, 'Es posible actualizar un sistema operativo', '2016-06-13 04:02:54', '2016-06-13 04:02:54'),
(71, 10, '¿Sobre que se tratará el tutorial?', '2016-06-13 04:05:41', '2016-06-13 04:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `biografia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `puntos` int(11) NOT NULL,
  `fecha_nac` date NOT NULL,
  `discapacidad` enum('none','ceguera','daltonismo','bajaVision','sordera','otra') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `type` enum('admin','member') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('activated','deactivated') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'activated',
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nombre`, `email`, `username`, `password`, `pais`, `biografia`, `puntos`, `fecha_nac`, `discapacidad`, `type`, `remember_token`, `status`, `imagen`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Yojhan Rodríguez', 'YojhanR95@gmail.com', 'YojhanR', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'CO', 'Soy estudiante de Tecnología en sistematización de la Universidad Distrital de Colombia.  Me gusta la tecnología, la programación y el idioma inglés. ', 680, '1995-09-09', 'none', 'admin', 'vFDs1VfssAZJxKuJ4liA80onNIUeUHAbUKAuHIOWUIdxQXd35jpj7ltbI8ds', 'activated', 'yojhanlr1457641021.jpg', 'yojhanr', '2016-02-26 11:10:36', '2016-06-13 04:44:54'),
(2, 'Jeisson Sindicue', 'JeissonSindicue@gmail.com', 'JeissonS', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'CO', '', 695, '1990-02-28', 'none', 'admin', '9jniXKhfOw6r7I51VHnuJTNMnQvytyH6ob7xJQDiVjpRRB53WM1pQG2xYqlQ', 'activated', 'jeissons1462306487.jpg', 'jeissons', '2016-02-27 19:59:08', '2016-06-13 04:14:03'),
(3, 'Maria Ordoñez', 'MariaOrd@gmail.com', 'MariaOrd', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2.', 'AR', 'La biografia no es obligatorio.', 360, '1994-10-19', 'none', 'member', 'eoeLn46dddTLZwCLsy3IbIDvEpLljKSgE7Ffgk6j7ICqdAi5ld4KhYd0bcQ3', 'activated', 'mariaord1462302469.png', 'mariaord', '2016-02-28 11:56:58', '2016-06-13 04:17:26'),
(4, 'Megan Ramirez', 'MeganRamirez@hotmail.com', 'MeganRR', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2/jTHSNM9wg96', 'CR', '', 590, '1992-09-05', 'none', 'member', 'aHph4fqqXjc0l8kGINuKpX2eWRXAjpQtXHY6QpGM2L5Fa3K2a30swyPdh6kE', 'activated', 'meganrr1462300608.png', 'meganrr', '2016-03-02 02:22:13', '2016-06-13 04:19:22'),
(5, 'Jaime Guzman', 'JaimeGuzman@gmail.com', 'JaimeGuz', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'BR', '', 814, '1998-10-17', 'daltonismo', 'member', 'lI3A2fo79G7qKfJb0mV2uy011MlS68WsaGDDkXgZ41zoVSWUE5IhLfsYEc9s', 'activated', 'jaimeguz1457811930.jpg', 'jaimeguz', '2016-03-02 03:11:02', '2016-06-13 04:44:45'),
(6, 'Sebastian Correa', 'SebastianCR12@hotmail.com', 'SebastianCLK', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'VE', '', 190, '1985-10-15', 'ceguera', 'member', '9McHigU7BDMUGERJDVPUEzN6C3NcI66M5BnPD3XXdD8Pr5ktc8bubkkhMg0g', 'activated', 'sebastianclk1463757899.jpg', 'sebastianclk', '2016-03-02 03:13:05', '2016-06-13 04:47:36'),
(7, 'Carlos Torres', 'carlostower@outlook.com', 'CarlosTower', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'UY', '', 190, '1990-11-06', 'bajaVision', 'member', 'rU7u5PXPxEBerjuP011NkgeJBozaMtC4WfEzYjteen3zLpmv1cXCw308qggF', 'activated', 'carlostower1462306663.png', 'carlostower', '2016-03-02 03:24:24', '2016-06-13 04:56:12'),
(8, 'Juliana Gonzalez', 'juligonza@gmail.com', 'JuliGonzalez', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'ES', '', 0, '1999-01-17', 'none', 'member', NULL, 'deactivated', 'default.png', 'juligonzalez', '2016-03-10 22:44:00', '2016-03-16 02:08:43'),
(9, 'Miguel Angel Zabala', 'prueba@hotmail.com', 'm.zabala', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'CO', '', 160, '1994-05-12', 'none', 'member', 'ozMFvQf33FFNWfwJLO9pZZ3OBC4VvscpKVtx8Qj1Bt27ntrkoabfQCl3LWlv', 'activated', 'm.zabala1463757981.jpg', 'm-zabala', '2016-03-11 18:49:06', '2016-06-13 04:57:08'),
(10, 'Leonardo Jimenez', 'leonardo@hotmail.com', 'LeoRodri', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'CL', '', 290, '1999-03-12', 'none', 'member', 'b8YtIMgj9tIpLCqibWWM2mO1Ulkr5wEyiQEeHts6UTltYpw4tlR2kjeFQEi6', 'activated', 'leorodri1463758079.jpg', 'leorodri', '2016-03-13 04:37:44', '2016-06-13 04:58:20'),
(11, 'Lina Jimenez', 'linajimenez@hotmail.com', 'LinaJim', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'GT', '', 30, '2001-02-15', 'none', 'member', '5Jdn2DlrVTuARnRC39jCsz4Qw10qbqFfDEj6rJ3SWT0Ct859A7rZjOhRRYgk', 'activated', 'default.png', 'linajim', '2016-03-13 15:44:00', '2016-03-18 03:24:16'),
(12, 'Hector Hurtado', 'hector@gmail.com', 'hectorh', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'CO', '', 190, '1995-04-16', 'ceguera', 'member', 'QKEg3cQ6ocpKT0SSUw2ENUhS0iqcYyQbO9I51Kj8sGK8kjsN9AdBGJOTshLz', 'activated', 'default.png', 'hectorh', '2016-03-16 13:22:23', '2016-06-13 05:06:23'),
(13, 'Estiven Alvarado', 'estiven@hotmai.com', 'EstivenAlv', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'CO', '', 0, '1993-04-17', 'none', 'member', '4P4uGaeAif9UO0JdCETRzGYr1V568Z6isQxQdDfv5wYmp8dEHVOD7DIq0jQH', 'activated', 'default.png', 'estivenalv', '2016-03-18 02:45:54', '2016-03-18 03:25:13'),
(14, 'Luisa Romero', 'luisa@hotmail.com', 'LuisaRom', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'PY', '', 0, '1999-11-18', 'none', 'member', 's981VXfeSr6OAeMrt5OMr6y2g6bFFxaTktHVGf2aDNL5pD66jiJbIQo6NPba', 'activated', 'default.png', 'luisarom', '2016-03-18 03:26:23', '2016-03-18 03:30:39'),
(15, 'Juliana Gomez', 'julianagomez@hotmail.com', 'JuliGomez', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'PR', '', 40, '1995-12-10', 'none', 'member', 'wwKtKJjmmAnwLzempfSF2PcTzM48QIQXiadHarWtwxg57dTWTig5GNtBhws1', 'activated', 'default.png', 'juligomez', '2016-03-18 03:32:21', '2016-03-18 03:33:34'),
(16, 'Camila Ordoñez', 'camilaordonez@gmail.com', 'CamiOrdoñez', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'CU', '', 30, '1998-12-19', 'none', 'member', '2kxnA2JukLshaypQP6tI3wPgdYPNWyumUioefuZKUm2AxrLNFcXiXKNDk7Qn', 'activated', 'default.png', 'camiordonez', '2016-03-24 15:33:44', '2016-03-24 15:34:10'),
(17, 'Juan Castillo', 'juancastillo@hotmail.com', 'JuanCastillo', '$2y$10$0ODHwSeqGd0lJ.9xf49RzeR4HciYq7ZLWcWtstUtccxIqhikFLtJ2', 'US', 'Soy estudiante de sistemas y me gustaría ampliar mis conocimientos acerca de los celulares.', 430, '1995-03-19', 'ceguera', 'admin', 'Du45ABjFh41nEAuRlw60FlMbw8WquwuLPKixe9ZMbLU6mGdcA0PNOi88rxWf', 'activated', 'default.png', 'juancastillo', '2016-03-24 16:29:21', '2016-06-13 05:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_curso`
--

CREATE TABLE `user_curso` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `progreso` double(8,2) NOT NULL,
  `fecha_fin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_curso`
--

INSERT INTO `user_curso` (`id`, `user_id`, `curso_id`, `progreso`, `fecha_fin`, `created_at`, `updated_at`) VALUES
(32, 1, 3, 100.00, '0000-00-00', '2016-06-13 01:29:29', '2016-06-13 04:13:37'),
(33, 2, 3, 73.33, '0000-00-00', '2016-06-13 04:09:54', '2016-06-13 04:12:21'),
(34, 3, 3, 60.00, '0000-00-00', '2016-06-13 04:14:16', '2016-06-13 04:16:41'),
(35, 4, 3, 40.00, '0000-00-00', '2016-06-13 04:17:40', '2016-06-13 04:19:03'),
(36, 5, 3, 86.67, '0000-00-00', '2016-06-13 04:19:47', '2016-06-13 04:43:05'),
(37, 6, 3, 26.67, '0000-00-00', '2016-06-13 04:45:19', '2016-06-13 04:45:45'),
(38, 7, 3, 86.67, '0000-00-00', '2016-06-13 04:47:53', '2016-06-13 04:54:39'),
(39, 9, 3, 20.00, '0000-00-00', '2016-06-13 04:56:31', '2016-06-13 04:56:54'),
(40, 10, 3, 60.00, '0000-00-00', '2016-06-13 04:57:20', '2016-06-13 04:58:15'),
(41, 17, 3, 60.00, '0000-00-00', '2016-06-13 05:04:42', '2016-06-13 05:05:43'),
(42, 12, 3, 20.00, '0000-00-00', '2016-06-13 05:06:13', '2016-06-13 05:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_evaluacion`
--

CREATE TABLE `user_evaluacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `evaluacion_id` int(10) UNSIGNED NOT NULL,
  `puntaje` float NOT NULL,
  `intentos` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_evaluacion`
--

INSERT INTO `user_evaluacion` (`id`, `user_id`, `evaluacion_id`, `puntaje`, `intentos`, `created_at`, `updated_at`) VALUES
(19, 1, 10, 50, 2, '2016-06-13 04:06:19', '2016-06-13 04:06:27'),
(20, 1, 9, 75, 1, '2016-06-13 04:08:18', '2016-06-13 04:08:18'),
(21, 1, 11, 100, 1, '2016-06-13 04:09:00', '2016-06-13 04:09:00'),
(22, 2, 10, 100, 1, '2016-06-13 04:10:07', '2016-06-13 04:10:07'),
(23, 2, 9, 75, 1, '2016-06-13 04:10:27', '2016-06-13 04:10:27'),
(24, 2, 12, 25, 1, '2016-06-13 04:11:49', '2016-06-13 04:11:49'),
(25, 2, 13, 75, 1, '2016-06-13 04:12:18', '2016-06-13 04:12:18'),
(26, 1, 12, 75, 1, '2016-06-13 04:13:24', '2016-06-13 04:13:24'),
(27, 1, 13, 0, 1, '2016-06-13 04:13:37', '2016-06-13 04:13:37'),
(28, 3, 10, 0, 1, '2016-06-13 04:14:45', '2016-06-13 04:14:45'),
(29, 3, 9, 100, 1, '2016-06-13 04:15:57', '2016-06-13 04:15:57'),
(30, 3, 11, 100, 1, '2016-06-13 04:16:36', '2016-06-13 04:16:36'),
(31, 4, 10, 100, 1, '2016-06-13 04:17:47', '2016-06-13 04:17:47'),
(32, 4, 9, 100, 1, '2016-06-13 04:18:21', '2016-06-13 04:18:21'),
(33, 4, 11, 100, 1, '2016-06-13 04:19:03', '2016-06-13 04:19:03'),
(34, 5, 10, 0, 1, '2016-06-13 04:20:07', '2016-06-13 04:20:07'),
(35, 5, 9, 100, 2, '2016-06-13 04:20:56', '2016-06-13 04:39:05'),
(36, 5, 11, 87.5, 2, '2016-06-13 04:21:21', '2016-06-13 04:21:32'),
(37, 9, 10, 100, 1, '2016-06-13 04:56:54', '2016-06-13 04:56:54'),
(38, 10, 10, 100, 1, '2016-06-13 04:57:28', '2016-06-13 04:57:28'),
(39, 17, 10, 0, 1, '2016-06-13 05:04:50', '2016-06-13 05:04:50'),
(40, 17, 9, 75, 1, '2016-06-13 05:05:13', '2016-06-13 05:05:13'),
(41, 17, 11, 100, 1, '2016-06-13 05:05:43', '2016-06-13 05:05:43'),
(42, 12, 10, 100, 1, '2016-06-13 05:06:23', '2016-06-13 05:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_leccion`
--

CREATE TABLE `user_leccion` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `leccion_id` int(10) UNSIGNED NOT NULL,
  `state` enum('none','started','finished') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `fecha_fin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_leccion`
--

INSERT INTO `user_leccion` (`id`, `user_id`, `leccion_id`, `state`, `fecha_fin`, `created_at`, `updated_at`) VALUES
(36, 1, 9, 'finished', '2016-06-12', '2016-06-13 03:41:21', '2016-06-13 03:41:30'),
(37, 1, 10, 'finished', '2016-06-12', '2016-06-13 03:41:39', '2016-06-13 03:41:44'),
(38, 1, 11, 'finished', '2016-06-12', '2016-06-13 03:41:52', '2016-06-13 03:42:00'),
(39, 1, 12, 'finished', '2016-06-12', '2016-06-13 03:42:09', '2016-06-13 03:42:13'),
(40, 1, 13, 'finished', '2016-06-12', '2016-06-13 03:42:22', '2016-06-13 03:42:28'),
(41, 2, 9, 'started', '0000-00-00', '2016-06-13 04:10:01', '2016-06-13 04:10:01'),
(42, 2, 10, 'finished', '2016-06-12', '2016-06-13 04:10:15', '2016-06-13 04:10:34'),
(43, 2, 12, 'finished', '2016-06-12', '2016-06-13 04:11:37', '2016-06-13 04:11:53'),
(44, 2, 13, 'finished', '2016-06-12', '2016-06-13 04:12:11', '2016-06-13 04:12:21'),
(45, 3, 9, 'finished', '2016-06-12', '2016-06-13 04:14:19', '2016-06-13 04:14:41'),
(46, 3, 10, 'finished', '2016-06-12', '2016-06-13 04:15:46', '2016-06-13 04:16:01'),
(47, 3, 11, 'finished', '2016-06-12', '2016-06-13 04:16:14', '2016-06-13 04:16:41'),
(48, 4, 9, 'started', '0000-00-00', '2016-06-13 04:17:44', '2016-06-13 04:17:44'),
(49, 4, 10, 'started', '0000-00-00', '2016-06-13 04:18:15', '2016-06-13 04:18:15'),
(50, 4, 11, 'started', '0000-00-00', '2016-06-13 04:18:51', '2016-06-13 04:18:51'),
(51, 5, 9, 'finished', '2016-06-12', '2016-06-13 04:20:02', '2016-06-13 04:38:24'),
(52, 5, 10, 'finished', '2016-06-12', '2016-06-13 04:20:50', '2016-06-13 04:38:49'),
(53, 5, 11, 'finished', '2016-06-12', '2016-06-13 04:21:13', '2016-06-13 04:21:25'),
(54, 5, 12, 'finished', '2016-06-12', '2016-06-13 04:39:38', '2016-06-13 04:40:20'),
(55, 5, 13, 'finished', '2016-06-12', '2016-06-13 04:43:04', '2016-06-13 04:43:04'),
(56, 6, 9, 'finished', '2016-06-12', '2016-06-13 04:45:22', '2016-06-13 04:45:45'),
(57, 6, 9, 'finished', '2016-06-12', '2016-06-13 04:45:22', '2016-06-13 04:45:45'),
(58, 7, 9, 'finished', '2016-06-12', '2016-06-13 04:48:01', '2016-06-13 04:48:12'),
(59, 7, 10, 'finished', '2016-06-12', '2016-06-13 04:48:55', '2016-06-13 04:49:38'),
(60, 7, 10, 'finished', '2016-06-12', '2016-06-13 04:48:55', '2016-06-13 04:49:38'),
(61, 7, 11, 'finished', '2016-06-12', '2016-06-13 04:50:03', '2016-06-13 04:50:13'),
(62, 7, 11, 'finished', '2016-06-12', '2016-06-13 04:50:03', '2016-06-13 04:50:13'),
(63, 7, 12, 'started', '0000-00-00', '2016-06-13 04:51:32', '2016-06-13 04:51:32'),
(64, 7, 13, 'finished', '2016-06-12', '2016-06-13 04:54:38', '2016-06-13 04:54:39'),
(65, 9, 9, 'finished', '2016-06-12', '2016-06-13 04:56:50', '2016-06-13 04:56:51'),
(66, 10, 9, 'finished', '2016-06-12', '2016-06-13 04:57:24', '2016-06-13 04:57:25'),
(67, 10, 12, 'finished', '2016-06-12', '2016-06-13 04:57:58', '2016-06-13 04:57:59'),
(68, 10, 10, 'finished', '2016-06-12', '2016-06-13 04:58:06', '2016-06-13 04:58:07'),
(69, 10, 11, 'finished', '2016-06-12', '2016-06-13 04:58:14', '2016-06-13 04:58:15'),
(70, 17, 9, 'finished', '2016-06-13', '2016-06-13 05:04:46', '2016-06-13 05:04:46'),
(71, 17, 10, 'finished', '2016-06-13', '2016-06-13 05:05:06', '2016-06-13 05:05:07'),
(72, 17, 11, 'finished', '2016-06-13', '2016-06-13 05:05:35', '2016-06-13 05:05:36'),
(73, 12, 9, 'finished', '2016-06-13', '2016-06-13 05:06:21', '2016-06-13 05:06:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_user_id_foreign` (`user_id`),
  ADD KEY `comentarios_leccion_id_foreign` (`leccion_id`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluaciones_leccion_id_foreign` (`leccion_id`);

--
-- Indexes for table `lecciones`
--
ALTER TABLE `lecciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecciones_curso_id_foreign` (`curso_id`);

--
-- Indexes for table `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opciones_pregunta_id_foreign` (`pregunta_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preguntas_evaluacion_id_foreign` (`evaluacion_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_curso`
--
ALTER TABLE `user_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_curso_user_id_foreign` (`user_id`),
  ADD KEY `user_curso_curso_id_foreign` (`curso_id`);

--
-- Indexes for table `user_evaluacion`
--
ALTER TABLE `user_evaluacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_evaluacion_user_id_foreign` (`user_id`),
  ADD KEY `user_evaluacion_evaluacion_id_foreign` (`evaluacion_id`);

--
-- Indexes for table `user_leccion`
--
ALTER TABLE `user_leccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_leccion_user_id_foreign` (`user_id`),
  ADD KEY `user_leccion_leccion_id_foreign` (`leccion_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `lecciones`
--
ALTER TABLE `lecciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_curso`
--
ALTER TABLE `user_curso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `user_evaluacion`
--
ALTER TABLE `user_evaluacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `user_leccion`
--
ALTER TABLE `user_leccion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_leccion_id_foreign` FOREIGN KEY (`leccion_id`) REFERENCES `lecciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `evaluaciones_leccion_id_foreign` FOREIGN KEY (`leccion_id`) REFERENCES `lecciones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lecciones`
--
ALTER TABLE `lecciones`
  ADD CONSTRAINT `lecciones_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_pregunta_id_foreign` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_evaluacion_id_foreign` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluaciones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_curso`
--
ALTER TABLE `user_curso`
  ADD CONSTRAINT `user_curso_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_curso_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_evaluacion`
--
ALTER TABLE `user_evaluacion`
  ADD CONSTRAINT `user_evaluacion_evaluacion_id_foreign` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluaciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_evaluacion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_leccion`
--
ALTER TABLE `user_leccion`
  ADD CONSTRAINT `user_leccion_leccion_id_foreign` FOREIGN KEY (`leccion_id`) REFERENCES `lecciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_leccion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
