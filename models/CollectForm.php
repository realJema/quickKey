<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CollectForm extends Model
{
    public $username;
    public $phoneNo;
    public $password;
    public $school;
    public $class;
    public $no;
    public $check;

    public function rules()
    {
        return [
            [['username', 'phoneNo', 'password', 'school', 'class', 'no', 'check'], 'required'],
            [['username', 'class', 'no'], 'string', 'max' => 30],
            [['phoneNo'], 'string', 'max' => 30],
            [['password', 'school'], 'string', 'max' => 30],
            [['check'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'UserName',
            'phoneNo' => 'Phone No',
            'password' => 'Password',
            'school' => 'School',
            'class' => 'Class',
            'no' => 'No',
            'check' => 'Check',
        ];
    }


}
