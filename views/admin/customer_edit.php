<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;;
?>
<div class="row wrap" style="padding:20px;">
<?php
    $form = ActiveForm::begin(array('options' => array('class' => 'form-vertical')));
    echo $form->field($modelCustomer, 'first_name')->textInput(array());
    echo $form->field($modelCustomer, 'last_name')->textInput(array());
    echo $form->field($modelCustomer, 'e_mail')->textInput(array());
?>

<div class="form-actions">
    <?php echo Html::submitButton($modelCustomer->isNewRecord ? \Yii::t('app', 'Save') : \Yii::t('app', 'Update'), array('class' => 'btn btn-primary')); ?>
</div>

<?php ActiveForm::end(); ?>
</div>