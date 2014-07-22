<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../ref/css/header.css" type="text/css" charset="utf-8"/>
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
			echo '<div id="logo">';
			echo '<a href=index.php><img src="../ref/img/dul.png" alt="dulcis" width="300" height="150" ></a></div>';

			//echo '<p>ようこそ' . $user_name . 'さん。  ';
			//echo '保有ポイント:' . $user_pt .'</p>';

			echo '<div id="box" class="member_box"><p>ようこそ' . $user_name . 'さん。  保有ポイント： ' . $user_pt .'Pt</p>';
			echo '<form id="form" action="item_select.php" method="POST" class="search_bar">';
				echo '<input type="text" name="item_word" class="search_text""/>';
				echo '<input type="submit" value="検索" class="search_button"/>';
			echo '</form></div>';

			echo '<div id="tab"><a href=buy_history.php>購入履歴</a>';
			echo '<a href=user_info_edit.php>会員情報変更</a>';
			echo '<a href=logout.php>ログアウト</a>';
			echo '<a href=cart.php>カート</a></div>';

			echo '</div>';
		} else {
			//ログイン状態でない場合
			echo '<div id="header">';
			echo '<div id="logo">';
			echo '<a href=index.php><img src="../ref/img/dul.png" alt="dulcis" width="300" height="150" ></a></div>';

			echo '<div id="box" class="member_box"><p>ようこそ、ゲストさん</p><form id="form" action="item_select.php" method="POST" class="search_bar">';
				echo '<input type="text" name="item_word" class="search_text"/>';
				echo '<input type="submit" value="検索" class="search_button"/>';
			echo '</form></div>';

			echo '<div id="tab"><a href="login.php">ログイン</a>';
			echo '<a href="user_entry.php">会員登録</a>';
			echo '<a href="cart.php">カート</a></div>';



			echo '</div>';
		}
	?>
</body>
</html>