<?php
include("db.php");
if (isset($_POST["login_submit"])) {
    $uname = $_POST['email-username'];
    $pass = $_POST['password'];
    $res = mysqli_query($conn, "SELECT * FROM `other_users` where username = '$uname' and password = '$pass'");
    if (mysqli_num_rows($res) == 0) {
        header("location:../login.php?err");
    } else {
        $row = mysqli_fetch_array($res);
        if ($row['designation'] == 1 || $row['designation'] == 2) {
            header("location:../login.php?notallowed");
        } else {
            session_start();
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["android_login"] = true;
            $_SESSION["uname"] = $row["username"];
            $_SESSION["role"] = $row["designation"];
            $_SESSION["company"] = $row["company_name"];
            header("location:../index.php");
        }
    }
}
