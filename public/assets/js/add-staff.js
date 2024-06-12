document.addEventListener("DOMContentLoaded", function () {
    // Function to clear error messages
    function clearError(elementId) {
        var errorElement = document.getElementById(elementId);
        if (errorElement) {
            errorElement.innerHTML = "";
        }
    }

    document.getElementById("designation").addEventListener("change", function () {
        clearError("designationError");
    });

    document.getElementById("designation").addEventListener("input", function () {
        clearError("designationError");
    });

    // Event listener to clear error messages on input for name
    document.getElementById("name").addEventListener("input", function () {
        clearError("nameError");
    });

    // Event listener to clear error messages on change for gender
    document.getElementById("gender").addEventListener("change", function () {
        clearError("genderError");
    });

    // Event listener to clear error messages on input for dob
    document.getElementById("dob").addEventListener("input", function () {
        clearError("dobError");
    });

    // Event listener to clear error messages on input for mobile
    document.getElementById("mobile").addEventListener("input", function () {
        clearError("mobileError");
    });

    // Event listener to clear error messages on input for joiningDate
    document.getElementById("joiningDate").addEventListener("input", function () {
        clearError("joiningDateError");
    });

    // Event listener to clear error messages on input for address
    document.getElementById("address").addEventListener("input", function () {
        clearError("addressError");
    });

    // Event listener to clear error messages on input for city
    document.getElementById("city").addEventListener("input", function () {
        clearError("cityError");
    });

    // Event listener to clear error messages on input for state
    document.getElementById("state").addEventListener("input", function () {
        clearError("stateError");
    });

    // Event listener to clear error messages on input for salary
    document.getElementById("salary").addEventListener("input", function () {
        clearError("salaryError");
    });

    document.getElementById("basicDetailsForm").addEventListener("submit", function (event) {
        var designation = document.getElementById("designation").value.trim();
        var name = document.getElementById("name").value.trim();
        var gender = document.getElementById("gender").value;
        var dob = document.getElementById("dob").value.trim();
        var mobile = document.getElementById("mobile").value.trim();
        var joiningDate = document.getElementById("joiningDate").value.trim();
        var address = document.getElementById("address").value.trim();
        var city = document.getElementById("city").value.trim();
        var state = document.getElementById("state").value.trim();
        var salary = document.getElementById("salary").value.trim();

        var designationError = document.getElementById("designationError");
        var nameError = document.getElementById("nameError");
        var genderError = document.getElementById("genderError");
        var dobError = document.getElementById("dobError");
        var mobileError = document.getElementById("mobileError");
        var joiningDateError = document.getElementById("joiningDateError");
        var addressError = document.getElementById("addressError");
        var cityError = document.getElementById("cityError");
        var stateError = document.getElementById("stateError");
        var salaryError = document.getElementById("salaryError");

        var hasError = false;

        // Reset previous errors
        designationError.innerHTML = "";
        nameError.innerHTML = "";
        genderError.innerHTML = "";
        dobError.innerHTML = "";
        mobileError.innerHTML = "";
        joiningDateError.innerHTML = "";
        addressError.innerHTML = "";
        cityError.innerHTML = "";
        stateError.innerHTML = "";
        salaryError.innerHTML = "";

        // Regular expressions for validation
        var nameRegex = /^[a-zA-Z\s]+$/;
        var mobileRegex = /^\d{11}$/;
        
        var salaryRegex = /^\d+$/;

        // Validate fields
        if (designation === "") {
            designationError.innerHTML = "Designation is required";
            hasError = true;
        }
        if (name === "") {
            nameError.innerHTML = "Name is required";
            hasError = true;
        } else if (!nameRegex.test(name)) {
            nameError.innerHTML = "Only alphabets and spaces are allowed for Name";
            hasError = true;
        }
        if (gender === "") {
            genderError.innerHTML = "Gender is required";
            hasError = true;
        }
        if (dob === "") {
            dobError.innerHTML = "Date of Birth is required";
            hasError = true;
        }
        if (mobile === "") {
            mobileError.innerHTML = "Mobile number is required";
            hasError = true;
        } else if (!mobileRegex.test(mobile)) {
            mobileError.innerHTML = "Mobile number should contain exactly 11 digits";
            hasError = true;
        }
        if (joiningDate === "") {
            joiningDateError.innerHTML = "Joining Date is required";
            hasError = true;
        }
        if (address === "") {
            addressError.innerHTML = "Address is required";
            hasError = true;
        }
        if (city === "") {
            cityError.innerHTML = "City is required";
            hasError = true;
        }
        if (state === "") {
            stateError.innerHTML = "State is required";
            hasError = true;
        }
        if (salary === "") {
            salaryError.innerHTML = "Salary is required";
            hasError = true;
        } else if (!salaryRegex.test(salary)) {
            salaryError.innerHTML = "Salary should contain only digits";
            hasError = true;
        }

        // Prevent form submission if there are errors
        if (hasError) {
            event.preventDefault();
        }
    });
});

