
$(document).ready(function() { 

    $("#add").hide();
    $("#update").hide();
    $("#delete").hide();

    $(function () {
        $('#datetimepicker6').datetimepicker({
            format: 'MM/DD/YYYY HH:mm'
        });
        
        $('#datetimepicker7').datetimepicker({
            format: 'MM/DD/YYYY HH:mm',
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
    $("#update").click(function(){
                
        let start =$("#datetimepicker6").find("input").val();
        let end =$("#datetimepicker7").find("input").val();
        start = moment(start).format("Y-MM-DD HH:mm:ss");
        end = moment(end).format("Y-MM-DD HH:mm:ss");
        let title=$("#title").val();
        let status=$("#status").val();
        let id=$("#id").val();
        $.ajax({
            url:url_update_event,
            type:"POST",
            data:{title:title, start:start, end:end, id:id, status:status},
            success:function()
            {
                calendar.fullCalendar('refetchEvents');
                // alert("Done");
            }
        });
    });
    $("#add").click(function(){
                
        let start =$("#datetimepicker6").find("input").val();
        let end =$("#datetimepicker7").find("input").val();
        start = moment(start).format("Y-MM-DD HH:mm:ss");
        end = moment(end).format("Y-MM-DD HH:mm:ss");
        let title=$("#title").val();
        let status=$("#status").val();
    
        $.ajax({
            url:url_add_event,
            type:"POST",
            data:{title:title, start:start, end:end, status:status},
            success:function()
            {
                calendar.fullCalendar('refetchEvents');
                // alert("Done");
            }
        });
    });
    $("#delete").click(function(){

        let id=$("#id").val();
        $.ajax({
            url:url_delete_event,
            type:"POST",
            data:{id:id},
            success:function()
            {
                calendar.fullCalendar('refetchEvents');
                // alert("Done");
            }
        });
    });
    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events: url_load_event,
        selectable:true,
        selectHelper:true,
        select: function(start, end, allDay)
        {
            $("#title").val("");
            $("#id").val("");
            let status=$("#status");
            status.val(status.find('option').first().val());
            // $("#staus").val("Planning").change();
            $("#myModal").modal();

            $("#add").show();
            $("#update").hide();
            $("#delete").hide();

            $('#datetimepicker6').data("DateTimePicker").date(moment(start).format('MM/DD/YYYY HH:mm'));
                        
            $('#datetimepicker7').data("DateTimePicker").date(moment(end).format('MM/DD/YYYY HH:mm'));
            
        },
        editable:true,
        eventResize:function(event)
        {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            // var status = event.status;
            $.ajax({
                url:url_update_event,
                type:"POST",
                data:{title:title, status:"", start:start, end:end, id:id},
                success:function(){
                    calendar.fullCalendar('refetchEvents');
                    // alert('Event Update');
                }
            })
        },

        eventDrop:function(event)
        {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            // var status = event.status;
            $.ajax({
                url:url_update_event,
                type:"POST",
                data:{title:title, status:"", start:start, end:end, id:id},
                success:function()
                {
                    calendar.fullCalendar('refetchEvents');
                    // alert("Event Updated");
                }
            });
        },

        eventClick:function(event)
        {
            let id = event.id;
            $("#id").val(id);
            $.ajax({
                url:url_get_event,
                type:"POST",
                data:{id:id},
                success:function(res)
                {
                    res=JSON.parse(res);
                    $("#title").val(res.title);
                    $("#status").val(res.status).change();

                    $(function () {
                        $('#datetimepicker6').data("DateTimePicker").date(moment(res.start).format('MM/DD/YYYY HH:mm'));
                        
                        $('#datetimepicker7').data("DateTimePicker").date(moment(res.end).format('MM/DD/YYYY HH:mm'));
                    });
                }
            })
            //  }
            $("#myModal").modal();
            $("#add").hide();
            $("#update").show();
            $("#delete").show();
        },

    });
});