<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\widgets\ActiveForm;
?>
<div class="row wrap">
    <div class="col-xs-12 well" style='margin-top:20px;'>
        <h3 style='margin-top:-5px;'>Customer Add</h3>
    <?php $form = ActiveForm::begin(['id' => 'PostNew', 'action' => ['admin/customercreate']]); ?>
                    <?= $form->field($modelCustomer, 'first_name') ?>
        <div id='CustomerCreate'>
                    <?= $form->field($modelCustomer, 'e_mail') ?>
                    <?= $form->field($modelCustomer, 'last_name') ?>
                        <?= Html::submitButton(\Yii::t('app', 'Add'), ['class' => 'btn btn-primary']) ?>
        </div>
                <?php ActiveForm::end(); ?>
    </div>
</div>