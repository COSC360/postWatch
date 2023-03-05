window.onload = () => {
  const form = document.querySelector("form");
  const usernameInput = document.getElementById("username");
  const passwordInput = document.getElementById("password");

  form.addEventListener("submit", (event) => {
    // Check if the username is valid
    if (!isValidUsername(usernameInput.value)) {
      alert("Invalid username");
      event.preventDefault(); // Prevent the default form submission behavior
      return;
    }

    // Check if the password is valid
    if (!isValidPassword(passwordInput.value)) {
      alert("Invalid password");
      event.preventDefault(); // Prevent the default form submission behavior
      return;
    }
  });

  function isValidUsername(username) {
    return username.length >= 3;
  }

  function isValidPassword(password) {
    return password.length >= 8;
  }
};
