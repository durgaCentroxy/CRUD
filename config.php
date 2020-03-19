<?php
    define('server','localhost');
    define('user','root');
    define('password','');
    define('dbname','demo');

    // this is for procedural oriented
    $connection = mysqli_connect(server, user, password, dbname);

    // object-oriented
    // $connection = new mysqli(server, user, password, dbname);

    // checking the connection
    if($connection === false){
        // this is for procedural oriented
        die("ERROR: could not connect" . mysqli_connect_error());

        // object-oriented
        // die("ERROR: could not connect" . $connection->connect_error);
    }
?>