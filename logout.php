<?php
require 'config/const.php';

// Cerrar sesión
session_destroy();
header('location: ' . ROOT_URL);
die();
