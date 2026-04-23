// ========== Switch Contents ==============
function showRegister() {  
    document.querySelector('.auth-login-container').classList.add('d-none');
    document.querySelector('.auth-fp-container').classList.add('d-none');
    document.querySelector('.auth-newpw-container').classList.add('d-none');
    document.querySelector('.auth-register-container').classList.remove('d-none');
}
function showLogin() {  
    document.querySelector('.auth-register-container').classList.add('d-none');
    document.querySelector('.auth-fp-container').classList.add('d-none');
    document.querySelector('.auth-newpw-container').classList.add('d-none');
    document.querySelector('.auth-login-container').classList.remove('d-none');
}
function showFP(){
    document.querySelector('.auth-register-container').classList.add('d-none');
    document.querySelector('.auth-login-container').classList.add('d-none');
    document.querySelector('.auth-newpw-container').classList.add('d-none');
    document.querySelector('.auth-fp-container').classList.remove('d-none');
}
function showNewPw(){
    document.querySelector('.auth-register-container').classList.add('d-none');
    document.querySelector('.auth-login-container').classList.add('d-none');
    document.querySelector('.auth-fp-container').classList.add('d-none');
    document.querySelector('.auth-newpw-container').classList.remove('d-none');
}

// goto
function gotoSearch() {
    window.location = "search.php";
}
function gotoHome() {
    window.location = "home.php";
}
