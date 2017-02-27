<?php

header('Content-Type: text/html; charset=UTF-8');

ini_set("display_errors",1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

$judgeid = $_POST['judgeid'];
$teamid = $_POST['teamid'];
$category1_value = $_POST['category1'];
$category2_value = $_POST['category2'];
$category3_value = $_POST['category3'];
$category4_value = $_POST['category4'];
$comment_value = $_POST['comment'];

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
$worksheet = $worksheetFeed->getByTitle($judgeid);
$listFeed = $worksheet->getListFeed();

$cellFeed = $worksheet->getCellFeed();

/*EXAMPLE*/
/*$cellFeed->editCell(2,3, $category1_value); // edit cell in 2nd row, 3rd column*/
/*$cellFeed->editCell(1,8, $category1_value); // edit cell in 1st row, 8th column*/

$cellFeed->editCell($teamid + 1,3, $category1_value); // 2nd row, 2th column
$cellFeed->editCell($teamid + 1,4, $category2_value); // 2nd row, 3th column
$cellFeed->editCell($teamid + 1,5, $category3_value); // 2nd row, 4th column
$cellFeed->editCell($teamid + 1,6, $category4_value); // 2nd row, 5th column
$cellFeed->editCell($teamid + 1,8, $comment_value); // 2nd row, 5th column

/*
echo "judge:".$judgeid.",";
echo "team:".$teamid.",";
echo "ニーズ性:".$cellvalue1.",";
echo "実現可能性:".$cellvalue2.",";
echo "挑戦性:".$cellvalue3.",";
echo "独創性:".$cellvalue4.",";
//echo "コメント:".$cellvalue6;
*/

echo '点数を更新しました';

?>