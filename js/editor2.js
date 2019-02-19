//Tabs controller

function show_tabs(elem) {
  let activeTabs = document.getElementById(elem);

  var tabZoneEffect = document.getElementById("tabs_effect");
  var tabZoneImage = document.getElementById("tabs_image");

  if ((elem == "effect") && (!tabZoneEffect.classList.contains('is-active'))) {
      tabZoneEffect.classList.add('is-active');
      tabZoneImage.classList.remove('is-active');
  } else {
      tabZoneImage.classList.add('is-active');
      tabZoneEffect.classList.remove('is-active');
  }

  if (elem == "effect") {

  }
};

//Global Vars

let width = 500,
    height = 0,
    filter = 'none',
    streaming = false;

//DOM Elements

const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
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
        height = video.videoHeight / (video.videoWidth / width);

        video.setAttribute('width', width);
        video.setAttribute('height', height);

        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);

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
    photos.innerHTML = "";
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
        //Set canvas props
        canvas.width = width;
        canvas.height = height;

        //Draw the image of the video on the canvas
        context.drawImage(video, 0, 0, width, height);

        //Create image from the canvas
        const imgUrl = canvas.toDataURL('image/png');

        //Creating img element
        const img = document.createElement('img');

        //Set img src
        img.setAttribute('src', imgUrl);

        //Set image filter
        img.style.filter = filter;

        //Add image to photos
        photos.appendChild(img);
    }
};