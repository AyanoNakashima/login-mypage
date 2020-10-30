    
<?php

mb_internal_encoding("utf8");



$pdo=new PDO("mysql:dbname=phpkadai;host=localhost;","root","");
$result=$pdo->query("select image from img_upload;");

foreach ($result as $row){
    $upload_img=$row['image'];
}

image_path="./imafe/".$uploaded_img;

?>


<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<title>画像アップロード</title>
</head>
<body>
<img src="<?php echo $image_path;?>">
