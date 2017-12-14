<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "positions".
 *
 * @property integer $id
 * @property string $time
 * @property integer $user_id
 * @property integer $track_id
 * @property double $latitude
 * @property double $longitude
 * @property double $altitude
 * @property double $speed
 * @property double $bearing
 * @property integer $accuracy
 * @property string $provider
 * @property string $comment
 * @property integer $image_id
 */
class Positions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'positions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'safe'],
            [['user_id', 'track_id', 'latitude', 'longitude'], 'required'],
            [['user_id', 'track_id', 'accuracy', 'image_id'], 'integer'],
            [['latitude', 'longitude', 'altitude', 'speed', 'bearing'], 'number'],
            [['provider'], 'string', 'max' => 100],
            [['comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Tiempo',
            'user_id' => 'Usuario',
            'track_id' => 'Ruta',
            'latitude' => 'Latitud',
            'longitude' => 'Longitud',
            'altitude' => 'Altitud',
            'speed' => 'Speed',
            'bearing' => 'Bearing',
            'accuracy' => 'Accuracy',
            'provider' => 'Provider',
            'comment' => 'Comentario',
            'image_id' => 'Image ID',
        ];
    }
}
