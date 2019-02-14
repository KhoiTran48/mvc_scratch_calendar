<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 

class FT_Controller
{
    // Đối tượng view
    protected $view     = NULL;
     
    //Đối tượng model
    protected $model    = NULL;
     
    // Đối tượng library
    protected $library  = NULL;
     
    // Đối tượng helper
    protected $helper   = NULL;
     
    // Đối tượng config
    protected $config   = NULL;
     
    /**
     * Hàm khởi tạo
     * 
     * @desc    Load các thư viện cần thiết
     */
    public function __construct() 
    {
        // Loader cho config
        require_once PATH_SYSTEM . '/core/loader/FT_Config_Loader.php';
        $this->config   = new FT_Config_Loader();
        $this->config->load('config');

        // Loader Library
        require_once PATH_SYSTEM . '/core/loader/FT_Library_Loader.php';
        $this->library = new FT_Library_Loader();

        // Load Helper
        require_once PATH_SYSTEM . '/core/loader/FT_Helper_Loader.php';
        $this->helper = new FT_Helper_Loader();

        // Load View
        require_once PATH_SYSTEM . '/core/loader/FT_View_Loader.php';
        $this->view = new FT_View_Loader();

        // Load Model
        require_once PATH_SYSTEM . '/core/FT_Model.php';
        $this->model = new FT_Model();
    }
}