<?php

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/gallery.css"/>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">

<body>
    <div>

        <section class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">Welcome <?php echo $_SESSION['login']?></h1>
                </div>
            </div>
        </section>

        <div class="columns has-text-centered">
            <div class="column">
                    <div class="notification">
                        <h1 class="title-small"><strong>Profil info</strong></h1>
                        </br>
                        User : <?php echo $_SESSION['login']?> </br>
                        User email : <?php echo $_SESSION['user_mail']?>

                        <br>
                        <br>
                        <h1 class="title-small"><strong>Edit profil</strong></h1>
                        <br>
                        Fill what you want to change and confirm with your current password.
                        <br>
                        <br>
                        Mail modification need to reactivate your account.
                        <br>
                        <br>

                        <form id="login-form" class="login-form" method="post">
                            <div class="field">
                                <label class="label is-small">User name</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="text" placeholder="User name 5 to 25 caracters" name="username">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <p class="help is-danger"><?php if (isset($_GET['info']) && ($_GET['info'] == "username")) { echo $_GET['msg'];}?></p>
                                </div>
                            </div>
                            <br>
                            <div class="field">
                                <label class="label is-small">Password</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="password" placeholder="Password 8 to 25 caracters" name="password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="password" placeholder="Confirm password" name="confirm_password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <p class="help is-danger"><?php if (isset($_GET['info']) && ($_GET['info'] == "password")) { echo $_GET['msg'];}?></p>
                                </div>
                            </div>
                            <br>
                            <div class="field">
                                <label class="label is-small">Email</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="email" placeholder="Enter a valid Mail" name="usermail">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope fa-xs"></i>
                                    </span>
                                    <p class="help is-danger"><?php if (isset($_GET['info']) && ($_GET['info'] == "mail")) { echo $_GET['msg'];}?></p>
                                </div>
                            </div>
                            <br>
                            <div class="field">
                                <label class="label has-text-info">Current Password</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="password" placeholder="Enter your current password" name="master_pass" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <p class="help is-danger"><?php if (isset($_GET['info']) && ($_GET['info'] == "current_pass")) { echo $_GET['msg'];}?></p>
                                </div>
                            </div>
                            <br>
                            <div class="field">
                                <div class="control has-text-centered">
                                    <button type="submit" name="submit" class="button is-link">Submit</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
            </div>
            <div class="column is-two-thirds">

                    <div id="gallery">

                    </div>

            </div>
        </div>


    </div>
</body>

<script src="/js/user.js"></script>
<script src="/js/home.js"></script>
