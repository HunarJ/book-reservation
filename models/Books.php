<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $num_reservations
 * @property int|null $booked
 * @property string|null $booked_from
 * @property string|null $booked_to
 * @property int|null $booked_by
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

   /* public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false
            ],
        ];
    }*/

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['num_reservations', 'booked', 'booked_by'], 'integer'],
            [['booked_from', 'booked_to'], 'safe'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'num_reservations' => 'Num Reservations',
            'booked' => 'Booked',
            'booked_from' => 'Booked From',
            'booked_to' => 'Booked To',
            'booked_by' => 'Booked By',
        ];
    }

    public function getBookedBy()
    {
        return $this->hasOne(User::className(), [ 'id' => 'booked_by']);
    }
}
