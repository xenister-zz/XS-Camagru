//DOM Elements

const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const photoButton = document.getElementById("photo_button");
const clearButton = document.getElementById("clear_button");
const colorFilter = document.getElementById("color_filter");
const shareButton = document.getElementById("share_button");
const photos = document.getElementById("content_1");
const imgUp = document.getElementById("imageLoader");
const fileName = document.getElementById("file_name");

//Global Vars

let width = 500,
    height = 0,
    filter = 'none',
    streaming = false;

let imgLoad;
let isImgUp = false
let mouseDown = false;
let mousePos;
let img = new Image();
let photo1 = new Image();
let photo2 = new Image();
img.src = "";
let boolImgFilter = false;
let posX;
let posY;
let tab = false;
let imgSzX;
let imgSzY;
let ctx = canvas.getContext('2d');

//Tabs controller

function switchTab(tab_id, tab_content) {

    if (tab_id === "tab_3"){
        tab = true;
        photoButton.style.display = 'none';
    } else {
        tab = false;
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

//Changing the image rendering size

function setImgSize(img_id) {
    if (img_id === "dalma"){
        imgSzX = 425;
        imgSzY = 425;
    } else if (img_id === "cedric"){
        imgSzX = 240;
        imgSzY = 240;
    } else if (img_id === "likeaboss"){
        imgSzX = 170;
        imgSzY = 170;
    } else {
        imgSzX = 250;
        imgSzY = 250;
    }
}

// Image Upload

imgUp.addEventListener('change', handleImage);

function handleImage(e) {
    isImgUp = true;
    let read = new FileReader();
    read.onload = function(event) {
        imgLoad = new Image();
        imgLoad.onload = function(){
            ctx.filter = filter;
            ctx.drawImage(imgLoad, 0, 0);
        }
        imgLoad.src = event.target.result;
    }
    read.readAsDataURL(e.target.files[0]);
    fileName.innerText = e.target.files[0]['name'];
    shareButton.classList.remove("is-hidden");

}

// Image Filter Control

function changeFilterImg(element){

    photoButton.style.display = 'inline-flex';
    setImgSize(element.id);
    img.src = element.src;
    if (isImgUp) {
        addFilterUpImg()
    } else {
        addFilterImg();
    }
};

// Movement of the filter according to the mouse position

canvas.addEventListener("mousedown", function(e) {

    photoButton.style.display = 'inline-flex';
    mousePos = getMousePos(canvas, e)
    if (isImgUp) {
        addFilterUpImg(this)
    } else {
        addFilterImg(this);
    }
    mouseDown = true
});

function getMousePos(canvas, e){
    return {
        x: e.clientX - canvas.offsetLeft,
        y: e.clientY - canvas.offsetTop
    };
};

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
    });

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

//Share photo

shareButton.addEventListener('click', function(e) {
    save();

    e.preventDefault();
}, false);

// Filter on uploaded image

function addFilterUpImg(e) {
    if (mousePos) {
        posX = mousePos.x - (img.width / 2);
        posY = mousePos.y - (img.height / 2);

        //Draw the image of the video on the canvas
        ctx.clearRect(0, 0, width, height);
        ctx.drawImage(imgLoad, 0, 0, width, height);
        ctx.filter = filter;
        ctx.drawImage(img, posX, posY, imgSzX, imgSzY);

        //show canvas and share button
        canvas.style.display = "";
        boolImgFilter = true;
    }
}

// add image filter on video stream

function addFilterImg(e){

    if (mousePos) {
        posX = mousePos.x - (img.width / 2);
        posY = mousePos.y - (img.height / 2);

        //Draw the image of the video on the canvas
        ctx.clearRect(0, 0, width, height);
        ctx.filter = filter;
        ctx.drawImage(img, posX, posY, imgSzX, imgSzY);

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
    if (tab === true) {
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
    isImgUp = false;
    e.preventDefault();
})

//Take picture from canvas
function takePicture() {

    const context = canvas.getContext('2d');

    if (width && height) {
        //Set canvas props
        canvas.width = width;
        canvas.height = height;

        photo1 = null;
        photo2 = null;
        //Draw the image of the video on the canvas
        if (isImgUp === true){
            context.clearRect(0, 0, width, height);
            context.filter = filter;
            context.drawImage(imgLoad, 0, 0, width, height);
            photo1 = canvas.toDataURL();
            context.drawImage(img, posX, posY, imgSzX, imgSzY);
            photo2 = canvas.toDataURL();
        } else if(boolImgFilter === false) {
            context.clearRect(0, 0, width, height);
            context.filter = filter;
            context.drawImage(video, 0, 0, width, height);
            photo1 = canvas.toDataURL();
        } else if(boolImgFilter === true) {
            context.clearRect(0, 0, width, height);
            context.filter = filter;
            context.drawImage(video, 0, 0, width, height);
            photo1 = canvas.toDataURL();
            context.drawImage(img, posX, posY, imgSzX, imgSzY);
            photo2 = canvas.toDataURL();
        }

        //show canvas and share button
        miniVisualSave();
        canvas.style.display = "";
        shareButton.classList.remove("is-hidden");
    }
}

// add in photos tabs

function addMiniPhoto(imgPhoto) {

    var child = document.createElement('img');
    child.setAttribute('src', imgPhoto);
    child.setAttribute('onclick', 'miniToMain(this)');

    photos.appendChild(child);
}

// put mini visual into the main visual
function miniToMain(element) {

    let ctx = canvas.getContext('2d');

    img.src = element.src;
    shareButton.classList.remove("is-hidden");
    ctx.filter = "none"
    ctx.drawImage(img, 0, 0, width, height);

}


// php server-side photo processing
function miniVisualSave() {
    let XHR = new XMLHttpRequest();

    let formData = new FormData();

    XHR.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            addMiniPhoto(this.responseText);
        }
    };

    XHR.addEventListener('load', function (event) {
    });

    XHR.addEventListener('error', function (event) {
        alert('Something goes wrong');
    });

    formData.append('src', photo1);
    if (photo2) {
        formData.append('filter', photo2);
        formData.append('posX', posX);
        formData.append('posY', posY);
    }
    XHR.open('POST', 'controller/save.php', false);
    XHR.send(formData);
}




//saving image for sharing

function save()  {
    let XHR = new XMLHttpRequest();

    let formData = new FormData();

    XHR.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            alert("Photo added.")
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

