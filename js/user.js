let gallery = document.getElementById('gallery');
let userName;
let XHR = new XMLHttpRequest();

function getUserName(id) {
    let XHR2 = new XMLHttpRequest();
    XHR2.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            userName = this.responseText;
        }
    };
    XHR2.open("get", "controller/gallery.php?action=user_name&id=" + id,  false);
    XHR2.send();
}

function appendComs(foot, imgId) {
    let XHRfoot = new XMLHttpRequest();
    XHRfoot.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let json = this.responseText;
            let coms = JSON.parse(json);
            console.log('COMMS = ');
            console.log(coms);
            coms.forEach(function (e) {
                let newCom = document.createElement('p');
                newCom.innerHTML = "<strong>" + e['user_name'] + " </strong>: " + e['com_content'];
                foot.appendChild(newCom);
            })
        }
    };
    XHRfoot.open("get", "controller/get_coms.php?action=" + imgId, true);
    XHRfoot.send();
}

function newArticle (image) {
    let Article = document.createElement("div");
    let newHead= document.createElement("div");
    let newPic = document.createElement("div");
    let newFoot = document.createElement('div');
    let img = document.createElement('img');
    let divForm = document.createElement('div');
    let input = document.createElement('input');
    let title = document.createElement('h3');
    let coms = document.createElement('ul');
    let submitForm = document.createElement('button');

    title.innerHTML = userName;
    newHead.appendChild(title);

    img.setAttribute('src', '../../img/'+ image['file']);
    newPic.appendChild(img);

    coms.classList.add('coms');
    divForm.classList.add('com-form');
    input.setAttribute('type', 'text');
    input.setAttribute('placeholder', 'commentaire');
    input.classList.add('textarea');
    input.setAttribute('name', 'com_content');
    submitForm.setAttribute('type', 'submit');
    submitForm.classList.add('button');
    submitForm.innerText = "add";

    appendComs(newFoot, image['img_id']);

    newFoot.appendChild(divForm);

    newPic.classList.add('pic');
    Article.classList.add('article');
    newHead.classList.add('head');
    newFoot.classList.add('foot');

    Article.appendChild(newHead);
    Article.appendChild(newPic);
    Article.appendChild(newFoot);
    gallery.appendChild(Article);
}

function appendArticles (response) {
    let json = response;
    let articles = JSON.parse(json);
    articles.forEach(function (article){
        getUserName(article['user_id']);
        newArticle(article, userName);
    });

}

window.onload = function () {
    XHR.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            appendArticles(this.responseText);
        }
    };

    XHR.open("get", "controller/gallery.php", true);
    XHR.send();
};