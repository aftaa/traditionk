<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 06.12.2018
 * Time: 20:16
 */

namespace mvc;


class View
{
    /**
     * @var string
     */
    private $viewFolder;

    /**
     * View constructor.
     */
    public function __construct()
    {
        $appFolder = App::getConfig()['appFolder'];
        $this->viewFolder = "$appFolder/views";
    }

    /**
     * @param string $viewFile
     * @param array  $params
     */
    public function render(string $viewFile, array $params)
    {
        extract($params);
        $viewFile = "$this->viewFolder/$viewFile.php";
        include $viewFile;
    }
}