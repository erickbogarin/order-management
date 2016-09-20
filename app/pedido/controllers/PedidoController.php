<?php

namespace app\controllers;

use Yii;
use app\models\Pedido;
use app\models\PedidoSearch;
use app\models\PedidoProduto;
use app\models\Produto;
use app\models\PedidoProdutoSearch;
use app\models\Cliente;
use app\models\FormaPagamento;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;

/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends Controller
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
     * Lists all Pedido models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedido model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $searchModel = new PedidoProdutoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pedido();

        $clientes = $this->getClientes();
        $formasDePagamento = $this->getFormaDePagamentos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pedi_codigo]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'clientes' => $clientes,
                'fmaPagto' => $formasDePagamento
            ]);
        }
    }

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $clientes = $this->getClientes();
        $formasDePagamento = $this->getFormaDePagamentos();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pedi_codigo]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'clientes' => $clientes,
                'fmaPagto' => $formasDePagamento
            ]);
        }
    }

    /**
     * Deletes an existing Pedido model.
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
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pedido::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Lists all Clients models
     * @return clientes
     */
    public function getClientes()
    {
        $rows = Cliente::find()->all();

        $clientes = ArrayHelper::map($rows, 'clien_codigo', 'clien_nome');
        return $clientes;
    }

    /**
     * * Lists all Pagamentos models
     * @return pagamentos
     */
    public function getFormaDePagamentos()
    {
        $rows = FormaPagamento::find()->all();

        $formasDePagamento = ArrayHelper::map($rows, 'fopa_codigo', 'fopa_nome');
        return $formasDePagamento;
    }

    public function getProdutos() {
        $rows = Produto::find()->all();

        $produtos = ArrayHelper::map($rows, 'prod_codigo', 'prod_nome');
        return $produtos;
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
