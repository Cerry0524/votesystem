<?php
/* echo "<pre>";
print_r($categories_select);
echo "</pre>"; */
?>
<div class="down">
    <div class="down-content">
        <?php
        foreach ($categories_select as $category_select) { ?>
            <div class="result">
                <div class="result-title">
                    日期
                </div>
                <div class="result-content">
                    <?= $category_select['日期']; ?>
                </div>
                <div class="result-title">
                    項目
                </div>
                <div class="result-content">
                    <?= $category_select['項目']; ?>
                </div>
                <div class="result-title">
                    細節
                </div>
                <div class="result-content">
                    <?= $category_select['細節']; ?>
                </div>
                <div class="result-title">
                    數量
                </div>
                <div class="result-content">
                    <?= $category_select['數量']; ?>
                </div>
                <div class="result-title">
                    金額
                </div>
                <div class="result-content">
                    <?= $category_select['金額']; ?>
                </div>
                <div class="result-title">
                    登載時間
                </div>
                <div class="result-content">
                    <?= $category_select['登載時間']; ?>
                </div>
                <div class="result-title">
                    設定
                </div>
                <div class="result-content">
                    system
                </div>
            </div>
        <?php } ?>
    </div>

</div>