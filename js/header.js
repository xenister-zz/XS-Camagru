let notifications = document.getElementById('notifications');

function newNotif (message, color) {

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

    close.onclick = function () {navbarItem.classList.add('is-hidden')};
    return navbarItem
}

for (let i = 0 ; i < 5 ; i++) {
    notifications.appendChild(newNotif("vous avez une nouvelle notifications " + i, "is-primary"));
}
