<link rel="stylesheet" href="./css/style_categoriessearch.css">
<?php include_once "./api/categories_search.php";

?>


<div class="content">
    <div class="top">
        <div class="top-left">
            <div style="font-size:20px;line-height:2">
                類別項目
                <select name="option">
                    <?php
                    foreach ($categories as $idx => $category) {
                    ?>
                        <option value="<?= $category['id']; ?>" style="text-align:left">
                            <?= ($idx + 1) . "." . $category['category']; ?>
                        </option>

                    <?php
                    }
                    ?>
                </select>

                <input text="buttom" onclick="location.href='?do=categories_search_up'" value="清空" style="width:80px">
            </div>
            <div>
                開始日期
                <input type="date" name="dateStart" id="dateStart">

                結束日期
                <input type="date" name="dateEnd" id="dateEnd">
            </div>

        </div>
        <div class="top-right">
            <div class="top-right-title">
                細項說明
            </div>
            <div class="top-right-content">
                <?= ($category_detp['description'] ?? ""); ?>
            </div>
        </div>
    </div>
    <div class="canva">
        <div class="canva-left">
        <?php
                $values=[];
                foreach ($categories_select_sum as $select_sum) {
                    $values[]=$select_sum[0];
                }
                echo "'" . join("','", $values) . "'";
                ?>
        </div>
        <div class="canva-right">
            <canvas id="ClasslineBar"></canvas>
        </div>
    </div>
</div>


<?php include_once "./front/categories_search_down.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>

<script>
    const ClasslineBar = document.getElementById('ClasslineBar');

    document.querySelector('[name="option"]').addEventListener('change', function() {
        console.log('category changed');
        const selectedCategoryId = this.value;
        const dateStart = document.getElementById('dateStart').value;
        const dateEnd = document.getElementById('dateEnd').value;

        window.location.href = `?do=categories_search_up&category_id=${selectedCategoryId}&dateStart=${dateStart}&dateEnd=${dateEnd}`;
    });

    document.getElementById('dateStart').addEventListener('change', function() {
        console.log('start date changed'); // Debug line
        const selectedCategoryId = document.querySelector('[name="option"]').value;
        const dateStart = this.value;
        const dateEnd = document.getElementById('dateEnd').value;

        window.location.href = `?do=categories_search_up&category_id=${selectedCategoryId}&dateStart=${dateStart}&dateEnd=${dateEnd}`;
    });

    document.getElementById('dateEnd').addEventListener('change', function() {
        console.log('end date changed'); // Debug line
        const selectedCategoryId = document.querySelector('[name="option"]').value;
        const dateStart = document.getElementById('dateStart').value;
        const dateEnd = this.value;

        window.location.href = `?do=categories_search_up&category_id=${selectedCategoryId}&dateStart=${dateStart}&dateEnd=${dateEnd}`;
    });

    const urlParams = new URLSearchParams(window.location.search);
    const category_id = urlParams.get('category_id');
    const dateStart = urlParams.get('dateStart');
    const dateEnd = urlParams.get('dateEnd');

    // 設定輸入欄位的值
    document.querySelector('[name="option"]').value = category_id || '';
    document.getElementById('dateStart').value = dateStart || '';
    document.getElementById('dateEnd').value = dateEnd || '';


    const datalinebar = {
        labels: [
            <?php
            echo "'" . join("','", array_keys($categories_select_sum)) . "'";
            ?>
        ],
        datasets: [{
            label: '支出',
            data: [
                <?php
                $values=[];
                foreach ($categories_select_sum as $select_sum) {
                    $values[]=$select_sum[0];
                }
                echo "'" . join("','", $values) . "'";
                ?>
            ],
            backgroundColor: ['#FF5733', '#FFBD33', '#DBFF33', '#75FF33', '#33FF57', '#33FFBD', '#33DBFF', '#3375FF', '#5733FF', '#BD33FF', '#FF33DB'],
            hoverOffset: 4
        }]
    };

    const optionslinebar = {
        type: 'bar',
        data: datalinebar,
        maintainAspectRatio: false,
        aspectRatio: 2,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: '收支分析'
                }
            }
        },
    };


    const lineBarChartoptions = new Chart(ClasslineBar, {
        type: 'bar',
        data: datalinebar,
        options: optionslinebar
    });
</script>