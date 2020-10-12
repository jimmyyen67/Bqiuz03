<?php
include_once "../base.php";

$db=new DB("b03poster");

//檢查每一筆表單傳過來的預告片資料,並進行相應的刪除及資料修改動作
foreach($_POST['id'] as $k => $id){
    if(!empty($_POST['delete']) && in_array($id,$_POST['delete'])){

        $db->del($id);

    }else{

        $row=$db->find($id);
        $row['name']=$_POST['name'][$k];
        $row['showing']=(!empty($_POST['showing']) && in_array($id,$_POST['showing']))?1:0;
        $row['animation']=$_POST['animation'][$k];
        $db->save($row);

    }
}

to("../admin.php?do=poster");

?>