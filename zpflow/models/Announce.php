<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "announce".
 *
 * @property integer $ancID
 * @property integer $recID
 * @property string $ancName
 * @property string $ancInfo
 * @property integer $ancPubUid
 * @property string $ancTime
 * @property integer $ancType
 * @property integer $ancStatus
 */
class Announce extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'announce';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recID', 'ancName', 'ancInfo', 'ancPubUid'], 'required'],
            [['recID', 'ancPubUid', 'ancType', 'ancStatus'], 'integer'],
            [['ancInfo'], 'string'],
            [['ancTime'], 'safe'],
            [['ancName'], 'string', 'max' => 125],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ancID' => 'Anc ID',
            'recID' => 'Rec ID',
            'ancName' => 'Anc Name',
            'ancInfo' => 'Anc Info',
            'ancPubUid' => 'Anc Pub Uid',
            'ancTime' => 'Anc Time',
            'ancType' => 'Anc Type',
            'ancStatus' => 'Anc Status',
        ];
    }
}
