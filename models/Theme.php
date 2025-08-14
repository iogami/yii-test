<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "themes".
 *
 * @property int $id
 * @property string $title
 *
 * @property Subtheme[] $subthemes
 */
class Theme extends ActiveRecord
{
    public static function tableName()
    {
        return 'themes';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function getSubthemes()
    {
        return $this->hasMany(Subtheme::class, ['theme_id' => 'id']);
    }
}