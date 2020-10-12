<?php
include_once "../base.php";

//將原本在後台頁面直接寫入的電影列表程式碼搬到api中成為一個獨立的api，
//藉此讓前端可以ajax的方式來呼叫電影列表

$db = new DB('b03movie');
$rows = $db->all([], " order by rank");
foreach ($rows as $k => $row) {
    //找出排序後的上一筆和下一筆的資料id
    $prev = ($k != 0) ? $rows[$k - 1]['id'] : $row['id'];
    $next = ($k != (count($rows) - 1)) ? $rows[$k + 1]['id'] : $row['id'];
?>
    <div class="movie-item">
        <div class="d-flex-center">
            <img src="image/<?= $row['poster']; ?>" style="width:150px;">
        </div>
        <div class="d-flex-center">
            分級:<img src="icon/<?= $row['level']; ?>.png">
        </div>
        <div class="infos">
            <div style="display:flex;justify-content:space-around">
                <span><strong>片名: </strong><?= $row['name']; ?></span>
                <span><strong>片長: </strong><?= $row['length']; ?></span>
                <span><strong>上映時間: </strong><?= $row['ondate']; ?></span>
            </div>
            <div>
                <button onclick="showing('b03movie',<?= $row['id']; ?>)"><?= ($row['showing'] == 1) ? "隱藏" : "顯示"; ?></button>
                <button class="shift" data-rank="<?= $row['id'] . "-" . $prev; ?>">往上</button>
                <button class="shift" data-rank="<?= $row['id'] . "-" . $next; ?>">往下</button>
                <button onclick="location.href='?do=edit_movie&id=<?= $row['id']; ?>'">編輯電影</button>
                <button onclick="del('b03movie',<?= $row['id']; ?>)">刪除電影</button>
            </div>
            <div style="display:flex;align-items:center;"><strong>劇情簡介: </strong><?= $row['introduce']; ?></div>
        </div>
    </div>
    <hr>
<?php
}
?>