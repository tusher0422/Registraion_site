document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let isValid = true;

      
        const requiredFields = form.querySelectorAll("input[required], select[required]");

        requiredFields.forEach((field) => {
            if (field.value.trim() === "") {
                isValid = false;
                field.classList.add("is-invalid");
            } else {
                field.classList.remove("is-invalid");
            }
        });

     
        const emailField = document.getElementById("email");
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailField.value)) {
            isValid = false;
            emailField.classList.add("is-invalid");
        } else {
            emailField.classList.remove("is-invalid");
        }

        
        const mobileField = document.getElementById("mobile");
        const mobilePattern = /^[0-9]{10,15}$/;
        if (!mobilePattern.test(mobileField.value)) {
            isValid = false;
            mobileField.classList.add("is-invalid");
        } else {
            mobileField.classList.remove("is-invalid");
        }

        if (!isValid) {
            event.preventDefault(); 
            alert("Please fill in all required fields correctly.");
        }
    });
});
