-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2021 a las 03:53:07
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

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
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Nosotros Somos Asis-Tec es una empresa que aporta soluciones para incrementar la productividad de las empresas. Desarrollamos procesos de automatización con sistemas hidráulicos, neumáticos y mecánicos, aplicando tecnología de punta combinada con la experiencia de 25 años en el mercado. Contamos con un equipo capacitado, con experiencia profesional en las areas de servicio y reparacion. Nuestro Objetivo Reafirmar año tras año, nuestro compromiso de superacion permanente, acercando a nuestros clientes el fruto de nuestro trabajo y esfuerzo que distingue a los productos de Asis-Tec, con la calidad de siempre y lo ultimo en materiales.', 'images/yYftemxbun1TUO4tSmrrvtGco3jAuoGnLaVXg5g4.png', NULL, '2021-06-16 17:18:29');

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
(27, '2021_06_20_005524_create_caso_exitos_table', 10);

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
(1, 'Prod Prueba editado', '<p>texto</p>', 'images/productos/6qjjQ6YYFThMTtoUcRzDneqHvlCKxOUAStto6Lve.png', 'images/productos/Zgt0NkX0kpWKabfumpAaEScTXSrlK5GInpy1cl5L.png', 'images/productos/VLznrN0d4YHRzc202JjOJ40FMKJKAKrDSo7jtAwp.png', 'images/productos/OsXpmhA5VUfqMt3ojrFceVLoR3Xo5CYOEU6tet0e.png', 'wwwwwwwwww', '<p>texto video</p>', '2021-06-19 01:52:31', '2021-06-19 20:24:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_soluciones`
--

CREATE TABLE `productos_soluciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` int(11) NOT NULL,
  `solucion_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos_soluciones`
--

INSERT INTO `productos_soluciones` (`id`, `prod_id`, `solucion_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, NULL, NULL);

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
(1, 'Solicitar presupuesto', 'imgempresa_Inicio.png', 'Envíanos toda la información de tu proyecto para que podamos cotizarlo', NULL, '2021-06-15 14:50:03');

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
(1, '01', 'Micro empresa', 'images/sectores/y7dYZcvkc0a7JV8c2FBdGHZUixiVdVptlwN7TsMx.png', 1, 2, '2021-06-20 02:54:08', '2021-06-20 03:03:31');

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
(1, '01', 'images/sliders/vuLbqtO2A7qhSpzml24SxIxTvJsC4JVEWtg4cTKR.png', NULL, 'empresa', '2021-06-16 17:09:47', '2021-06-16 17:09:47');

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
(1, 'Soluciones de válvulas neumáticas', '<p>La línea de productos de válvulas neumáticas ofrece una amplia gama de válvulas de control direccional accionadas por solenoide y por aire de 2, 3 y 4 vías con capacidades fieldbus y E/S.<br></p>', 'images/soluciones/2nYc4q0G0WtDTHkUVxqhzkZMXXNIXHQrmGBEbNZd.png', 4, NULL, NULL, '2021-06-18 01:54:12', '2021-06-18 02:02:43'),
(2, 'Solucion dos', '<p>wefwef</p>', 'images/soluciones/VEALE0Hd7r4vE4A3UT5NSpkJBgxXaMyrgxJEhSgk.png', 2, NULL, NULL, '2021-06-19 01:40:33', '2021-06-19 01:40:33');

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
(1, '02', 'Caja Grande', 4, '2021-06-17 02:51:19', '2021-06-17 02:52:27');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos_soluciones`
--
ALTER TABLE `productos_soluciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto_especials`
--
ALTER TABLE `producto_especials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seccion_inicios`
--
ALTER TABLE `seccion_inicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solucions`
--
ALTER TABLE `solucions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
