-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-04-2016 a las 23:09:56
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `municipio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CAT_APARTADOS`
--

CREATE TABLE IF NOT EXISTS `CAT_APARTADOS` (
  `CVE_ARTICULO` int(11) NOT NULL,
  `CVE_FRACCION` int(11) NOT NULL,
  `CVE_INCISO` int(11) NOT NULL,
  `CVE_APARTADO` int(11) NOT NULL,
  `DESCRIPCION` varchar(200) DEFAULT NULL,
  `ACTIVO` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `CAT_APARTADOS`
--

INSERT INTO `CAT_APARTADOS` (`CVE_ARTICULO`, `CVE_FRACCION`, `CVE_INCISO`, `CVE_APARTADO`, `DESCRIPCION`, `ACTIVO`) VALUES
(1, 1, 2, 1, 'I.- Estructura Orgánica', b'1'),
(1, 1, 2, 2, 'II.- Atribuciones', b'1'),
(1, 1, 2, 3, 'III.- Trámites', b'1'),
(1, 1, 2, 4, 'IV.- Servicios y Formatos', b'1'),
(1, 1, 2, 5, 'V.- Marco Jurídico', b'1'),
(1, 1, 2, 6, 'VI.- Boletines de Información Pública', b'1'),
(1, 1, 2, 7, 'VII.- Acuerdos y Convenios', b'1'),
(1, 1, 2, 8, ' VIII.- Demas Disposiciones Administrativas', b'1'),
(1, 1, 6, 9, 'Enero', b'1'),
(1, 1, 6, 10, 'Febrero', b'1'),
(1, 1, 6, 11, 'Marzo', b'1'),
(1, 1, 6, 12, 'Abril', b'1'),
(1, 2, 22, 13, 'SAPAM', b'1'),
(1, 2, 22, 14, 'Servicios municipales', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CAT_ARTICULOS`
--

CREATE TABLE IF NOT EXISTS `CAT_ARTICULOS` (
  `CVE_ARTICULO` int(11) NOT NULL,
  `DESCRIPCION` varchar(11) DEFAULT NULL,
  `ACTIVO` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `CAT_ARTICULOS`
--

INSERT INTO `CAT_ARTICULOS` (`CVE_ARTICULO`, `DESCRIPCION`, `ACTIVO`) VALUES
(1, 'Artículo 10', b'1'),
(2, 'Artículo 12', b'1'),
(3, 'Artículo 13', b'1'),
(4, 'Artículo 14', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CAT_FRACCIONES`
--

CREATE TABLE IF NOT EXISTS `CAT_FRACCIONES` (
  `CVE_ARTICULO` int(11) NOT NULL,
  `CVE_FRACCION` int(11) NOT NULL,
  `DESCRIPCION` varchar(10) DEFAULT NULL,
  `ACTIVO` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `CAT_FRACCIONES`
--

INSERT INTO `CAT_FRACCIONES` (`CVE_ARTICULO`, `CVE_FRACCION`, `DESCRIPCION`, `ACTIVO`) VALUES
(1, 1, 'Fracción I', b'1'),
(1, 2, 'Fracción V', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CAT_INCISOS`
--

CREATE TABLE IF NOT EXISTS `CAT_INCISOS` (
  `CVE_ARTICULO` int(11) NOT NULL,
  `CVE_FRACCION` int(11) NOT NULL,
  `CVE_INCISO` int(11) NOT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL,
  `ACTIVO` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `CAT_INCISOS`
--

INSERT INTO `CAT_INCISOS` (`CVE_ARTICULO`, `CVE_FRACCION`, `CVE_INCISO`, `DESCRIPCION`, `ACTIVO`) VALUES
(1, 1, 1, 'a) Los acuerdos e índices de la información clasificada como reservada', b'1'),
(1, 1, 2, 'b) Su estructura orgánica, las atribuciones por unidad o área administrativa, los trámites, requisitos y formatos de los servicios que en general presta, el marco jurídico, acuerdos, convenios y demás disposiciones administrativas que le otorgan sustento legal al ejercicio de sus funciones, así como el boletín de información pública de sus actividades;', b'1'),
(1, 1, 3, 'c) Manuales de organización y procedimientos, así como los documentos que contengan las políticas de cada dependencia y unidad administrativa de Los Sujetos Obligados, que incluya metas, objetivos y responsables de los programas operativos y de apoyo a desarrollar, así como los indicadores de gestión utilizados para evaluar su desempeño;', b'1'),
(1, 1, 4, 'd) El directorio de servidores públicos, a partir del nivel de jefe de departamento o sus equivalentes hasta el titular del Sujeto Obligado;', b'1'),
(1, 1, 5, 'e) Información acerca de los sistemas, procesos, oficinas, ubicación, teléfonos, horario de atención, página electrónica, costos de reproducción o copiado de la información requerida y responsables de atender las solicitudes de acceso a la información, así como las solicitudes recibidas y las respuestas dadas por los servidores públicos;', b'1'),
(1, 1, 6, 'f) La totalidad de las percepciones económicas en las que se comprenda el monto mensual por concepto de remuneración por puesto o en su caso dieta, incluyendo el sistema de compensación, prestaciones o prerrogativas que reciben en especie o efectivo, según lo establezca el capítulo de servicios personales del Presupuesto de Egresos correspondiente.', b'1'),
(1, 1, 7, 'g) Los montos asignados a cada una de las dependencias y unidades administrativas de los Sujetos Obligados, los fondos revolventes, viáticos, gastos de representación y cualesquiera otros conceptos de ejercicio presupuestal que utilicen los mandos superiores, y en línea descendente hasta jefe de departamento. Los criterios de asignación, tiempo que dure su aplicación, los mecanismos de rendición de cuentas y de evaluación, señalando individualmente a los responsables del ejercicio de tales recur', b'1'),
(1, 1, 8, 'h) Las convocatorias a concurso o licitación de obras, adquisiciones, arrendamientos, prestación de servicios, concesiones, permisos y autorizaciones, así como sus resultados;', b'1'),
(1, 1, 9, 'i) Los resultados de las auditorías concluidas al ejercicio presupuestario de cada sujeto obligado que realicen, según corresponda, el órgano de control estatal, los órganos de control municipales o el Órgano Superior de Fiscalización del Estado y, en su caso, las aclaraciones que correspondan;', b'1'),
(1, 1, 10, ' j) Información de los padrones de beneficiarios de los programas sociales aplicados por el Estado y los municipios, así como información sobre el diseño, montos, acceso y ejecución de los programas de subsidio;', b'1'),
(1, 1, 11, 'k) Los mecanismos de participación ciudadana, en su caso, para la toma de decisiones por parte de los Sujetos Obligados;', b'1'),
(1, 1, 12, ' l) Información sobre la ejecución del presupuesto de egresos conforme el ejercicio correspondiente;', b'1'),
(1, 1, 13, 'm) Información sobre la situación económica, estados financieros y endeudamiento de los Sujetos Obligados;', b'1'),
(1, 1, 14, 'n) Información sobre todos los ingresos de los Sujetos Obligados;', b'1'),
(1, 1, 15, 'o) Índices de acciones, controversias y juicios en los que sean parte los Sujetos Obligados.', b'1'),
(1, 1, 16, 'p) Informe anual de actividades;', b'1'),
(1, 1, 17, 'q) La calendarización de las reuniones públicas de los diversos consejos, gabinetes, cabildos, sesiones plenarias y sesiones de trabajo a que se convoquen, así como las correspondientes minutas o actas de dichas sesiones;', b'1'),
(1, 1, 18, 'r) Las cuentas públicas calificadas por el Congreso del Estado;', b'1'),
(1, 1, 19, 's) Las minutas de las reuniones en las que se tome decisiones trascendentales para la ejecución del Plan Estatal de Desarrollo; y', b'1'),
(1, 1, 20, ' t) Toda otra información que sea de utilidad para el ejercicio del derecho de acceso a la información pública.', b'1'),
(1, 2, 21, 'a) El Plan Municipal de Desarrollo, los Programas Operativos anuales sectoriales desglosado por partida, monto, obra y comunidades y las modificaciones que a los mismos se propongan;', b'1'),
(1, 2, 22, 'b)Las iniciativas de ley, decretos, reglamentos o disposiciones de carácter general o particular en materia municipal;', b'1'),
(1, 2, 23, 'c) Los datos referentes al servicio publico de agua potable, drenaje, alcantarillado, tratamiento y disposición de aguas residuales, alumbrado publico; los programas de limpia, recolección, traslado y tratamiento y disposición final de residuos; mercados y centrales de abasto, panteones, rastros, calles, parques, jardines y su equipamiento;', b'1'),
(1, 2, 24, 'd) La creación y administración de sus reservas acuíferas, territoriales y ecológicas;', b'1'),
(1, 2, 25, 'e) La formulación, aprobación y administración de la zonificación y planes de desarrollo municipal;', b'1'),
(1, 2, 26, ' f) Utilización del suelo;', b'1'),
(1, 2, 27, ' g) Las participaciones federales y todos los recursos que integran su Hacienda;', b'1'),
(1, 2, 28, ' h) El catalogo de localidades y la metodología empleada para su conformación; y', b'1'),
(1, 2, 29, '  i) Cuotas y tarifas aplicables, impuestos, derechos, contribuciones de mejora, así como las tablas de valores unitarios de suelos y construcciones que sirvan de base para el cobro de las contribuciones sobre la propiedad inmobiliaria.', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CAT_TRANSPARENCIA`
--

CREATE TABLE IF NOT EXISTS `CAT_TRANSPARENCIA` (
  `CVE_ARTICULO` int(11) NOT NULL,
  `CVE_FRACCION` int(11) NOT NULL,
  `CVE_INCISO` int(11) NOT NULL,
  `CVE_APARTADO` int(11) NOT NULL,
  `CVE_CLASIFICACION_APARTADO` int(11) NOT NULL,
  `DESCRIPCION_CLASIFICACION_APARTADO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `CAT_TRANSPARENCIA`
--

INSERT INTO `CAT_TRANSPARENCIA` (`CVE_ARTICULO`, `CVE_FRACCION`, `CVE_INCISO`, `CVE_APARTADO`, `CVE_CLASIFICACION_APARTADO`, `DESCRIPCION_CLASIFICACION_APARTADO`) VALUES
(1, 1, 2, 5, 1, 'Constitución'),
(1, 1, 2, 5, 2, 'Leyes'),
(1, 1, 2, 5, 3, 'Normas'),
(1, 1, 2, 5, 4, 'Reglamentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DOCUMENTACION_TRANSPARENCIA`
--

CREATE TABLE IF NOT EXISTS `DOCUMENTACION_TRANSPARENCIA` (
  `CVE_ARTICULO` int(11) NOT NULL,
  `CVE_FRACCION` int(11) DEFAULT NULL,
  `CVE_INCISO` int(11) DEFAULT NULL,
  `CVE_APARTADO` int(11) DEFAULT '0',
  `CVE_CLASIFICACION_APARTADO` int(11) DEFAULT '0',
  `ANIO` int(11) NOT NULL,
  `TRIMESTRE` int(11) NOT NULL,
  `CVE_EXPEDIENTE` int(11) NOT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL,
  `EXPEDIENTE` varchar(50) DEFAULT NULL,
  `FOLIO` varchar(50) DEFAULT NULL,
  `RESPUESTA` varchar(100) DEFAULT NULL,
  `ANEXO` varchar(100) DEFAULT NULL,
  `PDF` varchar(180) DEFAULT NULL,
  `INFOMEX` bit(1) NOT NULL,
  `SOLICITUD` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `DOCUMENTACION_TRANSPARENCIA`
--

INSERT INTO `DOCUMENTACION_TRANSPARENCIA` (`CVE_ARTICULO`, `CVE_FRACCION`, `CVE_INCISO`, `CVE_APARTADO`, `CVE_CLASIFICACION_APARTADO`, `ANIO`, `TRIMESTRE`, `CVE_EXPEDIENTE`, `DESCRIPCION`, `EXPEDIENTE`, `FOLIO`, `RESPUESTA`, `ANEXO`, `PDF`, `INFOMEX`, `SOLICITUD`) VALUES
(1, 1, 1, NULL, NULL, 2016, 1, 1, 'ACUERDO E INDICES DE RESERVA', '', '', '', '', 'documentos/transparencia/articulo10/fraccionI/a/2016/1erTrimestre/ACUERDO%20E%20INDICES%20DE%20RESERVA.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 2, 'ORGANIGRAMA SAPAM', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/A%20ORGANIGRAMA%20SAPAM.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 3, 'ESTRUCTURA ORGANICA VIVIENDA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/ESTRUCTURA%20ORGANICA%20VIVIENDA.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 4, 'Estructura organica Direccion Poteccion Ambiental', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/Ecturctura%20organica%20Direccion%20Poteccion%20Ambiental.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 5, 'Estructura Organica Decurm', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/Estructura%20Organica%20Decurm.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 6, 'ORGANIGRAMA ADMINISTRACION', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/ORGANIGRAMA%20ADMINISTRACION.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 7, 'ORGANIGRAMA Atencion ciudadana', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/ORGANIGRAMA%20Atencion%20ciudadana.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 8, 'ORGANIGRAMA DIF', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/ORGANIGRAMA%20DIF.docx', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 9, 'ORGANIGRAMA DIRECCIÓN FOMENTO ECONÓMICO Y TURISMO 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/ORGANIGRAMA%20DIRECCIÓN%20FOMENTO%20ECONÓMICO%20Y%20TURISMO%20', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 10, 'Estructura Organica/ORGANIGRAMA DOOTSM 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/ORGANIGRAMA%20DOOTSM%202016.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 11, 'ORGANIGRAMA Dif', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/ORGANIGRAMA%20Dif.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 12, 'ORGANIGRAMA FINANZAS', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/ORGANIGRAMA%20FINANZAS.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 13, 'ORGANIGRAMA GENERAL DEL AYUNTAMIENTO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/ORGANIGRAMA%20GENERAL%20DEL%20%20AYUNTAMIENTO.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 14, 'ORGANIGRAMA PRESIDENCIA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/ORGANIGRAMA%20PRESIDENCIA.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 15, 'ORGANIGRAMA REGLAMENTO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/ORGANIGRAMA%20REGLAMENTO.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 16, 'ORGANIGRAMA programacion', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/ORGANIGRAMA%20programacion.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 17, 'Organigrama Comunicacion', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/Organigrama%20Comunicacion.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 18, 'Organigrama Desarrollo 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/Organigrama%20Desarrollo%202016.pdf', b'0', b'0'),
(1, 1, 2, 1, NULL, 2016, 1, 19, 'Estructura organica Contraloria', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Estructura%20Organica/estructura%20organica%20Contraloria.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 20, 'ATRIBUCIONES ADMINISTRACION', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20ADMINISTRACION.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 21, 'ATRIBUCIONES CONTRALORIA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20CONTRALORIA.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 22, 'ATRIBUCIONES DE LA DIRECCION DE ASUNTOS JURIDICOS', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20DE%20LA%20DIRECCION%20DE%20ASUNTOS%20JURIDICOS.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 23, 'ATRIBUCIONES DE LA DIRECCION DE ATENCION A LAS MUJERES', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20DE%20LA%20DIRECCION%20DE%20ATENCION%20A%20LAS%20MUJERES.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 24, 'ATRIBUCIONES DE LA DIRECCION DE ATENCION CIUDADANA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20DE%20LA%20DIRECCION%20DE%20ATENCION%20CIUDADANA.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 25, 'ATRIBUCIONES DE LA DIRECCION DE DESARROLLO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20DE%20LA%20DIRECCION%20DE%20DESARROLLO.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 26, 'ATRIBUCIONES DE LA DIRECCION DE EDUCACION, CULTURA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20DE%20LA%20DIRECCION%20DE%20EDUCACION,%20CULTURA.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 27, 'ATRIBUCIONES DE LA DIRECCION DE OBRAS', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20DE%20LA%20DIRECCION%20DE%20OBRAS.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 28, 'ATRIBUCIONES DE LA DIRECCION SEGURIDAD PUBLICA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20DE%20LA%20DIRECCION%20SEGURIDAD%20PUBLICA.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 29, 'ATRIBUCIONES DE VIVIENDA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20DE%20VIVIENDA.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 30, 'ATRIBUCIONES DIRECCION DE FINANZAS', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20DIRECCION%20DE%20FINANZAS.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 31, 'ATRIBUCIONES DIRECCION DE PROGRAMACION', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20DIRECCION%20DE%20PROGRAMACION.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 32, 'ATRIBUCIONES FOMENTO ECONOMICO Y TURISMO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20FOMENTO%20ECONOMICO%20Y%20TURISMO.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 33, 'ATRIBUCIONES SECRETARIA DEL AYUNTAMIENTO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20SECRETARIA%20DEL%20AYUNTAMIENTO.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 34, 'ATRIBUCIONES SAPAM', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/ATRIBUCIONES%20Sapam.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 35, 'Atribuciones Comunicacion social', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/Atribuciones%20Comunicacion%20social.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 36, 'Atribuciones Direccion Poteccion Ambiental', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/Atribuciones%20Direccion%20Poteccion%20Ambiental.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 37, 'Atribuciones Proteccion Civil', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/Atribuciones%20Proteccion%20Civil.pdf', b'0', b'0'),
(1, 1, 2, 2, NULL, 2016, 1, 38, 'Atribuciones Reglamento', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Atribuciones/Atribuciones%20Reglamento.pdf', b'0', b'0'),
(1, 1, 2, 3, NULL, 2016, 1, 39, 'TRAMITE REQUISITOS PARA PADRON DE CONTRATISTAS 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Tramites/TRAMITE%20REQUISITOS%20PARA%20PADRON%20DE%20CONTRATISTAS%202016.pdf', b'0', b'0'),
(1, 1, 2, 3, NULL, 2016, 1, 40, 'TRAMITES FINANZAS', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Tramites/TRAMITES%20FINANZAS.pdf', b'0', b'0'),
(1, 1, 2, 3, NULL, 2016, 1, 41, 'TRAMITES REGLAMENTO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Tramites/TRAMITES%20REGLAMENTO.pdf', b'0', b'0'),
(1, 1, 2, 3, NULL, 2016, 1, 42, 'TRAMITES VENTANILLA UNICA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Tramites/TRAMITES%20VENTANIÑA%20UNICA.pdf', b'0', b'0'),
(1, 1, 2, 3, NULL, 2016, 1, 43, 'TRAMITES VIVIENDA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Tramites/TRAMITES%20VIVIENDA.pdf', b'0', b'0'),
(1, 1, 2, 3, NULL, 2016, 1, 44, 'Tramites Direccion Poteccion Ambiental', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Tramites/Tramites%20Direccion%20Poteccion%20Ambiental.pdf', b'0', b'0'),
(1, 1, 2, 3, NULL, 2016, 1, 45, 'Tramites Proteccion Civil', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Tramites/Tramites%20Proteccion%20Civil.pdf', b'0', b'0'),
(1, 1, 2, 3, NULL, 2016, 1, 46, 'Tramites SAPAM', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Tramites/Tramites%20Sapam.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 47, 'ALINEAMIENTO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/ALINEAMIENTO.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 48, 'FACT Y USO DE SUELO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/FACT%20Y%20USO%20DE%20SUELO.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 49, 'FORMATO DE PARTICIPACIÓN CIUDADANA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/FORMATO%20DE%20PARTICIPACIÓN%20CIUDADANA.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 50, 'FORMATOS DE SERVICIOS DECLARACION 2016 CONTRALORIA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/FORMATOS%20DE%20SERVICIOS%20DECLARACION%202016%20CONTRALORIA.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 51, 'Formatos Direccion Poteccion Ambiental', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/Formatos%20Direccion%20Poteccion%20Ambiental.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 52, 'Formatos Proteccion Civil', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/Formatos%20Proteccion%20Civil.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 53, 'Formatos Proteccion Civil', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/GESTION%20CATASTRAL.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 54, 'LIC DE CONSTRUCCION', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/LIC%20DE%20CONSTRUCCION.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 55, 'MANIFESTACION CATASTRAL 2015- FORMATO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/MANIFESTACION%20%20CATASTRAL%202015-%20FORMATO.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 56, 'PERM DE CONSTRUCCION', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/PERM%20DE%20CONSTRUCCION.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 57, 'PLANO FINAL - PLANTILLA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/PLANO%20FINAL%20-%20PLANTILLA.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 58, 'RECURSO DE INCONFORMIDAD', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/RECURSO%20DE%20INCONFORMIDAD.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 59, 'SELLO - PLANTILLA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/SELLO%20-%20PLANTILLA.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 60, 'TRASLADO DE DOMINIO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/TRASLADO%20DE%20DOMINIO.pdf', b'0', b'0'),
(1, 1, 2, 4, NULL, 2016, 1, 61, 'traslado de dominio', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Formatos/traslado%20de%20dominio.pdf', b'0', b'0'),
(1, 1, 2, 5, 1, 2016, 1, 62, 'Constitución Política de los Estados Unidos Mexicanos', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Constitucion/Constitución%20Política%20de%20los%20Estados%20Unidos%20Mexicanos.pdf', b'0', b'0'),
(1, 1, 2, 5, 1, 2016, 1, 63, 'Constitución Política del Estado Libre y Soberano de Tabasco', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Constitucion/Constitución%20Política%20del%20Estado%20Libre%20y%20Soberano%20de%20Tabasco.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 64, 'LEY DE AGUAS NACIONALES OCTUBRE 2013', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/LEY%20DE%20AGUAS%20NACIONALES%20OCTUBRE%202013.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 65, 'LEY DE LOS TRABAJADORES AL SERVICIO DEL EDO. DE TABASCO OCTUBRE 2013', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/LEY%20DE%20LOS%20TRABAJADORES%20AL%20SERVICIO%20DEL%20EDO.%20DE%20TABASCO%20OCTUBRE%202013.', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 66, 'LEY DE ORDENAMIENTO SUSTENTABLE DEL TERRITORIO DEL ESTADO DE TABASCO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/LEY%20DE%20ORDENAMIENTO%20SUSTENTABLE%20DEL%20TERRITORIO%20DEL%20ESTADO%20DE%20TABASCO.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 67, 'LEY DE RESPONSABILIDADE DE LOS SERVIDORES PUBLICOS OCTUBRE 2013', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/LEY%20DE%20RESPONSABILIDADE%20DE%20LOS%20SERVIDORES%20PUBLICOS%20OCTUBRE%202013.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 68, 'LEY GENERAL DE DESARROLLO FORESTAL SUSTENTABLE MARZO DE 2014.', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/LEY%20GENERAL%20DE%20DESARROLLO%20FORESTAL%20SUSTENTABLE%20MARZO%20DE%202014.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 69, 'LEY GENERAL DE EQUILIBRIO ECOLÓGICO Y PROTECCIÓN AL AMBIENTE OCTUBRE 2013', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/LEY%20GENERAL%20DE%20EQUILIBRIO%20ECOLÓGICO%20Y%20PROTECCIÓN%20AL%20AMBIENTE%20OCTUBRE%2020', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 70, 'LEY PARA LA PREVENCIÓN Y GESTIÓN INTEGRALDE LOS RESIDUOS DEL ESTADO DE TABASCO ENERO 2013', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/LEY%20PARA%20LA%20PREVENCIÓN%20Y%20GESTIÓN%20INTEGRALDE%20LOS%20RESIDUOS%20DEL%20ESTADO%20D', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 71, 'Ley Federal de Sanidad Animal', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Ley%20Federal%20de%20Sanidad%20Animal.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 72, 'Ley Forestal', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Ley%20Forestal.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 73, 'Ley General de Proteccion Civil', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Ley%20General%20de%20Proteccion%20Civil.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 74, 'Ley Organica de los Municipios del Estado de Tabasco', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Ley%20Organica%20de%20los%20Municipios%20del%20Estado%20de%20Tabasco.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 75, 'Ley de Aguas Nacionales', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Ley%20de%20Aguas%20Nacionales.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 76, 'Ley de Amparo publicada en el D.O.F el 2 de abril de 2013 (ultima reforma 14 de julio de 2014)', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Ley%20de%20Amparo%20publicada%20en%20el%20D.O.F%20el%202%20de%20abril%20de%202013%20(ultima', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 77, 'Ley de Desarrollo Rural Sustentable del Estado de Tabasco', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Ley%20de%20Desarrollo%20Rural%20Sustentable%20del%20Estado%20de%20Tabasco.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 78, 'Ley de Fiscalizacion Superior del Estado de Tabasco', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Ley%20de%20Fiscalizacion%20Superior%20del%20Estado%20de%20Tabasco.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 79, 'Ley de Ganadería del Estado de Tabasco', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Ley%20de%20Ganadería%20del%20Estado%20de%20Tabasco.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 80, 'Ley de Pesca y Acuacultura Sustentables', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Ley%20de%20Pesca%20y%20Acuacultura%20Sustentables.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 81, 'Ley de Proteccion Civil del Estado de Tabasco', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Ley%20de%20Proteccion%20Civil%20del%20Estado%20de%20Tabasco.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 82, 'Ley de Protección Ambiental del Estado de Tabasco', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Ley%20de%20Protección%20Ambiental%20del%20Estado%20de%20Tabasco.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 83, 'Ley de Proteccion Ambiental del Estado de Tabasco', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/LeydeProteccionAmbientaldelEstadodeTabasco.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 84, 'Nueva Ley de Transparencia y Acceso a la Informacion Publica del Estado de Tabasco', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/Nueva%20Ley%20de%20Transparencia%20y%20Acceso%20a%20la%20Informacion%20Publica%20del%20Esta', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 85, 'ORDENAMIENTO TERRITORIAL', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/ORDENAMIENTO%20TERRITORIAL.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 86, 'Ley federal de explosivos', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/ley%20federal%20de%20explosivos.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 87, 'Ley de ordenamiento sustentable del territorio del estado de Tabasco', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/ley-de-ordenamiento-sustentable-del-territorio-del-estado-de-tabasco.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 88, 'Ley organica de los municipios del estado de Tabasco', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/ley-organica-de-los-municipios-del-estado-de-tabasco[1].pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 89, 'Ley de hacienda del estado de Tabasco 2014', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/ley_de_hacienda_del_estado_de_tabasco%202014.pdf', b'0', b'0'),
(1, 1, 2, 5, 2, 2016, 1, 90, 'Ordenamiento territorial de Macuspana', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Leyes/ordenamiento%20territorial%20de%20macuspana.pdf', b'0', b'0'),
(1, 1, 2, 5, 3, 2016, 1, 91, 'NOM-155-SEMARNAT-2007', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Normas/NOM-155-SEMARNAT-2007.pdf', b'0', b'0'),
(1, 1, 2, 5, 3, 2016, 1, 92, 'NOM-020-RECNAT-2001', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Normas/NOM-020-RECNAT-2001[1].pdf', b'0', b'0'),
(1, 1, 2, 5, 3, 2016, 1, 93, 'NOM-021-RECNAT-2000', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Normas/NOM-021-RECNAT-2000[1].pdf', b'0', b'0'),
(1, 1, 2, 5, 3, 2016, 1, 94, 'NOM-023-RECNAT-2001', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Normas/NOM-023-RECNAT-2001[1].pdf', b'0', b'0'),
(1, 1, 2, 5, 3, 2016, 1, 95, 'NOM-ECOL-060', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Normas/NOM-ECOL-060[1].pdf', b'0', b'0'),
(1, 1, 2, 5, 4, 2016, 1, 96, 'Reglamento de Proteccion Civil del Municipio de Macuspana 2011', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Reglamentos/Reglamento%20de%20Proteccion%20Civil%20del%20Municipio%20de%20Macuspana%202011.pdf', b'0', b'0'),
(1, 1, 2, 5, 4, 2016, 1, 97, 'Nuevo reglamento de ecologia y proteccion al ambiente del municipio de macuspana tabasco', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Marco%20Juridico/Reglamentos/nuevo%20reglamento%20de%20ecologia%20y%20proteccion%20al%20ambiente%20del%20municipio', b'0', b'0'),
(1, 1, 2, 6, NULL, 2016, 1, 98, 'Boletines Comunicacion Social', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/b/2016/1erTrimestre/Boletin/Boletines%20Comunicacion%20Social.pdf', b'0', b'0'),
(1, 1, 4, NULL, NULL, 2016, 1, 99, 'Atención CIudadana', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/d/2016/1erTrimestre/Atencion%20CIudadana.pdf', b'0', b'0'),
(1, 1, 4, NULL, NULL, 2016, 1, 100, 'DIRECTORIO ADMINISTRACION', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/d/2016/1erTrimestre/DIRECTORIO%20ADMINISTRACION.pdf', b'0', b'0'),
(1, 1, 4, NULL, NULL, 2016, 1, 101, 'DIRECTORIO COMUNICACION SOCIAL', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/d/2016/1erTrimestre/DIRECTORIO%20COMUNICACION%20SOCIAL.pdf', b'0', b'0'),
(1, 1, 4, NULL, NULL, 2016, 1, 102, 'DIRECTORIO DE LA DIRECCIÓN DE PROTECCIÓN AMBIENTAL', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/d/2016/1erTrimestre/DIRECTORIO%20DE%20LA%20DIRECCIÓN%20DE%20PROTECCIÓN%20AMBIENTAL.pdf', b'0', b'0'),
(1, 1, 4, NULL, NULL, 2016, 1, 103, 'DIRECTORIO DE SERV. PUBLICOS SAPAM', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/d/2016/1erTrimestre/DIRECTORIO%20DE%20SERV.%20PUBLICOS%20SAPAM.pdf', b'0', b'0'),
(1, 1, 4, NULL, NULL, 2016, 1, 104, 'DIRECTORIO DE SERV. PUBLICOS SAPAM', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/d/2016/1erTrimestre/DIRECTORIO%20DIF%202016.pdf', b'0', b'0'),
(1, 1, 4, NULL, NULL, 2016, 1, 105, 'DIRECTORIO PRESIDENCIA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/d/2016/1erTrimestre/DIRECTORIO%20PRESIDENCIA.pdf', b'0', b'0'),
(1, 1, 4, NULL, NULL, 2016, 1, 106, 'DIRECTORIO VIVIENDA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/d/2016/1erTrimestre/DIRECTORIO%20VIVIENDA.pdf', b'0', b'0'),
(1, 1, 4, NULL, NULL, 2016, 1, 107, 'Directorio Contraloria', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/d/2016/1erTrimestre/Directorio%20Contraloria.pdf', b'0', b'0'),
(1, 1, 4, NULL, NULL, 2016, 1, 108, 'Directorio Finanzas', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/d/2016/1erTrimestre/Directorio%20Finanzas.pdf', b'0', b'0'),
(1, 1, 4, NULL, NULL, 2016, 1, 109, 'FOMENTO ECONOMICO - DIRECTORIO DE SERVIDORES PUBLICOS', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/d/2016/1erTrimestre/FOMENTO%20ECONOMICO%20-%20%20DIRECTORIO%20DE%20SERVIDORES%20PUBLICOS.pdf', b'0', b'0'),
(1, 1, 5, NULL, NULL, 2016, 1, 110, 'Localizacion Oficinas UT', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/e/2016/1erTrimestre/Localizacion_Oficinas_%20UT.pdf', b'0', b'0'),
(1, 1, 5, NULL, NULL, 2016, 1, 111, 'PROCESOS DE LA UNIDAD DE TRANSPARENCIA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/e/2016/1erTrimestre/PROCESOS%20DE%20LA%20UNIDAD%20DE%20TRANSPARENCIA.pdf', b'0', b'0'),
(1, 1, 6, 9, NULL, 2016, 1, 112, 'ENERO CONFIANZA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/f/2016/1erTrimestre/ENERO/ENERO%20CONFIANZA.pdf', b'0', b'0'),
(1, 1, 6, 9, NULL, 2016, 1, 113, 'ENERO DIETA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/f/2016/1erTrimestre/ENERO/ENERO%20DIETA.pdf', b'0', b'0'),
(1, 1, 6, 9, NULL, 2016, 1, 114, 'ENERO LR', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/f/2016/1erTrimestre/ENERO/ENERO%20LR.pdf', b'0', b'0'),
(1, 1, 6, 9, NULL, 2016, 1, 115, 'ENERO SINDICALIZADO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/f/2016/1erTrimestre/ENERO/ENERO%20SINDICALIZADO.pdf', b'0', b'0'),
(1, 1, 6, 10, NULL, 2016, 1, 116, 'FEBRERO CONFIANZA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/f/2016/1erTrimestre/FEBRERO/FEBRERO%20CONFIANZA.pdf', b'0', b'0'),
(1, 1, 6, 10, NULL, 2016, 1, 117, 'FEBRERO DIETA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/f/2016/1erTrimestre/FEBRERO/FEBRERO%20DIETA.pdf', b'0', b'0'),
(1, 1, 6, 10, NULL, 2016, 1, 118, 'FEBRERO LR', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/f/2016/1erTrimestre/FEBRERO/FEBRERO%20LR.pdf', b'0', b'0'),
(1, 1, 6, 10, NULL, 2016, 1, 119, 'FEBRERO SINDICALIZADO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/f/2016/1erTrimestre/FEBRERO/FEBRERO%20SINDICALIZADO.pdf', b'0', b'0'),
(1, 1, 7, NULL, NULL, 2016, 1, 120, 'Fondo revolvente', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/g/2016/1erTrimestre/Fondo%20Revolvente/inciso%20G%20fraccion%20II.pdf', b'0', b'0'),
(1, 1, 7, NULL, NULL, 2016, 1, 121, 'Gastos de presentación', NULL, NULL, NULL, NULL, NULL, b'0', b'0'),
(1, 1, 7, NULL, NULL, 2016, 1, 122, 'Otros conceptos del ejercicio presupuestal', NULL, NULL, NULL, NULL, NULL, b'0', b'0'),
(1, 1, 7, NULL, NULL, 2016, 1, 123, 'Presupuesto por unidad administrativa', NULL, NULL, NULL, NULL, NULL, b'0', b'0'),
(1, 1, 7, NULL, NULL, 2016, 1, 124, 'Viaticos', NULL, NULL, NULL, NULL, NULL, b'0', b'0'),
(1, 1, 8, NULL, NULL, 2016, 1, 125, 'Justificación a las convocatorias a licitacion', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/h/2016/1erTrimestre/Justificacion%20%20a%20las%20convocatorias%20a%20licitacion.pdf', b'0', b'0'),
(1, 1, 9, NULL, NULL, 2016, 1, 126, 'Resultados de Auditorias', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/i/2016/1erTrimestre/Resultados%20de%20Auditorias.pdf', b'0', b'0'),
(1, 1, 10, NULL, NULL, 2016, 1, 127, 'BOLSA DE TRABAJO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/j/2016/1erTrimestre/BOLSA%20DE%20TRABAJO.pdf', b'0', b'0'),
(1, 1, 10, NULL, NULL, 2016, 1, 128, 'Padrón de beneficiarios BECATE', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/j/2016/1erTrimestre/padron%20de%20beneficiario%20%20BECATE.pdf', b'0', b'0'),
(1, 1, 11, NULL, NULL, 2016, 1, 129, 'PMECANISMO QUE SE UTILIZA PARA CONOCER LA OPINION', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/k/2016/1erTrimestre/MECANISMO%20QUE%20SE%20UTILIZA%20PARA%20CONOCER%20LA%20OPINION.pdf', b'0', b'0'),
(1, 1, 11, NULL, NULL, 2016, 1, 130, 'MECANISMOS DE PARTICIPACION CIUDADANA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/k/2016/1erTrimestre/MECANISMOS%20DE%20PARTICIPACION%20CIUDADANA.pdf', b'0', b'0'),
(1, 1, 12, NULL, NULL, 2016, 1, 131, 'Presupuesto', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/l/2016/1erTrimestre/Presupuesto/Presupuesto.pdf', b'0', b'0'),
(1, 1, 13, NULL, NULL, 2016, 1, 132, 'ESTADO DE ACTIVIDADES DE ENERO 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/m/2016/1erTrimestre/ESTADO%20DE%20ACTIVIDADES%20DE%20ENERO%202016.pdf', b'0', b'0'),
(1, 1, 13, NULL, NULL, 2016, 1, 133, 'ESTADO DE ACTIVIDADES DE FEBRERO 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/m/2016/1erTrimestre/ESTADO%20DE%20ACTIVIDADES%20DE%20FEBRERO%202016.pdf', b'0', b'0'),
(1, 1, 13, NULL, NULL, 2016, 1, 134, 'ESTADO DE CAMBIO EN LA SITUACION FINANCIERA ENERO 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/m/2016/1erTrimestre/ESTADO%20DE%20CAMBIO%20EN%20LA%20SITUACION%20FINANCIERA%20ENERO%202016.pdf', b'0', b'0'),
(1, 1, 13, NULL, NULL, 2016, 1, 135, 'ESTADO DE CAMBIO EN LA SITUACION FINANCIERA FEBRERO 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/m/2016/1erTrimestre/ESTADO%20DE%20CAMBIO%20EN%20LA%20SITUACION%20FINANCIERA%20FEBRERO%202016.pdf', b'0', b'0'),
(1, 1, 13, NULL, NULL, 2016, 1, 136, 'ESTADO DE SITUACION FINANCIERA ENERO 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/m/2016/1erTrimestre/ESTADO%20DE%20SITUACION%20FINANCIERA%20ENERO%202016.pdf', b'0', b'0'),
(1, 1, 13, NULL, NULL, 2016, 1, 137, 'ESTADO DE SITUACION FINANCIERA FEBRERO 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/m/2016/1erTrimestre/ESTADO%20DE%20SITUACION%20FINANCIERA%20FEBRERO%202016.pdf', b'0', b'0'),
(1, 1, 13, NULL, NULL, 2016, 1, 138, 'ESTADO DE VARIACION EN LA HACIENDA PUBLICA ENERO 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/m/2016/1erTrimestre/ESTADO%20DE%20VARIACION%20EN%20LA%20HACIENDA%20PUBLICA%20ENERO%202016.pdf', b'0', b'0'),
(1, 1, 13, NULL, NULL, 2016, 1, 139, 'ESTADO DE VARIACION EN LA HACIENDA PUBLICA FEBRERO 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/m/2016/1erTrimestre/ESTADO%20DE%20VARIACION%20EN%20LA%20HACIENDA%20PUBLICA%20FEBRERO%202016.pdf', b'0', b'0'),
(1, 1, 13, NULL, NULL, 2016, 1, 140, 'NOTAS A LOS ESTADOS FINANCIEROS ENERO 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/m/2016/1erTrimestre/NOTAS%20A%20LOS%20ESTADOS%20FINANCIEROS%20ENERO%202016.pdf', b'0', b'0'),
(1, 1, 13, NULL, NULL, 2016, 1, 141, 'NOTAS A LOS ESTADOS FINANCIEROS FEBRERO 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/m/2016/1erTrimestre/NOTAS%20A%20LOS%20ESTADOS%20FINANCIEROS%20FEBRERO%202016.pdf', b'0', b'0'),
(1, 1, 14, NULL, NULL, 2016, 1, 142, 'CALENDARIZACION LEY DE INGRESOS 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/n/2016/1erTrimestre/INGRESOS%20primer%20%20TRIMESTRE%20210%20MODFI.pdf', b'0', b'0'),
(1, 1, 14, NULL, NULL, 2016, 1, 143, 'LEY DE INGRESOS MACUSPANA 2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/n/2016/1erTrimestre/LEY%20DE%20INGRESOS%20MACUSPANA%202016.pdf', b'0', b'0'),
(1, 1, 18, NULL, NULL, 2016, 1, 144, 'DECRETO PARA TRANSPARENCIA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/r/2016/1erTrimestre/DECRETO%20PARA%20TRANSPARENCIA.pdf', b'0', b'0'),
(1, 1, 18, NULL, NULL, 2016, 1, 145, 'INCISO R', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionI/r/2016/1erTrimestre/INCISO%20R.pdf', b'0', b'0'),
(1, 2, 22, 13, NULL, 2016, 1, 146, 'ART. 10 FRACCION V INCISO C INFRAESTRUCTURA DE POZOS PROFUNDOS', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/SAPAM/ART.%2010%20FRACCION%20V%20INCISO%20C%20INFRAESTRUCTURA%20DE%20POZOS%20PROFUNDOS.pdf', b'0', b'0'),
(1, 2, 22, 13, NULL, 2016, 1, 147, 'ART. 10 FRACCION V INCISO C. INFRAESTRUCTURA DE AGUA POTABLE', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/SAPAM/ART.%2010%20FRACCION%20V%20INCISO%20C.%20INFRAESTRUCTURA%20DE%20AGUA%20POTABLE.pdf', b'0', b'0'),
(1, 2, 22, 13, NULL, 2016, 1, 148, 'ART. 10 FRACCION V INCISO C. INFRAESTRUCTURA DE SISITEMA DE ALCANTARILLADO (DRENAJE)', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/SAPAM/ART.%2010%20FRACCION%20V%20INCISO%20C.%20INFRAESTRUCTURA%20DE%20SISITEMA%20DE%20ALCANTARILLADO%20(DRENAJE).p', b'0', b'0'),
(1, 2, 22, 13, NULL, 2016, 1, 149, 'ART. 10. FRACCION V INCISO C.- PLANTAS DE TRATAMIENTO RESIDUALES', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/SAPAM/ART.%2010.%20FRACCION%20V%20INCISO%20C.-%20PLANTAS%20DE%20TRATAMIENTO%20RESIDUALES.pdf', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 150, 'BACHEO FEBRERO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/BACHEO%20%20FEBRERO.pdf', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 151, 'BACHEO MARZO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/BACHEO%20MARZO.xls', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 152, 'BARRIDO LIMPIA ENERO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/BARRIDO%20LIMPIA%20ENERO.pdf', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 153, 'BARRIDO LIMPIA FEBRERO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/BARRIDO%20LIMPIA%20FEBRERO.pdf', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 154, 'BARRIDO LIMPIA MARZO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/BARRIDO%20LIMPIA%20MARZO.pdf', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 155, 'Bacheo', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/Bacheo.pdf', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 156, 'PARQUES, JARDINES Y ESPACIOS PÚBLICOS DE ENERO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/PARQUES,%20JARDINES%20Y%20ESPACIOS%20PÚBLICOS%20DE%20%20ENERO.pdf', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 157, 'PARQUES, JARDINES Y ESPACIOS PÚBLICOS DE FEBRERO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/PARQUES,%20JARDINES%20Y%20ESPACIOS%20PÚBLICOS%20DE%20FEBRERO.pdf', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 158, 'PARQUES, JARDINES Y ESPACIOS PÚBLICOS DE MARZO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/PARQUES,%20JARDINES%20Y%20ESPACIOS%20PÚBLICOS%20DE%20MARZO.xls', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 159, 'RECOLECCIÓN, TRASLADO Y DISPOSICIÓN FINAL DE RESIDUOS SÓLIDOS DE ENERO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/RECOLECCIÓN,%20TRASLADO%20Y%20DISPOSICIÓN%20FINAL%20DE%20RESIDUOS%20SÓLIDOS%20DE%20ENERO.p', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 160, 'RECOLECCIÓN, TRASLADO Y DISPOSICIÓN FINAL DE RESIDUOS SÓLIDOS DE FEBRERO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/RECOLECCIÓN,%20TRASLADO%20Y%20DISPOSICIÓN%20FINAL%20DE%20RESIDUOS%20SÓLIDOS%20DE%20FEBRERO', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 161, 'RECOLECCIÓN, TRASLADO Y DISPOSICIÓN FINAL DE RESIDUOS SÓLIDOS DE MARZO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/RECOLECCIÓN,%20TRASLADO%20Y%20DISPOSICIÓN%20FINAL%20DE%20RESIDUOS%20SÓLIDOS%20DE%20MARZO.p', b'0', b'0'),
(1, 2, 22, 14, NULL, 2016, 1, 162, 'REPORTE TRABAJO POR MES', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/b/2016/1erTrimestre/Servicios%20Municipales/REPORTE%20TRABAJO%20POR%20MES.pdf', b'0', b'0'),
(1, 2, 24, NULL, NULL, 2016, 1, 163, 'ORDENAMIENTO TERRITORIAL', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/d/2016/1erTrimestre/ORDENAMIENTO%20TERRITORIAL.pdf', b'0', b'0'),
(1, 2, 24, NULL, NULL, 2016, 1, 164, 'Ordenamiento ecologico territorial del munisipio de Macuspana', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/d/2016/1erTrimestre/ordenamiento_ecologico_territorial_del_munisipio_de_macuspana.pdf', b'0', b'0'),
(1, 2, 25, NULL, NULL, 2016, 1, 165, 'DESARROLLO URBANO BIEN', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/e/2016/1erTrimestre/DESARROLLO%20URBANO%20BIEN%20.pdf', b'0', b'0'),
(1, 2, 25, NULL, NULL, 2016, 1, 166, 'DESARROLLO URBANO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/e/2016/1erTrimestre/DESARROLLO%20URBANO.docx', b'0', b'0'),
(1, 2, 26, NULL, NULL, 2016, 1, 167, 'Artículo 10 Fracción V', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/f/2016/1erTrimestre/Artículo%2010%20Fracción%20V.docx', b'0', b'0'),
(1, 2, 26, NULL, NULL, 2016, 1, 168, 'Atlas de riesgo', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/f/2016/1erTrimestre/Atlas%20de%20riesgo.pdf', b'0', b'0'),
(1, 2, 26, NULL, NULL, 2016, 1, 169, 'Ordenamiento ecologico territorial del municipio de Macuspana', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/f/2016/1erTrimestre/ordenamiento_ecologico_territorial_del_munisipio_de_macuspana.pdf', b'0', b'0'),
(1, 2, 28, NULL, NULL, 2016, 1, 170, 'Catálogo de localidades', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo10/fraccionV/h/2016/1erTrimestre/catalogo_de_localidades.pdf', b'0', b'0'),
(2, NULL, NULL, NULL, NULL, 2016, 1, 171, 'NO SE TIENE CONTRATACIÓN MEDIANTE INVITACION A LA PRESENTE FECHA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo12/2016/1erTrimestre/NO%20SE%20TIENE%20CONTRATACIÓN%20MEDIANTE%20INVITACION%20A%20LA%20PRESENTE%20FECHA.pdf', b'0', b'0'),
(2, NULL, NULL, NULL, NULL, 2016, 1, 172, 'NO SE TIENE CONTRATACIÓN MEDIANTE LICITACION PUBLICA A LA PRESENTE FECHA', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo12/2016/1erTrimestre/NO%20SE%20TIENE%20CONTRATACIÓN%20MEDIANTE%20LICITACION%20PUBLICA%20A%20LA%20PRESENTE%20FECHA.pdf', b'0', b'0'),
(3, NULL, NULL, NULL, NULL, 2016, 1, 173, '1ER. TRIMESTRE ANUENCIAS REGLAMENTO', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo13/2016/1erTrimestre/1ER.%20TRIMESTRE%20ANUENCIAS%20REGLAMENTO.pdf', b'0', b'0'),
(3, NULL, NULL, NULL, NULL, 2016, 1, 174, 'art_13_alineamiento_obras_1er_trim_2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo13/2016/1erTrimestre/art_13_alineamiento_obras_1er_trim_2016.pdf', b'0', b'0'),
(3, NULL, NULL, NULL, NULL, 2016, 1, 175, 'art_13_lic_construccion_obras_1er_trim_2016', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo13/2016/1erTrimestre/art_13_lic_construccion_obras_1er_trim_2016.pdf', b'0', b'0'),
(4, NULL, NULL, NULL, NULL, 2016, 1, 176, 'Justificación de Adjudicación Directa obras públicas', NULL, NULL, NULL, NULL, 'documentos/transparencia/articulo14/2016/1erTrimestre/Justificacion%20de%20Adjudicacion%20%20Directa%20obras%20publicas.pdf', b'0', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EL_REATON`
--

CREATE TABLE IF NOT EXISTS `EL_REATON` (
  `CVE_REATA` int(11) NOT NULL,
  `HABILITADO` varchar(50) DEFAULT NULL,
  `FRESITA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EVENTOS`
--

CREATE TABLE IF NOT EXISTS `EVENTOS` (
  `CVE_EVENTO` int(11) NOT NULL,
  `CVE_REATA` int(11) DEFAULT NULL,
  `NOMBRE` varchar(20) DEFAULT NULL,
  `FOTO_PRINCIPAL` varchar(30) DEFAULT NULL,
  `FOTO1` varchar(30) DEFAULT NULL,
  `FOTO2` varchar(30) DEFAULT NULL,
  `FOTO3` varchar(30) DEFAULT NULL,
  `FOTO4` varchar(30) DEFAULT NULL,
  `DESCRIPCION` varchar(5000) DEFAULT NULL,
  `FECHA_INICIO` datetime DEFAULT NULL,
  `FECHA_FIN` datetime DEFAULT NULL,
  `FECHA_GRABO` datetime DEFAULT NULL,
  `FECHA_TERMINO` datetime DEFAULT NULL,
  `CVE_PERSONA_MODIFICO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NOTICIAS`
--

CREATE TABLE IF NOT EXISTS `NOTICIAS` (
  `CVE_NOTICIA` int(11) NOT NULL,
  `CVE_REATA` int(11) DEFAULT NULL,
  `TIPO_EVENTO` int(11) NOT NULL COMMENT '1,-Boletin\r\n            2.-Comunicado\r\n            3.-Aviso',
  `TITULO` varchar(30) DEFAULT NULL,
  `NOTICIA_CORTA` varchar(200) DEFAULT NULL,
  `NOTICIA` varchar(5000) DEFAULT NULL,
  `FECHA_INICIO` datetime DEFAULT NULL,
  `FECHA_FIN` datetime DEFAULT NULL,
  `FOTO_PORTADA` varchar(40) DEFAULT NULL,
  `FOTO1` varchar(40) DEFAULT NULL,
  `FOTO2` varchar(40) DEFAULT NULL,
  `FOTO3` varchar(40) DEFAULT NULL,
  `FECHA_GRABO` datetime DEFAULT NULL,
  `FECHA_MODIFICO` datetime DEFAULT NULL,
  `CVE_MODIFICO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CAT_APARTADOS`
--
ALTER TABLE `CAT_APARTADOS`
 ADD PRIMARY KEY (`CVE_ARTICULO`,`CVE_FRACCION`,`CVE_INCISO`,`CVE_APARTADO`), ADD KEY `INDEX_1` (`CVE_ARTICULO`,`CVE_FRACCION`,`CVE_INCISO`,`CVE_APARTADO`);

--
-- Indices de la tabla `CAT_ARTICULOS`
--
ALTER TABLE `CAT_ARTICULOS`
 ADD PRIMARY KEY (`CVE_ARTICULO`), ADD KEY `INDEX_1` (`CVE_ARTICULO`);

--
-- Indices de la tabla `CAT_FRACCIONES`
--
ALTER TABLE `CAT_FRACCIONES`
 ADD PRIMARY KEY (`CVE_ARTICULO`,`CVE_FRACCION`), ADD KEY `INDEX_1` (`CVE_ARTICULO`,`CVE_FRACCION`);

--
-- Indices de la tabla `CAT_INCISOS`
--
ALTER TABLE `CAT_INCISOS`
 ADD PRIMARY KEY (`CVE_ARTICULO`,`CVE_FRACCION`,`CVE_INCISO`), ADD KEY `INDEX_1` (`CVE_ARTICULO`,`CVE_FRACCION`,`CVE_INCISO`);

--
-- Indices de la tabla `CAT_TRANSPARENCIA`
--
ALTER TABLE `CAT_TRANSPARENCIA`
 ADD PRIMARY KEY (`CVE_ARTICULO`,`CVE_FRACCION`,`CVE_INCISO`,`CVE_APARTADO`,`CVE_CLASIFICACION_APARTADO`), ADD KEY `INDEX_1` (`CVE_ARTICULO`,`CVE_FRACCION`,`CVE_INCISO`,`CVE_APARTADO`,`CVE_CLASIFICACION_APARTADO`);

--
-- Indices de la tabla `DOCUMENTACION_TRANSPARENCIA`
--
ALTER TABLE `DOCUMENTACION_TRANSPARENCIA`
 ADD PRIMARY KEY (`CVE_EXPEDIENTE`), ADD KEY `INDEX_1` (`CVE_ARTICULO`,`CVE_FRACCION`,`CVE_INCISO`,`CVE_APARTADO`,`CVE_CLASIFICACION_APARTADO`,`ANIO`,`TRIMESTRE`);

--
-- Indices de la tabla `EL_REATON`
--
ALTER TABLE `EL_REATON`
 ADD PRIMARY KEY (`CVE_REATA`), ADD KEY `INDEX_1` (`CVE_REATA`);

--
-- Indices de la tabla `EVENTOS`
--
ALTER TABLE `EVENTOS`
 ADD PRIMARY KEY (`CVE_EVENTO`), ADD KEY `INDEX_1` (`CVE_EVENTO`), ADD KEY `FK_REFERENCE_2` (`CVE_REATA`);

--
-- Indices de la tabla `NOTICIAS`
--
ALTER TABLE `NOTICIAS`
 ADD PRIMARY KEY (`CVE_NOTICIA`,`TIPO_EVENTO`), ADD KEY `INDEX_1` (`CVE_NOTICIA`,`TIPO_EVENTO`), ADD KEY `FK_REFERENCE_1` (`CVE_REATA`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CAT_APARTADOS`
--
ALTER TABLE `CAT_APARTADOS`
ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`CVE_ARTICULO`, `CVE_FRACCION`, `CVE_INCISO`) REFERENCES `CAT_INCISOS` (`CVE_ARTICULO`, `CVE_FRACCION`, `CVE_INCISO`);

--
-- Filtros para la tabla `CAT_FRACCIONES`
--
ALTER TABLE `CAT_FRACCIONES`
ADD CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`CVE_ARTICULO`) REFERENCES `CAT_ARTICULOS` (`CVE_ARTICULO`);

--
-- Filtros para la tabla `CAT_INCISOS`
--
ALTER TABLE `CAT_INCISOS`
ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`CVE_ARTICULO`, `CVE_FRACCION`) REFERENCES `CAT_FRACCIONES` (`CVE_ARTICULO`, `CVE_FRACCION`);

--
-- Filtros para la tabla `CAT_TRANSPARENCIA`
--
ALTER TABLE `CAT_TRANSPARENCIA`
ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`CVE_ARTICULO`, `CVE_FRACCION`, `CVE_INCISO`, `CVE_APARTADO`) REFERENCES `CAT_APARTADOS` (`CVE_ARTICULO`, `CVE_FRACCION`, `CVE_INCISO`, `CVE_APARTADO`);

--
-- Filtros para la tabla `DOCUMENTACION_TRANSPARENCIA`
--
ALTER TABLE `DOCUMENTACION_TRANSPARENCIA`
ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`CVE_ARTICULO`, `CVE_FRACCION`, `CVE_INCISO`, `CVE_APARTADO`, `CVE_CLASIFICACION_APARTADO`) REFERENCES `CAT_TRANSPARENCIA` (`CVE_ARTICULO`, `CVE_FRACCION`, `CVE_INCISO`, `CVE_APARTADO`, `CVE_CLASIFICACION_APARTADO`);

--
-- Filtros para la tabla `EVENTOS`
--
ALTER TABLE `EVENTOS`
ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`CVE_REATA`) REFERENCES `EL_REATON` (`CVE_REATA`);

--
-- Filtros para la tabla `NOTICIAS`
--
ALTER TABLE `NOTICIAS`
ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`CVE_REATA`) REFERENCES `EL_REATON` (`CVE_REATA`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


select * from documentacion_trANSparencia WHERE cve_articulo = 1 AND  cve_fraccion = 1 AND cve_inciso = 5

INSERT INTO cat_apartados VALUES(1,1,5,17,'Estrados',1)
