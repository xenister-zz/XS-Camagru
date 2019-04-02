let gallery = document.getElementById('gallery');
let userName;
let XHR = new XMLHttpRequest();
let articles;
const nPage = 5;
let page = 0;

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

function newCom(form, image) {
    let formData = new FormData(form);
    formData.append('img_id', image['img_id']);

    fetch('controller/new_com.php?', {
        method: 'post',
        body: formData,
    })
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.error("Okay, Houston, we've had a problem here");
                } else {
                    console.log(response);
                    return response.text();
                }
            }
        )
        .then(
            function (test) {
                console.log('response text: ', test);
            }
        );
}

function appendComs(foot, imgId) {
    let elemComs = document.createElement('comments');
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
                elemComs.appendChild(newCom)
            });
            elemComs.classList.add('container');
            foot.appendChild(elemComs);
        }
    };
    XHRfoot.open("get", "controller/get_coms.php?action=" + imgId, true);
    XHRfoot.send();
}

function newArticle (image, userName) {
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
        if (form.elements[0].value) {
            e.preventDefault();
            newCom(form, image);
            let lastCom = document.createElement('p');
            lastCom.innerHTML = "<strong>Me</strong>: " + form.elements[0].value;
            newFoot.appendChild(lastCom);
            newFoot.insertBefore(lastCom, newFoot.childNodes[1]);
            form.reset();
        }
    }, true);

    title.innerHTML = userName;
    newHead.appendChild(title);

    img.setAttribute('src', '../../img/'+ image['file']);
    newPic.appendChild(img);

    form.classList.add('columns');
    coms.classList.add('coms');
    divForm.classList.add('box');

    input.setAttribute('type', 'text');
    input.setAttribute('placeholder', 'comments');
    input.classList.add('column');
    input.classList.add('input');
    input.classList.add('is-rounded');
    input.classList.add('is-10');
    input.setAttribute('name', 'com_content');
    let col1 = document.createElement('div').appendChild(input);

    submitForm.setAttribute('type', 'submit');
    submitForm.classList.add('button');
    submitForm.classList.add('is-rounded');
    submitForm.innerText = "Publish";
    let col2 = document.createElement('div').appendChild(submitForm);
    col2.classList.add('is-1');

    form.appendChild(col1);
    form.appendChild(col2);
    divForm.appendChild(form);

    appendComs(divForm, image['img_id']);

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

function fetchArticles (response) {
    let json = response;
    articles = JSON.parse(json);
}

function toNextPage() {
    page++;
    if (articles.length / nPage > page) {
        toPage(page)
    } else {
        page--;
    }
}

function toPreviousPage() {
    page--;
    if (page >= 0) {
        toPage(page)
    } else {
        page++;
    }
}
function toPage (p) {
    while (gallery.firstChild) {
        gallery.removeChild(gallery.firstChild);
    }
    for (let i = 0; i < nPage; i++) {
        if (articles[i + (p * nPage)] != undefined) {
            getUserName(articles[i + (p * nPage)]['user_id']);
            newArticle(articles[i + (p * nPage)], userName);
        }
    }
}

window.onload = function () {
    XHR.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            fetchArticles(this.responseText);
            toPage(0)
        }
    };

    XHR.open("get", "controller/gallery.php", true);
    XHR.send();
};
