<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Login</title>
    <!-- Fontfamily -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
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
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .error-message {
            color: red;
            font-size: 12px;
        }

        .profile-views {
            cursor: pointer;
        }

        .form-group {
            position: relative;
        }

        .profile-views {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>

<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/img/login.png" alt="Logo" />
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Welcome to Stitching Studio</h1>
                            <p class="account-subtitle">
                                Need an account? <a href="{{ route('register') }}">Sign Up</a>
                            </p>
                            <h2>Sign in</h2>
                            <form id="loginForm" method="POST" action="{{ route('login.authenticate') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email <span class="login-danger">*</span></label>
                                    <input class="form-control" type="email" id="email" name="email" autocomplete="off">
                                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                    <div class="error-message" id="emailError"></div>
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input class="form-control" type="password" id="password" name="password" autocomplete="off">
                                    <span class="profile-views toggle-password" data-target="password"><i class="fas fa-eye"></i></span>
                                    <!-- Error message for invalid email or password -->
                                    <div class="error-message" id="authError"></div>
                                    <div class="error-message" id="passwordError"></div>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit"
                                        id="loginButton">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login JavaScript -->
    <script src="assets/js/login-script.js"></script>
    <script>
        $(document).ready(function () {
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        $('#authError').text('');
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                if (response.success) {
                    window.location.href = response.redirect_url;
                } else {
                    $('#authError').text(response.message);
                }
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                if (errors.email) {
                    $('#emailError').text(errors.email[0]);
                }
                if (errors.password) {
                    $('#passwordError').text(errors.password[0]);
                }
            }
        });
    });
});
    </script>
</body>

</html>
