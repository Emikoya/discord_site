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


//SELECT message
$request = "SELECT user_name, mes_texte, mes_date FROM dis_messages INNER JOIN user ON dis_messages.mes_user = user.user_id WHERE mes_user NOT LIKE '" . $_SESSION['user'] . "' AND mes_date > DATE_ADD(DATE_FORMAT(now(), '%Y-%m-%d %H:%i:%s'), INTERVAL -4 SECOND);";
$response = $PDO->prepare($request);
$response->execute();
$tab = $response->fetchAll(PDO::FETCH_ASSOC);


file_put_contents("../js/message.json", json_encode($tab));

// if ($tab != NULL) {
//     foreach ($tab as $value) {
//         $nom = $value["user_name"];
//         $texte = $value["mes_texte"];
//         $date = $value["mes_date"];
//         echo ('<div>' . $nom . ", " . $date . '</br>' . $texte . '</br' . '</div>');
//     }
// }
