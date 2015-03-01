<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;;
?>
<div class="row wrap" style="padding:20px;">
<?php
    $form = ActiveForm::begin(array('options' => array('class' => 'form-vertical')));
    echo $form->field($modelOrder, 'name')->textInput(array());
    echo $form->field($modelOrder, 'addres')->textInput(array());
    echo $form->field($modelOrder, 'customer_id')->dropDownList($customer);
    echo $form->field($modelOrder, 'qr_code_url')->textInput(array());
?>

<div class="form-actions">
    <?php echo Html::submitButton($modelOrder->isNewRecord ? \Yii::t('app', 'Save') : \Yii::t('app', 'Update'), array('class' => 'btn btn-primary')); ?>
</div>

<?php ActiveForm::end(); ?>
</div>