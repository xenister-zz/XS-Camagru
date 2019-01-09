
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

let ctx;
function snapShot() {
    document.getElementById('alert').innerHTML = 'Oh Snap!';
    let canvas = document.getElementById("Canvas");
    ctx = canvas.getContext('2d');
    // Draws current image from the video element into the canvas
    ctx.drawImage(video, 0,0, canvas.width, canvas.height);
    console.log(ctx);
    ctx.toDataURL("image/png");
}

function save() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "v1/controller/save.php", true);
    xhttp.setRequestHeader("Content-Type", "application/upload");
    xhttp.send(data);
}
