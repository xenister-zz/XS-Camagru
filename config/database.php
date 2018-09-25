<!-- all database access and init will be in this file -->

<html>
    <h1>Database Page</h1>
</html>

Data for camagru

    account :
        - user_id
        - user_name
        - user_surname
        - user_email
        - user_password
        - user_timestamp
        - access_lvl -> public -> client -> moderator -> admin
        - user_bio ?
        - id of all post
        - id of all comment

    imgpost :
        - id
        - id of the owner of the image
        - number of likes
        - number of comment
        - timestamp
    
    compost :
        - id
        - id of the commented image
        - id of the user who commented
        - number of likes ?
        - lenght of the post
        - timestamp
