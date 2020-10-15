<?php
// ファイルを開く
$openFile = fopen('./data/data.txt','r');

// ファイル内容を1行ずつ読み込んで出力
$output_array = array();
while($str = fgets($openFile)){

    // -----------------------------------------
    // 配列への追記の方法メモ
    // 
    // 1. 追加したい配列[] ＝ 要素
    // 2. array_push( 要素を追加する配列 , 追加したい要素1 [, 追加したい要素2 ] )
    // 3. 追加したい配列 = array_merge( 追加したい配列 [, 追加したい配列2... ] )
    // -----------------------------------------
    
    // str_replaceで改行を削除、すべての改行（CR/LF/CR+LF）に対応
    $output_array[] = str_replace(array("\r\n", "\r", "\n"), '', $str);
    
}

// PHP→Javascriptへのデータの受け渡し(JSON化する意味など未だ理解不足、要勉強）
$json = json_encode($output_array);  

// ファイルを閉じる
fclose($openFile);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <!--  JQuery：jQuery-Validation-Engine -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-ja.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js" type="text/javascript" charset="utf-8"></script>

    <title>VIEW</title>
</head>
<body>
    <h1>登録者の一覧</h1>
    <h2>現時点での登録状況</h2>
    <div id="time" style='font-size:5px;text-align:right; padding:10px'></div>

    <Table id="regist_lists" border="1" style="border-collapse: collapse">
        <tr>
            <th>No</th><th>氏名</th><th>Email</th><th>認知経路</th><th>動機</th><th>メモ</th><th>登録日時</th>
            <tr><td></td></tr>
        </tr>      
    </Table>

    
</body>

<!-- PHP→Javascriptへの変数受け渡し -->
<script type="text/javascript">

    // -----------------------------------------
    // PHP→Javascriptへの変数受け渡し
    // -----------------------------------------
    let values = <?php echo $json; ?>;

    for(let i=0 ; i< values.length ; i++){

        let v = values[i].split(",");
        let html = "<tr><td>"+i+"</td><td>"+v[0]+"</td><td>"+v[1]+"</td><td>"+v[2]+"</td><td>"+v[3]+"</td><td>"+v[4]+"</td><td>"+v[5]+"</td></tr>";
        $("#regist_lists").append(html);
    }

    // -----------------------------------------
    // 現在時刻表示用（以前の課題時の使いまわし)
    // -----------------------------------------
    function return_date_sec(target_date){
        let now = new Date(target_date);
        let year = now.getFullYear();
        let mon = ("0"+(now.getMonth() + 1)).slice(-2); 
        let day = ("0"+now.getDate()).slice(-2);
        let hour = ("0"+now.getHours()).slice(-2);
        let min = ("0"+now.getMinutes()).slice(-2);
        let sec = ("0"+now.getSeconds()).slice(-2);
        return year + "/" + mon + "/" + day + " " + hour + ":" + min + ":" + sec;
    }
    $(function(){
        setInterval(function(){
            $('#time').text(return_date_sec(new Date()));
        }, 1000);
    });

</script>

</html>
