<?php

include_once "../base.php";

$db = new DB("b03poster");

$data = [];
if (!empty($_FILES['poster']['tmp_name'])) {
    $data['file'] = $_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'], "../image/" . $data['file']);
}

$data['name'] = $_POST['name'];
$data['showing'] = 1;
$data["animation"] = 1;

//以資料表中id的最大值+1來當成要新增的資料的rank值，這個做法並不保證id和rank值會是一致的，但可以確保rank值是不同的
//另一個做法則是把取得id的最大值改成取得rank的最大值也可以
$data["rank"] = $db->q("select MAX(`id`) from `b03poster`")[0]['MAX(`id`)'] + 1;
print_r($data['rank']);
$db->save($data);

to("../admin.php?do=poster");
