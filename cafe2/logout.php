<?php
session_start(); //sale de la sesion//
session_destroy();
header("Location: index.php");
exit();
