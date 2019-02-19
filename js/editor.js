






var video = document.getElementById("camera");
var camera_zone = document.getElementById("camera-zone");

let canvas;

function resize_canvas(element) {


}

function startCamera() {

    var info_cam = document.getElementById("info_camera");
    info_cam.classList.add("is-hidden");


    camera_zone.classList.remove('is-hidden');

    let constraints = {
        audio: false,
        video: {
            width: { min: 720, ideal: 1280, max: 1280 },
            height: { min: 480, ideal: 720, max: 720 }
        }
    };

    // let mediaPromise = navigator.mediaDevices.getUserMedia(constraints);
    // mediaPromise.then(
    //     (mediaStream)=> {
    //         video.srcObject = mediaStream;
    //         video.play();
    //     },
    //     ()=> {
    //         console.error('Oh my... getUserMedia has poorly failed.');
    //     }
    // );

    navigator.mediaDevices.getUserMedia(constraints).then(function(mediaStream) {
            var video = document.getElementById('camera');
            video.srcObject = mediaStream;
             video.play();
        })
        .catch(function(err) { console.log(err.name + ": " + err.message); }); // always check for errors at the end.

    c_fjjlux = document.getElementById("camera");

    var videoWidth = video.offsetWidth;
    var videoHeight = video.offsetHeight;
    var videoLeft = video.offsetLeft;
    var videoTop = video.offsetTop;

    console.log(videoWidth);
    console.log(videoHeight);

    var canvasVideo = document.getElementById("filter");

    canvasVideo.width = videoWidth;
    canvasVideo.height = videoHeight;
    canvasVideo.left = videoLeft;
    canvasVideo.top = videoTop;
}

function snapShot() {
    var snap_zone = document.getElementById("snap-zone");
    snap_zone.classList.remove('is-hidden');

    document.getElementById('alert').innerHTML = 'Oh Snap!';
    canvas = document.getElementById("canvas");
    canvas.style.width ='100%';
    canvas.style.height='100%';
    // ...then set the internal size to match
    canvas.width  = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
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
}
