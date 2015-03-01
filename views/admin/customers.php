<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\bootstrap\Alert;
?>
<div class="row wrap">
    <div class=col-sm-12>
        <?php if(Yii::$app->session->hasFlash('CustomerDeleted')): ?>
            <?php
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-info',
                ],
                'body' => 'Customer delete!',
            ]);
            ?>
        <?php endif; ?>

        <?php if(Yii::$app->session->hasFlash('CustomerAdd')): ?>
            <?php
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-info',
                ],
                'body' => 'Customer add!',
            ]);
            ?>
        <?php endif; ?>

        <?php if(Yii::$app->session->hasFlash('UserNotAdd')): ?>
            <?php
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-warning',
                ],
                'body' => 'User not delete!',
            ]);
            ?>
        <?php endif; ?>
    </div>
    <div class="col-sm-9 col-xs-12">
        <?php echo $this->render('menu'); ?>
        <div class="col-sm-12">
            <?php  echo $this->render('add_customer', array('modelCustomer' => $modelCustomer)); ?>
        </div>
        <div class="col-sm-12">
            <?php echo $this->render('customers_views', array('customers' => $customers, 'pagination' => $pagination, 'count' => $count)); ?>
        </div>
    </div>
</div>