<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>商品情報登録画面</title>
</head>
<body>
	<?php
		//データベースに接続
		ini_set('include_path', '/xampp/htdocs/app/classes/');
		require_once('db.php');
		require_once('session_start.php');
		echo '<p>会員情報登録画面</p>';
		if(isset($_SESSION['user_id'])) {
			//ユーザがログインしている場合（ログイン状態時）
			if(isset($_POST['fase1']) || isset($_POST['fase2']) || isset($_POST['fase3'])) {
				//確認ボタン、変更ボタン、登録ボタンが押されたとき
				//フォームからデータの取得
				$item_name = $_POST['item_name'];
				$genre_no = $_POST['genre_no'];
				$item_price = $_POST['item_price'];
				$item_sum = $_POST['item_sum'];
				$item_co = $_POST['item_co'];
				//画像データ
				$item_img = $_FILES['item_img'];
				//一時ファイル
				$tmp_name = $item_img['tmp_name'];
				
				//フォームに入力されたデータの判定
				if(/*empty($user_name) || empty($user_mailadd) 
					|| empty($user_pw) || empty($user_post) 
					|| empty($user_add) || empty($user_tel) 
					|| empty($user_card) */isset($item_name) && isset($genre_no) 
					&& isset($item_price) && isset($item_sum) 
					&& isset($item_co) && isset($item_co) 
					&& isset($item_img) && isset($tmp_name)/* || isset($user_name{21}) 
					|| isset($user_mailadd{41}) || isset($user_pw{16}) 
					|| isset($user_post{9}) || isset($user_add{101}) 
					|| isset($user_tel{14}) || isset($user_card{17})*/) {
					//通常時
					$flg = 0;
				} else {
					//入力項目に誤りがある場合
					$flg = 1;
				}
				
				if(isset($_POST['fase1'])) {
					//確認ボタンが押されたとき
					
					//セッションデータから該当するジャンル名を取得
					
					
					
					echo '<p>以下の内容で登録します。よろしいですか？</p>';
					echo '<form action="user_entry.php" method="POST">';
						echo '<p>氏名：' . $user_name . '<input type="hidden" name="user_name" value="' . $user_name . '" /></p>';
						echo '<p>メールアドレス：' . $user_mailadd . '<input type="hidden" name="user_mailadd" value="' . $user_mailadd . '" /></p>';
						echo '<p>パスワード：' . $user_pw . '<input type="hidden" name="user_pw" value="' . $user_pw . '" /></p>';
						echo '<p>郵便番号：' . $user_post . '<input type="hidden" name="user_post" value="' . $user_post . '" /></p>';
						echo '<p>住所：' . $user_add . '<input type="hidden" name="user_add" value="' . $user_add . '" /></p>';
						echo '<p>電話番号：' . $user_tel . '<input type="hidden" name="user_tel" value="' . $user_tel . '" /></p>';
						echo '<p>クレジットカード番号：' . $user_card . '<input type="hidden" name="user_card" value="' . $user_card . '" /></p>';
						echo '<input type="submit" value="変更" name="fase2" />';
						echo '<input type="submit" value="登録" name="fase3" />';
					echo '</form>';
				} else if(isset($_POST['fase2']) || $flg == 1) {
					//変更ボタンが押されたとき、または入力項目に誤りがあった場合
					if($flg == 1) {
						//入力項目に誤りがあった場合
						echo '<p>入力項目に誤りがあります。</p>';
					} else {
						
					}
					echo '<form action="user_entry.php" method="POST">';
						echo '<p>氏名：<input type="text" name="user_name" value="' . $user_name . '" maxlength="" required /></p>';
						echo '<p>メールアドレス：<input type="text" name="user_mailadd" value="' . $user_mailadd . '" maxlength="" required /></p>';
						echo '<p>パスワード：<input type="password" name="user_pw" maxlength="" required /></p>';
						echo '<p>パスワード（確認）：<input type="password" name="user_pwch" maxlength="" required /></p>';
						echo '<p>郵便番号：<input type="text" name="user_post" value="' . $user_post . '" maxlength="" required /></p>';
						echo '<p>住所：<input type="text" name="user_add" value="' . $user_add . '" maxlength="" required /></p>';
						echo '<p>電話番号：<input type="text" name="user_tel" value="' . $user_tel . '" maxlength="" required /></p>';
						echo '<p>クレジットカード番号：<input type="text" name="user_card" value="' . $user_card . '" maxlength="" required /></p>';
						echo '<input type="submit" value="確認" name="fase1" />';
						echo '<input type="reset" value="リセット" />';
					echo '</form>';
				} else if(isset($_POST['fase3'])) {
					//登録ボタンが押されたとき
					
					//通常時の処理
					//SQL文格納（INSERT）（※実装時はテーブル名の修正が必要）
					$query = "INSERT INTO item(iname, gno, iprice, isum, ico) 
							VALUE ('$item_name', '$genre_no', '$item_price', '$item_sum', '$item_co')";
					//SQL文実行
					$result = mysqli_query($dbc, $query);
					
					//自分自身を検索
					$query = "SELECT iname FROM item WHERE iname = '$item_name'";
					$result = mysqli_query($dbc, $query);
					
					//データベースとの接続を切断
					mysqli_close($dbc);
					//商品の登録ができているかの確認
					if(!mysqli_num_rows($result) == 1) {
						//insert処理失敗時の処理
						echo 'データの登録に失敗しました。しばらくお待ちの上再度お試し下さい。<br />';
					} else {
						//処理完了とお知らせ
						echo '<p>商品情報の登録が完了しました。</p>';
					}
					//トップ画面へのリンク
					echo '<a href="admin.php">トップへ戻る</a>';
				}
			} else {
				//初回アクセス時
				echo '<form action="item_insert.php" method="POST" enctype="multipart/form-data">';
					echo '<p>商品名：<input type="text" name="item_name" maxlength="" required /></p>';
					echo '<p>ジャンル：<select name="genre_no">';
							foreach($_SESSION['genre'] as $genre_no => genre) {
								$genre_no = $genre['genre_no'];
								$genre_name = $genre['genre_name'];
								echo '<option value="' . $genre_no . '">';
								echo $genre_name;
								echo '</option>';
							}
					echo '</select></p>';
					
					echo '<p>単価（税込）：<input type="text" name="item_price" maxlength="" required /></p>';
					echo '<p>在庫数：<input type="text" name="item_sum" maxlength="" required /></p>';
					echo '<p>商品詳細情報：<textarea name="item_co" rows="4" cols="40">商品の情報を入力してください。</textarea></p>';
					echo '<p>商品画像：<input type="file" name="item_img" required /></p>';
					echo '<input type="submit" value="確認" name="fase1" />';
					echo '<input type="reset" value="リセット" />';
				echo '</form>';
			}
		} else {
			//ユーザがログアウト状態であるとき（ログアウト状態時）
			echo '<p>管理者でないため、この操作を行うことができません。</p>';
			echo '<a href="index.php">トップへ戻る</a>';
		}
	?>
</body>
</html>
