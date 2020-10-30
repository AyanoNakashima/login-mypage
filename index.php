
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<title>ログイン画面</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
    
    
    <?php 
mb_internal_encoding("utf8");

$pdo=new PDO("mysql:dbname=ayano;host=localhost;","root","");

$stmt=$pdo->query("select*from 4each_keijiban");
    
setcookie(name,"",time()+60*60*24*7);
echo $_COOKIE['name'];

session_start();

if(empty($_SESSION['name'])){
    echo "入力して下さい"
}

session_destroy();

$pass='PASS1234';
$mail='yamada@yahoo.co.jp'

if(preg_match("/[a-z0-9._%+-]+@[a-z0-9.-]+￥.[a-z]{2,3}$/",$mail)){
    echo '正しいメールアドレスです';
}else{
    echo 'メールアドレスを正しく入力してください';
}

if(preg_match("/^[a-zA-Z0-9]{6,8}+$/",$mail)){
    echo '正しいpassです';
}else{
    echo 'passwordを正しく入力してください';
}


    ?>