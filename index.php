<?php
    ob_start();
    session_start();
    // session_destroy();
    require_once "models/DataBase.php";
<<<<<<< HEAD
    $allowed = ['Landing', 'Login', 'Dashboard', 'Users'];
    $controller = isset($_REQUEST['c']) ? $_REQUEST['c'] : "Landing";
    if (!in_array($controller, $allowed)) {
    $controller = "Landing"; // 
}
=======
    $controller = isset($_REQUEST['c']) ? $_REQUEST['c'] : "Landing";
>>>>>>> 1c38821efa14c73d8f32a9f511ef5080ea4b0352
    $route_controller = "controllers/" . $controller . ".php";
    if (file_exists($route_controller)) {
        $view = $controller;
        require_once $route_controller;
        $controller = new $controller;
        $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
        if ($view === 'Landing' || $view === 'Login') {
            require_once "views/company/header.view.php";
            call_user_func(array($controller, $action));
            require_once "views/company/footer.view.php";
        } elseif (!empty($_SESSION['session'])) {
            require_once "models/User.php";
            $profile = unserialize($_SESSION['profile']);
            $session = $_SESSION['session'];
            require_once "views/roles/".$session."/header.view.php";
            call_user_func(array($controller, $action));
            require_once "views/roles/".$session."/footer.view.php";
        } else {
            header("Location:?");
        }
    } else {
        header("Location:?");
    }
    ob_end_flush();
?>