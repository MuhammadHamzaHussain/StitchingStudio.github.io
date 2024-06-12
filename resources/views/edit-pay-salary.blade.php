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
                                <h3 class="page-title">Salary</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Staff Management</a></li>
                                    <li class="breadcrumb-item active">Pay Salary</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('salary.update', $salaryDetail->id) }}" method="POST"
                                    class="d-inline update-form">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Update Salary Details</span></h5>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group local-forms">
                                                <label>Select Designation <span class="login-danger">*</span></label>
                                                <select class="form-control select" id="staff_designation"
                                                    name="staff_designation">
                                                    <option value="">Select Staff Designation</option>
                                                    @foreach($designationDetails as $designation)
                                                    <option value="{{ $designation->id }}"
                                                        {{ $salaryDetail->staff_designation == $designation->designationName ? 'selected' : '' }}>
                                                        {{ $designation->designationName }}</option>
                                                    @endforeach
                                                </select>
                                                <div id="staff_designationError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group local-forms">
                                                <label>Select Staff <span class="login-danger">*</span></label>
                                                <select class="form-control select" id="staff_name" name="staff_name">
                                                    <option value="">Please Select Staff</option>
                                                    @foreach($staffDetails as $staff)
                                                    <option value="{{ $staff->id }}"
                                                        {{ $salaryDetail->staff_name == $staff->name ? 'selected' : '' }}>
                                                        {{ $staff->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div id="staff_nameError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col 6">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Joining Date <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker" type="text" id="date"
                                                    name="date" placeholder="DD-MM-YYYY"
                                                    value="{{ \Carbon\Carbon::parse($salaryDetail->date)->format('d-m-Y') }}">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path
                                                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16z" />
                                                    </svg>
                                                </span>
                                                <div id="dateError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        
                                        <style>
                                        .form-group {
                                            position: relative;
                                        }

                                        .datetimepicker {
                                            padding-right: 30px;
                                            /* Adjust padding to prevent text from hiding behind the icon */
                                        }

                                        .form-group .icon {
                                            position: absolute;
                                            right: 15px;
                                            /* Adjust as per your visual preference */
                                            top: 50%;
                                            transform: translateY(-50%);
                                            cursor: pointer !important;
                                            /* Makes the icon interactive */
                                        }

                                        .text-danger {
                                            position: absolute;
                                            bottom: -20px;
                                            left: 0;
                                            /* Adjust these values to correctly position the error message */
                                        }
                                        </style>
                                        <div class="col-6">
                                            <div class="form-group local-forms">
                                                <label>Salary <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="salary" name="amount"
                                                    value="{{ $salaryDetail->amount }}" autocomplete="off">
                                                <div id="salaryError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Description <span class="login-danger">*</span></label>
                                                <textarea class="form-control" id="description"
                                                    name="description" autocomplete="off">{{ $salaryDetail->description }}</textarea>
                                                <div id="descriptionError" class="text-danger"></div>
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
        // Function to clear error messages
        function clearErrorMessages() {
            var inputId = $(this).attr('id');
            $('#' + inputId + 'Error').text('');
        }

        // Attach event listener to clear error messages on input
        $('#staff_designation').on('input', clearErrorMessages);
        $('#staff_name').on('input', clearErrorMessages);
        $('#date').on('input change',
        clearErrorMessages); // Handle both input and change events for datetimepicker
        $('#salary').on('input', clearErrorMessages);
        $('#description').on('input', clearErrorMessages);

        $('.update-form').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            var isValid = true;

            // Salary details validation
            if ($('#staff_designation').val() === '') {
                $('#staff_designationError').text('Designation is required');
                isValid = false;
            }
            if ($('#staff_name').val() === '') {
                $('#staff_nameError').text('Staff name is required');
                isValid = false;
            }
            if ($('#date').val().trim() === '') {
                $('#dateError').text('Date is required');
                isValid = false;
            }
            if ($('#salary').val().trim() === '') {
                $('#salaryError').text('Salary is required');
                isValid = false;
            } else if (!/^\d+$/.test($('#salary').val().trim())) {
                $('#salaryError').text('Salary should be a valid integer');
                isValid = false;
            } else {
                $('#salaryError').text(''); // Clear any previous error messages
            }

            if ($('#description').val().trim() === '') {
                $('#descriptionError').text('Description is required');
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test($('#description').val().trim())) {
                $('#descriptionError').text('Only alphabets and spaces are allowed for Description');
                isValid = false;
            }

            if (isValid) {
                $.ajax({
                    url: "{{ route('salary.update', $salaryDetail->id) }}", // Your endpoint
                    type: "POST",
                    data: $(this).serialize(), // Serialize form data
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr(
                            'content') // CSRF token for Laravel
                    },
                    success: function(response) {
                        $('#alertModal')
                    .fadeIn(); // Fade in the modal on successful data submission
                        $('#yesButton').click(function() {
                            $('#alertModal')
                        .fadeOut(); // Fade out the modal on clicking Yes
                            window.location.href =
                            "{{ route('view-edit-pay-salary') }}"; // Redirect
                        });
                        $('#salaryDetailsForm').find('input[type=text], textarea').val(
                        ''); // Clear form fields
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            }
        });
    });
    </script>
</body>

</html>