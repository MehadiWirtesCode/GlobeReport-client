const SERVER_URL = "http://localhost:8000";
const signup = document.getElementById("submitSignup");

// Global toast container definition (Existing)
const toastContainer = document.getElementById("toast-container");
let toastTimeout;

if (signup) {
  signup.addEventListener("click", (e) => {
    e.preventDefault();
    handleSignup();
  });
}

const handleSignup = () => {
  const signupUsername = document.getElementById("signupUsername").value;
  const signupEmail = document.getElementById("signupEmail").value;
  const signupPassword = document.getElementById("signupPassword").value;
  const confirmPassword = document.getElementById(
    "signupConfirmPassword"
  ).value;


  axios
    .post(`${SERVER_URL}/api/signup`, {
      username: signupUsername,
      email: signupEmail,
      password: signupPassword,
      confirmPassword: confirmPassword,
    })

    .then((res) => {
      showToast(
        res.data?.message || "Signup successful & Login now!"
      );

      setTimeout(() => {
      }, 1500);
    })

    .catch((err) => {
      console.error("Signup error:", err);
      const errorMessage =
        err.response?.data?.message || "An error occurred during signup.";
      showToast(errorMessage);
    });
  }


// toast functionality handler (Existing and Correct)
function showToast(message) {
  if (toastTimeout) {
    clearTimeout(toastTimeout);
    toastContainer.style.visibility = "hidden";
    void toastContainer.offsetWidth;
  }

  toastContainer.textContent = message;
  toastContainer.classList.add("show");

  toastTimeout = setTimeout(() => {
    toastContainer.style.visibility = "hidden";
  }, 3000);
}


//login handler
const username = document.getElementById('username').value;
const password = document.getElementById('password').value;
const loginBtn = document.getElementById('submitLogin');

if (loginBtn) {
  loginBtn.addEventListener('click', function () {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    axios.post(`${SERVER_URL}/api/login`, {
      username: username,
      password: password
    })
    .then(res => {
      showToast('Login Successful!');
      setTimeout(() => {

      }, 1500);
      window.location.href = '/client/adminDashboard/adminDashboard.php';
    })
    .catch(err => {
      console.error('Login error:', err);
      const errorMessage = err.response?.data?.message || "An error occurred during login.";
      showToast(errorMessage);
    });
  });
}

