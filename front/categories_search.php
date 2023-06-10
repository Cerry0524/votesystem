<link rel="stylesheet" href="./css/style_categories_search.css">
<?php include_once "./api/categories_search.php";

?>


<div class="container">
    <div class="form-group sticky-sm-top">
        <div class="input-group">
            <laber class="input-group-text btn btn-dark" for="option">類別</laber>
            <select class="form-select" name="option">
                <option selected value="">請選擇</option>
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
            <button class="btn btn-secondary" type="button" onclick="location.href='?do=categories_search'">清空</button>


            <laber class="input-group-text btn btn-dark" for="dateStart">開始日期</laber>
            <input id="dateStart" type="date" class="form-control  col-1" name="dateStart" placeholder="Additional Info">
            <span class="input-group-text btn btn-dark" for="dateEnd">結束日期</span>
            <input id="dateEnd" type="date" class="form-control   col-1" name="dateEnd" placeholder="Additional Info">

        

            <span class="input-group-text btn btn-dark" for="dateStart">細項說明</span>
            <span class="input-group-text btn btn-light  col-2"> <?= ($category_detp['description'] ?? "無輸入說明"); ?>  </span>
        </div>
    </div>
    <div class="canva row">
        <div class="canva-left col">
            <canvas id="pieIn"></canvas>
        </div>
        <div class="canva-left col">
            <canvas id="pieOut"></canvas>
        </div>
        <div class="canva-right col">
            <canvas id="ClasslineBar"></canvas>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-5 g-4 px-5 py-3">
        <?php foreach ($categories_select as $category_select) { ?>
            <div class="col ">
                <div class="card h-100 shadow">
                    <img src="
                <?php
                echo ($category_select['img'] == null) ? "../background/nofindpic.png" : "../img/" . $category_select['img'];
                ?>" class="card-img-top" alt="..." style="height:250px">
                    <div class="card-body ">
                        <h5 class="card-title"><?= $category_select['項目'] ?></h5>
                        <p class="card-text badge bg-Secondary text-wrap"><?php
                                                                            $category_createdtime = $category_select['日期'];
                                                                            echo date("Y 年 n 月 j 日 H 時 m 分", strtotime($category_createdtime));
                                                                            ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?= $category_select['細節']; ?></li>
                        <li class="list-group-item"><?= $category_select['金額']; ?></li>
                    </ul>
                    <div class="card-footer">
                        <small class="text-muted">
                            <?php
                            $category_time = $category_select['登載時間'];
                            echo "更新時間：";
                            echo date("Y / n / j - H 時 m 分", strtotime($category_time));
                            ?></small>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="backTop btn btn-info fs-5 border border-primary border-2" onclick="location.href='#'">Top</div>
</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

<script>
    const pieIn = document.getElementById('pieIn');
    console.log(pieIn);
    const pieOut = document.getElementById('pieOut');
    const ClasslineBar = document.getElementById('ClasslineBar');

    document.querySelector('[name="option"]').addEventListener('change', function() {
        console.log('category changed');
        const selectedCategoryId = this.value;
        const dateStart = document.getElementById('dateStart').value;
        const dateEnd = ((document.getElementById('dateEnd').value == 0) ? <?= date("Y-m-j"); ?> : document.getElementById('dateEnd').value);

        window.location.href = `?do=categories_search&category_id=${selectedCategoryId}&dateStart=${dateStart}&dateEnd=${dateEnd}`;
    });

    document.getElementById('dateStart').addEventListener('change', function() {
        console.log('start date changed'); // Debug line
        const selectedCategoryId = document.querySelector('[name="option"]').value;
        const dateStart = this.value;
        const dateEnd = ((document.getElementById('dateEnd').value == 0) ? <?= date("Y-m-j"); ?> : document.getElementById('dateEnd').value);

        window.location.href = `?do=categories_search&category_id=${selectedCategoryId}&dateStart=${dateStart}&dateEnd=${dateEnd}`;
    });

    document.getElementById('dateEnd').addEventListener('change', function() {
        console.log('end date changed'); // Debug line
        const selectedCategoryId = document.querySelector('[name="option"]').value;
        const dateStart = document.getElementById('dateStart').value;
        const dateEnd = ((this.value == 0) ? <?= date("Y-m-j"); ?> : this.value);

        window.location.href = `?do=categories_search&category_id=${selectedCategoryId}&dateStart=${dateStart}&dateEnd=${dateEnd}`;
    });

    const urlParams = new URLSearchParams(window.location.search);
    const category_id = urlParams.get('category_id');
    const dateStart = urlParams.get('dateStart');
    const dateEnd = urlParams.get('dateEnd');

    // 設定輸入欄位的值
    document.querySelector('[name="option"]').value = category_id || '';
    document.getElementById('dateStart').value = dateStart || '';
    document.getElementById('dateEnd').value = dateEnd || '';

    //以下是圓餅圖pieIn設定
    const datapieIn = {
        labels: [
            <?php
            echo "'" . join("','", array_keys($categories_select_sum)) . "'";
            ?>
        ],
        datasets: [{
            data: [
                <?php
                $values = [];
                foreach ($categories_select_sum as $select_sum) {
                    $values[] = $select_sum[0];
                }
                echo "'" . join("','", $values) . "'";
                ?>
            ],
            backgroundColor: ['#FF6AA2', '#FFD966', '#E8FF66', '#A4FF66', '#66FF86', '#66FFD9', '#66E8FF', '#669AFF', '#865EFF', '#D966FF', '#FF66E8', '#6AA3FF'],
            borderWidth: 1,
            borderColor: '#0703FF'
        }]
    };



    const optionspieIn = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
            }
        }
    };

    const pieChartIn = new Chart(pieIn, {
        type: 'pie',
        data: datapieIn,
        options: optionspieIn
    });


    //以下是圓餅圖pieOut設定
    const datapieOut = {
        labels: [
            <?php
            echo "'" . join("','", array_keys($categories_select_sum)) . "'";
            ?>
        ],
        datasets: [{
            data: [
                <?php
                $values = [];
                foreach ($categories_select_sum as $select_sum) {
                    $values[] = $select_sum[0];
                }
                echo "'" . join("','", $values) . "'";
                ?>
            ],
            backgroundColor: ['#FF2677', '#FFBD33', '#DBFF33', '#75FF33', '#33FF57', '#33FFBD', '#33DBFF', '#3375FF', '#5733FF', '#BD33FF', '#FF33DB', '#2677FF'],
            borderWidth: 1,
            borderColor: '#FF271D'
        }]
    };



    const optionspieOut = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
            }
        }
    };

    const pieChartOut = new Chart(pieOut, {
        type: 'pie',
        data: datapieOut,
        options: optionspieOut
    });


    //以下是長條圖ClasslineBar設定
    const DATA_COUNT = 12;
    const NUMBER_CFG = {
        count: DATA_COUNT,
        min: -100,
        max: 100
    };

    const datalinebar = {
        labels: [
            <?php
            echo "'" . join("','", array_keys($categories_select_sum)) . "'";
            ?>
        ],
        datasets: [{
                label: '月支出',
                data: [
                    <?php
                    $values = [];
                    foreach ($categories_select_sum as $select_sum) {
                        $values[] = $select_sum[0];
                    }
                    echo "'" . join("','", $values) . "'";
                    ?>
                ],
                borderColor: '#FF2677',
                backgroundColor: '#FFD9E7',
                borderWidth: 2,
                borderRadius: Number.MAX_VALUE,
                borderSkipped: false,
            },
            {
                label: '月收入',
                data: [
                    <?php
                    $values = [];
                    foreach ($categories_select_sum as $select_sum) {
                        $values[] = $select_sum[0];
                    }
                    echo "'" . join("','", $values) . "'";
                    ?>
                ],
                borderColor: '#4540E3',
                backgroundColor: '#47D1FD',
                borderWidth: 2,
                borderRadius: 5,
                borderSkipped: false,
            }
        ]
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