<?php

    // -----------------------------------------
    // HTMLの[POSTメソッド]でのデータの受け渡し
    // （FORMタグの中身しか送ることができない？ 要勉強ポイント）
    // 
    $name = $_POST['name'];
    $mail = $_POST['email'];
    $trigger = $_POST['trigger'];
    $reason = $_POST['reason'];
    $detail = $_POST['detail'];
    $date = $_POST['date'];

    // ----------------------------------------
    // ファイルの読み書き時のパラメータのメモ
    // 
    // r  : read  only
    // w  : write only (内容削除、ファイルなければ作成) 
    // a  : add   only (ファイルなければ作成）
    //
    // r+ : read / wirte
    // w+ : write/ read (内容削除、ファイルなければ作成) 
    // a+ : add  / read (ファイルなければ作成）
    // ----------------------------------------

    $file = fopen('./data/data.txt','a+');
    $str_add = $name.",".$mail.",".$trigger.",".$reason.",".$detail.",".$date."\n";
    fwrite($file, $str_add);
    fclose($file);

?>

<html>

<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>

<body>

    <h1>登録完了</h1>
    <h2>登録しました。</h2>
    <H3>ご連絡をお待ちください。ありがとうございました。</h3>
    <ul>
        <li><a href="post.php">戻る</a></li>
        <li><a href="read.php">登録状況を見る</a></li>
    </ul>
</body>

<!-- 用済みのlocalStorageは中身を削除しておく -->
<script type="text/javascript">
    localStorage.clear();
</script>

</html>
