<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\bootstrap\Alert;
?>
<div class="row wrap">
    <h2>Orders Done Show</h2>
    <div class="col-sm-12">
        <div id="text_qr"><?= $modelOrder->qr_code_url; ?></div>
        <div id="canva_qr"></div>
    </div>
</div>
