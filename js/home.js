let gallery;
gallery = document.getElementById('gallery');
let userName;

function getUserName(id) {
    let XHR2 = new XMLHttpRequest();
    XHR2.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            userName = this.responseText;
        }
    };
    XHR2.open("get", "controller/gallery.php?action=user_name&id=" + id, false);
    XHR2.send();
}

function newArticle (image) {
    let newArticle = document.createElement("div");
    let newHead= document.createElement("div");
    let newPic = document.createElement("div");
    let newFoot = document.createElement('div');
    let img = document.createElement('img');

    let title = document.createElement('h3');

    title.innerHTML = userName;
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

XHR.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
            let json = this.responseText;
            let images = JSON.parse(json);
            images.forEach(function (e){
                getUserName(e['user_id']);
                newArticle(e, userName);
            });
    }
};

XHR.open("get", "controller/gallery.php", true);
XHR.send();
