<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 06.12.2018
 * Time: 17:45
 */

namespace mvc;


class Route
{
    /**
     * @var string
     */
    private $uri = '';
    /**
     * @var string
     */
    private $appFolder;
    /**
     * @var string
     */
    public $controller = '';
    /**
     * @var string
     */
    public $action = '';
    /**
     * @var string
     */
    public $param = '';

    /**
     * Route constructor.
     *
     * @param string $uri
     * @param string $appFolder
     */
    public function __construct(string $uri, string $appFolder)
    {
        $this->uri = $uri;
        $this->appFolder = str_replace('/', '\\', $appFolder);
        $this->resolveUri();
    }

    private function resolveUri()
    {
        $uri = trim($this->uri);
        if ('/' == $uri) {
            $uri = '';
        }

        $uriParts = explode('/', $uri);
        array_shift($uriParts);

        if (!empty($uriParts[0])) {
            $this->controller = $uriParts[0];
            if (!empty($uriParts[1])) {
                $this->action = $uriParts[1];
                if (isset($uriParts[2])) {
                    $this->param = $uriParts[2];
                }
            } else {
                $this->action = 'index';
            }
        } else {
            $this->controller = 'index';
            $this->action = 'index';
        }

        $this->controller = ucfirst($this->controller);
        $this->controller = "\\{$this->appFolder}controllers\\{$this->controller}Controller";
    }
}