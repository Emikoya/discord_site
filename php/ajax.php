<?php
session_start();
require '../config/connect-db.php';

global $PDO;

//SELECT
$request = "SELECT user_id FROM user WHERE user_name LIKE '" . $_SESSION['user_name'] . "';";
$response = $PDO->prepare($request);
$response->execute();
$result = $response->fetch(PDO::FETCH_ASSOC);

$user_id = $result['user_id'];
$_SESSION['user'] = $user_id;

//INSERT
$mes_texte = $_POST["texte"];
$mes_date = date('Y-m-d H:i:s');
echo nl2br($_SESSION['user_name'] . ", " . $mes_date . "\n" . $mes_texte . "\n");

$request = "INSERT INTO dis_messages(mes_user, mes_texte, mes_date) VALUES (:mes_user, :mes_texte, :mes_date);"; //PDO STATEMENT
$response = $PDO->prepare($request);
$response->bindParam(':mes_user', $user_id);
$response->bindParam(':mes_texte', $mes_texte);
$response->bindParam(':mes_date', $mes_date);
$response->execute();
