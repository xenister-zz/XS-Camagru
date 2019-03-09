




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/editor.css">

<h1 class="title has-text-centered">Editor</h1>

<div id="montageZone">
    <video id="video">Stream not available.</video>
    <canvas id="canvas"></canvas>
</div>

<div class="container0 has-text-centered">
    <a id="photo_button" class="button is-danger">Take Photo</a>
    <a id="clear_button" class="button is-primary">Clear</a>
    <a id="share_button" class="button is-info is-hidden">Share</a>
</div>

<div class="top_content column has-text-centered">

    <div class="container">
        <div class="tabs is-centered is-boxed is-medium">
            <ul>
                <li id="tab_1" class="tab_menu is-active"><a class="image" onclick="switchTab('tab_1', 'content_1')">Photos</a></li>
                <li id="tab_2" class="tab_menu"><a class="effect" onclick="switchTab('tab_2', 'content_2')">Effect Filter</a></li>
                <li id="tab_3" class="tab_menu"><a class="image" onclick="switchTab('tab_3', 'content_3')">Image Filter</a></li>
            </ul>
        </div>
        <div id="content_1" class="tab_content photos">
<!--            <img onclick="changeFilterImg(this)" id="dalma" src="/filter/original/dalma.png">-->
<!--            <img onclick="changeFilterImg(this)" id="cedric" src="/filter/original/cedric2.png">-->
<!--            <img onclick="changeFilterImg(this)" id="flower" src="/filter/original/flower2.png">-->
<!--            <img onclick="changeFilterImg(this)" id="licorne" src="/filter/original/chien.png">-->
<!--            <img onclick="changeFilterImg(this)" id="likeaboss" src="/filter/original/likeaboss.png">-->
<!--            <img onclick="changeFilterImg(this)" id="noel" src="/filter/original/rainbow.png">-->
<!--            <img onclick="changeFilterImg(this)" id="pipe" src="/filter/original/pipe.png">-->
        </div>
        <div id="content_2" class="tab_content has-text-centered" style="display: none">
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
        <div id="content_3" class="tab_content img_filter" style="display: none">
                <img onclick="changeFilterImg(this)" id="dalma" src="/filter/original/dalma.png">
                <img onclick="changeFilterImg(this)" id="cedric" src="/filter/original/cedric2.png">
                <img onclick="changeFilterImg(this)" id="flower" src="/filter/original/flower2.png">
                <img onclick="changeFilterImg(this)" id="licorne" src="/filter/original/chien.png">
                <img onclick="changeFilterImg(this)" id="likeaboss" src="/filter/original/likeaboss.png">
                <img onclick="changeFilterImg(this)" id="noel" src="/filter/original/rainbow.png">
                <img onclick="changeFilterImg(this)" id="pipe" src="/filter/original/pipe.png">
        </div>
    </div>
</div>

        <script src="/js/editor2.js"></script>
    </body>
</html>

