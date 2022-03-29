<?php

require 'config-db.php';

try {
    $PDO = new PDO("$DBDRIVER:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASSWORD);
} catch (Exception $e) {
    echo $e;
}
