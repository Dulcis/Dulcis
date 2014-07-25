<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>会員情報登録画面</title>
</head>
<body>
	<?php
		//データベースに接続
		ini_set('include_path', '/xampp/htdocs/app/classes/');
		require_once('db.php');
		require_once('session_start.php');
		echo '<p>ジャンル情報登録画面</p>';
		if(isset($_SESSION['user_id'])) {
			//ユーザがログインしている場合（ログイン状態時）
			if(isset($_POST['fase1']) || isset($_POST['fase2']) || isset($_POST['fase3'])) {
				//確認ボタン、変更ボタン、登録ボタンが押されたとき
				//フォームからデータの取得
				$genre_name = $_POST['genre_name'];
				
				//フォームに入力されたデータの判定
				if(isset($genre_name)) {
					//通常時
					$flg = 0;
				} else {
					//入力項目に誤りがある場合
					$flg = 1;
				}
				
				if(isset($_POST['fase1'])) {
					//確認ボタンが押されたとき
					echo '<p>以下の内容で登録します。よろしいですか？</p>';
					echo '<form action="genre_entry.php" method="POST">';
						echo'<p>ジャンル名：' . $genre_name . '<input type="hidden" name="genre_name" value="' . $genre_name . '" /></p>';
						echo'<input type="submit" value="変更" name="fase2" />';
						echo'<input type="submit" value="登録" name="fase3" />';
					echo'</form>';
				} else if(isset($_POST['fase2']) || $flg == 1) {
					//変更ボタンが押されたとき、または入力項目に誤りがあった場合
					if($flg == 1) {
						//入力項目に誤りがあった場合
						echo'<p>入力項目に誤りがあります。</p>';
					} else {
						
					}
					echo '<form action="genre_entry.php" method="POST">';
						echo'<p>ジャンル名：<input type="text" name="genre_name" value="' . $genre_name . '" maxlength="" required /></p>';
						echo'<input type="submit" value="確認" name="fase1" />';
						echo'<input type="reset" value="リセット" />';
					echo'</form>';
				} else if(isset($_POST['fase3'])) {
					//登録ボタンが押されたとき
					//通常時の処理
					//SQL文格納（INSERT）（※実装時はテーブル名の修正が必要）
					$query = "INSERT INTO genre(gname) VALUE ('$genre_name')";
					//SQL文実行
					$result = mysqli_query($dbc, $query);
					
					//自分自身を検索
					$query = "select gname from genre where gname = '$genre_name'";
					$result = mysqli_query($dbc, $query);
					
					//データベースとの接続を切断
					mysqli_close($dbc);
					//会員登録ができているかの確認
					if(!mysqli_num_rows($result) == 1) {
						//insert処理失敗時の処理
						echo 'データの登録に失敗しました。しばらくお待ちの上再度お試し下さい。<br />';
					} else {
						//処理完了とお知らせ
						echo'<p>ジャンル情報の登録が完了しました。</p>';
						echo'<p>トップページへ戻り、ログインしてください。</p>';
					}
					//トップ画面へのリンク
					echo'<a href="top.php">トップへ戻る</a>';
				}
			} else {
				//初回アクセス時
				echo '<form action="genre_entry.php" method="POST">';
					echo'<p>氏名：<input type="text" name="genre_name" maxlength="" required /></p>';
					echo'<input type="submit" value="確認" name="fase1" />';
					echo'<input type="reset" value="リセット" />';
				echo'</form>';
			}
		} else {
			//ユーザがログイン状態でないとき（ログアウト状態時）
			echo '<p>ログイン状態でないため、この操作を行うことができません。</p>';
			echo '<a href="index.php">トップへ戻る</a>';
		}
	?>
</body>
</html>
