<?php

namespace backend\controllers;

use Yii;
use common\models\MenuHelpers;
use backend\models\search\FaqSearch;
use common\models\Faq;
use yii\data\Pagination;
class TestController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Faq models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Faq::find()->where(['faq_is_featured' => 1]);
        $query->orderBy(['faq_weight' => SORT_ASC]);
        $countQuery = clone $query;
        $pages = new Pagination(['defaultPageSize' => 3,'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }

    public function featuredProvider()
    {
        $query = new Query;
        $featuredProvider = new ArrayDataProvider([
            'allModels' => $query->from('user')->where(['id' =>1])->all(),
            'sort' => [
                'defaultOrder' => [
                    'username' => SORT_ASC,

                ],
                'attributes' => ['faq_question', 'faq_answer', 'faq_weight'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $featuredProvider;

    }

}
