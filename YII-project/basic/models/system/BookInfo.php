<?php

namespace app\models\system;

use Yii;
use yii\base\Model;
use app\models\system\Library;

class BookInfo extends Model
{
    /**
     * 检查 library 表是否存在
     * 若存在，则跳过创建表操作
     */
    public function createTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `library` (
                `id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `name` varchar(32) default NULL,
                `type` varchar(32) default NULL,
                `price` varchar(32) default NULL,
                `pages` varchar(32) default NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
        Yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * Find books
     *
     * @return array
     */
    public function findBooks()
    {
        $this->createTable();
        $books = Library::find()->all();
        return $books;
    }

    /**
     * Find books by params
     *
     * @return array
     */
    public function findBooksByParams($params)
    {
        $condition = [];
        foreach($params as $key => $value)
        {
            $value && $condition[$key] = $value;
        }
        if (empty($condition)) {
            $books = Library::find()->all();
        } else {
            $books = Library::findAll($condition);
        }
        return $books;
    }

    /**
     * Find one book book by id
     *@param id
     * @return array
     */
    public function findOneBookById($bookid)
    {
        $book = Library::findOne(['id' => $bookid]);
        return $book;
    }

    /**
     * delete one book by id
     *@param id
     * @return array
     */
    public function deleteOneBookById($bookid)
    {
        $result = Yii::$app->db->createCommand()
                            ->delete('library', 'id = '.$bookid)
                            ->execute();
        return $result;
    }

    /**
     * add one book
     *@param array
     * @return array
     */
    public function addOneBook($params)
    {
        $result = Yii::$app->db->createCommand()
                            ->insert('library', $params)
                            ->execute();
        return $result;
    }

    /**
     * update one book by id
     *@param array
     * @return array
     */
    public function updateOneBookById($bookid, $params)
    {
        $result = Yii::$app->db->createCommand()
                            ->update('library', $params, 'id = '.$bookid)
                            ->execute();
        return $result;
    }
}
