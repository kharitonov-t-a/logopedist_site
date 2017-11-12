<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Messege;
use Constants;
/**
 * MessegeSearch represents the model behind the search form about `app\models\Messege`.
 */
class MessegeSearch extends Messege
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['searchid'], 'integer'],
            [['messege'], 'safe'],
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
        $query = Messege::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'linkmessegeid' => SORT_DESC,
                    'id' => SORT_ASC, 
                ]
            ],
        ]);



        // $models = array_values($dataProvider1->getModels());
        // var_dump($query);
        // if(count($models) == 11 && $models[10]->attributes["typemessege"] == Constants::QUESTION)
        // {
        //     $dataProvider = new ActiveDataProvider([
        //         'query' => $query,
        //         'pagination' => [
        //             'pageSize' => 10,
        //         ],
        //         'sort' => [
        //             'defaultOrder' => [
        //                 'linkmessegeid' => SORT_DESC,
        //                 'id' => SORT_ASC, 
        //             ]
        //         ],
        //     ]);

        //     // $this->load($params);
        // }else{
        //     $dataProvider = new ActiveDataProvider([
        //         'query' => $query,
        //         'pagination' => [
        //             'pageSize' => 11,
        //         ],
        //         'sort' => [
        //             'defaultOrder' => [
        //                 'linkmessegeid' => SORT_DESC,
        //                 'id' => SORT_ASC, 
        //             ]
        //         ],
        //     ]);
        // }
        // $models = array_values($dataProvider->getModels());
        // var_dump($models);

        $this->load($params);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'linkmessegeid' => $this->searchid,
        ]);

        $subQuery = Messege::find();
        $subQuery -> select('linkmessegeid');
        $subQuery->andFilterWhere(['like', 'messege', $this->messege]);

        $query->andFilterWhere([
            'linkmessegeid' => $subQuery,
        ]);
        $query->orFilterWhere([
            'id' => $subQuery,
        ]);

        return $dataProvider;
    }
}
