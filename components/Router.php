<?php

  class Router{


        private $routes;


        public function __construct(){
            $routesPath = ROOT . '/config/routes.php';
            $this->routes = include($routesPath);
        }

        private function isAuth(){
          session_start();
          if(  isset( $_SESSION['user'] ) ){
            return true;
          }
          return false;
        }

        /**
        *return current uri, or ser uri to login page
        *@return string
        */
        private function getUri(){
          $uri = "";
          if( !empty( $_SERVER['REQUEST_URI'] ) ){
            $uri = trim( $_SERVER['REQUEST_URI'], '/' );
          }
          if( $this->isAuth() or $this->isPermittedUri($uri) ){
            return $uri;
          }
          //user not auth, set route to login
          return "login";
        }

        //return True if uri permit redirection for users without authentication
        private function isPermittedUri( $uri ){
          //permited routs
          $permitedRoutesPath = ROOT . '/config/permitedRoutes.php';
          $permitRouts = include($permitedRoutesPath);
          return in_array( $uri, $permitRouts );
        }

        public function run(){

          //get uri
          $uri = $this->getUri();

          //matching request in routes
          foreach( $this->routes as $uriPattern => $path  ){

              if( preg_match( "~$uriPattern~", $uri ) ){

                //echo "<br>".$uriPattern;
                //echo '<br>'. $path;

                //replace parameters
                $internalRoute = preg_replace( "~$uriPattern~", $path, $uri );
                //echo '<br>'. $internalRoute;

                //define coontroller and action
                $segments = explode('/', $internalRoute);

                //get name of controller and action
                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $actionName = 'action' . ucfirst(array_shift($segments));

                //echo '<br>'.$controllerName;
                //echo '<br>'.$actionName;

                //only params left
                $params = $segments;

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if( file_exists($controllerFile) ){
                  include_once( $controllerFile );
                }
                else {
                  echo $controllerFile . 'not found';
                }

                //create instance
                $controllerObject = new $controllerName();

                $result = call_user_func_array( array($controllerObject, $actionName), $params );

                //!!!!!!
                break;
              }

          }

        }

  }



?>
