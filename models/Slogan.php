<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slogan".
 *
 * @property int $id
 * @property string $text
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
            [['text', 'views'], 'required'],
            [['text'], 'string'],
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
            'text' => 'text',
            'views' => 'Views',
        ];
    }
}
