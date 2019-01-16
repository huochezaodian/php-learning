<?php
namespace app\models\system;

use yii\db\ActiveRecord;

class Library extends ActiveRecord
{
    /**
     * @return string Active Record 类关联的数据库表名称
     */
    public static function tableName()
    {
        return '{{library}}';
    }
}
?>