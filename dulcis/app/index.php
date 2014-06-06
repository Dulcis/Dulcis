<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"　"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<script type="text/javascript" src="../ref/js/jquery-1.2.6.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../ref/js/slideshow.js" charset="UTF-8"></script>
<script src="../ref/js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../ref/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="../ref/js/jquery.validationEngine-ja.js" type="text/javascript" charset="utf-8"></script>
<script src="../ref/js/accordion.js" type="text/javascript" charset="utf-8"></script>
<script src="../ref/js/form.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="../ref/css/validationEngine.jquery.css" type="text/css" charset="utf-8"/>
<link rel="stylesheet" href="../ref/css/shop.css" type="text/css" charset="utf-8"/>

<title>Dulcis</title>
</head>
<body>

<h2><a href="#"><img src="#" width="800" height="100" alt="#" /></a></h2>


<?php set_include_path(get_include_path().PATH_SEPARATOR.dirname(__FILE__));?>
<?php include '/left_menu.php';?>
<div id="main">
<div id="slideshow">
    <img src="../ref/img/image1.jpg" alt="Slideshow Image 1" class="active" />
    <img src="../ref/img/image4.jpg" alt="Slideshow Image 2" />
    <img src="../ref/img/image3.jpg" alt="Slideshow Image 3" />
    <img src="../ref/img/image4.jpg" alt="Slideshow Image 4" />
</div>
</div>

<?php include '/../class/ranking.php';?>


<dl class="accordion">
    <dt>Q質問</dt>
    <dd>A答え</dd>
    <dt>Q同時に</dt>
    <dd>A複数個</dd>
    <dt>Q開けないように</dt>
    <dd>Aなってます</dd>
    <dt>タイトル４</dt>
    <dd>サンプルテキスト</dd>
</dl>

</body>
</html>