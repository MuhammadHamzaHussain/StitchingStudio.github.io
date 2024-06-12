function initializeSalaryForm() {
    // Add event listener to the form submission
    document.getElementById('salaryDetailsForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        resetSalaryErrorMessages(); // Reset previous error messages

        // Fetch input values
        var staffSelect = document.getElementById('staffSelect').value.trim();
        var name = document.getElementById('name').value.trim();
        var date = document.getElementById('date').value.trim();
        var amount = document.getElementById('amount').value.trim();
        var description = document.getElementById('description').value.trim();

        // Validate inputs
        var isValid = true;

        if (staffSelect === '') {
            showSalaryError('staffSelectError', 'Please select a staff');
            isValid = false;
        }

        if (name === '') {
            showSalaryError('nameError', 'Name is required');
            isValid = false;
        }

        if (date === '') {
            showSalaryError('dateError', 'Date is required');
            isValid = false;
        }

        if (amount === '') {
            showSalaryError('amountError', 'Amount is required');
            isValid = false;
        } else if (!isNumeric(amount)) {
            showSalaryError('amountError', 'Amount must be a valid number');
            isValid = false;
        }

        if (description === '') {
            showSalaryError('descriptionError', 'Description is required');
            isValid = false;
        }

        // If all validations pass, you can proceed with form submission
        if (isValid) {
            // Uncomment the line below to submit the form
            // document.getElementById('salaryDetailsForm').submit();
            console.log('Salary form submitted successfully!');
        }
    });

    // Add event listeners to remove error messages on input/change
    var inputs = document.querySelectorAll('#salaryDetailsForm input, #salaryDetailsForm select, #salaryDetailsForm textarea');
    inputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var errorId = this.id + 'Error';
            document.getElementById(errorId).textContent = '';
        });
    });
}

function resetSalaryErrorMessages() {
    var errorElements = document.querySelectorAll('.text-danger');
    errorElements.forEach(function(element) {
        element.textContent = '';
    });
}

function showSalaryError(id, message) {
    document.getElementById(id).textContent = message;
}

function isNumeric(value) {
    return /^-?\d+$/.test(value);
}

document.addEventListener('DOMContentLoaded', initializeSalaryForm);
