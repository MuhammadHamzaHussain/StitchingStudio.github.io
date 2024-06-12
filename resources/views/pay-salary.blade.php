<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Pay Salary</title>
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
                                <form id="salaryDetailsForm" action="{{ route('salary.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Salary Details</span></h5>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group local-forms">
                                                <label>Select Designation <span class="login-danger">*</span></label>
                                                <select class="form-control select" id="staff_designation"
                                                    name="staff_designation">
                                                    <option value="">Select Staff Designation</option>
                                                    @foreach($designationDetails as $designation)
                                                    <option value="{{ $designation->id }}">
                                                        {{ $designation->designationName }}</option>
                                                    @endforeach
                                                </select>
                                                <div id="staff_designationError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group local-forms">
                                                <label>Select Staff <span class="login-danger">*</span></label>
                                                <select class="form-control select" id="staff_name" name="staff_name"
                                                    onchange="fetchSalary()">
                                                    <option value="">Please Select Staff</option>
                                                    @foreach($staffDetails as $staff)
                                                    <option value="{{ $staff->id }}" data-salary="{{ $staff->salary }}">
                                                        {{ $staff->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div id="staff_nameError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Date <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker" type="text" id="date"
                                                    name="date" placeholder="DD-MM-YYYY" autocomplete="off" style="background-color: #fff; border: 1px solid #ced4da; color: #495057;">
                                                <span class="icon"><i class="fa-solid fa-calendar-days"></i></span>
                                                <div id="dateError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <script>
                                        $(document).ready(function() {
                                            $('.form-group .icon').click(function() {
                                                $(this).prev('.datetimepicker').focus();
                                            });
                                        });
                                        </script>

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
                                            pointer-events: auto;
                                            cursor: pointer;
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
                                                    style="background-color: #fff; border: 1px solid #ced4da; color: #495057;"
                                                    autocomplete="off" readonly>
                                                <div id="salaryError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Description <span class="login-danger">*</span></label>
                                                <textarea class="form-control" id="description" name="description"
                                                    autocomplete="off" readonly
                                                    style="background-color: #fff; border: 1px solid #ced4da; color: #495057;"></textarea>
                                                <div id="descriptionError" class="text-danger"></div>
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
                <p class="text-center">Salary added Successfully!</p>
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
    <script src="assets/js/script.js"></script>
    <!-- <script src="assets/js/pay-salary.js"></script> -->
    <!-- Include jQuery library -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

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

        $('#salaryDetailsForm').on('submit', function(e) {
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

            // if ($('#description').val().trim() === '') {
            //     $('#descriptionError').text('Description is required');
            //     isValid = false;
            // }

            if ($('#description').val().trim() === '') {
                $('#descriptionError').text('Designation is required');
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test($('#description').val().trim())) {
                $('#descriptionError').text(
                    'Only alphabets and spaces are allowed for Description');
                isValid = false;
            }

            if (isValid) {
                $.ajax({
                    url: "{{ route('salary.store') }}", // Your endpoint
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

    function fetchSalary() {
        var staffSelect = document.getElementById("staff_name");
        var salaryInput = document.getElementById("salary");
        var descriptionInput = document.getElementById("description");
        var selectedOption = staffSelect.options[staffSelect.selectedIndex];
        var staffName = selectedOption.textContent.trim();
        var salary = selectedOption.getAttribute("data-salary");
        salaryInput.value = salary;
        descriptionInput.value = staffName + " Salary";

        // Clear error messages for salary and description fields
        $('#salaryError').text('');
        $('#descriptionError').text('');
    }
    </script>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to format the date as DD-MM-YYYY
        function formatDate(date) {
            let day = String(date.getDate()).padStart(2, '0');
            let month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            let year = date.getFullYear();
            return `${day}-${month}-${year}`;
        }

        // Get today's date
        let today = new Date();
        let formattedToday = formatDate(today);

        // Set the datepicker to the current date and disable other dates
        let dateInput = document.getElementById('date');
        dateInput.value = formattedToday;
        dateInput.setAttribute('readonly', true);

        // Validate the date input
        document.querySelector('form').addEventListener('submit', function(event) {
            let isValid = true;
            if (dateInput.value.trim() === '') {
                document.getElementById('dateError').textContent = 'Date is required';
                isValid = false;
            } else if (dateInput.value !== formattedToday) {
                document.getElementById('dateError').textContent = 'Date must be today\'s date';
                isValid = false;
            } else {
                document.getElementById('dateError').textContent = '';
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    });
    </script>
</body>

</html>