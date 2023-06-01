<!-- /前段index已載入db.php -->
<div class="summary-private">
    <div class="summary-private-top">上方空白</div>
    <div class="summary-private-content">
        <div class="summary-private-content-left">本月收入</div>
        <div class="summary-private-content-center"><canvas id="canvaPriv">JJJ</canvas></div>
        <div class="summary-private-content-right">本月支出</div>
    </div>
    <div class="summary-private-footer">下方空白</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>

<script>
    var canvaPriv = document.getElementById('canvaPriv');
    console.log(canvaPriv);

    var data = {
        labels: ['收入', '支出'],
        datasets: [{
            data: [500, 300], // 數據data
            backgroundColor: ['#36A2EB', '#FF6384'], // 自訂顏色
            borderWidth: 0
        }]
    };

    // 创建甜甜圈图的配置选项
    var options = {
        responsive: true,
        cutout: '60%', // 內環半徑
        plugins: {
            legend: {
                display: false //不顯示圖例
            }
        }
    };

    // 创建甜甜圈图实例
    var doughnutChart = new Chart(canvaPriv, {
        type: 'doughnut',
        data: data
    });
</script>