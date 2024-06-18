//form login conts
function myFunction() {
    let x = document.querySelector('.myInput');
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
// to show the password confirmation
function myConfirmation() {
    let x = document.querySelector('.myconfirmpass');
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
// to show the password when we modify the password for forgotten pass
function ModifythePasswordShow() {
    let x = document.querySelector('.passget');
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}