<?php
    class Route{
        public function getRoute($route)
        {
            include __DIR__."//..//controller/BookController.php";
            include __DIR__."//..//controller/AuthController.php";
            $bookController = new BookController();
            $authController = new AuthController();
            if('/sd3/'===$route)
            {
                $page=$bookController->home();
            }
            elseif('/sd3/list'=== $route)
            {   
                $page=$bookController->showList();

            }
            elseif('/sd3/show'=== $route)
            {   
                $page=$bookController->show();

            }
            elseif('/sd3/add'=== $route)
            {
                if($authController->isLoggedIn()){
                    $page=$bookController->saveEdit();
                }else{
                    $page=$bookController->home();
                }
            }
            elseif('/sd3/authorList'===$route)
            {
                $page=$bookController->getAuthorList();
            }
            elseif('/sd3/categoryList' ===$route)
            {
                $page=$bookController->getCategoryList();
            }
            elseif('/sd3/update' === $route)
            {
                $page=$bookController->saveEdit();
            }
            elseif('/sd3/delete'===$route)
            {
                $page=$bookController->delete();
            }
            elseif('/sd3/login'===$route)
            {
                $page=$authController->login();
            }
            elseif('/sd3/logout'===$route)
            {
                $page=$authController->logout();
            }
            elseif('/sd3/order')
            {
                $page=$bookController->orderBook();
            }

            
            return $page;
        }
    }