<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Print Receipt</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Fontfamily -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style-one.css') }}">
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
                                <h3 class="page-title">Print Receipt</h3>
                                <ul class="breadcrumb">
                                    <li>
                                        <button type="button" class="btn btn-primary"
                                            onclick="printSection('printableArea')">Print</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="printableArea" class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center">
                                    <!-- Flex container with center alignment -->
                                    <div class="text-center">
                                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid"
                                            style="height: 150px; width: 150px; margin-left: 300px">
                                    </div>
                                    <div class="col-md-6 text-right">
                                        @if($image)
                                        <img src="{{ asset('images/' . $image->filename) }}" alt="Receipt Image"
                                            style="width: 150px; height: 150px;">
                                        @else
                                        <!-- If no image found, you can display a placeholder or message -->
                                        <p>No image available</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Customer Details</span></h5>
                                        <table class="table table-borderless">
                                            <tr>
                                                <td><strong>Bill No:</strong></td>
                                                <td>{{ $order_id }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>NAME:</strong></td>
                                                <td>{{ $customer_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>PHONE:</strong></td>
                                                <td>{{ $contact_number }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>SERVED BY:</strong></td>
                                                <td>{{ $received_by }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Date to Collect:</strong></td>
                                                <td>{{ $doc }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Description:</strong></td>
                                                <td>{{ $description }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Suit:</strong></td>
                                                <td>{{ $noOfSuits }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Amount:</strong></td>
                                                <td>Rs {{ number_format($amount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Paid:</strong></td>
                                                <td>Rs {{ number_format($paid, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Remaining Balance:</strong></td>
                                                <td>Rs {{ number_format($balance, 2) }}</td>
                                            </tr>
                                        </table>
                                        <div class="text-center mt-4">
                                            <h5 class="form-title"><span>معزز کسٹمرز! اپنے سلائی شُدہ ملبوسات پندرہ دن
                                                    کے اندر واپسی وصول ضرور کر لیں۔۔شُکریہ</span></h5>
                                            <h5 class="form-title"><span>Contact No: 03-111-100-394</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <p class="text-center">COPYRIGHT © 2024 Chawla Stitching Studio.</p>
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


    <script>
    function printSection(divId) {
        var content = document.getElementById(divId).innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = content;
        window.print();
        document.body.innerHTML = originalContent;
    }
    </script>
</body>

</html>