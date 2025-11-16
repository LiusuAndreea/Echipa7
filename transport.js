document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector(".flight-form");
    const inputs = form.querySelectorAll("input, textarea");

    // Funcție afișat erori
    function showError(input, message) {
        let error = input.parentElement.querySelector(".error-message");

        if (!error) {
            error = document.createElement("div");
            error.className = "error-message";
            input.parentElement.appendChild(error);
        }

        error.textContent = message;
        input.classList.add("input-error");
    }

    // Funcție șters erori
    function clearError(input) {
        const error = input.parentElement.querySelector(".error-message");
        if (error) error.remove();
        input.classList.remove("input-error");
    }

    // Validare live 
    inputs.forEach(input => {
        input.addEventListener("input", () => {
            clearError(input);

            if (input.name === "email") {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(input.value)) {
                    showError(input, "Email invalid");
                }
            }

            if (input.name === "persons") {
                if (input.value <= 0) {
                    showError(input, "Introduce un număr valid");
                }
            }
        });
    });

    // Validare la trimitere
    form.addEventListener("submit", (e) => {
        let valid = true;

        inputs.forEach(input => {
            clearError(input);

            if (input.value.trim() === "") {
                valid = false;
                showError(input, "Acest câmp este obligatoriu");
            }

            if (input.name === "email") {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(input.value)) {
                    valid = false;
                    showError(input, "Email invalid");
                }
            }

            if (input.name === "persons" && input.value <= 0) {
                valid = false;
                showError(input, "Număr persoane invalid");
            }
        });

        if (!valid) {
            e.preventDefault();
        }
       
    });

    if (window.location.search.includes("sent=1")) {
        alert("Cererea ta a fost trimisă și salvată cu succes!");
        history.replaceState(null, '', window.location.pathname); 
    }
});
 console.log(form);
