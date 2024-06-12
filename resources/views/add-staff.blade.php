<?php echo view('sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Staff</title>
    <!-- Include necessary CSS and JS files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-FLn3O3VpVsuxLfeIbeT2Vm8HtzXsPHqBJOBBDRrqA+R5Fyr6h0JfO3sDuWpJ6ACwb1QzpfBEfFxi86xy5WDFcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-PiD5B/QsESK9URCvXJvRJlZMW5A5eYPKTXKISG/2i8fVowTi8c2hVCwlL4e1P5cVxZJH+Oy0BKOc2FqJ+R3blQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6-beta.19/jquery.inputmask.min.js"></script>
    <!-- Fontfamily -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                                <h3 class="page-title">Add Staff</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Staff Management</a></li>
                                    <li class="breadcrumb-item active">Add Staff</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="basicDetailsForm">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Basic Details</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Select Designation <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="designation" id="designation">
                                                    <option value="">Select Staff Designation</option>
                                                    @foreach ($designationDetails as $designation)
                                                    <option value="{{ $designation->id }}">
                                                        {{ $designation->designationName }}</option>
                                                    @endforeach
                                                </select>
                                                <div id="designationError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Name <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter Name" autocomplete="off">
                                                <div id="nameError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Gender <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="gender" id="gender">
                                                    <option value="">Please Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <div id="genderError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Date Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker" type="text" id="dob"
                                                    name="dob" placeholder="DD-MM-YYYY">
                                                <span class="icon"><i class="fa-solid fa-calendar-days"></i></span>
                                                <div id="dobError" class="text-danger"></div>
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
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Mobile <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="mobile" name="mobile"
                                                    placeholder="____-_______" autocomplete="off">
                                                <div id="mobileError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const input = document.getElementById('mobile');
                                            input.addEventListener('input', function(e) {
                                                let value = e.target.value.replace(/\D/g, '');
                                                let formattedValue = '';
                                                if (value.length > 0) {
                                                    formattedValue += value.substring(0, 4);
                                                }
                                                if (value.length > 4) {
                                                    formattedValue += '-' + value.substring(4, 11);
                                                }
                                                e.target.value = formattedValue;
                                            });
                                        });
                                        </script>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Joining Date <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker" type="text" id="joiningDate"
                                                    name="joining_date" placeholder="DD-MM-YYYY">
                                                <span class="icon"><i class="fa-solid fa-calendar-days"></i></span>
                                                <div id="joiningDateError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Address</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Address <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    placeholder="Enter address" autocomplete="off">
                                                <div id="addressError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group local-forms">
                                                <label>City <span class="login-danger">*</span></label>
                                                <select class="form-control select" id="city" name="city">
                                                    <option value="">Select City</option>
                                                    <option value="Abbottabad (HAZARA)">Abbottabad (HAZARA)</option>
                                                    <option value="Astore">Astore</option>
                                                    <option value="Attock">Attock</option>
                                                    <option value="Awaran">Awaran</option>
                                                    <option value="Badin">Badin</option>
                                                    <option value="Bagh">Bagh</option>
                                                    <option value="Bahawalnagar">Bahawalnagar</option>
                                                    <option value="Bahawalpur">Bahawalpur</option>
                                                    <option value="Bajour Agency">Bajour Agency</option>
                                                    <option value="Banbhore">Banbhore</option>
                                                    <option value="Bannu">Bannu</option>
                                                    <option value="Barkhan">Barkhan</option>
                                                    <option value="Battagram">Battagram</option>
                                                    <option value="Bhakkar">Bhakkar</option>
                                                    <option value="Bhimber">Bhimber</option>
                                                    <option value="Buner">Buner</option>
                                                    <option value="Chagai">Chagai</option>
                                                    <option value="Chakwal">Chakwal</option>
                                                    <option value="Charsadda">Charsadda</option>
                                                    <option value="Chiniot">Chiniot</option>
                                                    <option value="Chitral">Chitral</option>
                                                    <option value="D.G Khan">D.G Khan</option>
                                                    <option value="Dadu">Dadu</option>
                                                    <option value="Darel">Darel</option>
                                                    <option value="Dera Bugti">Dera Bugti</option>
                                                    <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                                    <option value="Dera Murad Jamali">Dera Murad Jamali</option>
                                                    <option value="Diamer">Diamer</option>
                                                    <option value="Faisalabad">Faisalabad</option>
                                                    <option value="FR Bannu">FR Bannu</option>
                                                    <option value="FR D.I.Khan">FR D.I.Khan</option>
                                                    <option value="FR Kohat">FR Kohat</option>
                                                    <option value="FR Lakki Marwat">FR Lakki Marwat</option>
                                                    <option value="FR Peshawar">FR Peshawar</option>
                                                    <option value="FR Tank">FR Tank</option>
                                                    <option value="Ghanche">Ghanche</option>
                                                    <option value="Ghizer">Ghizer</option>
                                                    <option value="Ghotki">Ghotki</option>
                                                    <option value="Gilgit">Gilgit</option>
                                                    <option value="Gujranwala">Gujranwala</option>
                                                    <option value="Gujrat">Gujrat</option>
                                                    <option value="Gupis Yasin">Gupis Yasin</option>
                                                    <option value="Gwader">Gwader</option>
                                                    <option value="Hafizabad">Hafizabad</option>
                                                    <option value="Hangu">Hangu</option>
                                                    <option value="Haripur">Haripur</option>
                                                    <option value="Harnai">Harnai</option>
                                                    <option value="Hattian Bala">Hattian Bala</option>
                                                    <option value="Haveli">Haveli</option>
                                                    <option value="Hunza">Hunza</option>
                                                    <option value="Hyderabad">Hyderabad</option>
                                                    <option value="Islamabad">Islamabad</option>
                                                    <option value="Jacobabad">Jacobabad</option>
                                                    <option value="Jafarabad">Jafarabad</option>
                                                    <option value="Jamshoro">Jamshoro</option>
                                                    <option value="Jhal Magsi">Jhal Magsi</option>
                                                    <option value="Jhang">Jhang</option>
                                                    <option value="Jhelum">Jhelum</option>
                                                    <option value="Kalat">Kalat</option>
                                                    <option value="Kambar Shahdadkot">Kambar Shahdadkot</option>
                                                    <option value="Karachi Central">Karachi Central</option>
                                                    <option value="Karachi East">Karachi East</option>
                                                    <option value="Karachi South">Karachi South</option>
                                                    <option value="Karachi West">Karachi West</option>
                                                    <option value="Karak">Karak</option>
                                                    <option value="Kashmore">Kashmore</option>
                                                    <option value="Kasur">Kasur</option>
                                                    <option value="Kech">Kech</option>
                                                    <option value="Khachi">Khachi</option>
                                                    <option value="Khairpur">Khairpur</option>
                                                    <option value="Khanewal">Khanewal</option>
                                                    <option value="Kharan">Kharan</option>
                                                    <option value="Kharmang">Kharmang</option>
                                                    <option value="Khurram Agency">Khurram Agency</option>
                                                    <option value="Khushab">Khushab</option>
                                                    <option value="Khuzdar">Khuzdar</option>
                                                    <option value="Khyber Agency">Khyber Agency</option>
                                                    <option value="Kohat">Kohat</option>
                                                    <option value="Kohlu">Kohlu</option>
                                                    <option value="Kollai Pallas">Kollai Pallas</option>
                                                    <option value="Korangi">Korangi</option>
                                                    <option value="Kotli">Kotli</option>
                                                    <option value="Lahore">Lahore</option>
                                                    <option value="Lakki Marwat">Lakki Marwat</option>
                                                    <option value="Larkana">Larkana</option>
                                                    <option value="Lasbela">Lasbela</option>
                                                    <option value="Layyah">Layyah</option>
                                                    <option value="Lodhran">Lodhran</option>
                                                    <option value="Loralai">Loralai</option>
                                                    <option value="Lower Dir">Lower Dir</option>
                                                    <option value="Lower Kohistan">Lower Kohistan</option>
                                                    <option value="Makran">Makran</option>
                                                    <option value="Malakand">Malakand</option>
                                                    <option value="Malir">Malir</option>
                                                    <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                                    <option value="Mansehra">Mansehra</option>
                                                    <option value="Mardan">Mardan</option>
                                                    <option value="Mastung">Mastung</option>
                                                    <option value="Matiari">Matiari</option>
                                                    <option value="Mianwali">Mianwali</option>
                                                    <option value="Mirpur">Mirpur</option>
                                                    <option value="Mirpur Khas">Mirpur Khas</option>
                                                    <option value="Mohmand Agency">Mohmand Agency</option>
                                                    <option value="Multan">Multan</option>
                                                    <option value="Musakhail">Musakhail</option>
                                                    <option value="Muzaffarabad">Muzaffarabad</option>
                                                    <option value="Muzaffargarh">Muzaffargarh</option>
                                                    <option value="Nagar">Nagar</option>
                                                    <option value="Nankana Sahib">Nankana Sahib</option>
                                                    <option value="Narowal">Narowal</option>
                                                    <option value="Nasirabad">Nasirabad</option>
                                                    <option value="Naushahro Feroze">Naushahro Feroze</option>
                                                    <option value="Neelam Valley">Neelam Valley</option>
                                                    <option value="North Wazirstan Agency">North Wazirstan Agency
                                                    </option>
                                                    <option value="Noshki">Noshki</option>
                                                    <option value="Nowshera">Nowshera</option>
                                                    <option value="Okara">Okara</option>
                                                    <option value="Orakzai Agency">Orakzai Agency</option>
                                                    <option value="Pakpattan">Pakpattan</option>
                                                    <option value="Panjgur">Panjgur</option>
                                                    <option value="Peshawar">Peshawar</option>
                                                    <option value="Pishin">Pishin</option>
                                                    <option value="Poonch">Poonch</option>
                                                    <option value="Qila Abdullah">Qila Abdullah</option>
                                                    <option value="Qila Saifullah">Qila Saifullah</option>
                                                    <option value="Quetta">Quetta</option>
                                                    <option value="Rahimyar Khan">Rahimyar Khan</option>
                                                    <option value="Rajanpur">Rajanpur</option>
                                                    <option value="Rawalpindi">Rawalpindi</option>
                                                    <option value="Sahiwal">Sahiwal</option>
                                                    <option value="Sanghar">Sanghar</option>
                                                    <option value="Sargodha">Sargodha</option>
                                                    <option value="Shaheed Benazirabad">Shaheed Benazirabad</option>
                                                    <option value="Shangla">Shangla</option>
                                                    <option value="Sheikhupura">Sheikhupura</option>
                                                    <option value="Sherani">Sherani</option>
                                                    <option value="Shigar">Shigar</option>
                                                    <option value="Shikarpur">Shikarpur</option>
                                                    <option value="Sialkot">Sialkot</option>
                                                    <option value="Sibi">Sibi</option>
                                                    <option value="Skardu (Div. Baltistan)">Skardu (Div. Baltistan)
                                                    </option>
                                                    <option value="South Wazirstan Agency">South Wazirstan Agency
                                                    </option>
                                                    <option value="Sudhnati">Sudhnati</option>
                                                    <option value="Sujawal">Sujawal</option>
                                                    <option value="Sukkur">Sukkur</option>
                                                    <option value="Swabi">Swabi</option>
                                                    <option value="Swat">Swat</option>
                                                    <option value="Tando Allahyar">Tando Allahyar</option>
                                                    <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
                                                    <option value="Tangir">Tangir</option>
                                                    <option value="Tank">Tank</option>
                                                    <option value="Tharparkar">Tharparkar</option>
                                                    <option value="Thatta">Thatta</option>
                                                    <option value="Toba Tek Singh">Toba Tek Singh</option>
                                                    <option value="Torghar">Torghar</option>
                                                    <option value="Umerkot">Umerkot</option>
                                                    <option value="Upper Dir">Upper Dir</option>
                                                    <option value="Upper Kohistan">Upper Kohistan</option>
                                                    <option value="Vehari">Vehari</option>
                                                    <option value="Washuk">Washuk</option>
                                                    <option value="Zhob">Zhob</option>
                                                    <option value="Ziarat">Ziarat</option>
                                                </select>
                                                <div id="cityError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group local-forms">
                                                <label>State <span class="login-danger">*</span></label>
                                                <select class="form-control select" id="state" name="state">
                                                    <option value="">Select State</option>
                                                    <option value="Azad Jammu and Kashmir">Azad Jammu and Kashmir
                                                    </option>
                                                    <option value="Balochistan">Balochistan</option>
                                                    <option value="FATA (Federally Administered Tribal Areas)">FATA
                                                        (Federally Administered Tribal Areas)</option>
                                                    <option value="Gilgit-Baltistan">Gilgit-Baltistan</option>
                                                    <option value="Islamabad">Islamabad</option>
                                                    <option value="KPK (Khyber Pakhtunkhwa)">KPK (Khyber Pakhtunkhwa)
                                                    </option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Sindh">Sindh</option>
                                                </select>
                                                <div id="stateError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <script>
                                        $(document).ready(function() {
                                            $('#state').select2({
                                                placeholder: "Select State",
                                                language: {
                                                    noResults: function() {
                                                        return "No results found";
                                                    }
                                                }
                                            });
                                            $('#city').select2({
                                                placeholder: "Select City",
                                                language: {
                                                    noResults: function() {
                                                        return "No results found";
                                                    }
                                                }
                                            });
                                            // Apply the placeholder to the search box within the dropdown
                                            $('#state').on('select2:open', function() {
                                                $('.select2-search__field').attr('placeholder',
                                                    'Search State');
                                            });
                                            $('#city').on('select2:open', function() {
                                                $('.select2-search__field').attr('placeholder',
                                                    'Search City');
                                            });
                                        });
                                        </script>
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Salary</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Salary <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="salary" name="salary"
                                                    placeholder="Enter Salary" autocomplete="off">
                                                <div id="salaryError" class="text-danger"></div>
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
                <p class="text-center">Staff added Successfully!</p>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
    <!-- Include necessary JS files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-GK2oVgyLjrH9TKuY+YjxJKQ2LiRNpR1a5C4js1U5dN9jT+akFjGm2WfY9lxtZ/uIaL6y4c/6hDw8a0Rk4POVWQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-KJs7ZsZa1f+ztZFcL1WyMzCx4v94I8ezlgrCQwpB5rK3tNE9LfDYqXhAPFG8rWx5Vn8fhDDxTl6eeed5CBgsDg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Custom JavaScript -->
    <script src="assets/js/script.js"></script>
    <!-- <script src="assets/js/add-staff.js"></script> -->
    <script>
    $(document).ready(function() {
        // Function to clear error messages
        function clearErrorMessages() {
            var inputId = $(this).attr('id');
            $('#' + inputId + 'Error').text('');
        }
        // Attach event listener to clear error messages on input
        $('#designation').on('input', clearErrorMessages);
        $('#name').on('input', clearErrorMessages);
        $('#gender').on('input', clearErrorMessages);
        $('#dob').on('input change', clearErrorMessages);
        $('#mobile').on('input', clearErrorMessages);
        $('#joiningDate').on('input change', clearErrorMessages);
        $('#address').on('input', clearErrorMessages);
        $('#city').on('input', clearErrorMessages);
        $('#state').on('input', clearErrorMessages);
        $('#salary').on('input', clearErrorMessages);
        $('#basicDetailsForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            var isValid = true;
            // Basic details validation
            if ($('#designation').val() === '') {
                $('#designationError').text('Designation is required');
                isValid = false;
            }
            if ($('#name').val().trim() === '') {
                $('#nameError').text('Name is required');
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test($('#name').val().trim())) {
                $('#nameError').text('Only alphabets and spaces are allowed for Name');
                isValid = false;
            }
            if ($('#gender').val() === '') {
                $('#genderError').text('Gender is required');
                isValid = false;
            }
            if ($('#dob').val().trim() === '') {
                $('#dobError').text('Date of Birth is required');
                isValid = false;
            } else {
                // Validate date format and check if it's a past date
                var dobParts = $('#dob').val().split('-');
                var dob = new Date(dobParts[2], dobParts[1] - 1, dobParts[
                0]); // Year, month (0 indexed), day
                var today = new Date();
                if (dob >= today) {
                    $('#dobError').text('Date of Birth must be a past date');
                    isValid = false;
                }
            }
            if ($('#mobile').val().trim() === '') {
                $('#mobileError').text('Mobile number is required');
                isValid = false;
            }
            if ($('#joiningDate').val().trim() === '') {
                $('#joiningDateError').text('Joining Date is required');
                isValid = false;
            } else {
                // Validate if the joining date is today's date
                var joiningDateParts = $('#joiningDate').val().split('-');
                var joiningDate = new Date(joiningDateParts[2], joiningDateParts[1] - 1,
                    joiningDateParts[0]); // Year, month (0 indexed), day
                var today = new Date();
                if (!(joiningDate.getFullYear() === today.getFullYear() &&
                        joiningDate.getMonth() === today.getMonth() &&
                        joiningDate.getDate() === today.getDate())) {
                    $('#joiningDateError').text('Joining Date must be today\'s date');
                    isValid = false;
                }
            }
            if ($('#address').val().trim() === '') {
                $('#addressError').text('Address is required');
                isValid = false;
            }
            if ($('#city').val().trim() === '') {
                $('#cityError').text('City is required');
                isValid = false;
            }
            if ($('#state').val().trim() === '') {
                $('#stateError').text('State is required');
                isValid = false;
            }
            if ($('#salary').val().trim() === '') {
                $('#salaryError').text('Salary is required');
                isValid = false;
            } else if (!/^\d+$/.test($('#salary').val().trim())) {
                $('#salaryError').text('Salary should contain only digits');
                isValid = false;
            }
            if (isValid) {
                $.ajax({
                    url: "{{ route('staff.store') }}", // Your endpoint
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
                                "{{ route('view-edit-staff') }}"; // Redirect
                        });

                    },
                    error: function(xhr) {
                        // Handle errors here, such as displaying error messages
                        console.log('Error:', xhr.responseText);
                    }
                });
            }
        });
    });
    </script>
</body>

</html>