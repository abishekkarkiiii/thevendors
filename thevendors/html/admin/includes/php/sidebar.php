<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.php" class="app-brand-link">
            <span class="app-brand-logo demo">
                <span style="color: var(--bs-primary)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 13.2422V20H22V22H2V20H3V13.2422C1.79401 12.435 1 11.0602 1 9.5C1 8.67286 1.22443 7.87621 1.63322 7.19746L4.3453 2.5C4.52393 2.1906 4.85406 2 5.21132 2H18.7887C19.1459 2 19.4761 2.1906 19.6547 2.5L22.3575 7.18172C22.7756 7.87621 23 8.67286 23 9.5C23 11.0602 22.206 12.435 21 13.2422ZM19 13.9725C18.8358 13.9907 18.669 14 18.5 14C17.2409 14 16.0789 13.478 15.25 12.6132C14.4211 13.478 13.2591 14 12 14C10.7409 14 9.5789 13.478 8.75 12.6132C7.9211 13.478 6.75911 14 5.5 14C5.331 14 5.16417 13.9907 5 13.9725V20H19V13.9725ZM5.78865 4L3.35598 8.21321C3.12409 8.59843 3 9.0389 3 9.5C3 10.8807 4.11929 12 5.5 12C6.53096 12 7.44467 11.3703 7.82179 10.4295C8.1574 9.59223 9.3426 9.59223 9.67821 10.4295C10.0553 11.3703 10.969 12 12 12C13.031 12 13.9447 11.3703 14.3218 10.4295C14.6574 9.59223 15.8426 9.59223 16.1782 10.4295C16.5553 11.3703 17.469 12 18.5 12C19.8807 12 21 10.8807 21 9.5C21 9.0389 20.8759 8.59843 20.6347 8.19746L18.2113 4H5.78865Z"></path>
                    </svg>
                </span>
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2"><?php
                                                                            echo $_SESSION['company'];
                                                                            ?></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.47365 11.7183C8.11707 12.0749 8.11707 12.6531 8.47365 13.0097L12.071 16.607C12.4615 16.9975 12.4615 17.6305 12.071 18.021C11.6805 18.4115 11.0475 18.4115 10.657 18.021L5.83009 13.1941C5.37164 12.7356 5.37164 11.9924 5.83009 11.5339L10.657 6.707C11.0475 6.31653 11.6805 6.31653 12.071 6.707C12.4615 7.09747 12.4615 7.73053 12.071 8.121L8.47365 11.7183Z" fill-opacity="0.9" />
                <path d="M14.3584 11.8336C14.0654 12.1266 14.0654 12.6014 14.3584 12.8944L18.071 16.607C18.4615 16.9975 18.4615 17.6305 18.071 18.021C17.6805 18.4115 17.0475 18.4115 16.657 18.021L11.6819 13.0459C11.3053 12.6693 11.3053 12.0587 11.6819 11.6821L16.657 6.707C17.0475 6.31653 17.6805 6.31653 18.071 6.707C18.4615 7.09747 18.4615 7.73053 18.071 8.121L14.3584 11.8336Z" fill-opacity="0.4" />
            </svg>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->

        <li class="menu-item <?php echo $page == 'index' ? 'active open' : ''; ?><?php echo $page == 'users' ? 'active open' : ''; ?><?php echo $page == 'zone' ? 'active open' : ''; ?><?php echo $page == 'organization' ? 'active open' : ''; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div data-i18n="Dashboards">Dashboards</div>

            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php echo $page == 'index' ? 'active' : ''; ?>">
                    <a href="index.php" class="menu-link">
                        <div data-i18n="Dashboard">Dashboard</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item <?php echo $page == 'users' ? 'active' : ''; ?>">
                    <a href="users.php" class="menu-link">
                        <div data-i18n="Users">Users</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item <?php echo $page == 'zone' ? 'active' : ''; ?>">
                    <a href="zone.php" class="menu-link">
                        <div data-i18n="Zones">Zones</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item <?php echo $page == 'organization' ? 'active' : ''; ?>">
                    <a href="organization.php" class="menu-link">
                        <div data-i18n="Organization">Organization</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item <?php echo $page == 'inventory' ? 'active open' : ''; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-building-2-line"></i>
                <div data-i18n="Inventory">Inventory</div>

            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php echo $page == 'inventory' ? 'active' : ''; ?>">
                    <a href="inventory.php" class="menu-link">
                        <div data-i18n="Inventory">Inventory</div>
                    </a>
                </li>
            </ul>

        </li>
        <li class="menu-item <?php echo $page == 'brand' ? 'active open' : ''; ?><?php echo $page == 'products' ? 'active open' : ''; ?><?php echo $page == 'category' ? 'active open' : ''; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-pages-line"></i>
                <div data-i18n="Products">Products</div>

            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php echo $page == 'products' ? 'active' : ''; ?>">
                    <a href="products.php" class="menu-link">
                        <div data-i18n="Products">Products</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item <?php echo $page == 'category' ? 'active' : ''; ?>">
                    <a href="category.php" class="menu-link">
                        <div data-i18n="Categories">Categories</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item <?php echo $page == 'brand' ? 'active' : ''; ?>">
                    <a href="brands.php" class="menu-link">
                        <div data-i18n="Brands">Brands</div>
                    </a>
                </li>
            </ul>

        </li>
        <li class="menu-item <?php echo $page == 'attendance-report' ? 'active open' : ''; ?><?php echo $page == 'order-report' ? 'active open' : ''; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-pie-chart-line"></i>
                <div data-i18n="Reports">Reports</div>

            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php echo $page == 'attendance-report' ? 'active' : ''; ?>">
                    <a href="attendance-report.php" class="menu-link">
                        <div data-i18n="Attendance Report">Attendance Report</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item <?php echo $page == 'order-report' ? 'active' : ''; ?>">
                    <a href="order-report.php" class="menu-link">
                        <div data-i18n="Order Report">Order Report</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>