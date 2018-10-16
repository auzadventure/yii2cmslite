<?php

namespace backend\controllers;

use Yii;
use common\models\Image;
use backend\models\ImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;

/**
 * ImageController implements the CRUD actions for Image model.
 */
class ImageController extends Controller
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
     * Lists all Image models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		if (isset($_GET["ImageSearch"]["page"])) 
			$page = $_GET["ImageSearch"]["page"];
        else $page = '';
		return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'page'=>$page
        ]);
    }

    /**
     * Displays a single Image model.
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
     * Creates a new Image model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Image();

        if ($model->load(Yii::$app->request->post()))  {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			
			$fullPath  = $model->page;
			$fullPath .= ".".$model->position;
			$fullPath .= ".".$model->imageFile->getExtension();
			
			$model->fullpath = $fullPath;
			$model->save();
			$model->imageFile->saveAs($model->getUploadPath($fullPath));
			$model->createThumb();
			return $this->redirect(['view', 'id' => $model->id]);
        } else {
			if(isset($_GET["ImageSearch"]["page"])) {
				$model->page = $_GET["ImageSearch"]["page"];
				
			}
			
			
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Image model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

       if ($model->load(Yii::$app->request->post()))  {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			
			if($model->imageFile!='') {
				$fullPath  = $model->page;
				$fullPath .= ".".$model->position;
				$fullPath .= ".".$model->imageFile->getExtension();
				$model->fullpath = $fullPath;
				$model->createThumb();
				$model->imageFile->saveAs($model->getUploadPath($fullPath));
			}
			else $model->save();
			
			return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Image model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

		$model = $this->findModel($id);
		$model->unlinkImg() ;
		$model->unlinkThumb(); 
		$model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Image model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Image the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
