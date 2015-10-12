<?php

namespace backend\controllers;

use Yii;

use backend\models\Profile;
use common\models\RecordHelpers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermissionHelpers;
use backend\models\search\ProfileSearch;
use common\models\MenuHelpers;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'view','create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view','create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        // this is also applicable rather than access2
//                        'matchCallback' => function ($rule, $action)
//                            {
//                                return PermissionHelpers::requireStatus('Active');
//                            }
                    ],

                ],
            ],

            'access2' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'view','create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view','create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return PermissionHelpers::requireStatus('Active');
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
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->view->params['menuItems'] = MenuHelpers::getSideMenuItems('profile','','index');
        //if userHas evaluates true, it returns to the view file,
        // with the correct model instance held in the variable $already_exists
        //if($already_exists = Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->one())
        if ($already_exists = RecordHelpers::userHas('profile'))
        {
            //uses the controller’s findModel method to return that instance to the view,
            //in this case it’s named view.php, as it is passed along in the array
            return $this->render('view', [
                'model' => $this->findModel($already_exists),
            ]);
        }
        else
        {
            //we redirect to the create view, since the user doesn’t have a
            //profile, and they need to create one
            return $this->redirect(['create']);
        }

//        $searchModel = new ProfileSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->view->params['menuItems'] = MenuHelpers::getSideMenuItems('profile','','view');
        if ($already_exists = RecordHelpers::userHas('profile')) {
            return $this->render('view', [
                'model' => $this->findModel($already_exists),
            ]);
        } else {
            return $this->redirect(['create']);
        }
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->view->params['menuItems'] = MenuHelpers::getSideMenuItems('profile','','create');
        // We start by calling a new instance of the model,
        // then we set the user_id attribute of the model to the current user
        $model = new Profile;
        $model->user_id = \Yii::$app->user->identity->id;

        // Next we check to see if the user already has a profile by running our RecordHelpers::userHas(‘profile’)
        // method and setting the result to $already_exists
        if ($already_exists = RecordHelpers::userHas('profile'))
        {
            // If we get an model id in response, we show the view file of that id. We need to put this test on this
            // method because a user might be able to navigate directly to the create action, without going to index
            // or view first.
            return $this->render('view', [
                'model' => $this->findModel($already_exists),
            ]);
        }
        // If $already_exists evaluates false, the next thing the code does is
        // call the load method from the post data and attempt to save it
        elseif ($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect(['view']);
        }
        else
        { // Lastly, if there is no post data or if there are validation errors, we show the form
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @throws NotFoundHttpException
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->view->params['menuItems'] = MenuHelpers::getSideMenuItems('profile','','update');
        // I did that because I felt that since the variable name was $model, it was a little more syntactically
        // logical to follow that with the model name we are interested in, instead of the helper class
        if($model =  Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->one())
        {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view']);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            throw new NotFoundHttpException('No Such Profile.');
        }
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->view->params['menuItems'] = MenuHelpers::getSideMenuItems('profile','','delete');
        $model = Profile::find()->where([
                'user_id' => Yii::$app->user->identity->id
            ])->one();

        $this->findModel($model->id)->delete();
        // If we just put ‘index’ as the value, the controller would
        // assume it was ‘profile/index’, which is not what we want
        return $this->redirect(['site/index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * This is the method to find a particular instance of the model.
     * You hand in the $id you are looking for and Yii returns that instance
     * of the model, a very useful method indeed.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
