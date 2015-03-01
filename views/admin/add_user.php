<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\widgets\ActiveForm;
?>
<div class="row wrap">
    <div class="col-xs-12 well" style='margin-top:20px;'>
        <h3 style='margin-top:-5px;'>User Add</h3>
    <?php $form = ActiveForm::begin(['id' => 'PostNew', 'action' => ['admin/usercreate']]); ?>
                    <?= $form->field($modelUser, 'username') ?>
        <div id='UserGreate'>
                    <?= $form->field($modelUser, 'e_mail') ?>
                    <?= $form->field($modelUser, 'password')->passwordInput() ?>
                    <?= $form->field($modelUser, 'first_name') ?>
                    <?= $form->field($modelUser, 'last_name') ?>
                        <?= Html::submitButton(\Yii::t('app', 'Add'), ['class' => 'btn btn-primary']) ?>
        </div>
                <?php ActiveForm::end(); ?>
    </div>
</div>