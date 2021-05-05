<!DOCTYPE html>
<html>
<head>

     <title> Daily calendar </title>


     <meta name="csrf-token" content="{{ csrf_token() }}"/>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
     <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"/> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> 

</head>

<body>
	
<div class="container">
     <br />
     <h1 class="text-center text-primary"><u>Daily calendar</u></h1>
     <br />

     <div id="calendar"></div>

 </div>
 <script>
 	$(document).ready(function ()
 	{
 		$.ajaxSetup({
 			headers:{
 				'X-CSRF-TOKEN' : $('meta[name="csrf_token"]').attr('content');
 			}
 		});
 		var calendar = $('#calendar').fullCalendar({
 			editable:true,
 			header:{
 				left:'prev,next today',
 				center: 'title',
 				right: 'month,agendaWeek,agendaDay'
 			},
 			events:'/full-calendar' ,
 			selectable:true,
 			selectHelper: true,
 			select:function(start, end, allday)
 			{
 				var title = prompt('Event Title: ');

 				if(title)
 				{
 					var start= $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
 					var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

 					$.ajax({
 						url:"/full-calendar/action",
 						type:"POST",
 						data: {
 							title: title,
 							start: start,
 							end: end,
 							type: 'add'
 						},
 						success:function(data)
 						{
 							calendar.fullCalendar('refetchEvents');
 							alert("Event created Successfully") ;
 						}
 						
 					})
 				}
 			}
 		});
 	});

 </script>

</body>
</html>