<link rel="stylesheet" href="../css/style_searchsummary.css">

<?php
//判斷網址帶term跟order值來決定是遞增或遞減排序，如果沒有值預設時間遞增排序
if (!empty($_GET['term']) || !empty($_GET['order'])) {
       switch ($_GET['term']) {
              case 'time':
                     $order = "./api/summary_list_" .
                            (($_GET['order'] == 'asc') ? 'asc' : 'desc') .
                            ".php";
                     break;
       }
       include $order;
} else {
       include './api/summary_list_asc.php';
}
?>



<div class="content-top">
       <h1>收支清單</h1>
</div>
<table class="search-table">
       <tr class="search-table-tr1">
              <th style="width: 5%;"></th>
              <th class="search-table-th1">
                     <div id="timeAscBtn">
                            ▲
                     </div>
                     <div>
                            時間
                     </div>
                     <div id="timeDescBtn">
                            ▼
                     </div>
              </th>
              <th class="search-table-th2">
                     <div>
                            屬性
                     </div>
                     <div class="classBtn">
                            <div>收
                                   <input type="checkbox" id="classInBtn">
                            </div>
                            <div>支
                                   <input type="checkbox" id="classOutBtn">
                            </div>
                     </div>
              </th>
              <th class="search-table-th3">項目</th>
              <th class="search-table-th4">細節</th>
              <th class="search-table-th5">類別</th>
              <th class="search-table-th6">數量</th>
              <th class="search-table-th7">金額</th>
              <th class="search-table-th8">
                     <div class="privateBtn">
                            <div>公開
                                   <input type="checkbox" id="privateNoBtn">
                            </div>
                            <div>私人
                                   <input type="checkbox" id="privateYesBtn">
                            </div>
                     </div>
              </th>
              <th class="search-table-th9">
                     <div class="contBtn">
                            <div>持續性</div>
                            <div>否
                                   <input type="checkbox" id="contNoBtn">
                            </div>
                            <div>是
                                   <input type="checkbox" id="contYesBtn">
                            </div>
                     </div>
              </th>
              <th style="width: 5%;"></th>
       </tr>
       <?php
       foreach ($summary_lists as $summary_list) { ?>
              <tr>
                     <th style="width: 5%;"></th>
                     <td><?= $summary_list['日期']; ?></td>
                     <td><?= ($summary_list['屬性']) ? "支出" : "收入"; ?></td>
                     <td><?= $summary_list['項目']; ?></td>
                     <td><?= $summary_list['細節']; ?></td>
                     <td><?= $summary_list['類別']; ?></td>
                     <td><?= $summary_list['數量']; ?></td>
                     <td><?= $summary_list['金額']; ?></td>
                     <td><?= ($summary_list['公開/私人']) ? "私人" : "公開"; ?></td>
                     <td><?= ($summary_list['持續性']) ? "是" : "否"; ?></td>
                     <th style="width: 5%;"></th>
              </tr>
       <?php } ?>
       <tr class=lastInput>
              <th style="width: 5%;" colspan="11"></th>
       </tr>
</table>


<script>
       const timeAscBtn = document.getElementById('timeAscBtn');
       const timeDescBtn = document.getElementById('timeDescBtn');
       const classInBtn = document.getElementById('classInBtn');
       console.log(classInBtn);
       const classOutBtn = document.getElementById('classOutBtn');
       console.log(classOutBtn);
       const privateNoBtn = document.getElementById('privateNoBtn');
       console.log(privateNoBtn);
       const privateYesBtn = document.getElementById('privateYesBtn');
       console.log(privateYesBtn);
       const contNoBtn = document.getElementById('contNoBtn');
       console.log(contNoBtn);
       const contYesBtn = document.getElementById('contYesBtn');
       console.log(contYesBtn);

       let url = new URLSearchParams(window.location.search);
       let urlClass = url.get('class');
       let urlPrivate = url.get('private');
       let urlCont = url.get('cont');


       function time(timeOrder) {
              switch (timeOrder) {
                     case 'asc':
                            return '&time=asc';
                            break;
                     case 'desc':
                            return '&time=desc';
                            break;
                     default:
                            return '&time=asc';
                            break;
              }

       }

       function classBtn() {
              if (classInBtn.checked && classOutBtn.checked) {
                     // console.log('All');
                     return '&class=all';
              } else if (classInBtn.checked) {
                     // console.log('In');
                     return '&class=in';
              } else if (classOutBtn.checked) {
                     // console.log('Out');
                     return '&class=out';
              } else {
                     // console.log('none');
                     return '&class=none';
              }
       }

       function privateBtn() {
              if (privateYesBtn.checked && privateNoBtn.checked) {
                     // console.log('All');
                     return '&private=all';
              } else if (privateYesBtn.checked) {
                     // console.log('yes');
                     return '&private=yes';
              } else if (privateNoBtn.checked) {
                     // console.log('no');
                     return '&private=no';
              } else {
                     // console.log('none');
                     return '&private=none';
              }
       }

       function contBtn() {
              if (contYesBtn.checked && contNoBtn.checked) {
                     // console.log('All');
                     return '&cont=all';
              } else if (contYesBtn.checked) {
                     // console.log('yes');
                     return '&cont=yes';
              } else if (contNoBtn.checked) {
                     // console.log('no');
                     return '&cont=no';
              } else {
                     // console.log('none');
                     return '&cont=none';
              }
       }

       function newurl(timeOrder) {
              // console.log('url');
              location.href = '?do=summary_list' + time(timeOrder) + classBtn() + privateBtn() + contBtn();

       }

       switch (urlClass) {
              case 'all':
                     classInBtn.checked = true;
                     classOutBtn.checked = true;
                     break;
              case 'in':
                     classInBtn.checked = true;
                     break;
              case 'out':
                     classOutBtn.checked = true;
                     break;
              case 'none':
                     break;
       }

       switch (urlPrivate) {
              case 'all':
                     privateYesBtn.checked = true;
                     privateNoBtn.checked = true;
                     break;
              case 'yes':
                     privateYesBtn.checked = true;
                     break;
              case 'no':
                     privateNoBtn.checked = true;
                     break;
              case 'none':
                     break;
       }

       switch (urlCont) {
              case 'all':
                     contYesBtn.checked = true;
                     contNoBtn.checked = true;
                     break;
              case 'yes':
                     contYesBtn.checked = true;
                     break;
              case 'no':
                     contNoBtn.checked = true;
                     break;
              case 'none':
                     break;
       }

       timeAscBtn.addEventListener('click', function() {
              newurl('asc');
       });
       timeDescBtn.addEventListener('click', function() {
              newurl('desc');
       });
       classInBtn.addEventListener('change', function() {
              newurl();
       });
       classOutBtn.addEventListener('change', function() {
              newurl();
       });
       privateNoBtn.addEventListener('change', function() {
              newurl();
       });
       privateYesBtn.addEventListener('change', function() {
              newurl();
       });
       contNoBtn.addEventListener('change', function() {
              newurl();
       });
       contYesBtn.addEventListener('change', function() {
              newurl();
       });
</script>