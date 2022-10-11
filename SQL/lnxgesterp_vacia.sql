-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-04-2020 a las 16:36:46
-- Versión del servidor: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.33-0ubuntu0.16.04.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lnxgesterp`
--

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `lnx_notifica`
--

CREATE TABLE `lnx_notifica` (
  `opcion` varchar(10) NOT NULL,
  `valor` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

--
-- Estructura de tabla para la tabla `lnx_users_notifica`
--

CREATE TABLE `lnx_users_notifica` (
  `iduser` int(11) NOT NULL,
  `opcion` varchar(10) NOT NULL,
  `email` int(11) NOT NULL,
  `telegram` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

--
-- Estructura de tabla para la tabla `lnx_ac`
--

CREATE TABLE `lnx_ac` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vencimiento` date NOT NULL,
  `idusuario` int(11) NOT NULL,
  `pagado` float NOT NULL,
  `editfv` int(11) NOT NULL, 
  `factura` varchar(20) NOT NULL, 
  `pc_cp` int(11) NOT NULL,
  `pc_dp` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ac_lineas`
--

CREATE TABLE `lnx_ac_lineas` (
  `id` int(11) NOT NULL,
  `idac` int(11) NOT NULL,
  `cod` varchar(20) NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `unid` int(11) NOT NULL,
  `precio` float NOT NULL,
  `dto` int(11) NOT NULL,
  `importe` float NOT NULL,
  `orden` int(11) NOT NULL,
  `exclufactu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ac_lineas_tax`
--

CREATE TABLE `lnx_ac_lineas_tax` (
  `id` int(11) NOT NULL,
  `idac` int(11) NOT NULL,
  `idaclinea` int(11) NOT NULL,
  `idtax` int(11) NOT NULL,
  `valor` float NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ac_pagos`
--

CREATE TABLE `lnx_ac_pagos` (
  `id` int(11) NOT NULL,
  `idac` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` float NOT NULL,
  `idfpago` int(11) NOT NULL,
  `idcpago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ac_sn`
--

CREATE TABLE `lnx_ac_sn` (
  `id` int(11) NOT NULL,
  `idac` int(11) NOT NULL,
  `idlinea` int(11) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `pn` varchar(50) NOT NULL,
  `otro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ac_tax`
--

CREATE TABLE `lnx_ac_tax` (
  `id` int(11) NOT NULL,
  `idac` int(11) NOT NULL,
  `idimpuesto` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_almacenes`
--

CREATE TABLE `lnx_almacenes` (
  `id` int(11) NOT NULL,
  `almacen` varchar(50) NOT NULL,
  `dft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lnx_almacenes` (`id`, `almacen`, `dft`) VALUES (1, 'Almacen principal', 1);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_atributos`
--

CREATE TABLE `lnx_atributos` (
  `id` int(11) NOT NULL,
  `atributo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_atributosvalor`
--

CREATE TABLE `lnx_atributosvalor` (
  `id` int(11) NOT NULL,
  `idatrib` int(11) NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_av`
--

CREATE TABLE `lnx_av` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vencimiento` date NOT NULL,
  `idusuario` int(11) NOT NULL,
  `pagado` float NOT NULL,
  `editfv` int(11) NOT NULL,
  `pc_cp` int(11) NOT NULL,
  `pc_dp` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_av_lineas`
--

CREATE TABLE `lnx_av_lineas` (
  `id` int(11) NOT NULL,
  `idav` int(11) NOT NULL,
  `cod` varchar(20) NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `unid` int(11) NOT NULL,
  `precio` float NOT NULL,
  `dto` int(11) NOT NULL,
  `importe` float NOT NULL,
  `orden` int(11) NOT NULL,
  `exclufactu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_av_lineas_tax`
--

CREATE TABLE `lnx_av_lineas_tax` (
  `id` int(11) NOT NULL,
  `idav` int(11) NOT NULL,
  `idavlinea` int(11) NOT NULL,
  `idtax` int(11) NOT NULL,
  `valor` float NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_av_pagos`
--

CREATE TABLE `lnx_av_pagos` (
  `id` int(11) NOT NULL,
  `idav` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` float NOT NULL,
  `idfpago` int(11) NOT NULL,
  `idcpago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_av_sn`
--

CREATE TABLE `lnx_av_sn` (
  `id` int(11) NOT NULL,
  `idav` int(11) NOT NULL,
  `idlinea` int(11) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `pn` varchar(50) NOT NULL,
  `otro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_av_tax`
--

CREATE TABLE `lnx_av_tax` (
  `id` int(11) NOT NULL,
  `idav` int(11) NOT NULL,
  `idimpuesto` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_bancos`
--

CREATE TABLE `lnx_bancos` (
  `id` int(11) NOT NULL,
  `banco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_bancostipo`
--

CREATE TABLE `lnx_bancostipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `conta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lnx_bancostipo` (`id`, `tipo`, `conta`) VALUES
(1, 'Cuenta efectivo', 0),
(2, 'Cuenta bancaria corriente', 0),
(3, 'Cuenta bancaria de ahorros', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_bancos_cpago`
--

CREATE TABLE `lnx_bancos_cpago` (
  `id` int(11) NOT NULL,
  `cpago` varchar(50) NOT NULL,
  `dias` int(11) NOT NULL,
  `diapago` int(11) NOT NULL, 
  `idcuenta` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_bloqueos`
--

CREATE TABLE `lnx_bloqueos` (
  `iduser` int(11) NOT NULL,
  `tabla` varchar(50) NOT NULL,
  `idregistro` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_conta_cfpc`
--

CREATE TABLE `lnx_conta_cfpc` (
  `idempresa` int(11) NOT NULL,
  `opcion` varchar(50) NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_conta_ejercicios`
--

CREATE TABLE `lnx_conta_ejercicios` (
  `id` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `finicio` date NOT NULL,
  `ffin` date NOT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_conta_grupos`
--

CREATE TABLE `lnx_conta_grupos` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codgrupo` int(11) NOT NULL,
  `grupo` varchar(50) NOT NULL,
  `idempresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_conta_master`
--

CREATE TABLE `lnx_conta_master` (
  `id` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `subcuenta` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `modulo` varchar(50) NOT NULL,
  `idreg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_conta_subgrupos`
--

CREATE TABLE `lnx_conta_subgrupos` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `subgrupo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_crm_camp`
--

CREATE TABLE `lnx_crm_camp` (
  `id` int(11) NOT NULL,
  `camp` varchar(50) NOT NULL,
  `notas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_crm_seg`
--

CREATE TABLE `lnx_crm_seg` (
  `id` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `idcontacto` int(11) NOT NULL,
  `idcamp` int(11) NOT NULL,
  `seguimiento` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `llamada` int(11) NOT NULL,
  `visita` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `otros` int(11) NOT NULL,
  `rsseg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_crm_phonecalls`
--

CREATE TABLE `lnx_crm_phonecalls` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idcreado` int(11) NOT NULL,
  `idasignado` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `idcontacto` int(11) NOT NULL,
  `nota` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `telefono2` varchar(20) NOT NULL DEFAULT '',
  `idestado` int(11) NOT NULL DEFAULT '0',
  `idprioridad` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_cuentascajas`
--

CREATE TABLE `lnx_cuentascajas` (
  `id` int(11) NOT NULL,
  `idbanco` int(11) NOT NULL,
  `idbancotipo` int(11) NOT NULL,
  `cuenta` varchar(30) NOT NULL,
  `activo` int(11) NOT NULL,
  `ref` varchar(20) NOT NULL,
  `idempresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


insert into lnx_cuentascajas (id, idbanco, idbancotipo, cuenta, activo, ref, idempresa) values ('1', '0', '1', 'CAJA', '1', 'CAJA', '1');
insert into lnx_bancos_cpago (cpago, dias, diapago, idcuenta) values ('Contado', '0', '0', '0');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_dic_actividades`
--

CREATE TABLE `lnx_dic_actividades` (
  `id` int(11) NOT NULL,
  `actividad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_dic_docseries`
--

CREATE TABLE `lnx_dic_docseries` (
  `id` int(11) NOT NULL,
  `docserie` varchar(50) NOT NULL,
  `valor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lnx_dic_docseries` (`id`, `docserie`, `valor`) VALUES
(1, 'Oferta', 'O'),
(2, 'Pedidos', 'P'),
(3, 'Albaranes', 'A'),
(4, 'Facturas', 'F'),
(5, 'Facturas rectificativas', 'FR'),
(6, 'Proyectos', 'PY'),
(7, 'Partes de Trabajo', 'PT'),
(8, 'Serie TPV', 'TPV'),
(9, 'Contabilidad ejercicios', 'CONTAEXE'), 
(10, 'Gastos', 'GC'), 
(11, 'Viajes', 'V');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_dic_idiomas`
--

CREATE TABLE `lnx_dic_idiomas` (
  `id` int(11) NOT NULL,
  `idioma` varchar(50) NOT NULL,
  `fichero` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lnx_dic_idiomas` (`id`, `idioma`, `fichero`) VALUES (1, 'Castellano', 'es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_dic_lopd`
--

CREATE TABLE `lnx_dic_lopd` (
  `id` int(11) NOT NULL,
  `lopdcat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_dic_zonas`
--

CREATE TABLE `lnx_dic_zonas` (
  `id` int(11) NOT NULL,
  `zona` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indices de la tabla `lnx_dic_zonas`
--
ALTER TABLE `lnx_dic_zonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lnx_dic_zonas`
--
ALTER TABLE `lnx_dic_zonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_docprint`
--

CREATE TABLE `lnx_docprint` (
  `id` int(11) NOT NULL,
  `idmod` int(11) NOT NULL,
  `codinforme` varchar(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `idfileplantilla` int(11) NOT NULL,
  `idfileprocesador` int(11) NOT NULL,
  `idfilefodt` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `habilitado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `lnx_empresas`
--

CREATE TABLE `lnx_empresas` (
  `id` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `razonsocial` varchar(50) NOT NULL,
  `nomcomercial` varchar(50) NOT NULL,
  `nif` varchar(15) NOT NULL,
  `idpais` int(11) NOT NULL,
  `idprov` int(11) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `pobla` varchar(50) NOT NULL,
  `dir` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `responsable` varchar(50) NOT NULL,
  `nifresponsable` varchar(15) NOT NULL,
  `contabilidad` int(11) NOT NULL, 
  `regmer` varchar(250) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `lnx_empresas` (`id`, `activo`, `razonsocial`, `nomcomercial`, `nif`, `idpais`, `idprov`, `cp`, `pobla`, `dir`, `tel`, `email`, `responsable`, `nifresponsable`, `contabilidad`, `regmer`) VALUES
(1, 1, 'EMPRESA', 'EMPRESA', '0', '1', '8', '08221', 'Terrassa', '', '0', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fabricantes`
--

CREATE TABLE `lnx_fabricantes` (
  `id` int(11) NOT NULL,
  `fabricante` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fc`
--

CREATE TABLE `lnx_fc` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vencimiento` date NOT NULL,
  `idusuario` int(11) NOT NULL,
  `pagado` float NOT NULL,
  `editfv` int(11) NOT NULL,
  `factura` varchar(20) NOT NULL,
  `pc_cp` int(11) NOT NULL,
  `pc_dp` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fc_lineas`
--

CREATE TABLE `lnx_fc_lineas` (
  `id` int(11) NOT NULL,
  `idfc` int(11) NOT NULL,
  `cod` varchar(20) NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `unid` int(11) NOT NULL,
  `precio` float NOT NULL,
  `dto` int(11) NOT NULL,
  `importe` float NOT NULL,
  `orden` int(11) NOT NULL,
  `exclufactu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fc_lineas_tax`
--

CREATE TABLE `lnx_fc_lineas_tax` (
  `id` int(11) NOT NULL,
  `idfc` int(11) NOT NULL,
  `idfclinea` int(11) NOT NULL,
  `idtax` int(11) NOT NULL,
  `valor` float NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fc_pagos`
--

CREATE TABLE `lnx_fc_pagos` (
  `id` int(11) NOT NULL,
  `idfc` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` float NOT NULL,
  `idfpago` int(11) NOT NULL,
  `idcpago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fc_sn`
--

CREATE TABLE `lnx_fc_sn` (
  `id` int(11) NOT NULL,
  `idfc` int(11) NOT NULL,
  `idlinea` int(11) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `pn` varchar(50) NOT NULL,
  `otro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fc_tax`
--

CREATE TABLE `lnx_fc_tax` (
  `id` int(11) NOT NULL,
  `idfc` int(11) NOT NULL,
  `idimpuesto` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ficheros`
--

CREATE TABLE `lnx_ficheros` (
  `id` int(11) NOT NULL,
  `fichero` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `extension` varchar(4) NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8 NOT NULL,
  `tipomime` varchar(50) NOT NULL,
  `sincroniza` int(11) NOT NULL,
  `dirfichero` varchar(20) NOT NULL,
  `fsubido` datetime NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ficheros_config`
--

CREATE TABLE `lnx_ficheros_config` (
  `opcion` varchar(20) NOT NULL,
  `valor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lnx_ficheros_config` (`opcion`, `valor`) VALUES ('KW_MINCAR', '3');
INSERT INTO `lnx_ficheros_config` (`opcion`, `valor`) VALUES ('KW_MAXCAR', '30');
INSERT INTO `lnx_ficheros_config` (`opcion`, `valor`) VALUES ('KW_MINREP', '1');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ficheros_keyword`
--

CREATE TABLE `lnx_ficheros_keyword` (
  `idfichero` int(11) NOT NULL,
  `palabrasclave` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Indices de la tabla `lnx_ficheros_keyword`
--
ALTER TABLE `lnx_ficheros_keyword`
  ADD PRIMARY KEY (`idfichero`);
COMMIT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ficheros_cat`
--

CREATE TABLE `lnx_ficheros_cat` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ficheros_ext`
--

CREATE TABLE `lnx_ficheros_ext` (
  `id` int(11) NOT NULL,
  `extension` varchar(4) NOT NULL,
  `display` varchar(50) NOT NULL,
  `icono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('1', 'txt', 'Fichero de texto', 'txt.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('2', 'pdf', 'Documento PDF', 'pdf.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('3', 'fodt', 'LibreOffice Writer (XML)', 'odt.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('4', 'odt', 'LibreOffice Writer', 'odt.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('5', 'msg', 'Email - Archivo de Outlook', 'email.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('6', 'xlsx', 'Microsoft Excel', 'xls.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('7', '7z', 'Fichero comprimido 7z', 'zip.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('8', 'zip', 'Fichero comprimido ZIP', 'zip.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('9', 'php', 'Fichero PHP', 'php.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('10', 'doc', 'Documento Word 97-2003', 'doc.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('11', 'docx', 'Documento Word', 'doc.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('12', 'jpg', 'Imagen JPG', 'imagen.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('13', 'png', 'Imagen PNG', 'imagen.png');
INSERT INTO `lnx_ficheros_ext` (`id`, `extension`, `display`, `icono`) VALUES ('14', 'jpeg', 'Imagen JPG', 'imagen.png');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ficheros_loc`
--

CREATE TABLE `lnx_ficheros_loc` (
  `id` int(11) NOT NULL,
  `idfichero` int(11) NOT NULL,
  `module` varchar(20) NOT NULL,
  `idlinea0` int(11) NOT NULL,
  `idlinea1` int(11) NOT NULL,
  `idlinea2` int(11) NOT NULL,
  `display` varchar(50) CHARACTER SET utf8 NOT NULL,
  `publico` int(11) NOT NULL,
  `idcat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ficheros_perm`
--

CREATE TABLE `lnx_ficheros_perm` (
  `idfichero` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_flota`
--

CREATE TABLE `lnx_flota` (
  `id` int(11) NOT NULL,
  `vehiculo` varchar(50) NOT NULL,
  `matricula` varchar(10) NOT NULL, 
  `kms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_formaspago`
--

CREATE TABLE `lnx_formaspago` (
  `id` int(11) NOT NULL,
  `formapago` varchar(20) NOT NULL, 
  `idcuentacaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fv`
--

CREATE TABLE `lnx_fv` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vencimiento` date NOT NULL,
  `idusuario` int(11) NOT NULL,
  `pagado` float NOT NULL,
  `editfv` int(11) NOT NULL,
  `pc_cp` int(11) NOT NULL,
  `pc_dp` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fvr`
--

CREATE TABLE `lnx_fvr` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vencimiento` date NOT NULL,
  `idusuario` int(11) NOT NULL,
  `pagado` float NOT NULL,
  `editfv` int(11) NOT NULL,
  `pc_cp` int(11) NOT NULL,
  `pc_dp` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fvr_lineas`
--

CREATE TABLE `lnx_fvr_lineas` (
  `id` int(11) NOT NULL,
  `idfvr` int(11) NOT NULL,
  `cod` varchar(20) NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `unid` int(11) NOT NULL,
  `precio` float NOT NULL,
  `dto` int(11) NOT NULL,
  `importe` float NOT NULL,
  `orden` int(11) NOT NULL,
  `exclufactu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fvr_lineas_tax`
--

CREATE TABLE `lnx_fvr_lineas_tax` (
  `id` int(11) NOT NULL,
  `idfvr` int(11) NOT NULL,
  `idfvrlinea` int(11) NOT NULL,
  `idtax` int(11) NOT NULL,
  `valor` float NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fvr_pagos`
--

CREATE TABLE `lnx_fvr_pagos` (
  `id` int(11) NOT NULL,
  `idfvr` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` float NOT NULL,
  `idfpago` int(11) NOT NULL,
  `idcpago` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fvr_sn`
--

CREATE TABLE `lnx_fvr_sn` (
  `id` int(11) NOT NULL,
  `idfvr` int(11) NOT NULL,
  `idlinea` int(11) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `pn` varchar(50) NOT NULL,
  `otro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fvr_tax`
--

CREATE TABLE `lnx_fvr_tax` (
  `id` int(11) NOT NULL,
  `idfvr` int(11) NOT NULL,
  `idimpuesto` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fv_lineas`
--

CREATE TABLE `lnx_fv_lineas` (
  `id` int(11) NOT NULL,
  `idfv` int(11) NOT NULL,
  `cod` varchar(20) NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `unid` int(11) NOT NULL,
  `precio` float NOT NULL,
  `dto` int(11) NOT NULL,
  `importe` float NOT NULL,
  `orden` int(11) NOT NULL,
  `exclufactu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fv_lineas_tax`
--

CREATE TABLE `lnx_fv_lineas_tax` (
  `id` int(11) NOT NULL,
  `idfv` int(11) NOT NULL,
  `idfvlinea` int(11) NOT NULL,
  `idtax` int(11) NOT NULL,
  `valor` float NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fv_pagos`
--

CREATE TABLE `lnx_fv_pagos` (
  `id` int(11) NOT NULL,
  `idfv` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` float NOT NULL,
  `idfpago` int(11) NOT NULL,
  `idcpago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fv_sn`
--

CREATE TABLE `lnx_fv_sn` (
  `id` int(11) NOT NULL,
  `idfv` int(11) NOT NULL,
  `idlinea` int(11) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `pn` varchar(50) NOT NULL,
  `otro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_fv_tax`
--

CREATE TABLE `lnx_fv_tax` (
  `id` int(11) NOT NULL,
  `idfv` int(11) NOT NULL,
  `idimpuesto` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_groups`
--

CREATE TABLE `lnx_groups` (
  `id` int(11) NOT NULL,
  `grupo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_groupsasignar`
--

CREATE TABLE `lnx_groupsasignar` (
  `id` int(11) NOT NULL,
  `idgrupo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `display` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_dic_historico_cfg`
--

CREATE TABLE `lnx_dic_historico_cfg` (
  `id` int(11) NOT NULL,
  `tabla` varchar(50) NOT NULL,
  `campoid` varchar(50) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL, 
  `url` varchar(100) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_hr_nom`
--

CREATE TABLE `lnx_hr_nom` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idempresa` int(11) NOT NULL, 
  `idtercero` int(11) NOT NULL, 
  `idcontacto` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `idasignado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_impresoras`
--

CREATE TABLE `lnx_impresoras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `tipo` int(11) NOT NULL,
  `notas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_impuestos`
--

CREATE TABLE `lnx_impuestos` (
  `id` int(11) NOT NULL,
  `impuesto` varchar(20) NOT NULL,
  `valor` decimal(10,2) NOT NULL DEFAULT '0.00',
  `activo` int(11) NOT NULL DEFAULT '1',
  `codigo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lnx_impuestos` (`id`, `impuesto`, `valor`, `activo`, `codigo`) VALUES (1, 'IVA', '21.00', 1, '');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_impuestosrules`
--

CREATE TABLE `lnx_impuestosrules` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `idimpuesto` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `requerido` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `editable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ita_activos`
--

CREATE TABLE `lnx_ita_activos` (
  `id` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `idcontacto` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `plantilla` varchar(50) NOT NULL,
  `falta` date NOT NULL,
  `fcaducidad` date NOT NULL,
  `avisar` int(11) NOT NULL,
  `faviso` date NOT NULL,
  `notas` varchar(250) NOT NULL, 
  `tratarcomo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ita_activos_vinc`
--

CREATE TABLE `lnx_ita_activos_vinc` (
  `idactivo` int(11) NOT NULL,
  `idvinculado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ita_caracteristicas`
--

CREATE TABLE `lnx_ita_caracteristicas` (
  `id` int(11) NOT NULL,
  `idactivo` int(11) NOT NULL,
  `opcion` varchar(50) NOT NULL,
  `valor` varchar(200) NULL,
  `valor2` varchar(50) NULL,
  `valor3` varchar(50) NULL,
  `valor4` varchar(50) NULL,
  `color` varchar(8) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ita_estados`
--

CREATE TABLE `lnx_ita_estados` (
  `id` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lnx_ita_estados` (`id`, `estado`) VALUES ('1', 'En servicio');
INSERT INTO `lnx_ita_estados` (`id`, `estado`) VALUES ('2', 'En reparación');
INSERT INTO `lnx_ita_estados` (`id`, `estado`) VALUES ('3', 'Dado de baja');
INSERT INTO `lnx_ita_estados` (`id`, `estado`) VALUES ('4', 'En prestamo');
INSERT INTO `lnx_ita_estados` (`id`, `estado`) VALUES ('5', 'No gestionado');
INSERT INTO `lnx_ita_estados` (`id`, `estado`) VALUES ('6', 'Disponible');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ita_pro`
--

CREATE TABLE `lnx_ita_pro` (
  `id` int(11) NOT NULL,
  `idactivo` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `notas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ita_tickets`
--

CREATE TABLE `lnx_ita_tickets` (
  `id` int(11) NOT NULL,
  `idticket` int(11) NOT NULL,
  `idactivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ita_tipos`
--

CREATE TABLE `lnx_ita_tipos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_itc_tipos`
--

CREATE TABLE `lnx_itc_tipos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_categorias`
--

CREATE TABLE `lnx_it_categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_colas`
--

CREATE TABLE `lnx_it_colas` (
  `id` int(11) NOT NULL,
  `cola` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_colas_perm`
--

CREATE TABLE `lnx_it_colas_perm` (
  `idcola` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_docum`
--

CREATE TABLE `lnx_it_docum` (
  `id` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `fcreado` datetime NOT NULL,
  `fmodificado` datetime NOT NULL,
  `iditcat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_docum_lines`
--

CREATE TABLE `lnx_it_docum_lines` (
  `id` int(11) NOT NULL,
  `iddocum` int(11) NOT NULL,
  `documentacion` longblob NOT NULL,
  `fcreado` datetime NOT NULL,
  `iduser` int(11) NOT NULL,
  `fmodificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_infopass`
--

CREATE TABLE `lnx_it_infopass` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `donde` varchar(50) NOT NULL,
  `notas` varchar(50) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `urlweb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_infopass_perm`
--

CREATE TABLE `lnx_it_infopass_perm` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idgrupo` int(11) NOT NULL,
  `idinfopass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_licensing`
--

CREATE TABLE `lnx_it_licensing` (
  `id` int(11) NOT NULL,
  `idactivo` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `licencia` varchar(50) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `fecha` date NOT NULL, 
  `cantidad` int(11) NOT NULL,
  `idinfopass` int(11) NOT NULL, 
  `idlic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_mant`
--

CREATE TABLE `lnx_it_mant` (
  `id` int(11) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `finicio` date NOT NULL,
  `ffin` date NOT NULL,
  `hcontratado` time NOT NULL,
  `hrestantes` time NOT NULL,
  `descripcion` text,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_seguimiento`
--

CREATE TABLE `lnx_it_seguimiento` (
  `id` int(11) NOT NULL,
  `idticket` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seguimiento` longtext NOT NULL,
  `tiempo` time NOT NULL,
  `computa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_tickets`
--

CREATE TABLE `lnx_it_tickets` (
  `id` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `resumen` varchar(50) NOT NULL,
  `idasignado` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  `problema` longtext NOT NULL,
  `solucion` longtext NOT NULL,
  `idafectado` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idprioridad` int(11) NOT NULL,
  `fcreacion` datetime NOT NULL,
  `fmodificacion` datetime NOT NULL,
  `fcierre` datetime NOT NULL,
  `idmant` int(11) NOT NULL,
  `idfv` int(11) NOT NULL DEFAULT '0',
  `idtercero` int(11) NOT NULL,
  `tremoto` varchar(50) NOT NULL,
  `idcola` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_tipomant`
--

CREATE TABLE `lnx_it_tipomant` (
  `id` int(11) NOT NULL,
  `tipomant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_it_tipos`
--

CREATE TABLE `lnx_it_tipos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lnx_it_tipos` (`id`, `tipo`, `activo`) VALUES ('1', 'Incidencia', '1');
INSERT INTO `lnx_it_tipos` (`id`, `tipo`, `activo`) VALUES ('2', 'Solicitud', '1');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_lopd`
--

CREATE TABLE `lnx_lopd` (
  `id` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `idcatlopd` int(11) NOT NULL,
  `nomdoc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_menus`
--

CREATE TABLE `lnx_menus` (
  `id` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `section` varchar(20) NOT NULL DEFAULT '-',
  `display` varchar(50) NOT NULL,
  `orden` int(11) NOT NULL DEFAULT '0',
  `idpermiso` int(11) NOT NULL DEFAULT '0',
  `icono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `lnx_menus` (`id`, `idmenu`, `module`, `section`, `display`, `orden`, `idpermiso`, `icono`) VALUES
(1, 0, 'core', '-', 'Configuracion', 98, 7000, 'cogs '),
(8, 0, 'terceros', '-', 'Terceros', 0, 2000, 'address-card'),
(13, 0, 'about', '-', 'Acerca de', 99, 100, 'info '),
(14, 0, '0', '-', 'Financiera', 2, 32, 'money-bill'),
(15, 14, 'bancos', '-', 'Bancos / Cajas', 0, 33, ''),
(16, 0, 'userpanel', '-', 'Panel de usuario', 97, 6000, 'user-circle '),
(17, 0, '0', '-', 'Ventas', 2, 9, 'store-alt'),
(18, 17, 'ov', '-', 'Presupuestos', 0, 701, 'file-alt'),
(24, 0, 'lnxit', '-', 'Gestion y soporte', 6, 4000, 'desktop'),
(25, 17, 'av', '-', 'Albaranes', 2, 45, ''),
(26, 17, 'pv', '-', 'Pedidos', 1, 800, 'file-alt'),
(27, 17, 'fv', '-', 'Facturas', 3, 9000, 'file-alt'),
(28, 17, 'fvr', '-', 'Facturas rectificativas', 4, 9100, ''),
(29, 14, 'conta', '-', 'Contabilidad', 2, 200, ''),
(30, 0, 'viajes', '-', 'Desplazamientos', 7, 555, ''),
(31, 0, '0', '-', 'Compras', 4, 8, 'shopping-cart '),
(32, 31, 'fc', '-', 'Facturas', 2, 8000, ''),
(33, 14, 'balance', '-', 'Balance', 3, 200, ''),
(36, 0, 'almacen', '', 'Almacen', 2, 3000, 'warehouse '),
(37, 31, 'ac', '-', 'Albaranes', 1, 44, ''),
(40, 17, 'tpv', '-', 'TPV', 5, 200, 'desktop'),
(43, 0, 'hr', '-', 'RRHH', 8, 5000, 'user-tie');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_menus_lang`
--

CREATE TABLE `lnx_menus_lang` (
  `idmenu` int(11) NOT NULL,
  `idlang` int(11) NOT NULL,
  `etiqueta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_modulos`
--

CREATE TABLE `lnx_modulos` (
  `id` int(11) NOT NULL,
  `idmod` int(11) NOT NULL,
  `display` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '0',
  `directorio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_oc`
--

CREATE TABLE `lnx_oc` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vencimiento` date NOT NULL,
  `idusuario` int(11) NOT NULL,
  `pagado` float NOT NULL,
  `editfv` int(11) NOT NULL,
  `factura` varchar(20) NOT NULL,
  `pc_cp` int(11) NOT NULL,
  `pc_dp` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_oc_lineas`
--

CREATE TABLE `lnx_oc_lineas` (
  `id` int(11) NOT NULL,
  `idoc` int(11) NOT NULL,
  `cod` varchar(20) NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `unid` int(11) NOT NULL,
  `precio` float NOT NULL,
  `dto` int(11) NOT NULL,
  `importe` float NOT NULL,
  `orden` int(11) NOT NULL,
  `exclufactu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_oc_lineas_tax`
--

CREATE TABLE `lnx_oc_lineas_tax` (
  `id` int(11) NOT NULL,
  `idoc` int(11) NOT NULL,
  `idoclinea` int(11) NOT NULL,
  `idtax` int(11) NOT NULL,
  `valor` float NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_oc_pagos`
--

CREATE TABLE `lnx_oc_pagos` (
  `id` int(11) NOT NULL,
  `idoc` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` float NOT NULL,
  `idfpago` int(11) NOT NULL,
  `idcpago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_oc_sn`
--

CREATE TABLE `lnx_oc_sn` (
  `id` int(11) NOT NULL,
  `idoc` int(11) NOT NULL,
  `idlinea` int(11) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `pn` varchar(50) NOT NULL,
  `otro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_oc_tax`
--

CREATE TABLE `lnx_oc_tax` (
  `id` int(11) NOT NULL,
  `idoc` int(11) NOT NULL,
  `idimpuesto` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_opafr`
--

CREATE TABLE `lnx_opafr` (
  `tipoa` varchar(10) NOT NULL,
  `idtipoa` int(11) NOT NULL,
  `tipob` varchar(10) NOT NULL,
  `idtipob` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ov`
--

CREATE TABLE `lnx_ov` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vencimiento` date NOT NULL,
  `idusuario` int(11) NOT NULL,
  `pagado` float NOT NULL,
  `editfv` int(11) NOT NULL,
  `pc_cp` int(11) NOT NULL,
  `pc_dp` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ov_lineas`
--

CREATE TABLE `lnx_ov_lineas` (
  `id` int(11) NOT NULL,
  `idov` int(11) NOT NULL,
  `cod` varchar(20) NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `unid` int(11) NOT NULL,
  `precio` float NOT NULL,
  `dto` int(11) NOT NULL,
  `importe` float NOT NULL,
  `orden` int(11) NOT NULL,
  `exclufactu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ov_lineas_tax`
--

CREATE TABLE `lnx_ov_lineas_tax` (
  `id` int(11) NOT NULL,
  `idov` int(11) NOT NULL,
  `idovlinea` int(11) NOT NULL,
  `idtax` int(11) NOT NULL,
  `valor` float NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ov_pagos`
--

CREATE TABLE `lnx_ov_pagos` (
  `id` int(11) NOT NULL,
  `idov` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` float NOT NULL,
  `idfpago` int(11) NOT NULL,
  `idcpago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ov_sn`
--

CREATE TABLE `lnx_ov_sn` (
  `id` int(11) NOT NULL,
  `idov` int(11) NOT NULL,
  `idlinea` int(11) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `pn` varchar(50) NOT NULL,
  `otro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_ov_tax`
--

CREATE TABLE `lnx_ov_tax` (
  `id` int(11) NOT NULL,
  `idov` int(11) NOT NULL,
  `idimpuesto` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_paises`
--

CREATE TABLE `lnx_paises` (
  `id` int(11) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lnx_paises` (`id`, `pais`) VALUES (1, 'España');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_partes`
--

CREATE TABLE `lnx_partes` (
  `id` int(11) NOT NULL,
  `idticket` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `fechain` datetime NOT NULL,
  `fechaout` datetime NOT NULL,
  `descripcion` blob NOT NULL,
  `nomfirma` varchar(50) NOT NULL,
  `mailfirma` varchar(250) NOT NULL,
  `remoto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_partes_config`
--

CREATE TABLE `lnx_partes_config` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `ftpserver` varchar(50) NOT NULL,
  `ftpusername` varchar(50) NOT NULL,
  `ftppassword` varchar(50) NOT NULL,
  `ftpsyncin` varchar(250) NOT NULL,
  `ftpsyncout` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_partes_old`
--

CREATE TABLE `lnx_partes_old` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `idtecnico` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horain` time NOT NULL,
  `horaout` time NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `material` mediumtext NOT NULL,
  `importe` float NOT NULL,
  `pagado` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firmanombre` varchar(50) NOT NULL,
  `firmanif` varchar(20) NOT NULL,
  `finalizado` int(11) NOT NULL,
  `plantilla` varchar(50) NOT NULL,
  `fcontrol` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idflota` int(11) NOT NULL,
  `kms` int(11) NOT NULL,
  `desplazaimp` float NOT NULL,
  `razonsocial` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_permisos`
--

CREATE TABLE `lnx_permisos` (
  `id` int(11) NOT NULL,
  `idmod` int(11) NOT NULL DEFAULT '0',
  `idpermiso` int(11) NOT NULL DEFAULT '0',
  `display` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_permisosgrupos`
--

CREATE TABLE `lnx_permisosgrupos` (
  `iduser` int(11) NOT NULL,
  `idgrupo` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '0');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '8');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '9');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '100');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '101');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '1000');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2000');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2001');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2002');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2003');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2004');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2005');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2006');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2007');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2008');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2009');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2010');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2011');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2012');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '2013');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '3000');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '4000');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '4100');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '4200');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '4300');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '4400');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '4500');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '4600');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '4700');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '4800');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '4801');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '5000');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '5001');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '5100');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '5101');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '6000');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '7000');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '7001');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '7002');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '7003');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '8000');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '8000');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '8100');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '8200');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '8300');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '9000');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '9000');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '9100');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '9200');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '9300');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '9400');
INSERT INTO `lnx_permisosgrupos` (`iduser`, `idgrupo`, `idpermiso`) values ('1', '0', '9500');




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_poblaciones`
--

CREATE TABLE `lnx_poblaciones` (
  `id` int(11) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `poblacion` varchar(50) NOT NULL,
  `idprov` int(11) NOT NULL,
  `idpais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `lnx_poblaciones` (`id`, `cp`, `poblacion`, `idprov`, `idpais`) VALUES
(1, '01001', 'Vitoria-gasteiz', 1, 1),
(2, '01002', 'Vitoria-gasteiz', 1, 1),
(3, '01003', 'Vitoria-gasteiz', 1, 1),
(4, '01004', 'Vitoria-gasteiz', 1, 1),
(5, '01005', 'Vitoria-gasteiz', 1, 1),
(6, '01006', 'Vitoria-gasteiz', 1, 1),
(7, '01007', 'Vitoria-gasteiz', 1, 1),
(8, '01008', 'Vitoria-gasteiz', 1, 1),
(9, '01009', 'Vitoria-gasteiz', 1, 1),
(10, '01010', 'Vitoria-gasteiz', 1, 1),
(11, '01012', 'Vitoria-gasteiz', 1, 1),
(12, '01012', 'Vitoria-gasteiz', 1, 1),
(13, '01013', 'Vitoria-gasteiz', 1, 1),
(14, '01015', 'Vitoria-gasteiz', 1, 1),
(15, '01110', 'Santikurutze Kanpezu', 1, 1),
(16, '01117', 'Valle De Arana', 1, 1),
(17, '01117', 'Valle De Arana', 1, 1),
(18, '01118', 'Obecuri', 1, 1),
(19, '01118', 'Obecuri', 1, 1),
(20, '01120', 'Maeztu/maestu', 1, 1),
(21, '01128', 'San Roman De Campezo', 1, 1),
(22, '01128', 'San Roman De Campezo', 1, 1),
(23, '01128', 'San Roman De Campezo', 1, 1),
(24, '01129', 'Zekuiano', 1, 1),
(25, '01130', 'Zuia', 1, 1),
(26, '01138', 'Zigoitia', 1, 1),
(27, '01139', 'Zarate', 1, 1),
(28, '01160', 'Ibarra', 1, 1),
(29, '01165', 'Oleta', 1, 1),
(30, '01169', 'Uribarri', 1, 1),
(31, '01170', 'Urrunaga', 1, 1),
(32, '01171', 'Legutio', 1, 1),
(33, '01191', 'Uribarri-dibiÑa', 1, 1),
(34, '01191', 'Uribarri-dibiÑa', 1, 1),
(35, '01192', 'Zerio', 1, 1),
(36, '01192', 'Zerio', 1, 1),
(37, '01193', 'Villafranca', 1, 1),
(38, '01193', 'Villafranca', 1, 1),
(39, '01193', 'Villafranca', 1, 1),
(40, '01193', 'Villafranca', 1, 1),
(41, '01194', 'Uribarri Nagusia', 1, 1),
(42, '01194', 'Uribarri Nagusia', 1, 1),
(43, '01195', 'Zumeltzu', 1, 1),
(44, '01195', 'Zumeltzu', 1, 1),
(45, '01196', 'Yurre/ihurre', 1, 1),
(46, '01196', 'Yurre/ihurre', 1, 1),
(47, '01200', 'Salvatierra', 1, 1),
(48, '01206', 'Ozaeta', 1, 1),
(49, '01206', 'Ozaeta', 1, 1),
(50, '01207', 'Uribarri-jauregi', 1, 1),
(51, '01207', 'Uribarri-jauregi', 1, 1),
(52, '01207', 'Uribarri-jauregi', 1, 1),
(53, '01208', 'Zuhatzu Donemiliaga', 1, 1),
(54, '01208', 'Zuhatzu Donemiliaga', 1, 1),
(55, '01208', 'Zuhatzu Donemiliaga', 1, 1),
(56, '01208', 'Zuhatzu Donemiliaga', 1, 1),
(57, '01211', 'Moraza', 1, 1),
(58, '01211', 'Moraza', 1, 1),
(59, '01211', 'Moraza', 1, 1),
(60, '01211', 'Moraza', 1, 1),
(61, '01212', 'Zambrana', 1, 1),
(62, '01212', 'Zambrana', 1, 1),
(63, '01212', 'Zambrana', 1, 1),
(64, '01212', 'Zambrana', 1, 1),
(65, '01213', 'Zubillaga', 1, 1),
(66, '01213', 'Zubillaga', 1, 1),
(67, '01213', 'Zubillaga', 1, 1),
(68, '01216', 'Urarte', 1, 1),
(69, '01216', 'Urarte', 1, 1),
(70, '01220', 'Ribaguda', 1, 1),
(71, '01220', 'Ribaguda', 1, 1),
(72, '01220', 'Ribaguda', 1, 1),
(73, '01220', 'Ribaguda', 1, 1),
(74, '01230', 'Nanclares De La Oca', 1, 1),
(75, '01250', 'Asparrena', 1, 1),
(76, '01260', 'Urabain', 1, 1),
(77, '01300', 'Laguardia', 1, 1),
(78, '01306', 'Lapuebla De Labarca', 1, 1),
(79, '01307', 'Villabuena De Alava', 1, 1),
(80, '01307', 'Villabuena De Alava', 1, 1),
(81, '01307', 'Villabuena De Alava', 1, 1),
(82, '01308', 'ViÑaspre', 1, 1),
(83, '01308', 'ViÑaspre', 1, 1),
(84, '01308', 'ViÑaspre', 1, 1),
(85, '01309', 'Paganos', 1, 1),
(86, '01309', 'Paganos', 1, 1),
(87, '01309', 'Paganos', 1, 1),
(88, '01309', 'Paganos', 1, 1),
(89, '01320', 'Oyon', 1, 1),
(90, '01321', 'Laserna', 1, 1),
(91, '01322', 'Yecora / Iekora', 1, 1),
(92, '01322', 'Yecora / Iekora', 1, 1),
(93, '01322', 'Yecora / Iekora', 1, 1),
(94, '01330', 'Labastida', 1, 1),
(95, '01340', 'Elciego', 1, 1),
(96, '01400', 'Laudio/llodio', 1, 1),
(97, '01408', 'Luiaondo', 1, 1),
(98, '01409', 'Zudubiarte', 1, 1),
(99, '01420', 'Ribera Alta', 1, 1),
(100, '01423', 'Villambrosa', 1, 1),
(101, '01423', 'Villambrosa', 1, 1),
(102, '01423', 'Villambrosa', 1, 1),
(103, '01423', 'Villambrosa', 1, 1),
(104, '01426', 'Viloria', 1, 1),
(105, '01426', 'Viloria', 1, 1),
(106, '01426', 'Viloria', 1, 1),
(107, '01427', 'Villafria De San Zadornil', 1, 1),
(108, '01428', 'Villaluenga', 1, 1),
(109, '01428', 'Villaluenga', 1, 1),
(110, '01428', 'Villaluenga', 1, 1),
(111, '01430', 'Zuhatzu Kuartango', 1, 1),
(112, '01439', 'Villamanca', 1, 1),
(113, '01440', 'Urkabustaiz', 1, 1),
(114, '01449', 'Uzkiano', 1, 1),
(115, '01450', 'Ziorraga', 1, 1),
(116, '01450', 'Ziorraga', 1, 1),
(117, '01450', 'Ziorraga', 1, 1),
(118, '01468', 'Tertanga', 1, 1),
(119, '01470', 'Etxegoien', 1, 1),
(120, '01470', 'Etxegoien', 1, 1),
(121, '01474', 'Artziniega', 1, 1),
(122, '01476', 'Respaldiza', 1, 1),
(123, '01477', 'Zuhatza', 1, 1),
(124, '01478', 'Soxoguti', 1, 1),
(125, '01478', 'Soxoguti', 1, 1),
(126, '01479', 'Salmanton', 1, 1),
(127, '01510', 'Ziriano', 1, 1),
(128, '01510', 'Ziriano', 1, 1),
(129, '01510', 'Ziriano', 1, 1),
(130, '01520', 'Zurbao', 1, 1),
(131, '01520', 'Zurbao', 1, 1),
(132, '02001', 'Albacete', 2, 1),
(133, '02002', 'Albacete', 2, 1),
(134, '02003', 'Albacete', 2, 1),
(135, '02004', 'Albacete', 2, 1),
(136, '02005', 'Albacete', 2, 1),
(137, '02006', 'Albacete', 2, 1),
(138, '02008', 'Albacete', 2, 1),
(139, '02049', 'Albacete', 2, 1),
(140, '02071', 'Albacete', 2, 1),
(141, '02099', 'Pozo Cañada', 2, 1),
(142, '02099', 'Albacete', 2, 1),
(143, '02100', 'Tarazona De La Mancha', 2, 1),
(144, '02110', 'Grajuela, La', 2, 1),
(145, '02110', 'Grajuela, La', 2, 1),
(146, '02120', 'PeÑas De San Pedro', 2, 1),
(147, '02124', 'Noguera, La', 2, 1),
(148, '02124', 'Noguera, La', 2, 1),
(149, '02124', 'Noguera, La', 2, 1),
(150, '02125', 'Royo Odrea', 2, 1),
(151, '02126', 'Ayna', 2, 1),
(152, '02127', 'Solana, La', 2, 1),
(153, '02128', 'Peñas de San Pedro', 2, 1),
(154, '02128', 'Alcadozo', 2, 1),
(155, '02129', 'Santa Ana (fuente Del Pino)', 2, 1),
(156, '02130', 'Bogarra', 2, 1),
(157, '02136', 'Paterna De Madera', 2, 1),
(158, '02137', 'Rio Madera', 2, 1),
(160, '02138', 'Paterna del Madera', 2, 1),
(161, '02138', 'Bogarra', 2, 1),
(162, '02139', 'Villarejo, El', 2, 1),
(163, '02139', 'Villarejo, El', 2, 1),
(164, '02140', 'Albacete', 2, 1),
(165, '02141', 'Pozohondo', 2, 1),
(166, '02142', 'Nava De Arriba', 2, 1),
(167, '02142', 'Nava De Arriba', 2, 1),
(168, '02150', 'Valdeganga', 2, 1),
(169, '02151', 'Casas De Juan NuÑez', 2, 1),
(170, '02152', 'Alatoz', 2, 1),
(171, '02153', 'Casas De Juan Gil', 2, 1),
(172, '02154', 'Villavaliente', 2, 1),
(173, '02154', 'Villavaliente', 2, 1),
(174, '02155', 'Tinajeros', 2, 1),
(175, '02156', 'Felipa, La', 2, 1),
(176, '02160', 'Lezuza', 2, 1),
(177, '02161', 'Yunquera, La', 2, 1),
(178, '02162', 'Oncebreros (la Herrera)', 2, 1),
(179, '02200', 'Casas-ibaÑez', 2, 1),
(180, '02210', 'Alcala Del Jucar', 2, 1),
(181, '02211', 'Tolosa', 2, 1),
(182, '02212', 'Casas De Ves', 2, 1),
(183, '02213', 'Villa De Ves', 2, 1),
(184, '02213', 'Villa De Ves', 2, 1),
(185, '02214', 'Zulema', 2, 1),
(186, '02214', 'Zulema', 2, 1),
(187, '02215', 'Villatoya', 2, 1),
(188, '02215', 'Villatoya', 2, 1),
(189, '02220', 'Motilleja', 2, 1),
(190, '02230', 'Madrigueras', 2, 1),
(191, '02240', 'Mahora', 2, 1),
(192, '02246', 'Navas De Jorquera', 2, 1),
(193, '02247', 'Cenizate', 2, 1),
(194, '02248', 'Jorquera', 2, 1),
(195, '02249', 'Ribera De Cubas', 2, 1),
(196, '02249', 'Ribera De Cubas', 2, 1),
(197, '02249', 'Ribera De Cubas', 2, 1),
(198, '02250', 'Abengibre', 2, 1),
(199, '02251', 'Campoalbillo', 2, 1),
(200, '02252', 'Mariminguez', 2, 1),
(201, '02253', 'Golosalvo', 2, 1),
(202, '02260', 'Fuentealbilla', 2, 1),
(203, '02270', 'Villamalea', 2, 1),
(204, '02300', 'Alcaraz', 2, 1),
(205, '02310', 'Viveros', 2, 1),
(206, '02311', 'Povedilla', 2, 1),
(207, '02312', 'Mesta De Alcaraz, La', 2, 1),
(208, '02313', 'PeÑascosa', 2, 1),
(209, '02314', 'Zorio', 2, 1),
(210, '02314', 'Zorio', 2, 1),
(211, '02314', 'Zorio', 2, 1),
(212, '02315', 'Vianos', 2, 1),
(213, '02316', 'Salobre', 2, 1),
(214, '02320', 'Balazote', 2, 1),
(215, '02326', 'San Pedro', 2, 1),
(216, '02327', 'Zarza, La', 2, 1),
(217, '02328', 'Santa Ana', 2, 1),
(218, '02329', 'Cucharal', 2, 1),
(219, '02330', 'Alcaraz', 2, 1),
(220, '02331', 'Robledo', 2, 1),
(221, '02332', 'Robledo', 2, 1),
(222, '02340', 'Robledo', 2, 1),
(223, '02350', 'Villapalacios', 2, 1),
(224, '02360', 'Bienservida', 2, 1),
(225, '02400', 'Hellin', 2, 1),
(226, '02409', 'Nava CampaÑa', 2, 1),
(227, '02410', 'Lietor', 2, 1),
(228, '02420', 'Isso', 2, 1),
(229, '02430', 'Elche De La Sierra', 2, 1),
(230, '02434', 'Letur', 2, 1),
(231, '02435', 'Socovos', 2, 1),
(232, '02436', 'Ferez', 2, 1),
(233, '02437', 'Tazona', 2, 1),
(234, '02439', 'Villares', 2, 1),
(235, '02440', 'Molinicos', 2, 1),
(236, '02448', 'Yeguarizas, Las', 2, 1),
(237, '02448', 'Yeguarizas, Las', 2, 1),
(238, '02449', 'Torre Pedro', 2, 1),
(239, '02449', 'Torre Pedro', 2, 1),
(240, '02450', 'Riopar', 2, 1),
(241, '02459', 'Villar, El', 2, 1),
(242, '02459', 'Villar, El', 2, 1),
(243, '02460', 'Villaverde De Guadalimar', 2, 1),
(244, '02461', 'Cotillas', 2, 1),
(245, '02462', 'Umbria Angulo', 2, 1),
(246, '02462', 'Umbria Angulo', 2, 1),
(247, '02470', 'Elche de la Sierra', 2, 1),
(248, '02480', 'Yeste', 2, 1),
(249, '02482', 'Yeste', 2, 1),
(250, '02484', 'Arguellite', 2, 1),
(251, '02485', 'Tus', 2, 1),
(252, '02486', 'Rala', 2, 1),
(253, '02487', 'Sege', 2, 1),
(254, '02488', 'Yeste', 2, 1),
(255, '02489', 'Paules', 2, 1),
(256, '02490', 'Agramon', 2, 1),
(257, '02498', 'Hell', 2, 1),
(258, '02499', 'Minateda', 2, 1),
(259, '02500', 'Tobarra', 2, 1),
(260, '02510', 'Pozo CaÑada', 2, 1),
(261, '02510', 'Pozo CaÑada', 2, 1),
(262, '02511', 'Campillo De Las Doblas', 2, 1),
(263, '02512', 'Pinilla', 2, 1),
(264, '02513', 'Sierra', 2, 1),
(265, '02514', 'Tobarra', 2, 1),
(266, '02520', 'Chinchilla De Monte Aragon', 2, 1),
(267, '02529', 'Chinchilla de Monte-Arag', 2, 1),
(268, '02530', 'Nerpio', 2, 1),
(269, '02534', 'Pedro Andres', 2, 1),
(270, '02535', 'Nerpio', 2, 1),
(271, '02536', 'Yetas De Abajo', 2, 1),
(272, '02537', 'Nerpio', 2, 1),
(273, '02538', 'Nerpio', 2, 1),
(274, '02539', 'Nerpio', 2, 1),
(275, '02600', 'Villarrobledo', 2, 1),
(276, '02610', 'Bonillo, El', 2, 1),
(277, '02611', 'Ossa De Montiel', 2, 1),
(278, '02612', 'Munera', 2, 1),
(279, '02612', 'Munera', 2, 1),
(280, '02613', 'El Bonillo', 2, 1),
(281, '02614', 'Ballestero, El', 2, 1),
(282, '02620', 'Minaya', 2, 1),
(283, '02630', 'Roda, La', 2, 1),
(284, '02636', 'Villalgordo Del Jucar', 2, 1),
(285, '02637', 'Fuensanta', 2, 1),
(286, '02638', 'Montalvos', 2, 1),
(287, '02639', 'Santa Marta', 2, 1),
(288, '02639', 'Santa Marta', 2, 1),
(289, '02640', 'Almansa', 2, 1),
(290, '02650', 'Montealegre Del Castillo', 2, 1),
(291, '02651', 'Fuente-alamo', 2, 1),
(292, '02652', 'Ontur', 2, 1),
(293, '02653', 'Albatana', 2, 1),
(294, '02660', 'Caudete', 2, 1),
(295, '02690', 'Alpera', 2, 1),
(296, '02690', 'Alpera', 2, 1),
(297, '02691', 'Horna', 2, 1),
(298, '02692', 'Petrola', 2, 1),
(299, '02692', 'Petrola', 2, 1),
(300, '02693', 'Higuera, La', 2, 1),
(301, '02694', 'Higueruela', 2, 1),
(302, '02695', 'Villar De Chinchilla', 2, 1),
(303, '02696', 'Hoya Gonzalo', 2, 1),
(304, '02999', 'Ayna', 2, 1),
(305, '03001', 'Alacant-alicante', 3, 1),
(306, '03002', 'Alacant-alicante', 3, 1),
(307, '03003', 'Alacant-alicante', 3, 1),
(308, '03004', 'Alacant-alicante', 3, 1),
(309, '03005', 'Alacant-alicante', 3, 1),
(310, '03006', 'Alacant-alicante', 3, 1),
(311, '03007', 'Alacant-alicante', 3, 1),
(312, '03008', 'Alacant-alicante', 3, 1),
(313, '03009', 'Alacant-alicante', 3, 1),
(314, '03010', 'Alacant-alicante', 3, 1),
(315, '03011', 'Alacant-alicante', 3, 1),
(316, '03012', 'Alacant-alicante', 3, 1),
(317, '03013', 'Alacant-alicante', 3, 1),
(318, '03014', 'Alacant-alicante', 3, 1),
(319, '03015', 'Alacant-alicante', 3, 1),
(320, '03016', 'Alacant-alicante', 3, 1),
(321, '03100', 'Xixona', 3, 1),
(322, '03108', 'Viola', 3, 1),
(323, '03109', 'Torrosella', 3, 1),
(324, '03110', 'Volveta Ganga', 3, 1),
(325, '03111', 'Vercheret, Partida', 3, 1),
(326, '03112', 'Villafranqueza - Palamo', 3, 1),
(327, '03113', 'Xeperut, Lo, Partida', 3, 1),
(328, '03114', 'Alacant-alicante', 3, 1),
(329, '03115', 'Monnegre', 3, 1),
(330, '03130', 'Santa Pola', 3, 1),
(331, '03138', 'Tabarca', 3, 1),
(332, '03139', 'Elx-elche', 3, 1),
(333, '03140', 'San Jose, Camping', 3, 1),
(334, '03150', 'Dolores', 3, 1),
(335, '03158', 'San Felipe  Neri', 3, 1),
(336, '03158', 'San Felipe  Neri', 3, 1),
(337, '03159', 'Vereda Del Pozo', 3, 1),
(338, '03160', 'Almoradi', 3, 1),
(339, '03169', 'Venta, La', 3, 1),
(340, '03170', 'Rojales', 3, 1),
(341, '03177', 'San Fulgencio', 3, 1),
(342, '03177', 'San Fulgencio', 3, 1),
(343, '03177', 'San Fulgencio', 3, 1),
(344, '03178', 'Torrejon De San Bruno', 3, 1),
(345, '03179', 'Palacios, Los', 3, 1),
(346, '03179', 'Palacios, Los', 3, 1),
(347, '03180', 'Torrevieja', 3, 1),
(348, '03181', 'Torrevieja', 3, 1),
(349, '03182', 'Torrevieja', 3, 1),
(350, '03183', 'Torrevieja', 3, 1),
(351, '03184', 'Torrevieja', 3, 1),
(352, '03185', 'Torrevieja', 3, 1),
(353, '03186', 'Torrevieja', 3, 1),
(354, '03187', 'Sastre, Lo', 3, 1),
(355, '03188', 'Torrevieja', 3, 1),
(356, '03189', 'Zenia, La', 3, 1),
(357, '03190', 'Pilar De La Horadada', 3, 1),
(358, '03191', 'Villena, Los, Caserio', 3, 1),
(359, '03191', 'Villena, Los, Caserio', 3, 1),
(360, '03192', 'Orihuela', 3, 1),
(361, '03193', 'San Miguel De Salinas', 3, 1),
(362, '03194', 'Pinet, El, Partida', 3, 1),
(363, '03195', 'Balsares, Los (altet)', 3, 1),
(364, '03201', 'Elx-elche', 3, 1),
(365, '03202', 'Elx-elche', 3, 1),
(366, '03203', 'Elx-elche', 3, 1),
(367, '03204', 'Elx-elche', 3, 1),
(368, '03205', 'Elx-elche', 3, 1),
(369, '03206', 'Elx-elche', 3, 1),
(370, '03207', 'Elx-elche', 3, 1),
(371, '03208', 'Elx-elche', 3, 1),
(372, '03290', 'Elx-elche', 3, 1),
(373, '03291', 'Elx-elche', 3, 1),
(374, '03292', 'Elx-elche', 3, 1),
(375, '03293', 'Elx-elche', 3, 1),
(376, '03294', 'Elx-elche', 3, 1),
(377, '03295', 'Elx-elche', 3, 1),
(378, '03296', 'Elx-elche', 3, 1),
(379, '03300', 'Orihuela', 3, 1),
(380, '03310', 'Jacarilla', 3, 1),
(381, '03310', 'Jacarilla', 3, 1),
(382, '03311', 'Pinar De Bonanza, Urbanizacion', 3, 1),
(383, '03312', 'Norias, Las', 3, 1),
(384, '03313', 'Torremendo', 3, 1),
(385, '03314', 'San Bartolome', 3, 1),
(386, '03315', 'Vives, Los, Caserio', 3, 1),
(387, '03316', 'Montepinar, Urbanizacion', 3, 1),
(388, '03316', 'Montepinar, Urbanizacion', 3, 1),
(389, '03317', 'Virgen Del Camino, Partida', 3, 1),
(390, '03320', 'Torrellano', 3, 1),
(391, '03330', 'Crevillent', 3, 1),
(392, '03339', 'San Pascual', 3, 1),
(393, '03340', 'Albatera', 3, 1),
(394, '03348', 'Mos Del Bou', 3, 1),
(395, '03349', 'San Isidro De Albatera', 3, 1),
(396, '03350', 'San Isidro, Paraje', 3, 1),
(397, '03360', 'Yesera, La, Partida', 3, 1),
(398, '03369', 'Rafal', 3, 1),
(399, '03369', 'Rafal', 3, 1),
(400, '03370', 'San Carlos', 3, 1),
(401, '03380', 'Correntias Bajas (bigastro)', 3, 1),
(402, '03390', 'Secano De Barracas', 3, 1),
(403, '03400', 'Villena', 3, 1),
(404, '03408', 'Zafra, La, Nucleo', 3, 1),
(405, '03409', 'Virtudes, Las', 3, 1),
(406, '03409', 'Virtudes, Las', 3, 1),
(407, '03409', 'Virtudes, Las', 3, 1),
(408, '03409', 'Virtudes, Las', 3, 1),
(409, '03410', 'Biar', 3, 1),
(410, '03420', 'Sarganella', 3, 1),
(411, '03430', 'Onil', 3, 1),
(412, '03440', 'Tomillar-sarganella', 3, 1),
(413, '03450', 'Pedrera, La (baÑeres)', 3, 1),
(414, '03460', 'Beneixama', 3, 1),
(415, '03469', 'Salse, El', 3, 1),
(416, '03469', 'Salse, El', 3, 1),
(417, '03501', 'Benidorm', 3, 1),
(418, '03502', 'Benidorm', 3, 1),
(419, '03503', 'Benidorm', 3, 1),
(420, '03509', 'Tapiada, La, Urbanizacion', 3, 1),
(421, '03510', 'Tosal De Banderes', 3, 1),
(422, '03516', 'Benimantell', 3, 1),
(423, '03517', 'Guadalest', 3, 1),
(424, '03517', 'Guadalest', 3, 1),
(425, '03517', 'Guadalest', 3, 1),
(426, '03517', 'Guadalest', 3, 1),
(427, '03518', 'Tarbena', 3, 1),
(428, '03518', 'Tarbena', 3, 1),
(429, '03520', 'Torrent, Partida', 3, 1),
(430, '03530', 'Vegas, Las', 3, 1),
(431, '03540', 'Alacant-alicante', 3, 1),
(432, '03550', 'Santa Faz (san Juan)', 3, 1),
(433, '03559', 'Alacant-alicante', 3, 1),
(434, '03560', 'Tracho, El', 3, 1),
(435, '03569', 'AigÜes', 3, 1),
(436, '03570', 'Villajoyosa', 3, 1),
(437, '03578', 'Relleu', 3, 1),
(438, '03579', 'Sella', 3, 1),
(439, '03579', 'Sella', 3, 1),
(440, '03580', 'Tosalet, El (alfaz Del Pi) /tossalet, El', 3, 1),
(441, '03581', 'Sant Pere, Partida', 3, 1),
(442, '03590', 'Pontet, El', 3, 1),
(443, '03599', 'Villa Gadea', 3, 1),
(444, '03600', 'Sigmat', 3, 1),
(445, '03610', 'Troset, Zona', 3, 1),
(446, '03630', 'Sax', 3, 1),
(447, '03638', 'Salinas', 3, 1),
(448, '03639', 'Colonia De Santa Eulalia, La', 3, 1),
(449, '03640', 'Zafarich, Partida', 3, 1),
(450, '03649', 'Solaneta, Partida', 3, 1),
(451, '03650', 'Pinoso', 3, 1),
(452, '03657', 'Raspay', 3, 1),
(453, '03658', 'Ubeda', 3, 1),
(454, '03658', 'Ubeda', 3, 1),
(455, '03659', 'CaÑada Del Trigo', 3, 1),
(456, '03660', 'Serreta (novelda)', 3, 1),
(457, '03668', 'Solana De AlgueÑa, La', 3, 1),
(458, '03669', 'Romana, La', 3, 1),
(459, '03670', 'Monforte Del Cid', 3, 1),
(460, '03679', 'Serreta, La (monforte Cid)', 3, 1),
(461, '03680', 'Tejera, La, Partida', 3, 1),
(462, '03688', 'Solana, La', 3, 1),
(463, '03689', 'Hondon De Los Frailes', 3, 1),
(464, '03689', 'Hondon De Los Frailes', 3, 1),
(465, '03689', 'Hondon De Los Frailes', 3, 1),
(466, '03690', 'Torregroses', 3, 1),
(467, '03698', 'Agost', 3, 1),
(468, '03699', 'Verdegas', 3, 1),
(469, '03700', 'Troyas', 3, 1),
(470, '03709', 'Xara, La, Nucleo', 3, 1),
(471, '03710', 'Ricarlos, Urbanizacion', 3, 1),
(472, '03720', 'San Jaime-benissa', 3, 1),
(473, '03723', 'Llosa De Camacho', 3, 1),
(474, '03724', 'San Jaime, Urbanizacion', 3, 1),
(475, '03725', 'Teulada', 3, 1),
(476, '03726', 'Yuca, Partida', 3, 1),
(477, '03727', 'Xalo/jalon', 3, 1),
(478, '03728', 'Vereda Park, Urbanizacion', 3, 1),
(479, '03729', 'Senija', 3, 1),
(480, '03729', 'Senija', 3, 1),
(481, '03730', 'XÀbia/javea', 3, 1),
(482, '03737', 'Valls Tosal', 3, 1),
(483, '03738', 'Trencal', 3, 1),
(484, '03739', 'Tosalet, El (javea/xabia)', 3, 1),
(485, '03740', 'Troset', 3, 1),
(486, '03749', 'Tosal Roig', 3, 1),
(487, '03750', 'Ventas De Pedreguer', 3, 1),
(488, '03759', 'Rincon Del Silencio, Urbanizacion', 3, 1),
(489, '03760', 'ViÑals, Partida', 3, 1),
(490, '03769', 'Sanet Y Negrals', 3, 1),
(491, '03769', 'Sanet Y Negrals', 3, 1),
(492, '03769', 'Sanet Y Negrals', 3, 1),
(493, '03770', 'Verger, El', 3, 1),
(494, '03770', 'Verger, El', 3, 1),
(495, '03778', 'Beniarbeig', 3, 1),
(496, '03779', 'Xironets, Partida', 3, 1),
(497, '03780', 'Pego', 3, 1),
(498, '03780', 'Pego', 3, 1),
(499, '03786', 'Vall D\'alcalÀ, La', 3, 1),
(500, '03787', 'Vall de Gallinera', 3, 1),
(501, '03788', 'Vall De Gallinera', 3, 1),
(502, '03788', 'Vall De Gallinera', 3, 1),
(503, '03789', 'Vall De Ebo', 3, 1),
(504, '03790', 'Orba (casco Antiguo)', 3, 1),
(505, '03791', 'Vall De Laguar, La', 3, 1),
(506, '03791', 'Vall De Laguar, La', 3, 1),
(507, '03792', 'Parcent', 3, 1),
(508, '03792', 'Parcent', 3, 1),
(509, '03792', 'Parcent', 3, 1),
(510, '03793', 'Castell De Castells', 3, 1),
(511, '03794', 'Benigembla', 3, 1),
(512, '03795', 'Trullent, Partida', 3, 1),
(513, '03795', 'Trullent, Partida', 3, 1),
(514, '03795', 'Trullent, Partida', 3, 1),
(515, '03800', 'Alcoi-alcoy', 3, 1),
(516, '03801', 'Alcoi-alcoy', 3, 1),
(517, '03802', 'Alcoi-alcoy', 3, 1),
(518, '03803', 'Alcoi-alcoy', 3, 1),
(519, '03804', 'Alcoi-alcoy', 3, 1),
(520, '03810', 'Benilloba', 3, 1),
(521, '03811', 'Quatretondeta', 3, 1),
(522, '03811', 'Quatretondeta', 3, 1),
(523, '03812', 'Millena', 3, 1),
(524, '03812', 'Millena', 3, 1),
(525, '03812', 'Millena', 3, 1),
(526, '03813', 'Tollos', 3, 1),
(527, '03813', 'Tollos', 3, 1),
(528, '03813', 'Tollos', 3, 1),
(529, '03814', 'Beniafe', 3, 1),
(530, '03814', 'Beniafe', 3, 1),
(531, '03815', 'PenÀguila / Penaguila', 3, 1),
(532, '03816', 'Benifallim', 3, 1),
(533, '03818', 'Alcoy/Alcoi', 3, 1),
(534, '03820', 'Cocentaina', 3, 1),
(535, '03827', 'Benimarfull', 3, 1),
(536, '03827', 'Benimarfull', 3, 1),
(537, '03827', 'Benimarfull', 3, 1),
(538, '03828', 'Planes', 3, 1),
(539, '03829', 'Alqueria-benifloret', 3, 1),
(540, '03829', 'Alqueria-benifloret', 3, 1),
(541, '03830', 'Muro De Alcoy', 3, 1),
(542, '03837', 'Agres', 3, 1),
(543, '03838', 'Alfafara', 3, 1),
(544, '03839', 'Turballos', 3, 1),
(545, '03840', 'Gaianes', 3, 1),
(546, '03841', 'Alcocer De Planes', 3, 1),
(547, '03850', 'Beniarres', 3, 1),
(548, '03860', 'Orxa, L\'/lorcha', 3, 1),
(549, '04001', 'Almería', 4, 1),
(550, '04002', 'Almería', 4, 1),
(551, '04003', 'Almería', 4, 1),
(552, '04004', 'Almería', 4, 1),
(553, '04005', 'Almería', 4, 1),
(554, '04006', 'Almería', 4, 1),
(555, '04007', 'Almería', 4, 1),
(556, '04008', 'Almería', 4, 1),
(557, '04009', 'Almería', 4, 1),
(558, '04100', 'Nijar', 4, 1),
(559, '04110', 'Campohermoso', 4, 1),
(560, '04113', 'Viso, El', 4, 1),
(561, '04114', 'Venta Del Pobre', 4, 1),
(562, '04114', 'Venta Del Pobre', 4, 1),
(563, '04115', 'Rodalquilar', 4, 1),
(564, '04116', 'Negras, Las', 4, 1),
(565, '04117', 'San Isidro De Nijar', 4, 1),
(566, '04118', 'San Jose', 4, 1),
(567, '04119', 'Huebro', 4, 1),
(568, '04120', 'Venta Gaspar', 4, 1),
(569, '04130', 'Alquian, El', 4, 1),
(570, '04131', 'Retamar', 4, 1),
(571, '04140', 'Carboneras', 4, 1),
(572, '04147', 'N', 4, 1),
(573, '04149', 'Saltador Bajo, El', 4, 1),
(574, '04149', 'Saltador Bajo, El', 4, 1),
(575, '04149', 'Saltador Bajo, El', 4, 1),
(576, '04150', 'Rambla Morales', 4, 1),
(577, '04151', 'Ruescas (nijar)', 4, 1),
(578, '04160', 'Cuevas De Los Ubedas', 4, 1),
(579, '04188', 'N', 4, 1),
(580, '04200', 'Tabernas', 4, 1),
(581, '04210', 'Lucainena De Las Torres', 4, 1),
(582, '04211', 'Yesos, Los', 4, 1),
(583, '04211', 'Yesos, Los', 4, 1),
(584, '04211', 'Yesos, Los', 4, 1),
(585, '04212', 'Velefique', 4, 1),
(586, '04212', 'Velefique', 4, 1),
(587, '04212', 'Velefique', 4, 1),
(588, '04213', 'Senes', 4, 1),
(589, '04230', 'Huercal De Almeria', 4, 1),
(590, '04240', 'Viator', 4, 1),
(591, '04248', 'Sorbas', 4, 1),
(592, '04250', 'Pechina', 4, 1),
(593, '04259', 'Sierra Alhamilla', 4, 1),
(594, '04260', 'Rioja', 4, 1),
(595, '04270', 'Sorbas', 4, 1),
(596, '04271', 'Saeti, El', 4, 1),
(597, '04271', 'Saeti, El', 4, 1),
(598, '04274', 'Zofre', 4, 1),
(599, '04274', 'Zofre', 4, 1),
(600, '04275', 'Tahal', 4, 1),
(601, '04275', 'Tahal', 4, 1),
(602, '04276', 'Rambla Del Marques', 4, 1),
(603, '04276', 'Rambla Del Marques', 4, 1),
(604, '04276', 'Rambla Del Marques', 4, 1),
(605, '04277', 'Varguicas', 4, 1),
(606, '04278', 'CastaÑos, Los', 4, 1),
(607, '04279', 'Uleila Del Campo', 4, 1),
(608, '04279', 'Uleila Del Campo', 4, 1),
(609, '04279', 'Uleila Del Campo', 4, 1),
(610, '04280', 'Gallardos, Los', 4, 1),
(611, '04288', 'Serena, La', 4, 1),
(612, '04288', 'Serena, La', 4, 1),
(613, '04289', 'Huelga, La', 4, 1),
(614, '04289', 'Huelga, La', 4, 1),
(615, '04289', 'Huelga, La', 4, 1),
(616, '04400', 'Huechar', 4, 1),
(617, '04409', 'Huecija', 4, 1),
(618, '04409', 'Huecija', 4, 1),
(619, '04410', 'Chuche, El', 4, 1),
(620, '04420', 'Santa Fe De Mondujar', 4, 1),
(621, '04430', 'Instincion', 4, 1),
(622, '04431', 'Illar', 4, 1),
(623, '04440', 'Ragol', 4, 1),
(624, '04450', 'Canjayar', 4, 1),
(625, '04458', 'Padules', 4, 1),
(626, '04458', 'Padules', 4, 1),
(627, '04458', 'Padules', 4, 1),
(628, '04459', 'Tices', 4, 1),
(629, '04460', 'Fondon', 4, 1),
(630, '04470', 'Laujar De Andarax', 4, 1),
(631, '04479', 'Paterna Del Rio', 4, 1),
(632, '04479', 'Paterna Del Rio', 4, 1),
(633, '04479', 'Paterna Del Rio', 4, 1),
(634, '04480', 'Alcolea', 4, 1),
(635, '04500', 'Norias, Las (fiÑana)', 4, 1),
(636, '04510', 'Montagon', 4, 1),
(637, '04520', 'Abrucena', 4, 1),
(638, '04530', 'Soleres, Les', 4, 1),
(639, '04531', 'Alboloduy', 4, 1),
(640, '04532', 'Santillana', 4, 1),
(641, '04533', 'Pago De Escuchagrano', 4, 1),
(642, '04540', 'Sanchos, Los', 4, 1),
(643, '04549', 'Rojas, Los', 4, 1),
(644, '04550', 'Portocarrero', 4, 1),
(645, '04558', 'Alcubillas, Las', 4, 1),
(646, '04558', 'Alcubillas, Las', 4, 1),
(647, '04559', 'Tablas, Las', 4, 1),
(648, '04560', 'Ruini, El', 4, 1),
(649, '04567', 'Alhabia', 4, 1),
(650, '04568', 'Santa Cruz De Marchena', 4, 1),
(651, '04568', 'Santa Cruz De Marchena', 4, 1),
(652, '04569', 'Terque', 4, 1),
(653, '04569', 'Terque', 4, 1),
(654, '04600', 'San Francisco', 4, 1),
(655, '04600', 'San Francisco', 4, 1),
(656, '04610', 'Rulador, El', 4, 1),
(657, '04616', 'Villaricos', 4, 1),
(658, '04617', 'Palomares', 4, 1),
(659, '04618', 'Tomillar, El', 4, 1),
(660, '04619', 'Portilla, La', 4, 1),
(661, '04620', 'Vera', 4, 1),
(662, '04628', 'Real, El', 4, 1),
(663, '04629', 'Jauro (antas)', 4, 1),
(664, '04630', 'Garrucha', 4, 1),
(665, '04638', 'Parata, La (mojacar)', 4, 1),
(666, '04639', 'Turre', 4, 1),
(667, '04639', 'Turre', 4, 1),
(668, '04640', 'Pulpi', 4, 1),
(669, '04640', 'Pulpi', 4, 1),
(670, '04647', 'Vizcaino', 4, 1),
(671, '04647', 'Vizcaino', 4, 1),
(672, '04648', 'San Juan De Los Terreros', 4, 1),
(673, '04648', 'San Juan De Los Terreros', 4, 1),
(674, '04649', 'Herradura, La', 4, 1),
(675, '04650', 'Zurgena', 4, 1),
(676, '04659', 'Terque', 4, 1),
(677, '04660', 'Tahullas, Las', 4, 1),
(678, '04661', 'Limaria', 4, 1),
(679, '04661', 'Limaria', 4, 1),
(680, '04662', 'Santa Barbara', 4, 1),
(681, '04662', 'Santa Barbara', 4, 1),
(682, '04690', 'Norias, Las (huercal Overa)', 4, 1),
(683, '04691', 'Urcal', 4, 1),
(684, '04692', 'Taberno', 4, 1),
(685, '04692', 'Taberno', 4, 1),
(686, '04692', 'Taberno', 4, 1),
(687, '04693', 'Santa Maria De Nieva', 4, 1),
(688, '04694', 'Saltador, El (pulpi)', 4, 1),
(689, '04700', 'Santo Domingo', 4, 1),
(690, '04710', 'Santa Maria Del Aguila', 4, 1),
(691, '04711', 'Almerimar', 4, 1),
(692, '04712', 'Balerma', 4, 1),
(693, '04713', 'Balanegra', 4, 1),
(694, '04715', 'Pampanico', 4, 1),
(695, '04716', 'Norias De Daza, Las', 4, 1),
(696, '04720', 'Parador De Las Hortichuelas, El', 4, 1),
(697, '04727', 'Envia, La', 4, 1),
(698, '04728', 'Felix', 4, 1),
(699, '04729', 'Marchal De Enix', 4, 1),
(700, '04738', 'Vicar', 4, 1),
(701, '04740', 'Roquetas De Mar, Urbanizacion', 4, 1),
(702, '04741', 'Cortijos De Marin', 4, 1),
(703, '04743', 'Solanillo, El', 4, 1),
(704, '04745', 'Mojonera, La', 4, 1),
(705, '04746', 'Venta Del Viso, La', 4, 1),
(706, '04750', 'Dalias', 4, 1),
(707, '04760', 'Cid, El', 4, 1),
(708, '04768', 'Lucainena De Darrical', 4, 1),
(709, '04768', 'Lucainena De Darrical', 4, 1),
(710, '04769', 'San Roque (berja)', 4, 1),
(711, '04770', 'Perez, Los (adra)', 4, 1),
(712, '04778', 'Toril, El', 4, 1),
(713, '04779', 'Venta Nueva', 4, 1),
(714, '04779', 'Venta Nueva', 4, 1),
(715, '04779', 'Venta Nueva', 4, 1),
(716, '04800', 'Finos, Los', 4, 1),
(717, '04810', 'Piedra Amarilla, La', 4, 1),
(718, '04810', 'Piedra Amarilla, La', 4, 1),
(719, '04811', 'San Miguel (alamos)', 4, 1),
(720, '04812', 'Llanos Del Espino', 4, 1),
(721, '04813', 'Yegua Baja, La', 4, 1),
(722, '04813', 'Yegua Baja, La', 4, 1),
(723, '04814', 'Locaiba', 4, 1),
(724, '04815', 'Morillas, Los', 4, 1),
(725, '04820', 'Velez-rubio', 4, 1),
(726, '04825', 'Roquez', 4, 1),
(727, '04826', 'Ramales, Los', 4, 1),
(728, '04827', 'Torrentes, Los', 4, 1),
(729, '04828', 'Molinos, Los', 4, 1),
(730, '04829', 'Solana', 4, 1),
(731, '04829', 'Solana', 4, 1),
(732, '04830', 'Velez-blanco', 4, 1),
(733, '04838', 'Maria', 4, 1),
(734, '04839', 'Topares', 4, 1),
(735, '04839', 'Topares', 4, 1),
(736, '04850', 'Terreros', 4, 1),
(737, '04857', 'Albanchez', 4, 1),
(738, '04858', 'Tia Lucia, La', 4, 1),
(739, '04858', 'Tia Lucia, La', 4, 1),
(740, '04859', 'Tablar, El', 4, 1),
(741, '04859', 'Tablar, El', 4, 1),
(742, '04859', 'Tablar, El', 4, 1),
(743, '04860', 'Olula Del Rio', 4, 1),
(744, '04867', 'Reul Alto, El', 4, 1),
(745, '04868', 'Laroya', 4, 1),
(746, '04869', 'Palomar, El', 4, 1),
(747, '04870', 'Purchena', 4, 1),
(748, '04877', 'Somontin', 4, 1),
(749, '04877', 'Somontin', 4, 1),
(750, '04878', 'Sufli', 4, 1),
(751, '04878', 'Sufli', 4, 1),
(752, '04879', 'Urracal', 4, 1),
(753, '04880', 'Tijola', 4, 1),
(754, '04887', 'Pozo Del Lobo', 4, 1),
(755, '04887', 'Pozo Del Lobo', 4, 1),
(756, '04888', 'Bayarque', 4, 1),
(757, '04888', 'Bayarque', 4, 1),
(758, '04889', 'Dali', 4, 1),
(759, '04889', 'Dali', 4, 1),
(760, '04890', 'Seron', 4, 1),
(761, '04897', 'Vegas, Los', 4, 1),
(762, '04897', 'Vegas, Los', 4, 1),
(763, '04898', 'Ramil Bajo', 4, 1),
(764, '04898', 'Ramil Bajo', 4, 1),
(765, '04899', 'Zoilos, Los', 4, 1),
(766, '04899', 'Zoilos, Los', 4, 1),
(767, '04964', 'Hu', 4, 1),
(768, '05001', 'Ávila', 5, 1),
(769, '05002', 'Ávila', 5, 1),
(770, '05003', 'Ávila', 5, 1),
(771, '05004', 'Ávila', 5, 1),
(772, '05005', 'Ávila', 5, 1),
(773, '05100', 'Navaluenga', 5, 1),
(774, '05110', 'Barraco, El', 5, 1),
(775, '05111', 'San Juan De La Nava', 5, 1),
(776, '05113', 'Burgohondo', 5, 1),
(777, '05114', 'Villanueva De Avila', 5, 1),
(778, '05115', 'Serranillos', 5, 1),
(779, '05115', 'Serranillos', 5, 1),
(780, '05116', 'Serranillos', 5, 1),
(781, '05120', 'Villarejo', 5, 1),
(782, '05120', 'Villarejo', 5, 1),
(783, '05120', 'Villarejo', 5, 1),
(784, '05122', 'Navatalgordo', 5, 1),
(785, '05122', 'Navatalgordo', 5, 1),
(786, '05123', 'Navalosa', 5, 1),
(787, '05123', 'Navalosa', 5, 1),
(788, '05130', 'Villaviciosa', 5, 1),
(789, '05131', 'Narros Del Puerto', 5, 1),
(790, '05131', 'Narros Del Puerto', 5, 1),
(791, '05131', 'Narros Del Puerto', 5, 1),
(792, '05132', 'San Martin Del Pimpollar', 5, 1),
(793, '05132', 'San Martin Del Pimpollar', 5, 1),
(794, '05132', 'San Martin Del Pimpollar', 5, 1),
(795, '05133', 'San Martin De La Vega Alberche', 5, 1),
(796, '05134', 'Navalacruz', 5, 1),
(797, '05134', 'Navalacruz', 5, 1),
(798, '05134', 'Navalacruz', 5, 1),
(799, '05140', 'Villaverde', 5, 1),
(800, '05140', 'Villaverde', 5, 1),
(801, '05140', 'Villaverde', 5, 1),
(802, '05140', 'Villaverde', 5, 1),
(803, '05141', 'Sanchorreja', 5, 1),
(804, '05141', 'Sanchorreja', 5, 1),
(805, '05141', 'Sanchorreja', 5, 1),
(806, '05141', 'Sanchorreja', 5, 1),
(807, '05143', 'Valdecasa', 5, 1),
(808, '05145', 'San Juan Del Olmo', 5, 1),
(809, '05145', 'San Juan Del Olmo', 5, 1),
(810, '05145', 'San Juan Del Olmo', 5, 1),
(811, '05146', 'Vita', 5, 1),
(812, '05146', 'Vita', 5, 1),
(813, '05146', 'Vita', 5, 1),
(814, '05146', 'Vita', 5, 1),
(815, '05146', 'Vita', 5, 1),
(816, '05146', 'Vita', 5, 1),
(817, '05146', 'Vita', 5, 1),
(818, '05147', 'ViÑegra De La Sierra', 5, 1),
(819, '05147', 'ViÑegra De La Sierra', 5, 1),
(820, '05148', 'Rivilla De La CaÑada', 5, 1),
(821, '05149', 'Solana De Rioalmar', 5, 1),
(822, '05149', 'Solana De Rioalmar', 5, 1),
(823, '05150', 'San Miguel De Serrezuela', 5, 1),
(824, '05150', 'San Miguel De Serrezuela', 5, 1),
(825, '05150', 'San Miguel De Serrezuela', 5, 1),
(826, '05151', 'Martinez', 5, 1),
(827, '05151', 'Martinez', 5, 1),
(828, '05152', 'Montalbo', 5, 1),
(829, '05153', 'Malpartida De Corneja', 5, 1),
(830, '05153', 'Malpartida De Corneja', 5, 1),
(831, '05153', 'Malpartida De Corneja', 5, 1),
(832, '05153', 'Malpartida De Corneja', 5, 1),
(833, '05153', 'Malpartida De Corneja', 5, 1),
(834, '05154', 'Zapardiel De La CaÑada', 5, 1),
(835, '05154', 'Zapardiel De La CaÑada', 5, 1),
(836, '05154', 'Zapardiel De La CaÑada', 5, 1),
(837, '05160', 'Narrillos De San Leonardo', 5, 1),
(838, '05161', 'Mingorr', 5, 1),
(839, '05162', 'Berlanas, Las', 5, 1),
(840, '05163', 'Zorita De Los Molinos', 5, 1),
(841, '05163', 'Zorita De Los Molinos', 5, 1),
(842, '05163', 'Zorita De Los Molinos', 5, 1),
(843, '05164', 'Riocabado', 5, 1),
(844, '05164', 'Riocabado', 5, 1),
(845, '05164', 'Riocabado', 5, 1),
(846, '05164', 'Riocabado', 5, 1),
(847, '05164', 'Riocabado', 5, 1),
(848, '05165', 'TiÑosillos', 5, 1),
(849, '05165', 'TiÑosillos', 5, 1),
(850, '05165', 'TiÑosillos', 5, 1),
(851, '05165', 'TiÑosillos', 5, 1),
(852, '05170', 'El Tiemblo', 5, 1),
(853, '05190', 'Riofrio', 5, 1),
(854, '05191', 'Niharra', 5, 1),
(855, '05191', 'Niharra', 5, 1),
(856, '05192', 'Serrada, La', 5, 1),
(857, '05192', 'Serrada, La', 5, 1),
(858, '05192', 'Serrada, La', 5, 1),
(859, '05193', 'Santa Maria Del Cubillo', 5, 1),
(860, '05193', 'Santa Maria Del Cubillo', 5, 1),
(861, '05194', 'Vicolozano', 5, 1),
(862, '05194', 'Vicolozano', 5, 1),
(863, '05194', 'Vicolozano', 5, 1),
(864, '05195', 'Urraca Miguel', 5, 1),
(865, '05196', 'Tornadizos De Avila', 5, 1),
(866, '05196', 'Tornadizos De Avila', 5, 1),
(867, '05197', 'GemuÑo', 5, 1),
(868, '05197', 'GemuÑo', 5, 1),
(869, '05197', 'GemuÑo', 5, 1),
(870, '05198', 'Sotalbo', 5, 1),
(871, '05200', 'Arevalo', 5, 1),
(872, '05210', 'Horcajo De Las Torres', 5, 1),
(873, '05210', 'Horcajo De Las Torres', 5, 1),
(874, '05211', 'Cisla', 5, 1),
(875, '05211', 'Cisla', 5, 1),
(876, '05211', 'Cisla', 5, 1),
(877, '05211', 'Cisla', 5, 1),
(878, '05212', 'Villanueva Del Aceral', 5, 1),
(879, '05212', 'Villanueva Del Aceral', 5, 1),
(880, '05212', 'Villanueva Del Aceral', 5, 1),
(881, '05212', 'Villanueva Del Aceral', 5, 1),
(882, '05212', 'Villanueva Del Aceral', 5, 1),
(883, '05213', 'Langa', 5, 1),
(884, '05215', 'Tornadizos De Arevalo', 5, 1),
(885, '05215', 'Tornadizos De Arevalo', 5, 1),
(886, '05215', 'Tornadizos De Arevalo', 5, 1),
(887, '05216', 'Vinaderos', 5, 1),
(888, '05217', 'San Vicente De Arevalo', 5, 1),
(889, '05217', 'San Vicente De Arevalo', 5, 1),
(890, '05217', 'San Vicente De Arevalo', 5, 1),
(891, '05217', 'San Vicente De Arevalo', 5, 1),
(892, '05220', 'Villar De Matacabras', 5, 1),
(893, '05229', 'San Esteban De Zapardiel', 5, 1),
(894, '05229', 'San Esteban De Zapardiel', 5, 1),
(895, '05229', 'San Esteban De Zapardiel', 5, 1),
(896, '05229', 'San Esteban De Zapardiel', 5, 1),
(897, '05230', 'Navas Del Marques, Las', 5, 1),
(898, '05239', 'Peguerinos', 5, 1),
(899, '05239', 'Peguerinos', 5, 1),
(900, '05240', 'Navalperal De Pinares', 5, 1),
(901, '05250', 'Hoyo De Pinares, El', 5, 1),
(902, '05260', 'Cebreros', 5, 1),
(903, '05267', 'San Bartolome De Pinares', 5, 1),
(904, '05268', 'Santa Cruz De Pinares', 5, 1),
(905, '05268', 'Santa Cruz De Pinares', 5, 1),
(906, '05270', 'Tiemblo, El', 5, 1),
(907, '05278', 'Rinconada Del Valle, La', 5, 1),
(908, '05278', 'Rinconada Del Valle, La', 5, 1),
(909, '05279', 'Cerro De Guisando', 5, 1),
(910, '05280', 'Mingorria', 5, 1),
(911, '05289', 'TolbaÑos', 5, 1),
(912, '05289', 'TolbaÑos', 5, 1),
(913, '05290', 'Sanchidrian', 5, 1),
(914, '05290', 'Sanchidrian', 5, 1),
(915, '05291', 'Pinar De Puente Viejo', 5, 1),
(916, '05292', 'Velayos', 5, 1),
(917, '05292', 'Velayos', 5, 1),
(918, '05292', 'Velayos', 5, 1),
(919, '05292', 'Velayos', 5, 1),
(920, '05292', 'Velayos', 5, 1),
(921, '05294', 'CaÑada, La', 5, 1),
(922, '05296', 'Orbita', 5, 1),
(923, '05296', 'Orbita', 5, 1),
(924, '05296', 'Orbita', 5, 1),
(925, '05296', 'Orbita', 5, 1),
(926, '05298', 'San Cristobal De Trabancos', 5, 1),
(927, '05298', 'San Cristobal De Trabancos', 5, 1),
(928, '05298', 'San Cristobal De Trabancos', 5, 1),
(929, '05299', 'Moraleja De Matacabras', 5, 1),
(930, '05299', 'Moraleja De Matacabras', 5, 1),
(931, '05300', 'Crespos', 5, 1),
(932, '05309', 'ViÑegra De MoraÑa', 5, 1),
(933, '05309', 'ViÑegra De MoraÑa', 5, 1),
(934, '05309', 'ViÑegra De MoraÑa', 5, 1),
(935, '05309', 'ViÑegra De MoraÑa', 5, 1),
(936, '05309', 'ViÑegra De MoraÑa', 5, 1),
(937, '05310', 'Fontiveros', 5, 1),
(938, '05320', 'CardeÑosa', 5, 1),
(939, '05340', 'Bularros', 5, 1),
(940, '05340', 'Aveinte', 5, 1),
(941, '05350', 'San Pedro Del Arroyo', 5, 1),
(942, '05357', 'Villaflor', 5, 1),
(943, '05357', 'Villaflor', 5, 1),
(944, '05357', 'Villaflor', 5, 1),
(945, '05357', 'Villaflor', 5, 1),
(946, '05357', 'Villaflor', 5, 1),
(947, '05357', 'Villaflor', 5, 1),
(948, '05357', 'Villaflor', 5, 1),
(949, '05358', 'San Juan De La Encinilla', 5, 1),
(950, '05358', 'San Juan De La Encinilla', 5, 1),
(951, '05358', 'San Juan De La Encinilla', 5, 1),
(952, '05358', 'San Juan De La Encinilla', 5, 1),
(953, '05358', 'San Juan De La Encinilla', 5, 1),
(954, '05364', 'Hoyos del Espino', 5, 1),
(955, '05370', 'Flores De Avila', 5, 1),
(956, '05370', 'Flores De Avila', 5, 1),
(957, '05380', 'Salvadios', 5, 1),
(958, '05380', 'Salvadios', 5, 1),
(959, '05380', 'Salvadios', 5, 1),
(960, '05380', 'Salvadios', 5, 1),
(961, '05400', 'Parra, La', 5, 1),
(962, '05410', 'Mombeltran', 5, 1),
(963, '05412', 'San Esteban Del Valle', 5, 1),
(964, '05413', 'Villarejo Del Valle', 5, 1),
(965, '05413', 'Villarejo Del Valle', 5, 1),
(966, '05414', 'Cuevas Del Valle', 5, 1),
(967, '05415', 'Hornillo, El', 5, 1),
(968, '05416', 'Arenal, El', 5, 1),
(969, '05417', 'Guisando', 5, 1),
(970, '05418', 'RamacastaÑas', 5, 1),
(971, '05420', 'Sotillo De La Adrada', 5, 1),
(972, '05427', 'Higuera De Las DueÑas', 5, 1),
(973, '05427', 'Higuera De Las DueÑas', 5, 1),
(974, '05428', 'Casillas', 5, 1),
(975, '05429', 'Santa Maria Del Tietar', 5, 1),
(976, '05429', 'Santa Maria Del Tietar', 5, 1),
(977, '05429', 'Santa Maria Del Tietar', 5, 1),
(978, '05430', 'Adrada, La', 5, 1),
(979, '05440', 'Piedralaves', 5, 1),
(980, '05450', 'Casavieja', 5, 1),
(981, '05460', 'Gavilanes', 5, 1),
(982, '05461', 'Mijares', 5, 1),
(983, '05470', 'Pedro Bernardo', 5, 1),
(984, '05480', 'Candeleda', 5, 1),
(985, '05489', 'Raso, El', 5, 1),
(986, '05490', 'Lanzahita', 5, 1),
(987, '05491', 'Higuera, La', 5, 1),
(988, '05492', 'Poyales Del Hoyo', 5, 1),
(989, '05500', 'Piedrahita', 5, 1),
(990, '05510', 'Santa Maria Del Berrocal', 5, 1),
(991, '05511', 'Santa Mar', 5, 1),
(992, '05513', 'Burgohondo', 5, 1),
(993, '05514', 'Tortoles', 5, 1),
(994, '05514', 'Tortoles', 5, 1),
(995, '05514', 'Tortoles', 5, 1),
(996, '05514', 'Tortoles', 5, 1),
(997, '05514', 'Tortoles', 5, 1),
(998, '05515', 'Soto, El', 5, 1),
(999, '05516', 'Villar De Corneja', 5, 1),
(1000, '05516', 'Villar De Corneja', 5, 1),
(1001, '05516', 'Villar De Corneja', 5, 1),
(1002, '05520', 'Sanchicorto', 5, 1),
(1003, '05520', 'Sanchicorto', 5, 1),
(1004, '05520', 'Sanchicorto', 5, 1),
(1005, '05530', 'Santa Maria Del Arroyo', 5, 1),
(1006, '05530', 'Santa Maria Del Arroyo', 5, 1),
(1007, '05540', 'Torre, La', 5, 1),
(1008, '05540', 'Torre, La', 5, 1),
(1009, '05540', 'Torre, La', 5, 1),
(1010, '05560', 'Villatoro', 5, 1),
(1011, '05560', 'Villatoro', 5, 1),
(1012, '05560', 'Villatoro', 5, 1),
(1013, '05560', 'Villatoro', 5, 1),
(1014, '05560', 'Villatoro', 5, 1),
(1015, '05560', 'Villatoro', 5, 1),
(1016, '05570', 'Bonilla de la Sierra', 5, 1),
(1017, '05571', 'Villafranca De La Sierra', 5, 1),
(1018, '05571', 'Villafranca De La Sierra', 5, 1),
(1019, '05571', 'Villafranca De La Sierra', 5, 1),
(1020, '05580', 'Santa Maria De Los Caballeros', 5, 1),
(1021, '05580', 'Santa Maria De Los Caballeros', 5, 1),
(1022, '05580', 'Santa Maria De Los Caballeros', 5, 1),
(1023, '05581', 'Santa Mar', 5, 1),
(1024, '05591', 'Villanueva Del Campillo', 5, 1),
(1025, '05592', 'Zarzal', 5, 1),
(1026, '05593', 'Solanillas, Las', 5, 1),
(1027, '05600', 'Barco De Avila, El', 5, 1),
(1028, '05610', 'Becedas', 5, 1),
(1029, '05619', 'San Bartolome De Bejar', 5, 1),
(1030, '05619', 'San Bartolome De Bejar', 5, 1),
(1031, '05619', 'San Bartolome De Bejar', 5, 1),
(1032, '05619', 'San Bartolome De Bejar', 5, 1),
(1033, '05620', 'Navalmoro', 5, 1),
(1034, '05621', 'Zarza, La', 5, 1),
(1035, '05621', 'Zarza, La', 5, 1),
(1036, '05630', 'Santiago Del Tormes', 5, 1),
(1037, '05630', 'Santiago Del Tormes', 5, 1),
(1038, '05631', 'Zapardiel De La Ribera', 5, 1),
(1039, '05631', 'Zapardiel De La Ribera', 5, 1),
(1040, '05632', 'San Juan de Gredos', 5, 1),
(1041, '05632', 'Navalperal de Tormes', 5, 1),
(1042, '05633', 'San Juan De Gredos', 5, 1),
(1043, '05634', 'Hoyos Del Espino', 5, 1),
(1044, '05634', 'Hoyos Del Espino', 5, 1),
(1045, '05635', 'Navarredonda De Gredos', 5, 1),
(1046, '05640', 'Gavilanes', 5, 1),
(1047, '05690', 'Navamojada', 5, 1),
(1048, '05690', 'Navamojada', 5, 1),
(1049, '05691', 'Tremedal, El', 5, 1),
(1050, '05692', 'Navamorisca', 5, 1),
(1051, '05693', 'Umbrias', 5, 1),
(1052, '05693', 'Umbrias', 5, 1),
(1053, '05694', 'Palacios De Becedas', 5, 1),
(1054, '05694', 'Palacios De Becedas', 5, 1),
(1055, '05695', 'Horcajada, La', 5, 1),
(1056, '05696', 'Vallehondo', 5, 1),
(1057, '05696', 'Vallehondo', 5, 1),
(1058, '05697', 'Tormellas', 5, 1),
(1059, '05697', 'Tormellas', 5, 1),
(1060, '05697', 'Tormellas', 5, 1),
(1061, '05697', 'Tormellas', 5, 1),
(1062, '06001', 'Badajoz', 6, 1),
(1063, '06002', 'Badajoz', 6, 1),
(1064, '06003', 'Badajoz', 6, 1),
(1065, '06004', 'Badajoz', 6, 1),
(1066, '06005', 'Badajoz', 6, 1),
(1067, '06006', 'Badajoz', 6, 1),
(1068, '06007', 'Badajoz', 6, 1),
(1069, '06008', 'Badajoz', 6, 1),
(1070, '06009', 'Badajoz', 6, 1),
(1071, '06010', 'Badajoz', 6, 1),
(1072, '06011', 'Badajoz', 6, 1),
(1073, '06100', 'Olivenza', 6, 1),
(1074, '06105', 'Cheles', 6, 1),
(1075, '06106', 'San Benito De La Contienda', 6, 1),
(1076, '06107', 'Villarreal', 6, 1),
(1077, '06108', 'Santo Domingo', 6, 1),
(1078, '06109', 'San Rafael De Olivenza', 6, 1),
(1079, '06110', 'Villanueva Del Fresno', 6, 1),
(1080, '06120', 'Oliva De La Frontera', 6, 1),
(1081, '06129', 'Zahinos', 6, 1),
(1082, '06130', 'Valverde De Leganes', 6, 1),
(1083, '06131', 'Alconchel', 6, 1),
(1084, '06132', 'Higuera De Vargas', 6, 1),
(1085, '06133', 'Taliga', 6, 1),
(1086, '06134', 'Valencia Del Mombuey', 6, 1),
(1087, '06140', 'Talavera La Real', 6, 1),
(1088, '06150', 'Santa Marta De Los Barros', 6, 1),
(1089, '06160', 'Barcarrota', 6, 1),
(1090, '06170', 'Alvarado', 6, 1),
(1091, '06170', 'Alvarado', 6, 1),
(1092, '06171', 'Almendral', 6, 1),
(1093, '06172', 'Torre De Miguel Sesmero', 6, 1),
(1094, '06173', 'Nogales', 6, 1),
(1095, '06174', 'Salvaleon', 6, 1),
(1096, '06174', 'Salvaleon', 6, 1),
(1097, '06175', 'Salvatierra De Los Barros', 6, 1),
(1098, '06176', 'Parra, La', 6, 1),
(1099, '06176', 'Parra, La', 6, 1),
(1100, '06177', 'Valle De Matamoros', 6, 1),
(1101, '06178', 'Valle De Santa Ana', 6, 1),
(1102, '06180', 'Gevora Del Caudillo', 6, 1),
(1103, '06181', 'Sagrajas', 6, 1),
(1104, '06182', 'Alcazaba', 6, 1),
(1105, '06183', 'Novelda Del Guadiana', 6, 1),
(1106, '06184', 'Pueblonuevo Del Guadiana', 6, 1),
(1107, '06185', 'Valdelacalzada', 6, 1),
(1108, '06186', 'Guadiana Del Caudillo', 6, 1),
(1109, '06187', 'Guadajira', 6, 1),
(1110, '06190', 'Roca De La Sierra, La', 6, 1),
(1111, '06191', 'Puebla De Obando', 6, 1),
(1112, '06192', 'Villar Del Rey', 6, 1),
(1113, '06193', 'Puente De Zapaton', 6, 1),
(1114, '06194', 'Valdebotoa', 6, 1),
(1115, '06195', 'Villafranco Del Guadiana', 6, 1),
(1116, '06196', 'Cortegana', 6, 1),
(1117, '06196', 'Cortegana', 6, 1),
(1118, '06197', 'Entrin Bajo', 6, 1),
(1119, '06198', 'Solana de los Barros', 6, 1),
(1120, '06200', 'Almendralejo', 6, 1),
(1121, '06207', 'Aceuchal', 6, 1),
(1122, '06208', 'Villalba De Los Barros', 6, 1),
(1123, '06209', 'Solana De Los Barros', 6, 1),
(1124, '06210', 'Torremegia', 6, 1),
(1125, '06220', 'Villafranca De Los Barros', 6, 1),
(1126, '06225', 'Ribera Del Fresno', 6, 1),
(1127, '06226', 'Hinojosa Del Valle', 6, 1),
(1128, '06227', 'Llera', 6, 1),
(1129, '06228', 'Hornachos', 6, 1),
(1130, '06229', 'Puebla Del Prior', 6, 1),
(1131, '06230', 'Santos De Maimona, Los', 6, 1),
(1132, '06240', 'Fuente De Cantos', 6, 1),
(1133, '06249', 'Calzadilla De Los Barros', 6, 1),
(1134, '06249', 'Calzadilla De Los Barros', 6, 1),
(1135, '06250', 'Bienvenida', 6, 1),
(1136, '06260', 'Monesterio', 6, 1),
(1137, '06270', 'Segura De Leon', 6, 1),
(1138, '06280', 'Fuentes De Leon', 6, 1),
(1139, '06290', 'Usagre', 6, 1),
(1140, '06291', 'Montemolin', 6, 1),
(1141, '06292', 'Calera De Leon', 6, 1),
(1142, '06293', 'Cabeza La Vaca', 6, 1),
(1143, '06300', 'Zafra', 6, 1),
(1144, '06310', 'Puebla De Sancho Perez', 6, 1),
(1145, '06320', 'Medina De Las Torres', 6, 1),
(1146, '06329', 'Atalaya', 6, 1),
(1147, '06330', 'Valencia Del Ventoso', 6, 1),
(1148, '06340', 'Fregenal De La Sierra', 6, 1),
(1149, '06350', 'Higuera La Real', 6, 1),
(1150, '06360', 'Fuente Del Maestre', 6, 1),
(1151, '06370', 'Burguillos Del Cerro', 6, 1),
(1152, '06378', 'Valverde De Burguillos', 6, 1),
(1153, '06380', 'Jerez De Los Caballeros', 6, 1),
(1154, '06389', 'Valuengo', 6, 1),
(1155, '06390', 'Feria', 6, 1),
(1156, '06391', 'Lapa, La', 6, 1),
(1157, '06392', 'Raposo, El', 6, 1),
(1158, '06393', 'Alconera', 6, 1),
(1159, '06394', 'Bodonal De La Sierra', 6, 1),
(1160, '06400', 'Don Benito', 6, 1),
(1161, '06410', 'Valdehornillos', 6, 1),
(1162, '06410', 'Valdehornillos', 6, 1),
(1163, '06410', 'Valdehornillos', 6, 1),
(1164, '06410', 'Valdehornillos', 6, 1),
(1165, '06411', 'Medellin', 6, 1),
(1166, '06412', 'Vivares', 6, 1),
(1167, '06413', 'Mengabril', 6, 1),
(1168, '06420', 'Castuera', 6, 1),
(1169, '06427', 'Monterrubio De La Serena', 6, 1),
(1170, '06428', 'Puerto Hurraco', 6, 1),
(1171, '06429', 'Puerto Mejorada', 6, 1),
(1172, '06430', 'Zalamea De La Serena', 6, 1),
(1173, '06439', 'Esparragosa De La Serena', 6, 1),
(1174, '06440', 'Malpartida De La Serena', 6, 1),
(1175, '06441', 'Higuera De La Serena', 6, 1),
(1176, '06442', 'Retamal De Llerena', 6, 1),
(1177, '06443', 'Campillo De Llerena', 6, 1),
(1178, '06444', 'Valencia De Las Torres', 6, 1),
(1179, '06445', 'Higuera De Llerena', 6, 1),
(1180, '06450', 'Quintana De La Serena', 6, 1),
(1181, '06458', 'Valle De La Serena', 6, 1),
(1182, '06459', 'Guarda, La', 6, 1),
(1183, '06460', 'Campanario', 6, 1),
(1184, '06468', 'Magacela', 6, 1),
(1185, '06469', 'Coronada, La', 6, 1),
(1186, '06470', 'GuareÑa', 6, 1),
(1187, '06473', 'Villagonzalo', 6, 1),
(1188, '06474', 'Valdetorres', 6, 1),
(1189, '06475', 'Oliva De Merida', 6, 1),
(1190, '06476', 'Palomas', 6, 1),
(1191, '06477', 'Puebla De La Reina', 6, 1),
(1192, '06478', 'Manchita', 6, 1),
(1193, '06479', 'Cristina', 6, 1),
(1194, '06480', 'Montijo', 6, 1),
(1195, '06486', 'Nava De Santiago, La', 6, 1),
(1196, '06487', 'Cordobilla De Lacara', 6, 1),
(1197, '06488', 'Carmonita', 6, 1),
(1198, '06489', 'Lacara, De, Poblado', 6, 1),
(1199, '06490', 'Puebla De La Calzada', 6, 1),
(1200, '06498', 'Lobon', 6, 1),
(1201, '06499', 'BarbaÑo', 6, 1),
(1202, '06500', 'San Vicente De Alcantara', 6, 1),
(1203, '06510', 'Alburquerque', 6, 1),
(1204, '06518', 'Codosera, La', 6, 1),
(1205, '06519', 'Rocita De Mayorga, La', 6, 1),
(1206, '06600', 'Cabeza Del Buey', 6, 1),
(1207, '06610', 'PeÑalsordo', 6, 1),
(1208, '06611', 'Zarza Capilla', 6, 1),
(1209, '06612', 'Capilla', 6, 1),
(1210, '06613', 'Helechal', 6, 1),
(1211, '06614', 'Almorchon', 6, 1),
(1212, '06615', 'Nava, La (de Almorchon)', 6, 1),
(1213, '06620', 'Esparragosa De Lares', 6, 1),
(1214, '06630', 'Puebla De Alcocer', 6, 1),
(1215, '06640', 'Talarrubias', 6, 1),
(1216, '06650', 'Siruela', 6, 1),
(1217, '06656', 'Garlitos', 6, 1),
(1218, '06657', 'Risco', 6, 1),
(1219, '06658', 'Tamurejo', 6, 1),
(1220, '06659', 'Baterno', 6, 1),
(1221, '06660', 'Fuenlabrada De Los Montes', 6, 1),
(1222, '06670', 'Herrera Del Duque', 6, 1),
(1223, '06678', 'Villarta De Los Montes', 6, 1),
(1224, '06679', 'Peloche', 6, 1),
(1225, '06680', 'Castilblanco', 6, 1),
(1226, '06689', 'Valdecaballeros', 6, 1),
(1227, '06690', 'Garbayuela', 6, 1),
(1228, '06692', 'Helechosa De Los Montes', 6, 1),
(1229, '06700', 'Villanueva De La Serena', 6, 1),
(1230, '06710', 'Entrerrios', 6, 1),
(1231, '06711', 'Gargaligas', 6, 1),
(1232, '06712', 'Zurbaran', 6, 1),
(1233, '06713', 'Guadalperales, Los', 6, 1),
(1234, '06714', 'Haba, La', 6, 1),
(1235, '06715', 'Rena', 6, 1),
(1236, '06716', 'Villar De Rena', 6, 1),
(1237, '06717', 'Puebla De Alcollarin', 6, 1),
(1238, '06717', 'Puebla De Alcollarin', 6, 1),
(1239, '06718', 'Castillo De La Encomienda', 6, 1),
(1240, '06720', 'Valdivia', 6, 1),
(1241, '06730', 'Obando', 6, 1),
(1242, '06730', 'Obando', 6, 1),
(1243, '06731', 'Vegas Altas', 6, 1),
(1244, '06740', 'Orellana La Vieja', 6, 1),
(1245, '06750', 'Orellana De La Sierra', 6, 1),
(1246, '06760', 'Navalvillar De Pela', 6, 1),
(1247, '06770', 'Casas De Don Pedro', 6, 1),
(1248, '06800', 'Merida', 6, 1),
(1249, '06810', 'Calamonte', 6, 1),
(1250, '06820', 'Don Alvaro', 6, 1),
(1251, '06830', 'Zarza, La', 6, 1),
(1252, '06840', 'Alange', 6, 1),
(1253, '06850', 'Arroyo De San Servan', 6, 1),
(1254, '06860', 'Esparragalejo', 6, 1),
(1255, '06870', 'Garrovilla, La', 6, 1),
(1256, '06880', 'Torremayor', 6, 1),
(1257, '06890', 'Valverde De Merida', 6, 1),
(1258, '06891', 'Mirandilla', 6, 1),
(1259, '06892', 'Trujillanos', 6, 1),
(1260, '06893', 'San Pedro De Merida', 6, 1),
(1261, '06894', 'Carrascalejo', 6, 1),
(1262, '06894', 'Carrascalejo', 6, 1),
(1263, '06900', 'Llerena', 6, 1),
(1264, '06906', 'Puebla Del Maestre', 6, 1),
(1265, '06907', 'Pallares', 6, 1),
(1266, '06908', 'Santa Maria La Nava', 6, 1),
(1267, '06909', 'Trasierra', 6, 1),
(1268, '06910', 'Granja De Torrehermosa', 6, 1),
(1269, '06919', 'Peraleda Del Zaucejo', 6, 1),
(1270, '06920', 'Azuaga', 6, 1),
(1271, '06927', 'Valverde De Llerena', 6, 1),
(1272, '06928', 'Malcocinado', 6, 1),
(1273, '06929', 'Cardenchosa, La', 6, 1),
(1274, '06930', 'Berlanga', 6, 1),
(1275, '06939', 'Maguilla', 6, 1),
(1276, '06940', 'Ahillones', 6, 1),
(1277, '06950', 'Villagarcia De La Torre', 6, 1),
(1278, '06960', 'Casas De Reina', 6, 1),
(1279, '06970', 'Reina', 6, 1),
(1280, '06980', 'Fuente Del Arco', 6, 1),
(1281, '07001', 'Palma De Mallorca', 7, 1),
(1282, '07002', 'Palma De Mallorca', 7, 1),
(1283, '07003', 'Palma De Mallorca', 7, 1),
(1284, '07004', 'Palma De Mallorca', 7, 1),
(1285, '07005', 'Palma De Mallorca', 7, 1),
(1286, '07006', 'Palma De Mallorca', 7, 1),
(1287, '07007', 'Palma De Mallorca', 7, 1),
(1288, '07008', 'Palma De Mallorca', 7, 1),
(1289, '07009', 'Palma De Mallorca', 7, 1),
(1290, '07010', 'Palma De Mallorca', 7, 1),
(1291, '07010', 'Palma De Mallorca', 7, 1),
(1292, '07011', 'Palma De Mallorca', 7, 1),
(1293, '07012', 'Palma De Mallorca', 7, 1),
(1294, '07013', 'Palma De Mallorca', 7, 1),
(1295, '07014', 'Palma De Mallorca', 7, 1),
(1296, '07015', 'Palma De Mallorca', 7, 1),
(1297, '07071', 'Palma De Mallorca', 7, 1),
(1298, '07100', 'Soller', 7, 1),
(1299, '07101', 'Biniaraix', 7, 1),
(1300, '07108', 'Port De Soller', 7, 1),
(1301, '07109', 'Fornalutx', 7, 1),
(1302, '07110', 'Bunyola', 7, 1),
(1303, '07120', 'Palma De Mallorca', 7, 1),
(1304, '07140', 'Sencelles', 7, 1),
(1305, '07141', 'Son Ramonell, Urbanitzacio', 7, 1),
(1306, '07142', 'Santa Eugenia', 7, 1),
(1307, '07143', 'Son Arosa', 7, 1),
(1308, '07144', 'Jornets', 7, 1),
(1309, '07144', 'Jornets', 7, 1),
(1310, '07150', 'Andratx', 7, 1),
(1311, '07157', 'Port D\'andratx', 7, 1),
(1312, '07159', 'Sant Elm', 7, 1),
(1313, '07160', 'Peguera', 7, 1),
(1314, '07160', 'Peguera', 7, 1),
(1315, '07170', 'Valldemossa', 7, 1),
(1316, '07179', 'Llucalcari', 7, 1),
(1317, '07179', 'Llucalcari', 7, 1),
(1318, '07180', 'Toro, El', 7, 1),
(1319, '07181', 'Torrenova', 7, 1),
(1320, '07183', 'Rotes Velles', 7, 1),
(1321, '07184', 'CalviÀ', 7, 1),
(1322, '07190', 'Son Trias', 7, 1),
(1323, '07190', 'Son Trias', 7, 1),
(1324, '07190', 'Son Trias', 7, 1),
(1325, '07191', 'Banyalbufar', 7, 1),
(1326, '07192', 'Estellencs', 7, 1),
(1327, '07193', 'Son Termes', 7, 1),
(1328, '07194', 'Puigpunyent', 7, 1),
(1329, '07195', 'Galilea', 7, 1),
(1330, '07196', 'Capdella, Es', 7, 1),
(1331, '07198', 'Palma De Mallorca', 7, 1),
(1332, '07199', 'Palma De Mallorca', 7, 1),
(1333, '07200', 'Felanitx', 7, 1),
(1334, '07208', 'Son Negre', 7, 1),
(1335, '07209', 'Son Valls', 7, 1),
(1336, '07210', 'Castellitx', 7, 1),
(1337, '07220', 'Pina', 7, 1),
(1338, '07230', 'Montuiri', 7, 1),
(1339, '07240', 'Sant Joan', 7, 1),
(1340, '07250', 'Vilafranca De Bonany', 7, 1),
(1341, '07259', 'Ariany', 7, 1),
(1342, '07260', 'Porreres', 7, 1),
(1343, '07300', 'Inca', 7, 1),
(1344, '07310', 'Ullaro (campanet), Lloc', 7, 1),
(1345, '07311', 'Buger', 7, 1),
(1346, '07312', 'Mancor De La Vall', 7, 1),
(1347, '07313', 'Selva', 7, 1),
(1348, '07314', 'Caimari', 7, 1),
(1349, '07315', 'Sa Calobra/la Calobra', 7, 1),
(1350, '07316', 'Moscari', 7, 1),
(1351, '07320', 'Santa Maria Del Cami (isla De Mallorca)', 7, 1),
(1352, '07330', 'Consell', 7, 1),
(1353, '07340', 'Alaro', 7, 1),
(1354, '07349', 'Orient', 7, 1),
(1355, '07350', 'Binissalem', 7, 1),
(1356, '07360', 'Lloseta', 7, 1),
(1357, '07369', 'Biniamar', 7, 1),
(1358, '07400', 'Son Fe', 7, 1),
(1359, '07420', 'Pobla (sa)', 7, 1),
(1360, '07430', 'Llubi', 7, 1),
(1361, '07440', 'Muro', 7, 1),
(1362, '07450', 'Santa Margalida', 7, 1),
(1363, '07458', 'Son Baulo', 7, 1),
(1364, '07458', 'Son Baulo', 7, 1),
(1365, '07459', 'Son Serra De Marina', 7, 1),
(1366, '07460', 'PollenÇa', 7, 1),
(1367, '07469', 'Cala Sant VicenÇ (pollenÇa)', 7, 1),
(1368, '07470', 'Port De PollenÇa', 7, 1);
INSERT INTO `lnx_poblaciones` (`id`, `cp`, `poblacion`, `idprov`, `idpais`) VALUES
(1369, '07500', 'Manacor', 7, 1),
(1370, '07509', 'Son MaciÀ', 7, 1),
(1371, '07510', 'Sineu', 7, 1),
(1372, '07511', 'Ruberts', 7, 1),
(1373, '07518', 'Lloret De Vistalegre', 7, 1),
(1374, '07519', 'Maria De La Salut', 7, 1),
(1375, '07520', 'Petra', 7, 1),
(1376, '07529', 'Ariany', 7, 1),
(1377, '07530', 'Sant LlorenÇ Des Cardassar', 7, 1),
(1378, '07540', 'Son Carrio (mallorca)', 7, 1),
(1379, '07550', 'Son Servera', 7, 1),
(1380, '07559', 'Port Verd', 7, 1),
(1381, '07560', 'Sa Coma (cala Millor)', 7, 1),
(1382, '07560', 'Sa Coma (cala Millor)', 7, 1),
(1383, '07560', 'Sa Coma (cala Millor)', 7, 1),
(1384, '07570', 'Arta', 7, 1),
(1385, '07579', 'Colonia De Sant Pere', 7, 1),
(1386, '07580', 'Capdepera', 7, 1),
(1387, '07589', 'Na Taconera', 7, 1),
(1388, '07590', 'Pedruscada', 7, 1),
(1389, '07600', 'Palma De Mallorca', 7, 1),
(1390, '07600', 'Palma De Mallorca', 7, 1),
(1391, '07608', 'Palma', 7, 1),
(1392, '07609', 'Urbanizacion Sa Torre', 7, 1),
(1393, '07610', 'Palma De Mallorca', 7, 1),
(1394, '07620', 'Llucmajor', 7, 1),
(1395, '07629', 'Randa', 7, 1),
(1396, '07630', 'Campos', 7, 1),
(1397, '07638', 'Palmer, El', 7, 1),
(1398, '07638', 'Palmer, El', 7, 1),
(1399, '07639', 'Vallgornera', 7, 1),
(1400, '07639', 'Vallgornera', 7, 1),
(1401, '07640', 'Salines (ses)', 7, 1),
(1402, '07650', 'Santanyi', 7, 1),
(1403, '07659', 'Sa Torre Nova', 7, 1),
(1404, '07660', 'Cala D\'or', 7, 1),
(1405, '07669', 'Horta, S\' (felanitx)', 7, 1),
(1406, '07669', 'Horta, S\' (felanitx)', 7, 1),
(1407, '07670', 'Portocolom', 7, 1),
(1408, '07680', 'Portocristo/port De Manacor', 7, 1),
(1409, '07687', 'S\'illot-cala Morlanda', 7, 1),
(1410, '07687', 'S\'illot-cala Morlanda', 7, 1),
(1411, '07688', 'Cala Murada', 7, 1),
(1412, '07689', 'Espinagar', 7, 1),
(1413, '07690', 'Son Moger', 7, 1),
(1414, '07691', 'S\'alqueria Blanca/l\'alqueria Blanca', 7, 1),
(1415, '07700', 'Maó', 7, 1),
(1416, '07701', 'Maó', 7, 1),
(1417, '07702', 'Maó', 7, 1),
(1418, '07703', 'Maó', 7, 1),
(1419, '07710', 'Palma De Mallorca', 7, 1),
(1420, '07711', 'Ullastrar, L\'', 7, 1),
(1421, '07712', 'Sant Climent', 7, 1),
(1422, '07713', 'Ses Barraques', 7, 1),
(1423, '07714', 'Maó', 7, 1),
(1424, '07720', 'Trepuco', 7, 1),
(1425, '07720', 'Trepuco', 7, 1),
(1426, '07730', 'Torre Soli Nou, Urbanitzacio', 7, 1),
(1427, '07740', 'Son Parc, Urbanitzacio', 7, 1),
(1428, '07748', 'Salines, Ses (mercadal-menorca), Urbanitzacio', 7, 1),
(1429, '07749', 'Sant TomÀs, Platja, Urbanitzacio', 7, 1),
(1430, '07750', 'Ferreries', 7, 1),
(1431, '07750', 'Ferreries', 7, 1),
(1432, '07750', 'Ferreries', 7, 1),
(1433, '07760', 'Ciutadella De Menorca', 7, 1),
(1434, '07760', 'Ciutadella De Menorca', 7, 1),
(1435, '07769', 'Torre Del Ram', 7, 1),
(1436, '07800', 'Talamanca (eivissa)', 7, 1),
(1437, '07800', 'Talamanca (eivissa)', 7, 1),
(1438, '07800', 'Talamanca (eivissa)', 7, 1),
(1439, '07810', 'Sant Joan De Labritja', 7, 1),
(1440, '07811', 'Sant Vicent De Sa Cala', 7, 1),
(1441, '07812', 'Sant LlorenÇ De BalÀfia', 7, 1),
(1442, '07814', 'Santa Gertrudis De Fruitera', 7, 1),
(1443, '07815', 'Sant Miquel De Balasant', 7, 1),
(1444, '07816', 'Sant Rafel De Sa Creu/sant Rafel De La Creu', 7, 1),
(1445, '07817', 'Sant Josep De Sa Talaia (urbanitzacio Platja Den B', 7, 1),
(1446, '07818', 'Sant Josep De Sa Talaia (sant Francesc De S\'estany', 7, 1),
(1447, '07819', 'Roca Llisa, Urbanitzacio', 7, 1),
(1448, '07820', 'Sant Antoni De Portmany', 7, 1),
(1449, '07828', 'Santa Agnes De Corona', 7, 1),
(1450, '07829', 'Sant Josep De Sa Talaia (urbanitzacio Pinos Y Mar)', 7, 1),
(1451, '07830', 'Sant Josep De Sa Talaia (urbanitzacio Calo Den Rei', 7, 1),
(1452, '07839', 'Sant Josep De Sa Talaia (urbanitzacio Vista Alegre', 7, 1),
(1453, '07840', 'Santa Eularia Des Riu', 7, 1),
(1454, '07849', 'Siesta, La, Urbanitzacio', 7, 1),
(1455, '07850', 'Sant Carles De Peralta', 7, 1),
(1456, '07850', 'Sant Carles De Peralta', 7, 1),
(1457, '07860', 'Sant Francesc De Formentera', 7, 1),
(1458, '07870', 'Savina, La', 7, 1),
(1459, '07871', 'Sant Ferran De Ses Roques', 7, 1),
(1460, '07872', 'Pilar De La Mola', 7, 1),
(1461, '08001', 'Barcelona', 8, 1),
(1462, '08002', 'Barcelona', 8, 1),
(1463, '08003', 'Barcelona', 8, 1),
(1464, '08004', 'Barcelona', 8, 1),
(1465, '08005', 'Barcelona', 8, 1),
(1466, '08006', 'Barcelona', 8, 1),
(1467, '08007', 'Barcelona', 8, 1),
(1468, '08008', 'Barcelona', 8, 1),
(1469, '08009', 'Barcelona', 8, 1),
(1470, '08010', 'Barcelona', 8, 1),
(1471, '08011', 'Barcelona', 8, 1),
(1472, '08012', 'Barcelona', 8, 1),
(1473, '08013', 'Barcelona', 8, 1),
(1474, '08014', 'Barcelona', 8, 1),
(1475, '08015', 'Barcelona', 8, 1),
(1476, '08016', 'Barcelona', 8, 1),
(1477, '08017', 'Barcelona', 8, 1),
(1478, '08018', 'Barcelona', 8, 1),
(1479, '08019', 'Barcelona', 8, 1),
(1480, '08020', 'Barcelona', 8, 1),
(1481, '08021', 'Barcelona', 8, 1),
(1482, '08022', 'Barcelona', 8, 1),
(1483, '08023', 'Barcelona', 8, 1),
(1484, '08024', 'Barcelona', 8, 1),
(1485, '08025', 'Barcelona', 8, 1),
(1486, '08026', 'Barcelona', 8, 1),
(1487, '08027', 'Barcelona', 8, 1),
(1488, '08028', 'Barcelona', 8, 1),
(1489, '08029', 'Barcelona', 8, 1),
(1490, '08030', 'Barcelona', 8, 1),
(1491, '08031', 'Barcelona', 8, 1),
(1492, '08032', 'Barcelona', 8, 1),
(1493, '08033', 'Barcelona', 8, 1),
(1494, '08034', 'Barcelona', 8, 1),
(1495, '08035', 'Barcelona', 8, 1),
(1496, '08036', 'Barcelona', 8, 1),
(1497, '08037', 'Barcelona', 8, 1),
(1498, '08038', 'Barcelona', 8, 1),
(1499, '08039', 'Barcelona', 8, 1),
(1500, '08040', 'Barcelona', 8, 1),
(1501, '08041', 'Barcelona', 8, 1),
(1502, '08042', 'Barcelona', 8, 1),
(1503, '08100', 'Mollet Del Valles', 8, 1),
(1504, '08104', 'Gallecs', 8, 1),
(1505, '08105', 'Sant Fost De Campsentelles', 8, 1),
(1506, '08106', 'Santa Maria De Martorelles', 8, 1),
(1507, '08107', 'Martorelles', 8, 1),
(1508, '08110', 'VallenÇana, La', 8, 1),
(1509, '08120', 'Llagosta, La', 8, 1),
(1510, '08130', 'Santiga (santa Perpetua De Mogoda)', 8, 1),
(1511, '08140', 'Can Valls-to, Urbanitzacio', 8, 1),
(1512, '08146', 'Gallifa', 8, 1),
(1513, '08148', 'Estany, L\'', 8, 1),
(1514, '08150', 'Parets Del Valles', 8, 1),
(1515, '08160', 'Montmelo', 8, 1),
(1516, '08161', 'Rub', 8, 1),
(1517, '08170', 'Montornes Del Valles', 8, 1),
(1518, '08172', 'Sant Cugat Del Vallés', 8, 1),
(1519, '08173', 'Sant Cugat Del Vallés', 8, 1),
(1520, '08174', 'Sant Cugat Del Vallés', 8, 1),
(1521, '08175', 'Sant Cugat del Valles', 8, 1),
(1522, '08178', 'Collsuspina', 8, 1),
(1523, '08180', 'Moia', 8, 1),
(1524, '08181', 'Sentmenat', 8, 1),
(1525, '08182', 'Sant Feliu De Codines', 8, 1),
(1526, '08183', 'Granera', 8, 1),
(1527, '08183', 'Granera', 8, 1),
(1528, '08183', 'Granera', 8, 1),
(1529, '08184', 'Palau-solita I Plegamans', 8, 1),
(1530, '08184', 'Palau-solita I Plegamans', 8, 1),
(1531, '08185', 'LliÇa De Vall', 8, 1),
(1532, '08186', 'LliÇa D\'amunt', 8, 1),
(1533, '08187', 'Santa Eulalia De RonÇana', 8, 1),
(1534, '08188', 'Vallromanes', 8, 1),
(1535, '08189', 'Sant Quirze Safaja', 8, 1),
(1536, '08190', 'Sant Cugat Del Vallés', 8, 1),
(1537, '08191', 'Rubi', 8, 1),
(1538, '08192', 'Sant Quirze Del Valles', 8, 1),
(1539, '08193', 'Universitat Autonoma De Barcelona', 8, 1),
(1540, '08194', 'Fonts, Les (sant Quirze Del Valles)', 8, 1),
(1541, '08195', 'Sant Cugat Del Vallés', 8, 1),
(1542, '08196', 'Sant Cugat Del Vallés', 8, 1),
(1543, '08197', 'Sant Cugat Del Vallés', 8, 1),
(1544, '08198', 'Sant Cugat Del Vallés', 8, 1),
(1545, '08201', 'Sabadell', 8, 1),
(1546, '08202', 'Sabadell', 8, 1),
(1547, '08203', 'Sabadell', 8, 1),
(1548, '08204', 'Sabadell', 8, 1),
(1549, '08205', 'Sabadell', 8, 1),
(1550, '08206', 'Sabadell', 8, 1),
(1551, '08207', 'Sabadell', 8, 1),
(1552, '08208', 'Sabadell', 8, 1),
(1553, '08210', 'Santiga (barbera Del Valles)', 8, 1),
(1554, '08211', 'Sant Feliu Del Raco', 8, 1),
(1555, '08212', 'Sant LlorenÇ Savall', 8, 1),
(1556, '08213', 'Polinya', 8, 1),
(1557, '08214', 'Badia Del Valles', 8, 1),
(1558, '08220', 'Terrassa', 8, 1),
(1559, '08221', 'Terrassa', 8, 1),
(1560, '08222', 'Terrassa', 8, 1),
(1561, '08223', 'Terrassa', 8, 1),
(1562, '08224', 'Terrassa', 8, 1),
(1563, '08225', 'Terrassa', 8, 1),
(1564, '08226', 'Terrassa', 8, 1),
(1565, '08227', 'Terrassa', 8, 1),
(1566, '08228', 'Terrassa', 8, 1),
(1567, '08228', 'Terrassa', 8, 1),
(1568, '08230', 'Sant LlorenÇ (matadepera)', 8, 1),
(1569, '08231', 'Ullastrell', 8, 1),
(1570, '08232', 'Viladecavalls', 8, 1),
(1571, '08233', 'Vacarisses', 8, 1),
(1572, '08240', 'Manresa', 8, 1),
(1573, '08241', 'Manresa', 8, 1),
(1574, '08242', 'Manresa', 8, 1),
(1575, '08243', 'Manresa', 8, 1),
(1576, '08250', 'Sant Marti De Torroella', 8, 1),
(1577, '08251', 'Santpedor', 8, 1),
(1578, '08251', 'Santpedor', 8, 1),
(1579, '08253', 'Sant Salvador De Guardiola', 8, 1),
(1580, '08254', 'Pont De Vilumara (manresa)', 8, 1),
(1581, '08255', 'Castellfollit Del Boix', 8, 1),
(1582, '08256', 'Rajadell', 8, 1),
(1583, '08256', 'Rajadell', 8, 1),
(1584, '08259', 'Fonollosa', 8, 1),
(1585, '08260', 'Suria', 8, 1),
(1586, '08261', 'Coromina, La', 8, 1),
(1587, '08262', 'Callus', 8, 1),
(1588, '08263', 'Sant Mateu De Bages', 8, 1),
(1589, '08269', 'Valls De Torruela', 8, 1),
(1590, '08269', 'Valls De Torruela', 8, 1),
(1591, '08270', 'Navarcles', 8, 1),
(1592, '08271', 'Artes', 8, 1),
(1593, '08272', 'Sant Fruitos De Bages', 8, 1),
(1594, '08273', 'Santa Maria D\'olo', 8, 1),
(1595, '08274', 'Sant Feliu Sasserra', 8, 1),
(1596, '08275', 'Viladecavalls (calders)', 8, 1),
(1597, '08275', 'Viladecavalls (calders)', 8, 1),
(1598, '08278', 'Talamanca', 8, 1),
(1599, '08278', 'Talamanca', 8, 1),
(1600, '08279', 'Avinyo', 8, 1),
(1601, '08280', 'Calaf', 8, 1),
(1602, '08281', 'Prades De Molsosa', 8, 1),
(1603, '08281', 'Prades De Molsosa', 8, 1),
(1604, '08281', 'Prades De Molsosa', 8, 1),
(1605, '08281', 'Prades De Molsosa', 8, 1),
(1606, '08282', 'Sant Marti Sesgueioles', 8, 1),
(1607, '08282', 'Sant Marti Sesgueioles', 8, 1),
(1608, '08289', 'Veciana', 8, 1),
(1609, '08289', 'Veciana', 8, 1),
(1610, '08290', 'Cerdanyola Del Valles', 8, 1),
(1611, '08291', 'Ripollet', 8, 1),
(1612, '08292', 'Serra Alta (hostalets De Pierola)', 8, 1),
(1613, '08293', 'Collbato', 8, 1),
(1614, '08294', 'Bruc, El', 8, 1),
(1615, '08295', 'Sant VicenÇ De Castellet', 8, 1),
(1616, '08296', 'Castellbell I El Vilar', 8, 1),
(1617, '08297', 'Castellgali', 8, 1),
(1618, '08298', 'Marganell', 8, 1),
(1619, '08299', 'Rellinars', 8, 1),
(1620, '08301', 'Mataró', 8, 1),
(1621, '08302', 'Mataró', 8, 1),
(1622, '08303', 'Mataró', 8, 1),
(1623, '08304', 'Mataró', 8, 1),
(1624, '08310', 'Argentona', 8, 1),
(1625, '08317', 'Orrius', 8, 1),
(1626, '08318', 'Canyamars (dosrius)', 8, 1),
(1627, '08319', 'Dosrius', 8, 1),
(1628, '08320', 'Masnou, El', 8, 1),
(1629, '08328', 'Alella', 8, 1),
(1630, '08329', 'Teia', 8, 1),
(1631, '08330', 'Premia De Mar', 8, 1),
(1632, '08338', 'Premia De Dalt', 8, 1),
(1633, '08339', 'Vilassar De Dalt', 8, 1),
(1634, '08340', 'Vilassar De Mar', 8, 1),
(1635, '08348', 'Cabrils', 8, 1),
(1636, '08349', 'Cabrera De Mar', 8, 1),
(1637, '08350', 'Arenys De Mar', 8, 1),
(1638, '08350', 'Arenys De Mar', 8, 1),
(1639, '08358', 'Arenys De Munt', 8, 1),
(1640, '08359', 'Sant Iscle De Vallalta', 8, 1),
(1641, '08360', 'Canet De Mar', 8, 1),
(1642, '08370', 'Calella', 8, 1),
(1643, '08380', 'Malgrat De Mar', 8, 1),
(1644, '08384', 'Cabrils', 8, 1),
(1645, '08389', 'Sant Genis De Palafolls', 8, 1),
(1646, '08390', 'Virreina, La (tiana)', 8, 1),
(1647, '08391', 'Tiana', 8, 1),
(1648, '08392', 'Sant Andreu De Llavaneres', 8, 1),
(1649, '08393', 'Caldes D\'estrac', 8, 1),
(1650, '08394', 'Sant VicenÇ De Montalt', 8, 1),
(1651, '08395', 'Sant Pol De Mar', 8, 1),
(1652, '08396', 'Sant Cebria De Vallalta', 8, 1),
(1653, '08397', 'Pineda De Mar', 8, 1),
(1654, '08398', 'Santa Susanna', 8, 1),
(1655, '08401', 'Granollers', 8, 1),
(1656, '08402', 'Granollers', 8, 1),
(1657, '08403', 'Granollers', 8, 1),
(1658, '08410', 'Vilanova Del Valles', 8, 1),
(1659, '08415', 'Bigues', 8, 1),
(1660, '08416', 'Riells Del Fai (bigues I Riells)', 8, 1),
(1661, '08420', 'Canovelles', 8, 1),
(1662, '08430', 'Valldoriolf (la Roca Del Valles)', 8, 1),
(1663, '08440', 'Cardedeu', 8, 1),
(1664, '08440', 'Cardedeu', 8, 1),
(1665, '08445', 'Samalus', 8, 1),
(1666, '08450', 'Sanata (llinars Del Valles)', 8, 1),
(1667, '08455', 'Vilalba Sasserra', 8, 1),
(1668, '08458', 'Sant Pere De Vilamajor', 8, 1),
(1669, '08458', 'Sant Pere De Vilamajor', 8, 1),
(1670, '08459', 'Sant Antoni De Vilamajor', 8, 1),
(1671, '08459', 'Sant Antoni De Vilamajor', 8, 1),
(1672, '08460', 'Santa Maria De Palautordera', 8, 1),
(1673, '08460', 'Santa Maria De Palautordera', 8, 1),
(1674, '08460', 'Santa Maria De Palautordera', 8, 1),
(1675, '08461', 'Sant Esteve De Palautordera', 8, 1),
(1676, '08469', 'Rieral, El (fogars De Montclus)', 8, 1),
(1677, '08470', 'Virgili, El (santa Maria De Palautordera)', 8, 1),
(1678, '08470', 'Virgili, El (santa Maria De Palautordera)', 8, 1),
(1679, '08470', 'Virgili, El (santa Maria De Palautordera)', 8, 1),
(1680, '08470', 'Virgili, El (santa Maria De Palautordera)', 8, 1),
(1681, '08471', 'Vallgorguina', 8, 1),
(1682, '08472', 'Campins', 8, 1),
(1683, '08474', 'Gualba', 8, 1),
(1684, '08476', 'Batlloria, La (sant Celoni)', 8, 1),
(1685, '08479', 'Mosqueroles', 8, 1),
(1686, '08480', 'Pinar I El Portus, El', 8, 1),
(1687, '08490', 'Tordera', 8, 1),
(1688, '08495', 'Fogars De La Selva', 8, 1),
(1689, '08500', 'Vic', 8, 1),
(1690, '08503', 'Sant Bartomeu Del Grau', 8, 1),
(1691, '08504', 'Sant Sadurni D\'osormort', 8, 1),
(1692, '08505', 'Sentfores', 8, 1),
(1693, '08505', 'Sentfores', 8, 1),
(1694, '08506', 'Calldetenes', 8, 1),
(1695, '08507', 'Santa Eugenia De Berga', 8, 1),
(1696, '08508', 'Santa Cecilia De Voltrega', 8, 1),
(1697, '08508', 'Santa Cecilia De Voltrega', 8, 1),
(1698, '08509', 'Vinyoles D\'oris (masies De VoltregÀ)', 8, 1),
(1699, '08509', 'Vinyoles D\'oris (masies De VoltregÀ)', 8, 1),
(1700, '08510', 'Roda De Ter', 8, 1),
(1701, '08510', 'Roda De Ter', 8, 1),
(1702, '08511', 'Tavertet', 8, 1),
(1703, '08511', 'Tavertet', 8, 1),
(1704, '08512', 'Sant Hipolit De Voltrega', 8, 1),
(1705, '08513', 'Prats De LluÇanes', 8, 1),
(1706, '08514', 'LluÇa', 8, 1),
(1707, '08515', 'Santa Creu De Jotglar', 8, 1),
(1708, '08516', 'Olost', 8, 1),
(1709, '08517', 'Santa Maria De Merles', 8, 1),
(1710, '08518', 'Orista', 8, 1),
(1711, '08519', 'Vilanova De Sau', 8, 1),
(1712, '08519', 'Vilanova De Sau', 8, 1),
(1713, '08519', 'Vilanova De Sau', 8, 1),
(1714, '08519', 'Vilanova De Sau', 8, 1),
(1715, '08519', 'Vilanova De Sau', 8, 1),
(1716, '08519', 'Vilanova De Sau', 8, 1),
(1717, '08519', 'Vilanova De Sau', 8, 1),
(1718, '08519', 'Vilanova De Sau', 8, 1),
(1719, '08520', 'Marata', 8, 1),
(1720, '08521', 'Bellavista', 8, 1),
(1721, '08529', 'Muntanyola', 8, 1),
(1722, '08530', 'Garriga, La', 8, 1),
(1723, '08530', 'Garriga, La', 8, 1),
(1724, '08540', 'Centelles', 8, 1),
(1725, '08550', 'Hostalets De Balenya, Els (balenyÀ)', 8, 1),
(1726, '08551', 'Tona', 8, 1),
(1727, '08552', 'Taradell', 8, 1),
(1728, '08553', 'Seva', 8, 1),
(1729, '08554', 'Sant Miquel De Balenya-seva', 8, 1),
(1730, '08559', 'Brull, El', 8, 1),
(1731, '08560', 'Manlleu', 8, 1),
(1732, '08569', 'Sant Marti Sescorts', 8, 1),
(1733, '08569', 'Sant Marti Sescorts', 8, 1),
(1734, '08570', 'Torello', 8, 1),
(1735, '08571', 'Sant VicenÇ De Torello', 8, 1),
(1736, '08572', 'Sant Pere De Torello', 8, 1),
(1737, '08573', 'Oris', 8, 1),
(1738, '08580', 'Sant Quirze De Besora', 8, 1),
(1739, '08584', 'Santa Maria De Besora', 8, 1),
(1740, '08587', 'Alpens', 8, 1),
(1741, '08588', 'Sora', 8, 1),
(1742, '08589', 'Sobremunt', 8, 1),
(1743, '08589', 'Sobremunt', 8, 1),
(1744, '08589', 'Sobremunt', 8, 1),
(1745, '08589', 'Sobremunt', 8, 1),
(1746, '08589', 'Sobremunt', 8, 1),
(1747, '08589', 'Sobremunt', 8, 1),
(1748, '08590', 'Montmany- Figaro', 8, 1),
(1749, '08591', 'Aiguafreda', 8, 1),
(1750, '08592', 'Sant Marti De Centelles', 8, 1),
(1751, '08593', 'Tagamanent', 8, 1),
(1752, '08600', 'Poligon De La Valldan, El', 8, 1),
(1753, '08604', 'Castell De L\'areny', 8, 1),
(1754, '08605', 'Montclar', 8, 1),
(1755, '08610', 'Cal Rosal (avia)', 8, 1),
(1756, '08611', 'Olvan', 8, 1),
(1757, '08612', 'Montmajor', 8, 1),
(1758, '08613', 'Vilada', 8, 1),
(1759, '08614', 'Espunyola, L\'', 8, 1),
(1760, '08619', 'Llinars (castellar Del Riu)', 8, 1),
(1761, '08619', 'Llinars (castellar Del Riu)', 8, 1),
(1762, '08619', 'Llinars (castellar Del Riu)', 8, 1),
(1763, '08619', 'Llinars (castellar Del Riu)', 8, 1),
(1764, '08619', 'Llinars (castellar Del Riu)', 8, 1),
(1765, '08619', 'Llinars (castellar Del Riu)', 8, 1),
(1766, '08619', 'Llinars (castellar Del Riu)', 8, 1),
(1767, '08620', 'Sant VicenÇ Dels Horts', 8, 1),
(1768, '08629', 'Torrelles De Llobregat', 8, 1),
(1769, '08630', 'Santa Maria De Vilalba', 8, 1),
(1770, '08635', 'Sant Esteve Sesrovires', 8, 1),
(1771, '08640', 'Olesa De Montserrat', 8, 1),
(1772, '08650', 'Sallent', 8, 1),
(1773, '08660', 'Balsareny', 8, 1),
(1774, '08670', 'Navas', 8, 1),
(1775, '08672', 'Gaia', 8, 1),
(1776, '08673', 'Viver I Serrateix', 8, 1),
(1777, '08680', 'Guixaro, El', 8, 1),
(1778, '08690', 'Santa Coloma De Cervello', 8, 1),
(1779, '08691', 'Monistrol De Montserrat', 8, 1),
(1780, '08692', 'Puig-reig', 8, 1),
(1781, '08693', 'Casserres', 8, 1),
(1782, '08694', 'Sant Julia De Cerdanyola', 8, 1),
(1783, '08694', 'Sant Julia De Cerdanyola', 8, 1),
(1784, '08695', 'Gisclareny', 8, 1),
(1785, '08695', 'Gisclareny', 8, 1),
(1786, '08696', 'Pobla De Lillet, La', 8, 1),
(1787, '08696', 'Pobla De Lillet, La', 8, 1),
(1788, '08697', 'Saldes', 8, 1),
(1789, '08698', 'Sant Jordi De Cercs', 8, 1),
(1790, '08698', 'Sant Jordi De Cercs', 8, 1),
(1791, '08699', 'Vallcebre', 8, 1),
(1792, '08699', 'Vallcebre', 8, 1),
(1793, '08699', 'Vallcebre', 8, 1),
(1794, '08699', 'Vallcebre', 8, 1),
(1795, '08699', 'Vallcebre', 8, 1),
(1796, '08700', 'Igualada', 8, 1),
(1797, '08710', 'Santa Margarida De Montbui A-antiguo', 8, 1),
(1798, '08711', 'Odena', 8, 1),
(1799, '08712', 'Sant Marti De Tous', 8, 1),
(1800, '08717', 'Montmaneu', 8, 1),
(1801, '08717', 'Montmaneu', 8, 1),
(1802, '08718', 'Cabrera D\'anoia', 8, 1),
(1803, '08719', 'Santa Maria Cami (veciana)', 8, 1),
(1804, '08719', 'Santa Maria Cami (veciana)', 8, 1),
(1805, '08719', 'Santa Maria Cami (veciana)', 8, 1),
(1806, '08720', 'Vilafranca Del Penedes', 8, 1),
(1807, '08729', 'Clariana (castellet I La Gornal)', 8, 1),
(1808, '08730', 'Santa Margarida I Els Monjos', 8, 1),
(1809, '08731', 'Sant Marti Sarroca', 8, 1),
(1810, '08731', 'Sant Marti Sarroca', 8, 1),
(1811, '08732', 'Sant MarÇal (castellet I La Gornal)', 8, 1),
(1812, '08732', 'Sant MarÇal (castellet I La Gornal)', 8, 1),
(1813, '08733', 'Pla Del Penedes, El', 8, 1),
(1814, '08734', 'Olerdola', 8, 1),
(1815, '08734', 'Olerdola', 8, 1),
(1816, '08735', 'Vilobi Del Penedes', 8, 1),
(1817, '08736', 'Guardiola De Font-rubi', 8, 1),
(1818, '08737', 'Torrelles De Foix', 8, 1),
(1819, '08738', 'Pontons', 8, 1),
(1820, '08739', 'Subirats', 8, 1),
(1821, '08739', 'Subirats', 8, 1),
(1822, '08740', 'Sant Andreu De La Barca', 8, 1),
(1823, '08750', 'Vallpineda', 8, 1),
(1824, '08753', 'Fontpineda Urbanizacion (pallejÀ), Urbanitzacio', 8, 1),
(1825, '08754', 'Papiol, El', 8, 1),
(1826, '08755', 'Castellbisbal', 8, 1),
(1827, '08756', 'Palma De Cervello, La', 8, 1),
(1828, '08757', 'Safari, Urbanizacio', 8, 1),
(1829, '08758', 'Inter-club (vallirana)', 8, 1),
(1830, '08759', 'Vallirana', 8, 1),
(1831, '08760', 'Martorell', 8, 1),
(1832, '08769', 'Castellvi De Rosanes', 8, 1),
(1833, '08770', 'Sant Sadurni D\'anoia', 8, 1),
(1834, '08770', 'Sant Sadurni D\'anoia', 8, 1),
(1835, '08773', 'Mediona', 8, 1),
(1836, '08775', 'Torrelavit', 8, 1),
(1837, '08776', 'Sant Pere De Riudebitlles', 8, 1),
(1838, '08777', 'Sant Quinti De Mediona', 8, 1),
(1839, '08779', 'Llacuna, La', 8, 1),
(1840, '08780', 'Palleja', 8, 1),
(1841, '08781', 'Hostalets De Pierola, Els', 8, 1),
(1842, '08782', 'Sant Joan Samora (s.llorenÇ D\'hortons)', 8, 1),
(1843, '08782', 'Sant Joan Samora (s.llorenÇ D\'hortons)', 8, 1),
(1844, '08783', 'Masquefa', 8, 1),
(1845, '08784', 'Sant Jaume Sesoliveres', 8, 1),
(1846, '08785', 'Vallbona D\'anoia', 8, 1),
(1847, '08786', 'Capellades', 8, 1),
(1848, '08787', 'Santa Maria De Miralles', 8, 1),
(1849, '08787', 'Santa Maria De Miralles', 8, 1),
(1850, '08787', 'Santa Maria De Miralles', 8, 1),
(1851, '08787', 'Santa Maria De Miralles', 8, 1),
(1852, '08788', 'Vilanova Del Cami', 8, 1),
(1853, '08789', 'Torre De Claramunt, La', 8, 1),
(1854, '08790', 'Sant Salvador', 8, 1),
(1855, '08791', 'Sant LlorenÇ D\'hortons', 8, 1),
(1856, '08792', 'Santa Fe Del Penedes', 8, 1),
(1857, '08792', 'Santa Fe Del Penedes', 8, 1),
(1858, '08793', 'Avinyonet Del Penedes', 8, 1),
(1859, '08794', 'Cabanyes, Les', 8, 1),
(1860, '08795', 'Olesa De Bonesvalls', 8, 1),
(1861, '08796', 'Pacs Del Penedes', 8, 1),
(1862, '08797', 'Puigdalber', 8, 1),
(1863, '08798', 'Sant Sebastia Dels Gorgs (avinyonet Del Penedes)', 8, 1),
(1864, '08798', 'Sant Sebastia Dels Gorgs (avinyonet Del Penedes)', 8, 1),
(1865, '08799', 'Sant Pere Molanta (olerdola)', 8, 1),
(1866, '08800', 'Vilanova I La Geltru', 8, 1),
(1867, '08801', 'Terrassa', 8, 1),
(1868, '08810', 'Sant Pere De Ribes', 8, 1),
(1869, '08811', 'Canyelles', 8, 1),
(1870, '08812', 'Vilanoveta', 8, 1),
(1871, '08818', 'Olivella', 8, 1),
(1872, '08820', 'Prat De Llobregat, El', 8, 1),
(1873, '08830', 'Sant Boi De Llobregat', 8, 1),
(1874, '08840', 'Viladecans', 8, 1),
(1875, '08849', 'Sant Climent De Llobregat', 8, 1),
(1876, '08850', 'Gava', 8, 1),
(1877, '08859', 'Begues', 8, 1),
(1878, '08860', 'Rat Penat (sitges), Urbanitzacio', 8, 1),
(1879, '08870', 'Sitges', 8, 1),
(1880, '08871', 'Garraf (sitges)', 8, 1),
(1881, '08880', 'Cubelles', 8, 1),
(1882, '08901', 'Hospitalet De Llobregat,l\'', 8, 1),
(1883, '08902', 'Hospitalet De Llobregat,l\'', 8, 1),
(1884, '08903', 'Hospitalet De Llobregat,l\'', 8, 1),
(1885, '08904', 'Hospitalet De Llobregat,l\'', 8, 1),
(1886, '08905', 'Hospitalet De Llobregat,l\'', 8, 1),
(1887, '08906', 'Hospitalet De Llobregat,l\'', 8, 1),
(1888, '08907', 'Hospitalet De Llobregat,l\'', 8, 1),
(1889, '08908', 'Hospitalet De Llobregat,l\'', 8, 1),
(1890, '08911', 'Badalona', 8, 1),
(1891, '08912', 'Badalona', 8, 1),
(1892, '08913', 'Badalona', 8, 1),
(1893, '08914', 'Badalona', 8, 1),
(1894, '08915', 'Badalona', 8, 1),
(1895, '08916', 'Badalona', 8, 1),
(1896, '08917', 'Badalona', 8, 1),
(1897, '08918', 'Badalona', 8, 1),
(1898, '08921', 'Santa Coloma De Gramanet', 8, 1),
(1899, '08922', 'Santa Coloma De Gramanet', 8, 1),
(1900, '08923', 'Santa Coloma De Gramanet', 8, 1),
(1901, '08924', 'Santa Coloma De Gramanet', 8, 1),
(1902, '08930', 'Sant Adria De Besos', 8, 1),
(1903, '08940', 'Cornella De Llobregat', 8, 1),
(1904, '08950', 'Esplugues De Llobregat', 8, 1),
(1905, '08960', 'Sant Just Desvern', 8, 1),
(1906, '08970', 'Sant Joan Despi', 8, 1),
(1907, '08980', 'Sant Feliu De Llobregat', 8, 1),
(1908, '09001', 'Burgos', 9, 1),
(1909, '09002', 'Burgos', 9, 1),
(1910, '09003', 'Burgos', 9, 1),
(1911, '09004', 'Burgos', 9, 1),
(1912, '09004', 'Burgos', 9, 1),
(1913, '09005', 'Burgos', 9, 1),
(1914, '09006', 'Burgos', 9, 1),
(1915, '09007', 'Burgos', 9, 1),
(1916, '09100', 'Melgar De Fernamental', 9, 1),
(1917, '09107', 'Palacios De Riopisuerga', 9, 1),
(1918, '09107', 'Palacios De Riopisuerga', 9, 1),
(1919, '09107', 'Palacios De Riopisuerga', 9, 1),
(1920, '09107', 'Palacios De Riopisuerga', 9, 1),
(1921, '09108', 'Zarzosa De Rio Pisuerga', 9, 1),
(1922, '09108', 'Zarzosa De Rio Pisuerga', 9, 1),
(1923, '09108', 'Zarzosa De Rio Pisuerga', 9, 1),
(1924, '09108', 'Zarzosa De Rio Pisuerga', 9, 1),
(1925, '09108', 'Zarzosa De Rio Pisuerga', 9, 1),
(1926, '09109', 'Villaveta', 9, 1),
(1927, '09109', 'Villaveta', 9, 1),
(1928, '09109', 'Villaveta', 9, 1),
(1929, '09109', 'Villaveta', 9, 1),
(1930, '09110', 'Castrojeriz', 9, 1),
(1931, '09119', 'Villaquiran De La Puebla', 9, 1),
(1932, '09119', 'Villaquiran De La Puebla', 9, 1),
(1933, '09119', 'Villaquiran De La Puebla', 9, 1),
(1934, '09119', 'Villaquiran De La Puebla', 9, 1),
(1935, '09120', 'Villadiego', 9, 1),
(1936, '09121', 'San Llorente De La Vega', 9, 1),
(1937, '09123', 'Yudego', 9, 1),
(1938, '09124', 'Villusto', 9, 1),
(1939, '09124', 'Villusto', 9, 1),
(1940, '09125', 'Villaute', 9, 1),
(1941, '09125', 'Villaute', 9, 1),
(1942, '09125', 'Villaute', 9, 1),
(1943, '09125', 'Villaute', 9, 1),
(1944, '09125', 'Villaute', 9, 1),
(1945, '09126', 'Trasahedo Del Tozo', 9, 1),
(1946, '09126', 'Trasahedo Del Tozo', 9, 1),
(1947, '09127', 'Villaescobedo De Valdelucio', 9, 1),
(1948, '09127', 'Villaescobedo De Valdelucio', 9, 1),
(1949, '09128', 'Villegas', 9, 1),
(1950, '09128', 'Villegas', 9, 1),
(1951, '09128', 'Villegas', 9, 1),
(1952, '09128', 'Villegas', 9, 1),
(1953, '09128', 'Villegas', 9, 1),
(1954, '09128', 'Villegas', 9, 1),
(1955, '09129', 'Villalibado', 9, 1),
(1956, '09130', 'Tardajos', 9, 1),
(1957, '09130', 'Tardajos', 9, 1),
(1958, '09131', 'Villarmentero', 9, 1),
(1959, '09131', 'Villarmentero', 9, 1),
(1960, '09131', 'Villarmentero', 9, 1),
(1961, '09131', 'Villarmentero', 9, 1),
(1962, '09133', 'Villorejo', 9, 1),
(1963, '09133', 'Villorejo', 9, 1),
(1964, '09133', 'Villorejo', 9, 1),
(1965, '09133', 'Villorejo', 9, 1),
(1966, '09133', 'Villorejo', 9, 1),
(1967, '09133', 'Villorejo', 9, 1),
(1968, '09133', 'Villorejo', 9, 1),
(1969, '09135', 'Sotresgudo', 9, 1),
(1970, '09136', 'Salazar De Amaya', 9, 1),
(1971, '09140', 'Vivar Del Cid', 9, 1),
(1972, '09140', 'Vivar Del Cid', 9, 1),
(1973, '09140', 'Vivar Del Cid', 9, 1),
(1974, '09141', 'Villalvilla De Sobresierra', 9, 1),
(1975, '09141', 'Villalvilla De Sobresierra', 9, 1),
(1976, '09142', 'Terradillos De Sedano', 9, 1),
(1977, '09142', 'Terradillos De Sedano', 9, 1),
(1978, '09143', 'Tubilla Del Agua', 9, 1),
(1979, '09143', 'Tubilla Del Agua', 9, 1),
(1980, '09144', 'Lorilla', 9, 1),
(1981, '09145', 'Valdelateja', 9, 1),
(1982, '09145', 'Valdelateja', 9, 1),
(1983, '09145', 'Valdelateja', 9, 1),
(1984, '09146', 'Villanueva Rampalay', 9, 1),
(1985, '09146', 'Villanueva Rampalay', 9, 1),
(1986, '09146', 'Villanueva Rampalay', 9, 1),
(1987, '09150', 'Zumel', 9, 1),
(1988, '09150', 'Zumel', 9, 1),
(1989, '09150', 'Zumel', 9, 1),
(1990, '09159', 'Nuez De Abajo, La', 9, 1),
(1991, '09191', 'Villayerno Morquillas', 9, 1),
(1992, '09191', 'Villayerno Morquillas', 9, 1),
(1993, '09191', 'Villayerno Morquillas', 9, 1),
(1994, '09192', 'Villalbal', 9, 1),
(1995, '09192', 'Villalbal', 9, 1),
(1996, '09192', 'Villalbal', 9, 1),
(1997, '09193', 'San Pedro De CardeÑa', 9, 1),
(1998, '09193', 'San Pedro De CardeÑa', 9, 1),
(1999, '09193', 'San Pedro De CardeÑa', 9, 1),
(2000, '09193', 'San Pedro De CardeÑa', 9, 1),
(2001, '09194', 'Revilla Del Campo', 9, 1),
(2002, '09194', 'Revilla Del Campo', 9, 1),
(2003, '09194', 'Revilla Del Campo', 9, 1),
(2004, '09194', 'Revilla Del Campo', 9, 1),
(2005, '09194', 'Revilla Del Campo', 9, 1),
(2006, '09195', 'Villariezo', 9, 1),
(2007, '09195', 'Villariezo', 9, 1),
(2008, '09195', 'Villariezo', 9, 1),
(2009, '09195', 'Villariezo', 9, 1),
(2010, '09197', 'Villarmero', 9, 1),
(2011, '09197', 'Villarmero', 9, 1),
(2012, '09197', 'Villarmero', 9, 1),
(2013, '09197', 'Villarmero', 9, 1),
(2014, '09197', 'Villarmero', 9, 1),
(2015, '09198', 'Tomillares, Los', 9, 1),
(2016, '09198', 'Tomillares, Los', 9, 1),
(2017, '09198', 'Tomillares, Los', 9, 1),
(2018, '09199', 'Zalduendo', 9, 1),
(2019, '09199', 'Zalduendo', 9, 1),
(2020, '09199', 'Zalduendo', 9, 1),
(2021, '09199', 'Zalduendo', 9, 1),
(2022, '09199', 'Zalduendo', 9, 1),
(2023, '09199', 'Zalduendo', 9, 1),
(2024, '09199', 'Zalduendo', 9, 1),
(2025, '09199', 'Zalduendo', 9, 1),
(2026, '09199', 'Zalduendo', 9, 1),
(2027, '09200', 'Miranda De Ebro', 9, 1),
(2028, '09210', 'Quintana Martin Galindez', 9, 1),
(2029, '09211', 'Zangandez', 9, 1),
(2030, '09211', 'Zangandez', 9, 1),
(2031, '09211', 'Zangandez', 9, 1),
(2032, '09211', 'Zangandez', 9, 1),
(2033, '09212', 'Villanueva Del Grillo', 9, 1),
(2034, '09212', 'Villanueva Del Grillo', 9, 1),
(2035, '09212', 'Villanueva Del Grillo', 9, 1),
(2036, '09213', 'Virues', 9, 1),
(2037, '09213', 'Virues', 9, 1),
(2038, '09213', 'Virues', 9, 1),
(2039, '09214', 'Villanueva Soportilla', 9, 1),
(2040, '09215', 'Villanueva De Tobera', 9, 1),
(2041, '09216', 'Saseta', 9, 1),
(2042, '09217', 'Uzquiano', 9, 1),
(2043, '09218', 'Taravero', 9, 1),
(2044, '09218', 'Taravero', 9, 1),
(2045, '09219', 'Villanueva De Teba', 9, 1),
(2046, '09219', 'Villanueva De Teba', 9, 1),
(2047, '09219', 'Villanueva De Teba', 9, 1),
(2048, '09219', 'Villanueva De Teba', 9, 1),
(2049, '09219', 'Villanueva De Teba', 9, 1),
(2050, '09219', 'Villanueva De Teba', 9, 1),
(2051, '09219', 'Villanueva De Teba', 9, 1),
(2052, '09219', 'Villanueva De Teba', 9, 1),
(2053, '09219', 'Villanueva De Teba', 9, 1),
(2054, '09220', 'Pampliega', 9, 1),
(2055, '09226', 'Villazopeque', 9, 1),
(2056, '09226', 'Villazopeque', 9, 1),
(2057, '09226', 'Villazopeque', 9, 1),
(2058, '09226', 'Villazopeque', 9, 1),
(2059, '09226', 'Villazopeque', 9, 1),
(2060, '09226', 'Villazopeque', 9, 1),
(2061, '09226', 'Villazopeque', 9, 1),
(2062, '09226', 'Villazopeque', 9, 1),
(2063, '09227', 'Villaldemiro', 9, 1),
(2064, '09227', 'Villaldemiro', 9, 1),
(2065, '09227', 'Villaldemiro', 9, 1),
(2066, '09227', 'Villaldemiro', 9, 1),
(2067, '09227', 'Villaldemiro', 9, 1),
(2068, '09228', 'Revenga', 9, 1),
(2069, '09228', 'Revenga', 9, 1),
(2070, '09228', 'Revenga', 9, 1),
(2071, '09228', 'Revenga', 9, 1),
(2072, '09228', 'Revenga', 9, 1),
(2073, '09228', 'Revenga', 9, 1),
(2074, '09230', 'Vilviestre De MuÑo', 9, 1),
(2075, '09230', 'Vilviestre De MuÑo', 9, 1),
(2076, '09230', 'Vilviestre De MuÑo', 9, 1),
(2077, '09230', 'Vilviestre De MuÑo', 9, 1),
(2078, '09230', 'Vilviestre De MuÑo', 9, 1),
(2079, '09233', 'Presillas', 9, 1),
(2080, '09239', 'Villavieja De MuÑo', 9, 1),
(2081, '09239', 'Villavieja De MuÑo', 9, 1),
(2082, '09239', 'Villavieja De MuÑo', 9, 1),
(2083, '09239', 'Villavieja De MuÑo', 9, 1),
(2084, '09239', 'Villavieja De MuÑo', 9, 1),
(2085, '09240', 'Briviesca', 9, 1),
(2086, '09244', 'Soto De Bureba', 9, 1),
(2087, '09244', 'Soto De Bureba', 9, 1),
(2088, '09244', 'Soto De Bureba', 9, 1),
(2089, '09245', 'ZuÑeda', 9, 1),
(2090, '09245', 'ZuÑeda', 9, 1),
(2091, '09245', 'ZuÑeda', 9, 1),
(2092, '09245', 'ZuÑeda', 9, 1),
(2093, '09245', 'ZuÑeda', 9, 1),
(2094, '09246', 'Terrazos De Bureba', 9, 1),
(2095, '09246', 'Terrazos De Bureba', 9, 1),
(2096, '09246', 'Terrazos De Bureba', 9, 1),
(2097, '09246', 'Terrazos De Bureba', 9, 1),
(2098, '09246', 'Terrazos De Bureba', 9, 1),
(2099, '09246', 'Terrazos De Bureba', 9, 1),
(2100, '09246', 'Terrazos De Bureba', 9, 1),
(2101, '09246', 'Terrazos De Bureba', 9, 1),
(2102, '09247', 'San Pedro De La Hoz', 9, 1),
(2103, '09247', 'San Pedro De La Hoz', 9, 1),
(2104, '09248', 'Valdazo', 9, 1),
(2105, '09248', 'Valdazo', 9, 1),
(2106, '09248', 'Valdazo', 9, 1),
(2107, '09248', 'Valdazo', 9, 1),
(2108, '09248', 'Valdazo', 9, 1),
(2109, '09248', 'Valdazo', 9, 1),
(2110, '09249', 'VileÑa', 9, 1),
(2111, '09249', 'VileÑa', 9, 1),
(2112, '09249', 'VileÑa', 9, 1),
(2113, '09249', 'VileÑa', 9, 1),
(2114, '09249', 'VileÑa', 9, 1),
(2115, '09249', 'VileÑa', 9, 1),
(2116, '09249', 'VileÑa', 9, 1),
(2117, '09250', 'Belorado', 9, 1),
(2118, '09251', 'Cubo De Bureba', 9, 1),
(2119, '09252', 'Silanes', 9, 1),
(2120, '09257', 'Villafranca Montes De Oca', 9, 1),
(2121, '09258', 'Villanasur Rio De Oca', 9, 1),
(2122, '09258', 'Villanasur Rio De Oca', 9, 1),
(2123, '09258', 'Villanasur Rio De Oca', 9, 1),
(2124, '09258', 'Villanasur Rio De Oca', 9, 1),
(2125, '09258', 'Villanasur Rio De Oca', 9, 1),
(2126, '09258', 'Villanasur Rio De Oca', 9, 1),
(2127, '09258', 'Villanasur Rio De Oca', 9, 1),
(2128, '09258', 'Villanasur Rio De Oca', 9, 1),
(2129, '09259', 'Viloria De Rioja', 9, 1),
(2130, '09259', 'Viloria De Rioja', 9, 1),
(2131, '09259', 'Viloria De Rioja', 9, 1),
(2132, '09259', 'Viloria De Rioja', 9, 1),
(2133, '09259', 'Viloria De Rioja', 9, 1),
(2134, '09259', 'Viloria De Rioja', 9, 1),
(2135, '09259', 'Viloria De Rioja', 9, 1),
(2136, '09260', 'Pradoluengo', 9, 1),
(2137, '09267', 'Fresneda De La Sierra Tiron', 9, 1),
(2138, '09267', 'Fresneda De La Sierra Tiron', 9, 1),
(2139, '09268', 'Villagalijo', 9, 1),
(2140, '09268', 'Villagalijo', 9, 1),
(2141, '09268', 'Villagalijo', 9, 1),
(2142, '09268', 'Villagalijo', 9, 1),
(2143, '09268', 'Villagalijo', 9, 1),
(2144, '09268', 'Villagalijo', 9, 1),
(2145, '09269', 'Villamudria', 9, 1),
(2146, '09270', 'Redecilla Del Campo', 9, 1),
(2147, '09270', 'Redecilla Del Campo', 9, 1),
(2148, '09271', 'Quintanilla San Garcia', 9, 1),
(2149, '09272', 'Loranquillo', 9, 1),
(2150, '09272', 'Loranquillo', 9, 1),
(2151, '09280', 'Pancorbo', 9, 1),
(2152, '09280', 'Pancorbo', 9, 1),
(2153, '09280', 'Pancorbo', 9, 1),
(2154, '09285', 'Valle de Mena', 9, 1),
(2155, '09290', 'Quintanapalla', 9, 1),
(2156, '09290', 'Quintanapalla', 9, 1),
(2157, '09292', 'Villaescusa La Sombria', 9, 1),
(2158, '09292', 'Villaescusa La Sombria', 9, 1),
(2159, '09292', 'Villaescusa La Sombria', 9, 1),
(2160, '09292', 'Villaescusa La Sombria', 9, 1),
(2161, '09292', 'Villaescusa La Sombria', 9, 1),
(2162, '09292', 'Villaescusa La Sombria', 9, 1),
(2163, '09292', 'Villaescusa La Sombria', 9, 1),
(2164, '09292', 'Villaescusa La Sombria', 9, 1),
(2165, '09293', 'Valverde De Miranda', 9, 1),
(2166, '09293', 'Valverde De Miranda', 9, 1),
(2167, '09294', 'Zurbitu', 9, 1),
(2168, '09294', 'Zurbitu', 9, 1),
(2169, '09300', 'Roa', 9, 1),
(2170, '09310', 'Villovela De Esgueva', 9, 1),
(2171, '09310', 'Villovela De Esgueva', 9, 1),
(2172, '09310', 'Villovela De Esgueva', 9, 1),
(2173, '09311', 'Olmedillo De Roa', 9, 1),
(2174, '09311', 'Olmedillo De Roa', 9, 1),
(2175, '09312', 'Tortoles De Esgueva', 9, 1),
(2176, '09312', 'Tortoles De Esgueva', 9, 1),
(2177, '09314', 'Villaescusa De Roa', 9, 1),
(2178, '09314', 'Villaescusa De Roa', 9, 1),
(2179, '09315', 'Fuentemolinos', 9, 1),
(2180, '09315', 'Fuentemolinos', 9, 1),
(2181, '09315', 'Fuentemolinos', 9, 1),
(2182, '09316', 'Hoyales De Roa', 9, 1),
(2183, '09316', 'Hoyales De Roa', 9, 1),
(2184, '09317', 'Valcabado De Roa', 9, 1),
(2185, '09317', 'Valcabado De Roa', 9, 1),
(2186, '09317', 'Valcabado De Roa', 9, 1),
(2187, '09318', 'Valdezate', 9, 1),
(2188, '09318', 'Valdezate', 9, 1),
(2189, '09318', 'Valdezate', 9, 1),
(2190, '09320', 'Valdorros', 9, 1),
(2191, '09320', 'Valdorros', 9, 1),
(2192, '09320', 'Valdorros', 9, 1),
(2193, '09330', 'Madrigalejo del Monte', 9, 1),
(2194, '09338', 'Valles De Palenzuela', 9, 1),
(2195, '09339', 'Zael', 9, 1),
(2196, '09339', 'Zael', 9, 1),
(2197, '09339', 'Zael', 9, 1),
(2198, '09339', 'Zael', 9, 1),
(2199, '09340', 'Lerma', 9, 1),
(2200, '09341', 'Tordomar', 9, 1),
(2201, '09341', 'Tordomar', 9, 1),
(2202, '09341', 'Tordomar', 9, 1),
(2203, '09342', 'Santa Maria Del Campo', 9, 1),
(2204, '09342', 'Santa Maria Del Campo', 9, 1),
(2205, '09342', 'Santa Maria Del Campo', 9, 1),
(2206, '09343', 'Villahoz', 9, 1),
(2207, '09344', 'Villafruela', 9, 1),
(2208, '09344', 'Villafruela', 9, 1),
(2209, '09345', 'Veguecilla, La', 9, 1),
(2210, '09345', 'Veguecilla, La', 9, 1),
(2211, '09345', 'Veguecilla, La', 9, 1),
(2212, '09345', 'Veguecilla, La', 9, 1),
(2213, '09346', 'Mecerreyes', 9, 1),
(2214, '09346', 'Mecerreyes', 9, 1),
(2215, '09347', 'Ura', 9, 1),
(2216, '09347', 'Ura', 9, 1),
(2217, '09347', 'Ura', 9, 1),
(2218, '09347', 'Ura', 9, 1),
(2219, '09347', 'Ura', 9, 1),
(2220, '09348', 'Villoviado', 9, 1),
(2221, '09348', 'Villoviado', 9, 1),
(2222, '09348', 'Villoviado', 9, 1),
(2223, '09348', 'Villoviado', 9, 1),
(2224, '09348', 'Villoviado', 9, 1),
(2225, '09349', 'Rabe De Los Escuderos', 9, 1),
(2226, '09349', 'Rabe De Los Escuderos', 9, 1),
(2227, '09349', 'Rabe De Los Escuderos', 9, 1),
(2228, '09349', 'Rabe De Los Escuderos', 9, 1),
(2229, '09349', 'Rabe De Los Escuderos', 9, 1),
(2230, '09349', 'Rabe De Los Escuderos', 9, 1),
(2231, '09350', 'SantibaÑez De Esgueva', 9, 1),
(2232, '09350', 'SantibaÑez De Esgueva', 9, 1),
(2233, '09350', 'SantibaÑez De Esgueva', 9, 1),
(2234, '09350', 'SantibaÑez De Esgueva', 9, 1),
(2235, '09351', 'Hontoria De La Cantera', 9, 1),
(2236, '09351', 'Hontoria De La Cantera', 9, 1),
(2237, '09352', 'Cubillo Del Campo', 9, 1),
(2238, '09353', 'Santa Maria Mercadillo', 9, 1),
(2239, '09354', 'Pinilla Trasmonte', 9, 1),
(2240, '09370', 'Quintana Del Pidio', 9, 1),
(2241, '09370', 'Quintana Del Pidio', 9, 1),
(2242, '09370', 'Quintana Del Pidio', 9, 1),
(2243, '09390', 'Villalmanzo', 9, 1),
(2244, '09390', 'Villalmanzo', 9, 1),
(2245, '09390', 'Villalmanzo', 9, 1),
(2246, '09390', 'Villalmanzo', 9, 1),
(2247, '09391', 'Castrillo De La Vega', 9, 1),
(2248, '09400', 'Aranda De Duero', 9, 1),
(2249, '09410', 'Valverde', 9, 1),
(2250, '09410', 'Valverde', 9, 1),
(2251, '09410', 'Valverde', 9, 1),
(2252, '09430', 'Huerta De Rey', 9, 1),
(2253, '09436', 'Haza', 9, 1),
(2254, '09440', 'Pinillos De Esgueva', 9, 1),
(2255, '09441', 'Sotillo De La Ribera', 9, 1),
(2256, '09442', 'Terradillos De Esgueva', 9, 1),
(2257, '09443', 'Villalba De Duero', 9, 1),
(2258, '09443', 'Villalba De Duero', 9, 1),
(2259, '09450', 'Villanueva De Gumiel', 9, 1),
(2260, '09450', 'Villanueva De Gumiel', 9, 1),
(2261, '09450', 'Villanueva De Gumiel', 9, 1),
(2262, '09450', 'Villanueva De Gumiel', 9, 1),
(2263, '09451', 'DoÑa Santos', 9, 1),
(2264, '09451', 'DoÑa Santos', 9, 1),
(2265, '09451', 'DoÑa Santos', 9, 1),
(2266, '09451', 'DoÑa Santos', 9, 1),
(2267, '09453', 'Villalvilla De Gumiel', 9, 1),
(2268, '09453', 'Villalvilla De Gumiel', 9, 1),
(2269, '09453', 'Villalvilla De Gumiel', 9, 1),
(2270, '09454', 'Quintanarraya', 9, 1),
(2271, '09454', 'Quintanarraya', 9, 1),
(2272, '09460', 'Milagros', 9, 1),
(2273, '09461', 'Fuentenebro', 9, 1),
(2274, '09462', 'Sequera De Haza, La', 9, 1),
(2275, '09462', 'Sequera De Haza, La', 9, 1),
(2276, '09462', 'Sequera De Haza, La', 9, 1),
(2277, '09462', 'Sequera De Haza, La', 9, 1),
(2278, '09462', 'Sequera De Haza, La', 9, 1),
(2279, '09463', 'Haza', 9, 1),
(2280, '09471', 'Vid, La', 9, 1),
(2281, '09471', 'Vid, La', 9, 1),
(2282, '09471', 'Vid, La', 9, 1),
(2283, '09471', 'Vid, La', 9, 1),
(2284, '09490', 'Zazuar', 9, 1),
(2285, '09490', 'Zazuar', 9, 1),
(2286, '09490', 'Zazuar', 9, 1),
(2287, '09490', 'Zazuar', 9, 1),
(2288, '09491', 'Zuzones', 9, 1),
(2289, '09491', 'Zuzones', 9, 1),
(2290, '09491', 'Zuzones', 9, 1),
(2291, '09493', 'Torregalindo', 9, 1),
(2292, '09493', 'Torregalindo', 9, 1),
(2293, '09500', 'Medina De Pomar', 9, 1),
(2294, '09510', 'Villaventin', 9, 1),
(2295, '09510', 'Villaventin', 9, 1),
(2296, '09511', 'Zaballa De Losa', 9, 1),
(2297, '09511', 'Zaballa De Losa', 9, 1),
(2298, '09511', 'Zaballa De Losa', 9, 1),
(2299, '09512', 'Villatomil', 9, 1),
(2300, '09512', 'Villatomil', 9, 1),
(2301, '09513', 'Villarias', 9, 1),
(2302, '09513', 'Villarias', 9, 1),
(2303, '09514', 'Villataras', 9, 1),
(2304, '09514', 'Villataras', 9, 1),
(2305, '09514', 'Villataras', 9, 1),
(2306, '09515', 'Villavedeo', 9, 1),
(2307, '09515', 'Villavedeo', 9, 1),
(2308, '09530', 'OÑa', 9, 1),
(2309, '09540', 'Trespaderne', 9, 1),
(2310, '09545', 'Valle de Mena', 9, 1),
(2311, '09549', 'Valujera', 9, 1),
(2312, '09549', 'Valujera', 9, 1),
(2313, '09549', 'Valujera', 9, 1),
(2314, '09549', 'Valujera', 9, 1),
(2315, '09550', 'Villarcayo', 9, 1),
(2316, '09551', 'Porquera De Butron', 9, 1),
(2317, '09551', 'Porquera De Butron', 9, 1),
(2318, '09553', 'Villacomparada De Rueda', 9, 1),
(2319, '09554', 'Villalain', 9, 1),
(2320, '09554', 'Villalain', 9, 1),
(2321, '09555', 'Villanueva La Blanca', 9, 1),
(2322, '09556', 'Villacanes', 9, 1),
(2323, '09557', 'Villaves', 9, 1),
(2324, '09557', 'Villaves', 9, 1),
(2325, '09557', 'Villaves', 9, 1),
(2326, '09558', 'Villasopliz', 9, 1),
(2327, '09558', 'Villasopliz', 9, 1),
(2328, '09559', 'Villalta', 9, 1),
(2329, '09559', 'Villalta', 9, 1),
(2330, '09559', 'Villalta', 9, 1),
(2331, '09560', 'Espinosa De Los Monteros', 9, 1),
(2332, '09566', 'Rio De Trueba', 9, 1),
(2333, '09567', 'Santa Olalla', 9, 1),
(2334, '09567', 'Santa Olalla', 9, 1),
(2335, '09568', 'Villamartin De Sotoscueva', 9, 1),
(2336, '09569', 'Villasante', 9, 1),
(2337, '09569', 'Villasante', 9, 1),
(2338, '09569', 'Villasante', 9, 1),
(2339, '09570', 'Arija', 9, 1),
(2340, '09570', 'Arija', 9, 1),
(2341, '09571', 'Villamediana De San Roman', 9, 1),
(2342, '09571', 'Villamediana De San Roman', 9, 1),
(2343, '09571', 'Villamediana De San Roman', 9, 1),
(2344, '09572', 'Virtus', 9, 1),
(2345, '09572', 'Virtus', 9, 1),
(2346, '09572', 'Virtus', 9, 1),
(2347, '09573', 'Robredo De Las Pueblas', 9, 1),
(2348, '09574', 'Santelices', 9, 1),
(2349, '09580', 'Villasana De Mena', 9, 1),
(2350, '09585', 'Vega De Nava, La', 9, 1),
(2351, '09586', 'Ro', 9, 1),
(2352, '09587', 'Vivanco', 9, 1),
(2353, '09588', 'Viergol', 9, 1),
(2354, '09589', 'Villasuso De Mena', 9, 1),
(2355, '09589', 'Villasuso De Mena', 9, 1),
(2356, '09591', 'Villaverde PeÑahorada', 9, 1),
(2357, '09591', 'Villaverde PeÑahorada', 9, 1),
(2358, '09592', 'Valdearnedo', 9, 1),
(2359, '09592', 'Valdearnedo', 9, 1),
(2360, '09592', 'Valdearnedo', 9, 1),
(2361, '09592', 'Valdearnedo', 9, 1),
(2362, '09593', 'Villanueva De Los Montes', 9, 1),
(2363, '09593', 'Villanueva De Los Montes', 9, 1),
(2364, '09593', 'Villanueva De Los Montes', 9, 1),
(2365, '09593', 'Villanueva De Los Montes', 9, 1),
(2366, '09593', 'Villanueva De Los Montes', 9, 1),
(2367, '09593', 'Villanueva De Los Montes', 9, 1),
(2368, '09594', 'Valmayor De Cuesta Urria', 9, 1),
(2369, '09600', 'Salas De Los Infantes', 9, 1),
(2370, '09610', 'Santo Domingo De Silos', 9, 1),
(2371, '09610', 'Santo Domingo De Silos', 9, 1),
(2372, '09610', 'Santo Domingo De Silos', 9, 1),
(2373, '09611', 'Villanueva De Carazo', 9, 1),
(2374, '09611', 'Villanueva De Carazo', 9, 1),
(2375, '09611', 'Villanueva De Carazo', 9, 1),
(2376, '09612', 'Pinilla De Los Barruecos', 9, 1),
(2377, '09612', 'Pinilla De Los Barruecos', 9, 1),
(2378, '09612', 'Pinilla De Los Barruecos', 9, 1),
(2379, '09612', 'Pinilla De Los Barruecos', 9, 1),
(2380, '09613', 'Vizcainos', 9, 1),
(2381, '09613', 'Vizcainos', 9, 1),
(2382, '09613', 'Vizcainos', 9, 1),
(2383, '09613', 'Vizcainos', 9, 1),
(2384, '09613', 'Vizcainos', 9, 1),
(2385, '09613', 'Vizcainos', 9, 1),
(2386, '09613', 'Vizcainos', 9, 1),
(2387, '09614', 'Vallejimeno', 9, 1),
(2388, '09614', 'Vallejimeno', 9, 1),
(2389, '09614', 'Vallejimeno', 9, 1),
(2390, '09615', 'Riocabado De La Sierra', 9, 1),
(2391, '09615', 'Riocabado De La Sierra', 9, 1),
(2392, '09615', 'Riocabado De La Sierra', 9, 1),
(2393, '09615', 'Riocabado De La Sierra', 9, 1),
(2394, '09616', 'Tejada', 9, 1),
(2395, '09617', 'SantibaÑez Del Val', 9, 1),
(2396, '09618', 'Barriosuso Del Val', 9, 1),
(2397, '09619', 'Navas De Pinar', 9, 1),
(2398, '09620', 'Ventas De SaldaÑa', 9, 1),
(2399, '09620', 'Ventas De SaldaÑa', 9, 1),
(2400, '09620', 'Ventas De SaldaÑa', 9, 1),
(2401, '09620', 'Ventas De SaldaÑa', 9, 1),
(2402, '09631', 'Arauzo de Miel', 9, 1),
(2403, '09640', 'Villoruebo', 9, 1),
(2404, '09640', 'Villoruebo', 9, 1),
(2405, '09640', 'Villoruebo', 9, 1),
(2406, '09640', 'Villoruebo', 9, 1),
(2407, '09640', 'Villoruebo', 9, 1),
(2408, '09640', 'Villoruebo', 9, 1),
(2409, '09640', 'Villoruebo', 9, 1),
(2410, '09640', 'Villoruebo', 9, 1),
(2411, '09640', 'Villoruebo', 9, 1),
(2412, '09640', 'Villoruebo', 9, 1),
(2413, '09641', 'Cuevas De San Clemente', 9, 1),
(2414, '09642', 'Quintanilla De Las ViÑas', 9, 1),
(2415, '09642', 'Quintanilla De Las ViÑas', 9, 1),
(2416, '09645', 'Torrelara', 9, 1),
(2417, '09646', 'Mazueco De Lara', 9, 1),
(2418, '09647', 'Quintanalara', 9, 1),
(2419, '09649', 'Villamiel De La Sierra', 9, 1),
(2420, '09649', 'Villamiel De La Sierra', 9, 1),
(2421, '09649', 'Villamiel De La Sierra', 9, 1),
(2422, '09650', 'Villaespasa', 9, 1),
(2423, '09650', 'Villaespasa', 9, 1),
(2424, '09651', 'Lara De Los Infantes', 9, 1),
(2425, '09652', 'Villanueva De ArgaÑo', 9, 1),
(2426, '09653', 'Isar', 9, 1),
(2427, '09654', 'Palacios De Benaver', 9, 1),
(2428, '09660', 'Rabanera Del Pinar', 9, 1),
(2429, '09660', 'Rabanera Del Pinar', 9, 1),
(2430, '09670', 'Quintanar De La Sierra', 9, 1),
(2431, '09678', 'Iglesiarrubia', 9, 1),
(2432, '09679', 'Neila', 9, 1),
(2433, '09680', 'Palacios De La Sierra', 9, 1),
(2434, '09690', 'Vilviestre Del Pinar', 9, 1),
(2435, '09691', 'Moncalvillo', 9, 1),
(2436, '09691', 'Moncalvillo', 9, 1),
(2437, '09692', 'Canicosa De La Sierra', 9, 1),
(2438, '09693', 'Regumiel De La Sierra', 9, 1),
(2439, '10000', 'Caceres (ver Callejero)', 10, 1),
(2440, '10001', 'Cáceres', 10, 1),
(2441, '10002', 'Cáceres', 10, 1),
(2442, '10003', 'Cáceres', 10, 1),
(2443, '10004', 'Cáceres', 10, 1),
(2444, '10005', 'Cáceres', 10, 1),
(2445, '10100', 'Miajadas', 10, 1),
(2446, '10109', 'Casar De Miajadas', 10, 1),
(2447, '10110', 'Madrigalejo', 10, 1),
(2448, '10110', 'Madrigalejo', 10, 1),
(2449, '10120', 'Logrosan', 10, 1),
(2450, '10129', 'Berzocana', 10, 1),
(2451, '10130', 'Zorita', 10, 1),
(2452, '10131', 'Valdemorales', 10, 1),
(2453, '10132', 'Almoharin', 10, 1),
(2454, '10133', 'Escurial', 10, 1),
(2455, '10134', 'Pizarro', 10, 1),
(2456, '10135', 'Alcollarin', 10, 1),
(2457, '10136', 'CaÑamero', 10, 1),
(2458, '10137', 'Guadisa', 10, 1),
(2459, '10140', 'Guadalupe', 10, 1),
(2460, '10160', 'Alcuescar', 10, 1),
(2461, '10162', 'Casas De Don Antonio', 10, 1),
(2462, '10163', 'Aldea Del Cano', 10, 1),
(2463, '10164', 'Valdesalor', 10, 1),
(2464, '10169', 'Zarza de Mont', 10, 1),
(2465, '10170', 'Montanchez', 10, 1),
(2466, '10170', 'Montanchez', 10, 1),
(2467, '10180', 'Valdefuentes', 10, 1),
(2468, '10181', 'Sierra De Fuentes', 10, 1),
(2469, '10182', 'Torreorgaz', 10, 1),
(2470, '10182', 'Torreorgaz', 10, 1),
(2471, '10183', 'Torrequemada', 10, 1),
(2472, '10184', 'Torremocha', 10, 1),
(2473, '10185', 'Benquerencia', 10, 1),
(2474, '10185', 'Benquerencia', 10, 1),
(2475, '10186', 'Torre De Santa Maria', 10, 1),
(2476, '10187', 'Albala', 10, 1),
(2477, '10189', 'Zarza De Montanchez', 10, 1),
(2478, '10189', 'Zarza De Montanchez', 10, 1),
(2479, '10189', 'Zarza De Montanchez', 10, 1),
(2480, '10189', 'Zarza De Montanchez', 10, 1),
(2481, '10190', 'Perala, La', 10, 1),
(2482, '10190', 'Perala, La', 10, 1),
(2483, '10191', 'Santiago Del Campo', 10, 1),
(2484, '10192', 'Hinojal', 10, 1),
(2485, '10193', 'Talavan', 10, 1),
(2486, '10194', 'Monroy', 10, 1),
(2487, '10195', 'Cáceres', 10, 1),
(2488, '10197', 'Albal', 10, 1),
(2489, '10198', 'Santa Marta De Magasca', 10, 1),
(2490, '10198', 'Santa Marta De Magasca', 10, 1),
(2491, '10199', 'Rincon De Ballesteros', 10, 1),
(2492, '10200', 'Trujillo', 10, 1),
(2493, '10210', 'MadroÑera', 10, 1),
(2494, '10220', 'Pago De San Clemente', 10, 1),
(2495, '10230', 'Herguijuela', 10, 1),
(2496, '10240', 'Conquista De La Sierra', 10, 1),
(2497, '10250', 'Garciaz', 10, 1),
(2498, '10251', 'Aldeacentenera', 10, 1),
(2499, '10252', 'Torrecilla De La Tiesa', 10, 1),
(2500, '10260', 'Santa Cruz De La Sierra', 10, 1),
(2501, '10261', 'Puerto De Santa Cruz', 10, 1),
(2502, '10261', 'Puerto De Santa Cruz', 10, 1),
(2503, '10262', 'Abertura', 10, 1),
(2504, '10263', 'Villamesias', 10, 1),
(2505, '10269', 'Robledillo De Trujillo', 10, 1),
(2506, '10270', 'Cumbre, La', 10, 1),
(2507, '10271', 'Plasenzuela', 10, 1),
(2508, '10280', 'Ibahernando', 10, 1),
(2509, '10290', 'Huertas De Animas', 10, 1),
(2510, '10291', 'Huertas De La Magdalena', 10, 1),
(2511, '10291', 'Huertas De La Magdalena', 10, 1),
(2512, '10292', 'Belen', 10, 1),
(2513, '10300', 'Navalmoral De La Mata', 10, 1),
(2514, '10310', 'Talayuela', 10, 1),
(2515, '10317', 'Vegas De Mesillas', 10, 1),
(2516, '10318', 'Santa Maria De Las Lomas', 10, 1),
(2517, '10319', 'Tietar', 10, 1),
(2518, '10320', 'Bohonal De Ibor', 10, 1),
(2519, '10328', 'Fresnedoso De Ibor', 10, 1),
(2520, '10329', 'Valdemoreno', 10, 1),
(2521, '10329', 'Valdemoreno', 10, 1),
(2522, '10329', 'Valdemoreno', 10, 1),
(2523, '10330', 'Villar Del Pedroso', 10, 1),
(2524, '10331', 'Navatrasierra', 10, 1),
(2525, '10331', 'Navatrasierra', 10, 1),
(2526, '10332', 'Valdelacasa De Tajo', 10, 1),
(2527, '10332', 'Valdelacasa De Tajo', 10, 1),
(2528, '10333', 'Garvin', 10, 1),
(2529, '10334', 'Peraleda De San Roman', 10, 1),
(2530, '10335', 'Peraleda De La Mata', 10, 1),
(2531, '10340', 'CastaÑar De Ibor', 10, 1),
(2532, '10341', 'Navalvillar De Ibor', 10, 1),
(2533, '10350', 'Almaraz', 10, 1),
(2534, '10359', 'Romangordo', 10, 1),
(2535, '10359', 'Romangordo', 10, 1),
(2536, '10360', 'Casas De Miravete', 10, 1),
(2537, '10370', 'Deleitosa', 10, 1),
(2538, '10370', 'Deleitosa', 10, 1),
(2539, '10371', 'Robledollano', 10, 1),
(2540, '10372', 'Retamosa', 10, 1),
(2541, '10373', 'Roturas', 10, 1),
(2542, '10374', 'Navezuelas', 10, 1),
(2543, '10380', 'Jaraicejo', 10, 1),
(2544, '10390', 'Saucedilla', 10, 1),
(2545, '10391', 'Rosalejo', 10, 1),
(2546, '10392', 'Gordo, El', 10, 1),
(2547, '10392', 'Gordo, El', 10, 1),
(2548, '10393', 'Valdehuncar', 10, 1),
(2549, '10394', 'Millanes', 10, 1),
(2550, '10394', 'Millanes', 10, 1),
(2551, '10400', 'Jaraiz De La Vera', 10, 1),
(2552, '10410', 'Arroyomolinos De La Vera', 10, 1),
(2553, '10411', 'Pasaron De La Vera', 10, 1),
(2554, '10412', 'Garganta La Olla', 10, 1),
(2555, '10413', 'Torremenga', 10, 1),
(2556, '10414', 'Collado', 10, 1),
(2557, '10415', 'Valencia de Alc', 10, 1),
(2558, '10420', 'Tejeda', 10, 1),
(2559, '10430', 'Cuacos De Yuste', 10, 1),
(2560, '10440', 'Aldeanueva De La Vera', 10, 1),
(2561, '10450', 'Jarandilla', 10, 1),
(2562, '10459', 'Guijo De Santa Barbara', 10, 1),
(2563, '10460', 'Losar De La Vera', 10, 1),
(2564, '10470', 'Villanueva De La Vera', 10, 1),
(2565, '10480', 'Madrigal De La Vera', 10, 1),
(2566, '10484', 'Vegaviana', 10, 1),
(2567, '10490', 'Valverde De La Vera', 10, 1),
(2568, '10490', 'Valverde De La Vera', 10, 1),
(2569, '10491', 'Talaveruela', 10, 1),
(2570, '10492', 'Viandar De La Vera', 10, 1),
(2571, '10493', 'Robledillo De La Vera', 10, 1),
(2572, '10500', 'Valencia De Alcantara', 10, 1),
(2573, '10509', 'Valencia de Alc', 10, 1),
(2574, '10510', 'Santiago De Alcantara', 10, 1),
(2575, '10511', 'Carbajo', 10, 1),
(2576, '10512', 'Solana (herrera De Alcantara)', 10, 1),
(2577, '10513', 'Cedillo', 10, 1),
(2578, '10514', 'Pino, El', 10, 1),
(2579, '10515', 'Jola', 10, 1),
(2580, '10516', 'FontaÑera, La', 10, 1),
(2581, '10519', 'Lanchuelas, Las', 10, 1),
(2582, '10520', 'Casatejada', 10, 1),
(2583, '10520', 'Casatejada', 10, 1),
(2584, '10528', 'Serrejon', 10, 1),
(2585, '10529', 'Majadas', 10, 1),
(2586, '10530', 'Serradilla', 10, 1),
(2587, '10540', 'Mirabel', 10, 1),
(2588, '10550', 'Aliseda', 10, 1),
(2589, '10560', 'Herreruela', 10, 1),
(2590, '10570', 'Salorino', 10, 1),
(2591, '10580', 'Membrio', 10, 1),
(2592, '10590', 'Monfrague', 10, 1),
(2593, '10591', 'Salto De Torrejon', 10, 1),
(2594, '10591', 'Salto De Torrejon', 10, 1),
(2595, '10591', 'Salto De Torrejon', 10, 1),
(2596, '10592', 'Casas De Millan', 10, 1),
(2597, '10593', 'Casar de C', 10, 1),
(2598, '10600', 'Plasencia', 10, 1),
(2599, '10610', 'Cabezuela Del Valle', 10, 1),
(2600, '10611', 'Tornavacas', 10, 1),
(2601, '10612', 'Jerte', 10, 1),
(2602, '10613', 'Navaconcejo', 10, 1),
(2603, '10614', 'Valdastillas', 10, 1),
(2604, '10615', 'Piornal', 10, 1),
(2605, '10616', 'Casas Del CastaÑar', 10, 1),
(2606, '10616', 'Casas Del CastaÑar', 10, 1),
(2607, '10616', 'Casas Del CastaÑar', 10, 1),
(2608, '10617', 'Torno, El', 10, 1),
(2609, '10617', 'Torno, El', 10, 1),
(2610, '10620', 'Caminomorisco', 10, 1),
(2611, '10623', 'Vegas De Coria', 10, 1),
(2612, '10623', 'Vegas De Coria', 10, 1),
(2613, '10624', 'Riomalo De Abajo', 10, 1),
(2614, '10624', 'Riomalo De Abajo', 10, 1),
(2615, '10625', 'Riomalo De Arriba', 10, 1),
(2616, '10626', 'NuÑomoral', 10, 1),
(2617, '10627', 'Martilandran', 10, 1),
(2618, '10628', 'Robledo (casares De Las Hurdes)', 10, 1),
(2619, '10628', 'Robledo (casares De Las Hurdes)', 10, 1),
(2620, '10629', 'Rubiaco', 10, 1),
(2621, '10629', 'Rubiaco', 10, 1),
(2622, '10630', 'Pinofranqueado', 10, 1),
(2623, '10630', 'Pinofranqueado', 10, 1),
(2624, '10630', 'Pinofranqueado', 10, 1),
(2625, '10638', 'Muela', 10, 1);
INSERT INTO `lnx_poblaciones` (`id`, `cp`, `poblacion`, `idprov`, `idpais`) VALUES
(2626, '10639', 'Sauceda', 10, 1),
(2627, '10640', 'Casar De Palomero', 10, 1),
(2628, '10649', 'Rivera Oveja', 10, 1),
(2629, '10649', 'Rivera Oveja', 10, 1),
(2630, '10650', 'Ahigal', 10, 1),
(2631, '10660', 'Palomero', 10, 1),
(2632, '10660', 'Palomero', 10, 1),
(2633, '10660', 'Palomero', 10, 1),
(2634, '10661', 'Santa Cruz De Paniagua', 10, 1),
(2635, '10662', 'Marchagaz', 10, 1),
(2636, '10663', 'Cerezo', 10, 1),
(2637, '10663', 'Cerezo', 10, 1),
(2638, '10664', 'Mohedas De Granadilla', 10, 1),
(2639, '10665', 'Guijo De Granadilla', 10, 1),
(2640, '10666', 'SantibaÑez El Bajo', 10, 1),
(2641, '10666', 'SantibaÑez El Bajo', 10, 1),
(2642, '10667', 'Oliva De Plasencia', 10, 1),
(2643, '10670', 'Carcaboso', 10, 1),
(2644, '10671', 'Valderrosas', 10, 1),
(2645, '10671', 'Valderrosas', 10, 1),
(2646, '10671', 'Valderrosas', 10, 1),
(2647, '10672', 'Valdeobispo', 10, 1),
(2648, '10680', 'Malpartida De Plasencia', 10, 1),
(2649, '10690', 'San Gil', 10, 1),
(2650, '10690', 'San Gil', 10, 1),
(2651, '10690', 'San Gil', 10, 1),
(2652, '10691', 'Sartalejo', 10, 1),
(2653, '10692', 'Batan, El', 10, 1),
(2654, '10693', 'Riolobos', 10, 1),
(2655, '10694', 'Torrejon El Rubio', 10, 1),
(2656, '10694', 'Torrejon El Rubio', 10, 1),
(2657, '10695', 'Villarreal De San Carlos', 10, 1),
(2658, '10696', 'Garguera', 10, 1),
(2659, '10696', 'Garguera', 10, 1),
(2660, '10697', 'ValdeiÑigos', 10, 1),
(2661, '10697', 'ValdeiÑigos', 10, 1),
(2662, '10697', 'ValdeiÑigos', 10, 1),
(2663, '10700', 'Hervas', 10, 1),
(2664, '10710', 'Zarza De Granadilla', 10, 1),
(2665, '10711', 'Granja, La', 10, 1),
(2666, '10712', 'Pantano De Gabriel Y Galan', 10, 1),
(2667, '10720', 'Villar De Plasencia', 10, 1),
(2668, '10728', 'Jarilla', 10, 1),
(2669, '10729', 'Cabezabellosa', 10, 1),
(2670, '10730', 'Casas Del Monte', 10, 1),
(2671, '10739', 'Segura De Toro', 10, 1),
(2672, '10740', 'Aldeanueva Del Camino', 10, 1),
(2673, '10748', 'Abadia', 10, 1),
(2674, '10749', 'Gargantilla', 10, 1),
(2675, '10750', 'BaÑos De Montemayor', 10, 1),
(2676, '10759', 'Garganta, La', 10, 1),
(2677, '10800', 'Coria', 10, 1),
(2678, '10810', 'Montehermoso', 10, 1),
(2679, '10810', 'Montehermoso', 10, 1),
(2680, '10811', 'Valrio', 10, 1),
(2681, '10811', 'Valrio', 10, 1),
(2682, '10811', 'Valrio', 10, 1),
(2683, '10812', 'Villanueva De La Sierra', 10, 1),
(2684, '10813', 'Pozuelo De Zarzon', 10, 1),
(2685, '10814', 'Villa Del Campo', 10, 1),
(2686, '10815', 'Guijo De Coria', 10, 1),
(2687, '10816', 'Guijo De Galisteo', 10, 1),
(2688, '10816', 'Guijo De Galisteo', 10, 1),
(2689, '10817', 'Calzadilla', 10, 1),
(2690, '10818', 'Casillas De Coria', 10, 1),
(2691, '10818', 'Casillas De Coria', 10, 1),
(2692, '10820', 'CaÑaveral', 10, 1),
(2693, '10824', 'Holguera', 10, 1),
(2694, '10828', 'Portezuelo', 10, 1),
(2695, '10829', 'Pedroso De Acim', 10, 1),
(2696, '10829', 'Pedroso De Acim', 10, 1),
(2697, '10829', 'Pedroso De Acim', 10, 1),
(2698, '10829', 'Pedroso De Acim', 10, 1),
(2699, '10830', 'Torrejoncillo', 10, 1),
(2700, '10839', 'Valdencin', 10, 1),
(2701, '10840', 'Moraleja', 10, 1),
(2702, '10848', 'Vegaviana', 10, 1),
(2703, '10849', 'Moheda De Gata, La', 10, 1),
(2704, '10849', 'Moheda De Gata, La', 10, 1),
(2705, '10850', 'Hoyos', 10, 1),
(2706, '10857', 'Acebo', 10, 1),
(2707, '10858', 'Villasbuenas De Gata', 10, 1),
(2708, '10859', 'SantibaÑez El Alto', 10, 1),
(2709, '10860', 'Gata', 10, 1),
(2710, '10864', 'Torre De Don Miguel', 10, 1),
(2711, '10865', 'Cadalso', 10, 1),
(2712, '10866', 'Descargamaria', 10, 1),
(2713, '10867', 'Robledillo De Gata', 10, 1),
(2714, '10868', 'Hernan-perez', 10, 1),
(2715, '10869', 'Torrecilla De Los Angeles', 10, 1),
(2716, '10870', 'Ceclavin', 10, 1),
(2717, '10879', 'Acehuche', 10, 1),
(2718, '10880', 'Zarza La Mayor', 10, 1),
(2719, '10881', 'Cachorrilla', 10, 1),
(2720, '10882', 'Pescueza', 10, 1),
(2721, '10883', 'Portaje', 10, 1),
(2722, '10890', 'Valverde Del Fresno', 10, 1),
(2723, '10891', 'Eljas', 10, 1),
(2724, '10892', 'San Martin De Trevejo', 10, 1),
(2725, '10893', 'Villamiel', 10, 1),
(2726, '10894', 'Trevejo', 10, 1),
(2727, '10895', 'Cilleros', 10, 1),
(2728, '10896', 'Perales Del Puerto', 10, 1),
(2730, '10900', 'Arroyo De La Luz', 10, 1),
(2731, '10910', 'Malpartida De Caceres', 10, 1),
(2732, '10920', 'C', 10, 1),
(2733, '10930', 'Navas Del MadroÑo', 10, 1),
(2734, '10940', 'Garrovillas De Alconetar', 10, 1),
(2735, '10950', 'Brozas', 10, 1),
(2736, '10960', 'Villa Del Rey', 10, 1),
(2737, '10970', 'Mata De Alcantara', 10, 1),
(2738, '10980', 'Alcantara', 10, 1),
(2739, '10989', 'Alc', 10, 1),
(2740, '10990', 'Estorninos', 10, 1),
(2741, '10991', 'Piedras Albas', 10, 1),
(2742, '11001', 'Cádiz', 11, 1),
(2743, '11002', 'Cádiz', 11, 1),
(2744, '11003', 'Cádiz', 11, 1),
(2745, '11004', 'Cádiz', 11, 1),
(2746, '11005', 'Cádiz', 11, 1),
(2747, '11006', 'Cádiz', 11, 1),
(2748, '11007', 'Cádiz', 11, 1),
(2749, '11008', 'Cádiz', 11, 1),
(2750, '11009', 'Cádiz', 11, 1),
(2751, '11010', 'Cádiz', 11, 1),
(2752, '11011', 'Cádiz', 11, 1),
(2753, '11012', 'Cádiz', 11, 1),
(2754, '11100', 'San Fernando', 11, 1),
(2755, '11130', 'Pago Del Humo', 11, 1),
(2756, '11139', 'Soledad, La', 11, 1),
(2757, '11140', 'Conil De La Frontera', 11, 1),
(2758, '11149', 'Roche', 11, 1),
(2759, '11150', 'Vejer De La Frontera', 11, 1),
(2760, '11150', 'Vejer De La Frontera', 11, 1),
(2761, '11158', 'Santa Lucia', 11, 1),
(2762, '11159', 'Zahora', 11, 1),
(2763, '11159', 'Zahora', 11, 1),
(2764, '11160', 'Sierra De Retin', 11, 1),
(2765, '11170', 'Medina Sidonia', 11, 1),
(2766, '11178', 'Paterna De Rivera', 11, 1),
(2767, '11179', 'Malcocinado', 11, 1),
(2768, '11179', 'Malcocinado', 11, 1),
(2769, '11180', 'Picacho, El', 11, 1),
(2770, '11190', 'Benalup-casas Viejas', 11, 1),
(2771, '11201', 'Algeciras', 11, 1),
(2772, '11202', 'Algeciras', 11, 1),
(2773, '11203', 'Algeciras', 11, 1),
(2774, '11204', 'Algeciras', 11, 1),
(2775, '11205', 'Algeciras', 11, 1),
(2776, '11206', 'Algeciras', 11, 1),
(2777, '11207', 'Algeciras', 11, 1),
(2778, '11300', 'Linea De La Concepcion, La', 11, 1),
(2779, '11300', 'Linea De La Concepcion, La', 11, 1),
(2780, '11310', 'Sotogrande', 11, 1),
(2781, '11311', 'Guadiaro', 11, 1),
(2782, '11311', 'Guadiaro', 11, 1),
(2783, '11312', 'Torreguadiaro', 11, 1),
(2784, '11313', 'Puente Mayorga', 11, 1),
(2785, '11314', 'Campamento', 11, 1),
(2786, '11320', 'San Pablo De Buceite', 11, 1),
(2787, '11330', 'Jimena De La Frontera', 11, 1),
(2788, '11339', 'Marchenilla', 11, 1),
(2789, '11340', 'San Martin Del Tesorillo', 11, 1),
(2790, '11350', 'Pueblo Nuevo De Castellar', 11, 1),
(2791, '11360', 'San Roque', 11, 1),
(2792, '11368', 'San Roque, Ferrea De, Estacion', 11, 1),
(2793, '11369', 'Taraguilla', 11, 1),
(2794, '11369', 'Taraguilla', 11, 1),
(2795, '11370', 'Benharas', 11, 1),
(2796, '11379', 'Poligono Industrial Nuevo', 11, 1),
(2797, '11380', 'Zorrillos, Los', 11, 1),
(2798, '11390', 'Pelayo, El', 11, 1),
(2799, '11390', 'Pelayo, El', 11, 1),
(2800, '11391', 'Realillo', 11, 1),
(2801, '11391', 'Realillo', 11, 1),
(2802, '11392', 'Tahivilla', 11, 1),
(2803, '11393', 'Zarzuela, La', 11, 1),
(2804, '11393', 'Zarzuela, La', 11, 1),
(2805, '11400', 'Tablas, Las', 11, 1),
(2806, '11401', 'Jerez De La Frontera', 11, 1),
(2807, '11402', 'Jerez De La Frontera', 11, 1),
(2808, '11403', 'Jerez De La Frontera', 11, 1),
(2809, '11404', 'Jerez De La Frontera', 11, 1),
(2810, '11405', 'Jerez De La Frontera', 11, 1),
(2811, '11406', 'Jerez De La Frontera', 11, 1),
(2812, '11407', 'Jerez De La Frontera', 11, 1),
(2813, '11408', 'Jerez De La Frontera', 11, 1),
(2814, '11500', 'Vistahermosa', 11, 1),
(2815, '11510', 'Puerto Real', 11, 1),
(2816, '11518', 'Barrio De Jarana', 11, 1),
(2817, '11519', 'Trocadero, El', 11, 1),
(2818, '11520', 'Rota', 11, 1),
(2819, '11540', 'Sanlucar De Barrameda', 11, 1),
(2820, '11549', 'Algaida, La', 11, 1),
(2821, '11550', 'Chipiona', 11, 1),
(2822, '11560', 'Trebujena', 11, 1),
(2823, '11570', 'Jerez De La Frontera', 11, 1),
(2824, '11579', 'Jose Antonio', 11, 1),
(2825, '11580', 'San Jose Del Valle', 11, 1),
(2826, '11589', 'San Jos', 11, 1),
(2827, '11590', 'Mesas De Asta', 11, 1),
(2828, '11591', 'Jerez De La Frontera', 11, 1),
(2829, '11592', 'Jerez De La Frontera', 11, 1),
(2830, '11593', 'Jerez De La Frontera', 11, 1),
(2831, '11594', 'Jerez De La Frontera', 11, 1),
(2832, '11595', 'Jerez De La Frontera', 11, 1),
(2833, '11596', 'Santo Angel', 11, 1),
(2834, '11600', 'Ubrique', 11, 1),
(2835, '11610', 'Grazalema', 11, 1),
(2836, '11611', 'Villaluenga Del Rosario', 11, 1),
(2837, '11612', 'Benaocaz', 11, 1),
(2838, '11620', 'Vega De Los Molinos', 11, 1),
(2839, '11630', 'Yugo, El', 11, 1),
(2840, '11638', 'Santiscal', 11, 1),
(2841, '11639', 'Perdiz, La', 11, 1),
(2842, '11640', 'Bornos', 11, 1),
(2843, '11648', 'Espera', 11, 1),
(2844, '11649', 'Coto De Bornos', 11, 1),
(2845, '11650', 'Villamartin', 11, 1),
(2846, '11659', 'Puerto Serrano', 11, 1),
(2847, '11660', 'Prado Del Rey', 11, 1),
(2848, '11670', 'Bosque, El', 11, 1),
(2849, '11679', 'Benamahoma', 11, 1),
(2850, '11680', 'Nava Y Lapa, La', 11, 1),
(2851, '11687', 'Ventas Nuevas', 11, 1),
(2852, '11688', 'Zahara De La Sierra', 11, 1),
(2853, '11689', 'Muela De Algodonales, La', 11, 1),
(2854, '11690', 'Olvera', 11, 1),
(2855, '11691', 'Torre Alhaquime', 11, 1),
(2856, '11692', 'Setenil De Las Bodegas', 11, 1),
(2857, '11693', 'Alcala Del Valle', 11, 1),
(2858, '12001', 'Castelló-castellón De La Plana', 12, 1),
(2859, '12002', 'Castelló-castellón De La Plana', 12, 1),
(2860, '12003', 'Castelló-castellón De La Plana', 12, 1),
(2861, '12004', 'Castelló-castellón De La Plana', 12, 1),
(2862, '12005', 'Castelló-castellón De La Plana', 12, 1),
(2863, '12006', 'Castelló-castellón De La Plana', 12, 1),
(2864, '12100', 'Castelló-castellón De La Plana', 12, 1),
(2865, '12110', 'Alcora, L\'', 12, 1),
(2866, '12118', 'Useres, Les/ Useras', 12, 1),
(2867, '12119', 'Masdavall', 12, 1),
(2868, '12119', 'Masdavall', 12, 1),
(2869, '12120', 'Lucena Del Cid', 12, 1),
(2870, '12121', 'Foya, La', 12, 1),
(2871, '12122', 'Figueroles', 12, 1),
(2872, '12122', 'Figueroles', 12, 1),
(2873, '12123', 'Ludiente', 12, 1),
(2874, '12123', 'Ludiente', 12, 1),
(2875, '12124', 'Villahermosa Del Rio', 12, 1),
(2876, '12125', 'Zucaina', 12, 1),
(2877, '12126', 'San Vicente De Cortes', 12, 1),
(2878, '12127', 'Cortes De Arenoso', 12, 1),
(2879, '12130', 'Sant Joan De Moro', 12, 1),
(2880, '12131', 'Crevadas, Las', 12, 1),
(2881, '12132', 'Atzeneta Del Maestrat', 12, 1),
(2882, '12133', 'Meanes', 12, 1),
(2883, '12134', 'Xodos/chodos', 12, 1),
(2884, '12134', 'Xodos/chodos', 12, 1),
(2885, '12135', 'Vistabella Del Maestrazgo', 12, 1),
(2886, '12135', 'Vistabella Del Maestrazgo', 12, 1),
(2887, '12140', 'Albocasser', 12, 1),
(2888, '12150', 'Villafranca Del Cid', 12, 1),
(2889, '12159', 'Virgen Del Llosar', 12, 1),
(2890, '12160', 'Fuentes En Segures', 12, 1),
(2891, '12161', 'Torre D\'en Besora, La', 12, 1),
(2892, '12162', 'Vilar De Canes', 12, 1),
(2893, '12163', 'Torre De Matella', 12, 1),
(2894, '12164', 'Rosildos, Los', 12, 1),
(2895, '12165', 'Coll D\'ares', 12, 1),
(2896, '12166', 'Ibarzos, Los', 12, 1),
(2897, '12170', 'Sant Mateu', 12, 1),
(2898, '12179', 'Tirig', 12, 1),
(2899, '12180', 'Cabanes', 12, 1),
(2900, '12181', 'Benlloch', 12, 1),
(2901, '12182', 'Sierra Engarceran', 12, 1),
(2902, '12183', 'Vilanova D\'alcolea', 12, 1),
(2903, '12184', 'Torre Endomenech', 12, 1),
(2904, '12184', 'Torre Endomenech', 12, 1),
(2905, '12185', 'Mas D\'en Rieres', 12, 1),
(2906, '12186', 'Salzadella, La', 12, 1),
(2907, '12190', 'Borriol', 12, 1),
(2908, '12191', 'Pobla Tornesa, La', 12, 1),
(2909, '12192', 'Vilafames', 12, 1),
(2910, '12193', 'Pelechana, La ( Pelechaneta, La)', 12, 1),
(2911, '12193', 'Pelechana, La ( Pelechaneta, La)', 12, 1),
(2912, '12194', 'Vall D\'alba', 12, 1),
(2913, '12200', 'Onda', 12, 1),
(2914, '12210', 'Ribesalbes', 12, 1),
(2915, '12220', 'Artesa', 12, 1),
(2916, '12221', 'Tales', 12, 1),
(2917, '12222', 'Veo', 12, 1),
(2918, '12222', 'Veo', 12, 1),
(2919, '12223', 'Suera/sueras', 12, 1),
(2920, '12224', 'Villamalur', 12, 1),
(2921, '12224', 'Villamalur', 12, 1),
(2922, '12225', 'Torralba Del Pinar', 12, 1),
(2923, '12225', 'Torralba Del Pinar', 12, 1),
(2924, '12230', 'Vallat', 12, 1),
(2925, '12230', 'Vallat', 12, 1),
(2926, '12230', 'Vallat', 12, 1),
(2927, '12230', 'Vallat', 12, 1),
(2928, '12230', 'Vallat', 12, 1),
(2929, '12231', 'Cirat', 12, 1),
(2930, '12232', 'Torrechiva', 12, 1),
(2931, '12232', 'Torrechiva', 12, 1),
(2932, '12232', 'Torrechiva', 12, 1),
(2933, '12300', 'Morella', 12, 1),
(2934, '12310', 'Forcall', 12, 1),
(2935, '12311', 'Zorita Del Maestrazgo', 12, 1),
(2936, '12311', 'Zorita Del Maestrazgo', 12, 1),
(2937, '12311', 'Zorita Del Maestrazgo', 12, 1),
(2938, '12312', 'Todolella', 12, 1),
(2939, '12312', 'Todolella', 12, 1),
(2940, '12312', 'Todolella', 12, 1),
(2941, '12315', 'Vallibona', 12, 1),
(2942, '12317', 'Herbes', 12, 1),
(2943, '12318', 'Portell De Morella', 12, 1),
(2944, '12318', 'Portell De Morella', 12, 1),
(2945, '12319', 'Herbeset', 12, 1),
(2946, '12320', 'San Jorge', 12, 1),
(2947, '12330', 'Traiguera', 12, 1),
(2948, '12330', 'Traiguera', 12, 1),
(2949, '12340', 'Jana, La', 12, 1),
(2950, '12350', 'Canet Lo Roig', 12, 1),
(2951, '12360', 'Xert/chert', 12, 1),
(2952, '12370', 'Anroig', 12, 1),
(2953, '12400', 'Segorbe', 12, 1),
(2954, '12410', 'Cueva Santa, La', 12, 1),
(2955, '12412', 'Villatorcas', 12, 1),
(2956, '12412', 'Villatorcas', 12, 1),
(2957, '12413', 'Castellnovo', 12, 1),
(2958, '12413', 'Castellnovo', 12, 1),
(2959, '12414', 'Vall De Almonacid', 12, 1),
(2960, '12414', 'Vall De Almonacid', 12, 1),
(2961, '12414', 'Vall De Almonacid', 12, 1),
(2962, '12415', 'Matet', 12, 1),
(2963, '12415', 'Matet', 12, 1),
(2964, '12420', 'Barracas', 12, 1),
(2965, '12428', 'Villanueva De Viver', 12, 1),
(2966, '12428', 'Villanueva De Viver', 12, 1),
(2967, '12428', 'Villanueva De Viver', 12, 1),
(2968, '12429', 'Toro, El', 12, 1),
(2969, '12429', 'Toro, El', 12, 1),
(2970, '12430', 'Rios De Arriba', 12, 1),
(2971, '12431', 'Toras', 12, 1),
(2972, '12440', 'Caudiel', 12, 1),
(2973, '12447', 'Montan', 12, 1),
(2974, '12448', 'Montanejos', 12, 1),
(2975, '12449', 'Pavias', 12, 1),
(2976, '12449', 'Pavias', 12, 1),
(2977, '12449', 'Pavias', 12, 1),
(2978, '12450', 'Novaliches', 12, 1),
(2979, '12460', 'Viver', 12, 1),
(2980, '12469', 'Teresa', 12, 1),
(2981, '12469', 'Teresa', 12, 1),
(2982, '12469', 'Teresa', 12, 1),
(2983, '12470', 'Navajas', 12, 1),
(2984, '12480', 'Soneja', 12, 1),
(2985, '12489', 'Sot De Ferrer', 12, 1),
(2986, '12490', 'Azuebar', 12, 1),
(2987, '12499', 'Chovar', 12, 1),
(2988, '12500', 'VinarÒs', 12, 1),
(2989, '12510', 'San Rafael Del Rio', 12, 1),
(2990, '12511', 'Rossell', 12, 1),
(2991, '12512', 'Bel', 12, 1),
(2992, '12513', 'Cati', 12, 1),
(2993, '12520', 'Nules', 12, 1),
(2994, '12526', 'Vilavella, La', 12, 1),
(2995, '12527', 'Artana', 12, 1),
(2996, '12528', 'Eslida', 12, 1),
(2997, '12529', 'Mascarell', 12, 1),
(2998, '12530', 'Burriana', 12, 1),
(2999, '12530', 'Burriana', 12, 1),
(3000, '12539', 'Alquerias Del NiÑo Perdido', 12, 1),
(3001, '12540', 'Vila-real/villarreal', 12, 1),
(3002, '12549', 'Betxi', 12, 1),
(3003, '12550', 'Almassora/almazora', 12, 1),
(3004, '12560', 'BenicÀssim', 12, 1),
(3005, '12560', 'BenicÀssim', 12, 1),
(3006, '12570', 'Alcala De Xivert', 12, 1),
(3007, '12578', 'Cervera Del Maestre', 12, 1),
(3008, '12579', 'Fuentes, Las', 12, 1),
(3009, '12580', 'Benicarlo', 12, 1),
(3010, '12589', 'Calig', 12, 1),
(3011, '12590', 'Almenara', 12, 1),
(3012, '12591', 'Llosa, La', 12, 1),
(3013, '12592', 'Chilches', 12, 1),
(3014, '12593', 'Moncofa', 12, 1),
(3015, '12594', 'Oropesa/oropesa Del Mar', 12, 1),
(3016, '12595', 'Torre De La Sal', 12, 1),
(3017, '12596', 'Torrenostra', 12, 1),
(3018, '12597', 'Santa Magdalena De Pulpis', 12, 1),
(3019, '12598', 'PeÑiscola', 12, 1),
(3020, '12599', 'Pobla De Benifassa', 12, 1),
(3021, '12599', 'Pobla De Benifassa', 12, 1),
(3022, '12600', 'Vall D\'uixo, La', 12, 1),
(3023, '12609', 'Alfondeguilla', 12, 1),
(3024, '12952', 'Chilches/Xilxes', 12, 1),
(3025, '13001', 'Ciudad Real', 13, 1),
(3026, '13002', 'Ciudad Real', 13, 1),
(3027, '13003', 'Ciudad Real', 13, 1),
(3028, '13004', 'Ciudad Real', 13, 1),
(3029, '13005', 'Ciudad Real', 13, 1),
(3030, '13097', 'Ciudad Real', 13, 1),
(3031, '13100', 'Piedrabuena', 13, 1),
(3032, '13107', 'Alcolea De Calatrava', 13, 1),
(3033, '13108', 'Luciana', 13, 1),
(3034, '13109', 'Puebla De Don Rodrigo', 13, 1),
(3035, '13110', 'Horcajo De Los Montes', 13, 1),
(3036, '13114', 'Tablillas, Las', 13, 1),
(3037, '13115', 'Santa Quiteria', 13, 1),
(3038, '13116', 'Alcoba De Los Montes', 13, 1),
(3039, '13117', 'Gamonoso', 13, 1),
(3040, '13118', 'Huertas Del Sauceral, Las', 13, 1),
(3041, '13118', 'Huertas Del Sauceral, Las', 13, 1),
(3042, '13120', 'Porzuna', 13, 1),
(3043, '13129', 'Trincheto, El', 13, 1),
(3044, '13130', 'Fuencaliente', 13, 1),
(3045, '13140', 'Peralvillo', 13, 1),
(3046, '13150', 'Carrion De Calatrava', 13, 1),
(3047, '13160', 'Torralba De Calatrava', 13, 1),
(3048, '13170', 'Miguelturra', 13, 1),
(3049, '13179', 'Pozuelo De Calatrava', 13, 1),
(3050, '13180', 'Abenojar', 13, 1),
(3051, '13189', 'Navacerrada', 13, 1),
(3052, '13190', 'Corral De Calatrava', 13, 1),
(3053, '13190', 'Corral De Calatrava', 13, 1),
(3054, '13191', 'Pozuelos De Calatrava, Los', 13, 1),
(3055, '13191', 'Pozuelos De Calatrava, Los', 13, 1),
(3056, '13192', 'Tirteafuera', 13, 1),
(3057, '13192', 'Tirteafuera', 13, 1),
(3058, '13193', 'Navalpino', 13, 1),
(3059, '13193', 'Navalpino', 13, 1),
(3060, '13193', 'Navalpino', 13, 1),
(3061, '13194', 'Torno, El', 13, 1),
(3062, '13194', 'Torno, El', 13, 1),
(3063, '13194', 'Torno, El', 13, 1),
(3064, '13194', 'Torno, El', 13, 1),
(3065, '13195', 'Valverde', 13, 1),
(3066, '13195', 'Valverde', 13, 1),
(3067, '13196', 'Picon', 13, 1),
(3068, '13196', 'Picon', 13, 1),
(3069, '13196', 'Picon', 13, 1),
(3070, '13197', 'Ciudad Real', 13, 1),
(3071, '13200', 'Manzanares', 13, 1),
(3072, '13210', 'Villarta De San Juan', 13, 1),
(3073, '13220', 'Llanos Del Caudillo', 13, 1),
(3074, '13230', 'Membrilla', 13, 1),
(3075, '13240', 'Solana, La', 13, 1),
(3076, '13247', 'San Carlos Del Valle', 13, 1),
(3077, '13248', 'Alhambra', 13, 1),
(3078, '13249', 'Ruidera', 13, 1),
(3079, '13250', 'Daimiel', 13, 1),
(3080, '13260', 'BolaÑos De Calatrava', 13, 1),
(3081, '13260', 'BolaÑos De Calatrava', 13, 1),
(3082, '13270', 'Almagro', 13, 1),
(3083, '13279', 'Valenzuela De Calatrava', 13, 1),
(3084, '13300', 'ValdepeÑas', 13, 1),
(3085, '13300', 'ValdepeÑas', 13, 1),
(3086, '13310', 'Consolacion, La', 13, 1),
(3087, '13320', 'Villanueva De Los Infantes', 13, 1),
(3088, '13326', 'Montiel', 13, 1),
(3089, '13327', 'Santa Cruz De Los CaÑamos', 13, 1),
(3090, '13328', 'Almedina', 13, 1),
(3091, '13329', 'Carrizosa', 13, 1),
(3092, '13330', 'Villanueva De La Fuente', 13, 1),
(3093, '13331', 'CaÑamares', 13, 1),
(3094, '13332', 'Villahermosa', 13, 1),
(3095, '13333', 'Fuenllana', 13, 1),
(3096, '13340', 'Albaladejo', 13, 1),
(3097, '13341', 'Terrinches', 13, 1),
(3098, '13342', 'Puebla Del Principe', 13, 1),
(3099, '13343', 'Villamanrique', 13, 1),
(3100, '13344', 'Torre De Juan Abad', 13, 1),
(3101, '13345', 'Cozar', 13, 1),
(3102, '13350', 'Moral De Calatrava', 13, 1),
(3103, '13360', 'Granatula De Calatrava', 13, 1),
(3104, '13370', 'Calzada De Calatrava', 13, 1),
(3105, '13379', 'Villanueva De San Carlos', 13, 1),
(3106, '13380', 'Aldea Del Rey', 13, 1),
(3107, '13390', 'Pozo De La Serna', 13, 1),
(3108, '13391', 'Alcubillas', 13, 1),
(3109, '13400', 'Almaden', 13, 1),
(3110, '13410', 'Agudo', 13, 1),
(3111, '13411', 'Valdemanco Del Esteras', 13, 1),
(3112, '13412', 'Chillon', 13, 1),
(3113, '13413', 'Alamillo', 13, 1),
(3114, '13414', 'Saceruela', 13, 1),
(3115, '13414', 'Saceruela', 13, 1),
(3116, '13415', 'San Benito', 13, 1),
(3117, '13420', 'Malagon', 13, 1),
(3118, '13427', 'Cortijos De Arriba', 13, 1),
(3119, '13428', 'Valdehierro', 13, 1),
(3120, '13428', 'Valdehierro', 13, 1),
(3121, '13429', 'Sotillo, El', 13, 1),
(3122, '13430', 'CaÑada De Calatrava, La', 13, 1),
(3123, '13431', 'Villar Del Pozo', 13, 1),
(3124, '13432', 'Ballesteros De Calatrava', 13, 1),
(3125, '13440', 'Argamasilla De Calatrava', 13, 1),
(3126, '13449', 'Brazatortas', 13, 1),
(3127, '13450', 'Brazatortas', 13, 1),
(3128, '13459', 'Veredilla', 13, 1),
(3129, '13460', 'ViÑuela', 13, 1),
(3130, '13470', 'Valdeazogues', 13, 1),
(3131, '13473', 'Fontanosas', 13, 1),
(3132, '13473', 'Fontanosas', 13, 1),
(3133, '13480', 'Almadenejos', 13, 1),
(3134, '13490', 'Guadalmez', 13, 1),
(3135, '13499', 'Guadalmez', 13, 1),
(3136, '13500', 'Puertollano', 13, 1),
(3137, '13580', 'Almodovar Del Campo', 13, 1),
(3138, '13590', 'Hinojosas De Calatrava', 13, 1),
(3139, '13591', 'Cabezarrubias Del Puerto', 13, 1),
(3140, '13592', 'Mestanza', 13, 1),
(3141, '13593', 'Solana Del Pino', 13, 1),
(3142, '13594', 'Solanilla Del Tamaral', 13, 1),
(3143, '13595', 'Villamayor De Calatrava', 13, 1),
(3144, '13596', 'Bienvenida', 13, 1),
(3145, '13597', 'Villar, El', 13, 1),
(3146, '13598', 'Retamar', 13, 1),
(3147, '13600', 'Alcazar De San Juan', 13, 1),
(3148, '13610', 'Campo De Criptana', 13, 1),
(3149, '13619', 'Arenales De San Gregorio', 13, 1),
(3150, '13620', 'Pedro MuÑoz', 13, 1),
(3151, '13629', 'Tomelloso', 13, 1),
(3152, '13630', 'Socuellamos', 13, 1),
(3153, '13640', 'Herencia', 13, 1),
(3154, '13640', 'Herencia', 13, 1),
(3155, '13650', 'Puerto Lapice', 13, 1),
(3156, '13660', 'Labores, Las', 13, 1),
(3157, '13670', 'Villarrubia De Los Ojos', 13, 1),
(3158, '13679', 'Arenas De San Juan', 13, 1),
(3159, '13680', 'Fuente El Fresno', 13, 1),
(3160, '13690', 'Alameda De Cervera', 13, 1),
(3161, '13700', 'Tomelloso', 13, 1),
(3162, '13710', 'Argamasilla De Alba', 13, 1),
(3163, '13720', 'Cinco Casas, Pueblo', 13, 1),
(3164, '13730', 'Santa Cruz De Mudela', 13, 1),
(3165, '13738', 'Viso del Marqu', 13, 1),
(3166, '13739', 'Villalba De Calatrava', 13, 1),
(3167, '13739', 'Villalba De Calatrava', 13, 1),
(3168, '13740', 'Torrenueva', 13, 1),
(3169, '13750', 'Castellar De Santiago', 13, 1),
(3170, '13760', 'Almuradiel', 13, 1),
(3171, '13768', 'Venta De Cardenas', 13, 1),
(3172, '13768', 'Venta De Cardenas', 13, 1),
(3173, '13770', 'Viso Del Marques', 13, 1),
(3174, '13779', 'San Lorenzo De Calatrava', 13, 1),
(3175, '13779', 'San Lorenzo De Calatrava', 13, 1),
(3176, '14001', 'Córdoba', 14, 1),
(3177, '14002', 'Córdoba', 14, 1),
(3178, '14003', 'Córdoba', 14, 1),
(3179, '14004', 'Córdoba', 14, 1),
(3180, '14005', 'Córdoba', 14, 1),
(3181, '14006', 'Córdoba', 14, 1),
(3182, '14007', 'Córdoba', 14, 1),
(3183, '14008', 'Córdoba', 14, 1),
(3184, '14009', 'Córdoba', 14, 1),
(3185, '14010', 'Córdoba', 14, 1),
(3186, '14011', 'Córdoba', 14, 1),
(3187, '14012', 'Córdoba', 14, 1),
(3188, '14013', 'Córdoba', 14, 1),
(3189, '14014', 'Córdoba', 14, 1),
(3190, '14015', 'C', 14, 1),
(3191, '14016', 'C', 14, 1),
(3192, '14029', 'Valchillon', 14, 1),
(3194, '14071', 'Córdoba', 14, 1),
(3195, '14100', 'Rinconcillo, El', 14, 1),
(3196, '14110', 'Silillos', 14, 1),
(3197, '14111', 'Pinedas, Las', 14, 1),
(3198, '14112', 'Ventilla, La', 14, 1),
(3199, '14113', 'CaÑada Del Rabadan', 14, 1),
(3200, '14115', 'Villar, El', 14, 1),
(3201, '14115', 'Villar, El', 14, 1),
(3202, '14120', 'Fuente Palmera', 14, 1),
(3203, '14129', 'Villalon', 14, 1),
(3204, '14129', 'Villalon', 14, 1),
(3205, '14130', 'Majada Vieja', 14, 1),
(3206, '14140', 'Victoria, La', 14, 1),
(3207, '14150', 'San Sebastian De Ballesteros', 14, 1),
(3208, '14190', 'Puente Viejo', 14, 1),
(3209, '14191', 'Quintana, Aldea', 14, 1),
(3210, '14192', 'Puerto, El', 14, 1),
(3211, '14193', 'Higueron, El', 14, 1),
(3212, '14193', 'Higueron, El', 14, 1),
(3213, '14199', 'Lucena', 14, 1),
(3214, '14200', 'PeÑarroya-pueblonuevo', 14, 1),
(3215, '14206', 'Valsequillo', 14, 1),
(3216, '14207', 'Granjuela, La', 14, 1),
(3217, '14208', 'Blazquez, Los', 14, 1),
(3218, '14209', 'Porvenir De La Industria', 14, 1),
(3219, '14209', 'Porvenir De La Industria', 14, 1),
(3220, '14209', 'Porvenir De La Industria', 14, 1),
(3221, '14210', 'Villaharta', 14, 1),
(3222, '14210', 'Villaharta', 14, 1),
(3223, '14210', 'Villaharta', 14, 1),
(3224, '14220', 'Mina De La Concepcion', 14, 1),
(3225, '14230', 'Villanueva Del Rey', 14, 1),
(3226, '14240', 'Belmez', 14, 1),
(3227, '14248', 'Belmez', 14, 1),
(3228, '14248', 'Fuente Obejuna', 14, 1),
(3229, '14249', 'Posadilla', 14, 1),
(3230, '14249', 'Posadilla', 14, 1),
(3231, '14250', 'Villanueva Del Duque', 14, 1),
(3232, '14260', 'Fuente La Lancha', 14, 1),
(3233, '14270', 'Hinojosa Del Duque', 14, 1),
(3234, '14280', 'Santa Clara (belalcazar)', 14, 1),
(3235, '14280', 'Santa Clara (belalcazar)', 14, 1),
(3236, '14290', 'Fuente Obejuna', 14, 1),
(3237, '14297', 'Cuenca', 14, 1),
(3238, '14298', 'Piconcillo', 14, 1),
(3239, '14299', 'Ojuelos Bajos', 14, 1),
(3240, '14300', 'Villaviciosa De Cordoba', 14, 1),
(3241, '14310', 'Obejo', 14, 1),
(3242, '14320', 'Vacar, El', 14, 1),
(3243, '14320', 'Vacar, El', 14, 1),
(3244, '14320', 'Vacar, El', 14, 1),
(3245, '14340', 'C', 14, 1),
(3246, '14350', 'Córdoba', 14, 1),
(3247, '14350', 'Córdoba', 14, 1),
(3248, '14400', 'Pozoblanco', 14, 1),
(3249, '14410', 'Torrecampo', 14, 1),
(3250, '14412', 'Pedroche', 14, 1),
(3251, '14413', 'Guijo, El', 14, 1),
(3252, '14420', 'Villafranca De Cordoba', 14, 1),
(3253, '14430', 'Adamuz', 14, 1),
(3254, '14439', 'Algallarin', 14, 1),
(3255, '14440', 'Villanueva De Cordoba', 14, 1),
(3256, '14440', 'Villanueva De Cordoba', 14, 1),
(3257, '14445', 'Cerezo, El', 14, 1),
(3258, '14445', 'Cerezo, El', 14, 1),
(3259, '14446', 'Venta Del Charco', 14, 1),
(3260, '14447', 'Azuel', 14, 1),
(3261, '14448', 'Conquista', 14, 1),
(3262, '14450', 'AÑora', 14, 1),
(3263, '14460', 'Dos Torres', 14, 1),
(3264, '14470', 'Viso, El', 14, 1),
(3265, '14470', 'Viso, El', 14, 1),
(3266, '14480', 'Mojonera', 14, 1),
(3267, '14490', 'Villaralto', 14, 1),
(3268, '14491', 'Santa Eufemia', 14, 1),
(3269, '14500', 'Rabanal, El', 14, 1),
(3270, '14510', 'Moriles', 14, 1),
(3271, '14511', 'Piedros, Los', 14, 1),
(3272, '14512', 'Sotogordo', 14, 1),
(3273, '14520', 'Fernan-nuÑez', 14, 1),
(3274, '14520', 'Fernan-nuÑez', 14, 1),
(3275, '14530', 'Montemayor', 14, 1),
(3276, '14540', 'Rambla, La', 14, 1),
(3277, '14546', 'Santaella', 14, 1),
(3278, '14547', 'Guijarrosa, La', 14, 1),
(3279, '14548', 'Montalban De Cordoba', 14, 1),
(3280, '14549', 'Montiela, La', 14, 1),
(3281, '14550', 'Zarza, La', 14, 1),
(3282, '14550', 'Zarza, La', 14, 1),
(3283, '14600', 'Torrecilla', 14, 1),
(3284, '14610', 'Sol, El (alcolea)', 14, 1),
(3285, '14610', 'Sol, El (alcolea)', 14, 1),
(3286, '14620', 'San Antonio', 14, 1),
(3287, '14630', 'Pedro Abad', 14, 1),
(3288, '14640', 'Villa Del Rio', 14, 1),
(3289, '14650', 'Maria Aparicio', 14, 1),
(3290, '14656', 'Bujalance', 14, 1),
(3291, '14659', 'Morente', 14, 1),
(3292, '14660', 'CaÑete De Las Torres', 14, 1),
(3293, '14670', 'Valenzuela', 14, 1),
(3294, '14700', 'Veredon El Mohino', 14, 1),
(3295, '14709', 'Vega De Santa Lucia', 14, 1),
(3296, '14709', 'Vega De Santa Lucia', 14, 1),
(3297, '14710', 'Córdoba', 14, 1),
(3298, '14711', 'Córdoba', 14, 1),
(3299, '14719', 'Veredon De Los Frailes', 14, 1),
(3300, '14720', 'Nuestra SeÑora Del Rosario', 14, 1),
(3301, '14729', 'Mochos, Los', 14, 1),
(3302, '14730', 'Posadas', 14, 1),
(3303, '14730', 'Posadas', 14, 1),
(3304, '14739', 'Rivero De Posadas', 14, 1),
(3305, '14740', 'Mezquetillas, Las', 14, 1),
(3306, '14749', 'San Calixto', 14, 1),
(3307, '14800', 'Salado, El', 14, 1),
(3308, '14800', 'Salado, El', 14, 1),
(3309, '14810', 'Portazgo, El', 14, 1),
(3310, '14811', 'Villares, Los', 14, 1),
(3311, '14811', 'Villares, Los', 14, 1),
(3312, '14811', 'Villares, Los', 14, 1),
(3313, '14812', 'Cuesta Blanca', 14, 1),
(3314, '14813', 'Venta Valero', 14, 1),
(3315, '14814', 'Zamoranos', 14, 1),
(3316, '14815', 'Vega, La (priego De Cordoba)', 14, 1),
(3317, '14815', 'Vega, La (priego De Cordoba)', 14, 1),
(3318, '14816', 'Zagrilla Baja', 14, 1),
(3319, '14816', 'Zagrilla Baja', 14, 1),
(3320, '14817', 'Poyata, La', 14, 1),
(3321, '14820', 'Torres Cabrera', 14, 1),
(3322, '14830', 'Espejo', 14, 1),
(3323, '14840', 'Garci-calvo', 14, 1),
(3324, '14850', 'Sierra, La (baena)', 14, 1),
(3325, '14850', 'Sierra, La (baena)', 14, 1),
(3326, '14852', 'Nueva Carteya', 14, 1),
(3327, '14857', 'Torre Del Puerto', 14, 1),
(3328, '14857', 'Torre Del Puerto', 14, 1),
(3329, '14858', 'Llano Del Espinar', 14, 1),
(3330, '14859', 'FuentidueÑa', 14, 1),
(3331, '14860', 'DoÑa Mencia', 14, 1),
(3332, '14870', 'Zuheros', 14, 1),
(3333, '14880', 'PeÑillas', 14, 1),
(3334, '14889', 'Luque', 14, 1),
(3335, '14900', 'Vegas, Las', 14, 1),
(3336, '14910', 'Benameji', 14, 1),
(3337, '14911', 'Jauja', 14, 1),
(3338, '14912', 'Vadofresno', 14, 1),
(3339, '14913', 'Zurreon', 14, 1),
(3340, '14913', 'Zurreon', 14, 1),
(3341, '14914', 'Palenciana', 14, 1),
(3342, '14915', 'Tejar, El', 14, 1),
(3343, '14920', 'Aguilar De La Frontera', 14, 1),
(3344, '14930', 'Monturque', 14, 1),
(3345, '14930', 'Monturque', 14, 1),
(3346, '14940', 'Piedras De Varo', 14, 1),
(3347, '14940', 'Piedras De Varo', 14, 1),
(3348, '14941', 'Santa Eufemia', 14, 1),
(3349, '14949', 'Cabra', 14, 1),
(3350, '14950', 'Zambra', 14, 1),
(3351, '14950', 'Zambra', 14, 1),
(3352, '14950', 'Zambra', 14, 1),
(3353, '14960', 'Vadillo, El', 14, 1),
(3354, '14970', 'Valdearenas', 14, 1),
(3355, '14978', 'Valenzuela Y Llanadas', 14, 1),
(3356, '14979', 'Solerche', 14, 1),
(3357, '15001', 'A Coruña', 15, 1),
(3358, '15002', 'A Coruña', 15, 1),
(3359, '15003', 'A Coruña', 15, 1),
(3360, '15004', 'A Coruña', 15, 1),
(3361, '15005', 'A Coruña', 15, 1),
(3362, '15006', 'A Coruña', 15, 1),
(3363, '15007', 'A Coruña', 15, 1),
(3364, '15008', 'A Coruña', 15, 1),
(3365, '15008', 'A Coruña', 15, 1),
(3366, '15009', 'A Coruña', 15, 1),
(3367, '15010', 'A Coruña', 15, 1),
(3368, '15011', 'A Coruña', 15, 1),
(3369, '15100', 'Poligono Industrial Bertoa', 15, 1),
(3370, '15102', 'Revolta, A (san Xoan De Carballo-carballo)', 15, 1),
(3371, '15105', 'Vilela (san Miguel)', 15, 1),
(3372, '15105', 'Vilela (san Miguel)', 15, 1),
(3373, '15106', 'Xoane Da Estrada', 15, 1),
(3374, '15107', 'Vilar Do Carballo (san Breixo De Oza-carballo)', 15, 1),
(3375, '15108', 'Vilarnovo (san Lorenzo De Berdillo-carballo)', 15, 1),
(3376, '15109', 'Vivente (santa Maria De ArdaÑa-carballo)', 15, 1),
(3377, '15110', 'Xornes (san Xoan)', 15, 1),
(3378, '15110', 'Xornes (san Xoan)', 15, 1),
(3379, '15111', 'Pedrosa-tremoa', 15, 1),
(3380, '15112', 'Pozacas-leduzo (san Cristovo De Cerqueda-malpica D', 15, 1),
(3381, '15113', 'Vilanova De Santiso (santiso)', 15, 1),
(3382, '15114', 'Porto De Corme, O', 15, 1),
(3383, '15115', 'NeaÑo (santo Estevo De Cesullas-cabana De Berganti', 15, 1),
(3384, '15116', 'Telleira, A (san MartiÑo De Canduas-cabana De Berg', 15, 1),
(3385, '15117', 'Laxe (santa Maria)', 15, 1),
(3386, '15118', 'Traba (santiago)', 15, 1),
(3387, '15119', 'Vilaseco (san Xoan De Borneiro-cabana De BergantiÑ', 15, 1),
(3388, '15121', 'Tufions (santiago De Cereixo-vimianzo)', 15, 1),
(3389, '15121', 'Tufions (santiago De Cereixo-vimianzo)', 15, 1),
(3390, '15122', 'XaviÑa (santa Maria)', 15, 1),
(3391, '15123', 'CamariÑas (san Xurxo)', 15, 1),
(3392, '15124', 'Vilastose (san Cibran)', 15, 1),
(3393, '15125', 'MuiÑos, Os (moraime)', 15, 1),
(3394, '15126', 'Vilar De Sobremonte (san MartiÑo De San MartiÑo De', 15, 1),
(3395, '15126', 'Vilar De Sobremonte (san MartiÑo De San MartiÑo De', 15, 1),
(3396, '15127', 'Serramo (san Sebastian)', 15, 1),
(3397, '15128', 'Castrelo (san MartiÑo)', 15, 1),
(3398, '15129', 'Vimianzo (san Vicenzo)', 15, 1),
(3399, '15130', 'Corcubion (san Marcos)', 15, 1),
(3400, '15137', 'Redonda (san Pedro)', 15, 1),
(3401, '15138', 'Toba (santo Adran)', 15, 1),
(3402, '15139', 'Folgueira (santiago De Castelo-culleredo)', 15, 1),
(3403, '15140', 'Pastoriza (arteixo)', 15, 1),
(3404, '15141', 'Vilarrodis (arteixo)', 15, 1),
(3405, '15142', 'Suso (arteixo)', 15, 1),
(3406, '15144', 'Sorrizo (arteixo)', 15, 1),
(3407, '15145', 'VilaÑo (santiago)', 15, 1),
(3408, '15146', 'Telleira (san Roman De CabovilaÑo-laracha)', 15, 1),
(3409, '15147', 'XaviÑa (santo Tome)', 15, 1),
(3410, '15148', 'Oca (san MartiÑo)', 15, 1),
(3411, '15149', 'Silvarredonda (san Pedro)', 15, 1),
(3412, '15150', 'Vilar (san Pedro-zas)', 15, 1),
(3413, '15150', 'Vilar (san Pedro-zas)', 15, 1),
(3414, '15151', 'Vilar (san MartiÑo De Olveira-dumbria)', 15, 1),
(3415, '15152', 'Salgueiros (san Mamede)', 15, 1),
(3416, '15153', 'SardiÑeiro De Abaixo', 15, 1),
(3417, '15154', 'San MartiÑo De Duio (san MartiÑo)', 15, 1),
(3418, '15155', 'Insua, La (santa Maria De Fisterra-fisterra)', 15, 1),
(3419, '15160', 'SoÑeiro (san Xian)', 15, 1),
(3420, '15165', 'San Cidre (san Salvador De Bergondo-bergondo)', 15, 1),
(3421, '15166', 'Poligono Industrial Bergondo', 15, 1),
(3422, '15167', 'Tatin (san Xoan De Ouces-bergondo)', 15, 1),
(3423, '15168', 'Vilar (san MartiÑo De Meiras-sada)', 15, 1),
(3424, '15169', 'Veigue (santa Comba)', 15, 1),
(3425, '15170', 'A Coruña', 15, 1),
(3426, '15171', 'Xesta, A (san Xorxe De IÑas-oleiros)', 15, 1),
(3427, '15172', 'Perillo (santa Locaia)', 15, 1),
(3428, '15173', 'Xubin', 15, 1),
(3429, '15174', 'Vilaboa (santa Maria De Rutis-culleredo)', 15, 1),
(3430, '15175', 'Vigo (san Vicente)', 15, 1),
(3431, '15176', 'Vilar, O (nos)', 15, 1),
(3432, '15177', 'Xoez', 15, 1),
(3433, '15178', 'Dorneda (san MartiÑo)', 15, 1),
(3434, '15179', 'Seixo, O (lians)', 15, 1),
(3435, '15180', 'Poligono Industrial Arzua', 15, 1),
(3436, '15181', 'Telva, A (sigras, Cambre), Lugar', 15, 1),
(3437, '15182', 'Tarroeira De Tabeaio (san MartiÑo De Tabeaio-carra', 15, 1),
(3438, '15183', 'Quembre (san Pedro)', 15, 1),
(3439, '15184', 'Sumio (santiago)', 15, 1),
(3440, '15185', 'Xesteda (santa Comba)', 15, 1),
(3441, '15186', 'Vilamarta (san MartiÑo De Rodis-cerceda)', 15, 1),
(3442, '15187', 'Xalo (san Roman Das Encrobas, As-cerceda)', 15, 1),
(3443, '15188', 'Meirama', 15, 1),
(3444, '15189', 'ToroÑo (santo Estevo De Culleredo-culleredo)', 15, 1),
(3445, '15190', 'A Coruña', 15, 1),
(3446, '15191', 'A Coru', 15, 1),
(3447, '15192', 'A Coru', 15, 1),
(3448, '15198', 'Vinxeira Pequena (santa Maria De Celas-culleredo)', 15, 1),
(3449, '15199', 'Veiga (san Silvestre)', 15, 1),
(3450, '15200', 'Noia (logrosa)', 15, 1),
(3451, '15210', 'Vista Fermosa (barro)', 15, 1),
(3452, '15211', 'Roo (santa Maria)', 15, 1),
(3453, '15212', 'Vilacova (santa Eulalia)', 15, 1),
(3454, '15213', 'SobreviÑas (argalo - Noia)', 15, 1),
(3455, '15214', 'Toxos Outos (san Xusto)', 15, 1),
(3456, '15215', 'Fruime (san MartiÑo)', 15, 1),
(3457, '15216', 'Tallara (san Pedro)', 15, 1),
(3458, '15218', 'MiÑortos (san MartiÑo)', 15, 1),
(3459, '15218', 'MiÑortos (san MartiÑo)', 15, 1),
(3460, '15218', 'MiÑortos (san MartiÑo)', 15, 1),
(3461, '15220', 'Tarroeira (san Xoan De OrtoÑo-ames)', 15, 1),
(3462, '15228', 'Ames', 15, 1),
(3463, '15229', 'Ventosa (covas-ames)', 15, 1),
(3464, '15230', 'Serra De Outes,a', 15, 1),
(3465, '15236', 'Taras (san Xian)', 15, 1),
(3466, '15237', 'Santo Ourente De Entins (santo Ourente)', 15, 1),
(3467, '15239', 'Valadares (san Miguel)', 15, 1),
(3468, '15240', 'Uhia, Lugar', 15, 1),
(3469, '15250', 'Virxe Do CamiÑo, A', 15, 1),
(3470, '15256', 'San Fins De Eiron (san Fins)', 15, 1),
(3471, '15258', 'Vaos, Os (san Tome)', 15, 1),
(3472, '15259', 'Valdexeria (san Xoan De Serres-muros)', 15, 1),
(3473, '15270', 'Xallas (santa Maria De Cee-cee)', 15, 1),
(3474, '15280', 'Tremo, O (santa Maria Dos Anxeles-brion)', 15, 1),
(3475, '15281', 'Urdilde (santa Maria)', 15, 1),
(3476, '15282', 'Ermedelo (san MartiÑo)', 15, 1),
(3477, '15284', 'Muros', 15, 1),
(3478, '15286', 'Toxeira, A (san Tirso De Cando-outes)', 15, 1),
(3479, '15287', 'Vara (san Cosme De San Cosme De Outeiro-outes)', 15, 1),
(3480, '15288', 'Siavo', 15, 1),
(3481, '15290', 'Torea (san Xian)', 15, 1),
(3482, '15291', 'San Francisco (santiago De Louro-muros)', 15, 1),
(3483, '15292', 'Sofan (santa Maria De Lira-carnota)', 15, 1),
(3484, '15293', 'Santa Comba De Carnota (santa Comba)', 15, 1),
(3485, '15295', 'Quilmas (san Clemente De O Pindo-carnota)', 15, 1),
(3486, '15296', 'Pindo, O (san Clemente)', 15, 1),
(3487, '15297', 'Ezaro, O (santa Uxia)', 15, 1),
(3488, '15298', 'Lamas, As (ameixenda-cee)', 15, 1),
(3489, '15299', 'Raso (brens)', 15, 1),
(3490, '15300', 'Betanzos', 15, 1),
(3491, '15310', 'Teixeiro (curtis)', 15, 1),
(3492, '15313', 'Irixoa (san Lourenzo)', 15, 1),
(3493, '15314', 'Vilamourel (san Xoan)', 15, 1),
(3494, '15315', 'Val De Xestoso, O (san Pedro)', 15, 1),
(3495, '15316', 'Santiago De Ois (santiago)', 15, 1),
(3496, '15317', 'Villarraso (san Lourenzo)', 15, 1),
(3497, '15318', 'VizoÑo (san Pedro)', 15, 1),
(3498, '15319', 'Xanrozo (santiago De Rquian-betanzos)', 15, 1),
(3499, '15319', 'Xanrozo (santiago De Rquian-betanzos)', 15, 1),
(3500, '15319', 'Xanrozo (santiago De Rquian-betanzos)', 15, 1),
(3501, '15320', 'Pontoibo (santa Maria De Pontes De Garcia Rodrigue', 15, 1),
(3502, '15324', 'Seoane (san Xoan)', 15, 1),
(3503, '15325', 'San Pedro De Eume (san Pedro)', 15, 1),
(3504, '15326', 'Somede (san Mamede)', 15, 1),
(3505, '15327', 'Aparral, O (santa Maria)', 15, 1),
(3506, '15328', 'Vilavella (santa Maria)', 15, 1),
(3507, '15329', 'Ribadeume (santa Maria)', 15, 1),
(3508, '15330', 'Ortigueira (santa Marta)', 15, 1),
(3509, '15332', 'Santiago (ortigueira)', 15, 1),
(3510, '15337', 'Ribeiras Do Sor, As (san Cristovo)', 15, 1),
(3511, '15338', 'Senra (san Xulian)', 15, 1),
(3512, '15339', 'Santa Eulalia', 15, 1),
(3513, '15339', 'Santa Eulalia', 15, 1),
(3514, '15340', 'Ponte Mera, A', 15, 1),
(3515, '15347', 'Cervo (santalla)', 15, 1),
(3516, '15349', 'Mera De Arriba (santa Maria)', 15, 1),
(3517, '15350', 'Cedeira', 15, 1),
(3518, '15357', 'Cedeira (santa Maria Do Mar)', 15, 1),
(3519, '15358', 'Teixido ( Santo Andre)', 15, 1),
(3520, '15359', 'San Roman Demontoxo (san Roman)', 15, 1),
(3521, '15360', 'CariÑo (zas)', 15, 1),
(3522, '15365', 'Sagron (santa Maria De A Pedra-cariÑo)', 15, 1),
(3523, '15366', 'Landoi (santiago)', 15, 1),
(3524, '15367', 'Veiga (santo Adrao)', 15, 1),
(3525, '15368', 'Santa Maria (san Claudio)', 15, 1),
(3526, '15369', 'Sismundi (santo Estevo)', 15, 1),
(3527, '15379', 'Fisteus (santa Maria)', 15, 1),
(3528, '15380', 'Oza Dos Rios', 15, 1),
(3529, '15386', 'Rodeiro (santa Maria)', 15, 1),
(3530, '15387', 'Regueira, A (santa Maria)', 15, 1),
(3531, '15388', 'Salto (san Tome)', 15, 1),
(3532, '15389', 'Vivente (santo Estevo)', 15, 1),
(3533, '15390', 'Trasanquelos (san Salvador)', 15, 1),
(3534, '15391', 'Probaos (santaia)', 15, 1),
(3535, '15401', 'Ferrol', 15, 1),
(3536, '15402', 'Ferrol', 15, 1),
(3537, '15403', 'Ferrol', 15, 1),
(3538, '15404', 'Ferrol', 15, 1),
(3539, '15405', 'Ferrol', 15, 1),
(3540, '15406', 'Ferrol', 15, 1),
(3541, '15407', 'Ferrol', 15, 1),
(3542, '15500', 'Vista Alegre (san Salvador De Fene-fene)', 15, 1),
(3543, '15509', 'Vilanova (santa MariÑa De Sillobre-fene)', 15, 1),
(3544, '15510', 'Xubia-casadelos', 15, 1),
(3545, '15520', 'Ribeira, A (maniÑos)', 15, 1),
(3546, '15528', 'Santiago (santiago De Barrallobre-fene)', 15, 1),
(3547, '15530', 'Cerdido (san MartÑo)', 15, 1),
(3548, '15540', 'Vilar (san Mateo De Trasancos-naron)', 15, 1),
(3549, '15541', 'Vilacornelle (santa Maria A Maior De Val, O-naron)', 15, 1),
(3550, '15542', 'Loira (san Pedro)', 15, 1),
(3551, '15543', 'Vilaboa (san Vicente)', 15, 1),
(3552, '15550', 'Taraza', 15, 1),
(3553, '15551', 'Vilar, O (santiago De Lago-valdoviÑo)', 15, 1),
(3554, '15552', 'ValdoviÑo (santalla)', 15, 1),
(3555, '15553', 'Pantin (santiago)', 15, 1),
(3556, '15554', 'Vilarrube (san MartiÑo)', 15, 1),
(3557, '15555', 'Esteiro (san Fiz)', 15, 1),
(3558, '15560', 'San SadurniÑo (santa Maria)', 15, 1),
(3559, '15561', 'Santa MariÑa Do Monte (santa MariÑa)', 15, 1),
(3560, '15562', 'Lamas (san Xiao)', 15, 1),
(3561, '15563', 'San Xurxo De Moeche (san Xurxo)', 15, 1),
(3562, '15564', 'Santa Cruz De Moeche (santa Cruz)', 15, 1),
(3563, '15565', 'Somozas, As (santiago Sere)', 15, 1),
(3564, '15566', 'Enchousas, As (san Pedro)', 15, 1),
(3565, '15567', 'Seixas (santa Maria)', 15, 1),
(3566, '15568', 'Somozas, As', 15, 1),
(3567, '15569', 'Porto (santo Antonio De Barqueira, A-cerdido)', 15, 1),
(3568, '15570', 'Xubia (santiago Apostolo)', 15, 1),
(3569, '15572', 'Ponto (nosa SeÑora Dos Desamparados De Xubia-naron', 15, 1),
(3570, '15573', 'Poligono Rio Do Pozo', 15, 1),
(3571, '15576', 'Naraio (santa Maria)', 15, 1),
(3572, '15577', 'Roxal, O', 15, 1),
(3573, '15577', 'Roxal, O', 15, 1),
(3574, '15578', 'Vicas (san Xiao De Naron-naron)', 15, 1),
(3575, '15579', 'Viladonelle (santo Andre)', 15, 1),
(3576, '15580', 'Igrexafeita (santa Maria)', 15, 1),
(3577, '15582', 'EspiÑaredo (santa Maria)', 15, 1),
(3578, '15582', 'EspiÑaredo (santa Maria)', 15, 1),
(3579, '15587', 'Nar', 15, 1),
(3580, '15590', 'GraÑa, A (santa Rosa De Viterbo)', 15, 1),
(3581, '15591', 'Montecuruto (santo Antonio Da Cabana, A-ferrol', 15, 1),
(3582, '15592', 'Vila Da Eirexa (a MariÑa)', 15, 1),
(3583, '15593', 'Valon', 15, 1),
(3584, '15594', 'Rioxunto (pª San Xoan Esmelle)', 15, 1),
(3585, '15595', 'Vilela (pª Santa Uxia De Mandia)', 15, 1),
(3586, '15596', 'Sedes (santo Estevo)', 15, 1),
(3587, '15598', 'Ferreira (san Paio)', 15, 1),
(3588, '15600', 'Pontedeume (santiago)', 15, 1),
(3589, '15607', 'Vizus (santa Maria De CentroÑa-pontedeume)', 15, 1),
(3590, '15608', 'Vilanova (san Xoan)', 15, 1),
(3591, '15608', 'Vilanova (san Xoan)', 15, 1),
(3592, '15609', 'Taboada (santa MariÑa)', 15, 1),
(3593, '15609', 'Taboada (santa MariÑa)', 15, 1),
(3594, '15611', 'Santa Cruz Do Salto (santa Cruz)', 15, 1),
(3595, '15612', 'Torre, La (san Mamede De Laraxe-cabanas)', 15, 1),
(3596, '15613', 'Neves, As', 15, 1),
(3597, '15614', 'Vilar (san Pedro-pontedeume)', 15, 1),
(3598, '15615', 'DoroÑa (santa Maria)', 15, 1),
(3599, '15616', 'Grandal (san Pedro)', 15, 1),
(3600, '15617', 'Vilacha (santa Maria)', 15, 1),
(3601, '15619', 'San Fiz De Monfero ( San Fiz)', 15, 1),
(3602, '15620', 'Pedreira, A (meha)', 15, 1),
(3603, '15621', 'Cabanas (santo Andre)', 15, 1),
(3604, '15622', 'Val, O (porto)', 15, 1),
(3605, '15623', 'Redes', 15, 1),
(3606, '15624', 'Pedros (san Xose De Ares-ares)', 15, 1),
(3607, '15625', 'Chanteiro', 15, 1),
(3608, '15626', 'Seixo, O (franza)', 15, 1),
(3609, '15627', 'PiÑeiro (san Xoan)', 15, 1),
(3610, '15627', 'PiÑeiro (san Xoan)', 15, 1),
(3611, '15630', 'Sombreu', 15, 1),
(3612, '15635', 'Ribeira (santa Uxia) (miÑo)', 15, 1),
(3613, '15637', 'Vilarmaior (san Pedro)', 15, 1),
(3614, '15638', 'Villamateo (santiago)', 15, 1),
(3615, '15639', 'Leiro (san Salvador)', 15, 1),
(3616, '15640', 'Vilar, O (santa Maria De Guisamo-bergondo)', 15, 1),
(3617, '15650', 'Quintan (san Salvador De Cecebre-cambre)', 15, 1),
(3618, '15656', 'Sisto, O (santa Maria De Gandara-zas)', 15, 1),
(3619, '15659', 'Vigo (santa Maria)', 15, 1),
(3620, '15660', 'Meixigo', 15, 1),
(3621, '15668', 'San Bartolomeu (san Xoan De Pravio-cambre)', 15, 1),
(3622, '15669', 'PatiÑa, A (san Xulian De Cela-cambre)', 15, 1),
(3623, '15670', 'Burgo, O (santiago)', 15, 1),
(3624, '15679', 'Temple, O (santa Maria)', 15, 1),
(3625, '15680', 'Poligono Industrial Ordes', 15, 1),
(3626, '15683', 'Vilarchan (san Xian De Cabaleiros-tordoia)', 15, 1),
(3627, '15684', 'Vilar (santa Maria De Bardaos-tordoia)', 15, 1),
(3628, '15684', 'Vilar (santa Maria De Bardaos-tordoia)', 15, 1),
(3629, '15684', 'Vilar (santa Maria De Bardaos-tordoia)', 15, 1),
(3630, '15685', 'Xanceda (san Salvador)', 15, 1),
(3631, '15685', 'Xanceda (san Salvador)', 15, 1),
(3632, '15685', 'Xanceda (san Salvador)', 15, 1),
(3633, '15686', 'Xavestre (san Cristovo)', 15, 1),
(3634, '15686', 'Xavestre (san Cristovo)', 15, 1),
(3635, '15686', 'Xavestre (san Cristovo)', 15, 1),
(3636, '15687', 'Vilouchada (san Vicenzo)', 15, 1),
(3637, '15687', 'Vilouchada (san Vicenzo)', 15, 1),
(3638, '15688', 'Villarromaris (parroquia Santo Tomas-oroso)', 15, 1),
(3639, '15688', 'Villarromaris (parroquia Santo Tomas-oroso)', 15, 1),
(3640, '15689', 'VisantoÑa (san MartiÑo)', 15, 1),
(3641, '15689', 'VisantoÑa (san MartiÑo)', 15, 1),
(3642, '15689', 'VisantoÑa (san MartiÑo)', 15, 1),
(3643, '15690', 'Valle (arteixo)', 15, 1),
(3644, '15701', 'Santiago De Compostela', 15, 1),
(3645, '15702', 'Santiago De Compostela', 15, 1),
(3646, '15703', 'Santiago De Compostela', 15, 1),
(3647, '15704', 'Santiago De Compostela', 15, 1),
(3648, '15705', 'Santiago De Compostela', 15, 1),
(3649, '15706', 'Santiago De Compostela', 15, 1),
(3650, '15707', 'Santiago De Compostela', 15, 1),
(3651, '15800', 'Poligono Industrial Madanela', 15, 1),
(3652, '15805', 'Zas De Rei (san Xiao) Melide', 15, 1),
(3653, '15806', 'Vilouriz (santiago) Toques', 15, 1),
(3654, '15807', 'Vilasantar (santiago)', 15, 1),
(3655, '15808', 'VisantoÑa (san Jxoan) Melide', 15, 1),
(3656, '15809', 'Varelas, As (san MartiÑo) Melide', 15, 1),
(3657, '15810', 'Arzua (santiago)', 15, 1),
(3658, '15813', 'Sobrado (porta)', 15, 1),
(3659, '15814', 'Nogueira (san Xurxo)', 15, 1),
(3660, '15815', 'Roade (santo Andre)', 15, 1),
(3661, '15816', 'Rodieiros (san Simon)', 15, 1),
(3662, '15817', 'Sendelle (santa Maria)', 15, 1),
(3663, '15818', 'Cardeiro (san Pedro)', 15, 1),
(3664, '15819', 'ViÑos (san Pedro)', 15, 1),
(3665, '15819', 'ViÑos (san Pedro)', 15, 1),
(3666, '15820', 'Sabugueira (san Paio)', 15, 1),
(3667, '15821', 'Santiso (santa Maria De Castrofeito-o Pino)', 15, 1),
(3668, '15822', 'Touro (san Xoan)', 15, 1),
(3669, '15823', 'Pino, O (san Vicenzo)', 15, 1),
(3670, '15823', 'Pino, O (san Vicenzo)', 15, 1),
(3671, '15824', 'San Mamede De Ferreiros (san Mamede)', 15, 1),
(3672, '15824', 'San Mamede De Ferreiros (san Mamede)', 15, 1),
(3673, '15825', 'Pastor (san Lourenzo)', 15, 1),
(3674, '15826', 'Boente (santiago)', 15, 1),
(3675, '15828', 'Turces (santa Maria)', 15, 1),
(3676, '15830', 'Negreira (negreira)', 15, 1),
(3677, '15837', 'PereiriÑa, A (santa Comba)', 15, 1),
(3678, '15838', 'Zas (san Mamede)', 15, 1),
(3679, '15839', 'Troitosende (santa Maria)', 15, 1),
(3680, '15839', 'Troitosende (santa Maria)', 15, 1),
(3681, '15839', 'Troitosende (santa Maria)', 15, 1),
(3682, '15840', 'Santa Comba (santa Comba)', 15, 1),
(3683, '15841', 'Truebe (san Cristovo De Mallon-santa Comba)', 15, 1),
(3684, '15845', 'Vilar De Celtigos', 15, 1),
(3685, '15846', 'Vilarnovo (san Fins De Freixeiro-santa Comba)', 15, 1),
(3686, '15847', 'Vilamaior (santa Maria)', 15, 1),
(3687, '15848', 'Xallas De Castriz (san Pedro)', 15, 1),
(3688, '15850', 'Zas (zas)', 15, 1),
(3689, '15851', 'San Cremenzo De Pazos (san Cremenzo)', 15, 1),
(3690, '15855', 'Mira (santa Maria)', 15, 1),
(3691, '15856', 'Santo Adrian De Castro', 15, 1),
(3692, '15857', 'Vila (san MartiÑo De Meanos-zas)', 15, 1),
(3693, '15858', 'MuiÑo (san Tirso)', 15, 1),
(3694, '15859', 'Santa Sia De Roma ( Santa Sia )', 15, 1),
(3695, '15860', 'Travesas, As (san Xulian De Santa SabiÑa-santa Com', 15, 1),
(3696, '15861', 'Ser (san Pedro)', 15, 1),
(3697, '15862', 'Suevos (san Mamede)', 15, 1),
(3698, '15863', 'Riba, A (san Xoan)', 15, 1),
(3699, '15863', 'Riba, A (san Xoan)', 15, 1),
(3700, '15864', 'Trasmonte (santa Maria)', 15, 1),
(3701, '15865', 'Tembra (san Miguel De Boullon-brion)', 15, 1),
(3702, '15866', 'Vilar De Calo (san Xoan De Calo-teo)', 15, 1),
(3703, '15870', 'Tapia (san Cristovo)', 15, 1),
(3704, '15871', 'VilariÑo (san Pedro)', 15, 1),
(3705, '15872', 'San Roman (santa MariÑa)', 15, 1),
(3706, '15873', 'Val Do Dubra', 15, 1),
(3707, '15874', 'Rial (san Vicente)', 15, 1),
(3708, '15880', 'Vilanova (san Pedro)', 15, 1),
(3709, '15881', 'Vigo (santa Baia)', 15, 1),
(3710, '15881', 'Vigo (santa Baia)', 15, 1),
(3711, '15882', 'Sucira (santa MariÑa)', 15, 1),
(3712, '15883', 'Vilanova (san Xoan) De Recesende-teo)', 15, 1),
(3713, '15884', 'Verdia (santa MariÑa)', 15, 1),
(3714, '15885', 'Vedra (santa Eulalia)', 15, 1),
(3715, '15886', 'VilariÑo (san Tome)', 15, 1),
(3716, '15887', 'Rabal De Abaixo (santa Maria De Gonzar- O Pino)', 15, 1),
(3717, '15888', 'SigÜeiro (san MartiÑo De Oroso-oroso)', 15, 1),
(3718, '15890', 'Santiago De Compostela', 15, 1),
(3719, '15891', 'Santiago de Compostela', 15, 1),
(3720, '15892', 'Santiago De Compostela', 15, 1),
(3721, '15893', 'Veiga, A (san Cristovo Do Eixo-santiago)', 15, 1),
(3722, '15894', 'Tilos, Os (san Francisco De Asis)', 15, 1),
(3723, '15895', 'Tarrio (san Pedro De Bugallido-ames)', 15, 1),
(3724, '15896', 'Villestro (santa Maria)', 15, 1),
(3725, '15897', 'Vidan (divino Salvador )', 15, 1),
(3726, '15898', 'Santiago De Compostela', 15, 1),
(3727, '15899', 'Rocha Vella, A', 15, 1),
(3728, '15900', 'Padron', 15, 1),
(3729, '15910', 'Vilar (padron)', 15, 1),
(3730, '15911', 'Seira (san Lourenzo)', 15, 1),
(3731, '15912', 'LeroÑo (santa Maria)', 15, 1),
(3732, '15913', 'Augasantas (san Vicente)', 15, 1),
(3733, '15914', 'Igrexa,a (carcacia)', 15, 1),
(3734, '15915', 'Morono (santa Maria De Herbon-padron)', 15, 1),
(3735, '15916', 'Ponte Vilar', 15, 1),
(3736, '15917', 'Rua, A (santa Maria De Iria Flavia-padron)', 15, 1),
(3737, '15920', 'Rianxo (santa Comba)', 15, 1),
(3738, '15928', 'Rial (leiro-rianxo)', 15, 1),
(3739, '15930', 'Boiro', 15, 1),
(3740, '15937', 'Moimenta (san Xoan De Macenda-boiro)', 15, 1),
(3741, '15938', 'TriÑans', 15, 1),
(3742, '15939', 'Pesqueira, A Ou Cabo De Cruz', 15, 1),
(3743, '15940', 'Poligono Industrial A Tomada', 15, 1),
(3744, '15948', 'Virxe Do Monte (santa Cruz De Leson-pobra Do Caram', 15, 1),
(3745, '15949', 'Xobre, O Ou MaÑo, O (santa Maria)', 15, 1),
(3746, '15950', 'Ribeira', 15, 1),
(3747, '15959', 'SaiÑas (palmeira-ribeira)', 15, 1),
(3748, '15960', 'Touro, O', 15, 1),
(3749, '15965', 'Listres', 15, 1),
(3750, '15966', 'Revolta, A (castiÑeiras)', 15, 1),
(3751, '15967', 'Vilar, O (san Paio De Carreira-ribeira)', 15, 1),
(3752, '15968', 'Dean PequeÑo (santa Uxia De Ribeira-ribeira)', 15, 1),
(3753, '15969', 'Sirves', 15, 1),
(3754, '15970', 'Porto Do Son', 15, 1),
(3755, '15978', 'Noal (san Vicente)', 15, 1),
(3756, '15979', 'Vilar (san Pedro De BaroÑa-porto Do Son)', 15, 1),
(3757, '15980', 'Xiaxe  (san Tome De Sorribas-rois)', 15, 1),
(3758, '15980', 'Xiaxe  (san Tome De Sorribas-rois)', 15, 1),
(3759, '15981', 'Vigo (santa Maria De Dodro-dodro)', 15, 1),
(3760, '15982', 'Teaio', 15, 1),
(3761, '15983', 'Vacariza, A (santa Maria De Isorna-rianxo)', 15, 1),
(3762, '15984', 'Xens, Os (santa Baia De AraÑo-rianxo)', 15, 1),
(3763, '15985', 'TaragoÑa (san Salvador)', 15, 1),
(3764, '15990', 'Treites (san Vicenzo De Cespon-boiro)', 15, 1),
(3765, '15991', 'VilariÑo (cespon)', 15, 1),
(3766, '15992', 'Peralto', 15, 1),
(3767, '15993', 'Oleiros (san MartiÑo)', 15, 1),
(3768, '15994', 'Serans (san Pedro De Muro-porto Do Son)', 15, 1),
(3769, '15995', 'XuÑo (santa MariÑa)', 15, 1),
(3770, '15996', 'Ribasieira (san Fins)', 15, 1),
(3771, '15998', 'Tarrio (queiruga)', 15, 1),
(3772, '15999', 'Silva, A (san SadurniÑo De Goians-porto Do Son)', 15, 1),
(3773, '16001', 'Cuenca', 16, 1),
(3774, '16002', 'Cuenca', 16, 1),
(3775, '16003', 'Cuenca', 16, 1),
(3776, '16004', 'Cuenca', 16, 1),
(3777, '16043', 'Campillos-Paravientos', 16, 1),
(3778, '16100', 'Valverde De Jucar', 16, 1),
(3779, '16111', 'Villaverde Y Pasaconsol', 16, 1),
(3780, '16111', 'Villaverde Y Pasaconsol', 16, 1),
(3781, '16113', 'Parra De Las Vegas, La', 16, 1),
(3782, '16114', 'Buenache De Alarcon', 16, 1),
(3783, '16118', 'Piqueras Del Castillo', 16, 1),
(3784, '16118', 'Piqueras Del Castillo', 16, 1),
(3785, '16118', 'Piqueras Del Castillo', 16, 1),
(3786, '16118', 'Piqueras Del Castillo', 16, 1),
(3787, '16120', 'Valera De Abajo', 16, 1),
(3788, '16122', 'Valdeganga De Cuenca', 16, 1),
(3789, '16122', 'Valdeganga De Cuenca', 16, 1),
(3790, '16123', 'Villar Del Saz De Arcas', 16, 1),
(3791, '16140', 'Villalba De La Sierra', 16, 1),
(3792, '16141', 'Portilla', 16, 1),
(3793, '16141', 'Portilla', 16, 1),
(3794, '16141', 'Portilla', 16, 1),
(3795, '16141', 'Portilla', 16, 1);
INSERT INTO `lnx_poblaciones` (`id`, `cp`, `poblacion`, `idprov`, `idpais`) VALUES
(3796, '16142', 'Majadas, Las', 16, 1),
(3797, '16143', 'Sotos', 16, 1),
(3798, '16143', 'Sotos', 16, 1),
(3799, '16144', 'Villaseca', 16, 1),
(3800, '16144', 'Villaseca', 16, 1),
(3801, '16145', 'Torrecilla', 16, 1),
(3802, '16146', 'Zarzuela', 16, 1),
(3803, '16146', 'Zarzuela', 16, 1),
(3804, '16147', 'Mariana', 16, 1),
(3805, '16150', 'Vega Del Codorno', 16, 1),
(3806, '16150', 'Vega Del Codorno', 16, 1),
(3807, '16152', 'Valdemeca', 16, 1),
(3808, '16152', 'Valdemeca', 16, 1),
(3809, '16152', 'Valdemeca', 16, 1),
(3810, '16152', 'Valdemeca', 16, 1),
(3811, '16160', 'Palomares Del Campo', 16, 1),
(3812, '16161', 'Villar Del Aguila', 16, 1),
(3813, '16162', 'Villar Del Horno', 16, 1),
(3814, '16190', 'Villar Del Saz De Navalon', 16, 1),
(3815, '16190', 'Villar Del Saz De Navalon', 16, 1),
(3816, '16191', 'Tondos', 16, 1),
(3817, '16191', 'Tondos', 16, 1),
(3818, '16191', 'Tondos', 16, 1),
(3819, '16191', 'Tondos', 16, 1),
(3820, '16191', 'Tondos', 16, 1),
(3821, '16192', 'Palomera', 16, 1),
(3822, '16192', 'Palomera', 16, 1),
(3823, '16193', 'Zomas, Las', 16, 1),
(3824, '16193', 'Zomas, Las', 16, 1),
(3825, '16194', 'Villanueva De Los Escuderos', 16, 1),
(3826, '16194', 'Villanueva De Los Escuderos', 16, 1),
(3827, '16194', 'Villanueva De Los Escuderos', 16, 1),
(3828, '16195', 'Villarejo Sobrehuerta', 16, 1),
(3829, '16195', 'Villarejo Sobrehuerta', 16, 1),
(3830, '16195', 'Villarejo Sobrehuerta', 16, 1),
(3831, '16195', 'Villarejo Sobrehuerta', 16, 1),
(3832, '16195', 'Villarejo Sobrehuerta', 16, 1),
(3833, '16196', 'Villar De Olalla', 16, 1),
(3834, '16200', 'Motilla Del Palancar', 16, 1),
(3835, '16210', 'Campillo De Altobuey', 16, 1),
(3836, '16211', 'Picazo, El', 16, 1),
(3837, '16212', 'Rubielos Bajos', 16, 1),
(3838, '16214', 'Valverdejo', 16, 1),
(3839, '16214', 'Valverdejo', 16, 1),
(3840, '16214', 'Valverdejo', 16, 1),
(3841, '16214', 'Valverdejo', 16, 1),
(3842, '16215', 'Almodovar Del Pinar', 16, 1),
(3843, '16216', 'Valeria', 16, 1),
(3844, '16216', 'Valeria', 16, 1),
(3845, '16216', 'Valeria', 16, 1),
(3846, '16216', 'Valeria', 16, 1),
(3847, '16220', 'Quintanar Del Rey', 16, 1),
(3848, '16230', 'Villanueva De La Jara', 16, 1),
(3849, '16235', 'Iniesta', 16, 1),
(3850, '16236', 'Villagarcia Del Llano', 16, 1),
(3851, '16236', 'Villagarcia Del Llano', 16, 1),
(3852, '16236', 'Villagarcia Del Llano', 16, 1),
(3853, '16237', 'LedaÑa', 16, 1),
(3854, '16238', 'Casas Del Olmo', 16, 1),
(3855, '16238', 'Casas Del Olmo', 16, 1),
(3856, '16239', 'Casasimarro', 16, 1),
(3857, '16240', 'Peral, El', 16, 1),
(3858, '16250', 'Castillejo De Iniesta', 16, 1),
(3859, '16251', 'Graja De Iniesta', 16, 1),
(3860, '16260', 'Minglanilla', 16, 1),
(3861, '16269', 'Puebla Del Salvador', 16, 1),
(3862, '16269', 'Puebla Del Salvador', 16, 1),
(3863, '16270', 'Villalpardo', 16, 1),
(3864, '16280', 'Villarta', 16, 1),
(3865, '16290', 'Herrumblar, El', 16, 1),
(3866, '16290', 'Herrumblar, El', 16, 1),
(3867, '16300', 'CaÑete', 16, 1),
(3868, '16311', 'Huerguina', 16, 1),
(3869, '16311', 'Huerguina', 16, 1),
(3870, '16311', 'Huerguina', 16, 1),
(3871, '16311', 'Huerguina', 16, 1),
(3872, '16312', 'Henarejos', 16, 1),
(3873, '16312', 'Henarejos', 16, 1),
(3874, '16313', 'Aliaguilla', 16, 1),
(3875, '16315', 'Cubillo, El', 16, 1),
(3876, '16316', 'Valdemoro-sierra', 16, 1),
(3877, '16316', 'Valdemoro-sierra', 16, 1),
(3878, '16316', 'Valdemoro-sierra', 16, 1),
(3879, '16316', 'Valdemoro-sierra', 16, 1),
(3880, '16317', 'Zafrilla', 16, 1),
(3881, '16317', 'Zafrilla', 16, 1),
(3882, '16317', 'Zafrilla', 16, 1),
(3883, '16318', 'SalvacaÑete', 16, 1),
(3884, '16320', 'Talayuelas', 16, 1),
(3885, '16321', 'Casillas De Ranera', 16, 1),
(3886, '16330', 'Landete', 16, 1),
(3887, '16336', 'Santa Cruz De Moya', 16, 1),
(3888, '16338', 'Huertos, Los', 16, 1),
(3889, '16338', 'Huertos, Los', 16, 1),
(3890, '16339', 'Manzaneruela', 16, 1),
(3891, '16339', 'Manzaneruela', 16, 1),
(3892, '16339', 'Manzaneruela', 16, 1),
(3893, '16340', 'Valdemorillo De La Sierra', 16, 1),
(3894, '16340', 'Valdemorillo De La Sierra', 16, 1),
(3895, '16340', 'Valdemorillo De La Sierra', 16, 1),
(3896, '16350', 'Carboneras De Guadazaon', 16, 1),
(3897, '16360', 'Monteagudo De Las Salinas', 16, 1),
(3898, '16360', 'Monteagudo De Las Salinas', 16, 1),
(3899, '16370', 'Villar Del Humo', 16, 1),
(3900, '16370', 'Villar Del Humo', 16, 1),
(3901, '16371', 'Villora', 16, 1),
(3902, '16371', 'Villora', 16, 1),
(3903, '16372', 'Salto De Villora', 16, 1),
(3904, '16372', 'Salto De Villora', 16, 1),
(3905, '16373', 'Yemeda', 16, 1),
(3906, '16373', 'Yemeda', 16, 1),
(3907, '16373', 'Yemeda', 16, 1),
(3908, '16390', 'Reillo', 16, 1),
(3909, '16390', 'Reillo', 16, 1),
(3910, '16390', 'Reillo', 16, 1),
(3911, '16393', 'Mira', 16, 1),
(3912, '16400', 'Tarancon', 16, 1),
(3913, '16410', 'Horcajo De Santiago', 16, 1),
(3914, '16411', 'Fuente De Pedro Naharro', 16, 1),
(3915, '16412', 'Acebron, El', 16, 1),
(3916, '16413', 'Torrubia Del Campo', 16, 1),
(3917, '16414', 'Pozorrubio', 16, 1),
(3918, '16415', 'Villamayor De Santiago', 16, 1),
(3919, '16417', 'Hinojosos, Los', 16, 1),
(3920, '16420', 'Villarrubio', 16, 1),
(3921, '16420', 'Villarrubio', 16, 1),
(3922, '16421', 'Puebla De Almenara', 16, 1),
(3923, '16421', 'Puebla De Almenara', 16, 1),
(3924, '16422', 'Tresjuncos', 16, 1),
(3925, '16423', 'Osa De La Vega', 16, 1),
(3926, '16430', 'Saelices', 16, 1),
(3927, '16431', 'Almonacid Del Marquesado', 16, 1),
(3928, '16432', 'Villarejo De Fuentes', 16, 1),
(3929, '16432', 'Villarejo De Fuentes', 16, 1),
(3930, '16433', 'Villar De CaÑas', 16, 1),
(3931, '16433', 'Villar De CaÑas', 16, 1),
(3932, '16434', 'Montalbanejo', 16, 1),
(3933, '16435', 'Hinojosa, La', 16, 1),
(3934, '16440', 'Montalbo', 16, 1),
(3935, '16441', 'Hito, El', 16, 1),
(3936, '16442', 'Villares Del Saz', 16, 1),
(3937, '16444', 'Cervera Del Llano', 16, 1),
(3938, '16452', 'Ucles', 16, 1),
(3939, '16452', 'Ucles', 16, 1),
(3940, '16452', 'Ucles', 16, 1),
(3941, '16460', 'Barajas De Melo', 16, 1),
(3942, '16461', 'Leganiel', 16, 1),
(3943, '16463', 'Saceda Trasierra', 16, 1),
(3944, '16464', 'Alcazar Del Rey', 16, 1),
(3945, '16465', 'Paredes', 16, 1),
(3946, '16465', 'Paredes', 16, 1),
(3947, '16470', 'Zarza De Tajo', 16, 1),
(3948, '16470', 'Zarza De Tajo', 16, 1),
(3949, '16470', 'Zarza De Tajo', 16, 1),
(3950, '16500', 'Huete', 16, 1),
(3951, '16510', 'Vellisca', 16, 1),
(3952, '16510', 'Vellisca', 16, 1),
(3953, '16512', 'Pantano De Buendia', 16, 1),
(3954, '16512', 'Pantano De Buendia', 16, 1),
(3955, '16514', 'El Valle de Altomira', 16, 1),
(3956, '16520', 'Moncalvillo De Huete', 16, 1),
(3957, '16521', 'Valdemoro Del Rey', 16, 1),
(3958, '16522', 'Tinajas', 16, 1),
(3959, '16522', 'Tinajas', 16, 1),
(3960, '16532', 'Saceda Del Rio', 16, 1),
(3961, '16532', 'Saceda Del Rio', 16, 1),
(3962, '16532', 'Saceda Del Rio', 16, 1),
(3963, '16532', 'Saceda Del Rio', 16, 1),
(3964, '16535', 'Villalba Del Rey', 16, 1),
(3965, '16537', 'CaÑaveruelas', 16, 1),
(3966, '16537', 'CaÑaveruelas', 16, 1),
(3967, '16540', 'Verdelpino De Huete', 16, 1),
(3968, '16541', 'Villarejo De La PeÑuela', 16, 1),
(3969, '16541', 'Villarejo De La PeÑuela', 16, 1),
(3970, '16541', 'Villarejo De La PeÑuela', 16, 1),
(3971, '16541', 'Villarejo De La PeÑuela', 16, 1),
(3972, '16542', 'Villar Del Maestre', 16, 1),
(3973, '16550', 'Valparaiso De Arriba', 16, 1),
(3974, '16550', 'Valparaiso De Arriba', 16, 1),
(3975, '16555', 'Carrascosa Del Campo', 16, 1),
(3976, '16600', 'San Clemente', 16, 1),
(3977, '16610', 'Casas De Fernando Alonso', 16, 1),
(3978, '16611', 'Casas De Haro', 16, 1),
(3979, '16612', 'Ventas De Alcolea', 16, 1),
(3980, '16620', 'Alberca De Zancara, La', 16, 1),
(3981, '16621', 'Santa Maria Del Campo Rus', 16, 1),
(3982, '16622', 'Pinarejo', 16, 1),
(3983, '16623', 'Castillo De GarcimuÑoz', 16, 1),
(3984, '16630', 'Mota Del Cuervo', 16, 1),
(3985, '16638', 'Pedernoso, El', 16, 1),
(3986, '16639', 'Santa Maria De Los Llanos', 16, 1),
(3987, '16640', 'Belmonte', 16, 1),
(3988, '16646', 'Villalgordo Del Marquesado', 16, 1),
(3989, '16647', 'Villaescusa De Haro', 16, 1),
(3990, '16647', 'Villaescusa De Haro', 16, 1),
(3991, '16648', 'Villar De La Encina', 16, 1),
(3992, '16649', 'Rada De Haro', 16, 1),
(3993, '16649', 'Rada De Haro', 16, 1),
(3994, '16649', 'Rada De Haro', 16, 1),
(3995, '16650', 'Mesas, Las', 16, 1),
(3996, '16660', 'PedroÑeras, Las', 16, 1),
(3997, '16670', 'Provencio, El', 16, 1),
(3998, '16700', 'Sisante', 16, 1),
(3999, '16707', 'Losa, La', 16, 1),
(4000, '16708', 'Pozo Amargo', 16, 1),
(4001, '16708', 'Pozo Amargo', 16, 1),
(4002, '16709', 'Villar De Cantos', 16, 1),
(4003, '16710', 'Tebar', 16, 1),
(4004, '16710', 'Tebar', 16, 1),
(4005, '16720', 'CaÑada Juncosa', 16, 1),
(4006, '16730', 'Honrubia', 16, 1),
(4007, '16738', 'CaÑavate, El', 16, 1),
(4008, '16739', 'Torrubia Del Castillo', 16, 1),
(4009, '16740', 'Almarcha, La', 16, 1),
(4010, '16740', 'Almarcha, La', 16, 1),
(4011, '16760', 'Olivares De Jucar', 16, 1),
(4012, '16770', 'San Lorenzo De La Parrilla', 16, 1),
(4013, '16771', 'Zafra De Zancara', 16, 1),
(4014, '16771', 'Zafra De Zancara', 16, 1),
(4015, '16779', 'Belmontejo', 16, 1),
(4016, '16780', 'Mota De Altarejos', 16, 1),
(4017, '16780', 'Mota De Altarejos', 16, 1),
(4018, '16781', 'Fresneda De Altarejos', 16, 1),
(4019, '16800', 'Priego', 16, 1),
(4020, '16812', 'Vindel', 16, 1),
(4021, '16812', 'Vindel', 16, 1),
(4022, '16812', 'Vindel', 16, 1),
(4023, '16812', 'Vindel', 16, 1),
(4024, '16812', 'Vindel', 16, 1),
(4025, '16813', 'Villar Del Infantado', 16, 1),
(4026, '16813', 'Villar Del Infantado', 16, 1),
(4027, '16813', 'Villar Del Infantado', 16, 1),
(4028, '16813', 'Villar Del Infantado', 16, 1),
(4029, '16840', 'Villar De Domingo Garcia', 16, 1),
(4030, '16841', 'Albalate De Las Nogueras', 16, 1),
(4031, '16842', 'Torralba', 16, 1),
(4032, '16843', 'Villarejo Del Espartal', 16, 1),
(4033, '16850', 'CaÑaveras', 16, 1),
(4034, '16851', 'Buciegas', 16, 1),
(4035, '16852', 'Olmeda De La Cuesta', 16, 1),
(4036, '16853', 'Olmedilla De Eliz', 16, 1),
(4037, '16854', 'Castillo-albaraÑez', 16, 1),
(4038, '16855', 'Arrancacepas', 16, 1),
(4039, '16857', 'Canalejas Del Arroyo', 16, 1),
(4040, '16860', 'Villaconejos De Trabaque', 16, 1),
(4041, '16870', 'Beteta', 16, 1),
(4042, '16878', 'Santa Maria Del Val', 16, 1),
(4043, '16878', 'Santa Maria Del Val', 16, 1),
(4044, '16878', 'Santa Maria Del Val', 16, 1),
(4045, '16878', 'Santa Maria Del Val', 16, 1),
(4046, '16879', 'Valsalobre', 16, 1),
(4047, '16879', 'Valsalobre', 16, 1),
(4048, '16879', 'Valsalobre', 16, 1),
(4049, '16879', 'Valsalobre', 16, 1),
(4050, '16890', 'Huerta De Los Marojales', 16, 1),
(4051, '16890', 'Huerta De Los Marojales', 16, 1),
(4052, '16890', 'Huerta De Los Marojales', 16, 1),
(4053, '16891', 'Santa Cristina', 16, 1),
(4054, '16891', 'Santa Cristina', 16, 1),
(4055, '16892', 'Puente De Vadillos', 16, 1),
(4056, '16893', 'Solan De Cabras', 16, 1),
(4057, '17001', 'Girona', 17, 1),
(4058, '17002', 'Girona', 17, 1),
(4059, '17003', 'Girona', 17, 1),
(4060, '17004', 'Girona', 17, 1),
(4061, '17005', 'Girona', 17, 1),
(4062, '17006', 'Girona', 17, 1),
(4063, '17007', 'Girona', 17, 1),
(4064, '17100', 'Bisbal D\'emporda, La', 17, 1),
(4065, '17110', 'Santa Susana De Peralta, Pueblo', 17, 1),
(4066, '17111', 'Vullpellac', 17, 1),
(4067, '17113', 'Peratallada', 17, 1),
(4068, '17114', 'Ullastret', 17, 1),
(4069, '17116', 'Cruilles', 17, 1),
(4070, '17117', 'Sant Miquel De Cruilles', 17, 1),
(4071, '17118', 'Sant Sadurni De L\'heura', 17, 1),
(4072, '17120', 'Riuras', 17, 1),
(4073, '17121', 'Monells', 17, 1),
(4074, '17121', 'Monells', 17, 1),
(4075, '17124', 'Llofriu', 17, 1),
(4076, '17130', 'Montgo', 17, 1),
(4077, '17130', 'Montgo', 17, 1),
(4078, '17131', 'Rupia', 17, 1),
(4079, '17132', 'Foixa', 17, 1),
(4080, '17133', 'Ultramort', 17, 1),
(4081, '17133', 'Ultramort', 17, 1),
(4082, '17133', 'Ultramort', 17, 1),
(4083, '17133', 'Ultramort', 17, 1),
(4084, '17134', 'Tor, Pueblo', 17, 1),
(4086, '17136', 'Albons', 17, 1),
(4087, '17137', 'Viladamat', 17, 1),
(4088, '17137', 'Viladamat', 17, 1),
(4089, '17140', 'Ulla', 17, 1),
(4090, '17140', 'Ulla', 17, 1),
(4091, '17141', 'Sobrestany', 17, 1),
(4092, '17141', 'Sobrestany', 17, 1),
(4093, '17142', 'Verges', 17, 1),
(4094, '17143', 'Jafre', 17, 1),
(4095, '17144', 'Colomers', 17, 1),
(4096, '17144', 'Colomers', 17, 1),
(4097, '17150', 'Sant Gregori (municipio)', 17, 1),
(4098, '17151', 'Santa Afra', 17, 1),
(4099, '17152', 'Llora', 17, 1),
(4100, '17153', 'Sant Marti De Llemena', 17, 1),
(4101, '17154', 'Sant Esteve De Llemana', 17, 1),
(4102, '17160', 'Mines Del Sant Pare, Les', 17, 1),
(4103, '17161', 'Sant Miquel De Ter', 17, 1),
(4104, '17162', 'Vilanna, Pueblo', 17, 1),
(4105, '17163', 'Bescan', 17, 1),
(4106, '17164', 'Sant Julia Del Llor I Bonmati', 17, 1),
(4107, '17164', 'Sant Julia Del Llor I Bonmati', 17, 1),
(4108, '17164', 'Sant Julia Del Llor I Bonmati', 17, 1),
(4109, '17165', 'Cellera De Ter, La', 17, 1),
(4110, '17166', 'Susqueda', 17, 1),
(4111, '17166', 'Susqueda', 17, 1),
(4112, '17170', 'Amer', 17, 1),
(4113, '17171', 'Sant Marti Sacalm', 17, 1),
(4114, '17171', 'Sant Marti Sacalm', 17, 1),
(4115, '17172', 'Planes D\'hostoles, Les', 17, 1),
(4116, '17173', 'Cogolls', 17, 1),
(4117, '17174', 'Sant Iscle De Colltort', 17, 1),
(4118, '17176', 'Veinat De Can Trona', 17, 1),
(4119, '17177', 'Hostalets D\'en Bas, Els', 17, 1),
(4120, '17178', 'Sant Privat D\'en Bas', 17, 1),
(4121, '17178', 'Sant Privat D\'en Bas', 17, 1),
(4122, '17179', 'Riudaura, Pueblo', 17, 1),
(4123, '17179', 'Riudaura, Pueblo', 17, 1),
(4124, '17180', 'Vilablareix', 17, 1),
(4125, '17181', 'Marrocs', 17, 1),
(4126, '17182', 'Estanyol', 17, 1),
(4127, '17183', 'Sant Dalmai', 17, 1),
(4128, '17184', 'Salitja', 17, 1),
(4129, '17185', 'Vilobi D\'onyar', 17, 1),
(4130, '17190', 'Girona', 17, 1),
(4131, '17199', 'Taiala', 17, 1),
(4132, '17199', 'Taiala', 17, 1),
(4133, '17200', 'Palafrugell', 17, 1),
(4134, '17210', 'Calella De Palafrugell', 17, 1),
(4135, '17211', 'Llafranc', 17, 1),
(4136, '17212', 'Tamariu', 17, 1),
(4137, '17213', 'Esclanya', 17, 1),
(4138, '17213', 'Esclanya', 17, 1),
(4139, '17214', 'Regencos, Pueblo', 17, 1),
(4140, '17220', 'Sant Feliu De Guixols', 17, 1),
(4141, '17230', 'Sant Joan De Palamos', 17, 1),
(4142, '17240', 'Veinat Pocafarina (ay Llagoste)', 17, 1),
(4143, '17240', 'Veinat Pocafarina (ay Llagoste)', 17, 1),
(4144, '17241', 'Palol D\'onyar', 17, 1),
(4145, '17242', 'Sant Mateu De Montnegre', 17, 1),
(4146, '17243', 'Llambilles', 17, 1),
(4147, '17244', 'Veinat De Verneda', 17, 1),
(4148, '17244', 'Veinat De Verneda', 17, 1),
(4149, '17245', 'Bell-lloc', 17, 1),
(4150, '17246', 'Vilar, El', 17, 1),
(4151, '17248', 'S\'agaro', 17, 1),
(4152, '17248', 'S\'agaro', 17, 1),
(4153, '17249', 'Castell-platja D\'aro', 17, 1),
(4154, '17250', 'Platja D\'aro', 17, 1),
(4155, '17251', 'Calonge', 17, 1),
(4156, '17252', 'Sant Antoni De Calonge', 17, 1),
(4157, '17253', 'Vall-llobrega', 17, 1),
(4158, '17253', 'Vall-llobrega', 17, 1),
(4159, '17255', 'Sa Tuna, De, Platja', 17, 1),
(4160, '17256', 'Sant Julia De Boada', 17, 1),
(4161, '17256', 'Sant Julia De Boada', 17, 1),
(4162, '17257', 'Torroella De Montgri', 17, 1),
(4163, '17257', 'Torroella De Montgri', 17, 1),
(4164, '17257', 'Torroella De Montgri', 17, 1),
(4165, '17258', 'Estartit, L\'', 17, 1),
(4166, '17300', 'Blanes', 17, 1),
(4167, '17310', 'Lloret De Mar', 17, 1),
(4168, '17320', 'Tossa De Mar', 17, 1),
(4169, '17320', 'Tossa De Mar', 17, 1),
(4170, '17400', 'Breda', 17, 1),
(4171, '17401', 'Arbucies', 17, 1),
(4172, '17402', 'Joanet', 17, 1),
(4173, '17403', 'Sant Hilari Sacalm', 17, 1),
(4174, '17404', 'Viabrea', 17, 1),
(4175, '17405', 'Espinelves', 17, 1),
(4176, '17406', 'Vilarnau', 17, 1),
(4177, '17410', 'Vallcanera, Urbanitzacio', 17, 1),
(4178, '17411', 'Vidreres', 17, 1),
(4179, '17412', 'Moli, El', 17, 1),
(4180, '17420', 'Mallorquines', 17, 1),
(4181, '17421', 'Riudarenes', 17, 1),
(4182, '17430', 'Santa Coloma De Farners', 17, 1),
(4183, '17430', 'Santa Coloma De Farners', 17, 1),
(4184, '17441', 'Sant Marti Sapresa', 17, 1),
(4185, '17450', 'Hostalric', 17, 1),
(4186, '17451', 'Sant Feliu De Buixalleu', 17, 1),
(4187, '17452', 'Massanes', 17, 1),
(4188, '17454', 'Sant Andreu Salou, Pueblo', 17, 1),
(4189, '17455', 'Veinat De Les Mateues, El', 17, 1),
(4190, '17456', 'Franciach, Pueblo', 17, 1),
(4191, '17457', 'Riudellots De La Selva', 17, 1),
(4192, '17458', 'Fornells De La Selva', 17, 1),
(4193, '17459', 'Campllong', 17, 1),
(4194, '17460', 'Celra', 17, 1),
(4195, '17461', 'Campdora', 17, 1),
(4196, '17462', 'Vilers', 17, 1),
(4197, '17462', 'Vilers', 17, 1),
(4198, '17462', 'Vilers', 17, 1),
(4199, '17462', 'Vilers', 17, 1),
(4200, '17463', 'Sant LlorenÇ De Les Arenes', 17, 1),
(4201, '17463', 'Sant LlorenÇ De Les Arenes', 17, 1),
(4202, '17463', 'Sant LlorenÇ De Les Arenes', 17, 1),
(4203, '17464', 'Viladasens', 17, 1),
(4204, '17464', 'Viladasens', 17, 1),
(4205, '17464', 'Viladasens', 17, 1),
(4206, '17465', 'Llampaies', 17, 1),
(4207, '17466', 'Vilopriu', 17, 1),
(4208, '17466', 'Vilopriu', 17, 1),
(4209, '17467', 'Saus', 17, 1),
(4210, '17467', 'Saus', 17, 1),
(4211, '17468', 'Vilamari', 17, 1),
(4212, '17468', 'Vilamari', 17, 1),
(4213, '17469', 'Vilamalla', 17, 1),
(4214, '17469', 'Vilamalla', 17, 1),
(4215, '17469', 'Vilamalla', 17, 1),
(4216, '17469', 'Vilamalla', 17, 1),
(4217, '17469', 'Vilamalla', 17, 1),
(4218, '17470', 'Sant Pere Pescador', 17, 1),
(4219, '17472', 'Montiro', 17, 1),
(4220, '17472', 'Montiro', 17, 1),
(4221, '17473', 'Ventallo', 17, 1),
(4222, '17474', 'Vilamacolum', 17, 1),
(4223, '17474', 'Vilamacolum', 17, 1),
(4224, '17475', 'Vila-robau', 17, 1),
(4225, '17475', 'Vila-robau', 17, 1),
(4226, '17476', 'Tonya', 17, 1),
(4227, '17476', 'Tonya', 17, 1),
(4228, '17480', 'Roses', 17, 1),
(4229, '17481', 'Sant Julia De Ramis', 17, 1),
(4230, '17482', 'Tomet, El', 17, 1),
(4231, '17483', 'VilaÜr', 17, 1),
(4232, '17483', 'VilaÜr', 17, 1),
(4233, '17484', 'Vilatenim', 17, 1),
(4234, '17485', 'Vila-sacra', 17, 1),
(4235, '17486', 'Castello D\'empuries', 17, 1),
(4236, '17487', 'Empuriabrava', 17, 1),
(4237, '17488', 'Portlligat', 17, 1),
(4238, '17489', 'Vall De Santa Creu, La', 17, 1),
(4239, '17489', 'Vall De Santa Creu, La', 17, 1),
(4240, '17490', 'LlanÇa', 17, 1),
(4241, '17491', 'Peralada', 17, 1),
(4242, '17492', 'Vilanova De La Muga', 17, 1),
(4243, '17493', 'VilajÜiga', 17, 1),
(4244, '17493', 'VilajÜiga', 17, 1),
(4245, '17494', 'VilaÜt', 17, 1),
(4246, '17495', 'Palau-saverdera', 17, 1),
(4247, '17496', 'Garbet', 17, 1),
(4248, '17497', 'Portbou', 17, 1),
(4249, '17500', 'Ripoll', 17, 1),
(4250, '17512', 'Santa Maria De Matamala', 17, 1),
(4251, '17513', 'Viladonja', 17, 1),
(4252, '17515', 'Vidra', 17, 1),
(4253, '17520', 'Ventajola', 17, 1),
(4254, '17527', 'Llivia', 17, 1),
(4255, '17528', 'Sant Marti De Cerdanya', 17, 1),
(4256, '17529', 'Vilallobent', 17, 1),
(4257, '17530', 'Sant Marti D\'armencies', 17, 1),
(4258, '17531', 'Gombren', 17, 1),
(4259, '17531', 'Gombren', 17, 1),
(4260, '17532', 'Farga De Bebie, La', 17, 1),
(4261, '17534', 'Vilaro', 17, 1),
(4262, '17534', 'Vilaro', 17, 1),
(4263, '17534', 'Vilaro', 17, 1),
(4264, '17534', 'Vilaro', 17, 1),
(4265, '17535', 'Planoles', 17, 1),
(4266, '17536', 'Toses', 17, 1),
(4267, '17537', 'Molina, La', 17, 1),
(4268, '17538', 'Urus', 17, 1),
(4269, '17538', 'Urus', 17, 1),
(4270, '17538', 'Urus', 17, 1),
(4271, '17538', 'Urus', 17, 1),
(4272, '17539', 'Talltorta', 17, 1),
(4273, '17539', 'Talltorta', 17, 1),
(4274, '17539', 'Talltorta', 17, 1),
(4275, '17539', 'Talltorta', 17, 1),
(4276, '17600', 'Figueres', 17, 1),
(4277, '17700', 'Jonquera, La', 17, 1),
(4278, '17700', 'Jonquera, La', 17, 1),
(4279, '17706', 'Pont De Molins', 17, 1),
(4280, '17707', 'Vajol, La', 17, 1),
(4281, '17707', 'Vajol, La', 17, 1),
(4282, '17708', 'Requesens', 17, 1),
(4283, '17709', 'Limits, Els', 17, 1),
(4284, '17720', 'MaÇanet De Cabrenys', 17, 1),
(4285, '17721', 'Tapis', 17, 1),
(4286, '17722', 'Darnius', 17, 1),
(4287, '17723', 'Escaules, Les', 17, 1),
(4288, '17723', 'Escaules, Les', 17, 1),
(4289, '17730', 'Llers', 17, 1),
(4290, '17731', 'Terrades', 17, 1),
(4291, '17732', 'Sant LlorenÇ De La Muga', 17, 1),
(4292, '17733', 'Moli De Dalt', 17, 1),
(4293, '17734', 'Llorona', 17, 1),
(4294, '17740', 'Vilafant', 17, 1),
(4295, '17741', 'Vilarig', 17, 1),
(4296, '17741', 'Vilarig', 17, 1),
(4297, '17742', 'Avinyonet De Puigventos', 17, 1),
(4298, '17743', 'Vilanant', 17, 1),
(4299, '17744', 'Navata', 17, 1),
(4300, '17745', 'Llavanera (ayto Llado)', 17, 1),
(4301, '17746', 'Vilademires', 17, 1),
(4302, '17747', 'Espinavessa', 17, 1),
(4303, '17750', 'Vall, La (ayto Capmany)', 17, 1),
(4304, '17751', 'Vilartoli', 17, 1),
(4305, '17752', 'Mollet De Peralada', 17, 1),
(4306, '17753', 'Espolla', 17, 1),
(4307, '17754', 'Rabos D\'emporda', 17, 1),
(4308, '17755', 'Delfia', 17, 1),
(4309, '17760', 'Vilabertran', 17, 1),
(4310, '17762', 'Vilarnadal', 17, 1),
(4311, '17763', 'Masarac', 17, 1),
(4312, '17770', 'Vilamorell', 17, 1),
(4313, '17771', 'Santa Llogaia D\'alguema', 17, 1),
(4314, '17772', 'Ordis', 17, 1),
(4315, '17773', 'Vilajoan', 17, 1),
(4316, '17780', 'Garriguella', 17, 1),
(4317, '17781', 'Vilamaniscle', 17, 1),
(4318, '17800', 'Olot', 17, 1),
(4319, '17810', 'Sant Cristofol Les Fonts', 17, 1),
(4320, '17811', 'Santa Pau', 17, 1),
(4321, '17812', 'Batet De La Serra', 17, 1),
(4322, '17813', 'Vall De Bianya, La', 17, 1),
(4323, '17820', 'Banyoles', 17, 1),
(4324, '17830', 'Torn, El', 17, 1),
(4325, '17831', 'Sant Miquel De Campmajor', 17, 1),
(4326, '17832', 'Vilert', 17, 1),
(4327, '17832', 'Vilert', 17, 1),
(4328, '17833', 'Vilavenut', 17, 1),
(4329, '17833', 'Vilavenut', 17, 1),
(4330, '17834', 'Usall (ayto Porqueres)', 17, 1),
(4331, '17834', 'Usall (ayto Porqueres)', 17, 1),
(4332, '17840', 'Sarria De Ter', 17, 1),
(4333, '17843', 'Riudellots De La Creu, Pueblo', 17, 1),
(4334, '17844', 'Sords', 17, 1),
(4335, '17846', 'Mata', 17, 1),
(4336, '17850', 'Sant Ferriol', 17, 1),
(4337, '17850', 'Sant Ferriol', 17, 1),
(4338, '17850', 'Sant Ferriol', 17, 1),
(4339, '17851', 'Vilarrodona', 17, 1),
(4340, '17851', 'Vilarrodona', 17, 1),
(4341, '17852', 'Serinya', 17, 1),
(4342, '17853', 'Tortella', 17, 1),
(4343, '17853', 'Tortella', 17, 1),
(4344, '17853', 'Tortella', 17, 1),
(4345, '17854', 'Sant Jaume De Llierca', 17, 1),
(4346, '17854', 'Sant Jaume De Llierca', 17, 1),
(4347, '17855', 'Veinat De Llierca', 17, 1),
(4348, '17856', 'Vall Del Bac (oix)', 17, 1),
(4349, '17856', 'Vall Del Bac (oix)', 17, 1),
(4350, '17857', 'Sant Joan Les Fonts', 17, 1),
(4351, '17858', 'Sant Andreu De Socarrats', 17, 1),
(4352, '17860', 'Sant Joan De Les Abadesses', 17, 1),
(4353, '17861', 'Sant Marti D\'ogassa', 17, 1),
(4354, '17862', 'Vallfogona De Ripolles', 17, 1),
(4355, '17864', 'Vall Del Bac (sant Pau Seguries)', 17, 1),
(4356, '17865', 'Sant Pau de Seg', 17, 1),
(4357, '17867', 'Llierca', 17, 1),
(4358, '17868', 'Mollo', 17, 1),
(4359, '17869', 'Vilallonga De Ter', 17, 1),
(4360, '17869', 'Vilallonga De Ter', 17, 1),
(4361, '17869', 'Vilallonga De Ter', 17, 1),
(4362, '18001', 'Granada', 18, 1),
(4363, '18002', 'Granada', 18, 1),
(4364, '18003', 'Granada', 18, 1),
(4365, '18004', 'Granada', 18, 1),
(4366, '18005', 'Granada', 18, 1),
(4367, '18006', 'Granada', 18, 1),
(4368, '18007', 'Granada', 18, 1),
(4369, '18008', 'Granada', 18, 1),
(4370, '18009', 'Granada', 18, 1),
(4371, '18010', 'Granada', 18, 1),
(4372, '18011', 'Granada', 18, 1),
(4373, '18012', 'Granada', 18, 1),
(4374, '18013', 'Granada', 18, 1),
(4375, '18014', 'Granada', 18, 1),
(4376, '18015', 'Granada', 18, 1),
(4377, '18053', 'Cortes de Baza', 18, 1),
(4378, '18100', 'Armilla', 18, 1),
(4379, '18101', 'Belicena', 18, 1),
(4380, '18102', 'Purchil', 18, 1),
(4381, '18110', 'Hijar', 18, 1),
(4382, '18120', 'Alhama De Granada', 18, 1),
(4383, '18126', 'Arenas Del Rey', 18, 1),
(4384, '18127', 'Jayena', 18, 1),
(4385, '18127', 'Jayena', 18, 1),
(4386, '18128', 'Zafarraya', 18, 1),
(4387, '18128', 'Zafarraya', 18, 1),
(4388, '18129', 'Turro, El', 18, 1),
(4389, '18129', 'Turro, El', 18, 1),
(4390, '18129', 'Turro, El', 18, 1),
(4391, '18130', 'Malaha, La', 18, 1),
(4392, '18130', 'Malaha, La', 18, 1),
(4393, '18131', 'Ventas De Huelma', 18, 1),
(4394, '18132', 'Agron', 18, 1),
(4395, '18140', 'Zubia, La', 18, 1),
(4396, '18150', 'Gojar', 18, 1),
(4397, '18151', 'Ogijares', 18, 1),
(4398, '18152', 'Dilar', 18, 1),
(4399, '18160', 'Guejar Sierra', 18, 1),
(4400, '18170', 'Alfacar', 18, 1),
(4401, '18179', 'Viznar', 18, 1),
(4402, '18179', 'Viznar', 18, 1),
(4403, '18180', 'Diezma', 18, 1),
(4404, '18181', 'Villares, Los', 18, 1),
(4405, '18181', 'Villares, Los', 18, 1),
(4406, '18182', 'Alqueria Del Fargue', 18, 1),
(4407, '18183', 'Huetor De Santillan', 18, 1),
(4408, '18184', 'Beas De Granada', 18, 1),
(4409, '18185', 'Hu', 18, 1),
(4410, '18190', 'Lancha Del Genil', 18, 1),
(4411, '18190', 'Lancha Del Genil', 18, 1),
(4412, '18191', 'Pinos Genil', 18, 1),
(4413, '18191', 'Pinos Genil', 18, 1),
(4414, '18192', 'Quentar', 18, 1),
(4415, '18192', 'Quentar', 18, 1),
(4416, '18193', 'Monachil', 18, 1),
(4417, '18194', 'Churriana De La Vega', 18, 1),
(4418, '18194', 'Churriana De La Vega', 18, 1),
(4419, '18195', 'Cullar Vega', 18, 1),
(4420, '18196', 'Sierra Nevada', 18, 1),
(4421, '18197', 'Pulianillas', 18, 1),
(4422, '18198', 'Huetor Vega', 18, 1),
(4423, '18199', 'Cajar', 18, 1),
(4424, '18200', 'Maracena', 18, 1),
(4425, '18210', 'Peligros', 18, 1),
(4426, '18210', 'Peligros', 18, 1),
(4427, '18211', 'Cogollos Vega', 18, 1),
(4428, '18212', 'GÜevejar', 18, 1),
(4429, '18213', 'Jun', 18, 1),
(4430, '18214', 'Nivar', 18, 1),
(4431, '18220', 'Juncaril (albolote), Poligono Industrial', 18, 1),
(4432, '18230', 'Atarfe', 18, 1),
(4433, '18240', 'Pinos Puente', 18, 1),
(4434, '18247', 'Moclin', 18, 1),
(4435, '18248', 'Tiena', 18, 1),
(4436, '18249', 'Tozar', 18, 1),
(4437, '18250', 'Valderrubio', 18, 1),
(4438, '18250', 'Valderrubio', 18, 1),
(4439, '18260', 'Illora', 18, 1),
(4440, '18270', 'Montefrio', 18, 1),
(4441, '18280', 'Algarinejo', 18, 1),
(4442, '18290', 'Chaparral, El', 18, 1),
(4443, '18290', 'Chaparral, El', 18, 1),
(4444, '18290', 'Chaparral, El', 18, 1),
(4445, '18291', 'Zujaira', 18, 1),
(4446, '18292', 'Santa Fe', 18, 1),
(4447, '18293', 'Obeilar', 18, 1),
(4448, '18294', '', 18, 1),
(4449, '18295', 'Fuente De Cesna', 18, 1),
(4450, '18300', 'Loja', 18, 1),
(4451, '18310', 'Salar', 18, 1),
(4452, '18311', 'Zagra', 18, 1),
(4453, '18311', 'Zagra', 18, 1),
(4454, '18312', 'Ventorros De La Laguna', 18, 1),
(4455, '18313', 'Riofrio', 18, 1),
(4456, '18314', 'Palma, La', 18, 1),
(4457, '18320', 'Santafe', 18, 1),
(4458, '18327', 'Lachar', 18, 1),
(4459, '18328', 'Trasmulas', 18, 1),
(4460, '18328', 'Trasmulas', 18, 1),
(4461, '18329', 'Jau, El', 18, 1),
(4462, '18329', 'Jau, El', 18, 1),
(4463, '18330', 'Sierra Elvira', 18, 1),
(4464, '18330', 'Sierra Elvira', 18, 1),
(4465, '18330', 'Sierra Elvira', 18, 1),
(4466, '18339', 'Romilla', 18, 1),
(4467, '18339', 'Romilla', 18, 1),
(4468, '18340', 'Fuente Vaqueros', 18, 1),
(4469, '18350', 'Alomartes', 18, 1),
(4470, '18360', 'Milanos (loja)', 18, 1),
(4471, '18369', 'Villanueva Mesia', 18, 1),
(4472, '18370', 'Moraleda De Zafayona', 18, 1),
(4473, '18380', 'Tocon', 18, 1),
(4474, '18381', 'Bracana', 18, 1),
(4475, '18400', 'Orgiva', 18, 1),
(4476, '18410', 'Soportujar', 18, 1),
(4477, '18410', 'Soportujar', 18, 1),
(4478, '18410', 'Soportujar', 18, 1),
(4479, '18411', 'Pampaneira', 18, 1),
(4480, '18412', 'Bubion', 18, 1),
(4481, '18413', 'Capileira', 18, 1),
(4482, '18414', 'Pitres', 18, 1),
(4483, '18415', 'Portugos', 18, 1),
(4484, '18416', 'Busquistar', 18, 1),
(4485, '18416', 'Busquistar', 18, 1),
(4486, '18417', 'Trevelez', 18, 1),
(4487, '18418', 'Tijola', 18, 1),
(4488, '18418', 'Tijola', 18, 1),
(4489, '18418', 'Tijola', 18, 1),
(4490, '18420', 'Lanjaron', 18, 1),
(4491, '18420', 'Lanjaron', 18, 1),
(4492, '18430', 'Torvizcon', 18, 1),
(4493, '18438', 'Almegijar', 18, 1),
(4494, '18439', 'Notaez', 18, 1),
(4495, '18440', 'Cadiar', 18, 1),
(4496, '18448', 'Yator', 18, 1),
(4497, '18449', 'Lobras', 18, 1),
(4498, '18450', 'Mecina Bombaron', 18, 1),
(4499, '18451', 'Berchules', 18, 1),
(4500, '18452', 'Juviles', 18, 1),
(4501, '18460', 'Yegen', 18, 1),
(4502, '18470', 'Valor', 18, 1),
(4503, '18480', 'Ugijar', 18, 1),
(4504, '18490', 'Murtas', 18, 1),
(4505, '18491', 'Turon', 18, 1),
(4506, '18492', 'Mecina Tedel', 18, 1),
(4507, '18492', 'Mecina Tedel', 18, 1),
(4508, '18493', 'Nevada', 18, 1),
(4509, '18494', 'Picena', 18, 1),
(4510, '18494', 'Picena', 18, 1),
(4511, '18500', 'Guadix', 18, 1),
(4512, '18510', 'Benalua', 18, 1),
(4513, '18511', 'Rambla Del Agua (charches)', 18, 1),
(4514, '18512', 'Hueneja', 18, 1),
(4515, '18512', 'Hueneja', 18, 1),
(4516, '18512', 'Hueneja', 18, 1),
(4517, '18513', 'Ferreira', 18, 1),
(4518, '18514', 'Aldeire', 18, 1),
(4519, '18515', 'Fonelas', 18, 1),
(4520, '18515', 'Fonelas', 18, 1),
(4521, '18515', 'Fonelas', 18, 1),
(4522, '18516', 'Policar', 18, 1),
(4523, '18516', 'Policar', 18, 1),
(4524, '18516', 'Policar', 18, 1),
(4525, '18516', 'Policar', 18, 1),
(4526, '18517', 'Tocon De Quentar', 18, 1),
(4527, '18517', 'Tocon De Quentar', 18, 1),
(4528, '18517', 'Tocon De Quentar', 18, 1),
(4529, '18518', 'Lanteira', 18, 1),
(4530, '18518', 'Lanteira', 18, 1),
(4531, '18518', 'Lanteira', 18, 1),
(4532, '18518', 'Lanteira', 18, 1),
(4533, '18518', 'Lanteira', 18, 1),
(4534, '18519', 'Purullena', 18, 1),
(4535, '18519', 'Purullena', 18, 1),
(4536, '18520', 'Alamedilla', 18, 1),
(4537, '18530', 'Pedro Martinez', 18, 1),
(4538, '18538', 'Dehesas De Guadix', 18, 1),
(4539, '18538', 'Dehesas De Guadix', 18, 1),
(4540, '18539', 'Villanueva De Las Torres', 18, 1),
(4541, '18540', 'Morelabor', 18, 1),
(4542, '18540', 'Morelabor', 18, 1),
(4543, '18540', 'Morelabor', 18, 1),
(4544, '18540', 'Morelabor', 18, 1),
(4545, '18550', 'Iznalloz', 18, 1),
(4546, '18560', 'Guadahortuna', 18, 1),
(4547, '18561', 'Montejicar', 18, 1),
(4548, '18562', 'Bogarre', 18, 1),
(4549, '18563', 'Torre Cardela', 18, 1),
(4550, '18563', 'Torre Cardela', 18, 1),
(4551, '18564', 'Colomera', 18, 1),
(4552, '18565', 'Campotejar', 18, 1),
(4553, '18566', 'Benalua De Las Villas', 18, 1),
(4554, '18567', 'Ventas De Andar', 18, 1),
(4555, '18568', 'PiÑar', 18, 1),
(4556, '18569', 'Montillana', 18, 1),
(4557, '18570', 'Deifontes', 18, 1),
(4558, '18600', 'Ventillas, Las', 18, 1),
(4559, '18610', 'Lobres', 18, 1),
(4560, '18611', 'Molvizar', 18, 1),
(4561, '18612', 'Itrabo', 18, 1),
(4562, '18613', 'Varadero, El', 18, 1),
(4563, '18614', 'Lujar', 18, 1),
(4564, '18614', 'Lujar', 18, 1),
(4565, '18614', 'Lujar', 18, 1),
(4566, '18615', 'Guajares, Los', 18, 1),
(4567, '18615', 'Guajares, Los', 18, 1),
(4568, '18616', 'Lagos', 18, 1),
(4569, '18620', 'Alhendin', 18, 1),
(4570, '18620', 'Alhendin', 18, 1),
(4571, '18630', 'Otura', 18, 1),
(4572, '18640', 'Padul', 18, 1),
(4573, '18650', 'Durcal', 18, 1),
(4574, '18656', 'Talara', 18, 1),
(4575, '18657', 'Niguelas', 18, 1),
(4576, '18657', 'Niguelas', 18, 1),
(4577, '18658', 'Valle, El', 18, 1),
(4578, '18658', 'Valle, El', 18, 1),
(4579, '18659', 'Villamena', 18, 1),
(4580, '18659', 'Villamena', 18, 1),
(4581, '18660', 'Izbor', 18, 1),
(4582, '18660', 'Izbor', 18, 1),
(4583, '18670', 'Velez De Benaudalla', 18, 1),
(4584, '18680', 'SalobreÑa', 18, 1),
(4585, '18690', 'Velilla-taramay', 18, 1),
(4586, '18690', 'Velilla-taramay', 18, 1),
(4587, '18697', 'Herradura, La', 18, 1),
(4588, '18698', 'Otivar', 18, 1),
(4589, '18699', 'Lentegi', 18, 1),
(4590, '18699', 'Lentegi', 18, 1),
(4591, '18700', 'AlbuÑol', 18, 1),
(4592, '18708', 'Albondon', 18, 1),
(4593, '18710', 'Polopos', 18, 1),
(4594, '18710', 'Polopos', 18, 1),
(4595, '18710', 'Polopos', 18, 1),
(4596, '18711', 'Rubite', 18, 1),
(4597, '18713', 'Sorvilan', 18, 1),
(4598, '18720', 'Torrenueva', 18, 1),
(4599, '18730', 'Carchuna', 18, 1),
(4600, '18740', 'Castell De Ferro', 18, 1),
(4601, '18750', 'Mamola, La', 18, 1),
(4602, '18750', 'Mamola, La', 18, 1),
(4603, '18760', 'Rabita, La', 18, 1),
(4604, '18770', 'Pozuelo, El', 18, 1),
(4605, '18800', 'Baza', 18, 1),
(4606, '18810', 'Caniles', 18, 1),
(4607, '18811', 'Zujar', 18, 1),
(4608, '18812', 'Freila', 18, 1),
(4609, '18813', 'Cuevas Del Campo', 18, 1),
(4610, '18814', 'Teja, La', 18, 1),
(4611, '18815', 'Campo Camara', 18, 1),
(4612, '18816', 'Castril De La PeÑa', 18, 1),
(4613, '18817', 'Benamaurel', 18, 1),
(4614, '18818', 'Castillejar', 18, 1),
(4615, '18819', 'Caniles', 18, 1),
(4616, '18820', 'Puebla Don Fadrique', 18, 1),
(4617, '18830', 'Huescar', 18, 1),
(4618, '18830', 'Huescar', 18, 1),
(4619, '18840', 'Galera', 18, 1),
(4620, '18849', 'Galera', 18, 1),
(4621, '18850', 'Cullar', 18, 1),
(4622, '18857', 'C', 18, 1),
(4623, '18858', 'Orce', 18, 1),
(4624, '18859', 'Vertientes, Las', 18, 1),
(4625, '18860', 'Olivar', 18, 1),
(4626, '18860', 'Olivar', 18, 1),
(4627, '18870', 'Gor', 18, 1),
(4628, '18880', 'Hernan Valle', 18, 1),
(4629, '18890', 'Gorafe', 18, 1),
(4630, '18891', 'Venta Del Peral', 18, 1),
(4631, '19001', 'Guadalajara', 19, 1),
(4632, '19002', 'Guadalajara', 19, 1),
(4633, '19003', 'Guadalajara', 19, 1),
(4634, '19004', 'Guadalajara', 19, 1),
(4635, '19005', 'Guadalajara', 19, 1),
(4636, '19080', 'Guadalajara', 19, 1),
(4637, '19080', 'Guadalajara', 19, 1),
(4638, '19100', 'Pastrana', 19, 1),
(4639, '19110', 'Mondejar', 19, 1),
(4640, '19111', 'Yebra', 19, 1),
(4641, '19112', 'Pozo De Almoguera', 19, 1),
(4642, '19112', 'Pozo De Almoguera', 19, 1),
(4643, '19113', 'Fuentenovilla', 19, 1),
(4644, '19114', 'Mazuecos', 19, 1),
(4645, '19115', 'Almoguera', 19, 1),
(4646, '19116', 'Franciscano Pastrana, Convento', 19, 1),
(4647, '19117', 'Albalate De Zorita', 19, 1),
(4648, '19118', 'Almonacid De Zorita', 19, 1),
(4649, '19119', 'Zorita De Los Canes', 19, 1),
(4650, '19119', 'Zorita De Los Canes', 19, 1),
(4651, '19119', 'Zorita De Los Canes', 19, 1),
(4652, '19119', 'Zorita De Los Canes', 19, 1),
(4653, '19119', 'Zorita De Los Canes', 19, 1),
(4654, '19119', 'Zorita De Los Canes', 19, 1),
(4655, '19119', 'Zorita De Los Canes', 19, 1),
(4656, '19119', 'Zorita De Los Canes', 19, 1),
(4657, '19119', 'Zorita De Los Canes', 19, 1),
(4658, '19120', 'Sacedon', 19, 1),
(4659, '19125', 'Alcocer', 19, 1),
(4660, '19126', 'Salmeron', 19, 1),
(4661, '19127', 'Millana', 19, 1),
(4662, '19127', 'Millana', 19, 1),
(4663, '19127', 'Millana', 19, 1),
(4664, '19127', 'Millana', 19, 1),
(4665, '19128', 'PeÑalagos, Urbanizacion', 19, 1),
(4666, '19128', 'PeÑalagos, Urbanizacion', 19, 1),
(4667, '19128', 'PeÑalagos, Urbanizacion', 19, 1),
(4668, '19128', 'PeÑalagos, Urbanizacion', 19, 1),
(4669, '19129', 'Tabladillo', 19, 1),
(4670, '19129', 'Tabladillo', 19, 1),
(4671, '19130', 'Pantano De EntrepeÑas', 19, 1),
(4673, '19132', 'Valdeconcha', 19, 1),
(4674, '19132', 'Valdeconcha', 19, 1),
(4675, '19133', 'Olivar, El', 19, 1),
(4676, '19133', 'Olivar, El', 19, 1),
(4677, '19133', 'Olivar, El', 19, 1),
(4678, '19133', 'Olivar, El', 19, 1),
(4679, '19133', 'Olivar, El', 19, 1),
(4680, '19134', 'Tendilla', 19, 1),
(4681, '19134', 'Tendilla', 19, 1),
(4682, '19135', 'ArmuÑa De TajuÑa', 19, 1),
(4683, '19135', 'ArmuÑa De TajuÑa', 19, 1),
(4684, '19139', 'Ciudad Valdeluz', 19, 1),
(4685, '19140', 'Horche', 19, 1),
(4686, '19141', 'Yebes', 19, 1),
(4687, '19141', 'Yebes', 19, 1),
(4688, '19141', 'Yebes', 19, 1),
(4689, '19141', 'Yebes', 19, 1),
(4690, '19142', 'Valdeavellano', 19, 1),
(4691, '19142', 'Valdeavellano', 19, 1),
(4692, '19143', 'Yelamos De Arriba', 19, 1),
(4693, '19143', 'Yelamos De Arriba', 19, 1),
(4694, '19143', 'Yelamos De Arriba', 19, 1),
(4695, '19143', 'Yelamos De Arriba', 19, 1),
(4696, '19143', 'Yelamos De Arriba', 19, 1),
(4697, '19143', 'Yelamos De Arriba', 19, 1),
(4698, '19143', 'Yelamos De Arriba', 19, 1),
(4699, '19144', 'Moratilla De Los Meleros', 19, 1),
(4700, '19144', 'Moratilla De Los Meleros', 19, 1),
(4701, '19144', 'Moratilla De Los Meleros', 19, 1),
(4702, '19145', 'Renera', 19, 1),
(4703, '19150', 'Iriepal', 19, 1),
(4704, '19151', 'Centenera', 19, 1),
(4705, '19152', 'Aldeanueva De Guadalajara', 19, 1),
(4706, '19153', 'Atanzon', 19, 1),
(4707, '19160', 'Chiloeches', 19, 1),
(4708, '19161', 'Pozo De Guadalajara', 19, 1),
(4709, '19162', 'Pioz', 19, 1),
(4710, '19170', 'Monte Calderon, Urbanizacion', 19, 1),
(4711, '19171', 'Cabanillas Del Campo', 19, 1),
(4712, '19174', 'Valdeaveruelo', 19, 1),
(4713, '19174', 'Valdeaveruelo', 19, 1),
(4714, '19174', 'Valdeaveruelo', 19, 1),
(4715, '19180', 'Marchamalo', 19, 1),
(4716, '19181', 'Guadalajara', 19, 1),
(4717, '19182', 'Usanos', 19, 1),
(4718, '19182', 'Usanos', 19, 1),
(4719, '19184', 'ViÑuelas', 19, 1),
(4720, '19184', 'ViÑuelas', 19, 1),
(4721, '19184', 'ViÑuelas', 19, 1),
(4722, '19184', 'ViÑuelas', 19, 1),
(4723, '19184', 'ViÑuelas', 19, 1),
(4724, '19185', 'ValdenuÑo Fernandez', 19, 1),
(4725, '19185', 'ValdenuÑo Fernandez', 19, 1),
(4726, '19185', 'ValdenuÑo Fernandez', 19, 1),
(4727, '19186', 'Cubillo De Uceda, El', 19, 1),
(4728, '19187', 'Uceda', 19, 1),
(4729, '19190', 'Torija', 19, 1),
(4730, '19190', 'Torija', 19, 1),
(4731, '19191', 'Torija', 19, 1),
(4732, '19191', 'Pozo de Guadalajara', 19, 1),
(4733, '19192', 'Trijueque', 19, 1),
(4734, '19192', 'Trijueque', 19, 1),
(4735, '19192', 'Trijueque', 19, 1),
(4736, '19193', 'Taracena', 19, 1),
(4737, '19194', 'Guadalajara', 19, 1),
(4738, '19196', 'Valfermoso De Las Monjas', 19, 1),
(4739, '19196', 'Valfermoso De Las Monjas', 19, 1),
(4740, '19196', 'Valfermoso De Las Monjas', 19, 1),
(4741, '19196', 'Valfermoso De Las Monjas', 19, 1),
(4742, '19196', 'Valfermoso De Las Monjas', 19, 1),
(4743, '19197', 'Valdenoches', 19, 1),
(4744, '19197', 'Valdenoches', 19, 1),
(4745, '19197', 'Valdenoches', 19, 1),
(4746, '19197', 'Valdenoches', 19, 1),
(4747, '19198', 'Tortola De Henares', 19, 1),
(4748, '19200', 'Miralcampo', 19, 1),
(4749, '19208', 'Eusebio Centenera, Urbanizacion', 19, 1),
(4750, '19209', 'Villanueva De La Torre', 19, 1),
(4751, '19209', 'Villanueva De La Torre', 19, 1),
(4752, '19210', 'Yunquera De Henares', 19, 1),
(4753, '19219', 'Malaguilla', 19, 1),
(4754, '19219', 'Malaguilla', 19, 1),
(4755, '19219', 'Malaguilla', 19, 1),
(4756, '19220', 'Humanes De Mohernando', 19, 1),
(4757, '19222', 'Tamajon', 19, 1),
(4758, '19223', 'Vado, El', 19, 1),
(4759, '19223', 'Vado, El', 19, 1),
(4760, '19223', 'Vado, El', 19, 1),
(4761, '19224', 'Valverde De Los Arroyos', 19, 1),
(4762, '19224', 'Valverde De Los Arroyos', 19, 1),
(4763, '19224', 'Valverde De Los Arroyos', 19, 1),
(4764, '19225', 'Valdesotos', 19, 1),
(4765, '19225', 'Valdesotos', 19, 1),
(4766, '19225', 'Valdesotos', 19, 1),
(4767, '19225', 'Valdesotos', 19, 1),
(4768, '19226', 'Mohernando', 19, 1),
(4769, '19226', 'Mohernando', 19, 1),
(4770, '19226', 'Mohernando', 19, 1),
(4771, '19227', 'Taragudo', 19, 1),
(4772, '19227', 'Taragudo', 19, 1),
(4773, '19227', 'Taragudo', 19, 1),
(4774, '19227', 'Taragudo', 19, 1),
(4775, '19229', 'TorrebeleÑa', 19, 1),
(4776, '19229', 'TorrebeleÑa', 19, 1),
(4777, '19229', 'TorrebeleÑa', 19, 1),
(4778, '19229', 'TorrebeleÑa', 19, 1),
(4779, '19230', 'Cogolludo', 19, 1),
(4780, '19237', 'Zarzuela De Jadraque', 19, 1),
(4781, '19237', 'Zarzuela De Jadraque', 19, 1),
(4782, '19237', 'Zarzuela De Jadraque', 19, 1),
(4783, '19237', 'Zarzuela De Jadraque', 19, 1),
(4784, '19237', 'Zarzuela De Jadraque', 19, 1),
(4785, '19238', 'Zarzuela De Galve', 19, 1),
(4786, '19238', 'Zarzuela De Galve', 19, 1),
(4787, '19239', 'Monasterio', 19, 1),
(4788, '19239', 'Monasterio', 19, 1),
(4789, '19240', 'Jadraque', 19, 1),
(4790, '19242', 'Hiendelaencina', 19, 1),
(4791, '19243', 'Villares De Jadraque', 19, 1),
(4792, '19243', 'Villares De Jadraque', 19, 1),
(4793, '19243', 'Villares De Jadraque', 19, 1),
(4794, '19243', 'Villares De Jadraque', 19, 1),
(4795, '19243', 'Villares De Jadraque', 19, 1),
(4796, '19243', 'Villares De Jadraque', 19, 1),
(4797, '19243', 'Villares De Jadraque', 19, 1),
(4798, '19244', 'Ordial, El', 19, 1),
(4799, '19244', 'Ordial, El', 19, 1),
(4800, '19244', 'Ordial, El', 19, 1),
(4801, '19245', 'Torremocha De Jadraque', 19, 1),
(4802, '19245', 'Torremocha De Jadraque', 19, 1),
(4803, '19245', 'Torremocha De Jadraque', 19, 1),
(4804, '19245', 'Torremocha De Jadraque', 19, 1),
(4805, '19245', 'Torremocha De Jadraque', 19, 1),
(4806, '19245', 'Torremocha De Jadraque', 19, 1),
(4807, '19245', 'Torremocha De Jadraque', 19, 1),
(4808, '19245', 'Torremocha De Jadraque', 19, 1),
(4809, '19245', 'Torremocha De Jadraque', 19, 1),
(4810, '19246', 'Villanueva De Argecilla', 19, 1),
(4811, '19246', 'Villanueva De Argecilla', 19, 1),
(4812, '19246', 'Villanueva De Argecilla', 19, 1),
(4813, '19246', 'Villanueva De Argecilla', 19, 1),
(4814, '19246', 'Villanueva De Argecilla', 19, 1),
(4815, '19246', 'Villanueva De Argecilla', 19, 1),
(4816, '19247', 'Poligono PeÑablanca', 19, 1),
(4817, '19247', 'Poligono PeÑablanca', 19, 1),
(4818, '19247', 'Poligono PeÑablanca', 19, 1),
(4819, '19248', 'Hita', 19, 1),
(4820, '19250', 'SigÜenza', 19, 1),
(4821, '19260', 'Alcolea Del Pinar', 19, 1),
(4822, '19261', 'Villaverde Del Ducado', 19, 1),
(4823, '19261', 'Villaverde Del Ducado', 19, 1),
(4824, '19262', 'Sauca', 19, 1),
(4825, '19262', 'Sauca', 19, 1),
(4826, '19262', 'Sauca', 19, 1),
(4827, '19263', 'Guijosa', 19, 1),
(4828, '19264', 'Olmedillas', 19, 1),
(4829, '19265', 'Ures', 19, 1),
(4830, '19266', 'Salinas De La Olmeda', 19, 1),
(4831, '19266', 'Salinas De La Olmeda', 19, 1),
(4832, '19267', 'Moratilla De Henares', 19, 1),
(4833, '19268', 'TorresaviÑan, La', 19, 1),
(4834, '19268', 'TorresaviÑan, La', 19, 1),
(4835, '19268', 'TorresaviÑan, La', 19, 1),
(4836, '19268', 'TorresaviÑan, La', 19, 1),
(4837, '19269', 'Villacorza', 19, 1),
(4838, '19269', 'Villacorza', 19, 1),
(4839, '19269', 'Villacorza', 19, 1),
(4840, '19269', 'Villacorza', 19, 1),
(4841, '19269', 'Villacorza', 19, 1),
(4842, '19270', 'Atienza', 19, 1),
(4843, '19273', 'Pr', 19, 1),
(4844, '19274', 'Villacadima', 19, 1),
(4845, '19274', 'Villacadima', 19, 1),
(4846, '19274', 'Villacadima', 19, 1),
(4847, '19275', 'Somolinos', 19, 1),
(4848, '19275', 'Somolinos', 19, 1),
(4849, '19275', 'Somolinos', 19, 1),
(4850, '19275', 'Somolinos', 19, 1),
(4851, '19275', 'Somolinos', 19, 1),
(4852, '19275', 'Somolinos', 19, 1),
(4853, '19275', 'Somolinos', 19, 1),
(4854, '19276', 'Ujados', 19, 1),
(4855, '19276', 'Ujados', 19, 1),
(4856, '19276', 'Ujados', 19, 1),
(4857, '19276', 'Ujados', 19, 1),
(4858, '19276', 'Ujados', 19, 1),
(4859, '19276', 'Ujados', 19, 1),
(4860, '19277', 'Tordelrabano', 19, 1),
(4861, '19277', 'Tordelrabano', 19, 1),
(4862, '19277', 'Tordelrabano', 19, 1),
(4863, '19277', 'Tordelrabano', 19, 1),
(4864, '19277', 'Tordelrabano', 19, 1),
(4865, '19278', 'Naharros', 19, 1),
(4866, '19278', 'Naharros', 19, 1),
(4867, '19280', 'Maranchon', 19, 1),
(4868, '19281', 'Codes', 19, 1),
(4869, '19282', 'Anguita', 19, 1),
(4870, '19283', 'Santa Maria Del Espino', 19, 1),
(4871, '19283', 'Santa Maria Del Espino', 19, 1),
(4872, '19284', 'Alcolea del Pinar', 19, 1),
(4873, '19285', 'Luzon', 19, 1),
(4874, '19285', 'Luzon', 19, 1),
(4875, '19286', 'Tobillos', 19, 1),
(4876, '19286', 'Tobillos', 19, 1),
(4877, '19287', 'Turmiel', 19, 1),
(4878, '19287', 'Turmiel', 19, 1),
(4879, '19287', 'Turmiel', 19, 1),
(4880, '19287', 'Turmiel', 19, 1),
(4881, '19287', 'Turmiel', 19, 1),
(4882, '19287', 'Turmiel', 19, 1),
(4883, '19290', 'Fontanar', 19, 1),
(4884, '19292', 'Espinosa De Henares', 19, 1),
(4885, '19292', 'Espinosa De Henares', 19, 1),
(4886, '19294', 'Villaseca De Henares', 19, 1),
(4887, '19294', 'Villaseca De Henares', 19, 1),
(4888, '19294', 'Villaseca De Henares', 19, 1),
(4889, '19294', 'Villaseca De Henares', 19, 1),
(4890, '19295', 'Viana De Jadraque', 19, 1),
(4891, '19295', 'Viana De Jadraque', 19, 1),
(4892, '19295', 'Viana De Jadraque', 19, 1),
(4893, '19295', 'Viana De Jadraque', 19, 1),
(4894, '19300', 'Molina De Aragon', 19, 1),
(4895, '19310', 'Chequilla', 19, 1),
(4896, '19310', 'Chequilla', 19, 1),
(4897, '19310', 'Chequilla', 19, 1),
(4898, '19311', 'Orea', 19, 1),
(4899, '19312', 'Traid', 19, 1),
(4900, '19312', 'Traid', 19, 1),
(4901, '19312', 'Traid', 19, 1),
(4902, '19313', 'Peralejos De Las Truchas', 19, 1),
(4903, '19314', 'Taravilla', 19, 1),
(4904, '19315', 'Megina', 19, 1),
(4905, '19320', 'Motos', 19, 1),
(4906, '19321', 'Alustante', 19, 1),
(4907, '19323', 'Tordesilos', 19, 1),
(4908, '19324', 'Setiles', 19, 1),
(4909, '19325', 'Tordellego', 19, 1),
(4910, '19325', 'Tordellego', 19, 1),
(4911, '19325', 'Tordellego', 19, 1),
(4912, '19326', 'Pobo De DueÑas, El', 19, 1),
(4913, '19327', 'Pedregal, El', 19, 1),
(4914, '19328', 'Morenilla', 19, 1),
(4915, '19328', 'Morenilla', 19, 1),
(4916, '19328', 'Morenilla', 19, 1),
(4917, '19332', 'Villel De Mesa', 19, 1),
(4918, '19332', 'Villel De Mesa', 19, 1),
(4919, '19332', 'Villel De Mesa', 19, 1),
(4920, '19332', 'Villel De Mesa', 19, 1),
(4921, '19333', 'Tartanedo', 19, 1),
(4922, '19334', 'Hinojosa', 19, 1),
(4923, '19334', 'Hinojosa', 19, 1),
(4924, '19336', 'Pardos', 19, 1),
(4925, '19337', 'Torrubia', 19, 1),
(4926, '19338', 'Tortuera', 19, 1),
(4927, '19339', 'Rueda De La Sierra', 19, 1),
(4928, '19339', 'Rueda De La Sierra', 19, 1),
(4929, '19340', 'Rillo De Gallo', 19, 1),
(4930, '19341', 'Corduente', 19, 1),
(4931, '19342', 'Herreria', 19, 1),
(4932, '19343', 'Canales De Molina', 19, 1),
(4933, '19345', 'Torremocha Del Pinar', 19, 1),
(4934, '19346', 'Selas', 19, 1),
(4935, '19346', 'Selas', 19, 1),
(4936, '19350', 'Anchuela Del Pedregal', 19, 1),
(4937, '19351', 'Tordelpalo', 19, 1),
(4938, '19352', 'Prados Redondos', 19, 1),
(4939, '19353', 'Chera', 19, 1),
(4940, '19354', 'Aldehuela', 19, 1),
(4941, '19355', 'Torrecuadrada De Molina', 19, 1),
(4942, '19357', 'Anquela Del Pedregal', 19, 1),
(4943, '19360', 'Campillo De DueÑas', 19, 1),
(4944, '19361', 'Yunta, La', 19, 1),
(4945, '19362', 'Cubillejo De La Sierra', 19, 1),
(4946, '19363', 'Cubillejo Del Sitio', 19, 1),
(4947, '19390', 'Valsalobre', 19, 1),
(4948, '19390', 'Valsalobre', 19, 1),
(4949, '19390', 'Valsalobre', 19, 1),
(4950, '19390', 'Valsalobre', 19, 1),
(4951, '19390', 'Valsalobre', 19, 1),
(4952, '19390', 'Valsalobre', 19, 1),
(4953, '19391', 'Torremochuela', 19, 1),
(4954, '19391', 'Torremochuela', 19, 1),
(4955, '19391', 'Torremochuela', 19, 1),
(4956, '19392', 'Ventosa', 19, 1),
(4957, '19400', 'Brihuega', 19, 1),
(4958, '19410', 'Brihuega', 19, 1),
(4959, '19411', 'Valfermoso De TajuÑa', 19, 1),
(4960, '19411', 'Valfermoso De TajuÑa', 19, 1),
(4961, '19412', 'Valdesaz', 19, 1),
(4962, '19412', 'Valdesaz', 19, 1),
(4963, '19412', 'Valdesaz', 19, 1),
(4964, '19413', 'Yela', 19, 1),
(4965, '19414', 'Brihuega', 19, 1),
(4966, '19420', 'Cifuentes', 19, 1),
(4967, '19428', 'Cifuentes', 19, 1),
(4968, '19429', 'Val De San Garcia', 19, 1),
(4969, '19431', 'Torrecuadradilla', 19, 1),
(4970, '19431', 'Torrecuadradilla', 19, 1),
(4971, '19431', 'Torrecuadradilla', 19, 1),
(4972, '19432', 'Sacecorbo', 19, 1),
(4973, '19432', 'Sacecorbo', 19, 1),
(4974, '19432', 'Sacecorbo', 19, 1),
(4975, '19432', 'Sacecorbo', 19, 1),
(4976, '19441', 'Ribarredonda', 19, 1),
(4977, '19441', 'Ribarredonda', 19, 1),
(4978, '19442', 'Ablanque', 19, 1),
(4979, '19443', 'Saelices De La Sal', 19, 1),
(4980, '19443', 'Saelices De La Sal', 19, 1),
(4981, '19443', 'Saelices De La Sal', 19, 1),
(4982, '19444', 'Villar De Cobeta', 19, 1),
(4983, '19444', 'Villar De Cobeta', 19, 1),
(4984, '19445', 'Villarejo De Medina', 19, 1),
(4985, '19445', 'Villarejo De Medina', 19, 1),
(4986, '19445', 'Villarejo De Medina', 19, 1),
(4987, '19445', 'Villarejo De Medina', 19, 1),
(4988, '19450', 'Trillo', 19, 1),
(4989, '19458', 'Instituto Leprologico De Trillo', 19, 1),
(4990, '19459', 'Valdelagua', 19, 1),
(4991, '19459', 'Valdelagua', 19, 1),
(4992, '19460', 'Villanueva De Alcoron', 19, 1),
(4993, '19461', 'Huertapelayo', 19, 1),
(4994, '19461', 'Huertapelayo', 19, 1),
(4995, '19462', 'PeÑalen', 19, 1),
(4996, '19463', 'Poveda De La Sierra', 19, 1),
(4997, '19490', 'Venta De Almadrones', 19, 1),
(4998, '19490', 'Venta De Almadrones', 19, 1),
(4999, '19490', 'Venta De Almadrones', 19, 1),
(5000, '19490', 'Venta De Almadrones', 19, 1),
(5001, '19490', 'Venta De Almadrones', 19, 1),
(5002, '19490', 'Venta De Almadrones', 19, 1),
(5003, '19490', 'Venta De Almadrones', 19, 1),
(5004, '19491', 'Torrecuadrada De Los Valles', 19, 1),
(5005, '19491', 'Torrecuadrada De Los Valles', 19, 1),
(5006, '19491', 'Torrecuadrada De Los Valles', 19, 1),
(5007, '19491', 'Torrecuadrada De Los Valles', 19, 1),
(5008, '19491', 'Torrecuadrada De Los Valles', 19, 1),
(5009, '19492', 'Viana De Mondejar', 19, 1),
(5010, '19492', 'Viana De Mondejar', 19, 1),
(5011, '19492', 'Viana De Mondejar', 19, 1),
(5012, '19492', 'Viana De Mondejar', 19, 1),
(5013, '19492', 'Viana De Mondejar', 19, 1),
(5014, '19493', 'Villaescusa De Palositos', 19, 1),
(5015, '19495', 'Zaorejas', 19, 1),
(5017, '20001', 'Donostia - San Sebastian', 20, 1),
(5018, '20002', 'Donostia - San Sebastian', 20, 1),
(5019, '20003', 'Donostia - San Sebastian', 20, 1),
(5020, '20004', 'Donostia - San Sebastian', 20, 1),
(5021, '20005', 'Donostia - San Sebastian', 20, 1),
(5022, '20006', 'Donostia - San Sebastian', 20, 1),
(5023, '20007', 'Donostia - San Sebastian', 20, 1),
(5024, '20008', 'Donostia - San Sebastian', 20, 1),
(5025, '20009', 'Donostia - San Sebastian', 20, 1),
(5026, '20010', 'Donostia - San Sebastian', 20, 1),
(5027, '20011', 'Donostia - San Sebastian', 20, 1),
(5028, '20012', 'Donostia - San Sebastian', 20, 1),
(5029, '20013', 'Donostia - San Sebastian', 20, 1),
(5030, '20014', 'Donostia - San Sebastian', 20, 1),
(5031, '20015', 'Donostia - San Sebastian', 20, 1),
(5032, '20016', 'Donostia - San Sebastian', 20, 1),
(5033, '20017', 'Donostia - San Sebastian', 20, 1),
(5034, '20018', 'Donostia - San Sebastian', 20, 1),
(5035, '20100', 'Lezo', 20, 1),
(5036, '20100', 'Lezo', 20, 1),
(5037, '20100', 'Lezo', 20, 1),
(5038, '20110', 'Pasaia', 20, 1),
(5039, '20115', 'Astigarraga', 20, 1),
(5040, '20120', 'ZikuÑaga', 20, 1),
(5041, '20128', 'Pagoaga', 20, 1),
(5042, '20130', 'Urnieta', 20, 1),
(5043, '20130', 'Urnieta', 20, 1),
(5044, '20140', 'Sorabilla', 20, 1),
(5045, '20150', 'Villabona', 20, 1),
(5046, '20150', 'Villabona', 20, 1),
(5047, '20159', 'Zizurkil, Pueblo', 20, 1),
(5048, '20159', 'Zizurkil, Pueblo', 20, 1),
(5049, '20159', 'Zizurkil, Pueblo', 20, 1),
(5050, '20160', 'Zubieta (usurbil)', 20, 1),
(5051, '20160', 'Zubieta (usurbil)', 20, 1),
(5052, '20170', 'Usurbil', 20, 1),
(5053, '20180', 'Ugaldetxo', 20, 1),
(5054, '20200', 'Ugartemendi', 20, 1),
(5055, '20210', 'Zubierreka', 20, 1),
(5056, '20211', 'San Martin', 20, 1),
(5057, '20212', 'Olaberria', 20, 1),
(5058, '20213', 'Urtsuaran', 20, 1),
(5059, '20214', 'Zerain', 20, 1),
(5060, '20214', 'Zerain', 20, 1),
(5061, '20214', 'Zerain', 20, 1),
(5062, '20215', 'Zegama', 20, 1),
(5063, '20216', 'Ormaiztegi', 20, 1),
(5064, '20217', 'Gabiria', 20, 1),
(5065, '20218', 'Salbatore', 20, 1),
(5066, '20220', 'Telleriarte', 20, 1),
(5067, '20230', 'Legazpi', 20, 1),
(5068, '20240', 'Ordizia', 20, 1),
(5069, '20247', 'Zaldibia', 20, 1),
(5070, '20248', 'Gaintza', 20, 1),
(5071, '20248', 'Gaintza', 20, 1),
(5072, '20248', 'Gaintza', 20, 1),
(5073, '20249', 'Itsasondo', 20, 1),
(5074, '20250', 'Legorreta', 20, 1),
(5075, '20259', 'Baliarrain', 20, 1),
(5076, '20260', 'Langaurrealdea', 20, 1),
(5077, '20267', 'Ikaztegieta', 20, 1),
(5078, '20267', 'Ikaztegieta', 20, 1),
(5079, '20268', 'Ugarte', 20, 1),
(5080, '20268', 'Ugarte', 20, 1),
(5081, '20268', 'Ugarte', 20, 1),
(5082, '20269', 'Orendain', 20, 1),
(5083, '20269', 'Orendain', 20, 1),
(5084, '20270', 'Anoeta', 20, 1),
(5085, '20271', 'Irura', 20, 1),
(5086, '20280', 'Zimizarga', 20, 1),
(5087, '20301', 'Irún', 20, 1),
(5088, '20302', 'Irún', 20, 1),
(5089, '20303', 'Irún', 20, 1),
(5090, '20304', 'Irún', 20, 1),
(5091, '20305', 'Irún', 20, 1),
(5092, '20400', 'Usabal', 20, 1),
(5093, '20400', 'Usabal', 20, 1),
(5094, '20490', 'Orexa', 20, 1),
(5095, '20490', 'Orexa', 20, 1),
(5096, '20491', 'Leaburu', 20, 1),
(5097, '20491', 'Leaburu', 20, 1),
(5098, '20491', 'Leaburu', 20, 1),
(5099, '20492', 'Berastegi', 20, 1),
(5100, '20493', 'Elduain', 20, 1),
(5101, '20493', 'Elduain', 20, 1);
INSERT INTO `lnx_poblaciones` (`id`, `cp`, `poblacion`, `idprov`, `idpais`) VALUES
(5102, '20493', 'Elduain', 20, 1),
(5103, '20494', 'Hernialde', 20, 1),
(5104, '20494', 'Hernialde', 20, 1),
(5105, '20494', 'Hernialde', 20, 1),
(5106, '20495', 'Albiztur', 20, 1),
(5107, '20496', 'Goiatz', 20, 1),
(5108, '20500', 'Udala', 20, 1),
(5109, '20509', 'Arrasate/Mondrag', 20, 1),
(5110, '20530', 'Zarimutz', 20, 1),
(5111, '20530', 'Zarimutz', 20, 1),
(5112, '20540', 'Eskoriatza', 20, 1),
(5113, '20550', 'Oro', 20, 1),
(5114, '20560', 'OÑati', 20, 1),
(5115, '20567', 'Araotz', 20, 1),
(5116, '20568', 'Uribarri', 20, 1),
(5117, '20569', 'Zubillaga', 20, 1),
(5118, '20569', 'Zubillaga', 20, 1),
(5119, '20570', 'Elosua', 20, 1),
(5120, '20577', 'Antzuola', 20, 1),
(5121, '20578', 'Angiozar', 20, 1),
(5122, '20580', 'Osintxu', 20, 1),
(5123, '20590', 'Soraluze', 20, 1),
(5124, '20600', 'Maltzaga', 20, 1),
(5125, '20690', 'Elgeta', 20, 1),
(5126, '20700', 'Zumarraga', 20, 1),
(5127, '20700', 'Zumarraga', 20, 1),
(5128, '20709', 'Itsaso-alegia', 20, 1),
(5129, '20720', 'Ormaolamendi', 20, 1),
(5130, '20730', 'Loiola', 20, 1),
(5131, '20737', 'Letea', 20, 1),
(5132, '20739', 'Beizama', 20, 1),
(5133, '20740', 'Zestoa', 20, 1),
(5134, '20749', 'Zubialdea', 20, 1),
(5135, '20749', 'Zubialdea', 20, 1),
(5136, '20750', 'Zumaia', 20, 1),
(5137, '20800', 'Zarautz', 20, 1),
(5138, '20808', 'San Prudentzio', 20, 1),
(5139, '20809', 'Olaskoegia', 20, 1),
(5140, '20810', 'Santio Erreka', 20, 1),
(5141, '20810', 'Santio Erreka', 20, 1),
(5142, '20820', 'Deba', 20, 1),
(5143, '20829', 'Lastur', 20, 1),
(5144, '20830', 'Olatz', 20, 1),
(5145, '20850', 'Plaza', 20, 1),
(5146, '20860', 'Altzola (elgoibar)', 20, 1),
(5147, '20870', 'Sallobente-ermuaran', 20, 1),
(5148, '21000', 'Huelva (ver Callejero)', 21, 1),
(5149, '21001', 'Huelva', 21, 1),
(5150, '21002', 'Huelva', 21, 1),
(5151, '21003', 'Huelva', 21, 1),
(5152, '21004', 'Huelva', 21, 1),
(5153, '21005', 'Huelva', 21, 1),
(5154, '21006', 'Huelva', 21, 1),
(5155, '21007', 'Huelva', 21, 1),
(5156, '21009', 'Ayamonte', 21, 1),
(5157, '21100', 'Punta Umbria', 21, 1),
(5158, '21100', 'Punta Umbria', 21, 1),
(5159, '21110', 'Aljaraque', 21, 1),
(5160, '21110', 'Aljaraque', 21, 1),
(5161, '21120', 'Corrales', 21, 1),
(5162, '21122', 'Bellavista', 21, 1),
(5163, '21130', 'Mazagon', 21, 1),
(5164, '21130', 'Mazagon', 21, 1),
(5165, '21200', 'Aracena', 21, 1),
(5166, '21207', 'Valdezufre', 21, 1),
(5167, '21207', 'Valdezufre', 21, 1),
(5168, '21208', 'Marines, Los', 21, 1),
(5169, '21208', 'Marines, Los', 21, 1),
(5170, '21208', 'Marines, Los', 21, 1),
(5171, '21209', 'Puerto Moral', 21, 1),
(5172, '21209', 'Puerto Moral', 21, 1),
(5173, '21209', 'Puerto Moral', 21, 1),
(5174, '21210', 'Zufre', 21, 1),
(5175, '21220', 'Higuera De La Sierra', 21, 1),
(5176, '21230', 'Cortegana', 21, 1),
(5177, '21239', 'Viejos, Los', 21, 1),
(5178, '21239', 'Viejos, Los', 21, 1),
(5179, '21239', 'Viejos, Los', 21, 1),
(5180, '21240', 'Aroche', 21, 1),
(5181, '21248', 'Aroche', 21, 1),
(5182, '21250', 'Rosal De La Frontera', 21, 1),
(5183, '21260', 'Santa Olalla Del Cala', 21, 1),
(5184, '21270', 'Minas De Cala', 21, 1),
(5185, '21280', 'Arroyomolinos De Leon', 21, 1),
(5186, '21290', 'Romeros, Los', 21, 1),
(5187, '21290', 'Romeros, Los', 21, 1),
(5188, '21291', 'Valdelarco', 21, 1),
(5189, '21291', 'Valdelarco', 21, 1),
(5190, '21291', 'Valdelarco', 21, 1),
(5191, '21291', 'Valdelarco', 21, 1),
(5192, '21292', 'Fuenteheridos', 21, 1),
(5193, '21292', 'Fuenteheridos', 21, 1),
(5194, '21300', 'CalaÑas', 21, 1),
(5195, '21309', 'Sotiel Coronada', 21, 1),
(5196, '21310', 'Zarza, La', 21, 1),
(5197, '21319', 'Minas De Perrunal', 21, 1),
(5198, '21320', 'Cerro De Andevalo, El', 21, 1),
(5199, '21330', 'Valdelamusa', 21, 1),
(5200, '21330', 'Valdelamusa', 21, 1),
(5201, '21330', 'Valdelamusa', 21, 1),
(5202, '21340', 'Alajar', 21, 1),
(5203, '21340', 'Alajar', 21, 1),
(5204, '21342', 'Veredas, Las', 21, 1),
(5205, '21350', 'Almonaster La Real', 21, 1),
(5206, '21359', 'Santa Ana La Real', 21, 1),
(5207, '21359', 'Santa Ana La Real', 21, 1),
(5208, '21360', 'Repilado, El', 21, 1),
(5209, '21380', 'Cumbres Mayores', 21, 1),
(5210, '21386', 'Cumbres De San Bartolome', 21, 1),
(5211, '21387', 'Cumbres De Enmedio', 21, 1),
(5212, '21388', 'Hinojales', 21, 1),
(5213, '21388', 'Hinojales', 21, 1),
(5214, '21390', 'Encinasola', 21, 1),
(5215, '21400', 'Ayamonte', 21, 1),
(5216, '21400', 'Ayamonte', 21, 1),
(5217, '21400', 'Ayamonte', 21, 1),
(5218, '21409', 'Punta Del Moral', 21, 1),
(5219, '21410', 'Isla Cristina', 21, 1),
(5220, '21420', 'Villa Antonia, Poblado', 21, 1),
(5221, '21420', 'Villa Antonia, Poblado', 21, 1),
(5222, '21430', 'Redondela, La', 21, 1),
(5223, '21440', 'Lepe', 21, 1),
(5224, '21440', 'Lepe', 21, 1),
(5225, '21449', 'Islantilla (lepe)', 21, 1),
(5226, '21450', 'Cartaya', 21, 1),
(5227, '21459', 'Rompido, El', 21, 1),
(5228, '21459', 'Rompido, El', 21, 1),
(5229, '21460', 'Isla Cristina', 21, 1),
(5230, '21500', 'Gibraleon', 21, 1),
(5231, '21510', 'San Bartolome De La Torre', 21, 1),
(5232, '21520', 'Alosno', 21, 1),
(5233, '21520', 'Alosno', 21, 1),
(5234, '21530', 'Minas De Tharsis', 21, 1),
(5235, '21540', 'Villanueva De Los Castillejos', 21, 1),
(5236, '21540', 'Villanueva De Los Castillejos', 21, 1),
(5237, '21550', 'Puebla De Guzman', 21, 1),
(5238, '21559', 'Minas De Herrerias', 21, 1),
(5239, '21560', 'Paymogo', 21, 1),
(5240, '21570', 'Santa Barbara De Casa', 21, 1),
(5241, '21580', 'Montes De San Benito', 21, 1),
(5242, '21580', 'Montes De San Benito', 21, 1),
(5243, '21580', 'Montes De San Benito', 21, 1),
(5244, '21590', 'Villablanca', 21, 1),
(5245, '21591', 'San Silvestre De Guzman', 21, 1),
(5246, '21592', 'Villanueva De Las Cruces', 21, 1),
(5247, '21593', 'Almendro, El', 21, 1),
(5248, '21594', 'Puerto De La Laja', 21, 1),
(5249, '21595', 'Sanlucar De Guadiana', 21, 1),
(5250, '21600', 'Valverde Del Camino', 21, 1),
(5251, '21609', 'Navahermosa', 21, 1),
(5252, '21610', 'San Juan Del Puerto', 21, 1),
(5253, '21620', 'Trigueros', 21, 1),
(5254, '21620', 'Trigueros', 21, 1),
(5255, '21630', 'Beas', 21, 1),
(5256, '21639', 'Candon', 21, 1),
(5257, '21639', 'Candon', 21, 1),
(5258, '21640', 'Zalamea La Real', 21, 1),
(5259, '21646', 'Almonaster la Real', 21, 1),
(5260, '21647', 'Pozuelo, El', 21, 1),
(5261, '21647', 'Pozuelo, El', 21, 1),
(5262, '21649', 'Villar, El', 21, 1),
(5263, '21660', 'Minas De Riotinto', 21, 1),
(5264, '21667', 'Minas de Riotinto', 21, 1),
(5265, '21668', 'Granada De Rio-tinto, La', 21, 1),
(5266, '21668', 'Granada De Rio-tinto, La', 21, 1),
(5267, '21668', 'Granada De Rio-tinto, La', 21, 1),
(5268, '21669', 'Dehesa, Aldea De La', 21, 1),
(5269, '21670', 'Nerva', 21, 1),
(5270, '21700', 'Palma Del Condado, La', 21, 1),
(5271, '21710', 'Bollullos Par Del Condado', 21, 1),
(5272, '21710', 'Bollullos Par Del Condado', 21, 1),
(5273, '21720', 'Rociana Del Condado', 21, 1),
(5274, '21730', 'Almonte', 21, 1),
(5275, '21739', 'Almonte', 21, 1),
(5276, '21740', 'Hinojos', 21, 1),
(5277, '21750', 'Rocio, El', 21, 1),
(5278, '21760', 'Torre La Higuera', 21, 1),
(5279, '21800', 'Moguer', 21, 1),
(5280, '21800', 'Moguer', 21, 1),
(5281, '21810', 'Palos De La Frontera', 21, 1),
(5282, '21819', 'Rabida, La', 21, 1),
(5283, '21820', 'Lucena Del Puerto', 21, 1),
(5284, '21830', 'Bonares', 21, 1),
(5285, '21840', 'Niebla', 21, 1),
(5286, '21850', 'Villarrasa', 21, 1),
(5287, '21860', 'Villalba Del Alcor', 21, 1),
(5288, '21870', 'Escacena Del Campo', 21, 1),
(5289, '21880', 'Paterna Del Campo', 21, 1),
(5290, '21888', 'Paterna del Campo', 21, 1),
(5291, '21890', 'Manzanilla', 21, 1),
(5292, '21891', 'Chucena', 21, 1),
(5293, '22000', 'Huesca (ver Callejero)', 22, 1),
(5294, '22001', 'Huesca', 22, 1),
(5295, '22002', 'Huesca', 22, 1),
(5296, '22003', 'Huesca', 22, 1),
(5297, '22004', 'Huesca', 22, 1),
(5298, '22005', 'Huesca', 22, 1),
(5299, '22006', 'Huesca', 22, 1),
(5300, '22080', 'Huesca', 22, 1),
(5301, '22090', 'Huesca', 22, 1),
(5302, '22092', 'Huesca', 22, 1),
(5303, '22094', 'Huesca', 22, 1),
(5304, '22097', 'Huesca', 22, 1),
(5305, '22100', 'Sangarren', 22, 1),
(5306, '22110', 'Sesa', 22, 1),
(5307, '22110', 'Sesa', 22, 1),
(5308, '22111', 'Monflorite', 22, 1),
(5309, '22112', 'Albero Alto', 22, 1),
(5310, '22113', 'Novales', 22, 1),
(5311, '22120', 'Sietamo', 22, 1),
(5312, '22121', 'Castejon De Arbanies', 22, 1),
(5313, '22122', 'Velillas', 22, 1),
(5314, '22122', 'Velillas', 22, 1),
(5315, '22122', 'Velillas', 22, 1),
(5316, '22123', 'Angues', 22, 1),
(5317, '22124', 'Ponzano', 22, 1),
(5318, '22125', 'Laluenga', 22, 1),
(5319, '22126', 'Laperdiguera', 22, 1),
(5320, '22130', 'Peralta de Alcofea', 22, 1),
(5321, '22131', 'Lagunarrota', 22, 1),
(5322, '22131', 'Lagunarrota', 22, 1),
(5323, '22132', 'Torres De Alcanadre', 22, 1),
(5324, '22132', 'Torres De Alcanadre', 22, 1),
(5325, '22132', 'Torres De Alcanadre', 22, 1),
(5326, '22133', 'Blecua', 22, 1),
(5327, '22133', 'Blecua', 22, 1),
(5328, '22133', 'Blecua', 22, 1),
(5329, '22134', 'Torres De Montes', 22, 1),
(5330, '22135', 'Pueyo De FaÑanas', 22, 1),
(5331, '22135', 'Pueyo De FaÑanas', 22, 1),
(5332, '22140', 'Bandalies', 22, 1),
(5333, '22141', 'Yaso', 22, 1),
(5334, '22141', 'Yaso', 22, 1),
(5335, '22141', 'Yaso', 22, 1),
(5336, '22142', 'Sieso De Hueca', 22, 1),
(5337, '22143', 'Abiego', 22, 1),
(5338, '22144', 'San Saturnino', 22, 1),
(5339, '22145', 'San Pelegrin', 22, 1),
(5340, '22146', 'Buera', 22, 1),
(5341, '22147', 'Alberuela De Laliena', 22, 1),
(5342, '22147', 'Alberuela De Laliena', 22, 1),
(5343, '22148', 'Lecina', 22, 1),
(5344, '22148', 'Lecina', 22, 1),
(5345, '22149', 'Sarsa De Surta', 22, 1),
(5346, '22149', 'Sarsa De Surta', 22, 1),
(5347, '22150', 'Bentue De Rasal', 22, 1),
(5348, '22160', 'Sotonera, La', 22, 1),
(5349, '22161', 'Puibolea', 22, 1),
(5350, '22162', 'Anies', 22, 1),
(5351, '22190', 'Vicien', 22, 1),
(5352, '22191', 'Quicena', 22, 1),
(5353, '22192', 'Vadiello', 22, 1),
(5354, '22192', 'Vadiello', 22, 1),
(5355, '22193', 'Yequeda', 22, 1),
(5356, '22193', 'Yequeda', 22, 1),
(5357, '22194', 'Torres Secas', 22, 1),
(5358, '22194', 'Torres Secas', 22, 1),
(5359, '22194', 'Torres Secas', 22, 1),
(5360, '22194', 'Torres Secas', 22, 1),
(5361, '22195', 'Fornillos De Apies', 22, 1),
(5362, '22196', 'Tabernas De Isuela', 22, 1),
(5363, '22196', 'Tabernas De Isuela', 22, 1),
(5364, '22197', 'Cuarte', 22, 1),
(5365, '22200', 'SariÑena', 22, 1),
(5366, '22210', 'Venta De Ballerias', 22, 1),
(5367, '22211', 'Huerto', 22, 1),
(5368, '22212', 'Sodeto', 22, 1),
(5369, '22212', 'Sodeto', 22, 1),
(5370, '22212', 'Sodeto', 22, 1),
(5371, '22213', 'San Juan Del Flumen', 22, 1),
(5372, '22213', 'San Juan Del Flumen', 22, 1),
(5373, '22214', 'Lalueza', 22, 1),
(5374, '22215', 'Tormillo, El', 22, 1),
(5375, '22215', 'Tormillo, El', 22, 1),
(5376, '22215', 'Tormillo, El', 22, 1),
(5377, '22216', 'PoleÑino', 22, 1),
(5378, '22216', 'PoleÑino', 22, 1),
(5379, '22220', 'Albalatillo', 22, 1),
(5380, '22221', 'Pallaruelo De Monegros', 22, 1),
(5381, '22222', 'Castejon De Monegros', 22, 1),
(5382, '22223', 'Valfarta', 22, 1),
(5384, '22230', 'Sena', 22, 1),
(5385, '22231', 'Villanueva De Sigena', 22, 1),
(5386, '22232', 'OntiÑena', 22, 1),
(5387, '22233', 'Chalamera', 22, 1),
(5388, '22234', 'Ballobar', 22, 1),
(5389, '22240', 'Tardienta', 22, 1),
(5390, '22250', 'Lanaja', 22, 1),
(5391, '22251', 'Alcubierre', 22, 1),
(5392, '22252', 'Robres', 22, 1),
(5393, '22253', 'Senes De Alcubierre', 22, 1),
(5394, '22254', 'Torralba De Aragon', 22, 1),
(5395, '22255', 'Valfonda De Santa Ana', 22, 1),
(5396, '22255', 'Valfonda De Santa Ana', 22, 1),
(5397, '22255', 'Valfonda De Santa Ana', 22, 1),
(5398, '22255', 'Valfonda De Santa Ana', 22, 1),
(5399, '22255', 'Valfonda De Santa Ana', 22, 1),
(5400, '22260', 'GraÑen', 22, 1),
(5401, '22268', 'Tramaced', 22, 1),
(5402, '22268', 'Tramaced', 22, 1),
(5403, '22268', 'Tramaced', 22, 1),
(5404, '22268', 'Tramaced', 22, 1),
(5405, '22269', 'Montesusin', 22, 1),
(5406, '22269', 'Montesusin', 22, 1),
(5407, '22270', 'Almudevar', 22, 1),
(5408, '22280', 'Gurrea De Gallego', 22, 1),
(5409, '22281', 'Temple, El', 22, 1),
(5410, '22282', 'Alcala De Gurrea', 22, 1),
(5411, '22283', 'Valsalada', 22, 1),
(5412, '22283', 'Valsalada', 22, 1),
(5413, '22300', 'Barbastro', 22, 1),
(5414, '22310', 'Castejon Del Puente', 22, 1),
(5415, '22311', 'Pueyo, El, Monasterio', 22, 1),
(5416, '22311', 'Pueyo, El, Monasterio', 22, 1),
(5417, '22311', 'Pueyo, El, Monasterio', 22, 1),
(5418, '22312', 'Salinas De Hoz', 22, 1),
(5419, '22312', 'Salinas De Hoz', 22, 1),
(5420, '22313', 'Santa Maria De Dulcis', 22, 1),
(5421, '22313', 'Santa Maria De Dulcis', 22, 1),
(5422, '22313', 'Santa Maria De Dulcis', 22, 1),
(5423, '22314', 'Salas Bajas', 22, 1),
(5424, '22314', 'Salas Bajas', 22, 1),
(5425, '22315', 'Montesa', 22, 1),
(5426, '22315', 'Montesa', 22, 1),
(5427, '22320', 'Suelves', 22, 1),
(5428, '22320', 'Suelves', 22, 1),
(5429, '22330', 'Sarratillo', 22, 1),
(5430, '22336', 'Tierrantona', 22, 1),
(5431, '22336', 'Tierrantona', 22, 1),
(5432, '22337', 'Solipueyo', 22, 1),
(5433, '22337', 'Solipueyo', 22, 1),
(5434, '22337', 'Solipueyo', 22, 1),
(5435, '22338', 'Torrelisa', 22, 1),
(5436, '22339', 'Villarcillo Bogetar', 22, 1),
(5437, '22340', 'BoltaÑa', 22, 1),
(5438, '22347', 'Morillo De San Pietro', 22, 1),
(5439, '22348', 'Valle, La', 22, 1),
(5440, '22349', 'Sieste', 22, 1),
(5441, '22349', 'Sieste', 22, 1),
(5442, '22349', 'Sieste', 22, 1),
(5443, '22350', 'Bielsa', 22, 1),
(5444, '22351', 'Pineta', 22, 1),
(5445, '22360', 'San Vicente (labuerda)', 22, 1),
(5446, '22361', 'Socastiello', 22, 1),
(5447, '22362', 'Puertolas', 22, 1),
(5448, '22363', 'Santa Maria (puertolas)', 22, 1),
(5449, '22364', 'Tella', 22, 1),
(5450, '22365', 'Parzan', 22, 1),
(5451, '22365', 'Parzan', 22, 1),
(5452, '22366', 'Sin', 22, 1),
(5453, '22366', 'Sin', 22, 1),
(5454, '22367', 'San Juan De Plan', 22, 1),
(5455, '22367', 'San Juan De Plan', 22, 1),
(5456, '22367', 'San Juan De Plan', 22, 1),
(5457, '22370', 'Oto', 22, 1),
(5458, '22371', 'San Felices De Ara', 22, 1),
(5459, '22372', 'Santa Olaria De Ara', 22, 1),
(5460, '22372', 'Santa Olaria De Ara', 22, 1),
(5461, '22373', 'San Juste', 22, 1),
(5462, '22373', 'San Juste', 22, 1),
(5463, '22374', 'Sarvise', 22, 1),
(5464, '22375', 'Yeba', 22, 1),
(5465, '22375', 'Yeba', 22, 1),
(5466, '22376', 'Torla', 22, 1),
(5467, '22377', 'Fragen', 22, 1),
(5468, '22378', 'Viu De Linas', 22, 1),
(5469, '22390', 'Presa Del Cinca', 22, 1),
(5470, '22391', 'Torreciudad, Santuario', 22, 1),
(5471, '22392', 'Solanilla', 22, 1),
(5472, '22392', 'Solanilla', 22, 1),
(5473, '22393', 'Mipanas', 22, 1),
(5474, '22393', 'Mipanas', 22, 1),
(5475, '22394', 'Samitier', 22, 1),
(5476, '22394', 'Samitier', 22, 1),
(5477, '22395', 'Morillo De Tou', 22, 1),
(5478, '22400', 'Monzon', 21, 1),
(5479, '22400', 'Monzon', 22, 1),
(5480, '22410', 'Alcolea De Cinca', 22, 1),
(5481, '22411', 'Santalecina', 22, 1),
(5482, '22412', 'Estiche De Cinca', 22, 1),
(5483, '22413', 'San Miguel De Cinca', 22, 1),
(5484, '22414', 'Conchel', 22, 1),
(5485, '22415', 'Terreu', 22, 1),
(5486, '22415', 'Terreu', 22, 1),
(5487, '22416', 'Pueyo De Santa Cruz', 22, 1),
(5488, '22416', 'Pueyo De Santa Cruz', 22, 1),
(5489, '22417', 'Cofita', 22, 1),
(5490, '22417', 'Cofita', 22, 1),
(5491, '22420', 'Almunia De San Juan', 22, 1),
(5492, '22421', 'Azanuy', 22, 1),
(5493, '22422', 'Fonz', 22, 1),
(5494, '22423', 'Estadilla', 22, 1),
(5495, '22424', 'Estada', 22, 1),
(5496, '22430', 'Graus', 22, 1),
(5497, '22435', 'Puebla De Castro, La', 22, 1),
(5498, '22436', 'Ventas De Santa Lucia', 22, 1),
(5499, '22436', 'Ventas De Santa Lucia', 22, 1),
(5500, '22437', 'Puebla De Fantova, La', 22, 1),
(5501, '22438', 'Troncedo', 22, 1),
(5502, '22438', 'Troncedo', 22, 1),
(5503, '22439', 'Ubiergo', 22, 1),
(5504, '22439', 'Ubiergo', 22, 1),
(5505, '22440', 'Benasque', 22, 1),
(5506, '22449', 'Cerler', 22, 1),
(5507, '22450', 'Viu', 22, 1),
(5508, '22450', 'Viu', 22, 1),
(5509, '22451', 'Vilas Del Turbon, Las, Balneario', 22, 1),
(5510, '22451', 'Vilas Del Turbon, Las, Balneario', 22, 1),
(5511, '22451', 'Vilas Del Turbon, Las, Balneario', 22, 1),
(5512, '22451', 'Vilas Del Turbon, Las, Balneario', 22, 1),
(5513, '22451', 'Vilas Del Turbon, Las, Balneario', 22, 1),
(5514, '22452', 'Toledo La Nata', 22, 1),
(5515, '22452', 'Toledo La Nata', 22, 1),
(5516, '22460', 'Perarrua', 22, 1),
(5517, '22460', 'Perarrua', 22, 1),
(5518, '22461', 'Santa Liestra Y San Quilez', 22, 1),
(5519, '22461', 'Santa Liestra Y San Quilez', 22, 1),
(5520, '22461', 'Santa Liestra Y San Quilez', 22, 1),
(5521, '22462', 'Morillo De Liena', 22, 1),
(5522, '22462', 'Morillo De Liena', 22, 1),
(5523, '22463', 'Seira', 22, 1),
(5524, '22464', 'Barbaruens', 22, 1),
(5525, '22465', 'Run, El', 22, 1),
(5526, '22465', 'Run, El', 22, 1),
(5527, '22466', 'Urmella', 22, 1),
(5528, '22466', 'Urmella', 22, 1),
(5529, '22467', 'Villanova', 22, 1),
(5530, '22467', 'Villanova', 22, 1),
(5531, '22467', 'Villanova', 22, 1),
(5532, '22467', 'Villanova', 22, 1),
(5533, '22468', 'Sahun', 22, 1),
(5534, '22469', 'Eriste', 22, 1),
(5535, '22469', 'Eriste', 22, 1),
(5536, '22470', 'Veri', 22, 1),
(5537, '22471', 'Villarue', 22, 1),
(5538, '22472', 'Espes Alto', 22, 1),
(5539, '22473', 'Villaplana', 22, 1),
(5540, '22473', 'Villaplana', 22, 1),
(5541, '22474', 'Ribera (montanuy)', 22, 1),
(5542, '22474', 'Ribera (montanuy)', 22, 1),
(5543, '22480', 'Torrelabad', 22, 1),
(5544, '22480', 'Torrelabad', 22, 1),
(5545, '22481', 'Ribera, La (guel)', 22, 1),
(5546, '22482', 'San Esteban Del Mall', 22, 1),
(5547, '22483', 'Villacarli', 22, 1),
(5548, '22483', 'Villacarli', 22, 1),
(5549, '22483', 'Villacarli', 22, 1),
(5550, '22484', 'Visalibons', 22, 1),
(5551, '22484', 'Visalibons', 22, 1),
(5552, '22485', 'Obarra, Monasterio', 22, 1),
(5553, '22486', 'Torre De Buira', 22, 1),
(5554, '22486', 'Torre De Buira', 22, 1),
(5555, '22487', 'ViÑal', 22, 1),
(5556, '22500', 'Binefar', 22, 1),
(5557, '22510', 'Binaced', 22, 1),
(5558, '22511', 'Valcarca', 22, 1),
(5559, '22512', 'San Esteban De Litera', 22, 1),
(5560, '22513', 'Peralta De La Sal', 22, 1),
(5561, '22514', 'Gabasa', 22, 1),
(5562, '22520', 'Litera (fraga), Partida', 22, 1),
(5563, '22528', 'Velilla De Cinca', 22, 1),
(5564, '22529', 'Miralsot', 22, 1),
(5565, '22530', 'Zaidin', 22, 1),
(5566, '22531', 'Almudafar', 22, 1),
(5567, '22532', 'Osso De Cinca', 22, 1),
(5568, '22533', 'Valonga', 22, 1),
(5569, '22534', 'Albalate De Cinca', 22, 1),
(5570, '22535', 'Esplus', 22, 1),
(5571, '22536', 'PeÑa Roa', 22, 1),
(5572, '22540', 'Altorricon', 22, 1),
(5573, '22549', 'Vencillon', 22, 1),
(5574, '22549', 'Vencillon', 22, 1),
(5575, '22549', 'Vencillon', 22, 1),
(5576, '22550', 'Tamarite De Litera', 22, 1),
(5577, '22558', 'Albelda', 22, 1),
(5578, '22559', 'Algayon', 22, 1),
(5579, '22560', 'Alcampell', 22, 1),
(5580, '22569', 'Zurita', 22, 1),
(5581, '22569', 'Zurita', 22, 1),
(5582, '22570', 'Santa Ana', 22, 1),
(5583, '22570', 'Santa Ana', 22, 1),
(5584, '22571', 'Baldellou', 22, 1),
(5585, '22572', 'Saganta', 22, 1),
(5586, '22572', 'Saganta', 22, 1),
(5587, '22580', 'Benabarre', 22, 1),
(5588, '22583', 'Torre De Tamurcia, La', 22, 1),
(5589, '22583', 'Torre De Tamurcia, La', 22, 1),
(5590, '22584', 'Torogo', 22, 1),
(5591, '22584', 'Torogo', 22, 1),
(5592, '22585', 'Viacamp', 22, 1),
(5593, '22585', 'Viacamp', 22, 1),
(5594, '22585', 'Viacamp', 22, 1),
(5595, '22585', 'Viacamp', 22, 1),
(5596, '22585', 'Viacamp', 22, 1),
(5597, '22585', 'Viacamp', 22, 1),
(5598, '22586', 'Lascuarre', 22, 1),
(5599, '22587', 'Pociello', 22, 1),
(5600, '22587', 'Pociello', 22, 1),
(5601, '22587', 'Pociello', 22, 1),
(5602, '22588', 'Torres Del Obispo', 22, 1),
(5603, '22589', 'Purroy De La Solana', 22, 1),
(5604, '22589', 'Purroy De La Solana', 22, 1),
(5605, '22590', 'Torrente De Cinca', 22, 1),
(5606, '22591', 'Candasnos', 22, 1),
(5607, '22592', 'PeÑalba', 22, 1),
(5608, '22600', 'SabiÑanigo', 22, 1),
(5609, '22609', 'SabiÑanigo, Pueblo', 22, 1),
(5610, '22610', 'Yebra De Basa', 22, 1),
(5611, '22610', 'Yebra De Basa', 22, 1),
(5612, '22611', 'Sobas', 22, 1),
(5613, '22612', 'Larres', 22, 1),
(5614, '22613', 'Satue', 22, 1),
(5615, '22613', 'Satue', 22, 1),
(5616, '22620', 'Orna De Gallego', 22, 1),
(5617, '22620', 'Orna De Gallego', 22, 1),
(5618, '22621', 'Rapun', 22, 1),
(5619, '22621', 'Rapun', 22, 1),
(5620, '22622', 'Yespola', 22, 1),
(5621, '22622', 'Yespola', 22, 1),
(5622, '22623', 'Molino De Villobas', 22, 1),
(5623, '22624', 'Latre', 22, 1),
(5624, '22625', 'Serue', 22, 1),
(5625, '22630', 'Biescas', 22, 1),
(5626, '22636', 'Oros Bajo', 22, 1),
(5627, '22636', 'Oros Bajo', 22, 1),
(5628, '22637', 'Oros Alto', 22, 1),
(5629, '22638', 'Yosa De Sobremonte', 22, 1),
(5630, '22639', 'Yesero', 22, 1),
(5631, '22639', 'Yesero', 22, 1),
(5632, '22640', 'Sallent De Gallego', 22, 1),
(5633, '22650', 'Panticosa, Balneario', 22, 1),
(5634, '22660', 'Escarrilla', 22, 1),
(5635, '22661', 'Panticosa, Pueblo', 22, 1),
(5636, '22662', 'Pueyo De Jaca, El', 22, 1),
(5637, '22662', 'Pueyo De Jaca, El', 22, 1),
(5638, '22663', 'Tramacastilla De Tena', 22, 1),
(5639, '22664', 'Sandinies', 22, 1),
(5640, '22665', 'Saques', 22, 1),
(5641, '22666', 'Sorripas', 22, 1),
(5642, '22700', 'Jaca', 22, 1),
(5643, '22710', 'Villanovilla', 22, 1),
(5644, '22710', 'Villanovilla', 22, 1),
(5645, '22711', 'San Juan De La PeÑa', 22, 1),
(5646, '22712', 'Ulle', 22, 1),
(5647, '22713', 'Lastiesas Bajas', 22, 1),
(5648, '22714', 'Sasal', 22, 1),
(5649, '22714', 'Sasal', 22, 1),
(5650, '22715', 'Ascara', 22, 1),
(5651, '22720', 'Santa Lucia', 22, 1),
(5652, '22725', 'Ans', 22, 1),
(5653, '22728', 'Anso', 22, 1),
(5654, '22729', 'Fago', 22, 1),
(5655, '22730', 'Aragues Del Puerto', 22, 1),
(5656, '22731', 'Jasa', 22, 1),
(5657, '22732', 'Urdues', 22, 1),
(5658, '22740', 'Embun', 22, 1),
(5659, '22750', 'Javierregay', 22, 1),
(5660, '22751', 'Santa Engracia', 22, 1),
(5661, '22751', 'Santa Engracia', 22, 1),
(5662, '22752', 'Somanes', 22, 1),
(5663, '22753', 'Puente La Reina', 22, 1),
(5664, '22760', 'Bailo', 22, 1),
(5665, '22761', 'Larues', 22, 1),
(5666, '22770', 'Canal De Berdun', 22, 1),
(5667, '22771', 'Villarreal De La Canal', 22, 1),
(5668, '22772', 'Martes', 22, 1),
(5669, '22773', 'Binies', 22, 1),
(5670, '22790', 'Siresa', 22, 1),
(5671, '22791', 'Santa Cilia', 22, 1),
(5672, '22791', 'Santa Cilia', 22, 1),
(5673, '22792', 'Santa Cruz De La Seros', 22, 1),
(5674, '22800', 'Ayerbe', 22, 1),
(5675, '22807', 'Piedramorrera', 22, 1),
(5676, '22807', 'Piedramorrera', 22, 1),
(5677, '22808', 'Murillo De Gallego', 22, 1),
(5678, '22808', 'Murillo De Gallego', 22, 1),
(5679, '22809', 'Sarsamarcuello', 22, 1),
(5680, '22809', 'Sarsamarcuello', 22, 1),
(5681, '22809', 'Sarsamarcuello', 22, 1),
(5682, '22810', 'Quinzano', 22, 1),
(5683, '22810', 'Quinzano', 22, 1),
(5684, '22811', 'Ortilla', 22, 1),
(5685, '22820', 'Yeste', 22, 1),
(5686, '22821', 'Rasal', 22, 1),
(5687, '22822', 'Villalangua', 22, 1),
(5688, '22830', 'Osia', 22, 1),
(5689, '22830', 'Osia', 22, 1),
(5690, '22830', 'Osia', 22, 1),
(5691, '22830', 'Osia', 22, 1),
(5692, '22850', 'Jaca', 22, 1),
(5694, '22860', 'Sinues', 22, 1),
(5695, '22860', 'Sinues', 22, 1),
(5696, '22860', 'Sinues', 22, 1),
(5697, '22870', 'Villanua', 22, 1),
(5698, '22880', 'Canfranc, Estacion', 22, 1),
(5699, '22888', 'Canfranc, Pueblo', 22, 1),
(5700, '22889', 'Candanchu', 22, 1),
(5701, '22889', 'Candanchu', 22, 1),
(5702, '23001', 'Jaén', 23, 1),
(5703, '23002', 'Jaén', 23, 1),
(5704, '23003', 'Jaén', 23, 1),
(5705, '23004', 'Jaén', 23, 1),
(5706, '23005', 'Jaén', 23, 1),
(5707, '23006', 'Jaén', 23, 1),
(5708, '23007', 'Jaén', 23, 1),
(5709, '23008', 'Jaén', 23, 1),
(5710, '23009', 'Jaén', 23, 1),
(5711, '23100', 'Mancha Real', 23, 1),
(5712, '23110', 'Pegalajar', 23, 1),
(5713, '23120', 'Cambil', 23, 1),
(5714, '23130', 'Campillo De Arenas', 23, 1),
(5715, '23140', 'Noalejo', 23, 1),
(5716, '23150', 'ValdepeÑas De Jaen', 23, 1),
(5717, '23159', 'Chircales', 23, 1),
(5718, '23160', 'Jaén', 23, 1),
(5719, '23170', 'Puente Nuevo', 23, 1),
(5720, '23180', 'Fuerte Del Rey', 23, 1),
(5721, '23190', 'Cerradura, La', 23, 1),
(5722, '23191', 'Carchel', 23, 1),
(5723, '23192', 'Carchelejo', 23, 1),
(5724, '23193', 'Arbuniel', 23, 1),
(5725, '23194', 'Jabalcuz', 23, 1),
(5726, '23196', 'Puente De La Sierra', 23, 1),
(5727, '23196', 'Puente De La Sierra', 23, 1),
(5728, '23200', 'Carolina, La', 23, 1),
(5729, '23210', 'Guarroman', 23, 1),
(5730, '23211', 'Carboneros', 23, 1),
(5731, '23212', 'Navas De Tolosa', 23, 1),
(5732, '23213', 'Santa Elena', 23, 1),
(5733, '23214', 'Isabela, La', 23, 1),
(5734, '23214', 'Isabela, La', 23, 1),
(5735, '23215', 'Aldeaquemada', 23, 1),
(5736, '23220', 'Vilches', 23, 1),
(5737, '23230', 'Arquillos', 23, 1),
(5738, '23239', 'Porrosillo, El', 23, 1),
(5739, '23240', 'Navas De San Juan', 23, 1),
(5740, '23250', 'Santisteban Del Puerto', 23, 1),
(5741, '23260', 'Castellar', 23, 1),
(5742, '23264', 'Chiclana De Segura', 23, 1),
(5743, '23265', 'Venta De Los Santos', 23, 1),
(5744, '23266', 'Montizon', 23, 1),
(5745, '23267', 'Aldeahermosa De Montizon', 23, 1),
(5746, '23268', 'Mochuelos, Los', 23, 1),
(5747, '23269', 'Porrosa, La', 23, 1),
(5748, '23270', 'Sorihuela De Guadalimar', 23, 1),
(5749, '23280', 'Beas De Segura', 23, 1),
(5750, '23289', 'Prados De Armijo', 23, 1),
(5751, '23289', 'Prados De Armijo', 23, 1),
(5752, '23290', 'Teatinos, Los', 23, 1),
(5753, '23291', 'Pontones', 23, 1),
(5754, '23292', 'Hornos De Segura', 23, 1),
(5755, '23293', 'Robledo Cortijos Nuevos', 23, 1),
(5756, '23293', 'Robledo Cortijos Nuevos', 23, 1),
(5757, '23294', 'Tobos', 23, 1),
(5758, '23294', 'Tobos', 23, 1),
(5759, '23295', 'Rio Madera', 23, 1),
(5760, '23296', 'Vites', 23, 1),
(5761, '23297', 'Toba, La', 23, 1),
(5762, '23298', 'Peguera Del MadroÑo', 23, 1),
(5763, '23300', 'Villacarrillo', 23, 1),
(5764, '23310', 'Mogon', 23, 1),
(5765, '23311', 'Santo Tome', 23, 1),
(5766, '23312', 'Caleruela', 23, 1),
(5767, '23314', 'Solana De Torralba', 23, 1),
(5768, '23315', 'Puente Del Condado', 23, 1),
(5769, '23320', 'Torreperogil', 23, 1),
(5770, '23330', 'Villanueva Del Arzobispo', 23, 1),
(5771, '23337', 'Hornos', 23, 1),
(5772, '23338', 'Iznatoraf', 23, 1),
(5773, '23339', 'Gutar', 23, 1),
(5774, '23340', 'Arroyo Del Ojanco', 23, 1),
(5775, '23340', 'Arroyo Del Ojanco', 23, 1),
(5776, '23350', 'Puente Genave', 23, 1),
(5777, '23359', 'PeÑolite', 23, 1),
(5778, '23360', 'Puerta De Segura, La', 23, 1),
(5779, '23369', 'Yeguerizos, Los', 23, 1),
(5780, '23370', 'Orcera', 23, 1),
(5781, '23379', 'Segura De La Sierra', 23, 1),
(5782, '23380', 'Siles', 23, 1),
(5783, '23390', 'Benatae', 23, 1),
(5784, '23391', 'Torres De Albanchez', 23, 1),
(5785, '23392', 'Genave', 23, 1),
(5786, '23393', 'Villarrodrigo', 23, 1),
(5787, '23400', 'Ubeda', 23, 1),
(5788, '23410', 'Sabiote', 23, 1),
(5789, '23411', 'Yedra', 23, 1),
(5790, '23412', 'Marmol, El', 23, 1),
(5791, '23413', 'Santa Eulalia', 23, 1),
(5792, '23420', 'Canena', 23, 1),
(5793, '23430', 'Rus', 23, 1),
(5794, '23440', 'Baeza', 23, 1),
(5795, '23450', 'Ibros', 23, 1),
(5796, '23460', 'Peal De Becerro', 23, 1),
(5797, '23468', 'Hornos De Peal', 23, 1),
(5798, '23469', 'Valdecazorla', 23, 1),
(5799, '23469', 'Valdecazorla', 23, 1),
(5800, '23470', 'Cazorla', 23, 1),
(5801, '23470', 'Cazorla', 23, 1),
(5802, '23476', 'Iruela, La', 23, 1),
(5803, '23477', 'Chilluevar La Vieja', 23, 1),
(5804, '23478', 'Loma De Maria Angela', 23, 1),
(5805, '23479', 'Vadillo Castril', 23, 1),
(5806, '23479', 'Vadillo Castril', 23, 1),
(5807, '23480', 'Quesada', 23, 1),
(5808, '23485', 'Pozo Alcon', 23, 1),
(5809, '23485', 'Pozo Alcon', 23, 1),
(5810, '23485', 'Pozo Alcon', 23, 1),
(5811, '23486', 'Hinojares', 23, 1),
(5812, '23486', 'Hinojares', 23, 1),
(5813, '23487', 'Huesa', 23, 1),
(5814, '23488', 'Rosales, Los', 23, 1),
(5815, '23488', 'Rosales, Los', 23, 1),
(5816, '23489', 'Tiscar Don Pedro', 23, 1),
(5817, '23490', 'Linares-baeza, Estacion', 23, 1),
(5818, '23490', 'Linares-baeza, Estacion', 23, 1),
(5819, '23499', 'Mira El Rio', 23, 1),
(5820, '23500', 'Jodar', 23, 1),
(5821, '23509', 'Donadio, El', 23, 1),
(5822, '23510', 'Torreblascopedro', 23, 1),
(5823, '23519', 'Guadalimar Del Caudillo', 23, 1),
(5824, '23519', 'Guadalimar Del Caudillo', 23, 1),
(5825, '23520', 'Begijar', 23, 1),
(5826, '23528', 'Lupion', 23, 1),
(5827, '23529', 'Vados De Torralba', 23, 1),
(5828, '23529', 'Vados De Torralba', 23, 1),
(5829, '23529', 'Vados De Torralba', 23, 1),
(5830, '23529', 'Vados De Torralba', 23, 1),
(5831, '23530', 'Jimena', 23, 1),
(5832, '23537', 'Bedmar', 23, 1),
(5833, '23538', 'Albanchez De Magina', 23, 1),
(5834, '23539', 'Garciez', 23, 1),
(5835, '23539', 'Garciez', 23, 1),
(5836, '23540', 'Torres', 23, 1),
(5837, '23550', 'Cabra De Santo Cristo', 23, 1),
(5838, '23560', 'Huelma', 23, 1),
(5839, '23568', 'Belmez De La Moraleda', 23, 1),
(5840, '23569', 'Solera', 23, 1),
(5841, '23569', 'Solera', 23, 1),
(5842, '23590', 'Cabra De Santo Cristo, Estacion', 23, 1),
(5843, '23591', 'Larva', 23, 1),
(5844, '23591', 'Larva', 23, 1),
(5845, '23600', 'Martos', 23, 1),
(5846, '23610', 'Fuensanta De Martos', 23, 1),
(5847, '23611', 'Higuera De Calatrava', 23, 1),
(5848, '23612', 'Santiago De Calatrava', 23, 1),
(5849, '23614', 'Casillas De Martos, Las', 23, 1),
(5850, '23615', 'Monte Lope Alvarez', 23, 1),
(5851, '23616', 'Veletas', 23, 1),
(5852, '23620', 'Mengibar', 23, 1),
(5853, '23628', 'Poblado I.a.r.a.', 23, 1),
(5854, '23628', 'Poblado I.a.r.a.', 23, 1),
(5855, '23629', 'Jabalquinto', 23, 1),
(5856, '23630', 'Villargordo', 23, 1),
(5857, '23638', 'Torrequebradilla', 23, 1),
(5858, '23639', 'Villargordo, Estacion', 23, 1),
(5859, '23640', 'Torre Del Campo', 23, 1),
(5860, '23650', 'Torredonjimeno', 23, 1),
(5861, '23657', 'EscaÑuela', 23, 1),
(5862, '23658', 'Jamilena', 23, 1),
(5863, '23659', 'Villardompardo', 23, 1),
(5864, '23660', 'Alcaudete', 23, 1),
(5865, '23669', 'Venta De Pantalones', 23, 1),
(5866, '23670', 'Castillo De Locubin', 23, 1),
(5867, '23680', 'Alcala La Real', 23, 1),
(5868, '23684', 'San Jose De La Rabita', 23, 1),
(5869, '23685', 'Sabariego, El', 23, 1),
(5870, '23685', 'Sabariego, El', 23, 1),
(5871, '23686', 'Pilillas, Las', 23, 1),
(5872, '23686', 'Pilillas, Las', 23, 1),
(5873, '23687', 'Charilla', 23, 1),
(5874, '23688', 'Venta De Los Agramaderos', 23, 1),
(5875, '23689', 'Pilas De Fuente De Soto, Las', 23, 1),
(5876, '23690', 'Frailes', 23, 1),
(5877, '23691', 'Ribera Baja', 23, 1),
(5878, '23691', 'Ribera Baja', 23, 1),
(5879, '23692', 'Santa Ana', 23, 1),
(5880, '23693', 'Ventas Del Carrizal', 23, 1),
(5881, '23700', 'Linares', 23, 1),
(5882, '23710', 'Bailen', 23, 1),
(5883, '23711', 'BaÑos De La Encina', 23, 1),
(5884, '23712', 'Jabalquinto', 23, 1),
(5885, '23713', 'Magdalena De Castro-los Tercios', 23, 1),
(5886, '23713', 'Magdalena De Castro-los Tercios', 23, 1),
(5887, '23720', 'Espeluy', 23, 1),
(5888, '23730', 'Villanueva De La Reina', 23, 1),
(5889, '23740', 'Andujar', 23, 1),
(5890, '23746', 'Lahiguera', 23, 1),
(5891, '23747', 'Vegas De Triana', 23, 1),
(5892, '23747', 'Vegas De Triana', 23, 1),
(5893, '23748', 'Virgen De La Cabeza, Santuario', 23, 1),
(5894, '23749', 'Villares De Andujar, Los', 23, 1),
(5895, '23749', 'Villares De Andujar, Los', 23, 1),
(5896, '23750', 'Arjonilla', 23, 1),
(5897, '23760', 'Arjona', 23, 1),
(5898, '23770', 'Marmolejo', 23, 1),
(5899, '23780', 'Lopera', 23, 1),
(5900, '23790', 'Porcuna', 23, 1),
(5901, '24001', 'León', 24, 1),
(5902, '24002', 'León', 24, 1),
(5903, '24003', 'León', 24, 1),
(5904, '24003', 'León', 24, 1),
(5905, '24004', 'León', 24, 1),
(5906, '24005', 'León', 24, 1),
(5907, '24006', 'León', 24, 1),
(5908, '24007', 'León', 24, 1),
(5909, '24008', 'León', 24, 1),
(5910, '24009', 'León', 24, 1),
(5911, '24009', 'León', 24, 1),
(5912, '24010', 'León', 24, 1),
(5913, '24010', 'León', 24, 1),
(5914, '24100', 'Villablino', 24, 1),
(5915, '24110', 'Caboalles De Abajo', 24, 1),
(5916, '24111', 'Caboalles De Arriba', 24, 1),
(5917, '24112', 'Villager De Laciana', 24, 1),
(5918, '24113', 'Orallo', 24, 1),
(5919, '24114', 'Rabanal De Arriba', 24, 1),
(5920, '24120', 'GaraÑo', 24, 1),
(5921, '24121', 'Sariegos Del Bernesga', 24, 1),
(5922, '24122', 'Lorenzana', 24, 1),
(5923, '24123', 'ViÑayo', 24, 1),
(5924, '24124', 'Villapodambre', 24, 1),
(5925, '24124', 'Villapodambre', 24, 1),
(5926, '24125', 'Villaceid', 24, 1),
(5927, '24126', 'Villayuste', 24, 1),
(5928, '24126', 'Villayuste', 24, 1),
(5929, '24127', 'Villarin De Riello', 24, 1),
(5930, '24127', 'Villarin De Riello', 24, 1),
(5931, '24130', 'Murias De Paredes', 24, 1),
(5932, '24131', 'OmaÑuela, La', 24, 1),
(5933, '24132', 'Vegarienza', 24, 1),
(5934, '24133', 'Villaverde De OmaÑa', 24, 1),
(5935, '24133', 'Villaverde De OmaÑa', 24, 1),
(5936, '24134', 'Sabugo', 24, 1),
(5937, '24134', 'Sabugo', 24, 1),
(5938, '24135', 'Villanueva De OmaÑa', 24, 1),
(5939, '24136', 'Villabandin', 24, 1),
(5940, '24137', 'Vivero De OmaÑa', 24, 1),
(5941, '24138', 'Villar De Santiago', 24, 1),
(5942, '24139', 'Sosas De Laciana', 24, 1),
(5943, '24140', 'Villaseca De Laciana', 24, 1),
(5944, '24141', 'Vega De Los Viejos, La', 24, 1),
(5945, '24142', 'PeÑalba De Cilleros', 24, 1),
(5946, '24143', 'Torre De Babia', 24, 1),
(5947, '24143', 'Torre De Babia', 24, 1),
(5948, '24144', 'Villasecino', 24, 1),
(5949, '24145', 'Villafeliz De Babia', 24, 1),
(5950, '24145', 'Villafeliz De Babia', 24, 1),
(5951, '24146', 'Vega De Robledo, La', 24, 1),
(5952, '24148', 'Mallo De Luna', 24, 1),
(5953, '24149', 'Vega De Los Caballeros', 24, 1),
(5954, '24150', 'Devesa De CurueÑo', 24, 1),
(5955, '24150', 'Devesa De CurueÑo', 24, 1),
(5956, '24150', 'Devesa De CurueÑo', 24, 1),
(5957, '24151', 'Gallegos De CurueÑo', 24, 1),
(5958, '24152', 'Vegaquemada', 24, 1),
(5959, '24153', 'Vegas Del Condado', 24, 1),
(5960, '24154', 'Villanueva Del Condado', 24, 1),
(5961, '24155', 'Villamayor Del Condado', 24, 1),
(5962, '24156', 'SantibaÑez De Porma', 24, 1),
(5963, '24160', 'Valdealcon', 24, 1),
(5964, '24161', 'Villanofar', 24, 1),
(5965, '24161', 'Villanofar', 24, 1),
(5966, '24162', 'VillafaÑe', 24, 1),
(5967, '24163', 'Villimer', 24, 1),
(5968, '24163', 'Villimer', 24, 1),
(5969, '24164', 'Villarmun', 24, 1),
(5970, '24165', 'Villarratel', 24, 1),
(5971, '24166', 'San Miguel De Escalada', 24, 1),
(5972, '24170', 'Corcos', 24, 1),
(5973, '24170', 'Corcos', 24, 1),
(5974, '24171', 'Villaverde De Arcayos', 24, 1),
(5975, '24171', 'Villaverde De Arcayos', 24, 1),
(5976, '24172', 'Villacalabuey', 24, 1),
(5977, '24172', 'Villacalabuey', 24, 1),
(5978, '24172', 'Villacalabuey', 24, 1),
(5979, '24174', 'Cea', 24, 1),
(5980, '24175', 'VillapeceÑil', 24, 1),
(5981, '24190', 'San Andr', 24, 1),
(5982, '24190', 'Le', 24, 1),
(5983, '24191', 'León', 24, 1),
(5984, '24192', 'Vilecha', 24, 1),
(5985, '24192', 'Vilecha', 24, 1),
(5986, '24193', 'Villasinta', 24, 1),
(5987, '24194', 'Santovenia de la Valdoncina', 24, 1),
(5988, '24195', 'Villavente', 24, 1),
(5989, '24195', 'Villavente', 24, 1),
(5990, '24196', 'Carbajal De La Legua', 24, 1),
(5991, '24197', 'Villarrodrigo De Las Regueras', 24, 1),
(5992, '24198', 'Virgen Del Camino, La', 24, 1),
(5993, '24199', 'Santa Olaja De La Ribera', 24, 1),
(5994, '24200', 'Valencia De Don Juan', 24, 1),
(5995, '24205', 'CabaÑas', 24, 1),
(5996, '24206', 'Villabraz', 24, 1),
(5997, '24206', 'Villabraz', 24, 1),
(5998, '24206', 'Villabraz', 24, 1),
(5999, '24206', 'Villabraz', 24, 1),
(6000, '24207', 'Zalamillas', 24, 1),
(6001, '24207', 'Zalamillas', 24, 1),
(6002, '24208', 'Valdesaz De Los Oteros', 24, 1),
(6003, '24209', 'San Roman De Los Oteros', 24, 1),
(6004, '24209', 'San Roman De Los Oteros', 24, 1),
(6005, '24210', 'Mansilla De Las Mulas', 24, 1),
(6007, '24217', 'Villaverde De Sandoval', 24, 1),
(6008, '24218', 'Villomar', 24, 1),
(6009, '24218', 'Villomar', 24, 1),
(6010, '24219', 'Villiguer', 24, 1),
(6011, '24220', 'Valderas', 24, 1),
(6012, '24221', 'Campazas', 24, 1),
(6013, '24222', 'Villaornate', 24, 1),
(6014, '24223', 'Pobladura De Los Oteros', 24, 1),
(6015, '24223', 'Pobladura De Los Oteros', 24, 1),
(6016, '24223', 'Pobladura De Los Oteros', 24, 1),
(6017, '24224', 'Velilla De Los Oteros', 24, 1),
(6018, '24224', 'Velilla De Los Oteros', 24, 1),
(6019, '24224', 'Velilla De Los Oteros', 24, 1),
(6020, '24225', 'Villavidel', 24, 1),
(6021, '24225', 'Villavidel', 24, 1),
(6022, '24225', 'Villavidel', 24, 1),
(6023, '24226', 'Villaturiel', 24, 1),
(6024, '24226', 'Villaturiel', 24, 1),
(6025, '24227', 'Villacete', 24, 1),
(6026, '24228', 'Villaseca De La Sobarriba', 24, 1),
(6027, '24230', 'Valdevimbre', 24, 1),
(6028, '24231', 'Viloria De La Jurisdicion', 24, 1),
(6029, '24231', 'Viloria De La Jurisdicion', 24, 1),
(6030, '24232', 'San Cibrian De Ardon', 24, 1),
(6031, '24233', 'Villalobar', 24, 1),
(6032, '24233', 'Villalobar', 24, 1),
(6033, '24234', 'Villamorico', 24, 1),
(6034, '24234', 'Villamorico', 24, 1),
(6035, '24235', 'Villaquejida', 24, 1),
(6036, '24236', 'Villafer', 24, 1),
(6037, '24237', 'Villademor De La Vega', 24, 1),
(6038, '24237', 'Villademor De La Vega', 24, 1),
(6039, '24237', 'Villademor De La Vega', 24, 1),
(6040, '24238', 'Villarrabines', 24, 1),
(6041, '24238', 'Villarrabines', 24, 1),
(6042, '24239', 'Lordemanos', 24, 1),
(6043, '24240', 'Santa Maria Del Paramo', 24, 1),
(6044, '24248', 'Urdiales Del Paramo', 24, 1),
(6045, '24248', 'Urdiales Del Paramo', 24, 1),
(6046, '24249', 'Zuares Del Paramo', 24, 1),
(6047, '24249', 'Zuares Del Paramo', 24, 1),
(6048, '24249', 'Zuares Del Paramo', 24, 1),
(6049, '24249', 'Zuares Del Paramo', 24, 1),
(6050, '24250', 'VillibaÑe', 24, 1),
(6051, '24250', 'VillibaÑe', 24, 1),
(6052, '24251', 'Cillanueva', 24, 1),
(6053, '24251', 'Cillanueva', 24, 1),
(6054, '24251', 'Cillanueva', 24, 1),
(6055, '24252', 'Villarrin Del Paramo', 24, 1),
(6056, '24252', 'Villarrin Del Paramo', 24, 1),
(6057, '24252', 'Villarrin Del Paramo', 24, 1),
(6058, '24253', 'Valdefuentes Del Paramo', 24, 1),
(6059, '24257', 'Cerecedo De BoÑar', 24, 1),
(6060, '24270', 'Villanueva De Carrizo', 24, 1),
(6061, '24271', 'Villaviciosa De La Ribera', 24, 1),
(6062, '24272', 'Cimanes Del Tejar', 24, 1),
(6063, '24273', 'Villarroquel', 24, 1),
(6064, '24273', 'Villarroquel', 24, 1),
(6065, '24274', 'Espinosa De La Ribera', 24, 1),
(6066, '24275', 'Tapia De La Ribera', 24, 1),
(6067, '24275', 'Tapia De La Ribera', 24, 1),
(6068, '24276', 'Villarrodrigo De Ordas', 24, 1),
(6069, '24277', 'Riocastrillo De Ordas', 24, 1),
(6070, '24280', 'Benavides De Orbigo', 24, 1),
(6071, '24281', 'Vega De AntoÑan', 24, 1),
(6072, '24282', 'Montejos Del Camino', 24, 1),
(6073, '24282', 'Montejos Del Camino', 24, 1),
(6074, '24283', 'QuiÑones Del Rio', 24, 1),
(6075, '24284', 'Armellada', 24, 1),
(6076, '24285', 'Turcia', 24, 1),
(6077, '24285', 'Turcia', 24, 1),
(6078, '24285', 'Turcia', 24, 1),
(6079, '24286', 'Puente De Orbigo', 24, 1),
(6080, '24287', 'San Feliz De Orbigo', 24, 1),
(6081, '24287', 'San Feliz De Orbigo', 24, 1),
(6082, '24288', 'Villares De Orbigo', 24, 1),
(6083, '24288', 'Villares De Orbigo', 24, 1),
(6084, '24290', 'Santa Cristina De Valmadrigal', 24, 1),
(6085, '24291', 'Santa Maria De Los Oteros', 24, 1),
(6086, '24292', 'Valverde Enrique', 24, 1),
(6087, '24293', 'Valdemorilla', 24, 1),
(6088, '24294', 'Gordoncillo', 24, 1),
(6089, '24300', 'Bembibre', 24, 1),
(6090, '24310', 'Ribera De Folgoso, La', 24, 1),
(6091, '24310', 'Ribera De Folgoso, La', 24, 1),
(6092, '24311', 'Folgoso De La Ribera', 24, 1),
(6093, '24312', 'IgueÑa', 24, 1),
(6094, '24312', 'IgueÑa', 24, 1),
(6095, '24313', 'Urdiales De Colinas', 24, 1),
(6096, '24314', 'Villaverde De Los Cestos', 24, 1),
(6097, '24315', 'Villaviciosa De San Miguel', 24, 1),
(6098, '24315', 'Villaviciosa De San Miguel', 24, 1),
(6099, '24316', 'Viloria', 24, 1),
(6100, '24317', 'Ventas De Albares, Las', 24, 1),
(6101, '24318', 'San Roman De Bembibre', 24, 1),
(6102, '24319', 'ViÑales', 24, 1),
(6103, '24319', 'ViÑales', 24, 1),
(6104, '24319', 'ViÑales', 24, 1),
(6105, '24320', 'Sahagun', 24, 1),
(6106, '24323', 'Veguellina, La (sahagun)', 24, 1),
(6107, '24323', 'Veguellina, La (sahagun)', 24, 1),
(6108, '24324', 'Villeza', 24, 1),
(6109, '24324', 'Villeza', 24, 1),
(6110, '24325', 'Gordaliza Del Pino', 24, 1),
(6111, '24325', 'Gordaliza Del Pino', 24, 1),
(6112, '24326', 'Villalman', 24, 1),
(6113, '24327', 'Villavelasco De Valderaduey', 24, 1),
(6114, '24328', 'Villazanzo De Valderaduey', 24, 1),
(6115, '24328', 'Villazanzo De Valderaduey', 24, 1),
(6116, '24328', 'Villazanzo De Valderaduey', 24, 1),
(6117, '24329', 'San Pedro De Las DueÑas (sahagun)', 24, 1),
(6118, '24329', 'San Pedro De Las DueÑas (sahagun)', 24, 1),
(6119, '24330', 'Valdearcos', 24, 1),
(6120, '24339', 'Villamoratiel De Las Matas', 24, 1),
(6121, '24339', 'Villamoratiel De Las Matas', 24, 1),
(6122, '24340', 'Grajal De Campos', 24, 1),
(6123, '24341', 'Escobar De Campos', 24, 1),
(6124, '24342', 'Codornillos', 24, 1),
(6125, '24343', 'Santa Maria De Monte Cea', 24, 1),
(6126, '24343', 'Santa Maria De Monte Cea', 24, 1),
(6127, '24344', 'Villaselan', 24, 1),
(6128, '24344', 'Villaselan', 24, 1),
(6129, '24344', 'Villaselan', 24, 1),
(6130, '24344', 'Villaselan', 24, 1),
(6131, '24345', 'Villamarco', 24, 1),
(6132, '24346', 'Vega De Infanzones', 24, 1),
(6133, '24347', 'Villadesoto', 24, 1),
(6134, '24347', 'Villadesoto', 24, 1),
(6135, '24350', 'Veguellina De Orbigo', 24, 1),
(6136, '24356', 'Santa Marinica Del Paramo', 24, 1),
(6137, '24356', 'Santa Marinica Del Paramo', 24, 1),
(6138, '24357', 'Matalobos Del Paramo', 24, 1),
(6139, '24358', 'Villoria De Orbigo', 24, 1),
(6140, '24359', 'Villamediana De La Vega', 24, 1),
(6141, '24359', 'Villamediana De La Vega', 24, 1),
(6142, '24360', 'BraÑuelas', 24, 1),
(6143, '24367', 'Villagaton', 24, 1),
(6144, '24368', 'Villar (nistoso)', 24, 1),
(6145, '24369', 'Valbuena De La Encomienda', 24, 1),
(6146, '24370', 'Torre Del Bierzo', 24, 1),
(6147, '24374', 'Tremor De Abajo', 24, 1),
(6148, '24374', 'Tremor De Abajo', 24, 1),
(6149, '24375', 'Rodrigatos De Las Regueras', 24, 1),
(6150, '24376', 'Espina De Tremor', 24, 1),
(6151, '24377', 'Tremor De Arriba', 24, 1),
(6152, '24378', 'Santa Marina De Torre', 24, 1),
(6153, '24379', 'Silva, La', 24, 1),
(6154, '24379', 'Silva, La', 24, 1),
(6155, '24380', 'Puente Domingo Florez', 24, 1),
(6156, '24384', 'Salas De La Ribera', 24, 1),
(6157, '24385', 'San Pedro De Trones', 24, 1),
(6158, '24386', 'Yeres', 24, 1),
(6159, '24387', 'Robledo De Sobrecastro', 24, 1),
(6160, '24388', 'Yebra', 24, 1),
(6161, '24389', 'Sotillo De Cabrera', 24, 1),
(6162, '24389', 'Sotillo De Cabrera', 24, 1),
(6163, '24390', 'Villaverde De La Abadia', 24, 1),
(6164, '24391', 'Villanueva Del Carnero', 24, 1),
(6165, '24391', 'Villanueva Del Carnero', 24, 1),
(6166, '24391', 'Villanueva Del Carnero', 24, 1),
(6167, '24392', 'Villar De Mazarife', 24, 1),
(6168, '24392', 'Villar De Mazarife', 24, 1),
(6169, '24392', 'Villar De Mazarife', 24, 1),
(6170, '24393', 'Villavante', 24, 1),
(6171, '24393', 'Villavante', 24, 1),
(6172, '24393', 'Villavante', 24, 1),
(6173, '24394', 'Carral', 24, 1),
(6174, '24395', 'Nistal', 24, 1),
(6175, '24395', 'Nistal', 24, 1),
(6176, '24396', 'Zacos', 24, 1),
(6177, '24397', 'Villarmeriel', 24, 1),
(6178, '24397', 'Villarmeriel', 24, 1),
(6179, '24398', 'San Miguel De Las DueÑas', 24, 1),
(6180, '24398', 'San Miguel De Las DueÑas', 24, 1),
(6181, '24398', 'San Miguel De Las DueÑas', 24, 1),
(6182, '24400', 'Ponferrada', 24, 1),
(6183, '24401', 'Ponferrada', 24, 1),
(6184, '24402', 'Ponferrada', 24, 1),
(6185, '24403', 'Ponferrada', 24, 1),
(6186, '24404', 'Ponferrada', 24, 1),
(6187, '24410', 'Valgoma, La', 24, 1),
(6188, '24410', 'Valgoma, La', 24, 1),
(6189, '24411', 'Fuentes Nuevas', 24, 1),
(6190, '24412', 'Cortiguera', 24, 1),
(6191, '24413', 'Riego De Ambros', 24, 1),
(6192, '24413', 'Riego De Ambros', 24, 1),
(6193, '24414', 'Villar De Los Barrios', 24, 1),
(6194, '24415', 'Villanueva De Valdueza', 24, 1),
(6195, '24416', 'Santo Tomas De Las Ollas', 24, 1),
(6196, '24420', 'Fabero', 24, 1),
(6197, '24424', 'Ponferrada', 24, 1),
(6198, '24428', 'Otero De Naraguantes', 24, 1),
(6199, '24429', 'Trascastro', 24, 1),
(6200, '24429', 'Trascastro', 24, 1),
(6201, '24430', 'Vega De Espinareda', 24, 1),
(6202, '24433', 'Villasumil', 24, 1),
(6203, '24434', 'Villar De Otero', 24, 1),
(6204, '24434', 'Villar De Otero', 24, 1),
(6205, '24435', 'Valle De Finolledo', 24, 1),
(6206, '24436', 'San Pedro De Olleros', 24, 1),
(6207, '24437', 'Penoselo (fabero)', 24, 1),
(6208, '24438', 'Tombrio De Arriba', 24, 1),
(6209, '24438', 'Tombrio De Arriba', 24, 1),
(6210, '24439', 'Sancedo', 24, 1),
(6211, '24439', 'Sancedo', 24, 1),
(6212, '24440', 'Lago De Carucedo', 24, 1),
(6213, '24441', 'Villarrando', 24, 1),
(6214, '24441', 'Villarrando', 24, 1),
(6215, '24442', 'Medulas, Las', 24, 1),
(6216, '24442', 'Medulas, Las', 24, 1),
(6217, '24443', 'San Juan De Paluezas', 24, 1),
(6218, '24444', 'Voces', 24, 1),
(6219, '24445', 'Santalla', 24, 1),
(6220, '24446', 'Villavieja', 24, 1),
(6221, '24447', 'Villalibre De La Jurisdicion', 24, 1),
(6222, '24448', 'Toral De Merayo', 24, 1),
(6223, '24448', 'Toral De Merayo', 24, 1),
(6224, '24450', 'Toreno', 24, 1),
(6225, '24457', 'Pardamaza', 24, 1),
(6226, '24458', 'Villar De Las Traviesas', 24, 1),
(6227, '24458', 'Villar De Las Traviesas', 24, 1),
(6228, '24459', 'Valdelaloba', 24, 1),
(6229, '24460', 'Matarrosa Del Sil', 24, 1),
(6230, '24469', 'Villamartin Del Sil', 24, 1),
(6231, '24469', 'Villamartin Del Sil', 24, 1),
(6232, '24470', 'Paramo Del Sil', 24, 1),
(6233, '24478', 'Sorbeda', 24, 1),
(6234, '24479', 'Salentinos', 24, 1),
(6235, '24480', 'Corbon Del Sil', 24, 1),
(6236, '24488', 'Anllarinos Del Sil', 24, 1),
(6237, '24489', 'SusaÑe Del Sil', 24, 1),
(6238, '24490', 'Columbrianos', 24, 1),
(6239, '24491', 'San Andres De Montejos', 24, 1),
(6240, '24492', 'Posadinas', 24, 1),
(6241, '24494', 'Santa Cruz Del Sil', 24, 1),
(6242, '24495', 'Valseco', 24, 1),
(6243, '24496', 'Mataotero', 24, 1),
(6244, '24497', 'Tejedo Del Sil', 24, 1),
(6245, '24498', 'Villarino Del Sil', 24, 1),
(6246, '24500', 'Villafranca Del Bierzo', 24, 1),
(6247, '24510', 'Paradaseca', 24, 1),
(6248, '24511', 'Villar De Acero', 24, 1),
(6249, '24512', 'Veguellina, La (villafranca)', 16, 1),
(6250, '24512', 'Veguellina, La (villafranca)', 24, 1),
(6251, '24513', 'Puente De Rey', 24, 1),
(6252, '24514', 'Corullon', 24, 1),
(6253, '24515', 'Viariz', 24, 1),
(6254, '24516', 'Vilela', 24, 1),
(6255, '24516', 'Vilela', 24, 1),
(6256, '24516', 'Vilela', 24, 1),
(6257, '24517', 'Villagroy', 24, 1),
(6258, '24520', 'Vega De Valcarce', 24, 1),
(6259, '24521', 'Villasinde', 24, 1),
(6260, '24521', 'Villasinde', 24, 1),
(6261, '24522', 'Pereje', 24, 1),
(6262, '24523', 'Villar De Corrales', 24, 1),
(6263, '24524', 'Sotogayoso', 24, 1),
(6264, '24525', 'Villarmarin', 24, 1),
(6265, '24526', 'Treita, La', 24, 1),
(6266, '24530', 'Villadecanes', 24, 1),
(6267, '24530', 'Villadecanes', 24, 1),
(6268, '24540', 'Cacabelos', 24, 1),
(6269, '24544', 'Carracedo De Monasterio', 24, 1),
(6270, '24545', 'San Juan De La Mata', 24, 1),
(6271, '24545', 'San Juan De La Mata', 24, 1),
(6272, '24546', 'San Vicente De Arganza', 24, 1),
(6273, '24547', 'Valtuille De Arriba', 24, 1),
(6274, '24547', 'Valtuille De Arriba', 24, 1),
(6275, '24548', 'Villabuena', 24, 1),
(6276, '24549', 'Carracedelo', 24, 1),
(6277, '24550', 'Villanueva De La Abadia', 24, 1),
(6278, '24550', 'Villanueva De La Abadia', 24, 1),
(6279, '24560', 'Toral De Los Vados', 24, 1),
(6280, '24565', 'Villadepalos', 24, 1),
(6281, '24566', 'Villarrubin', 24, 1),
(6282, '24567', 'Sobrado De Aguiar', 24, 1),
(6283, '24568', 'Lusio', 24, 1),
(6284, '24569', 'Sobredo', 24, 1),
(6285, '24569', 'Sobredo', 24, 1),
(6286, '24600', 'Pola De Gordon, La', 24, 1),
(6287, '24607', 'Vega De Gordon', 24, 1),
(6288, '24608', 'Paradilla De Gordon', 24, 1),
(6289, '24609', 'Peredilla', 24, 1),
(6290, '24610', 'Campo Y SantibaÑez', 24, 1),
(6291, '24620', 'Valsemana', 24, 1),
(6292, '24630', 'Seca, La', 24, 1),
(6293, '24640', 'Robla, La', 24, 1),
(6294, '24648', 'Solana De Fenar', 24, 1),
(6295, '24648', 'Solana De Fenar', 24, 1),
(6296, '24649', 'Sorribos De Alba', 24, 1),
(6297, '24650', 'Santa Lucia', 24, 1),
(6298, '24660', 'CiÑera', 24, 1),
(6299, '24670', 'Villasimpliz', 24, 1),
(6300, '24680', 'Villamanin', 24, 1),
(6301, '24687', 'Ventosilla', 24, 1),
(6302, '24688', 'Viadangos De Arbas', 24, 1),
(6303, '24689', 'Villanueva De La Tercia', 24, 1),
(6304, '24690', 'Busdongo', 24, 1),
(6305, '24699', 'Tonin', 24, 1),
(6306, '24700', 'Astorga', 24, 1),
(6307, '24710', 'San Roman De La Vega', 24, 1),
(6308, '24711', 'Villamejil', 24, 1),
(6309, '24711', 'Villamejil', 24, 1),
(6310, '24712', 'Revilla', 24, 1),
(6311, '24713', 'Sueros De Cepeda', 24, 1),
(6312, '24714', 'Requejo De Pradorrey', 24, 1),
(6313, '24715', 'Veldedo', 24, 1),
(6314, '24716', 'Brazuelo', 24, 1),
(6315, '24717', 'Villalibre De Somoza', 24, 1),
(6316, '24717', 'Villalibre De Somoza', 24, 1),
(6317, '24717', 'Villalibre De Somoza', 24, 1),
(6318, '24717', 'Villalibre De Somoza', 24, 1),
(6319, '24718', 'Valdeviejas', 24, 1),
(6320, '24718', 'Valdeviejas', 24, 1),
(6321, '24719', 'Villaobispo De Otero', 24, 1),
(6322, '24720', 'San Martin Del Agostedo', 24, 1),
(6323, '24721', 'Villar De Golfer', 24, 1),
(6324, '24721', 'Villar De Golfer', 24, 1),
(6325, '24722', 'Villar De Los Ciervos', 24, 1),
(6326, '24723', 'Lucillo', 24, 1),
(6327, '24724', 'Pobladura De La Sierra', 24, 1),
(6328, '24730', 'Villalis De La Valduerna', 24, 1),
(6329, '24731', 'Piedralba', 24, 1),
(6330, '24732', 'Tejados', 24, 1),
(6331, '24732', 'Tejados', 24, 1),
(6332, '24733', 'Torneros De Jamuz', 24, 1),
(6333, '24734', 'Pobladura Del Yuso', 24, 1),
(6334, '24735', 'Castrocontrigo', 24, 1),
(6335, '24736', 'Torneros De La Valderia', 24, 1),
(6336, '24738', 'Villar Del Monte', 24, 1),
(6337, '24739', 'Torre del Bierzo', 24, 1),
(6338, '24740', 'Valdavido', 24, 1),
(6339, '24740', 'Valdavido', 24, 1),
(6340, '24740', 'Valdavido', 24, 1),
(6341, '24740', 'Valdavido', 24, 1),
(6342, '24741', 'Villarino De Cabrera', 24, 1),
(6343, '24742', 'Odollo', 24, 1),
(6344, '24743', 'Quintanilla De Losada', 24, 1),
(6345, '24744', 'Saceda De Cabrera', 24, 1),
(6346, '24744', 'Saceda De Cabrera', 24, 1),
(6347, '24745', 'Trabazos', 24, 1),
(6348, '24746', 'Losadilla', 24, 1),
(6349, '24750', 'BaÑeza, La', 24, 1),
(6350, '24760', 'San Felix De La Valderia', 24, 1),
(6351, '24760', 'San Felix De La Valderia', 24, 1),
(6352, '24760', 'San Felix De La Valderia', 24, 1),
(6353, '24761', 'Alija Del Infantado', 24, 1),
(6354, '24762', 'Villanueva De Jamuz', 24, 1),
(6355, '24762', 'Villanueva De Jamuz', 24, 1),
(6356, '24763', 'Villazala', 24, 1),
(6357, '24763', 'Villazala', 24, 1),
(6358, '24763', 'Villazala', 24, 1),
(6359, '24764', 'Santa Colomba De La Vega', 24, 1),
(6360, '24764', 'Santa Colomba De La Vega', 24, 1),
(6361, '24764', 'Santa Colomba De La Vega', 24, 1),
(6362, '24765', 'Valle De La Valduerna', 24, 1),
(6363, '24765', 'Valle De La Valduerna', 24, 1),
(6364, '24766', 'Villamontan De La Valduerna', 24, 1),
(6365, '24766', 'Villamontan De La Valduerna', 24, 1),
(6366, '24766', 'Villamontan De La Valduerna', 24, 1),
(6367, '24767', 'Tabuyuelo De Jamuz', 24, 1),
(6368, '24767', 'Tabuyuelo De Jamuz', 24, 1),
(6369, '24768', 'Vecilla De La Vega', 24, 1),
(6370, '24769', 'San Martin De Torres', 24, 1),
(6371, '24790', 'Valcabado Del Paramo', 24, 1),
(6372, '24791', 'Zotes Del Paramo', 24, 1),
(6373, '24791', 'Zotes Del Paramo', 24, 1),
(6374, '24792', 'Nora Del Rio, La', 24, 1),
(6375, '24792', 'Nora Del Rio, La', 24, 1),
(6376, '24792', 'Nora Del Rio, La', 24, 1),
(6377, '24793', 'Valderrey', 24, 1),
(6378, '24794', 'Toralino', 24, 1),
(6379, '24795', 'Villarnera De La Vega', 24, 1),
(6380, '24795', 'Villarnera De La Vega', 24, 1),
(6381, '24795', 'Villarnera De La Vega', 24, 1),
(6382, '24796', 'Saludes De Castroponce', 24, 1),
(6383, '24796', 'Saludes De Castroponce', 24, 1),
(6384, '24797', 'San Adrian Del Valle', 24, 1),
(6385, '24800', 'Cistierna', 24, 1),
(6386, '24810', 'Sabero', 24, 1),
(6387, '24811', 'Olleros De Sabero', 24, 1),
(6388, '24812', 'Saelices De Sabero', 24, 1),
(6389, '24813', 'Santa Olaja De La Varga', 24, 1),
(6390, '24814', 'Sotillos De Sabero', 24, 1);
INSERT INTO `lnx_poblaciones` (`id`, `cp`, `poblacion`, `idprov`, `idpais`) VALUES
(6391, '24815', 'Sorriba Del Esla', 24, 1),
(6392, '24816', 'Valmartino', 24, 1),
(6393, '24820', 'Pedrun De Torio', 24, 1),
(6394, '24820', 'Pedrun De Torio', 24, 1),
(6395, '24830', 'Barrio De La Estacion (matallana)', 24, 1),
(6396, '24836', 'Villar Del Puerto', 24, 1),
(6397, '24836', 'Villar Del Puerto', 24, 1),
(6398, '24837', 'Valverdin', 24, 1),
(6399, '24837', 'Valverdin', 24, 1),
(6400, '24837', 'Valverdin', 24, 1),
(6401, '24838', 'Villanueva De Pontedo', 24, 1),
(6402, '24839', 'Valcueva, La - Palazuelo', 24, 1),
(6403, '24840', 'Vecilla De CurueÑo, La', 24, 1),
(6404, '24843', 'Valdelugueros', 24, 1),
(6405, '24844', 'Villaverde De La Cuerna', 24, 1),
(6406, '24845', 'Tolibia De Arriba', 24, 1),
(6407, '24846', 'Valdorria', 24, 1),
(6408, '24847', 'Valdepielago', 24, 1),
(6409, '24848', 'SopeÑa De CurueÑo', 24, 1),
(6410, '24848', 'SopeÑa De CurueÑo', 24, 1),
(6411, '24849', 'Correcillas', 24, 1),
(6412, '24849', 'Correcillas', 24, 1),
(6413, '24850', 'BoÑar', 24, 1),
(6414, '24852', 'Mata De La Riva, La', 24, 1),
(6415, '24852', 'Mata De La Riva, La', 24, 1),
(6416, '24853', 'Valdecastillo', 24, 1),
(6417, '24854', 'Valdehuesa', 24, 1),
(6418, '24855', 'San Isidro', 24, 1),
(6419, '24856', 'Viego', 24, 1),
(6420, '24857', 'Solle', 24, 1),
(6421, '24857', 'Solle', 24, 1),
(6422, '24858', 'Veneros', 24, 1),
(6423, '24859', 'Voznuevo', 24, 1),
(6424, '24860', 'Losilla, La Y San Adrian', 24, 1),
(6425, '24860', 'Losilla, La Y San Adrian', 24, 1),
(6426, '24869', 'Palazuelo De BoÑar', 24, 1),
(6427, '24870', 'SobrepeÑa', 24, 1),
(6428, '24877', 'Santa Colomba De Las Arrimadas', 24, 1),
(6429, '24878', 'Valporquero De Rueda', 24, 1),
(6430, '24878', 'Valporquero De Rueda', 24, 1),
(6431, '24879', 'Yugueros', 24, 1),
(6432, '24880', 'Puente Almuhey', 24, 1),
(6433, '24882', 'Villacorta', 24, 1),
(6434, '24883', 'Caminayo', 24, 1),
(6435, '24884', 'Morgovejo, Balneario De', 24, 1),
(6436, '24885', 'Tejerina', 24, 1),
(6437, '24885', 'Tejerina', 24, 1),
(6438, '24886', 'Red De Valdetuejar, La', 24, 1),
(6439, '24887', 'Villalmonte', 24, 1),
(6440, '24888', 'Villamorisca', 24, 1),
(6441, '24888', 'Villamorisca', 24, 1),
(6442, '24888', 'Villamorisca', 24, 1),
(6443, '24889', 'Valcuende', 24, 1),
(6444, '24890', 'Villaverde De Arriba', 24, 1),
(6445, '24891', 'Valderilla De Torio', 24, 1),
(6446, '24892', 'Valle De Las Casas', 24, 1),
(6447, '24893', 'Robledo De La GuzpeÑa', 24, 1),
(6448, '24900', 'RiaÑo', 24, 1),
(6449, '24911', 'Valverde De La Sierra', 24, 1),
(6450, '24912', 'Llanaves De La Reina', 24, 1),
(6451, '24913', 'Villafrea De La Reina', 24, 1),
(6452, '24914', 'Soto De Valdeon', 24, 1),
(6453, '24915', 'Santa Marina De Valdeon', 24, 1),
(6454, '24916', 'Vierdes De Sajambre', 24, 1),
(6455, '24917', 'Vegacerneja', 24, 1),
(6456, '24918', 'Horcadas', 24, 1),
(6457, '24920', 'Sahelices Del Payuelo', 24, 1),
(6458, '24930', 'Villaverde De La Chiquita', 24, 1),
(6459, '24940', 'Villapadierna', 24, 1),
(6460, '24950', 'Vidanes', 24, 1),
(6461, '24960', 'Verdiago', 24, 1),
(6462, '24960', 'Verdiago', 24, 1),
(6463, '24970', 'Velilla De Valdore', 24, 1),
(6464, '24980', 'Cremenes', 24, 1),
(6465, '24989', 'Villayandre', 24, 1),
(6466, '24990', 'Salas, Las', 24, 1),
(6467, '24991', 'Valbuena Del Roblo', 24, 1),
(6468, '24994', 'Liegos', 24, 1),
(6469, '24994', 'Liegos', 24, 1),
(6470, '24995', 'Polvoredo', 24, 1),
(6471, '24996', 'UÑa, La', 24, 1),
(6472, '24996', 'UÑa, La', 24, 1),
(6473, '25001', 'Lleida', 25, 1),
(6474, '25002', 'Lleida', 25, 1),
(6475, '25003', 'Lleida', 25, 1),
(6476, '25004', 'Lleida', 25, 1),
(6477, '25005', 'Lleida', 25, 1),
(6478, '25006', 'Lleida', 25, 1),
(6479, '25007', 'Lleida', 25, 1),
(6480, '25008', 'Lleida', 25, 1),
(6481, '25100', 'Saira, La', 25, 1),
(6482, '25110', 'Lleida', 25, 1),
(6483, '25110', 'Lleida', 25, 1),
(6484, '25111', 'Lleida', 25, 1),
(6485, '25112', 'Vallmanya', 25, 1),
(6486, '25113', 'Suquets', 25, 1),
(6487, '25114', 'Pla De La Font, El', 25, 1),
(6488, '25120', 'Alfarras', 25, 1),
(6489, '25122', 'Ivars De Noguera', 25, 1),
(6490, '25123', 'Torrefarrera', 25, 1),
(6491, '25124', 'Rossello', 25, 1),
(6492, '25125', 'Mata De Pinyana, La', 25, 1),
(6493, '25126', 'Bassa Nova, La', 25, 1),
(6494, '25126', 'Bassa Nova, La', 25, 1),
(6495, '25130', 'Figuera, La', 25, 1),
(6496, '25131', 'Torre-serona', 25, 1),
(6497, '25132', 'Benavent De Segria', 25, 1),
(6498, '25133', 'Vilanova De Segria', 25, 1),
(6499, '25134', 'Portella, La', 25, 1),
(6500, '25135', 'Albesa', 25, 1),
(6501, '25136', 'Castello De Farfanya', 25, 1),
(6502, '25137', 'Corbins', 25, 1),
(6503, '25138', 'Torrelameu', 25, 1),
(6504, '25139', 'Menarguens', 25, 1),
(6505, '25140', 'Arbeca', 25, 1),
(6506, '25141', 'Torregrossa', 25, 1),
(6507, '25142', 'Bellvis', 25, 1),
(6508, '25143', 'Poal, El', 25, 1),
(6509, '25144', 'Arcs, Els', 25, 1),
(6510, '25150', 'Artesa De Lleida', 25, 1),
(6511, '25151', 'Aspa', 25, 1),
(6512, '25152', 'Cogul, El', 25, 1),
(6513, '25153', 'Puigverd De Lleida', 25, 1),
(6514, '25154', 'Castelldans', 25, 1),
(6515, '25155', 'Albages, L\'', 25, 1),
(6516, '25160', 'Granyena De Les Garrigues', 25, 1),
(6517, '25161', 'Alfes', 25, 1),
(6518, '25162', 'Alcano', 25, 1),
(6519, '25163', 'Soleras, El', 25, 1),
(6520, '25164', 'Torms, Els', 25, 1),
(6521, '25165', 'Juncosa', 25, 1),
(6522, '25170', 'Torres De Segre', 25, 1),
(6523, '25171', 'Albatarrec', 25, 1),
(6524, '25172', 'Montoliu De Lleida', 25, 1),
(6525, '25173', 'Sudanell', 25, 1),
(6526, '25174', 'Sunyer', 25, 1),
(6527, '25175', 'Sarroca De Lleida', 25, 1),
(6528, '25176', 'Torrebesses', 25, 1),
(6529, '25177', 'Granadella, La', 25, 1),
(6530, '25177', 'Granadella, La', 25, 1),
(6531, '25178', 'Bovera', 25, 1),
(6532, '25179', 'Maials', 25, 1),
(6533, '25180', 'Alcarras', 25, 1),
(6534, '25181', 'Soses', 25, 1),
(6535, '25182', 'Utxesa', 25, 1),
(6536, '25183', 'Seros', 25, 1),
(6537, '25184', 'Massalc0reig', 25, 1),
(6538, '25185', 'Granja D\'escarp, La', 25, 1),
(6539, '25186', 'Llardecans', 25, 1),
(6540, '25187', 'Almatret', 25, 1),
(6541, '25190', 'Lleida', 25, 1),
(6542, '25191', 'Lleida', 25, 1),
(6543, '25192', 'Lleida', 25, 1),
(6544, '25193', 'Lleida', 25, 1),
(6545, '25193', 'Lleida', 25, 1),
(6546, '25193', 'Lleida', 25, 1),
(6547, '25194', 'Lleida', 25, 1),
(6548, '25195', 'Lleida', 25, 1),
(6549, '25196', 'Lleida', 25, 1),
(6550, '25197', 'Lleida', 25, 1),
(6551, '25198', 'Lleida', 25, 1),
(6552, '25199', 'Lleida', 25, 1),
(6553, '25200', 'Cervera', 25, 1),
(6554, '25210', 'Guissona', 25, 1),
(6555, '25211', 'Vicfred', 25, 1),
(6556, '25211', 'Vicfred', 25, 1),
(6557, '25211', 'Vicfred', 25, 1),
(6558, '25212', 'Pallargues, Les', 25, 1),
(6559, '25212', 'Pallargues, Les', 25, 1),
(6560, '25212', 'Pallargues, Les', 25, 1),
(6561, '25213', 'Vergos', 25, 1),
(6562, '25213', 'Vergos', 25, 1),
(6563, '25213', 'Vergos', 25, 1),
(6564, '25214', 'Santa Fe D, Oluges', 25, 1),
(6565, '25214', 'Santa Fe D, Oluges', 25, 1),
(6566, '25214', 'Santa Fe D, Oluges', 25, 1),
(6567, '25214', 'Santa Fe D, Oluges', 25, 1),
(6568, '25215', 'Sant Ramon', 25, 1),
(6569, '25215', 'Sant Ramon', 25, 1),
(6570, '25216', 'Viver De Segarra', 25, 1),
(6571, '25216', 'Viver De Segarra', 25, 1),
(6572, '25217', 'Vilagrasseta', 25, 1),
(6573, '25217', 'Vilagrasseta', 25, 1),
(6574, '25217', 'Vilagrasseta', 25, 1),
(6575, '25217', 'Vilagrasseta', 25, 1),
(6576, '25218', 'Tordera', 25, 1),
(6577, '25218', 'Tordera', 25, 1),
(6578, '25218', 'Tordera', 25, 1),
(6579, '25220', 'Bell-lloc D\'urgell', 25, 1),
(6580, '25221', 'Vensillo', 25, 1),
(6581, '25222', 'Sidamon', 25, 1),
(6582, '25230', 'Mollerussa', 25, 1),
(6583, '25240', 'Linyola', 25, 1),
(6584, '25240', 'Linyola', 25, 1),
(6585, '25241', 'Golmes', 25, 1),
(6586, '25242', 'Miralcamp', 25, 1),
(6587, '25243', 'Palau D\'anglesola, El', 25, 1),
(6588, '25244', 'Fondarella', 25, 1),
(6589, '25245', 'Vila-sana', 25, 1),
(6590, '25250', 'Bellpuig', 25, 1),
(6591, '25260', 'Montale', 25, 1),
(6592, '25261', 'Vallverd', 25, 1),
(6593, '25261', 'Vallverd', 25, 1),
(6594, '25262', 'Seana', 25, 1),
(6595, '25263', 'Preixana', 25, 1),
(6596, '25264', 'Vilanova De Bellpuig', 25, 1),
(6597, '25265', 'Castellnou De Seana', 25, 1),
(6598, '25266', 'Malda', 25, 1),
(6599, '25266', 'Malda', 25, 1),
(6600, '25267', 'LlorenÇ De Rocafort', 25, 1),
(6601, '25268', 'Vallbona De Les Monges', 25, 1),
(6602, '25268', 'Vallbona De Les Monges', 25, 1),
(6603, '25269', 'Rocallaura', 25, 1),
(6604, '25270', 'Sant Guim De Freixenet', 25, 1),
(6605, '25271', 'Vergos Guerrejat', 25, 1),
(6606, '25271', 'Vergos Guerrejat', 25, 1),
(6607, '25280', 'Solsona', 25, 1),
(6608, '25280', 'Solsona', 25, 1),
(6609, '25281', 'Torredenego', 25, 1),
(6610, '25282', 'Vilamantells', 25, 1),
(6611, '25283', 'Torrents, Els', 25, 1),
(6612, '25283', 'Torrents, Els', 25, 1),
(6613, '25284', 'Pedra, La', 25, 1),
(6614, '25285', 'Guixers', 25, 1),
(6615, '25286', 'Valldora, La', 25, 1),
(6616, '25286', 'Valldora, La', 25, 1),
(6617, '25286', 'Valldora, La', 25, 1),
(6618, '25286', 'Valldora, La', 25, 1),
(6619, '25287', 'Vallmanya De Pinos', 25, 1),
(6620, '25287', 'Vallmanya De Pinos', 25, 1),
(6621, '25287', 'Vallmanya De Pinos', 25, 1),
(6622, '25288', 'Timoneda', 25, 1),
(6623, '25289', 'Serinyana', 25, 1),
(6624, '25289', 'Serinyana', 25, 1),
(6625, '25290', 'Santa Susanna', 25, 1),
(6626, '25290', 'Santa Susanna', 25, 1),
(6627, '25300', 'Tarrega', 25, 1),
(6628, '25310', 'Agramunt', 25, 1),
(6629, '25315', 'Butsenit (montgai)', 25, 1),
(6630, '25316', 'Ventoses, Les', 25, 1),
(6631, '25317', 'Rocaberti De Sant Salvador', 25, 1),
(6632, '25318', 'Renant', 25, 1),
(6633, '25318', 'Renant', 25, 1),
(6634, '25318', 'Renant', 25, 1),
(6635, '25318', 'Renant', 25, 1),
(6636, '25320', 'Anglesola', 25, 1),
(6637, '25327', 'La Vall de Bo', 25, 1),
(6638, '25330', 'Vilagrassa', 25, 1),
(6639, '25331', 'Tornabous', 25, 1),
(6640, '25331', 'Tornabous', 25, 1),
(6641, '25332', 'Fuliola, La', 25, 1),
(6642, '25333', 'Castell Del Remei, El', 25, 1),
(6643, '25334', 'Castellsera', 25, 1),
(6644, '25335', 'Penelles', 25, 1),
(6645, '25336', 'Bellmunt D\'urgell', 25, 1),
(6646, '25337', 'Pedris', 25, 1),
(6647, '25340', 'Verdu', 25, 1),
(6648, '25340', 'Verdu', 25, 1),
(6649, '25341', 'Nalec', 25, 1),
(6650, '25341', 'Nalec', 25, 1),
(6651, '25341', 'Nalec', 25, 1),
(6652, '25343', 'Vilet, El', 25, 1),
(6653, '25344', 'Sant Marti De Riucorb', 25, 1),
(6654, '25350', 'Altet', 25, 1),
(6655, '25351', 'Figuerosa, La', 25, 1),
(6656, '25352', 'Riudovelles', 25, 1),
(6657, '25353', 'Claravalls', 25, 1),
(6658, '25354', 'Santa Maria De Montmagastrell', 25, 1),
(6659, '25360', 'Talladell, El', 25, 1),
(6660, '25400', 'Borges Blanques, Les', 25, 1),
(6661, '25410', 'Espluga Calba, L\'', 25, 1),
(6662, '25411', 'Fulleda', 25, 1),
(6663, '25412', 'Omellons, Els', 25, 1),
(6664, '25413', 'Floresta, La', 25, 1),
(6665, '25420', 'Puiggros', 25, 1),
(6666, '25430', 'Juneda', 25, 1),
(6667, '25440', 'Vinaixa', 25, 1),
(6668, '25450', 'Albi, L\'', 25, 1),
(6669, '25460', 'Cervia De Les Garrigues', 25, 1),
(6670, '25471', 'Pobla De Cervoles, La', 25, 1),
(6671, '25480', 'Tarres', 25, 1),
(6672, '25500', 'Pobla De Segur, La', 25, 1),
(6673, '25510', 'Plana De Mont-ros, La', 25, 1),
(6674, '25511', 'Oveix', 25, 1),
(6675, '25512', 'Pobella', 25, 1),
(6676, '25513', 'Pobleta De Bellvei, La', 25, 1),
(6677, '25513', 'Pobleta De Bellvei, La', 25, 1),
(6678, '25513', 'Pobleta De Bellvei, La', 25, 1),
(6679, '25514', 'Senterada', 25, 1),
(6680, '25514', 'Senterada', 25, 1),
(6681, '25515', 'Torre De Cabdella, La', 25, 1),
(6682, '25516', 'Torallola', 25, 1),
(6683, '25516', 'Torallola', 25, 1),
(6684, '25517', 'Sossis', 25, 1),
(6685, '25518', 'Sant Marti De Canals', 25, 1),
(6686, '25520', 'Pont De Suert, El', 25, 1),
(6687, '25526', 'Sarais', 25, 1),
(6688, '25526', 'Sarais', 25, 1),
(6689, '25527', 'Durro', 25, 1),
(6690, '25528', 'Taull', 25, 1),
(6691, '25529', 'Ventola', 25, 1),
(6692, '25530', 'Vielha/viella', 25, 1),
(6693, '25537', 'Vilac', 25, 1),
(6694, '25538', 'Gausac', 25, 1),
(6695, '25539', 'Garos', 25, 1),
(6696, '25539', 'Garos', 25, 1),
(6697, '25540', 'Les', 25, 1),
(6698, '25547', 'El Vilosell', 25, 1),
(6699, '25548', 'Sant Joan De Toran', 25, 1),
(6700, '25549', 'Pontaut', 25, 1),
(6701, '25550', 'Bossost', 25, 1),
(6702, '25551', 'Vilamos', 25, 1),
(6703, '25551', 'Vilamos', 25, 1),
(6704, '25551', 'Vilamos', 25, 1),
(6705, '25552', 'Vilaller', 25, 1),
(6706, '25552', 'Vilaller', 25, 1),
(6707, '25553', 'Senet', 25, 1),
(6708, '25554', 'Viuet', 25, 1),
(6709, '25555', 'Xerallo', 25, 1),
(6710, '25555', 'Xerallo', 25, 1),
(6711, '25555', 'Xerallo', 25, 1),
(6712, '25556', 'Viu De Llevata', 25, 1),
(6713, '25557', 'El Vilosell', 25, 1),
(6714, '25560', 'Sort', 25, 1),
(6715, '25560', 'Sort', 25, 1),
(6716, '25566', 'Vilamur', 25, 1),
(6717, '25567', 'Sorre', 25, 1),
(6718, '25568', 'Pujalt', 25, 1),
(6719, '25569', 'Tornafort', 25, 1),
(6720, '25569', 'Tornafort', 25, 1),
(6721, '25570', 'Ribera De Cardos', 25, 1),
(6722, '25571', 'Ginestarre', 25, 1),
(6723, '25571', 'Ginestarre', 25, 1),
(6724, '25571', 'Ginestarre', 25, 1),
(6725, '25572', 'Surri', 25, 1),
(6726, '25573', 'Araos', 25, 1),
(6727, '25574', 'Tor', 25, 1),
(6728, '25575', 'Areu', 25, 1),
(6729, '25576', 'Lleret', 25, 1),
(6730, '25576', 'Lleret', 25, 1),
(6731, '25577', 'Tavascan', 25, 1),
(6732, '25580', 'Esterri D\'aneu', 25, 1),
(6733, '25583', 'Tremp', 25, 1),
(6734, '25584', 'Tremp', 25, 1),
(6735, '25586', 'Isil', 25, 1),
(6736, '25587', 'Valencia D\'aneu', 25, 1),
(6737, '25588', 'Unarre', 25, 1),
(6738, '25589', 'Son', 25, 1),
(6739, '25590', 'Gerri De La Sal', 25, 1),
(6740, '25591', 'Sellui', 25, 1),
(6741, '25592', 'Useu', 25, 1),
(6742, '25592', 'Useu', 25, 1),
(6743, '25593', 'Mencui', 25, 1),
(6744, '25594', 'Surp', 25, 1),
(6745, '25594', 'Surp', 25, 1),
(6746, '25595', 'Tirvia', 25, 1),
(6747, '25595', 'Tirvia', 25, 1),
(6748, '25595', 'Tirvia', 25, 1),
(6749, '25595', 'Tirvia', 25, 1),
(6750, '25596', 'Escart', 25, 1),
(6751, '25597', 'Jou', 25, 1),
(6752, '25597', 'Jou', 25, 1),
(6753, '25598', 'Vaqueira', 25, 1),
(6754, '25599', 'Arties', 25, 1),
(6755, '25600', 'Balaguer', 25, 1),
(6756, '25610', 'Os De Balaguer', 25, 1),
(6757, '25611', 'Vilamajor D\'ager', 25, 1),
(6758, '25611', 'Vilamajor D\'ager', 25, 1),
(6759, '25611', 'Vilamajor D\'ager', 25, 1),
(6760, '25612', 'Vilanova De La Sal', 25, 1),
(6761, '25612', 'Vilanova De La Sal', 25, 1),
(6762, '25613', 'Sant LlorenÇ De Montgai', 25, 1),
(6763, '25614', 'Gerb', 25, 1),
(6764, '25615', 'MaÇana, La', 25, 1),
(6765, '25616', 'Montgai', 25, 1),
(6766, '25617', 'Sentiu De Sio, La', 25, 1),
(6767, '25617', 'Sentiu De Sio, La', 25, 1),
(6768, '25620', 'Tremp', 25, 1),
(6769, '25630', 'Talarn', 25, 1),
(6770, '25631', 'Cellers', 25, 1),
(6771, '25632', 'Vilamolat De Mur', 25, 1),
(6772, '25632', 'Vilamolat De Mur', 25, 1),
(6773, '25633', 'PuigmaÇana', 25, 1),
(6774, '25633', 'PuigmaÇana', 25, 1),
(6775, '25634', 'Puigverd (tremp)', 25, 1),
(6776, '25635', 'Eroles', 25, 1),
(6777, '25636', 'Santa Engracia', 25, 1),
(6778, '25637', 'Tendrui', 25, 1),
(6779, '25638', 'Tolo', 25, 1),
(6780, '25638', 'Tolo', 25, 1),
(6781, '25639', 'Sant Serni', 25, 1),
(6782, '25639', 'Sant Serni', 25, 1),
(6783, '25640', 'Academia General Basica De Suboficiales', 25, 1),
(6784, '25650', 'Isona', 25, 1),
(6785, '25651', 'Siall', 25, 1),
(6786, '25651', 'Siall', 25, 1),
(6787, '25652', 'Boixols', 25, 1),
(6788, '25653', 'Covet', 25, 1),
(6789, '25654', 'Vilamitjana', 25, 1),
(6790, '25655', 'Orcau', 25, 1),
(6791, '25656', 'Sant Roma D\'abella', 25, 1),
(6792, '25657', 'Llorda', 25, 1),
(6793, '25658', 'Gramenet (isona I Conca Della)', 25, 1),
(6794, '25660', 'Alcoletge', 25, 1),
(6795, '25670', 'Termens', 25, 1),
(6796, '25680', 'Vallfogona De Balaguer', 25, 1),
(6797, '25689', 'Gavet de la Conca', 25, 1),
(6798, '25690', 'Vilanova De La Barca', 25, 1),
(6799, '25691', 'Ager', 25, 1),
(6800, '25692', 'Regola, La', 25, 1),
(6801, '25692', 'Regola, La', 25, 1),
(6802, '25693', 'Sensui', 25, 1),
(6803, '25700', 'Seu D\'urgell, La', 25, 1),
(6804, '25710', 'Castellciutat', 25, 1),
(6805, '25711', 'Montferrer', 25, 1),
(6806, '25712', 'Vilamitjana Del Canto', 25, 1),
(6807, '25713', 'Nabiners', 25, 1),
(6808, '25714', 'Solans', 25, 1),
(6809, '25714', 'Solans', 25, 1),
(6810, '25714', 'Solans', 25, 1),
(6811, '25715', 'Bastida D\'hortons, La', 25, 1),
(6812, '25716', 'Sorribes (gosol)', 25, 1),
(6813, '25717', 'Tuixent', 25, 1),
(6814, '25717', 'Tuixent', 25, 1),
(6815, '25717', 'Tuixent', 25, 1),
(6816, '25717', 'Tuixent', 25, 1),
(6817, '25718', 'Vilanova De Banat', 25, 1),
(6818, '25719', 'Estamariu', 25, 1),
(6819, '25720', 'Bellver De Cerdanya', 25, 1),
(6820, '25721', 'Vilella (bellver De Cerdanya)', 25, 1),
(6821, '25721', 'Vilella (bellver De Cerdanya)', 25, 1),
(6822, '25721', 'Vilella (bellver De Cerdanya)', 25, 1),
(6823, '25722', 'Cava', 25, 1),
(6824, '25722', 'Cava', 25, 1),
(6825, '25722', 'Cava', 25, 1),
(6826, '25723', 'Toloriu', 25, 1),
(6827, '25724', 'Sant Marti Dels Castells', 25, 1),
(6828, '25724', 'Sant Marti Dels Castells', 25, 1),
(6829, '25725', 'Villec', 25, 1),
(6830, '25726', 'Viliella', 25, 1),
(6831, '25727', 'Prullans', 25, 1),
(6832, '25730', 'Artesa De Segre', 25, 1),
(6833, '25735', 'Vilanova De Meia', 25, 1),
(6834, '25736', 'Santa Maria De Meia', 25, 1),
(6835, '25736', 'Santa Maria De Meia', 25, 1),
(6836, '25737', 'Vernet', 25, 1),
(6837, '25737', 'Vernet', 25, 1),
(6838, '25737', 'Vernet', 25, 1),
(6839, '25737', 'Vernet', 25, 1),
(6840, '25737', 'Vernet', 25, 1),
(6841, '25738', 'Vall-llebrera', 25, 1),
(6842, '25738', 'Vall-llebrera', 25, 1),
(6843, '25739', 'Vilves', 25, 1),
(6844, '25740', 'Ponts', 25, 1),
(6845, '25746', 'Tossal, El', 25, 1),
(6846, '25747', 'Vilaplana', 25, 1),
(6847, '25747', 'Vilaplana', 25, 1),
(6848, '25748', 'Vilamajor De Cabanabona', 25, 1),
(6849, '25748', 'Vilamajor De Cabanabona', 25, 1),
(6850, '25748', 'Vilamajor De Cabanabona', 25, 1),
(6851, '25749', 'Vilanova De L\'aguda', 25, 1),
(6852, '25749', 'Vilanova De L\'aguda', 25, 1),
(6853, '25749', 'Vilanova De L\'aguda', 25, 1),
(6854, '25750', 'Tora', 25, 1),
(6855, '25751', 'Vallferosa', 25, 1),
(6856, '25752', 'Biosca', 25, 1),
(6857, '25753', 'Sanauja', 25, 1),
(6858, '25753', 'Sanauja', 25, 1),
(6859, '25772', 'Biosca', 25, 1),
(6860, '25790', 'Valldan, La', 25, 1),
(6861, '25790', 'Valldan, La', 25, 1),
(6862, '25790', 'Valldan, La', 25, 1),
(6863, '25790', 'Valldan, La', 25, 1),
(6864, '25791', 'Tiurana', 25, 1),
(6865, '25792', 'Mirambell', 25, 1),
(6866, '25793', 'Valldarques', 25, 1),
(6867, '25794', 'Vilar De Cabo, El', 25, 1),
(6868, '25794', 'Vilar De Cabo, El', 25, 1),
(6869, '25794', 'Vilar De Cabo, El', 25, 1),
(6870, '25794', 'Vilar De Cabo, El', 25, 1),
(6871, '25795', 'Vila-rubla', 25, 1),
(6872, '25795', 'Vila-rubla', 25, 1),
(6873, '25796', 'Pla De Sant Tirs, El', 25, 1),
(6874, '25797', 'Adrall', 25, 1),
(6875, '25798', 'Calbinya', 25, 1),
(6876, '25799', 'Sant Joan Fumat', 25, 1),
(6877, '26001', 'Logroño', 26, 1),
(6878, '26002', 'Logroño', 26, 1),
(6879, '26003', 'Logroño', 26, 1),
(6880, '26004', 'Logroño', 26, 1),
(6881, '26005', 'Logroño', 26, 1),
(6882, '26006', 'Logroño', 26, 1),
(6883, '26006', 'Logroño', 26, 1),
(6884, '26007', 'Logroño', 26, 1),
(6885, '26008', 'Logroño', 26, 1),
(6886, '26009', 'Logroño', 26, 1),
(6887, '26100', 'Torrecilla En Cameros', 26, 1),
(6888, '26100', 'Torrecilla En Cameros', 26, 1),
(6889, '26110', 'Nestares', 26, 1),
(6890, '26111', 'Pinillos', 26, 1),
(6891, '26111', 'Pinillos', 26, 1),
(6892, '26120', 'Albelda De Iregua', 26, 1),
(6893, '26121', 'Viguera', 26, 1),
(6894, '26121', 'Viguera', 26, 1),
(6895, '26122', 'Pradillo', 26, 1),
(6896, '26122', 'Pradillo', 26, 1),
(6897, '26123', 'Villanueva De Cameros', 26, 1),
(6898, '26124', 'Rasillo De Cameros, El', 26, 1),
(6899, '26124', 'Rasillo De Cameros, El', 26, 1),
(6900, '26124', 'Rasillo De Cameros, El', 26, 1),
(6901, '26125', 'Villoslada De Cameros', 26, 1),
(6902, '26126', 'San Andres', 26, 1),
(6903, '26130', 'Union De Los Tres Ejercitos', 26, 1),
(6904, '26130', 'Union De Los Tres Ejercitos', 26, 1),
(6905, '26130', 'Union De Los Tres Ejercitos', 26, 1),
(6906, '26131', 'Zenzano', 26, 1),
(6907, '26131', 'Zenzano', 26, 1),
(6908, '26131', 'Zenzano', 26, 1),
(6909, '26132', 'Trevijano', 26, 1),
(6910, '26132', 'Trevijano', 26, 1),
(6911, '26132', 'Trevijano', 26, 1),
(6912, '26132', 'Trevijano', 26, 1),
(6913, '26133', 'Velilla', 26, 1),
(6914, '26133', 'Velilla', 26, 1),
(6915, '26133', 'Velilla', 26, 1),
(6916, '26133', 'Velilla', 26, 1),
(6917, '26134', 'Torre En Cameros', 26, 1),
(6918, '26134', 'Torre En Cameros', 26, 1),
(6919, '26134', 'Torre En Cameros', 26, 1),
(6920, '26135', 'Laguna De Cameros', 26, 1),
(6921, '26135', 'Laguna De Cameros', 26, 1),
(6922, '26140', 'Lardero', 26, 1),
(6923, '26141', 'Alberite', 26, 1),
(6924, '26142', 'Villamediana De Iregua', 26, 1),
(6925, '26143', 'Murillo De Rio Leza', 26, 1),
(6926, '26144', 'Santa Lucia', 26, 1),
(6927, '26144', 'Santa Lucia', 26, 1),
(6928, '26144', 'Santa Lucia', 26, 1),
(6929, '26145', 'Ruedas De Ocon, Las', 26, 1),
(6930, '26146', 'Redal, El', 26, 1),
(6931, '26147', 'Pipaona', 26, 1),
(6932, '26148', 'Ocon', 26, 1),
(6933, '26151', 'Arrubal', 26, 1),
(6934, '26160', 'Recajo', 26, 1),
(6935, '26190', 'Nalda', 26, 1),
(6936, '26191', 'Sorzano', 26, 1),
(6937, '26200', 'Haro', 26, 1),
(6938, '26200', 'Haro', 26, 1),
(6939, '26210', 'Cihuri', 26, 1),
(6940, '26210', 'Cihuri', 26, 1),
(6941, '26210', 'Cihuri', 26, 1),
(6942, '26211', 'Tirgo', 26, 1),
(6943, '26211', 'Tirgo', 26, 1),
(6944, '26211', 'Tirgo', 26, 1),
(6945, '26212', 'Villaseca', 26, 1),
(6946, '26212', 'Villaseca', 26, 1),
(6947, '26212', 'Villaseca', 26, 1),
(6948, '26212', 'Villaseca', 26, 1),
(6949, '26213', 'Velasco', 26, 1),
(6950, '26213', 'Velasco', 26, 1),
(6951, '26213', 'Velasco', 26, 1),
(6952, '26213', 'Velasco', 26, 1),
(6953, '26214', 'Cuzcurritilla', 26, 1),
(6954, '26214', 'Cuzcurritilla', 26, 1),
(6955, '26215', 'Treviana', 26, 1),
(6956, '26216', 'San Millan De Yecora', 26, 1),
(6957, '26220', 'Ollauri', 26, 1),
(6958, '26221', 'Gimileo', 26, 1),
(6959, '26222', 'Rodezno', 26, 1),
(6960, '26223', 'Hormilleja', 26, 1),
(6961, '26224', 'Torrecilla Sobre Alesanco', 26, 1),
(6962, '26230', 'Casalarreina', 26, 1),
(6963, '26240', 'CastaÑares De Rioja', 26, 1),
(6964, '26241', 'BaÑos De Rioja', 26, 1),
(6965, '26250', 'Santo Domingo De La Calzada', 26, 1),
(6966, '26250', 'Santo Domingo De La Calzada', 26, 1),
(6967, '26256', 'Villalobar De Rioja', 26, 1),
(6968, '26257', 'Hervias', 26, 1),
(6969, '26257', 'Hervias', 26, 1),
(6970, '26258', 'Manzanares De Rioja', 26, 1),
(6971, '26258', 'Manzanares De Rioja', 26, 1),
(6972, '26259', 'Villarta Quintana', 26, 1),
(6973, '26259', 'Villarta Quintana', 26, 1),
(6974, '26259', 'Villarta Quintana', 26, 1),
(6975, '26260', 'Santurde', 26, 1),
(6976, '26261', 'Santurdejo', 26, 1),
(6977, '26261', 'Santurdejo', 26, 1),
(6978, '26270', 'Uyarra', 26, 1),
(6979, '26280', 'Ezcaray', 26, 1),
(6980, '26288', 'Zorraquin', 26, 1),
(6981, '26288', 'Zorraquin', 26, 1),
(6982, '26289', 'Zaldierna', 26, 1),
(6983, '26290', 'BriÑas', 26, 1),
(6984, '26291', 'Zarraton', 26, 1),
(6985, '26291', 'Zarraton', 26, 1),
(6986, '26291', 'Zarraton', 26, 1),
(6987, '26292', 'Villalba De Rioja', 26, 1),
(6988, '26292', 'Villalba De Rioja', 26, 1),
(6989, '26300', 'Najera', 26, 1),
(6990, '26310', 'Badaran', 26, 1),
(6991, '26311', 'Mahave', 26, 1),
(6992, '26311', 'Mahave', 26, 1),
(6993, '26311', 'Mahave', 26, 1),
(6994, '26311', 'Mahave', 26, 1),
(6995, '26312', 'Tricio', 26, 1),
(6996, '26312', 'Tricio', 26, 1),
(6997, '26312', 'Tricio', 26, 1),
(6998, '26313', 'UruÑuela', 26, 1),
(6999, '26314', 'Huercanos', 26, 1),
(7000, '26315', 'Santa Coloma', 26, 1),
(7001, '26315', 'Santa Coloma', 26, 1),
(7002, '26315', 'Santa Coloma', 26, 1),
(7003, '26315', 'Santa Coloma', 26, 1),
(7004, '26320', 'BaÑos De Rio Tobia', 26, 1),
(7005, '26321', 'Villaverde De Rioja', 26, 1),
(7006, '26321', 'Villaverde De Rioja', 26, 1),
(7007, '26321', 'Villaverde De Rioja', 26, 1),
(7008, '26321', 'Villaverde De Rioja', 26, 1),
(7009, '26321', 'Villaverde De Rioja', 26, 1),
(7010, '26321', 'Villaverde De Rioja', 26, 1),
(7011, '26322', 'Monasterio De Nuestra SeÑora De Valvanera', 26, 1),
(7012, '26322', 'Monasterio De Nuestra SeÑora De Valvanera', 26, 1),
(7013, '26323', 'Hormilla', 26, 1),
(7014, '26323', 'Hormilla', 26, 1),
(7015, '26324', 'Alesanco', 26, 1),
(7016, '26325', 'Villarejo', 26, 1),
(7017, '26325', 'Villarejo', 26, 1),
(7018, '26325', 'Villarejo', 26, 1),
(7019, '26325', 'Villarejo', 26, 1),
(7020, '26326', 'San Millan De La Cogolla', 26, 1),
(7021, '26327', 'Berceo', 26, 1),
(7022, '26328', 'Estollo', 26, 1),
(7023, '26329', 'Viniegra De Arriba', 26, 1),
(7024, '26329', 'Viniegra De Arriba', 26, 1),
(7025, '26329', 'Viniegra De Arriba', 26, 1),
(7026, '26329', 'Viniegra De Arriba', 26, 1),
(7027, '26329', 'Viniegra De Arriba', 26, 1),
(7028, '26329', 'Viniegra De Arriba', 26, 1),
(7029, '26329', 'Viniegra De Arriba', 26, 1),
(7030, '26330', 'Briones', 26, 1),
(7031, '26338', 'San Vicente De La Sonsierra', 26, 1),
(7032, '26339', 'Ribas De Tereso', 26, 1),
(7033, '26339', 'Ribas De Tereso', 26, 1),
(7034, '26340', 'San Asensio', 26, 1),
(7035, '26350', 'Cenicero', 26, 1),
(7036, '26359', 'Torremontalbo', 26, 1),
(7037, '26360', 'Fuenmayor', 26, 1),
(7038, '26370', 'Navarrete', 26, 1),
(7039, '26371', 'Ventosa', 26, 1),
(7040, '26371', 'Ventosa', 26, 1),
(7041, '26372', 'Hornos De Moncalvillo', 26, 1),
(7042, '26373', 'Daroca De Rioja', 26, 1),
(7043, '26374', 'Medrano', 26, 1),
(7044, '26375', 'Entrena', 26, 1),
(7045, '26376', 'Sojuela', 26, 1),
(7046, '26500', 'Murillo De Calahorra', 26, 1),
(7047, '26509', 'Alcanadre', 26, 1),
(7048, '26510', 'Pradejon', 26, 1),
(7049, '26511', 'Villar De Arnedo, El', 26, 1),
(7050, '26512', 'Tudelilla', 26, 1),
(7051, '26513', 'Ausejo', 26, 1),
(7052, '26520', 'Rincon De Olivedo O Las Casas', 26, 1),
(7053, '26525', 'Igea', 26, 1),
(7054, '26526', 'Cornago', 26, 1),
(7055, '26527', 'Ventas Del BaÑo', 26, 1),
(7056, '26527', 'Ventas Del BaÑo', 26, 1),
(7057, '26528', 'Valverde', 26, 1),
(7058, '26529', 'Valdegutur', 26, 1),
(7059, '26530', 'Aguilar Del Rio Alhama', 26, 1),
(7060, '26531', 'Inestrillas', 26, 1),
(7061, '26532', 'Valdemadera', 26, 1),
(7062, '26533', 'Navajun', 26, 1),
(7063, '26540', 'Alfaro', 26, 1),
(7064, '26550', 'Rincon De Soto', 26, 1),
(7065, '26559', 'Aldeanueva De Ebro', 26, 1),
(7066, '26560', 'Autol', 26, 1),
(7067, '26570', 'Quel', 26, 1),
(7068, '26580', 'Arnedo', 26, 1),
(7069, '26584', 'Herce', 26, 1),
(7070, '26585', 'Santa Eulalia Somera', 26, 1),
(7071, '26585', 'Santa Eulalia Somera', 26, 1),
(7072, '26586', 'Zarzosa', 26, 1),
(7073, '26586', 'Zarzosa', 26, 1),
(7074, '26586', 'Zarzosa', 26, 1),
(7075, '26587', 'Villarroya', 26, 1),
(7076, '26587', 'Villarroya', 26, 1),
(7077, '26587', 'Villarroya', 26, 1),
(7078, '26588', 'Carbonera', 26, 1),
(7079, '26588', 'Carbonera', 26, 1),
(7080, '26589', 'Prejano', 26, 1),
(7081, '26589', 'Prejano', 26, 1),
(7082, '27001', 'Lugo', 27, 1),
(7083, '27002', 'Lugo', 27, 1),
(7084, '27003', 'Lugo', 27, 1),
(7085, '27004', 'Lugo', 27, 1),
(7086, '27100', 'Fonsagrada (casco Urbano)', 27, 1),
(7087, '27110', 'Carballido (santa Maria) (a Fonsagrada)', 27, 1),
(7088, '27111', 'Neiro (san Pedro)', 27, 1),
(7089, '27112', 'Veiga De Logares (santa Maria)', 27, 1),
(7090, '27113', 'Vilar De CuiÑa', 27, 1),
(7091, '27113', 'Vilar De CuiÑa', 27, 1),
(7092, '27114', 'Vilabol De Suarna', 27, 1),
(7093, '27115', 'Cereixido (santiago) (fonsagrada)', 27, 1),
(7094, '27116', 'Vieiro (san Antonio) (fonsagrada, A)', 27, 1),
(7095, '27117', 'Lamas De Moreira', 27, 1),
(7096, '27118', 'San Martin De Suarna', 27, 1),
(7097, '27120', 'VilariÑo (santiago)', 27, 1),
(7098, '27122', 'Villavad', 27, 1),
(7099, '27123', 'Furis De Arriba', 27, 1),
(7100, '27124', 'Vilalle', 27, 1),
(7101, '27125', 'Uriz (sta Maria) (castroverde)', 27, 1),
(7102, '27126', 'Seres (san Pedro)', 27, 1),
(7103, '27127', 'Rebordaos (san Xurxo) (castroverde)', 27, 1),
(7104, '27128', 'Montecubeiro (san Cibrao)', 27, 1),
(7105, '27129', 'Pena (santa Maria Madanela) (castroverde)', 27, 1),
(7106, '27130', 'Esperela, A (san Pedro)', 27, 1),
(7107, '27131', 'Corneas', 27, 1),
(7108, '27132', 'Pousada (san Lourenzo) (baleira)', 27, 1),
(7109, '27133', 'Lastra, A (san Xoan)', 27, 1),
(7110, '27134', 'Rio (san Pedro) (fonsagrada)', 27, 1),
(7111, '27135', 'PiÑeira (santa Maria) (fonsagrada)', 27, 1),
(7112, '27136', 'Pacios (santa Maria) (fonsagrada)', 27, 1),
(7113, '27140', 'Recimil', 27, 1),
(7114, '27141', 'Romean', 27, 1),
(7115, '27142', 'Soutomerille', 27, 1),
(7116, '27143', 'Pumarega, A', 27, 1),
(7117, '27144', 'Mirandela', 27, 1),
(7118, '27145', 'Folgosa (san Martin)', 27, 1),
(7119, '27146', 'Souto De Torres', 27, 1),
(7120, '27146', 'Souto De Torres', 27, 1),
(7121, '27150', 'Sobrada', 27, 1),
(7122, '27151', 'Taboi', 27, 1),
(7123, '27152', 'Vilela (santiago) (otero De Rey)', 27, 1),
(7124, '27152', 'Vilela (santiago) (otero De Rey)', 27, 1),
(7125, '27153', 'San Clodio De Aguiar (san Clodio)', 27, 1),
(7126, '27154', 'Silvarrei', 27, 1),
(7127, '27155', 'Seivane', 27, 1),
(7128, '27156', 'Ousa', 27, 1),
(7129, '27157', 'Vicinte', 27, 1),
(7130, '27160', 'Pena (san Xoan) (lugo)', 27, 1),
(7131, '27161', 'Santa Comba', 27, 1),
(7132, '27162', 'Queizan (santa Maria) (corgo)', 27, 1),
(7133, '27163', 'Sabarei', 27, 1),
(7134, '27164', 'Marei', 27, 1),
(7135, '27166', 'Paramo (san Miguel) (castroverde)', 27, 1),
(7136, '27168', 'Pedrafita (san Miguel) (corgo)', 27, 1),
(7137, '27169', 'San Pedro Felix', 27, 1),
(7138, '27170', 'Portomarin (casco Urbano)', 27, 1),
(7139, '27177', 'Vilaxuste', 27, 1),
(7140, '27178', 'Vilarbasin', 27, 1),
(7141, '27179', 'Portomar', 27, 1),
(7142, '27180', 'SoÑar', 27, 1),
(7143, '27181', 'Ribas De MiÑo (san Mamede) (lugo)', 27, 1),
(7144, '27181', 'Ribas De MiÑo (san Mamede) (lugo)', 27, 1),
(7145, '27182', 'Campo (san Xoan)(lugo)', 27, 1),
(7146, '27183', 'Zolle', 27, 1),
(7147, '27184', 'Mosteiro (santa Maria) (guntin)', 27, 1),
(7148, '27185', 'San Roman', 27, 1),
(7149, '27185', 'San Roman', 27, 1),
(7150, '27186', 'PiÑeiras', 27, 1),
(7151, '27187', 'Recelle', 27, 1),
(7152, '27188', 'Saa (santiago) (lugo)', 27, 1),
(7153, '27188', 'Saa (santiago) (lugo)', 27, 1),
(7154, '27190', 'Coeo (san Vicente)', 27, 1),
(7155, '27190', 'Coeo (san Vicente)', 27, 1),
(7156, '27191', 'Rubias', 27, 1),
(7157, '27192', 'Lugo', 27, 1),
(7158, '27200', 'Palas De Rei (casco Urbano)', 27, 1),
(7159, '27203', 'Sambreixo (palas De Rey)', 27, 1),
(7160, '27204', 'Orosa', 27, 1),
(7161, '27205', 'Ulloa', 27, 1),
(7162, '27206', 'Salaia', 27, 1),
(7163, '27207', 'Pidre', 27, 1),
(7164, '27208', 'Quindimil', 27, 1),
(7165, '27209', 'Vilareda', 27, 1),
(7166, '27210', 'Lugo', 27, 1),
(7167, '27210', 'Lugo', 27, 1),
(7168, '27211', 'Villermao (san Miguel)', 27, 1),
(7169, '27212', 'Rio (san Mamede) (portomarin)', 27, 1),
(7170, '27213', 'Naron', 27, 1),
(7171, '27214', 'Soengas', 27, 1),
(7172, '27215', 'Vilanova (san Pedro) (m0nterroso)', 27, 1),
(7173, '27216', 'Vilar De Donas', 27, 1),
(7174, '27217', 'Mosteiro (santiago) (palas De Rey)', 27, 1),
(7175, '27220', 'Friol (casco Urbano)', 27, 1),
(7176, '27220', 'Friol (casco Urbano)', 27, 1),
(7177, '27226', 'Trasmonte', 27, 1),
(7178, '27227', 'Xia', 27, 1),
(7179, '27228', 'Silvela', 27, 1),
(7180, '27229', 'Seixon', 27, 1),
(7181, '27230', 'Torible', 27, 1),
(7182, '27231', 'Vilacha De Mera', 27, 1),
(7183, '27232', 'Bacurin', 27, 1),
(7184, '27233', 'Vilamaior De Negral', 27, 1),
(7185, '27233', 'Vilamaior De Negral', 27, 1),
(7186, '27234', 'Sirvian', 27, 1),
(7187, '27235', 'San Cibrao (friol)', 27, 1),
(7188, '27240', 'Meira (santa Maria)', 27, 1),
(7189, '27241', 'Seixosmil (san Isidro)', 27, 1),
(7190, '27243', 'Vaos, Os (san Xoan)', 27, 1),
(7191, '27244', 'Santalla (ribeira De Piquin)', 27, 1),
(7192, '27245', 'San Xurxo De Piquin (ribeira De Piquin)', 27, 1),
(7193, '27246', 'Saldanxe', 27, 1),
(7194, '27247', 'Lua', 27, 1),
(7195, '27247', 'Lua', 27, 1),
(7196, '27248', 'PiÑeiro (san Cosme) (pastoriza)', 27, 1),
(7197, '27250', 'Santa Locaia (san Pedro)', 27, 1),
(7198, '27256', 'Pacios (el Salvador) (castro De Rey)', 27, 1),
(7199, '27257', 'Prevesos', 27, 1),
(7200, '27258', 'Quintela', 27, 1),
(7201, '27259', 'Viladonga (santiago)', 27, 1),
(7202, '27260', 'Ribeiras De Lea', 27, 1),
(7203, '27266', 'Loentia', 27, 1),
(7204, '27267', 'Triaba', 27, 1),
(7205, '27268', 'Mos', 27, 1),
(7206, '27269', 'Duarria', 27, 1),
(7207, '27270', 'Silva', 27, 1),
(7208, '27271', 'Orizon', 27, 1),
(7209, '27272', 'Fraialde', 27, 1),
(7210, '27273', 'Cirio', 27, 1),
(7211, '27274', 'Valonga', 27, 1),
(7212, '27275', 'Milleiros (santiago) (pol)', 27, 1),
(7213, '27276', 'Martin (santiago) (baleira)', 27, 1),
(7214, '27277', 'Retizos', 27, 1),
(7215, '27278', 'Libran', 27, 1),
(7216, '27279', 'Suegos (santa Eulalia) (pol)', 27, 1),
(7217, '27280', 'Torneiros', 27, 1),
(7218, '27283', 'Ferreiros (san MartiÑo)', 27, 1),
(7219, '27286', 'Vian (santa Maria)', 27, 1),
(7220, '27287', 'Pastoriza, A (casco Urbano)', 27, 1),
(7221, '27289', 'Teixeiro', 27, 1),
(7222, '27289', 'Teixeiro', 27, 1),
(7223, '27290', 'Pias', 27, 1),
(7224, '27293', 'Meda, A', 27, 1),
(7225, '27293', 'Meda, A', 27, 1),
(7226, '27294', 'Lugo', 27, 1),
(7227, '27296', 'Meilan (santiago) (lugo)', 27, 1),
(7228, '27297', 'Lugo', 27, 1),
(7229, '27298', 'Lugo', 27, 1),
(7230, '27299', 'Villalvite', 27, 1),
(7231, '27299', 'Villalvite', 27, 1),
(7232, '27300', 'Lagostelle (san Xoan)', 27, 1),
(7233, '27305', 'Trasparga', 27, 1),
(7234, '27306', 'Buriz (san Pedro)', 27, 1),
(7235, '27307', 'Vilares, Os (san Vicenzo)', 27, 1),
(7236, '27308', 'Villar (santa Maria) (guitiriz)', 27, 1),
(7237, '27309', 'Lagostelle (santa Marina)', 27, 1),
(7238, '27310', 'Ribas De Sil (san Clodio)', 27, 1),
(7239, '27317', 'Torbeo', 27, 1),
(7240, '27318', 'Sotordei', 27, 1),
(7241, '27320', 'Quiroga (san MartiÑo)', 27, 1),
(7242, '27324', 'Seoane (san Xoan) (folgoso Do Caurel)', 27, 1),
(7243, '27325', 'Villamor (resto Parroquia San Miguel)(folgoso Do C', 27, 1),
(7244, '27326', 'Folgoso do Courel', 27, 1),
(7245, '27327', 'Folgoso do Courel', 27, 1),
(7246, '27328', 'VisuÑa', 27, 1),
(7247, '27328', 'VisuÑa', 27, 1),
(7248, '27329', 'Vilarmel', 27, 1),
(7249, '27330', 'Pobra De Brollon, A (casco Urbano)', 27, 1),
(7250, '27331', 'Pobra De Brollon, A (estacion)', 27, 1),
(7251, '27332', 'Castrosante', 27, 1),
(7252, '27333', 'Veiga (san Xian) (pobra De Brollon)', 27, 1),
(7253, '27334', 'Fornelas', 27, 1),
(7254, '27335', 'Ferreirua', 27, 1),
(7255, '27336', 'Saa (santa Maria)(pobra De Brollon)', 27, 1),
(7256, '27338', 'Salcedo', 27, 1),
(7257, '27339', 'Parada Dos Montes', 27, 1),
(7258, '27339', 'Parada Dos Montes', 27, 1),
(7259, '27340', 'Boveda (san MartiÑo)(boveda)', 27, 1),
(7260, '27341', 'Vila De Mouros', 27, 1),
(7261, '27342', 'Rubian De Cima (incio)', 27, 1),
(7262, '27343', 'Tuimil', 27, 1),
(7263, '27344', 'Mosteiro (san Pelaxio)(boveda)', 27, 1),
(7264, '27345', 'Vilasouto', 27, 1),
(7265, '27346', 'Viso, O (santa Cristina)', 27, 1),
(7266, '27347', 'Trascastro (santalla)', 27, 1),
(7267, '27347', 'Trascastro (santalla)', 27, 1),
(7268, '27348', 'Laiosa (san MartiÑo)', 27, 1),
(7269, '27349', 'Villalpape', 27, 1),
(7270, '27350', 'Rubian (santiago) (boveda)', 27, 1),
(7271, '27359', 'Villarbujan', 27, 1),
(7272, '27360', 'Vilarello (san Pedro) (lancara)', 27, 1),
(7273, '27362', 'San Andres Da Ribeira (san Pedro)', 27, 1),
(7274, '27363', 'Vileiriz', 27, 1),
(7275, '27364', 'Moscan', 27, 1),
(7276, '27366', 'Trasliste', 27, 1),
(7277, '27367', 'Vilaleo', 27, 1),
(7278, '27368', 'Muro', 27, 1),
(7279, '27369', 'Vilambran', 27, 1),
(7280, '27369', 'Vilambran', 27, 1),
(7281, '27370', 'Rabade (casco Urbano)', 27, 1),
(7282, '27370', 'Rabade (casco Urbano)', 27, 1),
(7283, '27372', 'Valdomar', 27, 1),
(7284, '27372', 'Valdomar', 27, 1),
(7285, '27373', 'Viris', 27, 1),
(7286, '27373', 'Viris', 27, 1),
(7287, '27374', 'Caboi (san MartiÑo)', 27, 1),
(7288, '27375', 'Xoiban', 27, 1),
(7289, '27375', 'Xoiban', 27, 1),
(7290, '27375', 'Xoiban', 27, 1),
(7291, '27376', 'Santa Cristina (san Xiao)', 27, 1),
(7292, '27377', 'Xustas', 27, 1),
(7293, '27378', 'Roas', 27, 1),
(7294, '27379', 'Tamoga', 27, 1),
(7295, '27380', 'Parga (santo Estebo)', 27, 1),
(7296, '27388', 'San Breixo De Parga', 27, 1),
(7297, '27389', 'Pedrafita (san Mamede) (guitiriz)', 27, 1),
(7298, '27390', 'Vilaster', 27, 1),
(7299, '27391', 'Quinta De Lor', 27, 1),
(7300, '27391', 'Quinta De Lor', 27, 1),
(7301, '27392', 'Oural, O', 27, 1),
(7302, '27400', 'Monforte De Lemos (casco Urbano)', 27, 1),
(7303, '27400', 'Monforte De Lemos (casco Urbano)', 27, 1),
(7304, '27410', 'Valverde', 27, 1),
(7305, '27411', 'Reigada', 27, 1),
(7306, '27412', 'Sindran', 27, 1),
(7307, '27413', 'Vilacha (san Mamede) (puebla De Brollon)', 27, 1),
(7308, '27413', 'Vilacha (san Mamede) (puebla De Brollon)', 27, 1),
(7309, '27414', 'Penela, A', 27, 1),
(7310, '27415', 'Villamarin', 27, 1),
(7311, '27416', 'Marcelle', 27, 1),
(7312, '27417', 'Baamorto', 27, 1),
(7313, '27418', 'Vide, A (san Cibrao)', 27, 1),
(7314, '27419', 'Toldaos (san Xoan) (panton)', 27, 1),
(7315, '27419', 'Toldaos (san Xoan) (panton)', 27, 1),
(7316, '27420', 'PiÑeira (san MartiÑo) (monforte)', 27, 1),
(7317, '27421', 'Barantes', 27, 1),
(7318, '27422', 'Santiorxo (san Xurxo)', 27, 1),
(7319, '27423', 'Lobios', 27, 1),
(7320, '27424', 'Doade', 27, 1),
(7321, '27425', 'Refoxo (santo Estevo)', 27, 1),
(7322, '27430', 'Sios', 27, 1),
(7323, '27437', 'Serode', 27, 1),
(7324, '27438', 'Panton (san MartiÑo)', 27, 1),
(7325, '27439', 'Vilar De Ortelle', 27, 1),
(7326, '27440', 'Canaval', 27, 1),
(7327, '27450', 'Vilamelle', 27, 1),
(7328, '27460', 'Sober (casco Urbano)', 27, 1),
(7329, '27466', 'Vilaescura (santa Maria)', 27, 1),
(7330, '27468', 'Neiras', 27, 1),
(7331, '27469', 'LiÑaran', 27, 1),
(7332, '27470', 'Pombeiro', 27, 1),
(7333, '27500', 'Chantada (casco Urbano)', 27, 1),
(7334, '27510', 'Muradelle (san Paio)', 27, 1),
(7335, '27511', 'Monte, O (san Miguel)', 27, 1),
(7336, '27512', 'Mato (san Xulian)(chantada)', 27, 1),
(7337, '27513', 'Viana (san Pedro)', 27, 1),
(7338, '27514', 'Vilauxe (el Salvador)', 27, 1),
(7339, '27515', 'SariÑa, A (san Vicente)', 27, 1),
(7340, '27515', 'SariÑa, A (san Vicente)', 27, 1),
(7341, '27516', 'Pesqueiras', 27, 1),
(7342, '27517', 'Sabadelle (santa Maria) (chantada)', 27, 1),
(7343, '27518', 'Mariz (san MartiÑo) (chantada)', 27, 1),
(7344, '27519', 'Viana (santa Cruz)', 27, 1),
(7345, '27520', 'Lousada (santiago) (carballedo)', 27, 1),
(7346, '27527', 'Lobelle', 27, 1),
(7347, '27528', 'Temes', 27, 1),
(7348, '27529', 'BuciÑos (san Miguel)', 27, 1),
(7349, '27530', 'Lousada (san Mamede) (carballedo)', 27, 1),
(7350, '27531', 'Vilaquinte (santa Maria) (carballedo)', 27, 1),
(7351, '27532', 'Erbedeiro (san Pedro)', 27, 1),
(7352, '27532', 'Erbedeiro (san Pedro)', 27, 1),
(7353, '27533', 'Pradeda (santiago) (carballedo)', 27, 1),
(7354, '27533', 'Pradeda (santiago) (carballedo)', 27, 1),
(7355, '27540', 'SaviÑao, O (capitalidad', 27, 1),
(7356, '27543', 'Vilaesteva (san Salvador) (saviÑao)', 27, 1),
(7357, '27544', 'Reiriz (sta Maria) (saviÑao)', 27, 1),
(7358, '27545', 'Segan', 27, 1),
(7359, '27546', 'Vilacaiz', 27, 1),
(7360, '27547', 'Xuvencos', 27, 1),
(7361, '27548', 'Rosende (santa MariÑa) (saviÑao)', 27, 1),
(7362, '27549', 'Vilasante (san Salvador) (saviÑao)', 27, 1),
(7363, '27549', 'Vilasante (san Salvador) (saviÑao)', 27, 1),
(7364, '27550', 'Taboada (casco Urbano)', 27, 1),
(7365, '27554', 'Frade', 27, 1),
(7366, '27555', 'Taboada Dos Freires', 27, 1),
(7367, '27556', 'Mourulle', 27, 1),
(7368, '27557', 'Xian', 27, 1),
(7369, '27558', 'VilameÑe', 27, 1),
(7370, '27559', 'PiÑeira (santa Maria) (taboada)', 27, 1),
(7371, '27560', 'Viloide', 27, 1),
(7372, '27568', 'Sirgal', 27, 1),
(7373, '27569', 'Sucastro', 27, 1),
(7374, '27570', 'Antas De Ulla (san Xoan)', 27, 1),
(7375, '27576', 'Castro De Amarante (santo Estebo)', 27, 1),
(7376, '27577', 'Reboredo', 27, 1),
(7377, '27578', 'Queixeiro', 27, 1),
(7378, '27579', 'Vilapoupre (san MartiÑo)', 27, 1),
(7379, '27590', 'Seoane (el Salvador) (monforte)', 27, 1),
(7380, '27591', 'Tor (san Xulian)', 27, 1),
(7381, '27592', 'Moreda (san Salvador)(monforte)', 27, 1),
(7382, '27592', 'Moreda (san Salvador)(monforte)', 27, 1),
(7383, '27593', 'Toiriz (santalla)', 27, 1),
(7384, '27594', 'Ribas De MiÑo (san Esteban) (saviÑao)', 27, 1),
(7385, '27595', 'Veiga (san Xoan) (chantada)', 27, 1),
(7386, '27596', 'Vilela (san Miguel) (taboada)', 27, 1),
(7387, '27600', 'Sarria (casco Urbano)', 27, 1),
(7388, '27610', 'Lier', 27, 1),
(7389, '27611', 'Vilaragunte', 27, 1),
(7390, '27612', 'Pinza, A', 27, 1),
(7391, '27612', 'Pinza, A', 27, 1),
(7392, '27613', 'Vilamaior', 27, 1),
(7393, '27614', 'Vilapedre (san Miguel) (sarria)', 27, 1),
(7394, '27614', 'Vilapedre (san Miguel) (sarria)', 27, 1),
(7395, '27615', 'Toldaos (san Vicente) (lancara)', 27, 1),
(7396, '27615', 'Toldaos (san Vicente) (lancara)', 27, 1),
(7397, '27616', 'Barbadelo', 27, 1),
(7398, '27617', 'Vilar (santa Maria) (sarria)', 27, 1),
(7399, '27618', 'Reimondez', 27, 1),
(7400, '27619', 'Vilar De Sarria', 27, 1),
(7401, '27620', 'Samos (santa Xertrude)', 27, 1),
(7402, '27623', 'Gundriz', 27, 1),
(7403, '27624', 'Freixo (san Silvestre) (samos)', 27, 1),
(7404, '27625', 'Louzara (san Cristobo)', 27, 1),
(7405, '27626', 'Santalla (san Xose) (samos)', 27, 1),
(7406, '27627', 'Zoo', 27, 1),
(7407, '27628', 'Romelle', 27, 1),
(7408, '27630', 'Triacastela (casco Urbano)', 27, 1),
(7409, '27631', 'Carballo (san Xil)', 27, 1),
(7410, '27631', 'Carballo (san Xil)', 27, 1),
(7411, '27632', 'Vilavella', 27, 1),
(7412, '27633', 'Real, O (san Cristovo)', 27, 1),
(7413, '27633', 'Real, O (san Cristovo)', 27, 1),
(7414, '27634', 'Monte (santa Maria)(triacastela)', 27, 1),
(7415, '27635', 'Teivilide (san Xiao)', 27, 1),
(7416, '27636', 'Formigueiros', 27, 1),
(7417, '27637', 'Pena (santa Maria) (sarria)', 27, 1),
(7418, '27638', 'Reiriz (san Estebo)', 27, 1),
(7419, '27639', 'Toldaos (el Salvador) (triacastela)', 27, 1),
(7420, '27640', 'Becerrea (casco Urbano)', 27, 1),
(7421, '27646', 'Tores (san Xoan)', 27, 1),
(7422, '27647', 'Tortes', 27, 1),
(7423, '27648', 'Furco (san Xoan) (becerrea)', 27, 1),
(7424, '27649', 'Guillen', 27, 1),
(7425, '27650', 'Proba, A', 27, 1),
(7426, '27650', 'Proba, A', 27, 1),
(7427, '27651', 'Queizan (santiago) (navia De Suarna)', 27, 1),
(7428, '27652', 'Rao', 27, 1),
(7429, '27653', 'Son (santa Maria)', 27, 1),
(7430, '27654', 'Ribeira, A (san Estebo)', 27, 1),
(7431, '27655', 'Sabane (san Xoan)', 27, 1),
(7432, '27656', 'Barcia (san Miguel)', 27, 1),
(7433, '27657', 'Galegos (santiago)', 27, 1),
(7434, '27658', 'Mosteiro (el Salvador) (navia De S.)', 27, 1),
(7435, '27659', 'Vilarpandin', 27, 1),
(7436, '27659', 'Vilarpandin', 27, 1),
(7437, '27660', 'Quinta (santa Eulalia) (becerrea)', 27, 1),
(7438, '27661', 'Vilaiz (santiago)', 27, 1),
(7439, '27661', 'Vilaiz (santiago)', 27, 1),
(7440, '27662', 'Vilaver', 27, 1),
(7441, '27663', 'Vilamane (santa Marria)', 27, 1),
(7442, '27664', 'San Roman De Cervantes (san Roman)', 27, 1),
(7443, '27664', 'San Roman De Cervantes (san Roman)', 27, 1),
(7444, '27665', 'Villasante (santiago) (cervantes)', 27, 1),
(7445, '27666', 'Vilaspasantes (san Xoan)', 27, 1),
(7446, '27667', 'Pando, O', 27, 1),
(7447, '27668', 'Ouselle (san Cosme)', 27, 1),
(7448, '27670', 'Pedrafita Do Cebreiro', 27, 1),
(7449, '27671', 'Zanfoga', 27, 1),
(7450, '27672', 'Louzarela', 27, 1),
(7451, '27673', 'Pacios (san Lourenzo) (pedrafita)', 27, 1),
(7452, '27675', 'Noceda (san Xoan) (nogais, As)', 27, 1),
(7453, '27676', 'Doncos', 27, 1),
(7454, '27677', 'Vilaicente (san Xoan)', 27, 1),
(7455, '27677', 'Vilaicente (san Xoan)', 27, 1),
(7456, '27677', 'Vilaicente (san Xoan)', 27, 1),
(7457, '27678', 'Morcelle', 27, 1),
(7458, '27679', 'Cruzul', 27, 1),
(7459, '27680', 'Vilartelin', 27, 1),
(7460, '27685', 'Vilarpunteiro', 27, 1),
(7461, '27686', 'San Esteban (baralla)', 27, 1),
(7462, '27687', 'Teixeira', 27, 1),
(7463, '27688', 'Sixirei (san Pedro)', 27, 1),
(7464, '27689', 'Vale', 27, 1),
(7465, '27690', 'San Antolin', 27, 1),
(7466, '27691', 'Vilouzan', 27, 1),
(7467, '27692', 'Cedron', 27, 1),
(7468, '27693', 'Touville', 27, 1),
(7469, '27694', 'Vilouta', 27, 1),
(7470, '27695', 'Penamaior (santa Marina De San Lorenzo)', 27, 1),
(7471, '27695', 'Penamaior (santa Marina De San Lorenzo)', 27, 1),
(7472, '27696', 'Neira De Rey (san Miguel)', 27, 1),
(7473, '27697', 'Penarrubia', 27, 1),
(7474, '27698', 'Fontaron (santi Spiritus)', 27, 1),
(7475, '27699', 'Vilaesteva (santa Maria) (lancara)', 27, 1),
(7476, '27700', 'Ribadeo (casco Urbano)', 27, 1),
(7477, '27700', 'Ribadeo (casco Urbano)', 27, 1),
(7478, '27710', 'Vilaselan', 27, 1),
(7479, '27711', 'Couxela (santiago)', 27, 1),
(7480, '27712', 'Vilaosende', 27, 1),
(7481, '27713', 'Obe (san Xoan)', 27, 1),
(7482, '27714', 'Cubelas (san Vicente)', 27, 1),
(7483, '27715', 'Rinlo', 27, 1),
(7484, '27720', 'Pontenova, A (sagrado Corazon)', 27, 1),
(7485, '27721', 'Vilaboa (san Xulian)', 27, 1),
(7486, '27722', 'Bogo', 27, 1),
(7487, '27723', 'Xudan', 27, 1),
(7488, '27724', 'Vilarmide, O (salvador)', 27, 1),
(7489, '27725', 'Vilamea (san Vicente)', 27, 1),
(7490, '27726', 'Rececende (santo Estebo)', 27, 1),
(7491, '27727', 'Vilaouruz', 27, 1),
(7492, '27728', 'Conforto', 27, 1),
(7493, '27729', 'Vilaoudriz (santiago)', 27, 1),
(7494, '27730', 'Villarente', 27, 1),
(7495, '27737', 'Romariz', 27, 1),
(7496, '27738', 'Quende', 27, 1),
(7497, '27740', 'MondoÑedo (casco Urbano)', 27, 1),
(7498, '27742', 'Santa Maria Maior (santa Maria)', 27, 1),
(7499, '27743', 'Muxueira, A', 27, 1),
(7500, '27744', 'Riotorto (san Pedro)', 27, 1),
(7501, '27745', 'Santa Marta De Meilan (riotorto)', 27, 1),
(7502, '27747', 'Viloalle (santa Maria)', 27, 1),
(7503, '27748', 'Carme, O (nosa SeÑora Do Carme)', 27, 1),
(7504, '27749', 'Oiran (santo Estevo)', 27, 1),
(7505, '27750', 'Santo Adrao De Lourenza (santo Adrao)', 27, 1),
(7506, '27751', 'San Xurxo De Lourenza (san Xurxo)', 27, 1),
(7507, '27752', 'Vilamor (santa Maria) (mondoÑedo)', 27, 1),
(7508, '27760', 'Vilanova (lourenza)', 27, 1),
(7509, '27765', 'Vidal (san Mateo)', 27, 1),
(7510, '27766', 'Valboa, A (santa Maria Madanela)', 27, 1),
(7511, '27767', 'Vilapena', 27, 1),
(7512, '27768', 'Fornea, A (santo Estevo)', 27, 1),
(7513, '27770', 'Valadouro, O (casco Urbano)', 27, 1),
(7514, '27773', 'Adelan', 27, 1),
(7515, '27774', 'Lagoa, A (san Vicente) (alfoz)', 27, 1),
(7516, '27775', 'San Pedro De Mor', 27, 1),
(7517, '27776', 'Castro De Ouro, O (san Salvador)', 27, 1),
(7518, '27777', 'Santo Tome De Recare (santo Tome)', 27, 1),
(7519, '27778', 'Vilacampa', 27, 1),
(7520, '27778', 'Vilacampa', 27, 1),
(7521, '27779', 'Moucide (santo Estebo)', 27, 1),
(7522, '27780', 'Foz (santiago)', 27, 1),
(7523, '27785', 'Santa Cilla Do Valadouro (santa Cilla)', 27, 1),
(7524, '27786', 'San Acisclo Do Valadouro (foz)', 27, 1),
(7525, '27787', 'San MartiÑo De MondoÑedo (foz)', 27, 1),
(7526, '27788', 'Vilaronte (san Xoan)', 27, 1),
(7527, '27789', 'Fazouro (santiago)', 27, 1),
(7528, '27790', 'Barreiros (san Cosme) (barreiros)', 27, 1),
(7529, '27791', 'Sasdonigas (san Lourenzo)', 27, 1),
(7530, '27792', 'Benquerencia', 27, 1),
(7531, '27793', 'Reinante (san Miguel)', 27, 1),
(7532, '27794', 'Reinante (santiago)', 27, 1),
(7533, '27796', 'Devesa, A (santalla)', 27, 1),
(7534, '27797', 'Vilaframil', 27, 1),
(7535, '27798', 'Vilamartin Pequeno', 27, 1),
(7536, '27800', 'Vilalba (casco Urbano)', 27, 1),
(7537, '27810', 'Sancobade (santiago) (vilalba)', 27, 1),
(7538, '27811', 'Nete', 27, 1),
(7539, '27812', 'Oleiros (san Mamede)', 27, 1),
(7540, '27813', 'Torre (santa Maria) (villalba)', 27, 1),
(7541, '27814', 'Belesar (san Martin) (villalba)', 27, 1),
(7542, '27815', 'Costa (san Simon) (vilalba)', 27, 1),
(7543, '27816', 'Vilapedre (san Mamede)', 27, 1),
(7544, '27817', 'Balsa, A (santa Maria) (muras)', 27, 1),
(7545, '27818', 'Santo, O', 27, 1),
(7546, '27820', 'Mourence', 27, 1),
(7547, '27821', 'Gondaisque', 27, 1),
(7548, '27822', 'Distriz (san Martin) (villalba)', 27, 1),
(7549, '27823', 'Tardade', 27, 1),
(7550, '27824', 'Cazas', 27, 1),
(7551, '27825', 'Codesido', 27, 1),
(7552, '27826', 'Moman (san Mamede)(xermade)', 27, 1),
(7553, '27830', 'Santaballa', 27, 1),
(7554, '27832', 'Candamil', 27, 1),
(7555, '27833', 'Xermade', 27, 1),
(7556, '27834', 'Cabreiros', 27, 1),
(7557, '27835', 'Roupar (san Pedro Fiz)', 27, 1),
(7558, '27836', 'Sisto, O (santa Maria) (muras)', 27, 1),
(7559, '27837', 'Viveiron, O (muras)', 27, 1),
(7560, '27840', 'Goiriz', 27, 1),
(7561, '27841', 'Roman', 27, 1),
(7562, '27842', 'Samarugo', 27, 1),
(7563, '27843', 'Corvelle (san Bartolome) (vilalba)', 27, 1),
(7564, '27843', 'Corvelle (san Bartolome) (vilalba)', 27, 1),
(7565, '27845', 'Castromayor (san Juan) (abadin)', 27, 1),
(7566, '27849', 'Candia', 27, 1),
(7567, '27850', 'Viveiro (casco Urbano)', 27, 1),
(7568, '27860', 'Vicedo, O', 27, 1),
(7569, '27861', 'Valle', 27, 1),
(7570, '27861', 'Valle', 27, 1),
(7571, '27863', 'Faro (san Xiao)', 27, 1),
(7572, '27864', 'Chavin', 27, 1),
(7573, '27865', 'Xerdiz', 27, 1),
(7574, '27865', 'Xerdiz', 27, 1),
(7575, '27866', 'Valcarria (santo Estevo)', 27, 1),
(7576, '27866', 'Valcarria (santo Estevo)', 27, 1),
(7577, '27867', 'San Pantaleon De Cabanas (san Pantaleon) (ourol)', 27, 1),
(7578, '27867', 'San Pantaleon De Cabanas (san Pantaleon) (ourol)', 27, 1),
(7579, '27868', 'Riobarba', 27, 1),
(7580, '27869', 'Vieiro (san Cibrao) (viveiro)', 27, 1),
(7581, '27870', 'Xove (san Bartolo)', 27, 1),
(7582, '27876', 'Moras (san Clemente)', 27, 1),
(7583, '27877', 'Xuances', 27, 1),
(7584, '27878', 'Sumoas (santo Estevo)', 27, 1),
(7585, '27879', 'Rigueira, A (san Miguel)', 27, 1),
(7586, '27880', 'Burela', 27, 1),
(7587, '27888', 'Trasbar', 27, 1),
(7588, '27889', 'San Roman De Vilaestrofe (san Roman)', 27, 1),
(7589, '27890', 'San Cibrao (cervo)', 27, 1),
(7590, '27891', 'Sargadelos', 27, 1),
(7591, '27892', 'Cordido', 27, 1),
(7592, '27893', 'Nois', 27, 1),
(7593, '28000', 'Valdemoro (ver Callejero)', 28, 1),
(7594, '28001', 'Madrid', 28, 1),
(7595, '28002', 'Madrid', 28, 1),
(7596, '28003', 'Madrid', 28, 1),
(7597, '28004', 'Madrid', 28, 1),
(7598, '28005', 'Madrid', 28, 1),
(7599, '28006', 'Madrid', 28, 1),
(7600, '28007', 'Madrid', 28, 1),
(7601, '28008', 'Madrid', 28, 1),
(7602, '28009', 'Madrid', 28, 1),
(7603, '28010', 'Madrid', 28, 1),
(7604, '28011', 'Madrid', 28, 1),
(7605, '28012', 'Madrid', 28, 1),
(7606, '28013', 'Madrid', 28, 1),
(7607, '28014', 'Madrid', 28, 1),
(7608, '28015', 'Madrid', 28, 1),
(7609, '28016', 'Madrid', 28, 1),
(7610, '28017', 'Madrid', 28, 1),
(7611, '28018', 'Madrid', 28, 1),
(7612, '28019', 'Madrid', 28, 1),
(7613, '28020', 'Madrid', 28, 1),
(7614, '28021', 'Madrid', 28, 1),
(7615, '28022', 'Madrid', 28, 1),
(7616, '28023', 'Pozuelo De Alarcón', 28, 1),
(7617, '28024', 'Madrid', 28, 1),
(7618, '28025', 'Madrid', 28, 1),
(7619, '28026', 'Madrid', 28, 1),
(7620, '28027', 'Madrid', 28, 1),
(7621, '28028', 'Madrid', 28, 1),
(7622, '28029', 'Madrid', 28, 1),
(7623, '28030', 'Madrid', 28, 1),
(7624, '28031', 'Madrid', 28, 1),
(7625, '28032', 'Madrid', 28, 1),
(7626, '28033', 'Madrid', 28, 1),
(7627, '28034', 'Madrid', 28, 1),
(7628, '28035', 'Madrid', 28, 1),
(7629, '28036', 'Madrid', 28, 1),
(7630, '28037', 'Madrid', 28, 1),
(7631, '28038', 'Madrid', 28, 1),
(7632, '28039', 'Madrid', 28, 1),
(7633, '28040', 'Madrid', 28, 1),
(7634, '28041', 'Madrid', 28, 1),
(7635, '28042', 'Madrid', 28, 1),
(7636, '28043', 'Madrid', 28, 1),
(7637, '28044', 'Madrid', 28, 1),
(7638, '28045', 'Madrid', 28, 1),
(7639, '28046', 'Madrid', 28, 1),
(7640, '28047', 'Madrid', 28, 1),
(7641, '28048', 'Madrid', 28, 1),
(7642, '28049', 'Madrid', 28, 1),
(7643, '28050', 'Madrid', 28, 1),
(7644, '28051', 'Madrid', 28, 1),
(7645, '28052', 'Madrid', 28, 1),
(7646, '28053', 'Madrid', 28, 1),
(7647, '28054', 'Madrid', 28, 1),
(7648, '28055', 'Madrid', 28, 1);
INSERT INTO `lnx_poblaciones` (`id`, `cp`, `poblacion`, `idprov`, `idpais`) VALUES
(7649, '28100', 'Alcobendas Y La Moraleja', 28, 1),
(7650, '28108', 'Alcobendas Y La Moraleja', 28, 1),
(7651, '28109', 'Alcobendas Y La Moraleja', 28, 1),
(7652, '28110', 'Arrabal, El', 28, 1),
(7653, '28120', 'Ciudad Santo Domingo', 28, 1),
(7654, '28120', 'Ciudad Santo Domingo', 28, 1),
(7655, '28130', 'Valdeolmos', 28, 1),
(7656, '28140', 'Fuente El Saz De Jarama', 28, 1),
(7657, '28150', 'Valdetorres De Jarama', 28, 1),
(7658, '28160', 'Talamanca Del Jarama', 28, 1),
(7659, '28170', 'Valdepielagos', 28, 1),
(7660, '28180', 'Torrelaguna', 28, 1),
(7661, '28189', 'Torremocha Del Jarama', 28, 1),
(7662, '28189', 'Torremocha Del Jarama', 28, 1),
(7663, '28189', 'Torremocha Del Jarama', 28, 1),
(7664, '28190', 'Puebla De La Sierra', 28, 1),
(7665, '28190', 'Puebla De La Sierra', 28, 1),
(7666, '28191', 'Pradena Del Rincon', 28, 1),
(7667, '28191', 'Pradena Del Rincon', 28, 1),
(7668, '28191', 'Pradena Del Rincon', 28, 1),
(7669, '28192', 'Dehesa De Santillana', 28, 1),
(7670, '28193', 'Cervera De Buitrago', 28, 1),
(7671, '28194', 'Robledillo De La Jara', 28, 1),
(7672, '28194', 'Robledillo De La Jara', 28, 1),
(7673, '28195', 'Serrada De La Fuente', 28, 1),
(7674, '28196', 'Paredes De Buitrago', 28, 1),
(7675, '28200', 'San Lorenzo De El Escorial', 28, 1),
(7676, '28210', 'Valdemorillo', 28, 1),
(7677, '28210', 'Valdemorillo', 28, 1),
(7678, '28211', 'Peralejo', 28, 1),
(7679, '28212', 'Navalagamella', 28, 1),
(7680, '28212', 'Navalagamella', 28, 1),
(7681, '28213', 'Valle Del Sol, Urbanizacion', 28, 1),
(7682, '28214', 'Fresnedilla De La Oliva', 28, 1),
(7683, '28219', 'Ventorro, El (valdemorillo), Urbanizacion', 28, 1),
(7684, '28220', 'Majadahonda', 28, 1),
(7685, '28221', 'Majadahonda', 28, 1),
(7686, '28222', 'Majadahonda', 28, 1),
(7687, '28223', 'Pozuelo De Alarcón', 28, 1),
(7688, '28224', 'Pozuelo De Alarcón', 28, 1),
(7689, '28229', 'Villanueva Del Pardillo', 28, 1),
(7690, '28231', 'Las Rozas De Madrid', 28, 1),
(7691, '28232', 'Las Rozas De Madrid', 28, 1),
(7692, '28240', 'Hoyo De Manzanares', 28, 1),
(7693, '28248', 'Ciudad Residencial La Berzosa, Urbanizacion', 28, 1),
(7694, '28250', 'Torrelodones', 28, 1),
(7695, '28250', 'Torrelodones', 28, 1),
(7696, '28260', 'Galapagar', 28, 1),
(7697, '28270', 'Colmenarejo', 28, 1),
(7698, '28270', 'Colmenarejo', 28, 1),
(7699, '28279', 'Colmenarejo', 28, 1),
(7700, '28280', 'Escorial, El', 28, 1),
(7701, '28290', 'Las Rozas De Madrid', 28, 1),
(7702, '28292', 'Zorreras, Las', 28, 1),
(7703, '28292', 'Zorreras, Las', 28, 1),
(7704, '28293', 'Zarzalejo, De, Estacion', 28, 1),
(7705, '28294', 'Suiza EspaÑola, La, Urbanizacion', 28, 1),
(7706, '28295', 'Valdemaqueda', 28, 1),
(7707, '28296', 'Santa Maria De La Alameda', 28, 1),
(7708, '28297', 'Robledondo', 28, 1),
(7709, '28300', 'Cortijo De San Isidro, El', 28, 1),
(7710, '28320', 'San Martin De La Vega, De, Carretera', 28, 1),
(7711, '28330', 'San Martin De La Vega', 28, 1),
(7712, '28340', 'Valdemoro', 28, 1),
(7713, '28350', 'Ciempozuelos', 28, 1),
(7714, '28359', 'Titulcia', 28, 1),
(7715, '28360', 'Villaconejos', 28, 1),
(7716, '28370', 'Chinchon', 28, 1),
(7717, '28380', 'Valles San Juan, Urbanizacion', 28, 1),
(7718, '28390', 'Belmonte De Tajo', 28, 1),
(7719, '28391', 'Valdelaguna', 28, 1),
(7720, '28400', 'Villalba De Guadarrama', 28, 1),
(7721, '28400', 'Villalba De Guadarrama', 28, 1),
(7722, '28409', 'Alpedrete', 28, 1),
(7723, '28410', 'Manzanares El Real', 28, 1),
(7724, '28411', 'Prado De Los Enebros', 28, 1),
(7725, '28412', 'Montesclaros', 28, 1),
(7726, '28413', 'Boalo, El', 28, 1),
(7727, '28420', 'Rosales, Los (navata, La)', 28, 1),
(7728, '28430', 'Valdencina', 28, 1),
(7729, '28430', 'Valdencina', 28, 1),
(7730, '28440', 'Serranilla, La (guadarrama), Urbanizacion', 28, 1),
(7731, '28450', 'Reajo Del Roble, El', 28, 1),
(7732, '28460', 'Molinos, Los', 28, 1),
(7733, '28470', 'Navacerrada, De, Puerto', 28, 1),
(7734, '28470', 'Navacerrada, De, Puerto', 28, 1),
(7735, '28480', 'Tablada, Apeadero', 28, 1),
(7736, '28490', 'Becerril De La Sierra', 28, 1),
(7737, '28491', 'Navacerrada, Pueblo', 28, 1),
(7738, '28492', 'Ponderosa De La Sierra, La', 28, 1),
(7739, '28492', 'Ponderosa De La Sierra, La', 28, 1),
(7740, '28500', 'Ventorro De La Julia', 28, 1),
(7741, '28510', 'Campo Real', 28, 1),
(7742, '28511', 'Valdilecha', 28, 1),
(7743, '28512', 'Villar Del Olmo', 28, 1),
(7744, '28514', 'Nuevo Baztan', 28, 1),
(7745, '28514', 'Nuevo Baztan', 28, 1),
(7746, '28515', 'Olmeda De Las Fuentes', 28, 1),
(7747, '28521', 'Rivas-vaciamadrid', 28, 1),
(7748, '28522', 'Rivas-vaciamadrid', 28, 1),
(7749, '28523', 'Rivas-vaciamadrid', 28, 1),
(7750, '28524', 'Rivas-vaciamadrid', 28, 1),
(7751, '28529', 'Rivas-vaciamadrid', 28, 1),
(7752, '28530', 'Morata De TajuÑa', 28, 1),
(7753, '28540', 'Perales De TajuÑa', 28, 1),
(7754, '28550', 'Tielmes De TajuÑa', 28, 1),
(7755, '28560', 'CarabaÑa', 28, 1),
(7756, '28570', 'Orusco', 28, 1),
(7757, '28580', 'Ambite', 28, 1),
(7758, '28590', 'Villarejo De Salvanes', 28, 1),
(7759, '28594', 'Valdaracete', 28, 1),
(7760, '28595', 'Estremera', 28, 1),
(7761, '28596', 'Brea De Tajo', 28, 1),
(7762, '28597', 'FuentidueÑa De Tajo', 28, 1),
(7763, '28598', 'Villamanrique De Tajo', 28, 1),
(7764, '28600', 'Navalcarnero', 28, 1),
(7765, '28607', 'Alamo, El (navalcarnero)', 28, 1),
(7766, '28609', 'Villanueva De Perales', 28, 1),
(7767, '28609', 'Villanueva De Perales', 28, 1),
(7768, '28609', 'Villanueva De Perales', 28, 1),
(7769, '28610', 'Villamanta', 28, 1),
(7770, '28620', 'Aldea Del Fresno', 28, 1),
(7771, '28630', 'Villa Del Prado', 28, 1),
(7772, '28635', 'M', 28, 1),
(7773, '28640', 'Cadalso De Los Vidrios', 28, 1),
(7774, '28648', 'Entrepinos, Urbanizacion', 28, 1),
(7775, '28649', 'Rozas De Puerto Real', 28, 1),
(7776, '28650', 'Cenicientos', 28, 1),
(7777, '28660', 'Residencia Nuestra SeÑora Del Pilar (boadilla)', 28, 1),
(7778, '28670', 'Villaviciosa De Odon', 28, 1),
(7779, '28680', 'San Martin De Valdeiglesias', 28, 1),
(7780, '28690', 'Brunete', 28, 1),
(7781, '28691', 'Villanueva De La CaÑada', 28, 1),
(7782, '28692', 'Villafranca Del Castillo', 28, 1),
(7783, '28693', 'Quijorna', 28, 1),
(7784, '28694', 'Chapineria', 28, 1),
(7785, '28695', 'Navas Del Rey', 28, 1),
(7786, '28696', 'Pelayos De La Presa', 28, 1),
(7787, '28700', 'San Sebastián De Los Reyes', 28, 1),
(7788, '28701', 'San Sebastián De Los Reyes', 28, 1),
(7789, '28702', 'San Sebastián De Los Reyes', 28, 1),
(7790, '28703', 'San Sebastián De Los Reyes', 28, 1),
(7791, '28706', 'Urbanizacion Club De Campo', 28, 1),
(7792, '28707', 'R.a.c.e. (real Automovil Club De EspaÑa)', 28, 1),
(7793, '28707', 'R.a.c.e. (real Automovil Club De EspaÑa)', 28, 1),
(7794, '28708', 'Fuente Del Fresno', 28, 1),
(7795, '28709', 'Ciudad Deportiva Del Jarama', 28, 1),
(7796, '28720', 'Bustarviejo', 28, 1),
(7797, '28721', 'RedueÑa', 28, 1),
(7798, '28721', 'RedueÑa', 28, 1),
(7799, '28722', 'Vellon, El', 28, 1),
(7800, '28723', 'Pedrezuela', 28, 1),
(7801, '28729', 'Venturada', 28, 1),
(7802, '28729', 'Venturada', 28, 1),
(7803, '28729', 'Venturada', 28, 1),
(7804, '28730', 'Buitrago De Lozoya', 28, 1),
(7805, '28737', 'Serna Del Monte, La', 28, 1),
(7806, '28737', 'Serna Del Monte, La', 28, 1),
(7807, '28737', 'Serna Del Monte, La', 28, 1),
(7808, '28737', 'Serna Del Monte, La', 28, 1),
(7809, '28739', 'Villavieja De Lozoya', 28, 1),
(7810, '28739', 'Villavieja De Lozoya', 28, 1),
(7811, '28739', 'Villavieja De Lozoya', 28, 1),
(7812, '28739', 'Villavieja De Lozoya', 28, 1),
(7813, '28740', 'Rascafria', 28, 1),
(7814, '28742', 'Lozoya Del Valle', 28, 1),
(7815, '28742', 'Lozoya Del Valle', 28, 1),
(7816, '28743', 'Garganta De Los Montes', 28, 1),
(7817, '28743', 'Garganta De Los Montes', 28, 1),
(7818, '28749', 'Pinilla Del Valle', 28, 1),
(7819, '28749', 'Pinilla Del Valle', 28, 1),
(7820, '28750', 'Valdelagua, Urbanizacion', 28, 1),
(7821, '28750', 'Valdelagua, Urbanizacion', 28, 1),
(7822, '28750', 'Valdelagua, Urbanizacion', 28, 1),
(7823, '28751', 'Cabrera, La', 28, 1),
(7824, '28752', 'Lozoyuela', 28, 1),
(7825, '28753', 'Sieteiglesias', 28, 1),
(7826, '28754', 'Presa De Puentes Viejas', 28, 1),
(7827, '28754', 'Presa De Puentes Viejas', 28, 1),
(7828, '28755', 'Robregordo', 28, 1),
(7829, '28755', 'Robregordo', 28, 1),
(7830, '28755', 'Robregordo', 28, 1),
(7831, '28755', 'Robregordo', 28, 1),
(7832, '28756', 'Somosierra', 28, 1),
(7833, '28760', 'Valdeloshielos, De Los, Finca', 28, 1),
(7834, '28761', 'Tres Cantos', 28, 1),
(7835, '28770', 'San Pedro', 28, 1),
(7836, '28791', 'ViÑas, Las', 28, 1),
(7837, '28792', 'Miraflores De La Sierra, Extrarradio De', 28, 1),
(7838, '28794', 'Miralpantano', 28, 1),
(7839, '28801', 'Alcalá De Henares', 28, 1),
(7840, '28802', 'Alcalá De Henares', 28, 1),
(7841, '28803', 'Alcalá De Henares', 28, 1),
(7842, '28804', 'Alcalá De Henares', 28, 1),
(7843, '28805', 'Alcalá De Henares', 28, 1),
(7844, '28806', 'Alcalá De Henares', 28, 1),
(7845, '28807', 'Alcalá De Henares', 28, 1),
(7846, '28807', 'Alcalá De Henares', 28, 1),
(7847, '28810', 'Zulema', 28, 1),
(7848, '28811', 'Corpa', 28, 1),
(7849, '28812', 'Valverde De Alcala', 28, 1),
(7850, '28812', 'Valverde De Alcala', 28, 1),
(7851, '28813', 'Torres De La Alameda', 28, 1),
(7852, '28813', 'Torres De La Alameda', 28, 1),
(7853, '28814', 'Daganzo De Arriba', 28, 1),
(7854, '28815', 'Serracines', 28, 1),
(7855, '28815', 'Serracines', 28, 1),
(7856, '28816', 'Valdeavero', 28, 1),
(7857, '28816', 'Valdeavero', 28, 1),
(7858, '28817', 'Santos De La Humosa, Los', 28, 1),
(7859, '28818', 'Santorcaz', 28, 1),
(7860, '28818', 'Santorcaz', 28, 1),
(7861, '28820', 'Coslada', 28, 1),
(7862, '28821', 'Coslada', 28, 1),
(7863, '28822', 'Coslada', 28, 1),
(7864, '28823', 'Coslada', 28, 1),
(7865, '28830', 'San Fernando De Henares', 28, 1),
(7866, '28840', 'Mejorada Del Campo', 28, 1),
(7867, '28850', 'Torrejon De Ardoz', 28, 1),
(7868, '28860', 'Puente Del Rio Jarama, Viviendas', 28, 1),
(7869, '28861', 'Berrocales De Jarama, Los', 28, 1),
(7870, '28862', 'Belvis Nuevo', 28, 1),
(7871, '28863', 'CobeÑa', 28, 1),
(7872, '28864', 'Poligono Industrial Coumar', 28, 1),
(7873, '28880', 'Meco', 28, 1),
(7874, '28890', 'Loeches', 28, 1),
(7875, '28891', 'Velilla De San Antonio', 28, 1),
(7876, '28901', 'Getafe', 28, 1),
(7877, '28902', 'Getafe', 28, 1),
(7878, '28903', 'Getafe', 28, 1),
(7879, '28904', 'Getafe', 28, 1),
(7880, '28905', 'Getafe', 28, 1),
(7881, '28906', 'Getafe', 28, 1),
(7882, '28907', 'Getafe', 28, 1),
(7883, '28909', 'Getafe', 28, 1),
(7884, '28911', 'Leganés', 28, 1),
(7885, '28912', 'Leganés', 28, 1),
(7886, '28913', 'Leganés', 28, 1),
(7887, '28914', 'Leganés', 28, 1),
(7888, '28915', 'Leganés', 28, 1),
(7889, '28916', 'Leganés', 28, 1),
(7890, '28917', 'Leganés', 28, 1),
(7891, '28918', 'Leganés', 28, 1),
(7892, '28919', 'Leganés', 28, 1),
(7893, '28921', 'Alcorcón', 28, 1),
(7894, '28922', 'Alcorcón', 28, 1),
(7895, '28923', 'Alcorcón', 28, 1),
(7896, '28924', 'Alcorcón', 28, 1),
(7897, '28925', 'Alcorcón', 28, 1),
(7898, '28931', 'Móstoles', 28, 1),
(7899, '28932', 'Móstoles', 28, 1),
(7900, '28933', 'Móstoles', 28, 1),
(7901, '28934', 'Móstoles', 28, 1),
(7902, '28935', 'Móstoles', 28, 1),
(7903, '28936', 'Móstoles', 28, 1),
(7904, '28937', 'Móstoles', 28, 1),
(7905, '28938', 'Móstoles', 28, 1),
(7906, '28939', 'Valdefuentes', 28, 1),
(7907, '28939', 'Valdefuentes', 28, 1),
(7908, '28941', 'Fuenlabrada', 28, 1),
(7909, '28942', 'Fuenlabrada', 28, 1),
(7910, '28943', 'Fuenlabrada', 28, 1),
(7911, '28944', 'Fuenlabrada', 28, 1),
(7912, '28945', 'Fuenlabrada', 28, 1),
(7913, '28946', 'Fuenlabrada', 28, 1),
(7914, '28947', 'Fuenlabrada', 28, 1),
(7915, '28950', 'Moraleja De Enmedio', 28, 1),
(7916, '28954', 'Navalagamella', 28, 1),
(7917, '28970', 'Humanes De Madrid', 28, 1),
(7918, '28971', 'GriÑon', 28, 1),
(7919, '28976', 'Batres', 28, 1),
(7920, '28977', 'Casarrubuelos', 28, 1),
(7921, '28978', 'Cubas De La Sagra', 28, 1),
(7922, '28979', 'Serranillos Del Valle', 28, 1),
(7923, '28980', 'Parla', 28, 1),
(7924, '28981', 'Parla', 28, 1),
(7925, '28982', 'Parla', 28, 1),
(7926, '28983', 'Parla', 28, 1),
(7927, '28984', 'Parla', 28, 1),
(7928, '28990', 'Torrejon De Velasco', 28, 1),
(7929, '28991', 'Torrejon De La Calzada', 28, 1),
(7930, '29001', 'Málaga', 29, 1),
(7931, '29002', 'Málaga', 29, 1),
(7932, '29003', 'Málaga', 29, 1),
(7933, '29004', 'Málaga', 29, 1),
(7934, '29005', 'Málaga', 29, 1),
(7935, '29006', 'Málaga', 29, 1),
(7936, '29007', 'Málaga', 29, 1),
(7937, '29008', 'Málaga', 29, 1),
(7938, '29009', 'Málaga', 29, 1),
(7939, '29010', 'Málaga', 29, 1),
(7940, '29010', 'Málaga', 29, 1),
(7941, '29011', 'Málaga', 29, 1),
(7942, '29012', 'Málaga', 29, 1),
(7943, '29013', 'Málaga', 29, 1),
(7944, '29014', 'Málaga', 29, 1),
(7945, '29015', 'Málaga', 29, 1),
(7946, '29016', 'Málaga', 29, 1),
(7947, '29017', 'Málaga', 29, 1),
(7948, '29018', 'Málaga', 29, 1),
(7949, '29100', 'Rodeo, El', 29, 1),
(7950, '29108', 'Guaro (coin)', 29, 1),
(7951, '29109', 'Umbria (tolox)', 29, 1),
(7952, '29110', 'Monda', 29, 1),
(7953, '29120', 'Zangano, El', 29, 1),
(7954, '29130', 'Zapata', 29, 1),
(7955, '29140', 'Málaga', 29, 1),
(7956, '29150', 'Moras, Las', 29, 1),
(7957, '29160', 'Portales', 29, 1),
(7958, '29170', 'Solano', 29, 1),
(7959, '29180', 'Riogordo', 29, 1),
(7960, '29190', 'Málaga', 29, 1),
(7961, '29191', 'M', 29, 1),
(7962, '29194', 'Alfarnatejo', 29, 1),
(7963, '29194', 'Alfarnatejo', 29, 1),
(7964, '29195', 'Romo, El', 29, 1),
(7965, '29196', 'Tarajal, El', 29, 1),
(7966, '29197', 'Totalan', 29, 1),
(7967, '29197', 'Totalan', 29, 1),
(7968, '29200', 'Antequera', 29, 1),
(7969, '29210', 'Cuevas De San Marcos', 29, 1),
(7970, '29220', 'Cuevas Bajas', 29, 1),
(7971, '29230', 'Villanueva De La Concepcion', 29, 1),
(7972, '29230', 'Villanueva De La Concepcion', 29, 1),
(7973, '29240', 'Valle De Abdalajis', 29, 1),
(7974, '29250', 'Llanos De Antequera, Los', 29, 1),
(7975, '29260', 'Nogales, Los', 29, 1),
(7976, '29300', 'Archidona', 29, 1),
(7977, '29309', 'Archidona', 29, 1),
(7978, '29310', 'Villanueva De Algaidas', 29, 1),
(7979, '29311', 'Parrilla, La', 29, 1),
(7980, '29312', 'Villanueva Del Rosario', 29, 1),
(7981, '29313', 'Villanueva Del Trabuco', 29, 1),
(7982, '29314', 'Huertas Del Rio', 29, 1),
(7983, '29314', 'Huertas Del Rio', 29, 1),
(7984, '29315', 'Villanueva De Tapia', 29, 1),
(7985, '29315', 'Villanueva De Tapia', 29, 1),
(7986, '29315', 'Villanueva De Tapia', 29, 1),
(7987, '29320', 'Campillos', 29, 1),
(7988, '29327', 'Teba', 29, 1),
(7989, '29328', 'Sierra De Yeguas', 29, 1),
(7990, '29329', 'Navahermosa', 29, 1),
(7991, '29330', 'Almargen', 29, 1),
(7992, '29340', 'CaÑete La Real', 29, 1),
(7993, '29350', 'Arriate', 29, 1),
(7994, '29360', 'Montejaque', 29, 1),
(7995, '29370', 'Benaojan', 29, 1),
(7996, '29380', 'Robledal, El', 29, 1),
(7997, '29391', 'Cortes De La Frontera, Estacion', 29, 1),
(7998, '29392', 'Jimera De Libar, Estacion', 29, 1),
(7999, '29394', 'Parchite', 29, 1),
(8000, '29400', 'Rosalejo', 29, 1),
(8001, '29410', 'Yunquera', 29, 1),
(8002, '29420', 'Burgo, El', 29, 1),
(8003, '29430', 'Montecorto', 29, 1),
(8004, '29440', 'Igualeja', 29, 1),
(8005, '29450', 'Pujerra', 29, 1),
(8006, '29451', 'Parauta', 29, 1),
(8007, '29452', 'Cartajima', 29, 1),
(8008, '29460', 'Alpandeire', 29, 1),
(8009, '29461', 'Farajan', 29, 1),
(8010, '29462', 'Juzcar', 29, 1),
(8011, '29470', 'Cuevas Del Becerro', 29, 1),
(8012, '29470', 'Cuevas Del Becerro', 29, 1),
(8013, '29471', 'Serrato', 29, 1),
(8014, '29480', 'Gaucin', 29, 1),
(8015, '29490', 'Colmenar, El (estacion De Gaucin)', 29, 1),
(8016, '29490', 'Colmenar, El (estacion De Gaucin)', 29, 1),
(8017, '29491', 'Vega (benalauria)', 29, 1),
(8018, '29491', 'Vega (benalauria)', 29, 1),
(8019, '29492', 'Jubrique', 29, 1),
(8020, '29492', 'Jubrique', 29, 1),
(8021, '29493', 'Sierra, La (benadalid)', 29, 1),
(8022, '29494', 'Atajate', 29, 1),
(8023, '29500', 'Sabinal', 29, 1),
(8024, '29510', 'Casablanquilla', 29, 1),
(8025, '29520', 'Fuente Piedra', 29, 1),
(8026, '29530', 'Alameda', 29, 1),
(8027, '29531', 'Humilladero', 29, 1),
(8028, '29532', 'Mollina', 29, 1),
(8029, '29533', 'Carvajales', 29, 1),
(8030, '29540', 'Colonia De Santa Ana', 29, 1),
(8031, '29550', 'Ardales', 29, 1),
(8032, '29551', 'Carratraca', 29, 1),
(8033, '29552', 'Chorro, El', 29, 1),
(8034, '29552', 'Chorro, El', 29, 1),
(8035, '29560', 'Pizarra', 29, 1),
(8036, '29566', 'Casarabonela', 29, 1),
(8037, '29567', 'Jorox', 29, 1),
(8038, '29568', 'Pizarra', 29, 1),
(8039, '29569', 'Zalea', 29, 1),
(8040, '29569', 'Zalea', 29, 1),
(8041, '29570', 'Villafranco Del Guadalhorce', 29, 1),
(8042, '29580', 'Tres Leguas', 29, 1),
(8043, '29590', 'Málaga', 29, 1),
(8044, '29591', 'Málaga', 29, 1),
(8045, '29592', 'C', 29, 1),
(8046, '29593', 'Paredones', 29, 1),
(8047, '29601', 'Marbella', 29, 1),
(8048, '29602', 'Marbella', 29, 1),
(8049, '29603', 'Marbella', 29, 1),
(8050, '29604', 'Marbella', 29, 1),
(8051, '29610', 'Ojen', 29, 1),
(8052, '29611', 'Istan', 29, 1),
(8053, '29620', 'Torremolinos', 29, 1),
(8054, '29620', 'Torremolinos', 29, 1),
(8055, '29620', 'Torremolinos', 29, 1),
(8056, '29630', 'Capellania, La', 29, 1),
(8057, '29631', 'Arroyo De La Miel', 29, 1),
(8058, '29639', 'Benalmadena, Pueblo', 29, 1),
(8059, '29640', 'Lagunas De Mijas, Las', 29, 1),
(8060, '29647', 'Mijas', 29, 1),
(8061, '29648', 'Mijas', 29, 1),
(8062, '29649', 'Mijas', 29, 1),
(8063, '29650', 'Mijas', 29, 1),
(8064, '29651', 'Mijas', 29, 1),
(8065, '29660', 'Marbella', 29, 1),
(8066, '29670', 'Marbella', 29, 1),
(8067, '29679', 'Cortes (benahavis)', 29, 1),
(8068, '29680', 'Loma Del Monte', 29, 1),
(8069, '29688', 'Saladillo Benamara', 29, 1),
(8070, '29689', 'Valerin, El', 29, 1),
(8071, '29690', 'Casares', 29, 1),
(8072, '29691', 'Manilva', 29, 1),
(8073, '29692', 'Secadero', 29, 1),
(8074, '29692', 'Secadero', 29, 1),
(8075, '29693', 'Saladavieja', 29, 1),
(8076, '29698', 'Estepona', 29, 1),
(8077, '29700', 'Velez Malaga', 29, 1),
(8078, '29710', 'Periana', 29, 1),
(8079, '29711', 'Toril', 29, 1),
(8080, '29712', 'ViÑuela', 29, 1),
(8081, '29713', 'Venta Baja', 29, 1),
(8082, '29713', 'Venta Baja', 29, 1),
(8083, '29714', 'Salares', 29, 1),
(8084, '29715', 'Valverde', 29, 1),
(8085, '29716', 'Lomas Chozas', 29, 1),
(8086, '29717', 'Arenas', 29, 1),
(8087, '29718', 'Zubia, La', 29, 1),
(8088, '29718', 'Zubia, La', 29, 1),
(8089, '29718', 'Zubia, La', 29, 1),
(8090, '29718', 'Zubia, La', 29, 1),
(8091, '29718', 'Zubia, La', 29, 1),
(8092, '29719', 'Trapiche', 29, 1),
(8093, '29719', 'Trapiche', 29, 1),
(8094, '29719', 'Trapiche', 29, 1),
(8095, '29719', 'Trapiche', 29, 1),
(8096, '29719', 'Trapiche', 29, 1),
(8097, '29720', 'Cala Del Moral, La', 29, 1),
(8098, '29720', 'Cala Del Moral, La', 29, 1),
(8099, '29730', 'Rincon De La Victoria', 29, 1),
(8100, '29738', 'Valdes', 29, 1),
(8101, '29738', 'Valdes', 29, 1),
(8102, '29740', 'Torre Del Mar', 29, 1),
(8103, '29749', 'Almayate Bajo', 29, 1),
(8104, '29750', 'Algarrobo Costa', 29, 1),
(8105, '29750', 'Algarrobo Costa', 29, 1),
(8106, '29751', 'Trayamar', 29, 1),
(8107, '29752', 'Sayalonga', 29, 1),
(8108, '29753', 'Daimalos Vados', 29, 1),
(8109, '29753', 'Daimalos Vados', 29, 1),
(8110, '29753', 'Daimalos Vados', 29, 1),
(8111, '29754', 'Competa', 29, 1),
(8112, '29755', 'Canillas De Albaida', 29, 1),
(8113, '29760', 'Mezquitilla', 29, 1),
(8114, '29770', 'Torrox', 29, 1),
(8115, '29780', 'Nerja', 29, 1),
(8116, '29787', 'Maro', 29, 1),
(8117, '29788', 'Frigiliana', 29, 1),
(8118, '29789', 'Molineta, La (frigiliana)', 29, 1),
(8119, '29790', 'Chilches', 29, 1),
(8120, '29791', 'Vallejos, Los', 29, 1),
(8121, '29792', 'Iznate', 29, 1),
(8122, '29792', 'Iznate', 29, 1),
(8123, '29793', 'Torrox Park', 29, 1),
(8124, '29796', 'Torrox', 29, 1),
(8125, '30000', 'Zarandona (ver Callejero De Murcia)', 30, 1),
(8126, '30001', 'Murcia', 30, 1),
(8127, '30002', 'Murcia', 30, 1),
(8128, '30003', 'Murcia', 30, 1),
(8129, '30004', 'Murcia', 30, 1),
(8130, '30005', 'Murcia', 30, 1),
(8131, '30006', 'Murcia', 30, 1),
(8132, '30007', 'Murcia', 30, 1),
(8133, '30008', 'Murcia', 30, 1),
(8134, '30009', 'Murcia', 30, 1),
(8135, '30010', 'Murcia', 30, 1),
(8136, '30011', 'Murcia', 30, 1),
(8137, '30012', 'Murcia', 30, 1),
(8138, '30017', 'Lorca', 30, 1),
(8139, '30100', 'Murcia', 30, 1),
(8140, '30107', 'Guadalupe', 30, 1),
(8141, '30108', 'Rincon De Beniscornia', 30, 1),
(8142, '30110', 'Torre Alcayna', 30, 1),
(8143, '30120', 'Palmar, El (el Palmar)', 30, 1),
(8144, '30130', 'Beniel', 30, 1),
(8145, '30139', 'Raal, El', 30, 1),
(8146, '30140', 'Santomera', 30, 1),
(8147, '30148', 'Matanza, La (santomera)', 30, 1),
(8148, '30149', 'Siscar, El', 30, 1),
(8149, '30150', 'Alberca, La', 30, 1),
(8150, '30151', 'Santo Angel', 30, 1),
(8151, '30152', 'Aljucer', 30, 1),
(8152, '30153', 'Murta, La', 30, 1),
(8153, '30154', 'Valladolises', 30, 1),
(8154, '30155', 'BaÑos Y Mendigo', 30, 1),
(8155, '30156', 'Ruices, Los (los Martinez Del Puerto)', 30, 1),
(8156, '30157', 'Teatinos, Los (algezares)', 30, 1),
(8157, '30158', 'Lages, Los', 30, 1),
(8158, '30160', 'Monteagudo', 30, 1),
(8159, '30161', 'Llano De Brujas', 30, 1),
(8160, '30162', 'Santa Cruz Santa Cruz', 30, 1),
(8161, '30163', 'PeÑicas De Cobatica Las Viejas', 30, 1),
(8162, '30164', 'CaÑada De San Pedro', 30, 1),
(8163, '30165', 'Rincon De Seca', 30, 1),
(8164, '30166', 'Nonduermas', 30, 1),
(8165, '30167', 'Raya, La (la Raya)', 30, 1),
(8166, '30168', 'Era Alta', 30, 1),
(8167, '30169', 'San Gines', 30, 1),
(8168, '30170', 'Mula', 30, 1),
(8169, '30176', 'Pliego', 30, 1),
(8170, '30178', 'Retamosa', 30, 1),
(8171, '30179', 'Barqueros', 30, 1),
(8172, '30180', 'Bullas', 30, 1),
(8173, '30189', 'Copa, La', 30, 1),
(8174, '30189', 'Copa, La', 30, 1),
(8175, '30190', 'Cruz, La', 30, 1),
(8176, '30191', 'Campos Del Rio', 30, 1),
(8177, '30192', 'Rodeo De Los Tenderos', 30, 1),
(8178, '30193', 'Yechar', 30, 1),
(8179, '30194', 'NiÑo De Mula', 30, 1),
(8180, '30195', 'Noguericas', 30, 1),
(8181, '30196', 'Bajil', 30, 1),
(8182, '30201', 'Cartagena', 30, 1),
(8183, '30202', 'Cartagena', 30, 1),
(8184, '30203', 'Cartagena', 30, 1),
(8185, '30204', 'Cartagena', 30, 1),
(8186, '30205', 'Cartagena', 30, 1),
(8187, '30300', 'Cartagena', 30, 1),
(8188, '30310', 'Cartagena', 30, 1),
(8189, '30319', 'Santa Ana', 30, 1),
(8190, '30320', 'Fuente Alamo', 30, 1),
(8191, '30330', 'Roses, Los (albujon)', 30, 1),
(8192, '30331', 'Vidales, Los (lobosillo)', 30, 1),
(8193, '30332', 'Estrecho De Fuente Alamo', 30, 1),
(8194, '30333', 'Morenos, Los', 30, 1),
(8195, '30334', 'Palas, Las', 30, 1),
(8196, '30335', 'Vivancos, Los', 30, 1),
(8197, '30335', 'Vivancos, Los', 30, 1),
(8198, '30338', 'Canovas', 30, 1),
(8199, '30350', 'Valle Escombreras', 30, 1),
(8200, '30351', 'Borricen (alumbres)', 30, 1),
(8201, '30360', 'Union, La', 30, 1),
(8202, '30362', 'La Uni', 30, 1),
(8203, '30364', 'Portman', 30, 1),
(8204, '30365', 'Gorguel, El', 30, 1),
(8205, '30366', 'Algar, El', 30, 1),
(8206, '30367', 'Ruices, Los (san Jose)', 30, 1),
(8207, '30368', 'Urrutias, Los', 30, 1),
(8208, '30369', 'Torre Blanca', 30, 1),
(8209, '30369', 'Torre Blanca', 30, 1),
(8210, '30370', 'Cala Reona, Urbanizacion', 30, 1),
(8211, '30370', 'Cala Reona, Urbanizacion', 30, 1),
(8212, '30379', 'San Javier', 30, 1),
(8213, '30380', 'Manga Del Mar Menor, La', 30, 1),
(8214, '30380', 'Manga Del Mar Menor, La', 30, 1),
(8215, '30381', 'Llano Del Beal, El', 30, 1),
(8216, '30382', 'San Gines De La Jara', 30, 1),
(8217, '30383', 'Pollo, Lo', 30, 1),
(8218, '30384', 'Mar De Cristal', 30, 1),
(8219, '30385', 'Villa Caravaning', 30, 1),
(8220, '30387', 'Cartagena', 30, 1),
(8221, '30387', 'Moratalla', 30, 1),
(8222, '30389', 'Manga Club, La, Urbanizacion', 30, 1),
(8223, '30390', 'Roses, Los (la Lajorra)', 30, 1),
(8224, '30391', 'Pozo De Los Palos', 30, 1),
(8225, '30392', 'Torreciega', 30, 1),
(8226, '30393', 'Sanchez, Los (galifa)', 30, 1),
(8227, '30394', 'Cartagena', 30, 1),
(8228, '30395', 'Rosiques, Los', 30, 1),
(8229, '30396', 'Rojos, Los', 30, 1),
(8230, '30397', 'Simonetes, Los', 30, 1),
(8231, '30398', 'Valdelentiscos', 30, 1),
(8232, '30399', 'Vista Alegre', 30, 1),
(8233, '30400', 'Caravaca De La Cruz', 30, 1),
(8234, '30400', 'Caravaca De La Cruz', 30, 1),
(8235, '30410', 'Singla', 30, 1),
(8236, '30410', 'Singla', 30, 1),
(8237, '30411', 'Royos, Los', 30, 1),
(8238, '30411', 'Royos, Los', 30, 1),
(8239, '30412', 'Moralejo', 30, 1),
(8240, '30413', 'Tartamudo', 30, 1),
(8241, '30413', 'Tartamudo', 30, 1),
(8242, '30420', 'Valentin', 30, 1),
(8243, '30420', 'Valentin', 30, 1),
(8244, '30430', 'Cehegin', 30, 1),
(8245, '30438', 'Campillo Y Suertes', 30, 1),
(8246, '30439', 'Ribazo, El', 30, 1),
(8247, '30440', 'Moratalla', 30, 1),
(8248, '30441', 'San Juan, Campo De', 30, 1),
(8249, '30442', 'Villar, El', 30, 1),
(8250, '30500', 'Molina De Segura', 30, 1),
(8251, '30506', 'Altorreal', 30, 1),
(8252, '30507', 'Alcayna, La', 30, 1),
(8253, '30508', 'Ribera De Molina, La', 30, 1),
(8254, '30509', 'Torre Alta', 30, 1),
(8255, '30510', 'Yecla', 30, 1),
(8256, '30520', 'Jumilla', 30, 1),
(8257, '30528', 'Fuente Del Pino', 30, 1),
(8258, '30529', 'Zarza, La', 30, 1),
(8259, '30540', 'Tollos', 30, 1),
(8260, '30550', 'Barranco De Molax', 30, 1),
(8261, '30559', 'Vergeles, Los', 30, 1),
(8262, '30560', 'Alguazas', 30, 1),
(8263, '30561', 'Pullas, Las', 30, 1),
(8264, '30562', 'Ceuti', 30, 1),
(8265, '30563', 'Torraos, Los', 30, 1),
(8266, '30564', 'Lorqui', 30, 1),
(8267, '30565', 'Torres De Cotillas, Las', 30, 1),
(8268, '30570', 'Murcia', 30, 1),
(8269, '30579', 'Torreaguera', 30, 1),
(8270, '30580', 'Alquerias', 30, 1),
(8271, '30588', 'Zeneta', 30, 1),
(8272, '30589', 'Ramos, Los', 30, 1),
(8273, '30590', 'Tercia, La (sucina)', 30, 1),
(8274, '30590', 'Tercia, La (sucina)', 30, 1),
(8275, '30591', 'Martinez, Los (balsicas)', 30, 1),
(8276, '30592', 'San Cayetano Avileses', 30, 1),
(8277, '30592', 'San Cayetano Avileses', 30, 1),
(8278, '30592', 'San Cayetano Avileses', 30, 1),
(8279, '30593', 'Vidales, Los (la Palma)', 30, 1),
(8280, '30594', 'Rambla, La (torraos)', 30, 1),
(8281, '30600', 'Hurtado', 30, 1),
(8282, '30609', 'Torre Del Junco', 30, 1),
(8283, '30610', 'Ricote', 30, 1),
(8284, '30611', 'Ojos', 30, 1),
(8285, '30612', 'Ulea', 30, 1),
(8286, '30613', 'Villanueva Rio Segura', 30, 1),
(8287, '30620', 'Fortuna', 30, 1),
(8288, '30626', 'Capres De Enmedio', 30, 1),
(8289, '30626', 'Capres De Enmedio', 30, 1),
(8290, '30628', 'Salinas De Rambla Salada', 30, 1),
(8291, '30629', 'PeÑas, Las', 30, 1),
(8292, '30629', 'PeÑas, Las', 30, 1),
(8293, '30640', 'Abanilla', 30, 1),
(8294, '30648', 'Zarza, La (el Canton)', 30, 1),
(8295, '30649', '\"Poligono Industrial \"\"el Semolilla\"\"\"', 30, 1),
(8296, '30700', 'Torre Pacheco', 30, 1),
(8297, '30708', 'IbaÑez, Los', 30, 1),
(8298, '30709', 'Roldan', 30, 1),
(8299, '30710', 'Santa Rosalia', 30, 1),
(8300, '30710', 'Santa Rosalia', 30, 1),
(8301, '30720', 'Santiago De La Ribera', 30, 1),
(8302, '30729', 'Academia General Del Aire', 30, 1),
(8303, '30730', 'San Javier', 30, 1),
(8304, '30739', 'Vidales, Los (dolores Pacheco)', 30, 1),
(8305, '30739', 'Vidales, Los (dolores Pacheco)', 30, 1),
(8306, '30740', 'Villa Nanitos', 30, 1),
(8307, '30749', 'San Pedro del Pinatar', 30, 1),
(8308, '30750', 'Murcia', 30, 1),
(8309, '30800', 'Sutullena', 30, 1),
(8310, '30810', 'Zarcilla De Ramos', 30, 1),
(8311, '30811', 'Tova, La', 30, 1),
(8312, '30812', 'Terreras, Las', 30, 1),
(8313, '30813', 'Purias', 30, 1),
(8314, '30814', 'ZuÑiga', 30, 1),
(8315, '30815', 'Tercia (lorca)', 30, 1),
(8316, '30816', 'San Julian', 30, 1),
(8317, '30817', 'Torrecilla', 30, 1),
(8318, '30818', 'Ventarique', 30, 1),
(8319, '30820', 'Alcantarilla', 30, 1),
(8320, '30826', 'Murcia', 30, 1),
(8321, '30830', 'Ñora, La', 30, 1),
(8322, '30831', 'Javali Viejo', 30, 1),
(8323, '30832', 'Javali Nuevo', 30, 1),
(8324, '30833', 'Sangonera La Verde', 30, 1),
(8325, '30834', 'Torreguil', 30, 1),
(8326, '30834', 'Torreguil', 30, 1),
(8327, '30835', 'Sangonera La Seca', 30, 1),
(8328, '30835', 'Sangonera La Seca', 30, 1),
(8329, '30836', 'Pujantes, Los', 30, 1),
(8330, '30837', 'CaÑada Hermosa', 30, 1),
(8331, '30840', 'Alhama De Murcia', 30, 1),
(8332, '30850', 'Totana', 30, 1),
(8333, '30850', 'Totana', 30, 1),
(8334, '30858', 'Tudelas, Los', 30, 1),
(8335, '30858', 'Tudelas, Los', 30, 1),
(8336, '30859', 'Morti', 30, 1),
(8337, '30859', 'Morti', 30, 1),
(8338, '30860', 'Puerto De Mazarron', 30, 1),
(8339, '30868', 'Mojon, El (campillo De Adentro)', 30, 1),
(8340, '30868', 'Mojon, El (campillo De Adentro)', 30, 1),
(8341, '30870', 'Mazarron', 30, 1),
(8342, '30875', 'Camposol', 30, 1),
(8343, '30876', 'Ramonete, El', 30, 1),
(8344, '30876', 'Ramonete, El', 30, 1),
(8345, '30877', 'Moreras, Las', 30, 1),
(8346, '30878', 'Ujejar', 30, 1),
(8347, '30878', 'Ujejar', 30, 1),
(8348, '30879', 'Saladillo, El', 30, 1),
(8349, '30880', 'Aguilas', 30, 1),
(8350, '30883', 'Murcia', 30, 1),
(8351, '30889', 'Todosol, Urbanitzacio', 30, 1),
(8352, '30889', 'Todosol, Urbanitzacio', 30, 1),
(8353, '30890', 'Zarzalico', 30, 1),
(8354, '30890', 'Zarzalico', 30, 1),
(8355, '30891', 'Puerto Adentro', 30, 1),
(8356, '30892', 'Librilla', 30, 1),
(8357, '30893', 'Almendricos', 30, 1),
(8358, '31001', 'Pamplona-iruña', 31, 1),
(8359, '31002', 'Pamplona-iruña', 31, 1),
(8360, '31003', 'Pamplona-iruña', 31, 1),
(8361, '31004', 'Pamplona-iruña', 31, 1),
(8362, '31005', 'Pamplona-iruña', 31, 1),
(8363, '31006', 'Pamplona-iruña', 31, 1),
(8364, '31007', 'Pamplona-iruña', 31, 1),
(8365, '31008', 'Pamplona-iruña', 31, 1),
(8366, '31009', 'Pamplona-iruña', 31, 1),
(8367, '31010', 'Pamplona-iruña', 31, 1),
(8368, '31010', 'Pamplona-iruña', 31, 1),
(8369, '31011', 'Pamplona-iruña', 31, 1),
(8370, '31012', 'Pamplona-iruña', 31, 1),
(8371, '31013', 'Pamplona-iruña', 31, 1),
(8372, '31013', 'Pamplona-iruña', 31, 1),
(8373, '31013', 'Pamplona-iruña', 31, 1),
(8374, '31014', 'Pamplona-iruña', 31, 1),
(8375, '31015', 'Pamplona-iruña', 31, 1),
(8376, '31016', 'Pamplona-iruña', 31, 1),
(8377, '31100', 'SeÑorio De Sarria', 31, 1),
(8378, '31109', 'Artazu', 31, 1),
(8379, '31110', 'Noain (valle De Elorz)', 31, 1),
(8380, '31119', 'Torres De Elorz', 31, 1),
(8381, '31130', 'MaÑeru', 31, 1),
(8382, '31131', 'Cirauqui', 31, 1),
(8383, '31132', 'Villatuerta', 31, 1),
(8384, '31133', 'Uterga', 31, 1),
(8385, '31133', 'Uterga', 31, 1),
(8386, '31140', 'Artajona', 31, 1),
(8387, '31150', 'Nuestra SeÑora De Andion', 31, 1),
(8388, '31151', 'Obanos', 31, 1),
(8389, '31152', 'Muruzabal', 31, 1),
(8390, '31153', 'Larrain', 31, 1),
(8391, '31153', 'Larrain', 31, 1),
(8392, '31154', 'Ucar', 31, 1),
(8393, '31154', 'Ucar', 31, 1),
(8394, '31154', 'Ucar', 31, 1),
(8395, '31160', 'Orkoien', 31, 1),
(8396, '31170', 'Iza', 31, 1),
(8397, '31170', 'Iza', 31, 1),
(8398, '31171', 'Ororbia', 31, 1),
(8399, '31172', 'Urdanoz', 31, 1),
(8400, '31172', 'Urdanoz', 31, 1),
(8401, '31172', 'Urdanoz', 31, 1),
(8402, '31173', 'Izu', 31, 1),
(8403, '31174', 'Zabalza (zabalza)', 31, 1),
(8404, '31174', 'Zabalza (zabalza)', 31, 1),
(8405, '31174', 'Zabalza (zabalza)', 31, 1),
(8406, '31174', 'Zabalza (zabalza)', 31, 1),
(8407, '31174', 'Zabalza (zabalza)', 31, 1),
(8408, '31174', 'Zabalza (zabalza)', 31, 1),
(8409, '31174', 'Zabalza (zabalza)', 31, 1),
(8410, '31174', 'Zabalza (zabalza)', 31, 1),
(8411, '31175', 'Salinas De Oro', 31, 1),
(8412, '31175', 'Salinas De Oro', 31, 1),
(8413, '31176', 'Villanueva De Yerri', 31, 1),
(8414, '31176', 'Villanueva De Yerri', 31, 1),
(8415, '31177', 'Ugar', 31, 1),
(8416, '31177', 'Ugar', 31, 1),
(8417, '31178', 'Iranzu (monasterio)', 31, 1),
(8418, '31179', 'Muru (yerri)', 31, 1),
(8419, '31180', 'Zizur Mayor/zizur Nagusia', 31, 1),
(8420, '31190', 'Zariquiegui', 31, 1),
(8421, '31191', 'Subiza', 31, 1),
(8422, '31191', 'Subiza', 31, 1),
(8423, '31192', 'Zolina', 31, 1),
(8424, '31192', 'Zolina', 31, 1),
(8425, '31193', 'Usi', 31, 1),
(8426, '31193', 'Usi', 31, 1),
(8427, '31194', 'Unzu', 31, 1),
(8428, '31194', 'Unzu', 31, 1),
(8429, '31195', 'Oteiza De Berrioplano', 31, 1),
(8430, '31195', 'Oteiza De Berrioplano', 31, 1),
(8431, '31200', 'Lizarra', 31, 1),
(8432, '31208', 'Irache, Urbanizacion', 31, 1),
(8433, '31210', 'Arcos, Los', 31, 1),
(8434, '31219', 'Ubago', 31, 1),
(8435, '31219', 'Ubago', 31, 1),
(8436, '31219', 'Ubago', 31, 1),
(8437, '31219', 'Ubago', 31, 1),
(8438, '31219', 'Ubago', 31, 1),
(8439, '31219', 'Ubago', 31, 1),
(8440, '31220', 'Sansol', 31, 1),
(8441, '31227', 'Meano', 31, 1),
(8442, '31227', 'Meano', 31, 1),
(8443, '31227', 'Meano', 31, 1),
(8444, '31227', 'Meano', 31, 1),
(8445, '31228', 'Torralba Del Rio', 31, 1),
(8446, '31228', 'Torralba Del Rio', 31, 1),
(8447, '31228', 'Torralba Del Rio', 31, 1),
(8448, '31228', 'Torralba Del Rio', 31, 1),
(8449, '31228', 'Torralba Del Rio', 31, 1),
(8450, '31229', 'Torres Del Rio', 31, 1),
(8451, '31229', 'Torres Del Rio', 31, 1),
(8452, '31229', 'Torres Del Rio', 31, 1),
(8453, '31229', 'Torres Del Rio', 31, 1),
(8454, '31230', 'Viana', 31, 1),
(8455, '31239', 'Aras', 31, 1),
(8456, '31240', 'Ayegui', 31, 1),
(8457, '31241', 'Zufia', 31, 1),
(8458, '31241', 'Zufia', 31, 1),
(8459, '31241', 'Zufia', 31, 1),
(8460, '31242', 'Villamayor De Monjardin', 31, 1),
(8461, '31243', 'Urbiola', 31, 1),
(8462, '31243', 'Urbiola', 31, 1),
(8463, '31243', 'Urbiola', 31, 1),
(8464, '31243', 'Urbiola', 31, 1),
(8465, '31250', 'Oteiza', 31, 1),
(8466, '31251', 'Larraga', 31, 1),
(8467, '31252', 'Berbinzana', 31, 1),
(8468, '31253', 'Miranda De Arga', 31, 1),
(8469, '31260', 'Lerin', 31, 1),
(8470, '31261', 'Andosilla', 31, 1),
(8471, '31262', 'Allo', 31, 1),
(8472, '31263', 'Dicastillo', 31, 1),
(8473, '31263', 'Dicastillo', 31, 1),
(8474, '31264', 'Muniain De La Solana', 31, 1),
(8475, '31264', 'Muniain De La Solana', 31, 1),
(8476, '31270', 'Larraona', 31, 1),
(8477, '31271', 'Eulate', 31, 1),
(8478, '31271', 'Eulate', 31, 1),
(8479, '31272', 'Zudaire', 31, 1),
(8480, '31280', 'Murieta', 31, 1),
(8481, '31280', 'Murieta', 31, 1),
(8482, '31280', 'Murieta', 31, 1),
(8483, '31281', 'Olejua', 31, 1),
(8484, '31281', 'Olejua', 31, 1),
(8485, '31281', 'Olejua', 31, 1),
(8486, '31281', 'Olejua', 31, 1),
(8487, '31281', 'Olejua', 31, 1),
(8488, '31282', 'Nazar', 31, 1),
(8489, '31282', 'Nazar', 31, 1),
(8490, '31283', 'Viloria', 31, 1),
(8491, '31284', 'ZuÑiga', 31, 1),
(8492, '31290', 'Muneta', 31, 1),
(8493, '31290', 'Muneta', 31, 1),
(8494, '31291', 'Viguria', 31, 1),
(8495, '31291', 'Viguria', 31, 1),
(8496, '31292', 'Zurucuain', 31, 1),
(8497, '31292', 'Zurucuain', 31, 1),
(8498, '31292', 'Zurucuain', 31, 1),
(8499, '31293', 'Sesma', 31, 1),
(8500, '31300', 'Tafalla', 31, 1),
(8501, '31310', 'Oliva, La (monasterio)', 31, 1),
(8502, '31311', 'Figarol', 31, 1),
(8503, '31312', 'San Isidro Del Pinar', 31, 1),
(8504, '31313', 'Murillo El Fruto', 31, 1),
(8505, '31314', 'Santacara', 31, 1),
(8506, '31315', 'Traibuenas', 31, 1),
(8507, '31320', 'Milagro', 31, 1),
(8508, '31330', 'Villafranca', 31, 1),
(8509, '31340', 'Marcilla', 31, 1),
(8510, '31350', 'Peralta', 31, 1),
(8511, '31360', 'Funes', 31, 1),
(8512, '31370', 'Falces', 31, 1),
(8513, '31380', 'Caparroso', 31, 1),
(8514, '31381', 'Caparroso', 31, 1),
(8515, '31382', 'Melida', 31, 1),
(8516, '31383', 'Rada', 31, 1),
(8517, '31390', 'Olite', 31, 1),
(8518, '31391', 'Murillo El Cuende', 31, 1),
(8519, '31392', 'Pitillas', 31, 1),
(8520, '31393', 'Beire', 31, 1),
(8521, '31394', 'Pueyo', 31, 1),
(8522, '31395', 'Uzquita', 31, 1),
(8523, '31395', 'Uzquita', 31, 1),
(8524, '31395', 'Uzquita', 31, 1),
(8525, '31395', 'Uzquita', 31, 1),
(8526, '31395', 'Uzquita', 31, 1),
(8527, '31396', 'Unzue', 31, 1),
(8528, '31396', 'Unzue', 31, 1),
(8529, '31397', 'Campanas', 31, 1),
(8530, '31398', 'Tiebas', 31, 1),
(8531, '31398', 'Tiebas', 31, 1),
(8532, '31400', 'SangÜesa/zangoza', 31, 1),
(8533, '31409', 'Torre De PeÑa', 31, 1),
(8534, '31409', 'Torre De PeÑa', 31, 1),
(8535, '31410', 'Yesa', 31, 1),
(8536, '31411', 'Javier', 31, 1),
(8537, '31412', 'Burgui/burgi', 31, 1),
(8538, '31413', 'Vidangoz/bidankoze', 31, 1),
(8539, '31414', 'Garde', 31, 1),
(8540, '31415', 'Roncal/erronkari', 31, 1),
(8541, '31416', 'Urzainqui', 31, 1),
(8542, '31417', 'Isaba/izaba', 31, 1),
(8543, '31418', 'Uztarroz/uztarroze', 31, 1),
(8544, '31420', 'Urroz', 31, 1),
(8545, '31421', 'Zuazu (izagaondoa)', 31, 1),
(8546, '31422', 'Zoroquiain', 31, 1),
(8547, '31430', 'Aoiz/agoitz', 31, 1),
(8548, '31438', 'Zandueta', 31, 1),
(8549, '31438', 'Zandueta', 31, 1),
(8550, '31439', 'Usoz/ Usotz', 31, 1),
(8551, '31439', 'Usoz/ Usotz', 31, 1),
(8552, '31439', 'Usoz/ Usotz', 31, 1),
(8553, '31440', 'Lumbier', 31, 1),
(8554, '31448', 'Zabalza (urraul Alto)', 31, 1),
(8555, '31448', 'Zabalza (urraul Alto)', 31, 1),
(8556, '31449', 'Tabar', 31, 1),
(8557, '31450', 'Navascues', 31, 1),
(8558, '31451', 'Ustes', 31, 1),
(8559, '31451', 'Ustes', 31, 1),
(8560, '31451', 'Ustes', 31, 1),
(8561, '31451', 'Ustes', 31, 1),
(8562, '31452', 'Ripalda/erripalda', 31, 1),
(8563, '31453', 'Esparza De Salazar', 31, 1),
(8564, '31454', 'Usun', 31, 1),
(8565, '31454', 'Usun', 31, 1),
(8566, '31454', 'Usun', 31, 1),
(8567, '31454', 'Usun', 31, 1),
(8568, '31460', 'Leache', 31, 1),
(8569, '31460', 'Leache', 31, 1),
(8570, '31470', 'Zulueta', 31, 1),
(8571, '31471', 'Monreal', 31, 1),
(8572, '31472', 'Zabalza (ibargoiti)', 31, 1),
(8573, '31472', 'Zabalza (ibargoiti)', 31, 1),
(8574, '31473', 'Vesolla', 31, 1),
(8575, '31480', 'Grez', 31, 1),
(8576, '31481', 'Zuza/zutza', 31, 1),
(8577, '31481', 'Zuza/zutza', 31, 1),
(8578, '31482', 'Redin', 31, 1),
(8579, '31483', 'Oscariz', 31, 1),
(8580, '31484', 'Zunzarren', 31, 1),
(8581, '31485', 'Yelz', 31, 1),
(8582, '31486', 'Ustarroz (egues)', 31, 1),
(8583, '31487', 'Liedena', 31, 1),
(8584, '31490', 'Caseda', 31, 1),
(8585, '31491', 'Sada', 31, 1),
(8586, '31492', 'Ayesa', 31, 1),
(8587, '31493', 'Gallipienzo Nuevo', 31, 1),
(8588, '31494', 'Sansoain (leoz)', 31, 1),
(8589, '31494', 'Sansoain (leoz)', 31, 1),
(8590, '31494', 'Sansoain (leoz)', 31, 1),
(8591, '31495', 'San Martin De Unx', 31, 1),
(8592, '31496', 'Ujue', 31, 1),
(8593, '31500', 'Tudela', 31, 1),
(8594, '31510', 'FustiÑana', 31, 1),
(8595, '31511', 'Cabanillas', 31, 1),
(8596, '31512', 'Fontellas', 31, 1),
(8597, '31513', 'Arguedas', 31, 1),
(8598, '31514', 'Valtierra', 31, 1),
(8599, '31515', 'Cadreita', 31, 1),
(8600, '31520', 'Cascante', 31, 1),
(8601, '31521', 'Murchante', 31, 1),
(8602, '31522', 'Tulebras', 31, 1),
(8603, '31522', 'Tulebras', 31, 1),
(8604, '31523', 'Barillas', 31, 1),
(8605, '31523', 'Barillas', 31, 1),
(8606, '31523', 'Barillas', 31, 1),
(8607, '31530', 'Cortes', 31, 1),
(8608, '31540', 'BuÑuel', 31, 1),
(8609, '31550', 'Ribaforada', 31, 1),
(8610, '31560', 'Azagra', 31, 1),
(8611, '31570', 'San Adrian', 31, 1),
(8612, '31579', 'Carcar', 31, 1),
(8613, '31580', 'Lodosa', 31, 1),
(8614, '31587', 'Mendavia', 31, 1),
(8615, '31588', 'Lazagurria', 31, 1),
(8616, '31589', 'Sartaguda', 31, 1),
(8617, '31590', 'Giraldelli', 31, 1),
(8618, '31591', 'Corella', 31, 1),
(8619, '31592', 'Cintruenigo', 31, 1),
(8620, '31593', 'Fitero', 31, 1),
(8621, '31600', 'Burlada/burlata', 31, 1),
(8622, '31610', 'Villava', 31, 1),
(8623, '31620', 'Olaz De EgÜes', 31, 1),
(8624, '31620', 'Olaz De EgÜes', 31, 1),
(8625, '31621', 'Sarriguren', 31, 1),
(8626, '31630', 'Zubiri', 31, 1),
(8627, '31638', 'Quinto Real', 31, 1),
(8628, '31638', 'Quinto Real', 31, 1),
(8629, '31639', 'Zilbeti', 31, 1),
(8630, '31639', 'Zilbeti', 31, 1),
(8631, '31640', 'Auritz/burguete', 31, 1),
(8632, '31650', 'Orreaga/roncesvalles', 31, 1),
(8633, '31660', 'Luzaide/valcarlos', 31, 1),
(8634, '31669', 'Luzaide/Valcarlos', 31, 1),
(8635, '31670', 'Orbaitzeta', 31, 1),
(8636, '31671', 'Orbara', 31, 1),
(8637, '31671', 'Orbara', 31, 1),
(8638, '31671', 'Orbara', 31, 1),
(8639, '31671', 'Orbara', 31, 1),
(8640, '31680', 'Ochagavia', 31, 1),
(8641, '31689', 'Izalzu/itzaltzu', 31, 1),
(8642, '31690', 'Ezcaroz/ezkaroze', 31, 1),
(8643, '31691', 'Jaurrieta', 31, 1),
(8644, '31692', 'Garaioa', 31, 1),
(8645, '31692', 'Garaioa', 31, 1),
(8646, '31692', 'Garaioa', 31, 1),
(8647, '31693', 'Garralda', 31, 1),
(8648, '31694', 'Aurizberri/espinal', 31, 1),
(8649, '31695', 'Ureta', 31, 1),
(8650, '31696', 'Lintzoain', 31, 1),
(8651, '31697', 'Urniza', 31, 1),
(8652, '31698', 'Urdaitz/urdaniz', 31, 1),
(8653, '31699', 'Zuriain', 31, 1),
(8654, '31699', 'Zuriain', 31, 1),
(8655, '31700', 'Etxaide (baztan)', 31, 1),
(8656, '31710', 'Zugarramurdi', 31, 1),
(8657, '31711', 'Urdazubi/urdax', 31, 1),
(8658, '31712', 'Dantxarinea', 31, 1),
(8659, '31713', 'Pertalats', 31, 1),
(8660, '31714', 'IÑarbil', 31, 1),
(8661, '31715', 'Zuaztoi (azpilikueta)', 31, 1),
(8662, '31720', 'Zozaia (oronoz), Pueblo', 31, 1),
(8663, '31720', 'Zozaia (oronoz), Pueblo', 31, 1),
(8664, '31730', 'Irurita', 31, 1),
(8665, '31740', 'Doneztebe/santesteban', 31, 1),
(8666, '31744', 'Elgorriaga', 31, 1),
(8667, '31745', 'Latsaga', 31, 1),
(8668, '31746', 'Zubieta', 31, 1),
(8669, '31747', 'Saldias', 31, 1),
(8670, '31748', 'Eratsun', 31, 1),
(8671, '31749', 'Ezkurra', 31, 1),
(8672, '31750', 'Gaztelu', 31, 1),
(8673, '31751', 'Oitz', 31, 1),
(8674, '31752', 'Urrotz, Pueblo', 31, 1),
(8675, '31753', 'Labaien', 31, 1),
(8676, '31754', 'Urumea', 31, 1),
(8677, '31754', 'Urumea', 31, 1),
(8678, '31760', 'Urritzokieta', 31, 1),
(8679, '31770', 'Zala', 31, 1),
(8680, '31780', 'Bera/vera De Bidasoa', 31, 1),
(8681, '31789', 'Zalain Zoko', 31, 1),
(8682, '31789', 'Zalain Zoko', 31, 1),
(8683, '31790', 'Unanua', 31, 1),
(8684, '31790', 'Unanua', 31, 1),
(8685, '31791', 'Sunbilla', 31, 1),
(8686, '31792', 'Zeberi', 31, 1),
(8687, '31793', 'Tipulatze', 31, 1),
(8688, '31794', 'Uharte (baztan)', 31, 1),
(8689, '31794', 'Uharte (baztan)', 31, 1),
(8690, '31795', 'Lekaroz', 31, 1),
(8691, '31796', 'Zigaurre', 31, 1),
(8692, '31797', 'Suarbe', 31, 1),
(8693, '31798', 'Olague', 31, 1),
(8694, '31798', 'Olague', 31, 1),
(8695, '31799', 'Zenotz', 31, 1),
(8696, '31799', 'Zenotz', 31, 1),
(8697, '31799', 'Zenotz', 31, 1),
(8698, '31799', 'Zenotz', 31, 1),
(8699, '31800', 'Altsasu/alsasua', 31, 1),
(8700, '31809', 'Ziordia', 31, 1),
(8701, '31809', 'Ziordia', 31, 1),
(8702, '31810', 'Urdiain', 31, 1),
(8703, '31810', 'Urdiain', 31, 1),
(8704, '31810', 'Urdiain', 31, 1),
(8705, '31820', 'Lizarragabengoa', 31, 1),
(8706, '31829', 'Unanu', 31, 1),
(8707, '31830', 'Lakuntza', 31, 1),
(8708, '31839', 'Arbizu', 31, 1),
(8709, '31840', 'Zamartze', 31, 1),
(8710, '31840', 'Zamartze', 31, 1),
(8711, '31849', 'Murgindueta', 31, 1),
(8712, '31849', 'Murgindueta', 31, 1),
(8713, '31850', 'Satrustegi', 31, 1),
(8714, '31860', 'Irurtzun', 31, 1),
(8715, '31866', 'Orokieta', 31, 1),
(8716, '31867', 'Zia', 31, 1),
(8717, '31867', 'Zia', 31, 1),
(8718, '31867', 'Zia', 31, 1),
(8719, '31867', 'Zia', 31, 1),
(8720, '31867', 'Zia', 31, 1),
(8721, '31868', 'Zuhatzu', 31, 1),
(8722, '31868', 'Zuhatzu', 31, 1),
(8723, '31869', 'Zarrantz', 31, 1),
(8724, '31869', 'Zarrantz', 31, 1),
(8725, '31870', 'San Migel', 31, 1),
(8726, '31876', 'Areso', 31, 1),
(8727, '31877', 'Uitzi', 31, 1),
(8728, '31878', 'Mugiro', 31, 1),
(8729, '31879', 'Oderitz', 31, 1),
(8730, '31880', 'Sakulu', 31, 1),
(8731, '31890', 'Betelu', 31, 1),
(8732, '31891', 'Uztegi', 31, 1),
(8733, '31891', 'Uztegi', 31, 1),
(8734, '31892', 'Zuasti (iza)', 31, 1),
(8735, '31892', 'Zuasti (iza)', 31, 1),
(8736, '32001', 'Ourense', 32, 1),
(8737, '32002', 'Ourense', 32, 1),
(8738, '32002', 'Ourense', 32, 1),
(8739, '32003', 'Ourense', 32, 1),
(8740, '32004', 'Ourense', 32, 1),
(8741, '32005', 'Ourense', 32, 1),
(8742, '32005', 'Ourense', 32, 1),
(8743, '32005', 'Ourense', 32, 1),
(8744, '32100', 'Vilarnaz', 32, 1),
(8745, '32101', 'Vilamarin', 32, 1),
(8746, '32102', 'Tamallancos', 32, 1),
(8747, '32103', 'Viso, O (ourense)', 32, 1),
(8748, '32110', 'Paderne de Allariz', 32, 1),
(8749, '32111', 'Vilaverde (paderne De Allariz)', 32, 1),
(8750, '32120', 'Xagrade', 32, 1),
(8751, '32120', 'Xagrade', 32, 1),
(8752, '32130', 'Cea', 32, 1),
(8753, '32133', 'San Cristovo de Cea', 32, 1),
(8754, '32134', 'San Cristovo de Cea', 32, 1),
(8755, '32135', 'Lagoas, As (piÑor)', 32, 1),
(8756, '32135', 'Lagoas, As (piÑor)', 32, 1),
(8757, '32136', 'Zamoiros', 32, 1),
(8758, '32137', 'Torre, A (piÑor)', 32, 1),
(8759, '32137', 'Torre, A (piÑor)', 32, 1),
(8760, '32138', 'Vilar (piÑor)', 32, 1),
(8761, '32139', 'Santros', 32, 1),
(8762, '32140', 'Souto, O (vilamarin)', 32, 1),
(8763, '32141', 'Zarza', 32, 1),
(8764, '32141', 'Zarza', 32, 1),
(8765, '32150', 'Vispin', 32, 1),
(8766, '32151', 'Vilasusa', 32, 1),
(8767, '32152', 'Vilarchao (coles)', 32, 1),
(8768, '32153', 'Vilanova (barra-coles)', 32, 1),
(8769, '32153', 'Vilanova (barra-coles)', 32, 1),
(8770, '32160', 'Vilouriz', 32, 1),
(8771, '32161', 'Ver De Fondo', 32, 1),
(8772, '32162', 'Nogueira de Ramu', 32, 1),
(8773, '32163', 'Nogueira de Ramu', 32, 1),
(8774, '32164', 'Vilouxe (nogueira De Ramuin)', 32, 1),
(8775, '32170', 'Torre (amoeiro)', 32, 1),
(8776, '32171', 'Amoeiro', 32, 1),
(8777, '32172', 'Trasalba (san Pedro)', 32, 1),
(8778, '32172', 'Trasalba (san Pedro)', 32, 1),
(8779, '32200', 'Cortegada (cortegada)', 32, 1),
(8780, '32211', 'Zaparin', 32, 1),
(8781, '32212', 'ViÑal (gomesende)', 32, 1),
(8782, '32213', 'Vilanova Da Barca (cortegada)', 32, 1),
(8783, '32220', 'Padrenda', 32, 1),
(8784, '32226', 'San Roque De Crespos', 32, 1),
(8785, '32227', 'Vilar (padrenda)', 32, 1),
(8786, '32228', 'San Antonio (padrenda)', 32, 1),
(8787, '32229', 'Vilanova Da Barca', 32, 1),
(8788, '32235', 'Xinzo De Deva', 32, 1),
(8789, '32236', 'Sa (padrenda)', 32, 1),
(8790, '32300', 'Barco, O', 32, 1),
(8791, '32310', 'Val, O (rubia)', 32, 1),
(8792, '32311', 'Veiga De Cascalla, A', 32, 1),
(8793, '32312', 'Robledo Da Lastra, O', 32, 1),
(8794, '32313', 'O Barco de Valdeorras', 32, 1),
(8795, '32314', 'VilariÑo (barco De Valdeorras, O)', 32, 1),
(8796, '32315', 'Viloira (san MartiÑo)', 32, 1),
(8797, '32315', 'Viloira (san MartiÑo)', 32, 1),
(8798, '32316', 'Vilamart', 32, 1),
(8799, '32317', 'Xagoaza', 32, 1),
(8800, '32318', 'Viloval', 32, 1),
(8801, '32320', 'Sobredo (rubia)', 32, 1),
(8802, '32329', 'Vilardesilva', 32, 1),
(8803, '32329', 'Vilardesilva', 32, 1),
(8804, '32330', 'Sobradelo (carballeda)', 32, 1),
(8805, '32334', 'Viladequinta', 32, 1),
(8806, '32335', 'Carballeda de Valdeorras', 32, 1),
(8807, '32336', 'Soutadoiro', 32, 1),
(8808, '32337', 'Trigal, O', 32, 1),
(8809, '32338', 'Vila (carballeda)', 32, 1),
(8810, '32339', 'Carballeda de Valdeorras', 32, 1),
(8811, '32340', 'Vilamartin De Valdeorras', 32, 1),
(8812, '32348', 'Val De Godos', 32, 1),
(8813, '32349', 'Vilamart', 32, 1),
(8814, '32350', 'Rua De Valdeorras, A (rua, A)', 32, 1),
(8815, '32356', 'Petin', 32, 1),
(8816, '32357', 'Vilela (rua, A)', 32, 1),
(8817, '32357', 'Vilela (rua, A)', 32, 1),
(8818, '32357', 'Vilela (rua, A)', 32, 1),
(8819, '32357', 'Vilela (rua, A)', 32, 1),
(8820, '32357', 'Vilela (rua, A)', 32, 1),
(8821, '32358', 'Seadur', 32, 1),
(8822, '32359', 'A R', 32, 1),
(8823, '32360', 'Veiga, A (santa Maria)', 32, 1),
(8824, '32365', 'Xares', 32, 1),
(8825, '32366', 'Vilanova (veiga, A)', 32, 1),
(8826, '32367', 'A Veiga', 32, 1),
(8827, '32368', 'Vilaboa (veiga, A)', 32, 1),
(8828, '32369', 'Valdin', 32, 1),
(8829, '32370', 'Freixido De Arriba', 32, 1),
(8830, '32370', 'Freixido De Arriba', 32, 1),
(8831, '32371', 'Portomourisco', 32, 1),
(8832, '32371', 'Portomourisco', 32, 1),
(8833, '32372', 'San MartiÑo (bolo, O)', 32, 1),
(8834, '32373', 'Xava', 32, 1),
(8835, '32374', 'O Bolo', 32, 1),
(8836, '32375', 'Vilaseco (bolo, O)', 32, 1),
(8837, '32375', 'Vilaseco (bolo, O)', 32, 1),
(8838, '32400', 'Ribadavia', 32, 1),
(8839, '32410', 'Valmourisco', 32, 1),
(8840, '32411', 'Vivenzo', 32, 1),
(8841, '32412', 'VilariÑo (carballeda De Avia)', 32, 1),
(8842, '32413', 'Saa (carballeda De Avia)', 32, 1),
(8843, '32414', 'Ribadavia', 32, 1),
(8844, '32415', 'Ventosela (ribadavia)', 32, 1),
(8845, '32416', 'Veiga, A (carballeda De Avia)', 32, 1),
(8846, '32416', 'Veiga, A (carballeda De Avia)', 32, 1),
(8847, '32417', 'Sendin', 32, 1),
(8848, '32417', 'Sendin', 32, 1),
(8849, '32417', 'Sendin', 32, 1),
(8850, '32418', 'Santa Cristina (ribadavia)', 32, 1),
(8851, '32420', 'Vilaverde', 32, 1),
(8852, '32425', 'Casar (leiro)', 32, 1),
(8853, '32426', 'Outeiro, O (orega)', 32, 1),
(8854, '32427', 'Leiro', 32, 1),
(8855, '32428', 'Valboa (leiro)', 32, 1),
(8856, '32429', 'Vilerma, A', 32, 1),
(8857, '32430', 'Vilela (castrelo MiÑo)', 32, 1),
(8858, '32431', 'Beade (beade)', 32, 1),
(8859, '32432', 'Regadas, As (beade)', 32, 1),
(8860, '32433', 'Serra, A', 32, 1),
(8861, '32434', 'Carballeda de Avia', 32, 1),
(8862, '32440', 'Peares, Os', 32, 1),
(8863, '32448', 'Zumento', 32, 1),
(8864, '32449', 'Vilar De Carracedo', 32, 1),
(8865, '32450', 'Barca De Barbantes, A', 32, 1),
(8866, '32452', 'Vilar (punxin)', 32, 1),
(8867, '32453', 'Xinzo (san Amaro)', 32, 1),
(8868, '32454', 'Vilar De Rei', 32, 1),
(8869, '32455', 'ViriÑa, A', 32, 1),
(8870, '32456', 'ViÑao, O', 32, 1),
(8871, '32456', 'ViÑao, O', 32, 1),
(8872, '32457', 'Pousa, A (santa Maria Freas)', 32, 1),
(8873, '32459', 'Xubin', 32, 1),
(8874, '32499', 'A Mezquita', 32, 1),
(8875, '32500', 'Framia (carballiÑo, O)', 32, 1),
(8876, '32510', 'Zafra', 32, 1),
(8878, '32512', 'Xoane', 32, 1),
(8880, '32514', 'Xuvencos', 32, 1),
(8881, '32515', 'Veiga, A (baron, O)', 32, 1),
(8882, '32515', 'Veiga, A (baron, O)', 32, 1),
(8883, '32516', 'Trigas (sagra)', 32, 1),
(8884, '32520', 'Vilar (avion)', 32, 1),
(8885, '32520', 'Vilar (avion)', 32, 1),
(8886, '32520', 'Vilar (avion)', 32, 1),
(8887, '32521', 'Ventosa (boboras)', 32, 1),
(8888, '32522', 'Xurenzas', 32, 1),
(8889, '32523', 'Vilacha (boboras)', 32, 1),
(8890, '32524', 'Bobor', 32, 1),
(8891, '32525', 'Xirazga (beariz)', 32, 1),
(8892, '32526', 'Xendive (boboras)', 32, 1),
(8893, '32526', 'Xendive (boboras)', 32, 1),
(8894, '32530', 'Zacarade', 32, 1),
(8895, '32530', 'Zacarade', 32, 1),
(8896, '32534', 'Vilar (carballiÑo, O)', 32, 1),
(8897, '32535', 'O Irixo', 32, 1),
(8898, '32536', 'Seara, A (irixo, O)', 32, 1),
(8899, '32537', 'Xirei', 32, 1),
(8900, '32538', 'O Irixo', 32, 1),
(8901, '32539', 'Viso, O (rixo, O)', 32, 1),
(8902, '32540', 'GudiÑa, A', 32, 1),
(8903, '32545', 'Seixo, O (gudiÑa, A)', 32, 1),
(8904, '32546', 'Parada Da Serra', 32, 1),
(8905, '32547', 'Venda Do BolaÑo, A', 32, 1),
(8906, '32547', 'Venda Do BolaÑo, A', 32, 1),
(8907, '32548', 'Tameiron, O', 32, 1),
(8908, '32549', 'Vilavella, A', 32, 1),
(8909, '32550', 'Viana Do Bolo', 32, 1),
(8910, '32554', 'Seoane De Abaixo', 32, 1),
(8911, '32555', 'Vilaseco Da Serra', 32, 1),
(8912, '32556', 'Tabazoa De Hedroso', 32, 1),
(8913, '32557', 'VilariÑo De Conso', 32, 1),
(8914, '32557', 'VilariÑo De Conso', 32, 1),
(8915, '32558', 'Vilar De Goia', 32, 1),
(8916, '32560', 'Solbeira (viana Do Bolo)', 32, 1),
(8917, '32562', 'Fornelos De Filloas', 32, 1),
(8918, '32563', 'Pexeiros (viana Do Bolo)', 32, 1),
(8919, '32570', 'Maside', 32, 1),
(8920, '32572', 'Punx', 32, 1),
(8921, '32572', 'Maside', 32, 1),
(8922, '32574', 'Touza (san Miguel Armeses)', 32, 1),
(8923, '32574', 'Touza (san Miguel Armeses)', 32, 1),
(8924, '32575', 'Negrelle (maside)', 32, 1),
(8925, '32576', 'Maside', 32, 1),
(8926, '32577', 'Sueirexa (maside)', 32, 1),
(8927, '32578', 'Punx', 32, 1),
(8928, '32578', 'Maside', 32, 1),
(8929, '32579', 'Maside', 32, 1),
(8930, '32590', 'A Mezquita', 32, 1),
(8932, '32591', 'Castrelo do Val', 32, 1),
(8933, '32592', 'Paderne de Allariz', 32, 1),
(8934, '32592', 'Ba', 32, 1),
(8935, '32593', 'Ourense', 32, 1),
(8936, '32600', 'Verin', 32, 1),
(8937, '32610', 'Vendas Da Barreira, As', 32, 1),
(8938, '32610', 'Vendas Da Barreira, As', 32, 1),
(8939, '32611', 'VilariÑo Das Touzas', 32, 1),
(8940, '32611', 'VilariÑo Das Touzas', 32, 1),
(8941, '32612', 'Trasestrada', 32, 1),
(8942, '32612', 'Trasestrada', 32, 1),
(8943, '32613', 'Videferre', 32, 1),
(8944, '32614', 'Vilardev', 32, 1),
(8945, '32615', 'Abedes', 32, 1),
(8946, '32616', 'Vilarello (vilardevos)', 32, 1),
(8947, '32617', 'Veiga Das Meas, A', 32, 1),
(8948, '32618', 'Vilaza', 32, 1),
(8949, '32619', 'Pazos (verin)', 32, 1),
(8950, '32620', 'SouteliÑo (laza)', 32, 1),
(8951, '32621', 'Trez', 32, 1),
(8952, '32622', 'Vilamea (laza)', 32, 1),
(8953, '32623', 'Laza', 32, 1),
(8954, '32624', 'Vences', 32, 1),
(8955, '32624', 'Vences', 32, 1);
INSERT INTO `lnx_poblaciones` (`id`, `cp`, `poblacion`, `idprov`, `idpais`) VALUES
(8956, '32625', 'Ribas (s Vicente Pepin)', 32, 1),
(8957, '32626', 'Vilar (castrelo Do Val)', 32, 1),
(8958, '32630', 'Xinzo De Limia', 32, 1),
(8959, '32631', 'Tarrazo', 32, 1),
(8960, '32631', 'Tarrazo', 32, 1),
(8961, '32631', 'Tarrazo', 32, 1),
(8962, '32632', 'Texos', 32, 1),
(8963, '32632', 'Texos', 32, 1),
(8964, '32632', 'Texos', 32, 1),
(8965, '32633', 'Vilamaior Da Boullosa', 32, 1),
(8966, '32634', 'Vilar (blancos, Os)', 32, 1),
(8967, '32635', 'Rial (xinzo De Limia)', 32, 1),
(8968, '32635', 'Rial (xinzo De Limia)', 32, 1),
(8969, '32636', 'Veredo, O', 32, 1),
(8970, '32636', 'Veredo, O', 32, 1),
(8971, '32637', 'Seoane De Oleiros', 32, 1),
(8972, '32637', 'Seoane De Oleiros', 32, 1),
(8973, '32640', 'Soutelo De Ribeira', 32, 1),
(8974, '32641', 'Toxal, O', 32, 1),
(8975, '32643', 'Xocin (porqueira)', 32, 1),
(8976, '32644', 'Soutelo (porqueira)', 32, 1),
(8977, '32644', 'Soutelo (porqueira)', 32, 1),
(8978, '32645', 'Porqueira', 32, 1),
(8979, '32645', 'Calvos de Rand', 32, 1),
(8980, '32646', 'VilariÑo (calvos De Randin)', 32, 1),
(8981, '32646', 'VilariÑo (calvos De Randin)', 32, 1),
(8982, '32647', 'Calvos de Rand', 32, 1),
(8983, '32648', 'Vila (calvos De Randin)', 32, 1),
(8984, '32650', 'Vilar De Santos', 32, 1),
(8985, '32651', 'Vieiro, O', 32, 1),
(8986, '32652', 'Toxo (rairiz De Veiga)', 32, 1),
(8987, '32653', 'Rairiz de Veiga', 32, 1),
(8988, '32654', 'Zapeaus', 32, 1),
(8989, '32655', 'Santa Baia (rairiz De Veiga)', 32, 1),
(8990, '32660', 'Allariz', 32, 1),
(8991, '32664', 'Vilares (allariz)', 32, 1),
(8992, '32665', 'Seoane (allariz)', 32, 1),
(8993, '32666', 'Torneiros (allariz)', 32, 1),
(8994, '32667', 'VilariÑo De Tras Do Convento', 32, 1),
(8995, '32668', 'Vilar De Flores', 32, 1),
(8996, '32669', 'Roiriz', 32, 1),
(8997, '32670', 'Xunqueira De Ambia', 32, 1),
(8998, '32678', 'Xunqueiroa', 32, 1),
(8999, '32679', 'VilariÑo Da Veiga', 32, 1),
(9000, '32680', 'Mercedes, As', 32, 1),
(9001, '32688', 'Xironda, A', 32, 1),
(9002, '32689', 'San MartiÑo (cualedro)', 32, 1),
(9003, '32690', 'XociÑos', 32, 1),
(9004, '32690', 'XociÑos', 32, 1),
(9005, '32691', 'Veredo (taboadela)', 32, 1),
(9006, '32692', 'VilariÑo Das Poldras', 32, 1),
(9007, '32693', 'Zadagos', 32, 1),
(9008, '32694', 'Trasmiras', 32, 1),
(9009, '32695', 'Zos', 32, 1),
(9010, '32696', 'Vilaseca', 32, 1),
(9011, '32696', 'Vilaseca', 32, 1),
(9012, '32697', 'Tamaguelos', 32, 1),
(9013, '32698', 'Rabal (oimbra)', 32, 1),
(9014, '32698', 'Rabal (oimbra)', 32, 1),
(9015, '32699', 'Feces De Abaixo', 32, 1),
(9016, '32700', 'Maceda', 32, 1),
(9017, '32701', 'Xocin (baÑos De Molgas)', 32, 1),
(9018, '32702', 'Vilar De Gomareite', 32, 1),
(9019, '32702', 'Vilar De Gomareite', 32, 1),
(9020, '32703', 'Zorelle', 32, 1),
(9021, '32704', 'SanguÑedo (baÑos De Molgas)', 32, 1),
(9022, '32705', 'Porto (vilar De Barrio)', 32, 1),
(9023, '32705', 'Porto (vilar De Barrio)', 32, 1),
(9024, '32706', 'Xinzo Da Costa', 32, 1),
(9025, '32707', 'Tioira', 32, 1),
(9026, '32708', 'Ramil (maceda)', 32, 1),
(9027, '32708', 'Ramil (maceda)', 32, 1),
(9028, '32710', 'Vilar (prexigueiro)', 32, 1),
(9029, '32711', 'Xubande', 32, 1),
(9030, '32720', 'Vilar De Ordelles', 32, 1),
(9031, '32720', 'Vilar De Ordelles', 32, 1),
(9032, '32720', 'Vilar De Ordelles', 32, 1),
(9033, '32720', 'Vilar De Ordelles', 32, 1),
(9034, '32730', 'Xunqueira De Espada', 32, 1),
(9035, '32740', 'Sardela', 32, 1),
(9036, '32746', 'Parada de Sil', 32, 1),
(9037, '32747', 'Sacardebois (san MartiÑo)', 32, 1),
(9038, '32748', 'Val, O (parada De Sil)', 32, 1),
(9039, '32749', 'CoutiÑo, O', 32, 1),
(9040, '32750', 'Viloxe (montederramo)', 32, 1),
(9041, '32751', 'Xestosa, A', 32, 1),
(9042, '32760', 'Castro De Caldelas, O', 32, 1),
(9043, '32764', 'Val, O (castro Caldelas)', 32, 1),
(9044, '32764', 'Val, O (castro Caldelas)', 32, 1),
(9045, '32765', 'Xiras', 32, 1),
(9046, '32766', 'Vimieiro', 32, 1),
(9047, '32767', 'Rabal (chandrexa De Queixa)', 32, 1),
(9048, '32768', 'San Fiz (chandrexa De Queixa)', 32, 1),
(9049, '32768', 'San Fiz (chandrexa De Queixa)', 32, 1),
(9050, '32769', 'Vilar De Oleiros (castro Caldelas)', 32, 1),
(9051, '32769', 'Vilar De Oleiros (castro Caldelas)', 32, 1),
(9052, '32770', 'Torre Vella, A', 32, 1),
(9053, '32774', 'Campo, O (castro Caldelas)', 32, 1),
(9054, '32779', 'Xunquedo, O', 32, 1),
(9055, '32780', 'Trives', 32, 1),
(9056, '32781', 'Seoane (manzaneda)', 32, 1),
(9057, '32782', 'Soutelo (manzaneda)', 32, 1),
(9058, '32782', 'Soutelo (manzaneda)', 32, 1),
(9059, '32783', 'Manzaneda', 32, 1),
(9060, '32784', 'San Vicenzo', 32, 1),
(9061, '32785', 'Trabazos (manzaneda)', 32, 1),
(9062, '32786', 'Zamorela', 32, 1),
(9063, '32787', 'San Mamede De Trives', 32, 1),
(9064, '32787', 'San Mamede De Trives', 32, 1),
(9065, '32788', 'Sas De Xunqueira', 32, 1),
(9066, '32789', 'Vilarmeao (viana)', 32, 1),
(9067, '32789', 'Vilarmeao (viana)', 32, 1),
(9068, '32790', 'Villeta, A', 32, 1),
(9069, '32790', 'Villeta, A', 32, 1),
(9070, '32790', 'Villeta, A', 32, 1),
(9071, '32791', 'Trios (san Pedro)', 32, 1),
(9072, '32792', 'Venda, A (pereiro De Aguiar)', 32, 1),
(9073, '32793', 'Vilar (trios)', 32, 1),
(9074, '32793', 'Vilar (trios)', 32, 1),
(9075, '32794', 'VilariÑo Dos Palleiros', 32, 1),
(9076, '32794', 'VilariÑo Dos Palleiros', 32, 1),
(9077, '32794', 'VilariÑo Dos Palleiros', 32, 1),
(9078, '32800', 'Celanova', 32, 1),
(9079, '32810', 'Xocin (ramiras)', 32, 1),
(9080, '32811', 'Viso, O (ramiras)', 32, 1),
(9081, '32812', 'Vilaverde (bola, A)', 32, 1),
(9082, '32812', 'Vilaverde (bola, A)', 32, 1),
(9083, '32813', 'Xacebas', 32, 1),
(9084, '32814', 'Val (quintela De Leirado)', 32, 1),
(9085, '32815', 'Xamiras', 32, 1),
(9086, '32815', 'Xamiras', 32, 1),
(9087, '32816', 'Vilanova Dos Infantes', 32, 1),
(9088, '32816', 'Vilanova Dos Infantes', 32, 1),
(9089, '32817', 'Veiga, A (s. Munio)', 32, 1),
(9090, '32820', 'Vilar De Vacas', 32, 1),
(9091, '32821', 'Xinzo Das Teixugueiras', 32, 1),
(9092, '32822', 'Cartelle', 32, 1),
(9093, '32823', 'Vilar Da Ponte', 32, 1),
(9094, '32823', 'Vilar Da Ponte', 32, 1),
(9095, '32824', 'Outomuro', 32, 1),
(9096, '32825', 'Teixeira, A (cartelle)', 32, 1),
(9097, '32826', 'Penela (cartelle)', 32, 1),
(9098, '32827', 'Celanova', 32, 1),
(9099, '32828', 'Viveiro (celanova)', 32, 1),
(9100, '32829', 'Celanova', 32, 1),
(9101, '32830', 'Vilar De Paio MuÑiz', 32, 1),
(9102, '32838', 'Val, O (merca, A)', 32, 1),
(9103, '32839', 'Zarracos', 32, 1),
(9104, '32840', 'Bande', 32, 1),
(9105, '32845', 'Bande', 32, 1),
(9106, '32846', 'ViÑal, O (bande)', 32, 1),
(9107, '32846', 'ViÑal, O (bande)', 32, 1),
(9108, '32847', 'San Fiz (bande)', 32, 1),
(9109, '32848', 'Vilela (bande)', 32, 1),
(9110, '32849', 'Vilamea (calvos-bande)', 32, 1),
(9111, '32850', 'VilariÑo (san Xes)(lobeira)', 32, 1),
(9112, '32857', 'Lobeira', 32, 1),
(9113, '32858', 'Vila, A (lobeira)', 32, 1),
(9114, '32859', 'VilariÑo (montelongo)(lobeira)', 32, 1),
(9115, '32859', 'VilariÑo (montelongo)(lobeira)', 32, 1),
(9116, '32860', 'Terracha, A (entrimo)', 32, 1),
(9117, '32867', 'Entrimo', 32, 1),
(9118, '32868', 'Vilar (entrimo)', 32, 1),
(9119, '32869', 'Quintela (lobios)', 32, 1),
(9120, '32869', 'Quintela (lobios)', 32, 1),
(9121, '32870', 'Padrendo (lobios)', 32, 1),
(9122, '32879', 'Vila, A (lobios)', 32, 1),
(9123, '32880', 'Vilar De Cas (muiÑos)', 32, 1),
(9124, '32890', 'Sobrado Do Bispo', 32, 1),
(9125, '32891', 'Bande', 32, 1),
(9126, '32892', 'Xendive (lobios)', 32, 1),
(9127, '32893', 'Parada de Sil', 32, 1),
(9128, '32893', 'Lobios', 32, 1),
(9129, '32894', 'Lobios', 32, 1),
(9130, '32895', 'Vilamea (lobios)', 32, 1),
(9131, '32896', 'Pazo (muiÑos)', 32, 1),
(9132, '32897', 'Tedos', 32, 1),
(9133, '32898', 'Xermeade', 32, 1),
(9134, '32899', 'Farnadeiros', 32, 1),
(9135, '32900', 'Zamorana, A', 32, 1),
(9136, '32900', 'Zamorana, A', 32, 1),
(9137, '32901', 'Santa Cruz Da Rabeda', 32, 1),
(9138, '32910', 'Vilanova (san Cibrao Das ViÑas)', 32, 1),
(9139, '32911', 'San Cibrao Das ViÑas (capital)', 32, 1),
(9140, '32920', 'Trellerma', 32, 1),
(9141, '32920', 'Trellerma', 32, 1),
(9142, '32930', 'Xestosa', 32, 1),
(9143, '32930', 'Xestosa', 32, 1),
(9144, '32940', 'Santa Ouxea (barbadas)', 32, 1),
(9145, '32940', 'Santa Ouxea (barbadas)', 32, 1),
(9146, '32940', 'Santa Ouxea (barbadas)', 32, 1),
(9147, '32941', 'To', 32, 1),
(9148, '32950', 'Vilanova De Rivela', 32, 1),
(9149, '32960', 'Velle', 32, 1),
(9150, '32970', 'Seixalbo (industrial)', 32, 1),
(9151, '32971', 'Zain', 32, 1),
(9152, '32980', 'VilariÑo (ourense)', 32, 1),
(9153, '32980', 'VilariÑo (ourense)', 32, 1),
(9154, '32981', 'Vilar De Astres', 32, 1),
(9155, '32990', 'Untes (santo Estevo)', 32, 1),
(9156, '33001', 'Oviedo', 33, 1),
(9157, '33002', 'Oviedo', 33, 1),
(9158, '33003', 'Oviedo', 33, 1),
(9159, '33004', 'Oviedo', 33, 1),
(9160, '33005', 'Oviedo', 33, 1),
(9161, '33006', 'Oviedo', 33, 1),
(9162, '33007', 'Oviedo', 33, 1),
(9163, '33008', 'Oviedo', 33, 1),
(9164, '33009', 'Oviedo', 33, 1),
(9165, '33010', 'Oviedo', 33, 1),
(9166, '33010', 'Oviedo', 33, 1),
(9167, '33011', 'Oviedo', 33, 1),
(9168, '33012', 'Oviedo', 33, 1),
(9169, '33013', 'Oviedo', 33, 1),
(9170, '33060', 'Oviedo', 33, 1),
(9171, '33069', 'Oviedo', 33, 1),
(9172, '33110', 'Teverga', 33, 1),
(9173, '33111', 'Villar (teverga)', 33, 1),
(9174, '33112', 'Ventas, Las (proaza)', 33, 1),
(9175, '33114', 'Villamejin', 33, 1),
(9176, '33115', 'Villanueva De Santo Adriano', 33, 1),
(9177, '33115', 'Villanueva De Santo Adriano', 33, 1),
(9178, '33116', 'Villasante', 33, 1),
(9179, '33116', 'Villasante', 33, 1),
(9180, '33117', 'Villarejo (quiros)', 33, 1),
(9181, '33118', 'Villaorille', 33, 1),
(9182, '33119', 'Vega De Trubia', 33, 1),
(9183, '33119', 'Vega De Trubia', 33, 1),
(9184, '33120', 'Pravia', 33, 1),
(9185, '33125', 'San Juan De La Arena', 33, 1),
(9186, '33126', 'Ucedo', 33, 1),
(9187, '33127', 'Veneros (soto Del Barco)', 33, 1),
(9188, '33127', 'Veneros (soto Del Barco)', 33, 1),
(9189, '33127', 'Veneros (soto Del Barco)', 33, 1),
(9190, '33128', 'Villavaler', 33, 1),
(9191, '33129', 'Villarigan', 33, 1),
(9192, '33130', 'San Esteban De Pravia', 33, 1),
(9193, '33138', 'Villar (muros Nalon)', 33, 1),
(9194, '33140', 'Villar (fuso-puerto)', 33, 1),
(9195, '33150', 'Cudillero', 33, 1),
(9196, '33155', 'Teixidiello', 33, 1),
(9197, '33156', 'Vivigo', 33, 1),
(9198, '33157', 'Valdredo', 33, 1),
(9199, '33159', 'Villeirin', 33, 1),
(9200, '33160', 'Zorera De Porcio', 33, 1),
(9201, '33161', 'Vegas De Cardeo, Las', 33, 1),
(9202, '33162', 'Villar (morcin)', 33, 1),
(9203, '33163', 'Rectoria, La (morcin)', 33, 1),
(9204, '33170', 'Medio, El (manjoya-oviedo)', 33, 1),
(9205, '33170', 'Medio, El (manjoya-oviedo)', 33, 1),
(9206, '33171', 'Villar De Pereda', 33, 1),
(9207, '33171', 'Villar De Pereda', 33, 1),
(9208, '33172', 'Vixiel', 33, 1),
(9209, '33173', 'Vegalencia', 33, 1),
(9210, '33174', 'Vallina, La (caces - Oviedo)', 33, 1),
(9211, '33180', 'NoreÑa', 33, 1),
(9212, '33186', 'Vallina, La (el Berron-siero)', 33, 1),
(9213, '33187', 'Solad', 33, 1),
(9214, '33188', 'San Miguel De La Barreda', 33, 1),
(9215, '33189', 'Yerbano', 33, 1),
(9216, '33190', 'Viado', 33, 1),
(9217, '33191', 'Villaverde (san Claudio)', 33, 1),
(9218, '33191', 'Villaverde (san Claudio)', 33, 1),
(9219, '33192', 'Venta De La Puga', 33, 1),
(9220, '33192', 'Venta De La Puga', 33, 1),
(9221, '33193', 'Villarmil', 33, 1),
(9222, '33194', 'Oviedo', 33, 1),
(9223, '33195', 'Vidayan', 33, 1),
(9224, '33196', 'San Torcuato', 33, 1),
(9225, '33199', 'Oviedo', 33, 1),
(9226, '33199', 'Oviedo', 33, 1),
(9227, '33201', 'Gijón', 33, 1),
(9228, '33202', 'Gijón', 33, 1),
(9229, '33203', 'Gijón', 33, 1),
(9230, '33204', 'Gijón', 33, 1),
(9231, '33205', 'Gijón', 33, 1),
(9232, '33206', 'Gijón', 33, 1),
(9233, '33207', 'Gijón', 33, 1),
(9234, '33208', 'Gijón', 33, 1),
(9235, '33209', 'Gijón', 33, 1),
(9236, '33210', 'Gijón', 33, 1),
(9237, '33211', 'Gijón', 33, 1),
(9238, '33212', 'Gijón', 33, 1),
(9239, '33213', 'Gijón', 33, 1),
(9240, '33290', 'Gijón', 33, 1),
(9241, '33299', 'Gijón', 33, 1),
(9242, '33300', 'Villaviciosa', 33, 1),
(9243, '33310', 'ViÑones', 33, 1),
(9244, '33310', 'ViÑones', 33, 1),
(9245, '33311', 'Ximangues', 33, 1),
(9246, '33312', 'Xiana', 33, 1),
(9247, '33313', 'Villanueva (rozadas-villaviciosa)', 33, 1),
(9248, '33314', 'Villaverde (villavicio)', 33, 1),
(9249, '33315', 'Villar (tazones)', 33, 1),
(9250, '33316', 'Villaverde (quintana)', 33, 1),
(9251, '33317', 'Xin', 33, 1),
(9252, '33318', 'Vitienes', 33, 1),
(9253, '33320', 'Colunga', 33, 1),
(9254, '33324', 'Riera, La (colunga)', 33, 1),
(9255, '33325', 'Raicedo (colunga)', 33, 1),
(9256, '33326', 'San Feliz (rales-villaviciosa)', 33, 1),
(9257, '33326', 'San Feliz (rales-villaviciosa)', 33, 1),
(9258, '33327', 'Villaescusa (colunga)', 33, 1),
(9259, '33328', 'San Telmo', 33, 1),
(9260, '33329', 'Carrandi', 33, 1),
(9261, '33330', 'Lastres', 33, 1),
(9262, '33340', 'Lue', 33, 1),
(9263, '33341', 'Isla, La', 33, 1),
(9264, '33342', 'LoroÑe', 33, 1),
(9265, '33343', 'Valle (caravia)', 33, 1),
(9266, '33344', 'Rotella (caravia Alta)', 33, 1),
(9267, '33345', 'Vega, La (ribadesella)', 33, 1),
(9268, '33346', 'Caravia Alta', 33, 1),
(9269, '33347', 'TereÑes', 33, 1),
(9270, '33350', 'Gijón', 33, 1),
(9271, '33390', 'Pedrera, La (gijon)', 33, 1),
(9272, '33391', 'Zalca', 33, 1),
(9273, '33392', 'Venta De Veranes', 33, 1),
(9274, '33393', 'Villar (gijon)', 33, 1),
(9275, '33394', 'Gijón', 33, 1),
(9276, '33401', 'Avilés', 33, 1),
(9277, '33401', 'Avilés', 33, 1),
(9278, '33402', 'Avilés', 33, 1),
(9279, '33403', 'Avilés', 33, 1),
(9280, '33404', 'Avilés', 33, 1),
(9281, '33405', 'Avilés', 33, 1),
(9282, '33410', 'Villanueva (la Carriona)', 33, 1),
(9283, '33410', 'Villanueva (la Carriona)', 33, 1),
(9284, '33411', 'Trejo', 33, 1),
(9285, '33412', 'Villa (corvera)', 33, 1),
(9286, '33412', 'Villa (corvera)', 33, 1),
(9287, '33412', 'Villa (corvera)', 33, 1),
(9288, '33414', 'Ventanueva (illas)', 33, 1),
(9289, '33414', 'Ventanueva (illas)', 33, 1),
(9290, '33414', 'Ventanueva (illas)', 33, 1),
(9291, '33416', 'Villanueva (corvera)', 33, 1),
(9292, '33417', 'Avilés', 33, 1),
(9293, '33417', 'Avilés', 33, 1),
(9294, '33418', 'Zeluan', 33, 1),
(9295, '33418', 'Zeluan', 33, 1),
(9296, '33419', 'Goz', 33, 1),
(9297, '33420', 'Lugones', 33, 1),
(9298, '33423', 'Soto De Llanera, Urbanizacion', 33, 1),
(9299, '33424', 'Severies', 33, 1),
(9300, '33425', 'Villanueva (llanera)', 33, 1),
(9301, '33426', 'Vidriera', 33, 1),
(9302, '33427', 'Villayo', 33, 1),
(9303, '33428', 'Venta Del Gallo (llanera)', 33, 1),
(9304, '33429', 'Viella', 33, 1),
(9305, '33430', 'Piedra, La (carreÑo)', 33, 1),
(9306, '33438', 'Xianes', 33, 1),
(9307, '33439', 'Zanzabornin', 33, 1),
(9308, '33440', 'Luanco', 33, 1),
(9309, '33448', 'Viodo', 33, 1),
(9310, '33449', 'VioÑo', 33, 1),
(9311, '33450', 'Ventorrillo (castrillon)', 33, 1),
(9312, '33456', 'Torre, La (castrillon)', 33, 1),
(9313, '33456', 'Torre, La (castrillon)', 33, 1),
(9314, '33457', 'Villar (castrillon)', 33, 1),
(9315, '33458', 'Tejera, La (soto Del Barco)', 33, 1),
(9316, '33459', 'Ventaniella', 33, 1),
(9317, '33460', 'Avilés', 33, 1),
(9318, '33468', 'Trasona', 33, 1),
(9319, '33468', 'Trasona', 33, 1),
(9320, '33469', 'Villar (tabaza-carreÑo)', 33, 1),
(9321, '33470', 'Taujo', 33, 1),
(9322, '33470', 'Taujo', 33, 1),
(9323, '33470', 'Taujo', 33, 1),
(9324, '33476', 'Tapia de Casariego', 33, 1),
(9325, '33480', 'Llanera', 33, 1),
(9326, '33490', 'Villanueva (san Pedro Navarro)', 33, 1),
(9327, '33491', 'Yavio', 33, 1),
(9328, '33492', 'Xivares', 33, 1),
(9329, '33500', 'Llanes', 33, 1),
(9330, '33507', 'Villanueva De Ardisana', 33, 1),
(9331, '33509', 'Portiella, La (llanes)', 33, 1),
(9332, '33509', 'Portiella, La (llanes)', 33, 1),
(9333, '33510', 'Pola De Siero', 33, 1),
(9334, '33518', 'Villar (vega Sariego)', 33, 1),
(9335, '33518', 'Villar (vega Sariego)', 33, 1),
(9336, '33519', 'Villar (pola De Siero)', 33, 1),
(9337, '33519', 'Villar (pola De Siero)', 33, 1),
(9338, '33520', 'Nava', 33, 1),
(9339, '33520', 'Nava', 33, 1),
(9340, '33527', 'Xugueros', 33, 1),
(9341, '33528', 'ViÑay', 33, 1),
(9342, '33528', 'ViÑay', 33, 1),
(9343, '33529', 'Viobes', 33, 1),
(9344, '33529', 'Viobes', 33, 1),
(9345, '33530', 'Villanueva (piloÑa)', 33, 1),
(9346, '33534', 'Viyao', 33, 1),
(9347, '33535', 'Villarriba', 33, 1),
(9348, '33535', 'Villarriba', 33, 1),
(9349, '33536', 'Vegarrionda', 33, 1),
(9350, '33537', 'Soto (infiesto)', 33, 1),
(9351, '33538', 'Vallin (infiesto)', 33, 1),
(9352, '33539', 'Valles (piloÑa)', 33, 1),
(9353, '33540', 'Santianes Del Terron', 33, 1),
(9354, '33546', 'Tospe', 33, 1),
(9355, '33547', 'ViÑa (c. Onis)', 33, 1),
(9356, '33548', 'Villar De La PeÑa', 33, 1),
(9357, '33549', 'Vita, La', 33, 1),
(9358, '33550', 'Cangas De Onis', 33, 1),
(9359, '33554', 'Tresviso', 33, 1),
(9360, '33555', 'Salce', 33, 1),
(9361, '33556', 'Zardon', 33, 1),
(9362, '33556', 'Zardon', 33, 1),
(9363, '33557', 'Villaverde (amieva)', 33, 1),
(9364, '33557', 'Villaverde (amieva)', 33, 1),
(9365, '33558', 'Viego', 33, 1),
(9366, '33558', 'Viego', 33, 1),
(9367, '33559', 'Vis', 33, 1),
(9368, '33559', 'Vis', 33, 1),
(9369, '33560', 'Ribadesella', 33, 1),
(9370, '33566', 'Pando (ribadesella)', 33, 1),
(9371, '33567', 'Soto (ribadesella)', 33, 1),
(9372, '33568', 'Toriello (ribadesella)', 33, 1),
(9373, '33569', 'Ucio', 33, 1),
(9374, '33576', 'Trescares', 33, 1),
(9375, '33577', 'Mier', 33, 1),
(9376, '33578', 'Llonin', 33, 1),
(9377, '33579', 'Tobes (p. Baja)', 33, 1),
(9378, '33580', 'Sorrobin', 33, 1),
(9379, '33581', 'Vilortera, La', 33, 1),
(9380, '33582', 'Vega, La (ceceda)', 33, 1),
(9381, '33583', 'Villamayor (piloÑa)', 33, 1),
(9382, '33584', 'Villarcazo', 33, 1),
(9383, '33585', 'ViabaÑo', 33, 1),
(9384, '33586', 'Tresmonte De Parres', 33, 1),
(9385, '33587', 'ToraÑo', 33, 1),
(9386, '33588', 'Tezangos', 33, 1),
(9387, '33589', 'Tresano', 33, 1),
(9388, '33590', 'Villanueva De Colombres', 33, 1),
(9389, '33592', 'Riensena', 33, 1),
(9390, '33593', 'Villahormes', 33, 1),
(9391, '33594', 'Turanzas', 33, 1),
(9392, '33595', 'Niembro', 33, 1),
(9393, '33596', 'Soberron', 33, 1),
(9394, '33598', 'Pendueles', 33, 1),
(9395, '33600', 'Requintin, El', 33, 1),
(9396, '33610', 'Villapendi', 33, 1),
(9397, '33611', 'Villasola (mieres)', 33, 1),
(9398, '33612', 'Vistalegre (san Cruz De Mieres)', 33, 1),
(9399, '33614', 'Xagosa, La', 33, 1),
(9400, '33615', 'Villar De Gallegos', 33, 1),
(9401, '33616', 'Torneros (mieres)', 33, 1),
(9402, '33616', 'Torneros (mieres)', 33, 1),
(9403, '33617', 'Venta, La (mieres)', 33, 1),
(9404, '33618', 'Vescon El (seana - Mieres)', 33, 1),
(9405, '33619', 'Valmurian', 33, 1),
(9406, '33620', 'Nozala, La', 33, 1),
(9407, '33627', 'Pontones, Los (campomanes)', 33, 1),
(9408, '33628', 'Tuiza', 33, 1),
(9409, '33629', 'Zureda', 33, 1),
(9410, '33630', 'Pola De Lena', 33, 1),
(9411, '33637', 'Vega Del Rey', 33, 1),
(9412, '33638', 'ViÑa', 33, 1),
(9413, '33639', 'Venceyal', 33, 1),
(9414, '33640', 'ViÑas, Las (ujo)', 33, 1),
(9415, '33650', 'Quintanas, Las (mieres)', 33, 1),
(9416, '33660', 'Sienra (olloniego)', 33, 1),
(9417, '33669', 'Santa Eulalia De Manzaneda', 33, 1),
(9418, '33670', 'Moreda De Aller', 33, 1),
(9419, '33675', 'Provia, La (moreda)', 33, 1),
(9420, '33676', 'Villar De Murias', 33, 1),
(9421, '33677', 'Tornos, Los (moreda)', 33, 1),
(9422, '33678', 'Santo Tomas (aller)', 33, 1),
(9423, '33679', 'Xagual', 33, 1),
(9424, '33680', 'Valdevero', 33, 1),
(9425, '33681', 'Villar De Casomera', 33, 1),
(9426, '33682', 'Vega De San Pedro', 33, 1),
(9427, '33683', 'Villadominica', 33, 1),
(9428, '33683', 'Villadominica', 33, 1),
(9429, '33684', 'Tejera, La (aller)', 33, 1),
(9430, '33685', 'Villar (piÑeres-aller)', 33, 1),
(9431, '33686', 'Vega, La (cabaÑaquinta)', 33, 1),
(9432, '33687', 'Rioseco (aller)', 33, 1),
(9433, '33688', 'Puerto San Isidro (asturias)', 33, 1),
(9434, '33690', 'Truebano (lugo Llanera)', 33, 1),
(9435, '33691', 'Zarracina (veriÑa-gijon)', 33, 1),
(9436, '33692', 'San Andres (puente Fierros)', 33, 1),
(9437, '33693', 'Villar (pajares)', 33, 1),
(9438, '33694', 'Parana', 33, 1),
(9439, '33695', 'Viscarriona', 33, 1),
(9440, '33696', 'Soto De Rey', 33, 1),
(9441, '33696', 'Soto De Rey', 33, 1),
(9442, '33697', 'Vilarteo', 33, 1),
(9443, '33700', 'Luarca', 33, 1),
(9444, '33707', 'Valleancho', 33, 1),
(9445, '33708', 'Venta, La (luarca)', 33, 1),
(9446, '33709', 'Vald', 33, 1),
(9447, '33710', 'Navia', 33, 1),
(9448, '33716', 'Villares, Los (coaÑa)', 33, 1),
(9449, '33717', 'Zorerina', 33, 1),
(9450, '33718', 'Zorera, La (villayon)', 33, 1),
(9451, '33719', 'Villaoril (navia)', 33, 1),
(9452, '33719', 'Villaoril (navia)', 33, 1),
(9453, '33720', 'Penouta (boal)', 33, 1),
(9454, '33724', 'Boal', 33, 1),
(9455, '33725', 'Villanueva (boal)', 33, 1),
(9456, '33726', 'Villar De Serandinas', 33, 1),
(9457, '33726', 'Villar De Serandinas', 33, 1),
(9458, '33727', 'Silvon', 33, 1),
(9459, '33728', 'Villar De San Pedro', 33, 1),
(9460, '33729', 'Vega De Ouria', 33, 1),
(9461, '33730', 'Vitos, Los', 33, 1),
(9462, '33731', 'Villar De Bullaso', 33, 1),
(9463, '33732', 'Illano', 33, 1),
(9464, '33733', 'Gio', 33, 1),
(9465, '33734', 'Villaseca', 33, 1),
(9466, '33735', 'Villarmarzo', 33, 1),
(9467, '33736', 'Seran', 33, 1),
(9468, '33740', 'Tapia De Casariego', 33, 1),
(9469, '33746', 'Valdepares', 33, 1),
(9470, '33746', 'Valdepares', 33, 1),
(9471, '33747', 'Villarin (tapia)', 33, 1),
(9472, '33749', 'Villamil', 33, 1),
(9473, '33750', 'Viavelez', 33, 1),
(9474, '33757', 'Villarin De La BraÑa', 33, 1),
(9475, '33758', 'Villar De Miudes', 33, 1),
(9476, '33759', 'Villalmarzo', 33, 1),
(9477, '33760', 'Castropol', 33, 1),
(9478, '33768', 'Valin (castropol)', 33, 1),
(9479, '33769', 'Villarrasa', 33, 1),
(9480, '33770', 'Vegadeo', 33, 1),
(9481, '33774', 'Vilelas', 33, 1),
(9482, '33775', 'Villarede', 33, 1),
(9483, '33776', 'Villar (villanueva De Oscos)', 33, 1),
(9484, '33776', 'Villar (villanueva De Oscos)', 33, 1),
(9485, '33777', 'Villarquille', 33, 1),
(9486, '33777', 'Villarquille', 33, 1),
(9487, '33777', 'Villarquille', 33, 1),
(9488, '33778', 'Vior', 33, 1),
(9489, '33778', 'Vior', 33, 1),
(9490, '33779', 'Vinjoy', 33, 1),
(9491, '33779', 'Vinjoy', 33, 1),
(9492, '33780', 'Villar De BahiÑas', 33, 1),
(9493, '33781', 'Salas', 33, 1),
(9494, '33782', 'Villar De Ayones', 33, 1),
(9495, '33782', 'Villar De Ayones', 33, 1),
(9496, '33783', 'Villagermonde', 33, 1),
(9497, '33784', 'Villar De Carcedo', 33, 1),
(9498, '33785', 'Villarin', 33, 1),
(9499, '33787', 'Sapinas', 33, 1),
(9500, '33788', 'Villademoros', 33, 1),
(9501, '33789', 'San Cristobal (luarca)', 33, 1),
(9502, '33790', 'Vigo', 33, 1),
(9503, '33791', 'Vistalegre (villuir-luarca)', 33, 1),
(9504, '33792', 'Vidural (navia)', 33, 1),
(9505, '33793', 'Villapedre', 33, 1),
(9506, '33794', 'ViÑa (barres)', 33, 1),
(9507, '33795', 'Villar (coaÑa)', 33, 1),
(9508, '33796', 'Villarda', 33, 1),
(9510, '33798', 'MiÑagon', 33, 1),
(9511, '33799', 'Boal', 33, 1),
(9512, '33800', 'Pinar', 33, 1),
(9513, '33810', 'ViÑal', 33, 1),
(9514, '33811', 'Villar De Posada', 33, 1),
(9515, '33811', 'Villar De Posada', 33, 1),
(9516, '33812', 'Villarmeirin', 33, 1),
(9517, '33812', 'Villarmeirin', 33, 1),
(9518, '33813', 'Viliella', 33, 1),
(9519, '33813', 'Viliella', 33, 1),
(9520, '33814', 'Yema', 33, 1),
(9521, '33815', 'Trones', 33, 1),
(9522, '33815', 'Trones', 33, 1),
(9523, '33816', 'Villardelantero', 33, 1),
(9524, '33817', 'Villategil', 33, 1),
(9525, '33818', 'ViÑa, La (cangas De Narcea)', 33, 1),
(9526, '33819', 'Villar De Adrales', 33, 1),
(9527, '33820', 'Grado', 33, 1),
(9528, '33825', 'Xorro', 33, 1),
(9529, '33826', 'Zurraquera, La', 33, 1),
(9530, '33826', 'Zurraquera, La', 33, 1),
(9531, '33827', 'Vio Del Pico', 33, 1),
(9532, '33827', 'Vio Del Pico', 33, 1),
(9533, '33828', 'Vistalegre (grado)', 33, 1),
(9534, '33829', 'Villar De Candamo', 33, 1),
(9535, '33829', 'Villar De Candamo', 33, 1),
(9536, '33830', 'Belmonte', 33, 1),
(9537, '33836', 'Villaverde (belmonte)', 33, 1),
(9538, '33836', 'Villaverde (belmonte)', 33, 1),
(9539, '33837', 'Belmonte de Miranda', 33, 1),
(9540, '33838', 'Belmonte de Miranda', 33, 1),
(9541, '33839', 'San Martin De Ondes', 33, 1),
(9542, '33840', 'Villarin (somiedo)', 33, 1),
(9543, '33841', 'ViÑas, Las (somiedo)', 33, 1),
(9544, '33842', 'Villar De Vildas', 33, 1),
(9545, '33842', 'Villar De Vildas', 33, 1),
(9546, '33843', 'Cuevas (belmonte)', 33, 1),
(9547, '33844', 'Villar De Zuepos', 33, 1),
(9548, '33845', 'Selviella', 33, 1),
(9549, '33846', 'Villanueva (belmonte)', 33, 1),
(9550, '33846', 'Villanueva (belmonte)', 33, 1),
(9551, '33847', 'Belmonte de Miranda', 33, 1),
(9552, '33848', 'Salas', 33, 1),
(9553, '33850', 'Verdugos', 33, 1),
(9554, '33857', 'Villar (cornellana)', 33, 1),
(9555, '33858', 'San Marcelo', 33, 1),
(9556, '33859', 'Valbona (cornellana)', 33, 1),
(9557, '33860', 'Salas', 33, 1),
(9558, '33866', 'Villarin (malleza)', 33, 1),
(9559, '33867', 'Villarin (salas)', 33, 1),
(9560, '33868', 'Villazon', 33, 1),
(9561, '33869', 'Viescas (salas)', 33, 1),
(9562, '33870', 'Tineo', 33, 1),
(9563, '33873', 'Zardain', 33, 1),
(9564, '33874', 'Vinada, La', 33, 1),
(9565, '33874', 'Vinada, La', 33, 1),
(9566, '33875', 'Vivente', 33, 1),
(9567, '33876', 'Villanueva De Sorriba', 33, 1),
(9568, '33877', 'Zarrazin', 33, 1),
(9569, '33878', 'Villerino Del Monte', 33, 1),
(9570, '33879', 'Yerbo', 33, 1),
(9571, '33880', 'Pola De Allande', 33, 1),
(9572, '33885', 'Villadecabo', 33, 1),
(9573, '33887', 'Villasonte', 33, 1),
(9574, '33888', 'Sellon, El (pola De Allande)', 33, 1),
(9575, '33889', 'Villavaser', 33, 1),
(9576, '33890', 'Villaverde (pola De Allande)', 33, 1),
(9577, '33891', 'Villarmor', 33, 1),
(9578, '33900', 'San Roque (langreo)', 33, 1),
(9579, '33909', 'Zorera, La (ciaÑo-langreo)', 33, 1),
(9580, '33910', 'Veguin', 33, 1),
(9581, '33919', 'Tudela De Agueria', 33, 1),
(9582, '33920', 'Zorera, La (riaÑo-langreo)', 33, 1),
(9583, '33929', 'Viso, El (langreo)', 33, 1),
(9584, '33930', 'Viesca, La (langreo)', 33, 1),
(9585, '33934', 'Venta, La (langreo)', 33, 1),
(9586, '33935', 'Valluco El', 33, 1),
(9587, '33936', 'Villaescusa (siero)', 33, 1),
(9588, '33937', 'Vinadas, Las (langreo)', 33, 1),
(9589, '33938', 'Valdesoto', 33, 1),
(9590, '33939', 'Venta Del Aire (langreo)', 33, 1),
(9591, '33940', 'Soton', 33, 1),
(9592, '33945', 'Rotella, La (el Entrego)', 33, 1),
(9593, '33946', 'Sagosa', 33, 1),
(9594, '33947', 'ViÑa (el Entrego)', 33, 1),
(9595, '33948', 'Vistalegre (el Entrego)', 33, 1),
(9596, '33950', 'Venta, La (sotrondio)', 33, 1),
(9597, '33957', 'Zorea, La', 33, 1),
(9598, '33958', 'Vilorteras (sotrondio)', 33, 1),
(9599, '33959', 'Tetuan (sotrondio)', 33, 1),
(9600, '33960', 'Caraveo', 33, 1),
(9601, '33970', 'Recortina', 33, 1),
(9602, '33979', 'Zoreda Baja', 33, 1),
(9603, '33980', 'Pola De Laviana', 33, 1),
(9604, '33986', 'Villoria', 33, 1),
(9605, '33987', 'Ribota', 33, 1),
(9606, '33989', 'Valdelasabejas', 33, 1),
(9607, '33990', 'Veneros De Caso', 33, 1),
(9608, '33991', 'Payandi', 33, 1),
(9609, '33992', 'Soto De Lorio', 33, 1),
(9610, '33993', 'Villamorey', 33, 1),
(9611, '33995', 'Puente Piedra', 33, 1),
(9612, '33996', 'Soto De Caso', 33, 1),
(9613, '34001', 'Palencia', 34, 1),
(9614, '34002', 'Palencia', 34, 1),
(9615, '34003', 'Palencia', 34, 1),
(9616, '34004', 'Palencia', 34, 1),
(9617, '34005', 'Palencia', 34, 1),
(9618, '34006', 'Palencia', 34, 1),
(9619, '34100', 'SaldaÑa', 34, 1),
(9620, '34110', 'Pino Del Rio', 34, 1),
(9621, '34111', 'Villosilla De La Vega', 34, 1),
(9622, '34111', 'Villosilla De La Vega', 34, 1),
(9623, '34111', 'Villosilla De La Vega', 34, 1),
(9624, '34111', 'Villosilla De La Vega', 34, 1),
(9625, '34111', 'Villosilla De La Vega', 34, 1),
(9626, '34112', 'Villota Del Paramo', 34, 1),
(9627, '34112', 'Villota Del Paramo', 34, 1),
(9628, '34112', 'Villota Del Paramo', 34, 1),
(9629, '34113', 'Villarrodrigo De La Vega', 34, 1),
(9630, '34113', 'Villarrodrigo De La Vega', 34, 1),
(9631, '34113', 'Villarrodrigo De La Vega', 34, 1),
(9632, '34114', 'Villarmienzo', 34, 1),
(9633, '34115', 'Villasur', 34, 1),
(9634, '34115', 'Villasur', 34, 1),
(9635, '34116', 'San Martin Del Valle', 34, 1),
(9636, '34116', 'San Martin Del Valle', 34, 1),
(9637, '34116', 'San Martin Del Valle', 34, 1),
(9638, '34117', 'Villorquite Del Paramo', 34, 1),
(9639, '34118', 'Villota Del Duque', 34, 1),
(9640, '34120', 'Carrion De Los Condes', 34, 1),
(9641, '34126', 'Villamoronta', 34, 1),
(9642, '34126', 'Villamoronta', 34, 1),
(9643, '34127', 'Villasabariego De Ucieza', 34, 1),
(9644, '34127', 'Villasabariego De Ucieza', 34, 1),
(9645, '34128', 'Villaproviano', 34, 1),
(9646, '34128', 'Villaproviano', 34, 1),
(9647, '34128', 'Villaproviano', 34, 1),
(9648, '34128', 'Villaproviano', 34, 1),
(9649, '34129', 'Villotilla', 34, 1),
(9650, '34129', 'Villotilla', 34, 1),
(9651, '34129', 'Villotilla', 34, 1),
(9652, '34131', 'Villoldo', 34, 1),
(9653, '34131', 'Villoldo', 34, 1),
(9654, '34132', 'Villasarracino', 34, 1),
(9655, '34159', 'Villarramiro', 34, 1),
(9656, '34160', 'Esquileo De Arriba', 34, 1),
(9657, '34170', 'Villamartin De Campos', 34, 1),
(9658, '34170', 'Villamartin De Campos', 34, 1),
(9659, '34170', 'Villamartin De Campos', 34, 1),
(9660, '34170', 'Villamartin De Campos', 34, 1),
(9661, '34190', 'Villamuriel De Cerrato', 34, 1),
(9662, '34191', 'Valoria Del Alcor', 34, 1),
(9663, '34191', 'Valoria Del Alcor', 34, 1),
(9664, '34191', 'Valoria Del Alcor', 34, 1),
(9665, '34191', 'Valoria Del Alcor', 34, 1),
(9666, '34192', 'Villaumbrales', 34, 1),
(9667, '34192', 'Villaumbrales', 34, 1),
(9668, '34200', 'Venta De BaÑos', 34, 1),
(9669, '34208', 'San Isidro De DueÑas', 34, 1),
(9670, '34208', 'San Isidro De DueÑas', 34, 1),
(9671, '34208', 'San Isidro De DueÑas', 34, 1),
(9672, '34209', 'Valle De Cerrato', 34, 1),
(9673, '34209', 'Valle De Cerrato', 34, 1),
(9674, '34209', 'Valle De Cerrato', 34, 1),
(9675, '34209', 'Valle De Cerrato', 34, 1),
(9676, '34210', 'DueÑas', 34, 1),
(9677, '34218', 'Cevico De La Torre', 34, 1),
(9678, '34219', 'Vertavillo', 34, 1),
(9679, '34219', 'Vertavillo', 34, 1),
(9680, '34219', 'Vertavillo', 34, 1),
(9681, '34219', 'Vertavillo', 34, 1),
(9682, '34219', 'Vertavillo', 34, 1),
(9683, '34220', 'Magaz De Pisuerga', 34, 1),
(9684, '34230', 'Torquemada', 34, 1),
(9685, '34239', 'Villamediana', 34, 1),
(9686, '34239', 'Villamediana', 34, 1),
(9687, '34240', 'Baltanas', 34, 1),
(9688, '34246', 'Castrillo De Don Juan', 34, 1),
(9689, '34247', 'Villaconancio', 34, 1),
(9690, '34247', 'Villaconancio', 34, 1),
(9691, '34247', 'Villaconancio', 34, 1),
(9692, '34248', 'Espinosa De Cerrato', 34, 1),
(9693, '34248', 'Espinosa De Cerrato', 34, 1),
(9694, '34248', 'Espinosa De Cerrato', 34, 1),
(9695, '34249', 'Villaviudas', 34, 1),
(9696, '34249', 'Villaviudas', 34, 1),
(9697, '34249', 'Villaviudas', 34, 1),
(9698, '34250', 'Quintana Del Puente', 34, 1),
(9699, '34257', 'Villodrigo', 34, 1),
(9700, '34257', 'Villodrigo', 34, 1),
(9701, '34257', 'Villodrigo', 34, 1),
(9702, '34257', 'Villodrigo', 34, 1),
(9703, '34259', 'San Salvador Del Moral', 34, 1),
(9704, '34259', 'San Salvador Del Moral', 34, 1),
(9705, '34259', 'San Salvador Del Moral', 34, 1),
(9706, '34300', 'Paredes De Nava', 34, 1),
(9707, '34304', 'Castil De Vela', 34, 1),
(9708, '34305', 'Villerias De Campos', 34, 1),
(9709, '34305', 'Villerias De Campos', 34, 1),
(9710, '34305', 'Villerias De Campos', 34, 1),
(9711, '34305', 'Villerias De Campos', 34, 1),
(9712, '34305', 'Villerias De Campos', 34, 1),
(9713, '34305', 'Villerias De Campos', 34, 1),
(9714, '34305', 'Villerias De Campos', 34, 1),
(9715, '34306', 'Mazuecos De Valdeginate', 34, 1),
(9716, '34306', 'Mazuecos De Valdeginate', 34, 1),
(9717, '34306', 'Mazuecos De Valdeginate', 34, 1),
(9718, '34306', 'Mazuecos De Valdeginate', 34, 1),
(9719, '34307', 'Villatoquite', 34, 1),
(9720, '34309', 'Villaverde De Volpejera', 34, 1),
(9721, '34309', 'Villaverde De Volpejera', 34, 1),
(9722, '34309', 'Villaverde De Volpejera', 34, 1),
(9723, '34309', 'Villaverde De Volpejera', 34, 1),
(9724, '34309', 'Villaverde De Volpejera', 34, 1),
(9725, '34310', 'Villaldavin', 34, 1),
(9726, '34310', 'Villaldavin', 34, 1),
(9727, '34320', 'Cisneros', 34, 1),
(9728, '34337', 'Fuentes De Nava', 34, 1),
(9729, '34338', 'Autillo De Campos', 34, 1),
(9730, '34338', 'Autillo De Campos', 34, 1),
(9731, '34340', 'Villada', 34, 1),
(9732, '34347', 'Villambran De Cea', 34, 1),
(9733, '34347', 'Villambran De Cea', 34, 1),
(9734, '34347', 'Villambran De Cea', 34, 1),
(9735, '34347', 'Villambran De Cea', 34, 1),
(9736, '34347', 'Villambran De Cea', 34, 1),
(9737, '34347', 'Villambran De Cea', 34, 1),
(9738, '34348', 'Villacidaler', 34, 1),
(9739, '34349', 'Villemar', 34, 1),
(9740, '34349', 'Villemar', 34, 1),
(9741, '34349', 'Villemar', 34, 1),
(9742, '34349', 'Villemar', 34, 1),
(9743, '34349', 'Villemar', 34, 1),
(9744, '34350', 'Villarramiel', 34, 1),
(9745, '34400', 'Herrera De Pisuerga', 34, 1),
(9746, '34404', 'Dehesa de Montejo', 34, 1),
(9747, '34405', 'Ventosa De Pisuerga', 34, 1),
(9748, '34405', 'Ventosa De Pisuerga', 34, 1),
(9749, '34405', 'Ventosa De Pisuerga', 34, 1),
(9750, '34406', 'Villabermudo De Ojeda', 34, 1),
(9751, '34406', 'Villabermudo De Ojeda', 34, 1),
(9752, '34406', 'Villabermudo De Ojeda', 34, 1),
(9753, '34406', 'Villabermudo De Ojeda', 34, 1),
(9754, '34407', 'Zorita Del Paramo', 34, 1),
(9755, '34407', 'Zorita Del Paramo', 34, 1),
(9756, '34407', 'Zorita Del Paramo', 34, 1),
(9757, '34407', 'Zorita Del Paramo', 34, 1),
(9758, '34407', 'Zorita Del Paramo', 34, 1),
(9759, '34407', 'Zorita Del Paramo', 34, 1),
(9760, '34407', 'Zorita Del Paramo', 34, 1),
(9761, '34408', 'Villameriel', 34, 1),
(9762, '34409', 'Villorquite De Herrera', 34, 1),
(9763, '34410', 'Monzon De Campos', 34, 1),
(9764, '34419', 'Villalobon', 34, 1),
(9765, '34419', 'Villalobon', 34, 1),
(9766, '34419', 'Villalobon', 34, 1),
(9767, '34419', 'Villalobon', 34, 1),
(9768, '34419', 'Villalobon', 34, 1),
(9769, '34420', 'Amusco', 34, 1),
(9770, '34429', 'Santa Cruz De Ribas, Finca', 34, 1),
(9771, '34429', 'Santa Cruz De Ribas, Finca', 34, 1),
(9772, '34429', 'Santa Cruz De Ribas, Finca', 34, 1),
(9773, '34429', 'Santa Cruz De Ribas, Finca', 34, 1),
(9774, '34429', 'Santa Cruz De Ribas, Finca', 34, 1),
(9775, '34429', 'Santa Cruz De Ribas, Finca', 34, 1),
(9776, '34430', 'PiÑa De Campos', 34, 1),
(9777, '34439', 'Tamara De Campos', 34, 1),
(9778, '34440', 'Fromista', 34, 1),
(9779, '34447', 'Villarmentero De Campos', 34, 1),
(9780, '34447', 'Villarmentero De Campos', 34, 1),
(9781, '34449', 'Villovieco', 34, 1),
(9782, '34449', 'Villovieco', 34, 1),
(9783, '34449', 'Villovieco', 34, 1),
(9784, '34449', 'Villovieco', 34, 1),
(9785, '34449', 'Villovieco', 34, 1),
(9786, '34450', 'Astudillo', 34, 1),
(9787, '34460', 'Osorno', 34, 1),
(9788, '34465', 'Valbuena De Pisuerga', 34, 1),
(9789, '34466', 'Villodre', 34, 1),
(9790, '34467', 'Melgar De Yuso', 34, 1),
(9791, '34468', 'Osornillo', 34, 1),
(9792, '34468', 'Osornillo', 34, 1),
(9793, '34468', 'Osornillo', 34, 1),
(9794, '34468', 'Osornillo', 34, 1),
(9795, '34469', 'Villaherreros', 34, 1),
(9796, '34469', 'Villaherreros', 34, 1),
(9797, '34469', 'Villaherreros', 34, 1),
(9798, '34469', 'Villaherreros', 34, 1),
(9799, '34470', 'Puebla De Valdavia, La', 34, 1),
(9800, '34470', 'Puebla De Valdavia, La', 34, 1),
(9801, '34473', 'Valderrabano', 34, 1),
(9802, '34473', 'Valderrabano', 34, 1),
(9803, '34473', 'Valderrabano', 34, 1),
(9804, '34473', 'Valderrabano', 34, 1),
(9805, '34475', 'Villasila De Valdavia', 34, 1),
(9806, '34475', 'Villasila De Valdavia', 34, 1),
(9807, '34475', 'Villasila De Valdavia', 34, 1),
(9808, '34477', 'VillanuÑo De Valdavia', 34, 1),
(9809, '34477', 'VillanuÑo De Valdavia', 34, 1),
(9810, '34477', 'VillanuÑo De Valdavia', 34, 1),
(9811, '34478', 'Villavega', 34, 1),
(9812, '34480', 'Alar Del Rey', 34, 1),
(9813, '34484', 'Dehesa De Montejo', 34, 1),
(9814, '34485', 'Villavega De Ojeda', 34, 1),
(9815, '34485', 'Villavega De Ojeda', 34, 1),
(9816, '34485', 'Villavega De Ojeda', 34, 1),
(9817, '34485', 'Villavega De Ojeda', 34, 1),
(9818, '34486', 'Villaescusa De Ecla', 34, 1),
(9819, '34486', 'Villaescusa De Ecla', 34, 1),
(9820, '34486', 'Villaescusa De Ecla', 34, 1),
(9821, '34486', 'Villaescusa De Ecla', 34, 1),
(9822, '34486', 'Villaescusa De Ecla', 34, 1),
(9823, '34487', 'Becerril Del Carpio', 34, 1),
(9824, '34487', 'Becerril Del Carpio', 34, 1),
(9825, '34490', 'Santoyo', 34, 1),
(9826, '34490', 'Santoyo', 34, 1),
(9827, '34491', 'Villaprovedo', 34, 1),
(9828, '34491', 'Villaprovedo', 34, 1),
(9829, '34491', 'Villaprovedo', 34, 1),
(9830, '34491', 'Villaprovedo', 34, 1),
(9831, '34491', 'Villaprovedo', 34, 1),
(9832, '34491', 'Villaprovedo', 34, 1),
(9833, '34492', 'Villacibio', 34, 1),
(9834, '34492', 'Villacibio', 34, 1),
(9835, '34800', 'Aguilar De Campoo', 34, 1),
(9836, '34810', 'Villavega De Aguilar', 34, 1),
(9837, '34810', 'Villavega De Aguilar', 34, 1),
(9838, '34811', 'Villanueva De Henares', 34, 1),
(9839, '34811', 'Villanueva De Henares', 34, 1),
(9840, '34813', 'Villaren De Valdivia', 34, 1),
(9841, '34813', 'Villaren De Valdivia', 34, 1),
(9842, '34814', 'Pomar de Valdivia', 34, 1),
(9843, '34814', 'Berzosilla', 34, 1),
(9844, '34815', 'Villallano', 34, 1),
(9845, '34815', 'Villallano', 34, 1),
(9846, '34820', 'Barruelo De Santullan', 34, 1),
(9847, '34828', 'Villanueva De La Torre', 34, 1),
(9848, '34828', 'Villanueva De La Torre', 34, 1),
(9849, '34828', 'Villanueva De La Torre', 34, 1),
(9850, '34829', 'Valverzoso', 34, 1),
(9851, '34829', 'Valverzoso', 34, 1),
(9852, '34830', 'San Mames De Zalima', 34, 1),
(9853, '34830', 'San Mames De Zalima', 34, 1),
(9854, '34839', 'VergaÑo', 34, 1),
(9855, '34839', 'VergaÑo', 34, 1),
(9856, '34839', 'VergaÑo', 34, 1),
(9857, '34840', 'Cervera De Pisuerga', 34, 1),
(9858, '34844', 'Ventanilla', 34, 1),
(9859, '34844', 'Ventanilla', 34, 1),
(9860, '34844', 'Ventanilla', 34, 1),
(9861, '34846', 'VerdeÑa', 34, 1),
(9862, '34846', 'VerdeÑa', 34, 1),
(9863, '34847', 'San Salvador De Cantamuda', 34, 1),
(9864, '34848', 'Lores', 34, 1),
(9865, '34849', 'Tremaya', 34, 1),
(9866, '34850', 'Castrejon De La PeÑa', 34, 1),
(9867, '34858', 'Roscales De La PeÑa', 34, 1),
(9868, '34859', 'Villanueva De La PeÑa', 34, 1),
(9869, '34869', 'Villaverde De La PeÑa', 34, 1),
(9870, '34870', 'SantibaÑez De La PeÑa', 34, 1),
(9871, '34870', 'SantibaÑez De La PeÑa', 34, 1),
(9873, '34878', 'Villanueva De Abajo', 34, 1),
(9874, '34878', 'Villanueva De Abajo', 34, 1),
(9875, '34878', 'Villanueva De Abajo', 34, 1),
(9876, '34879', 'Villanueva De Arriba', 34, 1),
(9877, '34879', 'Villanueva De Arriba', 34, 1),
(9878, '34880', 'Guardo', 34, 1),
(9879, '34882', 'Dehesa De Tablares', 34, 1),
(9880, '34882', 'Dehesa De Tablares', 34, 1),
(9881, '34884', 'Santib', 34, 1),
(9882, '34886', 'Velilla Del Rio Carrion', 34, 1),
(9883, '34888', 'Otero De Guardo', 34, 1),
(9884, '34889', 'Villalba De Guardo', 34, 1),
(9885, '34889', 'Villalba De Guardo', 34, 1),
(9886, '34889', 'Villalba De Guardo', 34, 1),
(9887, '34889', 'Villalba De Guardo', 34, 1),
(9888, '35000', 'Zurbaran (ver Callejero De Las Palmas)', 35, 1),
(9889, '35000', 'Zurbaran (ver Callejero De Las Palmas)', 35, 1),
(9890, '35000', 'Zurbaran (ver Callejero De Las Palmas)', 35, 1),
(9891, '35000', 'Zurbaran (ver Callejero De Las Palmas)', 35, 1),
(9892, '35000', 'Zurbaran (ver Callejero De Las Palmas)', 35, 1),
(9893, '35001', 'Palmas De Gran Canaria,las', 35, 1),
(9894, '35002', 'Palmas De Gran Canaria,las', 35, 1),
(9895, '35003', 'Palmas De Gran Canaria,las', 35, 1),
(9896, '35004', 'Palmas De Gran Canaria,las', 35, 1),
(9897, '35005', 'Palmas De Gran Canaria,las', 35, 1),
(9898, '35006', 'Palmas De Gran Canaria,las', 35, 1),
(9899, '35007', 'Palmas De Gran Canaria,las', 35, 1),
(9900, '35008', 'Palmas De Gran Canaria,las', 35, 1),
(9901, '35009', 'Palmas De Gran Canaria,las', 35, 1),
(9902, '35010', 'Palmas De Gran Canaria,las', 35, 1),
(9903, '35011', 'Palmas De Gran Canaria,las', 35, 1),
(9904, '35012', 'Palmas De Gran Canaria,las', 35, 1),
(9905, '35013', 'Palmas De Gran Canaria,las', 35, 1),
(9906, '35014', 'Palmas De Gran Canaria,las', 35, 1),
(9907, '35015', 'Palmas De Gran Canaria,las', 35, 1),
(9908, '35016', 'Palmas De Gran Canaria,las', 35, 1),
(9909, '35017', 'Palmas De Gran Canaria,las', 35, 1),
(9910, '35018', 'Palmas De Gran Canaria,las', 35, 1),
(9911, '35019', 'Palmas De Gran Canaria,las', 35, 1),
(9912, '35100', 'Sonneland, Urbanizacion', 35, 1),
(9913, '35106', 'Salobre, El', 35, 1),
(9914, '35107', 'Tarajalillo (juan Grande)', 35, 1),
(9915, '35108', 'Hortigones, Los', 35, 1),
(9916, '35109', 'Tederas, Las', 35, 1),
(9917, '35110', 'Vereda, La', 35, 1),
(9918, '35118', 'Rosas, Las (agÜimes)', 35, 1),
(9919, '35119', 'Pozo Izquierdo', 35, 1),
(9920, '35119', 'Pozo Izquierdo', 35, 1),
(9921, '35120', 'Cornisa, La, Urbanizacion', 35, 1),
(9922, '35120', 'Cornisa, La, Urbanizacion', 35, 1),
(9923, '35128', 'Vento, El', 35, 1),
(9924, '35129', 'Patalavaca', 35, 1),
(9925, '35130', 'Puerto Rico', 35, 1),
(9926, '35138', 'Taurito', 35, 1),
(9927, '35139', 'Lomo Quiebre', 35, 1),
(9928, '35140', 'Navarros, Los', 35, 1),
(9929, '35149', 'Umbridilla, La', 35, 1),
(9930, '35188', 'G', 35, 1),
(9931, '35200', 'Telde', 35, 1),
(9932, '35210', 'Telde', 35, 1),
(9933, '35211', 'Telde', 35, 1),
(9934, '35212', 'Telde', 35, 1),
(9935, '35213', 'Telde', 35, 1),
(9936, '35214', 'Telde', 35, 1),
(9937, '35215', 'Telde', 35, 1),
(9938, '35216', 'Vegas, Las (valsequillo)', 35, 1),
(9939, '35217', 'Valsequillo (capital Municipal)', 35, 1),
(9940, '35218', 'Telde', 35, 1),
(9941, '35219', 'Telde', 35, 1),
(9942, '35220', 'Telde', 35, 1),
(9943, '35220', 'Telde', 35, 1),
(9944, '35229', 'Palmas De Gran Canaria,las', 35, 1),
(9945, '35229', 'Palmas De Gran Canaria,las', 35, 1),
(9946, '35240', 'Carrizal, El (ingenio)', 35, 1),
(9947, '35250', 'Sequero, El (ingenio)', 35, 1),
(9948, '35259', 'Salinas, Las', 35, 1),
(9949, '35259', 'Salinas, Las', 35, 1),
(9950, '35260', 'Cueva Bermeja', 35, 1),
(9951, '35269', 'Vargas', 35, 1),
(9952, '35270', 'Temisas', 35, 1),
(9953, '35280', 'Valle, El (santa Lucia De Tirajana)', 35, 1),
(9954, '35280', 'Valle, El (santa Lucia De Tirajana)', 35, 1),
(9955, '35290', 'Tunte', 35, 1),
(9956, '35299', 'Sequero, El (san Bartolome Tirajana)', 35, 1),
(9957, '35300', 'Veroles, Los', 35, 1),
(9958, '35307', 'Vinculo, El (santa Brigida)', 35, 1),
(9959, '35308', 'Silos, Los (santa Brigida)', 35, 1),
(9960, '35309', 'Tejar, El', 35, 1),
(9961, '35310', 'Vinco, El (santa Brigida)', 35, 1),
(9962, '35320', 'Vega De San Mateo', 35, 1),
(9963, '35328', 'Yedra, La', 35, 1),
(9964, '35329', 'Meson, El (san Mateo)', 35, 1),
(9965, '35330', 'Teror (capital Municipal)', 35, 1),
(9966, '35333', 'Arbejales', 35, 1),
(9967, '35338', 'Toscas, Las (teror)', 35, 1),
(9968, '35339', 'Siete Puertas (teror)', 35, 1),
(9969, '35340', 'Valleseco (capital Municipal)', 35, 1),
(9970, '35349', 'Zumacal (valleseco)', 35, 1),
(9971, '35350', 'Juncalillo (galdar)', 35, 1),
(9972, '35360', 'Tejeda (capital Municipal)', 35, 1),
(9973, '35368', 'Toscon, El (tejeda)', 35, 1),
(9974, '35369', 'Umbria, La', 35, 1),
(9975, '35369', 'Umbria, La', 35, 1),
(9976, '35370', 'Yaiza', 35, 1),
(9977, '35400', 'Terrero, El (arucas)', 35, 1),
(9978, '35404', 'Arucas', 35, 1),
(9979, '35411', 'Santidad Baja', 35, 1),
(9980, '35412', 'Visvique', 35, 1),
(9981, '35413', 'Tres Barrios', 35, 1),
(9982, '35413', 'Tres Barrios', 35, 1),
(9983, '35414', 'San Felipe', 35, 1),
(9984, '35415', 'Perdigon, El', 35, 1),
(9985, '35418', 'Arucas', 35, 1),
(9986, '35420', 'Moya', 35, 1),
(9987, '35420', 'Moya', 35, 1),
(9988, '35421', 'Tiles, Los', 35, 1),
(9989, '35422', 'Trujillo (moya)', 35, 1),
(9990, '35423', 'Palo, El', 35, 1),
(9991, '35430', 'Firgas (capital Municipal)', 35, 1),
(9992, '35431', 'Zumacal, El (firgas)', 35, 1),
(9993, '35432', 'Trapiche (firgas)', 35, 1),
(9994, '35435', 'Firgas', 35, 1),
(9995, '35450', 'Santa Maria De Guia (capital Municipal)', 35, 1),
(9996, '35457', 'Verdejo', 35, 1),
(9997, '35458', 'Vergara', 35, 1),
(9998, '35460', 'Galdar (capital Municipal)', 35, 1),
(9999, '35468', 'Valeron', 35, 1),
(10000, '35469', 'Sobradillo, El (galdar)', 35, 1),
(10001, '35469', 'Sobradillo, El (galdar)', 35, 1),
(10002, '35470', 'San Nicolas De Tolentino (capital Municipal)', 35, 1),
(10003, '35478', 'Tocodoman', 35, 1),
(10004, '35479', 'Tabladas, Las', 35, 1),
(10005, '35480', 'Turman, El, Urbanizacion', 35, 1),
(10006, '35488', 'Taya', 35, 1),
(10007, '35489', 'Vecindad De Enfrente', 35, 1),
(10008, '35500', 'Arrecife', 35, 1),
(10009, '35507', 'Volcan De Tahiche', 35, 1),
(10010, '35508', 'Costa Teguise', 35, 1),
(10011, '35509', 'Puntas, Las', 35, 1),
(10012, '35509', 'Puntas, Las', 35, 1),
(10013, '35510', 'Puerto Del Carmen', 35, 1),
(10014, '35520', 'Haria (capital Municipal)', 35, 1),
(10015, '35530', 'Teguise (capital Municipal)', 35, 1),
(10016, '35539', 'Valles, Los', 35, 1),
(10017, '35540', 'Pedro Barba (la Graciosa)', 35, 1),
(10018, '35540', 'Pedro Barba (la Graciosa)', 35, 1),
(10019, '35541', 'Salinas Del Rio', 35, 1),
(10020, '35542', 'Tabayesco', 35, 1),
(10021, '35543', 'Mala', 35, 1),
(10022, '35543', 'Mala', 35, 1),
(10023, '35544', 'Guatiza', 35, 1),
(10024, '35550', 'San Bartolome De Lanzarote (capital Municipal)', 35, 1),
(10025, '35550', 'San Bartolome De Lanzarote (capital Municipal)', 35, 1),
(10026, '35558', 'Vista La Graciosa', 35, 1),
(10027, '35560', 'Yuco', 35, 1),
(10028, '35561', 'Tomaren', 35, 1),
(10029, '35570', 'Yaiza (capital Municipal)', 35, 1),
(10030, '35571', 'Volcan, El', 35, 1),
(10031, '35572', 'Tias (capital Municipal)', 35, 1),
(10032, '35579', 'La Aldea de San Nicol', 35, 1),
(10033, '35580', 'San Marcial De Rubicon', 35, 1),
(10034, '35600', 'Puerto Del Rosario (capital Municipal)', 35, 1),
(10035, '35610', 'Salinas Del Carmen', 35, 1),
(10036, '35610', 'Salinas Del Carmen', 35, 1),
(10037, '35611', 'Tesjuate', 35, 1),
(10038, '35612', 'Rosa De La Monja', 35, 1),
(10039, '35613', 'Valhondo', 35, 1),
(10040, '35620', 'Gran Tarajal', 35, 1),
(10041, '35625', 'Solana Del Matorral', 35, 1),
(10042, '35626', 'Tenni-center', 35, 1),
(10043, '35627', 'Rosas De Los James', 35, 1),
(10044, '35627', 'Rosas De Los James', 35, 1),
(10045, '35628', 'Toto', 35, 1),
(10046, '35628', 'Toto', 35, 1),
(10047, '35629', 'Tuineje', 35, 1),
(10048, '35630', 'Antigua, La (capital Municipal)', 35, 1),
(10049, '35637', 'Vega De Rio Palmas', 35, 1),
(10050, '35637', 'Vega De Rio Palmas', 35, 1),
(10051, '35638', 'Valles De Ortega', 35, 1),
(10052, '35639', 'Triquivijate', 35, 1),
(10053, '35640', 'Villaverde', 35, 1),
(10054, '35640', 'Villaverde', 35, 1),
(10055, '35649', 'Vallebron', 35, 1),
(10056, '35650', 'Roque, El (cotillo)', 35, 1),
(10057, '35660', 'Tres Islas', 35, 1),
(10058, '35660', 'Tres Islas', 35, 1),
(10059, '36001', 'Pontevedra', 36, 1),
(10060, '36002', 'Pontevedra', 36, 1),
(10061, '36003', 'Pontevedra', 36, 1),
(10062, '36004', 'Pontevedra', 36, 1),
(10063, '36005', 'Pontevedra', 36, 1),
(10064, '36005', 'Pontevedra', 36, 1),
(10065, '36110', 'Lagoa, A (campo Lameiro)', 36, 1),
(10066, '36116', 'Tomonde (santa Maria)', 36, 1),
(10067, '36117', 'Quireza (cerdedo)', 36, 1),
(10068, '36118', 'Fragas (santa MariÑa)', 36, 1),
(10069, '36119', 'Morillas (santiago)', 36, 1),
(10070, '36120', 'Vilanova (tenorio)', 36, 1),
(10071, '36121', 'Viascon (santiago)', 36, 1),
(10072, '36139', 'Serrapio', 36, 1),
(10073, '36140', 'Santa Comba De Bertola (santa Comba)', 36, 1),
(10074, '36141', 'Vilaboa (san MartiÑo)', 36, 1),
(10075, '36142', 'Santa Cristina De Cobres (vilaboa)', 36, 1),
(10076, '36143', 'Pontevedra', 36, 1),
(10077, '36150', 'Xeve (santo Andre)', 36, 1),
(10078, '36151', 'Verducido (san MartiÑo)', 36, 1),
(10079, '36152', 'Cerponzons (san Vicente)', 36, 1),
(10080, '36153', 'Lourizan (santo Andre)', 36, 1),
(10081, '36154', 'Bora (santa MariÑa)', 36, 1),
(10082, '36155', 'Pontevedra', 36, 1),
(10083, '36156', 'Pontevedra', 36, 1),
(10084, '36157', 'Vao, O (poligono Ndustrial)', 36, 1),
(10085, '36158', 'Valadares (marcon)', 36, 1),
(10086, '36160', 'Pontevedra', 36, 1),
(10087, '36161', 'Pontevedra', 36, 1),
(10088, '36162', 'Pontevedra', 36, 1),
(10089, '36163', 'Pontevedra', 36, 1),
(10090, '36164', 'Pontevedra', 36, 1),
(10091, '36190', 'Agudelo (san MartiÑo )', 36, 1),
(10092, '36191', 'Porrans (barro)', 36, 1),
(10093, '36192', 'Armenteira (santa Maria)', 36, 1),
(10094, '36193', 'ValiÑas (santo  Andre)', 36, 1),
(10095, '36193', 'ValiÑas (santo  Andre)', 36, 1),
(10096, '36194', 'Perdecanai (santa Maria)', 36, 1),
(10097, '36201', 'Vigo', 36, 1),
(10098, '36202', 'Vigo', 36, 1),
(10099, '36203', 'Vigo', 36, 1),
(10100, '36204', 'Vigo', 36, 1),
(10101, '36205', 'Vigo', 36, 1),
(10102, '36206', 'Vigo', 36, 1),
(10103, '36207', 'Vigo', 36, 1),
(10104, '36208', 'Vigo', 36, 1),
(10105, '36209', 'Vigo', 36, 1),
(10106, '36210', 'Vigo', 36, 1),
(10107, '36211', 'Vigo', 36, 1),
(10108, '36212', 'Vigo', 36, 1),
(10109, '36213', 'Vigo', 36, 1),
(10110, '36214', 'Vigo', 36, 1),
(10111, '36215', 'Vigo', 36, 1),
(10112, '36216', 'Vigo', 36, 1),
(10113, '36300', 'Percebelleira (baiona)', 36, 1),
(10114, '36307', 'Urgal (baiona)', 36, 1),
(10115, '36308', 'Laxes, As (baiÑa)', 36, 1),
(10116, '36309', 'Viladesuso (san Miguel)', 36, 1),
(10117, '36309', 'Viladesuso (san Miguel)', 36, 1),
(10118, '36310', 'Vigo', 36, 1),
(10119, '36311', 'Mos', 36, 1),
(10120, '36312', 'Vigo', 36, 1),
(10121, '36313', 'Vigo', 36, 1),
(10122, '36314', 'Vigo', 36, 1),
(10123, '36315', 'Vigo', 36, 1),
(10124, '36316', 'Vincios (santa MariÑa)', 36, 1),
(10125, '36317', 'Vigo', 36, 1),
(10126, '36318', 'Vigo', 36, 1),
(10127, '36320', 'Chapela (san Fausto)', 36, 1),
(10128, '36330', 'Vigo', 36, 1),
(10129, '36331', 'Vigo', 36, 1),
(10130, '36340', 'San Xoan (panxon)', 36, 1),
(10131, '36350', 'Vilamean (nigran)', 36, 1),
(10132, '36360', 'Tomadas, As (chandebrito)', 36, 1),
(10133, '36370', 'Xesteira, A (ramallosa)', 36, 1),
(10134, '36378', 'Borreiros (san MartiÑo)', 36, 1),
(10135, '36379', 'Parada (nigran)', 36, 1),
(10136, '36380', 'Vilaza (santa Maria)', 36, 1),
(10137, '36388', 'MaÑufe (san Vicente)', 36, 1),
(10138, '36389', 'Vilas (morgadns)', 36, 1),
(10139, '36390', 'Vigo', 36, 1),
(10140, '36391', 'Priegue (san Mamede)', 36, 1),
(10141, '36392', 'Vigo', 36, 1),
(10142, '36393', 'Xuncal, O (ramallosa, A)', 36, 1),
(10143, '36400', 'PorriÑo, O (santa Maria)', 36, 1),
(10144, '36410', 'Torneiros (san Salvador)', 36, 1),
(10145, '36411', 'Cans (santo Estevo)', 36, 1),
(10146, '36412', 'Pontellas (santiago)', 36, 1),
(10147, '36413', 'Mosende (san Xurxo)', 36, 1),
(10148, '36414', 'Chenlo (san Xoan)', 36, 1),
(10149, '36415', 'Mos (santa Eulalia)', 36, 1),
(10150, '36416', 'VeigadaÑa (petelos)', 36, 1),
(10151, '36417', 'Torroso (san Mamede)', 36, 1),
(10152, '36418', 'SanguiÑeda (santa Maria)', 36, 1),
(10153, '36418', 'SanguiÑeda (santa Maria)', 36, 1),
(10154, '36419', 'Pereiras (san Miguel)', 36, 1),
(10155, '36420', 'Crecente (san Pedro)', 36, 1),
(10156, '36428', 'Sendelle (santa Cruz)', 36, 1),
(10157, '36429', 'Vilar (crecente)', 36, 1),
(10158, '36430', 'Estacion, A (arbo)', 36, 1),
(10159, '36435', 'Barcela (san Xoan )', 36, 1),
(10160, '36436', 'Cabeiras (san Sebastian )', 36, 1),
(10161, '36437', 'Mourentan (san Cristovo )', 36, 1),
(10162, '36438', 'Cequelinos (san Miguel )', 36, 1),
(10163, '36439', 'Arbo', 36, 1),
(10164, '36440', 'Neves, As (santa Maria)', 36, 1),
(10165, '36446', 'Vide (santa Maria)', 36, 1),
(10166, '36447', 'Santiago De Ribarteme (neves, As)', 36, 1),
(10167, '36448', 'Taboexa (santa Maria)', 36, 1),
(10168, '36449', 'Tortoreos (santiago)', 36, 1),
(10169, '36450', 'Salvaterra De MiÑo (san Lourenzo)', 36, 1),
(10170, '36455', 'Lourido (santo Andre)', 36, 1),
(10171, '36456', 'Pesqueiras (santa MariÑa)', 36, 1),
(10172, '36457', 'Soutolobre (santa Comba)', 36, 1),
(10173, '36458', 'Porto (san Paulo)', 36, 1),
(10174, '36459', 'Vilacoba (san Xoan)', 36, 1),
(10175, '36460', 'Soutelo (san Vicente)', 36, 1),
(10176, '36460', 'Soutelo (san Vicente)', 36, 1),
(10177, '36470', 'Venda Nova, A (salceda)', 36, 1);
INSERT INTO `lnx_poblaciones` (`id`, `cp`, `poblacion`, `idprov`, `idpais`) VALUES
(10178, '36470', 'Venda Nova, A (salceda)', 36, 1),
(10179, '36471', 'Entenza (santos Xusto E Pastor)', 36, 1),
(10180, '36472', 'Revolta, A (parderrubias)', 36, 1),
(10181, '36473', 'Salceda de Caselas', 36, 1),
(10182, '36474', 'PicoÑa, A (san MartiÑo)', 36, 1),
(10183, '36475', 'Santo Estevo De BudiÑo (santo Estevo)', 36, 1),
(10184, '36475', 'Santo Estevo De BudiÑo (santo Estevo)', 36, 1),
(10185, '36490', 'Filgueira (san Pedro)', 36, 1),
(10186, '36491', 'Rebordechan (santa Maria)', 36, 1),
(10187, '36492', 'Quintela (creciente)', 36, 1),
(10188, '36493', 'Ribeira (creciente)', 36, 1),
(10189, '36494', 'Sela (santa Maria )', 36, 1),
(10190, '36500', 'Lalin De Arriba', 36, 1),
(10191, '36510', 'Xaxan (santa Maria Da Saleta)', 36, 1),
(10192, '36511', 'San Paio De Senra (rodeiro)', 36, 1),
(10193, '36511', 'San Paio De Senra (rodeiro)', 36, 1),
(10194, '36512', 'Santiso (san Roman)', 36, 1),
(10195, '36514', 'Moimenta (lalin)', 36, 1),
(10196, '36514', 'Moimenta (lalin)', 36, 1),
(10197, '36515', 'Xesta, A (san Fiz)', 36, 1),
(10198, '36516', 'Vilarello (santo Andre)', 36, 1),
(10199, '36516', 'Vilarello (santo Andre)', 36, 1),
(10200, '36517', 'Sello (santiago)', 36, 1),
(10201, '36518', 'SanguiÑedo (santa Maria)', 36, 1),
(10202, '36518', 'SanguiÑedo (santa Maria)', 36, 1),
(10203, '36519', 'Zobra (santa Maria)', 36, 1),
(10204, '36520', 'Ferreiroa (san Pedro)', 36, 1),
(10205, '36524', 'Santa Comba (san Xoan)', 36, 1),
(10206, '36525', 'Borraxeiros (san Cristovo)', 36, 1),
(10207, '36526', 'Val De Sangorza (santa Maria)', 36, 1),
(10208, '36527', 'Ramil (san MartiÑo)', 36, 1),
(10209, '36528', 'VilariÑo (pª Santa Maria)', 36, 1),
(10210, '36529', 'Ventosa (san Xulian)', 36, 1),
(10211, '36530', 'Rodeiro (san Vicente)', 36, 1),
(10212, '36537', 'Vilela (santa Maria)', 36, 1),
(10213, '36538', 'Santa MariÑa De Pescoso (rodeiro)', 36, 1),
(10214, '36539', 'San Salvador De Camba (rodeiro)', 36, 1),
(10215, '36540', 'Silleda (santa Baia)', 36, 1),
(10216, '36543', 'Vilar (silleda)', 36, 1),
(10217, '36544', 'Parada (silleda)', 36, 1),
(10218, '36545', 'Oleiros (san Miguel)', 36, 1),
(10219, '36546', 'Saidres (san Xoan)', 36, 1),
(10220, '36547', 'Siador (san Miguel)', 36, 1),
(10221, '36548', 'Xestoso (santa Maria)', 36, 1),
(10222, '36549', 'Forcarei', 36, 1),
(10223, '36549', 'Silleda', 36, 1),
(10224, '36550', 'Forcarei (casco Urbano)', 36, 1),
(10225, '36555', 'Ventoxo (san Nicolao)', 36, 1),
(10226, '36556', 'Millarada (san Amedio)', 36, 1),
(10227, '36557', 'Quintillan (san Pedro)', 36, 1),
(10228, '36558', 'Parada (cerdedo)', 36, 1),
(10229, '36559', 'Duas Igrexas (santa Maria)', 36, 1),
(10230, '36560', 'Soutelo  De Montes', 36, 1),
(10231, '36567', 'Madanela De Montes, A (santa Maria)', 36, 1),
(10232, '36569', 'Santa MariÑa De Presqueiras (forcarei)', 36, 1),
(10233, '36570', 'Manduas (san Tirso)', 36, 1),
(10234, '36579', 'PiÑeiro (silleda)', 36, 1),
(10235, '36580', 'Merza (santa Maria)', 36, 1),
(10236, '36581', 'Sabrexo (santa Maria)', 36, 1),
(10237, '36582', 'Carbia (san Xoan)', 36, 1),
(10238, '36583', 'Fontao (santiago)', 36, 1),
(10239, '36583', 'Fontao (santiago)', 36, 1),
(10240, '36584', 'San Miguel De Castro (estrada, A)', 36, 1),
(10241, '36585', 'Obra (san Tome)', 36, 1),
(10242, '36586', 'Salgueiros (san Pedro)', 36, 1),
(10243, '36587', 'Gres (santiago)', 36, 1),
(10244, '36587', 'Gres (santiago)', 36, 1),
(10245, '36588', 'Orazo (san Pedro)', 36, 1),
(10246, '36589', 'Pazos (san MartiÑo)', 36, 1),
(10247, '36590', 'Vila De Cruces', 36, 1),
(10248, '36596', 'Val Do Carrio (santo Andre)', 36, 1),
(10249, '36596', 'Val Do Carrio (santo Andre)', 36, 1),
(10250, '36597', 'Toiriz (san Xoan)', 36, 1),
(10251, '36598', 'San Pedro De Loson (vila De Cruces)', 36, 1),
(10252, '36598', 'San Pedro De Loson (vila De Cruces)', 36, 1),
(10253, '36599', 'San Tome De Insua (vila De Cruces)', 36, 1),
(10254, '36600', 'Vilagarcia De Arousa', 36, 1),
(10255, '36610', 'Guillan (carril)', 36, 1),
(10256, '36611', 'Vilaxoan (vilagarcia)', 36, 1),
(10257, '36612', 'Tarrio (dimo)', 36, 1),
(10258, '36613', 'Trabanca BadiÑa (arealonga)', 36, 1),
(10259, '36614', 'Solobeira (san Fins)', 36, 1),
(10260, '36615', 'Godos (santa Maria)', 36, 1),
(10261, '36616', 'Paradela (meis)', 36, 1),
(10262, '36616', 'Paradela (meis)', 36, 1),
(10263, '36617', 'Vento, O (cea)', 36, 1),
(10264, '36618', 'Vilar (bamio)', 36, 1),
(10265, '36619', 'Rubians (santa Maria)', 36, 1),
(10266, '36620', 'Vilanova De Arousa  (casco Urbano)', 36, 1),
(10267, '36626', 'Illa De Arousa, A (san Xulian)', 36, 1),
(10268, '36627', 'ViÑa Grande (deiro)', 36, 1),
(10269, '36628', 'Tremoedo (santo Estevo)', 36, 1),
(10270, '36629', 'Saradelo (caleiro)', 36, 1),
(10271, '36629', 'Saradelo (caleiro)', 36, 1),
(10272, '36630', 'Cambados (santa MariÑa)', 36, 1),
(10273, '36633', 'VilariÑo (cambados)', 36, 1),
(10274, '36634', 'Tragove (corvillon)', 36, 1),
(10275, '36635', 'OubiÑa (san Vicenzo)', 36, 1),
(10276, '36635', 'OubiÑa (san Vicenzo)', 36, 1),
(10277, '36636', 'Ribadumia (santa Baia)', 36, 1),
(10278, '36637', 'San Tome De Nogueira (meis)', 36, 1),
(10279, '36638', 'Sisan (san Clemenzo)', 36, 1),
(10280, '36638', 'Sisan (san Clemenzo)', 36, 1),
(10281, '36639', 'Xesteira (castrelo)', 36, 1),
(10282, '36640', 'San Xulian (pontecesures)', 36, 1),
(10283, '36645', 'Valga (san Miguel)', 36, 1),
(10284, '36646', 'Setecoros (san Salvador)', 36, 1),
(10285, '36647', 'Vilar (cordeiro)', 36, 1),
(10286, '36649', 'Devesa, A (campaÑa)', 36, 1),
(10287, '36650', 'Caldas De Reis (casco Urbano)', 36, 1),
(10288, '36653', 'Santo  Andre De Cesar (santo Andre)', 36, 1),
(10289, '36654', 'San Clemente De Cesar (san Clemente)', 36, 1),
(10290, '36655', 'Caldas De Reis (santa Maria)', 36, 1),
(10291, '36656', 'Saiar (santo Estevo)', 36, 1),
(10292, '36657', 'LantaÑo (san Pedro)', 36, 1),
(10293, '36658', 'Portas (santa Maria)', 36, 1),
(10294, '36658', 'Portas (santa Maria)', 36, 1),
(10295, '36659', 'Paradela (bemil)', 36, 1),
(10296, '36660', 'Santa Lucia De MoraÑa', 36, 1),
(10297, '36668', 'Santa Xusta De MoraÑa (santa Xusta)', 36, 1),
(10298, '36669', 'Saians (san Salvador)', 36, 1),
(10299, '36670', 'Cuntis (casco Urbano)', 36, 1),
(10300, '36675', 'Troans (santa Maria)', 36, 1),
(10301, '36676', 'Santo Andre De Vea (estrada, A)', 36, 1),
(10302, '36677', 'Portela (cuntis)', 36, 1),
(10303, '36678', 'Cuntis (santa Maria)', 36, 1),
(10304, '36679', 'PiÑeiro (cuntis)', 36, 1),
(10305, '36680', 'Estrada, A (casco Urbano)', 36, 1),
(10306, '36681', 'Ouzande (san Lourenzo)', 36, 1),
(10307, '36682', 'Toedo (san Pedro)', 36, 1),
(10308, '36683', 'San Xurxo De Vea (estrada, A)', 36, 1),
(10309, '36684', 'Tabeiros (santiago)', 36, 1),
(10310, '36685', 'San Pedro De Ancorados (estrada, A)', 36, 1),
(10311, '36685', 'San Pedro De Ancorados (estrada, A)', 36, 1),
(10312, '36686', 'San Tome De Ancorados (estrada, A)', 36, 1),
(10313, '36687', 'Vinseiro (santa Cristina)', 36, 1),
(10314, '36688', 'Moreira (san Miguel)', 36, 1),
(10315, '36689', 'Santeles (san Xoan)', 36, 1),
(10316, '36690', 'Xesteira, A (arcade)', 36, 1),
(10317, '36690', 'Xesteira, A (arcade)', 36, 1),
(10318, '36691', 'Soutomaior (san Salvador)', 36, 1),
(10319, '36692', 'San Amaro (portela)', 36, 1),
(10320, '36693', 'Cesantes (san Pedro)', 36, 1),
(10321, '36700', 'Tui (o Sagrario)', 36, 1),
(10322, '36710', 'Ribadelouro (santa Comba)', 36, 1),
(10323, '36711', 'Pexegueiro (san Miguel)', 36, 1),
(10324, '36712', 'Rebordans (san Bartolomeu)', 36, 1),
(10325, '36713', 'Randufe (santa Maria)', 36, 1),
(10326, '36714', 'Malvas (santiago)', 36, 1),
(10327, '36715', 'Pazos De Reis ( O Sagrario)', 36, 1),
(10328, '36720', 'Sobredo (guillarei)', 36, 1),
(10329, '36729', 'Paramos (san Xoan)', 36, 1),
(10330, '36730', 'Forcadela (san Pedro)', 36, 1),
(10331, '36739', 'Taborda (san Miguel)', 36, 1),
(10332, '36740', 'TomiÑo (santa Maria)', 36, 1),
(10333, '36746', 'Tebra (santa Maria)', 36, 1),
(10334, '36747', 'Vilamean (san Bieito)', 36, 1),
(10335, '36748', 'San Salvador De Tebra (tomiÑo)', 36, 1),
(10336, '36749', 'Pinzas (santa Maria)', 36, 1),
(10337, '36750', 'Tollo (goian)', 36, 1),
(10338, '36760', 'Tabagon (san Xoan)', 36, 1),
(10339, '36770', 'Viso Dos Eidos (rosal, O)', 36, 1),
(10340, '36778', 'O Rosal', 36, 1),
(10341, '36779', 'Loureza (san Mamede)', 36, 1),
(10342, '36780', 'Guarda, A (santa Maria)', 36, 1),
(10343, '36788', 'Outeiro, O (camposancos', 36, 1),
(10344, '36789', 'Salcidos (san Lourenzo)', 36, 1),
(10345, '36790', 'Sobrada (san Salvador)', 36, 1),
(10346, '36791', 'Curras (san MartiÑo)', 36, 1),
(10347, '36792', 'Figueiro (san MartiÑo)', 36, 1),
(10348, '36794', 'RiÑa, A (oia)', 36, 1),
(10349, '36800', 'Redondela (santiago)', 36, 1),
(10350, '36810', 'Viso, O (santa Maria)', 36, 1),
(10351, '36811', 'TrasmaÑo (san Vicente)', 36, 1),
(10352, '36812', 'Rande (cedeira)', 36, 1),
(10353, '36813', 'Cabeiro (san Xoan)', 36, 1),
(10354, '36814', 'Pregal (negros)', 36, 1),
(10355, '36815', 'Vilar De Infesta (san MartiÑo)', 36, 1),
(10356, '36816', 'Valos, Os (saxamonde)', 36, 1),
(10357, '36817', 'Quintela (san Mamede)', 36, 1),
(10358, '36817', 'Quintela (san Mamede)', 36, 1),
(10359, '36818', 'Ventosela (san MartiÑo)', 36, 1),
(10360, '36820', 'Ponte Caldelas (santa Eulalia)', 36, 1),
(10361, '36826', 'Silvoso (insua)', 36, 1),
(10362, '36827', 'Xustans (san MartiÑo)', 36, 1),
(10363, '36828', 'Vilarchan (touron)', 36, 1),
(10364, '36829', 'Caritel (santa Maria)', 36, 1),
(10365, '36830', 'Lama, A (san Salvador)', 36, 1),
(10366, '36835', 'Seixido (san Bartolomeu)', 36, 1),
(10367, '36836', 'Xesta (san Bartolomeu)', 36, 1),
(10368, '36837', 'Barcia Do Seixo (santa Ana)', 36, 1),
(10369, '36838', 'Escuadra (san Lourenzo)', 36, 1),
(10370, '36839', 'Covelo (san Sebastian)', 36, 1),
(10371, '36840', 'Igrexa, A (amoedo)', 36, 1),
(10372, '36841', 'Pazos De Borben', 36, 1),
(10373, '36842', 'Borben (santiago)', 36, 1),
(10374, '36843', 'Moscoso (san Paio)', 36, 1),
(10375, '36844', 'Xunqueiras (san Salvador)', 36, 1),
(10376, '36845', 'Calvos (santo Adrian)', 36, 1),
(10377, '36846', 'Oitaven (san Vicente)', 36, 1),
(10378, '36847', 'Igrexa, A (fornelos De Montes)', 36, 1),
(10379, '36848', 'Ventin (san Miguel)', 36, 1),
(10380, '36849', 'Traspielas (santa Maria)', 36, 1),
(10381, '36850', 'A Lama', 36, 1),
(10382, '36851', 'Estacas, As (santa Maria)', 36, 1),
(10383, '36852', 'Laxe, A (fornelos De Montes)', 36, 1),
(10384, '36853', 'Xende (san Paulo)', 36, 1),
(10385, '36853', 'Xende (san Paulo)', 36, 1),
(10386, '36854', 'Valongo (santo Andre)', 36, 1),
(10387, '36855', 'Loureiro (santiago)', 36, 1),
(10388, '36856', 'Corredoira (san Gregorio)', 36, 1),
(10389, '36857', 'Rebordelo (san MartiÑo)', 36, 1),
(10390, '36857', 'Rebordelo (san MartiÑo)', 36, 1),
(10391, '36858', 'Borela (san MartiÑo)', 36, 1),
(10392, '36859', 'Almofrei (san Lourenzo)', 36, 1),
(10393, '36860', 'Ponteareas (san Miguel)', 36, 1),
(10394, '36861', 'Gulans (san Xulian)', 36, 1),
(10395, '36862', 'Puzo (oliveira)', 36, 1),
(10396, '36863', 'Nogueira (san Salvador)', 36, 1),
(10397, '36864', 'San Lourenzo De Oliveira (ponteareas)', 36, 1),
(10398, '36865', 'Serra (arcos)', 36, 1),
(10399, '36866', 'Ribadetea (san Xurxo)', 36, 1),
(10400, '36867', 'Searas, As (angoares)', 36, 1),
(10401, '36868', 'Guillade (san Miguel)', 36, 1),
(10402, '36869', 'Bugarin (santa Cristina)', 36, 1),
(10403, '36870', 'Mondariz (santa Baia)', 36, 1),
(10404, '36872', 'Santiago De Covelo (covelo, O)', 36, 1),
(10405, '36873', 'Prado De Canda (santiago)', 36, 1),
(10406, '36874', 'Vilar (mondariz)', 36, 1),
(10407, '36875', 'Riofrio (san Miguel)', 36, 1),
(10408, '36875', 'Riofrio (san Miguel)', 36, 1),
(10409, '36876', 'Lougares (san Fiz)', 36, 1),
(10410, '36876', 'Lougares (san Fiz)', 36, 1),
(10411, '36877', 'Queimadelos (santa Maria)', 36, 1),
(10412, '36877', 'Queimadelos (santa Maria)', 36, 1),
(10413, '36878', 'San Amaro, O (barcia De Mera)', 36, 1),
(10414, '36878', 'San Amaro, O (barcia De Mera)', 36, 1),
(10415, '36879', 'Vilasobroso (san MartiÑo)', 36, 1),
(10416, '36880', 'CaÑiza, A (casco Urbano)', 36, 1),
(10417, '36883', 'Valeixe (santa Cristina)', 36, 1),
(10418, '36884', 'Petan (san Xian)', 36, 1),
(10419, '36885', 'Oroso (santa Maria)', 36, 1),
(10420, '36885', 'Oroso (santa Maria)', 36, 1),
(10421, '36886', 'Couto, O (san Bartolomeu)', 36, 1),
(10422, '36887', 'Parada Das Achas (santiago)', 36, 1),
(10423, '36888', 'CaÑiza, A (santa Teresa)', 36, 1),
(10424, '36889', 'Franqueira, A  (santa Maria)', 36, 1),
(10425, '36889', 'Franqueira, A  (santa Maria)', 36, 1),
(10426, '36890', 'Mondariz-balneario', 36, 1),
(10427, '36891', 'Xinzo (santa MariÑa)', 36, 1),
(10428, '36892', 'Arnoso (san Lourenzo)', 36, 1),
(10429, '36893', 'Cumiar (santo Estevo)', 36, 1),
(10430, '36895', 'Prado (ponteareas)', 36, 1),
(10431, '36900', 'Marin (parroquia Santa Maria Do Porto)', 36, 1),
(10432, '36910', 'Praceres, Os (lourizan)', 36, 1),
(10433, '36911', 'Mogor (san Xurxo)', 36, 1),
(10434, '36912', 'Vilaseca (ardan)', 36, 1),
(10435, '36913', 'Seixo (nosa SeÑora Do Carme)', 36, 1),
(10436, '36914', 'San Tome De PiÑeiro (marin)', 36, 1),
(10437, '36915', 'Pardavila (marin)', 36, 1),
(10438, '36920', 'Marin (escuela Naval)', 36, 1),
(10439, '36930', 'Bueu (casco Urbano)', 36, 1),
(10440, '36937', 'Sar (beluso)', 36, 1),
(10441, '36938', 'Torre, A (cela)', 36, 1),
(10442, '36939', 'Valado, O (bueu)', 36, 1),
(10443, '36940', 'Cangas Do Morrazo', 36, 1),
(10444, '36945', 'VilariÑo (hio)', 36, 1),
(10445, '36946', 'Gandon (aldan)', 36, 1),
(10446, '36947', 'Rozada (coiro)', 36, 1),
(10447, '36948', 'Cangas', 36, 1),
(10448, '36950', 'MoaÑa (casco Urbano)', 36, 1),
(10449, '36954', 'MoaÑa (san MartiÑo)', 36, 1),
(10450, '36955', 'Ribeira, A (meira)', 36, 1),
(10451, '36957', 'Verdeal (domaio)', 36, 1),
(10452, '36958', 'Vilela (tiran)', 36, 1),
(10453, '36959', 'Verducedo (moaÑa)', 36, 1),
(10454, '36960', 'Sanxenxo (casco Urbano)', 36, 1),
(10455, '36966', 'Granxa, A (dorron)', 36, 1),
(10456, '36967', 'Viliquin (dena)', 36, 1),
(10457, '36968', 'Xil (santa Eulalia)', 36, 1),
(10458, '36969', 'Simes (santa Maria)', 36, 1),
(10459, '36969', 'Simes (santa Maria)', 36, 1),
(10460, '36970', 'Portonovo (adina)', 36, 1),
(10461, '36979', 'Vista Alegre (adina)', 36, 1),
(10462, '36980', 'Grove, O (casco Urbano)', 36, 1),
(10463, '36988', 'San Vicente Do Grove (san Vicente)', 36, 1),
(10464, '36989', 'Virxe Das Mareas (grove, O)', 36, 1),
(10465, '36990', 'Vilar (vilalonga)', 36, 1),
(10466, '36991', 'Toxa (illa Da)', 36, 1),
(10467, '36992', 'Samieira (santa Maria)', 36, 1),
(10468, '36993', 'Combarro (san Roque)', 36, 1),
(10469, '36995', 'Seara, A (poio)', 36, 1),
(10470, '37001', 'Salamanca', 37, 1),
(10471, '37002', 'Salamanca', 37, 1),
(10472, '37003', 'Salamanca', 37, 1),
(10473, '37004', 'Salamanca', 37, 1),
(10474, '37005', 'Salamanca', 37, 1),
(10475, '37006', 'Salamanca', 37, 1),
(10476, '37007', 'Salamanca', 37, 1),
(10477, '37008', 'Salamanca', 37, 1),
(10478, '37008', 'Salamanca', 37, 1),
(10479, '37100', 'Ledesma', 37, 1),
(10480, '37110', 'Zamayon', 37, 1),
(10481, '37110', 'Zamayon', 37, 1),
(10482, '37110', 'Zamayon', 37, 1),
(10483, '37110', 'Zamayon', 37, 1),
(10484, '37110', 'Zamayon', 37, 1),
(10485, '37110', 'Zamayon', 37, 1),
(10486, '37111', 'Palacios Del Arzobispo', 37, 1),
(10487, '37111', 'Palacios Del Arzobispo', 37, 1),
(10488, '37111', 'Palacios Del Arzobispo', 37, 1),
(10489, '37111', 'Palacios Del Arzobispo', 37, 1),
(10490, '37114', 'Villaseco De Los Gamitos', 37, 1),
(10491, '37114', 'Villaseco De Los Gamitos', 37, 1),
(10492, '37114', 'Villaseco De Los Gamitos', 37, 1),
(10493, '37115', 'Valverdon', 37, 1),
(10494, '37115', 'Valverdon', 37, 1),
(10495, '37115', 'Valverdon', 37, 1),
(10496, '37115', 'Valverdon', 37, 1),
(10497, '37115', 'Valverdon', 37, 1),
(10498, '37116', 'Zorita', 37, 1),
(10500, '37120', 'Torre De La Valmuza', 37, 1),
(10501, '37120', 'Torre De La Valmuza', 37, 1),
(10502, '37129', 'Villaselva', 37, 1),
(10503, '37129', 'Villaselva', 37, 1),
(10504, '37129', 'Villaselva', 37, 1),
(10505, '37129', 'Villaselva', 37, 1),
(10506, '37129', 'Villaselva', 37, 1),
(10507, '37130', 'Zafron', 37, 1),
(10508, '37130', 'Zafron', 37, 1),
(10509, '37130', 'Zafron', 37, 1),
(10510, '37130', 'Zafron', 37, 1),
(10511, '37130', 'Zafron', 37, 1),
(10512, '37130', 'Zafron', 37, 1),
(10514, '37139', 'La Mata de Ledesma', 37, 1),
(10515, '37140', 'Campo De Ledesma, El', 37, 1),
(10516, '37147', 'Villar De Peralonso', 37, 1),
(10517, '37148', 'Tremedal De Tormes', 37, 1),
(10518, '37148', 'Tremedal De Tormes', 37, 1),
(10519, '37148', 'Tremedal De Tormes', 37, 1),
(10520, '37148', 'Tremedal De Tormes', 37, 1),
(10521, '37149', 'Trabadillo', 37, 1),
(10522, '37149', 'Trabadillo', 37, 1),
(10523, '37149', 'Trabadillo', 37, 1),
(10524, '37150', 'Villaseco De Los Reyes', 37, 1),
(10525, '37159', 'Puertas', 37, 1),
(10526, '37159', 'Puertas', 37, 1),
(10527, '37160', 'Villarino De Los Aires', 37, 1),
(10528, '37169', 'Villarino de los Aires', 37, 1),
(10529, '37170', 'Zaratan', 37, 1),
(10530, '37170', 'Zaratan', 37, 1),
(10531, '37170', 'Zaratan', 37, 1),
(10532, '37170', 'Zaratan', 37, 1),
(10533, '37170', 'Zaratan', 37, 1),
(10534, '37170', 'Zaratan', 37, 1),
(10535, '37170', 'Zaratan', 37, 1),
(10536, '37170', 'Zaratan', 37, 1),
(10537, '37170', 'Zaratan', 37, 1),
(10538, '37171', 'Monleras', 37, 1),
(10539, '37171', 'Monleras', 37, 1),
(10540, '37172', 'Sardon De Los Frailes', 37, 1),
(10541, '37173', 'Trabanca', 37, 1),
(10542, '37173', 'Trabanca', 37, 1),
(10543, '37174', 'Cabeza De Framontanos', 37, 1),
(10544, '37175', 'PereÑa De La Ribera', 37, 1),
(10545, '37176', 'Salto De Almendra', 37, 1),
(10546, '37181', 'Valdecarretas, Urbanizacion', 37, 1),
(10547, '37181', 'Valdecarretas, Urbanizacion', 37, 1),
(10548, '37183', 'Torre De Juan Vazquez', 37, 1),
(10549, '37183', 'Torre De Juan Vazquez', 37, 1),
(10550, '37183', 'Torre De Juan Vazquez', 37, 1),
(10551, '37183', 'Torre De Juan Vazquez', 37, 1),
(10552, '37183', 'Torre De Juan Vazquez', 37, 1),
(10553, '37184', 'Villares De La Reina', 37, 1),
(10554, '37185', 'Zorita De Valverdon', 37, 1),
(10555, '37185', 'Zorita De Valverdon', 37, 1),
(10556, '37185', 'Zorita De Valverdon', 37, 1),
(10557, '37185', 'Zorita De Valverdon', 37, 1),
(10558, '37186', 'Turra', 37, 1),
(10559, '37186', 'Turra', 37, 1),
(10560, '37186', 'Turra', 37, 1),
(10561, '37186', 'Turra', 37, 1),
(10562, '37187', 'Vistahermosa (sotomuÑiz)', 37, 1),
(10563, '37187', 'Vistahermosa (sotomuÑiz)', 37, 1),
(10564, '37188', 'Pinilla, La', 37, 1),
(10565, '37188', 'Pinilla, La', 37, 1),
(10566, '37189', 'Aldeaseca De La ArmuÑa', 37, 1),
(10567, '37190', 'Encinar, El, Urbanizacion', 37, 1),
(10568, '37191', 'Navahonda, Urbanizacion', 37, 1),
(10569, '37191', 'Navahonda, Urbanizacion', 37, 1),
(10570, '37192', 'Sanatorio Martinez Anido', 37, 1),
(10571, '37192', 'Sanatorio Martinez Anido', 37, 1),
(10572, '37193', 'Rozados', 37, 1),
(10573, '37193', 'Rozados', 37, 1),
(10574, '37194', 'Santa Marta de Tormes', 37, 1),
(10575, '37197', 'Moz', 37, 1),
(10576, '37198', 'Carbajosa de la Sagrada', 37, 1),
(10577, '37200', 'Fuente De San Esteban, La', 37, 1),
(10578, '37207', 'La Fuente de San Esteban', 37, 1),
(10579, '37208', 'San MuÑoz', 37, 1),
(10580, '37208', 'San MuÑoz', 37, 1),
(10581, '37209', 'Pelarrodriguez', 37, 1),
(10582, '37209', 'Pelarrodriguez', 37, 1),
(10583, '37209', 'Pelarrodriguez', 37, 1),
(10584, '37209', 'Pelarrodriguez', 37, 1),
(10585, '37210', 'Vitigudino', 37, 1),
(10586, '37214', 'Vidola, La', 37, 1),
(10587, '37214', 'Vidola, La', 37, 1),
(10588, '37214', 'Vidola, La', 37, 1),
(10589, '37214', 'Vidola, La', 37, 1),
(10590, '37216', 'Traguntia, Finca', 37, 1),
(10591, '37216', 'Traguntia, Finca', 37, 1),
(10592, '37216', 'Traguntia, Finca', 37, 1),
(10593, '37216', 'Traguntia, Finca', 37, 1),
(10594, '37216', 'Traguntia, Finca', 37, 1),
(10595, '37217', 'Villarmuerto', 37, 1),
(10596, '37217', 'Villarmuerto', 37, 1),
(10597, '37217', 'Villarmuerto', 37, 1),
(10598, '37217', 'Villarmuerto', 37, 1),
(10599, '37217', 'Villarmuerto', 37, 1),
(10600, '37217', 'Villarmuerto', 37, 1),
(10601, '37217', 'Villarmuerto', 37, 1),
(10602, '37219', 'Yecla De Yeltes', 37, 1),
(10603, '37219', 'Yecla De Yeltes', 37, 1),
(10604, '37219', 'Yecla De Yeltes', 37, 1),
(10605, '37219', 'Yecla De Yeltes', 37, 1),
(10606, '37219', 'Yecla De Yeltes', 37, 1),
(10607, '37220', 'Fregeneda, Pueblo', 37, 1),
(10608, '37230', 'Hinojosa De Duero', 37, 1),
(10609, '37240', 'Lumbrales', 37, 1),
(10610, '37246', 'Sobradillo', 37, 1),
(10611, '37247', 'Redonda, La', 37, 1),
(10612, '37248', 'Ahigal De Los Aceiteros', 37, 1),
(10613, '37250', 'Majuges', 37, 1),
(10614, '37250', 'Majuges', 37, 1),
(10615, '37251', 'Masueco', 37, 1),
(10616, '37251', 'Masueco', 37, 1),
(10617, '37253', 'Zarza De Pumareda, La', 37, 1),
(10618, '37253', 'Zarza De Pumareda, La', 37, 1),
(10619, '37253', 'Zarza De Pumareda, La', 37, 1),
(10620, '37254', 'Mieza', 37, 1),
(10621, '37255', 'Barruecopardo', 37, 1),
(10622, '37256', 'Villasbuenas', 37, 1),
(10623, '37256', 'Villasbuenas', 37, 1),
(10624, '37256', 'Villasbuenas', 37, 1),
(10625, '37256', 'Villasbuenas', 37, 1),
(10626, '37257', 'Saucelle', 37, 1),
(10627, '37258', 'Vilvestre', 37, 1),
(10628, '37258', 'Vilvestre', 37, 1),
(10629, '37259', 'Saldeana', 37, 1),
(10630, '37260', 'Villavieja De Yeltes', 37, 1),
(10631, '37267', 'Villares De Yeltes', 37, 1),
(10632, '37270', 'San Felices De Los Gallegos', 37, 1),
(10633, '37271', 'BaÑobarez', 37, 1),
(10634, '37273', 'Cerralbo', 37, 1),
(10635, '37281', 'Ituero De Huebra', 37, 1),
(10636, '37290', 'Porciones, Las', 37, 1),
(10637, '37291', 'Fuenteliante', 37, 1),
(10638, '37291', 'Fuenteliante', 37, 1),
(10639, '37291', 'Fuenteliante', 37, 1),
(10640, '37291', 'Fuenteliante', 37, 1),
(10641, '37291', 'Fuenteliante', 37, 1),
(10642, '37292', 'Olmedo De Camaces', 37, 1),
(10643, '37300', 'PeÑaranda De Bracamonte', 37, 1),
(10644, '37310', 'Macotera', 37, 1),
(10645, '37311', 'Santiago De La Puebla', 37, 1),
(10646, '37312', 'Alaraz', 37, 1),
(10647, '37313', 'Malpartida', 37, 1),
(10648, '37314', 'Salmoral', 37, 1),
(10649, '37315', 'Mancera De Abajo', 37, 1),
(10650, '37316', 'Boveda Del Rio Almar', 37, 1),
(10651, '37317', 'Campo De PeÑaranda, El', 37, 1),
(10652, '37317', 'Campo De PeÑaranda, El', 37, 1),
(10653, '37318', 'Ragama', 37, 1),
(10654, '37318', 'Ragama', 37, 1),
(10655, '37319', 'Cantaracillo', 37, 1),
(10656, '37320', 'Villar De Gallimazo', 37, 1),
(10657, '37329', 'Ventosa Del Rio Almar', 37, 1),
(10658, '37329', 'Ventosa Del Rio Almar', 37, 1),
(10659, '37330', 'Babilafuente', 37, 1),
(10660, '37337', 'MoriÑigo', 37, 1),
(10661, '37337', 'MoriÑigo', 37, 1),
(10662, '37338', 'Villoruela', 37, 1),
(10663, '37338', 'Villoruela', 37, 1),
(10664, '37339', 'Villoria', 37, 1),
(10665, '37340', 'San Morales', 37, 1),
(10666, '37340', 'San Morales', 37, 1),
(10667, '37350', 'Aldealengua', 37, 1),
(10668, '37400', 'Cantalapiedra', 37, 1),
(10669, '37405', 'Cantalpino', 37, 1),
(10670, '37406', 'Villaflores', 37, 1),
(10671, '37406', 'Villaflores', 37, 1),
(10672, '37406', 'Villaflores', 37, 1),
(10673, '37408', 'Zorita De La Frontera', 37, 1),
(10674, '37409', 'Tarazona De La GuareÑa', 37, 1),
(10675, '37410', 'Pedroso De La ArmuÑa, El', 37, 1),
(10676, '37418', 'Arabayona De Mogica', 37, 1),
(10677, '37419', 'Parada De Rubiales', 37, 1),
(10678, '37419', 'Parada De Rubiales', 37, 1),
(10679, '37420', 'Gomecello', 37, 1),
(10680, '37427', 'Velles, La', 37, 1),
(10681, '37427', 'Velles, La', 37, 1),
(10682, '37427', 'Velles, La', 37, 1),
(10683, '37428', 'Villaverde De GuareÑa', 37, 1),
(10684, '37428', 'Villaverde De GuareÑa', 37, 1),
(10685, '37428', 'Villaverde De GuareÑa', 37, 1),
(10686, '37429', 'Tardaguila', 37, 1),
(10687, '37429', 'Tardaguila', 37, 1),
(10688, '37429', 'Tardaguila', 37, 1),
(10689, '37430', 'Moriscos', 37, 1),
(10690, '37439', 'San Cristobal De La Cuesta', 37, 1),
(10691, '37439', 'San Cristobal De La Cuesta', 37, 1),
(10692, '37440', 'Vecino, El', 37, 1),
(10693, '37440', 'Vecino, El', 37, 1),
(10694, '37447', 'Rollan', 37, 1),
(10695, '37448', 'Sagos', 37, 1),
(10696, '37448', 'Sagos', 37, 1),
(10697, '37449', 'Santo Tome Del Collado', 37, 1),
(10698, '37449', 'Santo Tome Del Collado', 37, 1),
(10699, '37449', 'Santo Tome Del Collado', 37, 1),
(10700, '37450', 'Matilla De Los CaÑos', 37, 1),
(10701, '37450', 'Matilla De Los CaÑos', 37, 1),
(10702, '37450', 'Matilla De Los CaÑos', 37, 1),
(10703, '37451', 'Huelmos Y Casasolilla', 37, 1),
(10704, '37451', 'Huelmos Y Casasolilla', 37, 1),
(10705, '37451', 'Huelmos Y Casasolilla', 37, 1),
(10706, '37452', 'Sanchogomez', 37, 1),
(10707, '37452', 'Sanchogomez', 37, 1),
(10708, '37452', 'Sanchogomez', 37, 1),
(10709, '37453', 'Torrita, La', 37, 1),
(10710, '37453', 'Torrita, La', 37, 1),
(10711, '37453', 'Torrita, La', 37, 1),
(10712, '37454', 'Veguillas, Las', 37, 1),
(10713, '37458', 'Pedrosillo de los Aires', 37, 1),
(10714, '37460', 'Vilvis, Finca', 37, 1),
(10715, '37460', 'Vilvis, Finca', 37, 1),
(10716, '37460', 'Vilvis, Finca', 37, 1),
(10717, '37460', 'Vilvis, Finca', 37, 1),
(10718, '37465', 'Sagrada, La', 37, 1),
(10719, '37466', 'Sanchon De La Sagrada', 37, 1),
(10720, '37466', 'Sanchon De La Sagrada', 37, 1),
(10721, '37467', 'Sando', 37, 1),
(10722, '37468', 'Villasdardo', 37, 1),
(10723, '37468', 'Villasdardo', 37, 1),
(10724, '37468', 'Villasdardo', 37, 1),
(10725, '37468', 'Villasdardo', 37, 1),
(10726, '37470', 'Sancti Spiritus', 37, 1),
(10727, '37478', 'Mejorito, El', 37, 1),
(10728, '37478', 'Mejorito, El', 37, 1),
(10729, '37478', 'Mejorito, El', 37, 1),
(10730, '37479', 'Sancti-Sp', 37, 1),
(10731, '37479', 'Castillejo de Mart', 37, 1),
(10732, '37480', 'Fuentes De OÑoro', 37, 1),
(10733, '37481', 'Fuentes De OÑoro, Pueblo', 37, 1),
(10734, '37488', 'Villar Del Ciervo', 37, 1),
(10735, '37488', 'Villar Del Ciervo', 37, 1),
(10736, '37488', 'Villar Del Ciervo', 37, 1),
(10737, '37488', 'Villar Del Ciervo', 37, 1),
(10738, '37488', 'Villar Del Ciervo', 37, 1),
(10739, '37488', 'Villar Del Ciervo', 37, 1),
(10740, '37490', 'Pitiegua', 37, 1),
(10741, '37490', 'Pitiegua', 37, 1),
(10742, '37491', 'Tabera de Abajo', 37, 1),
(10743, '37491', 'Canillas de Abajo', 37, 1),
(10744, '37492', 'San Fernando', 37, 1),
(10745, '37493', 'Peramato', 37, 1),
(10746, '37493', 'Peramato', 37, 1),
(10747, '37493', 'Peramato', 37, 1),
(10748, '37494', 'Martin De Yeltes', 37, 1),
(10749, '37494', 'Martin De Yeltes', 37, 1),
(10750, '37495', 'Retortillo', 37, 1),
(10751, '37496', 'Sepulveda De Yeltes', 37, 1),
(10752, '37497', 'Villar De ArgaÑan', 37, 1),
(10753, '37497', 'Villar De ArgaÑan', 37, 1),
(10754, '37497', 'Villar De ArgaÑan', 37, 1),
(10755, '37497', 'Villar De ArgaÑan', 37, 1),
(10756, '37497', 'Villar De ArgaÑan', 37, 1),
(10757, '37497', 'Villar De ArgaÑan', 37, 1),
(10758, '37500', 'Poligono Industrial Las ViÑas', 37, 1),
(10759, '37510', 'Villarejo Agallas, Finca', 37, 1),
(10760, '37510', 'Villarejo Agallas, Finca', 37, 1),
(10761, '37510', 'Villarejo Agallas, Finca', 37, 1),
(10762, '37510', 'Villarejo Agallas, Finca', 37, 1),
(10763, '37510', 'Villarejo Agallas, Finca', 37, 1),
(10764, '37515', 'Encina, La', 37, 1),
(10765, '37516', 'Herguijuela De Ciudad Rodrigo', 37, 1),
(10766, '37520', 'Bodon, El', 37, 1),
(10767, '37521', 'Robleda', 37, 1),
(10768, '37522', 'Villasrubias', 37, 1),
(10769, '37523', 'PeÑaparda', 37, 1),
(10770, '37524', 'Payo, El', 37, 1),
(10771, '37530', 'Serradilla Del Llano', 37, 1),
(10772, '37531', 'Serradilla Del Arroyo', 37, 1),
(10773, '37532', 'Monsagro', 37, 1),
(10774, '37540', 'Fuenteguinaldo', 37, 1),
(10775, '37541', 'Casillas De Flores', 37, 1),
(10776, '37542', 'Navasfrias', 37, 1),
(10777, '37550', 'Campillo De Azaba', 37, 1),
(10778, '37551', 'Ituero De Azaba', 37, 1),
(10779, '37552', 'Castillejo De Azaba', 37, 1),
(10780, '37553', 'Puebla De Azaba', 37, 1),
(10781, '37554', 'Alamedilla, La', 37, 1),
(10782, '37555', 'Albergueria De ArgaÑan, La', 37, 1),
(10783, '37590', 'Morasverdes', 37, 1),
(10784, '37590', 'Morasverdes', 37, 1),
(10785, '37590', 'Morasverdes', 37, 1),
(10786, '37590', 'Morasverdes', 37, 1),
(10787, '37591', 'Zamarra', 37, 1),
(10788, '37591', 'Zamarra', 37, 1),
(10789, '37591', 'Zamarra', 37, 1),
(10790, '37591', 'Zamarra', 37, 1),
(10791, '37592', 'Saelices El Chico', 37, 1),
(10792, '37592', 'Saelices El Chico', 37, 1),
(10793, '37593', 'Bocacara', 37, 1),
(10794, '37594', 'Conejera, Poblado', 37, 1),
(10795, '37595', 'Pedrotoro', 37, 1),
(10796, '37600', 'Tamames', 37, 1),
(10797, '37606', 'Puebla De Yeltes', 37, 1),
(10798, '37607', 'Ventas De Garriel', 37, 1),
(10799, '37607', 'Ventas De Garriel', 37, 1),
(10800, '37607', 'Ventas De Garriel', 37, 1),
(10801, '37607', 'Ventas De Garriel', 37, 1),
(10802, '37608', 'Tamames', 37, 1),
(10803, '37609', 'Villar Del Profeta', 37, 1),
(10804, '37609', 'Villar Del Profeta', 37, 1),
(10805, '37609', 'Villar Del Profeta', 37, 1),
(10806, '37609', 'Villar Del Profeta', 37, 1),
(10807, '37609', 'Villar Del Profeta', 37, 1),
(10808, '37609', 'Villar Del Profeta', 37, 1),
(10809, '37610', 'Mogarras', 37, 1),
(10810, '37617', 'Rebollosa', 37, 1),
(10811, '37618', 'Monforte De La Sierra', 37, 1),
(10812, '37619', 'MadroÑal', 37, 1),
(10813, '37619', 'MadroÑal', 37, 1),
(10814, '37621', 'Zarzoso, El', 37, 1),
(10815, '37621', 'Zarzoso, El', 37, 1),
(10816, '37621', 'Zarzoso, El', 37, 1),
(10817, '37621', 'Zarzoso, El', 37, 1),
(10818, '37621', 'Zarzoso, El', 37, 1),
(10819, '37621', 'Zarzoso, El', 37, 1),
(10820, '37624', 'Alberca, La', 37, 1),
(10821, '37630', 'Cabrillas', 37, 1),
(10822, '37638', 'Sepulcro-hilario', 37, 1),
(10823, '37638', 'Sepulcro-hilario', 37, 1),
(10824, '37639', 'Aldehuela De Yeltes', 37, 1),
(10825, '37640', 'Abusejo', 37, 1),
(10826, '37640', 'Abusejo', 37, 1),
(10827, '37650', 'Sequeros', 37, 1),
(10828, '37656', 'Cepeda', 37, 1),
(10829, '37657', 'Sotoserrano', 37, 1),
(10830, '37658', 'Villanueva Del Conde', 37, 1),
(10831, '37658', 'Villanueva Del Conde', 37, 1),
(10832, '37659', 'San Miguel De Robledo', 37, 1),
(10833, '37659', 'San Miguel De Robledo', 37, 1),
(10834, '37659', 'San Miguel De Robledo', 37, 1),
(10835, '37659', 'San Miguel De Robledo', 37, 1),
(10836, '37660', 'Miranda Del CastaÑar', 37, 1),
(10837, '37670', 'SantibaÑez De La Sierra', 37, 1),
(10838, '37671', 'San Esteban De La Sierra', 37, 1),
(10839, '37680', 'Valdefuentes De Sangusin', 37, 1),
(10840, '37682', 'Santa Maria De Los Llanos', 37, 1),
(10841, '37683', 'Molinillo', 37, 1),
(10842, '37684', 'Cristobal', 37, 1),
(10843, '37690', 'Santa Olalla De Yeltes', 37, 1),
(10844, '37694', 'San Miguel del Robledo', 37, 1),
(10845, '37700', 'Palomares De Bejar', 37, 1),
(10846, '37700', 'Palomares De Bejar', 37, 1),
(10847, '37710', 'Candelario', 37, 1),
(10848, '37711', 'Colmenar De Montemayor', 37, 1),
(10849, '37712', 'Pinedas', 37, 1),
(10850, '37712', 'Pinedas', 37, 1),
(10851, '37713', 'Valdehijaderos', 37, 1),
(10852, '37714', 'Calzada De Bejar, La', 37, 1),
(10853, '37716', 'Vistahermosa (bejar)', 37, 1),
(10854, '37716', 'Vistahermosa (bejar)', 37, 1),
(10855, '37716', 'Vistahermosa (bejar)', 37, 1),
(10856, '37717', 'Vallejera De Riofrio', 37, 1),
(10857, '37717', 'Vallejera De Riofrio', 37, 1),
(10858, '37718', 'Valbuena', 37, 1),
(10859, '37720', 'Puerto De Bejar', 37, 1),
(10860, '37720', 'Puerto De Bejar', 37, 1),
(10861, '37724', 'Valdelamatanza', 37, 1),
(10862, '37724', 'Valdelamatanza', 37, 1),
(10863, '37724', 'Valdelamatanza', 37, 1),
(10864, '37726', 'El Cerro', 37, 1),
(10865, '37727', 'PeÑacaballera', 37, 1),
(10866, '37727', 'PeÑacaballera', 37, 1),
(10867, '37729', 'Puerto de B', 37, 1),
(10868, '37730', 'Ledrada', 37, 1),
(10869, '37740', 'SantibaÑez De Bejar', 37, 1),
(10870, '37748', 'Puente Del Congosto', 37, 1),
(10871, '37749', 'Tejado De Bejar, El', 37, 1),
(10872, '37749', 'Tejado De Bejar, El', 37, 1),
(10873, '37750', 'Cespedosa De Tormes', 37, 1),
(10874, '37750', 'Cespedosa De Tormes', 37, 1),
(10875, '37751', 'Gallegos De Solmiron', 37, 1),
(10876, '37752', 'Tala, La', 37, 1),
(10877, '37753', 'Navahombela', 37, 1),
(10878, '37754', 'IÑigo Blasco', 37, 1),
(10879, '37755', 'Armenteros', 37, 1),
(10880, '37756', 'Revalbos', 37, 1),
(10881, '37760', 'Linares De Riofrio', 37, 1),
(10882, '37762', 'Escurial De La Sierra', 37, 1),
(10883, '37762', 'Escurial De La Sierra', 37, 1),
(10884, '37762', 'Escurial De La Sierra', 37, 1),
(10885, '37763', 'San Miguel De Valero', 37, 1),
(10886, '37764', 'Valero', 37, 1),
(10887, '37765', 'Tornadizo, El', 37, 1),
(10888, '37765', 'Tornadizo, El', 37, 1),
(10889, '37765', 'Tornadizo, El', 37, 1),
(10890, '37766', 'Villar De Leche', 37, 1),
(10891, '37766', 'Villar De Leche', 37, 1),
(10892, '37766', 'Villar De Leche', 37, 1),
(10893, '37766', 'Villar De Leche', 37, 1),
(10894, '37767', 'Casafranca', 37, 1),
(10895, '37768', 'Santos, Los', 37, 1),
(10896, '37768', 'Santos, Los', 37, 1),
(10897, '37770', 'Guijuelo', 37, 1),
(10898, '37774', 'Guijo De Avila', 37, 1),
(10899, '37775', 'Fresnedoso', 37, 1),
(10900, '37776', 'Nava De Bejar', 37, 1),
(10901, '37777', 'Sorihuela', 37, 1),
(10902, '37777', 'Sorihuela', 37, 1),
(10903, '37778', 'Campillo De Salvatierra', 37, 1),
(10904, '37779', 'Salvatierra De Tormes', 37, 1),
(10905, '37779', 'Salvatierra De Tormes', 37, 1),
(10906, '37780', 'Maya, La', 37, 1),
(10907, '37785', 'Galinduste', 37, 1),
(10908, '37786', 'Martin Perez', 37, 1),
(10909, '37787', 'Pelayos', 37, 1),
(10910, '37788', 'Pedrosillo De Los Aires', 37, 1),
(10911, '37788', 'Pedrosillo De Los Aires', 37, 1),
(10912, '37789', 'Vaqueril, El', 37, 1),
(10913, '37789', 'Vaqueril, El', 37, 1),
(10914, '37789', 'Vaqueril, El', 37, 1),
(10915, '37790', 'Fuentes De Bejar', 37, 1),
(10916, '37791', 'Valverde De Valdelacasa', 37, 1),
(10917, '37791', 'Valverde De Valdelacasa', 37, 1),
(10918, '37791', 'Valverde De Valdelacasa', 37, 1),
(10919, '37791', 'Valverde De Valdelacasa', 37, 1),
(10920, '37792', 'Valdejerrus', 37, 1),
(10921, '37793', 'Fuentebuena', 37, 1),
(10922, '37793', 'Fuentebuena', 37, 1),
(10923, '37794', 'Sanchotello', 37, 1),
(10924, '37794', 'Sanchotello', 37, 1),
(10925, '37795', 'Pizarral', 37, 1),
(10926, '37795', 'Pizarral', 37, 1),
(10927, '37795', 'Pizarral', 37, 1),
(10928, '37795', 'Pizarral', 37, 1),
(10929, '37796', 'Torres, Las', 37, 1),
(10930, '37796', 'Torres, Las', 37, 1),
(10931, '37797', 'Castellanos De Villiquera, Pueblo', 37, 1),
(10932, '37797', 'Castellanos De Villiquera, Pueblo', 37, 1),
(10933, '37798', 'Viso, El, Urbanizacion', 37, 1),
(10934, '37798', 'Viso, El, Urbanizacion', 37, 1),
(10935, '37798', 'Viso, El, Urbanizacion', 37, 1),
(10936, '37798', 'Viso, El, Urbanizacion', 37, 1),
(10937, '37799', 'Zovisa, Finca', 37, 1),
(10938, '37799', 'Zovisa, Finca', 37, 1),
(10939, '37799', 'Zovisa, Finca', 37, 1),
(10940, '37799', 'Zovisa, Finca', 37, 1),
(10941, '37799', 'Zovisa, Finca', 37, 1),
(10942, '37799', 'Zovisa, Finca', 37, 1),
(10943, '37799', 'Zovisa, Finca', 37, 1),
(10944, '37800', 'Alba De Tormes', 37, 1),
(10945, '37810', 'Lurda, La', 37, 1),
(10946, '37820', 'PeÑarandilla', 37, 1),
(10947, '37830', 'Coca De Alba', 37, 1),
(10948, '37840', 'Tordillos', 37, 1),
(10949, '37850', 'Nava De Sotrobal', 37, 1),
(10950, '37860', 'Valverde De GonzaliaÑe', 37, 1),
(10951, '37861', 'Juarros', 37, 1),
(10952, '37862', 'Horcajo Medianero', 37, 1),
(10953, '37863', 'Anaya De Alba', 37, 1),
(10954, '37864', 'Herrezuelo', 37, 1),
(10955, '37865', 'Larrodrigo', 37, 1),
(10956, '37870', 'Aldeaseca De Alba', 37, 1),
(10957, '37871', 'Turra De Alba', 37, 1),
(10958, '37872', 'Gajates', 37, 1),
(10959, '37873', 'Valeros', 37, 1),
(10960, '37874', 'Pardo, El, Finca', 37, 1),
(10961, '37874', 'Pardo, El, Finca', 37, 1),
(10962, '37874', 'Pardo, El, Finca', 37, 1),
(10963, '37881', 'Valdecarros', 37, 1),
(10964, '37882', 'Terradillos', 37, 1),
(10965, '37882', 'Terradillos', 37, 1),
(10966, '37882', 'Terradillos', 37, 1),
(10967, '37890', 'Amatos De Alba', 37, 1),
(10968, '37891', 'Valdemierque', 37, 1),
(10969, '37891', 'Valdemierque', 37, 1),
(10970, '37891', 'Valdemierque', 37, 1),
(10971, '37891', 'Valdemierque', 37, 1),
(10972, '37891', 'Valdemierque', 37, 1),
(10973, '37892', 'Torrejon', 37, 1),
(10974, '37892', 'Torrejon', 37, 1),
(10975, '37892', 'Torrejon', 37, 1),
(10976, '37893', 'Villagonzalo De Tormes', 37, 1),
(10977, '37893', 'Villagonzalo De Tormes', 37, 1),
(10978, '37893', 'Villagonzalo De Tormes', 37, 1),
(10979, '37893', 'Villagonzalo De Tormes', 37, 1),
(10980, '37893', 'Villagonzalo De Tormes', 37, 1),
(10981, '37900', 'Santa Marta De Tormes', 37, 1),
(10982, '38001', 'Santa Cruz De Tenerife', 38, 1),
(10983, '38002', 'Santa Cruz De Tenerife', 38, 1),
(10984, '38003', 'Santa Cruz De Tenerife', 38, 1),
(10985, '38004', 'Santa Cruz De Tenerife', 38, 1),
(10986, '38005', 'Santa Cruz De Tenerife', 38, 1),
(10987, '38006', 'Santa Cruz De Tenerife', 38, 1),
(10988, '38007', 'Santa Cruz De Tenerife', 38, 1),
(10989, '38008', 'Santa Cruz De Tenerife', 38, 1),
(10990, '38009', 'Santa Cruz De Tenerife', 38, 1),
(10991, '38010', 'Santa Cruz De Tenerife', 38, 1),
(10992, '38107', 'Veredillas, Las', 38, 1),
(10993, '38108', 'San Cristobal De La Laguna', 38, 1),
(10994, '38108', 'San Cristobal De La Laguna', 38, 1),
(10995, '38109', 'San Isidro (el Rosario)', 38, 1),
(10996, '38110', 'Mayorazgo, El, Poligono Industrial', 38, 1),
(10997, '38111', 'San Cristobal De La Laguna', 38, 1),
(10998, '38120', 'San Andres (santa Cruz De Tenerife)', 38, 1),
(10999, '38129', 'Suculum, El', 38, 1),
(11000, '38130', 'Taganana', 38, 1),
(11001, '38139', 'Valle De Los Catalanes', 38, 1),
(11002, '38140', 'Igueste De San Andres', 38, 1),
(11003, '38150', 'Santa Cruz De Tenerife', 38, 1),
(11004, '38160', 'Valle Tahodio', 38, 1),
(11005, '38170', 'Santa Cruz De Tenerife', 38, 1),
(11006, '38180', 'Valle Crispin', 38, 1),
(11007, '38190', 'Tabaiba, Urbanizacion', 38, 1),
(11008, '38201', 'San Cristobal De La Laguna', 38, 1),
(11009, '38202', 'San Cristobal De La Laguna', 38, 1),
(11010, '38203', 'San Cristobal De La Laguna', 38, 1),
(11011, '38204', 'San Cristobal De La Laguna', 38, 1),
(11012, '38205', 'San Cristobal De La Laguna', 38, 1),
(11013, '38206', 'San Cristobal De La Laguna', 38, 1),
(11014, '38207', 'San Cristobal De La Laguna', 38, 1),
(11015, '38208', 'San Cristobal De La Laguna', 38, 1),
(11016, '38240', 'Punta Del Hidalgo', 38, 1),
(11017, '38250', 'Bajamar', 38, 1),
(11018, '38260', 'Tejina', 38, 1),
(11019, '38270', 'Valle Guerra', 38, 1),
(11020, '38280', 'Tegueste', 38, 1),
(11021, '38289', 'Tegueste', 38, 1),
(11022, '38290', 'Rosas, Las (esperanza, La)', 38, 1),
(11023, '38291', 'Mina', 38, 1),
(11024, '38292', 'Socorro, El (tegueste)', 38, 1),
(11025, '38293', 'San Cristobal De La Laguna', 38, 1),
(11026, '38293', 'San Cristobal De La Laguna', 38, 1),
(11027, '38294', 'Taborno', 38, 1),
(11028, '38294', 'Taborno', 38, 1),
(11029, '38296', 'San Cristobal De La Laguna', 38, 1),
(11030, '38297', 'Ortigal', 38, 1),
(11031, '38297', 'Ortigal', 38, 1),
(11032, '38300', 'Parque Nacional Teide', 38, 1),
(11033, '38310', 'Tres Pinos (aguamansa)', 38, 1),
(11034, '38311', 'Pino Alto', 38, 1),
(11035, '38312', 'San Jeronimo (la Orotava)', 38, 1),
(11036, '38313', 'Benijos', 38, 1),
(11037, '38314', 'San Bartolome (la Orotava)', 38, 1),
(11038, '38315', 'Perdoma, La', 38, 1),
(11039, '38320', 'San Cristobal De La Laguna', 38, 1),
(11040, '38320', 'San Cristobal De La Laguna', 38, 1),
(11041, '38329', 'San Cristobal De La Laguna', 38, 1),
(11042, '38330', 'Pulpito, El', 38, 1),
(11043, '38340', 'Naranjeros, Los', 38, 1),
(11044, '38350', 'Torreon, El', 38, 1),
(11045, '38355', 'Barranco De Las Lajas', 38, 1),
(11046, '38356', 'San Juan Perales', 38, 1),
(11047, '38357', 'Lomo Colorado', 38, 1),
(11048, '38358', 'Tagoro', 38, 1),
(11049, '38359', 'Valle Forestal, Urbanizacion', 38, 1),
(11050, '38360', 'Sauzal, El', 38, 1),
(11051, '38370', 'Matanza De Acentejo, La', 38, 1),
(11052, '38379', 'Vica, La', 38, 1),
(11053, '38380', 'Victoria De Acentejo, La', 38, 1),
(11054, '38389', 'Vera-carril, La', 38, 1),
(11055, '38390', 'Vera, La (santa Ursula)', 38, 1),
(11056, '38398', 'Tosca De Barrio', 38, 1),
(11057, '38399', 'Tamaide (santa Ursula)', 38, 1),
(11058, '38400', 'Puerto De La Cruz', 38, 1),
(11059, '38410', 'Realejos, Los', 38, 1),
(11060, '38412', 'Realejo Bajo', 38, 1),
(11061, '38413', 'Ferruja, La (realejos, Los)', 38, 1),
(11062, '38414', 'Icod El Alto', 38, 1),
(11063, '38415', 'Palo Blanco (los Realejos)', 38, 1),
(11064, '38416', 'Tigaiga', 38, 1),
(11065, '38417', 'Toscal, El (los Realejos)', 38, 1),
(11066, '38418', 'Longuera', 38, 1),
(11067, '38419', 'Zamora Alta', 38, 1),
(11068, '38420', 'San Juan De La Rambla', 38, 1),
(11069, '38428', 'San Jose', 38, 1),
(11070, '38429', 'Aguas, Las', 38, 1),
(11071, '38430', 'San Marcos, De, Playa', 38, 1),
(11072, '38434', 'Santa Barbara', 38, 1),
(11073, '38435', 'Tierra Del Trigo, La', 38, 1),
(11074, '38435', 'Tierra Del Trigo, La', 38, 1),
(11075, '38438', 'Reventon (icod)', 38, 1),
(11076, '38439', 'Vega, La', 38, 1),
(11077, '38440', 'Lomo Blanco (guancha, La)', 38, 1),
(11078, '38441', 'Tierra De Costa', 38, 1),
(11079, '38449', 'Sorriba, La', 38, 1),
(11080, '38450', 'Garachico', 38, 1),
(11081, '38458', 'Guincho, El (garachico)', 38, 1),
(11082, '38459', 'San Juan Del Reparo', 38, 1),
(11083, '38460', 'San Pedro De Daute', 38, 1),
(11084, '38460', 'San Pedro De Daute', 38, 1),
(11085, '38470', 'Silos, Los', 38, 1),
(11086, '38479', 'Sibora', 38, 1),
(11087, '38479', 'Sibora', 38, 1),
(11088, '38480', 'Buenavista Del Norte', 38, 1),
(11089, '38489', 'Teno', 38, 1),
(11090, '38500', 'Guimar', 38, 1),
(11091, '38508', 'Socorro, El (guimar)', 38, 1),
(11092, '38509', 'Viuda, La', 38, 1),
(11093, '38509', 'Viuda, La', 38, 1),
(11094, '38509', 'Viuda, La', 38, 1),
(11095, '38510', 'Barranco Hondo', 38, 1),
(11096, '38510', 'Barranco Hondo', 38, 1),
(11097, '38520', 'Igueste De Candelaria', 38, 1),
(11098, '38530', 'Candelaria', 38, 1),
(11099, '38540', 'Malpais (araya)', 38, 1),
(11100, '38550', 'Hidalga, La', 38, 1),
(11101, '38560', 'Punta Prieta', 38, 1),
(11102, '38570', 'Roque, Los (fasnia)', 38, 1),
(11103, '38579', 'Zarza, La', 38, 1),
(11104, '38580', 'Villa De Arico', 38, 1),
(11105, '38588', 'San Miguel De Tajao', 38, 1),
(11106, '38589', 'Teguedite', 38, 1),
(11107, '38590', 'Lomo De Mena', 38, 1),
(11108, '38591', 'Tablado, El', 38, 1),
(11109, '38592', 'Icor', 38, 1),
(11110, '38593', 'Rio De Arico, El', 38, 1),
(11111, '38594', 'Vegas, Las (granadilla)', 38, 1),
(11112, '38595', 'ChiÑama', 38, 1),
(11113, '38600', 'Granadilla', 38, 1),
(11114, '38611', 'Vistas De Yaco', 38, 1),
(11115, '38612', 'Medano, El', 38, 1),
(11116, '38613', 'Vilaflor', 38, 1),
(11117, '38614', 'Escalona, La', 38, 1),
(11118, '38615', 'Trevejos', 38, 1),
(11119, '38615', 'Trevejos', 38, 1),
(11120, '38616', 'Vicacaro', 38, 1),
(11121, '38617', 'Yaco', 38, 1),
(11122, '38618', 'Abrigos, Los', 38, 1),
(11123, '38620', 'San Miguel De Abona', 38, 1),
(11124, '38626', 'Valle De San Lorenzo', 38, 1),
(11125, '38627', 'Camella, La', 38, 1),
(11126, '38628', 'Zocas, Las', 38, 1),
(11127, '38629', 'Roque, El', 38, 1),
(11128, '38629', 'Roque, El', 38, 1),
(11129, '38630', 'Ten-bel, Urbanizacion', 38, 1),
(11130, '38631', 'Rosas, Las (las Galletas)', 38, 1),
(11131, '38632', 'Reina, La, Parque', 38, 1),
(11132, '38639', 'Guincho, El (san Miguel)', 38, 1),
(11133, '38639', 'Guincho, El (san Miguel)', 38, 1),
(11134, '38639', 'Guincho, El (san Miguel)', 38, 1),
(11135, '38640', 'Arona', 38, 1),
(11136, '38649', 'Vento', 38, 1),
(11137, '38650', 'Playa De Los Cristianos', 38, 1),
(11138, '38652', 'Chayofa', 38, 1),
(11139, '38660', 'Costa Adeje-san Eugenio', 38, 1),
(11140, '38660', 'Costa Adeje-san Eugenio', 38, 1),
(11141, '38670', 'Torres, Las', 38, 1),
(11142, '38677', 'Tijoco Bajo', 38, 1),
(11143, '38678', 'Puertito De Adeje, El', 38, 1),
(11144, '38679', 'FaÑabe', 38, 1),
(11145, '38680', 'Vera De Erques', 38, 1),
(11146, '38683', 'Puerto Santiago-los Gigantes', 38, 1),
(11147, '38684', 'Tamaimo (santiago Del Teide)', 38, 1),
(11148, '38685', 'Tejina De Isora', 38, 1),
(11149, '38686', 'Alcala', 38, 1),
(11150, '38687', 'Varadero, El', 38, 1),
(11151, '38688', 'Pozo, El (guia De Isora)', 38, 1),
(11152, '38689', 'Chio', 38, 1),
(11153, '38690', 'Valle De Arriba', 38, 1),
(11154, '38700', 'Santa Cruz De La Palma', 38, 1),
(11155, '38710', 'BreÑa Alta', 38, 1),
(11156, '38711', 'San Antonio De BreÑa', 38, 1),
(11157, '38712', 'Somacal, Carretera', 38, 1),
(11158, '38712', 'Somacal, Carretera', 38, 1),
(11159, '38712', 'Somacal, Carretera', 38, 1),
(11160, '38713', 'Tierritas, Las', 38, 1),
(11161, '38713', 'Tierritas, Las', 38, 1),
(11162, '38714', 'San Bartolome (puntallana)', 38, 1),
(11163, '38714', 'San Bartolome (puntallana)', 38, 1),
(11164, '38715', 'Toscas, Las (santa Cruz De La Palma)', 38, 1),
(11165, '38715', 'Toscas, Las (santa Cruz De La Palma)', 38, 1),
(11166, '38720', 'San Andres Y Sauces', 38, 1),
(11167, '38726', 'Paredes, Las', 38, 1),
(11168, '38727', 'Tosca, La (barlovento)', 38, 1),
(11169, '38728', 'Roque Faro', 38, 1),
(11170, '38729', 'Verada De Lomadas', 38, 1),
(11171, '38730', 'Mazo', 38, 1),
(11172, '38738', 'Tiguerorte', 38, 1),
(11173, '38739', 'Rosa, La (mazo)', 38, 1),
(11174, '38740', 'Fuencaliente', 38, 1),
(11175, '38749', 'Quemados, Los (fuencaliente)', 38, 1),
(11176, '38750', 'Paso, El', 38, 1),
(11177, '38758', 'Tacande De Arriba (el Paso)', 38, 1),
(11178, '38759', 'Tacande Abajo (el Paso)', 38, 1),
(11179, '38759', 'Tacande Abajo (el Paso)', 38, 1),
(11180, '38760', 'Retamar (los Llanos)', 38, 1),
(11181, '38767', 'Triana', 38, 1),
(11182, '38768', 'Pedregales, Los', 38, 1),
(11183, '38768', 'Pedregales, Los', 38, 1),
(11184, '38769', 'Todoque', 38, 1),
(11185, '38769', 'Todoque', 38, 1),
(11186, '38770', 'Tazacorte', 38, 1),
(11187, '38779', 'San Borondon', 38, 1),
(11188, '38780', 'Tinizara', 38, 1),
(11189, '38787', 'Garafia', 38, 1),
(11190, '38788', 'Tricias, Las', 38, 1),
(11191, '38789', 'Roque, El (puntagorda)', 38, 1),
(11192, '38789', 'Roque, El (puntagorda)', 38, 1),
(11193, '38800', 'San Sebastian Gomera', 38, 1),
(11194, '38801', 'San Antonio Y Pilar', 38, 1),
(11195, '38810', 'Santiago, De, Playa', 38, 1),
(11196, '38811', 'Vegaipala', 38, 1),
(11197, '38811', 'Vegaipala', 38, 1),
(11198, '38812', 'Quise', 38, 1),
(11199, '38813', 'Targa', 38, 1),
(11200, '38820', 'Tabaibal, El', 38, 1),
(11201, '38829', 'Poyatas, Las', 38, 1),
(11202, '38830', 'Lepe', 38, 1),
(11203, '38840', 'Vallehermoso', 38, 1),
(11204, '38849', 'Rosa De Las Piedras', 38, 1),
(11205, '38850', 'Arguamul', 38, 1),
(11206, '38852', 'Tazo', 38, 1),
(11207, '38852', 'Tazo', 38, 1),
(11208, '38860', 'Rajita, La', 38, 1),
(11209, '38869', 'Temocoda', 38, 1),
(11210, '38869', 'Temocoda', 38, 1),
(11211, '38870', 'Vueltas', 38, 1),
(11212, '38879', 'Vizcaina, La (valle Gran Rey)', 38, 1),
(11213, '38890', 'Vega, La (agulo)', 38, 1),
(11214, '38890', 'Vega, La (agulo)', 38, 1),
(11215, '38891', 'Valle Abajo', 38, 1),
(11216, '38892', 'Hayas, Las', 38, 1),
(11217, '38900', 'Valverde Del Hierro', 38, 1),
(11218, '38910', 'Temijiraque', 38, 1),
(11219, '38911', 'Puntas, Las (v. Hierro)', 38, 1),
(11220, '38912', 'Sabinosa', 38, 1),
(11221, '38913', 'Tigaday', 38, 1),
(11222, '38914', 'Taibique', 38, 1),
(11223, '38915', 'TiÑor', 38, 1),
(11224, '38916', 'Mocanal', 38, 1),
(11225, '38917', 'Restinga, La', 38, 1),
(11226, '39001', 'Santander', 39, 1),
(11227, '39002', 'Santander', 39, 1),
(11228, '39003', 'Santander', 39, 1),
(11229, '39004', 'Santander', 39, 1),
(11230, '39005', 'Santander', 39, 1),
(11231, '39006', 'Santander', 39, 1),
(11232, '39007', 'Santander', 39, 1),
(11233, '39008', 'Santander', 39, 1),
(11234, '39009', 'Santander', 39, 1),
(11235, '39010', 'Santander', 39, 1),
(11236, '39011', 'Santander', 39, 1),
(11237, '39012', 'Santander', 39, 1),
(11238, '39100', 'Santa Cruz De Bezana', 39, 1),
(11239, '39108', 'Prezanes', 39, 1),
(11240, '39110', 'Soto De La Marina', 39, 1),
(11241, '39120', 'Mortera', 39, 1),
(11242, '39130', 'PedreÑa', 39, 1),
(11243, '39140', 'Somo', 39, 1),
(11244, '39146', 'Ribamont', 39, 1),
(11245, '39150', 'Suesa', 39, 1),
(11246, '39160', 'Loredo', 39, 1),
(11247, '39170', 'Bareyo', 39, 1),
(11248, '39180', 'Noja', 39, 1),
(11249, '39190', 'Bareyo', 39, 1),
(11250, '39191', 'Guemes', 39, 1),
(11251, '39192', 'San Miguel De Meruelo', 39, 1),
(11252, '39193', 'Soano', 39, 1),
(11253, '39193', 'Soano', 39, 1),
(11254, '39195', 'Isla Playa', 39, 1),
(11255, '39197', 'Santiuste', 39, 1),
(11256, '39197', 'Santiuste', 39, 1),
(11257, '39200', 'Reinosa', 39, 1),
(11258, '39200', 'Reinosa', 39, 1),
(11259, '39210', 'Villar', 39, 1),
(11260, '39211', 'Hermandad de Campoo de Suso', 39, 1),
(11261, '39212', 'Serna, La (campoo De Suso)', 39, 1),
(11262, '39212', 'Serna, La (campoo De Suso)', 39, 1),
(11263, '39213', 'Villanueva (rozas Valdearroyo)', 39, 1),
(11264, '39213', 'Villanueva (rozas Valdearroyo)', 39, 1),
(11265, '39220', 'Salcedo (valderredible)', 39, 1),
(11266, '39229', 'Valderredible', 39, 1),
(11267, '39230', 'Serna, La (valderredible)', 39, 1),
(11268, '39232', 'Villota De Elines', 39, 1),
(11269, '39248', 'Valdeprado del R', 39, 1),
(11270, '39250', 'Villanueva De La Nia', 39, 1),
(11271, '39290', 'Campoo de Yuso', 39, 1),
(11272, '39291', 'Campoo de Enmedio', 39, 1),
(11273, '39291', 'Campoo de Yuso', 39, 1),
(11274, '39292', 'Villasuso (campoo De Yuso)', 39, 1),
(11275, '39293', 'Campoo de Yuso', 39, 1),
(11276, '39294', 'Riva De Yuso, La', 39, 1),
(11277, '39300', 'Torres', 39, 1),
(11278, '39310', 'Mogro', 39, 1),
(11279, '39311', 'Sierra Elsa', 39, 1),
(11280, '39312', 'SoÑa', 39, 1),
(11281, '39312', 'SoÑa', 39, 1),
(11282, '39313', 'Rinconeda', 39, 1),
(11283, '39314', 'Viveda', 39, 1),
(11284, '39315', 'Viernoles', 39, 1),
(11285, '39316', 'Torrelavega', 39, 1),
(11286, '39317', 'Torrelavega', 39, 1),
(11287, '39318', 'Mar', 39, 1),
(11288, '39320', 'Cobreces', 39, 1),
(11289, '39329', 'ToÑanes', 39, 1),
(11290, '39330', 'Santillana Del Mar', 39, 1),
(11291, '39340', 'Suances', 39, 1),
(11292, '39350', 'Puente Avios', 39, 1),
(11293, '39360', 'Yuso', 39, 1),
(11294, '39360', 'Yuso', 39, 1),
(11295, '39390', 'Santillana del Mar', 39, 1),
(11296, '39400', 'Somahoz', 39, 1),
(11297, '39407', 'Villayuso De Cieza', 39, 1),
(11298, '39408', 'Coo', 39, 1),
(11299, '39409', 'Tarriba (san Felices)', 39, 1),
(11300, '39410', 'Mataporquera', 39, 1),
(11301, '39416', 'Las Rozas de Valdearroyo', 39, 1),
(11302, '39417', 'Montesclaros', 39, 1),
(11303, '39417', 'Montesclaros', 39, 1),
(11304, '39418', 'Santa Olalla (valdeolea)', 39, 1),
(11305, '39419', 'Valdeprado Del Rio', 39, 1),
(11306, '39419', 'Valdeprado Del Rio', 39, 1),
(11307, '39420', 'Pujayo', 39, 1),
(11308, '39420', 'Pujayo', 39, 1),
(11309, '39430', 'Santa Olalla (molledo)', 39, 1),
(11310, '39438', 'Vallejo (molledo)', 39, 1),
(11311, '39439', 'Molledo', 39, 1),
(11312, '39450', 'Serna, La (iguÑa)', 39, 1),
(11313, '39451', 'Villasuso De Anievas', 39, 1),
(11314, '39451', 'Villasuso De Anievas', 39, 1),
(11315, '39460', 'Yermo', 39, 1),
(11316, '39460', 'Yermo', 39, 1),
(11317, '39470', 'Renedo De Pielagos', 39, 1),
(11318, '39477', 'Quijano De Pielagos', 39, 1),
(11319, '39478', 'Boo De Pielagos', 39, 1),
(11320, '39479', 'Zurita', 39, 1),
(11321, '39490', 'Somballe', 39, 1),
(11322, '39491', 'Ventorrillo', 39, 1),
(11323, '39491', 'Ventorrillo', 39, 1),
(11324, '39491', 'Ventorrillo', 39, 1),
(11325, '39491', 'Ventorrillo', 39, 1),
(11326, '39500', 'Vernejo', 39, 1),
(11327, '39506', 'Cabez', 39, 1),
(11328, '39507', 'Virgen La (udias)', 39, 1),
(11329, '39507', 'Virgen La (udias)', 39, 1),
(11330, '39509', 'Virgen De La PeÑa', 39, 1),
(11331, '39509', 'Virgen De La PeÑa', 39, 1),
(11332, '39510', 'Valle De Cabuerniga', 39, 1),
(11333, '39510', 'Valle De Cabuerniga', 39, 1),
(11334, '39511', 'ViaÑa (cabuerniga)', 39, 1),
(11335, '39513', 'Ucieda', 39, 1);
INSERT INTO `lnx_poblaciones` (`id`, `cp`, `poblacion`, `idprov`, `idpais`) VALUES
(11336, '39517', 'Tojo, El', 39, 1),
(11337, '39518', 'Tojos, Los', 39, 1),
(11338, '39518', 'Tojos, Los', 39, 1),
(11339, '39520', 'Seminario Pontificio', 39, 1),
(11340, '39525', 'Viallan', 39, 1),
(11341, '39526', 'Novales', 39, 1),
(11342, '39527', 'Trasierra', 39, 1),
(11343, '39528', 'Trasvia', 39, 1),
(11344, '39528', 'Trasvia', 39, 1),
(11345, '39530', 'Puente San Miguel', 39, 1),
(11346, '39530', 'Puente San Miguel', 39, 1),
(11347, '39538', 'Veguilla, La', 39, 1),
(11348, '39539', 'Villapresente', 39, 1),
(11349, '39539', 'Villapresente', 39, 1),
(11350, '39540', 'San Vicente De La Barquera', 39, 1),
(11351, '39547', 'Revilla, La (san Vicente De La Barquera)', 39, 1),
(11352, '39548', 'Tanagos, Los', 39, 1),
(11353, '39548', 'Tanagos, Los', 39, 1),
(11354, '39549', 'Serdio', 39, 1),
(11355, '39549', 'Serdio', 39, 1),
(11356, '39549', 'Serdio', 39, 1),
(11357, '39550', 'Venta, La (lamason)', 39, 1),
(11358, '39550', 'Venta, La (lamason)', 39, 1),
(11359, '39551', 'Casamaria', 39, 1),
(11360, '39553', 'Riclones', 39, 1),
(11361, '39554', 'San Sebastian De Garabandal', 39, 1),
(11362, '39555', 'Tudanca', 39, 1),
(11363, '39556', 'Uznayo', 39, 1),
(11364, '39557', 'Tresabuela', 39, 1),
(11365, '39558', 'Carmona', 39, 1),
(11366, '39559', 'Rozadio', 39, 1),
(11367, '39560', 'Unquera', 39, 1),
(11368, '39569', 'San Pedro De Las Baheras', 39, 1),
(11369, '39570', 'Santo Toribio', 39, 1),
(11370, '39571', 'Torices', 39, 1),
(11371, '39572', 'Vendejo', 39, 1),
(11372, '39573', 'San Andres (cabezon Liebana)', 39, 1),
(11373, '39574', 'Valdeprado', 39, 1),
(11374, '39574', 'Valdeprado', 39, 1),
(11375, '39575', 'Valmeo', 39, 1),
(11376, '39577', 'Villaverde (vega De Liebana)', 39, 1),
(11377, '39580', 'Roza (peÑarrubia)', 39, 1),
(11378, '39580', 'Roza (peÑarrubia)', 39, 1),
(11379, '39580', 'Roza (peÑarrubia)', 39, 1),
(11380, '39582', 'TreviÑo', 39, 1),
(11381, '39583', 'Trillayo', 39, 1),
(11382, '39584', 'ViÑon', 39, 1),
(11383, '39585', 'Cillorigo de Li', 39, 1),
(11384, '39586', 'Turieno', 39, 1),
(11385, '39587', 'Vallejo (camaleno)', 39, 1),
(11386, '39588', 'Pido', 39, 1),
(11388, '39590', 'Valles', 39, 1),
(11389, '39590', 'Valles', 39, 1),
(11390, '39591', 'San Esteban (casar De Periedo)', 39, 1),
(11391, '39591', 'San Esteban (casar De Periedo)', 39, 1),
(11392, '39592', 'Turujal, El', 39, 1),
(11393, '39592', 'Turujal, El', 39, 1),
(11394, '39592', 'Turujal, El', 39, 1),
(11395, '39593', 'Venta, La (valdaliga)', 39, 1),
(11396, '39594', 'Pechon', 39, 1),
(11397, '39594', 'Pechon', 39, 1),
(11398, '39600', 'Revilla De Camargo', 39, 1),
(11399, '39608', 'Igollo De Camargo', 39, 1),
(11400, '39609', 'Escobedo De Camargo', 39, 1),
(11401, '39610', 'Astillero', 39, 1),
(11402, '39611', 'Guarnizo', 39, 1),
(11403, '39612', 'Riosapero', 39, 1),
(11404, '39613', 'Boo De Guarnizo', 39, 1),
(11405, '39618', 'Pontejos', 39, 1),
(11406, '39619', 'Santiago De Heras', 39, 1),
(11407, '39620', 'Saron', 39, 1),
(11408, '39626', 'San Roman De Cayon', 39, 1),
(11409, '39627', 'Sobarzo (penagos)', 39, 1),
(11410, '39627', 'Sobarzo (penagos)', 39, 1),
(11411, '39630', 'Vega (villafufre)', 39, 1),
(11412, '39638', 'Villafufre', 39, 1),
(11413, '39639', 'Saro', 39, 1),
(11414, '39639', 'Saro', 39, 1),
(11415, '39640', 'Villacarriedo', 39, 1),
(11416, '39649', 'Tezanos', 39, 1),
(11417, '39650', 'Penilla, La De Cayon', 39, 1),
(11418, '39650', 'Penilla, La De Cayon', 39, 1),
(11419, '39660', 'VillabaÑez', 39, 1),
(11420, '39670', 'Puente Viesgo', 39, 1),
(11421, '39679', 'Vargas', 39, 1),
(11422, '39680', 'Ontaneda', 39, 1),
(11423, '39682', 'Vega Escobosa', 39, 1),
(11424, '39682', 'Vega Escobosa', 39, 1),
(11425, '39682', 'Vega Escobosa', 39, 1),
(11426, '39683', 'Aldano', 39, 1),
(11427, '39683', 'Aldano', 39, 1),
(11428, '39685', 'Yera', 39, 1),
(11429, '39686', 'Vegalosvados', 39, 1),
(11430, '39687', 'Selviejo', 39, 1),
(11431, '39688', 'Vozpornoche', 39, 1),
(11432, '39689', 'Vejoris', 39, 1),
(11433, '39691', 'Penilla (toranzo)', 39, 1),
(11434, '39694', 'Totero', 39, 1),
(11435, '39696', 'Selaya', 39, 1),
(11436, '39697', 'Prases', 39, 1),
(11437, '39698', 'Villasevil', 39, 1),
(11438, '39699', 'Villegar', 39, 1),
(11439, '39700', 'Castro Urdiales', 39, 1),
(11440, '39706', 'Santullan', 39, 1),
(11441, '39707', 'Talledo', 39, 1),
(11442, '39708', 'Castro-Urdiales', 39, 1),
(11443, '39709', 'Samano', 39, 1),
(11444, '39710', 'Solares', 39, 1),
(11445, '39715', 'Navajeda', 39, 1),
(11446, '39716', 'Santa Marina (entrambasaguas)', 39, 1),
(11447, '39717', 'Sol', 39, 1),
(11448, '39718', 'Tarriba (lierganes)', 39, 1),
(11449, '39718', 'Tarriba (lierganes)', 39, 1),
(11450, '39719', 'Setien', 39, 1),
(11451, '39719', 'Setien', 39, 1),
(11452, '39720', 'Rucandio (riotuerto)', 39, 1),
(11453, '39722', 'Lierganes', 39, 1),
(11454, '39723', 'Vega, La (miera)', 39, 1),
(11455, '39723', 'Vega, La (miera)', 39, 1),
(11456, '39724', 'Valdecilla', 39, 1),
(11457, '39725', 'Miera', 39, 1),
(11458, '39726', 'San Roque de Riomiera', 39, 1),
(11459, '39727', 'Vega, La (lierganes)', 39, 1),
(11460, '39728', 'Valdicio', 39, 1),
(11461, '39728', 'Valdicio', 39, 1),
(11462, '39728', 'Valdicio', 39, 1),
(11463, '39728', 'Valdicio', 39, 1),
(11464, '39730', 'Praves', 39, 1),
(11465, '39738', 'Solorzano', 39, 1),
(11466, '39738', 'Solorzano', 39, 1),
(11467, '39739', 'Hazas de Cesto', 39, 1),
(11468, '39740', 'SantoÑa', 39, 1),
(11469, '39749', 'Dueso', 39, 1),
(11470, '39750', 'Colindres', 39, 1),
(11471, '39760', 'Treto', 39, 1),
(11472, '39761', 'Vidular', 39, 1),
(11473, '39761', 'Vidular', 39, 1),
(11474, '39762', 'Padierniga', 39, 1),
(11475, '39764', 'Secadura', 39, 1),
(11476, '39766', 'San Pantaleon De Aras', 39, 1),
(11477, '39770', 'Villante', 39, 1),
(11478, '39776', 'Villaviad', 39, 1),
(11479, '39777', 'Tarrueza', 39, 1),
(11480, '39778', 'SeÑa', 39, 1),
(11481, '39778', 'SeÑa', 39, 1),
(11482, '39780', 'Guriezo', 39, 1),
(11483, '39780', 'Castro-Urdiales', 39, 1),
(11484, '39786', 'Guriezo', 39, 1),
(11485, '39787', 'Guriezo', 39, 1),
(11486, '39788', 'Tresagua', 39, 1),
(11487, '39790', 'Via, La', 39, 1),
(11488, '39791', 'Tuebre', 39, 1),
(11489, '39791', 'Tuebre', 39, 1),
(11490, '39792', 'Heras', 39, 1),
(11491, '39792', 'Heras', 39, 1),
(11492, '39793', 'Villaverde De Pontones', 39, 1),
(11493, '39794', 'Hoz De Anero', 39, 1),
(11494, '39795', 'Noval (escalante)', 39, 1),
(11495, '39796', 'B', 39, 1),
(11496, '39798', 'Sonabia', 39, 1),
(11497, '39800', 'Veares', 39, 1),
(11498, '39805', 'Prado, El', 39, 1),
(11499, '39805', 'Prado, El', 39, 1),
(11500, '39806', 'Villaverde De Soba', 39, 1),
(11501, '39807', 'Soba', 39, 1),
(11502, '39808', 'Veguilla De Soba', 39, 1),
(11503, '39809', 'Valles, Los', 39, 1),
(11504, '39811', 'Ramales de la Victoria', 39, 1),
(11505, '39812', 'Sierra Alcomba', 39, 1),
(11506, '39813', 'Val De Ason', 39, 1),
(11507, '39813', 'Val De Ason', 39, 1),
(11508, '39815', 'Valle De Ruesga', 39, 1),
(11509, '39815', 'Valle De Ruesga', 39, 1),
(11510, '39820', 'Limpias', 39, 1),
(11511, '39840', 'Ampuero', 39, 1),
(11512, '39849', 'Tabernilla', 39, 1),
(11513, '39850', 'Vear De Udalla', 39, 1),
(11514, '39860', 'Villaparte', 39, 1),
(11515, '39880', 'Villanueva (valle De Villaverde)', 39, 1),
(11516, '39880', 'Villanueva (valle De Villaverde)', 39, 1),
(11517, '40001', 'Segovia', 40, 1),
(11518, '40002', 'Segovia', 40, 1),
(11519, '40003', 'Segovia', 40, 1),
(11520, '40004', 'Segovia', 40, 1),
(11521, '40005', 'Segovia', 40, 1),
(11522, '40006', 'Segovia', 40, 1),
(11523, '40100', 'San Ildefonso O La Granja', 40, 1),
(11524, '40109', 'Valsain', 40, 1),
(11525, '40120', 'Garcillan', 40, 1),
(11526, '40121', 'Anaya', 40, 1),
(11527, '40122', 'Tabladillo', 40, 1),
(11528, '40123', 'Paradinas', 40, 1),
(11529, '40130', 'Martin Miguel', 40, 1),
(11530, '40131', 'Juarros de Riomoros', 40, 1),
(11531, '40132', 'Marazoleja', 40, 1),
(11532, '40133', 'Marazuela', 40, 1),
(11533, '40134', 'Sangarcia', 40, 1),
(11534, '40135', 'Santovenia', 40, 1),
(11535, '40136', 'Ochando', 40, 1),
(11536, '40140', 'Valverde Del Majano', 40, 1),
(11537, '40141', 'Abades', 40, 1),
(11538, '40141', 'Abades', 40, 1),
(11539, '40142', 'Monterrubio', 40, 1),
(11540, '40142', 'Monterrubio', 40, 1),
(11541, '40142', 'Monterrubio', 40, 1),
(11542, '40144', 'Cobos De Segovia', 40, 1),
(11543, '40144', 'Cobos De Segovia', 40, 1),
(11544, '40145', 'MuÑopedro', 40, 1),
(11545, '40146', 'Labajos', 40, 1),
(11546, '40150', 'Villacastin', 40, 1),
(11547, '40151', 'Ituero Y Lama', 40, 1),
(11548, '40152', 'Zarzuela Del Monte', 40, 1),
(11549, '40153', 'Fuentemilanos', 40, 1),
(11550, '40154', 'Torredondo', 40, 1),
(11551, '40156', 'Fresno de Cantespino', 40, 1),
(11552, '40160', 'Torrecaballeros', 40, 1),
(11553, '40161', 'Navafria', 40, 1),
(11554, '40162', 'Martincano', 40, 1),
(11555, '40162', 'Martincano', 40, 1),
(11556, '40163', 'Matamala', 40, 1),
(11557, '40164', 'Huerta', 40, 1),
(11558, '40165', 'Ventosilla', 40, 1),
(11559, '40165', 'Ventosilla', 40, 1),
(11560, '40170', 'Sotosalbos', 40, 1),
(11561, '40170', 'Sotosalbos', 40, 1),
(11562, '40170', 'Sotosalbos', 40, 1),
(11563, '40171', 'Valle De San Pedro', 40, 1),
(11564, '40171', 'Valle De San Pedro', 40, 1),
(11565, '40172', 'Rades De Abajo', 40, 1),
(11566, '40173', 'Velilla, La', 40, 1),
(11567, '40173', 'Velilla, La', 40, 1),
(11568, '40173', 'Velilla, La', 40, 1),
(11569, '40174', 'Valleruela De Pedraza', 40, 1),
(11570, '40175', 'Matilla, La', 40, 1),
(11571, '40176', 'Valleruela De Sepulveda', 40, 1),
(11572, '40176', 'Valleruela De Sepulveda', 40, 1),
(11573, '40180', 'Tenzuela', 40, 1),
(11574, '40180', 'Tenzuela', 40, 1),
(11575, '40180', 'Tenzuela', 40, 1),
(11576, '40180', 'Tenzuela', 40, 1),
(11577, '40181', 'Cuesta, La', 40, 1),
(11578, '40182', 'Caballar', 40, 1),
(11579, '40183', 'MuÑoveros', 40, 1),
(11580, '40184', 'Rebollo', 40, 1),
(11581, '40184', 'Rebollo', 40, 1),
(11582, '40184', 'Rebollo', 40, 1),
(11583, '40185', 'Valdevacas Y Guijar', 40, 1),
(11584, '40185', 'Valdevacas Y Guijar', 40, 1),
(11585, '40185', 'Valdevacas Y Guijar', 40, 1),
(11586, '40185', 'Valdevacas Y Guijar', 40, 1),
(11587, '40190', 'Bernuy De Porreros', 40, 1),
(11588, '40191', 'Tizneros', 40, 1),
(11589, '40191', 'Tizneros', 40, 1),
(11590, '40192', 'Torreiglesias', 40, 1),
(11591, '40192', 'Torreiglesias', 40, 1),
(11592, '40194', 'Trescasas', 40, 1),
(11593, '40194', 'Trescasas', 40, 1),
(11594, '40195', 'Revenga', 40, 1),
(11595, '40196', 'Zamarramala', 40, 1),
(11596, '40196', 'Zamarramala', 40, 1),
(11597, '40197', 'San Cristobal De Segovia', 40, 1),
(11598, '40200', 'Cuellar', 40, 1),
(11599, '40210', 'Escarabajosa De Cuellar', 40, 1),
(11600, '40211', 'Torregutierrez', 40, 1),
(11601, '40212', 'San Cristobal De Cuellar', 40, 1),
(11602, '40213', 'Vallelado', 40, 1),
(11603, '40214', 'Mata De Cuellar', 40, 1),
(11604, '40214', 'Mata De Cuellar', 40, 1),
(11605, '40215', 'Arroyo De Cuellar', 40, 1),
(11606, '40216', 'Remondo', 40, 1),
(11607, '40216', 'Remondo', 40, 1),
(11608, '40217', 'Fresneda De Cuellar', 40, 1),
(11609, '40218', 'Fuente El Olmo De Iscar', 40, 1),
(11610, '40219', 'Villaverde De Iscar', 40, 1),
(11611, '40220', 'Vegafria', 40, 1),
(11612, '40230', 'Dehesa Mayor', 40, 1),
(11613, '40231', 'Lovingos', 40, 1),
(11614, '40232', 'Fuentes De Cuellar', 40, 1),
(11615, '40233', 'Moraleja De Cuellar', 40, 1),
(11616, '40234', 'Membibre De La Hoz', 40, 1),
(11617, '40235', 'AldeasoÑa', 40, 1),
(11618, '40236', 'Vivar De FuentidueÑa', 40, 1),
(11619, '40237', 'Sacramenia', 40, 1),
(11620, '40238', 'San Jose De Valtiendas', 40, 1),
(11621, '40239', 'Cuevas De Provanco', 40, 1),
(11622, '40240', 'Gomezserracin', 40, 1),
(11623, '40241', 'Chatun', 40, 1),
(11624, '40242', 'Campo De Cuellar', 40, 1),
(11625, '40250', 'Mozoncillo', 40, 1),
(11626, '40260', 'Fuentepelayo', 40, 1),
(11627, '40270', 'Carbonero El Mayor', 40, 1),
(11628, '40280', 'Navalmanzano', 40, 1),
(11629, '40290', 'Roda De Eresma', 40, 1),
(11630, '40291', 'Tabanera La Luenga', 40, 1),
(11631, '40291', 'Tabanera La Luenga', 40, 1),
(11632, '40292', 'Aldea Real', 40, 1),
(11633, '40293', 'Zarzuela Del Pinar', 40, 1),
(11634, '40294', 'Pinarnegrillo', 40, 1),
(11635, '40295', 'San Martin Y Mudrian', 40, 1),
(11636, '40296', 'Pinarejos', 40, 1),
(11637, '40297', 'SanchonuÑo', 40, 1),
(11638, '40298', 'Frumales', 40, 1),
(11639, '40300', 'Sepulveda', 40, 1),
(11640, '40310', 'Santa Marta Del Cerro', 40, 1),
(11641, '40310', 'Santa Marta Del Cerro', 40, 1),
(11642, '40311', 'Sotillo', 40, 1),
(11643, '40311', 'Sotillo', 40, 1),
(11644, '40312', 'Vellosillo', 40, 1),
(11645, '40312', 'Vellosillo', 40, 1),
(11646, '40313', 'Torreadrada', 40, 1),
(11647, '40314', 'Valtiendas', 40, 1),
(11648, '40314', 'Valtiendas', 40, 1),
(11649, '40315', 'Castroserracin', 40, 1),
(11650, '40315', 'Castroserracin', 40, 1),
(11651, '40316', 'Castroserrac', 40, 1),
(11652, '40317', 'Villaseca', 40, 1),
(11653, '40317', 'Villaseca', 40, 1),
(11654, '40318', 'Villafranca Del Condado', 40, 1),
(11655, '40318', 'Villafranca Del Condado', 40, 1),
(11656, '40318', 'Villafranca Del Condado', 40, 1),
(11657, '40320', 'Cantalejo', 40, 1),
(11658, '40330', 'Fuenterrebollo', 40, 1),
(11659, '40331', 'Valle De Tabladillo', 40, 1),
(11660, '40331', 'Valle De Tabladillo', 40, 1),
(11661, '40331', 'Valle De Tabladillo', 40, 1),
(11662, '40332', 'San Miguel De Bernuy', 40, 1),
(11663, '40332', 'San Miguel De Bernuy', 40, 1),
(11664, '40340', 'Aguilafuente', 40, 1),
(11665, '40340', 'Aguilafuente', 40, 1),
(11666, '40350', 'Escalona Del Prado', 40, 1),
(11667, '40351', 'Sauquillo De Cabezas', 40, 1),
(11668, '40352', 'Lastras De Cuellar', 40, 1),
(11669, '40353', 'Hontalbilla', 40, 1),
(11670, '40354', 'Perosillo', 40, 1),
(11671, '40354', 'Perosillo', 40, 1),
(11672, '40354', 'Perosillo', 40, 1),
(11673, '40355', 'Fuentesauco De FuentidueÑa', 40, 1),
(11674, '40356', 'Calabazas De FuentidueÑa', 40, 1),
(11675, '40357', 'Valles De FuentidueÑa, Los', 40, 1),
(11676, '40358', 'FuentepiÑel', 40, 1),
(11677, '40359', 'Torrecilla Del Pinar', 40, 1),
(11678, '40359', 'Torrecilla Del Pinar', 40, 1),
(11679, '40360', 'Cantimpalos', 40, 1),
(11680, '40370', 'Turegano', 40, 1),
(11681, '40380', 'Sebulcor', 40, 1),
(11682, '40380', 'Sebulcor', 40, 1),
(11683, '40389', 'Valdesimonte', 40, 1),
(11684, '40389', 'Valdesimonte', 40, 1),
(11685, '40389', 'Valdesimonte', 40, 1),
(11686, '40389', 'Valdesimonte', 40, 1),
(11687, '40390', 'Valseca', 40, 1),
(11688, '40391', 'Encinillas', 40, 1),
(11689, '40392', 'Mata De Quintanar', 40, 1),
(11690, '40392', 'Mata De Quintanar', 40, 1),
(11691, '40393', 'Villovela De Piron', 40, 1),
(11692, '40394', 'Otones De Benjumea', 40, 1),
(11693, '40395', 'Veganzones', 40, 1),
(11694, '40396', 'Cabezuela', 40, 1),
(11695, '40400', 'Espinar, El', 40, 1),
(11696, '40408', 'Navas De San Antonio', 40, 1),
(11697, '40410', 'San Rafael', 40, 1),
(11698, '40418', 'Fresno de Cantespino', 40, 1),
(11699, '40419', 'Gudillos', 40, 1),
(11700, '40420', 'Riofrio, Real Bosque De', 40, 1),
(11701, '40420', 'Riofrio, Real Bosque De', 40, 1),
(11702, '40420', 'Riofrio, Real Bosque De', 40, 1),
(11703, '40421', 'Ortigosa Del Monte', 40, 1),
(11704, '40422', 'Otero De Herreros', 40, 1),
(11705, '40423', 'Vegas De Matute', 40, 1),
(11706, '40423', 'Vegas De Matute', 40, 1),
(11707, '40424', 'Angeles De San Rafael, Los', 40, 1),
(11708, '40430', 'Bernardos', 40, 1),
(11709, '40440', 'Santa Maria La Real De Nieva', 40, 1),
(11710, '40441', 'MiguelaÑez', 40, 1),
(11711, '40442', 'Samboal', 40, 1),
(11712, '40443', 'Narros De Cuellar', 40, 1),
(11713, '40444', 'Melque De Cercos', 40, 1),
(11714, '40445', 'Juarros De Voltoya', 40, 1),
(11715, '40446', 'Martin MuÑoz De Las Posadas', 40, 1),
(11716, '40447', 'Nieva', 40, 1),
(11717, '40448', 'Santa Mar', 40, 1),
(11718, '40449', 'Villoslada', 40, 1),
(11719, '40450', 'Nava De La Asuncion', 40, 1),
(11720, '40460', 'Santiuste De San Juan Bautista', 40, 1),
(11721, '40461', 'Moraleja De Coca', 40, 1),
(11722, '40462', 'Aldehuela Del Codonal', 40, 1),
(11723, '40462', 'Aldehuela Del Codonal', 40, 1),
(11724, '40463', 'Codorniz', 40, 1),
(11725, '40464', 'Montuenga', 40, 1),
(11726, '40465', 'San Cristobal De La Vega', 40, 1),
(11727, '40466', 'Rapariegos', 40, 1),
(11728, '40466', 'Rapariegos', 40, 1),
(11729, '40467', 'Tolocirio', 40, 1),
(11730, '40468', 'Montejo De Arevalo', 40, 1),
(11731, '40469', 'Donhierro', 40, 1),
(11732, '40470', 'Navas De Oro', 40, 1),
(11733, '40480', 'Coca', 40, 1),
(11734, '40490', 'Huertos, Los', 40, 1),
(11735, '40490', 'Huertos, Los', 40, 1),
(11736, '40491', 'Carbonero De Ahusin', 40, 1),
(11737, '40492', 'AÑe', 40, 1),
(11738, '40493', 'Yanguas De Eresma', 40, 1),
(11739, '40494', 'Miguel IbaÑez', 40, 1),
(11740, '40494', 'Miguel IbaÑez', 40, 1),
(11741, '40495', 'Ortigosa Del PestaÑo', 40, 1),
(11742, '40495', 'Ortigosa Del PestaÑo', 40, 1),
(11743, '40496', 'Villeguillo', 40, 1),
(11744, '40496', 'Villeguillo', 40, 1),
(11745, '40496', 'Villeguillo', 40, 1),
(11746, '40500', 'Riaza', 40, 1),
(11747, '40510', 'Serracin', 40, 1),
(11748, '40511', 'Riaza', 40, 1),
(11749, '40512', 'Villacorta', 40, 1),
(11750, '40512', 'Villacorta', 40, 1),
(11751, '40513', 'Ribota', 40, 1),
(11752, '40514', 'Valvieja', 40, 1),
(11753, '40515', 'Riofrio De Riaza', 40, 1),
(11754, '40516', 'Fresno De Cantespino', 40, 1),
(11755, '40517', 'Sequera De Fresno', 40, 1),
(11756, '40517', 'Sequera De Fresno', 40, 1),
(11757, '40518', 'Riahuelas', 40, 1),
(11758, '40520', 'Ayllon', 40, 1),
(11759, '40529', 'Riaguas De San Bartolome', 40, 1),
(11760, '40529', 'Riaguas De San Bartolome', 40, 1),
(11761, '40529', 'Riaguas De San Bartolome', 40, 1),
(11762, '40530', 'Olmo, El', 40, 1),
(11763, '40530', 'Olmo, El', 40, 1),
(11764, '40531', 'Navares De Ayuso', 40, 1),
(11765, '40531', 'Navares De Ayuso', 40, 1),
(11766, '40531', 'Navares De Ayuso', 40, 1),
(11767, '40532', 'Navares De Las Cuevas', 40, 1),
(11768, '40532', 'Navares De Las Cuevas', 40, 1),
(11769, '40532', 'Navares De Las Cuevas', 40, 1),
(11770, '40533', 'Aldehorno', 40, 1),
(11771, '40540', 'Pradales', 40, 1),
(11772, '40540', 'Pradales', 40, 1),
(11773, '40541', 'Villalbilla De Montejo', 40, 1),
(11774, '40541', 'Villalbilla De Montejo', 40, 1),
(11775, '40542', 'Villaverde De Montejo', 40, 1),
(11776, '40542', 'Villaverde De Montejo', 40, 1),
(11777, '40542', 'Villaverde De Montejo', 40, 1),
(11778, '40550', 'Cedillo De La Torre', 40, 1),
(11779, '40550', 'Cedillo De La Torre', 40, 1),
(11780, '40551', 'Cilleruelo De San Mames', 40, 1),
(11781, '40551', 'Cilleruelo De San Mames', 40, 1),
(11782, '40552', 'Fuentemizarra', 40, 1),
(11783, '40553', 'Valdevarnes', 40, 1),
(11784, '40554', 'Maderuelo', 40, 1),
(11785, '40555', 'Aldealengua De Santa Maria', 40, 1),
(11786, '40556', 'Mazagatos', 40, 1),
(11787, '40560', 'Turrubuelo', 40, 1),
(11788, '40561', 'Navares de Ayuso', 40, 1),
(11789, '40567', 'Pajarejos', 40, 1),
(11790, '40568', 'Aldeanueva Del Campanario', 40, 1),
(11791, '40569', 'Grajera', 40, 1),
(11792, '40590', 'Villarejo', 40, 1),
(11793, '40590', 'Villarejo', 40, 1),
(11794, '40591', 'Mansilla', 40, 1),
(11795, '40592', 'Cerezo De Arriba', 40, 1),
(11796, '40593', 'Castillejo De Mesleon', 40, 1),
(11797, '40594', 'Santa Maria De Riaza', 40, 1),
(11798, '41001', 'Sevilla', 41, 1),
(11799, '41002', 'Sevilla', 41, 1),
(11800, '41003', 'Sevilla', 41, 1),
(11801, '41004', 'Sevilla', 41, 1),
(11802, '41005', 'Sevilla', 41, 1),
(11803, '41006', 'Sevilla', 41, 1),
(11804, '41007', 'Sevilla', 41, 1),
(11805, '41008', 'Sevilla', 41, 1),
(11806, '41009', 'Sevilla', 41, 1),
(11807, '41010', 'Sevilla', 41, 1),
(11808, '41011', 'Sevilla', 41, 1),
(11809, '41012', 'Sevilla', 41, 1),
(11810, '41013', 'Sevilla', 41, 1),
(11811, '41014', 'Sevilla', 41, 1),
(11812, '41015', 'Sevilla', 41, 1),
(11813, '41016', 'Sevilla', 41, 1),
(11814, '41017', 'Sevilla', 41, 1),
(11815, '41018', 'Sevilla', 41, 1),
(11816, '41019', 'Sevilla', 41, 1),
(11817, '41020', 'Sevilla', 41, 1),
(11818, '41073', 'Dos Hermanas', 41, 1),
(11819, '41089', 'Dos Hermanas', 41, 1),
(11820, '41092', 'Sevilla', 41, 1),
(11821, '41100', 'Vega, La', 41, 1),
(11822, '41110', 'Bollullos De La Mitacion', 41, 1),
(11823, '41111', 'Almensilla', 41, 1),
(11824, '41120', 'Gelves', 41, 1),
(11825, '41130', 'Puebla Del Rio, La', 41, 1),
(11826, '41140', 'Isla Mayor', 41, 1),
(11827, '41150', 'Poblado De Alfonso Xiii', 41, 1),
(11828, '41200', 'Alcala Del Rio', 41, 1),
(11829, '41200', 'Alcala Del Rio', 41, 1),
(11830, '41209', 'San Ignacio Del Viar', 41, 1),
(11831, '41210', 'Lagos Del Serrano', 41, 1),
(11832, '41218', 'Torre De La Reina', 41, 1),
(11833, '41219', 'Pajanosas, Las', 41, 1),
(11834, '41220', 'Burguillos', 41, 1),
(11835, '41220', 'Burguillos', 41, 1),
(11836, '41230', 'Castilblanco De Los Arroyos', 41, 1),
(11837, '41240', 'Almaden De La Plata', 41, 1),
(11838, '41250', 'Real De La Jara, El', 41, 1),
(11839, '41300', 'Sevilla', 41, 1),
(11840, '41309', 'Rinconada, La', 41, 1),
(11841, '41310', 'Brenes', 41, 1),
(11842, '41318', 'Villaverde Del Rio', 41, 1),
(11843, '41319', 'Viar, El', 41, 1),
(11844, '41320', 'Pajares, Los', 41, 1),
(11845, '41330', 'Rosales, Los', 41, 1),
(11846, '41330', 'Rosales, Los', 41, 1),
(11847, '41339', 'Guadajoz', 41, 1),
(11848, '41340', 'Tocina', 41, 1),
(11849, '41350', 'Villanueva Del Rio Y Minas', 41, 1),
(11850, '41359', 'Villanueva Del Rio', 41, 1),
(11851, '41360', 'Pedroso, El', 41, 1),
(11852, '41370', 'Solana Del Valle', 41, 1),
(11853, '41380', 'Alanis', 41, 1),
(11854, '41388', 'San Nicolas Del Puerto', 41, 1),
(11855, '41389', 'Cerro Del Hierro', 41, 1),
(11856, '41390', 'Guadalcanal', 41, 1),
(11857, '41400', 'Ecija', 41, 1),
(11858, '41409', 'Villar Del Marco, El, Poblado', 41, 1),
(11859, '41410', 'Carmona', 41, 1),
(11860, '41420', 'Fuentes De Andalucia', 41, 1),
(11861, '41429', 'Campana, La', 41, 1),
(11862, '41430', 'Luisiana, La', 41, 1),
(11863, '41439', 'Monclova, La', 41, 1),
(11864, '41439', 'Monclova, La', 41, 1),
(11865, '41439', 'Monclova, La', 41, 1),
(11866, '41440', 'Setefilla', 41, 1),
(11867, '41440', 'Setefilla', 41, 1),
(11868, '41449', 'Alcolea Del Rio', 41, 1),
(11869, '41450', 'Fuente El Negro', 41, 1),
(11870, '41460', 'Navas De Las Concepcion, Las', 41, 1),
(11871, '41470', 'Vereda', 41, 1),
(11872, '41470', 'Vereda', 41, 1),
(11873, '41471', 'Utrera', 41, 1),
(11874, '41479', 'Puebla De Los Infantes, La', 41, 1),
(11875, '41489', 'Aznalc', 41, 1),
(11876, '41500', 'Trujillo Cabeza Sordo', 41, 1),
(11877, '41510', 'Mairena Del Alcor', 41, 1),
(11878, '41520', 'Viso Del Alcor, El', 41, 1),
(11879, '41520', 'Viso Del Alcor, El', 41, 1),
(11880, '41530', 'Ramira, La', 41, 1),
(11881, '41540', 'Puebla De Cazalla, La', 41, 1),
(11882, '41550', 'Huerta Del Colegio', 41, 1),
(11883, '41560', 'Salada, La', 41, 1),
(11884, '41563', 'Isla Redonda La AceÑuela', 41, 1),
(11885, '41564', 'Lora De Estepa', 41, 1),
(11886, '41565', 'Gilena', 41, 1),
(11887, '41566', 'Pedrera', 41, 1),
(11888, '41567', 'Herrera', 41, 1),
(11889, '41567', 'Herrera', 41, 1),
(11890, '41568', 'Rubio, El', 41, 1),
(11891, '41569', 'Matarredonda', 41, 1),
(11892, '41570', 'Huertas De La Manga', 41, 1),
(11893, '41580', 'Riguelo', 41, 1),
(11894, '41590', 'Roda De Andalucia, La', 41, 1),
(11895, '41599', 'Perez, Los', 41, 1),
(11896, '41599', 'Perez, Los', 41, 1),
(11897, '41600', 'Monjas, Las', 41, 1),
(11898, '41610', 'Paradas', 41, 1),
(11899, '41620', 'Marchena', 41, 1),
(11900, '41630', 'Lantejuela, La', 41, 1),
(11901, '41640', 'Puerto De La Encina', 41, 1),
(11902, '41650', 'Saucejo, El', 41, 1),
(11903, '41657', 'Corrales, Los', 41, 1),
(11904, '41658', 'Rejano', 41, 1),
(11905, '41659', 'Navarredonda', 41, 1),
(11906, '41660', 'Villanueva De San Juan', 41, 1),
(11907, '41661', 'Algamitas', 41, 1),
(11908, '41670', 'Pruna', 41, 1),
(11909, '41700', 'Dos Hermanas', 41, 1),
(11910, '41701', 'Dos Hermanas', 41, 1),
(11911, '41702', 'Dos Hermanas', 41, 1),
(11912, '41703', 'Dos Hermanas', 41, 1),
(11913, '41704', 'Dos Hermanas', 41, 1),
(11914, '41710', 'Utrera', 41, 1),
(11915, '41719', 'Palmar De Troya, El', 41, 1),
(11916, '41720', 'Palacios Y Villafranca, Los', 41, 1),
(11917, '41720', 'Palacios Y Villafranca, Los', 41, 1),
(11918, '41727', 'Trobal, El', 41, 1),
(11919, '41727', 'Trobal, El', 41, 1),
(11920, '41728', 'Pinzon', 41, 1),
(11921, '41728', 'Pinzon', 41, 1),
(11922, '41728', 'Pinzon', 41, 1),
(11923, '41729', 'Las Cabezas de San Juan', 41, 1),
(11924, '41730', 'Vetaherrado', 41, 1),
(11925, '41730', 'Vetaherrado', 41, 1),
(11926, '41740', 'Lebrija', 41, 1),
(11927, '41749', 'Cuervo, El', 41, 1),
(11928, '41750', 'Molares, Los', 41, 1),
(11929, '41760', 'Coronil, El', 41, 1),
(11930, '41770', 'Montellano', 41, 1),
(11931, '41780', 'Coripe', 41, 1),
(11932, '41800', 'Sanlucar La Mayor', 41, 1),
(11933, '41804', 'Olivares', 41, 1),
(11934, '41805', 'Benacazon', 41, 1),
(11935, '41806', 'Umbrete', 41, 1),
(11936, '41807', 'Espartinas', 41, 1),
(11937, '41808', 'Villanueva Del Ariscal', 41, 1),
(11938, '41809', 'Albaida Del Aljarafe', 41, 1),
(11939, '41810', 'Castilleja Del Campo', 41, 1),
(11940, '41820', 'Carrion De Los Cespedes', 41, 1),
(11941, '41830', 'Huevar De Aljarafe', 41, 1),
(11942, '41840', 'Pilas', 41, 1),
(11943, '41849', 'Aznalcazar', 41, 1),
(11944, '41850', 'Villamanrique De La Condesa', 41, 1),
(11945, '41860', 'Gerena', 41, 1),
(11946, '41870', 'Aznalcollar', 41, 1),
(11947, '41880', 'Ronquillo, El', 41, 1),
(11948, '41888', 'Garrobo, El', 41, 1),
(11949, '41888', 'Garrobo, El', 41, 1),
(11950, '41889', 'CaÑuelo, El', 41, 1),
(11951, '41890', 'Peroamigo', 41, 1),
(11952, '41897', 'MadroÑo, El', 41, 1),
(11953, '41898', 'Villargordo', 41, 1),
(11954, '41898', 'Villargordo', 41, 1),
(11955, '41899', 'Valdeflores', 41, 1),
(11956, '41900', 'Camas', 41, 1),
(11957, '41907', 'Valencina De La Concepcion', 41, 1),
(11958, '41908', 'Castilleja De Guzman', 41, 1),
(11959, '41909', 'Salteras', 41, 1),
(11960, '41910', 'Coca De La PiÑera', 41, 1),
(11961, '41920', 'San Juan De Aznalfarache', 41, 1),
(11962, '41926', 'Mairena del Aljarafe', 41, 1),
(11963, '41927', 'Mairena Del Aljarafe', 41, 1),
(11964, '41928', 'Palomares Del Rio', 41, 1),
(11965, '41929', 'Mairena del Aljarafe', 41, 1),
(11966, '41930', 'Bormujos', 41, 1),
(11967, '41940', 'Tomares', 41, 1),
(11968, '41950', 'Castilleja De La Cuesta', 41, 1),
(11969, '41960', 'Gines', 41, 1),
(11970, '41970', 'Santiponce', 41, 1),
(11971, '41980', 'Algaba, La', 41, 1),
(11972, '41989', 'Aral, El', 41, 1),
(11973, '42001', 'Soria', 42, 1),
(11974, '42002', 'Soria', 42, 1),
(11975, '42003', 'Soria', 42, 1),
(11976, '42004', 'Soria', 42, 1),
(11977, '42005', 'Soria', 42, 1),
(11978, '42100', 'Agreda', 42, 1),
(11979, '42107', 'Vozmediano', 42, 1),
(11980, '42107', 'Vozmediano', 42, 1),
(11981, '42107', 'Vozmediano', 42, 1),
(11982, '42108', 'Valverde De Agreda', 42, 1),
(11983, '42108', 'Valverde De Agreda', 42, 1),
(11984, '42108', 'Valverde De Agreda', 42, 1),
(11985, '42108', 'Valverde De Agreda', 42, 1),
(11986, '42109', 'Vozmediano', 42, 1),
(11987, '42110', 'Olvega', 42, 1),
(11989, '42111', 'Aranc', 42, 1),
(11990, '42111', 'Aldealpozo', 42, 1),
(11991, '42112', 'Villar Del Campo', 42, 1),
(11992, '42112', 'Villar Del Campo', 42, 1),
(11993, '42112', 'Villar Del Campo', 42, 1),
(11994, '42112', 'Villar Del Campo', 42, 1),
(11995, '42112', 'Villar Del Campo', 42, 1),
(11996, '42113', 'Valdelagua Del Cerro', 42, 1),
(11997, '42113', 'Valdelagua Del Cerro', 42, 1),
(11998, '42113', 'Valdelagua Del Cerro', 42, 1),
(11999, '42113', 'Valdelagua Del Cerro', 42, 1),
(12000, '42113', 'Valdelagua Del Cerro', 42, 1),
(12001, '42114', 'Cigudosa', 42, 1),
(12002, '42114', 'San Felices', 42, 1),
(12003, '42114', 'Valdeprado', 42, 1),
(12004, '42120', 'Gomara', 42, 1),
(12005, '42124', 'Torlengua', 42, 1),
(12006, '42124', 'Fuentelmonge', 42, 1),
(12007, '42124', 'Noviercas', 42, 1),
(12009, '42125', 'Deza', 42, 1),
(12010, '42126', 'Reznos', 42, 1),
(12011, '42126', 'Reznos', 42, 1),
(12012, '42126', 'Reznos', 42, 1),
(12013, '42127', 'Zarabes', 42, 1),
(12014, '42127', 'Zarabes', 42, 1),
(12015, '42127', 'Zarabes', 42, 1),
(12016, '42127', 'Zarabes', 42, 1),
(12017, '42128', 'Zamajon', 42, 1),
(12018, '42128', 'Zamajon', 42, 1),
(12019, '42129', 'G', 42, 1),
(12020, '42129', 'Villaseca de Arciel', 42, 1),
(12021, '42129', 'Buberos', 42, 1),
(12022, '42129', 'Aliud', 42, 1),
(12023, '42130', 'Peroniel Del Campo', 42, 1),
(12024, '42131', 'Almenar de Soria', 42, 1),
(12025, '42132', 'Villaseca De Arciel', 42, 1),
(12026, '42133', 'Alconaba', 42, 1),
(12027, '42134', 'Salma, La (alconaba), Granja', 42, 1),
(12028, '42134', 'Salma, La (alconaba), Granja', 42, 1),
(12029, '42135', 'Cabrejas del Campo', 42, 1),
(12030, '42135', 'Aldealafuente', 42, 1),
(12031, '42136', 'Torrubia de Soria', 42, 1),
(12032, '42136', 'Portillo de Soria', 42, 1),
(12034, '42137', 'Carabantes', 42, 1),
(12035, '42137', 'Reznos', 42, 1),
(12036, '42138', 'Torrubia De Soria', 42, 1),
(12037, '42138', 'Torrubia De Soria', 42, 1),
(12038, '42138', 'Torrubia De Soria', 42, 1),
(12039, '42140', 'San Leonardo De Yague', 42, 1),
(12040, '42141', 'Valdealbin', 42, 1),
(12041, '42141', 'Valdealbin', 42, 1),
(12042, '42142', 'Orillares', 42, 1),
(12043, '42142', 'Orillares', 42, 1),
(12044, '42143', 'Nafr', 42, 1),
(12045, '42143', 'Fuentearmegil', 42, 1),
(12046, '42144', 'Vadillo', 42, 1),
(12047, '42144', 'Casarejos', 42, 1),
(12048, '42144', 'Herrera de Soria', 42, 1),
(12049, '42145', 'Villaverde Del Monte', 42, 1),
(12050, '42146', 'Cabrejas Del Pinar', 42, 1),
(12051, '42146', 'Cabrejas Del Pinar', 42, 1),
(12052, '42147', 'Cabrejas del Pinar', 42, 1),
(12053, '42148', 'Vadillo', 42, 1),
(12054, '42148', 'Vadillo', 42, 1),
(12055, '42148', 'Vadillo', 42, 1),
(12056, '42149', 'Navaleno', 42, 1),
(12057, '42150', 'Vinuesa', 42, 1),
(12058, '42151', 'Vinuesa', 42, 1),
(12059, '42152', 'Soria', 42, 1),
(12060, '42153', 'Vilviestre De Los Nabos', 42, 1),
(12061, '42155', 'Molinos de Duero', 42, 1),
(12062, '42156', 'Santa Ines', 42, 1),
(12063, '42156', 'Santa Ines', 42, 1),
(12064, '42157', 'Covaleda', 42, 1),
(12065, '42158', 'Duruelo De La Sierra', 42, 1),
(12066, '42159', 'Langosto', 42, 1),
(12067, '42160', 'Almarza', 42, 1),
(12068, '42161', 'Ventosa De La Sierra', 42, 1),
(12069, '42161', 'Ventosa De La Sierra', 42, 1),
(12070, '42162', 'Tardesillas', 42, 1),
(12071, '42162', 'Tardesillas', 42, 1),
(12072, '42162', 'Tardesillas', 42, 1),
(12073, '42162', 'Tardesillas', 42, 1),
(12074, '42163', 'Garray', 42, 1),
(12075, '42164', 'Tera', 42, 1),
(12076, '42165', 'Villar Del Ala', 42, 1),
(12077, '42165', 'Villar Del Ala', 42, 1),
(12078, '42165', 'Villar Del Ala', 42, 1),
(12079, '42165', 'Villar Del Ala', 42, 1),
(12080, '42166', 'Aldehuela Del Rincon', 42, 1),
(12081, '42167', 'Sepulveda De La Sierra', 42, 1),
(12082, '42169', 'San Andres De Soria', 42, 1),
(12083, '42169', 'San Andres De Soria', 42, 1),
(12084, '42170', 'Fuentelsaz de Soria', 42, 1),
(12085, '42171', 'Castilfr', 42, 1),
(12086, '42171', 'Aldealices', 42, 1),
(12087, '42171', 'Los Villares de Soria', 42, 1),
(12088, '42171', 'Estepa de San Juan', 42, 1),
(12089, '42171', 'Ausejo de la Sierra', 42, 1),
(12090, '42172', 'Yanguas', 42, 1),
(12091, '42172', 'Yanguas', 42, 1),
(12092, '42173', 'Vizmanos', 42, 1),
(12093, '42173', 'Vizmanos', 42, 1),
(12094, '42173', 'Vizmanos', 42, 1),
(12095, '42174', 'Villaseca Somera', 42, 1),
(12096, '42174', 'Villaseca Somera', 42, 1),
(12097, '42174', 'Villaseca Somera', 42, 1),
(12098, '42175', 'Valdelavilla', 42, 1),
(12099, '42175', 'Valdelavilla', 42, 1),
(12100, '42175', 'Valdelavilla', 42, 1),
(12101, '42176', 'Santa Cruz de Yanguas', 42, 1),
(12102, '42176', 'Villar del R', 42, 1),
(12103, '42177', 'Yanguas', 42, 1),
(12104, '42177', 'Villar del R', 42, 1),
(12105, '42180', 'Villares De Soria, Los', 42, 1),
(12106, '42180', 'Villares De Soria, Los', 42, 1),
(12107, '42180', 'Villares De Soria, Los', 42, 1),
(12108, '42180', 'Villares De Soria, Los', 42, 1),
(12109, '42180', 'Villares De Soria, Los', 42, 1),
(12110, '42181', 'Villarraso', 42, 1),
(12111, '42181', 'Villarraso', 42, 1),
(12112, '42181', 'Villarraso', 42, 1),
(12113, '42181', 'Villarraso', 42, 1),
(12114, '42181', 'Villarraso', 42, 1),
(12115, '42181', 'Villarraso', 42, 1),
(12116, '42182', 'Aldehuela de Peri', 42, 1),
(12117, '42182', 'Aranc', 42, 1),
(12118, '42189', 'Ventosilla De San Juan', 42, 1),
(12119, '42189', 'Ventosilla De San Juan', 42, 1),
(12120, '42189', 'Ventosilla De San Juan', 42, 1),
(12121, '42189', 'Ventosilla De San Juan', 42, 1),
(12122, '42190', 'Verguilla, La', 42, 1),
(12123, '42190', 'Verguilla, La', 42, 1),
(12124, '42191', 'Tardajos De Duero', 42, 1),
(12125, '42191', 'Tardajos De Duero', 42, 1),
(12126, '42192', 'Villaciervos', 42, 1),
(12127, '42192', 'Villaciervos', 42, 1),
(12128, '42193', 'Venta Nueva La (aldehuela De CatalaÑazor)', 42, 1),
(12129, '42193', 'Venta Nueva La (aldehuela De CatalaÑazor)', 42, 1),
(12130, '42193', 'Venta Nueva La (aldehuela De CatalaÑazor)', 42, 1),
(12131, '42193', 'Venta Nueva La (aldehuela De CatalaÑazor)', 42, 1),
(12132, '42193', 'Venta Nueva La (aldehuela De CatalaÑazor)', 42, 1),
(12133, '42193', 'Venta Nueva La (aldehuela De CatalaÑazor)', 42, 1),
(12134, '42194', 'Rioseco de Soria', 42, 1),
(12135, '42194', 'Torreblacos', 42, 1),
(12136, '42195', 'Burgo de Osma-Ciudad de Osma', 42, 1),
(12137, '42196', 'Burgo de Osma-Ciudad de Osma', 42, 1),
(12138, '42196', 'Valdenebro', 42, 1),
(12139, '42200', 'Almazan', 42, 1),
(12140, '42210', 'Velamazan', 42, 1),
(12141, '42211', 'Tejerizas', 42, 1),
(12142, '42211', 'Tejerizas', 42, 1),
(12143, '42212', 'Lodares Del Monte', 42, 1),
(12144, '42213', 'Romanillos De Medinaceli', 42, 1),
(12145, '42213', 'Romanillos De Medinaceli', 42, 1),
(12146, '42214', 'Villasayas', 42, 1),
(12147, '42214', 'Villasayas', 42, 1),
(12148, '42215', 'Frechilla de Almaz', 42, 1),
(12149, '42216', 'Torremediana', 42, 1),
(12150, '42216', 'Torremediana', 42, 1),
(12151, '42216', 'Torremediana', 42, 1),
(12152, '42216', 'Torremediana', 42, 1),
(12153, '42216', 'Torremediana', 42, 1),
(12154, '42217', 'Coscurita', 42, 1),
(12155, '42218', 'Viana De Duero', 42, 1),
(12156, '42218', 'Viana De Duero', 42, 1),
(12157, '42218', 'Viana De Duero', 42, 1),
(12158, '42218', 'Viana De Duero', 42, 1),
(12159, '42220', 'ValtueÑa', 42, 1),
(12160, '42222', 'Puebla De Eca', 42, 1),
(12161, '42223', 'Villalba', 42, 1),
(12162, '42223', 'Villalba', 42, 1),
(12163, '42223', 'Villalba', 42, 1),
(12164, '42224', 'Escobosa de Almaz', 42, 1),
(12165, '42224', 'Nolay', 42, 1),
(12166, '42224', 'Soliedra', 42, 1),
(12167, '42225', 'Velilla De Los Ajos', 42, 1),
(12168, '42225', 'Velilla De Los Ajos', 42, 1),
(12169, '42225', 'Velilla De Los Ajos', 42, 1),
(12170, '42225', 'Velilla De Los Ajos', 42, 1),
(12171, '42230', 'Yelo', 42, 1),
(12172, '42230', 'Yelo', 42, 1),
(12173, '42230', 'Yelo', 42, 1),
(12174, '42240', 'Ures De Medina', 42, 1),
(12175, '42248', 'Lodares De Medinaceli', 42, 1),
(12176, '42249', 'Medinaceli', 42, 1),
(12177, '42249', 'Arcos de Jal', 42, 1),
(12178, '42250', 'Arcos De Jalon', 42, 1),
(12179, '42257', 'Velilla De Medinaceli', 42, 1),
(12180, '42258', 'Utrilla', 42, 1),
(12181, '42258', 'Utrilla', 42, 1),
(12182, '42259', 'Sagides', 42, 1),
(12183, '42260', 'Santa Maria De Huerta', 42, 1),
(12184, '42269', 'Torrehermosa', 42, 1),
(12185, '42290', 'Villabuena', 42, 1),
(12186, '42290', 'Villabuena', 42, 1),
(12187, '42290', 'Villabuena', 42, 1),
(12188, '42291', 'Ventosa De Fuentepinilla', 42, 1),
(12189, '42292', 'Quintana Redonda', 42, 1),
(12190, '42293', 'Fuentepinilla', 42, 1),
(12191, '42293', 'Quintana Redonda', 42, 1),
(12192, '42293', 'Valderrodilla', 42, 1),
(12193, '42294', 'Valderrueda', 42, 1),
(12194, '42294', 'Valderrueda', 42, 1),
(12195, '42294', 'Valderrueda', 42, 1),
(12196, '42294', 'Valderrueda', 42, 1),
(12198, '42295', 'Baraona', 42, 1),
(12199, '42296', 'Yelo', 42, 1),
(12201, '42300', 'Burgo De Osma, El', 42, 1),
(12202, '42310', 'Rasa, La', 42, 1),
(12203, '42311', 'Villanueva De Gormaz', 42, 1),
(12204, '42311', 'Villanueva De Gormaz', 42, 1),
(12205, '42311', 'Villanueva De Gormaz', 42, 1),
(12206, '42311', 'Villanueva De Gormaz', 42, 1),
(12207, '42312', 'Villanueva de Gormaz', 42, 1),
(12208, '42312', 'Fresno de Caracena', 42, 1),
(12209, '42312', 'Burgo de Osma-Ciudad de Osma', 42, 1),
(12210, '42313', 'Valdenebro', 42, 1),
(12211, '42313', 'Valdenebro', 42, 1),
(12212, '42313', 'Valdenebro', 42, 1),
(12213, '42313', 'Valdenebro', 42, 1),
(12214, '42313', 'Valdenebro', 42, 1),
(12215, '42314', 'Recuerda', 42, 1),
(12216, '42315', 'Valvenedizo', 42, 1),
(12217, '42315', 'Valvenedizo', 42, 1),
(12218, '42315', 'Valvenedizo', 42, 1),
(12219, '42316', 'Retortillo de Soria', 42, 1),
(12220, '42317', 'Valdeavellano De Ucero', 42, 1),
(12221, '42317', 'Valdeavellano De Ucero', 42, 1),
(12222, '42317', 'Valdeavellano De Ucero', 42, 1),
(12223, '42318', 'Valdemaluque', 42, 1),
(12224, '42318', 'Valdemaluque', 42, 1),
(12225, '42320', 'Velilla De San Esteban', 42, 1),
(12226, '42320', 'Velilla De San Esteban', 42, 1),
(12227, '42328', 'Valdanzuelo', 42, 1),
(12228, '42328', 'Valdanzuelo', 42, 1),
(12229, '42328', 'Valdanzuelo', 42, 1),
(12230, '42329', 'Zayas De Torre', 42, 1),
(12231, '42330', 'San Esteban De Gormaz', 42, 1),
(12232, '42339', 'Fuentecambr', 42, 1),
(12233, '42340', 'Morcuera', 42, 1),
(12234, '42341', 'Noviales', 42, 1),
(12235, '42341', 'Noviales', 42, 1),
(12236, '42342', 'Torremocha De Ayllon', 42, 1),
(12237, '42342', 'Torremocha De Ayllon', 42, 1),
(12238, '42343', 'Montejo de Tiermes', 42, 1),
(12239, '42344', 'Valderroman', 42, 1),
(12240, '42344', 'Valderroman', 42, 1),
(12241, '42345', 'Soto De San Esteban', 42, 1),
(12242, '42351', 'Zayuelas', 42, 1),
(12243, '42351', 'Zayuelas', 42, 1),
(12244, '42351', 'Zayuelas', 42, 1),
(12245, '42351', 'Zayuelas', 42, 1),
(12246, '42353', 'Alcubilla de Avellaneda', 42, 1),
(12247, '42360', 'Berlanga De Duero', 42, 1),
(12248, '42366', 'Valverde De Los Ajos', 42, 1),
(12249, '42366', 'Valverde De Los Ajos', 42, 1),
(12250, '42366', 'Valverde De Los Ajos', 42, 1),
(12251, '42366', 'Valverde De Los Ajos', 42, 1),
(12252, '42367', 'Ciruela', 42, 1),
(12253, '42367', 'Ciruela', 42, 1),
(12254, '42368', 'Riba De Escalote, La', 42, 1),
(12255, '42368', 'Riba De Escalote, La', 42, 1),
(12256, '42368', 'Riba De Escalote, La', 42, 1),
(12257, '42368', 'Riba De Escalote, La', 42, 1),
(12258, '42369', 'Berlanga de Duero', 42, 1),
(12259, '42391', 'Pedraja De San Esteban', 42, 1),
(12260, '42391', 'Pedraja De San Esteban', 42, 1),
(12261, '42392', 'Velamaz', 42, 1),
(12262, '43001', 'Tarragona', 43, 1),
(12263, '43002', 'Tarragona', 43, 1),
(12264, '43003', 'Tarragona', 43, 1),
(12265, '43004', 'Tarragona', 43, 1),
(12266, '43005', 'Tarragona', 43, 1),
(12267, '43006', 'Tarragona', 43, 1),
(12268, '43007', 'Tarragona', 43, 1),
(12269, '43008', 'Tarragona', 43, 1),
(12270, '43100', 'Bonavista', 43, 1),
(12271, '43100', 'Bonavista', 43, 1),
(12272, '43110', 'Canonja, La', 43, 1),
(12273, '43120', 'Puntas', 43, 1),
(12274, '43130', 'Sant Salvador, Urbanitzacio', 43, 1),
(12275, '43140', 'Pobla De Mafumet, La', 43, 1),
(12276, '43141', 'Vilallonga Del Camp', 43, 1),
(12277, '43142', 'Rourell, El', 43, 1),
(12278, '43143', 'Mila, El', 43, 1),
(12279, '43143', 'Mila, El', 43, 1),
(12280, '43144', 'Vallmoll', 43, 1),
(12281, '43150', 'Medol, El, Urbanitzacio', 43, 1),
(12282, '43151', 'Pallaresos, Els', 43, 1),
(12283, '43152', 'Perafort', 43, 1),
(12284, '43153', 'Garidells, Els', 43, 1),
(12285, '43154', 'Gunyoles, Les', 43, 1),
(12286, '43155', 'Puigdelfi', 43, 1),
(12287, '43201', 'Reus', 43, 1),
(12288, '43202', 'Reus', 43, 1),
(12289, '43203', 'Reus', 43, 1),
(12290, '43204', 'Reus', 43, 1),
(12291, '43205', 'Reus', 43, 1),
(12292, '43205', 'Reus', 43, 1),
(12293, '43206', 'Reus', 43, 1),
(12294, '43206', 'Reus', 43, 1),
(12295, '43300', 'Mont-roig Del Camp', 43, 1),
(12296, '43310', 'Colldejou', 43, 1),
(12297, '43311', 'Vilanova D\'escornalbou', 43, 1),
(12298, '43312', 'Arbocet, L\'', 43, 1),
(12299, '43320', 'Pratdip', 43, 1),
(12300, '43320', 'Pratdip', 43, 1),
(12301, '43330', 'Riudoms', 43, 1),
(12302, '43340', 'Montbrio Del Camp', 43, 1),
(12303, '43350', 'Moli, Del, Cami', 43, 1),
(12304, '43360', 'Cornudella De Montsant', 43, 1),
(12305, '43361', 'Morera De Montsant, La', 43, 1),
(12306, '43362', 'Siurana', 43, 1),
(12307, '43363', 'Ulldemolins', 43, 1),
(12308, '43364', 'Tossalets, Edificio', 43, 1),
(12309, '43364', 'Tossalets, Edificio', 43, 1),
(12310, '43364', 'Tossalets, Edificio', 43, 1),
(12311, '43364', 'Tossalets, Edificio', 43, 1),
(12312, '43365', 'Arboli', 43, 1),
(12313, '43365', 'Arboli', 43, 1),
(12314, '43370', 'Palma D\'ebre, La', 43, 1),
(12315, '43371', 'Margalef', 43, 1),
(12316, '43372', 'Bisbal De Falset, La', 43, 1),
(12317, '43373', 'Cabaces', 43, 1),
(12318, '43374', 'Vilella Baixa, La', 43, 1),
(12319, '43375', 'Vilella Alta, La', 43, 1),
(12320, '43376', 'Poboleda', 43, 1),
(12321, '43379', 'Escaladei', 43, 1),
(12322, '43380', 'Vilaplana', 43, 1),
(12323, '43381', 'Aleixar L\'', 43, 1),
(12324, '43382', 'Maspujols', 43, 1),
(12325, '43390', 'Voltes, Les', 43, 1),
(12326, '43391', 'Vinyols I Els Arcs', 43, 1),
(12327, '43392', 'Castellvell Del Camp', 43, 1),
(12328, '43393', 'Almoster', 43, 1),
(12329, '43400', 'Montblanc', 43, 1),
(12330, '43410', 'Guardia Dels Prats, La', 43, 1),
(12331, '43411', 'Blancafort', 43, 1),
(12332, '43412', 'Solivella', 43, 1),
(12333, '43413', 'Belltall', 43, 1),
(12334, '43414', 'Lilla', 43, 1),
(12335, '43415', 'Rojals', 43, 1),
(12336, '43420', 'Santa Coloma De Queralt', 43, 1),
(12337, '43421', 'Viladeperdius', 43, 1),
(12338, '43422', 'Barbera De La Conca', 43, 1),
(12339, '43423', 'Pira', 43, 1),
(12340, '43424', 'Sarral', 43, 1),
(12341, '43425', 'Pla De La Basa', 43, 1),
(12342, '43425', 'Pla De La Basa', 43, 1),
(12343, '43425', 'Pla De La Basa', 43, 1),
(12344, '43426', 'Rocafort De Queralt', 43, 1),
(12345, '43427', 'Vallfogona De Riucorp', 43, 1),
(12346, '43427', 'Vallfogona De Riucorp', 43, 1),
(12347, '43427', 'Vallfogona De Riucorp', 43, 1),
(12348, '43427', 'Vallfogona De Riucorp', 43, 1),
(12349, '43428', 'Vallverd', 43, 1),
(12350, '43428', 'Vallverd', 43, 1),
(12351, '43428', 'Vallverd', 43, 1),
(12352, '43429', 'Roques, Les', 43, 1),
(12353, '43429', 'Roques, Les', 43, 1),
(12354, '43429', 'Roques, Les', 43, 1),
(12355, '43430', 'Vimbodi', 43, 1),
(12356, '43439', 'Vilanova De Prades', 43, 1),
(12357, '43439', 'Vilanova De Prades', 43, 1),
(12358, '43440', 'Espluga De Francoli, L\'', 43, 1),
(12360, '43448', 'Poblet (monestir)', 43, 1),
(12361, '43449', 'Senan', 43, 1),
(12362, '43449', 'Senan', 43, 1),
(12363, '43450', 'Riba, La', 43, 1),
(12364, '43459', 'Pinetell, El', 43, 1),
(12365, '43459', 'Pinetell, El', 43, 1),
(12366, '43460', 'Alcover', 43, 1),
(12367, '43470', 'Selva Del Camp, La', 43, 1),
(12368, '43479', 'Albiol, L\'', 43, 1),
(12369, '43480', 'Vila-seca', 43, 1),
(12370, '43481', 'Pineda, La', 43, 1),
(12371, '43490', 'Vilaverd', 43, 1),
(12372, '43491', 'Planes De Picamoixons, Les', 43, 1),
(12373, '43500', 'Tortosa', 43, 1),
(12374, '43510', 'Bitem', 43, 1),
(12375, '43511', 'Tivenys', 43, 1),
(12376, '43512', 'Benifallet', 43, 1),
(12377, '43513', 'Rasquera', 43, 1),
(12378, '43514', 'Mas De Barberans', 43, 1),
(12379, '43515', 'Galera, La', 43, 1),
(12380, '43516', 'Godall', 43, 1),
(12381, '43517', 'Vinallop', 43, 1),
(12382, '43519', 'Perello, El', 43, 1),
(12383, '43520', 'Roquetes', 43, 1),
(12384, '43527', 'Reguers, Els', 43, 1),
(12385, '43528', 'Alfara De Carles', 43, 1),
(12386, '43529', 'Raval De Cristo', 43, 1),
(12387, '43530', 'Alcanar', 43, 1),
(12388, '43539', 'Creixell', 43, 1),
(12389, '43540', 'Sant Carles De La Rapita', 43, 1),
(12390, '43548', 'Salines De La Trinitat, Les', 43, 1),
(12391, '43549', 'Poble Nou Del Delta, El', 43, 1),
(12392, '43550', 'Ulldecona', 43, 1),
(12393, '43558', 'Ventalles, Les', 43, 1),
(12394, '43558', 'Ventalles, Les', 43, 1),
(12395, '43559', 'Valentins, Els', 43, 1),
(12396, '43560', 'Senia, La', 43, 1),
(12397, '43569', 'Cases D\'alcanar, Les', 43, 1),
(12398, '43570', 'Santa Barbara', 43, 1),
(12399, '43580', 'Deltebre', 43, 1),
(12400, '43590', 'Jesus', 43, 1),
(12401, '43591', 'Aldover', 43, 1),
(12402, '43592', 'Xerta', 43, 1),
(12403, '43593', 'Pauls', 43, 1),
(12404, '43594', 'Pinell De Brai, El', 43, 1),
(12405, '43595', 'Prat De Comte', 43, 1),
(12406, '43596', 'Horta De Sant Joan', 43, 1),
(12407, '43597', 'Arnes', 43, 1),
(12408, '43700', 'Vendrell, El', 43, 1),
(12409, '43710', 'Santa Oliva', 43, 1),
(12410, '43711', 'Sant Miquel De Banyeres, Urbanitzacio', 43, 1),
(12411, '43712', 'Priorat De Banyeres, El', 43, 1),
(12412, '43713', 'Torregassa, La', 43, 1),
(12413, '43714', 'Vall De Sant Marc, La', 43, 1),
(12414, '43714', 'Vall De Sant Marc, La', 43, 1),
(12415, '43715', 'Valldossera', 43, 1),
(12416, '43715', 'Valldossera', 43, 1),
(12417, '43715', 'Valldossera', 43, 1),
(12418, '43715', 'Valldossera', 43, 1),
(12419, '43716', 'Masies De Torrent, Les', 43, 1),
(12420, '43717', 'Ortigos, L\'', 43, 1),
(12421, '43718', 'Peces, Les', 43, 1),
(12422, '43718', 'Peces, Les', 43, 1),
(12423, '43718', 'Peces, Les', 43, 1),
(12424, '43718', 'Peces, Les', 43, 1),
(12425, '43719', 'Bellvei', 43, 1),
(12426, '43720', 'Llacuneta, La', 43, 1),
(12427, '43730', 'Falset', 43, 1),
(12428, '43730', 'Falset', 43, 1),
(12429, '43736', 'Molar, El', 43, 1),
(12430, '43736', 'Molar, El', 43, 1),
(12431, '43736', 'Molar, El', 43, 1),
(12432, '43737', 'Torroja Del Priorat', 43, 1),
(12433, '43737', 'Torroja Del Priorat', 43, 1),
(12434, '43737', 'Torroja Del Priorat', 43, 1),
(12435, '43738', 'Bellmunt Del Priorat', 43, 1),
(12436, '43739', 'Porrera', 43, 1),
(12437, '43740', 'Mora D\'ebre', 43, 1),
(12438, '43746', 'Tivissa', 43, 1),
(12439, '43747', 'Miravet', 43, 1),
(12440, '43747', 'Miravet', 43, 1),
(12441, '43748', 'Ginestar', 43, 1),
(12442, '43749', 'Garcia', 43, 1),
(12443, '43750', 'Flix', 43, 1),
(12444, '43760', 'Morell, El', 43, 1),
(12445, '43761', 'Pobla De Montornes, La', 43, 1),
(12446, '43762', 'Riera De Gaia, La', 43, 1),
(12447, '43763', 'Vespella', 43, 1),
(12448, '43763', 'Vespella', 43, 1),
(12449, '43764', 'Catllar, El', 43, 1),
(12450, '43765', 'Vistabella', 43, 1),
(12451, '43770', 'Mora La Nova', 43, 1),
(12452, '43771', 'Riudecanyes', 43, 1),
(12453, '43772', 'Botarell', 43, 1),
(12454, '43773', 'Duesaigues', 43, 1),
(12455, '43773', 'Duesaigues', 43, 1),
(12456, '43774', 'Torre De Fontaubella, La', 43, 1),
(12457, '43774', 'Torre De Fontaubella, La', 43, 1),
(12458, '43775', 'MarÇa', 43, 1),
(12459, '43776', 'CapÇanes', 43, 1),
(12460, '43777', 'Guiamets, Els', 43, 1),
(12461, '43780', 'Gandesa', 43, 1),
(12462, '43781', 'Fatarella, La', 43, 1),
(12463, '43782', 'Vilalba Dels Arcs', 43, 1),
(12464, '43783', 'Pobla De Massaluca, La', 43, 1),
(12465, '43784', 'Corbera D\'ebre', 43, 1),
(12466, '43785', 'Bot', 43, 1),
(12467, '43786', 'Batea', 43, 1),
(12468, '43787', 'Caseres', 43, 1),
(12469, '43790', 'Riba-roja D\'ebre', 43, 1),
(12470, '43791', 'Asco', 43, 1),
(12471, '43792', 'Vinebre', 43, 1),
(12472, '43792', 'Vinebre', 43, 1),
(12473, '43800', 'Valls', 43, 1),
(12474, '43810', 'Pla De Santa Maria, El', 43, 1),
(12475, '43811', 'Figuerola Del Camp', 43, 1),
(12476, '43811', 'Figuerola Del Camp', 43, 1),
(12477, '43812', 'Vilardida', 43, 1),
(12478, '43812', 'Vilardida', 43, 1),
(12479, '43812', 'Vilardida', 43, 1),
(12480, '43812', 'Vilardida', 43, 1),
(12481, '43812', 'Vilardida', 43, 1),
(12482, '43813', 'Miramar', 43, 1),
(12483, '43813', 'Miramar', 43, 1),
(12484, '43814', 'Vila-rodona', 43, 1),
(12485, '43815', 'Urbanizacion De Els Manantials', 43, 1),
(12486, '43815', 'Urbanizacion De Els Manantials', 43, 1),
(12487, '43816', 'Querol', 43, 1),
(12488, '43817', 'Pont D\'armentera, El', 43, 1),
(12489, '43820', 'Calafell', 43, 1),
(12490, '43830', 'Torredembarra', 43, 1),
(12491, '43839', 'Sirena Dorada, La, Camping', 43, 1),
(12492, '43840', 'Salou', 43, 1),
(12493, '43850', 'Costa Blanca, Camping', 43, 1),
(12494, '43860', 'Nautic, Camping', 43, 1),
(12495, '43870', 'Amposta', 43, 1),
(12496, '43877', 'Sant Jaume D\'enveja', 43, 1),
(12497, '43878', 'Masdenverge', 43, 1),
(12498, '43879', 'Muntells, Els', 43, 1),
(12499, '43879', 'Muntells, Els', 43, 1),
(12500, '43879', 'Muntells, Els', 43, 1),
(12501, '43880', 'Sant VicenÇ De Calders', 43, 1),
(12502, '43881', 'Valparaiso', 43, 1),
(12503, '43882', 'Segur De Calafell', 43, 1),
(12504, '43883', 'Roda De Bara', 43, 1),
(12505, '43884', 'Bonastre', 43, 1),
(12506, '43885', 'Salomo', 43, 1),
(12507, '43886', 'Vilabella', 43, 1),
(12508, '43886', 'Vilabella', 43, 1),
(12509, '43887', 'Nulles', 43, 1),
(12510, '43890', 'Hospitalet De L\'infant, L\'', 43, 1),
(12511, '43891', 'Vandellos', 43, 1),
(12512, '43891', 'Vandellos', 43, 1),
(12513, '43892', 'Torre Del Sol, Camping', 43, 1),
(12514, '43893', 'Sant Antoni, Urbanitzacio', 43, 1),
(12515, '43894', 'Lligallo Del Roig, El', 43, 1),
(12516, '43895', 'Ampolla, L\'', 43, 1),
(12517, '43896', 'Hostal Dels Alls, L\'', 43, 1),
(12518, '43897', 'Poligono Industrial El Camp-redo', 43, 1),
(12519, '44001', 'Teruel', 44, 1),
(12520, '44002', 'Teruel', 44, 1),
(12521, '44003', 'Teruel', 44, 1),
(12522, '44100', 'Albarracin', 44, 1),
(12523, '44110', 'Gea De Albarracin', 44, 1),
(12524, '44111', 'Torres De Albarracin', 44, 1),
(12525, '44112', 'Tramacastilla', 44, 1),
(12526, '44113', 'Noguera De Albarracin', 44, 1),
(12527, '44114', 'Villar Del Cobo', 44, 1),
(12528, '44114', 'Villar Del Cobo', 44, 1),
(12529, '44115', 'Guadalaviar', 44, 1),
(12530, '44120', 'Villarejo De Terriente', 44, 1),
(12531, '44121', 'Rubiales', 44, 1),
(12532, '44121', 'Rubiales', 44, 1),
(12533, '44121', 'Rubiales', 44, 1),
(12534, '44121', 'Rubiales', 44, 1),
(12535, '44122', 'Valdecuenca', 44, 1),
(12536, '44122', 'Valdecuenca', 44, 1),
(12537, '44122', 'Valdecuenca', 44, 1),
(12538, '44123', 'Vallecillo, El', 44, 1),
(12539, '44123', 'Vallecillo, El', 44, 1),
(12540, '44123', 'Vallecillo, El', 44, 1),
(12541, '44123', 'Vallecillo, El', 44, 1),
(12542, '44124', 'Moscardon', 44, 1),
(12543, '44125', 'Royuela', 44, 1),
(12544, '44126', 'Frias De Albarracin', 44, 1),
(12545, '44126', 'Frias De Albarracin', 44, 1),
(12546, '44130', 'Villastar', 44, 1),
(12547, '44131', 'Villel', 44, 1),
(12548, '44132', 'Mas De La Cabrera', 44, 1),
(12549, '44132', 'Mas De La Cabrera', 44, 1),
(12550, '44133', 'Tramacastiel', 44, 1),
(12551, '44133', 'Tramacastiel', 44, 1),
(12552, '44134', 'Veguilla De La Sierra', 44, 1),
(12553, '44134', 'Veguilla De La Sierra', 44, 1),
(12554, '44134', 'Veguilla De La Sierra', 44, 1),
(12555, '44134', 'Veguilla De La Sierra', 44, 1),
(12556, '44140', 'Cantavieja', 44, 1),
(12557, '44140', 'Cantavieja', 44, 1),
(12558, '44141', 'Tronchon', 44, 1),
(12559, '44141', 'Tronchon', 44, 1),
(12560, '44141', 'Tronchon', 44, 1),
(12561, '44142', 'Iglesuela Del Cid, La', 44, 1),
(12562, '44143', 'Fortanete', 44, 1),
(12563, '44144', 'Villarroya De Los Pinares', 44, 1),
(12564, '44145', 'Allepuz', 44, 1),
(12565, '44146', 'Monteagudo Del Castillo', 44, 1),
(12566, '44147', 'Cedrillas', 44, 1),
(12567, '44150', 'Aliaga', 44, 1),
(12568, '44155', 'Pobo, El', 44, 1),
(12569, '44155', 'Pobo, El', 44, 1),
(12570, '44155', 'Pobo, El', 44, 1),
(12571, '44156', 'Jorcas', 44, 1),
(12572, '44156', 'Jorcas', 44, 1),
(12573, '44157', 'Hinojosa De Jarque', 44, 1),
(12574, '44157', 'Hinojosa De Jarque', 44, 1),
(12575, '44158', 'Cirugeda', 44, 1),
(12576, '44159', 'Miravete De La Sierra', 44, 1),
(12577, '44160', 'Alfambra', 44, 1),
(12578, '44161', 'Villalba Alta', 44, 1),
(12579, '44161', 'Villalba Alta', 44, 1),
(12580, '44161', 'Villalba Alta', 44, 1),
(12581, '44162', 'Villalba Baja', 44, 1),
(12582, '44162', 'Villalba Baja', 44, 1),
(12583, '44162', 'Villalba Baja', 44, 1),
(12584, '44163', 'Perales Del Alfambra', 44, 1),
(12585, '44164', 'Visiedo', 44, 1),
(12586, '44164', 'Visiedo', 44, 1),
(12587, '44165', 'Argente', 44, 1),
(12588, '44166', 'Rubielos De La Cerida', 44, 1),
(12589, '44167', 'CamaÑas', 44, 1),
(12590, '44168', 'Galve', 44, 1),
(12591, '44168', 'Galve', 44, 1);
INSERT INTO `lnx_poblaciones` (`id`, `cp`, `poblacion`, `idprov`, `idpais`) VALUES
(12592, '44169', 'Mezquita De Jarque', 44, 1),
(12593, '44169', 'Mezquita De Jarque', 44, 1),
(12594, '44169', 'Mezquita De Jarque', 44, 1),
(12595, '44190', 'Villaspesa', 44, 1),
(12596, '44191', 'Valacloche', 44, 1),
(12597, '44191', 'Valacloche', 44, 1),
(12598, '44191', 'Valacloche', 44, 1),
(12599, '44191', 'Valacloche', 44, 1),
(12600, '44192', 'Castralvo', 44, 1),
(12601, '44193', 'Valdecebro', 44, 1),
(12602, '44193', 'Valdecebro', 44, 1),
(12603, '44194', 'Celadas', 44, 1),
(12604, '44195', 'Teruel', 44, 1),
(12605, '44200', 'Calamocha', 44, 1),
(12606, '44210', 'Cutanda', 44, 1),
(12607, '44211', 'Valverde', 44, 1),
(12608, '44212', 'Rudilla', 44, 1),
(12609, '44212', 'Rudilla', 44, 1),
(12610, '44212', 'Rudilla', 44, 1),
(12611, '44213', 'Plou', 44, 1),
(12612, '44213', 'Plou', 44, 1),
(12613, '44220', 'Nueros', 44, 1),
(12614, '44220', 'Nueros', 44, 1),
(12615, '44221', 'Godos', 44, 1),
(12616, '44222', 'Torrecilla Del Rebollar', 44, 1),
(12617, '44223', 'Villanueva Del Rebollar', 44, 1),
(12618, '44230', 'Tornos', 44, 1),
(12619, '44231', 'Castejon De Tornos', 44, 1),
(12620, '44232', 'Bello', 44, 1),
(12621, '44233', 'Odon', 44, 1),
(12622, '44300', 'Monreal Del Campo', 44, 1),
(12623, '44310', 'Rodenas', 44, 1),
(12624, '44311', 'Villar Del Salz', 44, 1),
(12625, '44312', 'Ojos Negros', 44, 1),
(12626, '44313', 'Ojos Negros', 44, 1),
(12627, '44314', 'Blancas', 44, 1),
(12628, '44315', 'Pozuel Del Campo', 44, 1),
(12629, '44320', 'Baguena', 44, 1),
(12630, '44330', 'Burbaguena', 44, 1),
(12631, '44340', 'Fuentes Claras', 44, 1),
(12632, '44350', 'Caminreal', 44, 1),
(12633, '44357', 'Villarejo De Los Olmos, El', 44, 1),
(12634, '44357', 'Villarejo De Los Olmos, El', 44, 1),
(12635, '44358', 'Torre Los Negros', 44, 1),
(12636, '44358', 'Torre Los Negros', 44, 1),
(12637, '44359', 'Villalba De Los Morales', 44, 1),
(12638, '44359', 'Villalba De Los Morales', 44, 1),
(12639, '44360', 'Santa Eulalia', 44, 1),
(12640, '44366', 'Orihuela Del Tremedal', 44, 1),
(12641, '44367', 'Bronchales', 44, 1),
(12642, '44368', 'Pozondon', 44, 1),
(12643, '44368', 'Pozondon', 44, 1),
(12644, '44369', 'Peracense', 44, 1),
(12645, '44369', 'Peracense', 44, 1),
(12646, '44370', 'Cella', 44, 1),
(12647, '44380', 'Villarquemado', 44, 1),
(12648, '44381', 'Torremocha De Jiloca', 44, 1),
(12649, '44382', 'Torrelacarcel', 44, 1),
(12650, '44382', 'Torrelacarcel', 44, 1),
(12651, '44382', 'Torrelacarcel', 44, 1),
(12652, '44390', 'San Martin Del Rio', 44, 1),
(12653, '44391', 'Luco De Jiloca', 44, 1),
(12654, '44392', 'Poyo, El', 44, 1),
(12655, '44393', 'Torrijo Del Campo', 44, 1),
(12656, '44394', 'Villafranca Del Campo', 44, 1),
(12657, '44394', 'Villafranca Del Campo', 44, 1),
(12658, '44395', 'Alba', 44, 1),
(12659, '44396', 'Caude', 44, 1),
(12660, '44397', 'Concud', 44, 1),
(12661, '44400', 'Mora De Rubielos', 44, 1),
(12662, '44409', 'Castellar, El', 44, 1),
(12663, '44409', 'Castellar, El', 44, 1),
(12664, '44410', 'Mosqueruela', 44, 1),
(12665, '44411', 'Puertomingalvo', 44, 1),
(12666, '44412', 'Linares De Mora', 44, 1),
(12667, '44413', 'Valdelinares', 44, 1),
(12668, '44414', 'Nogueruelas', 44, 1),
(12669, '44415', 'Rubielos De Mora', 44, 1),
(12670, '44415', 'Rubielos De Mora', 44, 1),
(12671, '44420', 'Manzanera', 44, 1),
(12672, '44421', 'Torrijas', 44, 1),
(12673, '44421', 'Torrijas', 44, 1),
(12674, '44422', 'Paul, El', 44, 1),
(12675, '44422', 'Paul, El', 44, 1),
(12676, '44423', 'Olmos De Manzanera, Los', 44, 1),
(12677, '44424', 'Mora De Rubielos, Estacion', 44, 1),
(12678, '44424', 'Mora De Rubielos, Estacion', 44, 1),
(12679, '44430', 'Valbona', 44, 1),
(12680, '44431', 'Virgen De La Vega', 44, 1),
(12681, '44432', 'Alcala De La Selva', 44, 1),
(12682, '44433', 'Gudar', 44, 1),
(12683, '44440', 'Formiche Alto', 44, 1),
(12684, '44441', 'Formiche Bajo', 44, 1),
(12685, '44450', 'Puebla De Valverde, La', 44, 1),
(12686, '44459', 'Camarena De La Sierra', 44, 1),
(12687, '44460', 'Sarrion', 44, 1),
(12688, '44477', 'Albentosa', 44, 1),
(12689, '44478', 'Pertegaces, Los', 44, 1),
(12690, '44479', 'Olba', 44, 1),
(12691, '44480', 'San Agustin', 44, 1),
(12692, '44490', 'Ferreruela De Huerva', 44, 1),
(12693, '44491', 'Lanzuela', 44, 1),
(12694, '44491', 'Lanzuela', 44, 1),
(12695, '44491', 'Lanzuela', 44, 1),
(12696, '44492', 'Lagueruela', 44, 1),
(12697, '44492', 'Lagueruela', 44, 1),
(12698, '44492', 'Lagueruela', 44, 1),
(12699, '44493', 'Monforte De Moyuela', 44, 1),
(12700, '44493', 'Monforte De Moyuela', 44, 1),
(12701, '44493', 'Monforte De Moyuela', 44, 1),
(12702, '44494', 'Villahermosa Del Campo', 44, 1),
(12703, '44495', 'Lechago', 44, 1),
(12704, '44496', 'Navarrete Del Rio', 44, 1),
(12705, '44497', 'Santa Cruz De Nogueras', 44, 1),
(12706, '44500', 'Andorra', 44, 1),
(12707, '44509', 'Alloza', 44, 1),
(12708, '44510', 'Puebla De Hijar, La', 44, 1),
(12709, '44511', 'La Puebla de H', 44, 1),
(12710, '44520', 'Samper De Calanda', 44, 1),
(12711, '44530', 'Hijar', 44, 1),
(12712, '44540', 'Albalate Del Arzobispo', 44, 1),
(12713, '44547', 'AriÑo', 44, 1),
(12714, '44548', 'Oliete', 44, 1),
(12715, '44549', 'Alacon', 44, 1),
(12716, '44550', 'Alcorisa', 44, 1),
(12717, '44555', 'Pitarque', 44, 1),
(12718, '44556', 'Molinos', 44, 1),
(12719, '44556', 'Molinos', 44, 1),
(12720, '44557', 'Olmos, Los', 44, 1),
(12721, '44557', 'Olmos, Los', 44, 1),
(12722, '44557', 'Olmos, Los', 44, 1),
(12723, '44558', 'Gargallo', 44, 1),
(12724, '44558', 'Gargallo', 44, 1),
(12725, '44559', 'Villarluengo', 44, 1),
(12726, '44559', 'Villarluengo', 44, 1),
(12727, '44560', 'Castellote', 44, 1),
(12728, '44561', 'Seno', 44, 1),
(12729, '44562', 'LadruÑan', 44, 1),
(12730, '44563', 'Planas De Castellote, Las', 44, 1),
(12731, '44563', 'Planas De Castellote, Las', 44, 1),
(12732, '44564', 'Mas De Las Matas', 44, 1),
(12733, '44565', 'Abenfigo', 44, 1),
(12734, '44566', 'Parras De Castellote, Las', 44, 1),
(12735, '44566', 'Parras De Castellote, Las', 44, 1),
(12736, '44570', 'Calanda', 44, 1),
(12737, '44579', 'Foz Calanda', 44, 1),
(12738, '44580', 'Valderrobres', 44, 1),
(12739, '44586', 'PeÑarroya De Tastavins', 44, 1),
(12740, '44587', 'Fuentespalda', 44, 1),
(12741, '44588', 'Beceite', 44, 1),
(12742, '44589', 'Rafales', 44, 1),
(12743, '44589', 'Rafales', 44, 1),
(12744, '44590', 'Azaila', 44, 1),
(12745, '44591', 'Almochuel', 44, 1),
(12746, '44592', 'Jatiel', 44, 1),
(12747, '44592', 'Jatiel', 44, 1),
(12748, '44593', 'Urrea De Gaen', 44, 1),
(12749, '44594', 'Valdealgorfa', 44, 1),
(12750, '44595', 'Valjunquera', 44, 1),
(12751, '44596', 'Fresneda, La', 44, 1),
(12752, '44597', 'Torre Del Compte', 44, 1),
(12753, '44600', 'AlcaÑiz', 44, 1),
(12754, '44610', 'Calaceite', 44, 1),
(12755, '44620', 'Valdeltormo', 44, 1),
(12756, '44621', 'Mazaleon', 44, 1),
(12757, '44622', 'Arens De Lledo', 44, 1),
(12758, '44623', 'Cretas', 44, 1),
(12759, '44624', 'Lledo', 44, 1),
(12760, '44630', 'Castelseras', 44, 1),
(12761, '44640', 'Torrecilla De AlcaÑiz', 44, 1),
(12762, '44640', 'Torrecilla De AlcaÑiz', 44, 1),
(12763, '44641', 'Torrevelilla', 44, 1),
(12764, '44642', 'Belmonte De San Jose', 44, 1),
(12765, '44643', 'Ginebrosa, La', 44, 1),
(12766, '44643', 'Ginebrosa, La', 44, 1),
(12767, '44650', 'Fornoles', 44, 1),
(12768, '44651', 'Cerollera, La', 44, 1),
(12769, '44652', 'Monroyo', 44, 1),
(12770, '44653', 'Torre De Arcas', 44, 1),
(12771, '44660', 'Puigmoreno', 44, 1),
(12772, '44661', 'Valmuel', 44, 1),
(12773, '44700', 'Montalban', 44, 1),
(12774, '44706', 'Castel De Cabra', 44, 1),
(12775, '44707', 'Zoma, La', 44, 1),
(12776, '44707', 'Zoma, La', 44, 1),
(12777, '44708', 'Palomar De Arroyos', 44, 1),
(12778, '44709', 'Torre De Las Arcas', 44, 1),
(12779, '44709', 'Torre De Las Arcas', 44, 1),
(12780, '44710', 'Rillo', 44, 1),
(12781, '44711', 'Fuentes Calientes', 44, 1),
(12782, '44712', 'Son Del Puerto', 44, 1),
(12783, '44720', 'Pancrudo', 44, 1),
(12784, '44721', 'Corbaton', 44, 1),
(12785, '44721', 'Corbaton', 44, 1),
(12786, '44730', 'Rambla De Martin', 44, 1),
(12787, '44730', 'Rambla De Martin', 44, 1),
(12788, '44740', 'Vivel Del Rio', 44, 1),
(12789, '44741', 'Fuenferrada', 44, 1),
(12790, '44742', 'Armillas', 44, 1),
(12791, '44750', 'Martin Del Rio', 44, 1),
(12792, '44760', 'Utrillas', 44, 1),
(12793, '44761', 'Utrillas', 44, 1),
(12794, '44769', 'Parras De Martin, Las', 44, 1),
(12795, '44770', 'Escucha', 44, 1),
(12796, '44779', 'Valdeconejos', 44, 1),
(12797, '44780', 'Muniesa', 44, 1),
(12798, '44790', 'Blesa', 44, 1),
(12799, '44791', 'Maicas', 44, 1),
(12800, '44791', 'Maicas', 44, 1),
(12801, '44791', 'Maicas', 44, 1),
(12802, '44792', 'Obon', 44, 1),
(12803, '44792', 'Obon', 44, 1),
(12804, '44792', 'Obon', 44, 1),
(12805, '44793', 'Segura De BaÑos', 44, 1),
(12806, '44793', 'Segura De BaÑos', 44, 1),
(12807, '45001', 'Toledo', 45, 1),
(12808, '45002', 'Toledo', 45, 1),
(12809, '45003', 'Toledo', 45, 1),
(12810, '45004', 'Toledo', 45, 1),
(12811, '45005', 'Toledo', 45, 1),
(12812, '45006', 'Toledo', 45, 1),
(12813, '45007', 'Toledo', 45, 1),
(12814, '45008', 'Toledo', 45, 1),
(12815, '45100', 'Sonseca', 45, 1),
(12816, '45109', 'Casalgordo', 45, 1),
(12817, '45109', 'Casalgordo', 45, 1),
(12818, '45110', 'Ajofrin', 45, 1),
(12819, '45111', 'Cobisa', 45, 1),
(12820, '45112', 'Burguillos De Toledo', 45, 1),
(12821, '45113', 'Chueca', 45, 1),
(12822, '45114', 'Mazarambroz', 45, 1),
(12823, '45120', 'San Pablo De Los Montes', 45, 1),
(12824, '45120', 'San Pablo De Los Montes', 45, 1),
(12825, '45121', 'Navillas, Las', 45, 1),
(12826, '45122', 'Arges', 45, 1),
(12827, '45123', 'Layos', 45, 1),
(12828, '45123', 'Layos', 45, 1),
(12829, '45124', 'Casasbuenas', 45, 1),
(12830, '45125', 'Pulgar', 45, 1),
(12831, '45126', 'Cuerva', 45, 1),
(12832, '45126', 'Cuerva', 45, 1),
(12833, '45127', 'Ventas Con PeÑa Aguilera, Las', 45, 1),
(12834, '45128', 'Menasalbas', 45, 1),
(12835, '45130', 'Navalucillos, Los', 45, 1),
(12836, '45138', 'Robledo Del Buey', 45, 1),
(12837, '45139', 'Valdeazores', 45, 1),
(12838, '45140', 'Navalmorales, Los', 45, 1),
(12839, '45150', 'Navahermosa', 45, 1),
(12840, '45159', 'Rio Cedena, Urbanizacion', 45, 1),
(12841, '45159', 'Rio Cedena, Urbanizacion', 45, 1),
(12842, '45160', 'Guadamur', 45, 1),
(12843, '45161', 'Polan', 45, 1),
(12844, '45162', 'Noez', 45, 1),
(12845, '45163', 'Totanes', 45, 1),
(12846, '45164', 'Galvez', 45, 1),
(12847, '45165', 'San Martin De Montalban', 45, 1),
(12848, '45170', 'San Martin De Pusa', 45, 1),
(12849, '45179', 'Villarejo De Montalban', 45, 1),
(12850, '45180', 'Camarena', 45, 1),
(12851, '45181', 'Camarenilla', 45, 1),
(12852, '45182', 'Arcicollar', 45, 1),
(12853, '45183', 'Ventas De Retamosa, Las', 45, 1),
(12854, '45190', 'Nambroca', 45, 1),
(12855, '45191', 'Nieves, Las, Urbanizacion', 45, 1),
(12856, '45200', 'Illescas', 45, 1),
(12857, '45210', 'Yuncos', 45, 1),
(12858, '45211', 'Recas', 45, 1),
(12859, '45212', 'Lominchar', 45, 1),
(12860, '45213', 'Palomeque', 45, 1),
(12861, '45214', 'Cedillo Del Condado', 45, 1),
(12862, '45215', 'Viso De San Juan, El', 45, 1),
(12863, '45216', 'Carranque', 45, 1),
(12864, '45217', 'Ugena', 45, 1),
(12865, '45220', 'Yeles', 45, 1),
(12866, '45221', 'Esquivias', 45, 1),
(12867, '45222', 'Borox', 45, 1),
(12868, '45223', 'SeseÑa Viejo', 45, 1),
(12869, '45224', 'SeseÑa Nuevo', 45, 1),
(12870, '45225', 'Barcience', 45, 1),
(12871, '45230', 'Numancia De La Sagra', 45, 1),
(12872, '45240', 'Alameda De La Sagra', 45, 1),
(12873, '45250', 'AÑover De Tajo', 45, 1),
(12874, '45260', 'Villaseca De La Sagra', 45, 1),
(12875, '45270', 'Mocejon', 45, 1),
(12876, '45276', 'Mohedas de la Jara', 45, 1),
(12877, '45280', 'Olias Del Rey', 45, 1),
(12878, '45290', 'Pantoja', 45, 1),
(12879, '45291', 'Cobeja', 45, 1),
(12880, '45292', 'Aceca', 45, 1),
(12881, '45300', 'OcaÑa', 45, 1),
(12882, '45300', 'OcaÑa', 45, 1),
(12883, '45310', 'Villatobas', 45, 1),
(12884, '45311', 'Dos Barrios', 45, 1),
(12885, '45312', 'CabaÑas De Yepes', 45, 1),
(12886, '45313', 'Yepes', 45, 1),
(12887, '45314', 'Ciruelos', 45, 1),
(12888, '45340', 'Ontigola', 45, 1),
(12889, '45350', 'Noblejas', 45, 1),
(12890, '45360', 'Villarrubia De Santiago', 45, 1),
(12891, '45370', 'Santa Cruz De La Zarza', 45, 1),
(12892, '45370', 'Santa Cruz De La Zarza', 45, 1),
(12893, '45400', 'Mora', 45, 1),
(12894, '45400', 'Mora', 45, 1),
(12895, '45410', 'Villanueva De Bogas', 45, 1),
(12896, '45420', 'Almonacid De Toledo', 45, 1),
(12897, '45430', 'Mascaraque', 45, 1),
(12898, '45440', 'Villaminaya', 45, 1),
(12899, '45450', 'Orgaz', 45, 1),
(12900, '45460', 'Manzaneque', 45, 1),
(12901, '45460', 'Manzaneque', 45, 1),
(12902, '45470', 'Yebenes, Los', 45, 1),
(12903, '45479', 'Marjaliza', 45, 1),
(12904, '45480', 'Urda', 45, 1),
(12905, '45480', 'Urda', 45, 1),
(12906, '45500', 'Torrijos', 45, 1),
(12907, '45510', 'Fuensalida', 45, 1),
(12908, '45511', 'Huecas', 45, 1),
(12909, '45512', 'Portillo De Toledo, El', 45, 1),
(12910, '45513', 'Santa Cruz De Retamar', 45, 1),
(12911, '45514', 'Quismondo', 45, 1),
(12912, '45515', 'Maqueda', 45, 1),
(12913, '45516', 'Rinconada, La', 45, 1),
(12914, '45517', 'Escalonilla', 45, 1),
(12915, '45518', 'Gerindote', 45, 1),
(12916, '45519', 'Noves, Pueblo', 45, 1),
(12917, '45520', 'Villaluenga De La Sagra', 45, 1),
(12918, '45521', 'Burujon, Pueblo', 45, 1),
(12919, '45522', 'Azoverin, Pueblo', 45, 1),
(12920, '45523', 'Alcabon, Pueblo', 45, 1),
(12921, '45524', 'Rielves, Pueblo', 45, 1),
(12922, '45525', 'Barcience, Pueblo', 45, 1),
(12923, '45526', 'Santo Domingo-caudilla', 45, 1),
(12924, '45529', 'Yuncler', 45, 1),
(12925, '45530', 'Santa Olalla', 45, 1),
(12926, '45530', 'Santa Olalla', 45, 1),
(12927, '45531', 'Carmena', 45, 1),
(12928, '45532', 'Carriches', 45, 1),
(12929, '45533', 'Carpio De Tajo, El', 45, 1),
(12930, '45534', 'Mata, La', 45, 1),
(12931, '45540', 'Erustes', 45, 1),
(12932, '45540', 'Erustes', 45, 1),
(12933, '45541', 'Mesegar De Tajo', 45, 1),
(12934, '45542', 'Casar De Escalona, El', 45, 1),
(12935, '45543', 'Otero', 45, 1),
(12936, '45544', 'Domingo Perez', 45, 1),
(12937, '45551', 'Ill', 45, 1),
(12938, '45560', 'Oropesa', 45, 1),
(12939, '45567', 'Lagartera', 45, 1),
(12940, '45568', 'Ventas De San Julian, Las', 45, 1),
(12941, '45569', 'Torralba De Oropesa', 45, 1),
(12942, '45569', 'Torralba De Oropesa', 45, 1),
(12943, '45570', 'Puente Del Arzobispo, El', 45, 1),
(12944, '45571', 'Bercial De Tajo', 45, 1),
(12945, '45571', 'Bercial De Tajo', 45, 1),
(12946, '45572', 'Valdeverdeja', 45, 1),
(12947, '45572', 'Valdeverdeja', 45, 1),
(12948, '45573', 'Navalmoralejo', 45, 1),
(12949, '45574', 'Fuentes De La Estrella', 45, 1),
(12950, '45575', 'Aldeanueva De San Bartolome', 45, 1),
(12951, '45576', 'Mohedas De La Jara', 45, 1),
(12952, '45577', 'Puerto De San Vicente', 45, 1),
(12953, '45578', 'Campillo De La Jara, El', 45, 1),
(12954, '45580', 'Calzada De Oropesa', 45, 1),
(12955, '45588', 'Herreruela De Oropesa', 45, 1),
(12956, '45589', 'Caleruela', 45, 1),
(12957, '45590', 'Magan', 45, 1),
(12958, '45591', 'Yunclillos', 45, 1),
(12959, '45592', 'CabaÑas De La Sagra', 45, 1),
(12960, '45593', 'Perdices, Las, Urbanizacion', 45, 1),
(12961, '45594', 'Villamiel De Toledo', 45, 1),
(12962, '45600', 'Talavera De La Reina', 45, 1),
(12963, '45600', 'Talavera De La Reina', 45, 1),
(12964, '45610', 'Navalcan', 45, 1),
(12965, '45611', 'Parrillas', 45, 1),
(12966, '45612', 'Velada', 45, 1),
(12967, '45613', 'Gamonal', 45, 1),
(12968, '45614', 'Casar De Talavera', 45, 1),
(12969, '45620', 'Montesclaros', 45, 1),
(12970, '45621', 'Segurilla', 45, 1),
(12971, '45622', 'Mejorada', 45, 1),
(12972, '45630', 'Navamorcuende', 45, 1),
(12973, '45631', 'Almendral De La CaÑada', 45, 1),
(12974, '45632', 'Sartajada', 45, 1),
(12975, '45633', 'Iglesuela, La', 45, 1),
(12976, '45634', 'Buenaventura', 45, 1),
(12977, '45635', 'Sotillo De Las Palomas', 45, 1),
(12978, '45636', 'Marrupe', 45, 1),
(12979, '45637', 'Cervera De Los Montes', 45, 1),
(12980, '45638', 'Pepino', 45, 1),
(12981, '45640', 'Real De San Vicent, El', 45, 1),
(12982, '45641', 'Castillo De Bayuela', 45, 1),
(12983, '45642', 'Cardiel De Los Montes', 45, 1),
(12984, '45643', 'Garciotun', 45, 1),
(12985, '45644', 'NuÑo Gomez', 45, 1),
(12986, '45645', 'Hinojosa De San Vicente', 45, 1),
(12987, '45646', 'Serranillos', 45, 1),
(12988, '45650', 'Espinoso Del Rey', 45, 1),
(12989, '45651', 'Torrecilla De La Jara', 45, 1),
(12990, '45652', 'Retamoso De La Jara', 45, 1),
(12991, '45653', 'Santa Ana De Pusa', 45, 1),
(12992, '45654', 'San Bartolome De Las Abiertas', 45, 1),
(12993, '45660', 'Belvis De La Jara', 45, 1),
(12994, '45661', 'Aldeanueva De Barbarroya', 45, 1),
(12995, '45662', 'Alcaudete De La Jara', 45, 1),
(12996, '45662', 'Alcaudete De La Jara', 45, 1),
(12997, '45663', 'Membrillo, El', 45, 1),
(12998, '45664', 'Herencias, Las', 45, 1),
(12999, '45670', 'Nava De Ricomalillo, La', 45, 1),
(13000, '45671', 'Sevilleja De La Jara', 45, 1),
(13001, '45672', 'Puerto Rey', 45, 1),
(13002, '45673', 'Buenasbodas', 45, 1),
(13003, '45674', 'Robledo Del Mazo', 45, 1),
(13004, '45675', 'Hunfrias, Las', 45, 1),
(13005, '45676', 'Robledillo', 45, 1),
(13006, '45677', 'Navaltoril', 45, 1),
(13007, '45678', 'Piedraescrita', 45, 1),
(13008, '45680', 'Cebolla, Pueblo', 45, 1),
(13009, '45680', 'Cebolla, Pueblo', 45, 1),
(13010, '45682', 'Cerralbos, Los, Pueblo', 45, 1),
(13011, '45683', 'Cazalegas, Pueblo', 45, 1),
(13012, '45684', 'Lucillos, Pueblo', 45, 1),
(13013, '45685', 'Montearagon Estacion, Pueblo', 45, 1),
(13014, '45686', 'Calera Y Chozas, Pueblo', 45, 1),
(13015, '45687', 'AlcaÑizo, Pueblo', 45, 1),
(13016, '45690', 'Pueblanueva, La', 45, 1),
(13017, '45691', 'Vegas, Las', 45, 1),
(13018, '45692', 'Malpica De Tajo', 45, 1),
(13019, '45693', 'Bernuy', 45, 1),
(13020, '45694', 'Talavera La Nueva', 45, 1),
(13021, '45695', 'Alberche Del Caudillo', 45, 1),
(13022, '45700', 'Consuegra', 45, 1),
(13023, '45710', 'Madridejos', 45, 1),
(13024, '45720', 'CamuÑas', 45, 1),
(13025, '45730', 'Villafranca De Los Caballeros', 45, 1),
(13026, '45740', 'Villasequilla', 45, 1),
(13027, '45749', 'Villamuelas', 45, 1),
(13028, '45750', 'Huerta De Valdecarabanos', 45, 1),
(13029, '45750', 'Huerta De Valdecarabanos', 45, 1),
(13030, '45760', 'Guardia, La', 45, 1),
(13031, '45770', 'Romeral, El', 45, 1),
(13032, '45780', 'Tembleque', 45, 1),
(13033, '45789', 'Turleque', 45, 1),
(13034, '45790', 'Quero', 45, 1),
(13035, '45800', 'Quintanar De La Orden', 45, 1),
(13036, '45810', 'Villanueva De Alcardete', 45, 1),
(13037, '45820', 'Toboso, El', 45, 1),
(13038, '45830', 'Miguel Esteban', 45, 1),
(13039, '45840', 'Puebla De Almoradiel, La', 45, 1),
(13040, '45850', 'Villa De Don Fadrique, La', 45, 1),
(13041, '45860', 'VillacaÑas', 45, 1),
(13042, '45870', 'Lillo', 45, 1),
(13043, '45880', 'Corral De Almaguer', 45, 1),
(13044, '45890', 'Cabezamesada', 45, 1),
(13045, '45900', 'Almorox', 45, 1),
(13046, '45908', 'Paredes De Escalona', 45, 1),
(13047, '45908', 'Paredes De Escalona', 45, 1),
(13048, '45909', 'Calalberche, Urbanizacion', 45, 1),
(13049, '45910', 'Escalona', 45, 1),
(13050, '45917', 'Nombela', 45, 1),
(13051, '45918', 'Pelahustan', 45, 1),
(13052, '45919', 'Hormigos', 45, 1),
(13053, '45920', 'Torre De Esteban Hambran, La', 45, 1),
(13054, '45930', 'Mentrida', 45, 1),
(13055, '45940', 'Valmojado', 45, 1),
(13056, '45950', 'Casarrubios Del Monte', 45, 1),
(13057, '45960', 'Chozas De Canales', 45, 1),
(13058, '46001', 'Valencia', 46, 1),
(13059, '46002', 'Valencia', 46, 1),
(13060, '46003', 'Valencia', 46, 1),
(13061, '46004', 'Valencia', 46, 1),
(13062, '46005', 'Valencia', 46, 1),
(13063, '46006', 'Valencia', 46, 1),
(13064, '46007', 'Valencia', 46, 1),
(13065, '46008', 'Valencia', 46, 1),
(13066, '46009', 'Valencia', 46, 1),
(13067, '46010', 'Valencia', 46, 1),
(13068, '46011', 'Valencia', 46, 1),
(13069, '46012', 'Valencia', 46, 1),
(13070, '46013', 'Valencia', 46, 1),
(13071, '46014', 'Valencia', 46, 1),
(13072, '46014', 'Valencia', 46, 1),
(13073, '46015', 'Valencia', 46, 1),
(13074, '46016', 'Valencia', 46, 1),
(13075, '46016', 'Valencia', 46, 1),
(13076, '46017', 'Valencia', 46, 1),
(13077, '46018', 'Valencia', 46, 1),
(13078, '46019', 'Valencia', 46, 1),
(13079, '46020', 'Valencia', 46, 1),
(13080, '46021', 'Valencia', 46, 1),
(13081, '46022', 'Valencia', 46, 1),
(13082, '46023', 'Valencia', 46, 1),
(13083, '46024', 'Valencia', 46, 1),
(13084, '46025', 'Valencia', 46, 1),
(13085, '46026', 'Valencia', 46, 1),
(13086, '46035', 'Valencia', 46, 1),
(13087, '46100', 'Burjassot', 46, 1),
(13088, '46109', 'Cheste', 46, 1),
(13089, '46110', 'Godella', 46, 1),
(13090, '46111', 'Santa Barbara, Urbanitzacio', 46, 1),
(13091, '46112', 'Masarrochos', 46, 1),
(13092, '46113', 'Moncada', 46, 1),
(13093, '46114', 'Vinalesa', 46, 1),
(13094, '46115', 'Alfara Del Patriarca', 46, 1),
(13095, '46117', 'Porta Coeli', 46, 1),
(13096, '46118', 'Serra', 46, 1),
(13097, '46119', 'Naquera', 46, 1),
(13098, '46120', 'Alboraya', 46, 1),
(13099, '46128', 'Alboraia/Alboraya', 46, 1),
(13100, '46129', 'Alboraia/Alboraya', 46, 1),
(13101, '46130', 'Massamagrell', 46, 1),
(13102, '46131', 'Casas De Barcena', 46, 1),
(13103, '46131', 'Casas De Barcena', 46, 1),
(13104, '46132', 'AlmÀssera', 46, 1),
(13105, '46133', 'Meliana', 46, 1),
(13106, '46134', 'Foios', 46, 1),
(13107, '46135', 'Mahuella Tauladella Rafalell Y Vistabella', 46, 1),
(13108, '46135', 'Mahuella Tauladella Rafalell Y Vistabella', 46, 1),
(13109, '46135', 'Mahuella Tauladella Rafalell Y Vistabella', 46, 1),
(13110, '46136', 'Museros', 46, 1),
(13111, '46137', 'Puebla De Farnals, Playa', 46, 1),
(13112, '46138', 'RafelbuÑol', 46, 1),
(13113, '46139', 'Pobla De Farnals, La', 46, 1),
(13114, '46140', 'Val De La Sabina', 46, 1),
(13115, '46140', 'Val De La Sabina', 46, 1),
(13116, '46141', 'Cuesta Del Rato', 46, 1),
(13117, '46143', 'Torrebaja', 46, 1),
(13118, '46145', 'Vallanca', 46, 1),
(13119, '46146', 'Casas Bajas', 46, 1),
(13120, '46147', 'Casas Altas', 46, 1),
(13121, '46148', 'Algimia De Alfara', 46, 1),
(13122, '46149', 'Santo Espiritu Del Monte', 46, 1),
(13123, '46160', 'Vanacloig', 46, 1),
(13124, '46162', 'Pobleta De Andilla', 46, 1),
(13125, '46163', 'Marines Viejo', 46, 1),
(13126, '46164', 'Pedralba', 46, 1),
(13127, '46165', 'Bugarra', 46, 1),
(13128, '46166', 'Gestalgar', 46, 1),
(13129, '46167', 'Chulilla', 46, 1),
(13130, '46168', 'Sot De Chera', 46, 1),
(13131, '46169', 'Olocau', 46, 1),
(13132, '46169', 'Olocau', 46, 1),
(13133, '46170', 'Villar Del Arzobispo', 46, 1),
(13134, '46170', 'Villar Del Arzobispo', 46, 1),
(13135, '46171', 'Casinos', 46, 1),
(13136, '46172', 'Alcublas', 46, 1),
(13137, '46173', 'Benageber', 46, 1),
(13138, '46173', 'Benageber', 46, 1),
(13139, '46174', 'DomeÑo', 46, 1),
(13140, '46175', 'DomeÑo Antiguo', 46, 1),
(13141, '46176', 'Torrecilla', 46, 1),
(13142, '46177', 'Tuejar', 46, 1),
(13143, '46178', 'Yesa, La', 46, 1),
(13144, '46178', 'Yesa, La', 46, 1),
(13145, '46178', 'Yesa, La', 46, 1),
(13146, '46179', 'Losilla De Aras', 46, 1),
(13147, '46180', 'Benaguasil', 46, 1),
(13148, '46181', 'Benisano', 46, 1),
(13149, '46181', 'Benisano', 46, 1),
(13150, '46182', 'Vallesa, La, Urbanizacion', 46, 1),
(13151, '46183', 'Eliana, L\'', 46, 1),
(13152, '46184', 'San Antonio De Benageber', 46, 1),
(13153, '46185', 'Pobla De Vallbona, La', 46, 1),
(13154, '46185', 'Pobla De Vallbona, La', 46, 1),
(13155, '46190', 'Riba-roja De Turia', 46, 1),
(13156, '46191', 'Vilamarxant', 46, 1),
(13157, '46192', 'Monserrat', 46, 1),
(13158, '46193', 'Montroy', 46, 1),
(13159, '46194', 'Real De Montroi', 46, 1),
(13160, '46195', 'Llombai', 46, 1),
(13161, '46196', 'Catadau', 46, 1),
(13162, '46197', 'Alfarp', 46, 1),
(13163, '46198', 'Millares', 46, 1),
(13164, '46199', 'ViÑuelas', 46, 1),
(13165, '46199', 'ViÑuelas', 46, 1),
(13166, '46199', 'ViÑuelas', 46, 1),
(13167, '46200', 'Paiporta', 46, 1),
(13168, '46210', 'Picanya', 46, 1),
(13169, '46220', 'Picassent', 46, 1),
(13170, '46220', 'Picassent', 46, 1),
(13171, '46230', 'San Patricio, Urbanizacion', 46, 1),
(13172, '46240', 'Carlet', 46, 1),
(13173, '46250', 'Montortal', 46, 1),
(13174, '46250', 'Montortal', 46, 1),
(13175, '46260', 'Alberic', 46, 1),
(13176, '46266', 'Antella', 46, 1),
(13177, '46267', 'Gavarda', 46, 1),
(13178, '46268', 'Garrofera De Alzira, La', 46, 1),
(13179, '46269', 'Tous', 46, 1),
(13180, '46270', 'Villanueva De Castellon', 46, 1),
(13181, '46290', 'Alcasser', 46, 1),
(13182, '46291', 'Benimodo', 46, 1),
(13183, '46292', 'Masalaves', 46, 1),
(13184, '46293', 'Beneixida', 46, 1),
(13185, '46293', 'Beneixida', 46, 1),
(13186, '46294', 'Cotes', 46, 1),
(13187, '46294', 'Cotes', 46, 1),
(13188, '46295', 'Sumacarcer', 46, 1),
(13189, '46295', 'Sumacarcer', 46, 1),
(13190, '46300', 'Utiel', 46, 1),
(13191, '46310', 'Venta Del Moro', 46, 1),
(13192, '46311', 'Jaraguas', 46, 1),
(13193, '46312', 'Casas De Medina', 46, 1),
(13194, '46313', 'Cuevas, Las (utiel)', 46, 1),
(13195, '46314', 'Fuenterrobles', 46, 1),
(13196, '46315', 'Caudete De Las Fuentes', 46, 1),
(13197, '46317', 'Villargordo Del Cabriel', 46, 1),
(13198, '46318', 'Villargordo del Cabriel', 46, 1),
(13199, '46320', 'Sinarcas', 46, 1),
(13200, '46321', 'Torre, Aldea De La', 46, 1),
(13201, '46330', 'Camporrobles', 46, 1),
(13202, '46340', 'Requena', 46, 1),
(13203, '46350', 'Chera', 46, 1),
(13204, '46351', 'Villar De Tejas', 46, 1),
(13205, '46351', 'Villar De Tejas', 46, 1),
(13206, '46352', 'Duques, Los', 46, 1),
(13207, '46353', 'Ruices, Los', 46, 1),
(13208, '46354', 'Isidros, Los', 46, 1),
(13209, '46355', 'Pedrones, Los', 46, 1),
(13210, '46356', 'Penen De Albosa', 46, 1),
(13211, '46357', 'Portera, La', 46, 1),
(13212, '46360', 'BuÑol', 46, 1),
(13213, '46367', 'Yatova', 46, 1),
(13214, '46368', 'Macastre', 46, 1),
(13215, '46369', 'Alborache', 46, 1),
(13216, '46370', 'Chiva', 46, 1),
(13217, '46380', 'Cheste', 46, 1),
(13218, '46388', 'Godelleta', 46, 1),
(13219, '46389', 'Turis', 46, 1),
(13220, '46390', 'Turquia', 46, 1),
(13221, '46391', 'Rebollar, El', 46, 1),
(13222, '46392', 'Siete Aguas', 46, 1),
(13223, '46393', 'Loriguilla', 46, 1),
(13224, '46400', 'Cullera', 46, 1),
(13225, '46408', 'Mareny De San Lorenzo', 46, 1),
(13226, '46409', 'Marenyet, El', 46, 1),
(13227, '46410', 'Sueca', 46, 1),
(13228, '46417', 'Riola', 46, 1),
(13229, '46418', 'Fortaleny', 46, 1),
(13230, '46419', 'Palmeretes, Les', 46, 1),
(13231, '46420', 'Perello, El', 46, 1),
(13232, '46430', 'Sollana', 46, 1),
(13233, '46439', 'Romani', 46, 1),
(13234, '46440', 'Almussafes', 46, 1),
(13235, '46450', 'Benifaio', 46, 1),
(13236, '46450', 'Benifaio', 46, 1),
(13237, '46460', 'Silla', 46, 1),
(13238, '46469', 'Beniparrell', 46, 1),
(13239, '46470', 'Massanassa', 46, 1),
(13240, '46470', 'Massanassa', 46, 1),
(13241, '46470', 'Massanassa', 46, 1),
(13242, '46470', 'Massanassa', 46, 1),
(13243, '46480', 'Torrent', 46, 1),
(13244, '46500', 'Sagunt/sagunto', 46, 1),
(13245, '46501', 'Petres', 46, 1),
(13246, '46510', 'Quartell', 46, 1),
(13247, '46511', 'Benifairo De Les Valls', 46, 1),
(13248, '46512', 'Faura', 46, 1),
(13249, '46514', 'Benavites', 46, 1),
(13250, '46515', 'Quart De Les Valls', 46, 1),
(13251, '46520', 'Puerto De Sagunto', 46, 1),
(13252, '46529', 'Canet D\'en Berenguer', 46, 1),
(13253, '46530', 'PuÇol', 46, 1),
(13254, '46530', 'PuÇol', 46, 1),
(13255, '46540', 'Puig, El', 46, 1),
(13256, '46550', 'Albuixech', 46, 1),
(13257, '46560', 'Massalfassar', 46, 1),
(13258, '46590', 'Estivella', 46, 1),
(13259, '46591', 'Albalat Dels Taronchers', 46, 1),
(13260, '46592', 'Segart', 46, 1),
(13261, '46593', 'Algar De Palancia', 46, 1),
(13262, '46594', 'Alfara De La Baronia', 46, 1),
(13263, '46595', 'Torres-torres', 46, 1),
(13264, '46600', 'Alzira', 46, 1),
(13265, '46600', 'Alzira', 46, 1),
(13266, '46610', 'Guadassuar', 46, 1),
(13267, '46611', 'Benimuslem', 46, 1),
(13268, '46612', 'Corbera', 46, 1),
(13269, '46613', 'Llauri', 46, 1),
(13270, '46614', 'Favara', 46, 1),
(13271, '46620', 'Ayora', 46, 1),
(13272, '46621', 'Zarra', 46, 1),
(13273, '46622', 'Teresa De Cofrentes', 46, 1),
(13274, '46623', 'Jarafuel', 46, 1),
(13275, '46624', 'Jalance', 46, 1),
(13276, '46625', 'Salto De Cofrentes', 46, 1),
(13277, '46630', 'Font De La Figuera, La', 46, 1),
(13278, '46635', 'Poblet', 46, 1),
(13279, '46640', 'Mogente/moixent', 46, 1),
(13280, '46650', 'Canals', 46, 1),
(13281, '46659', 'Torre De CerdÀ', 46, 1),
(13282, '46660', 'Manuel', 46, 1),
(13284, '46666', 'Riu Rau', 46, 1),
(13285, '46667', 'Barxeta', 46, 1),
(13286, '46668', 'Tosalnou', 46, 1),
(13287, '46668', 'Tosalnou', 46, 1),
(13288, '46669', 'Senyera', 46, 1),
(13289, '46669', 'Senyera', 46, 1),
(13290, '46670', 'Realengo', 46, 1),
(13291, '46680', 'Carrascalet', 46, 1),
(13292, '46687', 'Albalat De La Ribera', 46, 1),
(13293, '46688', 'PolinyÀ De Xuquer', 46, 1),
(13294, '46689', 'Benicull De Xuquer', 46, 1),
(13295, '46690', 'Alcudia De Crespins, L\'', 46, 1),
(13296, '46691', 'Vallada', 46, 1),
(13297, '46692', 'Montesa', 46, 1),
(13298, '46701', 'Gandía', 46, 1),
(13299, '46702', 'Gandía', 46, 1),
(13300, '46703', 'Gandía', 46, 1),
(13301, '46710', 'Daimus, De, Playa', 46, 1),
(13302, '46711', 'Miramar, De, Playa', 46, 1),
(13303, '46711', 'Miramar, De, Playa', 46, 1),
(13304, '46712', 'Piles, De, Playa', 46, 1),
(13305, '46713', 'Bellreguard, De, Playa', 46, 1),
(13306, '46714', 'Palmera', 46, 1),
(13307, '46715', 'Alqueria De La Comtessa, L\'/alqueria De La Condesa', 46, 1),
(13308, '46716', 'Rafelcofer', 46, 1),
(13309, '46717', 'Font D\'en CarrÒs, La', 46, 1),
(13310, '46717', 'Font D\'en CarrÒs, La', 46, 1),
(13311, '46720', 'Villalonga', 46, 1),
(13312, '46721', 'Potries', 46, 1),
(13313, '46722', 'Benifla', 46, 1),
(13314, '46722', 'Benifla', 46, 1),
(13315, '46723', 'Almoines', 46, 1),
(13316, '46724', 'Palma De Gandia', 46, 1),
(13317, '46725', 'Rotova', 46, 1),
(13318, '46725', 'Rotova', 46, 1),
(13319, '46726', 'Llocnou De Sant Jeroni', 46, 1),
(13320, '46726', 'Llocnou De Sant Jeroni', 46, 1),
(13321, '46726', 'Llocnou De Sant Jeroni', 46, 1),
(13322, '46727', 'Real De Gandia', 46, 1),
(13323, '46728', 'Gandía', 46, 1),
(13324, '46729', 'Montecorona, Urbanitzacio', 46, 1),
(13325, '46730', 'Gandía', 46, 1),
(13326, '46740', 'Carcaixent', 46, 1),
(13327, '46749', 'Cogullada', 46, 1),
(13328, '46750', 'Simat De La Valldigna', 46, 1),
(13329, '46758', 'Puigmola, La', 46, 1),
(13330, '46760', 'Tavernes De La Valldigna, De, Playa', 46, 1),
(13331, '46760', 'Tavernes De La Valldigna, De, Playa', 46, 1),
(13332, '46770', 'Xeraco', 46, 1),
(13333, '46780', 'Oliva', 46, 1),
(13334, '46790', 'Xeresa', 46, 1),
(13335, '46791', 'Benifairo De La Valldigna', 46, 1),
(13336, '46792', 'Barraca D\'aigues Vives', 46, 1),
(13337, '46792', 'Barraca D\'aigues Vives', 46, 1),
(13338, '46800', 'XÀtiva', 46, 1),
(13339, '46810', 'Enguera', 46, 1),
(13340, '46811', 'Navalon De Arriba', 46, 1),
(13341, '46812', 'Aielo De Malferit', 46, 1),
(13342, '46813', 'CerdÀ', 46, 1),
(13343, '46813', 'CerdÀ', 46, 1),
(13344, '46814', 'Torrella', 46, 1),
(13345, '46814', 'Torrella', 46, 1),
(13346, '46814', 'Torrella', 46, 1),
(13347, '46815', 'Llosa De Ranes, La', 46, 1),
(13348, '46816', 'Torrent De Fenollet', 46, 1),
(13349, '46817', 'Estubeny', 46, 1),
(13350, '46818', 'Valles', 46, 1),
(13351, '46819', 'Novele/novetle', 46, 1),
(13352, '46820', 'Barrio Fuente Negra', 46, 1),
(13353, '46821', 'Chella', 46, 1),
(13354, '46822', 'Bolbaite', 46, 1),
(13355, '46823', 'Navarres', 46, 1),
(13356, '46824', 'Quesa', 46, 1),
(13357, '46825', 'Bicorp', 46, 1),
(13358, '46830', 'Beniganim', 46, 1),
(13359, '46837', 'Quatretonda', 46, 1),
(13360, '46838', 'Pinet', 46, 1),
(13361, '46838', 'Pinet', 46, 1),
(13362, '46838', 'Pinet', 46, 1),
(13363, '46839', 'Sempere', 46, 1),
(13364, '46839', 'Sempere', 46, 1),
(13365, '46839', 'Sempere', 46, 1),
(13366, '46839', 'Sempere', 46, 1),
(13367, '46840', 'Pobla Del Duc, La', 46, 1),
(13368, '46840', 'Pobla Del Duc, La', 46, 1),
(13369, '46841', 'Castello De Rugat', 46, 1),
(13370, '46842', 'Terrateig', 46, 1),
(13371, '46842', 'Terrateig', 46, 1),
(13372, '46842', 'Terrateig', 46, 1),
(13373, '46842', 'Terrateig', 46, 1),
(13374, '46842', 'Terrateig', 46, 1),
(13375, '46843', 'Salem', 46, 1),
(13376, '46843', 'Salem', 46, 1),
(13377, '46844', 'Otos', 46, 1),
(13378, '46844', 'Otos', 46, 1),
(13379, '46850', 'Olleria, L\'', 46, 1),
(13380, '46860', 'Albaida', 46, 1),
(13381, '46868', 'BÈlgida', 46, 1),
(13382, '46869', 'Carricola', 46, 1),
(13383, '46869', 'Carricola', 46, 1),
(13384, '46869', 'Carricola', 46, 1),
(13385, '46870', 'Ontinyent', 46, 1),
(13386, '46880', 'Bocairent', 46, 1),
(13387, '46890', 'Agullent', 46, 1),
(13388, '46891', 'Palomar, El', 46, 1),
(13389, '46891', 'Palomar, El', 46, 1),
(13390, '46892', 'Montaverner', 46, 1),
(13391, '46893', 'Alfarrasi', 46, 1),
(13392, '46894', 'Genoves', 46, 1),
(13393, '46900', 'Torrent', 46, 1),
(13394, '46901', 'Vedat De Torrente, El', 46, 1),
(13395, '46910', 'Sedavi', 46, 1),
(13396, '46910', 'Sedavi', 46, 1),
(13397, '46910', 'Sedavi', 46, 1),
(13398, '46910', 'Sedavi', 46, 1),
(13399, '46920', 'Mislata', 46, 1),
(13400, '46930', 'Quart De Poblet', 46, 1),
(13401, '46940', 'Raco, El, Partida', 46, 1),
(13402, '46950', 'Xirivella', 46, 1),
(13403, '46960', 'Barrio Del Cristo', 46, 1),
(13404, '46970', 'AlaquÀs', 46, 1),
(13405, '46980', 'Paterna', 46, 1),
(13406, '46988', 'Poligono Fuente Del Jarro', 46, 1),
(13407, '46989', 'Terramelar', 46, 1),
(13408, '47001', 'Valladolid', 47, 1),
(13409, '47002', 'Valladolid', 47, 1),
(13410, '47003', 'Valladolid', 47, 1),
(13411, '47004', 'Valladolid', 47, 1),
(13412, '47005', 'Valladolid', 47, 1),
(13413, '47006', 'Valladolid', 47, 1),
(13414, '47007', 'Valladolid', 47, 1),
(13415, '47008', 'Valladolid', 47, 1),
(13416, '47009', 'Valladolid', 47, 1),
(13417, '47010', 'Valladolid', 47, 1),
(13418, '47011', 'Valladolid', 47, 1),
(13419, '47012', 'Valladolid', 47, 1),
(13420, '47013', 'Valladolid', 47, 1),
(13421, '47014', 'Valladolid', 47, 1),
(13422, '47015', 'Valladolid', 47, 1),
(13423, '47016', 'Valladolid', 47, 1),
(13424, '47017', 'Valladolid', 47, 1),
(13425, '47018', 'Valladolid', 47, 1),
(13426, '47100', 'Tordesillas', 47, 1),
(13427, '47110', 'Casasola De Arion', 47, 1),
(13428, '47111', 'Villalar De Los Comuneros', 47, 1),
(13429, '47112', 'Pedrosa Del Rey', 47, 1),
(13430, '47113', 'Villavieja Del Cerro', 47, 1),
(13431, '47113', 'Villavieja Del Cerro', 47, 1),
(13432, '47114', 'Velilla', 47, 1),
(13433, '47114', 'Velilla', 47, 1),
(13434, '47114', 'Velilla', 47, 1),
(13435, '47115', 'Berceruelo', 47, 1),
(13436, '47115', 'Berceruelo', 47, 1),
(13437, '47116', 'Pollos', 47, 1),
(13438, '47120', 'Mota Del Marques', 47, 1),
(13439, '47129', 'Torrecilla De La Torre', 47, 1),
(13440, '47129', 'Torrecilla De La Torre', 47, 1),
(13441, '47129', 'Torrecilla De La Torre', 47, 1),
(13442, '47129', 'Torrecilla De La Torre', 47, 1),
(13443, '47129', 'Torrecilla De La Torre', 47, 1),
(13444, '47130', 'Simancas', 47, 1),
(13445, '47131', 'Villan De Tordesillas', 47, 1),
(13446, '47131', 'Villan De Tordesillas', 47, 1),
(13447, '47131', 'Villan De Tordesillas', 47, 1),
(13448, '47131', 'Villan De Tordesillas', 47, 1),
(13449, '47132', 'Villamarciel', 47, 1),
(13450, '47132', 'Villamarciel', 47, 1),
(13451, '47133', 'Vega De Valdetronco', 47, 1),
(13452, '47133', 'Vega De Valdetronco', 47, 1),
(13453, '47134', 'Villasexmir', 47, 1),
(13454, '47134', 'Villasexmir', 47, 1),
(13455, '47134', 'Villasexmir', 47, 1),
(13456, '47134', 'Villasexmir', 47, 1),
(13457, '47140', 'Laguna De Duero', 47, 1),
(13458, '47140', 'Laguna De Duero', 47, 1),
(13459, '47150', 'Viana De Cega', 47, 1),
(13460, '47151', 'Boecillo', 47, 1),
(13461, '47152', 'Valladolid', 47, 1),
(13462, '47153', 'Valladolid', 47, 1),
(13463, '47155', 'Santovenia De Pisuerga', 47, 1),
(13464, '47160', 'Portillo', 47, 1),
(13465, '47160', 'Portillo', 47, 1),
(13466, '47161', 'Herrera De Duero', 47, 1),
(13467, '47162', 'Aldeamayor De San Martin', 47, 1),
(13468, '47164', 'Santiago Del Arroyo', 47, 1),
(13469, '47165', 'Camporredondo', 47, 1),
(13470, '47166', 'Viloria', 47, 1),
(13471, '47169', 'Otero, El, Urbanizacion', 47, 1),
(13472, '47169', 'Otero, El, Urbanizacion', 47, 1),
(13473, '47169', 'Otero, El, Urbanizacion', 47, 1),
(13474, '47170', 'Renedo De Esgueva', 47, 1),
(13475, '47171', 'Castronuevo De Esgueva', 47, 1),
(13476, '47172', 'Villarmentero De Esgueva', 47, 1),
(13477, '47173', 'Olmos De Esgueva', 47, 1),
(13478, '47175', 'PiÑa De Esgueva', 47, 1),
(13479, '47176', 'Esguevillas De Esgueva', 47, 1),
(13480, '47177', 'Amusquillo', 47, 1),
(13481, '47180', 'Villafuerte', 47, 1),
(13482, '47181', 'Villaco', 47, 1),
(13483, '47182', 'Castroverde De Cerrato', 47, 1),
(13484, '47183', 'Torre De Esgueva', 47, 1),
(13485, '47184', 'Fombellida', 47, 1),
(13486, '47185', 'Canillas De Esgueva', 47, 1),
(13487, '47186', 'Encinas De Esgueva', 47, 1),
(13488, '47186', 'Encinas De Esgueva', 47, 1),
(13489, '47190', 'Wamba', 47, 1),
(13490, '47191', 'CiguÑuela', 47, 1),
(13491, '47192', 'Castrodeza', 47, 1),
(13492, '47193', 'Cisterniga, La', 47, 1),
(13493, '47194', 'Mucientes', 47, 1),
(13494, '47194', 'Mucientes', 47, 1),
(13495, '47195', 'Flecha, La', 47, 1),
(13496, '47196', 'Pedraja De Portillo, La', 47, 1),
(13497, '47197', 'Valladolid', 47, 1),
(13498, '47198', 'Valladolid', 47, 1),
(13499, '47200', 'Valoria La Buena', 47, 1),
(13500, '47209', 'San Martin De Valveni', 47, 1),
(13501, '47210', 'Ataquines', 47, 1),
(13502, '47219', 'San Pablo De La Moraleja', 47, 1),
(13503, '47219', 'San Pablo De La Moraleja', 47, 1),
(13504, '47219', 'San Pablo De La Moraleja', 47, 1),
(13505, '47220', 'Pozaldez', 47, 1),
(13506, '47230', 'Matapozuelos', 47, 1),
(13507, '47238', 'Hornillos De Eresma', 47, 1),
(13508, '47238', 'Hornillos De Eresma', 47, 1),
(13509, '47238', 'Hornillos De Eresma', 47, 1),
(13510, '47239', 'Villanueva De Duero', 47, 1),
(13511, '47239', 'Villanueva De Duero', 47, 1),
(13512, '47239', 'Villanueva De Duero', 47, 1),
(13513, '47240', 'Valdestillas', 47, 1),
(13514, '47250', 'Mojados', 47, 1),
(13515, '47260', 'Cabezon De Pisuerga', 47, 1),
(13516, '47270', 'Cigales', 47, 1),
(13517, '47280', 'Corcos', 47, 1),
(13518, '47281', 'Aguilarejo', 47, 1),
(13519, '47282', 'Trigueros Del Valle', 47, 1),
(13520, '47283', 'Quintanilla De Trigueros', 47, 1),
(13521, '47290', 'Cubillas De Santa Marta', 47, 1),
(13522, '47300', 'PeÑafiel', 47, 1),
(13523, '47310', 'Campaspero', 47, 1),
(13524, '47311', 'Fompedraza', 47, 1),
(13525, '47311', 'Fompedraza', 47, 1),
(13526, '47312', 'Bahabon', 47, 1),
(13527, '47313', 'Torrescarcela', 47, 1),
(13528, '47313', 'Torrescarcela', 47, 1),
(13529, '47313', 'Torrescarcela', 47, 1),
(13530, '47313', 'Torrescarcela', 47, 1),
(13531, '47314', 'Padilla De Duero', 47, 1),
(13532, '47314', 'Padilla De Duero', 47, 1),
(13533, '47314', 'Padilla De Duero', 47, 1),
(13534, '47315', 'Pesquera De Duero', 47, 1),
(13535, '47316', 'Roturas', 47, 1),
(13536, '47316', 'Roturas', 47, 1),
(13537, '47316', 'Roturas', 47, 1),
(13538, '47316', 'Roturas', 47, 1),
(13539, '47317', 'Valdearcos De La Vega', 47, 1),
(13540, '47317', 'Valdearcos De La Vega', 47, 1),
(13541, '47317', 'Valdearcos De La Vega', 47, 1),
(13542, '47317', 'Valdearcos De La Vega', 47, 1),
(13543, '47318', 'Olmos De PeÑafiel', 47, 1),
(13544, '47318', 'Olmos De PeÑafiel', 47, 1),
(13545, '47318', 'Olmos De PeÑafiel', 47, 1),
(13546, '47319', 'Torre De PeÑafiel', 47, 1),
(13547, '47319', 'Torre De PeÑafiel', 47, 1),
(13548, '47320', 'Tudela De Duero', 47, 1),
(13549, '47320', 'Tudela De Duero', 47, 1),
(13550, '47328', 'Parrilla, La', 47, 1),
(13551, '47329', 'Villavaquerin', 47, 1),
(13552, '47329', 'Villavaquerin', 47, 1),
(13553, '47329', 'Villavaquerin', 47, 1),
(13554, '47330', 'Traspinedo', 47, 1),
(13555, '47330', 'Traspinedo', 47, 1),
(13556, '47331', 'SantibaÑez De Valcorba', 47, 1),
(13557, '47340', 'Sardon De Duero', 47, 1),
(13558, '47350', 'Quintanilla De Onesimo', 47, 1),
(13559, '47359', 'Vega Sicilia', 47, 1),
(13560, '47359', 'Vega Sicilia', 47, 1),
(13561, '47360', 'Quintanilla De Arriba', 47, 1),
(13562, '47400', 'Medina Del Campo', 47, 1),
(13563, '47410', 'Olmedo', 47, 1),
(13564, '47418', 'Llano De Olmedo', 47, 1),
(13565, '47418', 'Llano De Olmedo', 47, 1),
(13566, '47418', 'Llano De Olmedo', 47, 1),
(13567, '47419', 'Puras', 47, 1),
(13568, '47419', 'Puras', 47, 1),
(13569, '47419', 'Puras', 47, 1),
(13570, '47420', 'Iscar', 47, 1),
(13571, '47428', 'Pajares de la Laguna', 37, 1),
(13572, '47430', 'Pedrajas De San Esteban', 47, 1),
(13573, '47440', 'Megeces', 47, 1),
(13574, '47440', 'Megeces', 47, 1),
(13575, '47450', 'Pozal De Gallinas', 47, 1),
(13576, '47451', 'Calabazas', 47, 1),
(13577, '47453', 'Ramiro', 47, 1),
(13578, '47454', 'Moraleja De Las Panadera', 47, 1),
(13579, '47460', 'Campillo, El', 47, 1),
(13580, '47461', 'Brahojos De Medina', 47, 1),
(13581, '47462', 'Bobadilla Del Campo', 47, 1),
(13582, '47463', 'Velascalvaro', 47, 1),
(13583, '47464', 'Nueva Villa De Las Torres', 47, 1),
(13584, '47465', 'Villaverde De Medina', 47, 1),
(13585, '47470', 'Carpio', 47, 1),
(13586, '47480', 'Fresno El Viejo', 47, 1),
(13587, '47490', 'Rueda', 47, 1),
(13588, '47491', 'Seca, La', 47, 1),
(13589, '47492', 'Rodilana', 47, 1),
(13590, '47492', 'Rodilana', 47, 1),
(13591, '47493', 'San Vicente Del Palacio', 47, 1),
(13592, '47493', 'San Vicente Del Palacio', 47, 1),
(13593, '47494', 'Rubi De Bracamonte', 47, 1),
(13594, '47494', 'Rubi De Bracamonte', 47, 1),
(13595, '47494', 'Rubi De Bracamonte', 47, 1),
(13596, '47494', 'Rubi De Bracamonte', 47, 1),
(13597, '47500', 'Nava Del Rey', 47, 1),
(13598, '47509', 'Torrecilla Del Valle', 47, 1),
(13599, '47510', 'Alaejos', 47, 1),
(13600, '47511', 'Siete Iglesias De Trabancos', 47, 1),
(13601, '47512', 'Castrejon De Trabancos', 47, 1),
(13602, '47513', 'Torrecilla De La Orden', 47, 1),
(13603, '47520', 'CastronuÑo', 47, 1),
(13604, '47529', 'Villafranca De Duero', 47, 1),
(13605, '47530', 'San Roman De La Hornija', 47, 1),
(13606, '47600', 'Villalon De Campos', 47, 1),
(13607, '47606', 'Villafrades De Campos', 47, 1),
(13608, '47606', 'Villafrades De Campos', 47, 1),
(13609, '47607', 'Villacid De Campos', 47, 1),
(13610, '47607', 'Villacid De Campos', 47, 1),
(13611, '47608', 'Villanueva De La Condesa', 47, 1),
(13612, '47608', 'Villanueva De La Condesa', 47, 1),
(13613, '47608', 'Villanueva De La Condesa', 47, 1),
(13614, '47609', 'Zorita De La Loma', 47, 1),
(13615, '47609', 'Zorita De La Loma', 47, 1),
(13616, '47609', 'Zorita De La Loma', 47, 1),
(13617, '47609', 'Zorita De La Loma', 47, 1),
(13618, '47610', 'Zaratan', 47, 1),
(13619, '47620', 'Villanubla', 47, 1),
(13620, '47630', 'Mudarra, La', 47, 1),
(13621, '47639', 'Villalba De Los Alcores', 47, 1),
(13622, '47640', 'Torozos, Monte', 47, 1),
(13623, '47641', 'Santa Espina, La', 47, 1),
(13624, '47650', 'Cuenca De Campos', 47, 1),
(13625, '47664', 'Castroponce De Valderaduey', 47, 1),
(13626, '47670', 'Union De Campos, La', 47, 1),
(13627, '47670', 'Union De Campos, La', 47, 1),
(13628, '47671', 'Urones De Castroponce', 47, 1),
(13629, '47672', 'Valdunquillo', 47, 1),
(13630, '47673', 'Roales De Campos', 47, 1),
(13631, '47673', 'Roales De Campos', 47, 1),
(13632, '47674', 'Barcial De La Loma', 47, 1),
(13633, '47675', 'Villalan De Campos', 47, 1),
(13634, '47675', 'Villalan De Campos', 47, 1),
(13635, '47676', 'Villavicencio De Los Caballeros', 47, 1),
(13636, '47680', 'Mayorga', 47, 1),
(13637, '47686', 'Melgar De Arriba', 47, 1),
(13638, '47687', 'Melgar De Abajo', 47, 1),
(13639, '47688', 'Monasterio De Vega', 47, 1),
(13640, '47689', 'Villalba De La Loma', 47, 1),
(13641, '47689', 'Villalba De La Loma', 47, 1),
(13642, '47689', 'Villalba De La Loma', 47, 1),
(13643, '47689', 'Villalba De La Loma', 47, 1),
(13644, '47690', 'Valverde De Campos', 47, 1),
(13645, '47691', 'Moral De La Reina', 47, 1),
(13646, '47692', 'Ceinos De Campos', 47, 1),
(13647, '47800', 'Medina De Rioseco', 47, 1),
(13648, '47801', 'Valladolid', 47, 1),
(13649, '47810', 'Villafrechos', 47, 1),
(13650, '47811', 'Villaesper', 47, 1),
(13651, '47811', 'Villaesper', 47, 1),
(13652, '47812', 'Palazuelo De Vedija', 47, 1),
(13653, '47813', 'Villanueva De San Mancio', 47, 1),
(13654, '47813', 'Villanueva De San Mancio', 47, 1),
(13655, '47814', 'Villamuriel De Campos', 47, 1),
(13656, '47814', 'Villamuriel De Campos', 47, 1),
(13657, '47815', 'Villabaruz De Campos', 47, 1),
(13658, '47815', 'Villabaruz De Campos', 47, 1),
(13659, '47816', 'Valdenebro De Los Valles', 47, 1),
(13660, '47816', 'Valdenebro De Los Valles', 47, 1),
(13661, '47816', 'Valdenebro De Los Valles', 47, 1),
(13662, '47820', 'Villabragima', 47, 1),
(13663, '47830', 'Tordehumos', 47, 1),
(13664, '47831', 'Pozuelo De La Orden', 47, 1),
(13665, '47832', 'Cabreros Del Monte', 47, 1),
(13666, '47840', 'Villagarcia De Campos', 47, 1),
(13667, '47850', 'Villanueva De Los Caballeros', 47, 1),
(13668, '47851', 'San Pedro De Latarce', 47, 1),
(13669, '47860', 'Villardefrades', 47, 1),
(13670, '47862', 'UrueÑa', 47, 1),
(13671, '47870', 'Tiedra', 47, 1),
(13672, '47880', 'Benafarces', 47, 1),
(13673, '47882', 'Castromembibre', 47, 1),
(13674, '47883', 'Villavellid', 47, 1),
(13675, '48001', 'Bilbao', 48, 1),
(13676, '48002', 'Bilbao', 48, 1),
(13677, '48003', 'Bilbao', 48, 1),
(13678, '48003', 'Bilbao', 48, 1),
(13679, '48004', 'Bilbao', 48, 1),
(13680, '48005', 'Bilbao', 48, 1),
(13681, '48006', 'Bilbao', 48, 1),
(13682, '48007', 'Bilbao', 48, 1),
(13683, '48008', 'Bilbao', 48, 1),
(13684, '48009', 'Bilbao', 48, 1),
(13685, '48010', 'Bilbao', 48, 1),
(13686, '48011', 'Bilbao', 48, 1),
(13687, '48012', 'Bilbao', 48, 1),
(13688, '48013', 'Bilbao', 48, 1),
(13689, '48014', 'Bilbao', 48, 1),
(13690, '48015', 'Bilbao', 48, 1),
(13691, '48100', 'Zabalondo', 48, 1),
(13692, '48110', 'Zurbao', 48, 1),
(13693, '48111', 'Unbe-mendi', 48, 1),
(13694, '48112', 'Maruri-jatabe', 48, 1),
(13695, '48113', 'Mendoza', 48, 1),
(13696, '48114', 'Olatxua-olabarri', 48, 1),
(13697, '48115', 'OÑarte', 48, 1),
(13698, '48116', 'Mandaluiz', 48, 1),
(13699, '48120', 'MeÑakabarrena', 48, 1),
(13700, '48120', 'MeÑakabarrena', 48, 1),
(13701, '48130', 'Zubiaur (bakio)', 48, 1),
(13702, '48140', 'Zelaia (arantzazu)', 48, 1),
(13703, '48140', 'Zelaia (arantzazu)', 48, 1),
(13704, '48141', 'Ugarana', 48, 1),
(13705, '48142', 'Ugarte (artea)', 48, 1),
(13706, '48143', 'Uparan', 48, 1),
(13707, '48144', 'Zeanuri', 48, 1),
(13708, '48145', 'Ubide', 48, 1),
(13709, '48150', 'Zangroiz (sondika)', 48, 1),
(13710, '48160', 'Ugaldeguren (santimami)', 48, 1),
(13711, '48160', 'Ugaldeguren (santimami)', 48, 1),
(13712, '48170', 'Zamudio', 48, 1),
(13713, '48170', 'Zamudio', 48, 1),
(13714, '48180', 'Zangroiz', 48, 1),
(13715, '48190', 'Sopuerta', 48, 1),
(13716, '48191', 'Ventorro, El', 48, 1),
(13717, '48191', 'Ventorro, El', 48, 1),
(13718, '48192', 'Sandamendi', 48, 1),
(13719, '48194', 'Zubieta (gordexola)', 48, 1),
(13720, '48195', 'Larrabetzu', 48, 1),
(13721, '48196', 'Lezama', 48, 1),
(13722, '48200', 'Momoitio', 48, 1),
(13723, '48200', 'Momoitio', 48, 1),
(13724, '48210', 'Otxandio', 48, 1),
(13725, '48212', 'MaÑaria', 48, 1),
(13726, '48213', 'Izurtza', 48, 1),
(13727, '48215', 'Santa MaÑa', 48, 1),
(13728, '48220', 'TraÑa-matiena', 48, 1),
(13729, '48230', 'San Agustin', 48, 1),
(13730, '48240', 'Sarria', 48, 1),
(13731, '48249', 'San Lorentzo', 48, 1),
(13732, '48250', 'Zaldibar', 48, 1),
(13733, '48260', 'Ermua', 48, 1),
(13734, '48269', 'Urtia, Poligono Industrial', 48, 1),
(13735, '48270', 'Markina-xemein', 48, 1),
(13736, '48276', 'Ubilla-urberuaga', 48, 1),
(13737, '48277', 'Unamuntzaga', 48, 1),
(13738, '48278', 'Zeinka-zearregi', 48, 1),
(13739, '48278', 'Zeinka-zearregi', 48, 1),
(13740, '48280', 'Lekeitio', 48, 1),
(13741, '48287', 'Ea', 48, 1),
(13742, '48288', 'Soloaran', 48, 1),
(13743, '48289', 'Zelaia (mendexa)', 48, 1),
(13744, '48289', 'Zelaia (mendexa)', 48, 1),
(13745, '48289', 'Zelaia (mendexa)', 48, 1),
(13746, '48291', 'Santiago', 48, 1),
(13747, '48292', 'Atxondo', 48, 1),
(13748, '48300', 'Zallo', 48, 1),
(13749, '48309', 'Metxika', 48, 1),
(13750, '48310', 'Elantxobe', 48, 1),
(13751, '48311', 'Natxitua', 48, 1),
(13752, '48311', 'Natxitua', 48, 1),
(13753, '48312', 'Uribarri-zabaleta', 48, 1),
(13754, '48313', 'Gabika', 48, 1),
(13755, '48314', 'Zelaieta', 48, 1),
(13756, '48315', 'SantimamiÑe', 48, 1),
(13757, '48320', 'Mendieta (ajangiz)', 48, 1),
(13758, '48330', 'Zubieta (lemoa)', 48, 1),
(13759, '48340', 'OromiÑo', 48, 1),
(13760, '48348', 'Amorebieta-Etxano', 48, 1),
(13761, '48350', 'Busturia', 48, 1),
(13762, '48360', 'Portuondo-basaran', 48, 1),
(13763, '48370', 'San Migel', 48, 1),
(13764, '48380', 'Zubero', 48, 1),
(13765, '48381', 'Totorika', 48, 1),
(13766, '48382', 'Olabe', 48, 1),
(13767, '48383', 'Zubiate (arratzu)', 48, 1),
(13768, '48390', 'Murtatza', 48, 1),
(13769, '48390', 'Murtatza', 48, 1),
(13770, '48391', 'Ibarruri', 48, 1),
(13771, '48391', 'Ibarruri', 48, 1),
(13772, '48392', 'Usparitxa', 48, 1),
(13773, '48393', 'Urberuaga', 48, 1),
(13774, '48394', 'Murueta', 48, 1),
(13775, '48395', 'Txatxarramendi', 48, 1),
(13776, '48410', 'Zubiaur (orozko)', 48, 1),
(13777, '48419', 'Urigoiti', 48, 1),
(13778, '48450', 'San Esteban (etxebarri)', 48, 1),
(13779, '48460', 'VillaÑo (cerca De)', 48, 1),
(13780, '48480', 'Zaratamo', 48, 1),
(13781, '48480', 'Zaratamo', 48, 1),
(13782, '48490', 'Ugao-miraballes', 48, 1),
(13783, '48498', 'Zuloaga', 48, 1),
(13784, '48498', 'Zuloaga', 48, 1),
(13785, '48498', 'Zuloaga', 48, 1),
(13786, '48499', 'Zubialde', 48, 1),
(13787, '48499', 'Zubialde', 48, 1),
(13788, '48500', 'Triano (abanto Zierbena)', 48, 1),
(13789, '48508', 'Zierbena', 48, 1),
(13790, '48510', 'Valle De Trapaga', 48, 1),
(13791, '48520', 'Zugaztieta', 48, 1),
(13792, '48530', 'Urioste', 48, 1),
(13793, '48540', 'Abanto y Ci', 48, 1),
(13794, '48550', 'Santelices', 48, 1),
(13795, '48600', 'Ugeraga', 48, 1),
(13796, '48610', 'Zalbide', 48, 1),
(13797, '48620', 'Urizar', 48, 1),
(13798, '48620', 'Urizar', 48, 1),
(13799, '48620', 'Urizar', 48, 1),
(13800, '48630', 'Urezarantza', 48, 1),
(13801, '48640', 'Berango', 48, 1),
(13802, '48650', 'Goierri (barrika)', 48, 1),
(13803, '48700', 'Ondarroa', 48, 1),
(13804, '48710', 'Mereludi', 48, 1),
(13805, '48800', 'PeÑueco', 48, 1),
(13806, '48810', 'Irauregi', 48, 1),
(13807, '48820', 'Zaramillo', 48, 1),
(13808, '48830', 'Sodupe', 48, 1),
(13809, '48840', 'GÜeÑes', 48, 1),
(13810, '48850', 'Aranguren', 48, 1),
(13811, '48860', 'Zalla', 48, 1),
(13812, '48869', 'Otxaran', 48, 1),
(13813, '48869', 'Otxaran', 48, 1),
(13814, '48870', 'Olabarrieta', 48, 1),
(13815, '48879', 'Traslosheros', 48, 1),
(13816, '48880', 'Turtzioz', 48, 1),
(13817, '48890', 'Suceso, El', 48, 1),
(13818, '48891', 'Valle De Carranza', 48, 1),
(13819, '48895', 'Sangrices', 48, 1),
(13820, '48901', 'Barakaldo', 48, 1),
(13821, '48902', 'Barakaldo', 48, 1),
(13822, '48903', 'Barakaldo', 48, 1),
(13823, '48910', 'Sestao', 48, 1),
(13824, '48920', 'Portugalete', 48, 1),
(13825, '48930', 'Getxo (inc. Las Arenas Y Algorta)', 48, 1),
(13826, '48940', 'Zarrageta', 48, 1),
(13827, '48950', 'Lutxana-enekuri', 48, 1),
(13828, '48960', 'Usansolo', 48, 1),
(13829, '48970', 'Urbi', 48, 1),
(13830, '48980', 'Villar, El', 48, 1),
(13831, '48990', 'Getxo (inc. Las Arenas Y Algorta)', 48, 1),
(13832, '48991', 'Getxo (inc. Las Arenas Y Algorta)', 48, 1),
(13833, '48992', 'Getxo (inc. Las Arenas Y Algorta)', 48, 1),
(13834, '48993', 'Getxo (inc. Las Arenas Y Algorta)', 48, 1),
(13835, '49001', 'Zamora', 49, 1),
(13836, '49002', 'Zamora', 49, 1),
(13837, '49003', 'Zamora', 49, 1),
(13838, '49004', 'Zamora', 49, 1),
(13839, '49005', 'Zamora', 49, 1),
(13840, '49006', 'Zamora', 49, 1),
(13841, '49007', 'Zamora', 49, 1),
(13842, '49008', 'Zamora', 49, 1),
(13843, '49009', 'Zamora', 49, 1),
(13844, '49010', 'Zamora', 49, 1),
(13845, '49011', 'Zamora', 49, 1),
(13846, '49012', 'Zamora', 49, 1),
(13847, '49013', 'Zamora', 49, 1),
(13848, '49014', 'Zamora', 49, 1),
(13849, '49015', 'Zamora', 49, 1),
(13850, '49016', 'Zamora', 49, 1),
(13851, '49017', 'Zamora', 49, 1),
(13852, '49018', 'Zamora', 49, 1),
(13853, '49019', 'Zamora', 49, 1),
(13854, '49020', 'Zamora', 49, 1),
(13855, '49021', 'Zamora', 49, 1),
(13856, '49022', 'Zamora', 49, 1),
(13857, '49023', 'Zamora', 49, 1),
(13858, '49024', 'Zamora', 49, 1);
INSERT INTO `lnx_poblaciones` (`id`, `cp`, `poblacion`, `idprov`, `idpais`) VALUES
(13859, '49025', 'Zamora', 49, 1),
(13860, '49026', 'Zamora', 49, 1),
(13861, '49027', 'Zamora', 49, 1),
(13862, '49028', 'Zamora', 49, 1),
(13863, '49029', 'Zamora', 49, 1),
(13864, '49030', 'Zamora', 49, 1),
(13865, '49031', 'Zamora', 49, 1),
(13866, '49032', 'Zamora', 49, 1),
(13867, '49100', 'Villanueva Del Campo', 49, 1),
(13868, '49110', 'Castroverde De Campos', 49, 1),
(13869, '49120', 'Molacillos', 49, 1),
(13870, '49121', 'Monfarracinos', 49, 1),
(13871, '49121', 'Monfarracinos', 49, 1),
(13872, '49122', 'Torres Del Carrizal', 49, 1),
(13873, '49123', 'Benegiles', 49, 1),
(13874, '49124', 'Aspariegos', 49, 1),
(13875, '49125', 'Cerecinos Del Carrizal', 49, 1),
(13876, '49126', 'Villalba De La Lampreana', 49, 1),
(13877, '49126', 'Villalba De La Lampreana', 49, 1),
(13878, '49127', 'Pobladura De Valderaduey', 49, 1),
(13879, '49127', 'Pobladura De Valderaduey', 49, 1),
(13880, '49128', 'CaÑizo', 49, 1),
(13881, '49129', 'Villardiga', 49, 1),
(13882, '49129', 'Villardiga', 49, 1),
(13883, '49130', 'Manganeses De La Lampreana', 49, 1),
(13884, '49131', 'Villamayor De Campos', 49, 1),
(13885, '49132', 'Villar De Fallaves', 49, 1),
(13886, '49133', 'Vega De Villalobos', 49, 1),
(13887, '49134', 'Villalobos', 49, 1),
(13888, '49135', 'Vidayanes', 49, 1),
(13889, '49135', 'Vidayanes', 49, 1),
(13890, '49135', 'Vidayanes', 49, 1),
(13891, '49136', 'Villafafila', 49, 1),
(13892, '49137', 'Villarrin De Campos', 49, 1),
(13893, '49137', 'Villarrin De Campos', 49, 1),
(13894, '49140', 'Tabara', 49, 1),
(13895, '49141', 'Faramontanos Tabara', 49, 1),
(13896, '49142', 'Pajares De La Lampreana', 49, 1),
(13897, '49143', 'Piedrahita De Castro', 49, 1),
(13898, '49144', 'San Cebrian De Castro', 49, 1),
(13899, '49145', 'San Pedro De Las Cuevas', 49, 1),
(13900, '49145', 'San Pedro De Las Cuevas', 49, 1),
(13901, '49146', 'Navianos De Alba', 49, 1),
(13902, '49147', 'Olmillos De Castro', 49, 1),
(13903, '49148', 'Santa Eulalia De Tabara', 49, 1),
(13904, '49148', 'Santa Eulalia De Tabara', 49, 1),
(13905, '49149', 'Montamarta', 49, 1),
(13906, '49150', 'Moraleja Del Vino', 49, 1),
(13907, '49151', 'Gema', 49, 1),
(13908, '49151', 'Gema', 49, 1),
(13909, '49151', 'Gema', 49, 1),
(13910, '49152', 'Sanzoles', 49, 1),
(13911, '49153', 'Venialbo', 49, 1),
(13912, '49154', 'Pego, El', 49, 1),
(13913, '49155', 'Boveda De Toro, La', 49, 1),
(13914, '49156', 'Guarrate', 49, 1),
(13915, '49157', 'Madridanos', 49, 1),
(13916, '49158', 'Villalazan', 49, 1),
(13917, '49159', 'Zamora', 49, 1),
(13918, '49160', 'Carbajales De Alba', 49, 1),
(13919, '49161', 'Santa Eufemia', 49, 1),
(13920, '49162', 'Palacios Del Pan', 49, 1),
(13921, '49162', 'Palacios Del Pan', 49, 1),
(13922, '49163', 'Manzanal Del Barco', 49, 1),
(13923, '49164', 'Videmala', 49, 1),
(13924, '49164', 'Videmala', 49, 1),
(13925, '49165', 'Villanueva De Los Corchos', 49, 1),
(13926, '49165', 'Villanueva De Los Corchos', 49, 1),
(13927, '49166', 'Villalcampo', 49, 1),
(13928, '49167', 'Salto De Esla', 49, 1),
(13929, '49170', 'Tardobispo', 49, 1),
(13930, '49171', 'Pueblica De Campean, La', 49, 1),
(13931, '49172', 'Enillas, Las', 49, 1),
(13932, '49173', 'Tuda, La', 49, 1),
(13933, '49174', 'Sobradillo De Palomares', 49, 1),
(13934, '49174', 'Sobradillo De Palomares', 49, 1),
(13935, '49176', 'Tamame', 49, 1),
(13936, '49177', 'ViÑuela De Sayago', 49, 1),
(13937, '49177', 'ViÑuela De Sayago', 49, 1),
(13938, '49177', 'ViÑuela De Sayago', 49, 1),
(13939, '49177', 'ViÑuela De Sayago', 49, 1),
(13940, '49178', 'Villardiegua Del Sierro', 49, 1),
(13941, '49180', 'Zamora', 49, 1),
(13942, '49181', 'Villaseco Del Pan', 49, 1),
(13943, '49182', 'Valdeperdices', 49, 1),
(13944, '49183', 'San Pedro De La Nave', 49, 1),
(13945, '49190', 'Morales Del Vino', 49, 1),
(13946, '49191', 'Pontejos', 49, 1),
(13947, '49191', 'Pontejos', 49, 1),
(13948, '49191', 'Pontejos', 49, 1),
(13949, '49191', 'Pontejos', 49, 1),
(13950, '49192', 'Valcabado', 49, 1),
(13951, '49192', 'Valcabado', 49, 1),
(13952, '49192', 'Valcabado', 49, 1),
(13953, '49193', 'Zamora', 49, 1),
(13954, '49200', 'Bermillo De Sayago', 49, 1),
(13955, '49210', 'Almeida De Sayago', 49, 1),
(13956, '49211', 'Villamor De Cadozos', 49, 1),
(13957, '49211', 'Villamor De Cadozos', 49, 1),
(13958, '49211', 'Villamor De Cadozos', 49, 1),
(13959, '49211', 'Villamor De Cadozos', 49, 1),
(13960, '49212', 'Muga De Sayago', 49, 1),
(13961, '49213', 'Palazuelo De Sayago', 49, 1),
(13962, '49214', 'Zafara', 49, 1),
(13963, '49215', 'Villamor De La Ladre', 49, 1),
(13964, '49215', 'Villamor De La Ladre', 49, 1),
(13965, '49216', 'Torrefrades', 49, 1),
(13966, '49216', 'Torrefrades', 49, 1),
(13967, '49220', 'Fermoselle', 49, 1),
(13968, '49230', 'Formariz', 49, 1),
(13969, '49231', 'Pinilla De Fermoselle', 49, 1),
(13970, '49232', 'Fornillos De Fermoselle', 49, 1),
(13971, '49240', 'Villar Del Buey', 49, 1),
(13972, '49250', 'Villardiegua De La Ribera', 49, 1),
(13973, '49250', 'Villardiegua De La Ribera', 49, 1),
(13974, '49251', 'Gamones', 49, 1),
(13975, '49251', 'Gamones', 49, 1),
(13976, '49252', 'Torregamones', 49, 1),
(13977, '49253', 'Moralina', 49, 1),
(13978, '49254', 'Moral De Sayago', 49, 1),
(13979, '49255', 'Ganame', 49, 1),
(13980, '49260', 'Fadon', 49, 1),
(13981, '49270', 'Sogo De Sayago', 49, 1),
(13982, '49271', 'Cernecina', 49, 1),
(13983, '49272', 'Malillos', 49, 1),
(13984, '49280', 'Pereruela', 49, 1),
(13985, '49281', 'San Roman De Los Infantes', 49, 1),
(13986, '49300', 'Puebla De Sanabria', 49, 1),
(13987, '49310', 'Mombuey', 49, 1),
(13988, '49317', 'Valdemerilla', 49, 1),
(13989, '49317', 'Valdemerilla', 49, 1),
(13990, '49318', 'Valparaiso', 49, 1),
(13991, '49318', 'Valparaiso', 49, 1),
(13992, '49318', 'Valparaiso', 49, 1),
(13993, '49319', 'Otero De Centenos', 49, 1),
(13994, '49319', 'Otero De Centenos', 49, 1),
(13995, '49320', 'Triufe', 49, 1),
(13996, '49320', 'Triufe', 49, 1),
(13997, '49321', 'San Juan De La Cuesta', 49, 1),
(13998, '49321', 'San Juan De La Cuesta', 49, 1),
(13999, '49322', 'Vime De Sanabria', 49, 1),
(14000, '49322', 'Vime De Sanabria', 49, 1),
(14001, '49323', 'Santiago De La Requejada', 49, 1),
(14002, '49324', 'Villar De Los Pisones', 49, 1),
(14003, '49324', 'Villar De Los Pisones', 49, 1),
(14004, '49325', 'San Salvador De Palazuelo', 49, 1),
(14005, '49325', 'San Salvador De Palazuelo', 49, 1),
(14006, '49326', 'Valleluengo', 49, 1),
(14007, '49327', 'UÑa De Quintana', 49, 1),
(14008, '49327', 'UÑa De Quintana', 49, 1),
(14009, '49327', 'UÑa De Quintana', 49, 1),
(14010, '49330', 'Villar De Farfon', 49, 1),
(14011, '49330', 'Villar De Farfon', 49, 1),
(14012, '49331', 'Vega De Tera', 49, 1),
(14013, '49331', 'Vega De Tera', 49, 1),
(14014, '49332', 'Camarzana', 49, 1),
(14015, '49332', 'Camarzana', 49, 1),
(14016, '49333', 'Villanueva De Las Peras', 49, 1),
(14017, '49333', 'Villanueva De Las Peras', 49, 1),
(14018, '49333', 'Villanueva De Las Peras', 49, 1),
(14019, '49334', 'Litos', 49, 1),
(14020, '49335', 'Ferreras De Arriba', 49, 1),
(14021, '49335', 'Ferreras De Arriba', 49, 1),
(14022, '49336', 'Otero De Bodas', 49, 1),
(14023, '49337', 'Villanueva De Valrojo', 49, 1),
(14024, '49337', 'Villanueva De Valrojo', 49, 1),
(14025, '49340', 'Quintanilla De Justel', 49, 1),
(14026, '49341', 'Vega Del Castillo', 49, 1),
(14027, '49341', 'Vega Del Castillo', 49, 1),
(14028, '49342', 'Villarejo De La Sierra', 49, 1),
(14029, '49342', 'Villarejo De La Sierra', 49, 1),
(14030, '49343', 'Villaverde De Justel', 49, 1),
(14031, '49344', 'Donado', 49, 1),
(14032, '49345', 'Utrera De La Encomienda', 49, 1),
(14033, '49346', 'Letrillas', 49, 1),
(14034, '49347', 'Carbajales De La Encomienda', 49, 1),
(14035, '49348', 'Rioconejos', 49, 1),
(14036, '49349', 'Anta De Rioconejos', 49, 1),
(14037, '49350', 'Puente De Sanabria, El', 49, 1),
(14038, '49352', 'Moncabril', 49, 1),
(14039, '49357', 'Valdespino', 49, 1),
(14040, '49357', 'Valdespino', 49, 1),
(14041, '49358', 'Villarino De Sanabria', 49, 1),
(14042, '49358', 'Villarino De Sanabria', 49, 1),
(14043, '49359', 'Trefacio', 49, 1),
(14044, '49359', 'Trefacio', 49, 1),
(14045, '49360', 'Rabanillo', 49, 1),
(14046, '49361', 'Vigo De Sanabria', 49, 1),
(14047, '49362', 'Robles, Los, Camping', 49, 1),
(14048, '49390', 'Sampil', 49, 1),
(14049, '49390', 'Sampil', 49, 1),
(14050, '49391', 'Rihonor De Castilla', 49, 1),
(14051, '49392', 'Santa Cruz De Abranes', 49, 1),
(14052, '49393', 'Ungilde', 49, 1),
(14053, '49394', 'Ventas De Terroso', 49, 1),
(14054, '49394', 'Ventas De Terroso', 49, 1),
(14055, '49395', 'Sotillo De Sanabria', 49, 1),
(14056, '49395', 'Sotillo De Sanabria', 49, 1),
(14057, '49396', 'San Miguel De Lomba', 49, 1),
(14058, '49400', 'Fuentesauco', 49, 1),
(14059, '49410', 'FuentelapeÑa', 49, 1),
(14060, '49419', 'Castrillo De La GuareÑa', 49, 1),
(14061, '49420', 'Vadillo De La GuareÑa', 49, 1),
(14062, '49430', 'Villaescusa', 49, 1),
(14063, '49440', 'CaÑizal', 49, 1),
(14064, '49450', 'Vallesa De La GuareÑa', 49, 1),
(14065, '49500', 'AlcaÑices', 49, 1),
(14066, '49510', 'Fonfria', 49, 1),
(14067, '49511', 'Salto De Castro', 49, 1),
(14068, '49512', 'Tolilla', 49, 1),
(14069, '49512', 'Tolilla', 49, 1),
(14070, '49512', 'Tolilla', 49, 1),
(14071, '49513', 'Samir De Los CaÑos', 49, 1),
(14072, '49513', 'Samir De Los CaÑos', 49, 1),
(14073, '49514', 'Vivinera', 49, 1),
(14074, '49514', 'Vivinera', 49, 1),
(14075, '49514', 'Vivinera', 49, 1),
(14076, '49515', 'Sejas De Aliste', 49, 1),
(14077, '49515', 'Sejas De Aliste', 49, 1),
(14078, '49516', 'Trabazos', 49, 1),
(14079, '49517', 'ViÑas De Aliste', 49, 1),
(14080, '49517', 'ViÑas De Aliste', 49, 1),
(14081, '49517', 'ViÑas De Aliste', 49, 1),
(14082, '49518', 'Villarino Tras La Sierra', 49, 1),
(14083, '49518', 'Villarino Tras La Sierra', 49, 1),
(14084, '49518', 'Villarino Tras La Sierra', 49, 1),
(14085, '49519', 'Ufones', 49, 1),
(14086, '49519', 'Ufones', 49, 1),
(14087, '49520', 'Flechas', 49, 1),
(14088, '49521', 'Villarino De Manzanos', 49, 1),
(14089, '49522', 'Torres De Aliste, Las', 49, 1),
(14090, '49523', 'Villarino Del Cebal', 49, 1),
(14091, '49524', 'Vega De Nuez', 49, 1),
(14092, '49524', 'Vega De Nuez', 49, 1),
(14093, '49525', 'Tola', 49, 1),
(14094, '49525', 'Tola', 49, 1),
(14095, '49530', 'Coreses', 49, 1),
(14096, '49539', 'Villalube', 49, 1),
(14097, '49539', 'Villalube', 49, 1),
(14098, '49539', 'Villalube', 49, 1),
(14099, '49540', 'San Martin De Tabara', 49, 1),
(14100, '49540', 'San Martin De Tabara', 49, 1),
(14101, '49540', 'San Martin De Tabara', 49, 1),
(14102, '49541', 'Vide De Alba', 49, 1),
(14103, '49542', 'Vegalatrave', 49, 1),
(14104, '49542', 'Vegalatrave', 49, 1),
(14105, '49543', 'Muga De Alba', 49, 1),
(14106, '49550', 'Sesnandez', 49, 1),
(14107, '49559', 'Valer', 49, 1),
(14108, '49560', 'San Pedro De Las Herrerias', 49, 1),
(14109, '49561', 'Boya', 49, 1),
(14110, '49562', 'Villardeciervos', 49, 1),
(14111, '49563', 'Cional', 49, 1),
(14112, '49570', 'Lubian', 49, 1),
(14113, '49571', 'Castrelos', 49, 1),
(14114, '49572', 'Tejera, La', 49, 1),
(14115, '49573', 'Hedradas, Las', 49, 1),
(14116, '49574', 'Padornelo', 49, 1),
(14117, '49580', 'Villanueva De La Sierra', 49, 1),
(14118, '49582', 'Barjacoba', 49, 1),
(14119, '49583', 'Porto', 49, 1),
(14120, '49590', 'Matilla La Seca', 49, 1),
(14121, '49590', 'Matilla La Seca', 49, 1),
(14122, '49591', 'Sarracin De Aliste', 49, 1),
(14123, '49592', 'San Vicente De La Cabeza', 49, 1),
(14124, '49592', 'San Vicente De La Cabeza', 49, 1),
(14125, '49593', 'Santa Cruz De Los Cuerragos', 49, 1),
(14126, '49594', 'Sandin', 49, 1),
(14127, '49600', 'Benavente', 49, 1),
(14128, '49610', 'SantibaÑez De Vidriales', 49, 1),
(14129, '49610', 'SantibaÑez De Vidriales', 49, 1),
(14130, '49618', 'Villaobispo De Vidriales', 49, 1),
(14131, '49618', 'Villaobispo De Vidriales', 49, 1),
(14132, '49618', 'Villaobispo De Vidriales', 49, 1),
(14133, '49619', 'San Pedro De La ViÑa', 49, 1),
(14134, '49619', 'San Pedro De La ViÑa', 49, 1),
(14135, '49620', 'Santa Cristina De La Polvorosa', 49, 1),
(14136, '49621', 'Pozuelo De Vidriales', 49, 1),
(14137, '49621', 'Pozuelo De Vidriales', 49, 1),
(14138, '49622', 'Quiruelas De Vidriales', 49, 1),
(14139, '49622', 'Quiruelas De Vidriales', 49, 1),
(14140, '49622', 'Quiruelas De Vidriales', 49, 1),
(14141, '49622', 'Quiruelas De Vidriales', 49, 1),
(14142, '49622', 'Quiruelas De Vidriales', 49, 1),
(14143, '49623', 'Vecilla De Transmonte', 49, 1),
(14144, '49623', 'Vecilla De Transmonte', 49, 1),
(14145, '49624', 'Sitrama De Tera', 49, 1),
(14146, '49624', 'Sitrama De Tera', 49, 1),
(14147, '49625', 'SantibaÑez De Tera', 49, 1),
(14148, '49626', 'Santa Marta De Tera', 49, 1),
(14149, '49626', 'Santa Marta De Tera', 49, 1),
(14150, '49626', 'Santa Marta De Tera', 49, 1),
(14151, '49627', 'San Juanico El Nuevo', 49, 1),
(14152, '49628', 'San Pedro De Ceque', 49, 1),
(14153, '49629', 'Brime De Sog', 49, 1),
(14154, '49630', 'Villalpando', 49, 1),
(14155, '49638', 'Quintanilla Del Olmo', 49, 1),
(14156, '49638', 'Quintanilla Del Olmo', 49, 1),
(14157, '49639', 'Tapioles', 49, 1),
(14158, '49639', 'Tapioles', 49, 1),
(14159, '49639', 'Tapioles', 49, 1),
(14160, '49640', 'Cerecinos De Campos', 49, 1),
(14161, '49650', 'San Esteban Del Molar', 49, 1),
(14162, '49660', 'Castropepe', 49, 1),
(14163, '49660', 'Castropepe', 49, 1),
(14164, '49670', 'Fuentes De Ropel', 49, 1),
(14165, '49680', 'Valdescorriel', 49, 1),
(14166, '49680', 'Valdescorriel', 49, 1),
(14167, '49690', 'San Cristobal De EntreviÑas', 49, 1),
(14168, '49691', 'Santa Colomba De Las Carabias', 49, 1),
(14169, '49692', 'Matilla De Arzon', 49, 1),
(14170, '49693', 'Vecilla De La Polvorosa', 49, 1),
(14171, '49693', 'Vecilla De La Polvorosa', 49, 1),
(14172, '49694', 'Manganeses De La Polvorosa', 49, 1),
(14173, '49695', 'VillaferrueÑa', 49, 1),
(14174, '49696', 'Santa Maria De La Vega', 49, 1),
(14175, '49696', 'Santa Maria De La Vega', 49, 1),
(14176, '49696', 'Santa Maria De La Vega', 49, 1),
(14177, '49697', 'Villaveza De Valverde', 49, 1),
(14178, '49697', 'Villaveza De Valverde', 49, 1),
(14179, '49697', 'Villaveza De Valverde', 49, 1),
(14180, '49697', 'Villaveza De Valverde', 49, 1),
(14181, '49697', 'Villaveza De Valverde', 49, 1),
(14182, '49698', 'Olmillos De Valverde', 49, 1),
(14183, '49698', 'Olmillos De Valverde', 49, 1),
(14184, '49698', 'Olmillos De Valverde', 49, 1),
(14185, '49698', 'Olmillos De Valverde', 49, 1),
(14186, '49699', 'Villanueva De Azoague', 49, 1),
(14187, '49699', 'Villanueva De Azoague', 49, 1),
(14188, '49699', 'Villanueva De Azoague', 49, 1),
(14189, '49699', 'Villanueva De Azoague', 49, 1),
(14190, '49700', 'Corrales Del Vino', 49, 1),
(14191, '49706', 'Peleas De Arriba', 49, 1),
(14192, '49707', 'Santa Clara De Avedillo', 49, 1),
(14193, '49708', 'Villanueva De Campean', 49, 1),
(14194, '49708', 'Villanueva De Campean', 49, 1),
(14195, '49709', 'CabaÑas De Sayago', 49, 1),
(14196, '49710', 'Cubo De Tierra Del Vino, El', 49, 1),
(14197, '49714', 'Fuentespreadas', 49, 1),
(14198, '49715', 'PiÑero, El', 49, 1),
(14199, '49716', 'Argujillo', 49, 1),
(14200, '49717', 'San Miguel De La Ribera', 49, 1),
(14201, '49717', 'San Miguel De La Ribera', 49, 1),
(14202, '49718', 'Mayalde', 49, 1),
(14203, '49719', 'Villamor De Los Escuderos', 49, 1),
(14204, '49719', 'Villamor De Los Escuderos', 49, 1),
(14205, '49720', 'Perdigon, El', 49, 1),
(14206, '49721', 'Entrala', 49, 1),
(14207, '49722', 'San Marcial', 49, 1),
(14208, '49730', 'Cubillos', 49, 1),
(14209, '49731', 'Moreruela De Los Infanzones', 49, 1),
(14210, '49740', 'Granja De Moreruela', 49, 1),
(14211, '49741', 'Tabla, La', 49, 1),
(14212, '49742', 'Riego Del Camino', 49, 1),
(14213, '49743', 'Fontanillas De Castro', 49, 1),
(14214, '49750', 'Santovenia', 49, 1),
(14215, '49751', 'Breto', 49, 1),
(14216, '49760', 'Villaveza Del Agua', 49, 1),
(14217, '49760', 'Villaveza Del Agua', 49, 1),
(14218, '49770', 'Villabrazaro', 49, 1),
(14219, '49780', 'Pobladura Del Valle', 49, 1),
(14220, '49781', 'Torre Del Valle, La', 49, 1),
(14221, '49782', 'San Roman Del Valle', 49, 1),
(14222, '49783', 'Maire De Castroponce', 49, 1),
(14223, '49783', 'Maire De Castroponce', 49, 1),
(14224, '49800', 'Toro', 49, 1),
(14225, '49810', 'Morales De Toro', 49, 1),
(14226, '49820', 'Villabuena Del Puente', 49, 1),
(14227, '49820', 'Villabuena Del Puente', 49, 1),
(14228, '49830', 'Belver De Los Montes', 49, 1),
(14229, '49831', 'Bustillo Del Oro', 49, 1),
(14230, '49832', 'Malva', 49, 1),
(14231, '49833', 'Fuentesecas', 49, 1),
(14232, '49834', 'Abezames', 49, 1),
(14233, '49835', 'Pozoantiguo', 49, 1),
(14234, '49836', 'Tagarabuena', 49, 1),
(14235, '49840', 'Vezdemarban', 49, 1),
(14236, '49850', 'Pinilla De Toro', 49, 1),
(14237, '49860', 'Villalonso', 49, 1),
(14238, '49870', 'Villavendimio', 49, 1),
(14239, '49871', 'Villardondiego', 49, 1),
(14240, '49880', 'Peleagonzalo', 49, 1),
(14241, '49881', 'Monte La Reina', 49, 1),
(14242, '49882', 'Valdefinjas', 49, 1),
(14243, '50001', 'Zaragoza', 50, 1),
(14244, '50002', 'Zaragoza', 50, 1),
(14245, '50003', 'Zaragoza', 50, 1),
(14246, '50004', 'Zaragoza', 50, 1),
(14247, '50005', 'Zaragoza', 50, 1),
(14248, '50006', 'Zaragoza', 50, 1),
(14249, '50007', 'Zaragoza', 50, 1),
(14250, '50008', 'Zaragoza', 50, 1),
(14251, '50009', 'Zaragoza', 50, 1),
(14252, '50010', 'Zaragoza', 50, 1),
(14253, '50011', 'Zaragoza', 50, 1),
(14254, '50012', 'Zaragoza', 50, 1),
(14255, '50013', 'Zaragoza', 50, 1),
(14256, '50014', 'Zaragoza', 50, 1),
(14257, '50015', 'Zaragoza', 50, 1),
(14258, '50016', 'Zaragoza', 50, 1),
(14259, '50017', 'Zaragoza', 50, 1),
(14260, '50018', 'Zaragoza', 50, 1),
(14261, '50019', 'Zaragoza', 50, 1),
(14262, '50020', '\"Urbanizacion \"\"el Zorongo\"\", Nucleo\"', 50, 1),
(14263, '50021', 'Zaragoza', 50, 1),
(14264, '50022', 'Zaragoza', 50, 1),
(14265, '50057', 'Zaragoza', 50, 1),
(14266, '50059', 'Zaragoza', 50, 1),
(14267, '50100', 'Almunia De DoÑa Godina, La', 50, 1),
(14268, '50108', 'Almonacid De La Sierra', 50, 1),
(14269, '50109', 'Alpartir', 50, 1),
(14270, '50120', 'Monzalbarba', 50, 1),
(14271, '50130', 'Belchite', 50, 1),
(14272, '50131', 'Lecera', 50, 1),
(14273, '50132', 'Codo', 50, 1),
(14274, '50133', 'Almonacid De La Cuba', 50, 1),
(14275, '50134', 'Samper De Salz', 50, 1),
(14276, '50134', 'Samper De Salz', 50, 1),
(14277, '50135', 'Mediana De Aragon', 50, 1),
(14278, '50135', 'Mediana De Aragon', 50, 1),
(14279, '50136', 'Letux', 50, 1),
(14280, '50137', 'Puebla De Alborton', 50, 1),
(14281, '50138', 'Valmadrid', 50, 1),
(14282, '50139', 'Torrecilla De Valmadrid', 50, 1),
(14283, '50140', 'Azuara', 50, 1),
(14284, '50141', 'Jaulin', 50, 1),
(14285, '50142', 'Fuendetodos', 50, 1),
(14286, '50143', 'Plenas', 50, 1),
(14287, '50143', 'Plenas', 50, 1),
(14288, '50144', 'Moneva', 50, 1),
(14289, '50150', 'Herrera De Los Navarros', 50, 1),
(14290, '50151', 'Luesma', 50, 1),
(14291, '50152', 'Mezalocha', 50, 1),
(14292, '50153', 'Villanueva Del Huerva', 50, 1),
(14293, '50154', 'Tosos', 50, 1),
(14294, '50155', 'Aguilon', 50, 1),
(14295, '50156', 'Villar De Los Navarros', 50, 1),
(14296, '50160', 'LeciÑena', 50, 1),
(14297, '50160', 'LeciÑena', 50, 1),
(14298, '50161', 'Perdiguera', 50, 1),
(14299, '50162', 'Villamayor De Gallego', 50, 1),
(14300, '50163', 'Farlete', 50, 1),
(14301, '50164', 'Monegrillo', 50, 1),
(14302, '50170', 'Mequinenza', 50, 1),
(14303, '50170', 'Mequinenza', 50, 1),
(14304, '50171', 'Puebla De Alfinden, La', 50, 1),
(14305, '50172', 'Alfajarin', 50, 1),
(14306, '50173', 'Nuez De Ebro', 50, 1),
(14307, '50174', 'Villafranca De Ebro', 50, 1),
(14308, '50175', 'Osera', 50, 1),
(14309, '50177', 'Bujaraloz', 50, 1),
(14310, '50178', 'Almolda, La', 50, 1),
(14311, '50180', 'Utebo', 50, 1),
(14312, '50190', 'Zaragoza', 50, 1),
(14313, '50191', 'Barrio De Juslibol', 50, 1),
(14314, '50193', 'PeÑaflor De Gallego', 50, 1),
(14315, '50194', 'Movera', 50, 1),
(14316, '50195', 'Pastriz', 50, 1),
(14317, '50196', 'Muela, La', 50, 1),
(14318, '50200', 'Ateca', 50, 1),
(14319, '50210', 'Nuevalos', 50, 1),
(14320, '50211', 'Castejon De Las Armas', 50, 1),
(14321, '50212', 'Carenas', 50, 1),
(14322, '50213', 'Monterde', 50, 1),
(14323, '50213', 'Monterde', 50, 1),
(14324, '50213', 'Monterde', 50, 1),
(14325, '50214', 'Campillo De Aragon', 50, 1),
(14326, '50215', 'Moros', 50, 1),
(14327, '50216', 'Villalengua', 50, 1),
(14328, '50217', 'Torrijo De La CaÑada', 50, 1),
(14329, '50219', 'VilueÑa, La', 50, 1),
(14330, '50219', 'VilueÑa, La', 50, 1),
(14331, '50219', 'VilueÑa, La', 50, 1),
(14332, '50220', 'Ariza', 50, 1),
(14333, '50227', 'Sisamon', 50, 1),
(14334, '50228', 'Cabolafuente', 50, 1),
(14335, '50229', 'Bordalba', 50, 1),
(14336, '50230', 'Alhama De Aragon', 50, 1),
(14337, '50236', 'Ibdes', 50, 1),
(14338, '50237', 'Jaraba', 50, 1),
(14339, '50238', 'Jaraba (baÑos De La Virgen)', 50, 1),
(14340, '50238', 'Jaraba (baÑos De La Virgen)', 50, 1),
(14341, '50239', 'Embid De Ariza', 50, 1),
(14342, '50239', 'Embid De Ariza', 50, 1),
(14343, '50239', 'Embid De Ariza', 50, 1),
(14344, '50240', 'Mores', 50, 1),
(14345, '50240', 'Mores', 50, 1),
(14346, '50246', 'Brea De Aragon', 50, 1),
(14347, '50247', 'Purroy De Jalon', 50, 1),
(14348, '50248', 'Sestrica', 50, 1),
(14349, '50249', 'Viver De La Sierra', 50, 1),
(14350, '50250', 'Illueca', 50, 1),
(14351, '50257', 'Gotor', 50, 1),
(14352, '50258', 'Oseja', 50, 1),
(14353, '50258', 'Oseja', 50, 1),
(14354, '50259', 'Pomer', 50, 1),
(14355, '50259', 'Pomer', 50, 1),
(14356, '50260', 'Morata De Jalon', 50, 1),
(14357, '50266', 'Arandiga', 50, 1),
(14358, '50267', 'Mesones De Isuela', 50, 1),
(14359, '50268', 'Trasobares', 50, 1),
(14360, '50268', 'Trasobares', 50, 1),
(14361, '50268', 'Trasobares', 50, 1),
(14362, '50269', 'Tierga', 50, 1),
(14363, '50269', 'Tierga', 50, 1),
(14364, '50269', 'Tierga', 50, 1),
(14365, '50270', 'Ricla', 50, 1),
(14366, '50280', 'Calatorao', 50, 1),
(14367, '50290', 'Epila', 50, 1),
(14368, '50291', 'Monreal De Ariza', 50, 1),
(14369, '50292', 'Cetina', 50, 1),
(14370, '50293', 'Terrer', 50, 1),
(14371, '50294', 'Salillas De Jalon', 50, 1),
(14372, '50294', 'Salillas De Jalon', 50, 1),
(14373, '50295', 'Rueda De Jalon', 50, 1),
(14374, '50295', 'Rueda De Jalon', 50, 1),
(14375, '50296', 'Urrea De Jalon', 50, 1),
(14376, '50296', 'Urrea De Jalon', 50, 1),
(14377, '50296', 'Urrea De Jalon', 50, 1),
(14378, '50297', 'Pleitas', 50, 1),
(14379, '50297', 'Pleitas', 50, 1),
(14380, '50297', 'Pleitas', 50, 1),
(14381, '50298', 'Pinseque', 50, 1),
(14382, '50299', 'SabiÑan', 50, 1),
(14383, '50299', 'SabiÑan', 50, 1),
(14384, '50299', 'SabiÑan', 50, 1),
(14385, '50300', 'Calatayud', 50, 1),
(14386, '50310', 'Villarroya De La Sierra', 50, 1),
(14387, '50311', 'Torralba De Ribota', 50, 1),
(14388, '50312', 'Cervera De La CaÑada', 50, 1),
(14389, '50313', 'AniÑon', 50, 1),
(14390, '50314', 'Clares De Ribota', 50, 1),
(14391, '50315', 'Malanquilla', 50, 1),
(14392, '50316', 'Torrelapaja', 50, 1),
(14393, '50316', 'Torrelapaja', 50, 1),
(14394, '50316', 'Torrelapaja', 50, 1),
(14395, '50320', 'Frasno, El', 50, 1),
(14396, '50321', 'El Frasno', 50, 1),
(14397, '50322', 'Aluenda', 50, 1),
(14398, '50323', 'Inoges', 50, 1),
(14399, '50324', 'Viver De Vicort', 50, 1),
(14400, '50325', 'Tobed', 50, 1),
(14401, '50326', 'Codos', 50, 1),
(14402, '50330', 'Miedes De Aragon', 50, 1),
(14403, '50331', 'Ruesca', 50, 1),
(14404, '50331', 'Ruesca', 50, 1),
(14405, '50331', 'Ruesca', 50, 1),
(14406, '50332', 'Belmonte De Gracian', 50, 1),
(14407, '50333', 'Villalba De Perejiles', 50, 1),
(14408, '50334', 'Sediles', 50, 1),
(14409, '50335', 'Calatayud', 50, 1),
(14410, '50336', 'Huermeda', 50, 1),
(14411, '50340', 'Maluenda', 50, 1),
(14412, '50341', 'Olves', 50, 1),
(14413, '50342', 'Paracuellos De Jiloca', 50, 1),
(14414, '50343', 'Velilla De Jiloca', 50, 1),
(14415, '50344', 'Morata De Jiloca', 50, 1),
(14416, '50345', 'Alarba', 50, 1),
(14417, '50346', 'Castejon De Alarba', 50, 1),
(14418, '50347', 'Acered', 50, 1),
(14419, '50348', 'Atea', 50, 1),
(14420, '50351', 'Cubel', 50, 1),
(14421, '50360', 'Daroca', 50, 1),
(14422, '50366', 'Orcajo', 50, 1),
(14423, '50366', 'Orcajo', 50, 1),
(14424, '50366', 'Orcajo', 50, 1),
(14425, '50366', 'Orcajo', 50, 1),
(14426, '50367', 'Retascon', 50, 1),
(14427, '50367', 'Retascon', 50, 1),
(14428, '50368', 'Villarroya Del Campo', 50, 1),
(14429, '50368', 'Villarroya Del Campo', 50, 1),
(14430, '50368', 'Villarroya Del Campo', 50, 1),
(14431, '50368', 'Villarroya Del Campo', 50, 1),
(14432, '50369', 'Nombrevilla', 50, 1),
(14433, '50369', 'Nombrevilla', 50, 1),
(14434, '50369', 'Nombrevilla', 50, 1),
(14435, '50370', 'Villanueva De Jiloca', 50, 1),
(14436, '50371', 'Valdehorna', 50, 1),
(14437, '50372', 'Val De San Martin', 50, 1),
(14438, '50373', 'Santed', 50, 1),
(14439, '50373', 'Santed', 50, 1),
(14440, '50373', 'Santed', 50, 1),
(14441, '50373', 'Santed', 50, 1),
(14442, '50374', 'Used', 50, 1),
(14443, '50374', 'Used', 50, 1),
(14444, '50374', 'Used', 50, 1),
(14445, '50375', 'Abanto', 50, 1),
(14446, '50390', 'Fuentes De Jiloca', 50, 1),
(14447, '50391', 'Villafeliche', 50, 1),
(14448, '50391', 'Villafeliche', 50, 1),
(14449, '50400', 'CariÑena', 50, 1),
(14450, '50408', 'Aguaron', 50, 1),
(14451, '50409', 'Cosuenda', 50, 1),
(14452, '50410', 'Cuarte De Huerva', 50, 1),
(14453, '50420', 'Cadrete', 50, 1),
(14454, '50430', 'Maria De Huerva', 50, 1),
(14455, '50440', 'Mozota', 50, 1),
(14456, '50441', 'Botorrita', 50, 1),
(14457, '50450', 'Muel', 50, 1),
(14458, '50460', 'Longares', 50, 1),
(14459, '50461', 'Alfamen', 50, 1),
(14460, '50470', 'Encinacorba', 50, 1),
(14461, '50480', 'Paniza', 50, 1),
(14462, '50481', 'Aladren', 50, 1),
(14463, '50482', 'Vistabella', 50, 1),
(14464, '50490', 'Villarreal De Huerva', 50, 1),
(14465, '50490', 'Villarreal De Huerva', 50, 1),
(14466, '50491', 'Romanos', 50, 1),
(14467, '50491', 'Romanos', 50, 1),
(14468, '50491', 'Romanos', 50, 1),
(14469, '50500', 'Tarazona', 50, 1),
(14470, '50510', 'Novallas', 50, 1),
(14471, '50511', 'Malon', 50, 1),
(14472, '50512', 'Torrellas', 50, 1),
(14473, '50512', 'Torrellas', 50, 1),
(14474, '50513', 'Vierlas', 50, 1),
(14475, '50513', 'Vierlas', 50, 1),
(14476, '50513', 'Vierlas', 50, 1),
(14477, '50513', 'Vierlas', 50, 1),
(14478, '50513', 'Vierlas', 50, 1),
(14479, '50514', 'Tortoles', 50, 1),
(14480, '50520', 'Magallon', 50, 1),
(14481, '50529', 'Pozuelo De Aragon', 50, 1),
(14482, '50529', 'Pozuelo De Aragon', 50, 1),
(14483, '50529', 'Pozuelo De Aragon', 50, 1),
(14484, '50530', 'Novillas', 50, 1),
(14485, '50540', 'Borja', 50, 1),
(14486, '50540', 'Borja', 50, 1),
(14487, '50546', 'Talamantes', 50, 1),
(14488, '50546', 'Talamantes', 50, 1),
(14489, '50546', 'Talamantes', 50, 1),
(14490, '50547', 'Tabuenca', 50, 1),
(14491, '50547', 'Tabuenca', 50, 1),
(14492, '50548', 'Nuestra SeÑora Misericordia', 50, 1),
(14493, '50549', 'Malejan', 50, 1),
(14494, '50549', 'Malejan', 50, 1),
(14495, '50550', 'Mallen', 50, 1),
(14496, '50560', 'Agon', 50, 1),
(14497, '50561', 'Bisimbre', 50, 1),
(14498, '50562', 'Frescano', 50, 1),
(14499, '50570', 'Ainzon', 50, 1),
(14500, '50580', 'Vera De Moncayo', 50, 1),
(14501, '50581', 'Lituenigo', 50, 1),
(14502, '50582', 'Litago', 50, 1),
(14503, '50582', 'Litago', 50, 1),
(14504, '50583', 'Trasmoz', 50, 1),
(14505, '50584', 'San Martin De La Virgen De Moncayo', 50, 1),
(14506, '50590', 'AÑon De Moncayo', 50, 1),
(14507, '50590', 'AÑon De Moncayo', 50, 1),
(14508, '50591', 'Alcala De Moncayo', 50, 1),
(14509, '50600', 'Ejea De Los Caballeros', 50, 1),
(14510, '50610', 'Luna', 50, 1),
(14511, '50610', 'Luna', 50, 1),
(14512, '50611', 'Erla', 50, 1),
(14513, '50611', 'Erla', 50, 1),
(14514, '50612', 'Sierra De Luna', 50, 1),
(14515, '50612', 'Sierra De Luna', 50, 1),
(14516, '50613', 'Castej', 50, 1),
(14517, '50614', 'Puendeluna', 50, 1),
(14518, '50614', 'Puendeluna', 50, 1),
(14519, '50615', 'Valpalmas', 50, 1),
(14520, '50615', 'Valpalmas', 50, 1),
(14521, '50616', 'Piedratajada', 50, 1),
(14522, '50616', 'Piedratajada', 50, 1),
(14523, '50617', 'ValareÑa', 50, 1),
(14524, '50619', 'Rivas', 50, 1),
(14525, '50619', 'Rivas', 50, 1),
(14526, '50619', 'Rivas', 50, 1),
(14527, '50619', 'Rivas', 50, 1),
(14528, '50619', 'Rivas', 50, 1),
(14529, '50620', 'Casetas', 50, 1),
(14530, '50629', 'Sobradiel', 50, 1),
(14531, '50630', 'Alagon', 50, 1),
(14532, '50637', 'Remolinos', 50, 1),
(14533, '50638', 'CabaÑas De Ebro', 50, 1),
(14534, '50639', 'Figueruelas', 50, 1),
(14535, '50640', 'Luceni', 50, 1),
(14536, '50641', 'BoquiÑeni', 50, 1),
(14537, '50650', 'Gallur', 50, 1),
(14538, '50660', 'Tauste', 50, 1),
(14539, '50667', 'Pradilla de Ebro', 50, 1),
(14540, '50668', 'Pradilla De Ebro', 50, 1),
(14541, '50669', 'Santa Engracia', 50, 1),
(14542, '50670', 'Sadaba', 50, 1),
(14543, '50678', 'Uncastillo', 50, 1),
(14544, '50679', 'Layana', 50, 1),
(14545, '50679', 'Layana', 50, 1),
(14546, '50680', 'Sos Del Rey Catolico', 50, 1),
(14547, '50682', 'Tiermas', 50, 1),
(14548, '50683', 'Mianos', 50, 1),
(14549, '50683', 'Mianos', 50, 1),
(14550, '50683', 'Mianos', 50, 1),
(14551, '50684', 'Salvatierra De Esca', 50, 1),
(14552, '50685', 'Urries', 50, 1),
(14553, '50685', 'Urries', 50, 1),
(14554, '50685', 'Urries', 50, 1),
(14555, '50685', 'Urries', 50, 1),
(14556, '50686', 'Navardun', 50, 1),
(14557, '50687', 'Lobera De Onsella', 50, 1),
(14558, '50687', 'Lobera De Onsella', 50, 1),
(14559, '50688', 'Longas', 50, 1),
(14560, '50689', 'Undues De Lerda', 50, 1),
(14561, '50689', 'Undues De Lerda', 50, 1),
(14562, '50690', 'Pedrola', 50, 1),
(14563, '50691', 'Alcala De Ebro', 50, 1),
(14564, '50692', 'Villarrapa', 50, 1),
(14565, '50692', 'Villarrapa', 50, 1),
(14566, '50693', 'Torres De Berrellen', 50, 1),
(14567, '50694', 'Pinsoro', 50, 1),
(14568, '50695', 'Malpica De Arba', 50, 1),
(14569, '50696', 'Sofuentes', 50, 1),
(14570, '50696', 'Sofuentes', 50, 1),
(14571, '50697', 'Sos del Rey Cat', 50, 1),
(14572, '50700', 'Caspe', 50, 1),
(14573, '50709', 'Zaragoceta', 50, 1),
(14574, '50710', 'Maella', 50, 1),
(14575, '50720', 'Cartuja Baja', 50, 1),
(14576, '50720', 'Cartuja Baja', 50, 1),
(14577, '50730', 'Burgo De Ebro, El', 50, 1),
(14578, '50740', 'Fuentes De Ebro', 50, 1),
(14579, '50750', 'Pina De Ebro', 50, 1),
(14580, '50760', 'Velilla De Ebro', 50, 1),
(14581, '50770', 'Quinto', 50, 1),
(14582, '50780', 'Sastago', 50, 1),
(14583, '50781', 'Alborge', 50, 1),
(14584, '50782', 'Cinco Olivas', 50, 1),
(14585, '50783', 'Alforque', 50, 1),
(14586, '50784', 'Zaida, La', 50, 1),
(14587, '50786', 'Gelsa', 50, 1),
(14588, '50790', 'Escatron', 50, 1),
(14589, '50791', 'Escatr', 50, 1),
(14590, '50792', 'Chiprana', 50, 1),
(14591, '50793', 'Fabara', 50, 1),
(14592, '50794', 'Nonaspe', 50, 1),
(14593, '50795', 'Fayon', 50, 1),
(14594, '50800', 'Zuera', 50, 1),
(14595, '50810', 'Ontinar De Salz', 50, 1),
(14596, '50820', 'San Juan Mozarrifar', 50, 1),
(14597, '50830', 'Villanueva De Gallego', 50, 1),
(14598, '50830', 'Villanueva De Gallego', 50, 1),
(14599, '50830', 'Villanueva De Gallego', 50, 1),
(14600, '50840', 'San Mateo De Gallego', 50, 1),
(14601, '50850', 'Murillo de G', 50, 1),
(14602, '50850', 'Santa Eulalia de G', 50, 1),
(14603, '51001', 'Ceuta', 51, 1),
(14604, '51002', 'Ceuta', 51, 1),
(14605, '51003', 'Ceuta', 51, 1),
(14606, '51004', 'Ceuta', 51, 1),
(14607, '51005', 'Ceuta', 51, 1),
(14608, '52001', 'Melilla', 52, 1),
(14609, '52002', 'Melilla', 52, 1),
(14610, '52003', 'Melilla', 52, 1),
(14611, '52004', 'Melilla', 52, 1),
(14612, '52005', 'Melilla', 52, 1),
(14613, '52006', 'Melilla', 52, 1),
(14614, '08225', 'Terrassa', 0, 1),
(14615, '', '', 0, 0),
(14616, '08225', 'Terrassa', 15, 1);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pos_terminales`
--

CREATE TABLE `lnx_pos_terminales` (
  `id` int(11) NOT NULL,
  `idtienda` int(11) NOT NULL,
  `idalmacen` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lnx_pos_terminales` (`id`, `idtienda`, `idalmacen`, `descripcion`) VALUES
(1, 1, 1, 'Caja 1');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_printjobs`
--

CREATE TABLE `lnx_printjobs` (
  `id` int(11) NOT NULL,
  `idprinter` int(11) NOT NULL,
  `printfile` varchar(50) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `display` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_productos`
--

CREATE TABLE `lnx_productos` (
  `id` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `codventa` varchar(10) NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `stock_ctrl` int(11) NOT NULL,
  `precio` float NOT NULL,
  `id_fabricante` int(11) NOT NULL,
  `id_tipoarticulo` int(11) NOT NULL,
  `preciotax` float NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `peso` float NOT NULL,
  `profundidad` float NOT NULL,
  `ancho` float NOT NULL,
  `alto` float NOT NULL, 
  `notas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_productos_pro`
--

CREATE TABLE `lnx_productos_pro` (
  `id` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `precio` float NOT NULL DEFAULT '0',
  `referencia` varchar(20) DEFAULT NULL,
  `ultactu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_productos_tax`
--

CREATE TABLE `lnx_productos_tax` (
  `id` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idtax` int(11) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_productos_tipo`
--

CREATE TABLE `lnx_productos_tipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_productos_wh`
--

CREATE TABLE `lnx_productos_wh` (
  `id` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idwh` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_provincias`
--

CREATE TABLE `lnx_provincias` (
  `id` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  `provincia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `lnx_provincias` (`id`, `idpais`, `provincia`) VALUES
(1, 1, 'Araba/Álava'),
(2, 1, 'Albacete'),
(3, 1, 'Alicante/Alacant'),
(4, 1, 'Almería'),
(5, 1, 'Ávila'),
(6, 1, 'Badajoz'),
(7, 1, 'Illes Balears'),
(8, 1, 'Barcelona'),
(9, 1, 'Burgos'),
(10, 1, 'Cáceres'),
(11, 1, 'Cádiz'),
(12, 1, 'Castellón/Castelló'),
(13, 1, 'Ciudad Real'),
(14, 1, 'Córdoba'),
(15, 1, 'A Coruña'),
(16, 1, 'Cuenca'),
(17, 1, 'Girona'),
(18, 1, 'Granada'),
(19, 1, 'Granada'),
(20, 1, 'Gipuzkoa'),
(21, 1, 'Huelva'),
(22, 1, 'Huesca'),
(23, 1, 'Jaén'),
(24, 1, 'León'),
(25, 1, 'Lleida'),
(26, 1, 'La Rioja'),
(27, 1, 'Lugo'),
(28, 1, 'Madrid'),
(29, 1, 'Málaga'),
(30, 1, 'Murcia'),
(31, 1, 'Navarra'),
(32, 1, 'Ourense'),
(33, 1, 'Asturias'),
(34, 1, 'Palencia'),
(35, 1, 'Las Palmas'),
(36, 1, 'Pontevedra'),
(37, 1, 'Salamanca'),
(38, 1, 'Santa Cruz de Tenerife'),
(39, 1, 'Cantabria'),
(40, 1, 'Segovia'),
(41, 1, 'Sevilla'),
(42, 1, 'Soria'),
(43, 1, 'Tarragona'),
(44, 1, 'Teruel'),
(45, 1, 'Toledo'),
(46, 1, 'Valencia/Val?ncia'),
(47, 1, 'Valladolid'),
(48, 1, 'Bizkaia'),
(49, 1, 'Zamora'),
(50, 1, 'Zaragoza'),
(51, 1, 'Ceuta'),
(52, 1, 'Melilla');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pc`
--

CREATE TABLE `lnx_pc` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vencimiento` date NOT NULL,
  `idusuario` int(11) NOT NULL,
  `pagado` float NOT NULL,
  `editfv` int(11) NOT NULL,
  `factura` varchar(20) NOT NULL,
  `pc_cp` int(11) NOT NULL,
  `pc_dp` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pc_lineas`
--

CREATE TABLE `lnx_pc_lineas` (
  `id` int(11) NOT NULL,
  `idpc` int(11) NOT NULL,
  `cod` varchar(20) NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `unid` int(11) NOT NULL,
  `precio` float NOT NULL,
  `dto` int(11) NOT NULL,
  `importe` float NOT NULL,
  `orden` int(11) NOT NULL,
  `exclufactu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pc_lineas_tax`
--

CREATE TABLE `lnx_pc_lineas_tax` (
  `id` int(11) NOT NULL,
  `idpc` int(11) NOT NULL,
  `idpclinea` int(11) NOT NULL,
  `idtax` int(11) NOT NULL,
  `valor` float NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pc_pagos`
--

CREATE TABLE `lnx_pc_pagos` (
  `id` int(11) NOT NULL,
  `idpc` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` float NOT NULL,
  `idfpago` int(11) NOT NULL,
  `idcpago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pc_sn`
--

CREATE TABLE `lnx_pc_sn` (
  `id` int(11) NOT NULL,
  `idpc` int(11) NOT NULL,
  `idlinea` int(11) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `pn` varchar(50) NOT NULL,
  `otro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pc_tax`
--

CREATE TABLE `lnx_pc_tax` (
  `id` int(11) NOT NULL,
  `idpc` int(11) NOT NULL,
  `idimpuesto` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pv`
--

CREATE TABLE `lnx_pv` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vencimiento` date NOT NULL,
  `idusuario` int(11) NOT NULL,
  `pagado` float NOT NULL,
  `editfv` int(11) NOT NULL,
  `pc_cp` int(11) NOT NULL,
  `pc_dp` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pv_lineas`
--

CREATE TABLE `lnx_pv_lineas` (
  `id` int(11) NOT NULL,
  `idpv` int(11) NOT NULL,
  `cod` varchar(20) NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `unid` int(11) NOT NULL,
  `precio` float NOT NULL,
  `dto` int(11) NOT NULL,
  `importe` float NOT NULL,
  `orden` int(11) NOT NULL,
  `exclufactu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pv_lineas_tax`
--

CREATE TABLE `lnx_pv_lineas_tax` (
  `id` int(11) NOT NULL,
  `idpv` int(11) NOT NULL,
  `idpvlinea` int(11) NOT NULL,
  `idtax` int(11) NOT NULL,
  `valor` float NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pv_pagos`
--

CREATE TABLE `lnx_pv_pagos` (
  `id` int(11) NOT NULL,
  `idpv` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` float NOT NULL,
  `idfpago` int(11) NOT NULL,
  `idcpago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pv_sn`
--

CREATE TABLE `lnx_pv_sn` (
  `id` int(11) NOT NULL,
  `idpv` int(11) NOT NULL,
  `idlinea` int(11) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `pn` varchar(50) NOT NULL,
  `otro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_pv_tax`
--

CREATE TABLE `lnx_pv_tax` (
  `id` int(11) NOT NULL,
  `idpv` int(11) NOT NULL,
  `idimpuesto` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_router`
--

CREATE TABLE `lnx_router` (
  `idempresa` int(11) NOT NULL,
  `opcion` varchar(50) NOT NULL,
  `valor` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_screens`
--

CREATE TABLE `lnx_screens` (
  `id` int(11) NOT NULL,
  `screen` varchar(10) NOT NULL,
  `display` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_series`
--

CREATE TABLE `lnx_series` (
  `id` int(11) NOT NULL,
  `cv` int(11) NOT NULL COMMENT '1 - compra / 2 - venta',
  `tipo` varchar(10) NOT NULL,
  `serie` varchar(20) NOT NULL,
  `activo` int(11) NOT NULL,
  `dft` int(11) NOT NULL,
  `nota` varchar(50) DEFAULT NULL,
  `idempresa` int(11) NOT NULL,
  `colormes1` varchar(10) NOT NULL,
  `colormes2` varchar(10) NOT NULL,
  `colormes3` varchar(10) NOT NULL,
  `colormes4` varchar(10) NOT NULL,
  `colormes5` varchar(10) NOT NULL,
  `colormes6` varchar(10) NOT NULL,
  `colormes7` varchar(10) NOT NULL,
  `colormes8` varchar(10) NOT NULL,
  `colormes9` varchar(10) NOT NULL,
  `colormes10` varchar(10) NOT NULL,
  `colormes11` varchar(10) NOT NULL,
  `colormes12` varchar(10) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_sync_terceros`
--

CREATE TABLE `lnx_sync_terceros` (
  `lnx_id` int(11) NOT NULL,
  `doli_id` int(11) NOT NULL,
  `codcli` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `codpro` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tarifas`
--

CREATE TABLE `lnx_tarifas` (
  `id` int(11) NOT NULL,
  `tarifa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_terceros`
--

CREATE TABLE `lnx_terceros` (
  `id` int(11) NOT NULL,
  `razonsocial` varchar(50) NOT NULL,
  `nomcomercial` varchar(50) DEFAULT NULL,
  `nif` varchar(15) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `activo` int(11) NOT NULL,
  `codcli` int(11) NOT NULL,
  `codpro` int(11) NOT NULL,
  `dir` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `pobla` varchar(50) DEFAULT NULL,
  `idprov` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  `idtarifa` int(11) NOT NULL,
  `codclipro` varchar(20) DEFAULT NULL,
  `fechaalta` date NOT NULL,
  `ncuenta` varchar(50) NOT NULL,
  `notas` varchar(250) NOT NULL,
  `origen` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notaimp` varchar(250) NOT NULL,
  `idcomercial` int(11) NOT NULL,
  `idtipotercero` int(11) NOT NULL,
  `idactividad` int(11) NOT NULL, 
  `clifp` int(11) NOT NULL, 
  `clidp` int(11) NOT NULL, 
  `profp` int(11) NOT NULL, 
  `prodp` int(11) NOT NULL, 
  `idzona` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_terceros_vinc`
--

CREATE TABLE `lnx_terceros_vinc` (
  `idtercero` int(11) NOT NULL,
  `idtercerob` int(11) NOT NULL,
  `idvinc` int(11) NOT NULL,
  `vinclabel` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_terceros_vinc_label`
--

CREATE TABLE `lnx_terceros_vinc_label` (
  `id` int(11) NOT NULL,
  `labela` varchar(50) NOT NULL,
  `labelb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Volcado de datos para la tabla `lnx_terceros_vinc_label`
--

INSERT INTO `lnx_terceros_vinc_label` (`id`, `labela`, `labelb`) VALUES
(1, 'Cliente', 'Proveedor'),
(2, 'Padre', 'Hijo');

--
-- Indices de la tabla `lnx_terceros_vinc_label`
--
ALTER TABLE `lnx_terceros_vinc_label`
  ADD PRIMARY KEY (`id`);
  
--
-- AUTO_INCREMENT de la tabla `lnx_terceros_vinc_label`
--
ALTER TABLE `lnx_terceros_vinc_label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_terceroscontactos`
--

CREATE TABLE `lnx_terceroscontactos` (
  `id` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ididioma` int(11) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `lnxpublic` int(11) NOT NULL,
  `usuariopublic` varchar(20) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `iddir` int(11) NOT NULL,
  `lbltel2` varchar(20) NOT NULL,
  `tel2` varchar(20) NOT NULL,
  `lbltel3` varchar(20) NOT NULL,
  `tel3` varchar(20) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_terceroscontacxtra`
--

CREATE TABLE `lnx_terceroscontacxtra` (
  `idtercero` int(11) NOT NULL,
  `idcontacto` int(11) NOT NULL,
  `tipocampo` int(11) NOT NULL,
  `labelcampo` varchar(50) NOT NULL,
  `valorcampo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tercerosdir`
--

CREATE TABLE `lnx_tercerosdir` (
  `id` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `referencia` varchar(20) NOT NULL,
  `dir` varchar(50) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `pobla` varchar(50) NOT NULL,
  `idprov` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `activo` int(11) NOT NULL,
  `notas` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_terceros_lopd`
--

CREATE TABLE `lnx_terceros_lopd` (
  `id` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `campo` varchar(50) NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_terceros_lopd_cfg`
--

CREATE TABLE `lnx_terceros_lopd_cfg` (
  `id` int(11) NOT NULL,
  `campo` varchar(10) NOT NULL,
  `display` varchar(50) NOT NULL,
  `tipo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_terceros_lopd_files`
--

CREATE TABLE `lnx_terceros_lopd_files` (
  `id` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `idcatlopd` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_terceros_tipos`
--

CREATE TABLE `lnx_terceros_tipos` (
  `id` int(11) NOT NULL,
  `tipotercero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tiendas`
--

CREATE TABLE `lnx_tiendas` (
  `id` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `tienda` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `idpais` int(11) NOT NULL,
  `idprov` int(11) NOT NULL,
  `dir` varchar(50) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `pobla` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `lnx_tiendas` (`id`, `idempresa`, `tienda`, `tel`, `email`, `idpais`, `idprov`, `dir`, `cp`, `pobla`) VALUES
(1, 1, 'Oficina Central', '', '', 1, 8, '', '08221', 'Terrassa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_gastos`
--

CREATE TABLE `lnx_gastos` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `idtipogasto` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `importe` float NOT NULL,
  `iduser` int(11) NOT NULL,
  `aprobado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_gastos_cfg`
--

CREATE TABLE `lnx_gastos_cfg` (
  `opcion` varchar(20) NOT NULL, 
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_gastos_tipo`
--

CREATE TABLE `lnx_gastos_tipo` (
  `id` int(11) NOT NULL,
  `tipogasto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tpv`
--

CREATE TABLE `lnx_tpv` (
  `id` int(11) NOT NULL,
  `idtienda` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idterminal` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `idtercero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `edittpv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tpv_cajon`
--

CREATE TABLE `lnx_tpv_cajon` (
  `id` int(11) NOT NULL,
  `idtienda` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idterminal` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipomov` varchar(5) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `importe` float NOT NULL,
  `idfpago` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tpv_cajon_tax`
--

CREATE TABLE `lnx_tpv_cajon_tax` (
  `id` int(11) NOT NULL,
  `idcajon` int(11) NOT NULL,
  `idtax` int(11) NOT NULL,
  `valor` float NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tpv_campos`
--

CREATE TABLE `lnx_tpv_campos` (
  `idtpv` int(11) NOT NULL,
  `campo` varchar(10) NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tpv_cfg`
--

CREATE TABLE `lnx_tpv_cfg` (
  `id` int(11) NOT NULL,
  `idterminal` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `idseriec` int(11) NOT NULL,
  `idprinter` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tpv_cfg_cg`
--

CREATE TABLE `lnx_tpv_cfg_cg` (
  `id` int(11) NOT NULL,
  `campo` varchar(10) NOT NULL,
  `display` varchar(50) NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `mostrarlist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tpv_cfg_home`
--

CREATE TABLE `lnx_tpv_cfg_home` (
  `id` int(11) NOT NULL,
  `idterminal` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tpv_cfg_ia`
--

CREATE TABLE `lnx_tpv_cfg_ia` (
  `id` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `regla` varchar(50) NOT NULL,
  `cuando` varchar(5) NOT NULL,
  `min` float NOT NULL,
  `max` float NOT NULL,
  `idproducto` int(11) NOT NULL,
  `docprint` varchar(50) NOT NULL,
  `copias` int(11) NOT NULL,
  `texto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tpv_lineas`
--

CREATE TABLE `lnx_tpv_lineas` (
  `id` int(11) NOT NULL,
  `idtpv` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `codventa` varchar(50) NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `unidades` int(11) NOT NULL,
  `precio` float NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tpv_lineas_tax`
--

CREATE TABLE `lnx_tpv_lineas_tax` (
  `idtpv` int(11) NOT NULL,
  `idlinea` int(11) NOT NULL,
  `idtax` int(11) NOT NULL,
  `valor` float NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_tpv_pagos`
--

CREATE TABLE `lnx_tpv_pagos` (
  `id` int(11) NOT NULL,
  `idtienda` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idterminal` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `idtpv` int(11) NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `fecha` datetime NOT NULL,
  `idfpago` int(11) NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_users`
--

CREATE TABLE `lnx_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `display` varchar(50) DEFAULT NULL,
  `ncuenta` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `dir` varchar(50) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `pobla` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `activo` int(11) NOT NULL,
  `ididioma` int(11) NOT NULL,
  `idprov` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `nif` varchar(15) NOT NULL,
  `uidmulti` int(11) NOT NULL,
  `tlgm_groupid` varchar(50) NOT NULL, 
  `userset_showcods` tinyint(1) NOT NULL, 
  `userset_viewlists` varchar(1) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `lnx_users` (`id`, `username`, `password`, `display`, `ncuenta`, `tel`, `dir`, `cp`, `pobla`, `email`, `activo`, `ididioma`, `idprov`, `idpais`, `idempresa`, `nif`, `uidmulti`, `tlgm_groupid`, `userset_showcods`, `userset_viewlists`) VALUES ('1', 'administrator', '5f4dcc3b5aa765d61d8327deb882cf99', 'Administrator', '', '', '', '08221', 'Terrassa', '', '1', '1', '8', '1', '1', '0', '1', '', '0', 'Y');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_users_config`
--

CREATE TABLE `lnx_users_config` (
  `opcion` varchar(20) NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lnx_users_config` (`opcion`, `valor`) VALUES
('ALLOW_LOGIN', 'YES'),
('IDUSERALLOWED', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_usersgroup`
--

CREATE TABLE `lnx_usersgroup` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_usersprinters`
--

CREATE TABLE `lnx_usersprinters` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idprinter` int(11) NOT NULL,
  `dft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_userstiendas`
--

CREATE TABLE `lnx_userstiendas` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idtienda` int(11) NOT NULL,
  `dft` int(11) NOT NULL,
  `idterminal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_users_app`
--

CREATE TABLE `lnx_users_app` (
  `iduser` int(11) NOT NULL,
  `app` varchar(20) NOT NULL,
  `idremote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_users_correo`
--

CREATE TABLE `lnx_users_correo` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `display` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `smtpserver` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dft` int(11) NOT NULL,
  `notapie` varchar(255) NOT NULL, 
  `port` int(11) NOT NULL, 
  `tipoconex` varchar(4) NOT NULL, 
  `nomcuenta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_users_mainview`
--

CREATE TABLE `lnx_users_mainview` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `display` varchar(50) NOT NULL,
  `enlace` varchar(255) NOT NULL,
  `ventana` varchar(10) NOT NULL,
  `orden` int(11) NOT NULL,
  `icono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_users_uid`
--

CREATE TABLE `lnx_users_uid` (
  `iduser` int(11) NOT NULL,
  `uidsession` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `useragente` varchar(255) NOT NULL,
  `nomsesion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_viajes`
--

CREATE TABLE `lnx_viajes` (
  `id` int(11) NOT NULL,
  `idserie` int(11) NOT NULL,
  `codigoint` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `iduser` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `fechavuelta` datetime NOT NULL, 
  `editv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_viajes_lineas`
--

CREATE TABLE `lnx_viajes_lineas` (
  `id` int(11) NOT NULL,
  `idviaje` int(11) NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `fechasalida` datetime NOT NULL,
  `origen` varchar(50) NOT NULL,
  `fechallegada` datetime NOT NULL,
  `destino` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `reserva` varchar(50) NOT NULL,
  `asiento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_viajes_gastos`
--

CREATE TABLE `lnx_viajes_gastos` (
  `id` int(11) NOT NULL,
  `idviaje` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idtipogasto` int(11) NOT NULL,
  `importe` float NOT NULL,
  `documento` varchar(50) NOT NULL,
  `idflota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_wh_cfg`
--

CREATE TABLE `lnx_wh_cfg` (
  `opcion` varchar(50) NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_wh_lineas`
--

CREATE TABLE `lnx_wh_lineas` (
  `id` int(11) NOT NULL,
  `idwhmov` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `unid` int(11) NOT NULL,
  `idalmacen` int(11) NOT NULL,
  `movimiento` varchar(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lnx_wh_mov`
--

CREATE TABLE `lnx_wh_mov` (
  `id` int(11) NOT NULL,
  `movimiento` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `modulo` varchar(10) NOT NULL,
  `iddocumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lnx_ac`
--
ALTER TABLE `lnx_ac`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ac_lineas`
--
ALTER TABLE `lnx_ac_lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ac_lineas_tax`
--
ALTER TABLE `lnx_ac_lineas_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ac_pagos`
--
ALTER TABLE `lnx_ac_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ac_sn`
--
ALTER TABLE `lnx_ac_sn`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ac_tax`
--
ALTER TABLE `lnx_ac_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_almacenes`
--
ALTER TABLE `lnx_almacenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_atributos`
--
ALTER TABLE `lnx_atributos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_atributosvalor`
--
ALTER TABLE `lnx_atributosvalor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_av`
--
ALTER TABLE `lnx_av`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_av_lineas`
--
ALTER TABLE `lnx_av_lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_av_lineas_tax`
--
ALTER TABLE `lnx_av_lineas_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_av_pagos`
--
ALTER TABLE `lnx_av_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_av_sn`
--
ALTER TABLE `lnx_av_sn`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_av_tax`
--
ALTER TABLE `lnx_av_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_bancos`
--
ALTER TABLE `lnx_bancos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_bancostipo`
--
ALTER TABLE `lnx_bancostipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_bancos_cpago`
--
ALTER TABLE `lnx_bancos_cpago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_conta_ejercicios`
--
ALTER TABLE `lnx_conta_ejercicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_conta_grupos`
--
ALTER TABLE `lnx_conta_grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_conta_master`
--
ALTER TABLE `lnx_conta_master`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_conta_subgrupos`
--
ALTER TABLE `lnx_conta_subgrupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_crm_camp`
--
ALTER TABLE `lnx_crm_camp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_crm_seg`
--
ALTER TABLE `lnx_crm_seg`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `lnx_crm_phonecalls`
--
ALTER TABLE `lnx_crm_phonecalls`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_cuentascajas`
--
ALTER TABLE `lnx_cuentascajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_dic_actividades`
--
ALTER TABLE `lnx_dic_actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_dic_docseries`
--
ALTER TABLE `lnx_dic_docseries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_dic_idiomas`
--
ALTER TABLE `lnx_dic_idiomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_dic_lopd`
--
ALTER TABLE `lnx_dic_lopd`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_docprint`
--
ALTER TABLE `lnx_docprint`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_empresas`
--
ALTER TABLE `lnx_empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fabricantes`
--
ALTER TABLE `lnx_fabricantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fc`
--
ALTER TABLE `lnx_fc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fc_lineas`
--
ALTER TABLE `lnx_fc_lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fc_lineas_tax`
--
ALTER TABLE `lnx_fc_lineas_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fc_pagos`
--
ALTER TABLE `lnx_fc_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fc_sn`
--
ALTER TABLE `lnx_fc_sn`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fc_tax`
--
ALTER TABLE `lnx_fc_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ficheros`
--
ALTER TABLE `lnx_ficheros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ficheros_cat`
--
ALTER TABLE `lnx_ficheros_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ficheros_ext`
--
ALTER TABLE `lnx_ficheros_ext`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ficheros_loc`
--
ALTER TABLE `lnx_ficheros_loc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_flota`
--
ALTER TABLE `lnx_flota`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_formaspago`
--
ALTER TABLE `lnx_formaspago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fv`
--
ALTER TABLE `lnx_fv`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fvr`
--
ALTER TABLE `lnx_fvr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fvr_lineas`
--
ALTER TABLE `lnx_fvr_lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fvr_lineas_tax`
--
ALTER TABLE `lnx_fvr_lineas_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fvr_pagos`
--
ALTER TABLE `lnx_fvr_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fvr_sn`
--
ALTER TABLE `lnx_fvr_sn`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fvr_tax`
--
ALTER TABLE `lnx_fvr_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fv_lineas`
--
ALTER TABLE `lnx_fv_lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fv_lineas_tax`
--
ALTER TABLE `lnx_fv_lineas_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fv_pagos`
--
ALTER TABLE `lnx_fv_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fv_sn`
--
ALTER TABLE `lnx_fv_sn`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_fv_tax`
--
ALTER TABLE `lnx_fv_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_groups`
--
ALTER TABLE `lnx_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_groupsasignar`
--
ALTER TABLE `lnx_groupsasignar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_dic_historico_cfg`
--
ALTER TABLE `lnx_dic_historico_cfg`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `lnx_hr_nom`
--
ALTER TABLE `lnx_hr_nom`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_impresoras`
--
ALTER TABLE `lnx_impresoras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_impuestos`
--
ALTER TABLE `lnx_impuestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_impuestosrules`
--
ALTER TABLE `lnx_impuestosrules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ita_activos`
--
ALTER TABLE `lnx_ita_activos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ita_caracteristicas`
--
ALTER TABLE `lnx_ita_caracteristicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ita_estados`
--
ALTER TABLE `lnx_ita_estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ita_pro`
--
ALTER TABLE `lnx_ita_pro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ita_tickets`
--
ALTER TABLE `lnx_ita_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ita_tipos`
--
ALTER TABLE `lnx_ita_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_itc_tipos`
--
ALTER TABLE `lnx_itc_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_it_categorias`
--
ALTER TABLE `lnx_it_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_it_colas`
--
ALTER TABLE `lnx_it_colas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_it_docum`
--
ALTER TABLE `lnx_it_docum`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_it_docum_lines`
--
ALTER TABLE `lnx_it_docum_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_it_infopass`
--
ALTER TABLE `lnx_it_infopass`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_it_infopass_perm`
--
ALTER TABLE `lnx_it_infopass_perm`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_it_licensing`
--
ALTER TABLE `lnx_it_licensing`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_it_mant`
--
ALTER TABLE `lnx_it_mant`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_it_seguimiento`
--
ALTER TABLE `lnx_it_seguimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_it_tickets`
--
ALTER TABLE `lnx_it_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_it_tipomant`
--
ALTER TABLE `lnx_it_tipomant`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_it_tipos`
--
ALTER TABLE `lnx_it_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_lopd`
--
ALTER TABLE `lnx_lopd`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_menus`
--
ALTER TABLE `lnx_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_modulos`
--
ALTER TABLE `lnx_modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_oc`
--
ALTER TABLE `lnx_oc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_oc_lineas`
--
ALTER TABLE `lnx_oc_lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_oc_lineas_tax`
--
ALTER TABLE `lnx_oc_lineas_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_oc_pagos`
--
ALTER TABLE `lnx_oc_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_oc_sn`
--
ALTER TABLE `lnx_oc_sn`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_oc_tax`
--
ALTER TABLE `lnx_oc_tax`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `lnx_ov`
--
ALTER TABLE `lnx_ov`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ov_lineas`
--
ALTER TABLE `lnx_ov_lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ov_lineas_tax`
--
ALTER TABLE `lnx_ov_lineas_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ov_pagos`
--
ALTER TABLE `lnx_ov_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ov_sn`
--
ALTER TABLE `lnx_ov_sn`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_ov_tax`
--
ALTER TABLE `lnx_ov_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_paises`
--
ALTER TABLE `lnx_paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_partes`
--
ALTER TABLE `lnx_partes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_partes_config`
--
ALTER TABLE `lnx_partes_config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_partes_old`
--
ALTER TABLE `lnx_partes_old`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_permisos`
--
ALTER TABLE `lnx_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_poblaciones`
--
ALTER TABLE `lnx_poblaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_pos_terminales`
--
ALTER TABLE `lnx_pos_terminales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_printjobs`
--
ALTER TABLE `lnx_printjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_productos`
--
ALTER TABLE `lnx_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_productos_pro`
--
ALTER TABLE `lnx_productos_pro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_productos_tax`
--
ALTER TABLE `lnx_productos_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_productos_tipo`
--
ALTER TABLE `lnx_productos_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_productos_wh`
--
ALTER TABLE `lnx_productos_wh`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_provincias`
--
ALTER TABLE `lnx_provincias`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `lnx_pc`
--
ALTER TABLE `lnx_pc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_pc_lineas`
--
ALTER TABLE `lnx_pc_lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_pc_lineas_tax`
--
ALTER TABLE `lnx_pc_lineas_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_pc_pagos`
--
ALTER TABLE `lnx_pc_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_pc_sn`
--
ALTER TABLE `lnx_pc_sn`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_pc_tax`
--
ALTER TABLE `lnx_pc_tax`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `lnx_pv`
--
ALTER TABLE `lnx_pv`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_pv_lineas`
--
ALTER TABLE `lnx_pv_lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_pv_lineas_tax`
--
ALTER TABLE `lnx_pv_lineas_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_pv_pagos`
--
ALTER TABLE `lnx_pv_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_pv_sn`
--
ALTER TABLE `lnx_pv_sn`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_pv_tax`
--
ALTER TABLE `lnx_pv_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_screens`
--
ALTER TABLE `lnx_screens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_series`
--
ALTER TABLE `lnx_series`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_tarifas`
--
ALTER TABLE `lnx_tarifas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_terceros`
--
ALTER TABLE `lnx_terceros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_terceroscontactos`
--
ALTER TABLE `lnx_terceroscontactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_tercerosdir`
--
ALTER TABLE `lnx_tercerosdir`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_terceros_lopd`
--
ALTER TABLE `lnx_terceros_lopd`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_terceros_lopd_cfg`
--
ALTER TABLE `lnx_terceros_lopd_cfg`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_terceros_lopd_files`
--
ALTER TABLE `lnx_terceros_lopd_files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_terceros_tipos`
--
ALTER TABLE `lnx_terceros_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_tiendas`
--
ALTER TABLE `lnx_tiendas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_gastos`
--
ALTER TABLE `lnx_gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_gastos_tipo`
--
ALTER TABLE `lnx_gastos_tipo`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `lnx_tpv`
--
ALTER TABLE `lnx_tpv`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_tpv_cajon`
--
ALTER TABLE `lnx_tpv_cajon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_tpv_cajon_tax`
--
ALTER TABLE `lnx_tpv_cajon_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_tpv_cfg`
--
ALTER TABLE `lnx_tpv_cfg`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_tpv_cfg_cg`
--
ALTER TABLE `lnx_tpv_cfg_cg`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_tpv_cfg_home`
--
ALTER TABLE `lnx_tpv_cfg_home`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_tpv_cfg_ia`
--
ALTER TABLE `lnx_tpv_cfg_ia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_tpv_lineas`
--
ALTER TABLE `lnx_tpv_lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_tpv_pagos`
--
ALTER TABLE `lnx_tpv_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_users`
--
ALTER TABLE `lnx_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_users_config`
--
ALTER TABLE `lnx_users_config`
  ADD PRIMARY KEY (`opcion`);
  
--
-- Indices de la tabla `lnx_usersgroup`
--
ALTER TABLE `lnx_usersgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_usersprinters`
--
ALTER TABLE `lnx_usersprinters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_userstiendas`
--
ALTER TABLE `lnx_userstiendas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_users_correo`
--
ALTER TABLE `lnx_users_correo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_users_mainview`
--
ALTER TABLE `lnx_users_mainview`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_viajes`
--
ALTER TABLE `lnx_viajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_viajes_lineas`
--
ALTER TABLE `lnx_viajes_lineas`
  ADD PRIMARY KEY (`id`);
  
--
-- Indices de la tabla `lnx_viajes_gastos`
--
ALTER TABLE `lnx_viajes_gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_wh_lineas`
--
ALTER TABLE `lnx_wh_lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lnx_wh_mov`
--
ALTER TABLE `lnx_wh_mov`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lnx_ac`
--
ALTER TABLE `lnx_ac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ac_lineas`
--
ALTER TABLE `lnx_ac_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ac_lineas_tax`
--
ALTER TABLE `lnx_ac_lineas_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ac_pagos`
--
ALTER TABLE `lnx_ac_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ac_sn`
--
ALTER TABLE `lnx_ac_sn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ac_tax`
--
ALTER TABLE `lnx_ac_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_almacenes`
--
ALTER TABLE `lnx_almacenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_atributos`
--
ALTER TABLE `lnx_atributos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_atributosvalor`
--
ALTER TABLE `lnx_atributosvalor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_av`
--
ALTER TABLE `lnx_av`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_av_lineas`
--
ALTER TABLE `lnx_av_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_av_lineas_tax`
--
ALTER TABLE `lnx_av_lineas_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_av_pagos`
--
ALTER TABLE `lnx_av_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_av_sn`
--
ALTER TABLE `lnx_av_sn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_av_tax`
--
ALTER TABLE `lnx_av_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_bancos`
--
ALTER TABLE `lnx_bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_bancostipo`
--
ALTER TABLE `lnx_bancostipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_bancos_cpago`
--
ALTER TABLE `lnx_bancos_cpago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_conta_ejercicios`
--
ALTER TABLE `lnx_conta_ejercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_conta_grupos`
--
ALTER TABLE `lnx_conta_grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_conta_master`
--
ALTER TABLE `lnx_conta_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_conta_subgrupos`
--
ALTER TABLE `lnx_conta_subgrupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_crm_camp`
--
ALTER TABLE `lnx_crm_camp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_crm_seg`
--
ALTER TABLE `lnx_crm_seg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- AUTO_INCREMENT de la tabla `lnx_crm_phonecalls`
--
ALTER TABLE `lnx_crm_phonecalls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_cuentascajas`
--
ALTER TABLE `lnx_cuentascajas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_dic_actividades`
--
ALTER TABLE `lnx_dic_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_dic_docseries`
--
ALTER TABLE `lnx_dic_docseries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_dic_idiomas`
--
ALTER TABLE `lnx_dic_idiomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_dic_lopd`
--
ALTER TABLE `lnx_dic_lopd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_docprint`
--
ALTER TABLE `lnx_docprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_empresas`
--
ALTER TABLE `lnx_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fabricantes`
--
ALTER TABLE `lnx_fabricantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fc`
--
ALTER TABLE `lnx_fc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fc_lineas`
--
ALTER TABLE `lnx_fc_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fc_lineas_tax`
--
ALTER TABLE `lnx_fc_lineas_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fc_pagos`
--
ALTER TABLE `lnx_fc_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fc_sn`
--
ALTER TABLE `lnx_fc_sn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fc_tax`
--
ALTER TABLE `lnx_fc_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ficheros`
--
ALTER TABLE `lnx_ficheros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ficheros_cat`
--
ALTER TABLE `lnx_ficheros_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ficheros_ext`
--
ALTER TABLE `lnx_ficheros_ext`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ficheros_loc`
--
ALTER TABLE `lnx_ficheros_loc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_flota`
--
ALTER TABLE `lnx_flota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_formaspago`
--
ALTER TABLE `lnx_formaspago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


insert into lnx_formaspago (formapago, idcuentacaja) values ('Efectivo', '0');
insert into lnx_formaspago (formapago, idcuentacaja) values ('Tarjeta', '0');
insert into lnx_formaspago (formapago, idcuentacaja) values ('Transferencia', '0');
insert into lnx_formaspago (formapago, idcuentacaja) values ('Virtual', '0');

--
-- AUTO_INCREMENT de la tabla `lnx_fv`
--
ALTER TABLE `lnx_fv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fvr`
--
ALTER TABLE `lnx_fvr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fvr_lineas`
--
ALTER TABLE `lnx_fvr_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fvr_lineas_tax`
--
ALTER TABLE `lnx_fvr_lineas_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fvr_pagos`
--
ALTER TABLE `lnx_fvr_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fvr_sn`
--
ALTER TABLE `lnx_fvr_sn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fvr_tax`
--
ALTER TABLE `lnx_fvr_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fv_lineas`
--
ALTER TABLE `lnx_fv_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fv_lineas_tax`
--
ALTER TABLE `lnx_fv_lineas_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fv_pagos`
--
ALTER TABLE `lnx_fv_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fv_sn`
--
ALTER TABLE `lnx_fv_sn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_fv_tax`
--
ALTER TABLE `lnx_fv_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_groups`
--
ALTER TABLE `lnx_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_groupsasignar`
--
ALTER TABLE `lnx_groupsasignar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_dic_historico_cfg`
--
ALTER TABLE `lnx_dic_historico_cfg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT de la tabla `lnx_hr_nom`
--
ALTER TABLE `lnx_hr_nom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_impresoras`
--
ALTER TABLE `lnx_impresoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_impuestos`
--
ALTER TABLE `lnx_impuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_impuestosrules`
--
ALTER TABLE `lnx_impuestosrules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ita_activos`
--
ALTER TABLE `lnx_ita_activos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ita_caracteristicas`
--
ALTER TABLE `lnx_ita_caracteristicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ita_estados`
--
ALTER TABLE `lnx_ita_estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ita_pro`
--
ALTER TABLE `lnx_ita_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ita_tickets`
--
ALTER TABLE `lnx_ita_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ita_tipos`
--
ALTER TABLE `lnx_ita_tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_itc_tipos`
--
ALTER TABLE `lnx_itc_tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_it_categorias`
--
ALTER TABLE `lnx_it_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_it_colas`
--
ALTER TABLE `lnx_it_colas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_it_docum`
--
ALTER TABLE `lnx_it_docum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_it_docum_lines`
--
ALTER TABLE `lnx_it_docum_lines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_it_infopass`
--
ALTER TABLE `lnx_it_infopass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_it_infopass_perm`
--
ALTER TABLE `lnx_it_infopass_perm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_it_licensing`
--
ALTER TABLE `lnx_it_licensing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_it_mant`
--
ALTER TABLE `lnx_it_mant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_it_seguimiento`
--
ALTER TABLE `lnx_it_seguimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_it_tickets`
--
ALTER TABLE `lnx_it_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_it_tipomant`
--
ALTER TABLE `lnx_it_tipomant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_it_tipos`
--
ALTER TABLE `lnx_it_tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_lopd`
--
ALTER TABLE `lnx_lopd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_menus`
--
ALTER TABLE `lnx_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_modulos`
--
ALTER TABLE `lnx_modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_oc`
--
ALTER TABLE `lnx_oc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `lnx_oc_lineas`
--
ALTER TABLE `lnx_oc_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `lnx_oc_lineas_tax`
--
ALTER TABLE `lnx_oc_lineas_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `lnx_oc_pagos`
--
ALTER TABLE `lnx_oc_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `lnx_oc_sn`
--
ALTER TABLE `lnx_oc_sn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `lnx_oc_tax`
--
ALTER TABLE `lnx_oc_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;




--
-- AUTO_INCREMENT de la tabla `lnx_ov`
--
ALTER TABLE `lnx_ov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ov_lineas`
--
ALTER TABLE `lnx_ov_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ov_lineas_tax`
--
ALTER TABLE `lnx_ov_lineas_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ov_pagos`
--
ALTER TABLE `lnx_ov_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ov_sn`
--
ALTER TABLE `lnx_ov_sn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_ov_tax`
--
ALTER TABLE `lnx_ov_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_paises`
--
ALTER TABLE `lnx_paises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_partes`
--
ALTER TABLE `lnx_partes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_partes_config`
--
ALTER TABLE `lnx_partes_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_partes_old`
--
ALTER TABLE `lnx_partes_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_permisos`
--
ALTER TABLE `lnx_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_poblaciones`
--
ALTER TABLE `lnx_poblaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_pos_terminales`
--
ALTER TABLE `lnx_pos_terminales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_printjobs`
--
ALTER TABLE `lnx_printjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_productos`
--
ALTER TABLE `lnx_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_productos_pro`
--
ALTER TABLE `lnx_productos_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_productos_tax`
--
ALTER TABLE `lnx_productos_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_productos_tipo`
--
ALTER TABLE `lnx_productos_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_productos_wh`
--
ALTER TABLE `lnx_productos_wh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_provincias`
--
ALTER TABLE `lnx_provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT de la tabla `lnx_pc`
--
ALTER TABLE `lnx_pc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `lnx_pc_lineas`
--
ALTER TABLE `lnx_pc_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `lnx_pc_lineas_tax`
--
ALTER TABLE `lnx_pc_lineas_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `lnx_pc_pagos`
--
ALTER TABLE `lnx_pc_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `lnx_pc_sn`
--
ALTER TABLE `lnx_pc_sn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `lnx_pc_tax`
--
ALTER TABLE `lnx_pc_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT de la tabla `lnx_pv`
--
ALTER TABLE `lnx_pv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_pv_lineas`
--
ALTER TABLE `lnx_pv_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_pv_lineas_tax`
--
ALTER TABLE `lnx_pv_lineas_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_pv_pagos`
--
ALTER TABLE `lnx_pv_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_pv_sn`
--
ALTER TABLE `lnx_pv_sn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_pv_tax`
--
ALTER TABLE `lnx_pv_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_screens`
--
ALTER TABLE `lnx_screens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_series`
--
ALTER TABLE `lnx_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_tarifas`
--
ALTER TABLE `lnx_tarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_terceros`
--
ALTER TABLE `lnx_terceros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_terceroscontactos`
--
ALTER TABLE `lnx_terceroscontactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_tercerosdir`
--
ALTER TABLE `lnx_tercerosdir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_terceros_lopd`
--
ALTER TABLE `lnx_terceros_lopd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_terceros_lopd_cfg`
--
ALTER TABLE `lnx_terceros_lopd_cfg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_terceros_lopd_files`
--
ALTER TABLE `lnx_terceros_lopd_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_terceros_tipos`
--
ALTER TABLE `lnx_terceros_tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_tiendas`
--
ALTER TABLE `lnx_tiendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_gastos`
--
ALTER TABLE `lnx_gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT de la tabla `lnx_gastos_tipo`
--
ALTER TABLE `lnx_gastos_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT de la tabla `lnx_tpv`
--
ALTER TABLE `lnx_tpv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_tpv_cajon`
--
ALTER TABLE `lnx_tpv_cajon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_tpv_cajon_tax`
--
ALTER TABLE `lnx_tpv_cajon_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_tpv_cfg`
--
ALTER TABLE `lnx_tpv_cfg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_tpv_cfg_cg`
--
ALTER TABLE `lnx_tpv_cfg_cg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_tpv_cfg_home`
--
ALTER TABLE `lnx_tpv_cfg_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_tpv_cfg_ia`
--
ALTER TABLE `lnx_tpv_cfg_ia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_tpv_lineas`
--
ALTER TABLE `lnx_tpv_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_tpv_pagos`
--
ALTER TABLE `lnx_tpv_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_users`
--
ALTER TABLE `lnx_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_usersgroup`
--
ALTER TABLE `lnx_usersgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_usersprinters`
--
ALTER TABLE `lnx_usersprinters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_userstiendas`
--
ALTER TABLE `lnx_userstiendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

insert into lnx_userstiendas (iduser, idtienda, dft, idterminal) values ('1', '1', '1', '0');

--
-- AUTO_INCREMENT de la tabla `lnx_users_correo`
--
ALTER TABLE `lnx_users_correo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_users_mainview`
--
ALTER TABLE `lnx_users_mainview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_viajes`
--
ALTER TABLE `lnx_viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_viajes_lineas`
--
ALTER TABLE `lnx_viajes_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `lnx_viajes_gastos`
--
ALTER TABLE `lnx_viajes_gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_wh_lineas`
--
ALTER TABLE `lnx_wh_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lnx_wh_mov`
--
ALTER TABLE `lnx_wh_mov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]fc', 'id', 'fecha', 'factura', 'Factura Compra', 'FC', 'index.php?module=fc&section=main&action=view&id=[[id]]');
INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]fv', 'id', 'fecha', 'codigo', 'Factura Venta', 'FV', 'index.php?module=fv&section=main&action=view&id=[[id]]');
INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]fvr', 'id', 'fecha', 'codigo', 'Factura Venta Rectificativa', 'FVR', 'index.php?module=fvr&section=main&action=view&id=[[id]]');
INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]ov', 'id', 'fecha', 'codigo', 'Presupuesto Venta', 'FC', 'index.php?module=ov&section=main&action=view&id=[[id]]');
INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]oc', 'id', 'fecha', 'codigo', 'Presupuesto compra', 'FC', 'index.php?module=oc&section=main&action=view&id=[[id]]');
INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]pv', 'id', 'fecha', 'codigo', 'Pedido Venta', 'PV', 'index.php?module=pv&section=main&action=view&id=[[id]]');
INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]pc', 'id', 'fecha', 'codigo', 'Pedido Compra', 'PC', 'index.php?module=pc&section=main&action=view&id=[[id]]');
INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]av', 'id', 'fecha', 'codigo', 'Albaran Venta', 'AV', 'index.php?module=av&section=main&action=view&id=[[id]]');
INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]ac', 'id', 'fecha', 'codigo', 'Albaran Compra', 'AC', 'index.php?module=ac&section=main&action=view&id=[[id]]');
INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]ita_activos', 'id', 'falta', 'nombre', 'Activo', 'ITA', 'index.php?module=lnxit&section=activos&ss=activo&action=edit&id=[[id]]');
INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]crm_seg', 'id', 'fecha', 'LEFT(seguimiento, 30)', 'CRM', 'CRM', 'index.php?module=crm&section=seguimientos&action=edit&id=[[id]]');
INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]it_tickets', 'id', 'fcreacion', 'id', 'Ticket', 'ITT', 'index.php?module=lnxit&section=tickets&action=edit&id=[[id]]');
INSERT INTO `lnx_dic_historico_cfg` (`tabla`, `campoid`, `fecha`, `codigo`, `descripcion`, `tipo`, `url`) VALUES('[[PREFIXSQL]]it_docum', 'id', 'fcreado', 'titulo', 'Doc', 'ITDOCUM', 'index.php?module=crm&section=seguimientos&action=edit&id=[[id]]');



insert into lnx_screens (screen, display, url) values ('ART', 'Articulos', 'index.php?module=almacen&section=articulos');
insert into lnx_screens (screen, display, url) values ('TER', 'Terceros', 'index.php?module=terceros&section=terceros');
insert into lnx_screens (screen, display, url) values ('OV', 'Presupuesto venta', 'index.php?module=ov');
insert into lnx_screens (screen, display, url) values ('OC', 'Presupuesto compra', 'index.php?module=oc');
insert into lnx_screens (screen, display, url) values ('PV', 'Pedidos venta', 'index.php?module=pv');
insert into lnx_screens (screen, display, url) values ('PC', 'Pedidos compra', 'index.php?module=pc');
insert into lnx_screens (screen, display, url) values ('AV', 'Albaranes venta', 'index.php?module=av');
insert into lnx_screens (screen, display, url) values ('AC', 'Albaranes compra', 'index.php?module=ac');
insert into lnx_screens (screen, display, url) values ('FV', 'Facturas venta', 'index.php?module=fv');
insert into lnx_screens (screen, display, url) values ('FVR', 'Facturas venta rectificativas', 'index.php?module=fvr');
insert into lnx_screens (screen, display, url) values ('FC', 'Facturas compra', 'index.php?module=fc');
insert into lnx_screens (screen, display, url) values ('TRI', 'Balance - Trimestre', 'index.php?module=balance&section=trimestre');
insert into lnx_screens (screen, display, url) values ('INFOPASS', 'IT - InfoPass', 'index.php?module=lnxit&section=infopass');
insert into lnx_screens (screen, display, url) values ('IT', 'IT Gestion y soporte', 'index.php?module=lnxit&section=tickets&subsection=list');
insert into lnx_screens (screen, display, url) values ('DOCUM', 'IT Documentación', 'index.php?module=lnxit&section=docum');



INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(2000, 'Módulo Terceros', 1, 'terceros');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(1000, 'Modulo CRM', 1, 'crm');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(3000, 'Modulo Almacen', 1, 'almacen');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(4000, 'Gestión y soporte', 1, 'lnxit');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(5000, 'Recursos Humanos', 1, 'hr');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(5100, 'Gestión de Viajes y gastos', 1, 'gastos');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(6000, 'Panel del usuario', 1, 'userpanel');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(7000, 'Configuración', 1, 'core');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(0, '-sin especificar-', 1, '-');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(9000, 'Facturas de Venta', 1, 'fv'); 
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(9100, 'Facturas de Venta Rectificativas', 1, 'fvr'); 
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(8000, 'Facturas de Compra', 1, 'fc');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(9200, 'Albaranes de venta', 1, 'av');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(9300, 'Pedidos de venta', 1, 'pv');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(9400, 'Presupuestos de venta', 1, 'ov');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(8100, 'Albaranes de Compra', 1, 'ac');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(8200, 'Pedidos de Compra', 1, 'pc');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(8300, 'Presupuestos de Compra', 1, 'oc');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(100, 'Modulo Financiera', 1, '-');
INSERT INTO `lnx_modulos` (`idmod`, `display`, `activo`, `directorio`) VALUES(9500, 'Modulo TPV', 1, 'tpv');


INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(0, 0, '------');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(0, 8, 'Menu compras');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(0, 9, 'Menu Ventas');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(100, 100, 'Acceso módulo Financiera');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(100, 101, 'Balance - Trimestre');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(1000, 1000, 'Acceso módulo CRM');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2000, 'Acceso módulo Terceros');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2001, 'Crear nuevo tercerp');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2002, 'Editar tercero');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2003, 'Eliminar Tercero');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2004, 'Terceros - Ficha LOPD');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2005, 'Terceros - Ficha Documentos');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2006, 'Terceros - Formas de pago');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2007, 'Terceros - Ficha Contactos');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2008, 'Terceros - Ficha Direcciones');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2009, 'Terceros - Ficha Facturación');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2010, 'Terceros - Ficha Histórico');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2011, 'Terceros - Plantillas LOPD');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2012, 'Convertir un tercero en cliente o proveedor');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(2000, 2013, 'Modificar contactos');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(3000, 3000, 'Acceso módulo Almacen');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(4000, 4000, 'Acceso módulo Gestión y soporte');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(4000, 4100, 'Gestión de tickets');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(4000, 4200, 'Facturar tickets');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(4000, 4300, 'Documentación');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(4000, 4400, 'Informes');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(4000, 4500, 'Partes de trabajo');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(4000, 4600, 'Gestión de activos');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(4000, 4700, 'Contratos mantenimiento');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(4000, 4800, 'Infopass');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(4000, 4801, 'Infopass SuperAdmin');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(5000, 5000, 'Acceso Modulo Recursos Humanos');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(5000, 5001, 'Acceso Modulo Recursos Humanos (Panel de usuario)');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(5100, 5100, 'Acceso Modulo Gestion de Viajes y Gastos');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(5100, 5101, 'Aprobar Gastos');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(6000, 6000, 'Acceso Modulo Panel del usuario');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(7000, 7000, 'Menu Configuración');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(7000, 7001, 'Acceso Modulos');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(7000, 7002, 'Acceso Permisos');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(7000, 7003, 'Usuarios – Configuración inicio de sesión');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(8000, 8000, 'Acceso Modulo Facturas de Compra');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(8100, 8100, 'Acceso Modulo Albaranes de Compra');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(8200, 8200, 'Acceso Modulo Pedidos de Compra');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(8300, 8300, 'Acceso Modulo Presupuestos de Compra');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(9000, 9000, 'Acceso Modulo Facturas de Venta');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(9100, 9100, 'Acceso Modulo Facturas Venta Rectificativas');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(9200, 9200, 'Acceso Modulo Albaranes de Venta');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(9300, 9300, 'Acceso Modulo Pedidos de Venta');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(9400, 9400, 'Acceso Modulo Presupuestos de Venta');
INSERT INTO `lnx_permisos` (`idmod`, `idpermiso`, `display`) VALUES(9500, 9500, 'Acceso Modulo TPV de Venta');


INSERT INTO `lnx_gastos_cfg` (`opcion`, `valor`) VALUES('APROBAR', 'NO');




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


