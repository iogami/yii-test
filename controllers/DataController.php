<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\services\DataService;

class DataController extends Controller
{
    public function actionThemesList()
    {
        return $this->asJson(DataService::themesList());
    }

    public function actionSubthemesList()
    {
        $themeId = (int)Yii::$app->request->get('theme_id', 1);
        $themeId = ($themeId < 1) ? 1 : $themeId;

        return $this->asJson(DataService::subthemesList($themeId));
    }

    public function actionSubthemeText()
    {
        $subthemeId = (int)Yii::$app->request->get('subtheme_id', 1);
        $subthemeId = ($subthemeId < 1) ? 1 : $subthemeId;

        return $this->asJson(['text' => DataService::subthemeText($subthemeId)]);
    }
}