<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "subthemes".
 *
 * @property int $id
 * @property int $theme_id
 * @property string $title
 * @property string|null $text
 *
 * @property Theme $theme
 */
class Subtheme extends ActiveRecord
{
    public static function tableName()
    {
        return 'subthemes';
    }

    public function rules()
    {
        return [
            [['theme_id', 'title'], 'required'],
            [['theme_id'], 'integer'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['theme_id'], 'exist', 'skipOnError' => true, 'targetClass' => Theme::class, 'targetAttribute' => ['theme_id' => 'id']],
        ];
    }

    public function getTheme()
    {
        return $this->hasOne(Theme::class, ['id' => 'theme_id']);
    }
}