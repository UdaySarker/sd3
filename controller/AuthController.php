<?php
    class AuthController{
        private $user;
        public function __construct()
        {
            include __DIR__."//..//config/DatabaseConnection.php";
            include __DIR__."//..//config/DatabaseConnection.php";
            $this->user=new DatabaseTable($pdo,'users','id');
            session_start();
        }
        public function checkLogin($userdata)
        {
            $data= $this->getUser($userdata);
            if($data['username']===$userdata['username'] && $data['password']===$userdata['password'])
            {
                return true;
            }
            return false;
        }

        private function getUser($userdata)
        {
            $data= $this->user->findUser($userdata['username']);
            if($data['username']===$userdata['username'] && $data['password']===$userdata['password'])
            {
                return $data;
            }
            return false;
        }

        public function isLoggedIn(){
            if(!empty($_SESSION['username']))
            {
                return true;
            }
            return false;
        }
        public function login()
        {
            try{
                if(isset($_POST['user'])){
                    $user=$_POST['user'];
                    $authUser=$this->getUser($user);
                    if($this->checkLogin($user))
                    {
                        session_regenerate_id();
                        $_SESSION['username']=$authUser['username'];
                        $_SESSION['role']=$authUser['role'];
                        header('location:/sd3/');
                    }else{
                        $error="Username or Password Error";
                    }
                }
            }catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            return ['template'  =>'login.html.php',
                    'title'     =>"Admin Login",
                    'variables' =>[
                        'error'=>$error ?? '',
            ]];
        }

        public function logout()
        {
            $_SESSION['username']=='';
            session_destroy();
            header('location:/sd3/');
        }
    }