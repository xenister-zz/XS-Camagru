<?php

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">

<body>
    <div>
        <h1><?php echo $_SESSION['login']?> Profil</h1>

        dfgdfgdfgdfgdfdgdfgdf

        <a class="button is-primary is-large modal-button" data-target="modal-bis">Launch image modal</a>

            <div class="modal" id="model-bis">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Modal title</p>
                        <button class="delete" aria-label="close"></button>
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
