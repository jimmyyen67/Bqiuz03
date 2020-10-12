<?php
$db = new DB("b03movie");
$row = $db->find($_GET['id']);
$year = explode("-", $row['ondate'])[0];
$month = explode("-", $row['ondate'])[1];
$day = explode("-", $row['ondate'])[2];
?>

<h1 class="ct">編輯院線片</h1>
<form action="api/edit_movie.php" method="post" enctype="multipart/form-data">
    <table class="m-auto">
        <tr>
            <td>片　　名：</td>
            <td><input type="text" name="name" value="<?= $row['name'] ?>"></td>
        </tr>
        <tr>
            <td>分　　級：</td>
            <td>
                <select name="level">
                    <option value="1" <?= ($row['level'] == 1) ? "selected" : ""; ?>>普遍級</option>
                    <option value="2" <?= ($row['level'] == 2) ? "selected" : ""; ?>>保護級</option>
                    <option value="3" <?= ($row['level'] == 3) ? "selected" : ""; ?>>輔導級</option>
                    <option value="4" <?= ($row['level'] == 4) ? "selected" : ""; ?>>限制級</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>片　　長：</td>
            <td><input type="text" name="length" value="<?= $row['length'] ?>"></td>
        </tr>
        <tr>
            <td>上映日期：</td>
            <td>
                <select name="year">
                    <option value="2020" <?= ($year == "2020") ? "selected" : ""; ?>>2020</option>
                    <option value="2021" <?= ($year == "2021") ? "selected" : ""; ?>>2021</option>
                </select>
                年
                <select name="month">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        $selected = ($month == $i) ? "selected" : "";
                        echo "<option value=$i " . $selected . ">" . $i . "</option>";
                    }
                    ?>
                </select>
                月
                <select name="day">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        $selected = ($day == $i) ? "selected" : "";
                        echo "<option value=$i " . $selected . ">" . $i . "</option>";
                    }
                    ?>
                </select>
                日
            </td>
        </tr>
        <tr>
            <td class="ct"> 發 行 商：</td>
            <td><input type="text" name="publish" value="<?= $row['publish'] ?>"></td>
        </tr>
        <tr>
            <td>導　　演：</td>
            <td><input type="text" name="director" value="<?= $row['director'] ?>"></td>
        </tr>
        <tr>
            <td>預告影片：</td>
            <td><input type="file" name="trailer"></td>
        </tr>
        <tr>
            <td>電影海報：</td>
            <td><input type="file" name="poster"></td>
        </tr>
        <tr>
            <td>劇情簡介：</td>
            <td>
                <textarea name="introduce" cols="10" rows="3"><?= $row['introduce'] ?></textarea>
            </td>
        </tr>
    </table>
    <hr>
    <div class="ct">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>