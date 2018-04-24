<?php
include '_includes/header.php';

if (isset($_POST['submit'])) {
  

}
?>

<div id="booking-container" class="container-fluid">
  <form id="formAddEvent" method="post" action="booking.php">
    <div class="row">
      
      <div class="col-lg-6">
        <div class="panel">
          <div class="panel-body">
            <div id="full-calendar"></div>
            <br>
            <label>Legend: </label>
            <small style="border-radius:5px;padding:5px;background:#3a87ad;color:#fff">Approved</small>
            <small style="border-radius:5px;padding:5px;background:#e74c3c;color:#fff">Pending</small>
          </div>
        </div>
        <div class="panel">
          <div class="panel-body">
            <h3>Links and Services</h3>
            <div class="form-group col-md-3" style="border-right:1px solid #eee">
              <label for="link_m"><input type="checkbox" name="link_m" id="link_m" value="Make-up Artists"> Make-up Artists</label>
              <hr>
              <label for="link_m_item1"><input type="radio" name="link_m_items" id="link_m_item1" value="Jerico Soriano" disabled> <a href="//fb.com/ceejay.soriano.1" target="_blank" title="Jerico Soriano">Jerico Soriano</a></label>
              <label for="link_m_item2"><input type="radio" name="link_m_items" id="link_m_item2" value="Jhondel Mhark Maganda" disabled> <a href="//fb.com/jhondelmhark.maganda" target="_blank" title="Jhondel Mhark Maganda">Jhondel Mhark Maganda</a></label>
              <label for="link_m_item3"><input type="radio" name="link_m_items" id="link_m_item3" value="Jhun Zalazar" disabled> <a href="//fb.com/sarazaru281989" target="_blank" title="Jhun Zalazar">Jhun Zalazar</a></label>
              <label for="link_m_item4"><input type="radio" name="link_m_items" id="link_m_item4" value="Other" disabled> Other</label>
              <input type="text" name="other_m" id="other_m" class="form-control" placeholder="Other supplier" disabled>
            </div>
            <div class="form-group col-md-3" style="border-right:1px solid #eee">
              <label for="link_c"><input type="checkbox" name="link_c" id="link_c" value="Catering Services"> Catering Services</label>
              <hr>
              <label for="link_c_item1"><input type="radio" name="link_c_items" id="link_c_item1" value="Buboy Evangelista" disabled> <a href="//fb.com/JericoBuboy20" target="_blank" title="Buboy Evangelista">Buboy Evangelista</a></label>
              <label for="link_c_item2"><input type="radio" name="link_c_items" id="link_c_item2" value="WEDDING MASTER" disabled> <a href="//fb.com/ferdinand.jaravata.9" target="_blank" title="WEDDING MASTER">WEDDING MASTER</a></label>
              <label for="link_c_item3"><input type="radio" name="link_c_items" id="link_c_item3" value="Other" disabled> Other</label>
              <input type="text" name="other_c" id="other_c" class="form-control" placeholder="Other supplier" disabled>
            </div>
            <div class="form-group col-md-3" style="border-right:1px solid #eee">
              <label for="link_s"><input type="checkbox" name="link_s" id="link_s" value="Sound Systems"> Sound Systems</label>
              <hr>
              <label for="link_s_item1"><input type="radio" name="link_s_items" id="link_s_item1" value="KDA  Light and Sound" disabled> <a href="//fb.com/djjerwin" target="_blank" title="KDA  Light and Sound">KDA  Light and Sound</a></label>
              <label for="link_s_item2"><input type="radio" name="link_s_items" id="link_s_item2" value="Other" disabled> Other</label>
              <input type="text" name="other_s" id="other_s" class="form-control" placeholder="Other supplier" disabled>
            </div>
            <div class="form-group col-md-3">
              <label for="link_f"><input type="checkbox" name="link_f" id="link_f" value="Floral Services"> Floral Services &nbsp;&nbsp;&nbsp;&nbsp;</label>
              <hr>
              <label for="link_f_item1"><input type="radio" name="link_f_items" id="link_f_item1" value="Milanes Flowershop" disabled> <a href="//fb.com/sherryann.matining" target="_blank" title="Milanes Flowershop">Milanes Flowershop</a></label>
              <label for="link_f_item2"><input type="radio" name="link_f_items" id="link_f_item2" value="Jane Abag Santos" disabled> <a href="//fb.com/jane.cantos1" target="_blank" title="Jane Abag Santos">Jane Abag Santos</a></label>
              <label for="link_f_item3"><input type="radio" name="link_f_items" id="link_f_item3" value="Other" disabled> Other</label>
              <input type="text" name="other_f" id="other_f" class="form-control" placeholder="Other supplier" disabled>
            </div>
          </div>
        </div>
      </div> <!-- col-lg-6 -->
    
      <div class="col-lg-6">

          <div class="panel">

            <div class="panel-body">
              <div class="form-group col-md-3">
                <label for="event_category" class="control-label">Event Category:</label>
                <select id="event_category" class="form-control" name="event_category" required>
                  <option value=""></option>
                  <option value="Birthday">Birthday</option>
                  <option value="Burial">Burial</option>
                  <option value="Family Gatherings">Family Gatherings</option>
                  <option value="School Activities">School Activities</option>
                  <option value="Weddings">Weddings</option>
                  <option value="Other Occasions">Other Occasions</option>
                </select>
              </div>

              <div id="pkgs">

                <div class="form-group col-md-3">
                  <label class="control-label">Wedding Packages</label>
                  <div class="radio">
                    <label>
                      <input id="pkg1" type="radio" name="pkg" value="pkg1">
                      Package 1
                    </label>
                    <br>
                    <a href="#" data-toggle="modal" data-target="#modal_pkg1"><small>details</small></a>
                  </div>
                  <div class="radio">
                    <label>
                      <input id="pkg2" type="radio" name="pkg" value="pkg2">
                      Package 2
                    </label>
                    <br>
                    <a href="#" data-toggle="modal" data-target="#modal_pkg2"><small>details</small></a>
                  </div>
                  <div class="radio">
                    <label>
                      <input id="pkg3" type="radio" name="pkg" value="pkg3">
                      Package 3
                    </label>
                    <br>
                    <a href="#" data-toggle="modal" data-target="#modal_pkg3"><small>details</small></a>
                  </div>
                  <div class="radio">
                    <label>
                      <input id="pkg4" type="radio" name="pkg" value="pkg4">
                      Package 4
                    </label>
                    <br>
                    <a href="#" data-toggle="modal" data-target="#modal_pkg4"><small>details</small></a>
                  </div>
                </div>
                
                <div class="form-group col-md-6">
                  <label class="control-label">Additional items</label>
                  <textarea class="form-control" name="add_item" placeholder="Add additional item ..." rows="10"></textarea>
                </div>

              </div>
              
              <div id="other_occasion">
                <div class="form-group col-md-4">
                  <label for="other" class="control-label">Other occasion name:</label>
                  <input id="other" class="form-control col-md-3" name="other" type="text" placeholder="Please specify ...">
                </div>
              </div>

              <div id="wedding-albums" class="row">
                <div class="col-md-12">
                  <label>Wedding Album Designs</label>
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label for="wed_album1"><input type="radio" name="wed_album" id="wed_album1" value="Design 1"> Design 1</label>
                      <a href="images/wed_album1.png" rel="prettyPhoto"><img width="100" src="images/wed_album1.png" alt=""></a>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="wed_album2"><input type="radio" name="wed_album" id="wed_album2" value="Design 2"> Design 2</label>
                      <a href="images/wed_album2.jpg" rel="prettyPhoto"><img width="100" src="images/wed_album2.jpg" alt=""></a>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="wed_album3"><input type="radio" name="wed_album" id="wed_album3" value="Design 3"> Design 3</label>
                      <a href="images/wed_album3.jpg" rel="prettyPhoto"><img width="100" src="images/wed_album3.jpg" alt=""></a>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="wed_album4"><input type="radio" name="wed_album" id="wed_album4" value="Design 4"> Design 4</label>
                      <a href="images/wed_album4.jpg" rel="prettyPhoto"><img width="100" src="images/wed_album4.jpg" alt=""></a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="wed_album5"><input type="radio" name="wed_album" id="wed_album5" value="Design 5"> Custom Album</label>
                      <input type="text" name="wed_album5" id="wed_album5_text" class="form-control" placeholder="Paste link here" disabled>
                    </div>
                  </div>
                </div>
              </div>

              <div id="bday-albums" class="row">
                <div class="col-md-12">
                  <label>Birthday Album Designs</label>
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label for="bday_album1"><input type="radio" name="bday_album" id="bday_album1" value="Design 1"> Design 1</label>
                      <a href="images/bday_album1.jpg" rel="prettyPhoto"><img width="100" src="images/bday_album1.jpg" alt=""></a>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="bday_album2"><input type="radio" name="bday_album" id="bday_album2" value="Design 2"> Design 2</label>
                      <a href="images/bday_album2.jpg" rel="prettyPhoto"><img width="100" src="images/bday_album2.jpg" alt=""></a>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="bday_album3"><input type="radio" name="bday_album" id="bday_album3" value="Design 3"> Design 3</label>
                      <a href="images/bday_album3.jpg" rel="prettyPhoto"><img width="100" src="images/bday_album3.jpg" alt=""></a>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="bday_album4"><input type="radio" name="bday_album" id="bday_album4" value="Design 4"> Design 4</label>
                      <a href="images/bday_album4.jpg" rel="prettyPhoto"><img width="100" src="images/bday_album4.jpg" alt=""></a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="bday_album5"><input type="radio" name="bday_album" id="bday_album5" value="Design 5"> Custom Album</label>
                      <input type="text" name="bday_album5" id="bday_album5_text" class="form-control" placeholder="Paste link here" disabled>
                    </div>
                  </div>
                </div>
              </div>
              
              <div id="date_normal" class="col-md-12">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="date_from" class="control-label">Select date and time from:</label>
                    <input id="date_from" class="form-control col-md-3" name="date_from" type="text" readonly required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="date_end" class="control-label">Select date and time to:</label>
                    <input id="date_end" class="form-control col-md-3" name="date_end" type="text" readonly  required>
                  </div>
                </div>
              </div>
              
              <div id="date_wedding" class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <h3>Nuptial</h3>
                  </div>
                  <div class="col-md-6">
                    <h3>Wedding</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="date_from_nup" class="control-label">Select date and time from:</label>
                      <input id="date_from_nup" class="form-control col-md-3" name="date_from_nup" type="text" readonly required>
                    </div>
                    <div class="form-group">
                      <label for="date_end_nup" class="control-label">Select date and time to:</label>
                      <input id="date_end_nup" class="form-control col-md-3" name="date_end_nup" type="text" readonly  required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="date_from_wed" class="control-label">Select date and time from:</label>
                      <input id="date_from_wed" class="form-control col-md-3" name="date_from_wed" type="text" readonly required>
                    </div>
                    <div class="form-group">
                      <label for="date_end_wed" class="control-label">Select date and time to:</label>
                      <input id="date_end_wed" class="form-control col-md-3" name="date_end_wed" type="text" readonly  required>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="desc" class="control-label">Description:</label>
                  <textarea id="desc" name="desc" class="form-control" rows="10" cols="80" required></textarea>
                </div>
              </div>

            </div>

          </div>

      </div>
      
    </div> <!-- row -->
              
    <div class="row">
      <div class="form-group col-md-12 text-right">
        <button id="send-btn" type="submit" name="submit" class="btn btn-primary">Save event</button>
      </div>
    </div>
  </form>
</div> <!-- container -->

<!-- Modal -->
<div class="modal fade" id="modal_pkg1" tabindex="-1" role="dialog" aria-labelledby="pkg1Title">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="pkg1Title">Package 1</h4>
      </div>
      <div class="modal-body">
        <strong>Php 10, 000.00</strong>
        <ul>
          <li>2 Photographers</li>
        </ul>
        <strong>PRE-NUPTIAL:</strong>
        <ul>
          <li>Free Prenup Shoot</li>
          <li>E-Session on Clients  preferred venue(s)</li>
          <li>Unlimited Shots</li>
          <li>30 post processed shots ready for slide show with music</li>
        </ul>
        <strong>WEDDING</strong>
        <ul>
          <li>Full photo coverage from preparation to reception</li>
          <li>1 pc, 8R Hard Copy with Frame</li>
          <li>100 pcs, 5R Hard Copies Printed on matte Paper</li>
          <li>7x10 magnetic wedding album</li>
          <li>Soft Copies stored in USB Flashdrive</li>
        </ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_pkg2" tabindex="-1" role="dialog" aria-labelledby="pkg2Title">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="pkg2Title">Package 2</h4>
      </div>
      <div class="modal-body">
        <strong>Php 20, 000.00</strong>
        <ul>
          <li>2 Photographers</li>
          <li>1 Videographer</li>
        </ul>
        <strong>PRE-NUPTIAL:</strong>
        <ul>
          <li>Free Prenup Shoot</li>
          <li>E-Session on Clients Preferred Venue(s)</li>
          <li>Unlimited Shots</li>
          <li>30 Post Processed Shots Ready for Slide Show with Music</li>
        </ul>
        <strong>WEDDING</strong>
        <ul>
          <li>Full Photo and Video Coverage from preparation to Reception</li>
          <li>Video Coverage is Stored on Different CD</li>
          <li>1 pc. , 8R Hard Copy with Frame</li>
          <li>40 pcs, 8R Hard Copies Printed in Matte Paper</li>
          <li>8x10 Magnetic Wedding Album</li>
          <li>Soft Copies Stored in USB Flashdrive</li>
        </ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_pkg3" tabindex="-1" role="dialog" aria-labelledby="pkg3Title">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="pkg3Title">Package 3</h4>
      </div>
      <div class="modal-body">
        <strong>Php 20, 000.00</strong>
        <ul>
          <li>2 Photographers</li>
          <li>2 Videographers</li>
          <li>Lights Man</li>
        </ul>
        <strong>PRE-NUPTIAL:</strong>
        <ul>
          <li>E-Session on Clients preferred Venue</li>
          <li>Unlimited Shots</li>
          <li>3-5 mins. AVP(Save the Date)</li>
          <li>20 pcs, 5R Photos</li>
          <li>Tarpaulin (3x4 ft.)</li>
        </ul>
        <strong>WEDDING</strong>
        <ul>
          <li>Full Photo and Video Coverage from Preparation to Reception</li>
          <li>3-5 mins. Video Highlights(MTV)</li>
          <li>2 pcs, 8R Hard Copy With Frame</li>
          <li>1 pc, 11R Hard Copy with Frame</li>
          <li>40 pcs, 8R Hard Copies Printed on Matte Paper</li>
          <li>8x10 Magnetic Wedding Album with Acrylic Glass in Front</li>
          <li>Soft Copies Stored in USB Flashdrive</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_pkg4" tabindex="-1" role="dialog" aria-labelledby="pkg4Title">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="pkg4Title">Package 4</h4>
      </div>
      <div class="modal-body">
        <p>
        <strong>Php 65, 000.00</strong>
        <ul>
          <li>2 Photographers</li>
          <li>2 Videographers</li>
          <li>Video Editor</li>
          <li>Lights Man</li>
        </ul>
        <strong>PRE-NUPTIAL:</strong>
        <ul>
          <li>Free Nuptial Shoot</li>
          <li>E-Session on Clients Preferred Venue(s)</li>
          <li>Unlimited Shots</li>
          <li>3-5 mins. AVP (Save the Date) with Aerial Shots</li>
          <li>20 pcs, 8R Photos</li>
          <li>Guest Book</li>
          <li>Signature Frame</li>
          <li>Tarpaulin</li>
          <li>Standee</li>
        </ul>
        <strong>WEDDING</strong>
        <ul>
          <li>Full Phot and Video Coverage from Preparation to Reception</li>
          <li>Aerial Shots</li>
          <li>Same Day Edit</li>
          <li>3-5 mins. Video Highlights</li>
          <li>2 pcs, 8R Hard Copy with Frame</li>
          <li>1 pc, 11R Hard Copy with Frame</li>
          <li>40 pcs, 8R Hard Copy Printed on  Matte Paper</li>
          <li>8x10 Magnetic Wedding Album with Acrylic Glass in Front</li>
          <li>2 pcs Parents Album</li>
          <li>Soft Copies Stored in USB Flashdrive</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<?php
include '_includes/footer.php';
?>