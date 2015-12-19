<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

<style type="text/css">
.centered { margin: 0 auto; }
#masonry{
    border:1px solid #dadada;
}
.item {
    margin: 5px;
    padding: 5px;
    background: #D8D5D2;
    float: left; 
}
.item { width: 200px; }	
</style>
<link rel="stylesheet" type="text/css" href="xx.css">

<script src="jquery-2.1.3.js"></script>
<script src="masonry.pkgd.js"></script>
<script>
  $(function(){
    $('#masonry').masonry({
      itemSelector: '.item',
      //columnWidth: 200 //一列の幅サイズを指定
    });
  });
</script>
</head>


<body>

<?php
include 'x2.php';
?>

	
</body>
</html>