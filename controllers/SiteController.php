<?php

namespace app\controllers;

use app\models\search\HistorySearch;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
//     * @param string $exportType // Удалил параметр т.к. и без него генерится документ нужного типа
     * @return string
     */
    public function actionExport(/* $exportType Тут тоже */)
    {
        $model = new HistorySearch();

        return $this->render('export', [
            'dataProvider' => $model->search(Yii::$app->request->queryParams),
//            'exportType' => $exportType, Причем неправильное указание параметра приводило к ошибке
//              The 'writer' setting for '\PhpOffice\PhpSpreadsheet\Spreadsheet' must be setup in 'exportConfig'.
            'model' => $model
        ]);
    }
}
