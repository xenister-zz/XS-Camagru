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
const canvas2 = document.getElementById("canvas2");
const photos = document.getElementById("photos");
const photoButton = document.getElementById("photo_button");
const clearButton = document.getElementById("clear_button");
const colorFilter = document.getElementById("color_filter");

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
        var height = video.videoHeight / (video.videoWidth / width);

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
    // photos.innerHTML = "";
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
    const context = canvas2.getContext('2d');

    console.log("click");

    if (width && height) {
        //Set canvas props
        canvas2.width = width;
        canvas2.height = height;

        //Draw the image of the video on the canvas
        context.drawImage(video, 0, 0, width, height);

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
};