<?php
$path=$_POST['item'];
unlink($path);
echo "消去しました";
?>