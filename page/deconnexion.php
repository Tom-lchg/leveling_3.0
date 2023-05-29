<?php
session_destroy();
require('connexion.php');
header('Location: /?page=connexion');
