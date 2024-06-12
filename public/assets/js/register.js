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
