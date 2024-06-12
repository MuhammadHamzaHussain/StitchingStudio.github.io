// Function to clear error messages
function clearError(elementId) {
    var errorElement = document.getElementById(elementId);
    if (errorElement) {
        errorElement.innerHTML = '';
    }
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('expenseCategory').addEventListener('change', function() {
        clearError('expenseCategoryError');
    });

    document.getElementById('expenseDate').addEventListener('input', function() {
        clearError('expenseDateError');
    });

    document.getElementById('expenseDescription').addEventListener('input', function() {
        clearError('expenseDescriptionError');
    });

    document.getElementById('expenseAmount').addEventListener('input', function() {
        clearError('expenseAmountError');
    });

    document.getElementById('expenseForm').addEventListener('submit', function(event) {
        var expenseCategory = document.getElementById('expenseCategory').value;
        var expenseDate = document.getElementById('expenseDate').value;
        var expenseDescription = document.getElementById('expenseDescription').value.trim();
        var expenseAmount = document.getElementById('expenseAmount').value.trim();
        var expenseCategoryError = document.getElementById('expenseCategoryError');
        var expenseDateError = document.getElementById('expenseDateError');
        var expenseDescriptionError = document.getElementById('expenseDescriptionError');
        var expenseAmountError = document.getElementById('expenseAmountError');
        var hasError = false;

        // Reset previous errors
        expenseCategoryError.innerHTML = '';
        expenseDateError.innerHTML = '';
        expenseDescriptionError.innerHTML = '';
        expenseAmountError.innerHTML = '';

        // Validate fields
        if (expenseCategory === '') {
            expenseCategoryError.innerHTML = 'Expense category is required';
            hasError = true;
        }

        if (expenseDate === '') {
            expenseDateError.innerHTML = 'Expense date is required';
            hasError = true;
        }

        if (expenseDescription === '') {
            expenseDescriptionError.innerHTML = 'Expense description is required';
            hasError = true;
        }

        if (expenseAmount === '') {
            expenseAmountError.innerHTML = 'Expense amount is required';
            hasError = true;
        } else if (isNaN(expenseAmount) || parseFloat(expenseAmount) <= 0) {
            expenseAmountError.innerHTML = 'Expense amount must be a valid number greater than 0';
            hasError = true;
        }

        // Prevent form submission if there are errors
        if (hasError) {
            event.preventDefault();
        }
    });
});
