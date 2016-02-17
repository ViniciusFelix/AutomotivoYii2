<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "veiculo".
 *
 * @property integer $idveiculo
 * @property string $nomeveiculo
 * @property integer $anofabricacao
 * @property integer $anomodelo
 * @property integer $idmarcaveiculo
 * @property string $datacompra
 * @property string $cor
 *
 * @property Atributoveiculo[] $atributoveiculos
 * @property Marcaveiculo $idmarcaveiculo0
 */
class Veiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'veiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomeveiculo', 'idmarcaveiculo', 'datacompra', 'cor'], 'required'],
            [['anofabricacao', 'anomodelo', 'idmarcaveiculo'], 'integer'],
            [['datacompra'], 'safe'],
            [['nomeveiculo', 'cor'], 'string', 'max' => 100],
            [['idmarcaveiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Marcaveiculo::className(), 'targetAttribute' => ['idmarcaveiculo' => 'idmarcaveiculo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idveiculo' => 'Idveiculo',
            'nomeveiculo' => 'Nome veiculo',
            'anofabricacao' => 'Ano fabricacao',
            'anomodelo' => 'Ano modelo',
            'idmarcaveiculo' => 'Marca veiculo',
            'datacompra' => 'Data compra',
            'cor' => 'Cor',
        	'atributoveiculos' => 'Atributos veiculo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getatributoveiculo()
    {
        return $this->hasMany(Atributoveiculo::className(), ['idveiculo' => 'idveiculo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getmarcaveiculo()
    {
        return $this->hasOne(Marcaveiculo::className(), ['idmarcaveiculo' => 'idmarcaveiculo']);
    }
}
