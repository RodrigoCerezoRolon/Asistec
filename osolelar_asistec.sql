-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-06-2021 a las 10:41:54
-- Versión del servidor: 10.3.29-MariaDB-cll-lve
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `osolelar_asistec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caso_exitos`
--

CREATE TABLE `caso_exitos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `caso_exitos`
--

INSERT INTO `caso_exitos` (`id`, `orden`, `titulo`, `texto`, `logo`, `imagen`, `archivo`, `created_at`, `updated_at`) VALUES
(2, '01', 'Puma Energy Paragua S.A', '<p>Sistema control y supervision SCADA – sistema de seguridad ESD (emergency shut down)<br></p>', 'images/casos/WEE3kmc5yeb1gJVAbG1OkomzWFlMKq7sh5YHAHdW.png', 'images/casos/MZ9CgaXXKPRUWar76QYRtddq5lavzx6ITKlS6g0d.png', 'images/casos/MGeoNcIslOtaHRnxqzu5yZvX5koYvPn12sHuSMZQ.png', '2021-06-21 20:58:16', '2021-06-21 20:58:16'),
(3, '02', 'Oil Combustibles– Pta. Pto San Lorenzo', '<p>Skid de medición de densidad.<br></p>', 'images/casos/0jX3KZMdcSkBXdhd5UjyhaVVDqzGxdcJvKdaT4cA.png', 'images/casos/22l9cET7nQVBpGe4DqpGrddLuQE86D1Cm9QESy7V.png', 'images/casos/8Oy5BA8pnqmRmN9TJoGSAgAZSD870KEHX16usXO4.png', '2021-06-21 21:00:54', '2021-06-21 21:02:20'),
(4, '03', 'TOTAL Especialidades (San Lorenzo – La Banda)', '<p>Sistema de medición continua de nivel de tanques y alarma por sobrellenado en plantas de GLP.<br></p>', 'images/casos/YXR2rHLXiOQY4dXIx7QnK8nvdt9etMJvifREL0Ne.png', 'images/casos/gMmdGx3UgmkFrVNy5Uw2dDCVNEmfcTilvZA5xyBN.png', 'images/casos/QcEPDMZucaJwhFiRjDqhirKvGeAXBfblL48u6v55.png', '2021-06-21 21:02:03', '2021-06-21 21:02:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `orden`, `nombre`, `created_at`, `updated_at`) VALUES
(1, '01', 'Armar?', '2021-06-17 02:42:09', '2021-06-17 02:42:09'),
(2, '02', 'Colocar?', '2021-06-17 02:42:54', '2021-06-17 02:42:54'),
(3, '03', 'Envolver?', '2021-06-17 02:43:04', '2021-06-17 02:43:04'),
(4, '05', 'Cerrar Algo?', '2021-06-17 02:45:26', '2021-06-17 02:47:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `orden`, `imagen`, `created_at`, `updated_at`) VALUES
(2, '01', 'images/clientes/J6NXAjMz4jfEVjgDuyiEXxulyCvByAMdiDG2UGB0.png', '2021-06-21 02:51:04', '2021-06-21 02:51:04'),
(3, '02', 'images/clientes/iIjuP0nP9PQY7IfVbjvqrZJ8Ocx7i3xjOKhtdgSl.png', '2021-06-21 02:51:14', '2021-06-21 02:51:14'),
(4, '03', 'images/clientes/Zq6t6XjynEC0j5AQQGWTykK6WKmK2QaWbFqeVrMd.png', '2021-06-21 02:51:23', '2021-06-21 02:51:23'),
(5, '04', 'images/clientes/PbdgrDF0lvlXwimutsWGQmPpjrHpDGpjq0FHWCIo.png', '2021-06-21 02:51:31', '2021-06-21 02:51:31'),
(6, '05', 'images/clientes/kjs7khrq2BwWXvHJNsvBlatR5eseadUpC3pKyBNB.png', '2021-06-21 02:51:48', '2021-06-21 02:51:48'),
(7, '06', 'images/clientes/bzTf9O5alVt3bs54H4Z10UeMPPT3cuQmMh9Yt7Ej.png', '2021-06-21 02:52:07', '2021-06-21 02:52:07'),
(8, '07', 'images/clientes/qkVbj9UZmK7fUfYDb0d0X1XoBymcMjiYCt2eTxEH.png', '2021-06-21 02:54:15', '2021-06-21 02:54:15'),
(9, '08', 'images/clientes/07vpEgM8QbZ9MRBWg3eGLiIZ2BtojT4iEfDgl6Q0.png', '2021-06-21 02:54:56', '2021-06-21 02:54:56'),
(10, '09', 'images/clientes/mRhzfrcDRFKD4mMyxqAGnywe5IL23VqyDmEbEMhm.png', '2021-06-21 02:55:11', '2021-06-21 02:55:11'),
(11, '10', 'images/clientes/Z3I7ZXdF9wOhDn8zo1hRkotiXFLyySx1wPb9C9cz.png', '2021-06-21 02:55:25', '2021-06-21 02:55:25'),
(12, '11', 'images/clientes/dYG48yb6aKVgeNiGoh2TMSr8QoifggvnHHZYwEsE.png', '2021-06-21 02:55:38', '2021-06-21 02:55:38'),
(13, '12', 'images/clientes/RnnpQwLKiMcGMOPxrA2xtjDN4GxEiR4CXH8wcVVf.png', '2021-06-21 02:55:47', '2021-06-21 02:55:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `dato`, `texto`, `created_at`, `updated_at`) VALUES
(1, 'direccion', 'Ricardo Balbin (Ruta 8) 3470. San Martín.', NULL, '2021-06-20 22:25:27'),
(2, 'correo', 'asis-tec@asis-tecweb.com', NULL, '2021-06-20 22:25:35'),
(3, 'telefono', '4738-1668 / 4849-1228', NULL, '2021-06-20 22:25:48'),
(4, 'whatsapp', '+54 9 11 4849-1228', NULL, '2021-06-20 22:25:56'),
(5, 'linkedin', '', NULL, NULL),
(6, 'youtube', '', NULL, NULL),
(7, 'facebook', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `texto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `texto`, `imagen`, `created_at`, `updated_at`) VALUES
(1, '<h6><span style=\"font-family: Roboto-Regular;\"><font color=\"#053e85\">Nosotros Somos</font></span></h6><p><span style=\"font-family: Roboto-Light;\"><font color=\"#707070\">Asis-Tec es una empresa que aporta soluciones para incrementar la productividad de las empresas. Desarrollamos procesos de automatización con sistemas hidráulicos, neumáticos y mecánicos, aplicando tecnología de punta combinada con la experiencia de 25 años en el mercado. Contamos con un equipo capacitado, con experiencia profesional en las areas de servicio y reparacion.</font></span></p><h6><font color=\"#053e85\" style=\"\"> <span style=\"font-family: Roboto-Regular;\">N</span><font style=\"\"><span style=\"font-family: Roboto-Regular;\">uestro Objetivo</span> </font></font></h6><p><font color=\"#707070\"><span style=\"font-family: Roboto-Light;\">Reafirmar año tras año, nuestro compromiso de superacion permanente, acercando a nuestros clientes el fruto de nuestro trabajo y esfuerzo que distingue a los productos de Asis-Tec, con la calidad de siempre y lo ultimo en materiales.</span></font></p>', 'images/yYftemxbun1TUO4tSmrrvtGco3jAuoGnLaVXg5g4.png', NULL, '2021-06-21 02:01:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `logos`
--

INSERT INTO `logos` (`id`, `icono`, `created_at`, `updated_at`) VALUES
(1, 'images/jKv1F8apUjgcVJiDOuYQVNla4Y0dlhir5mS6fuve.png', NULL, '2021-06-20 23:39:51'),
(2, 'inf', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos`
--

CREATE TABLE `mantenimientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mantenimientos`
--

INSERT INTO `mantenimientos` (`id`, `orden`, `imagen`, `titulo`, `subtitulo`, `texto`, `created_at`, `updated_at`) VALUES
(1, '01', 'images/mantenimiento/00TKUGNheRPrdGAI2IrotuglkEqF37lyexhCgv4z.png', 'Asesoramiento Personalizado', 'Grandes, medianas y pequeñas empresas', '<p>Brindamos el servicio de atención y asesoramiento personalizado. Nuestro equipo de profesionales trabajan en propuestas que generen valor a la mejor relación costo-beneficio<br></p>', '2021-06-20 00:48:34', '2021-06-20 00:53:00'),
(2, '02', 'images/mantenimiento/r592jPwh5K5FegkzGGbtUP9BVhkpOjh1y9krX9Nj.png', 'Visitas a Planta', 'Consulta por nuestras opciones', '<p>Contamos con unidades de visitas a planta. Además realizamos confeccionamiento de proyectos. Brindamos la entrega de planos eléctricos y manuales instructivos para el operario.<br></p>', '2021-06-20 00:49:26', '2021-06-20 01:53:48'),
(3, '03', 'images/mantenimiento/Po1753oTe5bz9RhSZRSm1rfHIeervOKNocXjnMsL.png', 'Garantía', 'Comprometidos con la calidad', '<p>Consideramos fundamental mantener los lazos con nuestros clientes, basados en la confianza y la excelencia en servicio. Contamos con un servicio Post-Venta, garantía y servicio técnico especializados.<br></p>', '2021-06-20 00:49:53', '2021-06-20 00:49:53'),
(4, '04', 'images/mantenimiento/m2z950kIemtlbJTezliT61LfpmTSLV8VfSGUzOh7.png', 'INSTALACION Y PUESTA EN MARCHA', 'De nuestras máquinas y repuestos', '<p>Contamos con un equipo de trabajo altamente capacitado, dispuesto a brindar el mejor servicio de instalación y puesta en marcha de nuestros catálogo de máquinas y equipos.<br></p>', '2021-06-20 00:50:15', '2021-06-20 00:50:15'),
(5, '05', 'images/mantenimiento/TmXF3qayFlQWRqq1gekioQVuMZ4jMw8aMTl2XqzT.png', 'Respuesto y Piezas Especiales', 'Somos Fabricantes', '<p>Realizamos, desarrollamos y fabricamos repuestos y piezas especiales para la maquinaria propia y de otras marcas. Para más información consulte por nuestras piezas y accesorios para tu equipo.<br></p>', '2021-06-20 00:51:09', '2021-06-20 00:51:09'),
(6, '06', 'images/mantenimiento/7SE0WUbEfkiX3Wcwns7T1TgYaD8xkj29Ye1OBxuZ.png', 'Diseño y Fabricación a Medida', 'Maquinaria para aplicaciones específicas', '<p>Consulte por nuestro servicio especializado de maquinaria, adaptada a las necesidades específicas de nuestros clientes<br></p>', '2021-06-20 00:51:57', '2021-06-20 00:51:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `orden`, `imagen`, `created_at`, `updated_at`) VALUES
(1, '01', 'images/inicio/NiiO4zf8wT5QeuNVXzgZzUvh6Ht8nTw3kEdTCttr.png', '2021-06-16 16:04:16', '2021-06-16 16:04:16'),
(2, '02', 'images/inicio/Y5RSkU9j6e7Tz5Gg87vrpPEoaOah9uPvqasMmVKN.png', '2021-06-16 16:05:18', '2021-06-16 16:05:18'),
(3, '03', 'images/inicio/Sivdvkj9Cbh2KeDSLFxhg4mdlkUmTl60DSJQ7Aoi.png', '2021-06-16 16:05:28', '2021-06-16 16:05:28'),
(4, '04', 'images/inicio/wt7T4Mqrf0sykckObfAohemGxk40HiZ8DKvTnE9h.png', '2021-06-16 16:05:42', '2021-06-16 16:05:42'),
(5, '05', 'images/inicio/QY8k2jdvpdgRvGxeQrJCeHpp6gJUsmRAQgQcUIzu.png', '2021-06-16 16:05:53', '2021-06-16 16:05:53'),
(6, '06', 'images/inicio/0cywDPi5AH0rqFBhwypJLlgxYo23935xdeRZZTum.png', '2021-06-16 16:06:08', '2021-06-16 16:06:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metadatos`
--

CREATE TABLE `metadatos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_10_195131_create_roles_table', 1),
(5, '2020_05_13_040234_create_metadatos_table', 1),
(6, '2020_06_11_010653_create_contactos_table', 1),
(7, '2020_07_06_045002_create_sliders_table', 1),
(8, '2020_09_05_150944_create_logos_table', 1),
(9, '2020_10_28_010955_create_seccion_inicios_table', 1),
(12, '2020_07_06_180735_create_marcas_table', 2),
(13, '2021_03_02_141848_create_empresas_table', 3),
(17, '2020_10_06_123710_create_categorias_table', 4),
(18, '2020_10_06_171323_create_sub_categorias_table', 4),
(19, '2020_10_07_123715_create_sub_sub_categorias_table', 4),
(21, '2021_06_16_234738_create_solucions_table', 5),
(22, '2021_06_17_022155_create_productos_table', 5),
(23, '2021_06_17_234004_create_productos_soluciones', 6),
(24, '2021_06_19_175558_create_producto_especials_table', 7),
(25, '2021_06_19_213449_create_mantenimientos_table', 8),
(26, '2021_06_19_221832_create_sectors_table', 9),
(27, '2021_06_20_005524_create_caso_exitos_table', 10),
(28, '2020_09_01_183824_create_clientes_table', 11),
(29, '2020_09_21_215046_create_subcriptores_table', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_uno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_dos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_tres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_cuatro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enlace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto_video` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `texto`, `img_uno`, `img_dos`, `img_tres`, `img_cuatro`, `enlace`, `texto_video`, `created_at`, `updated_at`) VALUES
(1, 'Prod Prueba editado', '<p>texto</p>', 'images/productos/6qjjQ6YYFThMTtoUcRzDneqHvlCKxOUAStto6Lve.png', 'images/productos/Zgt0NkX0kpWKabfumpAaEScTXSrlK5GInpy1cl5L.png', 'images/productos/VLznrN0d4YHRzc202JjOJ40FMKJKAKrDSo7jtAwp.png', 'images/productos/OsXpmhA5VUfqMt3ojrFceVLoR3Xo5CYOEU6tet0e.png', 'dBNJL5pDWHA', '<p>Las válvulas ASCO Numatics serie 520 son adecuadas para aplicaciones del automóvil, de embalaje en cajas, embalaje y fabricación de neumáticos.</p>', '2021-06-19 01:52:31', '2021-06-21 18:37:08'),
(3, 'Válvulas de control direccional', '<p>La serie 520 es una línea de mini válvulas de carrete de solenoide operadas por aire que son ideales para pilotar cilindros neumáticos. Las válvulas tienen bobinas de alta calidad resistentes al calor y la humedad y adecuadas para altas temperaturas ambientales y entornos hostiles. Se pueden montar sobre bases unibles para múltiples aplicaciones.<br></p>', 'images/productos/HmDCDvPdJyv6IhBDrJFTZF8j8jy2DrP1Vja6CUTu.png', NULL, NULL, NULL, NULL, NULL, '2021-06-21 18:10:45', '2021-06-21 18:10:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_soluciones`
--

CREATE TABLE `productos_soluciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` int(11) NOT NULL,
  `solucion_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos_soluciones`
--

INSERT INTO `productos_soluciones` (`id`, `producto_id`, `solucion_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, NULL, NULL),
(5, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_especials`
--

CREATE TABLE `producto_especials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_uno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_dos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_tres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_cuatro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_especials`
--

INSERT INTO `producto_especials` (`id`, `titulo`, `texto`, `img_uno`, `img_dos`, `img_tres`, `img_cuatro`, `created_at`, `updated_at`) VALUES
(2, 'Rampa para autos Buquebus', '<p>Rampa para autos Buquebus, terminal Puerto madero.<br></p>', 'images/productos/zzE9uQxQFjlBQBCE7uVDWn3l1r8GEbTRBuyxNC9g.png', NULL, NULL, NULL, '2021-06-21 02:04:14', '2021-06-21 02:04:14'),
(3, 'Plataforma Tronador II', '<p>El proyecto Inyector Satelital de Cargas Útiles Livianas (Iscul)1​ , también conocido como Tronador, es un programa de una familia de cohetes espaciales desarrollada por la Comisión Nacional de Actividades Espaciales de la Argentina.<br></p>', 'images/productos/VtfIHtkqG73WLR7UYojbmPwD0u6P6gIxJd9RXALq.png', NULL, NULL, NULL, '2021-06-21 02:04:39', '2021-06-21 02:04:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_inicios`
--

CREATE TABLE `seccion_inicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seccion_inicios`
--

INSERT INTO `seccion_inicios` (`id`, `titulo`, `imagen`, `texto`, `created_at`, `updated_at`) VALUES
(1, 'Solicitar presupuesto', 'images/inicio/vh2fXeFJhDUuAx0mWjmQiYokb6nrZdQCExFJaqxO.png', 'Envíanos toda la información de tu proyecto para que podamos cotizarlo', NULL, '2021-06-21 21:41:30'),
(2, 'Soluciones', 'images/inicio/USwtrdr2xscFdNvHZ2SvhagcXC9jyS8TkdeOPXOV.png', 'Fabricamos equipos hidráulicos exclusivos para la necesidad de cada uno de nuestros clientes. Nuestros equipos estan caracterizados por un alto rendimiento y confiabilidad, construidos en chapa de acero. Todos los componentes se encuentran montado sobre la tapa provista de cancamos, que simplifican su desplazamiento.', NULL, '2021-06-21 00:06:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solucion_id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sectors`
--

INSERT INTO `sectors` (`id`, `orden`, `titulo`, `imagen`, `solucion_id`, `tipo`, `created_at`, `updated_at`) VALUES
(1, '01', 'Micro empresa', 'images/sectores/cJnUPLyuY4G1xzdFP22KFjO0z7gzM1ZujQ3UXFxk.png', 1, 1, '2021-06-20 02:54:08', '2021-06-21 19:14:05'),
(3, '02', 'Pequeña empresa', 'images/sectores/R7pMlo1CwEEmxfEntJQ0UZh3phY35VHygH7KrOH9.png', 2, 1, '2021-06-21 19:20:13', '2021-06-21 19:20:13'),
(4, '03', 'Mediana empresa', 'images/sectores/hIOY830TquaxdtTwCk5cTBjH6P7SCd1HTezqxhY6.png', 1, 1, '2021-06-21 19:22:26', '2021-06-21 19:22:26'),
(5, '04', 'Gran empresa', 'images/sectores/awbeV2MDduUB2xhTrZOE3OQow4Eoy88UzmZ8SzSb.png', 1, 1, '2021-06-21 19:22:55', '2021-06-21 19:22:55'),
(6, '01', 'Oil & Gas', 'images/sectores/d4lhCbvCda9L4TXxI9kuFeQhYHP0YOPqE4UMhKm9.png', 1, 2, '2021-06-21 19:29:06', '2021-06-21 19:29:06'),
(7, '02', 'Metalmecánica', 'images/sectores/sgS9BjskQH5t6BS6zmJG5vdXFksYq8P5mb0tJrRR.png', 1, 2, '2021-06-21 19:29:26', '2021-06-21 19:30:26'),
(8, '03', 'Química', 'images/sectores/Hd34FhJDL3vU23IkbwXouNh02eyqS7SauhKaw4Wd.png', 1, 2, '2021-06-21 19:29:46', '2021-06-21 19:30:41'),
(9, '04', 'Farmaceutica', 'images/sectores/49K2xGWwcUO1MVu2d2huaiEmMM9WzHiIdV2JQlIk.png', 1, 2, '2021-06-21 19:31:06', '2021-06-21 19:31:06'),
(10, '05', 'Nuclear', 'images/sectores/TByYGu2lC5Ab2ciyaJwxTwYRFyXTDSSlsnU2gCTx.png', 1, 2, '2021-06-21 19:31:52', '2021-06-21 19:31:52'),
(11, '06', 'Bebidas', 'images/sectores/L5CpPlP8ij9mMYUFpCtFTfD5jNcW4wXgNyQXxerP.png', 1, 2, '2021-06-21 19:32:11', '2021-06-21 19:32:11'),
(12, '07', 'Automotriz', 'images/sectores/KxIiJJfy5moCtdc9Vloj3VrzKeJO3AX4ZpNarjzF.png', 1, 2, '2021-06-21 19:32:28', '2021-06-21 19:32:28'),
(13, '08', 'Mineria', 'images/sectores/SN01uXmBS2U0FrNg6BTXEZVfRZrtqjCJTBfiTbPX.png', 1, 2, '2021-06-21 19:32:47', '2021-06-21 19:32:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `orden`, `imagen`, `texto`, `pagina`, `created_at`, `updated_at`) VALUES
(1, '01', 'images/sliders/vuLbqtO2A7qhSpzml24SxIxTvJsC4JVEWtg4cTKR.png', NULL, 'empresa', '2021-06-16 17:09:47', '2021-06-16 17:09:47'),
(2, '01', 'images/sliders/ISLkWeppn40ozlCNpohgZUKgDa4IcPu3pZ9aOMJZ.png', '<h3><span style=\"font-family: Roboto-Light;\"><font color=\"#ffffff\">Equipos y cilindros hidráulicos</font></span></h3><h6><span style=\"font-family: Roboto-Light;\"><font color=\"#ffffff\">Fabricamos equipos hidráulicos exclusivos a medida</font></span></h6>', 'inicio', '2021-06-20 23:52:14', '2021-06-20 23:56:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solucions`
--

CREATE TABLE `solucions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `sub_subcategory_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solucions`
--

INSERT INTO `solucions` (`id`, `titulo`, `texto`, `imagen`, `category_id`, `subcategory_id`, `sub_subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 'Soluciones de válvulas neumáticas', '<p>La línea de productos de válvulas neumáticas ofrece una amplia gama de válvulas de control direccional</p><p> accionadas por solenoide y por aire de 2, 3 y 4 vías con capacidades fieldbus y E/S.<br></p>', 'images/soluciones/dFu3AaV0HwWWj71RIpbCcMm88yFYSFqnlUwod9eY.png', NULL, NULL, 1, '2021-06-18 01:54:12', '2021-06-21 17:40:45'),
(2, 'Solucion dos', '<p>wefwef</p>', 'images/soluciones/VEALE0Hd7r4vE4A3UT5NSpkJBgxXaMyrgxJEhSgk.png', 2, NULL, NULL, '2021-06-19 01:40:33', '2021-06-19 01:40:33'),
(3, 'solucion prueba', '<p>foierjfoierf</p>', 'images/soluciones/4Izle1ndUJ9A16jLnJDHdiHP23P6Tvq83Xd3bWKo.png', 1, NULL, NULL, '2021-06-22 18:32:34', '2021-06-22 18:32:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcriptores`
--

CREATE TABLE `subcriptores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subcriptores`
--

INSERT INTO `subcriptores` (`id`, `email`, `created_at`, `updated_at`) VALUES
(2, 'soporte@osole.es', '2021-06-21 21:11:02', '2021-06-21 21:11:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categorias`
--

CREATE TABLE `sub_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sub_categorias`
--

INSERT INTO `sub_categorias` (`id`, `orden`, `nombre`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '02', 'Caja Grande', 4, '2021-06-17 02:51:19', '2021-06-17 02:52:27'),
(2, '02', 'Caja pequeña', 4, '2021-06-21 16:32:50', '2021-06-21 16:32:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_sub_categorias`
--

CREATE TABLE `sub_sub_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sub_sub_categorias`
--

INSERT INTO `sub_sub_categorias` (`id`, `orden`, `nombre`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, '02', 'Caja Medio Grande 3', 1, '2021-06-17 03:09:55', '2021-06-17 03:11:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pablo', '$2y$10$vBazBdxMq54c73HYgAczU.Z5Zpmi9jImn7rPeV/PhKqHXM0TBVpTq', NULL, NULL, '2021-06-13 18:18:25', '2021-06-13 18:18:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caso_exitos`
--
ALTER TABLE `caso_exitos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metadatos`
--
ALTER TABLE `metadatos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_soluciones`
--
ALTER TABLE `productos_soluciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_especials`
--
ALTER TABLE `producto_especials`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seccion_inicios`
--
ALTER TABLE `seccion_inicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solucions`
--
ALTER TABLE `solucions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcriptores`
--
ALTER TABLE `subcriptores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub_sub_categorias`
--
ALTER TABLE `sub_sub_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caso_exitos`
--
ALTER TABLE `caso_exitos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `metadatos`
--
ALTER TABLE `metadatos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos_soluciones`
--
ALTER TABLE `productos_soluciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto_especials`
--
ALTER TABLE `producto_especials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seccion_inicios`
--
ALTER TABLE `seccion_inicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solucions`
--
ALTER TABLE `solucions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subcriptores`
--
ALTER TABLE `subcriptores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sub_sub_categorias`
--
ALTER TABLE `sub_sub_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
