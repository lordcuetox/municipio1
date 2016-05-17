<?php

require_once 'funciones.php';
$visitas = 0;
$ipaddress = "";
$file = "";

if (isset($origin) && $origin != "") {
    $file = "count.txt";
} else {
    $file = "php/count.txt";
}

if (isset($_COOKIE["ipaddress"])) {
    $fp = fopen($file, "r");
    $visitas = intval(fgets($fp));
    $ipaddress = getUserIP();
} else {

    $fp = fopen($file, "r");
    $visitas = intval(fgets($fp));
    $visitas++;
    fclose($fp);
    $fp = fopen($file, "w");
    fputs($fp, $visitas);
    $ipaddress = getUserIP();
    setcookie("ipaddress", $ipaddress, time() + (86400 * 1), "/");
}