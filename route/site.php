<?php
    include "./app/controllers/SiteController.php";
    include "./app/middlewares/SiteMiddleWare.php";
    $siteMiddleWare = new SiteMiddleWare();
    $siteController = new SiteController();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])){

    } else if (isset($_GET['param_1']) && isset($_GET['param_2'])){

    } else if (isset($_GET['param_1'])){
        switch ($_GET['param_1']){
//            test
            case 'index.php':
                $siteMiddleWare->index();
                break;
        }
    }

} else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])){

    } else if (isset($_GET['param_1']) && isset($_GET['param_2'])){

    } else if (isset($_GET['param_1'])){
        switch ($_GET['param_1']){
//            test
            case 'student':
                $siteController->index_POST();
                break;
        }
    }
}

?>
