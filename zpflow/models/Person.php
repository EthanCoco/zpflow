<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $perID
 * @property string $perName
 * @property string $perIDCard
 * @property string $perPhone
 * @property string $perPhoto
 * @property integer $perGender
 * @property string $perNation
 * @property string $perOrigin
 * @property string $perPolitica
 * @property string $perWorkPlace
 * @property string $perMarried
 * @property string $perBirth
 * @property string $perHeight
 * @property string $perWeight
 * @property string $perUniversity
 * @property string $perDegree
 * @property string $perMajor
 * @property string $perEducation
 * @property string $perForeignLang
 * @property string $perComputerLevel
 * @property string $perEduPlace
 * @property string $perEmePhone
 * @property string $perEmail
 * @property string $perPostCode
 * @property string $perAddr
 * @property string $perMark
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//          [['perName', 'perIDCard', 'perPhone', 'perPhoto', 'perNation', 'perOrigin', 'perPolitica', 'perWorkPlace', 'perMarried'], 'required'],
//          [['perGender'], 'integer'],
//          [['perBirth'], 'safe'],
//          [['perHeight', 'perWeight'], 'number'],
//          [['perName', 'perPhoto', 'perWorkPlace', 'perUniversity', 'perAddr', 'perMark'], 'string', 'max' => 255],
//          [['perIDCard', 'perPostCode'], 'string', 'max' => 32],
//          [['perPhone', 'perEmePhone'], 'string', 'max' => 11],
//          [['perNation', 'perPolitica', 'perMarried', 'perEducation', 'perForeignLang', 'perComputerLevel'], 'string', 'max' => 64],
//          [['perOrigin', 'perDegree', 'perMajor', 'perEduPlace', 'perEmail'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'perID' => 'Per ID',
            'perName' => 'Per Name',
            'perIDCard' => 'Per Idcard',
            'perPhone' => 'Per Phone',
            'perPhoto' => 'Per Photo',
            'perGender' => 'Per Gender',
            'perNation' => 'Per Nation',
            'perOrigin' => 'Per Origin',
            'perPolitica' => 'Per Politica',
            'perWorkPlace' => 'Per Work Place',
            'perMarried' => 'Per Married',
            'perBirth' => 'Per Birth',
            'perHeight' => 'Per Height',
            'perWeight' => 'Per Weight',
            'perUniversity' => 'Per University',
            'perDegree' => 'Per Degree',
            'perMajor' => 'Per Major',
            'perEducation' => 'Per Education',
            'perForeignLang' => 'Per Foreign Lang',
            'perComputerLevel' => 'Per Computer Level',
            'perEduPlace' => 'Per Edu Place',
            'perEmePhone' => 'Per Eme Phone',
            'perEmail' => 'Per Email',
            'perPostCode' => 'Per Post Code',
            'perAddr' => 'Per Addr',
            'perMark' => 'Per Mark',
        ];
    }
}
