<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>

<?php
// �Z�b�V�����̊J�n
session_start();


if (!isset($_SESSION["genre"])){
//genre�̃Z�b�V�������Ȃ��ꍇ

	
//ini�t�@�C���������Ɓ@ini�t�@�C���Ƀf�[�^�x�[�X�̃A�N�Z�X�ł���悤�ɐݒ肵�Ă���
ini_set('include_path','/jyoko3dev/xampp/htdocs/app/classes/');
require_once('db.php');

// �f�[�^�̎擾 genre����f�[�^��gno���Ɍ���
$sql = "SELECT * FROM genre ORDER BY gno";
$result = mysqli_query($dbc,$sql);
mysqli_close($dbc);


// �擾�����f�[�^���ꗗ�\��
while($row = mysqli_fetch_array($result)){
	
	//�Z�b�V������2�����z��Ŋi�[
	$_SESSION['genre'][$row['gno']]=array(
		//htmlspecialchars�ŃG���R�[�h�������l�����ꂼ��Ɋi�[
		'genre_id' => htmlspecialchars($row['gno'],ENT_QUOTES, "UTF-8"),
		'genre_name' => htmlspecialchars($row['gname'], ENT_QUOTES, "UTF-8")
	);
}
	//�z��̒l��擪����Ăяo��
	foreach ($_SESSION['genre'] as $genre_id => $genre) {
    
		$genre_id = $genre['genre_id'];
		$genre_name =$genre['genre_name'];
		
		//�l��\������
		echo "<p>".$genre_id."".$genre_name."</p>";
	
	}
	
}else{
//genre�̃Z�b�V����������ꍇ

	//genre�̃Z�b�V�����ɓ����Ă���z��̒l��擪����Ăяo��
	foreach ($_SESSION['genre'] as $genre_id => $genre) {
    
		$genre_id = $genre['genre_id'];
		$genre_name =$genre['genre_name'];
		
		//�����N�𒣂������̂�\������
		echo "<p><a href=\"�����N���ꏊ" . $genre_id . "\">"
		.$genre_id."".$genre_name."</a></p>";
	
	}
}
	

?>
</body>
</html>
