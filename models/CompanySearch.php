<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CompanySearch represents the model behind the search form of `app\models\Company`.
 */
class CompanySearch extends Company
{
    use DateFormatter;

    public $categoryName;
    public $createdFrom;
    public $createdTo;
    public $updatedFrom;
    public $updatedTo;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['name', 'website', 'categoryName', 'createdFrom', 'createdTo', 'updatedFrom', 'updatedTo',], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Company::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'name',
                    'categoryName' => [
                        'asc' => ['category.name' => SORT_ASC],
                        'desc' => ['category.name' => SORT_DESC],
                    ],
                    'website',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith('category');
            return $dataProvider;
        }

        $query->joinWith('category');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['between', 'company.created_at',
            $this->convertStrDateToFormat($this->createdFrom, 'd.m.Y','Y-m-d'),
            $this->convertStrDateToFormat($this->createdTo, 'd.m.Y','Y-m-d')
        ]);
        $query->andFilterWhere(['between', 'company.updated_at',
            $this->convertStrDateToFormat($this->updatedFrom, 'd.m.Y','Y-m-d'),
            $this->convertStrDateToFormat($this->updatedTo, 'd.m.Y','Y-m-d')
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'category.name', $this->categoryName]);

        return $dataProvider;
    }
}
