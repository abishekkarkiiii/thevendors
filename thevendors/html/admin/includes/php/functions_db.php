<?php
function login($email, $password)
{
    require("db.php");
    $username_email = $email;
    $password_email = $password;
    if (str_contains($username_email, '@')) {
        $login_query = "SELECT * FROM `users` where `email`='$username_email' and `password` ='$password_email'";
    } else {
        $login_query = "SELECT * FROM `users` where `username`='$username_email' and `password` ='$password_email'";
    }
    $login_result = mysqli_query($conn, $login_query);
    if (mysqli_num_rows($login_result) > 0) {
        $row = mysqli_fetch_array($login_result);
        session_start();
        $_SESSION['uname'] = $row["username"];
        $_SESSION['company'] = $row['company_name'];
        $_SESSION['fname'] = $row['first_name'];
        $_SESSION['lname'] = $row['last_name'];
        $_SESSION['role'] = 1;
        // include('company_db.php');
        // $db = strtolower(str_replace(' ', '', $row['company_name']));
        // mysqli_select_db($company_db, $db);

        return 1;
    } else {
        $login_query = "SELECT * FROM `other_users` where `username`='$username_email' and status=1 and `password` ='$password_email' and status=1";
        $login_result = mysqli_query($conn, $login_query);
        if (mysqli_num_rows($login_result) > 0) {
            session_start();
            $row = mysqli_fetch_array($login_result);
            $_SESSION['uname'] = $row["username"];
            $_SESSION['company'] = $row['company_name'];
            $_SESSION['fname'] = $row['first_name'];
            $_SESSION['lname'] = $row['last_name'];
            $_SESSION['role'] = $row['designation'];
            if ($row['designation'] == 4) {
                return 3;
            }
            // include('company_db.php');
            // $db = strtolower(str_replace(' ', '', $row['company_name']));
            // mysqli_select_db($company_db, $db);
            return 1;
        } else {

            return 2;
        }
    }
}
function logout()
{
    session_start();
    unset($_SESSION['islogined']);
    unset($_SESSION['uname']);
    unset($_SESSION['company']);
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);
    unset($_SESSION['role']);
    header('location:login.php');
}
