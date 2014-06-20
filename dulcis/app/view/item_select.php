<?php
// セッションの開始

session_start();
header('Expires:-1'); 
header('Cache-Control:'); 
header('Pragma:'); 

// 接続設定
ini_set('include_path','/jyoko3dev/xampp/htdocs/app/classes/');
require_once('db.php');

// POSTに値があるときセッションに設定　
//issetは変数が設定されているかどうか　存在すればTRUE
if (!isset($_POST["iname"])) {
 //$_POST["iname"]に値が入ってないときセッションで調べるようにする
    $iname = "0";
} else {
	//POSTの値を$inameに入れる
    $iname = $_POST["iname"];
    $ino="0";
}


$var = $iname;

//変数が数字か文字かを調べる判定
$var_num = is_numeric($var);
if ($var_num == TRUE){
        
        //変数の値は数値として有効です
      	$kekka = "1";
      	$ino = $_GET['genre_id'];
      	
    }else{
        //変数の値は文字です
        $kekka = "2";
        $iname = "%".$_POST["iname"]."%";
    }

//結果が文字か数字で分岐
if($kekka === "2"){
//文字列の検索


	// 検索するデータの取得
	$sql = "SELECT * FROM item WHERE iname like '$iname' ";
	$result = mysqli_query($dbc,$sql);
	mysqli_close($dbc);


	// 取得したデータを一覧表示
	if(mysqli_num_rows($result) == 0){
			echo "該当する商品が見つかりませんでした。";
			echo "<p><a href=\"header_menu.php". "\">"."topに戻る"."</a></p>";
			exit;
	}else{
		while ($row = mysqli_fetch_array($result)) {
		echo "{$row["ino"]}：";
		echo "{$row["iname"]}"."<br>";
		echo "{$row["ico"]}"."<br>";
		}
		echo "<p><a href=\"header_menu.php". "\">"."topに戻る"."</a></p>";
	}
	
}else if($kekka==="1"){
//数字（セッションでの検索)
	// 検索するデータの取得
	$sql = "SELECT * FROM item WHERE ino = '$ino' ";
	$result = mysqli_query($dbc,$sql);
	mysqli_close($dbc);


	// 取得したデータを一覧表示
	while ($row = mysqli_fetch_array($result)) {
	echo "{$row["ino"]}：";
	echo "{$row["iname"]}"."<br>";
	echo "{$row["ico"]}"."<br>";
	}
	//top
	echo "<p><a href=\"left_menu.php". "\">"."top画面に戻る"."</a></p>";

	
}else{
	echo "エラー、もう一度最初からお願いします。";
}




?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>商品検索</title>
</head>
<body>

</body>
</html>