<?php

namespace app\controllers;

use Yii;
use app\models\PedidoProduto;
use app\models\Produto;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

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
    public function actionCreate($pedido)
    {
        $model = new PedidoProduto();
        $model->pedi_codigo = $pedido;

        $produtos = $this->getProdutos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $this->atualizarEstoqueProduto($model);

            return $this->redirect(['pedido/view', 'id' => $model->pedi_codigo]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'produtos' => $produtos,
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

}
