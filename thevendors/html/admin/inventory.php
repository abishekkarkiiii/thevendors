<?php
$page = 'inventory';
include('includes/php/company_db.php');
if (isset($_SESSION["islogined"])) {
} else {

    header("location:login.php");
}
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>The Vendors</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="stylesheet" href="assets/vendor/fonts/remixicon/remixicon.css" />
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
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />
    <!-- Page CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/pages/cards-statistics.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/pages/cards-analytics.css" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php
            require("includes/php/sidebar.php");
            ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php
                require("includes/php/nav.php");
                ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="container">
                            <form action="" method="post">

                                <div class="row">
                                    <div class="col-auto">
                                        <select name="dis" id="dis" class="form-select">
                                            <?php
                                            $dis = mysqli_query($company_db, "SELECT * from distributors");
                                            while ($row = mysqli_fetch_assoc($dis)) { ?>
                                                <option value="<?= $row['dis_id'] ?>"><?= $row['dis_name'] ?></option>
                                            <?php   }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-auto mt-1">
                                        <button type="submit" class="btn btn-primary">View</button>
                                    </div>
                                    <div class="col-auto mt-1">
                                        <a href="add-inventory.php" class="btn btn-primary">ADD</a>
                                    </div>
                            </form>
                        </div>
                        <?php
                        if (isset($_POST['dis'])) {
                        ?>
                            <table class="table mt-3">
                                <thead>
                                    <th>#ID</th>
                                    <th>Product Name</th>
                                    <th>Crt</th>
                                    <th>Pcs</th>
                                </thead>
                                <tbody>
                                    <?php

                                    $main_query = "SELECT * FROM stocks_dis_details where dis_id=" . $_POST['dis'];
                                    $main_result = mysqli_query($company_db, $main_query);
                                    while ($row = mysqli_fetch_assoc($main_result)) {
                                    ?>
                                        <tr>
                                            <td><?= $row['product_id'] ?></td>
                                            <td><?php
                                                $pro = mysqli_query($company_db, "SELECT * FROM products where product_id =" . $row['product_id']);
                                                while ($r = mysqli_fetch_assoc($pro)) {
                                                    echo $r['product_name'];
                                                }
                                                ?></td>
                                            <td><?= $row['crt'] ?></td>
                                            <td><?= $row['pcs'] ?></td>
                                        </tr>
                                    <?php

                                    }
                                    ?>
                                </tbody>
                            </table>

                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <?php
                include("includes/php/footer.php");
                ?>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

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
    <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../../assets/vendor/libs/swiper/swiper.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/dashboards-analytics.js"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>


    <script src="includes/js/datatable.js"></script>
    <script>
        $('.btn-group').append('1');
    </script>
</body>

</html>