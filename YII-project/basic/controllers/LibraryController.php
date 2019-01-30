<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use app\models\system\BookInfo;
use yii\helpers\ArrayHelper;

class LibraryController extends Controller
{
    public $enableCsrfValidation = false;
    // public function runAction($id, $params = []){
    //     $params = ArrayHelper::merge(Yii::$app->request->post(),$params);
    //     return parent::runAction($id, $params);
    // }
    /**
     * Displays homepage.
     *
     * @return Response|string
     */
    public function actionIndex()
    {
        $model = new BookInfo();
        $Books = $model->findBooks();
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'books' => $Books,
            'statu' => true
        ];
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionQueryone()
    {
        $request =  YII::$app->request;
        $response = YII::$app->response;
        $response->format = Response::FORMAT_JSON;
        if ($request->isGet) {
            $id = $request->get('id');
            $model = new BookInfo();
            $book = $model->findOneBookById($id);
            return [
                "book" => $book,
                "status" => true,
                "msg" => ""
            ];
        }
        $response->statusCode = 405;
        return [
            "result" => [],
            "status" => false,
            "msg" => "method is not allowed"
        ];
    }

    /**
     *  add.
     */
    public function actionAdd()
    {
        $request =  YII::$app->request;
        $response = YII::$app->response;
        $response->format = Response::FORMAT_JSON;
        if ($request->isPost) {
            $params = $request->post();
            $model = new BookInfo();
            $result = $model->addOneBook([
                'name' => $params['name'],
                'type' => $params['type'],
                'price' => $params['price'],
                'pages' => $params['pages'],
            ]);
            return [
                "result" => $result,
                "status" => true,
                "msg" => ""
            ];
        }
        $response->statusCode = 405;
        return [
            "result" => [],
            "status" => false,
            "msg" => "method is not allowed"
        ];
    }

     /**
     *  edit.
     */
    public function actionEdit()
    {
        $request =  YII::$app->request;
        $response = YII::$app->response;
        $response->format = Response::FORMAT_JSON;
        if ($request->isPost) {
            $params = $request->post();
            $model = new BookInfo();
            $result = $model->addOneBook([
                'name' => $params['name'],
                'type' => $params['type'],
                'price' => $params['price'],
                'pages' => $params['pages'],
            ]);
            return [
                "result" => $result,
                "status" => true,
                "msg" => ""
            ];
        }
        $response->statusCode = 405;
        return [
            "result" => [],
            "status" => false,
            "msg" => "method is not allowed"
        ];
    }

    /**
     *  delete
     */
    public function actionDelete()
    {
        $request =  YII::$app->request;
        $response = YII::$app->response;
        $response->format = Response::FORMAT_JSON;
        if ($request->isGet) {
            $id = $request->get('id');
            $model = new BookInfo();
            $result = $model->deleteOneBookById($id);
            return [
                "result" => $result,
                "status" => true,
                "msg" => ""
            ];
        }
        $response->statusCode = 405;
        return [
            "result" => [],
            "status" => false,
            "msg" => "method is not allowed"
        ];
    }

    /**
     *  query
     */
    public function actionQuery()
    {
        $request =  YII::$app->request;
        $response = YII::$app->response;
        
        $response->format = Response::FORMAT_JSON;
        if ($request->isPost) {
            $post = $request->post();
            $model = new BookInfo();
            $Books = $model->findBooksByParams($post);
            return [
                "books" => $Books,
                "status" => true,
                "msg" => ""
            ];
        }
        $response->statusCode = 405;
        return [
            "books" => [],
            "status" => false,
            "msg" => "method is not allowed"
        ];
    }
}
