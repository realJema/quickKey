<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "register".
 *
 * @property string $username
 * @property string $phoneNo
 * @property string $school
 * @property string $class
 */
class CollectFormSearch extends CollectForm
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
            [['username'], 'safe'],
        ];
    }

}
