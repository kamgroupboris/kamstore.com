<?php

namespace app\controllers;

use Yii;
use app\models\Images;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * ImagesController implements the CRUD actions for Images model.
 */
class ImagesController extends Controller
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
     * Lists all Images models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Images::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionFileUpload()
    {
        $model = new Images();

            $file = UploadedFile::getInstance($model, 'filename');

            if (isset($file) && $file->tempName){
                $model->imageFile = $file;
               if ($model->validate()) {
                  if(!isset($_POST['cat_id']))
                    $dir = Yii::getAlias('@app/public_html/files/uploads/');
                  else{
                       $dir = Yii::getAlias('@app/public_html/files/'.$_POST['cat_id'].'/');
                  }
                    $fileName = $model->imageFile->baseName . '.' . $model->imageFile->extension;
                    $model->imageFile->saveAs($dir . $fileName);

                    $originalName = $model->imageFile->baseName;
                    $typeFile = $model->imageFile->extension;

                    if(isset($_POST))
                       $model->attributes=$_POST;

                    $model->filename = $fileName;
                    $model->name_original = $originalName;
                   if(!isset($model->name))$model->name = $originalName;
                    $model->type_file = $typeFile;

                    if ($model->save()) {
                       Image::thumbnail($dir . $fileName, 300, 300)
                         ->save($dir .$originalName.'-300x300.'. $typeFile, ['quality' => 80])

                        Image::thumbnail($dir . $fileName, 25, 25)
                            ->save($dir .$originalName.'-25x25.'. $typeFile, ['quality' => 80]);;
                       return true;
                    }

                }else{
                   echo 'Ошибка валидации';
                   print_r($model->getErrors());
               }
            }else{ echo 'Ошибка передачи';}

    }

    /**
     * Displays a single Images model.
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
     * Creates a new Images model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Images();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Images model.
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
     * Deletes an existing Images model.
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
     * Finds the Images model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Images the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Images::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
