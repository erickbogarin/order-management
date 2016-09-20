<?php

namespace app\controllers;

use yii\filters\auth\HttpBasicAuth;


class ProdutoRestController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Produto';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'except' => ['index'],
        ];
        return $behaviors;
    }

}
