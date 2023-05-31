<link rel="stylesheet" href="../css/style_addsummary.css">
<div class="formcss">
    <form action="./api/add_summary.php" method="post">
        <div class="content-top">
        <div name="incomeBtn" id="incomeBtn" value="0">收入</div>
        <div name="expendBtn" id="expendBtn" value="1">支出</div>
    </div>
    <div class="add-table">
        <div class="add-table-div1">
            <div class="add-table-th1"><label for="eff_time">發生日期</label></div>
            <div class="add-table-th2"><label for="project">項目</label></div>
            <div class="add-table-th3"><label for="details">細節</label></div>
            <div class="add-table-th4"><label for="category">類別</label></div>
            <div class="add-table-th5"><label for="amount">數量</label></div>
            <div class="add-table-th6"><label for="price">金額</label></div>
            <div class="add-table-th7"><label for="pravite">備註</label></div>
            <div class="add-table-th8">增減項目</div>
        </div>
        <div class=tdInput style='background-color: rgb(210, 222,239);
                                 height: 40px;
                                 border-bottom: 1px solid dodgerblue; '>
            <div class="add-table-th1"><input style="width:120px" type="date" name="eff_time[]" id="eff_time"></div>
            <div class="add-table-th2"><input style="width:120px" type="text" name="project[]" id="project"></div>
            <div class="add-table-th3"><input style="width:120px" type="text" name="details[]" id="details"></div>
            <div class="add-table-th4"><input style="width:80px" type="text" name="category[]" id="category"></div>
            <div class="add-table-th5"><input style="width:50px" type="number" name="amount[]" id="amount" min="0"></div>
            <div class="add-table-th6"><input style="width:50px" type="number" name="price[]" id="price" min="0"></div>
            <div class="add-table-th7">
                <input type="radio" name="private[${optionIndex}][]" value="0" checked>公開
                <input type="radio" name="private[${optionIndex}][]" value="1">不公開<br>
                <input type="radio" name="continuous[${optionIndex}][]" value="0" checked>無持續
                <input type="radio" name="continuous[${optionIndex}][]" value="1">有持續
            </div>
            <div  class="add-table-th8">
                <span onclick="addOption(this)" style="font-size: 26px;">＋</span><br>
                <span onclick="removeOption(this) " style="font-size: 26px;">－</span>
            </div>
        </div>
        <div class=lastInput>
            <div style="width: 5%;" colspan="10"></div>
        </div>
    </table>
    <br>
    <button type="submit" class="addBtn">確認</button>
</form>
</div>




<script>
    let optionIndex = 1;
    let count = 1;

    function addOption(el) {

        $(".lastInput").remove();

        let opt = `<div class=tdInput style='background-color: rgb(210, 222,239);
                                            height: 40px;
                                            border-bottom: 1px solid dodgerblue; '>
            <div style="width: 5%;"></div>
            <div><input type="date" name="eff_time[]" id="eff_time"></div>
            <div><input type="text" name="project[]" id="project"></div>
            <div><input type="text" name="details[]" id="details"></div>
            <div><input type="text" name="category[]" id="category"></div>
            <div><input type="number" name="amount[]" id="amount" min="0"></div>
            <div><input type="number" name="price[]" id="price" min="0"></div>
            <div>
                <input type="radio" name="private[${optionIndex}][]" value="0" checked>公開
                <input type="radio" name="private[${optionIndex}][]" value="1">不公開<br>
                <input type="radio" name="continuous[${optionIndex}][]" value="0" checked>無持續
                <input type="radio" name="continuous[${optionIndex}][]" value="1">有持續
            </div>
            <div>
                <span onclick="addOption()" style="font-size: 26px;">＋</span><br>
                <span onclick="removeOption(this) " style="font-size: 26px;">－</span>
            </div>
            <div style="width: 5%;"></div>
            </div>
            <div class=lastInput>
            <div style="width: 5%;" colspan="10"></div>
            </div>`

        $(".tdInput").parent().append(opt);

        optionIndex += 1; // 每次新增時增加索引值
        count += 1; //計算次數

    }

    function removeOption(el) {
        let dom = $(el).parent().parent()
        if (count > 1) {
            $(dom).remove();
            count -= 1;
        }
    }
</script>