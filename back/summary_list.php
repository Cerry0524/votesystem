<link rel="stylesheet" href="../css/style_summarylist.css">

<?php include './api/summary_list.php'; ?>



<div class="content-top">
       <h1>收支清單</h1>
</div>
<table class="search-table table table-hover table-striped">
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
       //綁定按鈕不可以拉到function後面去，程式會失效
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

       let url = new URLSearchParams(window.location.search); //取得新網址
       let urlClass = url.get('class'); //解析新網址get class值
       let urlPrivate = url.get('private'); //解析新網址get private值
       let urlCont = url.get('cont'); //解析新網址get cont值

       let clickOrder = []; //宣告按鈕陣列
       let button = [
              'timeAscBtn',
              'timeDescBtn',
              'projAscBtn',
              'projDescBtn',
              'detailAscBtn',
              'detailDescBtn',
              'cateAscBtn',
              'cateDescBtn',
              'amontAscBtn',
              'amontDescBtn',
              'priceAscBtn',
              'priceDescBtn',
       ];

       function time(timeOrder) { //時間排序
              switch (timeOrder) {
                     case 'asc':
                            return '&time=asc';
                            break;
                     case 'desc':
                            return '&time=desc';
                            break;
                     default:
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
                     default:
                            return '&proj=asc';
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
                     default:
                            return '&detail=asc';
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
                     default:
                            return '&cate=asc';
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
                     default:
                            return '&amont=asc';
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
                     default:
                            return '&price=asc';
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

       function newurl( //輸出新網址
              timeOrder,
              projOrder,
              detailOrder,
              cateOrder,
              amontOrder,
              priceOrder,
              oldClickOrderString
       ) {
              let urlFinal = '?do=summary_list' +
                     time(timeOrder) +
                     classBtn() +
                     proj(projOrder) +
                     detail(detailOrder) +
                     cate(cateOrder) +
                     amont(amontOrder) +
                     price(priceOrder) +
                     privateBtn() +
                     contBtn() +
                     '&btn=' +
                     oldClickOrderString;
              location.href = urlFinal;
       }

       function handleClick(event) { //抓取網址列get數值配合監聽click按鈕以switch配合buttonId輸出n輸出newurl
              const buttonId = event.target.id;
              let newclickOrder = clickOrder.filter(function(tmpClick) { //filter：基於指定的條件過濾陣列中的元素

                     return !tmpClick.startsWith(buttonId.substring(0, 3)) && tmpClick !== buttonId;
                     //startsWith(）特定字串開頭，用substring抓前3個字母一樣的
              });

              clickOrder = newclickOrder;
              clickOrder.push(buttonId); //把buttonId放到clickOrder陣列尾巴（PUSH指令）
              let newclickOrderString = clickOrder.map(function(buttonId) {
                     let index = button.indexOf(buttonId);
                     return index + 1;
              }).toString();

              oldClickOrderString = newclickOrderString;

              const timeOrder = url.get('time');
              const projOrder = url.get('proj');
              const detailOrder = url.get('detail');
              const cateOrder = url.get('cate');
              const amontOrder = url.get('amont');
              const priceOrder = url.get('price');



              switch (buttonId) {
                     case 'timeAscBtn':

                            newurl('asc', projOrder, detailOrder, cateOrder, amontOrder, priceOrder, newclickOrderString);
                            break;
                     case 'timeDescBtn':

                            newurl('desc', projOrder, detailOrder, cateOrder, amontOrder, priceOrder, newclickOrderString);
                            break;
                     case 'projAscBtn':

                            newurl(timeOrder, 'asc', detailOrder, cateOrder, amontOrder, priceOrder, newclickOrderString);
                            break;
                     case 'projDescBtn':

                            newurl(timeOrder, 'desc', detailOrder, cateOrder, amontOrder, priceOrder, newclickOrderString);
                            break;
                     case 'detailAscBtn':

                            newurl(timeOrder, projOrder, 'asc', cateOrder, amontOrder, priceOrder, newclickOrderString);
                            break;
                     case 'detailDescBtn':

                            newurl(timeOrder, projOrder, 'desc', cateOrder, amontOrder, priceOrder, newclickOrderString);
                            break;
                     case 'cateAscBtn':

                            newurl(timeOrder, projOrder, detailOrder, 'asc', amontOrder, priceOrder, newclickOrderString);
                            break;
                     case 'cateDescBtn':

                            newurl(timeOrder, projOrder, detailOrder, 'desc', amontOrder, priceOrder, newclickOrderString);
                            break;
                     case 'amontAscBtn':

                            newurl(timeOrder, projOrder, detailOrder, cateOrder, 'asc', priceOrder, newclickOrderString);
                            break;
                     case 'amontDescBtn':

                            newurl(timeOrder, projOrder, detailOrder, cateOrder, 'desc', priceOrder, newclickOrderString);
                            break;
                     case 'priceAscBtn':

                            newurl(timeOrder, projOrder, detailOrder, cateOrder, amontOrder, 'asc', newclickOrderString);
                            break;
                     case 'priceDescBtn':

                            newurl(timeOrder, projOrder, detailOrder, cateOrder, amontOrder, 'desc', newclickOrderString);
                            break;

              }

       }

       switch (urlClass) { //抓取新網址數值設定收支checkbox狀態
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

       switch (urlPrivate) { //抓取新網址數值設定公開checkbox狀態
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

       switch (urlCont) { //抓取新網址數值設定持續checkbox狀態
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

       //下方開始均為監聽設定
       timeAscBtn.addEventListener('click', handleClick);
       timeDescBtn.addEventListener('click', handleClick);
       projAscBtn.addEventListener('click', handleClick);
       projDescBtn.addEventListener('click', handleClick);
       detailAscBtn.addEventListener('click', handleClick);
       detailDescBtn.addEventListener('click', handleClick);
       cateAscBtn.addEventListener('click', handleClick);
       cateDescBtn.addEventListener('click', handleClick);
       amontAscBtn.addEventListener('click', handleClick);
       amontDescBtn.addEventListener('click', handleClick);
       priceAscBtn.addEventListener('click', handleClick);
       priceDescBtn.addEventListener('click', handleClick);


       classInBtn.addEventListener('change', newurl);
       classOutBtn.addEventListener('change', newurl);
       privateNoBtn.addEventListener('change', newurl);
       privateYesBtn.addEventListener('change', newurl);
       contNoBtn.addEventListener('change', newurl);
       contYesBtn.addEventListener('change', newurl);
</script>