<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <link href= "{{asset('assets/fullcalendar/lib/main.css')}}"  rel='stylesheet' />
  <link href= "{{asset('assets/fullcalendar/css/style.css')}}"  rel='stylesheet' />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> 


  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  @include('fullcalendar.modal-calendar')
  @include('fullcalendar.modal-fastEvents')

  <div id='wrap'>

    <div id='external-events'>
      <h4>Quick Events</h4>

      <div id='external-events-list'>
      
           @if($fastEvents)
               @foreach($fastEvents as $fastEvent)
          <div style="padding: 4px; border: 1px solid {{ $fastEvent->color}}; background-color: {{ $fastEvent->color}} " class='fc-event' data-event='{"id":"{{ $fastEvent->id}}","title":"{{ $fastEvent->title}}","color":"{{ $fastEvent->color}}","start":"{{ $fastEvent->start}}","end":"{{ $fastEvent->end}}"}'>{{ $fastEvent->title }}</div>
           

               @endForeach
            @endif

         
         
        </div>

       
      <p>
        <input type='checkbox' id='drop-remove' />
        <label for='drop-remove'>remove after drop</label>
        <button  type="button" class="btn btn-success btn-sm" id="newFastEvent"style="padding: 1px">Create a new event</button>

      </p>
    </div>
    @csrf
    @method('PUT')
 
      <div id='calendar-wrap'>
      <div 
      id='calendar'
      data-route-load-events="{{ route('routeLoadEvents')}}"
      data-route-event-update="{{ route('routeEventUpdate')}}"
      data-route-event-store="{{ route('routeEventStore')}}"
      data-route-event-delete="{{ route('routeEventDelete')}}"
      data-route-fast-event-delete="{{ route('routeFastEventDelete')}}"
      data-route-fast-event-update="{{ route('routeFastEventUpdate')}}"
      data-route-fast-event-store="{{ route('routeFastEventStore')}}">

      </div>

   
  </div>

<script src="{{asset('assets/fullcalendar/lib/main.js')}}"></script>
<script src="{{asset('assets/fullcalendar/lib/locales-all.js')}}"></script>
<script src="{{asset('assets/fullcalendar/js/script.js')}}"></script>
<script src="{{asset('assets/fullcalendar/js/calendar.js')}}"></script>


</body>
</html>
