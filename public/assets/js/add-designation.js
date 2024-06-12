// Function to clear error messages
function clearError(elementId) {
    var errorElement = document.getElementById(elementId);
    if (errorElement) {
        errorElement.innerHTML = '';
    }
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('designationName').addEventListener('input', function() {
        clearError('designationNameError');
    });

    document.getElementById('designationForm').addEventListener('submit', function(event) {
        var designationName = document.getElementById('designationName').value.trim();
        var designationNameError = document.getElementById('designationNameError');
        var hasError = false;

        // Reset previous error
        designationNameError.innerHTML = '';

        // Regular expression for validation
        var nameRegex = /^[a-zA-Z\s]+$/;

        // Validate field
        if (designationName === '') {
            designationNameError.innerHTML = 'Designation Name is required';
            hasError = true;
        } else if (!nameRegex.test(designationName)) {
            designationNameError.innerHTML = 'Only alphabets and spaces are allowed for Designation Name';
            hasError = true;
        }

        // Prevent form submission if there are errors
        if (hasError) {
            event.preventDefault();
        }
    });
});
