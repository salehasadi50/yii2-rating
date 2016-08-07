<?php

namespace salehasadi\rating\models;

use Yii;
use dektrium\user\models\User;

/**
 * This is the model class for table "{{%rating}}".
 *
 * @property integer $id
 * @property string $value
 * @property integer $service_id
 * @property integer $item_id
 * @property integer $user_id
 * @property integer $status
 * @property string $update_time
 *
 * @property User $user
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%rating}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value', 'service_id', 'item_id', 'user_id'], 'required'],
            [['service_id', 'item_id', 'user_id', 'status'], 'integer'],
            [['update_time'], 'safe'],
            [['value'], 'string', 'max' => 64],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'service_id' => 'Service ID',
            'item_id' => 'Item ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
