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
                                <h3 class="page-title">Edit Staff</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Staff Management</a></li>
                                    <li class="breadcrumb-item active">Edit Staff</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="basicDetailsForm" action="{{ route('staff.update', $staff->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
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
                                                    <option value="{{ $designation->id }}"
                                                        {{ $staff->designation == $designation->designationName ? 'selected' : '' }}>
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
                                                    value="{{ $staff->name }}">
                                                <div id="nameError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Gender <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="gender" id="gender">
                                                    <option value="">Please Select</option>
                                                    <option value="Male"
                                                        {{ $staff->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female"
                                                        {{ $staff->gender == 'Female' ? 'selected' : '' }}>Female
                                                    </option>
                                                    <option value="Others"
                                                        {{ $staff->gender == 'Others' ? 'selected' : '' }}>Others
                                                    </option>
                                                </select>
                                                <div id="genderError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label for="dob">Date Of Birth <span
                                                        class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker" type="text" id="dob"
                                                    name="dob"
                                                    value="{{ \Carbon\Carbon::parse($staff->dob)->format('d-m-Y') }}">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path
                                                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16z" />
                                                    </svg>
                                                </span>
                                                <div id="dobError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <script>
                                        $(document).ready(function() {
                                            // Focus on the datepicker input when the calendar icon is clicked
                                            $('.form-group .icon').click(function() {
                                                $(this).prev('.datetimepicker').focus();
                                            });
                                            // Add client-side validation for the date input
                                            $('#dob').on('blur', function() {
                                                const datePattern =
                                                    /^\d{2}-\d{2}-\d{4}$/; // Matches 'dd-mm-yyyy' format
                                                if (!datePattern.test($(this).val())) {
                                                    $('#dobError').text(
                                                        'Please enter a valid date in the format dd-mm-yyyy.'
                                                    );
                                                } else {
                                                    $('#dobError').text('');
                                                }
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
                                            cursor: pointer !important;
                                            /* Makes the icon interactive */
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
                                                    placeholder="____-_______" value="{{ $staff->mobile }}" autocomplete="off">
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
                                                    name="joining_date"
                                                    value="{{ \Carbon\Carbon::parse($staff->joining_date)->format('d-m-Y') }}">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path
                                                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16z" />
                                                    </svg>
                                                </span>
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
                                                    value="{{ $staff->address }}" autocomplete="off">
                                                <div id="addressError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group local-forms">
                                                <label>City <span class="login-danger">*</span></label>
                                                <select class="form-control select" id="city" name="city" autocomplete="off">
                                                    <option value="">Select City</option>
                                                    <option value="Abbottabad (HAZARA)"
                                                        {{ $staff->city == 'Abbottabad (HAZARA)' ? 'selected' : '' }}>
                                                        Abbottabad (HAZARA)</option>
                                                    <option value="Astore"
                                                        {{ $staff->city == 'Astore' ? 'selected' : '' }}>Astore</option>
                                                    <option value="Attock"
                                                        {{ $staff->city == 'Attock' ? 'selected' : '' }}>Attock</option>
                                                    <option value="Awaran"
                                                        {{ $staff->city == 'Awaran' ? 'selected' : '' }}>Awaran</option>
                                                    <option value="Badin"
                                                        {{ $staff->city == 'Badin' ? 'selected' : '' }}>Badin</option>
                                                    <option value="Bagh" {{ $staff->city == 'Bagh' ? 'selected' : '' }}>
                                                        Bagh</option>
                                                    <option value="Bahawalnagar"
                                                        {{ $staff->city == 'Bahawalnagar' ? 'selected' : '' }}>
                                                        Bahawalnagar</option>
                                                    <option value="Bahawalpur"
                                                        {{ $staff->city == 'Bahawalpur' ? 'selected' : '' }}>Bahawalpur
                                                    </option>
                                                    <option value="Bajour Agency"
                                                        {{ $staff->city == 'Bajour Agency' ? 'selected' : '' }}>Bajour
                                                        Agency</option>
                                                    <option value="Banbhore"
                                                        {{ $staff->city == 'Banbhore' ? 'selected' : '' }}>Banbhore
                                                    </option>
                                                    <option value="Bannu"
                                                        {{ $staff->city == 'Bannu' ? 'selected' : '' }}>Bannu</option>
                                                    <option value="Barkhan"
                                                        {{ $staff->city == 'Barkhan' ? 'selected' : '' }}>Barkhan
                                                    </option>
                                                    <option value="Battagram"
                                                        {{ $staff->city == 'Battagram' ? 'selected' : '' }}>Battagram
                                                    </option>
                                                    <option value="Bhakkar"
                                                        {{ $staff->city == 'Bhakkar' ? 'selected' : '' }}>Bhakkar
                                                    </option>
                                                    <option value="Bhimber"
                                                        {{ $staff->city == 'Bhimber' ? 'selected' : '' }}>Bhimber
                                                    </option>
                                                    <option value="Buner"
                                                        {{ $staff->city == 'Buner' ? 'selected' : '' }}>Buner</option>
                                                    <option value="Chagai"
                                                        {{ $staff->city == 'Chagai' ? 'selected' : '' }}>Chagai</option>
                                                    <option value="Chakwal"
                                                        {{ $staff->city == 'Chakwal' ? 'selected' : '' }}>Chakwal
                                                    </option>
                                                    <option value="Charsadda"
                                                        {{ $staff->city == 'Charsadda' ? 'selected' : '' }}>Charsadda
                                                    </option>
                                                    <option value="Chiniot"
                                                        {{ $staff->city == 'Chiniot' ? 'selected' : '' }}>Chiniot
                                                    </option>
                                                    <option value="Chitral"
                                                        {{ $staff->city == 'Chitral' ? 'selected' : '' }}>Chitral
                                                    </option>
                                                    <option value="D.G Khan"
                                                        {{ $staff->city == 'D.G Khan' ? 'selected' : '' }}>D.G Khan
                                                    </option>
                                                    <option value="Dadu" {{ $staff->city == 'Dadu' ? 'selected' : '' }}>
                                                        Dadu</option>
                                                    <option value="Darel"
                                                        {{ $staff->city == 'Darel' ? 'selected' : '' }}>Darel</option>
                                                    <option value="Dera Bugti"
                                                        {{ $staff->city == 'Dera Bugti' ? 'selected' : '' }}>Dera Bugti
                                                    </option>
                                                    <option value="Dera Ismail Khan"
                                                        {{ $staff->city == 'Dera Ismail Khan' ? 'selected' : '' }}>Dera
                                                        Ismail Khan</option>
                                                    <option value="Dera Murad Jamali"
                                                        {{ $staff->city == 'Dera Murad Jamali' ? 'selected' : '' }}>Dera
                                                        Murad Jamali</option>
                                                    <option value="Diamer"
                                                        {{ $staff->city == 'Diamer' ? 'selected' : '' }}>Diamer</option>
                                                    <option value="Faisalabad"
                                                        {{ $staff->city == 'Faisalabad' ? 'selected' : '' }}>Faisalabad
                                                    </option>
                                                    <option value="FR Bannu"
                                                        {{ $staff->city == 'FR Bannu' ? 'selected' : '' }}>FR Bannu
                                                    </option>
                                                    <option value="FR D.I.Khan"
                                                        {{ $staff->city == 'FR D.I.Khan' ? 'selected' : '' }}>FR
                                                        D.I.Khan</option>
                                                    <option value="FR Kohat"
                                                        {{ $staff->city == 'FR Kohat' ? 'selected' : '' }}>FR Kohat
                                                    </option>
                                                    <option value="FR Lakki Marwat"
                                                        {{ $staff->city == 'FR Lakki Marwat' ? 'selected' : '' }}>FR
                                                        Lakki Marwat</option>
                                                    <option value="FR Peshawar"
                                                        {{ $staff->city == 'FR Peshawar' ? 'selected' : '' }}>FR
                                                        Peshawar</option>
                                                    <option value="FR Tank"
                                                        {{ $staff->city == 'FR Tank' ? 'selected' : '' }}>FR Tank
                                                    </option>
                                                    <option value="Ghanche"
                                                        {{ $staff->city == 'Ghanche' ? 'selected' : '' }}>Ghanche
                                                    </option>
                                                    <option value="Ghizer"
                                                        {{ $staff->city == 'Ghizer' ? 'selected' : '' }}>Ghizer</option>
                                                    <option value="Ghotki"
                                                        {{ $staff->city == 'Ghotki' ? 'selected' : '' }}>Ghotki</option>
                                                    <option value="Gilgit"
                                                        {{ $staff->city == 'Gilgit' ? 'selected' : '' }}>Gilgit</option>
                                                    <option value="Gujranwala"
                                                        {{ $staff->city == 'Gujranwala' ? 'selected' : '' }}>Gujranwala
                                                    </option>
                                                    <option value="Gujrat"
                                                        {{ $staff->city == 'Gujrat' ? 'selected' : '' }}>Gujrat</option>
                                                    <option value="Gupis Yasin"
                                                        {{ $staff->city == 'Gupis Yasin' ? 'selected' : '' }}>Gupis
                                                        Yasin</option>
                                                    <option value="Gwader"
                                                        {{ $staff->city == 'Gwader' ? 'selected' : '' }}>Gwader</option>
                                                    <option value="Hafizabad"
                                                        {{ $staff->city == 'Hafizabad' ? 'selected' : '' }}>Hafizabad
                                                    </option>
                                                    <option value="Hangu"
                                                        {{ $staff->city == 'Hangu' ? 'selected' : '' }}>Hangu</option>
                                                    <option value="Haripur"
                                                        {{ $staff->city == 'Haripur' ? 'selected' : '' }}>Haripur
                                                    </option>
                                                    <option value="Harnai"
                                                        {{ $staff->city == 'Harnai' ? 'selected' : '' }}>Harnai</option>
                                                    <option value="Hattian Bala"
                                                        {{ $staff->city == 'Hattian Bala' ? 'selected' : '' }}>Hattian
                                                        Bala</option>
                                                    <option value="Haveli"
                                                        {{ $staff->city == 'Haveli' ? 'selected' : '' }}>Haveli</option>
                                                    <option value="Hunza"
                                                        {{ $staff->city == 'Hunza' ? 'selected' : '' }}>Hunza</option>
                                                    <option value="Hyderabad"
                                                        {{ $staff->city == 'Hyderabad' ? 'selected' : '' }}>Hyderabad
                                                    </option>
                                                    <option value="Islamabad"
                                                        {{ $staff->city == 'Islamabad' ? 'selected' : '' }}>Islamabad
                                                    </option>
                                                    <option value="Jacobabad"
                                                        {{ $staff->city == 'Jacobabad' ? 'selected' : '' }}>Jacobabad
                                                    </option>
                                                    <option value="Jafarabad"
                                                        {{ $staff->city == 'Jafarabad' ? 'selected' : '' }}>Jafarabad
                                                    </option>
                                                    <option value="Jamshoro"
                                                        {{ $staff->city == 'Jamshoro' ? 'selected' : '' }}>Jamshoro
                                                    </option>
                                                    <option value="Jhal Magsi"
                                                        {{ $staff->city == 'Jhal Magsi' ? 'selected' : '' }}>Jhal Magsi
                                                    </option>
                                                    <option value="Jhang"
                                                        {{ $staff->city == 'Jhang' ? 'selected' : '' }}>Jhang</option>
                                                    <option value="Jhelum"
                                                        {{ $staff->city == 'Jhelum' ? 'selected' : '' }}>Jhelum</option>
                                                    <option value="Kalat"
                                                        {{ $staff->city == 'Kalat' ? 'selected' : '' }}>Kalat</option>
                                                    <option value="Kambar Shahdadkot"
                                                        {{ $staff->city == 'Kambar Shahdadkot' ? 'selected' : '' }}>
                                                        Kambar Shahdadkot</option>
                                                    <option value="Karachi Central"
                                                        {{ $staff->city == 'Karachi Central' ? 'selected' : '' }}>
                                                        Karachi Central</option>
                                                    <option value="Karachi East"
                                                        {{ $staff->city == 'Karachi East' ? 'selected' : '' }}>Karachi
                                                        East</option>
                                                    <option value="Karachi South"
                                                        {{ $staff->city == 'Karachi South' ? 'selected' : '' }}>Karachi
                                                        South</option>
                                                    <option value="Karachi West"
                                                        {{ $staff->city == 'Karachi West' ? 'selected' : '' }}>Karachi
                                                        West</option>
                                                    <option value="Karak"
                                                        {{ $staff->city == 'Karak' ? 'selected' : '' }}>Karak</option>
                                                    <option value="Kashmore"
                                                        {{ $staff->city == 'Kashmore' ? 'selected' : '' }}>Kashmore
                                                    </option>
                                                    <option value="Kasur"
                                                        {{ $staff->city == 'Kasur' ? 'selected' : '' }}>Kasur</option>
                                                    <option value="Kech" {{ $staff->city == 'Kech' ? 'selected' : '' }}>
                                                        Kech</option>
                                                    <option value="Khachi"
                                                        {{ $staff->city == 'Khachi' ? 'selected' : '' }}>Khachi</option>
                                                    <option value="Khairpur"
                                                        {{ $staff->city == 'Khairpur' ? 'selected' : '' }}>Khairpur
                                                    </option>
                                                    <option value="Khanewal"
                                                        {{ $staff->city == 'Khanewal' ? 'selected' : '' }}>Khanewal
                                                    </option>
                                                    <option value="Kharan"
                                                        {{ $staff->city == 'Kharan' ? 'selected' : '' }}>Kharan</option>
                                                    <option value="Kharmang"
                                                        {{ $staff->city == 'Kharmang' ? 'selected' : '' }}>Kharmang
                                                    </option>
                                                    <option value="Khurram Agency"
                                                        {{ $staff->city == 'Khurram Agency' ? 'selected' : '' }}>Khurram
                                                        Agency</option>
                                                    <option value="Khushab"
                                                        {{ $staff->city == 'Khushab' ? 'selected' : '' }}>Khushab
                                                    </option>
                                                    <option value="Khuzdar"
                                                        {{ $staff->city == 'Khuzdar' ? 'selected' : '' }}>Khuzdar
                                                    </option>
                                                    <option value="Khyber Agency"
                                                        {{ $staff->city == 'Khyber Agency' ? 'selected' : '' }}>Khyber
                                                        Agency</option>
                                                    <option value="Kohat"
                                                        {{ $staff->city == 'Kohat' ? 'selected' : '' }}>Kohat</option>
                                                    <option value="Kohlu"
                                                        {{ $staff->city == 'Kohlu' ? 'selected' : '' }}>Kohlu</option>
                                                    <option value="Kollai Pallas"
                                                        {{ $staff->city == 'Kollai Pallas' ? 'selected' : '' }}>Kollai
                                                        Pallas</option>
                                                    <option value="Korangi"
                                                        {{ $staff->city == 'Korangi' ? 'selected' : '' }}>Korangi
                                                    </option>
                                                    <option value="Kotli"
                                                        {{ $staff->city == 'Kotli' ? 'selected' : '' }}>Kotli</option>
                                                    <option value="Lahore"
                                                        {{ $staff->city == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                                                    <option value="Lakki Marwat"
                                                        {{ $staff->city == 'Lakki Marwat' ? 'selected' : '' }}>Lakki
                                                        Marwat</option>
                                                    <option value="Larkana"
                                                        {{ $staff->city == 'Larkana' ? 'selected' : '' }}>Larkana
                                                    </option>
                                                    <option value="Lasbela"
                                                        {{ $staff->city == 'Lasbela' ? 'selected' : '' }}>Lasbela
                                                    </option>
                                                    <option value="Layyah"
                                                        {{ $staff->city == 'Layyah' ? 'selected' : '' }}>Layyah</option>
                                                    <option value="Lodhran"
                                                        {{ $staff->city == 'Lodhran' ? 'selected' : '' }}>Lodhran
                                                    </option>
                                                    <option value="Loralai"
                                                        {{ $staff->city == 'Loralai' ? 'selected' : '' }}>Loralai
                                                    </option>
                                                    <option value="Lower Dir"
                                                        {{ $staff->city == 'Lower Dir' ? 'selected' : '' }}>Lower Dir
                                                    </option>
                                                    <option value="Lower Kohistan"
                                                        {{ $staff->city == 'Lower Kohistan' ? 'selected' : '' }}>Lower
                                                        Kohistan</option>
                                                    <option value="Makran"
                                                        {{ $staff->city == 'Makran' ? 'selected' : '' }}>Makran</option>
                                                    <option value="Malakand"
                                                        {{ $staff->city == 'Malakand' ? 'selected' : '' }}>Malakand
                                                    </option>
                                                    <option value="Malir"
                                                        {{ $staff->city == 'Malir' ? 'selected' : '' }}>Malir</option>
                                                    <option value="Mandi Bahauddin"
                                                        {{ $staff->city == 'Mandi Bahauddin' ? 'selected' : '' }}>Mandi
                                                        Bahauddin</option>
                                                    <option value="Mansehra"
                                                        {{ $staff->city == 'Mansehra' ? 'selected' : '' }}>Mansehra
                                                    </option>
                                                    <option value="Mardan"
                                                        {{ $staff->city == 'Mardan' ? 'selected' : '' }}>Mardan</option>
                                                    <option value="Mastung"
                                                        {{ $staff->city == 'Mastung' ? 'selected' : '' }}>Mastung
                                                    </option>
                                                    <option value="Matiari"
                                                        {{ $staff->city == 'Matiari' ? 'selected' : '' }}>Matiari
                                                    </option>
                                                    <option value="Mianwali"
                                                        {{ $staff->city == 'Mianwali' ? 'selected' : '' }}>Mianwali
                                                    </option>
                                                    <option value="Mirpur"
                                                        {{ $staff->city == 'Mirpur' ? 'selected' : '' }}>Mirpur</option>
                                                    <option value="Mirpur Khas"
                                                        {{ $staff->city == 'Mirpur Khas' ? 'selected' : '' }}>Mirpur
                                                        Khas</option>
                                                    <option value="Mohmand Agency"
                                                        {{ $staff->city == 'Mohmand Agency' ? 'selected' : '' }}>Mohmand
                                                        Agency</option>
                                                    <option value="Multan"
                                                        {{ $staff->city == 'Multan' ? 'selected' : '' }}>Multan</option>
                                                    <option value="Musakhail"
                                                        {{ $staff->city == 'Musakhail' ? 'selected' : '' }}>Musakhail
                                                    </option>
                                                    <option value="Muzaffarabad"
                                                        {{ $staff->city == 'Muzaffarabad' ? 'selected' : '' }}>
                                                        Muzaffarabad</option>
                                                    <option value="Muzaffargarh"
                                                        {{ $staff->city == 'Muzaffargarh' ? 'selected' : '' }}>
                                                        Muzaffargarh</option>
                                                    <option value="Nagar"
                                                        {{ $staff->city == 'Nagar' ? 'selected' : '' }}>Nagar</option>
                                                    <option value="Nankana Sahib"
                                                        {{ $staff->city == 'Nankana Sahib' ? 'selected' : '' }}>Nankana
                                                        Sahib</option>
                                                    <option value="Narowal"
                                                        {{ $staff->city == 'Narowal' ? 'selected' : '' }}>Narowal
                                                    </option>
                                                    <option value="Nasirabad"
                                                        {{ $staff->city == 'Nasirabad' ? 'selected' : '' }}>Nasirabad
                                                    </option>
                                                    <option value="Naushahro Feroze"
                                                        {{ $staff->city == 'Naushahro Feroze' ? 'selected' : '' }}>
                                                        Naushahro Feroze</option>
                                                    <option value="Neelam Valley"
                                                        {{ $staff->city == 'Neelam Valley' ? 'selected' : '' }}>Neelam
                                                        Valley</option>
                                                    <option value="North Wazirstan Agency"
                                                        {{ $staff->city == 'North Wazirstan Agency' ? 'selected' : '' }}>
                                                        North Wazirstan Agency</option>
                                                    <option value="Noshki"
                                                        {{ $staff->city == 'Noshki' ? 'selected' : '' }}>Noshki</option>
                                                    <option value="Nowshera"
                                                        {{ $staff->city == 'Nowshera' ? 'selected' : '' }}>Nowshera
                                                    </option>
                                                    <option value="Okara"
                                                        {{ $staff->city == 'Okara' ? 'selected' : '' }}>Okara</option>
                                                    <option value="Orakzai Agency"
                                                        {{ $staff->city == 'Orakzai Agency' ? 'selected' : '' }}>Orakzai
                                                        Agency</option>
                                                    <option value="Pakpattan"
                                                        {{ $staff->city == 'Pakpattan' ? 'selected' : '' }}>Pakpattan
                                                    </option>
                                                    <option value="Panjgur"
                                                        {{ $staff->city == 'Panjgur' ? 'selected' : '' }}>Panjgur
                                                    </option>
                                                    <option value="Peshawar"
                                                        {{ $staff->city == 'Peshawar' ? 'selected' : '' }}>Peshawar
                                                    </option>
                                                    <option value="Pishin"
                                                        {{ $staff->city == 'Pishin' ? 'selected' : '' }}>Pishin</option>
                                                    <option value="Poonch"
                                                        {{ $staff->city == 'Poonch' ? 'selected' : '' }}>Poonch</option>
                                                    <option value="Qila Abdullah"
                                                        {{ $staff->city == 'Qila Abdullah' ? 'selected' : '' }}>Qila
                                                        Abdullah</option>
                                                    <option value="Qila Saifullah"
                                                        {{ $staff->city == 'Qila Saifullah' ? 'selected' : '' }}>Qila
                                                        Saifullah</option>
                                                    <option value="Quetta"
                                                        {{ $staff->city == 'Quetta' ? 'selected' : '' }}>Quetta</option>
                                                    <option value="Rahimyar Khan"
                                                        {{ $staff->city == 'Rahimyar Khan' ? 'selected' : '' }}>Rahimyar
                                                        Khan</option>
                                                    <option value="Rajanpur"
                                                        {{ $staff->city == 'Rajanpur' ? 'selected' : '' }}>Rajanpur
                                                    </option>
                                                    <option value="Rawalpindi"
                                                        {{ $staff->city == 'Rawalpindi' ? 'selected' : '' }}>Rawalpindi
                                                    </option>
                                                    <option value="Sahiwal"
                                                        {{ $staff->city == 'Sahiwal' ? 'selected' : '' }}>Sahiwal
                                                    </option>
                                                    <option value="Sanghar"
                                                        {{ $staff->city == 'Sanghar' ? 'selected' : '' }}>Sanghar
                                                    </option>
                                                    <option value="Sargodha"
                                                        {{ $staff->city == 'Sargodha' ? 'selected' : '' }}>Sargodha
                                                    </option>
                                                    <option value="Shaheed Benazirabad"
                                                        {{ $staff->city == 'Shaheed Benazirabad' ? 'selected' : '' }}>
                                                        Shaheed Benazirabad</option>
                                                    <option value="Shangla"
                                                        {{ $staff->city == 'Shangla' ? 'selected' : '' }}>Shangla
                                                    </option>
                                                    <option value="Sheikhupura"
                                                        {{ $staff->city == 'Sheikhupura' ? 'selected' : '' }}>
                                                        Sheikhupura</option>
                                                    <option value="Sherani"
                                                        {{ $staff->city == 'Sherani' ? 'selected' : '' }}>Sherani
                                                    </option>
                                                    <option value="Shigar"
                                                        {{ $staff->city == 'Shigar' ? 'selected' : '' }}>Shigar</option>
                                                    <option value="Shikarpur"
                                                        {{ $staff->city == 'Shikarpur' ? 'selected' : '' }}>Shikarpur
                                                    </option>
                                                    <option value="Sialkot"
                                                        {{ $staff->city == 'Sialkot' ? 'selected' : '' }}>Sialkot
                                                    </option>
                                                    <option value="Sibi" {{ $staff->city == 'Sibi' ? 'selected' : '' }}>
                                                        Sibi</option>
                                                    <option value="Skardu (Div. Baltistan)"
                                                        {{ $staff->city == 'Skardu (Div. Baltistan)' ? 'selected' : '' }}>
                                                        Skardu (Div. Baltistan)</option>
                                                    <option value="South Wazirstan Agency"
                                                        {{ $staff->city == 'South Wazirstan Agency' ? 'selected' : '' }}>
                                                        South Wazirstan Agency</option>
                                                    <option value="Sudhnati"
                                                        {{ $staff->city == 'Sudhnati' ? 'selected' : '' }}>Sudhnati
                                                    </option>
                                                    <option value="Sujawal"
                                                        {{ $staff->city == 'Sujawal' ? 'selected' : '' }}>Sujawal
                                                    </option>
                                                    <option value="Sukkur"
                                                        {{ $staff->city == 'Sukkur' ? 'selected' : '' }}>Sukkur</option>
                                                    <option value="Swabi"
                                                        {{ $staff->city == 'Swabi' ? 'selected' : '' }}>Swabi</option>
                                                    <option value="Swat" {{ $staff->city == 'Swat' ? 'selected' : '' }}>
                                                        Swat</option>
                                                    <option value="Tando Allahyar"
                                                        {{ $staff->city == 'Tando Allahyar' ? 'selected' : '' }}>Tando
                                                        Allahyar</option>
                                                    <option value="Tando Muhammad Khan"
                                                        {{ $staff->city == 'Tando Muhammad Khan' ? 'selected' : '' }}>
                                                        Tando Muhammad Khan</option>
                                                    <option value="Tangir"
                                                        {{ $staff->city == 'Tangir' ? 'selected' : '' }}>Tangir</option>
                                                    <option value="Tank" {{ $staff->city == 'Tank' ? 'selected' : '' }}>
                                                        Tank</option>
                                                    <option value="Tharparkar"
                                                        {{ $staff->city == 'Tharparkar' ? 'selected' : '' }}>Tharparkar
                                                    </option>
                                                    <option value="Thatta"
                                                        {{ $staff->city == 'Thatta' ? 'selected' : '' }}>Thatta</option>
                                                    <option value="Toba Tek Singh"
                                                        {{ $staff->city == 'Toba Tek Singh' ? 'selected' : '' }}>Toba
                                                        Tek Singh</option>
                                                    <option value="Torghar"
                                                        {{ $staff->city == 'Torghar' ? 'selected' : '' }}>Torghar
                                                    </option>
                                                    <option value="Umerkot"
                                                        {{ $staff->city == 'Umerkot' ? 'selected' : '' }}>Umerkot
                                                    </option>
                                                    <option value="Upper Dir"
                                                        {{ $staff->city == 'Upper Dir' ? 'selected' : '' }}>Upper Dir
                                                    </option>
                                                    <option value="Upper Kohistan"
                                                        {{ $staff->city == 'Upper Kohistan' ? 'selected' : '' }}>Upper
                                                        Kohistan</option>
                                                    <option value="Vehari"
                                                        {{ $staff->city == 'Vehari' ? 'selected' : '' }}>Vehari</option>
                                                    <option value="Washuk"
                                                        {{ $staff->city == 'Washuk' ? 'selected' : '' }}>Washuk</option>
                                                    <option value="Zhob" {{ $staff->city == 'Zhob' ? 'selected' : '' }}>
                                                        Zhob</option>
                                                    <option value="Ziarat"
                                                        {{ $staff->city == 'Ziarat' ? 'selected' : '' }}>Ziarat</option>
                                                </select>
                                                <div id="cityError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group local-forms">
                                                <label>State <span class="login-danger">*</span></label>
                                                <select class="form-control select" id="state" name="state">
                                                    <option value="">Select State</option>
                                                    <option value="Azad Jammu and Kashmir"
                                                        {{ $staff->state == 'Azad Jammu and Kashmir' ? 'selected' : '' }}>
                                                        Azad Jammu and Kashmir</option>
                                                    <option value="Balochistan"
                                                        {{ $staff->state == 'Balochistan' ? 'selected' : '' }}>
                                                        Balochistan</option>
                                                    <option value="FATA (Federally Administered Tribal Areas)"
                                                        {{ $staff->state == 'FATA (Federally Administered Tribal Areas)' ? 'selected' : '' }}>
                                                        FATA (Federally Administered Tribal Areas)</option>
                                                    <option value="Gilgit-Baltistan"
                                                        {{ $staff->state == 'Gilgit-Baltistan' ? 'selected' : '' }}>
                                                        Gilgit-Baltistan</option>
                                                    <option value="Islamabad"
                                                        {{ $staff->state == 'Islamabad' ? 'selected' : '' }}>Islamabad
                                                    </option>
                                                    <option value="KPK (Khyber Pakhtunkhwa)"
                                                        {{ $staff->state == 'KPK (Khyber Pakhtunkhwa)' ? 'selected' : '' }}>
                                                        KPK (Khyber Pakhtunkhwa)</option>
                                                    <option value="Punjab"
                                                        {{ $staff->state == 'Punjab' ? 'selected' : '' }}>Punjab
                                                    </option>
                                                    <option value="Sindh"
                                                        {{ $staff->state == 'Sindh' ? 'selected' : '' }}>Sindh</option>
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
                                                    value="{{ $staff->salary }}" autocomplete="off">
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
            console.log(inputId + ' input changed'); // Debug log
            $('#' + inputId + 'Error').text('');
        }
        // Attach event listener to clear error messages on input
        $('#designation').on('input', clearErrorMessages);
        $('#name').on('input', clearErrorMessages);
        $('#gender').on('input', clearErrorMessages);
        $('#dob').on('input change',
            clearErrorMessages); // Handle both input and change events for datetimepicker
        $('#mobile').on('input', clearErrorMessages);
        $('#joiningDate').on('input change',
            clearErrorMessages); // In case joiningDate is also a datetimepicker
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
            }
            if ($('#mobile').val().trim() === '') {
                $('#mobileError').text('Mobile number is required');
                isValid = false;
            }
            if ($('#joiningDate').val().trim() === '') {
                $('#joiningDateError').text('Joining Date is required');
                isValid = false;
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
            let salaryInput = $('#salary').val().trim(); // Cache the trimmed value for reuse
            if (salaryInput === '') {
                $('#salaryError').text('Salary is required');
                isValid = false;
            } else if (!/^\d+$/.test(salaryInput)) {
                $('#salaryError').text('Salary should contain only digits');
                isValid = false;
            }
            if (isValid) {
                $.ajax({
                    url: "{{ route('staff.update', $staff->id) }}", // Your endpoint
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

        // Attach event listener to "No" button to close the modal
        $('#noButton').click(function() {
            $('#alertModal').fadeOut();
        });

    });
    </script>
</body>

</html>