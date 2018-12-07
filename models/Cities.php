<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property integer $id
 * @property string $citiesName
 * @property integer $citiesNo
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $name = 'mesmer voufo';
    
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['citiesName', 'citiesNo'], 'required'],
            [['citiesNo'], 'integer'],
            [['citiesName'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'citiesName' => 'Cities Name',
            'citiesNo' => 'Cities No',
        ];
    }
}
