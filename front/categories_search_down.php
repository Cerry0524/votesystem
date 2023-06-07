<div class="down">
    <div class="down-content">
        <?php
        foreach ($categories_select as $category_select) { ?>
            <div class="result">
                <div class="result-title">
                    發生<br>時間
                </div>
                <div class="result-content">
                    <?php
                    $category_createdtime=$category_select['日期'];
                    echo date("Y 年 n 月 j 日",strtotime($category_createdtime));
                    echo "<br>";
                    echo date("H 時 m 分",strtotime($category_createdtime));
                    ?>
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
                    登載<br>時間
                </div>
                <div class="result-content">
                    <?php
                    $category_time=$category_select['登載時間'];
                    echo date("Y 年 n 月 j 日",strtotime($category_time));
                    echo "<br>";
                    echo date("H 時 m 分",strtotime($category_time));
                     ?>
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