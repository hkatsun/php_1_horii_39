<?php

    $name = $_POST['name'];
    $mail = $_POST['email'];
    $trigger = $_POST['trigger'];
    $reason = $_POST['reason'];
    $detail = $_POST['detail'];
    $date = $_POST['date'];

    $name = htmlspecialchars($namae, ENT_QUOTES);
    $mail = htmlspecialchars($mail, ENT_QUOTES);
    $trigger = $_POST['trigger'];
    $reason = $_POST['reason'];
    $detail = htmlspecialchars($detail, ENT_QUOTES);
    $date = $_POST['date'];

    $errmsg_1 = '';
    $errmsg_2 = '';
    $errmsg_3 = '';

    if($name==''){
        $errmsg_1 = '<div>お名前を入力ください。</div>';
    }
    if($mail==''){
        $errmsg_2 = '<div>メールアドレスを入力ください</div>';
    }
    if($mail==''){
        $errmsg_3 = '<div>コメントを入力ください</div>';
    }

?>


<html>

<head>
    <meta charset="utf-8">
    <title>確認画面</title>
</head>

<body>

    <h1>こちらで書き込みますがよろしいでしょうか？</h1>

    <div>お名前：<?php echo $name; ?></div>
    <div>メルアド：<?php echo $mail; ?></div>
    <div>きっかけ：<?php echo $trigger; ?></div>
    <div>志望動機：<?php echo $reason; ?></div>
    <div>詳細：<?php echo $detail; ?></div>
    <div>現在時刻：<?php echo $date; ?></div>

    <ul>
        <li><a href="post.php">戻る</a></li>
    </ul>

</body>

</html>
