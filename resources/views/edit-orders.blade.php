<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                <h3 class="page-title">Edit Order</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Edit Order</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('update-order', ['id' => $order->id]) }}" method="POST"
                                    id="orderForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Edit Order Details</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Customer Name <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" name="customer_name"
                                                    id="customer_name" list="customerList"
                                                    value="{{ $order->customer_name }}" readonly
                                                    style="background-color: #fff; border: 1px solid #ced4da; color: #495057;">

                                                <div id="customerNameError" class="text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Received By <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="received_by" id="received_by">
                                                    <option value="">Please Select</option>
                                                    @foreach ($staffNames as $staff)
                                                    <option value="{{ $staff->name }}"
                                                        {{ $staff->name == $order->received_by ? 'selected' : '' }}>
                                                        {{ $staff->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <div id="receivedByError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <svg id="calendar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            style="width: 1em; height: 1em; position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer !important;">
                                            <path
                                                d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                        </svg>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Date Of Collect <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker" type="text" id="doc"
                                                    name="doc"
                                                    value="{{ \Carbon\Carbon::parse($order->doc)->format('d-m-Y') }}"
                                                    placeholder="DD-MM-YYYY">
                                                <div id="docError" class="text-danger"></div>
                                            </div>
                                        </div>

                                        <script>
                                        $(document).ready(function() {
                                            $('#calendar-icon').on('click', function() {
                                                $('.datetimepicker')
                                            .focus(); // Focus on the input when the icon is clicked
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
                                        </style>


                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>No of Suits <span class="login-danger">*</span></label>
                                                <input type="number" class="form-control" id="noOfSuits"
                                                    name="noOfSuits" value="{{ $order->noOfSuits }}" autocomplete="off">
                                                <div id="noOfSuitsError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div id="orderCategoryTemplate" style="display: none;">
                                            <label for="order_category" style="font-weight: bold !important;">Order
                                                Category</label>
                                            <div class="custom-dropdown">
                                                <style>
                                                .currency {
                                                    margin-left: 70px;
                                                    margin-right: 70px;
                                                }
                                                </style>
                                                <label class="checkbox-container" style="font-weight: bold;">
                                                    <input type="checkbox" name="category[]" value="1" id="category1">
                                                    <span class="currency" style="font-weight: bold;">1500 ₨</span>
                                                    <span class="urdu-text"
                                                        style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;سادہ
                                                        سنگل سلائی</span>
                                                </label>
                                                <label style="display: block;" style="font-weight: bold;" s>
                                                    <input type="checkbox" name="category[]" value="2" id="category2">
                                                    <span class="currency" style="font-weight: bold;">1700 ₨</span>
                                                    <span class="urdu-text"
                                                        style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;سادہ
                                                        ڈبل سلائی</span>
                                                </label>
                                                <label style="display: block; font-weight: bold;">
                                                    <input type="checkbox" name="category[]" value="3" id="category3">
                                                    <span class="currency" style="font-weight: bold;">1900
                                                        ₨</span>
                                                    <span class="urdu-text"
                                                        style="font-weight: bold;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspاینکرڈبل
                                                            سلائی</strong></span>
                                                </label>
                                                <label style="display: block;">
                                                    <input type="checkbox" name="category[]" value="4" id="category4">
                                                    <span class="currency" style="font-weight: bold;">550 ₨</span> <span
                                                        class="urdu-text"
                                                        style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;سیمی
                                                        سیچ</span>
                                                </label>
                                                <label style="display: block;">
                                                    <input type="checkbox" name="category[]" value="5" id="category5">
                                                    <span class="currency" style="font-weight: bold;">250 ₨</span> <span
                                                        class="urdu-text"
                                                        style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;کانٹا</span>
                                                </label>
                                                <label style="display: block;">
                                                    <input type="checkbox" name="category[]" value="6" id="category6">
                                                    <span class="currency" style="font-weight: bold;">250 ₨</span> <span
                                                        class="urdu-text"
                                                        style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;جالی</span>
                                                </label>
                                                <label style="display: block;">
                                                    <input type="checkbox" name="category[]" value="7" id="category7">
                                                    <span class="currency" style="font-weight: bold;">500 ₨</span> <span
                                                        class="urdu-text"
                                                        style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;جالی-کانٹا</span>
                                                </label>
                                                <label style="display: block;">
                                                    <input type="checkbox" name="category[]" value="8" id="category8">
                                                    <span class="currency" style="font-weight: bold;">150 ₨</span> <span
                                                        class="urdu-text"
                                                        style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ٹراؤ
                                                        زرڈوری
                                                        لاسٹک</span>
                                                </label>
                                                <label style="display: block;">
                                                    <input type="checkbox" name="category[]" value="9" id="category9">
                                                    <span class="currency" style="font-weight: bold;">700 ₨</span>
                                                    <span class="urdu-text"
                                                        style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ڈریس
                                                        پینٹ
                                                        ٹراؤزر</span>
                                                </label>
                                                <label style="display: block;">
                                                    <input type="checkbox" name="category[]" value="10" id="category10">
                                                    <span class="currency" style="font-weight: bold;">4000 ₨</span>
                                                    <span class="urdu-text"
                                                        style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ویسکوٹ</span>
                                                </label>
                                                <label style="display: block;">
                                                    <input type="checkbox" name="category[]" value="11" id="category11">
                                                    <span class="currency" style="font-weight: bold;">1650 ₨</span>
                                                    <span class="urdu-text"
                                                        style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;سنگل
                                                        سلائی + ٹراؤ زر</span>
                                                </label><br>
                                            </div>
                                        </div>
                                        <div id="orderCategories"></div>
                                        <script>
                                        function updateDescription() {
                                            var categoryDescriptions = {
                                                1: 'سادہ سنگل سلائی',
                                                2: 'سادہ ڈبل سلائی',
                                                3: 'اینکرڈبل سلائی',
                                                4: 'سیمی سیچ',
                                                5: 'کانٹا',
                                                6: 'جالی',
                                                7: 'جالی-کانٹا',
                                                8: 'ٹراؤ زرڈوری لاسٹک',
                                                9: 'ڈریس پینٹ ٹراؤزر',
                                                10: 'ویسکوٹ',
                                                11: 'سنگل سلائی + ٹراؤ زر'
                                            };
                                            var description = '';
                                            $('input[name="category[]"]:checked').each(function() {
                                                var categoryId = parseInt($(this).val());
                                                description += categoryDescriptions[categoryId] + ', ';
                                            });
                                            description = description.slice(0, -2);
                                            $('#description').val(description);
                                        }
                                        $(document).ready(function() {
                                            $(document).on('change', 'input[name="category[]"]', function() {
                                                updateDescription();
                                                updateProfit();
                                            });
                                            $('#noOfSuits').change(function() {
                                                var noOfSuits = parseInt(this.value);
                                                var orderCategoriesDiv = $('#orderCategories');
                                                var orderCategoryTemplate = $('#orderCategoryTemplate');
                                                var amountField = $('#amount');
                                                orderCategoriesDiv.empty();
                                                for (var i = 0; i < noOfSuits; i++) {
                                                    var clone = orderCategoryTemplate.clone();
                                                    clone.show();
                                                    orderCategoriesDiv.append(clone);
                                                }
                                                if (noOfSuits === 0) {
                                                    amountField.val('0 ₨');
                                                } else {
                                                    updateCalculations();
                                                    updateProfit();
                                                }
                                            });

                                            function updateCalculations() {
                                                var categoryPrices = {
                                                    1: 1500,
                                                    2: 1700,
                                                    3: 1900,
                                                    4: 550,
                                                    5: 250,
                                                    6: 250,
                                                    7: 500,
                                                    8: 150,
                                                    9: 700,
                                                    10: 4000,
                                                    11: 1650
                                                };
                                                var totalAmount = 0;
                                                $('input[name="category[]"]:checked').each(function() {
                                                    var categoryId = parseInt($(this).val());
                                                    totalAmount += categoryPrices[categoryId];
                                                });
                                                $('#amount').val(totalAmount);
                                            }

                                            function updateProfit() {
                                                var categoryProfits = {
                                                    1: 400,
                                                    2: 480,
                                                    3: 550,
                                                    4: 180,
                                                    5: 180,
                                                    6: 100,
                                                    7: 280,
                                                    8: 80,
                                                    9: 200,
                                                    10: 1800,
                                                    11: 480
                                                };
                                                var totalProfit = 0;
                                                $('input[name="category[]"]:checked').each(function() {
                                                    var categoryId = parseInt($(this).val());
                                                    totalProfit += categoryProfits[categoryId];
                                                });
                                                $('#profit').val(totalProfit);
                                            }
                                            $(document).on('change', 'input[name="category[]"]', function() {
                                                updateCalculations();
                                                updateProfit();
                                            });
                                        });
                                        </script>
                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Amount <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="amount" name="amount"
                                                    readonly value="{{ $order->amount }}"
                                                    style="background-color: #fff; border: 1px solid #ced4da; color: #495057;" autocomplete="off">
                                                <div id="amountError" class="text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Description <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="description"
                                                    name="description" readonly value="{{ $order->description }}"
                                                    style="background-color: #fff; border: 1px solid #ced4da; color: #495057;" autocomplete="off">
                                                <div id="descriptionError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12" style="display: none;">
                                            <div class="form-group local-forms">
                                                <label>Profit <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="profit" name="profit"
                                                    value="{{ $order->profit }}">
                                                <div id="profitError" class="text-danger"></div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Completed <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="completed" id="completed">
                                                    <option value="">Please Select</option>
                                                    <option value="Yes"
                                                        {{ $order->completed == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="No"
                                                        {{ $order->completed == 'No' ? 'selected' : '' }}>No</option>
                                                </select>
                                                <div id="completedError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <style>
                                        .btn-primary {
                                            width: 800px;
                                            margin-left: 50px;
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

        // Attach event listener to clear error messages on input/change
        $('#customer_name').on('input change', clearErrorMessages);
        $('#received_by').on('change', clearErrorMessages);
        $('#doc').on('input change', clearErrorMessages);
        $('#noOfSuits').on('input change', clearErrorMessages);
        $('#amount').on('input change', clearErrorMessages);
        $('#description').on('input change', clearErrorMessages);
        $('#completed').on('change', clearErrorMessages);

        $('#orderForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            var isValid = true;

            // Basic details validation
            if ($('#customer_name').val().trim() === '') {
                $('#customerNameError').text('Customer name is required');
                isValid = false;
            }
            if ($('#received_by').val().trim() === '') {
                $('#receivedByError').text('Received By is required');
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test($('#received_by').val().trim())) {
                $('#receivedByError').text('Only alphabets and spaces are allowed for Received By');
                isValid = false;
            }
            if ($('#doc').val().trim() === '') {
                $('#docError').text('Date of Collect is required');
                isValid = false;
            }
            if ($('#noOfSuits').val().trim() === '') {
                $('#noOfSuitsError').text('Number of Suits is required');
                isValid = false;
            } else if (!/^\d+$/.test($('#noOfSuits').val().trim())) {
                $('#noOfSuitsError').text('Number of Suits should contain only digits');
                isValid = false;
            }
            if ($('#amount').val().trim() === '') {
                $('#amountError').text('Amount is required');
                isValid = false;
            } else if (!/^\d+(\.\d{1,2})?$/.test($('#amount').val().trim())) {
                $('#amountError').text('Amount should contain only digits');
                isValid = false;
            }
            if ($('#description').val().trim() === '') {
                $('#descriptionError').text('Description is required');
                isValid = false;
            }
            if ($('#completed').val() === '') {
                $('#completedError').text('Completion status is required');
                isValid = false;
            }

            if (isValid) {
                $.ajax({
                    url: "{{ route('update-order', ['id' => $order->id]) }}", // Correct endpoint
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
            $('#orderForm input, #orderForm select').each(function() {
                var input = $(this);
                var previousValue = input.val();

                // Monitor for changes
                setInterval(function() {
                    var currentValue = input.val();
                    if (currentValue !== previousValue) {
                        $('#' + input.attr('id') + 'Error').text('');
                        previousValue = currentValue;
                    }
                }, 500); // Check every 500ms
            });
        }

        // Call the function to monitor autofill changes
        monitorAutofill();

        // Event listener for the "No" button
        $('#noButton').click(function() {
            $('#alertModal').fadeOut();
        });
    });
    </script>


</body>

</html>