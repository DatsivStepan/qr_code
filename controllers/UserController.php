<?php

namespace app\controllers;
use yii\data\Pagination;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Image;
use app\models\Post;
use yii\helpers\ArrayHelper;

use yii\data\ActiveDataProvider;

class UserController extends Controller
{
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

    public function actionShow($username=null)
    {
        $user = User::findByUsername($username);

        return $this->render('show', ['modelUser' => $user]);
    }

//    public function actionProfile($username=null)
//    {
//        $user = User::findByUsername($username);
//        $image = new Image();
//
//        return $this->render('profile', ['modelUser' => $user, 'modelImage' => $image]);
//    }
//    
//    public function actionEdit($id)
//    {
//        if($model = User::findOne($id)){
//            $model->scenario = 'profile';
//                if ($model->load($_POST)) {
//                    if ($model->save()){
//                        $this->redirect(array('user/profile', 'username'=>$model->username));
//                    }
//                }else{
//                    echo $this->render('edit', array('model' => $model));
//            }
//        }
//        
//    }
//
//    public function actionPosts($username=null)
//    {
//        $user = User::findByUsername($username);
//        $image = new Image();
//
//        return $this->render('posts', ['modelUser' => $user, 'modelImage' => $image]);
//    }

}
