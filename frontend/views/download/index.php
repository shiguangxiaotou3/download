<?php

use \yii\web\View;
use \common\widgets\Code;
use \ShiGuangXiaoTou\models\PrintTable;

/** @var $this View */
/** @var $data array */


$th = ['目录', "名称", "拓展名", "大小", '类型', "创建时间", "权限"];
$str = isset($data) ? PrintTable::Print_table($data, $th) : "";
?>

<div class="wrapper">
    <h1>时光小偷的代理下载插件:1.0.0</h1>
    <p><b>你可以使用控制台或者浏览器,创建下载任务和下载文件</b></p>
    <p>以下命令可以使用:</p>
    <pre><code></code></pre>
    <im alt="asd"></im>
    <p> 文件列表:</p>
    <?= Code::widget([
        'theme' => "",
        'language' => 'php',
        'title' => 'Files',
        'code' => $str,
    ]) ?>
    <p>Visits</p>
    <!--    <div id="world-map-markers" style="height: 325px;"></div>-->
</div>