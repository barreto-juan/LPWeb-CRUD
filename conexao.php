<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "crud_projeto";

    $con = mysqli_connect($host, $user, $pass);

    if (!mysqli_select_db($con, $db)) {
        echo "<pre>". $con->errno . ": " . $con->error. "</pre> </br>";
        exit();
    }

?>