<?php

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
<link rel="stylesheet" href="/css/user.css">
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

                        <form id="login-form" class="login-form" method="post">
                            <div class="field">
                                <label class="label is-small">User name</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="email" placeholder="User name 5 to 25 caracters" name="username">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="field">
                                <label class="label is-small">Password</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="email" placeholder="Password 8 to 25 caracters" name="password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="email" placeholder="Confirm password" name="confirm_password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
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
                                </div>
                            </div>
                            <br>
                            <div class="field">
                                <label class="label has-text-info">Current Password</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="password" placeholder="Enter a valid Mail" name="master_password" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
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

                    <div class="notification">
                        This container is <strong>fluid</strong>: it will have a 32px gap on either side, on any
                        viewport size.
                    </div>

            </div>
        </div>


        <a class="button is-primary is-large modal-button" data-target="modal-bis" id="modalclick">Launch image modal</a>

            <div class="modal" id="model-bis">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Modal title</p>
                        <button class="delete" aria-label="close" id="close-modal-bis"></button>
                    </header>
                    <section class="modal-card-body">
                        <div class="content">
                            <h1> hello world</h1>
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        <button class="button is-success">Save changes</button>
                        <button class="button">Cancel</button>
                    </footer>
                </div>
            </div>

    </div>
</body>

<script src="/js/user.js"></script>
