

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

<!-- <script src="js/jquery-3.3.1.js"></script> -->
<!-- <script src="js/jquery-1.11.1.js"></script> -->
<script src="js/jquery.js"></script>
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
<script src="js/jquery.serializeToJSON.js"></script>
<script src="js/main.js"></script>
<script>
  $(document).ready(function () {
    <?php
      if (!isset($_SESSION['logged_in'])) {  
    ?>
        $('#booking-link').on('click',function(e){
          e.preventDefault()
          alertify.alert("You must login first in order to view this page, create an account if you don\'t have one.")
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
        })
    <?php
      }
    ?>
  });

  $(document).ready(function () {
    let theForm = $('#formAddEvent')
    theForm.on('submit',function(e){
      e.preventDefault()
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
        if (date_from_nup == '') {
          msg += 'Please input Nuptial date from<br>'
        }
        if (date_to_nup == '') {
          msg += 'Please input Nuptial date to<br>'
        }
        if (date_from_wed == '') {
          msg += 'Please input Wedding date from<br>'
        }
        if (date_to_wed == '') {
          msg += 'Please input Wedding date to<br>'
        }
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
        let data = theForm.serializeToJSON()
        $.post('_includes/add_event.php',data,function(data){
          if (data == 'SUCCESS') {
            alert('Successfully added an event')
            window.location = 'booking.php'
          } else if (data == 'OCCUPIED') {
            alertify.alert('The selected dates are already occupied. Please choose another date or time.')
          } else {
            console.log(data)
          }
        })
      } else {
        alertify.alert(msg)
        $('.msg').css('color','red')
        msg = ''
      }
    })
    
    var pkgs = $('#pkgs');
    var other_occasion = $('#other_occasion');
    var date_normal = $('#date_normal');
    var date_wedding = $('#date_wedding');
    var wedding_albums = $('#wedding-albums')
    var bday_albums = $('#bday-albums')
    pkgs.hide();
    other_occasion.hide();
    date_wedding.hide();
    wedding_albums.hide();
    bday_albums.hide();

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
        wedding_albums.show();
        bday_albums.hide();
        date_normal.hide();
      } else if (category == 'Other Occasions') {
        pkgs.hide();
        other_occasion.show();
        date_wedding.hide();
        wedding_albums.hide();
        bday_albums.hide();
        date_normal.show();
      } else if (category == 'Birthday') {
        pkgs.hide();
        other_occasion.hide();
        date_wedding.hide();
        wedding_albums.hide();
        bday_albums.show();
        date_normal.show();
      } else {
        pkgs.hide();
        other_occasion.hide();
        date_wedding.hide();
        wedding_albums.hide();
        bday_albums.hide();
        date_normal.show();
      }
    })

    // toggle disabled on wedding design link input
    $('input[name="wed_album"]').on('change',function(){
      let link = $(this)
      let link_input = $('#wed_album5_text')
      if (link.val() == 'Design 5') {
        link_input.prop('disabled', false)
      } else {
        link_input.val('')
        link_input.prop('disabled', true)
      }
    })

    // toggle disabled on bday design link input
    $('input[name="bday_album"]').on('change',function(){
      let link = $(this)
      let link_input = $('#bday_album5_text')
      if (link.val() == 'Design 5') {
        link_input.prop('disabled', false)
      } else {
        link_input.val('')
        link_input.prop('disabled', true)
      }
    })

    function toggleLinks(elem,radio,other_input) {
      let link_input = $(other_input)
      $(elem).on('change',function(){
        let check_box = $(this)
        let radios = $(radio)
        if (check_box.is(':checked')) {
          radios.prop('disabled', false)
        } else {
          link_input.val('')
          link_input.prop('disabled', true)
          radios.prop('checked', false)
          radios.prop('disabled', true)
        }
      })
    }

    function toggleOtherLinks(links,other_input) {
      $(links).on('change',function(){
        let link = $(this)
        let link_input = $(other_input)
        if (link.val() == 'Other') {
          link_input.prop('disabled', false)
        } else {
          link_input.val('')
          link_input.prop('disabled', true)
        }
      })
    }

    // toggle Make-up Artists links
    toggleLinks('#link_m','input[name="link_m_items"]','#other_m')
    toggleOtherLinks('input[name="link_m_items"]','#other_m')

    // toggle Catering Services links
    toggleLinks('#link_c','input[name="link_c_items"]','#other_c')
    toggleOtherLinks('input[name="link_c_items"]','#other_c')

    // toggle Sound Systems links
    toggleLinks('#link_s','input[name="link_s_items"]','#other_s')
    toggleOtherLinks('input[name="link_s_items"]','#other_s')

    // toggle Floral Services links
    toggleLinks('#link_f','input[name="link_f_items"]','#other_f') 
    toggleOtherLinks('input[name="link_f_items"]','#other_f')

  });
</script>
</body>
</html>

<?php

ob_end_flush();
