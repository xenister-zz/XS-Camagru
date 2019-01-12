
var video = document.getElementById("camera");
let canvas;
let data;
let ctx;
let bl;

function startCamera() {
    let constraints = {
        video: {
            width: { min: 640, ideal: 1920 },
            height: { min: 400, ideal: 1080 },
            aspectRatio: { ideal: 1.7777777778 }
        },
        audio: false
    };
    let mediaPromise = navigator.mediaDevices.getUserMedia(constraints);
    mediaPromise.then(
        (mediaStream)=> {
            video.srcObject = mediaStream;
            video.play();
        },
        ()=> {
            console.error('Oh my... getUserMedia has poorly failed.');
        }
    );
}

function snapShot() {
    document.getElementById('alert').innerHTML = 'Oh Snap!';
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext('2d');
    ctx.drawImage(video, 0,0, canvas.width, canvas.height);
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
    console.log(url);

    XHR.open('POST', 'v1/controller/save.php', false);
    XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    XHR.send('img=' + url);
}
