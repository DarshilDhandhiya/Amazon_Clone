
const userBtn= document.querySelector(".userBtn");
const SignupBtn= document.querySelector(".SignupBtn");
const moveBtn= document.querySelector(".moveBtn");
const user= document.querySelector(".user");
const Signup= document.querySelector(".Signup");

SignupBtn.addEventListener('click',()=>{
    moveBtn.classList.add("rigthBtn");
    Signup.classList.add("SignupForm");
    user.classList.remove("userForm");
    moveBtn.innerHTML="Signup";

});
userBtn.addEventListener('click',()=>{
    moveBtn.classList.remove("rigthBtn");
    Signup.classList.remove("SignupForm");
    user.classList.add("userForm");
    moveBtn.innerHTML="User";
});