// Function to clear error messages
function clearError(elementId) {
    var errorElement = document.getElementById(elementId);
    if (errorElement) {
        errorElement.innerHTML = '';
    }
}

// Event listener to clear error messages on input for email
document.getElementById('email').addEventListener('input', function() {
    clearError('emailError');
});

// Event listener to clear error messages on input for password
document.getElementById('password').addEventListener('input', function() {
    clearError('passwordError');
});

function isValidEmail(email) {
    // Regular expression for validating email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

document.getElementById('loginForm').addEventListener('submit', function(event) {
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();

    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');

    var hasError = false;

    // Reset previous errors
    emailError.innerHTML = '';
    passwordError.innerHTML = '';

    // Validate fields
    if (email === '') {
        emailError.innerHTML = 'Email is required';
        hasError = true;
    } else if (!isValidEmail(email)) {
        emailError.innerHTML = 'Invalid email format';
        hasError = true;
    }
    if (password === '') {
        passwordError.innerHTML = 'Password is required';
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
