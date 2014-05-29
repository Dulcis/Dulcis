<?php
//データベースへの接続情報
//実装時には変更が必須
define('db_host', 'localhost');
define('db_user', 'root');
define('db_pass', '0202');
define('db_name', 'test');

$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
?>