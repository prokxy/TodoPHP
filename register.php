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
    <div class="wrapper">
        <header>
            <h1>Register</h1>
        </header>

        <?php
        session_start();
        //Connect to a database
        include 'db.php';

        if (isset($_POST['login']) && !empty($_POST['login'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $passwd = md5(mysqli_real_escape_string($conn, $_POST['passwd']));

            mysqli_query($conn, "INSERT INTO `10todo_users`(`username`, `passwd`) VALUES ('$username','$passwd')");
            echo "Registrace probehla uspesne";
        ?>
            <a style="text-decoration: underline;" href="index.php">Prihlasit se?</a>
        <?php
        } else {
        ?>
            <form action="" method="post">
                <input type="text" name="username" placeholder="username" value="">
                <input type="password" name="passwd" placeholder="password" value="">
                <input type="submit" name="login" value="Register">
            </form>

        <?php
        }

        ?>


    </div>
</body>

</html>