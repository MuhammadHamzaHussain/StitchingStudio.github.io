<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>View Edit Income Category</title>
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
                                <h3 class="page-title">All Income Category</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Income Management</a></li>
                                    <li class="breadcrumb-item active">View/Edit Income Category</li>
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
                <input type="text" id="searchByName" class="form-control" placeholder="Search by Name ...">
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="form-group">
                <input type="text" id="searchByPhone" class="form-control" placeholder="Search by Phone ...">
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
                                                <th class="text-center">Income Category</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <a href="#" class="btn btn-sm bg-success-light me-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="" method="POST" class="d-inline">

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