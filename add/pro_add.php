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
    <title>商品追加</title>
</head>

<body>

    商品追加<br>
    <br>

    <form method="post" action="pro_add_check.php" enctype="multipart/form-data">
        商品名を入力してください。<br>
        <input type="text" name="name" style="width:200px"><br>
        価格を入力してください。<br>
        <input type="text" name="price" style="width:50px"><br>
        <br>
        画像を選んでください。<br>
        <input type="file" name="gazou" style="width:400px"><br>

        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>


</body>

</html>