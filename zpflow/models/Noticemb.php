<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticemb".
 *
 * @property string $ntsID
 * @property integer $recID
 * @property string $ntsTitle
 * @property string $ntsContent
 */
class Noticemb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticemb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//          [['recID', 'ntsTitle'], 'required'],
//          [['recID'], 'integer'],
//          [['ntsContent'], 'string'],
//          [['ntsTitle'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ntsID' => 'Nts ID',
            'recID' => 'Rec ID',
            'ntsTitle' => 'Nts Title',
            'ntsContent' => 'Nts Content',
        ];
    }
}
