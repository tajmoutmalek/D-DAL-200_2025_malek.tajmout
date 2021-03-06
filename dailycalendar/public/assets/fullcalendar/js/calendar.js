
  document.addEventListener('DOMContentLoaded', function() {

    /* initialize the external events
    -----------------------------------------------------------------*/

    var containerEl = document.getElementById('external-events-list');
    new FullCalendar.Draggable(containerEl, {
      itemSelector: '.fc-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText.trim()
        }
      }
    });

    

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      navLinks: true,
      eventLimit: true,
      selectable: true,
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function(element) {



        let Event= JSON.parse(element.draggedEl.dataset.event) ;
        
         

        // is the "remove after drop" checkbox checked?
        if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          element.draggedEl.parentNode.removeChild(element.draggedEl);

          Event._method= "DELETE";
          sendEvent('/fast-event-delete', Event);
        }

       
        //start = moment(`${element.dateStr}`).format("YYYY-MM-DD HH:mm:ss");
        //end = moment(`${element.dateStr}`).format("YYYY-MM-DD HH:mm:ss");
        Event.start= element.dateStr+" 00:00:00" ;
        Event.end = element.dateStr+" 02:00:00"; 

        delete Event.id ;
        delete Event._method ;

        sendEvent('/event-store', Event);
        
     
      },

      eventDrop: function(element){
       
       let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss") ;
       let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss") ;

       let newEvent = {
        _method: 'PUT',
        title: element.event.title,
        id: element.event.id,
        start: start,
        end: end
       } ;

       sendEvent('/event-update',newEvent);


      },

      eventClick: function(element){

        clearMessages('.message');
        resetForm("#formEvent");

        resetForm("#formEvent") ;
        $("#modalCalendar").modal('show');
        $("#modalCalendar #titleModal").text('Change Event');
        $("#modalCalendar button.deleteEvent").css("display","flex");
        
        let id = element.event.id ;
        $("#modalCalendar input[name='id']").val(id) ;
        let title = element.event.title ;
        $("#modalCalendar input[name='title']").val(title) ;

        let start = moment(element.event.start).format("DD/MM/YYYY HH:mm:ss") ;
        $("#modalCalendar input[name='start']").val(start) ;

        let end = moment(element.event.end).format("DD/MM/YYYY HH:mm:ss") ;
        $("#modalCalendar input[name='end']").val(end);

        let color = element.event.backgroundColor ;
        $("#modalCalendar input[name='color']").val(color) ;

        let description = element.event.extendedProps.description ;
        $("#modalCalendar textarea[name='description']").val(description) ;
      },
      
      eventResize: function(element){
         
       let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss") ;
       let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss") ;

       let newEvent = {
        _method: 'PUT',
        id: element.event.id,
        start: start,
        end: end
       } ;
       sendEvent('/event-update',newEvent);      },

      select: function(element){

        clearMessages('.message');
      
        resetForm("#formEvent") ;
        $("#modalCalendar").modal('show');
        $("#modalCalendar #titleModal").text('Add Event');
        $("#modalCalendar button.deleteEvent").css("display","none");
       

        let start = moment(element.start).format("DD/MM/YYYY HH:mm:ss") ;
        $("#modalCalendar input[name='start']").val(start) ;

        let end = moment(element.end).format("DD/MM/YYYY  HH:mm:ss") ;
        $("#modalCalendar input[name='end']").val(end);

        let color = element.backgroundColor ;
        $("#modalCalendar input[name='color']").val("#3788D8" ) ;

        calendar.unselect();
      
       },
     
     events: '/load-events',

      
    });
    calendar.render();

  });

  
