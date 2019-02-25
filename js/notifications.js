function createNotification(message, targetType, targetId) {
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
                console.log('response text: ', test)
            }
        );
}
