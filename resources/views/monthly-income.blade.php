<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>View Edit Staff</title>
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
</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Monthly Income</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Monthly Income</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="student-group-form">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <input id="searchMonth" type="text" class="form-control"
                                    placeholder="Search by Month ...">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <input id="searchYear" type="text" class="form-control"
                                    placeholder="Search by Year ...">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="search-student-btn">
                                <button id="searchBtn" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table comman-shadow">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                        <thead class="student-thread">
                                            <tr>

                                                <th class="text-center">Month</th>
                                                <th class="text-center">Year</th>
                                                <th class="text-end">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($payments as $payment)
                                            <tr>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::create()->month($payment->month)->format('F') }}
                                                </td>
                                                <td class="text-center">{{ $payment->year }}</td>
                                                <td class="text-end">{{ $payment->total_income }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <p>COPYRIGHT © 2024 CHAWLA STITCHING STUDIO.</p>
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

    <script>
    $(document).ready(function() {
        $('#searchBtn').click(function() {
            var searchMonth = $('#searchMonth').val().toLowerCase();
            var searchYear = $('#searchYear').val().toLowerCase();

            $('.datatable tbody tr').each(function() {
                var month = $(this).find('td:eq(0)').text().toLowerCase();
                var year = $(this).find('td:eq(1)').text().toLowerCase();

                if (month.includes(searchMonth) && year.includes(searchYear)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
    </script>

</body>

</html>