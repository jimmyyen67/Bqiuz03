<h1 class="ct">新增院線片</h1>
<form action="api/add_movie.php" method="post" enctype="multipart/form-data">
    <table class="m-auto">
        <tr>
            <td>片　　名：</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>分　　級：</td>
            <td>
                <select name="level">
                    <option value="1">普遍級</option>
                    <option value="2">保護級</option>
                    <option value="3">輔導級</option>
                    <option value="4">限制級</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>片　　長：</td>
            <td><input type="text" name="length"></td>
        </tr>
        <tr>
            <td>上映日期：</td>
            <td>
                <select name="year">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                </select>
                年
                <select name="month">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        echo "<option value=$i>" . $i . "</option>";
                    }
                    ?>
                </select>
                月
                <select name="day">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<option value=$i>" . $i . "</option>";
                    }
                    ?>
                </select>
                日
            </td>
        </tr>
        <tr>
            <td class="ct"> 發 行 商：</td>
            <td><input type="text" name="publish"></td>
        </tr>
        <tr>
            <td>導　　演：</td>
            <td><input type="text" name="director"></td>
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
                <textarea name="introduce" cols="10" rows="3"></textarea>
            </td>
        </tr>
    </table>
    <hr>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>