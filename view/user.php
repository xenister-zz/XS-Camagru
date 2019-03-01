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
                        <h1 class="title-small">Profil info</h1>
                        </br>
                        User : <?php echo $_SESSION['login']?> </br>
                        User email : <?php echo $_SESSION['user_mail']?>

                        <br>
                        <br>

                        <form id="login-form" class="login-form" method="post">
                            <div class="field">
                                <label class="label">Edit Profil</label>
                                Fill the
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="email" placeholder="User name 5 to 25 caracters">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope fa-xs"></i>
                                    </span>
                                    <span class="icon is-small is-right">
                                        <i class="fas fa-check fa-xs"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="email" placeholder="Password 8 to 25 caracters">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope fa-xs"></i>
                                    </span>
                                    <span class="icon is-small is-right">
                                        <i class="fas fa-check fa-xs"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="email" placeholder="Extra small">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope fa-xs"></i>
                                    </span>
                                    <span class="icon is-small is-right">
                                        <i class="fas fa-check fa-xs"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="email" placeholder="Extra small">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope fa-xs"></i>
                                    </span>
                                    <span class="icon is-small is-right">
                                        <i class="fas fa-check fa-xs"></i>
                                    </span>
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
