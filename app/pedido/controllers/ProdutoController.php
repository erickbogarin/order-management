<?php

namespace app\controllers;

use Yii;
use app\models\Produto;
use app\models\ProdutoSearch;
use app\models\Categoria;
use app\models\Fabricante;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;
use yii\filters\AccessControl;


/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update, delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create', 'update', 'delete'],
                        'roles' => ['@'],
                    ]
                ]

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
     * Lists all Produto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdutoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produto model.
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
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Produto();

        $categorias = $this->getCategorias();
        $fabricantes = $this->getFabricantes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->prod_codigo]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'categorias' => $categorias,
                'fabricantes' => $fabricantes,
            ]);
        }
    }

    /**
     * Updates an existing Produto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $categorias = $this->getCategorias();
        $fabricantes = $this->getFabricantes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->prod_codigo]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'categorias' => $categorias,
                'fabricantes' => $fabricantes,
            ]);
        }
    }

    /**
     * Deletes an existing Produto model.
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
     * Finds the Produto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @return categorias
     */
    public function getCategorias()
    {
        $rows = Categoria::find()->all();

        $categorias = ArrayHelper::map($rows, 'cate_codigo', 'cate_nome');
        return $categorias;
    }

    /**
     * @return categorias
     */
    public function getFabricantes()
    {
        $rows = Fabricante::find()->all();

        $fabricantes = ArrayHelper::map($rows, 'fabr_codigo', 'fabr_nome');
        return $fabricantes;
    }

    public function actionRelatorio() {
        $this->layout = 'main-pdf';

        $produtos = Produto::find()->all();

        $content = $this->render('produtos-pdf', ['produtos' => $produtos]);


        $pdf = new Pdf([

            'content' => $content,
            'options' => ['title' => 'Relatório de Estoque'],
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px} th, td {text-align: center;} ',
            'methods' => [
                'SetHeader'=>['Relatório de Produtos'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

}
