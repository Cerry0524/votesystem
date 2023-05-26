<link rel="stylesheet" href="../css/style_searchsummary.css">
<?php
$sql_summary_lists = "SELECT `summary`.`effective_time` as '日期',
                             `summary`.`class` as '屬性',
                             `summary`.`project` as '項目',
                             `summary`.`details` as '細節',
                             `categories`.`category` as '類別',
                             `summary`.`amount` as '數量',
                             `summary`.`price` as '金額',
                             `summary`.`private` as '公開/私人',
                             `summary`.`continuous` as '持續性'
                   FROM `summary`,`categories`
                   WHERE `summary`.`category_id`=`categories`.`id`
                   Order By `summary`.`effective_time`";

$summary_lists = $pdo->query($sql_summary_lists)->fetchALL(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($summary_lists);
// echo "</pre>";
?>
<div class="content-top"><h1>收支清單</h1></div>
<table class="search-table">
       <tr class="search-table-tr1">
              <th style="width: 5%;"></th>
              <th class="search-table-th1">時間</th>
              <th class="search-table-th2">屬性</th>
              <th class="search-table-th3">項目</th>
              <th class="search-table-th4">細節</th>
              <th class="search-table-th5">類別</th>
              <th class="search-table-th6">數量</th>
              <th class="search-table-th7">金額</th>
              <th class="search-table-th8">公開/私人</th>
              <th class="search-table-th9">持續性</th>
              <th style="width: 5%;"></th>
       </tr>
       <?php
       foreach ($summary_lists as $summary_list) { ?>
              <tr>
                     <th style="width: 5%;"></th>
                     <td><?= $summary_list['日期']; ?></td>
                     <td><?= ($summary_list['屬性'])?"支出":"收入"; ?></td>
                     <td><?= $summary_list['項目']; ?></td>
                     <td><?= $summary_list['細節']; ?></td>
                     <td><?= $summary_list['類別']; ?></td>
                     <td><?= $summary_list['數量']; ?></td>
                     <td><?= $summary_list['金額']; ?></td>
                     <td><?= ($summary_list['公開/私人'])?"私人":"公開"; ?></td>
                     <td><?= ($summary_list['持續性'])?"是":"否"; ?></td>
                     <th style="width: 5%;"></th>
              </tr>
       <?php } ?>
       <tr class=lastInput>
            <th style="width: 5%;" colspan="11"></th>
        </tr>
</table>