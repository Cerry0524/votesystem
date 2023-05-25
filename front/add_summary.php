<link rel="stylesheet" href="../css/style_addsummary.css">
<script src="../js/jquery-3.7.0.min.js"></script> <!-- 引進jquery -->

<div class="content">
    <div class="content-top">
        <div name="incomeBtn" id="incomeBtn" value="0">收入</div>
        <div name="expendBtn" id="expendBtn" value="1">支出</div>
    </div>
    <div class="content-middle">
        <div class="content-middle-left"></div>
        <div class="content-middle-center">
            <form action="./api/add_summary.php" method="post">
                <div class="add-table">
                    <div>
                        <div class="th"><label for="eff_time">發生日期</label></div>
                        <div class="th"><label for="project">項目</label></div>
                        <div class="th"><label for="details">細節</label></div>
                        <div class="th"><label for="category">類別</label></div>
                        <div class="th"><label for="amount">數量</label></div>
                        <div class="th"><label for="pravite">備註</label></div>
                    </div>
                    <div class="options">
                        <div>
                            <div class="tr"><input type="date" name="eff_time[]" id="eff_time"></div>
                            <div class="tr"><input type="text" name="project[]" id="project"></div>
                            <div class="tr"><input type="text" name="details[]" id="details"></div>
                            <div class="tr"><input style="max-width: 100px;min-width:50px" type="text" name="category" id="category"></div>
                            <div class="tr"><input style="max-width: 60px;" type="number" name="amount" id="amount"></div>
                            <div class="tr" style="min-width: 160pxdiv>
                                <input type=" radio" name="private[]" value="0" checked>公開
                                <input type="radio" name="private[]" value="1">不公開<br>
                                <input type="radio" name="continuous[]" value="0" checked>無持續
                                <input type="radio" name="continuous[]" value="1">有持續
                            </div>
                        </div>
                        <span onclick="addOption()">+</span>
                        <!-- jquery建立一個function 增加項目 -->
                        <span onclick="removeOption(this)">-</span>
                        <!-- jquery建立一個function 減少項目 ()裡面要加上this表示這個div-->
                    </div>

                </div>
        </div>
        <button type="submit">確認</button>
        </form>
    </div>
    <div class="content-middle-left"></div>
</div>
<div class="content-footer"></div>
</div>

<script>
    function addOption() {
        let opt = `<div>
                        <div><input type="date" name="eff_time[]" id="eff_time"></div>
                        <div><input type="text" name="project[]" id="project"></div>
                        <div><input type="text" name="details[]" id="details"></div>
                        <div><input style="max-width: 100px;min-width:50px" type="text" name="category" id="category"></div>
                        <div><input style="max-width: 60px;" type="number" name="amount" id="amount"></div>
                        <div style="min-width: 160pxdiv>
                            <input type=" radio" name="private[]" value="0" checked>公開
                            <input type="radio" name="private[]" value="1">不公開<br>
                            <input type="radio" name="continuous[]" value="0" checked>無持續
                            <input type="radio" name="continuous[]" value="1">有持續
                        </div>
                    </div>`
        $(".options").append(opt);
    }

    function removeOption(el) {
        let dom = $(el).parent()
        $(dom).remove();
    }
</script>