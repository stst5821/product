<?php

session_start();
session_regenerate_id(true); // 合言葉を変える
if(isset($_SESSION['login'])==false)
{
    print 'ログインされていません<br>';
    print'<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}

// 参照

if(isset($_POST['disp']) == true) {

    if(isset($_POST['procode'])==false)
    {
        header('location:pro_ng.php');
        exit();
    }
    $pro_code = $_POST['procode'];
    header('location:pro_disp.php?procode='.$pro_code);
    exit();
}

// 追加

if(isset($_POST['add']) == true) {
    
    header('location:add/pro_add.php');
    exit();
    
}

// 修正

if(isset($_POST['edit']) == true) {

    if(isset($_POST['procode'])==false)
    {
        header('location:pro_ng.php');
        exit();
    }
    $pro_code = $_POST['procode'];
    header('location:edit/pro_edit.php?procode='.$pro_code);
    exit();
}

// 削除

if(isset($_POST['delete']) == true) {

    if(isset($_POST['procode'])==false)
    {
        header('location:pro_ng.php');
        exit();
    }
    $pro_code = $_POST['procode'];
    header('location:delete/pro_delete.php?procode='.$pro_code);
    exit();
    
}



?>