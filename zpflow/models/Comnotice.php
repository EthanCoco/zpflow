<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comnotice".
 *
 * @property integer $cmID
 * @property string $cmTitle
 * @property string $cmContent
 * @property string $cmFlag
 */
class Comnotice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comnotice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//          [['cmContent'], 'string'],
//          [['cmTitle'], 'string', 'max' => 255],
//          [['cmFlag'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cmID' => 'Cm ID',
            'cmTitle' => 'Cm Title',
            'cmContent' => 'Cm Content',
            'cmFlag' => 'Cm Flag',
        ];
    }
}
