<?php

namespace app\widgets\Export;

use kartik\export\ExportMenu;
use Yii;

class Export extends ExportMenu
{
    public $exportType = self::FORMAT_CSV;

    public function init()
    {
        if (!in_array($this->exportType, [
            self::FORMAT_HTML,
            self::FORMAT_CSV,
            self::FORMAT_TEXT,
            self::FORMAT_PDF,
            self::FORMAT_EXCEL,
            self::FORMAT_EXCEL_X,
        ])) {
            $this->exportType = self::FORMAT_CSV;
        }
        if (empty($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if (empty($this->exportRequestParam)) {
            $this->exportRequestParam = 'exportFull_' . $this->options['id'];
        }

        $_POST[Yii::$app->request->methodParam] = 'POST';
        $_POST[$this->exportRequestParam] = true;
        $_POST[$this->exportTypeParam] = $this->exportType;
        $_POST[$this->colSelFlagParam] = false;

        parent::init();
    }
}