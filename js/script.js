// delete confirmation to be used w/any delete link/button
function confirmDelete() {
    return confirm('Are you sure you want to delete this?');
}

function comparePasswords() {
    var password1 = document.getElementById('password').value;
    var password2 = document.getElementById('confirm').value;
    var passwordMsg = document.getElementById('passwordMsg');

    //confirming passwords
    if(password1 != password2){
        passwordMsg.innerText = 'Passwords do not match';
        passwordMsg.className = 'text-danger';
        return false;
    }else{
        passwordMsg.innerText = '';
        passwordMsg.className = '';
        return true
    }
}