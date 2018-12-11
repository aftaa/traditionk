<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 06.12.2018
 * Time: 20:12
 */

namespace app\controllers;


use app\models\NumberModel;
use mvc\App;
use mvc\Controller;

class IndexController extends Controller
{
    /**
     * Add action.
     *
     * @param mixed $param
     */
    public function add($param)
    {
        $this->session->set('number', $param);
        $this->render('index/add', [
            'number' => $param,
        ]);
    }

    /**
     * Show action.
     */
    public function show()
    {
        $number = $this->session->get('number');
        $this->render('index/show', [
            'number' => $number,
        ]);
    }

    /**
     * Save action.
     */
    public function save()
    {
        $number = $this->session->get('number');

        $numberModel = new NumberModel(App::getConfig()['pdo']);
        $numberModel->save($number);

        $this->render('index/save', [
            'number' => $number,
        ]);
    }

    /**
     * Load action.
     */
    public function load()
    {
        $numberModel = new NumberModel(App::getConfig()['pdo']);
        $number = $numberModel->load();

        $this->session->set('number', $number);

        $this->render('index/load', [
            'number' => $number,
        ]);
    }
}