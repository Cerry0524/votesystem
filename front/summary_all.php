<!-- /前段index已載入db.php -->
<link rel="stylesheet" href="../css/style_summary_all.css">
<?php include_once "./api/summary_all.php"; ?>


<div class="summary-all">
    <div class="summary-all-top"></div>
    <div class="summary-all-content">
        <div class="summary-all-content-left">
            <div>
                公開總收入<?=$sumIn;?>元
            </div>
            <?php
            foreach ($summary_public_in as $summary_publicIn) {
            ?>
                <div>
                    <div><?= $summary_publicIn['類別']; ?></div>
                    <div><?= $summary_publicIn['小計']; ?></div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="summary-all-content-center">
            <canvas id="canvaAll"></canvas>

        </div>
        <div class="summary-all-content-right">
            <div>
                公開總支出<?=$sumOut;?>元
            </div>
            <?php
            foreach ($summary_public_out as $summary_publicOut) {
            ?>
                <div>
                    <div><?= $summary_publicOut['類別']; ?></div>
                    <div><?= $summary_publicOut['小計']; ?></div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="summary-all-footer"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>

<script>
    // 获取canvaAll元素
    const canvaAll = document.getElementById('canvaAll');
    console.log(canvaAll);

    const datapublic = {
        labels: ['收入', '支出'],
        datasets: [{
            data: [<?=$sumIn;?>,<?=$sumOut;?>],
            backgroundColor: ['#36A2EB', '#FF6384'],
            borderWidth: 1
        }]
    };

    // 创建甜甜圈图的配置选项
    const options = {
        responsive: true,
        cutout: '60%', // 內環半徑
        plugins: {
            legend: {
                display: false // 圖例顯示
            }
        }
    };


    const doughnutChart = new Chart(canvaAll, {
        type: 'doughnut',
        data: datapublic
    });
</script>