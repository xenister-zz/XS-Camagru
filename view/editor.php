




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/editor.css">

<h1>Editor</h1>

<div class="top_content column has-text-centered">
    <video id="video">Stream not available.</video>
    <br>
    <a id="photo_button" class="button is-danger">Take Photo</a>
    <a id="clear_button" class="button is-primary">Clear</a>
    <br>
    <div class="container">
        <div class="tabs is-centered is-boxed is-medium">
            <ul>
                <li id="tabs_effect" class="is-active"><a class="effect" onclick="show_tabs('effect')">Effect Filters</a></li>
                <li id="tabs_image"><a class="image" onclick="show_tabs('image')">Music</a></li>
            </ul>
        </div>
        <div id="effect" class="select">
            <select id="color_filter">
                <option value="none">None</option>
                <option value="grayscale(100%)">Grayscale</option>
                <option value="sepia(100%)">Sepia</option>
                <option value="invert(100%)">Invert</option>
                <option value="hue-rotate(90deg)">Hue</option>
                <option value="blur(10px)">Blur</option>
                <option value="contrast(200%)">Contrast</option>
            </select>
        </div>
        <div id="image" class="imagec is hidden">
            <figure class="image is-128x128">
                <img src="https://bulma.io/images/placeholders/128x128.png">
                <img src="https://bulma.io/images/placeholders/128x128.png">
                <img src="https://bulma.io/images/placeholders/128x128.png">
                <img src="https://bulma.io/images/placeholders/128x128.png">
            </figure>
        </div>
    </div>

    <canvas id="canvas"></canvas>
</div>
<div class="bottom-content">
    <div id="photos">

    </div>
</div>

<!--    <div class="columns">-->
<!---->
<!--        <div class="column is-three-quarters has-text-centered">-->
<!--            <div class="container container_video is-widescreen has-text-centered">-->
<!---->
<!--                <div id="camera-zone" class="notification is-hidden">-->
<!---->
<!--                    <video id="camera" class="video"></video>-->
<!--                    <canvas class="filter_canvas" id="filter"></canvas>-->
<!--                    <p id="alert"></p>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="column control_button has-text-centered">-->
<!---->
<!--                <h2 id="info_camera">Click the camera button to give the permission to use your camera.</h2>-->
<!--                <br>-->
<!--                <div class="button_group">-->
<!--                    <a onclick="startCamera();" class="button is-info is-outlined">Camera</a>-->
<!--                    <a onclick="snapShot(this);" class="button is-success is-outlined">Shot</a>-->
<!--                    <a onclick="save();" class="button is-success">-->
<!--                                <span class="icon is-small">-->
<!--                                  <i class="fas fa-check"></i>-->
<!--                                </span>-->
<!--                        <span>Save</span>-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="container has-text-centered">-->
<!---->
<!--                <div id="snap-zone" class="notification is-hidden">-->
<!--                    <canvas id="canvas"></canvas>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="column select_filter notification">-->
<!--            <h1>Filter</h1>-->
<!---->
<!--        </div>-->
<!---->
<!---->
<!---->
<!--    </div>-->



        <script src="/js/editor2.js"></script>
    </body>
</html>

