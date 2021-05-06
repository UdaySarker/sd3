<?php 

class EntryPoint{

    private $routes;
    private $route;
    public function __construct($route)
    {
        include __DIR__."//..//Routes/Routes.php";
        $this->routes=new Route();
        $this->route=$route;
        $this->checkRoute();
    }

    public function checkRoute()
    {
        // if($this->route!=strtolower($this->route))
        // {
        //     http_response_code(301);
        //     echo "No Route found";
        //     exit();
        // }
    }
    public function loadTemplate($templateName,$variable=[])
    {   
        extract($variable);
        ob_start();
        include __DIR__."//..//templates/".$templateName;

        return ob_get_clean();
    }
    public function run()
    {   
        
        $page=$this->routes->getRoute($this->route); 
        $title=$page['title'];
        if(isset($page['variables']))
        {
            $output=$this->loadTemplate($page['template'],$page['variables']);
        }else
        {
            $output=$this->loadTemplate($page['template']);
        }

        include __DIR__."//..//templates/layout.html.php";
    }
}