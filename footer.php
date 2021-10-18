<div class="w3-container w3-teal">
    <p>All rights reserved | <?php echo date("Y"); ?></p>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="text/javascript" src="assets/calender/calendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/trumbowyg.min.js"></script>
<script>
    $('#description').trumbowyg();
</script>

<script>

$(document).ready(function() {

  function selectDate(date) {
  $('.calendar-wrapper').updateCalendarOptions({
    date: date
  });
}

var defaultConfig = {
    nextButton:"Lanjut",
    prevButton:"Sebelum",
    showTodayButton:true,
    todayButtonContent:"Hari Ini",
  weekDayLength: 1,
  date: new Date(),
  onClickDate: selectDate,
  showYearDropdown: true,
};

$('.calendar-wrapper').calendar(defaultConfig);


});
</script>



</body>