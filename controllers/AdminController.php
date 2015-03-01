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

class AdminController extends Controller
{
     public $defaultAction = 'users';
    
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
        /*($users = User::find()->all();
        return $this->render('index', ['users' => $users]);*/
        //$active = 1;
        $query = User::find();
        $model = new ActiveDataProvider(['query'=>$query,'pagination'=>['pageSize'=>isset($_GET['pageSize'])?$_GET['pageSize']:6]]);
        echo $this->render('index', [
            'users'=>$model->getModels(),
            'pagination'=>$model->pagination,
            'count'=>$model->pagination->totalCount
        ]);
    }
 
//Users
    public function actionUsers() {
        $isAdmin = Yii::$app->user->identity->isAdmin(Yii::$app->user->id);
        
        if(!Yii::$app->user->isGuest){
            if((Yii::$app->user->id == '1') && ($isAdmin == true)){
                $modelUser = new User();
                $query = User::find();
                $model = new ActiveDataProvider(['query'=>$query,'pagination'=>['pageSize'=>isset($_GET['pageSize'])?$_GET['pageSize']:6]]);
                echo $this->render('users', [
                    'users'=>$model->getModels(),
                    'pagination'=>$model->pagination,
                    'count'=>$model->pagination->totalCount,
                    'modelUser'=> $modelUser
                ]);
            }else{
                $this->redirect(array('work/myorders'));
            }
        }else{
            $this->redirect(array('site/login'));
        }    
    }
    
    public function actionUsercreate() {
        $modelUser = new User();
        if ($modelUser->load(Yii::$app->request->post()) && $modelUser->save()) {
            Yii::$app->session->setFlash('UserAdd');
            return $this->redirect(['users',[ ],
            ]);
        } else {
            Yii::$app->session->setFlash('UserNotAdd');
            return $this->redirect('create', [
                'modelUser' => $modelUser,
            ]);
        }
    }

    public function actionUserdelete($id = null)
    {
        $user = User::findOne($id);
        if ($user) {
            $user->delete();
        }
        Yii::$app->session->setFlash('UserDeleted');
        $this->redirect('users');
    }
    
    public function actionUseredit($id = null)
    {
        $modelUser = User::findOne($id);
        
         if ($modelUser->load(Yii::$app->request->post()) && $modelUser->save()) {
             Yii::$app->session->setFlash('UserAdd');
                $this->redirect(array('admin/usershow', 'id' => $modelUser->id));
         }else{
             return $this->render('user_edit', ['modelUser' => $modelUser]);
         }
        
    }
    
    public function actionUsershow($id = null)
    {
        $user = User::findOne($id);
        $query = Order::find()->where(['user_id' => $id, 'stan' => 'workdone']);
        $model_done = new ActiveDataProvider(['query'=>$query,'pagination'=>['pageSize'=>isset($_GET['pageSize'])?$_GET['pageSize']:6]]);
        
        $query2 = Order::find()->where(['user_id' => $id, 'stan' => 'working']);
        $model_working = new ActiveDataProvider(['query'=>$query2,'pagination'=>['pageSize'=>isset($_GET['pageSize'])?$_GET['pageSize']:6]]);
        
        $query3 = Order::find()->where(['user_id' => $id, 'stan' => 'notwork']);
        $model_notwork = new ActiveDataProvider(['query'=>$query3,'pagination'=>['pageSize'=>isset($_GET['pageSize'])?$_GET['pageSize']:6]]);
        
        echo $this->render('user_show', [
            'modelUser' => $user,
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
//
//
    
//Customer
    public function actionCustomer() {
        $isAdmin = Yii::$app->user->identity->isAdmin(Yii::$app->user->id);
        
        if(!Yii::$app->user->isGuest){
            if((Yii::$app->user->id == '1') && ($isAdmin == true)){
                $modelCustomer = new Customer();

                $query = Customer::find();
                $model = new ActiveDataProvider(['query'=>$query,'pagination'=>['pageSize'=>isset($_GET['pageSize'])?$_GET['pageSize']:6]]);
                echo $this->render('customers', [
                    'customers'=>$model->getModels(),
                    'pagination'=>$model->pagination,
                    'count'=>$model->pagination->totalCount,
                    'modelCustomer'=> $modelCustomer
                ]);
            }else{
                $this->redirect(array('work/myorders'));
            }
        }else{
            $this->redirect(array('site/login'));
        }
        
    }
    
    public function actionCustomercreate() {
        $modelCustomer = new Customer();
        if ($modelCustomer->load(Yii::$app->request->post()) && $modelCustomer->save()) {
            Yii::$app->session->setFlash('CustomerAdd');
            return $this->redirect(['customer',[ ],
            ]);
        } else {
            Yii::$app->session->setFlash('CustomerNotAdd');
            return $this->redirect('add_customer', [
                'modelCustomer' => $modelCustomer,
            ]);
        }
    }

    public function actionCustomerdelete($id = null)
    {
        $customer = Customer::findOne($id);
        if ($customer) {
            $customer->delete();
        }
        Yii::$app->session->setFlash('CustomerDeleted');
        $this->redirect('customer');
    }
    
    public function actionCustomeredit($id = null)
    {
        $modelCustomer = Customer::findOne($id);
        
         if ($modelCustomer->load(Yii::$app->request->post()) && $modelCustomer->save()) {
             //Yii::$app->session->setFlash('UserAdd');
                $this->redirect(array('admin/customershow', 'id' => $modelCustomer->id));
         }else{
             return $this->render('customer_edit', ['modelCustomer' => $modelCustomer]);
         }
        
    }
    
    public function actionCustomershow($id = null)
    {
        $customer = Customer::findOne($id);
        //var_dump($user);exit;
        return $this->render('customer_show', ['modelCustomer' => $customer]);
    }
    
//
//

//Orders
    public function actionOrders() {
        $isAdmin = Yii::$app->user->identity->isAdmin(Yii::$app->user->id);
        
        if(!Yii::$app->user->isGuest){
            if((Yii::$app->user->id == '1') && ($isAdmin == true)){
                $modelOrder = new Order();
                $customer = ArrayHelper::map(Customer::find()->all(), 'id', 'first_name');
                $query = Order::find();
                $model = new ActiveDataProvider(['query'=>$query,'pagination'=>['pageSize'=>isset($_GET['pageSize'])?$_GET['pageSize']:6]]);
                echo $this->render('orders', [
                    'orders'=>$model->getModels(),
                    'pagination'=>$model->pagination,
                    'count'=>$model->pagination->totalCount,
                    'modelOrder'=> $modelOrder,
                    'customer'=> $customer
                ]);
            }else{
                $this->redirect(array('work/myorders'));
            }
        }else{
            $this->redirect(array('site/login'));
        }  
    }
    
    public function actionOrdercreate() {
        $modelOrder = new Order();
        if ($modelOrder->load(Yii::$app->request->post()) && $modelOrder->save()) {
            Yii::$app->session->setFlash('OrderAdd');
            return $this->redirect(['orders',[ ], ]);
        } else {
            Yii::$app->session->setFlash('OrderNotAdd');
            return $this->redirect('add_order', [
                'modelOrder' => $modelOrder,
            ]);
        }
    }
    
    public function actionOrdershow($id = null)
    {
        $order = Order::findOne($id);
        $customer = Customer::findOne($order->customer_id);
        return $this->render('order_show', ['modelOrder' => $order, 'customer' => $customer]);
    }
    
    public function actionOrderedit($id = null)
    {
        $modelOrder = Order::findOne($id);
        $customer = ArrayHelper::map(Customer::find()->all(), 'id', 'first_name');
         if ($modelOrder->load(Yii::$app->request->post()) && $modelOrder->save()) {
             Yii::$app->session->setFlash('OrderAdd');
                $this->redirect(array('admin/ordershow', 'id' => $modelOrder->id));
         }else{
             return $this->render('order_edit', ['modelOrder' => $modelOrder, 'customer' => $customer]);
         }   
    }
    
    public function actionOrderdelete($id = null)
    {
        $order = Order::findOne($id);
        if ($order) {
            $order->delete();
        }
        Yii::$app->session->setFlash('OrderDeleted');
        $this->redirect('orders');
    }
//
//
}
