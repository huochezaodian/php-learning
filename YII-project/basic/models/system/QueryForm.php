<?php

namespace app\models\system;

use Yii;
use yii\base\Model;

/**
 * QueryForm is the model behind the query form.
 */
class QueryForm extends Model
{
    public $name;
    public $type;

    /**
     * loadParams
     * @param params
     */
    public function loadParams($query)
    {
        $this->name = $query['name'];
        $this->type = $query['type'];
    }
}
