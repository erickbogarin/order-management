<?php

namespace app\controllers;

use Yii;
use app\models\PedidoProduto;
use app\models\PedidoProdutoSearch;
use app\models\Pedido;
use app\models\Produto;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;

/**
 * PedidoProdutoController implements the CRUD actions for PedidoProduto model.
 */
class PedidoProdutoController extends Controller
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
     * Lists all PedidoProduto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoProdutoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PedidoProduto model.
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
     * Creates a new PedidoProduto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PedidoProduto();

        $produtos = $this->getProdutos();
        $pedidos = $this->getPedidos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $this->atualizarEstoqueProduto($model);

            return $this->redirect(['view', 'id' => $model->pepr_codigo]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'produtos' => $produtos,
                'pedidos' => $pedidos
            ]);
        }
    }


    /**
     * Deletes an existing PedidoProduto model.
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
     * Finds the PedidoProduto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PedidoProduto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PedidoProduto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function getProdutos() {
        $rows = Produto::find()->all();

        $produtos = ArrayHelper::map($rows, 'prod_codigo', 'prod_nome');
        return $produtos;
    }

    public function getPedidos() {
        $rows = Pedido::find()->all();

        $pedidos = ArrayHelper::map($rows, 'pedi_codigo', 'pedi_data_alteracao');
        return $pedidos;
    }

    public function actionProduto($id){
        $produto = Produto::findOne($id);
        echo "Máximo: $produto->prod_estoque";
    }

    /**
     * @param $pedido
     */
    public function atualizarEstoqueProduto($pedido)
    {
        $produto = Produto::findOne($pedido->prod_codigo);
        $produto->prod_estoque = $produto->prod_estoque - $pedido->pepr_quantidade;
        $produto->save();
    }

    public function actionRelatorio() {
        $this->layout = 'main-pdf';

        $pedidos = PedidoProduto::find()->all();

        $content = $this->render('pedidos-pdf', ['pedidos' => $pedidos]);


        $pdf = new Pdf([

            'content' => $content,
            'options' => ['title' => 'Relatório de Pedidos'],
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px} th, td {text-align: center;} ',
            'methods' => [
                'SetHeader'=>['Relatório de Pedidos por Produtos'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

}
