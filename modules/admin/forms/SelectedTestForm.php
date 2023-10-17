<?php
/*
 *   Jamshidbek Akhlidinov
 *   17 - 10 2023 15:20:12
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\forms;

use app\models\SelectedTest;
use app\models\SelectedTestItem;
use yii\base\Model;

class SelectedTestForm extends Model
{
    public $name;
    public $description;

    public $items;

    public function __construct(
        public SelectedTest $model,
                            $config = []
    )
    {
        $this->name = $model->name;
        $this->description = $model->description;
        $this->items = $this->initItems($this->model);
        parent::__construct($config);
    }


    public function save()
    {
        $model = $this->model;
        $model->name = $this->name;
        $model->description = $this->description;
        if ($isSave = $model->save()) {
            $this->saveItem($model);
        }
        return $isSave;
    }

    public function rules()
    {
        return [
            [['items', 'name', 'description'], 'save'],
        ];
    }


    public function saveItem(SelectedTest $model)
    {
        SelectedTestItem::deleteAll(['selected_test_id' => $model->id]);

        foreach ($this->items as $item) {
            $itemModel = new SelectedTestItem([
                'subject_id' => $item['subject_id'],
                'selected_test_id' => $model->id,
                'count' => $item['count'],
            ]);
            echo $itemModel->save();
        }
    }

    private function initItems(SelectedTest $model)
    {
        $itemsModel = SelectedTestItem::find()->andWhere([
            'selected_test_id' => $model->id,
        ])->all();
        $items = [];
        foreach ($itemsModel as $item) {
            $items[] = [
                'count' => $item->count,
                'subject_id' => $item->subject_id,
            ];
        }
        return $items;
    }

}