<?php

    $db = mysqli_connect("localhost","root","","cesa");

    if(!$db)
    {
        die("Connection failed: ".mysqli_connect_error());
    }

    echo "Connectd succesfully";
