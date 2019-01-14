let gallery;
gallery = document.getElementById('gallery');

function newArticle (image) {
    console.log(image);
    let newArticle = document.createElement("div");
    let newHead= document.createElement("div");
    let newPic = document.createElement("div");
    let newFoot = document.createElement('div');
    let img = document.createElement('img');

    let title = document.createElement('h3');
    title.innerHTML = image['user_id'];

    newHead.appendChild(title);

    img.setAttribute('src', '../../img/'+ image['file']);
    newPic.appendChild(img);

    newFoot.innerHTML = 'footer';

    newPic.classList.add('pic');
    newArticle.classList.add('article');
    newHead.classList.add('head');
    newFoot.classList.add('foot');

    newArticle.appendChild(newHead);
    newArticle.appendChild(newPic);
    newArticle.appendChild(newFoot);
    gallery.appendChild(newArticle);
}

let XHR = new XMLHttpRequest();

XHR.onload = function() {
};

XHR.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
            let json = this.responseText;
            let images = JSON.parse(json);
            console.log(images);
            images.forEach(function (e){
                newArticle(e);
            });
    }
};
XHR.open("get", "controller/gallery.php", true);
XHR.send();
