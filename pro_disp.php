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

    $pro_code = $_GET['procode']; //pro_listのinputラジオボタンで選択したスタッフ名のスタッフコードをここに入れている。

    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = '1234';
    $dbh = new PDO ($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'select name,price from mst_product where code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $pro_code; // $data[]を code=? の?に入れる。
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $pro_name = $rec['name'];
    $pro_price = $rec['price'];

    print_r($rec);
    print_r($rec['price']);

    $dbn = null;

}
catch(Exception $e) 
{
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>

    商品情報参照<br>
    <br>
    商品コード<br>
    【 <?php print $pro_code; ?> 】
    <br>
    商品名<br>
    <?php print $pro_name; ?>
    <br>
    価格<br>
    <?php print $pro_price; ?>
    <br>
    <br>

    <form>
        <input type="button" onclick="history.back()" value="戻る">
    </form>

</body>

</html>