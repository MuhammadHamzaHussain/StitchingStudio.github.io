<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Fontfamily -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link rel="stylesheet" href="assets/css/style-one.css">
    <link rel="stylesheet" href="{{ asset('assets/css/general.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrapClasses.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/content.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/navtabs.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}" />
</head>
<body>
<div class="header">
        <div class="header-left">
            <a href="{{ route('dashboard') }}" class="logo">
                <img src="{{ asset('assets/img/logo.png') }}" width="100" height="120">
            </a>
            <a href="{{ route('dashboard') }}" class="logo logo-small">
                <img src="{{ asset('assets/img/logo.png') }}" width="30" height="30">
            </a>
        </div>
        <div class="menu-toggle">
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
        </div>
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>
        <ul class="nav user-menu">
            <li class="nav-item zoom-screen me-2">
                <a href="#" class="nav-link header-nav-list win-maximize">
                    <img id="fullscreen-img" src="{{ asset('assets/img/icons/zoom.svg') }}" alt="Fullscreen">
                </a>
            </li>
            <li class="nav-item dropdown has-arrow new-user-menus">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <div class="user-img">
                        <div class="user-text">
                            <h6>Hamza</h6>
                            
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="user-text">
                            <h6>Hamza</h6>
                            
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{ route('profile') }}">My Profile</a>
                    <a class="dropdown-item" href="{{ route('login') }}">Logout</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>
                    <li class="submenu active">
                        <a href="{{ route('dashboard') }}">
                            <i class="fa-solid fa-house"></i>
                            <span style="margin-right: 94px;">Dashboard</span>
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="{{ route('add-order') }}">
                            <i class="fa-solid fa-cart-plus"></i> <span> Add Order</span>
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="{{ route('view-edit-orders') }}">
                            <i class="fa-solid fa-cart-plus"></i> <span> View/Edit Orders</span>
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="{{ route('add-customer') }}">
                            <i class="fa-solid fa-user"></i> <span> Add Customer</span>
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="{{ route('view-edit-customers') }}">
                            <i class="fa-solid fa-users"></i> <span> View/Edit Customers</span>
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="{{ route('add-measurements') }}">
                        <i class="fa-solid fa-weight-hanging"></i> <span> Add Measurements</span>
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="{{ route('view-edit-measurements') }}">
                        <i class="fa-solid fa-weight-hanging"></i> <span> View/Edit Measurements</span>
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="fas fa-clipboard"></i>
                            <span style="margin-right: 44px;">Staff Management</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('add-staff') }}">Add Staff</a></li>
                            <li><a href="{{ route('view-edit-staff') }}">View/Edit Staff</a></li>
                            <li><a href="{{ route('pay-salary') }}">Pay Salary</a></li>
                            <li><a href="{{ route('view-edit-pay-salary') }}">View/Edit Salary</a></li>
                            <li><a href="{{ route('add-designation') }}">Add Designation</a></li>
                            <li><a href="{{ route('view-edit-designation') }}">View/Edit Designation</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="fas fa-clipboard"></i>
                            <span style="margin-right: 18px;">Expense Management</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('add-expense') }}">Add Expense</a></li>
                            <li><a href="{{ route('view-edit-expense') }}">View/Edit Expense</a></li>
                            <li><a href="{{ route('add-expense-category') }}">Add Expense Category</a></li>
                            <li><a href="{{ route('view-edit-expense-category') }}">View/Edit Expense Category</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- jQuery CDN Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery SlimScroll JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>