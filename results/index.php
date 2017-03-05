<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head> 
<meta charset=utf-8 /> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>MCI全国決勝 結果発表</title>   

<!-- Bootstrap -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/my.css" rel="stylesheet">

<!-- Viewportの設定 -->
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, minimum-scale=0.5 , maximum-scale=2">

     
<!-- IE向けの設定 -->
<!--[if IE]> 
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
// 初期表示
$(function(){
    // 初期表示でチェックボックスが空だったら非表示エリアを隠す
    if ($('#check1').val() != '1') {
        $('.hide_area1').hide();
    }

    if ($('#check2').val() != '1') {
        $('.hide_area2').hide();
    }

    if ($('#check3').val() != '1') {
        $('.hide_area3').hide();
    }

    if ($('#check4').val() != '1') {
        $('.hide_area4').hide();
    }

    if ($('#check5').val() != '1') {
        $('.hide_area5').hide();
    }
});
// 表示/非表示
var speed = 4000; //表示アニメのスピード（ミリ秒）
var stateDeliv = 1;
function hideToggle(hidearea) {
    hidearea.toggle(speed);
}
</script>

<style>
<!--
-->       
</style>

</head> 

<body>


 <section class="container">
  <div class="row">
    <div id="wrapper" class="col-sm-12 col-xs-12">

    <div class="col-md-6 col-md-offset-4">
        <img src="../image/header_logo.png" class="img-responsive headerlogo" alt="MONO COTO INNOVATION 2016">
    </div><!--col-md-6-->

    <div id="contents" class="col-sm-12 col-xs-12">

<?php

header('Content-Type: text/html; charset=UTF-8');

define("TOTAL_TEAM_NUM", 10);

$category_array=array(
  "ニーズ性",
  "着眼点",
  "独創性",
  "挑戦性"
  );

error_reporting(E_ALL);
ini_set("display_errors", 1);

$rank = 1;

?>

<div class="checkbox">
    <label>
         <input id="check3" type="button" class="btn btn-default" value="3位" onclick="hideToggle($('.hide_area3'));">
    </label>
    <label>
         <input id="check2" type="button" class="btn btn-default" value="2位" onclick="hideToggle($('.hide_area2'));">
    </label>
    <label>
         <input id="check1" type="button" class="btn btn-default" value="1位" onclick="hideToggle($('.hide_area1'));">
    </label>
</div>

<table class="brwsr2">
    <tbody>
    <tr>
      <th class="notlast">#</th>
      <th class="notlast">Team</th>
<?php
      echo '<th class="notlast">'.$category_array[0].'</th>';
      echo '<th class="notlast">'.$category_array[1].'</th>';
      echo '<th class="notlast">'.$category_array[2].'</th>';
      echo '<th class="notlast">'.$category_array[3].'</th>';
?>
      <th class="last">合計</th>
    </tr>
    <tbody>


<?php

require_once('vendor/autoload.php');

$G_CLIENT_ID = 'xxxxxxxxxxxxxxxxxxxxxxxx.apps.googleusercontent.com';
$G_CLIENT_EMAIL = 'xxxxxxxxxxxxxxxxxxxxx@appspot.gserviceaccount.com';
$G_CLIENT_KEY_PATH = 'xxxxxxxxxxxxxxxxxx.p12';
$G_CLIENT_KEY_PW = 'notasecret';

$obj_client_auth = new Google_Client ();
$obj_client_auth->setApplicationName ('TestApplication');
$obj_client_auth->setClientId ($G_CLIENT_ID);
$obj_client_auth->setAssertionCredentials (new Google_Auth_AssertionCredentials(
    $G_CLIENT_EMAIL,
    array('https://spreadsheets.google.com/feeds','https://docs.google.com/feeds'),
    file_get_contents ($G_CLIENT_KEY_PATH),
    $G_CLIENT_KEY_PW
));


$obj_client_auth->getAuth()->refreshTokenWithAssertion();
$obj_token  = json_decode($obj_client_auth->getAccessToken());
$accessToken = $obj_token->access_token;

$serviceRequest = new Google\Spreadsheet\DefaultServiceRequest($accessToken);
Google\Spreadsheet\ServiceRequestFactory::setInstance($serviceRequest);

$spreadsheetService = new Google\Spreadsheet\SpreadsheetService();
$spreadsheetFeed = $spreadsheetService->getSpreadsheets();

$spreadsheet = $spreadsheetFeed->getByTitle('MCI全国決勝大会');
$worksheetFeed = $spreadsheet->getWorksheets();
$worksheet = $worksheetFeed->getByTitle('TOTAL');
$listFeed = $worksheet->getListFeed();

//$row = array('date'=>'2015/03/01', 'value'=>1);
//$listFeed->insert($row);
//$row = array('date'=>'2015/03/01', 'value'=>2);
//$listFeed->insert($row);


$cellFeed = $worksheet->getCellFeed();
//$cellFeed->editCell(1,3, "name"); // 1st row, 3rd column
//$cellFeed->editCell(1,4, "age"); // 1st row, 4th column

/* 1位のデータ */
$name1 = $cellFeed->getCell(15, 2);
$first_name = $name1->getContent();

$cell1 = $cellFeed->getCell(15, 3);
$first_1 = $cell1->getContent();

$cell2 = $cellFeed->getCell(15, 4);
$first_2 = $cell2->getContent();

$cell3 = $cellFeed->getCell(15, 5);
$first_3 = $cell3->getContent();

$cell4 = $cellFeed->getCell(15, 6);
$first_4 = $cell4->getContent();

$cell5 = $cellFeed->getCell(15, 7);
$first_total = $cell5->getContent();

/* 2位のデータ */
$name2 = $cellFeed->getCell(16, 2);
$second_name = $name2->getContent();

$cell6 = $cellFeed->getCell(16, 3);
$second_1 = $cell6->getContent();

$cell7 = $cellFeed->getCell(16, 4);
$second_2 = $cell7->getContent();

$cell8 = $cellFeed->getCell(16, 5);
$second_3 = $cell8->getContent();

$cell9 = $cellFeed->getCell(16, 6);
$second_4 = $cell9->getContent();

$cell10 = $cellFeed->getCell(16, 7);
$second_total = $cell10->getContent();

/* 3位のデータ */
$name3 = $cellFeed->getCell(17, 2);
$third_name = $name3->getContent();

$cell11 = $cellFeed->getCell(17, 3);
$third_1 = $cell11->getContent();

$cell12 = $cellFeed->getCell(17, 4);
$third_2 = $cell12->getContent();

$cell13 = $cellFeed->getCell(17, 5);
$third_3 = $cell13->getContent();

$cell14 = $cellFeed->getCell(17, 6);
$third_4 = $cell14->getContent();

$cell15 = $cellFeed->getCell(17, 7);
$third_total = $cell15->getContent();


echo'<tr class="hide_area1"><td class="rankindata fst"><img src="../image/goldcrown.png" alt="MONO COTO INNOVATION 2016" height="42" width="42">1位</td><td class="rankindata">'.$first_name.'</td><td class="data">'.$first_1.'</td><td class="data">'.$first_2.'</td><td class="data">'.$first_3.'</td><td class="data">'.$first_4.'</td><td class="lastdata">'.$first_total."</td></tr>";
echo'<tr class="hide_area2"><td class="rankindata fst"><img src="../image/silvercrown.png" alt="MONO COTO INNOVATION 2016" height="42" width="42">2位</td><td class="rankindata">'.$second_name.'</td><td class="data">'.$second_1.'</td><td class="data">'.$second_2.'</td><td class="data">'.$second_3.'</td><td class="data">'.$second_4.'</td><td class="lastdata">'.$second_total."</td></tr>";
echo'<tr class="hide_area3"><td class="rankindata fst"><img src="../image/bronzecrown.png" alt="MONO COTO INNOVATION 2016" height="42" width="42">3位</td><td class="rankindata">'.$third_name.'</td><td class="data">'.$third_1.'</td><td class="data">'.$third_2.'</td><td class="data">'.$third_3.'</td><td class="data">'.$third_4.'</td><td class="lastdata">'.$third_total."</td></tr>";


echo '</tbody>';
echo '</table>';

?>

</div><!-- #contents -->


</div><!-- #wrapper -->


</div>

</section>

<!--<h3><a href="results_kyoto.html"><button type="button" class="btn btn-default btn-lg">次のチームの結果発表へ移る</button></a></h3>-->
      
</body> 
</html>

