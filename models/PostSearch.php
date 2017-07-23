<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PostSearch represents the model behind the search form about `app\models\Post`.
 */
class PostSearch extends Post
{
    public $genre;
    public $producer;
    public $actors;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'created_at'], 'integer'],
            [['extension', 'title', 'issue', 'genre' , 'producer', 'actors'], 'string'],
            [['rating'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Post::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            //'rating' => $this->rating,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'extension', $this->extension])
            ->andFilterWhere(['like', 'issue', $this->issue]);


        // Фильтр по тегам
        $count_tag = 0;
        if($this->genre) {
            $count_tag++;
        }
        if($this->producer) {
            $count_tag++;
        }
        if($this->actors) {
            $count_tag++;
        }


        if($this->genre || $this->producer || $this->actors) {
            $query->joinWith(['tags' => function ($q) {
                $q->andFilterWhere(['like', 'tag.name', $this->genre])
                    ->orFilterWhere(['like', 'tag.name', $this->producer])
                    ->orFilterWhere(['like', 'tag.name', $this->actors]);

            }]);
            $query->groupBy('post.id')
                ->having('COUNT(*)='.$count_tag);
        }

        return $dataProvider;
    }

    /**
     * Creates search query
     *
     * @param array $params
     *
     * @return object $query
     */
    public function postSearch($params)
    {
        $query = Post::find();
        // add conditions that should always apply here
        $this->category_id = 1;
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');

            return $query;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            //'rating' => $this->rating,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'extension', $this->extension])
            ->andFilterWhere(['like', 'issue', $this->issue]);


        // Фильтр по тегам
        $count_tag = 0;
        if($this->genre) {
            $count_tag++;
        }
        if($this->producer) {
            $count_tag++;
        }


        if($this->genre || $this->producer) {
            $query->joinWith(['tags' => function ($q) {
                $q->andFilterWhere(['like', 'tag.name', $this->genre])
                    ->orFilterWhere(['like', 'tag.name', $this->producer]);

            }]);
            $query->groupBy('post.id_')
                ->having('COUNT(*)='.$count_tag);
        }


        $query->orderBy(['id' => SORT_DESC]);

        return $query;
    }

}
