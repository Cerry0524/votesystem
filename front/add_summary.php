<link rel="stylesheet" href="../css/style_addsummary.css">
<div class="formcss">
    <form action="./api/add_summary.php" method="post" enctype="multipart/form-data">
        <div class="content-top">
            <div name="incomeBtn" id="incomeBtn" class="text-center" value="0">收入</div>
            <div name="expendBtn" id="expendBtn" class="text-center" value="1">支出</div>
        </div>
        <div class="add-table">
            <div class="add-table-div1 ">
                <div class="red-point"></div>
                <div class="add-table-div1-left">
                    <div class="add-table-img">
                        <img src="../background/Photos-new-icon.png" id="preview${optionIndex}" alt="Preview Image">
                        <input type="file" name="imgInput[]" id="imgInput" onchange="previewImage(this, 'preview${optionIndex}')">
                    </div>
                    <div class="add-table-desc">
                        描述<input type="text" name="desc[]" id="desc">
                    </div>
                </div>
                <div class="add-table-div1-right">
                    <div class="add-table-tr1">
                        <label for="eff_time" class="add-table-left">日期</label>
                        <input type="date" name="eff_time[]" id="eff_time" required>
                    </div>
                    <div class="add-table-tr2">
                        <label for="project" class="add-table-left">項目</label>
                        <input type="text" name="project[]" id="project" required>
                    </div>
                    <div class="add-table-tr3">
                        <label for="details" class="add-table-left">細節</label>
                        <input type="text" name="details[]" id="details">
                    </div>
                    <div class="add-table-tr4">
                        <label for="category" class="add-table-left">類別</label>
                        <input type="text" name="category[]" id="category" required>
                    </div>
                    <div class="add-table-tr5">
                        <label for="amount" class="add-table-left">數量</label>
                        <input type="number" name="amount[]" id="amount" min="0">
                    </div>
                    <div class="add-table-tr6">
                        <label for="price" class="add-table-left">金額</label>
                        <input type="number" name="price[]" id="price" min="0">
                    </div>
                    <div class="add-table-tr7">
                        <div class="add-table-left">備註</div>
                        <div class="add-table-right">
                            <input type="radio" name="private[${optionIndex}][]" value="0" checked>公開
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="private[${optionIndex}][]" value="1">不公開<br>
                            <input type="radio" name="continuous[${optionIndex}][]" value="0" checked>無持續
                            <input type="radio" name="continuous[${optionIndex}][]" value="1">有持續
                        </div>
                    </div>
                    <div class="add-table-tr8 ">
                        <span onclick="addOption(this)" style="font-size: 30px;background-color:white;border-radius: 50px;box-shadow: 2px 2px 4px gray;border:1px solid #ccc;margin-left:-50px">＋</span>
                        &nbsp;&nbsp;&nbsp;
                        <br>
                        <span onclick="removeOption(this) " style="font-size: 30px;background-color:white;border-radius: 50px;box-shadow: 2px 2px 4px gray;border:1px solid #ccc">－</span>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="addBtn">確認</button>
    </form>

</div>




<script>
    let optionIndex = 1;
    let count = 1;

    function addOption(el) {

        $(".lastInput").remove();

        let opt = `
        <div class="add-table-div1 ">
                <div class="red-point"></div>
                <div class="add-table-div1-left">
                    <div class="add-table-img">
                        <img src="../background/Photos-new-icon.png" id="preview${optionIndex}" alt="Preview Image">
                        <input type="file" name="imgInput[]" id="imgInput" onchange="previewImage(this, 'preview${optionIndex}')">
                    </div>
                    <div class="add-table-desc">
                        描述<input type="text" name="desc[]" id="desc">
                    </div>
                </div>
                <div class="add-table-div1-right">
                    <div class="add-table-tr1">
                        <label for="eff_time" class="add-table-left">日期</label>
                        <input type="date" name="eff_time[]" id="eff_time" required>
                    </div>
                    <div class="add-table-tr2">
                        <label for="project" class="add-table-left">項目</label>
                        <input type="text" name="project[]" id="project" required>
                    </div>
                    <div class="add-table-tr3">
                        <label for="details" class="add-table-left">細節</label>
                        <input type="text" name="details[]" id="details">
                    </div>
                    <div class="add-table-tr4">
                        <label for="category" class="add-table-left">類別</label>
                        <input type="text" name="category[]" id="category" required>
                    </div>
                    <div class="add-table-tr5">
                        <label for="amount" class="add-table-left">數量</label>
                        <input type="number" name="amount[]" id="amount" min="0">
                    </div>
                    <div class="add-table-tr6">
                        <label for="price" class="add-table-left">金額</label>
                        <input type="number" name="price[]" id="price" min="0">
                    </div>
                    <div class="add-table-tr7">
                        <div class="add-table-left">備註</div>
                        <div class="add-table-right">
                            <input type="radio" name="private[${optionIndex}][]" value="0" checked>公開
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="private[${optionIndex}][]" value="1">不公開<br>
                            <input type="radio" name="continuous[${optionIndex}][]" value="0" checked>無持續
                            <input type="radio" name="continuous[${optionIndex}][]" value="1">有持續
                        </div>
                    </div>
                    <div class="add-table-tr8 ">
                        <span onclick="addOption(this)" style="font-size: 30px;background-color:white;border-radius: 50px;box-shadow: 2px 2px 4px gray;border:1px solid #ccc;margin-left:-50px">＋</span>
                        &nbsp;&nbsp;&nbsp;
                        <br>
                        <span onclick="removeOption(this) " style="font-size: 30px;background-color:white;border-radius: 50px;box-shadow: 2px 2px 4px gray;border:1px solid #ccc">－</span>
                    </div>
                </div>
            </div>`

        $(".add-table-div1").parent().append(opt);

        optionIndex += 1; // 每次新增時增加索引值
        count += 1; //計算次數

    }

    function removeOption(el) {
        let dom = $(el).parent().parent().parent()
        if (count > 1) {
            $(dom).remove();
            count -= 1;
        }
    }

    imgInput.addEventListener('change', function(event) {
        previewImage(event);
    });

    function previewImage(input, previewId) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(previewId).src = e.target.result;
        };
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>

</html>