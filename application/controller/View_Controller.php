<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class View_Controller extends Base_Controller
{
    public function index()
    {
        
        $data = array(
            'title' => 'Chào mừng các bạn'
        );
        
        // Load view
        $this->view->load('view', $data);
    }
}