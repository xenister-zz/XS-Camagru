<?php

    const DB_HOST = 'localhost';
	const DB_USER = 'root';
	const DB_PASSWD = 'secret';
	const DB_NAME = 'camagru';

	const ACCOUNTS_MAX_SIZE_NAME = 20;
	const ACCOUNTS_MAX_SIZE_SURNAME = 20;
	const ACCOUNTS_MAX_SIZE_EMAIL = 50;
	const ACCOUNTS_MAX_SIZE_PASSWD = 64;
	const ACCOUNTS_HASH_ALGO = 'whirlpool';
    const ACCOUNTS_HASH_SALT = 'CTnbwBx8fI';
    
    const COMMENTS_MAX_SIZE = 500;

    const ACCESS_LVL_PUBLIC = 1;
    const ACCESS_LVL_CLIENT = 2;
    const ACCESS_LVL_MODO = 3;
    const ACCESS_LVL_ADMIN = 31;

?>