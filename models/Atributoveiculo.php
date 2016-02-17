<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atributoveiculo".
 *
 * @property integer $idatributoveiculo
 * @property integer $idveiculo
 * @property string $descricaoatributo
 *
 * @property Veiculo $idveiculo0
 */
class Atributoveiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atributoveiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idveiculo'], 'required'],
            [['idveiculo'], 'integer'],
            [['descricaoatributo'], 'string', 'max' => 100],
            [['idveiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Veiculo::className(), 'targetAttribute' => ['idveiculo' => 'idveiculo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idatributoveiculo' => 'Idatributoveiculo',
            'idveiculo' => 'Idveiculo',
            'descricaoatributo' => 'Atributos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getidveiculo()
    {
        return $this->hasOne(Veiculo::className(), ['idveiculo' => 'idveiculo']);
    }
}
