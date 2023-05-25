<link rel="stylesheet" href="../css/style_addsummary.css">
<div class="content">
    <div class="content-top">
        <div name="incomeBtn" id="incomeBtn" value="0">收入</div>
        <div name="expendBtn" id="expendBtn" value="1">支出</div>
    </div>
    <div class="content-middle">
        <div class="content-middle-left"></div>
        <div class="content-middle-center">
            <form action="./api/add_summary.php" method="post">
                <table class="add-table">
                    <tr>
                        <th><label for="eff_time">發生日期</label></th>
                        <th><label for="project">項目</label></th>
                        <th><label for="details">細節</label></th>
                        <th><label for="category">類別</label></th>
                        <th><label for="amount">數量</label></th>
                        <th><label for="pravite">備註</label></th>
                    </tr>
                    <tr>
                        <td><input type="date" name="eff_time" id="eff_time"></td>
                        <td><input type="text" name="project" id="project"></td>
                        <td><input type="text" name="details" id="details"></td>
                        <td><input type="text" name="category" id="category"></td>
                        <td><input type="number" name="amount" id="amount"></td>
                        <td>
                            <input type="radio" name="private" value="0" checked>公開
                            <input type="radio" name="private" value="1">不公開<br>
                            <input type="radio" name="continuous" value="0" checked>無持續
                            <input type="radio" name="continuous" value="1">有持續
                        </td>
                    </tr>
                </table>
                <button type="submit" value="確認"></button>
            </form>
        </div>
        <div class="content-middle-left"></div>
    </div>
    <div class="content-footer"></div>
</div>