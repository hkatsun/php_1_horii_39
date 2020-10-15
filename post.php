<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="css/reset.css"> -->
    <link rel="stylesheet" href="css/style.css">

    <!--  JQuery：jQuery-Validation-Engine -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-ja.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js" type="text/javascript" charset="utf-8"></script>

    <title>REGIST</title>
</head>

<body>

    <h1>登録フォーム</h1>
    <h2>下記、必要事項にご記入いただき、送信ください。</h2>

    <form action="check.php" method="POST" id="messageform">

    <!-- ------------------------------------------------------ -->
    <!-- 未入力項目チェックの実装：各タグの「required」で実装のパターン  -->
    <!--  ※ クライアント実装（サーバ側でのチェックも必要らしい）         -->
    <!--                                                        -->
    <!--  text, option, textarea → requiredで実装可能、           -->
    <!--  checkbox → 自分でJS書く、jquery利用。                    -->
    <!--                                                        -->
    <!--  ※ jQuery：jQuery-Validation-Engine                    -->
    <!--  https://cdnjs.com/libraries/jQuery-Validation-Engine  -->
    <!--  参考サイト）https://allabout.co.jp/gm/gc/420327/2/      -->
    <!-- ------------------------------------------------------ -->

        <!-- text：名前 -->
        <div class="col">お名前
            <!-- <input type="text" name="name" class="form_parts"> -->
            <input type="text" name="name" class="form_parts" id='input_name'>
        </div>

        <!-- text：メルアド -->
        <div class="col">メールアドレス
            <!-- <input type="text" name="email" class="form_parts" required> -->
            <input type="text" name="email" class="form_parts" id='input_email' required>
        </div>

        <!-- option/ドロップリスト： 知るきっかけ-->
        <div class="col">チーズアカデミーを知ったきっかけ
            <!-- <select name="trigger" class="form_parts" required> -->
            <select name="trigger" class="form_parts" id='select_trigger' required>
                <option value="" hidden></option>
                <option value="1_google検索">google検索</option>
                <option value="2_SNS">SNS</option>
                <option value="3_紹介">紹介</option>
                <option value="4_たまたま通りかかった">たまたま通りかかった</option>
                <option value="5_その他">その他</option>
            </select>
        </div>
        
        <!-- checkbox：志望動機 -->
        <div class="col">志望動機
            <ul class="douki" style="list-style-type: none">
                <!-- <li><input type="checkbox" name="reason" value="1_startup" class = "validate[minCheckbox[1]]">起業したい</li>
                <li><input type="checkbox" name="reason" value="2_move" class = "validate[minCheckbox[1]]">チーズ系企業に就職・転職したい</li>
                <li><input type="checkbox" name="reason" value="3_career" class = "validate[minCheckbox[1]]">チーズと関わる仕事をしており、仕事に生かしたい</li>
                <li><input type="checkbox" name="reason" value="4_knowhow" class = "validate[minCheckbox[1]]">チーズの教養を身につけたい</li> -->
                <li><input type="checkbox" name="reason" id="check1" value="1_起業したい" class = "validate[minCheckbox[1]]">起業したい</li>
                <li><input type="checkbox" name="reason" id="check2" value="2_チーズ系企業に就職・転職したい" class = "validate[minCheckbox[1]]">チーズ系企業に就職・転職したい</li>
                <li><input type="checkbox" name="reason" id="check3" value="3_チーズと関わる仕事をしており、仕事に生かしたい" class = "validate[minCheckbox[1]]">チーズと関わる仕事をしており、仕事に生かしたい</li>
                <li><input type="checkbox" name="reason" id="check4" value="4_チーズの教養を身につけたい" class = "validate[minCheckbox[1]]">チーズの教養を身につけたい</li>
            </ul>
        </div>

        <!-- textaea：詳細 -->
        <div class="col">詳細
            <textarea name="detail" id="" cols="30" rows="10" class="form_parts" required></textarea>
        </div>

        <!-- 入力日時：hiddenとして実装、IPアドレスや緯度経度も実装できる？ -->
        <INPUT type="hidden" name="date" value="<?php echo date("Y-m-d H:i:s"); ?>" >

        <!-- [送信]ボタン -->
        <input type="submit" value="送信" clss="btn_submit">

    </form>

    <!--  JQuery：jQuery-Validation-Engine -->
    <script type="text/javascript">

        jQuery(document).ready(function(){
            jQuery("#messageform").validationEngine();
        });

     </script>

</body>
</html>