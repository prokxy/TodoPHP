<?php
//Connect to a database
        $dbhost = "localhost";
        $dbuser = "username";
        $dbpass = "passwd";
        $dbname = "db1user";
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (!$conn) {
            die("Cannot connect to database " . mysqli_connect_error());
        }
        mysqli_set_charset($conn, "utf8");
        ?>