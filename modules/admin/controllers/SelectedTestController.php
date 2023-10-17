<?php

namespace app\modules\admin\controllers;

use app\models\SelectedTest;
use app\modules\admin\forms\SelectedTestForm;
use app\modules\admin\search\SelectedTestSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SelectedTestController implements the CRUD actions for SelectedTest model.
 */
class SelectedTestController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $searchModel = new SelectedTestSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new SelectedTest();

        return $this->form($model, 'create');

    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        return $this->form($model, 'update');
    }


    public function form(SelectedTest $model, $view)
    {
        $form = new SelectedTestForm($model);
        if ($form->load(request()->post()) && $form->save()) {
            return $this->redirect(['view', 'id' => $form->model->id]);
        }
        return $this->render($view, [
            'model' => $form,
        ]);

    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SelectedTest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SelectedTest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SelectedTest::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
