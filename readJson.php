<?php
$dir = './data/';

$filelist = glob($dir . '*');
$count = 0;
$json_string;
foreach ($filelist as $file) {
	if (is_file($file)) {
    $filePath[$count] = (string)$file;
    $json_string[$count] = file_get_contents($file);
    $json_string[$count] = mb_convert_encoding($json_string[$count], 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $arr[$count] = json_decode($json_string[$count],true);
		//print($file);
    //echo nl2br("\n");
    //print($json_string[$count]);
		//echo nl2br("\n");
  }
  $count = $count +1;
}
$php_json = json_encode($json_string);
$deletePath = json_encode($filePath);
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    </head>
    <body>
      <h1>表情診断：印刷者画面</h1>
      <!--画面更新-->
      <form>
      <input type="button" value="画面を更新する" onclick="window.location.reload();" />
      </form>
      <!--サーバに保存してあるjsonデータ数だけ表示する-->
      <?php for ($i=0; $i<$count; $i++) : ?> 
        <!--印刷画面開く-->
        <form method="post" action="print.html" style="display:inline">
        <input type="button" value="<?php echo $arr[$i][8]['faceId'];?>
        ブース<?php echo $arr[$i][7]['faceId'];?>の
        <?php echo $arr[$i][6]['faceId'];?>さん
        <?php echo $arr[$i][9]['faceId'];?>
        " onclick="OpenPrint(<?php echo $i;?>)" />
        </form>
        <!--データ消去-->
        <form method="post" action="delete.php" style="display:inline">
          <input type="button" value="データ削除" onclick="DeleteFile(<?php echo $i;?>)"/> 
        </form>
        <br>
      <?php endfor; ?>
      <div class="debug">デバッグテキストログ</div>
    </body>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
      var  count =JSON.parse('<?php echo $count; ?>');
      var  array =<?php echo $php_json; ?>;
      var  deletePath;
      var print_id;
      //初期化
      $(document).ready(function(){
        //$(".debug").text(array[0]); 
        deletePath  = JSON.parse('<?php echo $deletePath; ?>');
        //alert(deletePath[0]); 
        //alert(deletePath[1]);  
      });
      //印刷画面を開く
      function OpenPrint(params) {        
        print_id = params;
        //alert(array[0]);
        var child_win = window.open('print.html', '', 'width=1050,height=740,scrollbars=yes');
      }
      //データ配列を取得する
      function GetArray(){
        var jsonArray = JSON.parse(array[print_id]);
        return array[print_id];
      }
      //データを１つ消去する
      function DeleteFile(id){
        var path = deletePath[id];
        //alert(path);
        $.post(
          "delete.php" ,
          {"item" : path} ,
              function(msg){
                  //alert(msg);
                  window.location.reload();
              }
        ).error(
            function() {//PHP側で何らかのバグ発生。存在しないURLを指定したりすると発生。
            alert('サーバーエラーによりデータ消去できませんでした');
        });
      }
      //一定時間ごとに処理
      window.onload = function(){
        //1000ミリ秒（1秒）毎に関数「showNowDate()」を呼び出す
        setInterval("showNowDate()", 10000);
        
      }
      
      //現在時刻を表示する関数
      function showNowDate(){
        window.location.reload();
        var dt = new Date();
        //$(".debug").text(dt);        
      }
    </script>
</html>
