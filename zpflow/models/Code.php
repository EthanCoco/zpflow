<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "code".
 *
 * @property integer $id
 * @property string $codeID
 * @property string $codeTypeID
 * @property string $codeName
 * @property integer $codeOrder
 * @property integer $codeStatus
 */
class Code extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codeID'], 'required'],
            [['codeOrder', 'codeStatus','isLeaf'], 'integer'],
            [['codeID', 'codeTypeID', 'codeName','codePid'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codeID' => 'Code ID',
            'codeTypeID' => 'Code Type ID',
            'codeName' => 'Code Name',
            'codeOrder' => 'Code Order',
            'codeStatus' => 'Code Status',
            'codePid'	=>	'Code Pid',
            'isLeaf'	=>	'Is Leaf',
        ];
    }
}
