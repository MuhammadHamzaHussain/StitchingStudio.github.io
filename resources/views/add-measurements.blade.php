<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Customer</title>
    <!-- Include Bootstrap CSS and JavaScript for modal functionality -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Fontfamily -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet">
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
                                <h3 class="page-title">Add Measurement</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Add Measurement</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="measurementsForm">
                                    <div class="row">


                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="lambai" style="font-size: 16px;">لمبائی <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="lambai" name="lambai"
                                                    autocomplete="off">
                                                <div id="lambaiError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="tera" style="font-size: 16px;">تيرا <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="tera" name="tera"
                                                    autocomplete="off">
                                                <div id="teraError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="bazu" style="font-size: 16px;">بازو <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="bazu" name="bazu"
                                                    autocomplete="off">
                                                <div id="bazuError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="kundah" style="font-size: 16px;">کندها <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="kundah" name="kundah"
                                                    autocomplete="off">
                                                <div id="kundahError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="galeh" style="font-size: 16px;">گلہ <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="galeh" name="galeh"
                                                    autocomplete="off">
                                                <div id="galehError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="chest" style="font-size: 16px;">چیسٹ <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="chest" name="chest"
                                                    autocomplete="off">
                                                <div id="chestError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="kamar" style="font-size: 16px;">کمر <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="kamar" name="kamar"
                                                    autocomplete="off">
                                                <div id="kamarError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="chest_tayyar" style="font-size: 16px;">چیسٹ تیار <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="chest_tayyar"
                                                    name="chest_tayyar" autocomplete="off">
                                                <div id="chest_tayyarError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="kamartiyaar" style="font-size: 16px;">كمرتيار <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="kamartiyaar"
                                                    name="kamartiyaar" autocomplete="off">
                                                <div id="kamartiyaarError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="gohire_tayyar" style="font-size: 16px;">گهیره تیار <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="gohire_tayyar"
                                                    name="gohire_tayyar" autocomplete="off">
                                                <div id="gohire_tayyarError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="shalwar_lambai" style="font-size: 16px;">شلوار لمبائی <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="shalwar_lambai"
                                                    name="shalwar_lambai" autocomplete="off">
                                                <div id="shalwar_lambaiError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="panche" style="font-size: 16px;">پانچه <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="panche" name="panche"
                                                    autocomplete="off">
                                                <div id="pancheError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="chokor_ghera" style="font-size: 16px;">چکور گھیرا <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="chokor_ghera"
                                                    name="chokor_ghera" autocomplete="off">
                                                <div id="chokor_gheraError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="gol_ghera" style="font-size: 16px;">گول گھیرا <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="gol_ghera" name="gol_ghera"
                                                    autocomplete="off">
                                                <div id="gol_gheraError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="baba_bazu" style="font-size: 16px;">بابا بازو <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="baba_bazu" name="baba_bazu"
                                                    autocomplete="off">
                                                <div id="baba_bazuError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="kaff" style="font-size: 16px;">كف <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="kaff" name="kaff"
                                                    autocomplete="off">
                                                <div id="kaffError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="lambai_kot" style="font-size: 16px;">لمبائی کوٹ <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="lambai_kot"
                                                    name="lambai_kot" autocomplete="off">
                                                <div id="lambai_kotError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="hip" style="font-size: 16px;">ہپ <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="hip" name="hip"
                                                    autocomplete="off">
                                                <div id="hipError" class="text-danger"></div>
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
                <p class="text-center">Measurements added Successfully!</p>
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
                /* Added left margin */
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
    <script>
    $(document).ready(function() {
        const form = $('#measurementsForm');

        // Function to clear error messages
        function clearError(elementId) {
            const errorElement = document.getElementById(elementId);
            if (errorElement) {
                errorElement.innerHTML = '';
            }
        }

        // Add event listeners to clear error messages on input
        form.find('input, select').on('input', function() {
            clearError(this.id + 'Error');
        });

        form.on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            let hasError = false;

            // Reset previous errors
            form.find('.text-danger').html('');

            // Validation rules
            const validateRequired = (value, errorElement, message) => {
                if (value.trim() === '') {
                    errorElement.innerHTML = message;
                    return false;
                }
                return true;
            };

            const validateMeasurement = (value, errorElement, message) => {
                const regex =
                    /^(?:(?:\d{1,2}(?:\s*\d\/\d)?)|(?:\d{1,2}\s+\d\/\d)|(?:\d{1,2}\/\d{1,2}))$/;

                if (!regex.test(value.trim())) {
                    errorElement.innerHTML = message;
                    return false;
                }
                return true;
            };


            // Fields to validate
            const fields = [{
                    id: 'lambai',
                    name: 'لمبائی'
                },
                {
                    id: 'tera',
                    name: 'تيرا'
                },
                {
                    id: 'bazu',
                    name: 'بازو'
                },
                {
                    id: 'kundah',
                    name: 'کندها'
                },
                {
                    id: 'galeh',
                    name: 'گلہ'
                },
                {
                    id: 'chest',
                    name: 'چیسٹ'
                },
                {
                    id: 'kamar',
                    name: 'کمر'
                },
                {
                    id: 'chest_tayyar',
                    name: 'چیسٹ تیار'
                },
                {
                    id: 'kamartiyaar',
                    name: 'كمرتيار'
                },
                {
                    id: 'gohire_tayyar',
                    name: 'گهیره تیار'
                },
                {
                    id: 'shalwar_lambai',
                    name: 'شلوار لمبائی'
                },
                {
                    id: 'panche',
                    name: 'پانچه'
                },
                {
                    id: 'chokor_ghera',
                    name: 'چکور گھیرا'
                },
                {
                    id: 'gol_ghera',
                    name: 'گول گھیرا'
                },
                {
                    id: 'baba_bazu',
                    name: 'بابا بازو'
                },
                {
                    id: 'kaff',
                    name: 'كف'
                },
                {
                    id: 'lambai_kot',
                    name: 'لمبائی کوٹ'
                },
                {
                    id: 'hip',
                    name: 'ہپ'
                }
            ];

            // Validate each field
            fields.forEach(field => {
                const value = document.getElementById(field.id).value;
                const errorElement = document.getElementById(`${field.id}Error`);
                if (!validateRequired(value, errorElement, `${field.name} is required`) ||
                    !validateMeasurement(value, errorElement,
                        `${field.name} should be in the format 1, 11, 1/2, 1 1/2, 11 1/2`)) {
                    hasError = true;
                }
            });

            if (hasError) {
                return; // If there are validation errors, do not proceed with form submission
            }

            // Proceed with AJAX form submission if no validation errors
            $.ajax({
                url: "{{ route('measurements.store') }}", // Your endpoint
                type: "POST",
                data: form.serialize(), // Serialize form data
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // CSRF token for Laravel
                },
                success: function(response) {
                    console.log('Success:', response); // Debug log
                    $('#alertModal')
                        .fadeIn(); // Fade in the modal on successful data submission
                    $('#alertModal .btn-success').click(function() {
                        $('#alertModal')
                            .fadeOut(); // Fade out the modal on clicking OK
                        window.location.href =
                            "{{ route('visualization') }}"; // Redirect
                    });

                },
                error: function(xhr) {
                    // Handle errors here, such as displaying error messages
                    console.log('Error:', xhr.responseText); // Debug log
                }
            });
        });
    });
    </script>

    <!-- jQuery CDN Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <!-- jQuery SlimScroll JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="assets/js/script.js"></script>
    <!-- <script src="assets/js/add-measurements.js"></script> -->
</body>

</html>