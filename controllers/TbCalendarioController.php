<?php

namespace app\controllers;

use Yii;
use app\models\TbCalendario;
use app\models\TbCalendarioSearch;
use app\models\TbUsers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TbCalendarioController implements the CRUD actions for TbCalendario model.
 */
class TbCalendarioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update','delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'view','update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    /*[
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=> function($rule, $action){
                                if(Yii::$app->user->identity->id == 1){
                                    return true;
                                }
                                else{
                                    return false;
                                }

                            },
                        
                    ],*/
                ],
            ],
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TbCalendario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $events = TbCalendario::find()->all();
        $tasks=[];
        $allDay=false;


        foreach ($events as $eve) {

            $event = new \yii2fullcalendar\models\Event();
            if($eve->all_day=="true"){
                $allDay=true;
            }
            else{
                $allDay=false;
                $event->end = $eve->fecha_fin;
            }
            $event->id = $eve->id_calendario;
            $event->title = $eve->titulo;
            $event->color=$eve->color;
            $event->start = $eve->fecha_inicio;
            $event->allDay = $allDay;
            //$event ->clickDay = true;
            $tasks[] = $event;
        }

        $searchModel = new TbCalendarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'events' => $tasks,
        ]);
    }

    /**
     * Displays a single TbCalendario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        //if($model->responsable ==Yii::$app->user->identity->id || Yii::$app->user->identity->id == 10){
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
            ]);
        /*}
        else{
            return $this->renderAjax('accesoDenegado');//, [ 'model' => $this->findModel($id),  ]);
        }*/
        
    }

    /**
     * Creates a new TbCalendario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($date)
    {
        $model = new TbCalendario();
        $model->fecha_inicio=$date;
        if(Yii::$app->user->identity->id == 10){
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index',]);
            }
            else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        else{
            return $this->renderAjax('accesoDenegado');//, [ 'model' => $this->findModel($id),  ]);
        }
    }

    /**
     * Updates an existing TbCalendario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->user->identity->id == 10){
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index',]);
            }
            else{
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        else{
            return $this->renderAjax('accesoDenegado');//, [ 'model' => $this->findModel($id),  ]);
        }
    }

    /**
     * Deletes an existing TbCalendario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->user->identity->id == 10){
            $this->findModel($id)->delete();

        return $this->redirect(['index']);
        }
        else{
            return $this->renderAjax('accesoDenegado');//, [ 'model' => $this->findModel($id),  ]);
        }


    }

    /**
     * Finds the TbCalendario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TbCalendario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TbCalendario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
