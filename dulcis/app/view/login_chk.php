<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php
 //<--追加  
mb_internal_encoding("utf-8"); //<--追加  
mb_http_input("auto"); //<--追加  
mb_http_output("utf-8"); //<--追加

session_start();

// 接続設定
$dbtype = "mysql";
$sv = "localhost";
$dbname = "dtest";
$user = "root";
$pass = "";

$mmail = $_POST['user_mailadd'];
$mpass = $_POST['user_pw'];

$_SESSION['mmail'] = $mmail;
$_SESSION['mpass'] = $mpass;

if (isset($_POST["user_mailadd"])) {
    echo $_POST["user_mailadd"];
	echo $_POST["user_pw"]."<br>";
	
	echo "if文の中には入ってます<br>";


 
// データベースに接続
$dsn = "$dbtype:dbname=$dbname;host=$sv";


	try {
		
		echo $mmail;
		echo $mpass."<br>";


		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	


		$sql="SELECT * FROM member where (mmail =:mmail) and (mpass =:mpass);";

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(":mmail", $mmail);
		$stmt->bindParam(":mpass", $mpass);
		$stmt->execute();
		$row = $stmt->fetch();
		$_SESSION["mno"] = $row['mno'];
		$_SESSION["mpass"] = $row['mpass'];
		$_SESSION["mname"] = $row['mname'];
		$_SESSION["mmail"] = $row['mmail'];
		$_SESSION["mpost"] = $row['mpost'];
		$_SESSION["maddress"] = $row['maddress'];
		$_SESSION["mtel"] = $row['mtel'];
		$_SESSION["mpt"] = $row['mpt'];
		$_SESSION["mcard"] = $row['mcard']; 

	if($row != 0){
		
    	header( "Location: http://localhost/app/view/header_menu.php" );
  	}
  	else {
    	header( "Location: http://localhost/app/view/login.php" );

  	}

	}catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
}else{
	echo "表示できません";
}

?>
</body>
</html>

