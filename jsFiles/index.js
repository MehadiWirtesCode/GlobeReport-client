function toggleMenu() {
  const navMenu = document.getElementById("navMenu");
  navMenu.classList.toggle("active");
}

//profile button handler in navbar
const profile = document.getElementById("profile-id");
const loginModal = document.getElementById(`loginModal`);
if (profile) {
  profile.addEventListener(`click`, function () {
            loginModal.style.display = `flex`;
  });
}

//login modal close button handler
const loginCloseBtn = document.getElementById(`closeLoginModal`);
if (loginCloseBtn) {
  loginCloseBtn.addEventListener(`click`, function () {
    loginModal.style.display = `none`;
  });
}

//signup modal and close button find
const signupModal = document.getElementById(`signupModal`);
const closeSignupModal = document.getElementById(`closeSignupModal`);
const moveLoginPage = document.getElementById(`loginLink`);

//sign up link
const signupLink = document.getElementById(`signupLink`);
if (signupLink) {
  signupLink.addEventListener(`click`, function () {
    loginModal.style.display = `none`;
    signupModal.style.display = `flex`;
  });
}

//close signup modal handler
if (closeSignupModal) {
  closeSignupModal.addEventListener(`click`, function () {
    signupModal.style.display = `none`;
  });
}

//move login link handler
if (moveLoginPage) {
  moveLoginPage.addEventListener(`click`, function () {
    signupModal.style.display = `none`;
    loginModal.style.display = `flex`;
  });
}

//display current date
function displayCurrentDate() {
  const dateElement = document.getElementById("current-date");
  if (!dateElement) return;

  const date = new Date();
  // Format: "Wednesday, November 27, 2025"
  const options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
  };
  const formattedDate = date.toLocaleDateString("en-US", options);

  dateElement.textContent = formattedDate;
}

// Add a listener to close the menu when a link is clicked
document.addEventListener("DOMContentLoaded", () => {
  displayCurrentDate();
  const navItems = document.querySelectorAll(".main-menu-item a");
  navItems.forEach((item) => {
    item.addEventListener("click", () => {
      const navMenu = document.getElementById("navMenu");

      if (window.innerWidth <= 768 && navMenu.classList.contains("active")) {
        navMenu.classList.remove("active");
      }
    });
  });
});
