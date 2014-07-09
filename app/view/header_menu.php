<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<?php
		//セッションの開始（全ページに適用される）
		session_start();
		if (isset($_SESSION["user_mailadd"]) && isset($_SESSION["user_pw"])) {
			//ログイン状態の場合
			//セッションからデータを取得
			$user_name = $_SESSION['user_name'];
			$user_pt = $_SESSION['user_pt'];
			//表示処理
			echo '<div id="header">';
			echo '<a href=index.php>Dulcis</a>';
			echo '<p>ようこそ' . $user_name . 'さん。</p>';
			echo '<p>保有ポイント:' . $user_pt .'</p>';
			echo '<a href=cart.php>カート</a>';
			echo '<a href=buy_history.php>購入履歴</a>';
			echo '<a href=user_info_edit.php>会員情報変更</a>';
			echo '<a href=logout.php>ログアウト</a>';
			echo '<form id="form" action="item_select.php" method="POST">';
				echo '<input type="text" name="item_word" size="30"/>';
				echo '<input type="submit" value="検索" />';
			echo '</form>';
			echo '</div>';
		} else {
			//ログイン状態でない場合
			echo '<div id="header">';
			echo '<a href=index.php>Dulcis</a>';
			echo '<a href="login.php">ログイン</a>';
			echo '<a href="user_entry.php">会員登録</a>';
			echo '<a href="cart.php">カート</a>';
			echo '<form id="form" action="item_select.php" method="POST">';
				echo '<input type="text" name="item_word" size="30"/>';
				echo '<input type="submit" value="検索" />';
			echo '</form>';
			echo '<div id="hub">';
			echo '</div>';
			echo '</div>';
		}
	?>
</body>
</html>
