<?php

namespace app\models;
use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $event_name
 * @property string $event_location
 * @property string|null $event_date
 * @property string|null $flag_show
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_name', 'event_location', 'flag_show'], 'required'],
            [['event_date'], 'safe'],
            [['event_name', 'event_location'], 'string', 'max' => 255],
            [['flag_show'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_name' => 'Event Name',
            'event_location' => 'Event Location',
            'event_date' => 'Event Date',
            'flag_show' => 'Show/Hide',
        ];
    }

}
