<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;;
?>
<div class="row wrap" style="padding:20px;">
<?php
    $form = ActiveForm::begin(array('options' => array('class' => 'form-vertical')));
    echo $form->field($modelUser, 'username')->textInput(array());
    echo $form->field($modelUser, 'password')->textInput(array());
    echo $form->field($modelUser, 'first_name')->textInput(array());
    echo $form->field($modelUser, 'last_name')->textInput(array());
    echo $form->field($modelUser, 'e_mail')->textInput(array());
?>

<div class="form-actions">
    <?php echo Html::submitButton($modelUser->isNewRecord ? \Yii::t('app', 'Save') : \Yii::t('app', 'Update'), array('class' => 'btn btn-primary')); ?>
</div>

<?php ActiveForm::end(); ?>
</div>