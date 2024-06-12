// Function to clear error messages
function clearError(elementId) {
    var errorElement = document.getElementById(elementId);
    if (errorElement) {
        errorElement.innerHTML = '';
    }
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('expenseCategoryName').addEventListener('input', function() {
        clearError('expenseCategoryNameError');
    });

    document.getElementById('expenseCategoryForm').addEventListener('submit', function(event) {
        var expenseCategoryName = document.getElementById('expenseCategoryName').value.trim();
        var expenseCategoryNameError = document.getElementById('expenseCategoryNameError');
        var hasError = false;

        // Reset previous error
        expenseCategoryNameError.innerHTML = '';

        // Regular expression for validation
        var nameRegex = /^[a-zA-Z\s]+$/;

        // Validate field
        if (expenseCategoryName === '') {
            expenseCategoryNameError.innerHTML = 'Expense Category Name is required';
            hasError = true;
        } else if (!nameRegex.test(expenseCategoryName)) {
            expenseCategoryNameError.innerHTML = 'Only alphabets and spaces are allowed for Expense Category Name';
            hasError = true;
        }

        // Prevent form submission if there are errors
        if (hasError) {
            event.preventDefault();
        }
    });
});
