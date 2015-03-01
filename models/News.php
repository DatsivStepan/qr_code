<?php

namespace app\models;

class News extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'news';
    }
    
    public static function primaryKey()
    {
        return array('id');
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'контент',
            'create_time' => 'create_time',
            'group_id' => 'Group_id',
            );
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord)
        {
            //$this->user_id = \Yii::$app->user->id;
            $this->create_time = date("Y-m-d H:i:s");
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
            [['title', 'content','group_id'], 'required'],
        ];
    }

}
