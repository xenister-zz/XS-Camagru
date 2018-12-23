
var constraints = {video: true, audio: false};
var video = document.getElementById("camera");
let mediaPromise = navigator.mediaDevices.getUserMedia(constraints);
let data;

function startCamera() {
    mediaPromise.then(
        (mediaStream)=> {
            console.log(mediaStream);
            video.srcObject = mediaStream;
            console.log(video.play);
            video.play();
        },
        ()=> {
            console.error('Oh my... getUserMedia has poorly failed.');
        }
    );
}


function snapShot() {
    document.getElementById('alert').innerHTML = 'Oh Snap!';
    let canvas = document.getElementById("Canvas");
    let ctx = canvas.getContext('2d');
    // Draws current image from the video element into the canvas
    ctx.drawImage(video, 0,0, canvas.width, canvas.height);
    data = canvas.toDataURL('image/png');
    console.log(data.type);
}

function save() {
    location.assign('?page=save&action=save');
}
