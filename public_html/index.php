<?php

session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    session_unset();
    session_destroy();
}

if (empty($_GET['url'])) {
    $_GET['url'] = '';
}

$url = [];


$url = trim($_GET['url']);
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

$page = array_shift($url);
$param = array_shift($url);

date_default_timezone_set('Europe/Stockholm');
$time = date('D M j G:i:s');

switch ($page) {
    case '':
        require '../app/controllers/index.php';
        break;
    case 'index':
        require '../app/controllers/index.php';
        break;
    // case 'pass':
    //     require '../app/controllers/pass.php';
    //     break;
    case 'kontakt':
        require '../app/controllers/contact.php';
        break;
    case 'contact':
        require '../app/controllers/contact.php';
        break;
    case 'styleguide':
        require '../public/resources/styleguide.html';
        break;
    case 'index':
        require '../app/controllers/index.php';
        break;
    case 'priser':
        require '../app/controllers/timesprices.php';
        break;   
    case 'instruktor':
        switch ($param) {
            case '':
                require '../app/controllers/instructors.php';
                break;
            case 'edit':
                require '../app/backend/actions/editInstructorAction.php';
                break;
            case 'delete':
                require '../app/backend/actions/deleteInstructorAction.php';
                break;
            case 'add':
                require '../app/backend/addInstructor.php';
                break;

            default:
                require '../app/controllers/index.php';
                break;
        }
        break;
     case 'training':
        switch ($param) {
            case '':
                require '../app/controllers/training.php';
                break;
            case 'edit':
                require '../app/backend/actions/editTrainingAction.php';
                break;
            case 'delete':
                require '../app/backend/actions/deleteTrainingAction.php';
                break;
            case 'add':
                require '../app/backend/addTraining.php';
                break;

            default:
                require '../app/controllers/training.php';
                break;
        }
        break;
    case 'test':
        require '../app/controllers/test.php';
        break;
    case 'upload':
        require 'upload.php';
        break;
    case 'sendEmail':
        require '../app/backend/actions/sendEmail.php';
        break;
    case 'resetPassword':
        require '../app/controllers/resetPassword.php';
        break;
    case 'sendlink':
        require '../app/backend/actions/sendLink.php';
        break;
    case 'resetPasswordForm':
        require '../app/controllers/resetPasswordForm.php';
        break;
    case 'submitNewPassword':
        require '../app/backend/actions/submitNewPassword.php';
        break;
    case 'login':
        switch ($param) {
            case '':
                $error = "";
                 require '../app/controllers/adminLogin.php';
                break;
            case 'wrongpassword':
                $error = "wrongpassword";
                require '../app/controllers/adminLogin.php';
                break;
            case 'nousername':
                $error = "nousername";
                require '../app/controllers/adminLogin.php';
                break;
            default:
                require '../app/controllers/404.php';
                break;
        }
        break;
    // case 'crop':
    //     require '../app/backend/crop.php';
    //     break;
    case 'admin':
        if ($_SESSION['userId']) {
            $_SESSION["LAST_ACTIVITY"]=time();
            $admin_access = $_SESSION['admin_access'];
            switch ($param) {
            case '':
                require '../app/controllers/adminIndex.php';
                break;
            case 'index':
                require '../app/controllers/adminIndex.php';
                break;
            case 'instructors':
                require '../app/controllers/adminInstructors.php';
                break;
            case 'editPassword':
                require '../app/backend/actions/editPassword.php';
                break;
            case 'pts':
                require '../app/controllers/adminPts.php';
                break;
            case 'timesprices':
                require '../app/controllers/adminTimesprices.php';
                break;
            case 'training':
                require '../app/controllers/adminTraining.php';
                break;
            case 'contact':
                require '../app/controllers/adminContact.php';
                break;
            case 'accountManager':
                require '../app/controllers/accountManager.php';
                break;
            case 'createToken':
                require '../app/backend/actions/createToken.php';
                break;
            case 'editAccountAction':
                require '../app/backend/actions/editAccountAction.php';
                break;
                
            default:
                require '../app/controllers/adminLogin.php';
                break;
            }
        } else {
            header('Location: /loginRequired');
        }

        break;
    case 'signup':
        switch ($param) {
            case '':
                $error="";
                require '../app/controllers/signup.php';
                break;
            case 'invalidusername':
                $error = "invalidusername";
                require '../app/controllers/signup.php';
                break;
            case 'duplicateusername':
                $error = "duplicateusername";
                require '../app/controllers/signup.php';
                break;
            case 'invalidemail':
                $error = "invalidemail";
                require '../app/controllers/signup.php';
                break;
            case 'passwordmatch':
                $error = "passwordmatch";
                require '../app/controllers/signup.php';
                break;
            case 'shortpassword':
                $error = "shortpassword";
                require '../app/controllers/signup.php';
                break;
            case 'nonumberpassword':
                $error = "nonumberpassword";
                require '../app/controllers/signup.php';
                break;
            case 'nocapspassword':
                $error = "nocapspassword";
                require '../app/controllers/signup.php';
                break;
            case 'nosymbolpassword':
                $error = "nosymbolpassword";
                require '../app/controllers/signup.php';
                break;
            case 'tokenerror':
                $error = "tokenerror";
                require '../app/controllers/signup.php';
                break;
            case 'success':
                $error = "";
                require '../app/controllers/adminLogin.php';
                break;
            default:
                require '../app/controllers/signup.php';
                break;
        }
        break;
    case 'adminCreateAction':
        require '../app/backend/actions/adminCreateAction.php';
        break;

    case 'adminLoginAction':
        require '../app/backend/actions/adminLoginAction.php';
        break;
    case 'adminLogoutAction':
        require '../app/backend/actions/adminLogoutAction.php';
        break;
    case 'loginRequired':
        require '../app/views/loginRequired.html';
        break;

    case 'news':
        switch ($param) {
            case 'add':
                require '../app/backend/addNews.php';
                break;
            case 'edit':
                require '../app/backend/actions/editNewsAction.php';
                break;
            case 'delete':
                require '../app/backend/actions/deleteNewsAction.php';
                break;

            default:
                require '../app/controllers/index.php';
                break;
        }
        break;
    case 'images':
        switch ($param) {
            case 'add':
                require '../app/backend/addImg.php';
                break;
            case 'delete':
                require '../app/backend/actions/deleteImgAction.php';
                break;
            default:
                require '../app/controllers/index.php';
                break;
        }
        break;
    
    case 'pts':
        switch ($param) {
            case '':
                require '../app/controllers/pts.php';
                break;
            case 'add':
                require '../app/backend/addPt.php';
                break;
            case 'edit':
                require '../app/backend/actions/editPtAction.php';
                break;
            case 'delete':
                require '../app/backend/actions/deletePtAction.php';
                break;

            default:
                require '../app/controllers/index.php';
                break;
        }
        break;

    case 'log':
        require '../app/backend/log.html';
        break;

    case 'content':
        switch ($param) {
            case 'edit':
                require '../app/backend/actions/editIndexContent.php';
                break;

            default:
                require '../app/controllers/index.php';
                break;
        }
        break;
    // case 'pt':
    //     switch ($param) {
    //         case 'edit':
    //             require '../app/backend/actions/editPtAction.php';
    //             break;
    //         case 'delete':
    //             require '../app/backend/actions/deletePt.php';
    //             break;
    //         case 'add':
    //             require '../app/backend/addPt.php';
    //             break;

    //         default:
    //             require '../app/controllers/index.php';
    //             break;
    //     }
    default:
        if ($page = !'img' || $page = !'node_modules' || $page = !'images' || $page = !'js' || $page = !'backend' || $page = !'favicon') {
            file_put_contents('../app/backend/log.html', '<p>Date: '.$time.', Page: '.$page.' | </p><br>', FILE_APPEND);
            echo 'nej på den';
        }

        require '../app/views/404.html';
}
if (isset($_SESSION['userId']) && 'admin' == $_SESSION['username']) {
    $display=1;
}

else{
    $display=0;
}
