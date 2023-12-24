<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slogan".
 *
 * @property int $id
 * @property string $test
 * @property int $views
 */
class Slogan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slogan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test', 'views'], 'required'],
            [['test'], 'string'],
            [['views'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test' => 'Test',
            'views' => 'Views',
        ];
    }
}
