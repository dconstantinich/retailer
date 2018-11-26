<?php

namespace app\models;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string $website
 * @property string $created_at
 * @property string $updated_at
 *
 * @property string $categoryName
 * @property string $websiteShort
 *
 * @property Category $category
 */
class Company extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['category_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['website'], 'string', 'max' => 45],
            [['website'], 'url', 'defaultScheme' => 'https'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class,
                'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => 'Category ID',
            'categoryName' => 'Category',
            'website' => 'Website',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * @return string
     */
    public function getCategoryName()
    {
        return empty($this->category_id) ? 'Deleted' : $this->category->name;
    }

    /**
     * @return string
     */
    public function getWebsiteShort()
    {
        return str_replace(['http://', 'https://'], '', $this->website);
    }
}
