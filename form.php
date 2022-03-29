<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user_name'] = $_POST['nameuser'];
    if ($_SESSION['user_name'] == 'Pierre') {
        header('Location: index.php');
        exit;
    } else if ($_SESSION['user_name'] == 'Paul') {
        header('Location: index.php');
        exit;
    }
} else {
    $content = '<div id="formulaire">';
    $content .= '<p> Saisissez votre nom </p>';
    $content .= '<form action="form.php", method="POST">';
    $content .= '<input type="text" name="nameuser"/> </br>';
    $content .= '<input type="submit" value="Envoyer">';
    $content .= '</form>';
    $content .= '</div>';
    require 'Views/gabarit.php';
}

function verif($nameuser)
{
    global $PDO;
    $request = "SELECT user_id FROM user WHERE user_name = :nameuser";
    $response = $PDO->prepare($request);
    $response->bindParam(':nameuser', $nameuser);
    $response->execute();
    printf($response);
}
