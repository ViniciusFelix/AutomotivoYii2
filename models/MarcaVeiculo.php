<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marcaveiculo".
 *
 * @property integer $idmarcaveiculo
 * @property string $nomemarca
 */
class MarcaVeiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marcaveiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomemarca'], 'required'],
            [['nomemarca'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmarcaveiculo' => 'Idmarcaveiculo',
            'nomemarca' => 'Nome da marca',
        ];
    }
}
