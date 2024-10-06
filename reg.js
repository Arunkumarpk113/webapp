document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const nameInput = form.querySelector('input[name="name"]');
    const emailInput = form.querySelector('input[name="email"]');
    const phoneInput = form.querySelector('input[name="phone"]');
    const passwordInput = form.querySelector('input[name="password"]');
    const submitButton = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', (e) => {
        let valid = true;
        let errorMessage = '';

        // Validate Name
        if (nameInput.value.trim() === '') {
            errorMessage += 'Name is required.\n';
            valid = false;
        }

        // Validate Email
        if (!validateEmail(emailInput.value.trim())) {
            errorMessage += 'Please enter a valid email address.\n';
            valid = false;
        }

        // Validate Phone Number
        if (!validatePhone(phoneInput.value.trim())) {
            errorMessage += 'Please enter a valid phone number (10 digits).\n';
            valid = false;
        }

        // Validate Password
        if (passwordInput.value.trim().length < 6) {
            errorMessage += 'Password must be at least 6 characters long.\n';
            valid = false;
        }

        if (!valid) {
            e.preventDefault(); // Prevent form submission
            alert(errorMessage); // Display error messages
        }
    });

    function validateEmail(email) {
        // Simple email regex
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function validatePhone(phone) {
        // Phone number should be exactly 10 digits
        const re = /^\d{10}$/;
        return re.test(phone);
    }
});

