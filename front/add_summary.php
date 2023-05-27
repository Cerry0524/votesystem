<link rel="stylesheet" href="../css/style_addsummary.css">

<form action="./api/add_summary.php" method="post">

    <div class="content-left"></div>
    <table class="add-table">
        <tr class="content-top">
            <td name="incomeBtn" id="incomeBtn" value="0">收入</td>
            <td name="expendBtn" id="expendBtn" value="1">支出</td>
        </tr>
        <tr class="add-table-tr1">
            <th style="width: 5%;"></th>
            <th class="add-table-th1"><label for="eff_time">發生日期</label>△▽</th>
            <th class="add-table-th2"><label for="project">項目</label></th>
            <th class="add-table-th3"><label for="details">細節</label></th>
            <th class="add-table-th4"><label for="category">類別</label></th>
            <th class="add-table-th5"><label for="amount">數量</label></th>
            <th class="add-table-th6"><label for="price">金額</label></th>
            <th class="add-table-th7"><label for="pravite">備註</label></th>
            <th class="add-table-th8">增減項目</th>
            <th style="width: 5%;"></th>
        </tr>
        <tr class=tdInput style='background-color: rgb(210, 222,239);
                                 height: 40px;
                                 border-bottom: 1px solid dodgerblue; '>
            <th style="width: 5%;"></th>
            <td><input type="date" name="eff_time[]" id="eff_time"></td>
            <td><input type="text" name="project[]" id="project"></td>
            <td><input type="text" name="details[]" id="details"></td>
            <td><input type="text" name="category[]" id="category"></td>
            <td><input type="number" name="amount[]" id="amount" min="0"></td>
            <td><input type="number" name="price[]" id="price" min="0"></td>
            <td>
                <input type="radio" name="private[${optionIndex}][]" value="0" checked>公開
                <input type="radio" name="private[${optionIndex}][]" value="1">不公開<br>
                <input type="radio" name="continuous[${optionIndex}][]" value="0" checked>無持續
                <input type="radio" name="continuous[${optionIndex}][]" value="1">有持續
            </td>
            <td>
                <span onclick="addOption(this)" style="font-size: 26px;">＋</span><br>
                <span onclick="removeOption(this) " style="font-size: 26px;">－</span>
            </td>
            <th style="width: 5%;"></th>
        </tr>
        <tr class=lastInput>
            <th style="width: 5%;" colspan="10"></th>
        </tr>
    </table>
    <br>
    <button type="submit" class="addBtn">確認</button>
</form>




<script>
    let optionIndex = 1;
    let count = 1;

    function addOption(el) {
        
        $(".lastInput").remove();

        let opt = `<tr class=tdInput style='background-color: rgb(210, 222,239);
                                            height: 40px;
                                            border-bottom: 1px solid dodgerblue; '>
            <th style="width: 5%;"></th>
            <td><input type="date" name="eff_time[]" id="eff_time"></td>
            <td><input type="text" name="project[]" id="project"></td>
            <td><input type="text" name="details[]" id="details"></td>
            <td><input type="text" name="category[]" id="category"></td>
            <td><input type="number" name="amount[]" id="amount" min="0"></td>
            <td><input type="number" name="price[]" id="price" min="0"></td>
            <td>
                <input type="radio" name="private[${optionIndex}][]" value="0" checked>公開
                <input type="radio" name="private[${optionIndex}][]" value="1">不公開<br>
                <input type="radio" name="continuous[${optionIndex}][]" value="0" checked>無持續
                <input type="radio" name="continuous[${optionIndex}][]" value="1">有持續
            </td>
            <td>
                <span onclick="addOption()" style="font-size: 26px;">＋</span><br>
                <span onclick="removeOption(this) " style="font-size: 26px;">－</span>
            </td>
            <th style="width: 5%;"></th>
            </tr>
            <tr class=lastInput>
            <th style="width: 5%;" colspan="10"></th>
            </tr>`

        $(".tdInput").parent().append(opt);
        
        optionIndex += 1; // 每次新增時增加索引值
        count += 1;//計算次數
        
    }

    function removeOption(el) {
        let dom = $(el).parent().parent()
        if (count>1){
            $(dom).remove();
            count -= 1;
        }
    }
</script>