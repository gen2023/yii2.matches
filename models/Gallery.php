<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $image
 * @property int $category_id
 * @property int $views
 * @property int $likes
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'category_id', 'views', 'likes'], 'required'],
            [['category_id', 'views', 'likes'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'category_id' => 'Category ID',
            'views' => 'Views',
            'likes' => 'Likes',
        ];
    }

    public function getCategory(){
        return $this->hasOne(Category::class,['id'=>'category_id']);
    }
}
