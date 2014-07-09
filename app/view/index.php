<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"　"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<link rel="stylesheet" href="../ref/css/shop.css" type="text/css" charset="utf-8"/>

<title>Dulcis</title>
</head>
<body>
<a href="#"><img src="../ref/img/logo.PNG" alt="Dulcis"></a>


<?php set_include_path(get_include_path().PATH_SEPARATOR.dirname(__FILE__));?> 
<?php
	//インクルードのパス設定
	ini_set('include_path', '/jyoko3dev/xampp/htdocs/app/classes/');
?>

<?php include '/header_menu.php';?>

<?php include '/left_menu.php';?>

<?php include '/slideshow.php';?>

<?php include '/ranking_menu.php';?>

<?php include_once '/footer_menu.php';?>

</body>
</html>