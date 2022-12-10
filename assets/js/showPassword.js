
const password = document.querySelector('#passWord');
const iCon = document.querySelector('#icon');
const showPassword = document.querySelector('#show');

showPassword.addEventListener('click', ()=>{
    if(password.type != 'password'){
        password.type = 'password';
        iCon.classList.toggle('fa-eye-slash');
    }else{
        password.type = 'text';
        iCon.classList.toggle('fa-eye-slash');
    }
});
