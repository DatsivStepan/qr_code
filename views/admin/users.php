<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\bootstrap\Alert;
?>
<div class="row wrap">
    <div class=col-sm-12>
        <?php if(Yii::$app->session->hasFlash('UserDeleted')): ?>
            <?php
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-info',
                ],
                'body' => 'User delete!',
            ]);
            ?>
        <?php endif; ?>

        <?php if(Yii::$app->session->hasFlash('UserAdd')): ?>
            <?php
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-info',
                ],
                'body' => 'User add!',
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
            <?php echo $this->render('add_user', array('modelUser' => $modelUser)); ?>
        </div>
        <div class="col-sm-12">
            <?php echo $this->render('users_views', array('users' => $users, 'pagination' => $pagination, 'count' => $count)); ?>
        </div>
    </div>
</div>