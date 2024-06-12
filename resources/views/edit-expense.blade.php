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
                                <h3 class="page-title">Edit Expense</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Expense Management</a></li>
                                    <li class="breadcrumb-item active">Edit Expense</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="basicDetailsForm" method="POST"
                                    action="{{ route('expenses.update', $expense->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Edit Expense</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Select Expense Category <span
                                                        class="login-danger">*</span></label>
                                                <select class="form-control select" name="expense_category"
                                                    id="expense_category">
                                                    <option value="">Select Expense Category</option>
                                                    @foreach($expenseCategories as $category)
                                                    <option value="{{ $category->id }}" @if($expense->expense_category
                                                        == $category->expenseCategoryName) selected @endif>
                                                        {{ $category->expenseCategoryName }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <div id="expense_categoryError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Description <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="description"
                                                    name="description" value="{{ $expense->description }}" autocomplete="off">
                                                <div id="descriptionError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label> Date <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker" type="text" id="date"
                                                    name="date"
                                                    value="{{ \Carbon\Carbon::parse($expense->date)->format('d-m-Y') }}">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path
                                                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16z" />
                                                    </svg>
                                                </span>
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
                                            /* Makes the icon non-interactive */
                                        }

                                        .text-danger {
                                            position: absolute;
                                            bottom: -20px;
                                            left: 0;
                                            /* Adjust these values to correctly position the error message */
                                        }
                                        </style>
                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Amount <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="amount" name="amount"
                                                    value="{{ $expense->amount }}" autocomplete="off">
                                                <div id="amountError" class="text-danger"></div>
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
    <!-- <script src="assets/js/add-staff.js"></script> -->

    <script>
    $(document).ready(function() {
        // Function to clear error messages
        function clearErrorMessages() {
            var inputId = $(this).attr('id');
            $('#' + inputId + 'Error').text('');
        }

        // Attach event listener to clear error messages on input
        var fieldsToClear = ['#expense_category', '#description', '#date', '#amount'];
        fieldsToClear.forEach(function(field) {
            $(field).on('input', clearErrorMessages);
            if (field === '#date') {
                $(field).on('change', clearErrorMessages);
            }
        });

        $('#basicDetailsForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            var isValid = true;

            // Basic details validation
            if ($('#expense_category').val() === '') {
                $('#expense_categoryError').text('Expense category is required');
                isValid = false;
            }
            if ($('#description').val().trim() === '') {
                $('#descriptionError').text('Description is required');
                isValid = false;
            }
            if ($('#date').val().trim() === '') {
                $('#dateError').text('Date is required');
                isValid = false;
            } else if (!/^\d{2}-\d{2}-\d{4}$/.test($('#date').val().trim())) {
                $('#dateError').text('Date format should be DD-MM-YYYY');
                isValid = false;
            }
            let amountInput = $('#amount').val().trim(); // Cache the trimmed value for reuse
            if (amountInput === '') {
                $('#amountError').text('Amount is required');
                isValid = false;
            } else if (!/^\d+(\.\d{1,2})?$/.test(amountInput)) {
                $('#amountError').text('Amount should be a valid number with up to 2 decimal places');
                isValid = false;
            }

            if (isValid) {
                $.ajax({
                    url: "{{ route('expenses.update', $expense->id) }}", // Your endpoint
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
                                "{{ route('view-edit-expense') }}"; // Redirect
                        });
                    },
                    error: function(xhr) {
                        // Handle errors here, such as displaying error messages
                        console.log('Error:', xhr.responseText);
                    }
                });
            }
        });

        // Attach event listener to "No" button to close the modal
        $('#noButton').click(function() {
            $('#alertModal').fadeOut();
        });
    });
    </script>



</body>

</html>