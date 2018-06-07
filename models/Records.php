<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "records".
 *
 * @property int $id
 * @property int $id_excursion
 * @property int $id_user
 *
 * @property Excursion $excursion
 * @property User $user
 */
class Records extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'records';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_excursion', 'id_user'], 'integer'],
            [['id_excursion'], 'exist', 'skipOnError' => true, 'targetClass' => Excursion::className(), 'targetAttribute' => ['id_excursion' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_excursion' => 'Экскурсия',
            'id_user' => 'Участник',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExcursion()
    {
        return $this->hasOne(Excursion::className(), ['id' => 'id_excursion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
