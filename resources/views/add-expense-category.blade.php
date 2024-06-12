<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Expense Category</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Fontfamily -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
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
    <style>
    .text-danger {
        color: red;
        font-size: 12px;
    }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Add New Expense Category</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Expense Management</a></li>
                                    <li class="breadcrumb-item active">Add Expense Category</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('expense-category.store') }}" id="expenseCategoryForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Expense Category Details</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Expense Category Name <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="expenseCategoryName" name="expenseCategoryName" autocomplete="off">
                                                <div id="expenseCategoryNameError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="alertModal" class="centered-modal" style="display: none;">
                <div class="checkmark-circle">
                    <i class="fas fa-check-circle"></i> <!-- Font Awesome Checkmark -->
                </div>
                <h5 class="text-center">Awesome!</h5>
                <p class="text-center">Expense Category added Successfully!</p>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success">OK</button>
                </div>
            </div>
            <style>
            .centered-modal {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: auto;
                padding: 20px;
                z-index: 1050;
                background: #fff;
                /* Background color */
                border: 1px solid #ccc;
                /* Border */
                border-radius: .25rem;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15);
                display: none;
                /* Initially hidden */
                margin-left: 120px;
            }

            body {
                height: 100vh;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #f8f9fa;
                /* Light gray background */
            }

            .checkmark-circle {
                color: #28A745;
                /* Bootstrap success color */
                font-size: 2rem;
                /* Size of the checkmark */
                display: flex;
                justify-content: center;
                margin-bottom: 0.5rem;
            }
            </style>
            <footer>
                <p>COPYRIGHT © 2024 Chawla Stitching Studio.</p>
            </footer>
        </div>
    </div>
    <!-- jQuery CDN Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="assets/js/script.js"></script>
    <!-- <script src="assets/js/add-expense-category.js"></script> -->
    <script>
    $(document).ready(function() {
        function clearErrorMessages() {
            var inputId = $(this).attr('id');
            $('#' + inputId + 'Error').text('');
        }
        // Attach event listener to clear error messages on input
        $('#expenseCategoryName').on('input', clearErrorMessages);
        $('#expenseCategoryForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            var isValid = true;
            // Validation for Designation Name
            if ($('#expenseCategoryName').val().trim() === '') {
                $('#expenseCategoryNameError').text('Expense Category Name is required');
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test($('#expenseCategoryName').val().trim())) {
                $('#expenseCategoryNameError').text('Only alphabets and spaces are allowed for Expense Category Name');
                isValid = false;
            }
            if (isValid) {
                $.ajax({
                    url: "{{ route('expense-category.store') }}", // Your endpoint
                    type: "POST",
                    data: $(this).serialize(), // Serialize form data
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
                    },
                    success: function(response) {
                        $('#alertModal').fadeIn(); // Fade in the modal on successful data submission
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            }
        });
        $('#alertModal .btn-success').click(function() {
            $('#alertModal').fadeOut(); // Fade out the modal on clicking OK
            window.location.href = "{{ route('view-edit-expense-category') }}"; // Redirect
        });
    });
    </script>
</body>
</html>
