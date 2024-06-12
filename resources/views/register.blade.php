<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Register</title>

    <!-- Fontfamily -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Your custom styles -->
    <link rel="stylesheet" href="assets/css/style-one.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
    .error-message {
        color: red;
        font-size: 12px;
    }

    .profile-views {
        cursor: pointer;
    }
    </style>
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/img/login.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Sign Up</h1>
                            <p class="account-subtitle">Enter details to create your account</p>

                            <form id="registerForm" action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Username <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" id="name" name="name" autocomplete="off">
                                    <span class="profile-views" style="position: absolute; top: 25px"><i
                                            class="fas fa-user-circle"></i></span>
                                    <div class="error-message" id="usernameError"></div>
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="login-danger">*</span></label>
                                    <input class="form-control" type="email" id="email" name="email" autocomplete="off">
                                    <span class="profile-views" style="position: absolute; top: 25px"><i
                                            class="fas fa-envelope"></i></span>
                                    <div class="error-message" id="emailError">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input class="form-control" type="password" id="password" name="password" autocomplete="off">
                                    <span class="profile-views toggle-password" data-target="password"
                                        style="position: absolute; top: 25px"><i class="fas fa-eye"></i></span>
                                    <div class="error-message" id="passwordError">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Confirm password <span class="login-danger">*</span></label>
                                    <input class="form-control" type="password" id="confirmPassword" autocomplete="off">
                                    <span class="profile-views toggle-password" data-target="confirmPassword"
                                        style="position: absolute; top: 25px"><i class="fas fa-eye" ></i></span>
                                    <div class="error-message" id="confirmPasswordError"></div>
                                </div>
                                <div class="dont-have">Already Registered? <a href="{{ route('login') }}">Login</a>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alertModal" class="centered-modal">
        <div class="checkmark-circle">
            <i class="fas fa-check-circle"></i>
        </div>
        <h5 class="text-center">Awesome!</h5>
        <p class="text-center">User added Successfully!</p>
        <div class="d-flex justify-content-center">
            <button class="btn btn-success" onclick="closeModal()">OK</button>
        </div>
    </div>

    <style>
    #alertModal {
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
    }

    #alertModal .checkmark-circle {
        color: #28A745;
        font-size: 2rem;
        display: flex;
        justify-content: center;
        margin-bottom: 0.5rem;
    }

    #alertModal .text-center {
        text-align: center;
    }

    #alertModal .d-flex {
        display: flex;
        justify-content: center;
    }

    #alertModal .btn-success {
        background-color: #28A745;
        border-color: #28A745;
    }
    </style>

    <!-- Register JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="{{ asset('assets/js/register.js') }}"></script> -->
    <script>
    $(document).ready(function() {
        $('#registerForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            $.ajax({
                url: $(this).attr('action'), // Your endpoint
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
                            "{{ route('login') }}"; // Redirect to login
                    });
                },
                error: function(xhr) {
                    // Handle errors here, such as displaying error messages
                    console.log('Error:', xhr.responseText);
                }
            });
        });
    });
    </script>

    <script>
        // Function to clear error messages
function clearError(elementId) {
    var errorElement = document.getElementById(elementId);
    if (errorElement) {
        errorElement.innerHTML = '';
    }
}

// Event listeners to clear error messages on input
document.getElementById('name').addEventListener('input', function() {
    clearError('usernameError');
});

document.getElementById('email').addEventListener('input', function() {
    clearError('emailError');
});

document.getElementById('password').addEventListener('input', function() {
    clearError('passwordError');
});

document.getElementById('confirmPassword').addEventListener('input', function() {
    clearError('confirmPasswordError');
});

function isValidEmail(email) {
    // Regular expression for validating email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

async function checkEmailTaken(email) {
    try {
        let response = await fetch('{{ route('check.email') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ email: email })
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        let data = await response.json();
        return data.isTaken;
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
        return false; // Assume email is not taken if there's an error
    }
}

document.getElementById('registerForm').addEventListener('submit', async function(event) {
    var username = document.getElementById('name').value.trim();
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();
    var confirmPassword = document.getElementById('confirmPassword').value.trim();
    var usernameError = document.getElementById('usernameError');
    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');
    var confirmPasswordError = document.getElementById('confirmPasswordError');
    var hasError = false;

    // Reset previous errors
    usernameError.innerHTML = '';
    emailError.innerHTML = '';
    passwordError.innerHTML = '';
    confirmPasswordError.innerHTML = '';

    // Validate fields
    if (username === '') {
        usernameError.innerHTML = 'Username is required';
        hasError = true;
    }
    if (email === '') {
        emailError.innerHTML = 'Email is required';
        hasError = true;
    } else if (!isValidEmail(email)) {
        emailError.innerHTML = 'Invalid email format';
        hasError = true;
    } else if (await checkEmailTaken(email)) {
        emailError.innerHTML = 'Email is already taken';
        hasError = true;
    }
    if (password === '') {
        passwordError.innerHTML = 'Password is required';
        hasError = true;
    }
    if (confirmPassword === '') {
        confirmPasswordError.innerHTML = 'Confirm password is required';
        hasError = true;
    }
    if (password !== confirmPassword) {
        confirmPasswordError.innerHTML = 'Passwords do not match';
        hasError = true;
    }

    // Prevent form submission if there are errors
    if (hasError) {
        event.preventDefault();
    }
});

// Get all elements with class toggle-password
const togglePassword = document.querySelectorAll('.toggle-password');

togglePassword.forEach(function(element) {
    // Add click event listener to each element
    element.addEventListener('click', function() {
        const target = document.getElementById(this.dataset.target);
        // Toggle type attribute of input element between password and text
        target.type = target.type === 'password' ? 'text' : 'password';
        // Toggle eye icon
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
});

    </script>


</body>

</html>