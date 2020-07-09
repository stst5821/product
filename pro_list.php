<?php
session_start();
session_regenerate_id(true); // 合言葉を変える
if(isset($_SESSION['login'])==false)
{
    print 'ログインされていません<br>';
    print'<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}
else
{
    print $_SESSION['staff_name'];
    print 'さんログイン中<br>';
    print '<br>';
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/5b114103c4.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <?php

try {

    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = '1234';
    $dbh = new PDO ($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'select code,name,price from mst_product where 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbn = null;

    print '商品一覧<br><br>';

    print'<form method="post" action="pro_branch.php">';

    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($rec==false)
        {
        break;
        }
        print'<input type="radio" name="procode" value=" '.$rec['code'].' ">';
        print $rec['name'].'---';
        print $rec['price'].'円';
        print '<br>';
    }
    print'<input type="submit" name="disp" value="参照">';
    print'<input type="submit" name="add" value="追加">';
    print'<input type="submit" name="edit" value="修正">';
    print'<input type="submit" name="delete" value="削除">';
    print'</form>';

}
catch(Exception $e) 
{
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>

    <br>
    <a href="../staff_login/staff_top.php">トップメニューへ</a>

</body>

</html>