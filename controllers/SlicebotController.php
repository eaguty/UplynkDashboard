<?php

namespace app\controllers;

use Yii;
use app\models\Slicebot;
use app\models\SlicebotSearch;
use app\models\Media;
use app\models\MediaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SlicebotController implements the CRUD actions for Slicebot model.
 */
class SlicebotController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Slicebot models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlicebotSearch();
        $searchModel2 = new MediaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        $cuentas = $searchModel2->manyProccess();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
            'cuentas' => $cuentas,

        ]);

    }

    /**
     * Displays a single Slicebot model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Slicebot model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slicebot();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->slicebot_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Slicebot model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->slicebot_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Slicebot model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Slicebot model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slicebot the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionCancelar($id)

    {

        $model = $this->findModel($id);

        //$model->activo = ($model->activo == "true") ? "false":"true";
        $model->activo = "false";
        $model->save();

        //return $model->save();

        $searchModel = new SlicebotSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    protected function findModel($id)
    {
        if (($model = Slicebot::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
