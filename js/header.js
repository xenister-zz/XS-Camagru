let elemNotifications = document.getElementById('notifications');
let req = {
    method: 'get',
    mode: 'cors'
};

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
            .then((text) => {
                console.log(text);
            })
            .catch((err) => {console.error(err)});
    };
    return navbarItem
}

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
            notifications.forEach(function (it) {
                elemNotifications.appendChild(newNotif(it['message'], "is-primary", it[0]));
            })
        }
    );

function test(message, targetType, targetId) {
   console.log('test');
   let init = {
       method: 'POST',
       headers: {
           "Content-type": "application/x-www-form-urlencoded",
       },
       body: "action=add&message=" + message + "&target_type=" + targetType + "&target_id=" + targetId,
   };
    fetch('controller/notifications.php?', init)
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.error("Okay, Houston, we've had a problem here");
                } else {
                    return response.text();
                }
            }
        )
        .then(
            function (test) {
                console.log(test)
            }
        );
}
