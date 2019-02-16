




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/user.css">

<body>

    <div class="columns">

        <div class="column is-three-quarters">
            <div class="container is-widescreen has-text-centered">



                <div id="camera-zone" class="notification is-hidden">
                    <video id="camera"></video>
                    <p id="alert"></p>
                </div>

                <h2>Click the camera button to give the permission to use your camera.</h2>
                <br>

                <a onclick="startCamera();" class="button is-info is-outlined">Camera</a>
                <a onclick="snapShot(this);" class="button is-success is-outlined">Shot</a>
                <a onclick="save();" class="button is-success">
                        <span class="icon is-small">
                          <i class="fas fa-check"></i>
                        </span>
                    <span>Save</span>
                </a>
            </div>

            <div class="container is-widescreen has-text-centered">



                <div id="snap-zone" class="notification is-hidden">
                    <canvas id="canvas"></canvas>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="container is-widescreen">
                <div class="notification">
                    <h1 class="title-small">Profil info</h1>
                    </br>
                    User : <?php echo $_SESSION['login']?> </br>
                    User email : <?php echo $_SESSION['user_mail']?>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="/js/editor.js"></script>

