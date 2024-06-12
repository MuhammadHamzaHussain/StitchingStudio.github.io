<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Customer</title>
    <!-- Fontfamily -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datepicker CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style-one.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                                <h3 class="page-title">Edit Expense Category</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Expense Management</a></li>
                                    <li class="breadcrumb-item active">Edit Expense Category</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST"
                                    action="{{ route('expense-category.update', $expenseCategory->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Edit Expense Category</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Expense Category Name <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="expenseCategoryName"
                                                    name="expenseCategoryName"
                                                    value="{{ $expenseCategory->expenseCategoryName }}" autocomplete="off">
                                                <div id="expenseCategoryNameError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="alertModal" class="centered-modal" style="display:none;">
                <div class="checkmark-circle">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h5 class="text-center">Awesome!</h5>
                <p class="text-center">Are you sure you want to update?</p>
                <div class="d-flex justify-content-center">
                    <button id="yesButton" class="btn btn-success"
                        style="background-color: #3D5EE1; color: white; border: 1px solid #3D5EE1; border-radius: 5px !important;">Yes</button>
                    <button id="noButton" class="btn btn-secondary"
                        style="margin-left: 10px !important; border-radius: 5px !important;">No</button>
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
                border: 1px solid #ccc;
                border-radius: .25rem;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15);
                display: none;
                margin-left: 120px;
            }

            body {
                height: 100vh;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #f8f9fa;
            }

            .checkmark-circle {
                color: #3D5EE1;
                font-size: 2rem;
                display: flex;
                justify-content: center;
                margin-bottom: 0.5rem;
            }

            .btn-secondary {
                color: #fff !important;
                background-color: #6c757d !important;
                border-color: #6c757d !important;
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
    <!-- jQuery SlimScroll JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <!-- Datepicker Core JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        function clearError(elementId) {
            var errorElement = document.getElementById(elementId);
            if (errorElement) {
                errorElement.innerHTML = "";
            }
        }

        function setError(elementId, message) {
            var errorElement = document.getElementById(elementId);
            if (errorElement) {
                errorElement.innerHTML = message;
            }
        }

        function validateFormField(value, regex, errorMessage) {
            return {
                isValid: regex.test(value),
                errorMessage: value === "" ? "Expense category name is required" : errorMessage
            };
        }

        function handleFormSubmit(event) {
            event.preventDefault(); // Prevent the default form submission

            var expenseCategoryName = document.getElementById("expenseCategoryName").value.trim();

            // Regular expressions for validation
            var nameRegex = /^[a-zA-Z\s]+$/;

            // Validate fields
            var expenseCategoryNameValidation = validateFormField(expenseCategoryName, nameRegex,
                "Only alphabets and spaces are allowed for expense category name");

            // Reset previous errors
            clearError("expenseCategoryNameError");

            var hasError = false;

            if (!expenseCategoryNameValidation.isValid) {
                setError("expenseCategoryNameError", expenseCategoryNameValidation.errorMessage);
                hasError = true;
            }

            // Show the modal if there are no errors
            if (!hasError) {
                $('#alertModal').fadeIn();
            }
        }

        function submitForm() {
            var form = document.querySelector("form");
            var formData = new FormData(form);

            // Proceed with form submission via AJAX
            $.ajax({
                url: form.action,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // CSRF token for Laravel
                },
                success: function(response) {
                    window.location.href =
                    "{{ route('view-edit-expense-category') }}"; // Redirect on success
                },
                error: function(xhr) {
                    // Handle errors here, such as displaying error messages
                    console.log('Error:', xhr.responseText);
                }
            });
        }

        document.getElementById("expenseCategoryName").addEventListener("input", function() {
            clearError("expenseCategoryNameError");
        });

        document.querySelector("form").addEventListener("submit", handleFormSubmit);

        document.getElementById("yesButton").addEventListener("click", function() {
            submitForm();
        });

        document.getElementById("noButton").addEventListener("click", function() {
            $('#alertModal').fadeOut(); // Fade out the modal on clicking No
        });
    });
    </script>

</body>

</html>