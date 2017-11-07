<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medical".
 *
 * @property integer $medID
 * @property integer $recID
 * @property string $medStartTime
 * @property string $medEndTime
 * @property string $medPlace
 * @property string $medStartEnd
 */
class Medical extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medical';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//          [['recID', 'medStartTime', 'medEndTime', 'medPlace'], 'required'],
//          [['recID'], 'integer'],
//          [['medStartTime', 'medEndTime'], 'string', 'max' => 20],
//          [['medPlace', 'medStartEnd'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'medID' => 'Med ID',
            'recID' => 'Rec ID',
            'medStartTime' => 'Med Start Time',
            'medEndTime' => 'Med End Time',
            'medPlace' => 'Med Place',
            'medStartEnd' => 'Med Start End',
        ];
    }
}
