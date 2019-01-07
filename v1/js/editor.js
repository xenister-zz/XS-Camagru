
var video = document.getElementById("camera");
let data;

function startCamera() {
    var constraints = {video: true, audio: false};
    let mediaPromise = navigator.mediaDevices.getUserMedia(constraints);
    mediaPromise.then(
        (mediaStream)=> {
            console.log(mediaStream);
            console.log('startCamera');
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
    canvas.toBlob(function(blob) {
        var newImg = document.createElement('img'),
            url = URL.createObjectURL(blob);
        console.log(url);

        newImg.onload = function() {
            // no longer need to read the blob so it's revoked
            //URL.revokeObjectURL(url);
        };

        data = newImg.src = url;
        document.body.appendChild(newImg);
    }, 'image/png', 1);
}

function save() {
    location.assign('?page=editor&action=save&file=' + data);
}
