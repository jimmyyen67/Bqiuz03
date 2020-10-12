<?php
include_once "../base.php";

//取得post傳過來的倶料
$movie=$_POST['movie'];
$date=$_POST['date'];
$session=$_POST['session'];
$seat=$_POST['seat'];
$db_movie=new DB("b03movie");

//排序一下座位的內容,預設由小到大
sort($seat);

//產生可以寫入到資料表的內容
$data['movie']=$db_movie->find($movie)['name'];
$data['date']=$date;
$data['session']=$sess[$session];
$data['qt']=count($seat);

//使用serialize將陣列轉成字串才能存入資料表
$data['seat']=serialize($seat) ;

//利用資料表中的id值來計算流水號
$sno=$db_movie->q("select MAX(`id`) from `b03order`")[0]['MAX(`id`)']+1;
$dateNo=date("Ymd");

//產生訂單編號並補零
$data['no']=$dateNo.sprintf("%04d",$sno);

$db_ord=new DB("b03order");
$db_ord->save($data);

//回傳訂單編號
echo $data['no'];

?>