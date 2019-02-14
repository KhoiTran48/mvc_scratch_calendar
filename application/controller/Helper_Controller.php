<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Helper_Controller extends FT_Controller
{
    public function index()
    {
        // Load heloer
        $this->helper->load('string');
         
        // Gọi đến hàm string_to_int
        echo string_to_int('test');
    }
}