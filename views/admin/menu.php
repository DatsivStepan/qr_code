<?php
use yii\helpers\Html;
?>
<script>

</script>
<div class="col-sm-12">
    <?php        
        $class = ($this->context->getRoute() == 'admin/users')?'btn btn-default':'btn btn-primary'; 
        $class1 = ($this->context->getRoute() == 'admin/customer')?'btn btn-default':'btn btn-primary';  
        $class2 = ($this->context->getRoute() == 'admin/orders')?'btn btn-default':'btn btn-primary';  
    ?>
        <?= HTML::a(\Yii::t('app', 'Workman'), array('admin/users'),array('class'=>$class)); ?>
        <?= HTML::a(\Yii::t('app', 'Customer'), array('admin/customer'),array('class'=>$class1));?>
        <?= HTML::a(\Yii::t('app', 'Orders'), array('admin/orders'),array('class'=>$class2));?>
    </br>
</div>
