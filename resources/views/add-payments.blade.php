<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Customer</title>
    <!-- Datepicker CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
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
                                <h3 class="page-title">Add Payment</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Add Payment</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Payment form -->
                                <form id="paymentForm">

                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Payment Details</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label for="orderId">ID: <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="orderId" name="order_id"
                                                    value="{{ $orderId }}" readonly
                                                    style="background-color: #fff; border: 1px solid #ced4da; color: #495057;">
                                                <div id="orderIdError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label for="customerName">Name <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="customerName"
                                                    name="customer_name" value="{{ $customerName }}" readonly
                                                    style="background-color: #fff; border: 1px solid #ced4da; color: #495057;">
                                                <div id="customerNameError" class="text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label for="amount">Amount <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="amount" name="amount"
                                                    value="{{ $amount }}" readonly
                                                    style="background-color: #fff; border: 1px solid #ced4da; color: #495057;">
                                                <div id="amountError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Paid <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="paid" name="paid" autocomplete="off">
                                                <div id="paidError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Date<span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker" type="text" id="date"
                                                    name="date" placeholder="DD-MM-YYYY">
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
                <p class="text-center">Payment added Successfully!</p>
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
                color: #28a745;
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
    <!-- Custom JavaScript -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/add-customer.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Datepicker Core JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>

    <script>
    $(document).ready(function() {
        // Function to clear error messages
        function clearErrorMessages() {
            var inputId = $(this).attr('id');
            $('#' + inputId + 'Error').text('');
        }

        // Attach event listener to clear error messages on input/change
        $('#paid').on('input change', clearErrorMessages);
        $('#date').on('input change', clearErrorMessages);

        $('#paymentForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            var isValid = true;

            // Basic details validation
            if ($('#paid').val().trim() === '') {
                $('#paidError').text('Paid amount is required');
                isValid = false;
            } else if (!/^\d+(\.\d{1,2})?$/.test($('#paid').val().trim())) {
                $('#paidError').text('Paid amount should contain only digits');
                isValid = false;
            }

            if ($('#date').val().trim() === '') {
                $('#dateError').text('Date is required');
                isValid = false;
            } else if (!/^\d{2}-\d{2}-\d{4}$/.test($('#date').val().trim())) {
                $('#dateError').text('Date format should be DD-MM-YYYY');
                isValid = false;
            }

            if (isValid) {
                $.ajax({
                    url: "{{ route('payments.store') }}", // Your endpoint
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
                            "{{ route('view-edit-orders') }}"; // Redirect
                        });
                        
                    },
                    error: function(xhr) {
                        // Handle errors here, such as displaying error messages
                        console.log('Error:', xhr.responseText);
                    }
                });
            }
        });

        // Function to handle changes in autofilled fields
        function monitorAutofill() {
            $('#paymentForm input, #paymentForm select').each(function() {
                var inputId = $(this).attr('id');
                var previousValue = $(this).val();

                // Monitor for changes
                setInterval(() => {
                    var currentValue = $(this).val();
                    if (currentValue !== previousValue) {
                        $('#' + inputId + 'Error').text('');
                        previousValue = currentValue;
                    }
                }, 500); // Check every 500ms
            });
        }

        // Call the function to monitor autofill changes
        monitorAutofill();
    });
    </script>
</body>

</html>