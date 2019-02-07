






// var video = document.getElementById("camera");
// let canvas;
//
// function startCamera() {
//     let constraints = {
//         video: {
//             //width: { min: 400, ideal: 720 },
//             //height: { min: 400, ideal: 720 },
//             width: 720,
//             height: 720,
//             //aspectRatio: { ideal: 1}
//         },
//         audio: false
//     };
//     let mediaPromise = navigator.mediaDevices.getUserMedia(constraints);
//     mediaPromise.then(
//         (mediaStream)=> {
//             video.srcObject = mediaStream;
//             video.play();
//         },
//         ()=> {
//             console.error('Oh my... getUserMedia has poorly failed.');
//         }
//     );
// }
//
// function snapShot() {
//     document.getElementById('alert').innerHTML = 'Oh Snap!';
//     canvas = document.getElementById("canvas");
//     canvas.width = video.videoWidth;
//     canvas.height = video.videoHeight;
//     canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
// }
//
// function save()  {
//     let XHR = new XMLHttpRequest();
//
//     XHR.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             console.log(this.responseText);
//         }
//     };
//
//     XHR.addEventListener('load', function (event) {
//     });
//
//     XHR.addEventListener('error', function (event) {
//         alert('Something goes wrong');
//     });
//
//     var url = canvas.toDataURL();
//
//     XHR.open('POST', 'controller/save.php', false);
//     XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     XHR.send('img=' + url);
// }
