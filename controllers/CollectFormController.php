<?php

namespace app\controllers;

use Yii;
use app\models\CollectForm;
use app\models\CollectFormSearch;
use app\models\Login;
use app\models\Register;
use app\models\RegisterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class CollectFormController extends \yii\web\Controller
{
    public $layout = '@app/views/layouts/index';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create'],
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'actions'   =>  ['index', 'create'],
                        'roles' =>  ['?'],
                    ],
               ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get', 'post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new CollectFormSearch();
        $searchModel = new RegisterSearch(); // or \app\models\FormSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            return $this->render('index',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $this->test($model),
                ]);
        }else{
            return $this->render('index',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $this->test('mesmer'),
                ]);
/*          echo \Yii::$app->view->render('@app/views/collect-form/index.php',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $this->test('mesmer'),]
                );
*/            }
    }

    public function actionCreate()
    {
        $model = new CollectForm();
        $login = new Login();
        $register = new Register();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
        	$register->username = $model->username;
        	$register->phoneNo = $model->phoneNo;
        	$register->school = $model->school;
        	$register->class = $model->class;
            $register->no = $model->no;
            $register->check = $model->check;

        	if($register->save()){
        		$login->username = $register->username;
        		$login->password = $model->password;

        		if($login->save()){
        			return $this->redirect(['confirm']);
        		}else{
        			$errors = $model->errors;
        		}
        	}else{
        			$errors = $model->errors;
        		}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionConfirm()
    {
    	return $this->render('confirm');
    }

    public function actionView($username)
    {
        return $this->render('view', [
            'model' => $this->findModel($username),
        ]);
    }

    public function actionUpdate($username)
    {
        $model = $this->findModel($username);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'username' => $model->username]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

 	public function actionDelete($username)
    {
        $this->findModel($username)->delete();

        return $this->redirect(['index']);
    }

	protected function findModel($username)
    {
        if (($model = CollectForm::findOne($username)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function test($username)
    {
        if(($register = Register::findOne($username)) !== null) {
//          $array = $register->attributes;
            return $register;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

}
