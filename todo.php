<?php
if (isset($_SESSION['username'])){

//Insert into database
if (isset($_POST["todo"])) {
    $todo = htmlentities(strip_tags($_POST["todo"]));
    $sql = "INSERT INTO `10todo` (`ID`, `username`, `todo`, `done`) VALUES (NULL, '{$_SESSION['username']}', '$todo', '0');";
    //echo $sql;
    mysqli_query($conn, $sql);
}
?>

<section>
    <form action="" method="POST">
        <input type="text" name="todo" placeholder="Your todo">
        <input type="submit" value="Add">
    </form>
</section>

<section class="todos">
    <?php
    //Done
    if (isset($_GET["done"])) {
        $done = intval($_GET["done"]);
        $sql = "UPDATE `10todo` SET `done` = '1' WHERE `10todo`.`ID` = $done;";
        mysqli_query($conn, $sql);
    }
    //Undone
    if (isset($_GET["undone"])) {
        $undone = intval($_GET["undone"]);
        $sql = "UPDATE `10todo` SET `done` = '0' WHERE `10todo`.`ID` = $undone;";
        mysqli_query($conn, $sql);
    }
    //Delete
    if (isset($_GET["delete"])) {
        $delete = intval($_GET["delete"]);
        $sql = "DELETE FROM `10todo` WHERE `10todo`.`ID` = $delete;";
        mysqli_query($conn, $sql);
    }

    //Show todos from database
    $sql = "SELECT * FROM `10todo` WHERE `username` = '{$_SESSION['username']}'";
    $rc = mysqli_query($conn, $sql);
    $rc = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($rc)) {
    ?>
        <div class="todo">

            <?php
            if ($row["done"] == 0) {
            ?>
                <a href="?done=<?php echo $row["ID"]; ?>"><span class="material-symbols-outlined hover"></span></a>
                <div class="name"><?php echo $row["todo"]; ?></div>
                <p></p>
            <?php
            } else {
            ?>
                <a href="?undone=<?php echo $row["ID"]; ?>"><span class="material-symbols-outlined">check_circle</span></a>
                <div class="name"><?php echo $row["todo"]; ?></div>
                <a href="?delete=<?php echo $row["ID"]; ?>"><span class="material-symbols-outlined">delete</span></a>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
</section>
    
<?php
} else {
    die("co delas more");
}
?>