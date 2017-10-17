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
	const SCENARIO_ADD = 'add';
//	const SCENARIO_MOD = 'mod';
	public function scenarios(){
		$scenarios = parent::scenarios();
	    $scenarios[self::SCENARIO_ADD] = ['recYear', 'recStart','recEnd','recBatch'];
//	    $scenarios[self::SCENARIO_MOD] = ['recYear', 'password'];
	    return $scenarios;
	}
	
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
			['recYear', 'required','message'=>'招聘年度不能为空', 'on' => [self::SCENARIO_ADD]],
			['recYear', 'validateYearStart', 'on' => [self::SCENARIO_ADD]],
			['recYear', 'validateYearBatchUnique', 'on' => [self::SCENARIO_ADD]],
			['recStart', 'required','message'=>'招聘起始时间不能为空', 'on' => [self::SCENARIO_ADD]],
			['recStart', 'validateStartEnd', 'on' => [self::SCENARIO_ADD]],
            ['recEnd', 'required','message'=>'招聘结束时间不能为空', 'on' => [self::SCENARIO_ADD]],
            ['recEnd', 'validateEndCurrent', 'on' => [self::SCENARIO_ADD]],
			['recBatch', 'required','message'=>'招聘批次不能为空', 'on' => [self::SCENARIO_ADD]],
        ];
    }
	
	public function attributeLabels()
    {
        return [
            'recID' => '招聘ID',
            'recYear' => '招聘年度',
            'recBatch' => '招聘批次',
            'recStart' => '报名期限-起始时间',
            'recEnd' => '报名期限-终止时间',
            'recViewPlace' => '面试地点',
            'recHealthPlace' => '体检地点',
            'recDefault'	=>	'是否进行中',
            'recBack'	=>	'是否归档',
        ];
    }
	
	public function validateYearStart($attribute, $params){
		if ($this->recYear != "" && $this->recStart !="" && $this->recYear != substr($this->recStart,0,4)){
			$this->addError($attribute, "招聘年度与起始时间不一致");
		}
	}
	
	public function validateStartEnd($attribute, $params){
		if ($this->recStart != "" && $this->recEnd !="" && $this->recStart > $this->recEnd ){
			$this->addError($attribute, "起始时间不能大于结束时间");
		}
	}
	
	public function validateYearBatchUnique($attribute, $params){
		if ($this->recYear != "" && $this->recBatch !=""){
			$num = self::find()->where(['recYear'=>$this->recYear,'recBatch'=>$this->recBatch])->count();
			if($num > 0){
				$this->addError($attribute, "该年度的招聘批次已经存在了");
			}
		}
	}
	
	public function validateEndCurrent($attribute, $params){
		date_default_timezone_set('PRC');
		$date = date('Y-m-d H:i:s',time());
		if($this->recEnd != "" && $this->recEnd <= $date){
			$this->addError($attribute, "招聘结束时间不能小于当前时间".$date);
		}
	}
	
	public static function getListInfo($offset,$rows,$orderInfo){
		$rows = self::find()->select(['recID','recYear','recBatch','recDefault','recStart','recEnd','recViewPlace','recHealthPlace','recBack'])
							->orderby($orderInfo)
							->offset($offset)
							->limit($rows)
							->asArray()
							->all();
							
		$total = self::find()->count();
		
		return ['rows'=>$rows,'total'=>$total];
	}
	
	public static function getOverRecBatch(){
		$infos = self::find()->select(['recID','recYear','recBatch','recDefault'])
							->where(['!=', 'recDefault', 0])
							->orderby('recDefault asc,recYear desc,recBatch desc')
							->asArray()
							->all();
		$jsonData = [];
		foreach($infos as $info){
			$codes = [['recBatch','PC']];
			$codeName = Share::codeValue($codes,$info);
			$jsonData[] = [
				'id'		=>	$info['recID'],
				'value'		=>	$info['recYear']."年".$codeName['recBatch'].($info['recDefault'] == '2' ? '【已结束】' : '【进行中】'),
			];
		}
		return $jsonData;
	}
}
