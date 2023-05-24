<div class="content">
    <div class="content-top">
        <div name="incomeBtn" id="incomeBtn" value="0">收入</div>
        <div name="expendBtn" id="expendBtn" value="1">支出</div>
    </div>
    <div class="content-middle">
        <div class="content-middle-left"></div>
        <div class="content-middle-center">
            <form action="./api/add_summary.php" method="post">
                <div class="form-title">
                    <div><label for="eff_time">發生日期</label></div>
                    <div><label for="project">項目</label></div>
                    <div><label for="details">細節</label></div>
                    <div><label for="category">類別</label></div>
                    <div><label for="amount">數量</label></div>
                    <div><label for="private">公開</label></div>
                    <div><label for="continuous">持續性</label></div>
                </div>
                <div class="form-input">
                    <input type="date" name="eff_time" id="eff_time">
                    <input type="text" name="project" id="project">
                    <input type="text" name="details" id="details">
                    <input type="text" name="category" id="category">
                    <input type="number" name="amount" id="amount">
                    <input type="text" name="private" id="private">
                    <input type="text" name="continuous" id="continuous">
                </div>
            </form>
        </div>
        <div class="content-middle-left"></div>
    </div>
</div>