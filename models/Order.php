<?php

namespace app\models;

class Order extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'orders';
    }
    
    public static function primaryKey()
    {
        return array('id');
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'addres' => 'Adress',
            'customer_id' => 'customer',
            'date' => 'create_time',
            'name' => 'name',
            'stan' => 'stan',
            'qr_code_url' => 'Qr code url',
            'date_start_work' => 'Date start work',
            'status_work' => 'Status work',
            );
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord)
        {
            //$this->user_id = \Yii::$app->user->id;
            $this->date = date("Y-m-d H:i:s");
//            $this->created = new Expression('NOW()');
//            $command = static::getDb()->createCommand("select max(id) as id from posts")->queryAll();
//            $this->id = $command[0]['id'] + 1;
        }

//        $this->updated = new Expression('NOW()');
        return parent::beforeSave($insert);
    }
    
    public function rules()
    {
        return [
            [['addres', 'customer_id','qr_code_url','name'], 'required'],
        ];
    }

}
