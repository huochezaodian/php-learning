<?php

namespace app\models\system;

use Yii;
use yii\base\Model;

class BookInfo extends Model
{
    public function __construct () {
        $this->findBooks();
    }

    /**
     * Finds books
     *
     * @return array
     */
    public function findBooks()
    {
        return [
            '0' => [
                'id' => '1',
                'name' => '1',
                'price' => '1',
                'pages' => '1',
                'type' => 'js'
            ],
            '1' => [
                'id' => '2',
                'name' => '2',
                'price' => '2',
                'pages' => '21',
                'type' => 'css'
            ],
        ];
    }
}
