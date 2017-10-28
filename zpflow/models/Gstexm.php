<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gstexm".
 *
 * @property integer $gstexmID
 * @property integer $recID
 * @property integer $gstID
 * @property integer $exmID
 */
class Gstexm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gstexm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recID', 'gstID', 'exmID'], 'required'],
            [['recID', 'gstID', 'exmID'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gstexmID' => 'Gstexm ID',
            'recID' => 'Rec ID',
            'gstID' => 'Gst ID',
            'exmID' => 'Exm ID',
        ];
    }
}
