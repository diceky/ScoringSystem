<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head> 
<meta charset=utf-8 /> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>MCI地全国決勝 採点フォーム</title>   

<!-- Bootstrap -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/my.css" rel="stylesheet">
<link href="../css/sweetalert.css" rel="stylesheet" type="text/css" >

<!-- Viewportの設定 -->
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, minimum-scale=0.5 , maximum-scale=2">

     
<!-- IE向けの設定 -->
<!--[if IE]> 
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">google.load("jquery", "1.3");</script>
<script type="text/javascript" src="../js/sweetalert.min.js"></script>

<!-- FUNCTIONS FOR SWEET ALERT JS-->
<script type="text/javascript">

$(document).ready(function(){
    $("#scoreform1").submit(function(){
        $.post( "../post.php", $(this).serialize(), function(response){
            swal(response);
        } );
        return false;
    });

    $("#scoreform2").submit(function(){
        $.post( "../post.php", $(this).serialize(), function(response){
            swal(response);
        } );
        return false;
    });

    $("#scoreform3").submit(function(){
        $.post( "../post.php", $(this).serialize(), function(response){
            swal(response);
        } );
        return false;
    });

    $("#scoreform4").submit(function(){
        $.post( "../post.php", $(this).serialize(), function(response){
            swal(response);
        } );
        return false;
    });

    $("#scoreform5").submit(function(){
        $.post( "../post.php", $(this).serialize(), function(response){
            swal(response);
        } );
        return false;
    });

    $("#scoreform6").submit(function(){
        $.post( "../post.php", $(this).serialize(), function(response){
            swal(response);
        } );
        return false;
    });

    $("#scoreform7").submit(function(){
        $.post( "../post.php", $(this).serialize(), function(response){
            swal(response);
        } );
        return false;
    });

    $("#scoreform8").submit(function(){
        $.post( "../post.php", $(this).serialize(), function(response){
            swal(response);
        } );
        return false;
    });

    $("#scoreform9").submit(function(){
        $.post( "../post.php", $(this).serialize(), function(response){
            swal(response);
        } );
        return false;
    });

    $("#scoreform10").submit(function(){
        $.post( "../post.php", $(this).serialize(), function(response){
            swal(response);
        } );
        return false;
    });
})
</script>

<style>
<!--
-->       
</style>

</head> 

<body>

<?php
  /* VARIABLES AND FUNCTIONS FOR SCORE FORM */

  const TEAM_NUM = 10; // チーム数を入力します

  $judge_array = array( // 審査員の名前を入力します
    "西山 恵太", 
    "岡島 礼奈", 
    "遠藤 謙", 
    "正能 茉優", 
    "浜野 慶一"
    );
  $themecompany_array = array( //クライアント企業を列挙します
    "コクヨ株式会社", 
    "株式会社でん六",
    "パナソニックES住宅設備株式会社",
    "富士通デザイン株式会社",
    "京都機械工具株式会社",
    "株式会社IBUKI",
    "後藤電子株式会社",
    "日本電産株式会社",
    "Spiber株式会社",
    "クロステックスポーツ株式会社"
     );

    $team_array=array(  //チーム名を列挙します
      "マカロニ",
      "WATER",
      "サムライ魂",
      "Go dimension",
      "1-5",
      "Jupiter",
      "HIT",
      "火気厳禁",
      "pogi",
      "DECO-BOCO"
      );

    $category_array=array( //採点項目を列挙します
      "ニーズ性",
      "着眼点",
      "独創性",
      "挑戦性"
      );

    function createForm($themecompanyVal, $teamVal, $teamidVal){
?>
        <!-- PRINT COPANY NAME -->
        <div class="row">
          <div class="col-md-4">
<?php
            echo '<h4 class="themename-form">'.$themecompanyVal.'</h4>';
?>
          </div><!--col-md-4-->
        </div>

        <!-- PRINT TEAM NAME -->
        <div class="row">
          <div class="col-md-2">
<?php
            echo '<h3 class="teamname-form">'.$teamVal.'</h3>';
?>
          </div><!--col-md-2-->
        </div><!--row-->
      
        <!-- SCORING FORM -->
      
        <div class="row scoreformrow">
            <div class="col-md-12">
<?php
              echo '<form class="form-inline" id="scoreform'.$teamidVal.'">';

                echo '<input type="hidden" name="judgeid" value="'.$_POST['judgeid'].'">';

                echo '<input type="hidden" name="teamid" value="'.$teamidVal.'">';
?>
                <div class="form-group">
                  <select name="category1" size="1" class="form-control">
<?php
                    echo '<option value="0" selected>ニーズ性</option>';

                    for($i = 1;$i <=10;$i++){
                      echo '<option value="'.$i.'" >'.$i.'</option>';
                    }
?>
                  </select>
                </div>
        
                <div class="form-group">
                  <select name="category2" size="1" class="form-control">
<?php
                    echo '<option value="0" selected>着眼点</option>';

                    for($i = 1;$i <=10;$i++){
                      echo '<option value="'.$i.'" >'.$i.'</option>';
                    }
?>
                  </select>
                </div>
        
                <div class="form-group">
                  <select name="category3" size="1" class="form-control">
<?php
                    echo '<option value="0" selected>独創性</option>';

                    for($i = 1;$i <=10;$i++){
                      echo '<option value="'.$i.'" >'.$i.'</option>';
                    }
?>
                  </select>
                </div>
        
                <div class="form-group">
                  <select name="category4" size="1" class="form-control">
<?php
                    echo '<option value="0" selected>挑戦性</option>';

                    for($i = 1;$i <=10;$i++){
                      echo '<option value="'.$i.'" >'.$i.'</option>';
                    }
?>
                  </select>
                </div>
                <div class="form-group" id="textarea1">
                  <textarea class="form-control" name="comment" rows="1" cols="80" class="col-md-4" placeholder="コメント"></textarea>
                </div>
                <button type="submit" class="btn btn-danger">UPDATE</button>
              </form>
        
            </div><!--col-md-12-->
          </div><!--row-->
<?php
    }
?>

<div id="wrapper">

 <section class="container">

  <!-- HEADER IMAGE -->

  <div class="row">

    <div class="col-md-6 col-md-offset-4">
      <a href="http://mono-coto-innovation.com/score_form/grandfinal/">
        <img src="../image/header_logo_small.png" class="img-responsive headerlogo" alt="MONO COTO INNOVATION 2016">
      </a>

    </div><!--col-md-6-->

  </div><!--#row-->

  <!-- PRINT JUDGE NAME -->

  <div class = "row">
    <div class="col-md-12 judgename-form">
<?php
    echo '<h3>'.$judge_array[($_POST['judgeid'] - 1)].' 様</h3>';
?>
    </div><!--col-md-12-->
  </div><!--#row-->

  <!-- PRINT COMPANY NAME AND TEAM NAME -->

<?php
  for($i = 0; $i < TEAM_NUM; $i++){
    createForm($themecompany_array[$i], $team_array[$i], $i+1);
  }
?>

</section>

</div><!-- #wrapper -->

<!--<h3><a href="results_kyoto.html"><button type="button" class="btn btn-default btn-lg">次のチームの結果発表へ移る</button></a></h3>-->
      
</body> 
</html>

