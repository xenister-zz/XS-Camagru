// let form = document.getElementById('login-form');
// let XHR = new XMLHttpRequest();
//
// function formErrorAdd (msg){
//     let errors_box = document.getElementById('form-error');
//     let error_msg  = document.getElementById("error-span");
//
//     errors_box.setAttribute("class", "alert alert-warning");
//     errors_box.setAttribute("role", "alert");
//     error_msg.innerHTML = msg;
//
//     // errors_box.appendChild(error_msg);
// }
//
// console.log("euuuuuu");
//
// form.addEventListener('submit', function (e){
//     e.preventDefault();
//     let formData = new FormData(form);
//
//     XHR.open('POST', 'controller/login.php');
//
//     XHR.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             if (this.responseText == '-1') {
//                 console.log(this.responseText);
//                 formErrorAdd('Username or password invalid');
//             } else if (this.responseText == 'success') {
//                 console.log(this.responseText);
//                 location.assign('?page=user');
//             }
//             //else
//                 //location.assign('?page=home');
//         }
//     };
//
//     XHR.addEventListener('load', function (event) {
//     });
//
//     XHR.addEventListener('error', function (event) {
//         alert('Something goes wrong');
//     });
//
//     XHR.send(formData);
// }, true);
