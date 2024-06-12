// Function to clear error messages
function clearError(elementId) {
    var errorElement = document.getElementById(elementId);
    if (errorElement) {
        errorElement.innerHTML = "";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("customerName")
        .addEventListener("input", function () {
            clearError("customerNameError");
        });

    document
        .getElementById("contactNumber")
        .addEventListener("input", function () {
            clearError("contactNumberError");
        });

    document
        .getElementById("customerForm")
        .addEventListener("submit", function (event) {
            var customerName = document
                .getElementById("customerName")
                .value.trim();
            var contactNumber = document
                .getElementById("contactNumber")
                .value.trim();
            var customerNameError =
                document.getElementById("customerNameError");
            var contactNumberError =
                document.getElementById("contactNumberError");
            var hasError = false;

            // Reset previous errors
            customerNameError.innerHTML = "";
            contactNumberError.innerHTML = "";

            // Regular expressions for validation
            var nameRegex = /^[a-zA-Z\s]+$/;
            var phoneRegex = /^\d{4}-?\d{7}$/; // Accepts 11 digits with optional dash

            // Validate fields
            if (customerName === "") {
                customerNameError.innerHTML = "Customer name is required";
                hasError = true;
            } else if (!nameRegex.test(customerName)) {
                customerNameError.innerHTML =
                    "Only alphabets and spaces are allowed for customer name";
                hasError = true;
            }

            if (contactNumber === "") {
                contactNumberError.innerHTML = "Contact number is required";
                hasError = true;
            } else if (!phoneRegex.test(contactNumber)) {
                contactNumberError.innerHTML =
                    "Contact number should contain exactly 11 digits";
                hasError = true;
            }

            // Prevent form submission if there are errors
            if (hasError) {
                event.preventDefault();
            }
        });
});

document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("contactNumber");
    input.addEventListener("input", function (e) {
        let value = e.target.value.replace(/\D/g, ""); // Remove all non-digits
        let formattedValue = "";
        if (value.length > 0) {
            formattedValue += value.substring(0, 4); // First four digits
        }
        if (value.length > 4) {
            formattedValue += "-" + value.substring(4, 11); // Next seven digits
        }
        e.target.value = formattedValue;
    });
});