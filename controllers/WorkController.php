<?php

namespace app\controllers;
use yii\data\Pagination;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Image;
use app\models\Customer;
use app\models\Order;
use app\models\Post;
use yii\helpers\ArrayHelper;

use yii\data\ActiveDataProvider;

class WorkController extends Controller
{
    public $defaultAction = 'myorders';
    
    public function actions()
    {
        return array(
            'error' => array(
                'class' => 'yii\web\ErrorAction',
            ),
            'captcha' => array(
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ),
        );
    }

    public function actionIndex() {
        
    }
    
    public function actionMyorders() {
        $query = Order::find()->where(['user_id' => Yii::$app->user->id, 'stan' => 'workdone']);
        $model_done = new ActiveDataProvider(['query'=>$query,'pagination'=>['pageSize'=>isset($_GET['pageSize'])?$_GET['pageSize']:6]]);
        
        $query2 = Order::find()->where(['user_id' => Yii::$app->user->id, 'stan' => 'working']);
        $model_working = new ActiveDataProvider(['query'=>$query2,'pagination'=>['pageSize'=>isset($_GET['pageSize'])?$_GET['pageSize']:6]]);
        
        $query3 = Order::find()->where(['user_id' => Yii::$app->user->id, 'stan' => 'notwork']);
        $model_notwork = new ActiveDataProvider(['query'=>$query3,'pagination'=>['pageSize'=>isset($_GET['pageSize'])?$_GET['pageSize']:6]]);
        
        echo $this->render('myorders', [
            'myOrders_done'=>$model_done->getModels(),
            'pagination_done'=>$model_done->pagination,
            'count_done'=>$model_done->pagination->totalCount,
            
            'myOrders_working'=>$model_working->getModels(),
            'pagination_working'=>$model_working->pagination,
            'count_working'=>$model_working->pagination->totalCount,
            
            'myOrders_notwork'=>$model_notwork->getModels(),
            'pagination_notwork'=>$model_notwork->pagination,
            'count_notwork'=>$model_notwork->pagination->totalCount
        ]);
    }
    
    public function actionFreeorders() {
        $query = Order::find()->where(['user_id' => '0']);
        $model = new ActiveDataProvider(['query'=>$query,'pagination'=>['pageSize'=>isset($_GET['pageSize'])?$_GET['pageSize']:5]]);
        echo $this->render('freeorders', [
            'freeOrders'=>$model->getModels(),
            'pagination'=>$model->pagination,
            'count'=>$model->pagination->totalCount
        ]);
    }
    
    public function actionOrdershow($id = null)
    {
        $order = Order::findOne($id);
        $customer = Customer::findOne($order->customer_id);
        return $this->render('order_show', ['modelOrder' => $order, 'customer' => $customer]);
    }
    
    public function actionTakeorder($id = null)
    {
        $modelOrder = Order::findOne($id);
        $modelOrder->stan = 'notwork';
        $modelOrder->user_id = Yii::$app->user->id;
        if($modelOrder->save()){
            return $this->redirect('myorders');
        }else{
            return $this->redirect('freeorders');
        }
    }
    
    public function actionGetstarted($id = null)
    {
        $query = Order::find()->where(['user_id' => Yii::$app->user->id])->all();
        $dozvil = '';
        foreach($query as $order){
            if($order->stan == 'working'){
                $dozvil = 'notDozvil';
            }  
        };
        if($dozvil != 'notDozvil'){
            $modelOrder = Order::findOne($id);
            $modelOrder->stan = 'working';
            $modelOrder->save();
            //var_dump($modelOrder);exit;
            if($modelOrder->save()){
                return $this->redirect('myorders');
            }else{
                return $this->redirect('freeorders');
            }
        }else{
            Yii::$app->session->setFlash('NotWorking');
            return $this->redirect(array('ordershow', 'id' => $id));
        }
        
    }
    
    public function actionQrcode() {
        $order_id = $_POST['id'];
        $scanerText = $_POST['scanText'];
        $modelOrder = Order::findOne(['id' => $order_id, 'qr_code_url' => $scanerText]);
        if($modelOrder == null){
            $status = 'Відсканований код неспівпав з кодом даного замовлення!';
        }else{
            $modelOrder = Order::findOne($order_id);
            switch ($modelOrder->status_work){
                case 'start':
                    $modelOrder->status_work = 'end';
                    $modelOrder->stan = 'workdone';
                    $modelOrder->save();
                    $status = 'Робота над цим замовленням закінчина';
                    break;
                case 'end':
                    //$status = 'false';
                    $status = 'Робота над цим замовленням зроблена';
                    break;
                case '':
                    $status = 'Почата робота над замовленням';
                    $modelOrder->status_work = 'start';
                    $modelOrder->date_start_work = date("Y-m-d H:i:s");
                    $modelOrder->save();
                    break;
            }     
        }
        return \yii\helpers\Json::encode($status);
    }
}
