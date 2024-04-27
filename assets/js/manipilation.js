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