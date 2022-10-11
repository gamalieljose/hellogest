<?php
require("core/cfpc.php");

$maestro = array();
$err_tablas = array();
$err_campos = array();
$err_tipocampo = array();

$destino = array();

$maestro["ac"]["id"]["nombrecampo"] = "id" ; $maestro["ac"]["id"]["tipo"] = "int(11)" ; $maestro["ac"]["id"]["extra"] = "auto_increment" ;
$maestro["ac"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["ac"]["idserie"]["tipo"] = "int(11)" ; $maestro["ac"]["idserie"]["extra"] = "" ;
$maestro["ac"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["ac"]["codigoint"]["tipo"] = "int(11)" ; $maestro["ac"]["codigoint"]["extra"] = "" ;
$maestro["ac"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["ac"]["codigo"]["tipo"] = "varchar(10)" ; $maestro["ac"]["codigo"]["extra"] = "" ;
$maestro["ac"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["ac"]["idtercero"]["tipo"] = "int(11)" ; $maestro["ac"]["idtercero"]["extra"] = "" ;
$maestro["ac"]["estado"]["nombrecampo"] = "estado" ; $maestro["ac"]["estado"]["tipo"] = "int(11)" ; $maestro["ac"]["estado"]["extra"] = "" ;
$maestro["ac"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["ac"]["fecha"]["tipo"] = "date" ; $maestro["ac"]["fecha"]["extra"] = "" ;
$maestro["ac"]["vencimiento"]["nombrecampo"] = "vencimiento" ; $maestro["ac"]["vencimiento"]["tipo"] = "date" ; $maestro["ac"]["vencimiento"]["extra"] = "" ;
$maestro["ac"]["idusuario"]["nombrecampo"] = "idusuario" ; $maestro["ac"]["idusuario"]["tipo"] = "int(11)" ; $maestro["ac"]["idusuario"]["extra"] = "" ;
$maestro["ac"]["pagado"]["nombrecampo"] = "pagado" ; $maestro["ac"]["pagado"]["tipo"] = "float" ; $maestro["ac"]["pagado"]["extra"] = "" ;
$maestro["ac"]["editfv"]["nombrecampo"] = "editfv" ; $maestro["ac"]["editfv"]["tipo"] = "int(11)" ; $maestro["ac"]["editfv"]["extra"] = "" ;
$maestro["ac"]["factura"]["nombrecampo"] = "factura" ; $maestro["ac"]["factura"]["tipo"] = "varchar(20)" ; $maestro["ac"]["factura"]["extra"] = "" ;
$maestro["ac"]["pc_cp"]["nombrecampo"] = "pc_cp" ; $maestro["ac"]["pc_cp"]["tipo"] = "int(11)" ; $maestro["ac"]["pc_cp"]["extra"] = "" ;
$maestro["ac"]["pc_dp"]["nombrecampo"] = "pc_dp" ; $maestro["ac"]["pc_dp"]["tipo"] = "int(11)" ; $maestro["ac"]["pc_dp"]["extra"] = "" ;

$maestro["ac_lineas"]["id"]["nombrecampo"] = "id" ; $maestro["ac_lineas"]["id"]["tipo"] = "int(11)" ; $maestro["ac_lineas"]["id"]["extra"] = "auto_increment" ;
$maestro["ac_lineas"]["idac"]["nombrecampo"] = "idac" ; $maestro["ac_lineas"]["idac"]["tipo"] = "int(11)" ; $maestro["ac_lineas"]["idac"]["extra"] = "" ;
$maestro["ac_lineas"]["cod"]["nombrecampo"] = "cod" ; $maestro["ac_lineas"]["cod"]["tipo"] = "varchar(20)" ; $maestro["ac_lineas"]["cod"]["extra"] = "" ;
$maestro["ac_lineas"]["concepto"]["nombrecampo"] = "concepto" ; $maestro["ac_lineas"]["concepto"]["tipo"] = "varchar(250)" ; $maestro["ac_lineas"]["concepto"]["extra"] = "" ;
$maestro["ac_lineas"]["unid"]["nombrecampo"] = "unid" ; $maestro["ac_lineas"]["unid"]["tipo"] = "int(11)" ; $maestro["ac_lineas"]["unid"]["extra"] = "" ;
$maestro["ac_lineas"]["precio"]["nombrecampo"] = "precio" ; $maestro["ac_lineas"]["precio"]["tipo"] = "float" ; $maestro["ac_lineas"]["precio"]["extra"] = "" ;
$maestro["ac_lineas"]["dto"]["nombrecampo"] = "dto" ; $maestro["ac_lineas"]["dto"]["tipo"] = "int(11)" ; $maestro["ac_lineas"]["dto"]["extra"] = "" ;
$maestro["ac_lineas"]["importe"]["nombrecampo"] = "importe" ; $maestro["ac_lineas"]["importe"]["tipo"] = "float" ; $maestro["ac_lineas"]["importe"]["extra"] = "" ;
$maestro["ac_lineas"]["orden"]["nombrecampo"] = "orden" ; $maestro["ac_lineas"]["orden"]["tipo"] = "int(11)" ; $maestro["ac_lineas"]["orden"]["extra"] = "" ;
$maestro["ac_lineas"]["exclufactu"]["nombrecampo"] = "exclufactu" ; $maestro["ac_lineas"]["exclufactu"]["tipo"] = "int(11)" ; $maestro["ac_lineas"]["exclufactu"]["extra"] = "" ;

$maestro["ac_lineas_tax"]["id"]["nombrecampo"] = "id" ; $maestro["ac_lineas_tax"]["id"]["tipo"] = "int(11)" ; $maestro["ac_lineas_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["ac_lineas_tax"]["idac"]["nombrecampo"] = "idac" ; $maestro["ac_lineas_tax"]["idac"]["tipo"] = "int(11)" ; $maestro["ac_lineas_tax"]["idac"]["extra"] = "" ;
$maestro["ac_lineas_tax"]["idaclinea"]["nombrecampo"] = "idaclinea" ; $maestro["ac_lineas_tax"]["idaclinea"]["tipo"] = "int(11)" ; $maestro["ac_lineas_tax"]["idaclinea"]["extra"] = "" ;
$maestro["ac_lineas_tax"]["idtax"]["nombrecampo"] = "idtax" ; $maestro["ac_lineas_tax"]["idtax"]["tipo"] = "int(11)" ; $maestro["ac_lineas_tax"]["idtax"]["extra"] = "" ;
$maestro["ac_lineas_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["ac_lineas_tax"]["valor"]["tipo"] = "float" ; $maestro["ac_lineas_tax"]["valor"]["extra"] = "" ;
$maestro["ac_lineas_tax"]["importe"]["nombrecampo"] = "importe" ; $maestro["ac_lineas_tax"]["importe"]["tipo"] = "float" ; $maestro["ac_lineas_tax"]["importe"]["extra"] = "" ;

$maestro["ac_pagos"]["id"]["nombrecampo"] = "id" ; $maestro["ac_pagos"]["id"]["tipo"] = "int(11)" ; $maestro["ac_pagos"]["id"]["extra"] = "auto_increment" ;
$maestro["ac_pagos"]["idac"]["nombrecampo"] = "idac" ; $maestro["ac_pagos"]["idac"]["tipo"] = "int(11)" ; $maestro["ac_pagos"]["idac"]["extra"] = "" ;
$maestro["ac_pagos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["ac_pagos"]["fecha"]["tipo"] = "date" ; $maestro["ac_pagos"]["fecha"]["extra"] = "" ;
$maestro["ac_pagos"]["importe"]["nombrecampo"] = "importe" ; $maestro["ac_pagos"]["importe"]["tipo"] = "float" ; $maestro["ac_pagos"]["importe"]["extra"] = "" ;
$maestro["ac_pagos"]["idfpago"]["nombrecampo"] = "idfpago" ; $maestro["ac_pagos"]["idfpago"]["tipo"] = "int(11)" ; $maestro["ac_pagos"]["idfpago"]["extra"] = "" ;
$maestro["ac_pagos"]["idcpago"]["nombrecampo"] = "idcpago" ; $maestro["ac_pagos"]["idcpago"]["tipo"] = "int(11)" ; $maestro["ac_pagos"]["idcpago"]["extra"] = "" ;

$maestro["ac_sn"]["id"]["nombrecampo"] = "id" ; $maestro["ac_sn"]["id"]["tipo"] = "int(11)" ; $maestro["ac_sn"]["id"]["extra"] = "auto_increment" ;
$maestro["ac_sn"]["idac"]["nombrecampo"] = "idac" ; $maestro["ac_sn"]["idac"]["tipo"] = "int(11)" ; $maestro["ac_sn"]["idac"]["extra"] = "" ;
$maestro["ac_sn"]["idlinea"]["nombrecampo"] = "idlinea" ; $maestro["ac_sn"]["idlinea"]["tipo"] = "int(11)" ; $maestro["ac_sn"]["idlinea"]["extra"] = "" ;
$maestro["ac_sn"]["sn"]["nombrecampo"] = "sn" ; $maestro["ac_sn"]["sn"]["tipo"] = "varchar(50)" ; $maestro["ac_sn"]["sn"]["extra"] = "" ;
$maestro["ac_sn"]["pn"]["nombrecampo"] = "pn" ; $maestro["ac_sn"]["pn"]["tipo"] = "varchar(50)" ; $maestro["ac_sn"]["pn"]["extra"] = "" ;
$maestro["ac_sn"]["otro"]["nombrecampo"] = "otro" ; $maestro["ac_sn"]["otro"]["tipo"] = "varchar(50)" ; $maestro["ac_sn"]["otro"]["extra"] = "" ;

$maestro["ac_tax"]["id"]["nombrecampo"] = "id" ; $maestro["ac_tax"]["id"]["tipo"] = "int(11)" ; $maestro["ac_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["ac_tax"]["idac"]["nombrecampo"] = "idac" ; $maestro["ac_tax"]["idac"]["tipo"] = "int(11)" ; $maestro["ac_tax"]["idac"]["extra"] = "" ;
$maestro["ac_tax"]["idimpuesto"]["nombrecampo"] = "idimpuesto" ; $maestro["ac_tax"]["idimpuesto"]["tipo"] = "int(11)" ; $maestro["ac_tax"]["idimpuesto"]["extra"] = "" ;
$maestro["ac_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["ac_tax"]["valor"]["tipo"] = "int(11)" ; $maestro["ac_tax"]["valor"]["extra"] = "" ;

$maestro["almacenes"]["id"]["nombrecampo"] = "id" ; $maestro["almacenes"]["id"]["tipo"] = "int(11)" ; $maestro["almacenes"]["id"]["extra"] = "auto_increment" ;
$maestro["almacenes"]["almacen"]["nombrecampo"] = "almacen" ; $maestro["almacenes"]["almacen"]["tipo"] = "varchar(50)" ; $maestro["almacenes"]["almacen"]["extra"] = "" ;
$maestro["almacenes"]["dft"]["nombrecampo"] = "dft" ; $maestro["almacenes"]["dft"]["tipo"] = "int(11)" ; $maestro["almacenes"]["dft"]["extra"] = "" ;

$maestro["atributos"]["id"]["nombrecampo"] = "id" ; $maestro["atributos"]["id"]["tipo"] = "int(11)" ; $maestro["atributos"]["id"]["extra"] = "auto_increment" ;
$maestro["atributos"]["atributo"]["nombrecampo"] = "atributo" ; $maestro["atributos"]["atributo"]["tipo"] = "varchar(50)" ; $maestro["atributos"]["atributo"]["extra"] = "" ;

$maestro["atributosvalor"]["id"]["nombrecampo"] = "id" ; $maestro["atributosvalor"]["id"]["tipo"] = "int(11)" ; $maestro["atributosvalor"]["id"]["extra"] = "auto_increment" ;
$maestro["atributosvalor"]["idatrib"]["nombrecampo"] = "idatrib" ; $maestro["atributosvalor"]["idatrib"]["tipo"] = "int(11)" ; $maestro["atributosvalor"]["idatrib"]["extra"] = "" ;
$maestro["atributosvalor"]["valor"]["nombrecampo"] = "valor" ; $maestro["atributosvalor"]["valor"]["tipo"] = "varchar(50)" ; $maestro["atributosvalor"]["valor"]["extra"] = "" ;

$maestro["av"]["id"]["nombrecampo"] = "id" ; $maestro["av"]["id"]["tipo"] = "int(11)" ; $maestro["av"]["id"]["extra"] = "auto_increment" ;
$maestro["av"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["av"]["idserie"]["tipo"] = "int(11)" ; $maestro["av"]["idserie"]["extra"] = "" ;
$maestro["av"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["av"]["codigoint"]["tipo"] = "int(11)" ; $maestro["av"]["codigoint"]["extra"] = "" ;
$maestro["av"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["av"]["codigo"]["tipo"] = "varchar(10)" ; $maestro["av"]["codigo"]["extra"] = "" ;
$maestro["av"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["av"]["idtercero"]["tipo"] = "int(11)" ; $maestro["av"]["idtercero"]["extra"] = "" ;
$maestro["av"]["estado"]["nombrecampo"] = "estado" ; $maestro["av"]["estado"]["tipo"] = "int(11)" ; $maestro["av"]["estado"]["extra"] = "" ;
$maestro["av"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["av"]["fecha"]["tipo"] = "date" ; $maestro["av"]["fecha"]["extra"] = "" ;
$maestro["av"]["vencimiento"]["nombrecampo"] = "vencimiento" ; $maestro["av"]["vencimiento"]["tipo"] = "date" ; $maestro["av"]["vencimiento"]["extra"] = "" ;
$maestro["av"]["idusuario"]["nombrecampo"] = "idusuario" ; $maestro["av"]["idusuario"]["tipo"] = "int(11)" ; $maestro["av"]["idusuario"]["extra"] = "" ;
$maestro["av"]["pagado"]["nombrecampo"] = "pagado" ; $maestro["av"]["pagado"]["tipo"] = "float" ; $maestro["av"]["pagado"]["extra"] = "" ;
$maestro["av"]["editfv"]["nombrecampo"] = "editfv" ; $maestro["av"]["editfv"]["tipo"] = "int(11)" ; $maestro["av"]["editfv"]["extra"] = "" ;
$maestro["av"]["pc_cp"]["nombrecampo"] = "pc_cp" ; $maestro["av"]["pc_cp"]["tipo"] = "int(11)" ; $maestro["av"]["pc_cp"]["extra"] = "" ;
$maestro["av"]["pc_dp"]["nombrecampo"] = "pc_dp" ; $maestro["av"]["pc_dp"]["tipo"] = "int(11)" ; $maestro["av"]["pc_dp"]["extra"] = "" ;

$maestro["av_lineas"]["id"]["nombrecampo"] = "id" ; $maestro["av_lineas"]["id"]["tipo"] = "int(11)" ; $maestro["av_lineas"]["id"]["extra"] = "auto_increment" ;
$maestro["av_lineas"]["idav"]["nombrecampo"] = "idav" ; $maestro["av_lineas"]["idav"]["tipo"] = "int(11)" ; $maestro["av_lineas"]["idav"]["extra"] = "" ;
$maestro["av_lineas"]["cod"]["nombrecampo"] = "cod" ; $maestro["av_lineas"]["cod"]["tipo"] = "varchar(20)" ; $maestro["av_lineas"]["cod"]["extra"] = "" ;
$maestro["av_lineas"]["concepto"]["nombrecampo"] = "concepto" ; $maestro["av_lineas"]["concepto"]["tipo"] = "varchar(250)" ; $maestro["av_lineas"]["concepto"]["extra"] = "" ;
$maestro["av_lineas"]["unid"]["nombrecampo"] = "unid" ; $maestro["av_lineas"]["unid"]["tipo"] = "int(11)" ; $maestro["av_lineas"]["unid"]["extra"] = "" ;
$maestro["av_lineas"]["precio"]["nombrecampo"] = "precio" ; $maestro["av_lineas"]["precio"]["tipo"] = "float" ; $maestro["av_lineas"]["precio"]["extra"] = "" ;
$maestro["av_lineas"]["dto"]["nombrecampo"] = "dto" ; $maestro["av_lineas"]["dto"]["tipo"] = "int(11)" ; $maestro["av_lineas"]["dto"]["extra"] = "" ;
$maestro["av_lineas"]["importe"]["nombrecampo"] = "importe" ; $maestro["av_lineas"]["importe"]["tipo"] = "float" ; $maestro["av_lineas"]["importe"]["extra"] = "" ;
$maestro["av_lineas"]["orden"]["nombrecampo"] = "orden" ; $maestro["av_lineas"]["orden"]["tipo"] = "int(11)" ; $maestro["av_lineas"]["orden"]["extra"] = "" ;
$maestro["av_lineas"]["exclufactu"]["nombrecampo"] = "exclufactu" ; $maestro["av_lineas"]["exclufactu"]["tipo"] = "int(11)" ; $maestro["av_lineas"]["exclufactu"]["extra"] = "" ;

$maestro["av_lineas_tax"]["id"]["nombrecampo"] = "id" ; $maestro["av_lineas_tax"]["id"]["tipo"] = "int(11)" ; $maestro["av_lineas_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["av_lineas_tax"]["idav"]["nombrecampo"] = "idav" ; $maestro["av_lineas_tax"]["idav"]["tipo"] = "int(11)" ; $maestro["av_lineas_tax"]["idav"]["extra"] = "" ;
$maestro["av_lineas_tax"]["idavlinea"]["nombrecampo"] = "idavlinea" ; $maestro["av_lineas_tax"]["idavlinea"]["tipo"] = "int(11)" ; $maestro["av_lineas_tax"]["idavlinea"]["extra"] = "" ;
$maestro["av_lineas_tax"]["idtax"]["nombrecampo"] = "idtax" ; $maestro["av_lineas_tax"]["idtax"]["tipo"] = "int(11)" ; $maestro["av_lineas_tax"]["idtax"]["extra"] = "" ;
$maestro["av_lineas_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["av_lineas_tax"]["valor"]["tipo"] = "float" ; $maestro["av_lineas_tax"]["valor"]["extra"] = "" ;
$maestro["av_lineas_tax"]["importe"]["nombrecampo"] = "importe" ; $maestro["av_lineas_tax"]["importe"]["tipo"] = "float" ; $maestro["av_lineas_tax"]["importe"]["extra"] = "" ;

$maestro["av_pagos"]["id"]["nombrecampo"] = "id" ; $maestro["av_pagos"]["id"]["tipo"] = "int(11)" ; $maestro["av_pagos"]["id"]["extra"] = "auto_increment" ;
$maestro["av_pagos"]["idav"]["nombrecampo"] = "idav" ; $maestro["av_pagos"]["idav"]["tipo"] = "int(11)" ; $maestro["av_pagos"]["idav"]["extra"] = "" ;
$maestro["av_pagos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["av_pagos"]["fecha"]["tipo"] = "date" ; $maestro["av_pagos"]["fecha"]["extra"] = "" ;
$maestro["av_pagos"]["importe"]["nombrecampo"] = "importe" ; $maestro["av_pagos"]["importe"]["tipo"] = "float" ; $maestro["av_pagos"]["importe"]["extra"] = "" ;
$maestro["av_pagos"]["idfpago"]["nombrecampo"] = "idfpago" ; $maestro["av_pagos"]["idfpago"]["tipo"] = "int(11)" ; $maestro["av_pagos"]["idfpago"]["extra"] = "" ;
$maestro["av_pagos"]["idcpago"]["nombrecampo"] = "idcpago" ; $maestro["av_pagos"]["idcpago"]["tipo"] = "int(11)" ; $maestro["av_pagos"]["idcpago"]["extra"] = "" ;

$maestro["av_sn"]["id"]["nombrecampo"] = "id" ; $maestro["av_sn"]["id"]["tipo"] = "int(11)" ; $maestro["av_sn"]["id"]["extra"] = "auto_increment" ;
$maestro["av_sn"]["idav"]["nombrecampo"] = "idav" ; $maestro["av_sn"]["idav"]["tipo"] = "int(11)" ; $maestro["av_sn"]["idav"]["extra"] = "" ;
$maestro["av_sn"]["idlinea"]["nombrecampo"] = "idlinea" ; $maestro["av_sn"]["idlinea"]["tipo"] = "int(11)" ; $maestro["av_sn"]["idlinea"]["extra"] = "" ;
$maestro["av_sn"]["sn"]["nombrecampo"] = "sn" ; $maestro["av_sn"]["sn"]["tipo"] = "varchar(50)" ; $maestro["av_sn"]["sn"]["extra"] = "" ;
$maestro["av_sn"]["pn"]["nombrecampo"] = "pn" ; $maestro["av_sn"]["pn"]["tipo"] = "varchar(50)" ; $maestro["av_sn"]["pn"]["extra"] = "" ;
$maestro["av_sn"]["otro"]["nombrecampo"] = "otro" ; $maestro["av_sn"]["otro"]["tipo"] = "varchar(50)" ; $maestro["av_sn"]["otro"]["extra"] = "" ;

$maestro["av_tax"]["id"]["nombrecampo"] = "id" ; $maestro["av_tax"]["id"]["tipo"] = "int(11)" ; $maestro["av_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["av_tax"]["idav"]["nombrecampo"] = "idav" ; $maestro["av_tax"]["idav"]["tipo"] = "int(11)" ; $maestro["av_tax"]["idav"]["extra"] = "" ;
$maestro["av_tax"]["idimpuesto"]["nombrecampo"] = "idimpuesto" ; $maestro["av_tax"]["idimpuesto"]["tipo"] = "int(11)" ; $maestro["av_tax"]["idimpuesto"]["extra"] = "" ;
$maestro["av_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["av_tax"]["valor"]["tipo"] = "int(11)" ; $maestro["av_tax"]["valor"]["extra"] = "" ;

$maestro["bancos"]["id"]["nombrecampo"] = "id" ; $maestro["bancos"]["id"]["tipo"] = "int(11)" ; $maestro["bancos"]["id"]["extra"] = "auto_increment" ;
$maestro["bancos"]["banco"]["nombrecampo"] = "banco" ; $maestro["bancos"]["banco"]["tipo"] = "varchar(50)" ; $maestro["bancos"]["banco"]["extra"] = "" ;

$maestro["bancos_cpago"]["id"]["nombrecampo"] = "id" ; $maestro["bancos_cpago"]["id"]["tipo"] = "int(11)" ; $maestro["bancos_cpago"]["id"]["extra"] = "auto_increment" ;
$maestro["bancos_cpago"]["cpago"]["nombrecampo"] = "cpago" ; $maestro["bancos_cpago"]["cpago"]["tipo"] = "varchar(50)" ; $maestro["bancos_cpago"]["cpago"]["extra"] = "" ;
$maestro["bancos_cpago"]["dias"]["nombrecampo"] = "dias" ; $maestro["bancos_cpago"]["dias"]["tipo"] = "int(11)" ; $maestro["bancos_cpago"]["dias"]["extra"] = "" ;
$maestro["bancos_cpago"]["diapago"]["nombrecampo"] = "diapago" ; $maestro["bancos_cpago"]["diapago"]["tipo"] = "int(11)" ; $maestro["bancos_cpago"]["diapago"]["extra"] = "" ;
$maestro["bancos_cpago"]["idcuenta"]["nombrecampo"] = "idcuenta" ; $maestro["bancos_cpago"]["idcuenta"]["tipo"] = "int(11)" ; $maestro["bancos_cpago"]["idcuenta"]["extra"] = "" ;

$maestro["bancostipo"]["id"]["nombrecampo"] = "id" ; $maestro["bancostipo"]["id"]["tipo"] = "int(11)" ; $maestro["bancostipo"]["id"]["extra"] = "auto_increment" ;
$maestro["bancostipo"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["bancostipo"]["tipo"]["tipo"] = "varchar(50)" ; $maestro["bancostipo"]["tipo"]["extra"] = "" ;
$maestro["bancostipo"]["conta"]["nombrecampo"] = "conta" ; $maestro["bancostipo"]["conta"]["tipo"] = "int(11)" ; $maestro["bancostipo"]["conta"]["extra"] = "" ;

$maestro["bloqueos"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["bloqueos"]["iduser"]["tipo"] = "int(11)" ; $maestro["bloqueos"]["iduser"]["extra"] = "" ;
$maestro["bloqueos"]["tabla"]["nombrecampo"] = "tabla" ; $maestro["bloqueos"]["tabla"]["tipo"] = "varchar(50)" ; $maestro["bloqueos"]["tabla"]["extra"] = "" ;
$maestro["bloqueos"]["idregistro"]["nombrecampo"] = "idregistro" ; $maestro["bloqueos"]["idregistro"]["tipo"] = "int(11)" ; $maestro["bloqueos"]["idregistro"]["extra"] = "" ;
$maestro["bloqueos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["bloqueos"]["fecha"]["tipo"] = "datetime" ; $maestro["bloqueos"]["fecha"]["extra"] = "" ;

$maestro["conta_cfpc"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["conta_cfpc"]["idempresa"]["tipo"] = "int(11)" ; $maestro["conta_cfpc"]["idempresa"]["extra"] = "" ;
$maestro["conta_cfpc"]["opcion"]["nombrecampo"] = "opcion" ; $maestro["conta_cfpc"]["opcion"]["tipo"] = "varchar(50)" ; $maestro["conta_cfpc"]["opcion"]["extra"] = "" ;
$maestro["conta_cfpc"]["valor"]["nombrecampo"] = "valor" ; $maestro["conta_cfpc"]["valor"]["tipo"] = "varchar(50)" ; $maestro["conta_cfpc"]["valor"]["extra"] = "" ;

$maestro["conta_ejercicios"]["id"]["nombrecampo"] = "id" ; $maestro["conta_ejercicios"]["id"]["tipo"] = "int(11)" ; $maestro["conta_ejercicios"]["id"]["extra"] = "auto_increment" ;
$maestro["conta_ejercicios"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["conta_ejercicios"]["idempresa"]["tipo"] = "int(11)" ; $maestro["conta_ejercicios"]["idempresa"]["extra"] = "" ;
$maestro["conta_ejercicios"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["conta_ejercicios"]["idserie"]["tipo"] = "int(11)" ; $maestro["conta_ejercicios"]["idserie"]["extra"] = "" ;
$maestro["conta_ejercicios"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["conta_ejercicios"]["codigoint"]["tipo"] = "int(11)" ; $maestro["conta_ejercicios"]["codigoint"]["extra"] = "" ;
$maestro["conta_ejercicios"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["conta_ejercicios"]["codigo"]["tipo"] = "varchar(50)" ; $maestro["conta_ejercicios"]["codigo"]["extra"] = "" ;
$maestro["conta_ejercicios"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["conta_ejercicios"]["descripcion"]["tipo"] = "varchar(50)" ; $maestro["conta_ejercicios"]["descripcion"]["extra"] = "" ;
$maestro["conta_ejercicios"]["finicio"]["nombrecampo"] = "finicio" ; $maestro["conta_ejercicios"]["finicio"]["tipo"] = "date" ; $maestro["conta_ejercicios"]["finicio"]["extra"] = "" ;
$maestro["conta_ejercicios"]["ffin"]["nombrecampo"] = "ffin" ; $maestro["conta_ejercicios"]["ffin"]["tipo"] = "date" ; $maestro["conta_ejercicios"]["ffin"]["extra"] = "" ;
$maestro["conta_ejercicios"]["idestado"]["nombrecampo"] = "idestado" ; $maestro["conta_ejercicios"]["idestado"]["tipo"] = "int(11)" ; $maestro["conta_ejercicios"]["idestado"]["extra"] = "" ;

$maestro["conta_grupos"]["id"]["nombrecampo"] = "id" ; $maestro["conta_grupos"]["id"]["tipo"] = "int(11)" ; $maestro["conta_grupos"]["id"]["extra"] = "auto_increment" ;
$maestro["conta_grupos"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["conta_grupos"]["idserie"]["tipo"] = "int(11)" ; $maestro["conta_grupos"]["idserie"]["extra"] = "" ;
$maestro["conta_grupos"]["codgrupo"]["nombrecampo"] = "codgrupo" ; $maestro["conta_grupos"]["codgrupo"]["tipo"] = "int(11)" ; $maestro["conta_grupos"]["codgrupo"]["extra"] = "" ;
$maestro["conta_grupos"]["grupo"]["nombrecampo"] = "grupo" ; $maestro["conta_grupos"]["grupo"]["tipo"] = "varchar(50)" ; $maestro["conta_grupos"]["grupo"]["extra"] = "" ;
$maestro["conta_grupos"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["conta_grupos"]["idempresa"]["tipo"] = "int(11)" ; $maestro["conta_grupos"]["idempresa"]["extra"] = "" ;

$maestro["conta_master"]["id"]["nombrecampo"] = "id" ; $maestro["conta_master"]["id"]["tipo"] = "int(11)" ; $maestro["conta_master"]["id"]["extra"] = "auto_increment" ;
$maestro["conta_master"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["conta_master"]["idempresa"]["tipo"] = "int(11)" ; $maestro["conta_master"]["idempresa"]["extra"] = "" ;
$maestro["conta_master"]["grupo"]["nombrecampo"] = "grupo" ; $maestro["conta_master"]["grupo"]["tipo"] = "int(11)" ; $maestro["conta_master"]["grupo"]["extra"] = "" ;
$maestro["conta_master"]["subcuenta"]["nombrecampo"] = "subcuenta" ; $maestro["conta_master"]["subcuenta"]["tipo"] = "int(11)" ; $maestro["conta_master"]["subcuenta"]["extra"] = "" ;
$maestro["conta_master"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["conta_master"]["descripcion"]["tipo"] = "varchar(60)" ; $maestro["conta_master"]["descripcion"]["extra"] = "" ;
$maestro["conta_master"]["modulo"]["nombrecampo"] = "modulo" ; $maestro["conta_master"]["modulo"]["tipo"] = "varchar(50)" ; $maestro["conta_master"]["modulo"]["extra"] = "" ;
$maestro["conta_master"]["idreg"]["nombrecampo"] = "idreg" ; $maestro["conta_master"]["idreg"]["tipo"] = "int(11)" ; $maestro["conta_master"]["idreg"]["extra"] = "" ;

$maestro["conta_subgrupos"]["id"]["nombrecampo"] = "id" ; $maestro["conta_subgrupos"]["id"]["tipo"] = "int(11)" ; $maestro["conta_subgrupos"]["id"]["extra"] = "auto_increment" ;
$maestro["conta_subgrupos"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["conta_subgrupos"]["idserie"]["tipo"] = "int(11)" ; $maestro["conta_subgrupos"]["idserie"]["extra"] = "" ;
$maestro["conta_subgrupos"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["conta_subgrupos"]["idempresa"]["tipo"] = "int(11)" ; $maestro["conta_subgrupos"]["idempresa"]["extra"] = "" ;
$maestro["conta_subgrupos"]["subgrupo"]["nombrecampo"] = "subgrupo" ; $maestro["conta_subgrupos"]["subgrupo"]["tipo"] = "int(11)" ; $maestro["conta_subgrupos"]["subgrupo"]["extra"] = "" ;
$maestro["conta_subgrupos"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["conta_subgrupos"]["descripcion"]["tipo"] = "varchar(50)" ; $maestro["conta_subgrupos"]["descripcion"]["extra"] = "" ;

$maestro["crm_camp"]["id"]["nombrecampo"] = "id" ; $maestro["crm_camp"]["id"]["tipo"] = "int(11)" ; $maestro["crm_camp"]["id"]["extra"] = "auto_increment" ;
$maestro["crm_camp"]["camp"]["nombrecampo"] = "camp" ; $maestro["crm_camp"]["camp"]["tipo"] = "varchar(50)" ; $maestro["crm_camp"]["camp"]["extra"] = "" ;
$maestro["crm_camp"]["notas"]["nombrecampo"] = "notas" ; $maestro["crm_camp"]["notas"]["tipo"] = "text" ; $maestro["crm_camp"]["notas"]["extra"] = "" ;

$maestro["crm_phonecalls"]["id"]["nombrecampo"] = "id" ; $maestro["crm_phonecalls"]["id"]["tipo"] = "int(11)" ; $maestro["crm_phonecalls"]["id"]["extra"] = "auto_increment" ;
$maestro["crm_phonecalls"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["crm_phonecalls"]["fecha"]["tipo"] = "datetime" ; $maestro["crm_phonecalls"]["fecha"]["extra"] = "" ;
$maestro["crm_phonecalls"]["idcreado"]["nombrecampo"] = "idcreado" ; $maestro["crm_phonecalls"]["idcreado"]["tipo"] = "int(11)" ; $maestro["crm_phonecalls"]["idcreado"]["extra"] = "" ;
$maestro["crm_phonecalls"]["idasignado"]["nombrecampo"] = "idasignado" ; $maestro["crm_phonecalls"]["idasignado"]["tipo"] = "int(11)" ; $maestro["crm_phonecalls"]["idasignado"]["extra"] = "" ;
$maestro["crm_phonecalls"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["crm_phonecalls"]["idtercero"]["tipo"] = "int(11)" ; $maestro["crm_phonecalls"]["idtercero"]["extra"] = "" ;
$maestro["crm_phonecalls"]["idcontacto"]["nombrecampo"] = "idcontacto" ; $maestro["crm_phonecalls"]["idcontacto"]["tipo"] = "int(11)" ; $maestro["crm_phonecalls"]["idcontacto"]["extra"] = "" ;
$maestro["crm_phonecalls"]["nota"]["nombrecampo"] = "nota" ; $maestro["crm_phonecalls"]["nota"]["tipo"] = "varchar(255)" ; $maestro["crm_phonecalls"]["nota"]["extra"] = "" ;
$maestro["crm_phonecalls"]["telefono"]["nombrecampo"] = "telefono" ; $maestro["crm_phonecalls"]["telefono"]["tipo"] = "varchar(20)" ; $maestro["crm_phonecalls"]["telefono"]["extra"] = "" ;
$maestro["crm_phonecalls"]["telefono2"]["nombrecampo"] = "telefono2" ; $maestro["crm_phonecalls"]["telefono2"]["tipo"] = "varchar(20)" ; $maestro["crm_phonecalls"]["telefono2"]["extra"] = "" ;
$maestro["crm_phonecalls"]["idestado"]["nombrecampo"] = "idestado" ; $maestro["crm_phonecalls"]["idestado"]["tipo"] = "int(11)" ; $maestro["crm_phonecalls"]["idestado"]["extra"] = "" ;
$maestro["crm_phonecalls"]["idprioridad"]["nombrecampo"] = "idprioridad" ; $maestro["crm_phonecalls"]["idprioridad"]["tipo"] = "int(11)" ; $maestro["crm_phonecalls"]["idprioridad"]["extra"] = "" ;

$maestro["crm_seg"]["id"]["nombrecampo"] = "id" ; $maestro["crm_seg"]["id"]["tipo"] = "int(11)" ; $maestro["crm_seg"]["id"]["extra"] = "auto_increment" ;
$maestro["crm_seg"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["crm_seg"]["idtercero"]["tipo"] = "int(11)" ; $maestro["crm_seg"]["idtercero"]["extra"] = "" ;
$maestro["crm_seg"]["idcontacto"]["nombrecampo"] = "idcontacto" ; $maestro["crm_seg"]["idcontacto"]["tipo"] = "int(11)" ; $maestro["crm_seg"]["idcontacto"]["extra"] = "" ;
$maestro["crm_seg"]["idcamp"]["nombrecampo"] = "idcamp" ; $maestro["crm_seg"]["idcamp"]["tipo"] = "int(11)" ; $maestro["crm_seg"]["idcamp"]["extra"] = "" ;
$maestro["crm_seg"]["seguimiento"]["nombrecampo"] = "seguimiento" ; $maestro["crm_seg"]["seguimiento"]["tipo"] = "varchar(255)" ; $maestro["crm_seg"]["seguimiento"]["extra"] = "" ;
$maestro["crm_seg"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["crm_seg"]["fecha"]["tipo"] = "datetime" ; $maestro["crm_seg"]["fecha"]["extra"] = "" ;
$maestro["crm_seg"]["llamada"]["nombrecampo"] = "llamada" ; $maestro["crm_seg"]["llamada"]["tipo"] = "int(11)" ; $maestro["crm_seg"]["llamada"]["extra"] = "" ;
$maestro["crm_seg"]["visita"]["nombrecampo"] = "visita" ; $maestro["crm_seg"]["visita"]["tipo"] = "int(11)" ; $maestro["crm_seg"]["visita"]["extra"] = "" ;
$maestro["crm_seg"]["email"]["nombrecampo"] = "email" ; $maestro["crm_seg"]["email"]["tipo"] = "int(11)" ; $maestro["crm_seg"]["email"]["extra"] = "" ;
$maestro["crm_seg"]["otros"]["nombrecampo"] = "otros" ; $maestro["crm_seg"]["otros"]["tipo"] = "int(11)" ; $maestro["crm_seg"]["otros"]["extra"] = "" ;
$maestro["crm_seg"]["rsseg"]["nombrecampo"] = "rsseg" ; $maestro["crm_seg"]["rsseg"]["tipo"] = "int(11)" ; $maestro["crm_seg"]["rsseg"]["extra"] = "" ;

$maestro["cuentascajas"]["id"]["nombrecampo"] = "id" ; $maestro["cuentascajas"]["id"]["tipo"] = "int(11)" ; $maestro["cuentascajas"]["id"]["extra"] = "auto_increment" ;
$maestro["cuentascajas"]["idbanco"]["nombrecampo"] = "idbanco" ; $maestro["cuentascajas"]["idbanco"]["tipo"] = "int(11)" ; $maestro["cuentascajas"]["idbanco"]["extra"] = "" ;
$maestro["cuentascajas"]["idbancotipo"]["nombrecampo"] = "idbancotipo" ; $maestro["cuentascajas"]["idbancotipo"]["tipo"] = "int(11)" ; $maestro["cuentascajas"]["idbancotipo"]["extra"] = "" ;
$maestro["cuentascajas"]["cuenta"]["nombrecampo"] = "cuenta" ; $maestro["cuentascajas"]["cuenta"]["tipo"] = "varchar(30)" ; $maestro["cuentascajas"]["cuenta"]["extra"] = "" ;
$maestro["cuentascajas"]["activo"]["nombrecampo"] = "activo" ; $maestro["cuentascajas"]["activo"]["tipo"] = "int(11)" ; $maestro["cuentascajas"]["activo"]["extra"] = "" ;
$maestro["cuentascajas"]["ref"]["nombrecampo"] = "ref" ; $maestro["cuentascajas"]["ref"]["tipo"] = "varchar(20)" ; $maestro["cuentascajas"]["ref"]["extra"] = "" ;
$maestro["cuentascajas"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["cuentascajas"]["idempresa"]["tipo"] = "int(11)" ; $maestro["cuentascajas"]["idempresa"]["extra"] = "" ;

$maestro["dic_actividades"]["id"]["nombrecampo"] = "id" ; $maestro["dic_actividades"]["id"]["tipo"] = "int(11)" ; $maestro["dic_actividades"]["id"]["extra"] = "auto_increment" ;
$maestro["dic_actividades"]["actividad"]["nombrecampo"] = "actividad" ; $maestro["dic_actividades"]["actividad"]["tipo"] = "varchar(50)" ; $maestro["dic_actividades"]["actividad"]["extra"] = "" ;

$maestro["dic_docseries"]["id"]["nombrecampo"] = "id" ; $maestro["dic_docseries"]["id"]["tipo"] = "int(11)" ; $maestro["dic_docseries"]["id"]["extra"] = "auto_increment" ;
$maestro["dic_docseries"]["docserie"]["nombrecampo"] = "docserie" ; $maestro["dic_docseries"]["docserie"]["tipo"] = "varchar(50)" ; $maestro["dic_docseries"]["docserie"]["extra"] = "" ;
$maestro["dic_docseries"]["valor"]["nombrecampo"] = "valor" ; $maestro["dic_docseries"]["valor"]["tipo"] = "varchar(20)" ; $maestro["dic_docseries"]["valor"]["extra"] = "" ;

$maestro["dic_idiomas"]["id"]["nombrecampo"] = "id" ; $maestro["dic_idiomas"]["id"]["tipo"] = "int(11)" ; $maestro["dic_idiomas"]["id"]["extra"] = "auto_increment" ;
$maestro["dic_idiomas"]["idioma"]["nombrecampo"] = "idioma" ; $maestro["dic_idiomas"]["idioma"]["tipo"] = "varchar(50)" ; $maestro["dic_idiomas"]["idioma"]["extra"] = "" ;
$maestro["dic_idiomas"]["fichero"]["nombrecampo"] = "fichero" ; $maestro["dic_idiomas"]["fichero"]["tipo"] = "varchar(5)" ; $maestro["dic_idiomas"]["fichero"]["extra"] = "" ;

$maestro["dic_lopd"]["id"]["nombrecampo"] = "id" ; $maestro["dic_lopd"]["id"]["tipo"] = "int(11)" ; $maestro["dic_lopd"]["id"]["extra"] = "auto_increment" ;
$maestro["dic_lopd"]["lopdcat"]["nombrecampo"] = "lopdcat" ; $maestro["dic_lopd"]["lopdcat"]["tipo"] = "varchar(50)" ; $maestro["dic_lopd"]["lopdcat"]["extra"] = "" ;

$maestro["dic_zonas"]["id"]["nombrecampo"] = "id" ; $maestro["dic_zonas"]["id"]["tipo"] = "int(11)" ; $maestro["dic_zonas"]["id"]["extra"] = "auto_increment" ;
$maestro["dic_zonas"]["zona"]["nombrecampo"] = "zona" ; $maestro["dic_zonas"]["zona"]["tipo"] = "varchar(50)" ; $maestro["dic_zonas"]["zona"]["extra"] = "" ;

$maestro["docprint"]["id"]["nombrecampo"] = "id" ; $maestro["docprint"]["id"]["tipo"] = "int(11)" ; $maestro["docprint"]["id"]["extra"] = "auto_increment" ;
$maestro["docprint"]["idmod"]["nombrecampo"] = "idmod" ; $maestro["docprint"]["idmod"]["tipo"] = "int(11)" ; $maestro["docprint"]["idmod"]["extra"] = "" ;
$maestro["docprint"]["codinforme"]["nombrecampo"] = "codinforme" ; $maestro["docprint"]["codinforme"]["tipo"] = "varchar(10)" ; $maestro["docprint"]["codinforme"]["extra"] = "" ;
$maestro["docprint"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["docprint"]["descripcion"]["tipo"] = "varchar(50)" ; $maestro["docprint"]["descripcion"]["extra"] = "" ;
$maestro["docprint"]["idfileplantilla"]["nombrecampo"] = "idfileplantilla" ; $maestro["docprint"]["idfileplantilla"]["tipo"] = "int(11)" ; $maestro["docprint"]["idfileplantilla"]["extra"] = "" ;
$maestro["docprint"]["idfileprocesador"]["nombrecampo"] = "idfileprocesador" ; $maestro["docprint"]["idfileprocesador"]["tipo"] = "int(11)" ; $maestro["docprint"]["idfileprocesador"]["extra"] = "" ;
$maestro["docprint"]["idfilefodt"]["nombrecampo"] = "idfilefodt" ; $maestro["docprint"]["idfilefodt"]["tipo"] = "int(11)" ; $maestro["docprint"]["idfilefodt"]["extra"] = "" ;
$maestro["docprint"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["docprint"]["idempresa"]["tipo"] = "int(11)" ; $maestro["docprint"]["idempresa"]["extra"] = "" ;
$maestro["docprint"]["habilitado"]["nombrecampo"] = "habilitado" ; $maestro["docprint"]["habilitado"]["tipo"] = "int(11)" ; $maestro["docprint"]["habilitado"]["extra"] = "" ;

$maestro["empresas"]["id"]["nombrecampo"] = "id" ; $maestro["empresas"]["id"]["tipo"] = "int(11)" ; $maestro["empresas"]["id"]["extra"] = "auto_increment" ;
$maestro["empresas"]["activo"]["nombrecampo"] = "activo" ; $maestro["empresas"]["activo"]["tipo"] = "int(11)" ; $maestro["empresas"]["activo"]["extra"] = "" ;
$maestro["empresas"]["razonsocial"]["nombrecampo"] = "razonsocial" ; $maestro["empresas"]["razonsocial"]["tipo"] = "varchar(50)" ; $maestro["empresas"]["razonsocial"]["extra"] = "" ;
$maestro["empresas"]["nomcomercial"]["nombrecampo"] = "nomcomercial" ; $maestro["empresas"]["nomcomercial"]["tipo"] = "varchar(50)" ; $maestro["empresas"]["nomcomercial"]["extra"] = "" ;
$maestro["empresas"]["nif"]["nombrecampo"] = "nif" ; $maestro["empresas"]["nif"]["tipo"] = "varchar(15)" ; $maestro["empresas"]["nif"]["extra"] = "" ;
$maestro["empresas"]["idpais"]["nombrecampo"] = "idpais" ; $maestro["empresas"]["idpais"]["tipo"] = "int(11)" ; $maestro["empresas"]["idpais"]["extra"] = "" ;
$maestro["empresas"]["idprov"]["nombrecampo"] = "idprov" ; $maestro["empresas"]["idprov"]["tipo"] = "int(11)" ; $maestro["empresas"]["idprov"]["extra"] = "" ;
$maestro["empresas"]["cp"]["nombrecampo"] = "cp" ; $maestro["empresas"]["cp"]["tipo"] = "varchar(10)" ; $maestro["empresas"]["cp"]["extra"] = "" ;
$maestro["empresas"]["pobla"]["nombrecampo"] = "pobla" ; $maestro["empresas"]["pobla"]["tipo"] = "varchar(50)" ; $maestro["empresas"]["pobla"]["extra"] = "" ;
$maestro["empresas"]["dir"]["nombrecampo"] = "dir" ; $maestro["empresas"]["dir"]["tipo"] = "varchar(50)" ; $maestro["empresas"]["dir"]["extra"] = "" ;
$maestro["empresas"]["tel"]["nombrecampo"] = "tel" ; $maestro["empresas"]["tel"]["tipo"] = "varchar(20)" ; $maestro["empresas"]["tel"]["extra"] = "" ;
$maestro["empresas"]["email"]["nombrecampo"] = "email" ; $maestro["empresas"]["email"]["tipo"] = "varchar(50)" ; $maestro["empresas"]["email"]["extra"] = "" ;
$maestro["empresas"]["responsable"]["nombrecampo"] = "responsable" ; $maestro["empresas"]["responsable"]["tipo"] = "varchar(50)" ; $maestro["empresas"]["responsable"]["extra"] = "" ;
$maestro["empresas"]["nifresponsable"]["nombrecampo"] = "nifresponsable" ; $maestro["empresas"]["nifresponsable"]["tipo"] = "varchar(15)" ; $maestro["empresas"]["nifresponsable"]["extra"] = "" ;
$maestro["empresas"]["contabilidad"]["nombrecampo"] = "contabilidad" ; $maestro["empresas"]["contabilidad"]["tipo"] = "int(11)" ; $maestro["empresas"]["contabilidad"]["extra"] = "" ;
$maestro["empresas"]["regmer"]["nombrecampo"] = "regmer" ; $maestro["empresas"]["regmer"]["tipo"] = "varchar(250)" ; $maestro["empresas"]["regmer"]["extra"] = "" ;

$maestro["fabricantes"]["id"]["nombrecampo"] = "id" ; $maestro["fabricantes"]["id"]["tipo"] = "int(11)" ; $maestro["fabricantes"]["id"]["extra"] = "auto_increment" ;
$maestro["fabricantes"]["fabricante"]["nombrecampo"] = "fabricante" ; $maestro["fabricantes"]["fabricante"]["tipo"] = "varchar(50)" ; $maestro["fabricantes"]["fabricante"]["extra"] = "" ;

$maestro["fc"]["id"]["nombrecampo"] = "id" ; $maestro["fc"]["id"]["tipo"] = "int(11)" ; $maestro["fc"]["id"]["extra"] = "auto_increment" ;
$maestro["fc"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["fc"]["idserie"]["tipo"] = "int(11)" ; $maestro["fc"]["idserie"]["extra"] = "" ;
$maestro["fc"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["fc"]["codigoint"]["tipo"] = "int(11)" ; $maestro["fc"]["codigoint"]["extra"] = "" ;
$maestro["fc"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["fc"]["codigo"]["tipo"] = "varchar(10)" ; $maestro["fc"]["codigo"]["extra"] = "" ;
$maestro["fc"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["fc"]["idtercero"]["tipo"] = "int(11)" ; $maestro["fc"]["idtercero"]["extra"] = "" ;
$maestro["fc"]["estado"]["nombrecampo"] = "estado" ; $maestro["fc"]["estado"]["tipo"] = "int(11)" ; $maestro["fc"]["estado"]["extra"] = "" ;
$maestro["fc"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["fc"]["fecha"]["tipo"] = "date" ; $maestro["fc"]["fecha"]["extra"] = "" ;
$maestro["fc"]["vencimiento"]["nombrecampo"] = "vencimiento" ; $maestro["fc"]["vencimiento"]["tipo"] = "date" ; $maestro["fc"]["vencimiento"]["extra"] = "" ;
$maestro["fc"]["idusuario"]["nombrecampo"] = "idusuario" ; $maestro["fc"]["idusuario"]["tipo"] = "int(11)" ; $maestro["fc"]["idusuario"]["extra"] = "" ;
$maestro["fc"]["pagado"]["nombrecampo"] = "pagado" ; $maestro["fc"]["pagado"]["tipo"] = "float" ; $maestro["fc"]["pagado"]["extra"] = "" ;
$maestro["fc"]["editfv"]["nombrecampo"] = "editfv" ; $maestro["fc"]["editfv"]["tipo"] = "int(11)" ; $maestro["fc"]["editfv"]["extra"] = "" ;
$maestro["fc"]["factura"]["nombrecampo"] = "factura" ; $maestro["fc"]["factura"]["tipo"] = "varchar(20)" ; $maestro["fc"]["factura"]["extra"] = "" ;
$maestro["fc"]["pc_cp"]["nombrecampo"] = "pc_cp" ; $maestro["fc"]["pc_cp"]["tipo"] = "int(11)" ; $maestro["fc"]["pc_cp"]["extra"] = "" ;
$maestro["fc"]["pc_dp"]["nombrecampo"] = "pc_dp" ; $maestro["fc"]["pc_dp"]["tipo"] = "int(11)" ; $maestro["fc"]["pc_dp"]["extra"] = "" ;

$maestro["fc_lineas"]["id"]["nombrecampo"] = "id" ; $maestro["fc_lineas"]["id"]["tipo"] = "int(11)" ; $maestro["fc_lineas"]["id"]["extra"] = "auto_increment" ;
$maestro["fc_lineas"]["idfc"]["nombrecampo"] = "idfc" ; $maestro["fc_lineas"]["idfc"]["tipo"] = "int(11)" ; $maestro["fc_lineas"]["idfc"]["extra"] = "" ;
$maestro["fc_lineas"]["cod"]["nombrecampo"] = "cod" ; $maestro["fc_lineas"]["cod"]["tipo"] = "varchar(20)" ; $maestro["fc_lineas"]["cod"]["extra"] = "" ;
$maestro["fc_lineas"]["concepto"]["nombrecampo"] = "concepto" ; $maestro["fc_lineas"]["concepto"]["tipo"] = "varchar(250)" ; $maestro["fc_lineas"]["concepto"]["extra"] = "" ;
$maestro["fc_lineas"]["unid"]["nombrecampo"] = "unid" ; $maestro["fc_lineas"]["unid"]["tipo"] = "int(11)" ; $maestro["fc_lineas"]["unid"]["extra"] = "" ;
$maestro["fc_lineas"]["precio"]["nombrecampo"] = "precio" ; $maestro["fc_lineas"]["precio"]["tipo"] = "float" ; $maestro["fc_lineas"]["precio"]["extra"] = "" ;
$maestro["fc_lineas"]["dto"]["nombrecampo"] = "dto" ; $maestro["fc_lineas"]["dto"]["tipo"] = "int(11)" ; $maestro["fc_lineas"]["dto"]["extra"] = "" ;
$maestro["fc_lineas"]["importe"]["nombrecampo"] = "importe" ; $maestro["fc_lineas"]["importe"]["tipo"] = "float" ; $maestro["fc_lineas"]["importe"]["extra"] = "" ;
$maestro["fc_lineas"]["orden"]["nombrecampo"] = "orden" ; $maestro["fc_lineas"]["orden"]["tipo"] = "int(11)" ; $maestro["fc_lineas"]["orden"]["extra"] = "" ;
$maestro["fc_lineas"]["exclufactu"]["nombrecampo"] = "exclufactu" ; $maestro["fc_lineas"]["exclufactu"]["tipo"] = "int(11)" ; $maestro["fc_lineas"]["exclufactu"]["extra"] = "" ;

$maestro["fc_lineas_tax"]["id"]["nombrecampo"] = "id" ; $maestro["fc_lineas_tax"]["id"]["tipo"] = "int(11)" ; $maestro["fc_lineas_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["fc_lineas_tax"]["idfc"]["nombrecampo"] = "idfc" ; $maestro["fc_lineas_tax"]["idfc"]["tipo"] = "int(11)" ; $maestro["fc_lineas_tax"]["idfc"]["extra"] = "" ;
$maestro["fc_lineas_tax"]["idfclinea"]["nombrecampo"] = "idfclinea" ; $maestro["fc_lineas_tax"]["idfclinea"]["tipo"] = "int(11)" ; $maestro["fc_lineas_tax"]["idfclinea"]["extra"] = "" ;
$maestro["fc_lineas_tax"]["idtax"]["nombrecampo"] = "idtax" ; $maestro["fc_lineas_tax"]["idtax"]["tipo"] = "int(11)" ; $maestro["fc_lineas_tax"]["idtax"]["extra"] = "" ;
$maestro["fc_lineas_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["fc_lineas_tax"]["valor"]["tipo"] = "float" ; $maestro["fc_lineas_tax"]["valor"]["extra"] = "" ;
$maestro["fc_lineas_tax"]["importe"]["nombrecampo"] = "importe" ; $maestro["fc_lineas_tax"]["importe"]["tipo"] = "float" ; $maestro["fc_lineas_tax"]["importe"]["extra"] = "" ;

$maestro["fc_pagos"]["id"]["nombrecampo"] = "id" ; $maestro["fc_pagos"]["id"]["tipo"] = "int(11)" ; $maestro["fc_pagos"]["id"]["extra"] = "auto_increment" ;
$maestro["fc_pagos"]["idfc"]["nombrecampo"] = "idfc" ; $maestro["fc_pagos"]["idfc"]["tipo"] = "int(11)" ; $maestro["fc_pagos"]["idfc"]["extra"] = "" ;
$maestro["fc_pagos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["fc_pagos"]["fecha"]["tipo"] = "date" ; $maestro["fc_pagos"]["fecha"]["extra"] = "" ;
$maestro["fc_pagos"]["importe"]["nombrecampo"] = "importe" ; $maestro["fc_pagos"]["importe"]["tipo"] = "float" ; $maestro["fc_pagos"]["importe"]["extra"] = "" ;
$maestro["fc_pagos"]["idfpago"]["nombrecampo"] = "idfpago" ; $maestro["fc_pagos"]["idfpago"]["tipo"] = "int(11)" ; $maestro["fc_pagos"]["idfpago"]["extra"] = "" ;
$maestro["fc_pagos"]["idcpago"]["nombrecampo"] = "idcpago" ; $maestro["fc_pagos"]["idcpago"]["tipo"] = "int(11)" ; $maestro["fc_pagos"]["idcpago"]["extra"] = "" ;

$maestro["fc_sn"]["id"]["nombrecampo"] = "id" ; $maestro["fc_sn"]["id"]["tipo"] = "int(11)" ; $maestro["fc_sn"]["id"]["extra"] = "auto_increment" ;
$maestro["fc_sn"]["idfc"]["nombrecampo"] = "idfc" ; $maestro["fc_sn"]["idfc"]["tipo"] = "int(11)" ; $maestro["fc_sn"]["idfc"]["extra"] = "" ;
$maestro["fc_sn"]["idlinea"]["nombrecampo"] = "idlinea" ; $maestro["fc_sn"]["idlinea"]["tipo"] = "int(11)" ; $maestro["fc_sn"]["idlinea"]["extra"] = "" ;
$maestro["fc_sn"]["sn"]["nombrecampo"] = "sn" ; $maestro["fc_sn"]["sn"]["tipo"] = "varchar(50)" ; $maestro["fc_sn"]["sn"]["extra"] = "" ;
$maestro["fc_sn"]["pn"]["nombrecampo"] = "pn" ; $maestro["fc_sn"]["pn"]["tipo"] = "varchar(50)" ; $maestro["fc_sn"]["pn"]["extra"] = "" ;
$maestro["fc_sn"]["otro"]["nombrecampo"] = "otro" ; $maestro["fc_sn"]["otro"]["tipo"] = "varchar(50)" ; $maestro["fc_sn"]["otro"]["extra"] = "" ;

$maestro["fc_tax"]["id"]["nombrecampo"] = "id" ; $maestro["fc_tax"]["id"]["tipo"] = "int(11)" ; $maestro["fc_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["fc_tax"]["idfc"]["nombrecampo"] = "idfc" ; $maestro["fc_tax"]["idfc"]["tipo"] = "int(11)" ; $maestro["fc_tax"]["idfc"]["extra"] = "" ;
$maestro["fc_tax"]["idimpuesto"]["nombrecampo"] = "idimpuesto" ; $maestro["fc_tax"]["idimpuesto"]["tipo"] = "int(11)" ; $maestro["fc_tax"]["idimpuesto"]["extra"] = "" ;
$maestro["fc_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["fc_tax"]["valor"]["tipo"] = "int(11)" ; $maestro["fc_tax"]["valor"]["extra"] = "" ;

$maestro["ficheros"]["id"]["nombrecampo"] = "id" ; $maestro["ficheros"]["id"]["tipo"] = "int(11)" ; $maestro["ficheros"]["id"]["extra"] = "auto_increment" ;
$maestro["ficheros"]["fichero"]["nombrecampo"] = "fichero" ; $maestro["ficheros"]["fichero"]["tipo"] = "varchar(255)" ; $maestro["ficheros"]["fichero"]["extra"] = "" ;
$maestro["ficheros"]["nombre"]["nombrecampo"] = "nombre" ; $maestro["ficheros"]["nombre"]["tipo"] = "varchar(50)" ; $maestro["ficheros"]["nombre"]["extra"] = "" ;
$maestro["ficheros"]["extension"]["nombrecampo"] = "extension" ; $maestro["ficheros"]["extension"]["tipo"] = "varchar(4)" ; $maestro["ficheros"]["extension"]["extra"] = "" ;
$maestro["ficheros"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["ficheros"]["descripcion"]["tipo"] = "varchar(50)" ; $maestro["ficheros"]["descripcion"]["extra"] = "" ;
$maestro["ficheros"]["tipomime"]["nombrecampo"] = "tipomime" ; $maestro["ficheros"]["tipomime"]["tipo"] = "varchar(50)" ; $maestro["ficheros"]["tipomime"]["extra"] = "" ;
$maestro["ficheros"]["sincroniza"]["nombrecampo"] = "sincroniza" ; $maestro["ficheros"]["sincroniza"]["tipo"] = "int(11)" ; $maestro["ficheros"]["sincroniza"]["extra"] = "" ;
$maestro["ficheros"]["dirfichero"]["nombrecampo"] = "dirfichero" ; $maestro["ficheros"]["dirfichero"]["tipo"] = "varchar(20)" ; $maestro["ficheros"]["dirfichero"]["extra"] = "" ;
$maestro["ficheros"]["fsubido"]["nombrecampo"] = "fsubido" ; $maestro["ficheros"]["fsubido"]["tipo"] = "datetime" ; $maestro["ficheros"]["fsubido"]["extra"] = "" ;
$maestro["ficheros"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["ficheros"]["iduser"]["tipo"] = "int(11)" ; $maestro["ficheros"]["iduser"]["extra"] = "" ;

$maestro["ficheros_config"]["opcion"]["nombrecampo"] = "opcion" ; $maestro["ficheros_config"]["opcion"]["tipo"] = "varchar(20)" ; $maestro["ficheros_config"]["opcion"]["extra"] = "" ;
$maestro["ficheros_config"]["valor"]["nombrecampo"] = "valor" ; $maestro["ficheros_config"]["valor"]["tipo"] = "varchar(20)" ; $maestro["ficheros_config"]["valor"]["extra"] = "" ;

$maestro["ficheros_cat"]["id"]["nombrecampo"] = "id" ; $maestro["ficheros_cat"]["id"]["tipo"] = "int(11)" ; $maestro["ficheros_cat"]["id"]["extra"] = "auto_increment" ;
$maestro["ficheros_cat"]["categoria"]["nombrecampo"] = "categoria" ; $maestro["ficheros_cat"]["categoria"]["tipo"] = "varchar(50)" ; $maestro["ficheros_cat"]["categoria"]["extra"] = "" ;

$maestro["ficheros_ext"]["id"]["nombrecampo"] = "id" ; $maestro["ficheros_ext"]["id"]["tipo"] = "int(11)" ; $maestro["ficheros_ext"]["id"]["extra"] = "auto_increment" ;
$maestro["ficheros_ext"]["extension"]["nombrecampo"] = "extension" ; $maestro["ficheros_ext"]["extension"]["tipo"] = "varchar(4)" ; $maestro["ficheros_ext"]["extension"]["extra"] = "" ;
$maestro["ficheros_ext"]["display"]["nombrecampo"] = "display" ; $maestro["ficheros_ext"]["display"]["tipo"] = "varchar(50)" ; $maestro["ficheros_ext"]["display"]["extra"] = "" ;
$maestro["ficheros_ext"]["icono"]["nombrecampo"] = "icono" ; $maestro["ficheros_ext"]["icono"]["tipo"] = "varchar(20)" ; $maestro["ficheros_ext"]["icono"]["extra"] = "" ;

$maestro["ficheros_keyword"]["idfichero"]["nombrecampo"] = "idfichero" ; $maestro["ficheros_keyword"]["idfichero"]["tipo"] = "int(11)" ; $maestro["ficheros_keyword"]["idfichero"]["extra"] = "" ;
$maestro["ficheros_keyword"]["palabrasclave"]["nombrecampo"] = "palabrasclave" ; $maestro["ficheros_keyword"]["palabrasclave"]["tipo"] = "blob" ; $maestro["ficheros_keyword"]["palabrasclave"]["extra"] = "" ;

$maestro["ficheros_loc"]["id"]["nombrecampo"] = "id" ; $maestro["ficheros_loc"]["id"]["tipo"] = "int(11)" ; $maestro["ficheros_loc"]["id"]["extra"] = "auto_increment" ;
$maestro["ficheros_loc"]["idfichero"]["nombrecampo"] = "idfichero" ; $maestro["ficheros_loc"]["idfichero"]["tipo"] = "int(11)" ; $maestro["ficheros_loc"]["idfichero"]["extra"] = "" ;
$maestro["ficheros_loc"]["module"]["nombrecampo"] = "module" ; $maestro["ficheros_loc"]["module"]["tipo"] = "varchar(20)" ; $maestro["ficheros_loc"]["module"]["extra"] = "" ;
$maestro["ficheros_loc"]["idlinea0"]["nombrecampo"] = "idlinea0" ; $maestro["ficheros_loc"]["idlinea0"]["tipo"] = "int(11)" ; $maestro["ficheros_loc"]["idlinea0"]["extra"] = "" ;
$maestro["ficheros_loc"]["idlinea1"]["nombrecampo"] = "idlinea1" ; $maestro["ficheros_loc"]["idlinea1"]["tipo"] = "int(11)" ; $maestro["ficheros_loc"]["idlinea1"]["extra"] = "" ;
$maestro["ficheros_loc"]["idlinea2"]["nombrecampo"] = "idlinea2" ; $maestro["ficheros_loc"]["idlinea2"]["tipo"] = "int(11)" ; $maestro["ficheros_loc"]["idlinea2"]["extra"] = "" ;
$maestro["ficheros_loc"]["display"]["nombrecampo"] = "display" ; $maestro["ficheros_loc"]["display"]["tipo"] = "varchar(50)" ; $maestro["ficheros_loc"]["display"]["extra"] = "" ;
$maestro["ficheros_loc"]["publico"]["nombrecampo"] = "publico" ; $maestro["ficheros_loc"]["publico"]["tipo"] = "int(11)" ; $maestro["ficheros_loc"]["publico"]["extra"] = "" ;
$maestro["ficheros_loc"]["idcat"]["nombrecampo"] = "idcat" ; $maestro["ficheros_loc"]["idcat"]["tipo"] = "int(11)" ; $maestro["ficheros_loc"]["idcat"]["extra"] = "" ;

$maestro["ficheros_perm"]["idfichero"]["nombrecampo"] = "idfichero" ; $maestro["ficheros_perm"]["idfichero"]["tipo"] = "int(11)" ; $maestro["ficheros_perm"]["idfichero"]["extra"] = "" ;
$maestro["ficheros_perm"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["ficheros_perm"]["iduser"]["tipo"] = "int(11)" ; $maestro["ficheros_perm"]["iduser"]["extra"] = "" ;
$maestro["ficheros_perm"]["idgroup"]["nombrecampo"] = "idgroup" ; $maestro["ficheros_perm"]["idgroup"]["tipo"] = "int(11)" ; $maestro["ficheros_perm"]["idgroup"]["extra"] = "" ;

$maestro["flota"]["id"]["nombrecampo"] = "id" ; $maestro["flota"]["id"]["tipo"] = "int(11)" ; $maestro["flota"]["id"]["extra"] = "auto_increment" ;
$maestro["flota"]["vehiculo"]["nombrecampo"] = "vehiculo" ; $maestro["flota"]["vehiculo"]["tipo"] = "varchar(50)" ; $maestro["flota"]["vehiculo"]["extra"] = "" ;
$maestro["flota"]["matricula"]["nombrecampo"] = "matricula" ; $maestro["flota"]["matricula"]["tipo"] = "varchar(10)" ; $maestro["flota"]["matricula"]["extra"] = "" ;
$maestro["flota"]["kms"]["nombrecampo"] = "kms" ; $maestro["flota"]["kms"]["tipo"] = "int(11)" ; $maestro["flota"]["kms"]["extra"] = "" ;

$maestro["formaspago"]["id"]["nombrecampo"] = "id" ; $maestro["formaspago"]["id"]["tipo"] = "int(11)" ; $maestro["formaspago"]["id"]["extra"] = "auto_increment" ;
$maestro["formaspago"]["formapago"]["nombrecampo"] = "formapago" ; $maestro["formaspago"]["formapago"]["tipo"] = "varchar(20)" ; $maestro["formaspago"]["formapago"]["extra"] = "" ;
$maestro["formaspago"]["idcuentacaja"]["nombrecampo"] = "idcuentacaja" ; $maestro["formaspago"]["idcuentacaja"]["tipo"] = "int(11)" ; $maestro["formaspago"]["idcuentacaja"]["extra"] = "" ;

$maestro["fv"]["id"]["nombrecampo"] = "id" ; $maestro["fv"]["id"]["tipo"] = "int(11)" ; $maestro["fv"]["id"]["extra"] = "auto_increment" ;
$maestro["fv"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["fv"]["idserie"]["tipo"] = "int(11)" ; $maestro["fv"]["idserie"]["extra"] = "" ;
$maestro["fv"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["fv"]["codigoint"]["tipo"] = "int(11)" ; $maestro["fv"]["codigoint"]["extra"] = "" ;
$maestro["fv"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["fv"]["codigo"]["tipo"] = "varchar(10)" ; $maestro["fv"]["codigo"]["extra"] = "" ;
$maestro["fv"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["fv"]["idtercero"]["tipo"] = "int(11)" ; $maestro["fv"]["idtercero"]["extra"] = "" ;
$maestro["fv"]["estado"]["nombrecampo"] = "estado" ; $maestro["fv"]["estado"]["tipo"] = "int(11)" ; $maestro["fv"]["estado"]["extra"] = "" ;
$maestro["fv"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["fv"]["fecha"]["tipo"] = "date" ; $maestro["fv"]["fecha"]["extra"] = "" ;
$maestro["fv"]["vencimiento"]["nombrecampo"] = "vencimiento" ; $maestro["fv"]["vencimiento"]["tipo"] = "date" ; $maestro["fv"]["vencimiento"]["extra"] = "" ;
$maestro["fv"]["idusuario"]["nombrecampo"] = "idusuario" ; $maestro["fv"]["idusuario"]["tipo"] = "int(11)" ; $maestro["fv"]["idusuario"]["extra"] = "" ;
$maestro["fv"]["pagado"]["nombrecampo"] = "pagado" ; $maestro["fv"]["pagado"]["tipo"] = "float" ; $maestro["fv"]["pagado"]["extra"] = "" ;
$maestro["fv"]["editfv"]["nombrecampo"] = "editfv" ; $maestro["fv"]["editfv"]["tipo"] = "int(11)" ; $maestro["fv"]["editfv"]["extra"] = "" ;
$maestro["fv"]["pc_cp"]["nombrecampo"] = "pc_cp" ; $maestro["fv"]["pc_cp"]["tipo"] = "int(11)" ; $maestro["fv"]["pc_cp"]["extra"] = "" ;
$maestro["fv"]["pc_dp"]["nombrecampo"] = "pc_dp" ; $maestro["fv"]["pc_dp"]["tipo"] = "int(11)" ; $maestro["fv"]["pc_dp"]["extra"] = "" ;

$maestro["fv_lineas"]["id"]["nombrecampo"] = "id" ; $maestro["fv_lineas"]["id"]["tipo"] = "int(11)" ; $maestro["fv_lineas"]["id"]["extra"] = "auto_increment" ;
$maestro["fv_lineas"]["idfv"]["nombrecampo"] = "idfv" ; $maestro["fv_lineas"]["idfv"]["tipo"] = "int(11)" ; $maestro["fv_lineas"]["idfv"]["extra"] = "" ;
$maestro["fv_lineas"]["cod"]["nombrecampo"] = "cod" ; $maestro["fv_lineas"]["cod"]["tipo"] = "varchar(20)" ; $maestro["fv_lineas"]["cod"]["extra"] = "" ;
$maestro["fv_lineas"]["concepto"]["nombrecampo"] = "concepto" ; $maestro["fv_lineas"]["concepto"]["tipo"] = "varchar(250)" ; $maestro["fv_lineas"]["concepto"]["extra"] = "" ;
$maestro["fv_lineas"]["unid"]["nombrecampo"] = "unid" ; $maestro["fv_lineas"]["unid"]["tipo"] = "int(11)" ; $maestro["fv_lineas"]["unid"]["extra"] = "" ;
$maestro["fv_lineas"]["precio"]["nombrecampo"] = "precio" ; $maestro["fv_lineas"]["precio"]["tipo"] = "float" ; $maestro["fv_lineas"]["precio"]["extra"] = "" ;
$maestro["fv_lineas"]["dto"]["nombrecampo"] = "dto" ; $maestro["fv_lineas"]["dto"]["tipo"] = "int(11)" ; $maestro["fv_lineas"]["dto"]["extra"] = "" ;
$maestro["fv_lineas"]["importe"]["nombrecampo"] = "importe" ; $maestro["fv_lineas"]["importe"]["tipo"] = "float" ; $maestro["fv_lineas"]["importe"]["extra"] = "" ;
$maestro["fv_lineas"]["orden"]["nombrecampo"] = "orden" ; $maestro["fv_lineas"]["orden"]["tipo"] = "int(11)" ; $maestro["fv_lineas"]["orden"]["extra"] = "" ;
$maestro["fv_lineas"]["exclufactu"]["nombrecampo"] = "exclufactu" ; $maestro["fv_lineas"]["exclufactu"]["tipo"] = "int(11)" ; $maestro["fv_lineas"]["exclufactu"]["extra"] = "" ;

$maestro["fv_lineas_tax"]["id"]["nombrecampo"] = "id" ; $maestro["fv_lineas_tax"]["id"]["tipo"] = "int(11)" ; $maestro["fv_lineas_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["fv_lineas_tax"]["idfv"]["nombrecampo"] = "idfv" ; $maestro["fv_lineas_tax"]["idfv"]["tipo"] = "int(11)" ; $maestro["fv_lineas_tax"]["idfv"]["extra"] = "" ;
$maestro["fv_lineas_tax"]["idfvlinea"]["nombrecampo"] = "idfvlinea" ; $maestro["fv_lineas_tax"]["idfvlinea"]["tipo"] = "int(11)" ; $maestro["fv_lineas_tax"]["idfvlinea"]["extra"] = "" ;
$maestro["fv_lineas_tax"]["idtax"]["nombrecampo"] = "idtax" ; $maestro["fv_lineas_tax"]["idtax"]["tipo"] = "int(11)" ; $maestro["fv_lineas_tax"]["idtax"]["extra"] = "" ;
$maestro["fv_lineas_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["fv_lineas_tax"]["valor"]["tipo"] = "float" ; $maestro["fv_lineas_tax"]["valor"]["extra"] = "" ;
$maestro["fv_lineas_tax"]["importe"]["nombrecampo"] = "importe" ; $maestro["fv_lineas_tax"]["importe"]["tipo"] = "float" ; $maestro["fv_lineas_tax"]["importe"]["extra"] = "" ;

$maestro["fv_pagos"]["id"]["nombrecampo"] = "id" ; $maestro["fv_pagos"]["id"]["tipo"] = "int(11)" ; $maestro["fv_pagos"]["id"]["extra"] = "auto_increment" ;
$maestro["fv_pagos"]["idfv"]["nombrecampo"] = "idfv" ; $maestro["fv_pagos"]["idfv"]["tipo"] = "int(11)" ; $maestro["fv_pagos"]["idfv"]["extra"] = "" ;
$maestro["fv_pagos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["fv_pagos"]["fecha"]["tipo"] = "date" ; $maestro["fv_pagos"]["fecha"]["extra"] = "" ;
$maestro["fv_pagos"]["importe"]["nombrecampo"] = "importe" ; $maestro["fv_pagos"]["importe"]["tipo"] = "float" ; $maestro["fv_pagos"]["importe"]["extra"] = "" ;
$maestro["fv_pagos"]["idfpago"]["nombrecampo"] = "idfpago" ; $maestro["fv_pagos"]["idfpago"]["tipo"] = "int(11)" ; $maestro["fv_pagos"]["idfpago"]["extra"] = "" ;
$maestro["fv_pagos"]["idcpago"]["nombrecampo"] = "idcpago" ; $maestro["fv_pagos"]["idcpago"]["tipo"] = "int(11)" ; $maestro["fv_pagos"]["idcpago"]["extra"] = "" ;

$maestro["fv_sn"]["id"]["nombrecampo"] = "id" ; $maestro["fv_sn"]["id"]["tipo"] = "int(11)" ; $maestro["fv_sn"]["id"]["extra"] = "auto_increment" ;
$maestro["fv_sn"]["idfv"]["nombrecampo"] = "idfv" ; $maestro["fv_sn"]["idfv"]["tipo"] = "int(11)" ; $maestro["fv_sn"]["idfv"]["extra"] = "" ;
$maestro["fv_sn"]["idlinea"]["nombrecampo"] = "idlinea" ; $maestro["fv_sn"]["idlinea"]["tipo"] = "int(11)" ; $maestro["fv_sn"]["idlinea"]["extra"] = "" ;
$maestro["fv_sn"]["sn"]["nombrecampo"] = "sn" ; $maestro["fv_sn"]["sn"]["tipo"] = "varchar(50)" ; $maestro["fv_sn"]["sn"]["extra"] = "" ;
$maestro["fv_sn"]["pn"]["nombrecampo"] = "pn" ; $maestro["fv_sn"]["pn"]["tipo"] = "varchar(50)" ; $maestro["fv_sn"]["pn"]["extra"] = "" ;
$maestro["fv_sn"]["otro"]["nombrecampo"] = "otro" ; $maestro["fv_sn"]["otro"]["tipo"] = "varchar(50)" ; $maestro["fv_sn"]["otro"]["extra"] = "" ;

$maestro["fv_tax"]["id"]["nombrecampo"] = "id" ; $maestro["fv_tax"]["id"]["tipo"] = "int(11)" ; $maestro["fv_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["fv_tax"]["idfv"]["nombrecampo"] = "idfv" ; $maestro["fv_tax"]["idfv"]["tipo"] = "int(11)" ; $maestro["fv_tax"]["idfv"]["extra"] = "" ;
$maestro["fv_tax"]["idimpuesto"]["nombrecampo"] = "idimpuesto" ; $maestro["fv_tax"]["idimpuesto"]["tipo"] = "int(11)" ; $maestro["fv_tax"]["idimpuesto"]["extra"] = "" ;
$maestro["fv_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["fv_tax"]["valor"]["tipo"] = "int(11)" ; $maestro["fv_tax"]["valor"]["extra"] = "" ;

$maestro["fvr"]["id"]["nombrecampo"] = "id" ; $maestro["fvr"]["id"]["tipo"] = "int(11)" ; $maestro["fvr"]["id"]["extra"] = "auto_increment" ;
$maestro["fvr"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["fvr"]["idserie"]["tipo"] = "int(11)" ; $maestro["fvr"]["idserie"]["extra"] = "" ;
$maestro["fvr"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["fvr"]["codigoint"]["tipo"] = "int(11)" ; $maestro["fvr"]["codigoint"]["extra"] = "" ;
$maestro["fvr"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["fvr"]["codigo"]["tipo"] = "varchar(10)" ; $maestro["fvr"]["codigo"]["extra"] = "" ;
$maestro["fvr"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["fvr"]["idtercero"]["tipo"] = "int(11)" ; $maestro["fvr"]["idtercero"]["extra"] = "" ;
$maestro["fvr"]["estado"]["nombrecampo"] = "estado" ; $maestro["fvr"]["estado"]["tipo"] = "int(11)" ; $maestro["fvr"]["estado"]["extra"] = "" ;
$maestro["fvr"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["fvr"]["fecha"]["tipo"] = "date" ; $maestro["fvr"]["fecha"]["extra"] = "" ;
$maestro["fvr"]["vencimiento"]["nombrecampo"] = "vencimiento" ; $maestro["fvr"]["vencimiento"]["tipo"] = "date" ; $maestro["fvr"]["vencimiento"]["extra"] = "" ;
$maestro["fvr"]["idusuario"]["nombrecampo"] = "idusuario" ; $maestro["fvr"]["idusuario"]["tipo"] = "int(11)" ; $maestro["fvr"]["idusuario"]["extra"] = "" ;
$maestro["fvr"]["pagado"]["nombrecampo"] = "pagado" ; $maestro["fvr"]["pagado"]["tipo"] = "float" ; $maestro["fvr"]["pagado"]["extra"] = "" ;
$maestro["fvr"]["editfv"]["nombrecampo"] = "editfv" ; $maestro["fvr"]["editfv"]["tipo"] = "int(11)" ; $maestro["fvr"]["editfv"]["extra"] = "" ;
$maestro["fvr"]["pc_cp"]["nombrecampo"] = "pc_cp" ; $maestro["fvr"]["pc_cp"]["tipo"] = "int(11)" ; $maestro["fvr"]["pc_cp"]["extra"] = "" ;
$maestro["fvr"]["pc_dp"]["nombrecampo"] = "pc_dp" ; $maestro["fvr"]["pc_dp"]["tipo"] = "int(11)" ; $maestro["fvr"]["pc_dp"]["extra"] = "" ;

$maestro["fvr_lineas"]["id"]["nombrecampo"] = "id" ; $maestro["fvr_lineas"]["id"]["tipo"] = "int(11)" ; $maestro["fvr_lineas"]["id"]["extra"] = "auto_increment" ;
$maestro["fvr_lineas"]["idfvr"]["nombrecampo"] = "idfvr" ; $maestro["fvr_lineas"]["idfvr"]["tipo"] = "int(11)" ; $maestro["fvr_lineas"]["idfvr"]["extra"] = "" ;
$maestro["fvr_lineas"]["cod"]["nombrecampo"] = "cod" ; $maestro["fvr_lineas"]["cod"]["tipo"] = "varchar(20)" ; $maestro["fvr_lineas"]["cod"]["extra"] = "" ;
$maestro["fvr_lineas"]["concepto"]["nombrecampo"] = "concepto" ; $maestro["fvr_lineas"]["concepto"]["tipo"] = "varchar(250)" ; $maestro["fvr_lineas"]["concepto"]["extra"] = "" ;
$maestro["fvr_lineas"]["unid"]["nombrecampo"] = "unid" ; $maestro["fvr_lineas"]["unid"]["tipo"] = "int(11)" ; $maestro["fvr_lineas"]["unid"]["extra"] = "" ;
$maestro["fvr_lineas"]["precio"]["nombrecampo"] = "precio" ; $maestro["fvr_lineas"]["precio"]["tipo"] = "float" ; $maestro["fvr_lineas"]["precio"]["extra"] = "" ;
$maestro["fvr_lineas"]["dto"]["nombrecampo"] = "dto" ; $maestro["fvr_lineas"]["dto"]["tipo"] = "int(11)" ; $maestro["fvr_lineas"]["dto"]["extra"] = "" ;
$maestro["fvr_lineas"]["importe"]["nombrecampo"] = "importe" ; $maestro["fvr_lineas"]["importe"]["tipo"] = "float" ; $maestro["fvr_lineas"]["importe"]["extra"] = "" ;
$maestro["fvr_lineas"]["orden"]["nombrecampo"] = "orden" ; $maestro["fvr_lineas"]["orden"]["tipo"] = "int(11)" ; $maestro["fvr_lineas"]["orden"]["extra"] = "" ;
$maestro["fvr_lineas"]["exclufactu"]["nombrecampo"] = "exclufactu" ; $maestro["fvr_lineas"]["exclufactu"]["tipo"] = "int(11)" ; $maestro["fvr_lineas"]["exclufactu"]["extra"] = "" ;

$maestro["fvr_lineas_tax"]["id"]["nombrecampo"] = "d" ; $maestro["fvr_lineas_tax"]["id"]["tipo"] = "int(11)" ; $maestro["fvr_lineas_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["fvr_lineas_tax"]["idfvr"]["nombrecampo"] = "idfvr" ; $maestro["fvr_lineas_tax"]["idfvr"]["tipo"] = "int(11)" ; $maestro["fvr_lineas_tax"]["idfvr"]["extra"] = "" ;
$maestro["fvr_lineas_tax"]["idfvrlinea"]["nombrecampo"] = "idfvrlinea" ; $maestro["fvr_lineas_tax"]["idfvrlinea"]["tipo"] = "int(11)" ; $maestro["fvr_lineas_tax"]["idfvrlinea"]["extra"] = "" ;
$maestro["fvr_lineas_tax"]["idtax"]["nombrecampo"] = "idtax" ; $maestro["fvr_lineas_tax"]["idtax"]["tipo"] = "int(11)" ; $maestro["fvr_lineas_tax"]["idtax"]["extra"] = "" ;
$maestro["fvr_lineas_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["fvr_lineas_tax"]["valor"]["tipo"] = "float" ; $maestro["fvr_lineas_tax"]["valor"]["extra"] = "" ;
$maestro["fvr_lineas_tax"]["importe"]["nombrecampo"] = "importe" ; $maestro["fvr_lineas_tax"]["importe"]["tipo"] = "float" ; $maestro["fvr_lineas_tax"]["importe"]["extra"] = "" ;

$maestro["fvr_pagos"]["id"]["nombrecampo"] = "id" ; $maestro["fvr_pagos"]["id"]["tipo"] = "int(11)" ; $maestro["fvr_pagos"]["id"]["extra"] = "auto_increment" ;
$maestro["fvr_pagos"]["idfvr"]["nombrecampo"] = "idfvr" ; $maestro["fvr_pagos"]["idfvr"]["tipo"] = "int(11)" ; $maestro["fvr_pagos"]["idfvr"]["extra"] = "" ;
$maestro["fvr_pagos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["fvr_pagos"]["fecha"]["tipo"] = "date" ; $maestro["fvr_pagos"]["fecha"]["extra"] = "" ;
$maestro["fvr_pagos"]["importe"]["nombrecampo"] = "importe" ; $maestro["fvr_pagos"]["importe"]["tipo"] = "float" ; $maestro["fvr_pagos"]["importe"]["extra"] = "" ;
$maestro["fvr_pagos"]["idfpago"]["nombrecampo"] = "idfpago" ; $maestro["fvr_pagos"]["idfpago"]["tipo"] = "int(11)" ; $maestro["fvr_pagos"]["idfpago"]["extra"] = "" ;
$maestro["fvr_pagos"]["idcpago"]["nombrecampo"] = "idcpago" ; $maestro["fvr_pagos"]["idcpago"]["tipo"] = "int(11)" ; $maestro["fvr_pagos"]["idcpago"]["extra"] = "" ;

$maestro["fvr_sn"]["id"]["nombrecampo"] = "id" ; $maestro["fvr_sn"]["id"]["tipo"] = "int(11)" ; $maestro["fvr_sn"]["id"]["extra"] = "auto_increment" ;
$maestro["fvr_sn"]["idfvr"]["nombrecampo"] = "idfvr" ; $maestro["fvr_sn"]["idfvr"]["tipo"] = "int(11)" ; $maestro["fvr_sn"]["idfvr"]["extra"] = "" ;
$maestro["fvr_sn"]["idlinea"]["nombrecampo"] = "idlinea" ; $maestro["fvr_sn"]["idlinea"]["tipo"] = "int(11)" ; $maestro["fvr_sn"]["idlinea"]["extra"] = "" ;
$maestro["fvr_sn"]["sn"]["nombrecampo"] = "sn" ; $maestro["fvr_sn"]["sn"]["tipo"] = "varchar(50)" ; $maestro["fvr_sn"]["sn"]["extra"] = "" ;
$maestro["fvr_sn"]["pn"]["nombrecampo"] = "pn" ; $maestro["fvr_sn"]["pn"]["tipo"] = "varchar(50)" ; $maestro["fvr_sn"]["pn"]["extra"] = "" ;
$maestro["fvr_sn"]["otro"]["nombrecampo"] = "otro" ; $maestro["fvr_sn"]["otro"]["tipo"] = "varchar(50)" ; $maestro["fvr_sn"]["otro"]["extra"] = "" ;

$maestro["fvr_tax"]["id"]["nombrecampo"] = "id" ; $maestro["fvr_tax"]["id"]["tipo"] = "int(11)" ; $maestro["fvr_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["fvr_tax"]["idfvr"]["nombrecampo"] = "idfvr" ; $maestro["fvr_tax"]["idfvr"]["tipo"] = "int(11)" ; $maestro["fvr_tax"]["idfvr"]["extra"] = "" ;
$maestro["fvr_tax"]["idimpuesto"]["nombrecampo"] = "idimpuesto" ; $maestro["fvr_tax"]["idimpuesto"]["tipo"] = "int(11)" ; $maestro["fvr_tax"]["idimpuesto"]["extra"] = "" ;
$maestro["fvr_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["fvr_tax"]["valor"]["tipo"] = "int(11)" ; $maestro["fvr_tax"]["valor"]["extra"] = "" ;

$maestro["groups"]["id"]["nombrecampo"] = "id" ; $maestro["groups"]["id"]["tipo"] = "int(11)" ; $maestro["groups"]["id"]["extra"] = "auto_increment" ;
$maestro["groups"]["grupo"]["nombrecampo"] = "grupo" ; $maestro["groups"]["grupo"]["tipo"] = "varchar(50)" ; $maestro["groups"]["grupo"]["extra"] = "" ;

$maestro["groupsasignar"]["id"]["nombrecampo"] = "id" ; $maestro["groupsasignar"]["id"]["tipo"] = "int(11)" ; $maestro["groupsasignar"]["id"]["extra"] = "auto_increment" ;
$maestro["groupsasignar"]["idgrupo"]["nombrecampo"] = "idgrupo" ; $maestro["groupsasignar"]["idgrupo"]["tipo"] = "int(11)" ; $maestro["groupsasignar"]["idgrupo"]["extra"] = "" ;
$maestro["groupsasignar"]["nombre"]["nombrecampo"] = "nombre" ; $maestro["groupsasignar"]["nombre"]["tipo"] = "varchar(20)" ; $maestro["groupsasignar"]["nombre"]["extra"] = "" ;
$maestro["groupsasignar"]["display"]["nombrecampo"] = "display" ; $maestro["groupsasignar"]["display"]["tipo"] = "varchar(50)" ; $maestro["groupsasignar"]["display"]["extra"] = "" ;

$maestro["dic_historico_cfg"]["id"]["nombrecampo"] = "id" ; $maestro["dic_historico_cfg"]["id"]["tipo"] = "int(11)" ; $maestro["dic_historico_cfg"]["id"]["extra"] = "auto_increment" ;
$maestro["dic_historico_cfg"]["tabla"]["nombrecampo"] = "tabla" ; $maestro["dic_historico_cfg"]["tabla"]["tipo"] = "varchar(50)" ; $maestro["dic_historico_cfg"]["tabla"]["extra"] = "" ;
$maestro["dic_historico_cfg"]["campoid"]["nombrecampo"] = "campoid" ; $maestro["dic_historico_cfg"]["campoid"]["tipo"] = "varchar(50)" ; $maestro["dic_historico_cfg"]["campoid"]["extra"] = "" ;
$maestro["dic_historico_cfg"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["dic_historico_cfg"]["fecha"]["tipo"] = "varchar(50)" ; $maestro["dic_historico_cfg"]["fecha"]["extra"] = "" ;
$maestro["dic_historico_cfg"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["dic_historico_cfg"]["codigo"]["tipo"] = "varchar(50)" ; $maestro["dic_historico_cfg"]["codigo"]["extra"] = "" ;
$maestro["dic_historico_cfg"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["dic_historico_cfg"]["descripcion"]["tipo"] = "varchar(50)" ; $maestro["dic_historico_cfg"]["descripcion"]["extra"] = "" ;
$maestro["dic_historico_cfg"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["dic_historico_cfg"]["tipo"]["tipo"] = "varchar(50)" ; $maestro["dic_historico_cfg"]["tipo"]["extra"] = "" ;
$maestro["dic_historico_cfg"]["url"]["nombrecampo"] = "url" ; $maestro["dic_historico_cfg"]["url"]["tipo"] = "varchar(100)" ; $maestro["dic_historico_cfg"]["url"]["extra"] = "" ;

$maestro["hr_nom"]["id"]["nombrecampo"] = "id" ; $maestro["hr_nom"]["id"]["tipo"] = "int(11)" ; $maestro["hr_nom"]["id"]["extra"] = "auto_increment" ;
$maestro["hr_nom"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["hr_nom"]["tipo"]["tipo"] = "int(11)" ; $maestro["hr_nom"]["tipo"]["extra"] = "" ;
$maestro["hr_nom"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["hr_nom"]["fecha"]["tipo"] = "date" ; $maestro["hr_nom"]["fecha"]["extra"] = "" ;
$maestro["hr_nom"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["hr_nom"]["idempresa"]["tipo"] = "int(11)" ; $maestro["hr_nom"]["idempresa"]["extra"] = "" ;
$maestro["hr_nom"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["hr_nom"]["idtercero"]["tipo"] = "int(11)" ; $maestro["hr_nom"]["idtercero"]["extra"] = "" ;
$maestro["hr_nom"]["idcontacto"]["nombrecampo"] = "idcontacto" ; $maestro["hr_nom"]["idcontacto"]["tipo"] = "int(11)" ; $maestro["hr_nom"]["idcontacto"]["extra"] = "" ;
$maestro["hr_nom"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["hr_nom"]["descripcion"]["tipo"] = "varchar(50)" ; $maestro["hr_nom"]["descripcion"]["extra"] = "" ;
$maestro["hr_nom"]["idasignado"]["nombrecampo"] = "idasignado" ; $maestro["hr_nom"]["idasignado"]["tipo"] = "int(11)" ; $maestro["hr_nom"]["idasignado"]["extra"] = "" ;

$maestro["impresoras"]["id"]["nombrecampo"] = "id" ; $maestro["impresoras"]["id"]["tipo"] = "int(11)" ; $maestro["impresoras"]["id"]["extra"] = "auto_increment" ;
$maestro["impresoras"]["nombre"]["nombrecampo"] = "nombre" ; $maestro["impresoras"]["nombre"]["tipo"] = "varchar(20)" ; $maestro["impresoras"]["nombre"]["extra"] = "" ;
$maestro["impresoras"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["impresoras"]["tipo"]["tipo"] = "int(11)" ; $maestro["impresoras"]["tipo"]["extra"] = "" ;
$maestro["impresoras"]["notas"]["nombrecampo"] = "notas" ; $maestro["impresoras"]["notas"]["tipo"] = "varchar(50)" ; $maestro["impresoras"]["notas"]["extra"] = "" ;

$maestro["impuestos"]["id"]["nombrecampo"] = "id" ; $maestro["impuestos"]["id"]["tipo"] = "int(11)" ; $maestro["impuestos"]["id"]["extra"] = "auto_increment" ;
$maestro["impuestos"]["impuesto"]["nombrecampo"] = "impuesto" ; $maestro["impuestos"]["impuesto"]["tipo"] = "varchar(20)" ; $maestro["impuestos"]["impuesto"]["extra"] = "" ;
$maestro["impuestos"]["valor"]["nombrecampo"] = "valor" ; $maestro["impuestos"]["valor"]["tipo"] = "decimal(10,2)" ; $maestro["impuestos"]["valor"]["extra"] = "" ;
$maestro["impuestos"]["activo"]["nombrecampo"] = "activo" ; $maestro["impuestos"]["activo"]["tipo"] = "int(11)" ; $maestro["impuestos"]["activo"]["extra"] = "" ;
$maestro["impuestos"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["impuestos"]["codigo"]["tipo"] = "varchar(15)" ; $maestro["impuestos"]["codigo"]["extra"] = "" ;

$maestro["impuestosrules"]["id"]["nombrecampo"] = "id" ; $maestro["impuestosrules"]["id"]["tipo"] = "int(11)" ; $maestro["impuestosrules"]["id"]["extra"] = "auto_increment" ;
$maestro["impuestosrules"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["impuestosrules"]["idserie"]["tipo"] = "int(11)" ; $maestro["impuestosrules"]["idserie"]["extra"] = "" ;
$maestro["impuestosrules"]["idimpuesto"]["nombrecampo"] = "idimpuesto" ; $maestro["impuestosrules"]["idimpuesto"]["tipo"] = "int(11)" ; $maestro["impuestosrules"]["idimpuesto"]["extra"] = "" ;
$maestro["impuestosrules"]["orden"]["nombrecampo"] = "orden" ; $maestro["impuestosrules"]["orden"]["tipo"] = "int(11)" ; $maestro["impuestosrules"]["orden"]["extra"] = "" ;
$maestro["impuestosrules"]["requerido"]["nombrecampo"] = "requerido" ; $maestro["impuestosrules"]["requerido"]["tipo"] = "int(11)" ; $maestro["impuestosrules"]["requerido"]["extra"] = "" ;
$maestro["impuestosrules"]["valor"]["nombrecampo"] = "valor" ; $maestro["impuestosrules"]["valor"]["tipo"] = "int(11)" ; $maestro["impuestosrules"]["valor"]["extra"] = "" ;
$maestro["impuestosrules"]["editable"]["nombrecampo"] = "editable" ; $maestro["impuestosrules"]["editable"]["tipo"] = "int(11)" ; $maestro["impuestosrules"]["editable"]["extra"] = "" ;

$maestro["it_categorias"]["id"]["nombrecampo"] = "id" ; $maestro["it_categorias"]["id"]["tipo"] = "int(11)" ; $maestro["it_categorias"]["id"]["extra"] = "auto_increment" ;
$maestro["it_categorias"]["categoria"]["nombrecampo"] = "categoria" ; $maestro["it_categorias"]["categoria"]["tipo"] = "varchar(255)" ; $maestro["it_categorias"]["categoria"]["extra"] = "" ;

$maestro["it_colas"]["id"]["nombrecampo"] = "id" ; $maestro["it_colas"]["id"]["tipo"] = "int(11)" ; $maestro["it_colas"]["id"]["extra"] = "auto_increment" ;
$maestro["it_colas"]["cola"]["nombrecampo"] = "cola" ; $maestro["it_colas"]["cola"]["tipo"] = "varchar(50)" ; $maestro["it_colas"]["cola"]["extra"] = "" ;

$maestro["it_colas_perm"]["idcola"]["nombrecampo"] = "idcola" ; $maestro["it_colas_perm"]["idcola"]["tipo"] = "int(11)" ; $maestro["it_colas_perm"]["idcola"]["extra"] = "" ;
$maestro["it_colas_perm"]["idusuario"]["nombrecampo"] = "idusuario" ; $maestro["it_colas_perm"]["idusuario"]["tipo"] = "int(11)" ; $maestro["it_colas_perm"]["idusuario"]["extra"] = "" ;

$maestro["it_docum"]["id"]["nombrecampo"] = "id" ; $maestro["it_docum"]["id"]["tipo"] = "int(11)" ; $maestro["it_docum"]["id"]["extra"] = "auto_increment" ;
$maestro["it_docum"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["it_docum"]["idtercero"]["tipo"] = "int(11)" ; $maestro["it_docum"]["idtercero"]["extra"] = "" ;
$maestro["it_docum"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["it_docum"]["iduser"]["tipo"] = "int(11)" ; $maestro["it_docum"]["iduser"]["extra"] = "" ;
$maestro["it_docum"]["titulo"]["nombrecampo"] = "titulo" ; $maestro["it_docum"]["titulo"]["tipo"] = "varchar(50)" ; $maestro["it_docum"]["titulo"]["extra"] = "" ;
$maestro["it_docum"]["fcreado"]["nombrecampo"] = "fcreado" ; $maestro["it_docum"]["fcreado"]["tipo"] = "datetime" ; $maestro["it_docum"]["fcreado"]["extra"] = "" ;
$maestro["it_docum"]["fmodificado"]["nombrecampo"] = "fmodificado" ; $maestro["it_docum"]["fmodificado"]["tipo"] = "datetime" ; $maestro["it_docum"]["fmodificado"]["extra"] = "" ;
$maestro["it_docum"]["iditcat"]["nombrecampo"] = "iditcat" ; $maestro["it_docum"]["iditcat"]["tipo"] = "int(11)" ; $maestro["it_docum"]["iditcat"]["extra"] = "" ;

$maestro["it_docum_lines"]["id"]["nombrecampo"] = "id" ; $maestro["it_docum_lines"]["id"]["tipo"] = "int(11)" ; $maestro["it_docum_lines"]["id"]["extra"] = "auto_increment" ;
$maestro["it_docum_lines"]["iddocum"]["nombrecampo"] = "iddocum" ; $maestro["it_docum_lines"]["iddocum"]["tipo"] = "int(11)" ; $maestro["it_docum_lines"]["iddocum"]["extra"] = "" ;
$maestro["it_docum_lines"]["documentacion"]["nombrecampo"] = "documentacion" ; $maestro["it_docum_lines"]["documentacion"]["tipo"] = "longblob" ; $maestro["it_docum_lines"]["documentacion"]["extra"] = "" ;
$maestro["it_docum_lines"]["fcreado"]["nombrecampo"] = "fcreado" ; $maestro["it_docum_lines"]["fcreado"]["tipo"] = "datetime" ; $maestro["it_docum_lines"]["fcreado"]["extra"] = "" ;
$maestro["it_docum_lines"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["it_docum_lines"]["iduser"]["tipo"] = "int(11)" ; $maestro["it_docum_lines"]["iduser"]["extra"] = "" ;
$maestro["it_docum_lines"]["fmodificado"]["nombrecampo"] = "fmodificado" ; $maestro["it_docum_lines"]["fmodificado"]["tipo"] = "datetime" ; $maestro["it_docum_lines"]["fmodificado"]["extra"] = "" ;

$maestro["it_infopass"]["id"]["nombrecampo"] = "id" ; $maestro["it_infopass"]["id"]["tipo"] = "int(11)" ; $maestro["it_infopass"]["id"]["extra"] = "auto_increment" ;
$maestro["it_infopass"]["usuario"]["nombrecampo"] = "usuario" ; $maestro["it_infopass"]["usuario"]["tipo"] = "varchar(50)" ; $maestro["it_infopass"]["usuario"]["extra"] = "" ;
$maestro["it_infopass"]["password"]["nombrecampo"] = "password" ; $maestro["it_infopass"]["password"]["tipo"] = "varchar(50)" ; $maestro["it_infopass"]["password"]["extra"] = "" ;
$maestro["it_infopass"]["email"]["nombrecampo"] = "email" ; $maestro["it_infopass"]["email"]["tipo"] = "varchar(50)" ; $maestro["it_infopass"]["email"]["extra"] = "" ;
$maestro["it_infopass"]["donde"]["nombrecampo"] = "donde" ; $maestro["it_infopass"]["donde"]["tipo"] = "varchar(50)" ; $maestro["it_infopass"]["donde"]["extra"] = "" ;
$maestro["it_infopass"]["notas"]["nombrecampo"] = "notas" ; $maestro["it_infopass"]["notas"]["tipo"] = "varchar(50)" ; $maestro["it_infopass"]["notas"]["extra"] = "" ;
$maestro["it_infopass"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["it_infopass"]["idtercero"]["tipo"] = "int(11)" ; $maestro["it_infopass"]["idtercero"]["extra"] = "" ;
$maestro["it_infopass"]["urlweb"]["nombrecampo"] = "urlweb" ; $maestro["it_infopass"]["urlweb"]["tipo"] = "varchar(255)" ; $maestro["it_infopass"]["urlweb"]["extra"] = "" ;

$maestro["it_infopass_perm"]["id"]["nombrecampo"] = "id" ; $maestro["it_infopass_perm"]["id"]["tipo"] = "int(11)" ; $maestro["it_infopass_perm"]["id"]["extra"] = "auto_increment" ;
$maestro["it_infopass_perm"]["idusuario"]["nombrecampo"] = "idusuario" ; $maestro["it_infopass_perm"]["idusuario"]["tipo"] = "int(11)" ; $maestro["it_infopass_perm"]["idusuario"]["extra"] = "" ;
$maestro["it_infopass_perm"]["idgrupo"]["nombrecampo"] = "idgrupo" ; $maestro["it_infopass_perm"]["idgrupo"]["tipo"] = "int(11)" ; $maestro["it_infopass_perm"]["idgrupo"]["extra"] = "" ;
$maestro["it_infopass_perm"]["idinfopass"]["nombrecampo"] = "idinfopass" ; $maestro["it_infopass_perm"]["idinfopass"]["tipo"] = "int(11)" ; $maestro["it_infopass_perm"]["idinfopass"]["extra"] = "" ;

$maestro["it_licensing"]["id"]["nombrecampo"] = "id" ; $maestro["it_licensing"]["id"]["tipo"] = "int(11)" ; $maestro["it_licensing"]["id"]["extra"] = "auto_increment" ;
$maestro["it_licensing"]["idactivo"]["nombrecampo"] = "idactivo" ; $maestro["it_licensing"]["idactivo"]["tipo"] = "int(11)" ; $maestro["it_licensing"]["idactivo"]["extra"] = "" ;
$maestro["it_licensing"]["producto"]["nombrecampo"] = "producto" ; $maestro["it_licensing"]["producto"]["tipo"] = "varchar(50)" ; $maestro["it_licensing"]["producto"]["extra"] = "" ;
$maestro["it_licensing"]["licencia"]["nombrecampo"] = "licencia" ; $maestro["it_licensing"]["licencia"]["tipo"] = "varchar(50)" ; $maestro["it_licensing"]["licencia"]["extra"] = "" ;
$maestro["it_licensing"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["it_licensing"]["idtercero"]["tipo"] = "int(11)" ; $maestro["it_licensing"]["idtercero"]["extra"] = "" ;
$maestro["it_licensing"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["it_licensing"]["fecha"]["tipo"] = "date" ; $maestro["it_licensing"]["fecha"]["extra"] = "" ;
$maestro["it_licensing"]["cantidad"]["nombrecampo"] = "cantidad" ; $maestro["it_licensing"]["cantidad"]["tipo"] = "int(11)" ; $maestro["it_licensing"]["cantidad"]["extra"] = "" ;
$maestro["it_licensing"]["idlic"]["nombrecampo"] = "idlic" ; $maestro["it_licensing"]["idlic"]["tipo"] = "int(11)" ; $maestro["it_licensing"]["idlic"]["extra"] = "" ;
$maestro["it_licensing"]["idinfopass"]["nombrecampo"] = "idinfopass" ; $maestro["it_licensing"]["idinfopass"]["tipo"] = "int(11)" ; $maestro["it_licensing"]["idinfopass"]["extra"] = "" ;

$maestro["it_mant"]["id"]["nombrecampo"] = "id" ; $maestro["it_mant"]["id"]["tipo"] = "int(11)" ; $maestro["it_mant"]["id"]["extra"] = "auto_increment" ;
$maestro["it_mant"]["ref"]["nombrecampo"] = "ref" ; $maestro["it_mant"]["ref"]["tipo"] = "varchar(50)" ; $maestro["it_mant"]["ref"]["extra"] = "" ;
$maestro["it_mant"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["it_mant"]["idtercero"]["tipo"] = "int(11)" ; $maestro["it_mant"]["idtercero"]["extra"] = "" ;
$maestro["it_mant"]["idtipo"]["nombrecampo"] = "idtipo" ; $maestro["it_mant"]["idtipo"]["tipo"] = "int(11)" ; $maestro["it_mant"]["idtipo"]["extra"] = "" ;
$maestro["it_mant"]["finicio"]["nombrecampo"] = "finicio" ; $maestro["it_mant"]["finicio"]["tipo"] = "date" ; $maestro["it_mant"]["finicio"]["extra"] = "" ;
$maestro["it_mant"]["ffin"]["nombrecampo"] = "ffin" ; $maestro["it_mant"]["ffin"]["tipo"] = "date" ; $maestro["it_mant"]["ffin"]["extra"] = "" ;
$maestro["it_mant"]["hcontratado"]["nombrecampo"] = "hcontratado" ; $maestro["it_mant"]["hcontratado"]["tipo"] = "time" ; $maestro["it_mant"]["hcontratado"]["extra"] = "" ;
$maestro["it_mant"]["hrestantes"]["nombrecampo"] = "hrestantes" ; $maestro["it_mant"]["hrestantes"]["tipo"] = "time" ; $maestro["it_mant"]["hrestantes"]["extra"] = "" ;
$maestro["it_mant"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["it_mant"]["descripcion"]["tipo"] = "text" ; $maestro["it_mant"]["descripcion"]["extra"] = "" ;
$maestro["it_mant"]["activo"]["nombrecampo"] = "activo" ; $maestro["it_mant"]["activo"]["tipo"] = "int(11)" ; $maestro["it_mant"]["activo"]["extra"] = "" ;

$maestro["it_seguimiento"]["id"]["nombrecampo"] = "id" ; $maestro["it_seguimiento"]["id"]["tipo"] = "int(11)" ; $maestro["it_seguimiento"]["id"]["extra"] = "auto_increment" ;
$maestro["it_seguimiento"]["idticket"]["nombrecampo"] = "idticket" ; $maestro["it_seguimiento"]["idticket"]["tipo"] = "int(11)" ; $maestro["it_seguimiento"]["idticket"]["extra"] = "" ;
$maestro["it_seguimiento"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["it_seguimiento"]["iduser"]["tipo"] = "int(11)" ; $maestro["it_seguimiento"]["iduser"]["extra"] = "" ;
$maestro["it_seguimiento"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["it_seguimiento"]["fecha"]["tipo"] = "timestamp" ; $maestro["it_seguimiento"]["fecha"]["extra"] = "" ;
$maestro["it_seguimiento"]["seguimiento"]["nombrecampo"] = "seguimiento" ; $maestro["it_seguimiento"]["seguimiento"]["tipo"] = "longtext" ; $maestro["it_seguimiento"]["seguimiento"]["extra"] = "" ;
$maestro["it_seguimiento"]["tiempo"]["nombrecampo"] = "tiempo" ; $maestro["it_seguimiento"]["tiempo"]["tipo"] = "time" ; $maestro["it_seguimiento"]["tiempo"]["extra"] = "" ;
$maestro["it_seguimiento"]["computa"]["nombrecampo"] = "computa" ; $maestro["it_seguimiento"]["computa"]["tipo"] = "int(11)" ; $maestro["it_seguimiento"]["computa"]["extra"] = "" ;

$maestro["it_tickets"]["id"]["nombrecampo"] = "id" ; $maestro["it_tickets"]["id"]["tipo"] = "int(11)" ; $maestro["it_tickets"]["id"]["extra"] = "auto_increment" ;
$maestro["it_tickets"]["idtipo"]["nombrecampo"] = "idtipo" ; $maestro["it_tickets"]["idtipo"]["tipo"] = "int(11)" ; $maestro["it_tickets"]["idtipo"]["extra"] = "" ;
$maestro["it_tickets"]["resumen"]["nombrecampo"] = "resumen" ; $maestro["it_tickets"]["resumen"]["tipo"] = "varchar(50)" ; $maestro["it_tickets"]["resumen"]["extra"] = "" ;
$maestro["it_tickets"]["idasignado"]["nombrecampo"] = "idasignado" ; $maestro["it_tickets"]["idasignado"]["tipo"] = "int(11)" ; $maestro["it_tickets"]["idasignado"]["extra"] = "" ;
$maestro["it_tickets"]["idestado"]["nombrecampo"] = "idestado" ; $maestro["it_tickets"]["idestado"]["tipo"] = "int(11)" ; $maestro["it_tickets"]["idestado"]["extra"] = "" ;
$maestro["it_tickets"]["problema"]["nombrecampo"] = "problema" ; $maestro["it_tickets"]["problema"]["tipo"] = "longtext" ; $maestro["it_tickets"]["problema"]["extra"] = "" ;
$maestro["it_tickets"]["solucion"]["nombrecampo"] = "solucion" ; $maestro["it_tickets"]["solucion"]["tipo"] = "longtext" ; $maestro["it_tickets"]["solucion"]["extra"] = "" ;
$maestro["it_tickets"]["idafectado"]["nombrecampo"] = "idafectado" ; $maestro["it_tickets"]["idafectado"]["tipo"] = "int(11)" ; $maestro["it_tickets"]["idafectado"]["extra"] = "" ;
$maestro["it_tickets"]["idcategoria"]["nombrecampo"] = "idcategoria" ; $maestro["it_tickets"]["idcategoria"]["tipo"] = "int(11)" ; $maestro["it_tickets"]["idcategoria"]["extra"] = "" ;
$maestro["it_tickets"]["idprioridad"]["nombrecampo"] = "idprioridad" ; $maestro["it_tickets"]["idprioridad"]["tipo"] = "int(11)" ; $maestro["it_tickets"]["idprioridad"]["extra"] = "" ;
$maestro["it_tickets"]["fcreacion"]["nombrecampo"] = "fcreacion" ; $maestro["it_tickets"]["fcreacion"]["tipo"] = "datetime" ; $maestro["it_tickets"]["fcreacion"]["extra"] = "" ;
$maestro["it_tickets"]["fmodificacion"]["nombrecampo"] = "fmodificacion" ; $maestro["it_tickets"]["fmodificacion"]["tipo"] = "datetime" ; $maestro["it_tickets"]["fmodificacion"]["extra"] = "" ;
$maestro["it_tickets"]["fcierre"]["nombrecampo"] = "fcierre" ; $maestro["it_tickets"]["fcierre"]["tipo"] = "datetime" ; $maestro["it_tickets"]["fcierre"]["extra"] = "" ;
$maestro["it_tickets"]["idmant"]["nombrecampo"] = "idmant" ; $maestro["it_tickets"]["idmant"]["tipo"] = "int(11)" ; $maestro["it_tickets"]["idmant"]["extra"] = "" ;
$maestro["it_tickets"]["idfv"]["nombrecampo"] = "idfv" ; $maestro["it_tickets"]["idfv"]["tipo"] = "int(11)" ; $maestro["it_tickets"]["idfv"]["extra"] = "" ;
$maestro["it_tickets"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["it_tickets"]["idtercero"]["tipo"] = "int(11)" ; $maestro["it_tickets"]["idtercero"]["extra"] = "" ;
$maestro["it_tickets"]["tremoto"]["nombrecampo"] = "tremoto" ; $maestro["it_tickets"]["tremoto"]["tipo"] = "varchar(50)" ; $maestro["it_tickets"]["tremoto"]["extra"] = "" ;
$maestro["it_tickets"]["idcola"]["nombrecampo"] = "idcola" ; $maestro["it_tickets"]["idcola"]["tipo"] = "int(11)" ; $maestro["it_tickets"]["idcola"]["extra"] = "" ;

$maestro["it_tipomant"]["id"]["nombrecampo"] = "id" ; $maestro["it_tipomant"]["id"]["tipo"] = "int(11)" ; $maestro["it_tipomant"]["id"]["extra"] = "auto_increment" ;
$maestro["it_tipomant"]["tipomant"]["nombrecampo"] = "tipomant" ; $maestro["it_tipomant"]["tipomant"]["tipo"] = "varchar(50)" ; $maestro["it_tipomant"]["tipomant"]["extra"] = "" ;

$maestro["it_tipos"]["id"]["nombrecampo"] = "id" ; $maestro["it_tipos"]["id"]["tipo"] = "int(11)" ; $maestro["it_tipos"]["id"]["extra"] = "auto_increment" ;
$maestro["it_tipos"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["it_tipos"]["tipo"]["tipo"] = "varchar(20)" ; $maestro["it_tipos"]["tipo"]["extra"] = "" ;
$maestro["it_tipos"]["activo"]["nombrecampo"] = "activo" ; $maestro["it_tipos"]["activo"]["tipo"] = "int(11)" ; $maestro["it_tipos"]["activo"]["extra"] = "" ;

$maestro["ita_activos"]["id"]["nombrecampo"] = "id" ; $maestro["ita_activos"]["id"]["tipo"] = "int(11)" ; $maestro["ita_activos"]["id"]["extra"] = "auto_increment" ;
$maestro["ita_activos"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["ita_activos"]["idtercero"]["tipo"] = "int(11)" ; $maestro["ita_activos"]["idtercero"]["extra"] = "" ;
$maestro["ita_activos"]["idcontacto"]["nombrecampo"] = "idcontacto" ; $maestro["ita_activos"]["idcontacto"]["tipo"] = "int(11)" ; $maestro["ita_activos"]["idcontacto"]["extra"] = "" ;
$maestro["ita_activos"]["idtipo"]["nombrecampo"] = "idtipo" ; $maestro["ita_activos"]["idtipo"]["tipo"] = "int(11)" ; $maestro["ita_activos"]["idtipo"]["extra"] = "" ;
$maestro["ita_activos"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["ita_activos"]["codigo"]["tipo"] = "varchar(50)" ; $maestro["ita_activos"]["codigo"]["extra"] = "" ;
$maestro["ita_activos"]["nombre"]["nombrecampo"] = "nombre" ; $maestro["ita_activos"]["nombre"]["tipo"] = "varchar(50)" ; $maestro["ita_activos"]["nombre"]["extra"] = "" ;
$maestro["ita_activos"]["estado"]["nombrecampo"] = "estado" ; $maestro["ita_activos"]["estado"]["tipo"] = "int(11)" ; $maestro["ita_activos"]["estado"]["extra"] = "" ;
$maestro["ita_activos"]["plantilla"]["nombrecampo"] = "plantilla" ; $maestro["ita_activos"]["plantilla"]["tipo"] = "varchar(50)" ; $maestro["ita_activos"]["plantilla"]["extra"] = "" ;
$maestro["ita_activos"]["falta"]["nombrecampo"] = "falta" ; $maestro["ita_activos"]["falta"]["tipo"] = "date" ; $maestro["ita_activos"]["falta"]["extra"] = "" ;
$maestro["ita_activos"]["fcaducidad"]["nombrecampo"] = "fcaducidad" ; $maestro["ita_activos"]["fcaducidad"]["tipo"] = "date" ; $maestro["ita_activos"]["fcaducidad"]["extra"] = "" ;
$maestro["ita_activos"]["avisar"]["nombrecampo"] = "avisar" ; $maestro["ita_activos"]["avisar"]["tipo"] = "int(11)" ; $maestro["ita_activos"]["avisar"]["extra"] = "" ;
$maestro["ita_activos"]["faviso"]["nombrecampo"] = "faviso" ; $maestro["ita_activos"]["faviso"]["tipo"] = "date" ; $maestro["ita_activos"]["faviso"]["extra"] = "" ;
$maestro["ita_activos"]["notas"]["nombrecampo"] = "notas" ; $maestro["ita_activos"]["notas"]["tipo"] = "varchar(250)" ; $maestro["ita_activos"]["notas"]["extra"] = "" ;
$maestro["ita_activos"]["tratarcomo"]["nombrecampo"] = "tratarcomo" ; $maestro["ita_activos"]["tratarcomo"]["tipo"] = "tinyint(4)" ; $maestro["ita_activos"]["tratarcomo"]["extra"] = "" ;

$maestro["ita_activos_vinc"]["idactivo"]["nombrecampo"] = "idactivo" ; $maestro["ita_activos_vinc"]["idactivo"]["tipo"] = "int(11)" ; $maestro["ita_activos_vinc"]["idactivo"]["extra"] = "" ;
$maestro["ita_activos_vinc"]["idvinculado"]["nombrecampo"] = "idvinculado" ; $maestro["ita_activos_vinc"]["idvinculado"]["tipo"] = "int(11)" ; $maestro["ita_activos_vinc"]["idvinculado"]["extra"] = "" ;

$maestro["ita_caracteristicas"]["id"]["nombrecampo"] = "id" ; $maestro["ita_caracteristicas"]["id"]["tipo"] = "int(11)" ; $maestro["ita_caracteristicas"]["id"]["extra"] = "auto_increment" ;
$maestro["ita_caracteristicas"]["idactivo"]["nombrecampo"] = "idactivo" ; $maestro["ita_caracteristicas"]["idactivo"]["tipo"] = "int(11)" ; $maestro["ita_caracteristicas"]["idactivo"]["extra"] = "" ;
$maestro["ita_caracteristicas"]["opcion"]["nombrecampo"] = "opcion" ; $maestro["ita_caracteristicas"]["opcion"]["tipo"] = "varchar(50)" ; $maestro["ita_caracteristicas"]["opcion"]["extra"] = "" ;
$maestro["ita_caracteristicas"]["valor"]["nombrecampo"] = "valor" ; $maestro["ita_caracteristicas"]["valor"]["tipo"] = "varchar(200)" ; $maestro["ita_caracteristicas"]["valor"]["extra"] = "" ;
$maestro["ita_caracteristicas"]["valor2"]["nombrecampo"] = "valor2" ; $maestro["ita_caracteristicas"]["valor2"]["tipo"] = "varchar(50)" ; $maestro["ita_caracteristicas"]["valor2"]["extra"] = "" ;
$maestro["ita_caracteristicas"]["valor3"]["nombrecampo"] = "valor3" ; $maestro["ita_caracteristicas"]["valor3"]["tipo"] = "varchar(50)" ; $maestro["ita_caracteristicas"]["valor3"]["extra"] = "" ;
$maestro["ita_caracteristicas"]["valor4"]["nombrecampo"] = "valor4" ; $maestro["ita_caracteristicas"]["valor4"]["tipo"] = "varchar(50)" ; $maestro["ita_caracteristicas"]["valor4"]["extra"] = "" ;
$maestro["ita_caracteristicas"]["color"]["nombrecampo"] = "color" ; $maestro["ita_caracteristicas"]["color"]["tipo"] = "varchar(8)" ; $maestro["ita_caracteristicas"]["color"]["extra"] = "" ;

$maestro["ita_estados"]["id"]["nombrecampo"] = "id" ; $maestro["ita_estados"]["id"]["tipo"] = "int(11)" ; $maestro["ita_estados"]["id"]["extra"] = "auto_increment" ;
$maestro["ita_estados"]["estado"]["nombrecampo"] = "estado" ; $maestro["ita_estados"]["estado"]["tipo"] = "varchar(50)" ; $maestro["ita_estados"]["estado"]["extra"] = "" ;

$maestro["ita_pro"]["id"]["nombrecampo"] = "id" ; $maestro["ita_pro"]["id"]["tipo"] = "int(11)" ; $maestro["ita_pro"]["id"]["extra"] = "auto_increment" ;
$maestro["ita_pro"]["idactivo"]["nombrecampo"] = "idactivo" ; $maestro["ita_pro"]["idactivo"]["tipo"] = "int(11)" ; $maestro["ita_pro"]["idactivo"]["extra"] = "" ;
$maestro["ita_pro"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["ita_pro"]["idtercero"]["tipo"] = "int(11)" ; $maestro["ita_pro"]["idtercero"]["extra"] = "" ;
$maestro["ita_pro"]["notas"]["nombrecampo"] = "notas" ; $maestro["ita_pro"]["notas"]["tipo"] = "varchar(50)" ; $maestro["ita_pro"]["notas"]["extra"] = "" ;

$maestro["ita_tickets"]["id"]["nombrecampo"] = "id" ; $maestro["ita_tickets"]["id"]["tipo"] = "int(11)" ; $maestro["ita_tickets"]["id"]["extra"] = "auto_increment" ;
$maestro["ita_tickets"]["idticket"]["nombrecampo"] = "idticket" ; $maestro["ita_tickets"]["idticket"]["tipo"] = "int(11)" ; $maestro["ita_tickets"]["idticket"]["extra"] = "" ;
$maestro["ita_tickets"]["idactivo"]["nombrecampo"] = "idactivo" ; $maestro["ita_tickets"]["idactivo"]["tipo"] = "int(11)" ; $maestro["ita_tickets"]["idactivo"]["extra"] = "" ;

$maestro["ita_tipos"]["id"]["nombrecampo"] = "id" ; $maestro["ita_tipos"]["id"]["tipo"] = "int(11)" ; $maestro["ita_tipos"]["id"]["extra"] = "auto_increment" ;
$maestro["ita_tipos"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["ita_tipos"]["tipo"]["tipo"] = "varchar(50)" ; $maestro["ita_tipos"]["tipo"]["extra"] = "" ;

$maestro["itc_tipos"]["id"]["nombrecampo"] = "id" ; $maestro["itc_tipos"]["id"]["tipo"] = "int(11)" ; $maestro["itc_tipos"]["id"]["extra"] = "auto_increment" ;
$maestro["itc_tipos"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["itc_tipos"]["tipo"]["tipo"] = "varchar(50)" ; $maestro["itc_tipos"]["tipo"]["extra"] = "" ;

$maestro["lopd"]["id"]["nombrecampo"] = "id" ; $maestro["lopd"]["id"]["tipo"] = "int(11)" ; $maestro["lopd"]["id"]["extra"] = "auto_increment" ;
$maestro["lopd"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["lopd"]["idempresa"]["tipo"] = "int(11)" ; $maestro["lopd"]["idempresa"]["extra"] = "" ;
$maestro["lopd"]["idcatlopd"]["nombrecampo"] = "idcatlopd" ; $maestro["lopd"]["idcatlopd"]["tipo"] = "int(11)" ; $maestro["lopd"]["idcatlopd"]["extra"] = "" ;
$maestro["lopd"]["nomdoc"]["nombrecampo"] = "nomdoc" ; $maestro["lopd"]["nomdoc"]["tipo"] = "varchar(50)" ; $maestro["lopd"]["nomdoc"]["extra"] = "" ;

$maestro["menus"]["id"]["nombrecampo"] = "id" ; $maestro["menus"]["id"]["tipo"] = "int(11)" ; $maestro["menus"]["id"]["extra"] = "auto_increment" ;
$maestro["menus"]["idmenu"]["nombrecampo"] = "idmenu" ; $maestro["menus"]["idmenu"]["tipo"] = "int(11)" ; $maestro["menus"]["idmenu"]["extra"] = "" ;
$maestro["menus"]["module"]["nombrecampo"] = "module" ; $maestro["menus"]["module"]["tipo"] = "varchar(50)" ; $maestro["menus"]["module"]["extra"] = "" ;
$maestro["menus"]["section"]["nombrecampo"] = "section" ; $maestro["menus"]["section"]["tipo"] = "varchar(20)" ; $maestro["menus"]["section"]["extra"] = "" ;
$maestro["menus"]["display"]["nombrecampo"] = "display" ; $maestro["menus"]["display"]["tipo"] = "varchar(50)" ; $maestro["menus"]["display"]["extra"] = "" ;
$maestro["menus"]["orden"]["nombrecampo"] = "orden" ; $maestro["menus"]["orden"]["tipo"] = "int(11)" ; $maestro["menus"]["orden"]["extra"] = "" ;
$maestro["menus"]["idpermiso"]["nombrecampo"] = "idpermiso" ; $maestro["menus"]["idpermiso"]["tipo"] = "int(11)" ; $maestro["menus"]["idpermiso"]["extra"] = "" ;
$maestro["menus"]["icono"]["nombrecampo"] = "icono" ; $maestro["menus"]["icono"]["tipo"] = "varchar(50)" ; $maestro["menus"]["icono"]["extra"] = "" ;

$maestro["menus_lang"]["idmenu"]["nombrecampo"] = "idmenu" ; $maestro["menus_lang"]["idmenu"]["tipo"] = "int(11)" ; $maestro["menus_lang"]["idmenu"]["extra"] = "" ;
$maestro["menus_lang"]["idlang"]["nombrecampo"] = "idlang" ; $maestro["menus_lang"]["idlang"]["tipo"] = "int(11)" ; $maestro["menus_lang"]["idlang"]["extra"] = "" ;
$maestro["menus_lang"]["etiqueta"]["nombrecampo"] = "etiqueta" ; $maestro["menus_lang"]["etiqueta"]["tipo"] = "varchar(50)" ; $maestro["menus_lang"]["etiqueta"]["extra"] = "" ;

$maestro["modulos"]["id"]["nombrecampo"] = "id" ; $maestro["modulos"]["id"]["tipo"] = "int(11)" ; $maestro["modulos"]["id"]["extra"] = "auto_increment" ;
$maestro["modulos"]["idmod"]["nombrecampo"] = "idmod" ; $maestro["modulos"]["idmod"]["tipo"] = "int(11)" ; $maestro["modulos"]["idmod"]["extra"] = "" ;
$maestro["modulos"]["display"]["nombrecampo"] = "display" ; $maestro["modulos"]["display"]["tipo"] = "varchar(50)" ; $maestro["modulos"]["display"]["extra"] = "" ;
$maestro["modulos"]["activo"]["nombrecampo"] = "activo" ; $maestro["modulos"]["activo"]["tipo"] = "int(11)" ; $maestro["modulos"]["activo"]["extra"] = "" ;
$maestro["modulos"]["directorio"]["nombrecampo"] = "directorio" ; $maestro["modulos"]["directorio"]["tipo"] = "varchar(50)" ; $maestro["modulos"]["directorio"]["extra"] = "" ;

$maestro["notifica"]["opcion"]["nombrecampo"] = "opcion" ; $maestro["notifica"]["opcion"]["tipo"] = "varchar(10)" ; $maestro["notifica"]["opcion"]["extra"] = "" ;
$maestro["notifica"]["valor"]["nombrecampo"] = "valor" ; $maestro["notifica"]["valor"]["tipo"] = "varchar(250)" ; $maestro["notifica"]["valor"]["extra"] = "" ;

$maestro["oc"]["id"]["nombrecampo"] = "id" ; $maestro["oc"]["id"]["tipo"] = "int(11)" ; $maestro["oc"]["id"]["extra"] = "auto_increment" ;
$maestro["oc"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["oc"]["idserie"]["tipo"] = "int(11)" ; $maestro["oc"]["idserie"]["extra"] = "" ;
$maestro["oc"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["oc"]["codigoint"]["tipo"] = "int(11)" ; $maestro["oc"]["codigoint"]["extra"] = "" ;
$maestro["oc"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["oc"]["codigo"]["tipo"] = "varchar(10)" ; $maestro["oc"]["codigo"]["extra"] = "" ;
$maestro["oc"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["oc"]["idtercero"]["tipo"] = "int(11)" ; $maestro["oc"]["idtercero"]["extra"] = "" ;
$maestro["oc"]["estado"]["nombrecampo"] = "estado" ; $maestro["oc"]["estado"]["tipo"] = "int(11)" ; $maestro["oc"]["estado"]["extra"] = "" ;
$maestro["oc"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["oc"]["fecha"]["tipo"] = "date" ; $maestro["oc"]["fecha"]["extra"] = "" ;
$maestro["oc"]["vencimiento"]["nombrecampo"] = "vencimiento" ; $maestro["oc"]["vencimiento"]["tipo"] = "date" ; $maestro["oc"]["vencimiento"]["extra"] = "" ;
$maestro["oc"]["idusuario"]["nombrecampo"] = "idusuario" ; $maestro["oc"]["idusuario"]["tipo"] = "int(11)" ; $maestro["oc"]["idusuario"]["extra"] = "" ;
$maestro["oc"]["pagado"]["nombrecampo"] = "pagado" ; $maestro["oc"]["pagado"]["tipo"] = "float" ; $maestro["oc"]["pagado"]["extra"] = "" ;
$maestro["oc"]["editfv"]["nombrecampo"] = "editfv" ; $maestro["oc"]["editfv"]["tipo"] = "int(11)" ; $maestro["oc"]["editfv"]["extra"] = "" ;
$maestro["oc"]["factura"]["nombrecampo"] = "factura" ; $maestro["oc"]["factura"]["tipo"] = "varchar(20)" ; $maestro["oc"]["factura"]["extra"] = "" ;
$maestro["oc"]["pc_cp"]["nombrecampo"] = "pc_cp" ; $maestro["oc"]["pc_cp"]["tipo"] = "int(11)" ; $maestro["oc"]["pc_cp"]["extra"] = "" ;
$maestro["oc"]["pc_dp"]["nombrecampo"] = "pc_dp" ; $maestro["oc"]["pc_dp"]["tipo"] = "int(11)" ; $maestro["oc"]["pc_dp"]["extra"] = "" ;

$maestro["oc_lineas"]["id"]["nombrecampo"] = "id" ; $maestro["oc_lineas"]["id"]["tipo"] = "int(11)" ; $maestro["oc_lineas"]["id"]["extra"] = "auto_increment" ;
$maestro["oc_lineas"]["idoc"]["nombrecampo"] = "idoc" ; $maestro["oc_lineas"]["idoc"]["tipo"] = "int(11)" ; $maestro["oc_lineas"]["idoc"]["extra"] = "" ;
$maestro["oc_lineas"]["cod"]["nombrecampo"] = "cod" ; $maestro["oc_lineas"]["cod"]["tipo"] = "varchar(20)" ; $maestro["oc_lineas"]["cod"]["extra"] = "" ;
$maestro["oc_lineas"]["concepto"]["nombrecampo"] = "concepto" ; $maestro["oc_lineas"]["concepto"]["tipo"] = "varchar(250)" ; $maestro["oc_lineas"]["concepto"]["extra"] = "" ;
$maestro["oc_lineas"]["unid"]["nombrecampo"] = "unid" ; $maestro["oc_lineas"]["unid"]["tipo"] = "int(11)" ; $maestro["oc_lineas"]["unid"]["extra"] = "" ;
$maestro["oc_lineas"]["precio"]["nombrecampo"] = "precio" ; $maestro["oc_lineas"]["precio"]["tipo"] = "float" ; $maestro["oc_lineas"]["precio"]["extra"] = "" ;
$maestro["oc_lineas"]["dto"]["nombrecampo"] = "dto" ; $maestro["oc_lineas"]["dto"]["tipo"] = "int(11)" ; $maestro["oc_lineas"]["dto"]["extra"] = "" ;
$maestro["oc_lineas"]["importe"]["nombrecampo"] = "importe" ; $maestro["oc_lineas"]["importe"]["tipo"] = "float" ; $maestro["oc_lineas"]["importe"]["extra"] = "" ;
$maestro["oc_lineas"]["orden"]["nombrecampo"] = "orden" ; $maestro["oc_lineas"]["orden"]["tipo"] = "int(11)" ; $maestro["oc_lineas"]["orden"]["extra"] = "" ;
$maestro["oc_lineas"]["exclufactu"]["nombrecampo"] = "exclufactu" ; $maestro["oc_lineas"]["exclufactu"]["tipo"] = "int(11)" ; $maestro["oc_lineas"]["exclufactu"]["extra"] = "" ;

$maestro["oc_lineas_tax"]["id"]["nombrecampo"] = "id" ; $maestro["oc_lineas_tax"]["id"]["tipo"] = "int(11)" ; $maestro["oc_lineas_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["oc_lineas_tax"]["idoc"]["nombrecampo"] = "idoc" ; $maestro["oc_lineas_tax"]["idoc"]["tipo"] = "int(11)" ; $maestro["oc_lineas_tax"]["idoc"]["extra"] = "" ;
$maestro["oc_lineas_tax"]["idoclinea"]["nombrecampo"] = "idoclinea" ; $maestro["oc_lineas_tax"]["idoclinea"]["tipo"] = "int(11)" ; $maestro["oc_lineas_tax"]["idoclinea"]["extra"] = "" ;
$maestro["oc_lineas_tax"]["idtax"]["nombrecampo"] = "idtax" ; $maestro["oc_lineas_tax"]["idtax"]["tipo"] = "int(11)" ; $maestro["oc_lineas_tax"]["idtax"]["extra"] = "" ;
$maestro["oc_lineas_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["oc_lineas_tax"]["valor"]["tipo"] = "float" ; $maestro["oc_lineas_tax"]["valor"]["extra"] = "" ;
$maestro["oc_lineas_tax"]["importe"]["nombrecampo"] = "importe" ; $maestro["oc_lineas_tax"]["importe"]["tipo"] = "float" ; $maestro["oc_lineas_tax"]["importe"]["extra"] = "" ;

$maestro["oc_pagos"]["id"]["nombrecampo"] = "id" ; $maestro["oc_pagos"]["id"]["tipo"] = "int(11)" ; $maestro["oc_pagos"]["id"]["extra"] = "auto_increment" ;
$maestro["oc_pagos"]["idoc"]["nombrecampo"] = "idoc" ; $maestro["oc_pagos"]["idoc"]["tipo"] = "int(11)" ; $maestro["oc_pagos"]["idoc"]["extra"] = "" ;
$maestro["oc_pagos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["oc_pagos"]["fecha"]["tipo"] = "date" ; $maestro["oc_pagos"]["fecha"]["extra"] = "" ;
$maestro["oc_pagos"]["importe"]["nombrecampo"] = "importe" ; $maestro["oc_pagos"]["importe"]["tipo"] = "float" ; $maestro["oc_pagos"]["importe"]["extra"] = "" ;
$maestro["oc_pagos"]["idfpago"]["nombrecampo"] = "idfpago" ; $maestro["oc_pagos"]["idfpago"]["tipo"] = "int(11)" ; $maestro["oc_pagos"]["idfpago"]["extra"] = "" ;
$maestro["oc_pagos"]["idcpago"]["nombrecampo"] = "idcpago" ; $maestro["oc_pagos"]["idcpago"]["tipo"] = "int(11)" ; $maestro["oc_pagos"]["idcpago"]["extra"] = "" ;

$maestro["oc_sn"]["id"]["nombrecampo"] = "id" ; $maestro["oc_sn"]["id"]["tipo"] = "int(11)" ; $maestro["oc_sn"]["id"]["extra"] = "auto_increment" ;
$maestro["oc_sn"]["idoc"]["nombrecampo"] = "idoc" ; $maestro["oc_sn"]["idoc"]["tipo"] = "int(11)" ; $maestro["oc_sn"]["idoc"]["extra"] = "" ;
$maestro["oc_sn"]["idlinea"]["nombrecampo"] = "idlinea" ; $maestro["oc_sn"]["idlinea"]["tipo"] = "int(11)" ; $maestro["oc_sn"]["idlinea"]["extra"] = "" ;
$maestro["oc_sn"]["sn"]["nombrecampo"] = "sn" ; $maestro["oc_sn"]["sn"]["tipo"] = "varchar(50)" ; $maestro["oc_sn"]["sn"]["extra"] = "" ;
$maestro["oc_sn"]["pn"]["nombrecampo"] = "pn" ; $maestro["oc_sn"]["pn"]["tipo"] = "varchar(50)" ; $maestro["oc_sn"]["pn"]["extra"] = "" ;
$maestro["oc_sn"]["otro"]["nombrecampo"] = "otro" ; $maestro["oc_sn"]["otro"]["tipo"] = "varchar(50)" ; $maestro["oc_sn"]["otro"]["extra"] = "" ;

$maestro["oc_tax"]["id"]["nombrecampo"] = "id" ; $maestro["oc_tax"]["id"]["tipo"] = "int(11)" ; $maestro["oc_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["oc_tax"]["idoc"]["nombrecampo"] = "idoc" ; $maestro["oc_tax"]["idoc"]["tipo"] = "int(11)" ; $maestro["oc_tax"]["idoc"]["extra"] = "" ;
$maestro["oc_tax"]["idimpuesto"]["nombrecampo"] = "idimpuesto" ; $maestro["oc_tax"]["idimpuesto"]["tipo"] = "int(11)" ; $maestro["oc_tax"]["idimpuesto"]["extra"] = "" ;
$maestro["oc_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["oc_tax"]["valor"]["tipo"] = "int(11)" ; $maestro["oc_tax"]["valor"]["extra"] = "" ;

$maestro["opafr"]["tipoa"]["nombrecampo"] = "tipoa" ; $maestro["opafr"]["tipoa"]["tipo"] = "varchar(10)" ; $maestro["opafr"]["tipoa"]["extra"] = "" ;
$maestro["opafr"]["idtipoa"]["nombrecampo"] = "idtipoa" ; $maestro["opafr"]["idtipoa"]["tipo"] = "int(11)" ; $maestro["opafr"]["idtipoa"]["extra"] = "" ;
$maestro["opafr"]["tipob"]["nombrecampo"] = "tipob" ; $maestro["opafr"]["tipob"]["tipo"] = "varchar(10)" ; $maestro["opafr"]["tipob"]["extra"] = "" ;
$maestro["opafr"]["idtipob"]["nombrecampo"] = "idtipob" ; $maestro["opafr"]["idtipob"]["tipo"] = "int(11)" ; $maestro["opafr"]["idtipob"]["extra"] = "" ;

$maestro["ov"]["id"]["nombrecampo"] = "id" ; $maestro["ov"]["id"]["tipo"] = "int(11)" ; $maestro["ov"]["id"]["extra"] = "auto_increment" ;
$maestro["ov"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["ov"]["idserie"]["tipo"] = "int(11)" ; $maestro["ov"]["idserie"]["extra"] = "" ;
$maestro["ov"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["ov"]["codigoint"]["tipo"] = "int(11)" ; $maestro["ov"]["codigoint"]["extra"] = "" ;
$maestro["ov"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["ov"]["codigo"]["tipo"] = "varchar(10)" ; $maestro["ov"]["codigo"]["extra"] = "" ;
$maestro["ov"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["ov"]["idtercero"]["tipo"] = "int(11)" ; $maestro["ov"]["idtercero"]["extra"] = "" ;
$maestro["ov"]["estado"]["nombrecampo"] = "estado" ; $maestro["ov"]["estado"]["tipo"] = "int(11)" ; $maestro["ov"]["estado"]["extra"] = "" ;
$maestro["ov"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["ov"]["fecha"]["tipo"] = "date" ; $maestro["ov"]["fecha"]["extra"] = "" ;
$maestro["ov"]["vencimiento"]["nombrecampo"] = "vencimiento" ; $maestro["ov"]["vencimiento"]["tipo"] = "date" ; $maestro["ov"]["vencimiento"]["extra"] = "" ;
$maestro["ov"]["idusuario"]["nombrecampo"] = "idusuario" ; $maestro["ov"]["idusuario"]["tipo"] = "int(11)" ; $maestro["ov"]["idusuario"]["extra"] = "" ;
$maestro["ov"]["pagado"]["nombrecampo"] = "pagado" ; $maestro["ov"]["pagado"]["tipo"] = "float" ; $maestro["ov"]["pagado"]["extra"] = "" ;
$maestro["ov"]["editfv"]["nombrecampo"] = "editfv" ; $maestro["ov"]["editfv"]["tipo"] = "int(11)" ; $maestro["ov"]["editfv"]["extra"] = "" ;
$maestro["ov"]["pc_cp"]["nombrecampo"] = "pc_cp" ; $maestro["ov"]["pc_cp"]["tipo"] = "int(11)" ; $maestro["ov"]["pc_cp"]["extra"] = "" ;
$maestro["ov"]["pc_dp"]["nombrecampo"] = "pc_dp" ; $maestro["ov"]["pc_dp"]["tipo"] = "int(11)" ; $maestro["ov"]["pc_dp"]["extra"] = "" ;

$maestro["ov_lineas"]["id"]["nombrecampo"] = "id" ; $maestro["ov_lineas"]["id"]["tipo"] = "int(11)" ; $maestro["ov_lineas"]["id"]["extra"] = "auto_increment" ;
$maestro["ov_lineas"]["idov"]["nombrecampo"] = "idov" ; $maestro["ov_lineas"]["idov"]["tipo"] = "int(11)" ; $maestro["ov_lineas"]["idov"]["extra"] = "" ;
$maestro["ov_lineas"]["cod"]["nombrecampo"] = "cod" ; $maestro["ov_lineas"]["cod"]["tipo"] = "varchar(20)" ; $maestro["ov_lineas"]["cod"]["extra"] = "" ;
$maestro["ov_lineas"]["concepto"]["nombrecampo"] = "concepto" ; $maestro["ov_lineas"]["concepto"]["tipo"] = "varchar(250)" ; $maestro["ov_lineas"]["concepto"]["extra"] = "" ;
$maestro["ov_lineas"]["unid"]["nombrecampo"] = "unid" ; $maestro["ov_lineas"]["unid"]["tipo"] = "int(11)" ; $maestro["ov_lineas"]["unid"]["extra"] = "" ;
$maestro["ov_lineas"]["precio"]["nombrecampo"] = "precio" ; $maestro["ov_lineas"]["precio"]["tipo"] = "float" ; $maestro["ov_lineas"]["precio"]["extra"] = "" ;
$maestro["ov_lineas"]["dto"]["nombrecampo"] = "dto" ; $maestro["ov_lineas"]["dto"]["tipo"] = "int(11)" ; $maestro["ov_lineas"]["dto"]["extra"] = "" ;
$maestro["ov_lineas"]["importe"]["nombrecampo"] = "importe" ; $maestro["ov_lineas"]["importe"]["tipo"] = "float" ; $maestro["ov_lineas"]["importe"]["extra"] = "" ;
$maestro["ov_lineas"]["orden"]["nombrecampo"] = "orden" ; $maestro["ov_lineas"]["orden"]["tipo"] = "int(11)" ; $maestro["ov_lineas"]["orden"]["extra"] = "" ;
$maestro["ov_lineas"]["exclufactu"]["nombrecampo"] = "exclufactu" ; $maestro["ov_lineas"]["exclufactu"]["tipo"] = "int(11)" ; $maestro["ov_lineas"]["exclufactu"]["extra"] = "" ;

$maestro["ov_lineas_tax"]["id"]["nombrecampo"] = "id" ; $maestro["ov_lineas_tax"]["id"]["tipo"] = "int(11)" ; $maestro["ov_lineas_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["ov_lineas_tax"]["idov"]["nombrecampo"] = "idov" ; $maestro["ov_lineas_tax"]["idov"]["tipo"] = "int(11)" ; $maestro["ov_lineas_tax"]["idov"]["extra"] = "" ;
$maestro["ov_lineas_tax"]["idovlinea"]["nombrecampo"] = "idovlinea" ; $maestro["ov_lineas_tax"]["idovlinea"]["tipo"] = "int(11)" ; $maestro["ov_lineas_tax"]["idovlinea"]["extra"] = "" ;
$maestro["ov_lineas_tax"]["idtax"]["nombrecampo"] = "idtax" ; $maestro["ov_lineas_tax"]["idtax"]["tipo"] = "int(11)" ; $maestro["ov_lineas_tax"]["idtax"]["extra"] = "" ;
$maestro["ov_lineas_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["ov_lineas_tax"]["valor"]["tipo"] = "float" ; $maestro["ov_lineas_tax"]["valor"]["extra"] = "" ;
$maestro["ov_lineas_tax"]["importe"]["nombrecampo"] = "importe" ; $maestro["ov_lineas_tax"]["importe"]["tipo"] = "float" ; $maestro["ov_lineas_tax"]["importe"]["extra"] = "" ;

$maestro["ov_pagos"]["id"]["nombrecampo"] = "id" ; $maestro["ov_pagos"]["id"]["tipo"] = "int(11)" ; $maestro["ov_pagos"]["id"]["extra"] = "auto_increment" ;
$maestro["ov_pagos"]["idov"]["nombrecampo"] = "idov" ; $maestro["ov_pagos"]["idov"]["tipo"] = "int(11)" ; $maestro["ov_pagos"]["idov"]["extra"] = "" ;
$maestro["ov_pagos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["ov_pagos"]["fecha"]["tipo"] = "date" ; $maestro["ov_pagos"]["fecha"]["extra"] = "" ;
$maestro["ov_pagos"]["importe"]["nombrecampo"] = "importe" ; $maestro["ov_pagos"]["importe"]["tipo"] = "float" ; $maestro["ov_pagos"]["importe"]["extra"] = "" ;
$maestro["ov_pagos"]["idfpago"]["nombrecampo"] = "idfpago" ; $maestro["ov_pagos"]["idfpago"]["tipo"] = "int(11)" ; $maestro["ov_pagos"]["idfpago"]["extra"] = "" ;
$maestro["ov_pagos"]["idcpago"]["nombrecampo"] = "idcpago" ; $maestro["ov_pagos"]["idcpago"]["tipo"] = "int(11)" ; $maestro["ov_pagos"]["idcpago"]["extra"] = "" ;

$maestro["ov_sn"]["id"]["nombrecampo"] = "id" ; $maestro["ov_sn"]["id"]["tipo"] = "int(11)" ; $maestro["ov_sn"]["id"]["extra"] = "auto_increment" ;
$maestro["ov_sn"]["idov"]["nombrecampo"] = "idov" ; $maestro["ov_sn"]["idov"]["tipo"] = "int(11)" ; $maestro["ov_sn"]["idov"]["extra"] = "" ;
$maestro["ov_sn"]["idlinea"]["nombrecampo"] = "idlinea" ; $maestro["ov_sn"]["idlinea"]["tipo"] = "int(11)" ; $maestro["ov_sn"]["idlinea"]["extra"] = "" ;
$maestro["ov_sn"]["sn"]["nombrecampo"] = "sn" ; $maestro["ov_sn"]["sn"]["tipo"] = "varchar(50)" ; $maestro["ov_sn"]["sn"]["extra"] = "" ;
$maestro["ov_sn"]["pn"]["nombrecampo"] = "pn" ; $maestro["ov_sn"]["pn"]["tipo"] = "varchar(50)" ; $maestro["ov_sn"]["pn"]["extra"] = "" ;
$maestro["ov_sn"]["otro"]["nombrecampo"] = "otro" ; $maestro["ov_sn"]["otro"]["tipo"] = "varchar(50)" ; $maestro["ov_sn"]["otro"]["extra"] = "" ;

$maestro["ov_tax"]["id"]["nombrecampo"] = "id" ; $maestro["ov_tax"]["id"]["tipo"] = "int(11)" ; $maestro["ov_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["ov_tax"]["idov"]["nombrecampo"] = "idov" ; $maestro["ov_tax"]["idov"]["tipo"] = "int(11)" ; $maestro["ov_tax"]["idov"]["extra"] = "" ;
$maestro["ov_tax"]["idimpuesto"]["nombrecampo"] = "idimpuesto" ; $maestro["ov_tax"]["idimpuesto"]["tipo"] = "int(11)" ; $maestro["ov_tax"]["idimpuesto"]["extra"] = "" ;
$maestro["ov_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["ov_tax"]["valor"]["tipo"] = "int(11)" ; $maestro["ov_tax"]["valor"]["extra"] = "" ;

$maestro["paises"]["id"]["nombrecampo"] = "id" ; $maestro["paises"]["id"]["tipo"] = "int(11)" ; $maestro["paises"]["id"]["extra"] = "auto_increment" ;
$maestro["paises"]["pais"]["nombrecampo"] = "pais" ; $maestro["paises"]["pais"]["tipo"] = "varchar(50)" ; $maestro["paises"]["pais"]["extra"] = "" ;

$maestro["partes"]["id"]["nombrecampo"] = "id" ; $maestro["partes"]["id"]["tipo"] = "int(11)" ; $maestro["partes"]["id"]["extra"] = "auto_increment" ;
$maestro["partes"]["idticket"]["nombrecampo"] = "idticket" ; $maestro["partes"]["idticket"]["tipo"] = "int(11)" ; $maestro["partes"]["idticket"]["extra"] = "" ;
$maestro["partes"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["partes"]["idserie"]["tipo"] = "int(11)" ; $maestro["partes"]["idserie"]["extra"] = "" ;
$maestro["partes"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["partes"]["codigo"]["tipo"] = "varchar(20)" ; $maestro["partes"]["codigo"]["extra"] = "" ;
$maestro["partes"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["partes"]["codigoint"]["tipo"] = "int(11)" ; $maestro["partes"]["codigoint"]["extra"] = "" ;
$maestro["partes"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["partes"]["iduser"]["tipo"] = "int(11)" ; $maestro["partes"]["iduser"]["extra"] = "" ;
$maestro["partes"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["partes"]["idtercero"]["tipo"] = "int(11)" ; $maestro["partes"]["idtercero"]["extra"] = "" ;
$maestro["partes"]["fechain"]["nombrecampo"] = "fechain" ; $maestro["partes"]["fechain"]["tipo"] = "datetime" ; $maestro["partes"]["fechain"]["extra"] = "" ;
$maestro["partes"]["fechaout"]["nombrecampo"] = "fechaout" ; $maestro["partes"]["fechaout"]["tipo"] = "datetime" ; $maestro["partes"]["fechaout"]["extra"] = "" ;
$maestro["partes"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["partes"]["descripcion"]["tipo"] = "blob" ; $maestro["partes"]["descripcion"]["extra"] = "" ;
$maestro["partes"]["nomfirma"]["nombrecampo"] = "nomfirma" ; $maestro["partes"]["nomfirma"]["tipo"] = "varchar(50)" ; $maestro["partes"]["nomfirma"]["extra"] = "" ;
$maestro["partes"]["mailfirma"]["nombrecampo"] = "mailfirma" ; $maestro["partes"]["mailfirma"]["tipo"] = "varchar(250)" ; $maestro["partes"]["mailfirma"]["extra"] = "" ;
$maestro["partes"]["remoto"]["nombrecampo"] = "remoto" ; $maestro["partes"]["remoto"]["tipo"] = "varchar(20)" ; $maestro["partes"]["remoto"]["extra"] = "" ;

$maestro["partes_config"]["id"]["nombrecampo"] = "id" ; $maestro["partes_config"]["id"]["tipo"] = "int(11)" ; $maestro["partes_config"]["id"]["extra"] = "auto_increment" ;
$maestro["partes_config"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["partes_config"]["idserie"]["tipo"] = "int(11)" ; $maestro["partes_config"]["idserie"]["extra"] = "" ;
$maestro["partes_config"]["ftpserver"]["nombrecampo"] = "ftpserver" ; $maestro["partes_config"]["ftpserver"]["tipo"] = "varchar(50)" ; $maestro["partes_config"]["ftpserver"]["extra"] = "" ;
$maestro["partes_config"]["ftpusername"]["nombrecampo"] = "ftpusername" ; $maestro["partes_config"]["ftpusername"]["tipo"] = "varchar(50)" ; $maestro["partes_config"]["ftpusername"]["extra"] = "" ;
$maestro["partes_config"]["ftppassword"]["nombrecampo"] = "ftppassword" ; $maestro["partes_config"]["ftppassword"]["tipo"] = "varchar(50)" ; $maestro["partes_config"]["ftppassword"]["extra"] = "" ;
$maestro["partes_config"]["ftpsyncin"]["nombrecampo"] = "ftpsyncin" ; $maestro["partes_config"]["ftpsyncin"]["tipo"] = "varchar(250)" ; $maestro["partes_config"]["ftpsyncin"]["extra"] = "" ;
$maestro["partes_config"]["ftpsyncout"]["nombrecampo"] = "ftpsyncout" ; $maestro["partes_config"]["ftpsyncout"]["tipo"] = "varchar(250)" ; $maestro["partes_config"]["ftpsyncout"]["extra"] = "" ;
$maestro["partes_config"]["url"]["nombrecampo"] = "url" ; $maestro["partes_config"]["url"]["tipo"] = "varchar(250)" ; $maestro["partes_config"]["url"]["extra"] = "" ;

$maestro["partes_old"]["id"]["nombrecampo"] = "id" ; $maestro["partes_old"]["id"]["tipo"] = "int(11)" ; $maestro["partes_old"]["id"]["extra"] = "auto_increment" ;
$maestro["partes_old"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["partes_old"]["idserie"]["tipo"] = "int(11)" ; $maestro["partes_old"]["idserie"]["extra"] = "" ;
$maestro["partes_old"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["partes_old"]["codigoint"]["tipo"] = "int(11)" ; $maestro["partes_old"]["codigoint"]["extra"] = "" ;
$maestro["partes_old"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["partes_old"]["codigo"]["tipo"] = "varchar(20)" ; $maestro["partes_old"]["codigo"]["extra"] = "" ;
$maestro["partes_old"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["partes_old"]["idtercero"]["tipo"] = "int(11)" ; $maestro["partes_old"]["idtercero"]["extra"] = "" ;
$maestro["partes_old"]["idtecnico"]["nombrecampo"] = "idtecnico" ; $maestro["partes_old"]["idtecnico"]["tipo"] = "int(11)" ; $maestro["partes_old"]["idtecnico"]["extra"] = "" ;
$maestro["partes_old"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["partes_old"]["fecha"]["tipo"] = "date" ; $maestro["partes_old"]["fecha"]["extra"] = "" ;
$maestro["partes_old"]["horain"]["nombrecampo"] = "horain" ; $maestro["partes_old"]["horain"]["tipo"] = "time" ; $maestro["partes_old"]["horain"]["extra"] = "" ;
$maestro["partes_old"]["horaout"]["nombrecampo"] = "horaout" ; $maestro["partes_old"]["horaout"]["tipo"] = "time" ; $maestro["partes_old"]["horaout"]["extra"] = "" ;
$maestro["partes_old"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["partes_old"]["descripcion"]["tipo"] = "mediumtext" ; $maestro["partes_old"]["descripcion"]["extra"] = "" ;
$maestro["partes_old"]["material"]["nombrecampo"] = "material" ; $maestro["partes_old"]["material"]["tipo"] = "mediumtext" ; $maestro["partes_old"]["material"]["extra"] = "" ;
$maestro["partes_old"]["importe"]["nombrecampo"] = "importe" ; $maestro["partes_old"]["importe"]["tipo"] = "float" ; $maestro["partes_old"]["importe"]["extra"] = "" ;
$maestro["partes_old"]["pagado"]["nombrecampo"] = "pagado" ; $maestro["partes_old"]["pagado"]["tipo"] = "int(11)" ; $maestro["partes_old"]["pagado"]["extra"] = "" ;
$maestro["partes_old"]["email"]["nombrecampo"] = "email" ; $maestro["partes_old"]["email"]["tipo"] = "varchar(50)" ; $maestro["partes_old"]["email"]["extra"] = "" ;
$maestro["partes_old"]["firmanombre"]["nombrecampo"] = "firmanombre" ; $maestro["partes_old"]["firmanombre"]["tipo"] = "varchar(50)" ; $maestro["partes_old"]["firmanombre"]["extra"] = "" ;
$maestro["partes_old"]["firmanif"]["nombrecampo"] = "firmanif" ; $maestro["partes_old"]["firmanif"]["tipo"] = "varchar(20)" ; $maestro["partes_old"]["firmanif"]["extra"] = "" ;
$maestro["partes_old"]["finalizado"]["nombrecampo"] = "finalizado" ; $maestro["partes_old"]["finalizado"]["tipo"] = "int(11)" ; $maestro["partes_old"]["finalizado"]["extra"] = "" ;
$maestro["partes_old"]["plantilla"]["nombrecampo"] = "plantilla" ; $maestro["partes_old"]["plantilla"]["tipo"] = "varchar(50)" ; $maestro["partes_old"]["plantilla"]["extra"] = "" ;
$maestro["partes_old"]["fcontrol"]["nombrecampo"] = "fcontrol" ; $maestro["partes_old"]["fcontrol"]["tipo"] = "timestamp" ; $maestro["partes_old"]["fcontrol"]["extra"] = "" ;
$maestro["partes_old"]["idflota"]["nombrecampo"] = "idflota" ; $maestro["partes_old"]["idflota"]["tipo"] = "int(11)" ; $maestro["partes_old"]["idflota"]["extra"] = "" ;
$maestro["partes_old"]["kms"]["nombrecampo"] = "kms" ; $maestro["partes_old"]["kms"]["tipo"] = "int(11)" ; $maestro["partes_old"]["kms"]["extra"] = "" ;
$maestro["partes_old"]["desplazaimp"]["nombrecampo"] = "desplazaimp" ; $maestro["partes_old"]["desplazaimp"]["tipo"] = "float" ; $maestro["partes_old"]["desplazaimp"]["extra"] = "" ;
$maestro["partes_old"]["razonsocial"]["nombrecampo"] = "razonsocial" ; $maestro["partes_old"]["razonsocial"]["tipo"] = "varchar(50)" ; $maestro["partes_old"]["razonsocial"]["extra"] = "" ;
$maestro["partes_old"]["tel"]["nombrecampo"] = "tel" ; $maestro["partes_old"]["tel"]["tipo"] = "varchar(20)" ; $maestro["partes_old"]["tel"]["extra"] = "" ;

$maestro["permisos"]["id"]["nombrecampo"] = "id" ; $maestro["permisos"]["id"]["tipo"] = "int(11)" ; $maestro["permisos"]["id"]["extra"] = "auto_increment" ;
$maestro["permisos"]["idmod"]["nombrecampo"] = "idmod" ; $maestro["permisos"]["idmod"]["tipo"] = "int(11)" ; $maestro["permisos"]["idmod"]["extra"] = "" ;
$maestro["permisos"]["idpermiso"]["nombrecampo"] = "idpermiso" ; $maestro["permisos"]["idpermiso"]["tipo"] = "int(11)" ; $maestro["permisos"]["idpermiso"]["extra"] = "" ;
$maestro["permisos"]["display"]["nombrecampo"] = "display" ; $maestro["permisos"]["display"]["tipo"] = "varchar(50)" ; $maestro["permisos"]["display"]["extra"] = "" ;

$maestro["permisosgrupos"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["permisosgrupos"]["iduser"]["tipo"] = "int(11)" ; $maestro["permisosgrupos"]["iduser"]["extra"] = "" ;
$maestro["permisosgrupos"]["idgrupo"]["nombrecampo"] = "idgrupo" ; $maestro["permisosgrupos"]["idgrupo"]["tipo"] = "int(11)" ; $maestro["permisosgrupos"]["idgrupo"]["extra"] = "" ;
$maestro["permisosgrupos"]["idpermiso"]["nombrecampo"] = "idpermiso" ; $maestro["permisosgrupos"]["idpermiso"]["tipo"] = "int(11)" ; $maestro["permisosgrupos"]["idpermiso"]["extra"] = "" ;

$maestro["poblaciones"]["id"]["nombrecampo"] = "id" ; $maestro["poblaciones"]["id"]["tipo"] = "int(11)" ; $maestro["poblaciones"]["id"]["extra"] = "auto_increment" ;
$maestro["poblaciones"]["cp"]["nombrecampo"] = "cp" ; $maestro["poblaciones"]["cp"]["tipo"] = "varchar(10)" ; $maestro["poblaciones"]["cp"]["extra"] = "" ;
$maestro["poblaciones"]["poblacion"]["nombrecampo"] = "poblacion" ; $maestro["poblaciones"]["poblacion"]["tipo"] = "varchar(50)" ; $maestro["poblaciones"]["poblacion"]["extra"] = "" ;
$maestro["poblaciones"]["idprov"]["nombrecampo"] = "idprov" ; $maestro["poblaciones"]["idprov"]["tipo"] = "int(11)" ; $maestro["poblaciones"]["idprov"]["extra"] = "" ;
$maestro["poblaciones"]["idpais"]["nombrecampo"] = "idpais" ; $maestro["poblaciones"]["idpais"]["tipo"] = "int(11)" ; $maestro["poblaciones"]["idpais"]["extra"] = "" ;

$maestro["pos_terminales"]["id"]["nombrecampo"] = "id" ; $maestro["pos_terminales"]["id"]["tipo"] = "int(11)" ; $maestro["pos_terminales"]["id"]["extra"] = "auto_increment" ;
$maestro["pos_terminales"]["idtienda"]["nombrecampo"] = "idtienda" ; $maestro["pos_terminales"]["idtienda"]["tipo"] = "int(11)" ; $maestro["pos_terminales"]["idtienda"]["extra"] = "" ;
$maestro["pos_terminales"]["idalmacen"]["nombrecampo"] = "idalmacen" ; $maestro["pos_terminales"]["idalmacen"]["tipo"] = "int(11)" ; $maestro["pos_terminales"]["idalmacen"]["extra"] = "" ;
$maestro["pos_terminales"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["pos_terminales"]["descripcion"]["tipo"] = "varchar(50)" ; $maestro["pos_terminales"]["descripcion"]["extra"] = "" ;

$maestro["printjobs"]["id"]["nombrecampo"] = "id" ; $maestro["printjobs"]["id"]["tipo"] = "int(11)" ; $maestro["printjobs"]["id"]["extra"] = "auto_increment" ;
$maestro["printjobs"]["idprinter"]["nombrecampo"] = "idprinter" ; $maestro["printjobs"]["idprinter"]["tipo"] = "int(11)" ; $maestro["printjobs"]["idprinter"]["extra"] = "" ;
$maestro["printjobs"]["printfile"]["nombrecampo"] = "printfile" ; $maestro["printjobs"]["printfile"]["tipo"] = "varchar(50)" ; $maestro["printjobs"]["printfile"]["extra"] = "" ;
$maestro["printjobs"]["idtipo"]["nombrecampo"] = "idtipo" ; $maestro["printjobs"]["idtipo"]["tipo"] = "int(11)" ; $maestro["printjobs"]["idtipo"]["extra"] = "" ;
$maestro["printjobs"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["printjobs"]["iduser"]["tipo"] = "int(11)" ; $maestro["printjobs"]["iduser"]["extra"] = "" ;
$maestro["printjobs"]["display"]["nombrecampo"] = "display" ; $maestro["printjobs"]["display"]["tipo"] = "varchar(50)" ; $maestro["printjobs"]["display"]["extra"] = "" ;
$maestro["printjobs"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["printjobs"]["fecha"]["tipo"] = "timestamp" ; $maestro["printjobs"]["fecha"]["extra"] = "" ;

$maestro["productos"]["id"]["nombrecampo"] = "id" ; $maestro["productos"]["id"]["tipo"] = "int(11)" ; $maestro["productos"]["id"]["extra"] = "auto_increment" ;
$maestro["productos"]["activo"]["nombrecampo"] = "activo" ; $maestro["productos"]["activo"]["tipo"] = "int(11)" ; $maestro["productos"]["activo"]["extra"] = "" ;
$maestro["productos"]["codventa"]["nombrecampo"] = "codventa" ; $maestro["productos"]["codventa"]["tipo"] = "varchar(10)" ; $maestro["productos"]["codventa"]["extra"] = "" ;
$maestro["productos"]["concepto"]["nombrecampo"] = "concepto" ; $maestro["productos"]["concepto"]["tipo"] = "varchar(50)" ; $maestro["productos"]["concepto"]["extra"] = "" ;
$maestro["productos"]["stock_ctrl"]["nombrecampo"] = "stock_ctrl" ; $maestro["productos"]["stock_ctrl"]["tipo"] = "int(11)" ; $maestro["productos"]["stock_ctrl"]["extra"] = "" ;
$maestro["productos"]["precio"]["nombrecampo"] = "precio" ; $maestro["productos"]["precio"]["tipo"] = "float" ; $maestro["productos"]["precio"]["extra"] = "" ;
$maestro["productos"]["id_fabricante"]["nombrecampo"] = "id_fabricante" ; $maestro["productos"]["id_fabricante"]["tipo"] = "int(11)" ; $maestro["productos"]["id_fabricante"]["extra"] = "" ;
$maestro["productos"]["id_tipoarticulo"]["nombrecampo"] = "id_tipoarticulo" ; $maestro["productos"]["id_tipoarticulo"]["tipo"] = "int(11)" ; $maestro["productos"]["id_tipoarticulo"]["extra"] = "" ;
$maestro["productos"]["preciotax"]["nombrecampo"] = "preciotax" ; $maestro["productos"]["preciotax"]["tipo"] = "float" ; $maestro["productos"]["preciotax"]["extra"] = "" ;
$maestro["productos"]["barcode"]["nombrecampo"] = "barcode" ; $maestro["productos"]["barcode"]["tipo"] = "varchar(50)" ; $maestro["productos"]["barcode"]["extra"] = "" ;
$maestro["productos"]["peso"]["nombrecampo"] = "peso" ; $maestro["productos"]["peso"]["tipo"] = "float" ; $maestro["productos"]["peso"]["extra"] = "" ;
$maestro["productos"]["profundidad"]["nombrecampo"] = "profundidad" ; $maestro["productos"]["profundidad"]["tipo"] = "float" ; $maestro["productos"]["profundidad"]["extra"] = "" ;
$maestro["productos"]["ancho"]["nombrecampo"] = "ancho" ; $maestro["productos"]["ancho"]["tipo"] = "float" ; $maestro["productos"]["ancho"]["extra"] = "" ;
$maestro["productos"]["alto"]["nombrecampo"] = "alto" ; $maestro["productos"]["alto"]["tipo"] = "float" ; $maestro["productos"]["alto"]["extra"] = "" ;
$maestro["productos"]["notas"]["nombrecampo"] = "notas" ; $maestro["productos"]["notas"]["tipo"] = "varchar(50)" ; $maestro["productos"]["notas"]["extra"] = "" ;

$maestro["productos_pro"]["id"]["nombrecampo"] = "id" ; $maestro["productos_pro"]["id"]["tipo"] = "int(11)" ; $maestro["productos_pro"]["id"]["extra"] = "auto_increment" ;
$maestro["productos_pro"]["idproduct"]["nombrecampo"] = "idproduct" ; $maestro["productos_pro"]["idproduct"]["tipo"] = "int(11)" ; $maestro["productos_pro"]["idproduct"]["extra"] = "" ;
$maestro["productos_pro"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["productos_pro"]["idtercero"]["tipo"] = "int(11)" ; $maestro["productos_pro"]["idtercero"]["extra"] = "" ;
$maestro["productos_pro"]["precio"]["nombrecampo"] = "precio" ; $maestro["productos_pro"]["precio"]["tipo"] = "float" ; $maestro["productos_pro"]["precio"]["extra"] = "" ;
$maestro["productos_pro"]["referencia"]["nombrecampo"] = "referencia" ; $maestro["productos_pro"]["referencia"]["tipo"] = "varchar(20)" ; $maestro["productos_pro"]["referencia"]["extra"] = "" ;
$maestro["productos_pro"]["ultactu"]["nombrecampo"] = "ultactu" ; $maestro["productos_pro"]["ultactu"]["tipo"] = "datetime" ; $maestro["productos_pro"]["ultactu"]["extra"] = "" ;

$maestro["productos_tax"]["id"]["nombrecampo"] = "id" ; $maestro["productos_tax"]["id"]["tipo"] = "int(11)" ; $maestro["productos_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["productos_tax"]["idproducto"]["nombrecampo"] = "idproducto" ; $maestro["productos_tax"]["idproducto"]["tipo"] = "int(11)" ; $maestro["productos_tax"]["idproducto"]["extra"] = "" ;
$maestro["productos_tax"]["idtax"]["nombrecampo"] = "idtax" ; $maestro["productos_tax"]["idtax"]["tipo"] = "int(11)" ; $maestro["productos_tax"]["idtax"]["extra"] = "" ;
$maestro["productos_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["productos_tax"]["valor"]["tipo"] = "float" ; $maestro["productos_tax"]["valor"]["extra"] = "" ;

$maestro["productos_tipo"]["id"]["nombrecampo"] = "id" ; $maestro["productos_tipo"]["id"]["tipo"] = "int(11)" ; $maestro["productos_tipo"]["id"]["extra"] = "auto_increment" ;
$maestro["productos_tipo"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["productos_tipo"]["tipo"]["tipo"] = "varchar(50)" ; $maestro["productos_tipo"]["tipo"]["extra"] = "" ;

$maestro["productos_wh"]["id"]["nombrecampo"] = "id" ; $maestro["productos_wh"]["id"]["tipo"] = "int(11)" ; $maestro["productos_wh"]["id"]["extra"] = "auto_increment" ;
$maestro["productos_wh"]["idproducto"]["nombrecampo"] = "idproducto" ; $maestro["productos_wh"]["idproducto"]["tipo"] = "int(11)" ; $maestro["productos_wh"]["idproducto"]["extra"] = "" ;
$maestro["productos_wh"]["idwh"]["nombrecampo"] = "idwh" ; $maestro["productos_wh"]["idwh"]["tipo"] = "int(11)" ; $maestro["productos_wh"]["idwh"]["extra"] = "" ;
$maestro["productos_wh"]["stock"]["nombrecampo"] = "stock" ; $maestro["productos_wh"]["stock"]["tipo"] = "int(11)" ; $maestro["productos_wh"]["stock"]["extra"] = "" ;

$maestro["provincias"]["id"]["nombrecampo"] = "id" ; $maestro["provincias"]["id"]["tipo"] = "int(11)" ; $maestro["provincias"]["id"]["extra"] = "auto_increment" ;
$maestro["provincias"]["idpais"]["nombrecampo"] = "idpais" ; $maestro["provincias"]["idpais"]["tipo"] = "int(11)" ; $maestro["provincias"]["idpais"]["extra"] = "" ;
$maestro["provincias"]["provincia"]["nombrecampo"] = "provincia" ; $maestro["provincias"]["provincia"]["tipo"] = "varchar(50)" ; $maestro["provincias"]["provincia"]["extra"] = "" ;


$maestro["pc"]["id"]["nombrecampo"] = "id" ; $maestro["pc"]["id"]["tipo"] = "int(11)" ; $maestro["pc"]["id"]["extra"] = "auto_increment" ;
$maestro["pc"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["pc"]["idserie"]["tipo"] = "int(11)" ; $maestro["pc"]["idserie"]["extra"] = "" ;
$maestro["pc"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["pc"]["codigoint"]["tipo"] = "int(11)" ; $maestro["pc"]["codigoint"]["extra"] = "" ;
$maestro["pc"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["pc"]["codigo"]["tipo"] = "varchar(10)" ; $maestro["pc"]["codigo"]["extra"] = "" ;
$maestro["pc"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["pc"]["idtercero"]["tipo"] = "int(11)" ; $maestro["pc"]["idtercero"]["extra"] = "" ;
$maestro["pc"]["estado"]["nombrecampo"] = "estado" ; $maestro["pc"]["estado"]["tipo"] = "int(11)" ; $maestro["pc"]["estado"]["extra"] = "" ;
$maestro["pc"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["pc"]["fecha"]["tipo"] = "date" ; $maestro["pc"]["fecha"]["extra"] = "" ;
$maestro["pc"]["vencimiento"]["nombrecampo"] = "vencimiento" ; $maestro["pc"]["vencimiento"]["tipo"] = "date" ; $maestro["pc"]["vencimiento"]["extra"] = "" ;
$maestro["pc"]["idusuario"]["nombrecampo"] = "idusuario" ; $maestro["pc"]["idusuario"]["tipo"] = "int(11)" ; $maestro["pc"]["idusuario"]["extra"] = "" ;
$maestro["pc"]["pagado"]["nombrecampo"] = "pagado" ; $maestro["pc"]["pagado"]["tipo"] = "float" ; $maestro["pc"]["pagado"]["extra"] = "" ;
$maestro["pc"]["editfv"]["nombrecampo"] = "editfv" ; $maestro["pc"]["editfv"]["tipo"] = "int(11)" ; $maestro["pc"]["editfv"]["extra"] = "" ;
$maestro["pc"]["factura"]["nombrecampo"] = "factura" ; $maestro["pc"]["factura"]["tipo"] = "varchar(20)" ; $maestro["pc"]["factura"]["extra"] = "" ;
$maestro["pc"]["pc_cp"]["nombrecampo"] = "pc_cp" ; $maestro["pc"]["pc_cp"]["tipo"] = "int(11)" ; $maestro["pc"]["pc_cp"]["extra"] = "" ;
$maestro["pc"]["pc_dp"]["nombrecampo"] = "pc_dp" ; $maestro["pc"]["pc_dp"]["tipo"] = "int(11)" ; $maestro["pc"]["pc_dp"]["extra"] = "" ;

$maestro["pc_lineas"]["id"]["nombrecampo"] = "id" ; $maestro["pc_lineas"]["id"]["tipo"] = "int(11)" ; $maestro["pc_lineas"]["id"]["extra"] = "auto_increment" ;
$maestro["pc_lineas"]["idpc"]["nombrecampo"] = "idpc" ; $maestro["pc_lineas"]["idpc"]["tipo"] = "int(11)" ; $maestro["pc_lineas"]["idpc"]["extra"] = "" ;
$maestro["pc_lineas"]["cod"]["nombrecampo"] = "cod" ; $maestro["pc_lineas"]["cod"]["tipo"] = "varchar(20)" ; $maestro["pc_lineas"]["cod"]["extra"] = "" ;
$maestro["pc_lineas"]["concepto"]["nombrecampo"] = "concepto" ; $maestro["pc_lineas"]["concepto"]["tipo"] = "varchar(250)" ; $maestro["pc_lineas"]["concepto"]["extra"] = "" ;
$maestro["pc_lineas"]["unid"]["nombrecampo"] = "unid" ; $maestro["pc_lineas"]["unid"]["tipo"] = "int(11)" ; $maestro["pc_lineas"]["unid"]["extra"] = "" ;
$maestro["pc_lineas"]["precio"]["nombrecampo"] = "precio" ; $maestro["pc_lineas"]["precio"]["tipo"] = "float" ; $maestro["pc_lineas"]["precio"]["extra"] = "" ;
$maestro["pc_lineas"]["dto"]["nombrecampo"] = "dto" ; $maestro["pc_lineas"]["dto"]["tipo"] = "int(11)" ; $maestro["pc_lineas"]["dto"]["extra"] = "" ;
$maestro["pc_lineas"]["importe"]["nombrecampo"] = "importe" ; $maestro["pc_lineas"]["importe"]["tipo"] = "float" ; $maestro["pc_lineas"]["importe"]["extra"] = "" ;
$maestro["pc_lineas"]["orden"]["nombrecampo"] = "orden" ; $maestro["pc_lineas"]["orden"]["tipo"] = "int(11)" ; $maestro["pc_lineas"]["orden"]["extra"] = "" ;
$maestro["pc_lineas"]["exclufactu"]["nombrecampo"] = "exclufactu" ; $maestro["pc_lineas"]["exclufactu"]["tipo"] = "int(11)" ; $maestro["pc_lineas"]["exclufactu"]["extra"] = "" ;

$maestro["pc_lineas_tax"]["id"]["nombrecampo"] = "id" ; $maestro["pc_lineas_tax"]["id"]["tipo"] = "int(11)" ; $maestro["pc_lineas_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["pc_lineas_tax"]["idpc"]["nombrecampo"] = "idpc" ; $maestro["pc_lineas_tax"]["idpc"]["tipo"] = "int(11)" ; $maestro["pc_lineas_tax"]["idpc"]["extra"] = "" ;
$maestro["pc_lineas_tax"]["idpclinea"]["nombrecampo"] = "idpclinea" ; $maestro["pc_lineas_tax"]["idpclinea"]["tipo"] = "int(11)" ; $maestro["pc_lineas_tax"]["idpclinea"]["extra"] = "" ;
$maestro["pc_lineas_tax"]["idtax"]["nombrecampo"] = "idtax" ; $maestro["pc_lineas_tax"]["idtax"]["tipo"] = "int(11)" ; $maestro["pc_lineas_tax"]["idtax"]["extra"] = "" ;
$maestro["pc_lineas_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["pc_lineas_tax"]["valor"]["tipo"] = "float" ; $maestro["pc_lineas_tax"]["valor"]["extra"] = "" ;
$maestro["pc_lineas_tax"]["importe"]["nombrecampo"] = "importe" ; $maestro["pc_lineas_tax"]["importe"]["tipo"] = "float" ; $maestro["pc_lineas_tax"]["importe"]["extra"] = "" ;

$maestro["pc_pagos"]["id"]["nombrecampo"] = "id" ; $maestro["pc_pagos"]["id"]["tipo"] = "int(11)" ; $maestro["pc_pagos"]["id"]["extra"] = "auto_increment" ;
$maestro["pc_pagos"]["idpc"]["nombrecampo"] = "idpc" ; $maestro["pc_pagos"]["idpc"]["tipo"] = "int(11)" ; $maestro["pc_pagos"]["idpc"]["extra"] = "" ;
$maestro["pc_pagos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["pc_pagos"]["fecha"]["tipo"] = "date" ; $maestro["pc_pagos"]["fecha"]["extra"] = "" ;
$maestro["pc_pagos"]["importe"]["nombrecampo"] = "importe" ; $maestro["pc_pagos"]["importe"]["tipo"] = "float" ; $maestro["pc_pagos"]["importe"]["extra"] = "" ;
$maestro["pc_pagos"]["idfpago"]["nombrecampo"] = "idfpago" ; $maestro["pc_pagos"]["idfpago"]["tipo"] = "int(11)" ; $maestro["pc_pagos"]["idfpago"]["extra"] = "" ;
$maestro["pc_pagos"]["idcpago"]["nombrecampo"] = "idcpago" ; $maestro["pc_pagos"]["idcpago"]["tipo"] = "int(11)" ; $maestro["pc_pagos"]["idcpago"]["extra"] = "" ;

$maestro["pc_sn"]["id"]["nombrecampo"] = "id" ; $maestro["pc_sn"]["id"]["tipo"] = "int(11)" ; $maestro["pc_sn"]["id"]["extra"] = "auto_increment" ;
$maestro["pc_sn"]["idpc"]["nombrecampo"] = "idpc" ; $maestro["pc_sn"]["idpc"]["tipo"] = "int(11)" ; $maestro["pc_sn"]["idpc"]["extra"] = "" ;
$maestro["pc_sn"]["idlinea"]["nombrecampo"] = "idlinea" ; $maestro["pc_sn"]["idlinea"]["tipo"] = "int(11)" ; $maestro["pc_sn"]["idlinea"]["extra"] = "" ;
$maestro["pc_sn"]["sn"]["nombrecampo"] = "sn" ; $maestro["pc_sn"]["sn"]["tipo"] = "varchar(50)" ; $maestro["pc_sn"]["sn"]["extra"] = "" ;
$maestro["pc_sn"]["pn"]["nombrecampo"] = "pn" ; $maestro["pc_sn"]["pn"]["tipo"] = "varchar(50)" ; $maestro["pc_sn"]["pn"]["extra"] = "" ;
$maestro["pc_sn"]["otro"]["nombrecampo"] = "otro" ; $maestro["pc_sn"]["otro"]["tipo"] = "varchar(50)" ; $maestro["pc_sn"]["otro"]["extra"] = "" ;

$maestro["pc_tax"]["id"]["nombrecampo"] = "id" ; $maestro["pc_tax"]["id"]["tipo"] = "int(11)" ; $maestro["pc_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["pc_tax"]["idpc"]["nombrecampo"] = "idpc" ; $maestro["pc_tax"]["idpc"]["tipo"] = "int(11)" ; $maestro["pc_tax"]["idpc"]["extra"] = "" ;
$maestro["pc_tax"]["idimpuesto"]["nombrecampo"] = "idimpuesto" ; $maestro["pc_tax"]["idimpuesto"]["tipo"] = "int(11)" ; $maestro["pc_tax"]["idimpuesto"]["extra"] = "" ;
$maestro["pc_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["pc_tax"]["valor"]["tipo"] = "int(11)" ; $maestro["pc_tax"]["valor"]["extra"] = "" ;


$maestro["pv"]["id"]["nombrecampo"] = "id" ; $maestro["pv"]["id"]["tipo"] = "int(11)" ; $maestro["pv"]["id"]["extra"] = "auto_increment" ;
$maestro["pv"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["pv"]["idserie"]["tipo"] = "int(11)" ; $maestro["pv"]["idserie"]["extra"] = "" ;
$maestro["pv"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["pv"]["codigoint"]["tipo"] = "int(11)" ; $maestro["pv"]["codigoint"]["extra"] = "" ;
$maestro["pv"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["pv"]["codigo"]["tipo"] = "varchar(10)" ; $maestro["pv"]["codigo"]["extra"] = "" ;
$maestro["pv"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["pv"]["idtercero"]["tipo"] = "int(11)" ; $maestro["pv"]["idtercero"]["extra"] = "" ;
$maestro["pv"]["estado"]["nombrecampo"] = "estado" ; $maestro["pv"]["estado"]["tipo"] = "int(11)" ; $maestro["pv"]["estado"]["extra"] = "" ;
$maestro["pv"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["pv"]["fecha"]["tipo"] = "date" ; $maestro["pv"]["fecha"]["extra"] = "" ;
$maestro["pv"]["vencimiento"]["nombrecampo"] = "vencimiento" ; $maestro["pv"]["vencimiento"]["tipo"] = "date" ; $maestro["pv"]["vencimiento"]["extra"] = "" ;
$maestro["pv"]["idusuario"]["nombrecampo"] = "idusuario" ; $maestro["pv"]["idusuario"]["tipo"] = "int(11)" ; $maestro["pv"]["idusuario"]["extra"] = "" ;
$maestro["pv"]["pagado"]["nombrecampo"] = "pagado" ; $maestro["pv"]["pagado"]["tipo"] = "float" ; $maestro["pv"]["pagado"]["extra"] = "" ;
$maestro["pv"]["editfv"]["nombrecampo"] = "editfv" ; $maestro["pv"]["editfv"]["tipo"] = "int(11)" ; $maestro["pv"]["editfv"]["extra"] = "" ;
$maestro["pv"]["pc_cp"]["nombrecampo"] = "pc_cp" ; $maestro["pv"]["pc_cp"]["tipo"] = "int(11)" ; $maestro["pv"]["pc_cp"]["extra"] = "" ;
$maestro["pv"]["pc_dp"]["nombrecampo"] = "pc_dp" ; $maestro["pv"]["pc_dp"]["tipo"] = "int(11)" ; $maestro["pv"]["pc_dp"]["extra"] = "" ;

$maestro["pv_lineas"]["id"]["nombrecampo"] = "id" ; $maestro["pv_lineas"]["id"]["tipo"] = "int(11)" ; $maestro["pv_lineas"]["id"]["extra"] = "auto_increment" ;
$maestro["pv_lineas"]["idpv"]["nombrecampo"] = "idpv" ; $maestro["pv_lineas"]["idpv"]["tipo"] = "int(11)" ; $maestro["pv_lineas"]["idpv"]["extra"] = "" ;
$maestro["pv_lineas"]["cod"]["nombrecampo"] = "cod" ; $maestro["pv_lineas"]["cod"]["tipo"] = "varchar(20)" ; $maestro["pv_lineas"]["cod"]["extra"] = "" ;
$maestro["pv_lineas"]["concepto"]["nombrecampo"] = "concepto" ; $maestro["pv_lineas"]["concepto"]["tipo"] = "varchar(250)" ; $maestro["pv_lineas"]["concepto"]["extra"] = "" ;
$maestro["pv_lineas"]["unid"]["nombrecampo"] = "unid" ; $maestro["pv_lineas"]["unid"]["tipo"] = "int(11)" ; $maestro["pv_lineas"]["unid"]["extra"] = "" ;
$maestro["pv_lineas"]["precio"]["nombrecampo"] = "precio" ; $maestro["pv_lineas"]["precio"]["tipo"] = "float" ; $maestro["pv_lineas"]["precio"]["extra"] = "" ;
$maestro["pv_lineas"]["dto"]["nombrecampo"] = "dto" ; $maestro["pv_lineas"]["dto"]["tipo"] = "int(11)" ; $maestro["pv_lineas"]["dto"]["extra"] = "" ;
$maestro["pv_lineas"]["importe"]["nombrecampo"] = "importe" ; $maestro["pv_lineas"]["importe"]["tipo"] = "float" ; $maestro["pv_lineas"]["importe"]["extra"] = "" ;
$maestro["pv_lineas"]["orden"]["nombrecampo"] = "orden" ; $maestro["pv_lineas"]["orden"]["tipo"] = "int(11)" ; $maestro["pv_lineas"]["orden"]["extra"] = "" ;
$maestro["pv_lineas"]["exclufactu"]["nombrecampo"] = "exclufactu" ; $maestro["pv_lineas"]["exclufactu"]["tipo"] = "int(11)" ; $maestro["pv_lineas"]["exclufactu"]["extra"] = "" ;

$maestro["pv_lineas_tax"]["id"]["nombrecampo"] = "id" ; $maestro["pv_lineas_tax"]["id"]["tipo"] = "int(11)" ; $maestro["pv_lineas_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["pv_lineas_tax"]["idpv"]["nombrecampo"] = "idpv" ; $maestro["pv_lineas_tax"]["idpv"]["tipo"] = "int(11)" ; $maestro["pv_lineas_tax"]["idpv"]["extra"] = "" ;
$maestro["pv_lineas_tax"]["idpvlinea"]["nombrecampo"] = "idpvlinea" ; $maestro["pv_lineas_tax"]["idpvlinea"]["tipo"] = "int(11)" ; $maestro["pv_lineas_tax"]["idpvlinea"]["extra"] = "" ;
$maestro["pv_lineas_tax"]["idtax"]["nombrecampo"] = "idtax" ; $maestro["pv_lineas_tax"]["idtax"]["tipo"] = "int(11)" ; $maestro["pv_lineas_tax"]["idtax"]["extra"] = "" ;
$maestro["pv_lineas_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["pv_lineas_tax"]["valor"]["tipo"] = "float" ; $maestro["pv_lineas_tax"]["valor"]["extra"] = "" ;
$maestro["pv_lineas_tax"]["importe"]["nombrecampo"] = "importe" ; $maestro["pv_lineas_tax"]["importe"]["tipo"] = "float" ; $maestro["pv_lineas_tax"]["importe"]["extra"] = "" ;

$maestro["pv_pagos"]["id"]["nombrecampo"] = "id" ; $maestro["pv_pagos"]["id"]["tipo"] = "int(11)" ; $maestro["pv_pagos"]["id"]["extra"] = "auto_increment" ;
$maestro["pv_pagos"]["idpv"]["nombrecampo"] = "idpv" ; $maestro["pv_pagos"]["idpv"]["tipo"] = "int(11)" ; $maestro["pv_pagos"]["idpv"]["extra"] = "" ;
$maestro["pv_pagos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["pv_pagos"]["fecha"]["tipo"] = "date" ; $maestro["pv_pagos"]["fecha"]["extra"] = "" ;
$maestro["pv_pagos"]["importe"]["nombrecampo"] = "importe" ; $maestro["pv_pagos"]["importe"]["tipo"] = "float" ; $maestro["pv_pagos"]["importe"]["extra"] = "" ;
$maestro["pv_pagos"]["idfpago"]["nombrecampo"] = "idfpago" ; $maestro["pv_pagos"]["idfpago"]["tipo"] = "int(11)" ; $maestro["pv_pagos"]["idfpago"]["extra"] = "" ;
$maestro["pv_pagos"]["idcpago"]["nombrecampo"] = "idcpago" ; $maestro["pv_pagos"]["idcpago"]["tipo"] = "int(11)" ; $maestro["pv_pagos"]["idcpago"]["extra"] = "" ;

$maestro["pv_sn"]["id"]["nombrecampo"] = "id" ; $maestro["pv_sn"]["id"]["tipo"] = "int(11)" ; $maestro["pv_sn"]["id"]["extra"] = "auto_increment" ;
$maestro["pv_sn"]["idpv"]["nombrecampo"] = "idpv" ; $maestro["pv_sn"]["idpv"]["tipo"] = "int(11)" ; $maestro["pv_sn"]["idpv"]["extra"] = "" ;
$maestro["pv_sn"]["idlinea"]["nombrecampo"] = "idlinea" ; $maestro["pv_sn"]["idlinea"]["tipo"] = "int(11)" ; $maestro["pv_sn"]["idlinea"]["extra"] = "" ;
$maestro["pv_sn"]["sn"]["nombrecampo"] = "sn" ; $maestro["pv_sn"]["sn"]["tipo"] = "varchar(50)" ; $maestro["pv_sn"]["sn"]["extra"] = "" ;
$maestro["pv_sn"]["pn"]["nombrecampo"] = "pn" ; $maestro["pv_sn"]["pn"]["tipo"] = "varchar(50)" ; $maestro["pv_sn"]["pn"]["extra"] = "" ;
$maestro["pv_sn"]["otro"]["nombrecampo"] = "otro" ; $maestro["pv_sn"]["otro"]["tipo"] = "varchar(50)" ; $maestro["pv_sn"]["otro"]["extra"] = "" ;

$maestro["pv_tax"]["id"]["nombrecampo"] = "id" ; $maestro["pv_tax"]["id"]["tipo"] = "int(11)" ; $maestro["pv_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["pv_tax"]["idpv"]["nombrecampo"] = "idpv" ; $maestro["pv_tax"]["idpv"]["tipo"] = "int(11)" ; $maestro["pv_tax"]["idpv"]["extra"] = "" ;
$maestro["pv_tax"]["idimpuesto"]["nombrecampo"] = "idimpuesto" ; $maestro["pv_tax"]["idimpuesto"]["tipo"] = "int(11)" ; $maestro["pv_tax"]["idimpuesto"]["extra"] = "" ;
$maestro["pv_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["pv_tax"]["valor"]["tipo"] = "int(11)" ; $maestro["pv_tax"]["valor"]["extra"] = "" ;

$maestro["router"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["router"]["idempresa"]["tipo"] = "int(11)" ; $maestro["router"]["idempresa"]["extra"] = "" ;
$maestro["router"]["opcion"]["nombrecampo"] = "opcion" ; $maestro["router"]["opcion"]["tipo"] = "varchar(50)" ; $maestro["router"]["opcion"]["extra"] = "" ;
$maestro["router"]["valor"]["nombrecampo"] = "valor" ; $maestro["router"]["valor"]["tipo"] = "varchar(250)" ; $maestro["router"]["valor"]["extra"] = "" ;

$maestro["screens"]["id"]["nombrecampo"] = "id" ; $maestro["screens"]["id"]["tipo"] = "int(11)" ; $maestro["screens"]["id"]["extra"] = "auto_increment" ;
$maestro["screens"]["screen"]["nombrecampo"] = "screen" ; $maestro["screens"]["screen"]["tipo"] = "varchar(10)" ; $maestro["screens"]["screen"]["extra"] = "" ;
$maestro["screens"]["display"]["nombrecampo"] = "display" ; $maestro["screens"]["display"]["tipo"] = "varchar(50)" ; $maestro["screens"]["display"]["extra"] = "" ;
$maestro["screens"]["url"]["nombrecampo"] = "url" ; $maestro["screens"]["url"]["tipo"] = "varchar(100)" ; $maestro["screens"]["url"]["extra"] = "" ;

$maestro["series"]["id"]["nombrecampo"] = "id" ; $maestro["series"]["id"]["tipo"] = "int(11)" ; $maestro["series"]["id"]["extra"] = "auto_increment" ;
$maestro["series"]["cv"]["nombrecampo"] = "cv" ; $maestro["series"]["cv"]["tipo"] = "int(11)" ; $maestro["series"]["cv"]["extra"] = "" ;
$maestro["series"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["series"]["tipo"]["tipo"] = "varchar(10)" ; $maestro["series"]["tipo"]["extra"] = "" ;
$maestro["series"]["serie"]["nombrecampo"] = "serie" ; $maestro["series"]["serie"]["tipo"] = "varchar(20)" ; $maestro["series"]["serie"]["extra"] = "" ;
$maestro["series"]["activo"]["nombrecampo"] = "activo" ; $maestro["series"]["activo"]["tipo"] = "int(11)" ; $maestro["series"]["activo"]["extra"] = "" ;
$maestro["series"]["dft"]["nombrecampo"] = "dft" ; $maestro["series"]["dft"]["tipo"] = "int(11)" ; $maestro["series"]["dft"]["extra"] = "" ;
$maestro["series"]["nota"]["nombrecampo"] = "nota" ; $maestro["series"]["nota"]["tipo"] = "varchar(50)" ; $maestro["series"]["nota"]["extra"] = "" ;
$maestro["series"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["series"]["idempresa"]["tipo"] = "int(11)" ; $maestro["series"]["idempresa"]["extra"] = "" ;
$maestro["series"]["colormes1"]["nombrecampo"] = "colormes1" ; $maestro["series"]["colormes1"]["tipo"] = "varchar(10)" ; $maestro["series"]["colormes1"]["extra"] = "" ;
$maestro["series"]["colormes2"]["nombrecampo"] = "colormes2" ; $maestro["series"]["colormes2"]["tipo"] = "varchar(10)" ; $maestro["series"]["colormes2"]["extra"] = "" ;
$maestro["series"]["colormes3"]["nombrecampo"] = "colormes3" ; $maestro["series"]["colormes3"]["tipo"] = "varchar(10)" ; $maestro["series"]["colormes3"]["extra"] = "" ;
$maestro["series"]["colormes4"]["nombrecampo"] = "colormes4" ; $maestro["series"]["colormes4"]["tipo"] = "varchar(10)" ; $maestro["series"]["colormes4"]["extra"] = "" ;
$maestro["series"]["colormes5"]["nombrecampo"] = "colormes5" ; $maestro["series"]["colormes5"]["tipo"] = "varchar(10)" ; $maestro["series"]["colormes5"]["extra"] = "" ;
$maestro["series"]["colormes6"]["nombrecampo"] = "colormes6" ; $maestro["series"]["colormes6"]["tipo"] = "varchar(10)" ; $maestro["series"]["colormes6"]["extra"] = "" ;
$maestro["series"]["colormes7"]["nombrecampo"] = "colormes7" ; $maestro["series"]["colormes7"]["tipo"] = "varchar(10)" ; $maestro["series"]["colormes7"]["extra"] = "" ;
$maestro["series"]["colormes8"]["nombrecampo"] = "colormes8" ; $maestro["series"]["colormes8"]["tipo"] = "varchar(10)" ; $maestro["series"]["colormes8"]["extra"] = "" ;
$maestro["series"]["colormes9"]["nombrecampo"] = "colormes9" ; $maestro["series"]["colormes9"]["tipo"] = "varchar(10)" ; $maestro["series"]["colormes9"]["extra"] = "" ;
$maestro["series"]["colormes10"]["nombrecampo"] = "colormes10" ; $maestro["series"]["colormes10"]["tipo"] = "varchar(10)" ; $maestro["series"]["colormes10"]["extra"] = "" ;
$maestro["series"]["colormes11"]["nombrecampo"] = "colormes11" ; $maestro["series"]["colormes11"]["tipo"] = "varchar(10)" ; $maestro["series"]["colormes11"]["extra"] = "" ;
$maestro["series"]["colormes12"]["nombrecampo"] = "colormes12" ; $maestro["series"]["colormes12"]["tipo"] = "varchar(10)" ; $maestro["series"]["colormes12"]["extra"] = "" ;
$maestro["series"]["stock"]["nombrecampo"] = "stock" ; $maestro["series"]["stock"]["tipo"] = "int(11)" ; $maestro["series"]["stock"]["extra"] = "" ;

$maestro["sync_terceros"]["lnx_id"]["nombrecampo"] = "lnx_id" ; $maestro["sync_terceros"]["lnx_id"]["tipo"] = "int(11)" ; $maestro["sync_terceros"]["lnx_id"]["extra"] = "" ;
$maestro["sync_terceros"]["doli_id"]["nombrecampo"] = "doli_id" ; $maestro["sync_terceros"]["doli_id"]["tipo"] = "int(11)" ; $maestro["sync_terceros"]["doli_id"]["extra"] = "" ;
$maestro["sync_terceros"]["codcli"]["nombrecampo"] = "codcli" ; $maestro["sync_terceros"]["codcli"]["tipo"] = "varchar(50)" ; $maestro["sync_terceros"]["codcli"]["extra"] = "" ;
$maestro["sync_terceros"]["codpro"]["nombrecampo"] = "codpro" ; $maestro["sync_terceros"]["codpro"]["tipo"] = "varchar(50)" ; $maestro["sync_terceros"]["codpro"]["extra"] = "" ;

$maestro["tarifas"]["id"]["nombrecampo"] = "id" ; $maestro["tarifas"]["id"]["tipo"] = "int(11)" ; $maestro["tarifas"]["id"]["extra"] = "auto_increment" ;
$maestro["tarifas"]["tarifa"]["nombrecampo"] = "tarifa" ; $maestro["tarifas"]["tarifa"]["tipo"] = "varchar(20)" ; $maestro["tarifas"]["tarifa"]["extra"] = "" ;

$maestro["terceros"]["id"]["nombrecampo"] = "id" ; $maestro["terceros"]["id"]["tipo"] = "int(11)" ; $maestro["terceros"]["id"]["extra"] = "auto_increment" ;
$maestro["terceros"]["razonsocial"]["nombrecampo"] = "razonsocial" ; $maestro["terceros"]["razonsocial"]["tipo"] = "varchar(50)" ; $maestro["terceros"]["razonsocial"]["extra"] = "" ;
$maestro["terceros"]["nomcomercial"]["nombrecampo"] = "nomcomercial" ; $maestro["terceros"]["nomcomercial"]["tipo"] = "varchar(50)" ; $maestro["terceros"]["nomcomercial"]["extra"] = "" ;
$maestro["terceros"]["nif"]["nombrecampo"] = "nif" ; $maestro["terceros"]["nif"]["tipo"] = "varchar(15)" ; $maestro["terceros"]["nif"]["extra"] = "" ;
$maestro["terceros"]["tel"]["nombrecampo"] = "tel" ; $maestro["terceros"]["tel"]["tipo"] = "varchar(20)" ; $maestro["terceros"]["tel"]["extra"] = "" ;
$maestro["terceros"]["activo"]["nombrecampo"] = "activo" ; $maestro["terceros"]["activo"]["tipo"] = "int(11)" ; $maestro["terceros"]["activo"]["extra"] = "" ;
$maestro["terceros"]["codcli"]["nombrecampo"] = "codcli" ; $maestro["terceros"]["codcli"]["tipo"] = "int(11)" ; $maestro["terceros"]["codcli"]["extra"] = "" ;
$maestro["terceros"]["codpro"]["nombrecampo"] = "codpro" ; $maestro["terceros"]["codpro"]["tipo"] = "int(11)" ; $maestro["terceros"]["codpro"]["extra"] = "" ;
$maestro["terceros"]["dir"]["nombrecampo"] = "dir" ; $maestro["terceros"]["dir"]["tipo"] = "varchar(50)" ; $maestro["terceros"]["dir"]["extra"] = "" ;
$maestro["terceros"]["cp"]["nombrecampo"] = "cp" ; $maestro["terceros"]["cp"]["tipo"] = "varchar(10)" ; $maestro["terceros"]["cp"]["extra"] = "" ;
$maestro["terceros"]["pobla"]["nombrecampo"] = "pobla" ; $maestro["terceros"]["pobla"]["tipo"] = "varchar(50)" ; $maestro["terceros"]["pobla"]["extra"] = "" ;
$maestro["terceros"]["idprov"]["nombrecampo"] = "idprov" ; $maestro["terceros"]["idprov"]["tipo"] = "int(11)" ; $maestro["terceros"]["idprov"]["extra"] = "" ;
$maestro["terceros"]["idpais"]["nombrecampo"] = "idpais" ; $maestro["terceros"]["idpais"]["tipo"] = "int(11)" ; $maestro["terceros"]["idpais"]["extra"] = "" ;
$maestro["terceros"]["idtarifa"]["nombrecampo"] = "idtarifa" ; $maestro["terceros"]["idtarifa"]["tipo"] = "int(11)" ; $maestro["terceros"]["idtarifa"]["extra"] = "" ;
$maestro["terceros"]["codclipro"]["nombrecampo"] = "codclipro" ; $maestro["terceros"]["codclipro"]["tipo"] = "varchar(20)" ; $maestro["terceros"]["codclipro"]["extra"] = "" ;
$maestro["terceros"]["fechaalta"]["nombrecampo"] = "fechaalta" ; $maestro["terceros"]["fechaalta"]["tipo"] = "date" ; $maestro["terceros"]["fechaalta"]["extra"] = "" ;
$maestro["terceros"]["ncuenta"]["nombrecampo"] = "ncuenta" ; $maestro["terceros"]["ncuenta"]["tipo"] = "varchar(50)" ; $maestro["terceros"]["ncuenta"]["extra"] = "" ;
$maestro["terceros"]["notas"]["nombrecampo"] = "notas" ; $maestro["terceros"]["notas"]["tipo"] = "varchar(250)" ; $maestro["terceros"]["notas"]["extra"] = "" ;
$maestro["terceros"]["origen"]["nombrecampo"] = "origen" ; $maestro["terceros"]["origen"]["tipo"] = "varchar(20)" ; $maestro["terceros"]["origen"]["extra"] = "" ;
$maestro["terceros"]["email"]["nombrecampo"] = "email" ; $maestro["terceros"]["email"]["tipo"] = "varchar(100)" ; $maestro["terceros"]["email"]["extra"] = "" ;
$maestro["terceros"]["notaimp"]["nombrecampo"] = "notaimp" ; $maestro["terceros"]["notaimp"]["tipo"] = "varchar(250)" ; $maestro["terceros"]["notaimp"]["extra"] = "" ;
$maestro["terceros"]["idcomercial"]["nombrecampo"] = "idcomercial" ; $maestro["terceros"]["idcomercial"]["tipo"] = "int(11)" ; $maestro["terceros"]["idcomercial"]["extra"] = "" ;
$maestro["terceros"]["idtipotercero"]["nombrecampo"] = "idtipotercero" ; $maestro["terceros"]["idtipotercero"]["tipo"] = "int(11)" ; $maestro["terceros"]["idtipotercero"]["extra"] = "" ;
$maestro["terceros"]["idactividad"]["nombrecampo"] = "idactividad" ; $maestro["terceros"]["idactividad"]["tipo"] = "int(11)" ; $maestro["terceros"]["idactividad"]["extra"] = "" ;
$maestro["terceros"]["clifp"]["nombrecampo"] = "clifp" ; $maestro["terceros"]["clifp"]["tipo"] = "int(11)" ; $maestro["terceros"]["clifp"]["extra"] = "" ;
$maestro["terceros"]["clidp"]["nombrecampo"] = "clidp" ; $maestro["terceros"]["clidp"]["tipo"] = "int(11)" ; $maestro["terceros"]["clidp"]["extra"] = "" ;
$maestro["terceros"]["profp"]["nombrecampo"] = "profp" ; $maestro["terceros"]["profp"]["tipo"] = "int(11)" ; $maestro["terceros"]["profp"]["extra"] = "" ;
$maestro["terceros"]["prodp"]["nombrecampo"] = "prodp" ; $maestro["terceros"]["prodp"]["tipo"] = "int(11)" ; $maestro["terceros"]["prodp"]["extra"] = "" ;
$maestro["terceros"]["idzona"]["nombrecampo"] = "idzona" ; $maestro["terceros"]["idzona"]["tipo"] = "int(11)" ; $maestro["terceros"]["idzona"]["extra"] = "" ;

$maestro["terceros_lopd"]["id"]["nombrecampo"] = "id" ; $maestro["terceros_lopd"]["id"]["tipo"] = "int(11)" ; $maestro["terceros_lopd"]["id"]["extra"] = "auto_increment" ;
$maestro["terceros_lopd"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["terceros_lopd"]["idtercero"]["tipo"] = "int(11)" ; $maestro["terceros_lopd"]["idtercero"]["extra"] = "" ;
$maestro["terceros_lopd"]["campo"]["nombrecampo"] = "campo" ; $maestro["terceros_lopd"]["campo"]["tipo"] = "varchar(50)" ; $maestro["terceros_lopd"]["campo"]["extra"] = "" ;
$maestro["terceros_lopd"]["valor"]["nombrecampo"] = "valor" ; $maestro["terceros_lopd"]["valor"]["tipo"] = "varchar(50)" ; $maestro["terceros_lopd"]["valor"]["extra"] = "" ;

$maestro["terceros_lopd_cfg"]["id"]["nombrecampo"] = "id" ; $maestro["terceros_lopd_cfg"]["id"]["tipo"] = "int(11)" ; $maestro["terceros_lopd_cfg"]["id"]["extra"] = "auto_increment" ;
$maestro["terceros_lopd_cfg"]["campo"]["nombrecampo"] = "campo" ; $maestro["terceros_lopd_cfg"]["campo"]["tipo"] = "varchar(10)" ; $maestro["terceros_lopd_cfg"]["campo"]["extra"] = "" ;
$maestro["terceros_lopd_cfg"]["display"]["nombrecampo"] = "display" ; $maestro["terceros_lopd_cfg"]["display"]["tipo"] = "varchar(50)" ; $maestro["terceros_lopd_cfg"]["display"]["extra"] = "" ;
$maestro["terceros_lopd_cfg"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["terceros_lopd_cfg"]["tipo"]["tipo"] = "varchar(5)" ; $maestro["terceros_lopd_cfg"]["tipo"]["extra"] = "" ;

$maestro["terceros_lopd_files"]["id"]["nombrecampo"] = "id" ; $maestro["terceros_lopd_files"]["id"]["tipo"] = "int(11)" ; $maestro["terceros_lopd_files"]["id"]["extra"] = "auto_increment" ;
$maestro["terceros_lopd_files"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["terceros_lopd_files"]["idtercero"]["tipo"] = "int(11)" ; $maestro["terceros_lopd_files"]["idtercero"]["extra"] = "" ;
$maestro["terceros_lopd_files"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["terceros_lopd_files"]["idempresa"]["tipo"] = "int(11)" ; $maestro["terceros_lopd_files"]["idempresa"]["extra"] = "" ;
$maestro["terceros_lopd_files"]["idcatlopd"]["nombrecampo"] = "idcatlopd" ; $maestro["terceros_lopd_files"]["idcatlopd"]["tipo"] = "int(11)" ; $maestro["terceros_lopd_files"]["idcatlopd"]["extra"] = "" ;
$maestro["terceros_lopd_files"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["terceros_lopd_files"]["descripcion"]["tipo"] = "varchar(50)" ; $maestro["terceros_lopd_files"]["descripcion"]["extra"] = "" ;

$maestro["terceros_tipos"]["id"]["nombrecampo"] = "id" ; $maestro["terceros_tipos"]["id"]["tipo"] = "int(11)" ; $maestro["terceros_tipos"]["id"]["extra"] = "auto_increment" ;
$maestro["terceros_tipos"]["tipotercero"]["nombrecampo"] = "tipotercero" ; $maestro["terceros_tipos"]["tipotercero"]["tipo"] = "varchar(50)" ; $maestro["terceros_tipos"]["tipotercero"]["extra"] = "" ;

$maestro["terceros_vinc"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["terceros_vinc"]["idtercero"]["tipo"] = "int(11)" ; $maestro["terceros_vinc"]["idtercero"]["extra"] = "" ;
$maestro["terceros_vinc"]["idtercerob"]["nombrecampo"] = "idtercerob" ; $maestro["terceros_vinc"]["idtercerob"]["tipo"] = "int(11)" ; $maestro["terceros_vinc"]["idtercerob"]["extra"] = "" ;
$maestro["terceros_vinc"]["idvinc"]["nombrecampo"] = "idvinc" ; $maestro["terceros_vinc"]["idvinc"]["tipo"] = "int(11)" ; $maestro["terceros_vinc"]["idvinc"]["extra"] = "" ;
$maestro["terceros_vinc"]["vinclabel"]["nombrecampo"] = "vinclabel" ; $maestro["terceros_vinc"]["vinclabel"]["tipo"] = "varchar(1)" ; $maestro["terceros_vinc"]["vinclabel"]["extra"] = "" ;

$maestro["terceros_vinc_label"]["id"]["nombrecampo"] = "id" ; $maestro["terceros_vinc_label"]["id"]["tipo"] = "int(11)" ; $maestro["terceros_vinc_label"]["id"]["extra"] = "auto_increment" ;
$maestro["terceros_vinc_label"]["labela"]["nombrecampo"] = "labela" ; $maestro["terceros_vinc_label"]["labela"]["tipo"] = "varchar(50)" ; $maestro["terceros_vinc_label"]["labela"]["extra"] = "" ;
$maestro["terceros_vinc_label"]["labelb"]["nombrecampo"] = "labelb" ; $maestro["terceros_vinc_label"]["labelb"]["tipo"] = "varchar(50)" ; $maestro["terceros_vinc_label"]["labelb"]["extra"] = "" ;

$maestro["terceroscontactos"]["id"]["nombrecampo"] = "id" ; $maestro["terceroscontactos"]["id"]["tipo"] = "int(11)" ; $maestro["terceroscontactos"]["id"]["extra"] = "auto_increment" ;
$maestro["terceroscontactos"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["terceroscontactos"]["idtercero"]["tipo"] = "int(11)" ; $maestro["terceroscontactos"]["idtercero"]["extra"] = "" ;
$maestro["terceroscontactos"]["nombre"]["nombrecampo"] = "nombre" ; $maestro["terceroscontactos"]["nombre"]["tipo"] = "varchar(50)" ; $maestro["terceroscontactos"]["nombre"]["extra"] = "" ;
$maestro["terceroscontactos"]["tel"]["nombrecampo"] = "tel" ; $maestro["terceroscontactos"]["tel"]["tipo"] = "varchar(20)" ; $maestro["terceroscontactos"]["tel"]["extra"] = "" ;
$maestro["terceroscontactos"]["email"]["nombrecampo"] = "email" ; $maestro["terceroscontactos"]["email"]["tipo"] = "varchar(50)" ; $maestro["terceroscontactos"]["email"]["extra"] = "" ;
$maestro["terceroscontactos"]["ididioma"]["nombrecampo"] = "ididioma" ; $maestro["terceroscontactos"]["ididioma"]["tipo"] = "int(11)" ; $maestro["terceroscontactos"]["ididioma"]["extra"] = "" ;
$maestro["terceroscontactos"]["cargo"]["nombrecampo"] = "cargo" ; $maestro["terceroscontactos"]["cargo"]["tipo"] = "varchar(30)" ; $maestro["terceroscontactos"]["cargo"]["extra"] = "" ;
$maestro["terceroscontactos"]["lnxpublic"]["nombrecampo"] = "lnxpublic" ; $maestro["terceroscontactos"]["lnxpublic"]["tipo"] = "int(11)" ; $maestro["terceroscontactos"]["lnxpublic"]["extra"] = "" ;
$maestro["terceroscontactos"]["usuariopublic"]["nombrecampo"] = "usuariopublic" ; $maestro["terceroscontactos"]["usuariopublic"]["tipo"] = "varchar(20)" ; $maestro["terceroscontactos"]["usuariopublic"]["extra"] = "" ;
$maestro["terceroscontactos"]["contrasena"]["nombrecampo"] = "contrasena" ; $maestro["terceroscontactos"]["contrasena"]["tipo"] = "varchar(50)" ; $maestro["terceroscontactos"]["contrasena"]["extra"] = "" ;
$maestro["terceroscontactos"]["iddir"]["nombrecampo"] = "iddir" ; $maestro["terceroscontactos"]["iddir"]["tipo"] = "int(11)" ; $maestro["terceroscontactos"]["iddir"]["extra"] = "" ;
$maestro["terceroscontactos"]["lbltel2"]["nombrecampo"] = "lbltel2" ; $maestro["terceroscontactos"]["lbltel2"]["tipo"] = "varchar(20)" ; $maestro["terceroscontactos"]["lbltel2"]["extra"] = "" ;
$maestro["terceroscontactos"]["tel2"]["nombrecampo"] = "tel2" ; $maestro["terceroscontactos"]["tel2"]["tipo"] = "varchar(20)" ; $maestro["terceroscontactos"]["tel2"]["extra"] = "" ;
$maestro["terceroscontactos"]["lbltel3"]["nombrecampo"] = "lbltel3" ; $maestro["terceroscontactos"]["lbltel3"]["tipo"] = "varchar(20)" ; $maestro["terceroscontactos"]["lbltel3"]["extra"] = "" ;
$maestro["terceroscontactos"]["tel3"]["nombrecampo"] = "tel3" ; $maestro["terceroscontactos"]["tel3"]["tipo"] = "varchar(20)" ; $maestro["terceroscontactos"]["tel3"]["extra"] = "" ;
$maestro["terceroscontactos"]["activo"]["nombrecampo"] = "activo" ; $maestro["terceroscontactos"]["activo"]["tipo"] = "int(11)" ; $maestro["terceroscontactos"]["activo"]["extra"] = "" ;

$maestro["terceroscontacxtra"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["terceroscontacxtra"]["idtercero"]["tipo"] = "int(11)" ; $maestro["terceroscontacxtra"]["idtercero"]["extra"] = "" ;
$maestro["terceroscontacxtra"]["idcontacto"]["nombrecampo"] = "idcontacto" ; $maestro["terceroscontacxtra"]["idcontacto"]["tipo"] = "int(11)" ; $maestro["terceroscontacxtra"]["idcontacto"]["extra"] = "" ;
$maestro["terceroscontacxtra"]["tipocampo"]["nombrecampo"] = "tipocampo" ; $maestro["terceroscontacxtra"]["tipocampo"]["tipo"] = "int(11)" ; $maestro["terceroscontacxtra"]["tipocampo"]["extra"] = "" ;
$maestro["terceroscontacxtra"]["labelcampo"]["nombrecampo"] = "labelcampo" ; $maestro["terceroscontacxtra"]["labelcampo"]["tipo"] = "varchar(50)" ; $maestro["terceroscontacxtra"]["labelcampo"]["extra"] = "" ;
$maestro["terceroscontacxtra"]["valorcampo"]["nombrecampo"] = "valorcampo" ; $maestro["terceroscontacxtra"]["valorcampo"]["tipo"] = "varchar(50)" ; $maestro["terceroscontacxtra"]["valorcampo"]["extra"] = "" ;

$maestro["tercerosdir"]["id"]["nombrecampo"] = "id" ; $maestro["tercerosdir"]["id"]["tipo"] = "int(11)" ; $maestro["tercerosdir"]["id"]["extra"] = "auto_increment" ;
$maestro["tercerosdir"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["tercerosdir"]["idtercero"]["tipo"] = "int(11)" ; $maestro["tercerosdir"]["idtercero"]["extra"] = "" ;
$maestro["tercerosdir"]["referencia"]["nombrecampo"] = "referencia" ; $maestro["tercerosdir"]["referencia"]["tipo"] = "varchar(20)" ; $maestro["tercerosdir"]["referencia"]["extra"] = "" ;
$maestro["tercerosdir"]["dir"]["nombrecampo"] = "dir" ; $maestro["tercerosdir"]["dir"]["tipo"] = "varchar(50)" ; $maestro["tercerosdir"]["dir"]["extra"] = "" ;
$maestro["tercerosdir"]["cp"]["nombrecampo"] = "cp" ; $maestro["tercerosdir"]["cp"]["tipo"] = "varchar(5)" ; $maestro["tercerosdir"]["cp"]["extra"] = "" ;
$maestro["tercerosdir"]["pobla"]["nombrecampo"] = "pobla" ; $maestro["tercerosdir"]["pobla"]["tipo"] = "varchar(50)" ; $maestro["tercerosdir"]["pobla"]["extra"] = "" ;
$maestro["tercerosdir"]["idprov"]["nombrecampo"] = "idprov" ; $maestro["tercerosdir"]["idprov"]["tipo"] = "int(11)" ; $maestro["tercerosdir"]["idprov"]["extra"] = "" ;
$maestro["tercerosdir"]["idpais"]["nombrecampo"] = "idpais" ; $maestro["tercerosdir"]["idpais"]["tipo"] = "int(11)" ; $maestro["tercerosdir"]["idpais"]["extra"] = "" ;
$maestro["tercerosdir"]["tel"]["nombrecampo"] = "tel" ; $maestro["tercerosdir"]["tel"]["tipo"] = "varchar(15)" ; $maestro["tercerosdir"]["tel"]["extra"] = "" ;
$maestro["tercerosdir"]["activo"]["nombrecampo"] = "activo" ; $maestro["tercerosdir"]["activo"]["tipo"] = "int(11)" ; $maestro["tercerosdir"]["activo"]["extra"] = "" ;
$maestro["tercerosdir"]["notas"]["nombrecampo"] = "notas" ; $maestro["tercerosdir"]["notas"]["tipo"] = "varchar(250)" ; $maestro["tercerosdir"]["notas"]["extra"] = "" ;

$maestro["tiendas"]["id"]["nombrecampo"] = "id" ; $maestro["tiendas"]["id"]["tipo"] = "int(11)" ; $maestro["tiendas"]["id"]["extra"] = "auto_increment" ;
$maestro["tiendas"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["tiendas"]["idempresa"]["tipo"] = "int(11)" ; $maestro["tiendas"]["idempresa"]["extra"] = "" ;
$maestro["tiendas"]["tienda"]["nombrecampo"] = "tienda" ; $maestro["tiendas"]["tienda"]["tipo"] = "varchar(50)" ; $maestro["tiendas"]["tienda"]["extra"] = "" ;
$maestro["tiendas"]["tel"]["nombrecampo"] = "tel" ; $maestro["tiendas"]["tel"]["tipo"] = "varchar(20)" ; $maestro["tiendas"]["tel"]["extra"] = "" ;
$maestro["tiendas"]["email"]["nombrecampo"] = "email" ; $maestro["tiendas"]["email"]["tipo"] = "varchar(250)" ; $maestro["tiendas"]["email"]["extra"] = "" ;
$maestro["tiendas"]["idpais"]["nombrecampo"] = "idpais" ; $maestro["tiendas"]["idpais"]["tipo"] = "int(11)" ; $maestro["tiendas"]["idpais"]["extra"] = "" ;
$maestro["tiendas"]["idprov"]["nombrecampo"] = "idprov" ; $maestro["tiendas"]["idprov"]["tipo"] = "int(11)" ; $maestro["tiendas"]["idprov"]["extra"] = "" ;
$maestro["tiendas"]["dir"]["nombrecampo"] = "dir" ; $maestro["tiendas"]["dir"]["tipo"] = "varchar(50)" ; $maestro["tiendas"]["dir"]["extra"] = "" ;
$maestro["tiendas"]["cp"]["nombrecampo"] = "cp" ; $maestro["tiendas"]["cp"]["tipo"] = "varchar(10)" ; $maestro["tiendas"]["cp"]["extra"] = "" ;
$maestro["tiendas"]["pobla"]["nombrecampo"] = "pobla" ; $maestro["tiendas"]["pobla"]["tipo"] = "varchar(50)" ; $maestro["tiendas"]["pobla"]["extra"] = "" ;

$maestro["gastos"]["id"]["nombrecampo"] = "id" ; $maestro["gastos"]["id"]["tipo"] = "int(11)" ; $maestro["gastos"]["id"]["extra"] = "auto_increment" ;
$maestro["gastos"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["gastos"]["idserie"]["tipo"] = "int(11)" ; $maestro["gastos"]["idserie"]["extra"] = "" ;
$maestro["gastos"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["gastos"]["codigoint"]["tipo"] = "int(11)" ; $maestro["gastos"]["codigoint"]["extra"] = "" ;
$maestro["gastos"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["gastos"]["codigo"]["tipo"] = "varchar(20)" ; $maestro["gastos"]["codigo"]["extra"] = "" ;
$maestro["gastos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["gastos"]["fecha"]["tipo"] = "date" ; $maestro["gastos"]["fecha"]["extra"] = "" ;
$maestro["gastos"]["idtipogasto"]["nombrecampo"] = "idtipogasto" ; $maestro["gastos"]["idtipogasto"]["tipo"] = "int(11)" ; $maestro["gastos"]["idtipogasto"]["extra"] = "" ;
$maestro["gastos"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["gastos"]["descripcion"]["tipo"] = "varchar(50)" ; $maestro["gastos"]["descripcion"]["extra"] = "" ;
$maestro["gastos"]["importe"]["nombrecampo"] = "importe" ; $maestro["gastos"]["importe"]["tipo"] = "float" ; $maestro["gastos"]["importe"]["extra"] = "" ;
$maestro["gastos"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["gastos"]["iduser"]["tipo"] = "int(11)" ; $maestro["gastos"]["iduser"]["extra"] = "" ;
$maestro["gastos"]["aprobado"]["nombrecampo"] = "aprobado" ; $maestro["gastos"]["aprobado"]["tipo"] = "int(11)" ; $maestro["gastos"]["aprobado"]["extra"] = "" ;

$maestro["gastos_cfg"]["opcion"]["nombrecampo"] = "opcion" ; $maestro["gastos_cfg"]["opcion"]["tipo"] = "varchar(20)" ; $maestro["gastos_cfg"]["opcion"]["extra"] = "" ;
$maestro["gastos_cfg"]["valor"]["nombrecampo"] = "valor" ; $maestro["gastos_cfg"]["valor"]["tipo"] = "varchar(50)" ; $maestro["gastos_cfg"]["valor"]["extra"] = "" ;

$maestro["gastos_tipo"]["id"]["nombrecampo"] = "id" ; $maestro["gastos_tipo"]["id"]["tipo"] = "int(11)" ; $maestro["gastos_tipo"]["id"]["extra"] = "auto_increment" ;
$maestro["gastos_tipo"]["tipogasto"]["nombrecampo"] = "tipogasto" ; $maestro["gastos_tipo"]["tipogasto"]["tipo"] = "varchar(50)" ; $maestro["gastos_tipo"]["tipogasto"]["extra"] = "" ;

$maestro["tpv"]["id"]["nombrecampo"] = "id" ; $maestro["tpv"]["id"]["tipo"] = "int(11)" ; $maestro["tpv"]["id"]["extra"] = "auto_increment" ;
$maestro["tpv"]["idtienda"]["nombrecampo"] = "idtienda" ; $maestro["tpv"]["idtienda"]["tipo"] = "int(11)" ; $maestro["tpv"]["idtienda"]["extra"] = "" ;
$maestro["tpv"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["tpv"]["iduser"]["tipo"] = "int(11)" ; $maestro["tpv"]["iduser"]["extra"] = "" ;
$maestro["tpv"]["idterminal"]["nombrecampo"] = "idterminal" ; $maestro["tpv"]["idterminal"]["tipo"] = "int(11)" ; $maestro["tpv"]["idterminal"]["extra"] = "" ;
$maestro["tpv"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["tpv"]["idserie"]["tipo"] = "int(11)" ; $maestro["tpv"]["idserie"]["extra"] = "" ;
$maestro["tpv"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["tpv"]["codigoint"]["tipo"] = "int(11)" ; $maestro["tpv"]["codigoint"]["extra"] = "" ;
$maestro["tpv"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["tpv"]["codigo"]["tipo"] = "varchar(50)" ; $maestro["tpv"]["codigo"]["extra"] = "" ;
$maestro["tpv"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["tpv"]["fecha"]["tipo"] = "datetime" ; $maestro["tpv"]["fecha"]["extra"] = "" ;
$maestro["tpv"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["tpv"]["idtercero"]["tipo"] = "int(11)" ; $maestro["tpv"]["idtercero"]["extra"] = "" ;
$maestro["tpv"]["estado"]["nombrecampo"] = "estado" ; $maestro["tpv"]["estado"]["tipo"] = "int(11)" ; $maestro["tpv"]["estado"]["extra"] = "" ;
$maestro["tpv"]["edittpv"]["nombrecampo"] = "edittpv" ; $maestro["tpv"]["edittpv"]["tipo"] = "int(11)" ; $maestro["tpv"]["edittpv"]["extra"] = "" ;

$maestro["tpv_cajon"]["id"]["nombrecampo"] = "id" ; $maestro["tpv_cajon"]["id"]["tipo"] = "int(11)" ; $maestro["tpv_cajon"]["id"]["extra"] = "auto_increment" ;
$maestro["tpv_cajon"]["idtienda"]["nombrecampo"] = "idtienda" ; $maestro["tpv_cajon"]["idtienda"]["tipo"] = "int(11)" ; $maestro["tpv_cajon"]["idtienda"]["extra"] = "" ;
$maestro["tpv_cajon"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["tpv_cajon"]["iduser"]["tipo"] = "int(11)" ; $maestro["tpv_cajon"]["iduser"]["extra"] = "" ;
$maestro["tpv_cajon"]["idterminal"]["nombrecampo"] = "idterminal" ; $maestro["tpv_cajon"]["idterminal"]["tipo"] = "int(11)" ; $maestro["tpv_cajon"]["idterminal"]["extra"] = "" ;
$maestro["tpv_cajon"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["tpv_cajon"]["idserie"]["tipo"] = "int(11)" ; $maestro["tpv_cajon"]["idserie"]["extra"] = "" ;
$maestro["tpv_cajon"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["tpv_cajon"]["codigoint"]["tipo"] = "int(11)" ; $maestro["tpv_cajon"]["codigoint"]["extra"] = "" ;
$maestro["tpv_cajon"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["tpv_cajon"]["codigo"]["tipo"] = "varchar(50)" ; $maestro["tpv_cajon"]["codigo"]["extra"] = "" ;
$maestro["tpv_cajon"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["tpv_cajon"]["fecha"]["tipo"] = "datetime" ; $maestro["tpv_cajon"]["fecha"]["extra"] = "" ;
$maestro["tpv_cajon"]["tipomov"]["nombrecampo"] = "tipomov" ; $maestro["tpv_cajon"]["tipomov"]["tipo"] = "varchar(5)" ; $maestro["tpv_cajon"]["tipomov"]["extra"] = "" ;
$maestro["tpv_cajon"]["motivo"]["nombrecampo"] = "motivo" ; $maestro["tpv_cajon"]["motivo"]["tipo"] = "varchar(50)" ; $maestro["tpv_cajon"]["motivo"]["extra"] = "" ;
$maestro["tpv_cajon"]["importe"]["nombrecampo"] = "importe" ; $maestro["tpv_cajon"]["importe"]["tipo"] = "float" ; $maestro["tpv_cajon"]["importe"]["extra"] = "" ;
$maestro["tpv_cajon"]["idfpago"]["nombrecampo"] = "idfpago" ; $maestro["tpv_cajon"]["idfpago"]["tipo"] = "int(11)" ; $maestro["tpv_cajon"]["idfpago"]["extra"] = "" ;
$maestro["tpv_cajon"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["tpv_cajon"]["idtercero"]["tipo"] = "int(11)" ; $maestro["tpv_cajon"]["idtercero"]["extra"] = "" ;

$maestro["tpv_cajon_tax"]["id"]["nombrecampo"] = "id" ; $maestro["tpv_cajon_tax"]["id"]["tipo"] = "int(11)" ; $maestro["tpv_cajon_tax"]["id"]["extra"] = "auto_increment" ;
$maestro["tpv_cajon_tax"]["idcajon"]["nombrecampo"] = "idcajon" ; $maestro["tpv_cajon_tax"]["idcajon"]["tipo"] = "int(11)" ; $maestro["tpv_cajon_tax"]["idcajon"]["extra"] = "" ;
$maestro["tpv_cajon_tax"]["idtax"]["nombrecampo"] = "idtax" ; $maestro["tpv_cajon_tax"]["idtax"]["tipo"] = "int(11)" ; $maestro["tpv_cajon_tax"]["idtax"]["extra"] = "" ;
$maestro["tpv_cajon_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["tpv_cajon_tax"]["valor"]["tipo"] = "float" ; $maestro["tpv_cajon_tax"]["valor"]["extra"] = "" ;
$maestro["tpv_cajon_tax"]["importe"]["nombrecampo"] = "importe" ; $maestro["tpv_cajon_tax"]["importe"]["tipo"] = "float" ; $maestro["tpv_cajon_tax"]["importe"]["extra"] = "" ;

$maestro["tpv_campos"]["idtpv"]["nombrecampo"] = "idtpv" ; $maestro["tpv_campos"]["idtpv"]["tipo"] = "int(11)" ; $maestro["tpv_campos"]["idtpv"]["extra"] = "" ;
$maestro["tpv_campos"]["campo"]["nombrecampo"] = "campo" ; $maestro["tpv_campos"]["campo"]["tipo"] = "varchar(10)" ; $maestro["tpv_campos"]["campo"]["extra"] = "" ;
$maestro["tpv_campos"]["valor"]["nombrecampo"] = "valor" ; $maestro["tpv_campos"]["valor"]["tipo"] = "varchar(50)" ; $maestro["tpv_campos"]["valor"]["extra"] = "" ;

$maestro["tpv_cfg"]["id"]["nombrecampo"] = "id" ; $maestro["tpv_cfg"]["id"]["tipo"] = "int(11)" ; $maestro["tpv_cfg"]["id"]["extra"] = "auto_increment" ;
$maestro["tpv_cfg"]["idterminal"]["nombrecampo"] = "idterminal" ; $maestro["tpv_cfg"]["idterminal"]["tipo"] = "int(11)" ; $maestro["tpv_cfg"]["idterminal"]["extra"] = "" ;
$maestro["tpv_cfg"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["tpv_cfg"]["idserie"]["tipo"] = "int(11)" ; $maestro["tpv_cfg"]["idserie"]["extra"] = "" ;
$maestro["tpv_cfg"]["idseriec"]["nombrecampo"] = "idseriec" ; $maestro["tpv_cfg"]["idseriec"]["tipo"] = "int(11)" ; $maestro["tpv_cfg"]["idseriec"]["extra"] = "" ;
$maestro["tpv_cfg"]["idprinter"]["nombrecampo"] = "idprinter" ; $maestro["tpv_cfg"]["idprinter"]["tipo"] = "int(11)" ; $maestro["tpv_cfg"]["idprinter"]["extra"] = "" ;
$maestro["tpv_cfg"]["idtercero"]["nombrecampo"] = "idtercero" ; $maestro["tpv_cfg"]["idtercero"]["tipo"] = "int(11)" ; $maestro["tpv_cfg"]["idtercero"]["extra"] = "" ;

$maestro["tpv_cfg_cg"]["id"]["nombrecampo"] = "id" ; $maestro["tpv_cfg_cg"]["id"]["tipo"] = "int(11)" ; $maestro["tpv_cfg_cg"]["id"]["extra"] = "auto_increment" ;
$maestro["tpv_cfg_cg"]["campo"]["nombrecampo"] = "campo" ; $maestro["tpv_cfg_cg"]["campo"]["tipo"] = "varchar(10)" ; $maestro["tpv_cfg_cg"]["campo"]["extra"] = "" ;
$maestro["tpv_cfg_cg"]["display"]["nombrecampo"] = "display" ; $maestro["tpv_cfg_cg"]["display"]["tipo"] = "varchar(50)" ; $maestro["tpv_cfg_cg"]["display"]["extra"] = "" ;
$maestro["tpv_cfg_cg"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["tpv_cfg_cg"]["tipo"]["tipo"] = "varchar(5)" ; $maestro["tpv_cfg_cg"]["tipo"]["extra"] = "" ;
$maestro["tpv_cfg_cg"]["mostrarlist"]["nombrecampo"] = "mostrarlist" ; $maestro["tpv_cfg_cg"]["mostrarlist"]["tipo"] = "int(11)" ; $maestro["tpv_cfg_cg"]["mostrarlist"]["extra"] = "" ;

$maestro["tpv_cfg_home"]["id"]["nombrecampo"] = "id" ; $maestro["tpv_cfg_home"]["id"]["tipo"] = "int(11)" ; $maestro["tpv_cfg_home"]["id"]["extra"] = "auto_increment" ;
$maestro["tpv_cfg_home"]["idterminal"]["nombrecampo"] = "idterminal" ; $maestro["tpv_cfg_home"]["idterminal"]["tipo"] = "int(11)" ; $maestro["tpv_cfg_home"]["idterminal"]["extra"] = "" ;
$maestro["tpv_cfg_home"]["idproducto"]["nombrecampo"] = "idproducto" ; $maestro["tpv_cfg_home"]["idproducto"]["tipo"] = "int(11)" ; $maestro["tpv_cfg_home"]["idproducto"]["extra"] = "" ;
$maestro["tpv_cfg_home"]["orden"]["nombrecampo"] = "orden" ; $maestro["tpv_cfg_home"]["orden"]["tipo"] = "int(11)" ; $maestro["tpv_cfg_home"]["orden"]["extra"] = "" ;

$maestro["tpv_cfg_ia"]["id"]["nombrecampo"] = "id" ; $maestro["tpv_cfg_ia"]["id"]["tipo"] = "int(11)" ; $maestro["tpv_cfg_ia"]["id"]["extra"] = "auto_increment" ;
$maestro["tpv_cfg_ia"]["activo"]["nombrecampo"] = "activo" ; $maestro["tpv_cfg_ia"]["activo"]["tipo"] = "int(11)" ; $maestro["tpv_cfg_ia"]["activo"]["extra"] = "" ;
$maestro["tpv_cfg_ia"]["regla"]["nombrecampo"] = "regla" ; $maestro["tpv_cfg_ia"]["regla"]["tipo"] = "varchar(50)" ; $maestro["tpv_cfg_ia"]["regla"]["extra"] = "" ;
$maestro["tpv_cfg_ia"]["cuando"]["nombrecampo"] = "cuando" ; $maestro["tpv_cfg_ia"]["cuando"]["tipo"] = "varchar(5)" ; $maestro["tpv_cfg_ia"]["cuando"]["extra"] = "" ;
$maestro["tpv_cfg_ia"]["min"]["nombrecampo"] = "min" ; $maestro["tpv_cfg_ia"]["min"]["tipo"] = "float" ; $maestro["tpv_cfg_ia"]["min"]["extra"] = "" ;
$maestro["tpv_cfg_ia"]["max"]["nombrecampo"] = "max" ; $maestro["tpv_cfg_ia"]["max"]["tipo"] = "float" ; $maestro["tpv_cfg_ia"]["max"]["extra"] = "" ;
$maestro["tpv_cfg_ia"]["idproducto"]["nombrecampo"] = "idproducto" ; $maestro["tpv_cfg_ia"]["idproducto"]["tipo"] = "int(11)" ; $maestro["tpv_cfg_ia"]["idproducto"]["extra"] = "" ;
$maestro["tpv_cfg_ia"]["docprint"]["nombrecampo"] = "docprint" ; $maestro["tpv_cfg_ia"]["docprint"]["tipo"] = "varchar(50)" ; $maestro["tpv_cfg_ia"]["docprint"]["extra"] = "" ;
$maestro["tpv_cfg_ia"]["copias"]["nombrecampo"] = "copias" ; $maestro["tpv_cfg_ia"]["copias"]["tipo"] = "int(11)" ; $maestro["tpv_cfg_ia"]["copias"]["extra"] = "" ;
$maestro["tpv_cfg_ia"]["texto"]["nombrecampo"] = "texto" ; $maestro["tpv_cfg_ia"]["texto"]["tipo"] = "varchar(50)" ; $maestro["tpv_cfg_ia"]["texto"]["extra"] = "" ;

$maestro["tpv_lineas"]["id"]["nombrecampo"] = "id" ; $maestro["tpv_lineas"]["id"]["tipo"] = "int(11)" ; $maestro["tpv_lineas"]["id"]["extra"] = "auto_increment" ;
$maestro["tpv_lineas"]["idtpv"]["nombrecampo"] = "idtpv" ; $maestro["tpv_lineas"]["idtpv"]["tipo"] = "int(11)" ; $maestro["tpv_lineas"]["idtpv"]["extra"] = "" ;
$maestro["tpv_lineas"]["orden"]["nombrecampo"] = "orden" ; $maestro["tpv_lineas"]["orden"]["tipo"] = "int(11)" ; $maestro["tpv_lineas"]["orden"]["extra"] = "" ;
$maestro["tpv_lineas"]["codventa"]["nombrecampo"] = "codventa" ; $maestro["tpv_lineas"]["codventa"]["tipo"] = "varchar(50)" ; $maestro["tpv_lineas"]["codventa"]["extra"] = "" ;
$maestro["tpv_lineas"]["concepto"]["nombrecampo"] = "concepto" ; $maestro["tpv_lineas"]["concepto"]["tipo"] = "varchar(50)" ; $maestro["tpv_lineas"]["concepto"]["extra"] = "" ;
$maestro["tpv_lineas"]["unidades"]["nombrecampo"] = "unidades" ; $maestro["tpv_lineas"]["unidades"]["tipo"] = "int(11)" ; $maestro["tpv_lineas"]["unidades"]["extra"] = "" ;
$maestro["tpv_lineas"]["precio"]["nombrecampo"] = "precio" ; $maestro["tpv_lineas"]["precio"]["tipo"] = "float" ; $maestro["tpv_lineas"]["precio"]["extra"] = "" ;
$maestro["tpv_lineas"]["importe"]["nombrecampo"] = "importe" ; $maestro["tpv_lineas"]["importe"]["tipo"] = "float" ; $maestro["tpv_lineas"]["importe"]["extra"] = "" ;

$maestro["tpv_lineas_tax"]["idtpv"]["nombrecampo"] = "idtpv" ; $maestro["tpv_lineas_tax"]["idtpv"]["tipo"] = "int(11)" ; $maestro["tpv_lineas_tax"]["idtpv"]["extra"] = "" ;
$maestro["tpv_lineas_tax"]["idlinea"]["nombrecampo"] = "idlinea" ; $maestro["tpv_lineas_tax"]["idlinea"]["tipo"] = "int(11)" ; $maestro["tpv_lineas_tax"]["idlinea"]["extra"] = "" ;
$maestro["tpv_lineas_tax"]["idtax"]["nombrecampo"] = "idtax" ; $maestro["tpv_lineas_tax"]["idtax"]["tipo"] = "int(11)" ; $maestro["tpv_lineas_tax"]["idtax"]["extra"] = "" ;
$maestro["tpv_lineas_tax"]["valor"]["nombrecampo"] = "valor" ; $maestro["tpv_lineas_tax"]["valor"]["tipo"] = "float" ; $maestro["tpv_lineas_tax"]["valor"]["extra"] = "" ;
$maestro["tpv_lineas_tax"]["importe"]["nombrecampo"] = "importe" ; $maestro["tpv_lineas_tax"]["importe"]["tipo"] = "float" ; $maestro["tpv_lineas_tax"]["importe"]["extra"] = "" ;

$maestro["tpv_pagos"]["id"]["nombrecampo"] = "id" ; $maestro["tpv_pagos"]["id"]["tipo"] = "int(11)" ; $maestro["tpv_pagos"]["id"]["extra"] = "auto_increment" ;
$maestro["tpv_pagos"]["idtienda"]["nombrecampo"] = "idtienda" ; $maestro["tpv_pagos"]["idtienda"]["tipo"] = "int(11)" ; $maestro["tpv_pagos"]["idtienda"]["extra"] = "" ;
$maestro["tpv_pagos"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["tpv_pagos"]["iduser"]["tipo"] = "int(11)" ; $maestro["tpv_pagos"]["iduser"]["extra"] = "" ;
$maestro["tpv_pagos"]["idterminal"]["nombrecampo"] = "idterminal" ; $maestro["tpv_pagos"]["idterminal"]["tipo"] = "int(11)" ; $maestro["tpv_pagos"]["idterminal"]["extra"] = "" ;
$maestro["tpv_pagos"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["tpv_pagos"]["idserie"]["tipo"] = "int(11)" ; $maestro["tpv_pagos"]["idserie"]["extra"] = "" ;
$maestro["tpv_pagos"]["idtpv"]["nombrecampo"] = "idtpv" ; $maestro["tpv_pagos"]["idtpv"]["tipo"] = "int(11)" ; $maestro["tpv_pagos"]["idtpv"]["extra"] = "" ;
$maestro["tpv_pagos"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["tpv_pagos"]["tipo"]["tipo"] = "varchar(5)" ; $maestro["tpv_pagos"]["tipo"]["extra"] = "" ;
$maestro["tpv_pagos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["tpv_pagos"]["fecha"]["tipo"] = "datetime" ; $maestro["tpv_pagos"]["fecha"]["extra"] = "" ;
$maestro["tpv_pagos"]["idfpago"]["nombrecampo"] = "idfpago" ; $maestro["tpv_pagos"]["idfpago"]["tipo"] = "int(11)" ; $maestro["tpv_pagos"]["idfpago"]["extra"] = "" ;
$maestro["tpv_pagos"]["importe"]["nombrecampo"] = "importe" ; $maestro["tpv_pagos"]["importe"]["tipo"] = "float" ; $maestro["tpv_pagos"]["importe"]["extra"] = "" ;

$maestro["users"]["id"]["nombrecampo"] = "id" ; $maestro["users"]["id"]["tipo"] = "int(11)" ; $maestro["users"]["id"]["extra"] = "auto_increment" ;
$maestro["users"]["username"]["nombrecampo"] = "username" ; $maestro["users"]["username"]["tipo"] = "varchar(50)" ; $maestro["users"]["username"]["extra"] = "" ;
$maestro["users"]["password"]["nombrecampo"] = "password" ; $maestro["users"]["password"]["tipo"] = "varchar(50)" ; $maestro["users"]["password"]["extra"] = "" ;
$maestro["users"]["display"]["nombrecampo"] = "display" ; $maestro["users"]["display"]["tipo"] = "varchar(50)" ; $maestro["users"]["display"]["extra"] = "" ;
$maestro["users"]["ncuenta"]["nombrecampo"] = "ncuenta" ; $maestro["users"]["ncuenta"]["tipo"] = "varchar(50)" ; $maestro["users"]["ncuenta"]["extra"] = "" ;
$maestro["users"]["tel"]["nombrecampo"] = "tel" ; $maestro["users"]["tel"]["tipo"] = "varchar(20)" ; $maestro["users"]["tel"]["extra"] = "" ;
$maestro["users"]["dir"]["nombrecampo"] = "dir" ; $maestro["users"]["dir"]["tipo"] = "varchar(50)" ; $maestro["users"]["dir"]["extra"] = "" ;
$maestro["users"]["cp"]["nombrecampo"] = "cp" ; $maestro["users"]["cp"]["tipo"] = "varchar(10)" ; $maestro["users"]["cp"]["extra"] = "" ;
$maestro["users"]["pobla"]["nombrecampo"] = "pobla" ; $maestro["users"]["pobla"]["tipo"] = "varchar(50)" ; $maestro["users"]["pobla"]["extra"] = "" ;
$maestro["users"]["email"]["nombrecampo"] = "email" ; $maestro["users"]["email"]["tipo"] = "varchar(200)" ; $maestro["users"]["email"]["extra"] = "" ;
$maestro["users"]["activo"]["nombrecampo"] = "activo" ; $maestro["users"]["activo"]["tipo"] = "int(11)" ; $maestro["users"]["activo"]["extra"] = "" ;
$maestro["users"]["ididioma"]["nombrecampo"] = "ididioma" ; $maestro["users"]["ididioma"]["tipo"] = "int(11)" ; $maestro["users"]["ididioma"]["extra"] = "" ;
$maestro["users"]["idprov"]["nombrecampo"] = "idprov" ; $maestro["users"]["idprov"]["tipo"] = "int(11)" ; $maestro["users"]["idprov"]["extra"] = "" ;
$maestro["users"]["idpais"]["nombrecampo"] = "idpais" ; $maestro["users"]["idpais"]["tipo"] = "int(11)" ; $maestro["users"]["idpais"]["extra"] = "" ;
$maestro["users"]["idempresa"]["nombrecampo"] = "idempresa" ; $maestro["users"]["idempresa"]["tipo"] = "int(11)" ; $maestro["users"]["idempresa"]["extra"] = "" ;
$maestro["users"]["nif"]["nombrecampo"] = "nif" ; $maestro["users"]["nif"]["tipo"] = "varchar(15)" ; $maestro["users"]["nif"]["extra"] = "" ;
$maestro["users"]["uidmulti"]["nombrecampo"] = "uidmulti" ; $maestro["users"]["uidmulti"]["tipo"] = "int(11)" ; $maestro["users"]["uidmulti"]["extra"] = "" ;
$maestro["users"]["tlgm_groupid"]["nombrecampo"] = "tlgm_groupid" ; $maestro["users"]["tlgm_groupid"]["tipo"] = "varchar(50)" ; $maestro["users"]["tlgm_groupid"]["extra"] = "" ;
$maestro["users"]["userset_showcods"]["nombrecampo"] = "userset_showcods" ; $maestro["users"]["userset_showcods"]["tipo"] = "tinyint(1)" ; $maestro["users"]["userset_showcods"]["extra"] = "" ;
$maestro["users"]["userset_viewlists"]["nombrecampo"] = "userset_viewlists" ; $maestro["users"]["userset_viewlists"]["tipo"] = "varchar(1)" ; $maestro["users"]["userset_viewlists"]["extra"] = "" ;

$maestro["users_config"]["opcion"]["nombrecampo"] = "opcion" ; $maestro["users_config"]["opcion"]["tipo"] = "varchar(20)" ; $maestro["users_config"]["opcion"]["extra"] = "" ;
$maestro["users_config"]["valor"]["nombrecampo"] = "valor" ; $maestro["users_config"]["valor"]["tipo"] = "varchar(50)" ; $maestro["users_config"]["valor"]["extra"] = "" ;

$maestro["users_app"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["users_app"]["iduser"]["tipo"] = "int(11)" ; $maestro["users_app"]["iduser"]["extra"] = "" ;
$maestro["users_app"]["app"]["nombrecampo"] = "app" ; $maestro["users_app"]["app"]["tipo"] = "varchar(20)" ; $maestro["users_app"]["app"]["extra"] = "" ;
$maestro["users_app"]["idremote"]["nombrecampo"] = "idremote" ; $maestro["users_app"]["idremote"]["tipo"] = "int(11)" ; $maestro["users_app"]["idremote"]["extra"] = "" ;

$maestro["users_correo"]["id"]["nombrecampo"] = "id" ; $maestro["users_correo"]["id"]["tipo"] = "int(11)" ; $maestro["users_correo"]["id"]["extra"] = "auto_increment" ;
$maestro["users_correo"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["users_correo"]["iduser"]["tipo"] = "int(11)" ; $maestro["users_correo"]["iduser"]["extra"] = "" ;
$maestro["users_correo"]["display"]["nombrecampo"] = "display" ; $maestro["users_correo"]["display"]["tipo"] = "varchar(50)" ; $maestro["users_correo"]["display"]["extra"] = "" ;
$maestro["users_correo"]["usuario"]["nombrecampo"] = "usuario" ; $maestro["users_correo"]["usuario"]["tipo"] = "varchar(50)" ; $maestro["users_correo"]["usuario"]["extra"] = "" ;
$maestro["users_correo"]["password"]["nombrecampo"] = "password" ; $maestro["users_correo"]["password"]["tipo"] = "varchar(50)" ; $maestro["users_correo"]["password"]["extra"] = "" ;
$maestro["users_correo"]["smtpserver"]["nombrecampo"] = "smtpserver" ; $maestro["users_correo"]["smtpserver"]["tipo"] = "varchar(50)" ; $maestro["users_correo"]["smtpserver"]["extra"] = "" ;
$maestro["users_correo"]["email"]["nombrecampo"] = "email" ; $maestro["users_correo"]["email"]["tipo"] = "varchar(50)" ; $maestro["users_correo"]["email"]["extra"] = "" ;
$maestro["users_correo"]["dft"]["nombrecampo"] = "dft" ; $maestro["users_correo"]["dft"]["tipo"] = "int(11)" ; $maestro["users_correo"]["dft"]["extra"] = "" ;
$maestro["users_correo"]["notapie"]["nombrecampo"] = "notapie" ; $maestro["users_correo"]["notapie"]["tipo"] = "varchar(255)" ; $maestro["users_correo"]["notapie"]["extra"] = "" ;
$maestro["users_correo"]["port"]["nombrecampo"] = "port" ; $maestro["users_correo"]["port"]["tipo"] = "int(11)" ; $maestro["users_correo"]["port"]["extra"] = "" ;
$maestro["users_correo"]["tipoconex"]["nombrecampo"] = "tipoconex" ; $maestro["users_correo"]["tipoconex"]["tipo"] = "varchar(4)" ; $maestro["users_correo"]["tipoconex"]["extra"] = "" ;
$maestro["users_correo"]["nomcuenta"]["nombrecampo"] = "nomcuenta" ; $maestro["users_correo"]["nomcuenta"]["tipo"] = "varchar(50)" ; $maestro["users_correo"]["nomcuenta"]["extra"] = "" ;

$maestro["users_mainview"]["id"]["nombrecampo"] = "id" ; $maestro["users_mainview"]["id"]["tipo"] = "int(11)" ; $maestro["users_mainview"]["id"]["extra"] = "auto_increment" ;
$maestro["users_mainview"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["users_mainview"]["iduser"]["tipo"] = "int(11)" ; $maestro["users_mainview"]["iduser"]["extra"] = "" ;
$maestro["users_mainview"]["display"]["nombrecampo"] = "display" ; $maestro["users_mainview"]["display"]["tipo"] = "varchar(50)" ; $maestro["users_mainview"]["display"]["extra"] = "" ;
$maestro["users_mainview"]["enlace"]["nombrecampo"] = "enlace" ; $maestro["users_mainview"]["enlace"]["tipo"] = "varchar(255)" ; $maestro["users_mainview"]["enlace"]["extra"] = "" ;
$maestro["users_mainview"]["ventana"]["nombrecampo"] = "ventana" ; $maestro["users_mainview"]["ventana"]["tipo"] = "varchar(10)" ; $maestro["users_mainview"]["ventana"]["extra"] = "" ;
$maestro["users_mainview"]["orden"]["nombrecampo"] = "orden" ; $maestro["users_mainview"]["orden"]["tipo"] = "int(11)" ; $maestro["users_mainview"]["orden"]["extra"] = "" ;
$maestro["users_mainview"]["icono"]["nombrecampo"] = "icono" ; $maestro["users_mainview"]["icono"]["tipo"] = "varchar(20)" ; $maestro["users_mainview"]["icono"]["extra"] = "" ;

$maestro["users_notifica"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["users_notifica"]["iduser"]["tipo"] = "int(11)" ; $maestro["users_notifica"]["iduser"]["extra"] = "" ;
$maestro["users_notifica"]["opcion"]["nombrecampo"] = "opcion" ; $maestro["users_notifica"]["opcion"]["tipo"] = "varchar(10)" ; $maestro["users_notifica"]["opcion"]["extra"] = "" ;
$maestro["users_notifica"]["email"]["nombrecampo"] = "email" ; $maestro["users_notifica"]["email"]["tipo"] = "int(11)" ; $maestro["users_notifica"]["email"]["extra"] = "" ;
$maestro["users_notifica"]["telegram"]["nombrecampo"] = "telegram" ; $maestro["users_notifica"]["telegram"]["tipo"] = "int(11)" ; $maestro["users_notifica"]["telegram"]["extra"] = "" ;

$maestro["users_uid"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["users_uid"]["iduser"]["tipo"] = "int(11)" ; $maestro["users_uid"]["iduser"]["extra"] = "" ;
$maestro["users_uid"]["uidsession"]["nombrecampo"] = "uidsession" ; $maestro["users_uid"]["uidsession"]["tipo"] = "varchar(50)" ; $maestro["users_uid"]["uidsession"]["extra"] = "" ;
$maestro["users_uid"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["users_uid"]["fecha"]["tipo"] = "datetime" ; $maestro["users_uid"]["fecha"]["extra"] = "" ;
$maestro["users_uid"]["useragente"]["nombrecampo"] = "useragente" ; $maestro["users_uid"]["useragente"]["tipo"] = "varchar(255)" ; $maestro["users_uid"]["useragente"]["extra"] = "" ;
$maestro["users_uid"]["nomsesion"]["nombrecampo"] = "nomsesion" ; $maestro["users_uid"]["nomsesion"]["tipo"] = "varchar(50)" ; $maestro["users_uid"]["nomsesion"]["extra"] = "" ;

$maestro["usersgroup"]["id"]["nombrecampo"] = "id" ; $maestro["usersgroup"]["id"]["tipo"] = "int(11)" ; $maestro["usersgroup"]["id"]["extra"] = "auto_increment" ;
$maestro["usersgroup"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["usersgroup"]["iduser"]["tipo"] = "int(11)" ; $maestro["usersgroup"]["iduser"]["extra"] = "" ;
$maestro["usersgroup"]["idgroup"]["nombrecampo"] = "idgroup" ; $maestro["usersgroup"]["idgroup"]["tipo"] = "int(11)" ; $maestro["usersgroup"]["idgroup"]["extra"] = "" ;

$maestro["usersprinters"]["id"]["nombrecampo"] = "id" ; $maestro["usersprinters"]["id"]["tipo"] = "int(11)" ; $maestro["usersprinters"]["id"]["extra"] = "auto_increment" ;
$maestro["usersprinters"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["usersprinters"]["iduser"]["tipo"] = "int(11)" ; $maestro["usersprinters"]["iduser"]["extra"] = "" ;
$maestro["usersprinters"]["idprinter"]["nombrecampo"] = "idprinter" ; $maestro["usersprinters"]["idprinter"]["tipo"] = "int(11)" ; $maestro["usersprinters"]["idprinter"]["extra"] = "" ;
$maestro["usersprinters"]["dft"]["nombrecampo"] = "dft" ; $maestro["usersprinters"]["dft"]["tipo"] = "int(11)" ; $maestro["usersprinters"]["dft"]["extra"] = "" ;

$maestro["userstiendas"]["id"]["nombrecampo"] = "id" ; $maestro["userstiendas"]["id"]["tipo"] = "int(11)" ; $maestro["userstiendas"]["id"]["extra"] = "auto_increment" ;
$maestro["userstiendas"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["userstiendas"]["iduser"]["tipo"] = "int(11)" ; $maestro["userstiendas"]["iduser"]["extra"] = "" ;
$maestro["userstiendas"]["idtienda"]["nombrecampo"] = "idtienda" ; $maestro["userstiendas"]["idtienda"]["tipo"] = "int(11)" ; $maestro["userstiendas"]["idtienda"]["extra"] = "" ;
$maestro["userstiendas"]["dft"]["nombrecampo"] = "dft" ; $maestro["userstiendas"]["dft"]["tipo"] = "int(11)" ; $maestro["userstiendas"]["dft"]["extra"] = "" ;
$maestro["userstiendas"]["idterminal"]["nombrecampo"] = "idterminal" ; $maestro["userstiendas"]["idterminal"]["tipo"] = "int(11)" ; $maestro["userstiendas"]["idterminal"]["extra"] = "" ;

$maestro["viajes"]["id"]["nombrecampo"] = "id" ; $maestro["viajes"]["id"]["tipo"] = "int(11)" ; $maestro["viajes"]["id"]["extra"] = "auto_increment" ;
$maestro["viajes"]["idserie"]["nombrecampo"] = "idserie" ; $maestro["viajes"]["idserie"]["tipo"] = "int(11)" ; $maestro["viajes"]["idserie"]["extra"] = "" ;
$maestro["viajes"]["codigoint"]["nombrecampo"] = "codigoint" ; $maestro["viajes"]["codigoint"]["tipo"] = "int(11)" ; $maestro["viajes"]["codigoint"]["extra"] = "" ;
$maestro["viajes"]["codigo"]["nombrecampo"] = "codigo" ; $maestro["viajes"]["codigo"]["tipo"] = "varchar(20)" ; $maestro["viajes"]["codigo"]["extra"] = "" ;
$maestro["viajes"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["viajes"]["iduser"]["tipo"] = "int(11)" ; $maestro["viajes"]["iduser"]["extra"] = "" ;
$maestro["viajes"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["viajes"]["descripcion"]["tipo"] = "varchar(50)" ; $maestro["viajes"]["descripcion"]["extra"] = "" ;
$maestro["viajes"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["viajes"]["fecha"]["tipo"] = "datetime" ; $maestro["viajes"]["fecha"]["extra"] = "" ;
$maestro["viajes"]["fechavuelta"]["nombrecampo"] = "fechavuelta" ; $maestro["viajes"]["fechavuelta"]["tipo"] = "datetime" ; $maestro["viajes"]["fechavuelta"]["extra"] = "" ;
$maestro["viajes"]["editv"]["nombrecampo"] = "editv" ; $maestro["viajes"]["editv"]["tipo"] = "int(11)" ; $maestro["viajes"]["editv"]["extra"] = "" ;

$maestro["viajes_lineas"]["id"]["nombrecampo"] = "id" ; $maestro["viajes_lineas"]["id"]["tipo"] = "int(11)" ; $maestro["viajes_lineas"]["id"]["extra"] = "auto_increment" ;
$maestro["viajes_lineas"]["idviaje"]["nombrecampo"] = "idviaje" ; $maestro["viajes_lineas"]["idviaje"]["tipo"] = "int(11)" ; $maestro["viajes_lineas"]["idviaje"]["extra"] = "" ;
$maestro["viajes_lineas"]["tipo"]["nombrecampo"] = "tipo" ; $maestro["viajes_lineas"]["tipo"]["tipo"] = "varchar(5)" ; $maestro["viajes_lineas"]["tipo"]["extra"] = "" ;
$maestro["viajes_lineas"]["fechasalida"]["nombrecampo"] = "fechasalida" ; $maestro["viajes_lineas"]["fechasalida"]["tipo"] = "datetime" ; $maestro["viajes_lineas"]["fechasalida"]["extra"] = "" ;
$maestro["viajes_lineas"]["origen"]["nombrecampo"] = "origen" ; $maestro["viajes_lineas"]["origen"]["tipo"] = "varchar(50)" ; $maestro["viajes_lineas"]["origen"]["extra"] = "" ;
$maestro["viajes_lineas"]["fechallegada"]["nombrecampo"] = "fechallegada" ; $maestro["viajes_lineas"]["fechallegada"]["tipo"] = "datetime" ; $maestro["viajes_lineas"]["fechallegada"]["extra"] = "" ;
$maestro["viajes_lineas"]["destino"]["nombrecampo"] = "destino" ; $maestro["viajes_lineas"]["destino"]["tipo"] = "varchar(50)" ; $maestro["viajes_lineas"]["destino"]["extra"] = "" ;
$maestro["viajes_lineas"]["descripcion"]["nombrecampo"] = "descripcion" ; $maestro["viajes_lineas"]["descripcion"]["tipo"] = "varchar(250)" ; $maestro["viajes_lineas"]["descripcion"]["extra"] = "" ;
$maestro["viajes_lineas"]["reserva"]["nombrecampo"] = "reserva" ; $maestro["viajes_lineas"]["reserva"]["tipo"] = "varchar(50)" ; $maestro["viajes_lineas"]["reserva"]["extra"] = "" ;
$maestro["viajes_lineas"]["asiento"]["nombrecampo"] = "asiento" ; $maestro["viajes_lineas"]["asiento"]["tipo"] = "varchar(50)" ; $maestro["viajes_lineas"]["asiento"]["extra"] = "" ;

$maestro["viajes_gastos"]["id"]["nombrecampo"] = "id" ; $maestro["viajes_gastos"]["id"]["tipo"] = "int(11)" ; $maestro["viajes_gastos"]["id"]["extra"] = "auto_increment" ;
$maestro["viajes_gastos"]["idviaje"]["nombrecampo"] = "idviaje" ; $maestro["viajes_gastos"]["idviaje"]["tipo"] = "int(11)" ; $maestro["viajes_gastos"]["idviaje"]["extra"] = "" ;
$maestro["viajes_gastos"]["iduser"]["nombrecampo"] = "iduser" ; $maestro["viajes_gastos"]["iduser"]["tipo"] = "int(11)" ; $maestro["viajes_gastos"]["iduser"]["extra"] = "" ;
$maestro["viajes_gastos"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["viajes_gastos"]["fecha"]["tipo"] = "date" ; $maestro["viajes_gastos"]["fecha"]["extra"] = "" ;
$maestro["viajes_gastos"]["idtipogasto"]["nombrecampo"] = "idtipogasto" ; $maestro["viajes_gastos"]["idtipogasto"]["tipo"] = "int(11)" ; $maestro["viajes_gastos"]["idtipogasto"]["extra"] = "" ;
$maestro["viajes_gastos"]["importe"]["nombrecampo"] = "importe" ; $maestro["viajes_gastos"]["importe"]["tipo"] = "float" ; $maestro["viajes_gastos"]["importe"]["extra"] = "" ;
$maestro["viajes_gastos"]["documento"]["nombrecampo"] = "documento" ; $maestro["viajes_gastos"]["documento"]["tipo"] = "varchar(50)" ; $maestro["viajes_gastos"]["documento"]["extra"] = "" ;
$maestro["viajes_gastos"]["idflota"]["nombrecampo"] = "idflota" ; $maestro["viajes_gastos"]["idflota"]["tipo"] = "int(11)" ; $maestro["viajes_gastos"]["idflota"]["extra"] = "" ;

$maestro["wh_cfg"]["opcion"]["nombrecampo"] = "opcion" ; $maestro["wh_cfg"]["opcion"]["tipo"] = "varchar(50)" ; $maestro["wh_cfg"]["opcion"]["extra"] = "" ;
$maestro["wh_cfg"]["valor"]["nombrecampo"] = "valor" ; $maestro["wh_cfg"]["valor"]["tipo"] = "varchar(50)" ; $maestro["wh_cfg"]["valor"]["extra"] = "" ;

$maestro["wh_lineas"]["id"]["nombrecampo"] = "id" ; $maestro["wh_lineas"]["id"]["tipo"] = "int(11)" ; $maestro["wh_lineas"]["id"]["extra"] = "auto_increment" ;
$maestro["wh_lineas"]["idwhmov"]["nombrecampo"] = "idwhmov" ; $maestro["wh_lineas"]["idwhmov"]["tipo"] = "int(11)" ; $maestro["wh_lineas"]["idwhmov"]["extra"] = "" ;
$maestro["wh_lineas"]["idproducto"]["nombrecampo"] = "idproducto" ; $maestro["wh_lineas"]["idproducto"]["tipo"] = "int(11)" ; $maestro["wh_lineas"]["idproducto"]["extra"] = "" ;
$maestro["wh_lineas"]["unid"]["nombrecampo"] = "unid" ; $maestro["wh_lineas"]["unid"]["tipo"] = "int(11)" ; $maestro["wh_lineas"]["unid"]["extra"] = "" ;
$maestro["wh_lineas"]["idalmacen"]["nombrecampo"] = "idalmacen" ; $maestro["wh_lineas"]["idalmacen"]["tipo"] = "int(11)" ; $maestro["wh_lineas"]["idalmacen"]["extra"] = "" ;
$maestro["wh_lineas"]["movimiento"]["nombrecampo"] = "movimiento" ; $maestro["wh_lineas"]["movimiento"]["tipo"] = "varchar(10)" ; $maestro["wh_lineas"]["movimiento"]["extra"] = "" ;
$maestro["wh_lineas"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["wh_lineas"]["fecha"]["tipo"] = "date" ; $maestro["wh_lineas"]["fecha"]["extra"] = "" ;

$maestro["wh_mov"]["id"]["nombrecampo"] = "id" ; $maestro["wh_mov"]["id"]["tipo"] = "int(11)" ; $maestro["wh_mov"]["id"]["extra"] = "auto_increment" ;
$maestro["wh_mov"]["movimiento"]["nombrecampo"] = "movimiento" ; $maestro["wh_mov"]["movimiento"]["tipo"] = "varchar(50)" ; $maestro["wh_mov"]["movimiento"]["extra"] = "" ;
$maestro["wh_mov"]["fecha"]["nombrecampo"] = "fecha" ; $maestro["wh_mov"]["fecha"]["tipo"] = "date" ; $maestro["wh_mov"]["fecha"]["extra"] = "" ;
$maestro["wh_mov"]["modulo"]["nombrecampo"] = "modulo" ; $maestro["wh_mov"]["modulo"]["tipo"] = "varchar(10)" ; $maestro["wh_mov"]["modulo"]["extra"] = "" ;
$maestro["wh_mov"]["iddocumento"]["nombrecampo"] = "iddocumento" ; $maestro["wh_mov"]["iddocumento"]["tipo"] = "int(11)" ; $maestro["wh_mov"]["iddocumento"]["extra"] = "" ;



echo '<p>BBDD: '.$lnxdatabase.'</p>';

?>

<table border="1">
<tr>
<th>TABLA</th>
<th>CAMPOS</th>
<th>Tipo campo</th>
<th>Extra</th>
</tr>

<?php

foreach ($maestro as $tabla => $valor) {
    $nombretabla = $prefixsql.$tabla;




    $sqlaux = $mysqli->query("SELECT count(*) as contador FROM information_schema.tables WHERE table_schema = '".$lnxdatabase."' AND table_name = '".$nombretabla."' limit 1 "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $existetabla = $rowaux["contador"];

    if($existetabla == '0')
    {
        array_push($err_tablas, $nombretabla);
        $colortabla = 'bgcolor="#FA5882"';
    }
    else 
    {
        $colortabla = '';
    }

    echo '<tr '.$colortabla.'><td colspan="4"><b>'.$nombretabla.'</b></td></tr>';
    

    //Añadimos todos los campos de la tabla
    $cnssql= $mysqli->query("SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".$lnxdatabase."' AND TABLE_NAME = '".$nombretabla."'");	
    while($col = mysqli_fetch_array($cnssql))
    {
        $destino[$nombretabla][] = $col["COLUMN_NAME"];
        
    }

       

    foreach ($maestro[$tabla] as $campo => $campodetail) {
        
        $error_campos = 0;
        
        
        $sqlaux = $mysqli->query("SELECT count(*) as contador FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".$lnxdatabase."' AND TABLE_NAME = '".$nombretabla."' AND COLUMN_NAME = '".$campo."'");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $existe_campo = $rowaux["contador"];

        
        if($existe_campo == '0')
        {
            $colorcampo = 'bgcolor="#FA5882"'; 
            $error_campos = $error_campos +1;         
        }
        else 
        {
            //Si el campo existe, lo eliminamos del array que comprueba que campos hay en la tabla
            foreach (array_keys($destino[$nombretabla], $campo) as $deskey) 
            {
                unset($destino[$nombretabla][$deskey]);
            }    
        }





        $sqlaux = $mysqli->query("show COLUMNS from ".$prefixsql.$tabla." like '".$campo."'"); 
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $campo_tipo = $rowaux["Type"];
            $campo_key = $rowaux["Key"];
            $campo_extra = $rowaux["Extra"];

        foreach ($maestro[$tabla][$campo] as $propiedad => $valor) {
            
            if($propiedad == "tipo")
            {
                $tbl_tipo = $valor;
                if($maestro[$tabla][$campo]["tipo"] == $campo_tipo)
                {
                    $colorcampotipo = ''; 
                }
                else
                {
                    $colorcampotipo = 'bgcolor="#FA5882"'; 
                    $error_campos = $error_campos + 1;
                    $lbl_error_tipocampo = $tabla." --> ".$campo." (no coinciden los tipos de campo";
                    array_push($err_tipocampo, $lbl_error_tipocampo);
                }
                
            
            }
            if($propiedad == "extra"){$tbl_extra = $valor;}

        }

        if($campo_extra <> $tbl_extra){$error_campos = $error_campos + 1;}

        if($error_campos > 0)
        {
            if($existe_campo == '0')
            {
                $lbl_error_tabla = $nombretabla." - ".$campo." (NO existe el campo)";
            }
            else 
            {
                $lbl_error_tabla = $nombretabla." - ".$campo;    
            }
            
            array_push($err_campos, $lbl_error_tabla);
            $colorcampo = 'bgcolor="#FA5882"'; 
        }
        else 
        {
            $colorcampo = '';
        }

        echo '<tr><td></td><td '.$colorcampo.'>'.$campo.'</td><td '.$colorcampotipo.'>'.$tbl_tipo.'</td><td>'.$campo_extra.'</td></tr>';
     


    }

    if(count($destino[$nombretabla]) > 0)
    {
        $colorcampo = 'bgcolor="#FA5882"';
    }
    else 
    {
        $colorcampo = '';    
    }
    echo '<tr '.$colorcampo.'><td></td><td colspan="2">Campos existentes</td><td>';
    
    foreach ($destino[$nombretabla] as $deskey => $desvalue) {
        echo $deskey." - ".$desvalue."</br>";
    }
    
    echo '</td></tr>';

}


?>


</table>

<h2>Errores</h2>
<h3>Tablas NO existen</h3>
</ul>
<?php
foreach ($err_tablas as $errtabla => $valorerror) {
echo '<li>'.$errtabla.' - '.$valorerror.'</li>';
}
?>
</ul>

<h3>Errores en campos</h3>
</ul>
<?php
foreach ($err_campos as $errcampos => $valorerror) {
echo '<li>'.$valorerror.'</li>';
}
?>
</ul>

<h3>Modificar el tipo de campo</h3>
</ul>
<?php
foreach ($err_tipocampo as $errcampos => $valorerror) {
echo '<li>'.$valorerror.'</li>';
}
?>
</ul>

<h3>Campos existentes y que hay que borrar</h3>
</ul>
<?php
foreach ($destino as $idtabla => $nomtabla) 
{
    foreach ($destino[$idtabla] as $tblkey => $nomcampo) 
    {
        echo '<li>'.$idtabla." - ".$nomcampo.'</li>';
    }
        
}
?>
</ul>
<p>&nbsp;</p>
<p>&nbsp;</p>
