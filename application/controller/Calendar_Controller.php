<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Calendar_Controller extends Base_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->model->load('calendar');
    }
    public function index()
    {   
        $this->view->load('calendar', array('base_url'=>$this->config->item('base_url')));

    }
    public function load()
    {
        $this->model->calendar->load_event();
    }
    public function add()
    {
        $title="";
        $start=date("Y-m-d h:m:s");
        $end=date("Y-m-d h:m:s");
        $status="";

        if(isset($_POST['title'])){
            $title=$_POST['title'];
        }
        if(isset($_POST['start'])){
            $start=$_POST['start'];
        }
        if(isset($_POST['end'])){
            $end=$_POST['end'];
        }
        if(isset($_POST['status'])){
            $status=$_POST['status'];
        }

        $this->model->calendar->insert($title, $start, $end, $status);
    }
    public function update()
    {
        $id="";
        $title="";
        $start=date("Y-m-d h:m:s");
        $end=date("Y-m-d h:m:s");
        $status="";

        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        if(isset($_POST['title'])){
            $title=$_POST['title'];
        }
        if(isset($_POST['start'])){
            $start=$_POST['start'];
        }
        if(isset($_POST['end'])){
            $end=$_POST['end'];
        }
        if(isset($_POST['status'])){
            $status=$_POST['status'];
        }

        $this->model->calendar->update($id, $title, $start, $end, $status);
    }
    public function delete()
    {
        $id="";
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        $this->model->calendar->delete($id);
    }
    public function get_event()
    {
        $id="";
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        $this->model->calendar->get_event($id);
    }
}