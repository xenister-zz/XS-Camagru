<?php


/*
*/
?>
<link rel="stylesheet" href="/v1/css/signpage.css"/>


<div class="register-page">
    <div class="form">
        <form id="register-form" class="register-form">
            <input type="text" placeholder="login" name="login"/>
            <input type="password" placeholder="password" name="password"/>
            <input type="text" placeholder="email address" name="email"/>
            <button type="submit">create</button>
            <p class="message">Already registered? <a href="?page=login_form">Sign In</a></p>
        </form>
    </div>
</div>

<script>
    let form = document.getElementById('register-form');
    let XHR = new XMLHttpRequest();

    form.addEventListener('submit', function (e){

        e.preventDefault();
        let formData = new FormData(form);

        XHR.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
            }
        };

        XHR.addEventListener('load', function (event) {
        });

        XHR.addEventListener('error', function (event) {
            alert('Something goes wrong');
        });

        XHR.open('POST', 'v1/controller/register.php');

        XHR.send(formData);
    }, false);
</script>
