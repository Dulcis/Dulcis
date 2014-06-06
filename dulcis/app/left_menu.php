<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../ref/css/validationEngine.jquery.css" type="text/css" charset="utf-8"/>
<link rel="stylesheet" href="../ref/css/shop.css" type="text/css" charset="utf-8"/>
<script src="../ref/js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../ref/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="../ref/js/jquery.validationEngine-ja.js" type="text/javascript" charset="utf-8"></script>
<script src="../ref/js/form.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>

<?php
echo'<div id="left_menu.php">';
// セッションの開始
session_start();


if (!isset($_SESSION["genre"])){
//genreのセッションがない場合

	
//iniファイルを見る作業　iniファイルにデータベースのアクセスできるように設定している
ini_set('include_path','/jyoko3dev/xampp/htdocs/app/classes/');
require_once('db.php');

// データの取得 genreからデータをgno順に検索
$sql = "SELECT * FROM genre ORDER BY gno";
$result = mysqli_query($dbc,$sql);
mysqli_close($dbc);


// 取得したデータを一覧表示
while($row = mysqli_fetch_array($result)){
	
	//セッションに2次元配列で格納
	$_SESSION['genre'][$row['gno']]=array(
		//htmlspecialcharsでエンコードをした値をそれぞれに格納
		'genre_id' => htmlspecialchars($row['gno'],ENT_QUOTES, "UTF-8"),
		'genre_name' => htmlspecialchars($row['gname'], ENT_QUOTES, "UTF-8")
	);
}
	//配列の値を先頭から呼び出す
	foreach ($_SESSION['genre'] as $genre_id => $genre) {
    
		$genre_id = $genre['genre_id'];
		$genre_name =$genre['genre_name'];
		
		//値を表示する
		echo '<div class="button-skewed-item">'"<p>".$genre_id."".$genre_name."</p>"'</div>';
	
	}
	
}else{
//genreのセッションがある場合

	//genreのセッションに入っている配列の値を先頭から呼び出す
	foreach ($_SESSION['genre'] as $genre_id => $genre) {
    
		$genre_id = $genre['genre_id'];
		$genre_name =$genre['genre_name'];
		
		//リンクを張ったものを表示する
		echo '<div class="button-skewed-item">'"<p><a href=\"リンクを場所" . $genre_id . "\">"
		.$genre_id."".$genre_name."</a></p>"'</div>';
	
	}
}
	
echo'</div>';
?>
</body>
</html>
