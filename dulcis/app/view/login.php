<?php
 header("Content-type: text/html; charset=UTF-8");
  session_start();
  
  if(isset($_SESSION["mmail"])){
  	echo "ログインされています。";
  	
  	echo '<a href=header_menu.php>topへ戻る</a>';
	
	exit;
	
  }
  
  
  
?>
<html>
<head>
<title>ログイン</title></head>
<body>
<h1>ログイン</h1>
<form action="login_chk.php" method="post">
  
    

	<tr>
      <td>Eメールアドレス</td>
      <td><input type="text" name="user_mailadd" size="30" style="ime-mode: disabled;"/></td><br><br>
    
	  <td>パスワード</td>
      <td><input type="text" name="user_pw" size="20" maxlength="7" style="ime-mode: disabled;"></td><br><br>
        <td><input type="submit" value="ログイン"></td>
      </td>
    </tr>
  


</form>
</body>
</html>
