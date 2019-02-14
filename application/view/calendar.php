<?php
//index.php




?>
<!DOCTYPE html>
<html>
 <head>
  <title>Jquery Fullcalandar Integration with PHP and Mysql</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <script type="text/javascript" src="<?php echo $base_url.'/public/assets/moment/min/moment.min.js' ?>"></script>

  <script type="text/javascript" src="<?php echo $base_url.'/public/assets/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js' ?>"></script>

  <link rel="stylesheet" href="<?php echo $base_url.'/public/assets/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css' ?>" />
  <script>
    var url_load_event="<?php echo $base_url ?>"+"/Calendar/load";
    var url_add_event="<?php echo $base_url ?>"+"/Calendar/add";
    var url_update_event="<?php echo $base_url ?>"+"/Calendar/update";
    var url_delete_event="<?php echo $base_url ?>"+"/Calendar/delete";
    var url_get_event="<?php echo $base_url ?>"+"/Calendar/get_event";
  </script>
  <script src="<?php echo $base_url.'/public/assets/js/calendar.js' ?>"></script>
  
 </head>
 <body>
    <br />
    <h2 align="center"><a href="#">Jquery Fullcalandar Integration with PHP and Mysql</a></h2>
    <br />
    <div class="container">
        <div id="calendar"></div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                <input type="hidden" name="" id="id" class="form-control" value="">
                    
                    <div class="row">
                        
                        <div class="form-group">
                            <label for="input" class="col-sm-10 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" class="form-control" required="required" pattern="" title="">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="input" class="col-sm-10">Status: </label>
                            <div class="col-sm-10">
                                <select name="" id="status" class="form-control" required="required">
                                    <option value="Planning">Planning</option>
                                    <option value="Doing">Doing</option>
                                    <option value="Complete">Complete</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class='col-md-5'>
                            
                            
                            <div class="form-group">
                                <p>Start</p>
                                <div class='input-group date' id='datetimepicker6'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-5'>
                            <div class="form-group">
                                <p>End</p>
                                <div class='input-group date' id='datetimepicker7'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success" id='add' data-dismiss="modal">Add</button>
                <button type="button" class="btn btn-success" id='update' data-dismiss="modal">Update</button>
                <button type="button" class="btn btn-danger" id='delete' data-dismiss="modal">Delete</button>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>