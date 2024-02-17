<div class="calendar-body">
  <div class="container">
    <div class="left">
      <div class="calendar">
        <div class="month">
          <i class="fas fa-angle-left prev"></i>
          <div class="date">december 2015</div>
          <i class="fas fa-angle-right next"></i>
        </div>
        <div class="weekdays">
          <div>Dom</div>
          <div>Seg</div>
          <div>Ter</div>
          <div>Qua</div>
          <div>Qui</div>
          <div>Sex</div>
          <div>Sáb</div>

        </div>
        <div class="days"></div>
        <div class="goto-today">
          <div class="goto">
            <input type="text" placeholder="mm/aaaa" class="date-input" />
            <button class="goto-btn">Ir</button>
          </div>
          <button class="today-btn">Hoje</button>
        </div>
      </div>
    </div>
    <div class="right">
      <div class="today-date">
        <div class="event-day">wed</div>
        <div class="event-date">12th december 2022</div>
      </div>
      <div class="events"></div>

      <form class="add-event-wrapper" method="POST" action="{{ route('agendamento.post') }}">
        @csrf
        <div class="add-event-header">
          <div class="title">Add Event</div>
          <i class="fas fa-times close"></i>
        </div>
        <div class="add-event-body">
          <div class="add-event-input">
            <input type="text" placeholder="Event Name" class="event-name" />
          </div>
          <div class="add-event-input">
            <input type="text" placeholder="Event Time From" class="event-time-from" />
          </div>
          <div class="add-event-input">
            <input type="text" placeholder="Event Time To" class="event-time-to" />
          </div>
        </div>
        <div class="add-event-footer">
          <button type="submit" class="add-event-btn">Add Event</button>
        </div>
      </form>


    </div>
    <button class="add-event">
      <i class="fas fa-plus"></i>
    </button>
  </div>

  <script src="script.js"></script>
</div>