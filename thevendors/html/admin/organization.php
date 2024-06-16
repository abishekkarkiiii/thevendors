<?php
$page = 'organization';
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
                        <p class="h2">Distributors</p>
                        <div class="card">


                            <div class="card-datatable table-responsive pt-0">

                                <table class="datatable-custom table">
                                    <thead>
                                        <th>#ID</th>
                                        <th>Distributor Name</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>PAN/VAT</th>
                                        <th>Zone</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $dis = mysqli_query($company_db, 'SELECT d.*,z.zone_name FROM distributors d,zones z where d.zones = z.zone_id');
                                        while ($row = mysqli_fetch_assoc($dis)) {
                                        ?>
                                            <tr>
                                                <td><?= $row['dis_id'] ?></td>
                                                <td><?= $row['dis_name'] ?></td>
                                                <td><?= $row['address'] ?></td>
                                                <td><?= $row['phone_number'] ?></td>
                                                <td><?= $row['pan_no'] ?></td>
                                                <td><?= $row['zone_name'] ?></td>
                                                <td class="<?php if ($row['status'] == 1) {
                                                                echo 'text-success';
                                                            } else {
                                                                echo 'text-danger';
                                                            } ?>"><?php if ($row['status'] == 1) {
                                                                        echo 'Active';
                                                                    } else {
                                                                        echo 'Inactive';
                                                                    } ?></td>
                                                <td><button data-bs-toggle="offcanvas" value="<?= $row['dis_id'] ?>" onclick="load_dis_data(this.value)" data-bs-target="#edit_dis" class="btn btn-primary"><i class="ri-edit-line"></i></button></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Add New Distributor</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
            <form action="includes/php/functions_company.php" method="post" class="mb-4">
                <div class="mb-2">
                    <label for="dis_name" class="form-label">Distributor Name</label>
                    <input type="text" class="form-control" name="dis_name" id="dis_name">
                </div>
                <div class="mb-2">
                    <label for="dis_address" class="form-label">Distributor Address</label>
                    <textarea name="dis_address" rows="2" id="dis_address" class="form-control"></textarea>
                </div>
                <div class="mb-2">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="number" name="phone" class="form-control" id="phone">
                </div>
                <div class="mb-2">
                    <label for="VAT" class="form-label">PAN/VAT</label>
                    <input type="number" name="VAT" class="form-control" id="VAT">
                </div>
                <div class="mb-2">
                    <label for="zone" class="form-label">Zone</label>
                    <select name="zone" id="zone" class="select2 form-select">
                        <?php
                        $zone = mysqli_query($company_db, 'select * from zones');
                        while ($z = mysqli_fetch_assoc($zone)) { ?>
                            <option value="<?= $z['zone_id'] ?>"><?= $z['zone_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" name="dis_create" class="btn btn-primary mb-2 d-grid w-100">Add</button>
            </form>
            <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">
                Cancel
            </button>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="edit_dis" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Edit Distributor</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
            <form action="includes/php/functions_company.php" method="post" class="mb-4">
                <div class="mb-2">
                    <label for="dis_name_edit" class="form-label">Distributor Name</label>
                    <input type="text" class="form-control" name="dis_name_edit" id="dis_name_edit">
                </div>
                <div class="mb-2">
                    <label for="dis_address_edit" class="form-label">Distributor Address</label>
                    <textarea name="dis_address" rows="2" id="dis_address_edit" class="form-control"></textarea>
                </div>
                <div class="mb-2">
                    <label for="phone_edit" class="form-label">Phone Number</label>
                    <input type="number" name="phone_edit" class="form-control" id="phone_edit">
                </div>
                <div class="mb-2">
                    <label for="VAT_edit" class="form-label">PAN/VAT</label>
                    <input type="number" name="VAT_edit" class="form-control" id="VAT_edit">
                </div>
                <div class="mb-2">
                    <input type="checkbox" name="isactive" id="isactive" class="form-check-input">
                    <label for="isactive" class="form-label">Active</label>
                    <input type="hidden" name="id_hide" id="id_hide">
                </div>


                <button type="submit" name="dis_edit" class="btn btn-primary mb-2 d-grid w-100">Save Changes</button>
            </form>
            <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">
                Cancel
            </button>
        </div>
    </div>
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
        $(document).ready(function() {
            $('.offcan').attr('data-bs-toggle', 'offcanvas');
            $('.offcan').attr('data-bs-target', '#offcanvasEnd');
            $('.offcan').attr('aria-controls', 'offcanvasEnd');
        });
        $('.btn-group').append('1');

        function load_dis_data(x) {
            $.ajax({
                url: 'includes/php/functions_ajax.php?fun=load_dis_edit&val=' + x,
                type: 'GET',
                success: function(res) {
                    res = JSON.parse(res);
                    // console.log(res);
                    document.getElementById('dis_name_edit').value = res[0].dis_name;
                    document.getElementById('dis_address_edit').value = res[0].address;
                    document.getElementById('phone_edit').value = res[0].phone_number;
                    document.getElementById('VAT_edit').value = res[0].pan_no;
                    document.getElementById('id_hide').value = res[0].dis_id;
                    if (res[0].status == 1) {
                        document.getElementById('isactive').checked = true;
                    } else {
                        document.getElementById('isactive').checked = false;

                    }

                }
            })

        }
    </script>
</body>

</html>