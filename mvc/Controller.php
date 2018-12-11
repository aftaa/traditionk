<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 06.12.2018
 * Time: 20:16
 */

namespace mvc;


class Controller
{
    /**
     * @var View
     */
    protected $view;
    /**
     * @var Session
     */
    protected $session;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new View;
        $this->session = App::getSession();
    }

    /**
     * @param string $viewFile
     * @param array  $params
     */
    protected function render(string $viewFile, array $params)
    {
        $this->view->render($viewFile, $params);
    }
}