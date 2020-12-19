<?php
// Ajax以外からのアクセスを遮断
//$request = isset($_SERVER['HTTP_X_REQUESTED_WITH'])
  //   ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
//if($request !== 'xmlhttprequest') exit;
 
//各端末から送られてくるデータを読み込む
//$params = filter_input(INPUT_POST, 'faceAttributes',FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);//配列


$ids=$_POST['ary'];
$data = json_encode($_POST['ary']);
$dataArray = json_decode($data,true);
$fileName = $dataArray[8]['faceId'];
file_put_contents("./data/".strval($fileName).uniqid().".json" ,$data);
echo $fileName;
?>