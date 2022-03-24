<?php
session_start();
$_SESSION["host"]="localhost";
$_SESSION["domain"]="http://localhost/Cabinet_Veterinaire";
define("HOST",$_SESSION["host"]);
define("USER","root");
define("PASS","");
define("DB","animaux_v");
define("DOMAIN",$_SESSION["domain"]);

?>