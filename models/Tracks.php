<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tracks".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $comment
 */
class Tracks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tracks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['comment'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Usuario',
            'name' => 'Nombre de Ruta',
            'comment' => 'Comentario',
        ];
    }
}
