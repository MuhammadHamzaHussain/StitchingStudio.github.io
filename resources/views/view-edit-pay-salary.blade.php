<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>View Edit Salary</title>
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
                                <h3 class="page-title">All Salary</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Staff Management</a></li>
                                    <li class="breadcrumb-item active">View/Edit Salary</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="student-group-form">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" id="searchById" class="form-control" placeholder="Search by ID ...">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" id="searchByDesignation" class="form-control"
                                    placeholder="Search by Designation ...">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" id="searchByName" class="form-control"
                                    placeholder="Search by Name ...">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="search-student-btn">
                                <button type="button" class="btn btn-primary" onclick="performSearch()">Search</button>
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
                                                <th>ID</th>
                                                <th>Designation</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Salary</th>
                                                <th>Description</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($salaryDetails as $salaryDetail)
                                            <tr>
                                                <td>{{ $salaryDetail->id }}</td>
                                                <td>{{ $salaryDetail->staff_designation }}</td>
                                                <td>{{ $salaryDetail->staff_name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($salaryDetail->date)->format('d-m-Y') }}
                                                </td>
                                                <td>{{ $salaryDetail->amount }}</td>
                                                <td>{{ $salaryDetail->description }}</td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <a href="{{ route('salary.edit', $salaryDetail->id) }}"
                                                            class="btn btn-sm bg-success-light me-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form action="{{ route('salary.destroy', $salaryDetail->id) }}"
                                                            method="POST" class="d-inline delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm bg-danger-light delete-btn">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
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

            <div id="alertModal" class="centered-modal">
                <div class="checkmark-circle">
                    <i class="fas fa-check-circle"></i> <!-- Font Awesome Checkmark -->
                </div>
                <h5 class="text-center">Awesome!</h5>
                <p class="text-center">Are you sure you want to delete?</p>


                <div class="d-flex justify-content-center">
                    <button id="yesButton" class="btn btn-success"
                        style="background-color: #FF0000; color: white; border: 1px solid #FF0000;">Yes</button>
                    <button id="noButton" class="btn btn-secondary" style="margin-left: 10px;">No</button>
                </div>
            </div>

            <style>
            .delete-btn:hover {
                background-color: #FF0000 !important;
                /* Change to a red color */
            }

            .delete-btn:hover i {
                color: #fff !important;
            }

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
                color: #FF0000;
                font-size: 2rem;
                display: flex;
                justify-content: center;
                margin-bottom: 0.5rem;
            }
            </style>
            <div id="loadingIndicator"
                style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1051;">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
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
        $('.delete-form').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            let form = this;
            $('#alertModal').fadeIn(); // Show the modal

            $('#yesButton').click(function() {
                $('#loadingIndicator').show(); // Show the loading indicator
                $.ajax({
                    url: $(form).attr('action'),
                    type: "POST",
                    data: $(form).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#alertModal').fadeOut(); // Hide the modal on success
                        window.location
                            .reload(); // Reload the page to reflect the changes
                        $('#loadingIndicator').hide(); // Hide the loading indicator
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                        $('#loadingIndicator')
                            .hide(); // Hide the loading indicator on failure
                    }
                });
            });

            $('#noButton').click(function() {
                $('#alertModal').fadeOut(); // Hide the modal without deleting
                $('#loadingIndicator')
                    .hide(); // Ensure loading indicator is hidden if No is clicked
            });
        });

    });
    </script>
    <script>
    function performSearch() {
        $('#loadingIndicator').show(); // Show the loading indicator before search starts

        const searchById = document.getElementById('searchById').value.toLowerCase();
        const searchByDesignation = document.getElementById('searchByDesignation').value.toLowerCase();
        const searchByName = document.getElementById('searchByName').value.toLowerCase();

        const rows = document.querySelectorAll('.datatable tbody tr');

        rows.forEach(row => {
            const idCell = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
            const designationCell = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const nameCell = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

            const matchesId = idCell.includes(searchById);
            const matchesDesignation = designationCell.includes(searchByDesignation);
            const matchesName = nameCell.includes(searchByName);

            if (matchesId && matchesDesignation && matchesName) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        $('#loadingIndicator').hide(); // Hide the loading indicator after search
    }
    </script>

</body>

</html>