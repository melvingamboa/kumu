<?php

namespace app\models;
use Yii;

/**
 * This is the model class for table "guests".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email_address
 * @property string|null $phone_number
 * @property string|null $gender
 * @property string|null $street
 * @property string|null $city
 * @property string|null $country
 * @property string|null $zipcode
 */
class Guests extends \yii\db\ActiveRecord
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
            [['first_name', 'last_name', 'email_address','street','city','country','zipcode','gender'], 'required'],
            [['first_name', 'last_name', 'email_address', 'phone_number', 'street', 'city', 'country'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 2],
            [['zipcode'], 'string', 'max' => 45],
            ['email_address', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email_address' => 'Email Address',
            'phone_number' => 'Phone Number',
            'gender' => 'Gender',
            'street' => 'Street',
            'city' => 'City',
            'country' => 'Country',
            'zipcode' => 'Zipcode',
        ];
    }
}
