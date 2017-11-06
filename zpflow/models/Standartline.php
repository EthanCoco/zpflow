<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "standartline".
 *
 * @property integer $sttID
 * @property integer $recID
 * @property integer $sttView
 * @property integer $sttPen
 * @property double $sttFinalScore
 */
class Standartline extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'standartline';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//          [['recID'], 'required'],
//          [['recID', 'sttView', 'sttPen'], 'integer'],
//          [['sttFinalScore'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sttID' => 'Stt ID',
            'recID' => 'Rec ID',
            'sttView' => 'Stt View',
            'sttPen' => 'Stt Pen',
            'sttFinalScore' => 'Stt Final Score',
        ];
    }
}
