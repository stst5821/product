<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/5b114103c4.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>スタッフ追加</title>
</head>

<body>

    <?php
    $pro_code = $_POST['code'];
    $pro_name = $_POST['name'];
    $pro_price = $_POST['price'];
    $pro_gazou_name_old = $_POST['gazou_name_old'];
    $pro_gazou = $_FILES['gazou'];

    $pro_code = htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
    $pro_name = htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
    $pro_price = htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

    if($pro_gazou['size'] > 0) 
    {
    
        if($pro_gazou['size'] > 1000000) 
        {
            print '画像サイズが多きすぎます。';
        }
        else 
        {
            // アップロードされたファイルを、画像フォルダに移動する。
            move_uploaded_file($pro_gazou['tmp_name'],'../gazou/'.$pro_gazou['name']);
            print'<img src="../gazou/'.$pro_gazou['name'].'">';
            print'<br>';
        }
    }    

if($pro_name=='')
{
    print'商品名が入力されていません。<br>';

} else {
    print'商品名:';
    print $pro_name;
    print '<br>';
}

if(preg_match('/\A[0-9]+\z/',$pro_price)==0)
{
    print '価格をきちんと入力してください';
} 
else 
{
    print'価格:';
    print $pro_price;
    print '<br>';
}

if($pro_name=='' || preg_match('/\A[0-9]+\z/',$pro_price)==0 || $pro_gazou['size'] > 1000000)
{
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
} 
else 
{
    print '上記のように変更します。<br>';
    print '<form method="post" action="pro_edit_done.php">';
    print '<input type="hidden" name="code" value="'.$pro_code.'">';
    print '<input type="hidden" name="name" value="'.$pro_name.'">';
    print '<input type="hidden" name="price" value="'.$pro_price.'">';
    print '<input type="hidden" name="gazou_name_old" value="'.$pro_gazou_name_old.'">';
    print '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
    print '<br>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type ="submit" value="OK">';
    print '</form>';
}


?>

</body>

</html>