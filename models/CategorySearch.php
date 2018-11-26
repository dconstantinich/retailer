<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CategorySearch represents the model behind the search form of `app\models\Category`.
 */
class CategorySearch extends Category
{
    use DateFormatter;

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
            [['id'], 'integer'],
            [['name', 'createdFrom', 'createdTo', 'updatedFrom', 'updatedTo',], 'safe'],
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
        $query = Category::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['between', 'created_at',
            $this->convertStrDateToFormat($this->createdFrom, 'd.m.Y','Y-m-d'),
            $this->convertStrDateToFormat($this->createdTo, 'd.m.Y','Y-m-d')
        ]);
        $query->andFilterWhere(['between', 'updated_at',
            $this->convertStrDateToFormat($this->updatedFrom, 'd.m.Y','Y-m-d'),
            $this->convertStrDateToFormat($this->updatedTo, 'd.m.Y','Y-m-d')
        ]);
        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
