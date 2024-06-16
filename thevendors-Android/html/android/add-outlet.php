<?php
include("includes/company_db.php");
if (!isset($_SESSION['android_login'])) {
    header('location:login.php');
}
$user = $_SESSION['user_id'];
$date = date("Y/m/d");
$attendance_check = mysqli_query($company_db, "SELECT * FROM `attendance` WHERE `user_id`='$user' and attendance = 1 and attendance_date='$date'");
if (mysqli_num_rows($attendance_check) == 0) {
    header('location:attendance.php');
}

$route = mysqli_query($company_db, "SELECT r.*,r1.* FROM route_plan r,routes r1 WHERE r.user_id='$user' and r.assigned_date='$date' and r.route_id=r1.route_id");
while ($row = mysqli_fetch_assoc($route)) {
    $route_id = $row['route_id'];
    $r = $row['route_name'];
}
?>

<!doctype html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login | The Vendors</title>


    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->
    <div>
        <div class="sticky-top text-center border-bottom bg-primary align-items-center">
            <div class="pt-3">
                <a href="index.php" class="text-white">Go back</a>
                <h4 class="text-white">Add Outlet</h4>
            </div>
        </div>
    </div>
    <form action="" method="post">

        <div class="position-relative">
            <div class="border-bottom p-2">
                <span class="text-primary"><strong>Beat Name:<?= $r ?></strong></span>
            </div>
            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="mb-2">
                    <label for="outlet_name" class="form-label">Outlet Name</label>
                    <input type="text" name="outlet_name" id="outlet_name" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="phone" class="form-label">Mobile Number</label>
                    <input type="number" name="phone" id="phone" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="outlet_type" class="form-label">Outlet Type</label>
                    <select name="outlet_type" id="outlet_type" class="form-select select2">
                        <?php
                        $type = mysqli_query($company_db, "SELECT * FROM `outlet_type` where status=1");
                        while ($row = mysqli_fetch_assoc($type)) {
                        ?>
                            <option value="<?= $row['outlet_type_id'] ?>"><?= $row['type_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address">
                </div>
                <!-- <div class="mb-2">
                        <button class="btn btn-primary w-100" name="upload_image">Upload Image</button>
                    </div> -->
            </div>
        </div>
        </div>
        <!-- <div class="buy-now">
            <button class="btn btn-danger btn-buy-now">+</button>
        </div> -->

        <div class="fixed-bottom p-5 start-0 text-center">
            <div class="row fixed-bottom p-5">
                <button class="btn btn-primary" type="submit" name="upload_everything" id="add_outlet">Upload Image and Add Outlet</button>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['upload_everything'])) { ?>
        <script>
            AndroidFunction.linkChanger('outlet', '<?= $_SESSION['company'] ?>');
        </script>
    <?php
        $name = $_POST['outlet_name'];
        $phone = $_POST['phone'];
        $type = $_POST['outlet_type'];
        $address = $_POST['address'];
        $c = $_SESSION['company'];
        $db = mysqli_connect('172.16.18.108', 'root', '', "$c");
        mysqli_query($db, "INSERT INTO `outlet`(`outlet_name`, `outlet_number`, `route_id`, `outlet_type`, `address`) VALUES ('$name','$phone','$route_id','$type','$address')");
    }

    ?>
    <script>
        function send_data_to_java() {
            let outlet_name = ''
            let phone = ''
            let outlet_type = ''
            let address = ''
            let route = ''
            let c = ''
            outlet_name = document.getElementById('outlet_name').value;
            phone = document.getElementById('phone').value;
            outlet_type = document.getElementById('outlet_type').value;
            address = document.getElementById('address').value;
            route = '<?= $r ?>'
            c = '<?= $_SESSION['company'] ?>';
            console.log(c)
            console.log(route)

            AndroidFunction.linkChanger('outlet');
            AndroidFunction.sendaurl(outlet_name, phone, outlet_type, address, route, c);
        }
    </script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/pages-auth.js"></script>
    <script>

    </script>
</body>

</html>