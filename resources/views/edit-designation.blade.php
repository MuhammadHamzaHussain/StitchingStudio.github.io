<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Designation</title>
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
                                <h3 class="page-title">Edit Designation</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Staff Management</a></li>
                                    <li class="breadcrumb-item active">Edit Designation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="designationForm" method="POST"
                                    action="{{ route('designation.update', $designation->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Designation Details</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Designation Name <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="designationName"
                                                    name="designationName" value="{{ $designation->designationName }}"
                                                    autocomplete="off">
                                                <div id="designationNameError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                        <style>
                                        .btn-primary {
                                            background-color: #3d5ee1 !important;
                                            border: 1px solid #3d5ee1 !important;
                                            color: #fff !important;
                                            display: inline-block !important;
                                            font-weight: 400 !important;
                                            line-height: 1.5 !important;
                                            text-align: center !important;
                                            text-decoration: none !important;
                                            vertical-align: middle !important;
                                            cursor: pointer !important;
                                            user-select: none !important;
                                            padding: .375rem .75rem !important;
                                            font-size: 1rem !important;
                                            border-radius: .25rem !important;
                                            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
                                        }
                                        .btn-primary:hover {
                                            background-color: #18aefa !important;
                                            border-color: #18aefa !important;
                                        }
                                        [type=button],
                                        [type=reset],
                                        [type=submit],
                                        button {
                                            -webkit-appearance: button !important;
                                        }
                                        input,
                                        input:focus,
                                        button,
                                        button:focus {
                                            outline: none !important;
                                        }
                                        input,
                                        button,
                                        a {
                                            transition: all 0.4s ease !important;
                                            -moz-transition: all 0.4s ease !important;
                                            -o-transition: all 0.4s ease !important;
                                            -ms-transition: all 0.4s ease !important;
                                            -webkit-transition: all 0.4s ease !important;
                                        }
                                        button,
                                        select {
                                            text-transform: none !important;
                                        }
                                        button,
                                        input,
                                        optgroup,
                                        select,
                                        textarea {
                                            margin: 0 !important;
                                            font-family: inherit !important;
                                            font-size: inherit !important;
                                            line-height: inherit !important;
                                        }
                                        button {
                                            border-radius: 0 !important;
                                        }
                                        button,
                                        select {
                                            text-transform: none !important;
                                        }
                                        button,
                                        input,
                                        optgroup,
                                        select,
                                        textarea {
                                            margin: 0 !important;
                                            font-family: inherit !important;
                                            font-size: inherit !important;
                                            line-height: inherit !important;
                                        }
                                        </style>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="alertModal" class="centered-modal" style="display:none;">
                <div class="checkmark-circle">
                    <i class="fas fa-check-circle"></i> <!-- Font Awesome Checkmark -->
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
                $.ajax({
                    url: "{{ route('designation.update', $designation->id) }}", // Your endpoint
                    type: "POST",
                    data: $(this).serialize(), // Serialize form data
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // CSRF token for Laravel
                    },
                    success: function(response) {
                        $('#alertModal')
                            .fadeIn(); // Fade in the modal on successful data submission
                        $('#yesButton').click(function() {
                            window.location.href =
                                "{{ route('view-edit-designation') }}"; // Redirect on Yes
                        });
                        $('#noButton').click(function() {
                            $('#alertModal')
                                .fadeOut(); // Fade out the modal on clicking No
                        });
                    },
                    error: function(xhr) {
                        // Handle errors here, such as displaying error messages
                        console.log('Error:', xhr.responseText);
                    }
                });
            }
        });
    });
    </script>
    <!-- <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const menuLinks = document.querySelectorAll('.menu-link');
        menuLinks.forEach(menuLink => {
            menuLink.addEventListener('click', function(event) {
                event.preventDefault();
                const submenu = this.nextElementSibling;
                if (submenu) {
                    submenu.classList.toggle('active');
                    this.classList.toggle('active');
                }
            });
        });
    });
    </script> -->
</body>
</html>