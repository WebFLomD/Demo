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
class Admin extends \yii\db\ActiveRecord
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
            'id_user' => 'Id User',
            'title' => 'Title',
            'num_car' => 'Num Car',
            'description' => 'Description',
            'date' => 'Date',
            'status' => 'Status',
            'answer' => 'Answer',
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
}
