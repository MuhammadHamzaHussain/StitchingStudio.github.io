<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Designation</title>

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
                                <h3 class="page-title">Add Designation</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Staff Management</a></li>
                                    <li class="breadcrumb-item active">Add Designation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="designationForm">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Designation Details</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Designation Name <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="designationName"
                                                    name="designationName" autocomplete="off">
                                                <div id="designationNameError" class="text-danger"></div>
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
            <div id="alertModal" class="centered-modal">
                <div class="checkmark-circle">
                    <i class="fas fa-check-circle"></i> <!-- Font Awesome Checkmark -->
                </div>
                <h5 class="text-center">Awesome!</h5>
                <p class="text-center">Designation added Successfully!</p>
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
            <div id="loadingIndicator"
                style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <footer>
                <p>COPYRIGHT © 2024 Chawla Stitching Studio.</p>
            </footer>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        function clearErrorMessages() {
            var inputId = $(this).attr('id');
            $('#' + inputId + 'Error').text('');
        }

        // Attach event listener to clear error messages on input
        $('#designationName').on('input', clearErrorMessages);

        $('#designationForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            var isValid = true;

            // Validation for Designation Name
            if ($('#designationName').val().trim() === '') {
                $('#designationNameError').text('Designation Name is required');
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test($('#designationName').val().trim())) {
                $('#designationNameError').text(
                    'Only alphabets and spaces are allowed for Designation Name');
                isValid = false;
            }

            if (isValid) {
                $('#loadingIndicator').show(); // Show the loading indicator

                $.ajax({
                    url: "{{ route('designation.store') }}", // Your endpoint
                    type: "POST",
                    data: $(this).serialize(), // Serialize form data
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // CSRF token for Laravel
                    },
                    success: function(response) {
                        $('#alertModal')
                            .fadeIn(); // Fade in the modal on successful data submission
                        $('#alertModal .btn-success').click(function() {
                            $('#alertModal')
                                .fadeOut(); // Fade out the modal on clicking OK
                            window.location.href =
                                "{{ route('view-edit-designation') }}"; // Redirect
                        });
                        $('#loadingIndicator').hide(); // Hide loading indicator on success
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                        $('#loadingIndicator').hide(); // Hide loading indicator on failure
                    }
                });
            }
        });
    });
    </script>

    <!-- jQuery CDN Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery SlimScroll JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="assets/js/script.js"></script>
    <!-- <script src="assets/js/add-designation.js"></script> -->

</body>

</html>