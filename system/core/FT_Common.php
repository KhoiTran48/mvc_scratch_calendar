<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
/**
 * Hàm chạy ứng dụng
 */
function FT_load()
{
    $uri = explode('/', $_SERVER['REQUEST_URI']);

    // Lấy phần config khởi tạo ban đầu
    $config = include_once PATH_APPLICATION . '/config/init.php';
 
    // Nếu không truyền controller thì lấy controller mặc định
    $controller = empty($uri[2]) ? $config['default_controller'] : $uri[2];
 
    // Nếu không truyền action thì lấy action mặc định 
    $action = empty($uri[3]) ? $config['default_action'] : $uri[3];
    $index= strpos($action,"?");
    if($index){
        $action=substr($action, 0, $index);
    }
    
    // Chuyển đổi tên controller vì nó có định dạng là {Name}_Controller
    $controller = ucfirst(strtolower($controller)) . '_Controller';
 
    // chuyển đổi tên action vì nó có định dạng {name}Action
    $action = strtolower($action);
     
    // Kiểm tra file controller có tồn tại hay không
    if (!file_exists(PATH_APPLICATION . '/controller/' . $controller . '.php')){
        die ('Không tìm thấy controller');
    }
     
    // Include controller chính để các controller con nó kế thừa
    include_once PATH_SYSTEM . '/core/FT_Controller.php';

    // Include model chính để các model con nó kế thừa
    // include_once PATH_SYSTEM . '/core/FT_Model.php';

    // Load Base_Controller
    if (file_exists(PATH_APPLICATION . '/core/Base_Controller.php')){
        include_once PATH_APPLICATION . '/core/Base_Controller.php';
    }
     
    // Gọi file controller vào
    require_once PATH_APPLICATION . '/controller/' . $controller . '.php';
 
    // Kiểm tra class controller có tồn tại hay không
    if (!class_exists($controller)){
        die ('Không tìm thấy controller');
    }
 
    // Khởi tạo controller
    $controllerObject = new $controller();
 
    // Kiểm tra action có tồn tại hay không
    if ( !method_exists($controllerObject, $action)){
        die ('Không tìm thấy action');
    }
     
    // Chạy ứng dụng
    $controllerObject->{$action}();
}