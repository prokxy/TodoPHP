<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoApp</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <nav>
        <form action="" method="post">
            <input type="submit" name="logout" id="logout" value="logout">
        </form>

    </nav>
    <div class="wrapper">
        <header>
            <h1>TodoApp</h1>
        </header>
        <?php
        // start session
        session_start();
        //Connect to a database
        include 'db.php';

        if (isset($_POST['login'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $passwd = mysqli_real_escape_string($conn, $_POST['passwd']);

            $result = mysqli_query($conn, "SELECT * FROM `10todo_users` WHERE `username` = '$username' ");
            if ($row = mysqli_fetch_assoc($result)) {
                $passwddb = $row["passwd"];
                if (md5($passwd) == $passwddb) {
                    $_SESSION['username'] = $username;
                } else {
                    echo "Spatne heslo xD";
                }
            } else {
                echo "a ty si kdo jako?";
            }
        }

        if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
            include 'todo.php';
        } else {
        ?>
            <form action="" method="post">
                <input type="text" name="username" placeholder="username" value="">
                <input type="password" name="passwd" placeholder="password" value="">
                <input type="submit" name="login" value="Login">
            </form>
            <a href="register.php">New here?</a>
        <?php
        }


        function logout()
        {
            echo "<h1>REFRESH PLS(WIP)</h1>";
            unset($_SESSION['username']);
        }
        if (array_key_exists('logout', $_POST)) {
            logout();
        }
        ?>


    </div>
</body>
