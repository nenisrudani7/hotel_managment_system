// Wait for the DOM content to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Get references to form elements
    const form = document.querySelector('.text-center');
    const emailInput = document.getElementById('form2Example1');
    const passwordInput = document.getElementById('form2Example2');

    // Function to validate email format
    function validateEmail(email) {
        const re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    // Function to validate password length
    function validatePassword(password) {
        return password.length >= 8;
    }

    // Function to display error message
    function showError(input, message) {
        const formControl = input.parentElement;
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.innerText = message;
        formControl.appendChild(errorDiv);
    }

    // Function to remove error message
    function removeError(input) {
        const formControl = input.parentElement;
        const errorDiv = formControl.querySelector('.error-message');
        if (errorDiv) {
            formControl.removeChild(errorDiv);
        }
    }

    // Function to validate form on submission
    function validateForm() {
        let isValid = true;

        if (!validateEmail(emailInput.value)) {
            showError(emailInput, 'Please enter a valid email address');
            isValid = false;
        } else {
            removeError(emailInput);
        }

        if (!validatePassword(passwordInput.value)) {
            showError(passwordInput, 'Password must be at least 8 characters long');
            isValid = false;
        } else {
            removeError(passwordInput);
        }

        return isValid;
    }

    // Event listener for form submission
    form.addEventListener('submit', function(event) {
        // Prevent default form submission
        event.preventDefault();
        
        // Validate form
        if (validateForm()) {
            // If form is valid, submit the form
            form.submit();
        }
    });
});
