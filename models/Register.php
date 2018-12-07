<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "register".
 *
 * @property string $username
 * @property string $phoneNo
 * @property string $password
 * @property string $school
 * @property string $class
 */
class Register extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'register';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'phoneNo', 'school', 'class', 'no', 'check'], 'required'],
            [['username', 'class'], 'string', 'max' => 30],
            [['phoneNo'], 'string', 'max' => 30],
            [['school'], 'string', 'max' => 30],
            [['no'], 'string', 'max' => 30],
            [['check'], 'interger'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'phoneNo' => 'Phone No',
            'school' => 'School',
            'class' => 'Class',
            'no' => 'No',
        ];
    }
}
