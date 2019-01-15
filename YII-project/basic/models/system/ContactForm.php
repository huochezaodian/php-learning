<?php

namespace app\models\system;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $type;
    public $price;
    public $pages;
    public $id;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'type', 'price', 'pages'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

    /**
     * loadBook
     * @param book
     */
    public function loadBook($book)
    {
        $this->name = $book['name'];
        $this->type = $book['type'];
        $this->price = $book['price'];
        $this->pages = $book['pages'];
        $this->id = $book['id'];
    }
}
