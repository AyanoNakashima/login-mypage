<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])){

    
try{
    
//DB接続    
$pdo=new PDO("mysql:dbname=phpkadai;host=localhost;","root","");
}catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインしてください。</p><a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
       );
}

//preparedステートメントでSQLをセット
$stmt=$pdo->prepare("select * from login_mypage where mail = ? && password = ?");
    
$stmt->bindValue(1,$_POST["mail"]);
$stmt->bindValue(2,$_POST["password"]);

//executeでクエリを実行
$stmt->execute();

//データベースを切断
$pdo=NULL;
    
while($row =$stmt->fetch()){
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}
if(empty($_SESSION['id'])){
    header("Location:login_error.php");
}

if(!empty($_POST['login_keep'])){
    $_SESSION['login_keep']=$_POST['login_keep'];
}
}

if(!empty($_SESSION['id'])&&!empty($_SESSION['login_keep'])){
    setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*60*24*7);
    setcookie('login_keep',$_SESSION['login_keep'],time()+60*60*24*7);
}else if(empty($_SESSION['login_keep'])){
    setcookie('mail',time()-1);
    setcookie('password',time()-1);
    setcookie('login_keep',time()-1);
}

    





?>



<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<title>マイページ登録</title>
<link rel="stylesheet" type="text/css" href="mypage.css">
</head>
    <body>
        <header><img src="4eachblog_logo.jpg">
        <div class="logout"><a href="log_out.php">ログアウト</a></div>
        </header>
    <main>
                    <form action="mypage_hensyu.php" method="post" class="form_center">

        <div class="box">
         <h2>会員情報</h2>
            
            <div class="hello">
             <?php echo "&nbsp;こんにちは！ ".$_SESSION['name']."さん。"; ?>
            </div>
            
            <div class="profile_pic">
             <img src="<?php echo $_SESSION['picture'];?>">
            </div>
            
            <div class="basic_info">
             <p>&nbsp;氏名:<?php echo $_SESSION['name']; ?></p>
             <p>&nbsp;メールアドレス:<?php echo $_SESSION['mail']; ?></p>
             <p>&nbsp;パスワード:<?php echo $_SESSION['password']; ?></p>
            </div>
            
            <div class="comments"><p>&nbsp;<?php echo $_SESSION['comments']; ?></p>
            </div>
            
            
             <input type="hidden" value="<?php echo rand(1,10);?>" name="form_mypage">
            
                <div class="toroku">
                <input type="submit" class="submit_button" size="35" value="編集する">
            </div>
           </form>
        
        </div>
     </main>
    
    <footer>©2018 InterNous.inc Allright reserved</footer>    
    
    
    </body>
</html>