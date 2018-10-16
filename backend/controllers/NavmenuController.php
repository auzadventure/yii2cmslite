<?php

namespace backend\controllers;

use Yii;
use common\models\Navmenu;
use backend\models\NavmenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
/**
 * NavmenuController implements the CRUD actions for Navmenu model.
 */
class NavmenuController extends Controller
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

	public function beforeAction($action)
	{
		$this->layout = 'column2';
		Yii::$app->view->params['sideBar'] = Yii::$app->controller->renderPartial('/layouts/_sideBar');
		if (!parent::beforeAction($action)) {
			return false;
		}
		return true; // or false to not run the action
	}
    /**
     * Lists all Navmenu models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$searchModel = new NavmenuSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$query = Navmenu::find()->where(['isChild'=>'0'])
								->orderBy('sortOrder');
								
		$dataProvider = new ActiveDataProvider([
						'query'=>$query,
						]);
		
		
        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Navmenu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
 		$query = Navmenu::find()->where(['isChild'=>1,'parentID'=>$id])
								->orderBy('sortOrder');
								
		$dataProvider = new ActiveDataProvider([
						'query'=>$query,
						]);      


	   return $this->render('view',[
								'model'=>Navmenu::findOne($id),
								'dataProvider'=>$dataProvider]);
	
    }

    /**
     * Creates a new Navmenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Navmenu();

        if ($model->load(Yii::$app->request->post())) {
			$model->url = serialize($model->url);
			$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
			$model->isChild=0;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionCreate_submenu() {
		$model = new Navmenu();
		
		
        if ($model->load(Yii::$app->request->post()) ) { 
			if($model->save())
				return $this->redirect(['view', 'id' => $model->parentID]);
        } else {
		
			$model->isChild = 1;
			$model->parentID = $_GET['id'];
			
            return $this->render('create_submenu', [
                'model' => $model,
            ]);
        }		
		
		
	}

    /**
     * Updates an existing Navmenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return($model->isChild==1) ? $this->redirect(['view', 'id' => $model->parentID]) :
				$this->redirect(['view', 'id' => $model->id]);
			 
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Navmenu model.
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
     * Finds the Navmenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Navmenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Navmenu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
