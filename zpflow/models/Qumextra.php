<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qumextra".
 *
 * @property integer $qraID
 * @property integer $recID
 * @property string $qraPassMsg
 * @property integer $qraPassType
 * @property string $qraNoPassMsg
 * @property integer $qraNoPassType
 */
class Qumextra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qumextra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//          [['recID', 'qraPassMsg', 'qraNoPassMsg'], 'required'],
//          [['recID', 'qraPassType', 'qraNoPassType'], 'integer'],
//          [['qraPassMsg', 'qraNoPassMsg'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
//          'qraID' => 'Qra ID',
//          'recID' => 'Rec ID',
//          'qraPassMsg' => 'Qra Pass Msg',
//          'qraPassType' => 'Qra Pass Type',
//          'qraNoPassMsg' => 'Qra No Pass Msg',
//          'qraNoPassType' => 'Qra No Pass Type',
        ];
    }
}
