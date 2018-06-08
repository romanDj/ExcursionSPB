<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "excursion".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $date
 * @property int $place
 * @property string $img
 *
 * @property Records[] $records
 */
class Excursion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'excursion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['date'], 'safe'],
            [['place'], 'integer'],
            [['name', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'date' => 'Дата',
            'place' => 'Количество мест',
            'img' => 'Изорбражение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Records::className(), ['id_excursion' => 'id']);
    }

    public static function getAll(){

        $exc = Excursion::find()->all();
        return $exc;

    }

    public static function  getUserExc(){
        return  Excursion::find()
            ->joinWith('records')
            ->where(['records.id_user' => Yii::$app->user->identity->id ])
            ->all();
    }

}
