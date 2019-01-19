let form = document.getElementById('login-form');
let XHR = new XMLHttpRequest();
// console.log("euuuuuu");
//
// form.addEventListener('submit', function (e){
//     e.preventDefault();
//     let formData = new FormData(form);
//
//     console.log("euuuuuuiiiiiii");
//     console.log(this.responseText);
//
//     XHR.open('POST', 'controller/login.php');
//
//     XHR.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             if (this.responseText == '-1') {
//                 console.log(this.responseText);
//                 alert('Username or password invalid');
//             } else if (this.responseText == 'success') {
//                 console.log(this.responseText);
//                 location.assign('?page=user');
//             }
//             else
//                 location.assign('?page=home');
//
//             // console.log(this.responseText);
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
