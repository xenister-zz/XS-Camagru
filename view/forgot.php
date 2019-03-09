
<link rel="stylesheet" href="/css/signpage.css"/>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

<div class="card-content form">

    <form id="login-form" class="login-form" method="post">

        <h1 class="titlelogin"> Password Reset </h1>
        <br>
        <h5>Input your mail address we will send you information to recover your password</h5>
        <br>
        <div class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="email" placeholder="Enter a valid mail" name="mail" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
        </div>

        <p class="help is-danger"><?php if (isset($_GET['msg'])) { echo $_GET['msg'];}?></p>

        </br>

        <div class="field">
            <div class="control has-text-centered">
                <button type="submit" name="submit" class="button is-link">Submit</button>
            </div>
        </div>

        </br>

        <p class="help is-info">Not registered? <a href="?page=landing&action=register"> Create an account !</a></p>
    </form>

</div>