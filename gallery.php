<?php

include '_includes/header.php';
?>

<section id="gallery">
  <div class="container">
    <div class="center">
      <h2>Photo and Video Gallery</h2>
      <p class="lead">Cherish and Capturing moments<br></p>
    </div>


    <ul class="portfolio-filter text-center">
      <li><a class="btn btn-default active" href="#" data-filter="*">All Works</a></li>
      <li><a class="btn btn-default"  href="#"  data-filter=".weddings">Weddings</a></li>
      <li><a class="btn btn-default" href="#" data-filter=".birthdays">Birthdays</a></li>
      <li><a class="btn btn-default" href="#" data-filter=".bootstrap">Burials</a></li>
      <li><a class="btn btn-default" href="#" data-filter=".html">Family Gatherings</a></li>
      <li><a class="btn btn-default" href="#" data-filter=".activities">School Activities</a></li>
      <li><a class="btn btn-default" href="#" data-filter=".wordpress">Other Occassions</a></li>
    </ul><!--/#portfolio-filter-->

    <div class="row">
      <div class="portfolio-items">
        
        <?php
        $result = mysqli_query($conn, "select * from gallery where category='Weddings'");
        while ($row = mysqli_fetch_array($result)) {
        ?>
        
        <div class="portfolio-item weddings col-xs-12 col-sm-4 col-md-3">
          <div class="recent-work-wrap">
            <img class="img-responsive" src="<?= $row['image'] ?>" alt="">
              <div class="overlay">
                <div class="recent-work-inner">
                  <h3><a href="#">TYPE</a></h3>
                  <p>the lagay tayp short description</p>
                  <a class="preview" href="<?= $row['image'] ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                </div> 
              </div>
          </div>
        </div><!--/.portfolio-item-->
        
        <?php } ?>
        
        <?php
        $result = mysqli_query($conn, "select * from gallery where category='Birthdays'");
        while ($row = mysqli_fetch_array($result)) {
        ?>
        
        <div class="portfolio-item birthdays col-xs-12 col-sm-4 col-md-3">
          <div class="recent-work-wrap">
            <img class="img-responsive" src="<?= $row['image'] ?>" alt="">
              <div class="overlay">
                <div class="recent-work-inner">
                  <h3><a href="#">TYPE</a></h3>
                  <p>the lagay tayp short description</p>
                  <a class="preview" href="<?= $row['image'] ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                </div> 
              </div>
          </div>
        </div><!--/.portfolio-item-->
        
        <?php } ?>
        
        <?php
        $result = mysqli_query($conn, "select * from gallery where category='School Activities'");
        while ($row = mysqli_fetch_array($result)) {
        ?>
        
        <div class="portfolio-item activities col-xs-12 col-sm-4 col-md-3">
          <div class="recent-work-wrap">
            <img class="img-responsive" src="<?= $row['image'] ?>" alt="">
              <div class="overlay">
                <div class="recent-work-inner">
                  <h3><a href="#">TYPE</a></h3>
                  <p>the lagay tayp short description</p>
                  <a class="preview" href="<?= $row['image'] ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                </div> 
              </div>
          </div>
        </div><!--/.portfolio-item-->
        
        <?php } ?>

      </div>
    </div>
  </div>
</section><!--/#portfolio-item-->


<?php

include '_includes/footer.php';
?>
	