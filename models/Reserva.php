<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservas".
 *
 * @property integer $id
 * @property integer $usuario_id
 * @property integer $vuelo_id
 * @property string $fecha_hora
 * @property string $asiento
 *
 * @property Usuarios $usuario
 * @property Vuelos $vuelo
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario_id', 'vuelo_id', 'asiento'], 'required'],
            [['usuario_id', 'vuelo_id'], 'integer'],
            [['fecha_hora'], 'safe'],
            [['asiento'], 'number'],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_id' => 'id']],
            [['vuelo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vuelo::className(), 'targetAttribute' => ['vuelo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario_id' => 'Usuario ID',
            'vuelo_id' => 'Vuelo ID',
            'fecha_hora' => 'Fecha Hora',
            'asiento' => 'Asiento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id'])->inverseOf('reservas');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVuelo()
    {
        return $this->hasOne(Vuelo::className(), ['id' => 'vuelo_id'])->inverseOf('reservas');
    }
}
