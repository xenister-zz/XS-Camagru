//DOM Elements

const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const photoButton = document.getElementById("photo_button");
const clearButton = document.getElementById("clear_button");
const colorFilter = document.getElementById("color_filter");
const shareButton = document.getElementById("share_button");


//Global Vars

let width = 500,
    height = 0,
    filter = 'none',
    streaming = false;

let mouseDown = false;
let mousePos;
let img = new Image();
img.src = "/filter/original/dalma.png";
let boolImgFilter = false;
let posX;
let posY;
let tab = false;

let ctx = canvas.getContext('2d');

//Tabs controller

function switchTab(tab_id, tab_content) {

    if (tab_id == "tab_3"){
        tab = true;
        photoButton.style.display = 'none';
    } else {
        tab = false
        photoButton.style.display = 'inline-flex';
    }

    // first of all we get all tab content blocks (I think the best way to get them by class names)
    var x = document.getElementsByClassName("tab_content");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = 'none'; // hide all tab content
    }
    document.getElementById(tab_content).style.display = 'block'; // display the content of the tab we need

    // now we get all tab menu items by class names (use the next code only if you need to highlight current tab)
    var x = document.getElementsByClassName("tab_menu");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].className = 'tab_menu';
    }
    document.getElementById(tab_id).className = 'tab_menu is-active';
}

// Image Filter Control

function changeFilterImg(element){

    photoButton.style.display = 'inline-flex';
    img.src = element.src;
    photoButton.removeAttribute("disabled");
    addFilterImg();
};

canvas.addEventListener("mousedown", function(e) {

    photoButton.style.display = 'inline-flex';
    mousePos = getMousePos(canvas, e)
    addFilterImg(this);
    mouseDown = true
});

function getMousePos(canvas, e){
    return {
        x: e.clientX - canvas.offsetLeft,
        y: e.clientY - canvas.offsetTop
    };
};

//Image position

//Get Media Stream

navigator.mediaDevices.getUserMedia({video: true, audio:false})
.then(function(stream){
    //Link to the video source
    video.srcObject = stream;
    // Play video
    video.play();
})

.catch(function(err){
    console.log(err.name + ": " + err.message);
})

//Play when ready
video.addEventListener('canplay', function() {
    if (!streaming) {

        //Set video / Canvas height
        height = video.videoHeight / (video.videoWidth / width);

        video.setAttribute('width', width);
        video.setAttribute('height', height);

        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);

        streaming = true;
    }
}, false);

//Take Photo

photoButton.addEventListener('click', function(e) {
    takePicture();

    e.preventDefault();
}, false);

shareButton.addEventListener('click', function(e) {
    save();

    e.preventDefault();
}, false);

function addFilterImg(e){

    if (mousePos) {
        posX = mousePos.x - (img.width / 2);
        posY = mousePos.y - (img.height / 2);

        //Draw the image of the video on the canvas
        ctx.clearRect(0, 0, width, height);
        ctx.filter = filter;
        ctx.drawImage(img, posX, posY, 400, 400);

        //show canvas and share button
        canvas.style.display = "";
        boolImgFilter = true;
    }
};

//Filter event
colorFilter.addEventListener('change', function(e) {

    //Set filter
    filter = e.target.value;
    video.style.filter = filter;

    e.preventDefault();
})

//Clear event
clearButton.addEventListener('click', function(e) {
    //Clear photos
    if (tab == true) {
        photoButton.style.display = 'none';
    }
    // canvas.style.display = "none";
    ctx.clearRect(0, 0, width, height);
    shareButton.classList.add("is-hidden");
    //Reset filter variable to none
    filter = 'none';
    //Reset video style filter
    video.style.filter = filter;
    //Reset select list
    colorFilter.selectedIndex = 0;
    boolImgFilter = false;

    e.preventDefault();
})

//Take picture from canvas
function takePicture() {

    const context = canvas.getContext('2d');

    if (width && height) {
        console.log("clicksssssss");
        //Set canvas props
        canvas.width = width;
        canvas.height = height;

        //Draw the image of the video on the canvas
        if(boolImgFilter == false) {
            context.clearRect(0, 0, width, height);
            context.filter = filter;
            context.drawImage(video, 0, 0, width, height);
        }
        if(boolImgFilter == true) {
            context.clearRect(0, 0, width, height);
            context.filter = filter;
            context.drawImage(video, 0, 0, width, height);
            context.drawImage(img, posX, posY, 400, 400);
        }

        //show canvas and share button
        canvas.style.display = "";
        shareButton.classList.remove("is-hidden");
    }
}

// dalma.addEventListener("onclick", )

function save()  {
    let XHR = new XMLHttpRequest();

    let formData = new FormData();

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

    var url = canvas.toDataURL();

    formData.append('img', url);
    XHR.open('POST', 'controller/save.php', false);
    XHR.send(formData);
};

