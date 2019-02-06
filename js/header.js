console.log("Tutu");

var userDropdown = document.getElementById("navbarDropdown");
var editorLink = document.getElementById("editorLink");
if (userDropdown.innerText !== 'User') {
    userDropdown.classList.remove('disabled');
    editorLink.classList.remove('disabled');

}