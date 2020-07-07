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

    $staff_code = $_GET['staffcode']; //staff_listのinputラジオボタンで選択したスタッフ名のスタッフコードをここに入れている。

    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = '1234';
    $dbh = new PDO ($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'select name from mst_staff where code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_code; // $data[]を code=? の?に入れる。
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $staff_name = $rec['name'];

    $dbn = null;

}
catch(Exception $e) 
{
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>

    スタッフ削除<br>
    <br>
    スタッフコード<br>
    【 <?php print $staff_code; ?> 】
    <br>
    スタッフ名<br>
    【 <?php print $staff_name; ?> 】
    <br>
    このスタッフを削除してよろしいですか？<br>
    <br>

    <form method="post" action="staff_delete_done.php">
        <input type="hidden" name="code" value="<?php print $staff_code; ?>">

        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">

    </form>

</body>

</html>