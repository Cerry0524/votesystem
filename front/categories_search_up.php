<link rel="stylesheet" href="./css/style_categoriessearch.css">
<?php include_once "./api/categories_search.php";

?>


<div class="content">
    <div class="top">
        <div class="top-left">
            <div>
                <select name="option" onchange="category_select(this)">
                    <option value="1">請選擇
                        </option>
                    <?php
                    foreach ($categories as $idx => $category) {
                    ?>
                        <option value="<?= $category['id']; ?>">
                            <?= ($idx + 1) . "." . $category['category']; ?>
                        </option>

                    <?php
                    }
                    ?>

                </select>
            </div>
            <div>
                開始日期
                <input type="date" name="dateStart" id="dateStart">
                <br>
                結束日期
                <input type="date" name="dateStart" id="dateEnd">
            </div>

        </div>
        <div class="top-right">
            說明：
            <?= $category_detp['description']; ?>
        </div>
    </div>
    <div class="canva">
        <div class="canva-left">
            canva-left
            <canvas id="ClasslineBar"></canvas>
        </div>
        <div class="canva-right">canva-right</div>
    </div>
</div>


<?php
include_once "./front/categories_search_down.php";
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>

<script>
    // 获取canvaAllprivate元素
    const ClasslineBar = document.getElementById('ClasslineBar');
    let option=document.getElementById('option');

    const datalinebar = {
        labels: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月', '三月'],
        datasets: [{
            label: '收入',
            data: [<?= $sumIn; ?>, <?= $sumOut; ?>],
            backgroundColor: ['#7EC1EE', '#FFB0C1'],
            hoverOffset: 4
        }, {
            label: '支出',
            data: [<?= $sumInprivate; ?>, <?= $sumOutprivate; ?>],
            backgroundColor: ['#36A2EB', '#FF6384'],
            hoverOffset: 4
        }]
    };

    const optionslinebar = {
        type: 'bar',
        data: data,
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

    

    function category_select(selectOpt) {
        var selectValue = selectOpt.value;
        window.location.href = "?do=categories_search_up&category_id=" + selectValue;
    }

    
</script>