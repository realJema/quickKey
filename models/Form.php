<?php
namespace app\models;

use Yii;

class Form extends \yii\db\ActiveRecord 
{
    public $surname = 'audrey';

	public static function tableName()
	{
		return 'form';
	}
	
	public function rules()
	{
		return [
			[['name','faculty','age'], 'required', 'on' => self::SCENARIO_REGISTER],
			[['name','faculty'], 'required', 'on' => self::SCENARIO_LOGIN],
			[['name','faculty'], 'string', 'max'=>10],
			[['age'], 'integer','max'=>100],
		];
	}
	public function attributeLabels()
	{
		return [
			'name' => \Yii::t('app','Name'),
			'faculty' => 'Faculty',
			'age' => 'Age',
		];	
	}

	const SCENARIO_LOGIN = 'login';
	const SCENARIO_REGISTER = 'register';

	public function scenarios()
	{
		$scenarios = parent::scenarios();
		$scenarios[self::SCENARIO_LOGIN] = ['name', 'faculty'];
		$scenarios[self::SCENARIO_REGISTER] = ['name','faculty','age'];
		return $scenarios;
	}


}
