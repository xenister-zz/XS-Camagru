let elemNotifications = document.getElementById('notifications');
let ntfButton = document.getElementById('ntf-button');
let navbarBurger = document.getElementById('navbarBurger');
let navbarBasic = document.getElementById('navbarBasicExample');

fetchNotifications();
setInterval(() => {
    fetchNotifications();
}, 1000);

navbarBurger.addEventListener('click', function(){
   if (navbarBurger.classList.contains("is-active")){
       navbarBurger.classList.remove("is-active")
       navbarBasic.classList.remove('is-active');
   } else {
       navbarBurger.classList.add('is-active');
       navbarBasic.classList.add('is-active');
   }
});

function fetchNotifications () {
    let req = {
        method: 'get',
        mode: 'cors'
    };
    fetch('controller/notifications.php?action=get', req)
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.error("Okay, Houston, we've had a problem here");
                } else {
                    return response.json();
                }
            }
        )
        .then(
            function (notifications) {
                while (elemNotifications.firstChild) {
                    elemNotifications.removeChild(elemNotifications.firstChild);
                }
                let i = 0;
                notifications.forEach(function (it) {
                    elemNotifications.appendChild(newNotif(it['message'], "is-primary", it[0]));
                    i++;
                });
                ntfButton.classList.remove('new');
                if (i > 0) {
                    ntfButton.classList.add('new');
                }
            }
        );
}

function newNotif (message, color, id) {
    let content = document.createElement('p');
    content.innerText = message;

    let close = document.createElement('button');
    close.classList.add('delete');
    let notification = document.createElement('div');
    notification.classList.add('notification');
    notification.classList.add(color);
    notification.appendChild(content);
    notification.appendChild(close);

    let navbarItem = document.createElement('div');
    navbarItem.appendChild(notification);
    navbarItem.classList.add('navbar-item');
    navbarItem.setAttribute('id', id);

    close.onclick = function () {
        navbarItem.classList.add('is-hidden');
        fetch('controller/notifications.php?action=delete&id=' + id, {method:'get'})
            .then((res) => {
                if (res.status !== 200) {
                    console.error("Okay, Houston, we've had a problem here");
                } else {
                    return res.text();
                }
            })
            .catch((err) => {console.error(err)});
    };
    return navbarItem
}
