<?php
include("includes/company_db.php");
if (!isset($_SESSION['android_login'])) {
    header('location:login.php');
}
$user = $_SESSION['user_id'];
$view_dis = mysqli_query($company_db, "select * from distributor_user_link where user_id=" . $user);
$view_dis = mysqli_fetch_array($view_dis);
$dis_id = $view_dis["dis_id"];
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
$outlet_id = $_GET['id'];

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
                <!-- <a href="index.php" class="text-white">Go back</a> -->
                <h4 class="text-white">New Call</h4>
            </div>
        </div>
    </div>
    <form action="includes/functions_functions.php" method="post">
        <input type="hidden" name="outlet" value="<?= $outlet_id ?>">
        <input type="hidden" name="dis" value="<?= $dis_id ?>">

        <div class="position-relative">
            <div class="accordion mt-4" id="accordionExample">
                <div class="accordion-item active">
                    <h2 class="accordion-header" id="headingOne">
                        <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                            Stocks
                        </button>
                    </h2>

                    <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php
                            $product = mysqli_query($company_db, "Select * from stocks_dis_details where dis_id=" . $dis_id);
                            while ($row = mysqli_fetch_assoc($product)) {
                                $pro_name = mysqli_query($company_db, "select * from products where product_id=" . $row['product_id']);
                                $product_name = mysqli_fetch_assoc($pro_name);
                            ?>
                                <label for="" class="form-label"><?= $product_name['product_name'] ?></label>
                                <input type="hidden" name="pro_id_stock[]" value="<?= $product_name['product_id'] ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group bg-white mb-3">
                                            <input type="number" name="crt_stock[]" class="form-control">
                                            <span class="input-group-text">Crt</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group bg-white mb-3">
                                            <input type="number" name="pcs_stock[]" class="form-control">
                                            <span class="input-group-text">Pcs</span>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                            Order
                        </button>
                    </h2>
                    <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php
                            $product = mysqli_query($company_db, "Select * from stocks_dis_details where dis_id=" . $dis_id);
                            while ($row = mysqli_fetch_assoc($product)) {
                                $pro_name = mysqli_query($company_db, "select * from products where product_id=" . $row['product_id']);
                                $product_name = mysqli_fetch_assoc($pro_name);
                            ?>
                                <label for="" class="form-label"><?= $product_name['product_name'] ?></label>
                                <input type="hidden" name="pro_id_order[]" value="<?= $product_name['product_id'] ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group bg-white mb-3">
                                            <input type="number" name="crt_order[]" class="form-control">
                                            <span class="input-group-text">Crt</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group bg-white mb-3">
                                            <input type="number" name="pcs_order[]" class="form-control">
                                            <span class="input-group-text">Pcs</span>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-bottom p-5 start-0 text-center">
            <div class="row fixed-bottom p-5">
                <button class="btn btn-primary" type="submit" name="add_call" id="add_outlet">Upload Stock and Order</button>
            </div>
        </div>

    </form>
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