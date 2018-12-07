<?php

namespace app\controllers;

use Yii;
use app\models\Form;
use app\models\FormSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FormController implements the CRUD actions for Form model.
 */
class FormController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Form models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FormSearch(); // or \app\models\FormSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $nom = "mesmer voufo";
            
        $model = new Form();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'nom' => $nom,
        ]);
    }

    /**
     * Displays a single Form model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id = 2)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Form model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Form();
        $viewmodel = $this->findModel($id = 2);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'viewmodel' => $viewmodel,
            ]);
        }
    }

    /**
     * Updates an existing Form model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Form model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Form model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Form the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Form::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTest()
    {
        $model = new \app\models\Form;
        
        $data = \Yii::$app->request->post('Form');
/*
        $model->name = isset($data['name'])? $data['name'] : null;
        $model->faculty = isset($data['faculty'])? $data['faculty'] : null;
        $model->age = isset($data['age'])? $data['age'] : null;
*/
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->render('view',[
                'model' => $model,
                ]);
        }else{
            return $this->render('test',[
                'model' => $model
                ]);
        }
    }

/*    
    public function actionForm()
    {
        $model = new app\models\Form();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('form', [
            'model' => $model,
        ]);
    }
*/
}
