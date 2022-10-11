<?php
if ($_GET["section"] == 'screens' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Listado de screens";}
if ($_GET["section"] == 'screens' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nuevo screen";}
if ($_GET["section"] == 'screens' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando screen";}
if ($_GET["section"] == 'screens' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar screen";}


if ($_GET["section"] == 'menus' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Configuración menu principal";}
if ($_GET["section"] == 'menus' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nuevo elemento - menu principal";}
if ($_GET["section"] == 'menus' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando elemento - menu principal";}
if ($_GET["section"] == 'menus' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar elemento - menu principal";}

if ($_GET["section"] == 'printers' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Impresoras";}
if ($_GET["section"] == 'printers' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nueva Impresora";}
if ($_GET["section"] == 'printers' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando Impresora";}
if ($_GET["section"] == 'printers' && $_GET["action"] == 'delete') {$numscreen = ""; $displaytitle = "Eliminar Impresora";}


if ($_GET["section"] == 'series' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nueva serie";}
if ($_GET["section"] == 'series' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando serie";}


if ($_GET["section"] == 'empresas' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Empresas";}
if ($_GET["section"] == 'empresas' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nueva empresa";}
if ($_GET["section"] == 'empresas' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando empresa";}
if ($_GET["section"] == 'empresas' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar empresa";}

if ($_GET["section"] == 'users' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Usuarios";}
if ($_GET["section"] == 'users' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nuevo usuario";}
if ($_GET["section"] == 'users' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando usuario";}
if ($_GET["section"] == 'users' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar usuario";}

if ($_GET["section"] == 'users' && $_GET["action"] == 'login') {$numscreen = ""; $displaytitle = "Configurar inicio de sesión";}

if ($_GET["section"] == 'groups' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Grupos";}
if ($_GET["section"] == 'groups' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nuevo grupo";}
if ($_GET["section"] == 'groups' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando grupo";}
if ($_GET["section"] == 'groups' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar grupo";}

if ($_GET["section"] == 'sesiones' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Sessiones";}


if ($_GET["section"] == 'dic' && $_GET["subs"] == '' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Diccionarios";}
if ($_GET["section"] == 'dic' && $_GET["subs"] == 'actividades' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Actividades de negocio";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'actividades' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nueva actividad de negocio";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'actividades' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando Actividad de negocio";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'actividades' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar Actividad de negocio";}
if ($_GET["section"] == 'dic' && $_GET["subs"] == 'lopdcats' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Categorias GDPR";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'lopdcats' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nueva categoría GDPR";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'lopdcats' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando categoría GDPR";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'lopdcats' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar categoría GDPR";}
if ($_GET["section"] == 'dic' && $_GET["subs"] == 'tfp' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Documentos-series";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'tfp' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nuevo Documento-serie";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'tfp' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando Documento-serie";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'tfp' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar Documento-serie";}
if ($_GET["section"] == 'dic' && $_GET["subs"] == 'paises' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Paises";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'paises' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nuevo pais";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'paises' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando pais";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'paises' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar pais";}
if ($_GET["section"] == 'dic' && $_GET["subs"] == 'tt' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Tipo tercero";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'tt' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nuevo tipo tercero";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'tt' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando tipo tercero";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'tt' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar tipo tercero";}
if ($_GET["section"] == 'dic' && $_GET["subs"] == 'tvinc' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Vinculación terceros";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'tvinc' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nueva vinculación entre terceros";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'tvinc' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando vinculación entre terceros";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'tvinc' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar vinculación entre terceros";}
if ($_GET["section"] == 'dic' && $_GET["subs"] == 'idiomas' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Idiomas";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'idiomas' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nuevo idioma";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'idiomas' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando idioma";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'idiomas' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar idioma";}
if ($_GET["section"] == 'dic' && $_GET["subs"] == 'zonacom' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Zonas comerciales";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'zonacom' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nueva zona comercial";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'zonacom' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando zona comercial";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'zonacom' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar zona comercial";}
if ($_GET["section"] == 'dic' && $_GET["subs"] == 'pobla' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Poblaciones";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'pobla' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nueva poblacion";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'pobla' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando poblacion";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'pobla' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar poblacion";}
if ($_GET["section"] == 'dic' && $_GET["subs"] == 'prov' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Provincias";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'prov' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nueva provincia";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'prov' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando provincia";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'prov' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar provincia";}
if ($_GET["section"] == 'dic' && $_GET["subs"] == 'permisos' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Permisos";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'permisos' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nuevo permiso";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'permisos' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando permiso";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'permisos' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar permiso";}
if ($_GET["section"] == 'dic' && $_GET["subs"] == 'terhisto' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Config. Historio terceros";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'terhisto' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nueva tabla historico terceros";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'terhisto' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando tabla historico terceros";}
    if ($_GET["section"] == 'dic' && $_GET["subs"] == 'terhisto' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar tabla historico terceros";}



if ($_GET["section"] == 'modulos' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Módulos";}
    if ($_GET["section"] == 'modulos' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nuevo módulo";}
    if ($_GET["section"] == 'modulos' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando módulo";}
    if ($_GET["section"] == 'modulos' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Eliminar módulo";}

if ($_GET["section"] == 'regblock' ){$numscreen = ""; $displaytitle = "Registros bloqueados";}


if ($_GET["section"] == 'etiendas' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Listado de Tiendas/Sucursales";}
if ($_GET["section"] == 'etiendas' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nueva Tienda / Sucursal";}
if ($_GET["section"] == 'etiendas' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando Tienda / Sucursal";}
    if ($_GET["section"] == 'etiendas' && $_GET["action"] == 'editterm') {$numscreen = ""; $displaytitle = "Editando Terminal";}
if ($_GET["section"] == 'etiendas' && $_GET["action"] == 'delete') {$numscreen = ""; $displaytitle = "Eliminar Tienda / Sucursal";}
    if ($_GET["section"] == 'etiendas' && $_GET["action"] == 'delterm') {$numscreen = ""; $displaytitle = "Eliminar Terminal";}

if ($_GET["section"] == 'impuestos' && $_GET["action"] == ''){$numscreen = ""; $displaytitle = "Impuestos";}
if ($_GET["section"] == 'impuestos' && $_GET["action"] == 'new'){$numscreen = ""; $displaytitle = "Nuevo impuesto";}
if ($_GET["section"] == 'impuestos' && $_GET["action"] == 'edit' ){$numscreen = ""; $displaytitle = "Editando impuesto";}
if ($_GET["section"] == 'impuestos' && $_GET["action"] == 'delete' ){$numscreen = ""; $displaytitle = "Eliminar impuesto";}

if ($_GET["section"] == 'series' && $_GET["action"] == ''){$numscreen = ""; $displaytitle = "Series";}
if ($_GET["section"] == 'series' && $_GET["action"] == 'new'){$numscreen = ""; $displaytitle = "Nueva serie";}
if ($_GET["section"] == 'series' && $_GET["action"] == 'edit' ){$numscreen = ""; $displaytitle = "Editando serie";}
if ($_GET["section"] == 'series' && $_GET["action"] == 'delete' ){$numscreen = ""; $displaytitle = "Eliminar serie";}

if($_GET["section"] == 'docprint'){$numscreen = ""; $displaytitle = "Informes y listados";}

if($_GET["section"] == 'notifica'){$numscreen = ""; $displaytitle = "Configuración notificaciones";}
?>