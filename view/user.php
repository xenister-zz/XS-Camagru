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

        <div class="columns">
            <div class="column">
                <div class="container is-widescreen">
                    <div class="notification">
                        This container is <strong>fluid</strong>: it will have a 32px gap on either side, on any
                        viewport size.
                    </div>
                </div>
            </div>
            <div class="column is-three-quarters">
                <div class="container is-widescreen">
                    <div class="notification">
                        This container is <strong>fluid</strong>: it will have a 32px gap on either side, on any
                        viewport size.
                    </div>
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
