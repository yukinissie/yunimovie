<?php
$img_name = $_FILES['upimg']['name'];

//画像を保存
move_uploaded_file($_FILES['upimg']['tmp_name'], './upload/' . $img_name);

echo '<img src="img.php?img_name=' . $img_name . '">';