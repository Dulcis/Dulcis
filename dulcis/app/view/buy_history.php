<?php
// セッションの開始

session_start();
header('Expires:-1'); 
header('Cache-Control:'); 
header('Pragma:'); 

 $user_id = $_SESSION['mno'];


// セッションに値があれば会員である
//issetは変数が設定されているかどうか　存在すればTRUE
if (!isset($user_id)) {
//会員ではない(値がNULLである)
    $kaiin = "0";
} else {
//会員である(値がNULLではない)
    $kaiin = "1";
}



//結果が会員か非会員で分岐

if($kaiin === "1"){
//会員の場合

	// 接続設定
	ini_set('include_path','/jyoko3dev/xampp/htdocs/app/classes/');
	require_once('db.php');

	// 検索するデータの取得　4つ結合する
	$sql = "SELECT * FROM item I INNER JOIN genre G ON I.gno = G.gno
			INNER JOIN line L ON l.ino = I.ino
			INNER JOIN buy B ON l.ono = B.ono
			where B.mno = $user_id;";
	$result = mysqli_query($dbc,$sql);
	mysqli_close($dbc);


	// 取得したデータを一覧表示
	if(mysqli_num_rows($result) == 0){
			echo "購入履歴がありません。";
			echo "<p><a href=\"rireki.php". "\">"."topに戻る"."</a></p>";
			exit;
	}else{
		while($row = mysqli_fetch_array($result)){
		$iname	= "{$row["iname"]}";
		$gname	= "{$row["gname"]}";
		$iprice	= "{$row["lprice"]}";
		$lsum	= "{$row["lsum"]}";
		$lpt	= "{$row["lpt"]}";
		$odate	= "{$row["odate"]}";
		$ino	= "{$row["ino"]}";
		$gno	= "{$row["gno"]}";
		
	
		//リンクを張ったものを表示し、商品のidの値を送信する
		echo "商品名："."<a href=\"item.php"."?ino=".$ino."\">"
		.$iname."</a><br>";
		
		//リンクを張ったものを表示し、商品のidの値を送信する
		echo "ジャンル名："."<a href=\"item.php"."?gno=".$gno."\">"
		.$gname."</a><br>";		
		
		echo "購入価格：".$iprice."<br>";
		echo "購入数量：".$lsum."<br>";
		echo "発生ポイント：".$lpt."<br>";
		echo "購入日：".$odate."<br>";
		
		echo "<br>"."<br>";
		
		}
		echo "<p><a href=\"header_menu.php". "\">"."topに戻る"."</a></p>";
	}
	
}else if($kaiin ==="0"){
//数字（セッションでの検索)
	echo "会員専用ページとなっております。".
	"ログインしてもう一度アクセスしてください。";

	//top
	echo "<p><a href=\"login.php". "\">"."top画面に戻る"."</a></p>";

	
}else{
	echo "エラー、もう一度最初からお願いします。";
	echo "<p><a href=\"login.php". "\">"."top画面に戻る"."</a></p>";

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