<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<h4>みなさまのTwitterから</h4>
<div id="masonry" class="row">

<?php
$mysqli = new mysqli("localhost", "root", "sy2h55", "wordpress");
$sql = 'select user_screen_name, user_image_url, user_text, created_at, media_url 
		from tweet where p_id= 1' .
		' and del is null order by created_at desc limit 100';
$res0 = $mysqli->query($sql);

while ($res1 = $res0->fetch_object()) :

echo "<pre>";
print_r($res1);
echo "</pre>";

	$usrScreen = $res1->user_screen_name;

	$str = $res1->user_text;
	$regex = '/^(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/';
	preg_match_all('|http://\w+(?:-\w+)*(?:\.\w+(?:-\w+)*)+(?::\d+)?(?:[/\?][\w%&=~\-\+/;\.\?]*(?:#[^<\s>]*)?)?|', $str, $m);
	foreach ($m as $v1) {
		foreach ($v1 as $v2) {
			$form = '<a href="'. $v2 .'">' . $v2 . '</a>';
			$str = str_replace($v2, $form, $str);
		}
	}
		
	$formatted_date = date('Y-m-d H:i', strtotime($res1->created_at));
?>

<div class="item_wrap col-lg-3 col-md-3 col-sm-5 col-xs-12">
<div class="item">

<div class="item_photo">
<a target="_blank" href="<?php echo $res1->media_url; ?>">
<img alt="" src="<?php echo $res1->media_url; ?>" /></a>
</div>

<div class="item_text">
<p><?php echo $str; ?> </p>
</div>

<dl>
<dt>
	<a target="_blank" href="http://twitter.com/<?php echo $usrScreen; ?>">
	<img class="twimg" width="48" height="48" alt="<?php echo $usrScreen; ?>" src="<?php echo $res1->user_image_url; ?>">
</a>
</dt>
<dd class="small">
	<a target="_blank" href="http://twitter.com/<?php echo $usrScreen; ?>">@<?php echo $usrScreen; ?></a>
</dd>
<dd class="small"><?php echo $formatted_date; ?></dd>
</dl>

</div>
</div>

<?php 
endwhile;
$res0->close();
$mysqli->close(); 
?>
</div><!-- .row -->


	
</body>
</html>