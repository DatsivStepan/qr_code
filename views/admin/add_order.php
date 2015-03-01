<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\widgets\ActiveForm;
?>
<div class="row wrap">
    <div class="col-xs-12 well" style='margin-top:20px;'>
        <h3 style='margin-top:-5px;'>Customer Add</h3>
    <?php $form = ActiveForm::begin(['id' => 'PostNew', 'action' => ['admin/ordercreate']]); ?>
                    <?= $form->field($modelOrder, 'name') ?>
        <div id='OrdersCreate'>
                    <?= $form->field($modelOrder, 'addres') ?>
                    <?= $form->field($modelOrder, 'qr_code_url') ?>
                    <?= $form->field($modelOrder, 'customer_id')->dropDownList($customer); ?>
                        <?= Html::submitButton(\Yii::t('app', 'Add'), ['class' => 'btn btn-primary']) ?>
        </div>
                <?php ActiveForm::end(); ?>
    </div>
</div>