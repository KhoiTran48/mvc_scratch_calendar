<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Calendar_Model extends FT_Model
{
    public function __construct() 
    {
        parent::__construct();
    }
    function insert($title, $start, $end, $status=""){

        $query = "INSERT INTO events (title, start_event, end_event, status) VALUES (:title, :start_event, :end_event, :status)";
        $statement = $this->db->prepare($query);
        $statement->execute(
            array(
                ':title'  => $title,
                ':start_event' => $start,
                ':end_event' => $end,
                ':status'   => $status,
            )
        );
    }

    function load_event(){
        $data = array();

        $query = "SELECT * FROM events ORDER BY id";

        $statement = $this->db->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        foreach($result as $row)
        {
        $data[] = array(
                'id'   => $row["id"],
                'title'   => $row["title"],
                'start'   => $row["start_event"],
                'end'   => $row["end_event"],
                'status'   => $row["status"]
            );
        }

        echo json_encode($data);
    }
    function update($id, $title, $start, $end, $status=""){
        if(!empty($status)){
            $query = "UPDATE events SET title=:title, start_event=:start_event, end_event=:end_event, status=:status WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute(
                array(
                    ':title'  => $title,
                    ':start_event' => $start,
                    ':end_event' => $end,
                    ':id'   => $id,
                    ':status'   => $status,
                )
            );
        }else{
            $query = "UPDATE events SET title=:title, start_event=:start_event, end_event=:end_event WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute(
                array(
                    ':title'  => $title,
                    ':start_event' => $start,
                    ':end_event' => $end,
                    ':id'   => $id,
                )
            );
        }
    }

    function get_event($id){
        $query = "SELECT * FROM events WHERE id=:id";

        $statement = $this->db->prepare($query);

        $statement->execute(
            array(
                ':id'   => $id
            )
        );

        $result = $statement->fetchAll();

        foreach($result as $row)
        {
            $data[] = array(
            'id'   => $row["id"],
            'title'   => $row["title"],
            'status'   => $row["status"],
            'start'   => $row["start_event"],
            'end'   => $row["end_event"]
            );
        }

        echo json_encode($data[0]);
    }
    function delete($id){

        $query = "DELETE from events WHERE id=:id";
        $statement = $this->db->prepare($query);
        $statement->execute(
            array(
                ':id' => $id
            )
        );
    }
    
}