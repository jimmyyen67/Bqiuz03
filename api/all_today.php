<?php
include_once "../base.php";
$db = new DB("b03movie");
$movies = $db->all();
foreach ($movies as $key => $movie) {
    $movie['ondate'] = date("Y-m-d");
    $db->save($movie);
}
