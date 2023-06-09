<!-- /前段index已載入db.php -->
<link rel="stylesheet" href="../css/style_summary_private.css">
<?php
include_once "./api/summary_private.php";
include_once "./api/summary_all.php";
?>


<div class="summary-private">
    <div class="summary-private-top"></div>
    <div class="summary-private-content">
        <div class="summary-private-content-left">
            <div class="summary-private-content-left-half">
                <div>
                    公開總收入<?= $sumIn; ?>元
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
            <div class="summary-private-content-left-half">
                <div>
                    私人總收入<?= $sumInprivate; ?>元
                </div>
                <?php
                foreach ($summary_private_in as $summary_privateIn) {
                ?>
                    <div>
                        <div><?= $summary_privateIn['類別']; ?></div>
                        <div><?= $summary_privateIn['小計']; ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="summary-private-content-center">
            <canvas id="canvaAllprivate"></canvas>
            <div class="absolute-center text-center">
                <p>外圈：私人收支</p>
                <p>內圈：公開收支</p>
            </div>
        </div>
        <div class="summary-private-content-right">
            <div class="summary-private-content-right-half">
                <div>
                    公開總支出<?= $sumOut; ?>元
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
            <div class="summary-private-content-right-half">
                <div>
                    私人總支出<?= $sumOutprivate; ?>元
                </div>
                <?php
                foreach ($summary_private_out as $summary_privateOut) {
                ?>
                    <div>
                        <div><?= $summary_privateOut['類別']; ?></div>
                        <div><?= $summary_privateOut['小計']; ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="summary-private-footer"></div>
</div>
<?php include_once "./front/vote_list.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>

<script>
    // 获取canvaAllprivate元素
    const canvaAllprivate = document.getElementById('canvaAllprivate');

    const dataprivate = {
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
    const optionsprivate = {
        responsive: true,
        cutout: '60%', // 內環半徑
        plugins: {
            legend: {
                display: true, // 圖例顯示
            }
        }
    };


    const doughnutChartoptionsprivate = new Chart(canvaAllprivate, {
        type: 'doughnut',
        data: dataprivate,
        options: optionsprivate
    });
</script>