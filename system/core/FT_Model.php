<?php
 
class FT_Model
{
    protected $db = false;
    public function __construct()
    {
        // Lấy phần config database
        $config = include PATH_APPLICATION . '/config/database.php';
        if ( empty($config) ){
            return false;
        }
        $connection= new PDO("mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}", "{$config['DB_USER']}", "{$config['DB_PASSWORD']}");
        if($connection){
            $this->db = $connection;
        }else{
            return false;
        }
    }
    public function load($model, $agrs = array())
    {
        // Nếu model chưa được load thì thực hiện load
        if ( empty($this->{$model}) )
        {
            // Chuyển chữ hoa đầu và thêm hậu tố _Model
            $class = ucfirst($model) . '_Model';
            require_once(PATH_APPLICATION . '/model/' . $class . '.php');
            $this->{$model} = new $class($agrs);
        }
    }
}