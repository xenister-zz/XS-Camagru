//Tabs controller

function switchTab(tab_id, tab_content) {
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

//Global Vars

let width = 500,
    height = 0,
    filter = 'none',
    streaming = false;

//DOM Elements

const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const photoButton = document.getElementById("photo_button");
const clearButton = document.getElementById("clear_button");
const colorFilter = document.getElementById("color_filter");
const shareButton = document.getElementById("share_button");
const share = document.getElementById("share");

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
video.addEventListener('canplay', function(e) {
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
    canvas.style.display = "none";
    share.classList.add("is-hidden");
    //Reset filter variable to none
    filter = 'none';
    //Reset video style filter
    video.style.filter = filter;
    //Reset select list
    colorFilter.selectedIndex = 0;

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
        context.filter = filter;
        context.drawImage(video, 0, 0, width, height);

        canvas.style.display = "";
        share.classList.remove("is-hidden");

        //Create image from the canvas
        // const imgUrl = canvas.toDataURL('image/png');

        //Creating img element
        // const img = document.createElement('img');

        //Set img src
        // img.setAttribute('src', imgUrl);

        //Set image filter
        // img.style.filter = filter;

        //Add image to photos
        // photos.appendChild(img);
    }
}

function save()  {
    let XHR = new XMLHttpRequest();

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

    XHR.open('POST', 'controller/save.php', false);
    XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    XHR.send('img=' + url);
};