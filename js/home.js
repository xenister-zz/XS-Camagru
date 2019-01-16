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
    XHR2.open("get", "controller/gallery.php?action=user_name&id=" + id, false);
    XHR2.send();
}

function newCom(form, image) {
    let XHRform = new XMLHttpRequest(form);
    let formData = new FormData(form);

    XHRform.onreadystatechange = function() {
            console.log(this.responseText);
    };

    formData.append('img_id', image['img_id']);
    XHRform.addEventListener('load', function (event) {
    });

    XHRform.addEventListener('error', function (event) {
        alert('Something goes wrong');
    });

    XHRform.open('POST', 'controller/new_com.php');
    XHRform.send(formData);
}

function appendComs(foot, imgId) {
    let XHRfoot = new XMLHttpRequest();
    XHRfoot.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let json = this.responseText;
            let coms = JSON.parse(json);
            coms.forEach(function (e) {
                let newCom = document.createElement('p');
                newCom.innerHTML = e['com_content'];
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
    let form = document.createElement('form');
    let input = document.createElement('input');
    let title = document.createElement('h3');
    let coms = document.createElement('ul');
    let submitForm = document.createElement('button');

    form.addEventListener('submit', function (e){
        e.preventDefault();
        newCom(form, image);
    }, false);

    title.innerHTML = userName;
    newHead.appendChild(title);

    img.setAttribute('src', '../../img/'+ image['file']);
    newPic.appendChild(img);

    coms.classList.add('coms');
    divForm.classList.add('com-form');
    input.setAttribute('type', 'text');
    input.setAttribute('placeholder', 'commentaire');
    input.setAttribute('name', 'com_content');
    submitForm.setAttribute('type', 'submit');
    submitForm.innerHTML = '+';
    form.appendChild(input);
    form.appendChild(submitForm);
    divForm.appendChild(form);

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
    //console.log(articles);
    articles.forEach(function (article){
        getUserName(article['user_id']);
        newArticle(article, userName);
    });

}


window.onload= function () {

XHR.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        appendArticles(this.responseText);
    }
};

XHR.open("get", "controller/gallery.php", true);
XHR.send();
}
