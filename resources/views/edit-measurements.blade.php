<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Staff</title>
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
                                <h3 class="page-title">Edit Measurement</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Edit Measurement</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('measurements.update', $measurement->id) }}" method="POST"
                                    id="editMeasurementsForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        

                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="lambai" style="font-size: 16px;">لمبائی <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="lambai" name="lambai"
                                                    value="{{ $measurement->lambai }}" autocomplete="off">
                                                <div id="lambaiError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="tera" style="font-size: 16px;">تيرا <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="tera" name="tera"
                                                    value="{{ $measurement->tera }}" autocomplete="off">
                                                <div id="teraError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="bazu" style="font-size: 16px;">بازو <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="bazu" name="bazu"
                                                    value="{{ $measurement->bazu }}" autocomplete="off">
                                                <div id="bazuError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="kundah" style="font-size: 16px;">کندها <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="kundah" name="kundah"
                                                    value="{{ $measurement->kundah }}" autocomplete="off">
                                                <div id="kundahError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="galeh" style="font-size: 16px;">گلہ <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="galeh" name="galeh"
                                                    value="{{ $measurement->galeh }}" autocomplete="off">
                                                <div id="galehError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="chest" style="font-size: 16px;">چیسٹ <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="chest" name="chest"
                                                    value="{{ $measurement->chest }}" autocomplete="off">
                                                <div id="chestError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="kamar" style="font-size: 16px;">کمر <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="kamar" name="kamar"
                                                    value="{{ $measurement->kamar }}" autocomplete="off">
                                                <div id="kamarError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="chest_tayyar" style="font-size: 16px;">چیسٹ تیار <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="chest_tayyar"
                                                    name="chest_tayyar" value="{{ $measurement->chest_tayyar }}" autocomplete="off">
                                                <div id="chest_tayyarError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="kamartiyaar" style="font-size: 16px;">كمرتيار <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="kamartiyaar"
                                                    name="kamartiyaar" value="{{ $measurement->kamartiyaar }}" autocomplete="off">
                                                <div id="kamartiyaarError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="gohire_tayyar" style="font-size: 16px;">گهیره تیار <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="gohire_tayyar"
                                                    name="gohire_tayyar" value="{{ $measurement->gohire_tayyar }}" autocomplete="off">
                                                <div id="gohire_tayyarError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="shalwar_lambai" style="font-size: 16px;">شلوار لمبائی <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="shalwar_lambai"
                                                    name="shalwar_lambai" value="{{ $measurement->shalwar_lambai }}" autocomplete="off">
                                                <div id="shalwar_lambaiError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="panche" style="font-size: 16px;">پانچه <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="panche" name="panche"
                                                    value="{{ $measurement->panche }}" autocomplete="off">
                                                <div id="pancheError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="chokor_ghera" style="font-size: 16px;">چکور گھیرا <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="chokor_ghera"
                                                    name="chokor_ghera" value="{{ $measurement->chokor_ghera }}" autocomplete="off">
                                                <div id="chokor_gheraError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="gol_ghera" style="font-size: 16px;">گول گھیرا <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="gol_ghera" name="gol_ghera"
                                                    value="{{ $measurement->gol_ghera }}" autocomplete="off">
                                                <div id="gol_gheraError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="baba_bazu" style="font-size: 16px;">بابا بازو <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="baba_bazu" name="baba_bazu"
                                                    value="{{ $measurement->baba_bazu }}" autocomplete="off">
                                                <div id="baba_bazuError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="kaff" style="font-size: 16px;">كف <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="kaff" name="kaff"
                                                    value="{{ $measurement->kaff }}" autocomplete="off">
                                                <div id="kaffError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="lambai_kot" style="font-size: 16px;">لمبائی کوٹ <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="lambai_kot"
                                                    name="lambai_kot" value="{{ $measurement->lambai_kot }}" autocomplete="off">
                                                <div id="lambai_kotError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group local-forms">
                                                <label for="hip" style="font-size: 16px;">ہپ <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="hip" name="hip"
                                                    value="{{ $measurement->hip }}" autocomplete="off">
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
        const form = $('#editMeasurementsForm');

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
                const regex = /^(?:\d{1,2}\/\d{1,2}|\d+|\d+\s\d\/\d)$/;
                if (!regex.test(value.trim())) {
                    errorElement.innerHTML = message;
                    return false;
                }
                return true;
            };

            // Validate each field
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

            fields.forEach(field => {
                const value = document.getElementById(field.id).value;
                const errorElement = document.getElementById(`${field.id}Error`);
                if (!validateRequired(value, errorElement, `${field.name} is required`) ||
                    !validateMeasurement(value, errorElement,
                        `${field.name} should be in the format 1, 1/2, or 12 1/2`)) {
                    hasError = true;
                }
            });

            if (hasError) {
                return; // If there are validation errors, do not proceed with form submission
            }

            // Proceed with AJAX form submission if no validation errors
            $.ajax({
                url: form.attr('action'), // Use the form's action attribute for the URL
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
                    $('#yesButton').click(function() {
                        $('#alertModal')
                            .fadeOut(); // Fade out the modal on clicking Yes
                        window.location.href =
                            "{{ route('view-edit-measurements') }}"; // Redirect
                    });
                    $('#noButton').click(function() {
                        $('#alertModal')
                            .fadeOut(); // Fade out the modal on clicking No
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
</body>

</html>