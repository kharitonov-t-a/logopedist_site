<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messege".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $question
 * @property string $datequestion
 * @property string $answer
 * @property string $dateanswer
 * @property integer $oftenquestion
 * @property integer $normalquestion
 * @property integer $visible
 * @property integer $searchid
 */
class Messege extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messege';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'messege', 'datemessege'], 'required'],
            [['datemessege'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
            [['messege'], 'string', 'max' => 500],
            [['typemessege'], 'integer', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'messege' => 'Сообщение',
            'datemessege' => 'DateMessege',
            'linkmessegeid' => 'LinkMessegeId',
            'typemessege' => 'TypeMessege',
        ];
    }
}
