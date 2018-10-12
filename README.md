# XS-Camagru

Instragram like web-app

Data for camagru :

    account :
        - user_id -> INT NOT NULL PRIMARY KEY
        - user_name -> VARCHAR
        - user_surname -> VARCHAR
        - user_email -> VARCHAR
        - user_password -> VARCHAR
        - user_timestamp -> TIMESTAMP
        - access_lvl -> public -> client -> moderator -> admin -> INT
        - user_bio -> TEXT

    image post -> imgpost :
        - img_id  -> INT NOT NULL PRIMARY KEY
        - user_id image owner's id -> INT NOT NULL
        - like_num number of likes -> INT NOT NULL
        - com_num number of comment -> INT NOT NULL
        - timestamp -> TIMESTAMP
    
    comment post -> compost:
        - id -> INT NOT NULL PRIMARY KEY
        - id of the commented image -> INT NOT NULL
        - id of the user who commented -> INT NOT NULL
        - timestamp -> TIMESTAMP


All class info :

class User


Class User_log


Class Database

    