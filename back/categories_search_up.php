<link rel="stylesheet" href="./css/style_categoriessearch.css">
<?php include_once "./api/categories_search.php";

?>


<div class="content">
    <div class="top">
        <div class="top-left">
            <select onchange="category_select(this)">
                <option value="1">請選擇</option>
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
        <div class="top-right"><?= $category_detp['description']; ?></div>
    </div>
    <div class="canva">
        <div class="canva-left">
            <canvas id="ClasslineBar"></canvas>
        </div>
        <div class="canva-right">canva-righ</div>
    </div>
</div>


<?php
include_once "./back/categories_search_down.php";
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>

<script>
    // 获取canvaAllprivate元素
    const ClasslineBar = document.getElementById('ClasslineBar');

    const datalinebar = {
        labels: ['收入', '支出'],
        datasets: [{
            label: '公開',
            data: [<?= $sumIn; ?>, <?= $sumOut; ?>],
            backgroundColor: ['#7EC1EE', '#FFB0C1'],
            hoverOffset: 4
        }, {
            label: '私人',
            data: [<?= $sumInprivate; ?>, <?= $sumOutprivate; ?>],
            backgroundColor: ['#36A2EB', '#FF6384'],
            hoverOffset: 4
        }]
    };

    // 创建甜甜圈图的配置选项
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
                    text: '類別分析'
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
        let selectValue = selectOpt.value;
        window.location.href = "?do=categories_search_up&category_id=" + selectValue;
    }
</script>