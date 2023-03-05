window.onload = () => {
  const form = document.querySelector("form");
  const usernameInput = document.getElementById("username");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const confirmPasswordInput = document.getElementById("confirm-password");

  form.addEventListener("submit", (event) => {
    let isValid = true;

    if (!isValidUsername(usernameInput.value)) {
      alert("Invalid username");
      isValid = false;
    }

    if (!isValidEmail(emailInput.value)) {
      alert("Invalid email");
      isValid = false;
    }

    if (!isValidPassword(passwordInput.value)) {
      alert("Invalid password length");
      isValid = false;
    }

    if (passwordInput.value !== confirmPasswordInput.value) {
      alert("Passwords do not match");
      isValid = false;
    }

    if (!isValid) {
      event.preventDefault();
    }
  });

  function isValidUsername(username) {
    return username.length >= 3;
  }

  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  function isValidPassword(password) {
    // validation here
    return password.length >= 8;
  }
};
