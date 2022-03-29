<?php
session_start();

$content = "<div id='entete'><h1>#lesalon</h1></div>";
$content .= "<div id='co'>Name : " . $_SESSION['user_name'] . "</div>";
$content .= "<div id='affichage'></div>";
$content .= "<textarea id='publie' placeholder='Envoyer un message dans #lesalon'></textarea>";

require 'Views/gabarit.php';
