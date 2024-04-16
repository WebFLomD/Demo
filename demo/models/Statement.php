<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statement".
 *
 * @property int $id
 * @property int $id_user
 * @property string $title
 * @property string $num_car
 * @property string $description
 * @property string $date
 * @property int $status
 * @property string $answer
 *
 * @property User $user
 */
class Statement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'title', 'num_car', 'description', 'answer'], 'required'],
            [['id_user', 'status'], 'integer'],
            [['description', 'answer'], 'string'],
            [['date'], 'safe'],
            [['title', 'num_car'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Пользователь',
            'title' => 'Название',
            'num_car' => 'Номер авто (H777HH77)',
            'description' => 'Описание',
            'date' => 'Дата',
            'status' => 'Статус',
            'answer' => 'Ответ',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    public function statusText()
    {
        switch ($this->status)
        {
            case 1: return 'Новая';
            case 2: return 'Решено';
            case 3: return 'Отклонено';
        }
    }
}
