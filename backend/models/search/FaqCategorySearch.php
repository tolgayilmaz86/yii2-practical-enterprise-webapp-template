<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FaqCategory;

/**
 * FaqCategorySearch represents the model behind the search form about `common\models\FaqCategory`.
 */
class FaqCategorySearch extends FaqCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'faq_category_weight'], 'integer'],
            [['faq_category_name'], 'safe'],
            [['faq_category_is_featured'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = FaqCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'faq_category_is_featured' => $this->faq_category_is_featured,
            'faq_category_weight' => $this->faq_category_weight,
        ]);

        $query->andFilterWhere(['like', 'faq_category_name', $this->faq_category_name]);

        return $dataProvider;
    }
}
