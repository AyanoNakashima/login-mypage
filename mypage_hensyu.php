    
<?php

mb_internal_encoding("utf8");

//セッションスタート
session_start();


//mypageからの導線以外は　login_error.phpへリダイレクトする

if(empty($_SESSION['id'])){
    header("Location:login_error.php");
}




?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<title>マイページ登録</title>
<link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
</head>
    
    <body>
        
        <header>
            <img src="4eachblog_logo.jpg"><div class="logout"><a href="log_out.php">ログアウト</a></div>
        </header>
        
    <main>
      <form action="mypage_update.php" method="post" enctype="multipart/form-data">
        
        <div class="form_contents">
        <h2>登録内容編集</h2>
        <div class="profile_pic">
             <img src="<?php echo $_SESSION['picture'];?>">
            </div>
            
         <div class="box"> 
             
             <div class="nakami">
                 
        <div class="name">
            <label>&nbsp;氏名：</label>
            <input type="text" class="formbox" size="30" value="<?php echo $_SESSION['name']; ?>" name="name" >
        </div>
            
        <div class="mail">
        <label>&nbsp;メール：</label>
            <input type="text" class="formbox" size="30" value="<?php echo $_SESSION['mail']; ?>" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >
        </div>

        <div class="password">
         <label>&nbsp;パスワード：</label>
            <input type="password" class="formbox" size="30" name="password" value="<?php echo $_SESSION['password']; ?>" pattern="^[a-zA-Z0-9]{6,}+$" >
        </div>
            </div>
            
            
        <div class="comments">
         <label>コメント</label><br>
            <textarea rows="5" cols="64" name="comments"><?php echo $_SESSION['comments']; ?> </textarea>
        </div>
            
             
        <div class="toroku">
        <input type="submit" class="submit_button" value="この内容に変更する"/>
             </div>
             
    
          
     
        
        </div>
                </div>

        </form>
        </main>
        
        
        
        
        
        
        
         <footer>©2018 InterNous.inc Allright reserved</footer>
    </body>
</html>

    