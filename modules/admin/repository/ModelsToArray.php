<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 10 2023 18:25:54
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\repository;

use app\models\Question;
use app\models\Subject;
use app\models\Test;
use yii\helpers\ArrayHelper;

class ModelsToArray
{
    public static function getSubject()
    {
        return ArrayHelper::map(
            Subject::find()->all(),
            'id',
            'name',
        );
    }

    public static function getTest()
    {
        return ArrayHelper::map(
            Test::find()->all(),
            'id',
            'name',
        );
    }

    public static function getQuestion()
    {
        return ArrayHelper::map(
            Question::find()->all(),
            'id',
            'text',
        );
    }


}