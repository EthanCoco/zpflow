<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "examiner".
 *
 * @property integer $exmID
 * @property integer $recID
 * @property string $exmName
 * @property integer $exmType
 * @property string $exmCom
 * @property string $exmPost
 * @property string $exmPhone
 * @property string $exmCertNo
 * @property integer $exmAttr
 * @property string $exmTime
 */
class Examiner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'examiner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//          [['exmID', 'recID', 'exmName', 'exmCom', 'exmPost', 'exmPhone', 'exmCertNo'], 'required'],
//          [['exmID', 'recID', 'exmType', 'exmAttr'], 'integer'],
//          [['exmName', 'exmCertNo'], 'string', 'max' => 60],
//          [['exmCom', 'exmPost'], 'string', 'max' => 255],
//          [['exmPhone', 'exmTime'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'exmID' => 'Exm ID',
            'recID' => 'Rec ID',
            'exmName' => 'Exm Name',
            'exmType' => 'Exm Type',
            'exmCom' => 'Exm Com',
            'exmPost' => 'Exm Post',
            'exmPhone' => 'Exm Phone',
            'exmCertNo' => 'Exm Cert No',
            'exmAttr' => 'Exm Attr',
            'exmTime' => 'Exm Time',
        ];
    }
}
