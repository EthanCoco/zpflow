<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "setgroup".
 *
 * @property integer $gstID
 * @property integer $recID
 * @property string $gstItvStartTime
 * @property string $gstItvEndTime
 * @property integer $gstGroup
 * @property string $gstItvPlace
 * @property integer $gstType
 * @property string $gstStartEnd
 */
class Setgroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setgroup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//          [['gstID', 'recID', 'gstItvStartTime', 'gstItvEndTime', 'gstItvPlace'], 'required'],
//          [['gstID', 'recID', 'gstGroup', 'gstType'], 'integer'],
//          [['gstItvStartTime', 'gstItvEndTime'], 'string', 'max' => 20],
//          [['gstItvPlace', 'gstStartEnd'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gstID' => 'Gst ID',
            'recID' => 'Rec ID',
            'gstItvStartTime' => 'Gst Itv Start Time',
            'gstItvEndTime' => 'Gst Itv End Time',
            'gstGroup' => 'Gst Group',
            'gstItvPlace' => 'Gst Itv Place',
            'gstType' => 'Gst Type',
            'gstStartEnd' => 'Gst Start End',
        ];
    }
}
