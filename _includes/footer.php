

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
<script src="js/alertify.js"></script>
<script src="js/main.js"></script>
<script>
  $(document).ready(function () {
    <?php
      if (!isset($_SESSION['logged_in']) && $_SERVER['PHP_SELF'] == '/booking.php') {  
    ?>
        alertify
                .okBtn("Login")
                .cancelBtn("Register")
                .confirm("You must login first in order to view this page, create an account if you don\'t have one.", function () {
            // user clicked "login"
            window.location = 'login.php'
        }, function() {
            // user clicked "register"
            window.location = 'register.php'
        })
        $('.alertify .dialog div').css({
          'background':'#436E90'
        })
        $('.alertify .dialog div .msg').css({
          'color':'#fff'
        })
        $('.alertify .dialog div nav button').css({
          'color':'#fff',
          'border':'1px solid rgba(0,0,0,0.2)'
        })
    <?php
      }
    ?>
  });

  $(document).ready(function () {
    let theForm = $('#formAddEvent')
    theForm.on('submit',function(e){
      // e.preventDefault()
      let msg = ''
      let ev_cat = $('#event_category').val()
      let other = $('#other').val()
      let date_from = $('#date_from').val()
      let date_to = $('#date_end').val()
      let date_from_nup = $('#date_from_nup').val()
      let date_to_nup = $('#date_end_nup').val()
      let date_from_wed = $('#date_from_wed').val()
      let date_to_wed = $('#date_end_wed').val()
      let desc = $('#desc').val()
      if (ev_cat == 'Weddings') {

      } else if (ev_cat == 'Other Occasions') {
        if (other == '') {
          msg += 'Please specify other occation name<br>'
        }
        if (date_from == '') {
          msg += 'Please input date from<br>'
        }
        if (date_to == '') {
          msg += 'Please input date to<br>'
        }
      } else {
        if (date_from == '') {
          msg += 'Please input date from<br>'
        }
        if (date_to == '') {
          msg += 'Please input date to<br>'
        }
      }
      if (msg == '') {
        // Submit the form
      } else {
        e.preventDefault()
        alertify.alert(msg)
        $('.msg').css('color','red')
        msg = ''
      }
    })
    
    var pkgs = $('#pkgs');
    var other_occasion = $('#other_occasion');
    var date_normal = $('#date_normal');
    var date_wedding = $('#date_wedding');
    pkgs.hide();
    other_occasion.hide();
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
        other_occasion.hide();
        date_wedding.show();
        date_normal.hide();
      } else if (category == 'Other Occasions') {
        pkgs.hide();
        other_occasion.show();
        date_wedding.hide();
        date_normal.show();
      } else {
        pkgs.hide();
        other_occasion.hide();
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
