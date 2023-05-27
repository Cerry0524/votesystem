<link rel="stylesheet" href="../css/style_summarylist.css">

<?php include './api/summary_list.php'; ?>



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
              <th class="search-table-th3">
                     <div id="projAscBtn">
                            ▲
                     </div>
                     <div>
                            項目
                     </div>
                     <div id="projDescBtn">
                            ▼
                     </div>
              </th>
              <th class="search-table-th4">
                     <div id="detailAscBtn">
                            ▲
                     </div>
                     <div>
                            細節
                     </div>
                     <div id="detailDescBtn">
                            ▼
                     </div>
              </th>
              <th class="search-table-th5">
                     <div id="cateAscBtn">
                            ▲
                     </div>
                     <div>
                            類別
                     </div>
                     <div id="cateDescBtn">
                            ▼
                     </div>
              </th>
              <th class="search-table-th6">
                     <div id="amontAscBtn">
                            ▲
                     </div>
                     <div>
                            數量
                     </div>
                     <div id="amontDescBtn">
                            ▼
                     </div>
              </th>
              <th class="search-table-th7">
                     <div id="priceAscBtn">
                            ▲
                     </div>
                     <div>
                            金額
                     </div>
                     <div id="priceDescBtn">
                            ▼
                     </div>
              </th>
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
                            <div>固定收支</div>
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
                     <td><?= ($summary_list['持續性']) ? "是" : ""; ?></td>
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

       const projAscBtn = document.getElementById('projAscBtn');
       const projDescBtn = document.getElementById('projDescBtn');

       const detailAscBtn = document.getElementById('detailAscBtn');
       const detailDescBtn = document.getElementById('detailDescBtn');

       const cateAscBtn = document.getElementById('cateAscBtn');
       const cateDescBtn = document.getElementById('cateDescBtn');

       const amontAscBtn = document.getElementById('amontAscBtn');
       const amontDescBtn = document.getElementById('amontDescBtn');

       const priceAscBtn = document.getElementById('priceAscBtn');
       const priceDescBtn = document.getElementById('priceDescBtn');


       const classInBtn = document.getElementById('classInBtn');
       const classOutBtn = document.getElementById('classOutBtn');

       const privateNoBtn = document.getElementById('privateNoBtn');
       const privateYesBtn = document.getElementById('privateYesBtn');

       const contNoBtn = document.getElementById('contNoBtn');
       const contYesBtn = document.getElementById('contYesBtn');


       let url = new URLSearchParams(window.location.search);
       let urlClass = url.get('class');
       let urlPrivate = url.get('private');
       let urlCont = url.get('cont');

       let clickOrder = [];
       let buttons = [
              'timeAscBtn', 'timeDescBtn',
              'projAscBtn', 'projDescBtn',
              'detailAscBtn', 'detailDescBtn',
              'cateAscBtn', 'cateDescBtn',
              'amontAscBtn', 'amontDescBtn',
              'priceAscBtn', 'priceDescBtn'
       ];
       //定義按鈕陣列

       function time(timeOrder) { //時間排序
              switch (timeOrder) {
                     case 'asc':
                            return '&time=asc';
                            break;
                     case 'desc':
                            return '&time=desc';
                            break;
              }

       }

       function proj(projOrder) { //項目排序
              switch (projOrder) {
                     case 'asc':
                            return '&proj=asc';
                            break;
                     case 'desc':
                            return '&proj=desc';
                            break;
              }

       }

       function detail(detailOrder) { //細節排序
              switch (detailOrder) {
                     case 'asc':
                            return '&detail=asc';
                            break;
                     case 'desc':
                            return '&detail=desc';
                            break;
              }

       }

       function cate(cateOrder) { //類別排序
              switch (cateOrder) {
                     case 'asc':
                            return '&cate=asc';
                            break;
                     case 'desc':
                            return '&cate=desc';
                            break;
              }

       }

       function amont(amontOrder) { //數量排序
              switch (amontOrder) {
                     case 'asc':
                            return '&amont=asc';
                            break;
                     case 'desc':
                            return '&amont=desc';
                            break;
              }

       }

       function price(priceOrder) { //金額排序
              switch (priceOrder) {
                     case 'asc':
                            return '&price=asc';
                            break;
                     case 'desc':
                            return '&price=desc';
                            break;
              }

       }

       function classBtn() { //收支選擇
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

       function privateBtn() { //公開選擇
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

       function contBtn() { //固定收支選擇
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

       function newurl(
              timeOrder,
              projOrder,
              detailOrder,
              cateOrder,
              amontOrder,
              priceOrder) {
                     
              location.href = '?do=summary_list' +
                     time(timeOrder) +
                     classBtn() +
                     proj(projOrder) +
                     detail(detailOrder) +
                     cate(cateOrder) +
                     amont(amontOrder) +
                     price(priceOrder) +
                     privateBtn() +
                     contBtn() ;
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

       projAscBtn.addEventListener('click', function() {
              newurl('asc');
       });
       projDescBtn.addEventListener('click', function() {
              newurl('desc');
       });

       detailAscBtn.addEventListener('click', function() {
              newurl('asc');
       });
       detailDescBtn.addEventListener('click', function() {
              newurl('desc');
       });

       cateAscBtn.addEventListener('click', function() {
              newurl('asc');
       });
       cateDescBtn.addEventListener('click', function() {
              newurl('desc');
       });

       amontAscBtn.addEventListener('click', function() {
              newurl('asc');
       });
       amontDescBtn.addEventListener('click', function() {
              newurl('desc');
       });

       priceAscBtn.addEventListener('click', function() {
              newurl('asc');
       });
       priceDescBtn.addEventListener('click', function() {
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