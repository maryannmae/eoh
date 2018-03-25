

<section id="bottom">
  <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
    <div class="row">

    </div>
  </div>
</section><!--/#bottom-->

<footer id="footer" class="midnight-blue">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        &copy; 2018 <a target="_blank" href="http://www.facebook.com/t-rebphotography" title="Follow us on facebook :) ">T-Reb Photography</a>. All Rights Reserved.
      </div>
      <div class="col-sm-6">
        <ul class="pull-right">
          <li><a href="#">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Faq</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer><!--/#footer-->

<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<!--<script src="js/bootstrap-datepicker.js"></script>-->
<script src="js/wow.min.js"></script>
<script src="admin/plugins/moment/moment.min.js"></script>
<script src="admin/plugins/fullcalendar/fullcalendar.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.mask.js"></script>
<!--<script src="js/jquery.prettyPhoto.js"></script>-->
<script src="admin/js/bootstrap-datetimepicker.js"></script>
<script src="js/main.js"></script>
<script>
  $(document).ready(function () {
//    $('#formAddEvent').submit(function(e){
//      var event_category = $('#event_category').val()
//      var pkg = $('input[name="pkg"]:checked').val()
//      var date_from = $('#date_from').val()
//      var date_end = $('#date_end').val()
//      var description = $('#desc').val() 
//      
//      var msg = "";
//      if (
//              event_category == '' ||
//              date_from == '' ||
//              date_end == '' ||
//              description == ''
//              ) {
//        msg = "Please fiil-out all the fields";
//      }
//      
//      if (msg == "") {
//        var data = {
//          date_from: date_from,
//          date_to: date_end
//        }
//        $.post('check_duplicate_date.php',data,function(data){
//          if (data == 'OCCUPIED') {
//            alert("The selected dates are occupied.")
//            e.preventDefault();
//          } else if (data == 'NOT OCCUPIED') {
//            $(this).submit();
//          } else {
//            console.log(data)
//          }
//        })
//      } else {
//        e.preventDefault();
//        alert(msg);
//      }
//      
//    })
  });

  $(document).ready(function () {
    
    var pkgs = $('#pkgs');
    var other = $('#other');
    var date_normal = $('#date_normal');
    var date_wedding = $('#date_wedding');
    pkgs.hide();
    other.hide();
    date_wedding.hide();

    $('#full-calendar').fullCalendar({
      events: [
        
        <?php

        $result = mysqli_query($conn, "select * from events");
        while ($row = mysqli_fetch_array($result)) {
        
        ?>
                
        {
          title  : '<?= $row['category'] ?>',
          start  : '<?= $row['datetime_from'] ?>',
          end    : '<?= $row['datetime_to'] ?>',
          <?php if ($row['status'] == 'PENDING') { ?>
          backgroundColor: '#e74c3c'
          <?php } ?>
        },
                
        <?php } ?>
        <?php

        $result = mysqli_query($conn, "select * from events where datetime_from_nup != ''");
        while ($row = mysqli_fetch_array($result)) {
        
        ?>
                
        {
          title  : 'Nuptial',
          start  : '<?= $row['datetime_from_nup'] ?>',
          end    : '<?= $row['datetime_to_nup'] ?>',
          <?php if ($row['status'] == 'PENDING') { ?>
          backgroundColor: '#e74c3c'
          <?php } ?>
        },
                
        <?php } ?>
        
      ],
      eventMouseover: function(event, jsEvent, view) {
        $(this).attr('title', event.title)
      }
    });
    
    function showDatePickers(elem_from,elem_to) {
      $(elem_from).datetimepicker({
        startDate: new Date(),
        format: 'M d, yyyy H:ii P',
        showMeridian: true,
        autoclose: true
      });
      $(elem_from).on('change',function(){
        var date_from = $(this).val();
        $(elem_to).datetimepicker({
          format: 'M d, yyyy H:ii P',
          showMeridian: true,
          autoclose: true,
          startDate: new Date(date_from)
        });
      })
    }
    showDatePickers('#date_from','#date_end');

    function showDatePickersWed(nup_from,nup_to,wed_from,wed_to) {
      $(nup_from).datetimepicker({
        startDate: new Date(),
        format: 'M d, yyyy H:ii P',
        showMeridian: true,
        autoclose: true
      });
      $(nup_from).on('change',function(){
        let date_from = $(this).val();
        $(nup_to).datetimepicker({
          format: 'M d, yyyy H:ii P',
          showMeridian: true,
          autoclose: true,
          startDate: new Date(date_from)
        });
      })
      $(nup_to).on('change',function(){
        let date_from = $(this).val();
        $(wed_from).datetimepicker({
          format: 'M d, yyyy H:ii P',
          showMeridian: true,
          autoclose: true,
          startDate: new Date(date_from)
        });
      })
      $(wed_from).on('change',function(){
        let date_from = $(this).val();
        $(wed_to).datetimepicker({
          format: 'M d, yyyy H:ii P',
          showMeridian: true,
          autoclose: true,
          startDate: new Date(date_from)
        });
      })
    }
    showDatePickersWed('#date_from_nup','#date_end_nup','#date_from_wed','#date_end_wed');
    
    $('#event_category').on('change',function(){
      var category = $('#event_category').val();
      if (category == 'Weddings') {
        pkgs.show();
        other.hide();
        date_wedding.show();
        date_normal.hide();
      } else if (category == 'Other Occasions') {
        pkgs.hide();
        other.show();
        date_wedding.hide();
        date_normal.show();
      } else {
        pkgs.hide();
        other.hide();
        date_wedding.hide();
        date_normal.show();
      }
    })

  });
</script>
</body>
</html>

<?php

ob_end_flush();
