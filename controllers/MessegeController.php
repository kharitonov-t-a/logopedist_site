<?php

namespace app\controllers;

use Yii;
use app\models\Messege;
use app\models\MessegeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\grid\GridView;
use app\widgets\GridView_Messege;
use Constants;

/**
 * MessegeController implements the CRUD actions for Messege model.
 */
class MessegeController extends Controller
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
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Messege models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessegeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);




        // $dataProvider->query->andWhere('(typemessege = 1 OR typemessege = 2) AND visible = 1');
        $messegeModel = new Messege();
// print_r($searchModel);
// print_r($dataProvider);
        // $objAttributes = $searchModel::find()->all();
        // foreach ($objAttributes as $listAtributes) {
        //     $arrListAttributes[] = $listAtributes->getAttributes();
        // }

        // $searchModel2 = new MessegeSearch();
        // $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        // $dataProvider2->query->andWhere('(typemessege = 2) AND visible = 1');
        // $messegeModel2 = new Messege();

        echo $this->render('index', [
            'searchModel' => $searchModel,
            'messegeModel' => $messegeModel,
            'dataProvider' => $dataProvider,
            // 'searchModel2' => $searchModel2,
            // 'messegeModel2' => $messegeModel2,
            // 'dataProvider2' => $dataProvider2,
            // 'arrListAttributes' => $arrListAttributes,
        ]);
    }

    /**
     * Displays a single Messege model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Messege model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Messege();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // $model->linkmessegeid = $model->id;
            // if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'typeMessege' => Constants::getQuestionValue(),
            ]);
        }
    }

    /**
     * Updates an existing Messege model.
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
     * Deletes an existing Messege model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        if (Yii::$app->user->isGuest != 1)
        {
            $this->findModel($_GET['id'])->delete();

            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Messege model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Messege the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Messege::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSubmit_answer()
    {
        //после ajax добавления сообщения почемуто у постранички меняются ссылки на r=messege%2Fsubmit_answer
        //поэтому делаем редирект на messege index
        if(Yii::$app->request->get('r') == "messege/submit_answer" && Yii::$app->request->get('page') != null && Yii::$app->request->get('per-page') != null){
            return $this->redirect(Constants::HOME_DIR . '/web/index.php?r=messege%2Findex&page=' . Yii::$app->request->get('page') . '&per-page=' . Yii::$app->request->get('per-page'));
        }

        $model = new Messege();
        $searchModel = new MessegeSearch();

        if ($model->load(Yii::$app->request->post()))
        {
            $model->name = "empty";
            $model->email = "empty";
                
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->andWhere('linkmessegeid = ' . $model->linkmessegeid);
            $dataProvider->query->andWhere('typemessege = ' . $model->typemessege);
            $arrModelAnswer = array_values($dataProvider->getModels());

            
            if($arrModelAnswer[0]->attributes["messege"] == "empty")
            {
                $modelAnswer = $this->findModel($arrModelAnswer[0]->attributes["id"]);
                $modelAnswer->messege = $model->messege;
                $model = $modelAnswer;
            }
            

            if($model->save()){

                $searchModel = new MessegeSearch();

                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return GridView_Messege::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'name',
                        'email:email',
                        'messege',
                        'datemessege',
                        'linkmessegeid',
                        'typemessege',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
            }
        }
        
    }

    public function actionSubmit_question()
    {
        //после ajax добавления сообщения почемуто у постранички меняются ссылки на r=messege%2Fsubmit_answer
        //поэтому делаем редирект на messege index
        if(Yii::$app->request->get('r') == "messege/submit_question" && Yii::$app->request->get('page') != null && Yii::$app->request->get('per-page') != null){
            return $this->redirect(Constants::HOME_DIR . '/web/index.php?r=messege%2Findex&page=' . Yii::$app->request->get('page') . '&per-page=' . Yii::$app->request->get('per-page'));
        }

        $model = new Messege();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //задаем вопрос - linkmessegeid вопроса = id вопроса
            //отвечаем на вопрос - linkmessegeid ответа = id вопроса

            $model->linkmessegeid = $model->id;

            if($model->save()){

                $modelAnswer = new Messege();
                $modelAnswer->linkmessegeid = $model->id;
                $modelAnswer->typemessege = Constants::getAnswerValue();
                $modelAnswer->name = "empty";
                $modelAnswer->email = "empty";
                $modelAnswer->messege = "empty";

                if($modelAnswer->save()){

                    $searchModel = new MessegeSearch();

                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return GridView_Messege::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'name',
                            'email:email',
                            'messege',
                            'datemessege',
                            'linkmessegeid',
                            'typemessege',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);

                }
            }
        } else {
            return $this->redirect('create', [
                'model' => $model,
                'typeMessege' => Constants::getQuestionValue(),
            ]);
        }

    }

}
