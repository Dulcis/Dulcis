<?php
//データベースへの接続情報

//サーバ側
define('db_host', '172.20.17.214');
define('db_user', 'user1');
define('db_pass', '');
define('db_name', 'prototype');

$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
?>