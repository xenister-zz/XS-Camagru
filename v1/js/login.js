let form = document.getElementById('login-form');
let XHR = new XMLHttpRequest();

form.addEventListener('submit', function (e){
    e.preventDefault();
    let formData = new FormData(form);

    XHR.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == '-1') {
                alert('Username or password invalid');
            } else {
                location.assign('?page=user');
            }
        }
    };

    XHR.addEventListener('load', function (event) {
    });

    XHR.addEventListener('error', function (event) {
        alert('Something goes wrong');
    });

    XHR.open('POST', 'v1/controller/login.php');
    console.log(formData.getAll('login'));
    XHR.send(formData);
}, false);
