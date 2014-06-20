<?php
session_start();

if (isset($_SESSION["mmail"]) && isset($_SESSION["mpass"])) {
		
		echo "現在" . $_SESSION["mname"] . "さんはログインしています。</br>";
		
		echo '<a href=index.php>Dulcis</a> / ';
	    
		echo '<a href=cart.php>カート</a> / ';
		
		echo '<a href=buy_history.php>購入履歴</a> / ';
		
		echo '<a href=cart.php>会員情報変更</a> / ';
		
		echo '<a href=logout_menu.php>ログアウト</a> / ';

	
      	echo '<form action = "item_select.php" method = "POST">';
      		echo '<input type="text" name="iname" size="30"/>';
			echo '<input type ="submit" value = "検索" name = "item"/>';
    	echo '</form>';

	
	}else {
		echo "現在はログインしていません。</br>";	

		echo '<a href=index.php>Dulcis</a> / ';
	    echo '<a href=cart.php>カート</a> / ';
		echo '<a href="http://localhost/app/view/login.php">ログイン</a>';

		echo '<form action = "item_select.php" method = "POST">';
      		echo '<input type="text" name="iname" size="30"/>';
			echo '<input type ="submit" value = "検索" name = "item"/>';
    	echo '</form>';


	}
?>

<html>
<head><title>header_menu.php</title></head>
<body>
<br>	
</body>
</html>
