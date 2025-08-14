<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\BadRequestHttpException;
use app\services\DataService;

class DataController extends Controller
{
    public function actionThemesList()
    {
        return $this->asJson(DataService::themesList());
    }

    public function actionSubthemesList()
    {
        $themeId = $this->getPositiveIntParam('theme_id');
        return $this->asJson(DataService::subthemesList($themeId));
    }

    public function actionSubthemeText()
    {
        $subthemeId = $this->getPositiveIntParam('subtheme_id');
        return $this->asJson(['text' => DataService::subthemeText($subthemeId)]);
    }

    /**
     * Получает положительный целочисленный GET-параметр
     *
     * @param string $name
     * @param int $default
     * @return int
     */
    protected function getPositiveIntParam(string $name, int $default = 1): int
    {
        $value = (int)Yii::$app->request->get($name, $default);

        return ($value < 1) ? 1 : $value;
    }
}
