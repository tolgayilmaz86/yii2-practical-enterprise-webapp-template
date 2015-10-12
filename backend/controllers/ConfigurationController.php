<?php

namespace backend\controllers;

use Yii;
use common\models\Configuration;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\MenuHelpers;
use common\models\PermissionHelpers;
/**
 * ConfigurationController implements the CRUD actions for Configuration model.
 */
class ConfigurationController extends Controller
{
    public function behaviors()
    {
        return [

            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'view','create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'view',],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return PermissionHelpers::requireMinimumRole('Admin')
                            && PermissionHelpers::requireStatus('Active');
                        }
                    ],
                    [
                        'actions' => [ 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return PermissionHelpers::requireMinimumRole('SuperUser')
                            && PermissionHelpers::requireStatus('Active');
                        }
                    ],

                ],

            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Configuration models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->view->params['menuItems'] = MenuHelpers::getSideMenuItems('configuration','','index');
        $dataProvider = new ActiveDataProvider([
            'query' => Configuration::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Configuration model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->view->params['menuItems'] = MenuHelpers::getSideMenuItems('configuration','','view');
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Configuration model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->view->params['menuItems'] = MenuHelpers::getSideMenuItems('configuration','','create');
        $model = new Configuration();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->conf_key]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Configuration model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->view->params['menuItems'] = MenuHelpers::getSideMenuItems('configuration','','update');
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->conf_key]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Configuration model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->view->params['menuItems'] = MenuHelpers::getSideMenuItems('configuration','','delete');
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Configuration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Configuration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Configuration::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
