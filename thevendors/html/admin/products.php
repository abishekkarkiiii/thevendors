<?php
$page = 'products';
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

    <title>Products | The Vendors</title>

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
                        <p class="h2">Products</p>
                        <div class="card">


                            <div class="card-datatable table-responsive pt-0">

                                <table class="datatable-custom table">
                                    <thead>
                                        <th>#ID</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Unit Per Crt</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $product_query = mysqli_query($company_db, "SELECT p.*,b.brand_name,c.category_name from products p,brand b, category c where p.brand_id=b.brand_id and p.category_id=c.category_id");
                                        while ($row = mysqli_fetch_array($product_query)) {
                                        ?>
                                            <tr>
                                                <td><?= $row['product_id'] ?></td>
                                                <td><?= $row['product_name'] ?></td>
                                                <td><?= $row['price'] ?></td>
                                                <td><?= $row['unitpercrt'] ?></td>
                                                <td><?= $row['brand_name'] ?></td>
                                                <td><?= $row['category_name'] ?></td>
                                                <td class="<?php if ($row['status'] == 1) {
                                                                echo 'text-success';
                                                            } else {
                                                                echo 'text-danger';
                                                            } ?>"><?php if ($row['status'] == 1) {
                                                                        echo 'Active';
                                                                    } else {
                                                                        echo 'Inactive';
                                                                    } ?></td>
                                                <td><button data-bs-target="#edit_product" value="<?= $row['product_id'] ?>" onclick="load_product(this.value)" data-bs-toggle="offcanvas" class="btn btn-primary"><i class="ri-edit-line"></i></button></td>

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
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Add New Product</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
            <form action="includes/php/functions_company.php" method="post" class="mb-4">
                <div class="mb-4">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="price" class="form-label">price per unit</label>
                    <input type="number" step="any" name="price" id="price" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="unitpercrt" class="form-label">Unit Per Case</label>
                    <input type="number" name="unitpercrt" id="unitpercrt" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="brand" class="form-label">Brand</label>
                    <select name="brand" id="brand" class="select2 form-select">
                        <?php
                        $brand = mysqli_query($company_db, "SELECT * FROM `brand`");
                        while ($row = mysqli_fetch_array($brand)) { ?>
                            <option value="<?= $row['brand_id'] ?>"><?= $row['brand_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="Category" class="form-label">Category</label>
                    <select name="Category" id="Category" class="select2 form-select">
                        <?php
                        $cat = mysqli_query($company_db, "SELECT * FROM `category`");
                        while ($row = mysqli_fetch_array($cat)) { ?>
                            <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" name="product_create" class="btn btn-primary mb-2 d-grid w-100">Add</button>
            </form>
            <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">
                Cancel
            </button>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="edit_product" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Edit Product</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
            <form action="includes/php/functions_company.php" method="post" class="mb-4">
                <div class="mb-4">
                    <label for="product_name_edit" class="form-label">Product Name</label>
                    <input type="text" name="product_name_edit" id="product_name_edit" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="price_edit" class="form-label">price per unit</label>
                    <input type="number" step="any" name="price_edit" id="price_edit" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="unitpercrt_edit" class="form-label">Unit Per Case</label>
                    <input type="number" name="unitpercrt_edit" id="unitpercrt_edit" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="brand_edit" class="form-label">Brand</label>
                    <select name="brand_edit" id="brand_edit" class="select2 form-select">
                        <?php
                        $brand = mysqli_query($company_db, "SELECT * FROM `brand`");
                        while ($row = mysqli_fetch_array($brand)) { ?>
                            <option value="<?= $row['brand_id'] ?>"><?= $row['brand_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="Category_edit" class="form-label">Category</label>
                    <select name="Category_edit" id="Category_edit" class="select2 form-select">
                        <?php
                        $cat = mysqli_query($company_db, "SELECT * FROM `category`");
                        while ($row = mysqli_fetch_array($cat)) { ?>
                            <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="hidden" name="id_hide" id="id_hide">
                    <div class="mt-4">
                        <input type="checkbox" name="isactive" id="isactive" class="form-check-input">
                        <label for="isactive" class="form-label">Active</label>
                    </div>
                </div>


                <button type="submit" name="pro_edit" class="btn btn-primary mb-2 d-grid w-100">Save Changes</button>
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

        function load_product(x) {
            $.ajax({
                url: 'includes/php/functions_ajax.php?fun=load_product&val=' + x,
                type: 'GET',
                success: function(res) {
                    res = JSON.parse(res);
                    console.log(res);
                    document.getElementById('product_name_edit').value = res[0].product_name;
                    document.getElementById('price_edit').value = res[0].price;
                    document.getElementById('unitpercrt_edit').value = res[0].unitpercrt;
                    document.getElementById('brand_edit').value = res[0].brand_id;
                    document.getElementById('Category_edit').value = res[0].category_id;
                    document.getElementById('id_hide').value = res[0].product_id;
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