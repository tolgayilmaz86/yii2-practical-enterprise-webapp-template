<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "faq_category".
 *
 * @property integer $id
 * @property string $faq_category_name
 * @property boolean $faq_category_is_featured
 * @property integer $faq_category_weight
 */
class FaqCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faq_category_name'], 'required'],
            [['faq_category_weight', 'faq_category_is_featured'], 'integer'],
            ['faq_category_weight', 'default', 'value' => 100],
            [['faq_category_weight'],'in', 'range'=>range(1,100)],
            [['faq_category_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'faq_category_name' => 'Faq Category Name',
            'faq_category_is_featured' => 'Faq Category Is Featured',
            'faq_category_weight' => 'Faq Category Weight',
        ];
    }

    public function getFaqs()
    {
        return $this->hasMany(Faq::className(), ['faq_category_id' => 'id']);
    }

    public static function getFaqCategoryIsFeaturedList()
    {
        return $droptions = [0 => "no", 1 => "yes"];
    }

}
