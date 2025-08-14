<?php

namespace app\services;

use app\models\Theme;
use app\models\Subtheme;

class DataService
{
    public static function themesList(): array
    {
        $themes = Theme::find()->asArray()->all();

        return $themes ?: [];
    }

    public static function subthemesList(int $themeId): array
    {
        $subthemes = Subtheme::find()
            ->select(['id', 'title'])
            ->where(['theme_id' => $themeId])
            ->asArray()
            ->all();

        return $subthemes ?: [];
    }

    public static function subthemeText(int $subthemeId): string
    {
        $subtheme = Subtheme::findOne($subthemeId);

        return $subtheme ? (string)$subtheme->text : '';
    }
}