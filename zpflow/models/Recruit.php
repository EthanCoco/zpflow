<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recruit".
 *
 * @property integer $recID
 * @property integer $recYear
 * @property string $recBatch
 * @property integer $recDefault
 * @property string $recStart
 * @property string $recEnd
 * @property string $recViewPlace
 * @property string $recHealthPlace
 */
class Recruit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recruit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recYear', 'recBatch', 'recDefault', 'recViewPlace', 'recHealthPlace'], 'required'],
            [['recYear', 'recDefault'], 'integer'],
            [['recStart', 'recEnd'], 'safe'],
            [['recBatch'], 'string', 'max' => 50],
            [['recViewPlace', 'recHealthPlace'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recID' => 'Rec ID',
            'recYear' => 'Rec Year',
            'recBatch' => 'Rec Batch',
            'recDefault' => 'Rec Default',
            'recStart' => 'Rec Start',
            'recEnd' => 'Rec End',
            'recViewPlace' => 'Rec View Place',
            'recHealthPlace' => 'Rec Health Place',
        ];
    }
	
	
	public static function getListInfo($offset,$rows,$orderInfo){
		$rows = self::find()->select(['recID','recYear','recBatch','recDefault','recStart','recEnd','recViewPlace','recHealthPlace'])
							->orderby($orderInfo)
							->offset($offset)
							->limit($rows)
							->asArray()
							->all();
							
		$total = self::find()->count();
		
		return ['rows'=>$rows,'total'=>$total];
	}
	
	
}
