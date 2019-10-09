<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/lugares.controlador.php";
require_once "controladores/reportes.controlador.php";
require_once "controladores/reportes-usuarios.controlador.php";
require_once "controladores/empleados.controlador.php";
require_once "controladores/ventas.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/lugares.modelo.php";
require_once "modelos/reportes.modelo.php";
require_once "modelos/reportes-usuarios.modelo.php";
require_once "modelos/empleados.modelo.php";
require_once "modelos/ventas.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();