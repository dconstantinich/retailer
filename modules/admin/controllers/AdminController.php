<?php

namespace app\modules\admin\controllers;


use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AdminController extends Controller
{
    public $layout = '@app/modules/admin/views/layouts/main';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
}