  function toggleMenu() {
    const navMenu = document.getElementById('navMenu');
    navMenu.classList.toggle('active');
  }

//profile button handler in navbar
const profile = document.getElementById('profile-id');
const loginModal = document.getElementById(`loginModal`);
 if(profile){
  profile.addEventListener(`click`,function(){
      const token = localStorage.getItem(`token`)
      if(token)
        window.location.href =`/`

      else
         loginModal.style.display = `flex`

  })
 }


 //login modal close button handler
 const loginCloseBtn = document.getElementById(`closeLoginModal`);
 if(loginCloseBtn){
   loginCloseBtn.addEventListener(`click`,function(){
    loginModal.style.display = `none`;
   })
 }


//signup modal and close button find
const signupModal = document.getElementById(`signupModal`)
const closeSignupModal = document.getElementById(`closeSignupModal`)
const moveLoginPage = document.getElementById(`loginLink`)


//sign up link
 const signupLink = document.getElementById(`signupLink`)
 if(signupLink){
  signupLink.addEventListener(`click`,function(){
    loginModal.style.display = `none`;
    signupModal.style.display = `flex`
  })
 }

//close sognup modal handler
 if(closeSignupModal){
  closeSignupModal.addEventListener(`click`,function(){
    loginModal.style.display = `none`;
   })
 }


//move login link handler
if(moveLoginPage){
  moveLoginPage.addEventListener(`click`,function(){
    signupModal.style.display =`none`
    loginModal.style.display = `flex`
  })
}

