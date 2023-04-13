const container = document.getElementById("container");
const loginbutton = document.getElementById("login");
const signupbutton = document.getElementById("signup");

signupbutton.addEventListener('click', () =>{
    container.classList.add('panel-active');
    
})
loginbutton.addEventListener('click', () =>{
    container.classList.remove('panel-active');

})