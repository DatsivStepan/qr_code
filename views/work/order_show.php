<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\bootstrap\Alert;
?>
<div class="row wrap" style="padding:20px;">
            <?php if(Yii::$app->session->hasFlash('NotWorking')): ?>
            <?php
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-danger',
                ],
                'body' => 'You have work! first complete one job',
            ]);
            ?>
        <?php endif; ?>
    <?php 
    if(($modelOrder->user_id == Yii::$app->user->id) || ($modelOrder->user_id == '1')){
            ?>
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <td><b>#</b></td>
                        <td><b>Нік-нейм</b></td>
                        <td><b>E-mail</b></td>
                        <td><b>Ім'я</b></td>
                        <td><b>Прізвище</b></td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td><?= $modelOrder->id; ?></td>
                        <td><?= $modelOrder->name; ?></td>
                        <td><?= $modelOrder->addres; ?></td>
                        <td><?= $customer->first_name; ?></td>
                        <td><?= $customer->last_name; ?></td>
                        <td><?= $customer->e_mail; ?></td>
                    </tr>
                </tbody>
            </table>
                
            <?php
            switch ($modelOrder->stan){
                            case 'workdone':
                                $order_url = 'myorders_done_show';
                                break;
                            case 'notwork':
                                $order_url = '';
                                //$order_url = 'myorders_notwork_show';
                                echo Html::a('Get Started', array('work/getstarted', 'id' => $modelOrder->id), array('class' =>'btn btn-default'));
                                break;
                            case 'working':
                                $order_url = 'myorders_working_show';
                                break;
                            default:
                                $order_url = '';
            }
            if($order_url){
                echo $this->render($order_url,['modelOrder' => $modelOrder]);
            }
        }else{
            if($modelOrder->user_id == '0'){
                ?>
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <td><b>#</b></td>
                            <td><b>Name</b></td>
                            <td><b>Addres</b></td>
                            <td><b>Customer</b></td>
                            <td><b>Customer e_mail</b></td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td><?= $modelOrder->id; ?></td>
                            <td><?= $modelOrder->name; ?></td>
                            <td><?= $modelOrder->addres; ?></td>
                            <td><?= $customer->first_name.' '.$customer->last_name; ?></td>
                            <td><?= $customer->e_mail; ?></td>
                            <td><?php echo Html::a('Взяти', array('work/takeorder', 'id' => $modelOrder->id), array('class' =>'btn btn-default')); ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php
            }else{
                echo Alert::widget([
                'options' => [
                    'class' => 'alert-danger',
                ],
                'body' => 'sorry but this orders busy',
            ]);
            }
        }
    ?>
</div>