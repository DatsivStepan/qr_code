<?php

namespace app\models;

class Group extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'groups';
    }
    
    public static function primaryKey()
    {
        return array('id');
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Group_name',
            'group_url' => 'Group_url',
            );
    }
}
