<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\system\ContactForm;
use app\models\system\QueryForm;
use app\models\system\BookInfo;

class SystemController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return Response|string
     */
    public function actionIndex()
    {
        $model = new BookInfo();
        $params = new QueryForm();
        $Books = $model->findBooks();
        return $this->render('index', [
            'books' => $Books,
            'query' => $params,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $form = new ContactForm();
        $bookInfo = new BookInfo();
        $id = Yii::$app->request->get('id');
        if ($id) {
            $book = $bookInfo->findOneBookById($id);
            $form->loadBook($book);
        }
        return $this->render('contact', [
            'model' => $form,
        ]);
    }

    /**
     * contactform submit.
     */
    public function actionSubmit()
    {
        $request =  YII::$app->request;
        $params = $request->post('ContactForm');
        $form = new ContactForm();
        $bookInfo = new BookInfo();
        $id = $request->get('id');
        if ($id) {
            $result = $bookInfo->updateOneBookById($id, [
                'name' => $params['name'],
                'type' => $params['type'],
                'price' => $params['price'],
                'pages' => $params['pages'],
            ]);
        } else {
            $result = $bookInfo->addOneBook([
                'name' => $params['name'],
                'type' => $params['type'],
                'price' => $params['price'],
                'pages' => $params['pages'],
            ]);
        }
        if ($result) {
            return $this->redirect(['index']);
        }
        return $this->render('contact', [
            'model' => $form,
        ]);
    }

    /**
     *  delete
     */
    public function actionDelete()
    {
        $request =  YII::$app->request;
        $bookInfo = new BookInfo();
        $id = $request->get('id');
        $result = $bookInfo->deleteOneBookById($id);
        $this->redirect(['index']);
    }

    /**
     *  query
     */
    public function actionQuery()
    {
        $request =  YII::$app->request;
        $params = $request->post('QueryForm');
        
        $model = new BookInfo();
        $Books = $model->findBooksByParams($params);
        
        $query = new QueryForm();
        $query->loadParams($params);
        return $this->render('index', [
            'books' => $Books,
            'query' => $query
        ]);
    }
}
