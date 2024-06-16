<?php

if (isset($_POST["image"]) && isset($_POST['user'])) {
    $c = $_POST['company'];
    $conn = mysqli_connect('localhost', 'root', '', "$c");
    $user = $_POST['user'];
    $l1 = $_POST['longitude'];
    $l2 = $_POST['latitude'];
    $date = date('Y-m-d H:i:s');
    $file_name = $user . '_' . date("d-m-y") . '-' . time() . '.jpg';
    if (file_put_contents("attendance_images/" . $file_name, base64_decode($_POST['image']))) {
        mysqli_query($conn, "INSERT INTO `attendance`(`attendance`, `user_id`, `attendance_image`,`longitute`, `latitude`,`attendance_date`) VALUES ('1','$user','$file_name','$l1','$l2','$date')");
    }
} else {
    echo "hawa";
}
