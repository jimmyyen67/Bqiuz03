<?php

//取得訂單編號
$sno = $_GET['ord'];
$db = new DB("b03order");

//取得訂單資料
$ord = $db->find(['no' => $sno]);

?>
<style>
    .sno {
        color: red;
        font-size: x-large;
    }

    td {
        padding: .5rem;
    }

    .bold {
        font-weight: bold;
    }

    tr>td:first-child {
        background: gray;
    }
    tr>td:nth-child(2) {
        background: lightgray;
    }
</style>
<h3 class="ct">感謝您的訂購，您的訂單編號是：<span class="sno"><?= $ord['no']; ?></span></h3>
<table style="width: 350px;margin:auto;">

    <tr>
        <td class="ct" style="width:25%">電影名稱:</td>
        <td class="ct bold"><?= $ord['movie']; ?></td>
    </tr>
    <tr>
        <td class="ct">日　　期:</td>
        <td class="ct bold"><?= $ord['date']; ?></td>
    </tr>
    <tr>
        <td class="ct">場次時間:</td>
        <td class="ct bold"><?= $ord['session']; ?></td>
    </tr>
    <tr>
        <td class="ct"> 座　　位: </td>
        <td class="ct">
            <?php
            //還原座位資料為陣列並顯示為排及號
            $seat = unserialize($ord['seat']);
            foreach ($seat as $s) {
                echo floor($s / 5) + 1;
                echo "排";
                echo $s % 5 + 1;
                echo "號";
                echo "<br>";
            }

            echo "共" . $ord['qt'] . "張電影票";
            ?>
        </td>

    </tr>
</table>
<hr>
<div class="ct">
    <button onclick="location.href='index.php'">確認</button>
</div>