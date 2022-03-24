<?php

session_start();
unset($_SESSION);
session_destroy();
header('Location: http://localhost:8080/Cabinet_Veterinaires/');

?>

