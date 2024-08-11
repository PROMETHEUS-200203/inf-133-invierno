<?php
session_start();
require_once './config/global.php';
require_once './core/HttpClient.php';
$request = $_SERVER['REQUEST_URI'];
$request = parse_url($request, PHP_URL_PATH);
$segments = explode('/', trim($request, '/'));
function home()
{
    verificarlogin();
    http_response_code(404);
    require ROOT_DIR . '/view/home.php';
    exit;
}
function verificarlogin()
{
    if (!isset($_SESSION['login']['nombre'])) {
        echo '<script>window.location.href="' . HTTP_BASE . '/login"</script>';
    }
}

if ($segments[0] === 'clientes') {
    switch ($segments[1] ?? '') {
        case 'login':
            include ROOT_VIEW . '/seguridad/login.php';
            break;
        case 'register':
            include ROOT_VIEW . '/seguridad/register.php';
            break;
        case 'logout':
            session_destroy();
            $clientindex = new HttpClient(HTTP_BASE);
            $result = $clientindex->post('/controller/LoginController.php',  [
                'ope' => 'logout',
            ]);
            echo '<script>window.location.href="' . HTTP_BASE . '/login"</script>';

            break;
        case "web":
            verificarlogin();
            switch ($segments[2] ?? '') {
                case "cli":
                    switch ($segments[3] ?? '') {
                        case "list":
                            include ROOT_VIEW . '/web/bebidas/list.php';
                            break;
                        case 'edit':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'EDIT';
                                require ROOT_VIEW . '/web/bebidas/edit.php';
                            } else {
                                home();
                            }
                            break;
                        case 'new':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'NEW';
                                require ROOT_VIEW . '/web/bebidas/edit.php';
                            } else {
                                home();
                            }
                            break;
                        case 'delete':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'DELETE';
                                require ROOT_VIEW . '/web/bebidas/edit.php';
                            } else {
                                home();
                            }
                            break;
                        case 'view':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'VIEW';
                                require ROOT_VIEW . '/web/bebidas/edit.php';
                            } else {
                                home();
                            }
                            break;
                        default:
                            home();
                            break;
                    }
                    break;
                default:
                    home();
                    break;
            }
            break;
        default:
            home();
            break;
    }
} else {
}
