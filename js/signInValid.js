window.onload = () => {
  const form = document.querySelector("form");
  const usernameInput = document.getElementById("username");
  const passwordInput = document.getElementById("password");

  form.addEventListener("submit", (event) => {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Check if the username is valid
    if (!isValidUsername(usernameInput.value)) {
      alert("Invalid username");
      return;
    }

    // Check if the password is valid
    if (!isValidPassword(passwordInput.value)) {
      alert("Invalid password");
      return;
    }

    form.submit();
  });

  function isValidUsername(username) {
    return username.length >= 3;
  }

  function isValidPassword(password) {
    return password.length >= 8;
  }
};
