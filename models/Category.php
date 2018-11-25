<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Company[] $companies
 */
class Category extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['icon'], 'string', 'max' => 255],
            [['created_at'], 'safe'],
            [['updated_at'], 'safe'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::class, ['category_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function mapCategoriesIds()
    {
        return ArrayHelper::map(static::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
    }
}
