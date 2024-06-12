<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>View Edit Staff</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS (includes Popper.js for tooltips and popovers) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
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
                                <h3 class="page-title">All Customers</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active">View/Edit Customers</li>
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
                                <input type="text" id="searchByName" class="form-control"
                                    placeholder="Search by Name ...">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <input type="text" id="searchByPhone" class="form-control"
                                    placeholder="Search by Phone ...">
                            </div>
                        </div>
                        <div class="col-lg-2">
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
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Customer Name</th>
                                                <th class="text-center">Contact No</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customerDetails as $customer)
                                            <tr>
                                                <td class="text-center">{{ $customer->id }}</td>
                                                <td class="text-center">{{ $customer->customer_name }}</td>
                                                <td class="text-center">{{ $customer->contact_number }}</td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <a href="{{ route('customer.edit', $customer->id) }}"
                                                            class="btn btn-sm bg-success-light me-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form action="{{ route('customer.destroy', $customer->id) }}"
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
                                                <style>
                                                .delete-btn:hover {
                                                    background-color: #ff5c5c !important;
                                                    /* Change to a red color */
                                                }

                                                .delete-btn:hover i {
                                                    color: #fff !important;
                                                }
                                                </style>
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
                $.ajax({
                    url: $(form).attr('action'),
                    type: "POST",
                    data: $(form).serialize(), // Serialize form data
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // CSRF token for Laravel
                    },
                    success: function(response) {
                        $('#alertModal')
                            .fadeOut(); // Fade out the modal on successful data submission
                        window.location
                            .reload(); // Reload the page to reflect the changes
                    },
                    error: function(xhr) {
                        // Handle errors here, such as displaying error messages
                        console.log('Error:', xhr.responseText);
                    }
                });
            });

            $('#noButton').click(function() {
                $('#alertModal').fadeOut(); // Close the modal without deleting
            });
        });
    });
    </script>
    <script>
    function performSearch() {
        // Get the search values
        const searchById = document.getElementById('searchById').value.toLowerCase();
        const searchByName = document.getElementById('searchByName').value.toLowerCase();
        const searchByPhone = document.getElementById('searchByPhone').value.toLowerCase();

        // Get the table rows
        const rows = document.querySelectorAll('.datatable tbody tr');

        // Loop through the table rows
        rows.forEach(row => {
            // Get the cells
            const idCell = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
            const nameCell = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const phoneCell = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

            // Check if the row matches the search criteria
            const matchesId = idCell.includes(searchById);
            const matchesName = nameCell.includes(searchByName);
            const matchesPhone = phoneCell.includes(searchByPhone);

            // Show or hide the row based on the search criteria
            if (matchesId && matchesName && matchesPhone) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
    </script>

</body>

</html>