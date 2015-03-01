<?php
use yii\helpers\Html;
?>
<script>

</script>
<div class="col-sm-12">
    <?php        
        $class = ($this->context->getRoute() == 'work/myorders')?'btn btn-default':'btn btn-primary'; 
        $class1 = ($this->context->getRoute() == 'work/freeorders')?'btn btn-default':'btn btn-primary';  
    ?>
        <?= HTML::a(\Yii::t('app', 'My Orders'), array('work/myorders'),array('class'=>$class)); ?>
        <?= HTML::a(\Yii::t('app', 'Free Orders'), array('work/freeorders'),array('class'=>$class1));?>
    </br>
    </br>
</div>
