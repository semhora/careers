<?php

namespace Core;

class Route
{
    private $routes;

    public function __construct(array $routes)
    {
        $this->setRoutes($routes);
        $this->run();
    }

    /*
    * Formata as rotas
    */
    private function setRoutes($rotas)
    {
        $novaRotas = [];

        foreach ($rotas as $rota)
        {
            $explode = explode("@", $rota[1]);
            $r = [$rota[0], $explode[0], $explode[1]];

            $novaRotas[] = $r;
        }

        $this->routes = $novaRotas;
    }

    private function getRequest()
    {
        $obj = new \stdClass();

        foreach ($_POST as $key => $value)
        {
           @$obj->post->$key = $value;
        }

        return $obj;
    }


    /*
     * Retorna os parametros da URL.
     * Necessário que o .htaccess esteja funcionando.
     */
    private function getURL()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }


    /*
     *
     * Necessário que o .htaccess esteja funcionando.
     */
    private function run()
    {
        $urlRequestFull =  $this->getURL();
        $urlRequest = explode("/", $urlRequestFull);

        foreach ($this->routes as $route)
        {
            $url = explode("/", $route[0]);

            for($i = 0; $i < count($url); $i++)
            {
                $isLength = count($url) && count($urlRequest);

                if((strpos($url[$i], "{") !== false) && $isLength)
                {
                    $url[$i] = $urlRequest[$i];
                    $paramentros[] = $url[$i];

                }

                $route[0] = implode($url, "/");
            }

            // Rota match com a requisicao. Instancia o controller.
            if($urlRequestFull == $route[0])
            {
                $controller = $route[1];
                $action = $route[2];

                $controller = Container::newController($controller);

                if (isset($paramentros) && count($paramentros) == 1) {
                    $controller->$action($paramentros[0], $this->getRequest());
                }else{
                    //print_r($this->getRequest());
                    $controller->$action($this->getRequest());
                }

                break;
            }

        }

    }


}