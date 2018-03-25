<?php

include '_includes/header.php';

?>


    <section id="contact-info">
        <div class="center">                
            <h2>How to Reach Us?</h2>
            <p class="lead">You may contact us in our following information...</p>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                           <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61993.919719241545!2d120.96948800000003!3d13.801767400000013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd0f43050a8e33%3A0x4020bfe46fd1d828!2sBauan%2C+Batangas!5e0!3m2!1sen!2sph!4v1440472360455" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                        </div>
                    </div>

                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            <li class="col-sm-6">
                                <address>
                                    <h5>Head Office</h5>
                                    <p>Manghinao Proper <br>
                                    Bauan Batangas</p>
                                    <p>Tel#: (043) 984-8970 <br>
                                    Email Address: mgabuilders@hotmail.com</p>
                                </address>

                                <address>
                                    <h5>NokTool Botique</h5>
                                    <p>San Jose St. <br>
                                    Bauan Batangas </p>                                
                                    <p>Tel#: (043) 984-1284 <br>
                                    Email Address: noktoolshop@hotmail.com</p>
                                </address>
								
								<address>
                                    <h5>NokTool Bautista</h5>
                                    <p>San Rafael St. <br>
                                    Bauan Batangas </p>
                                    <p>Tel#: (043) 984-0590 <br>
                                    Email Address: noktoolshop@hotmail.com</p>
                                </address>
                            </li>


                            <li class="col-sm-6">
                                <address>
                                    <h5>I.T. PCworks</h5>
                                    <p>Kap. Ponso St. <br>
                                    Citimart Bauan Batangas</p>
                                    <p>Tel#: (043) 727-3684 <br>
                                    Email Address: itpcworks@yahoo.com</p>
                                </address>

                                <address>
                                    <h5>Gadget Zone</h5>
                                    <p>Kap. Ponso St. <br>
                                    Citimart Bauan Batangas</p>
                                    <p>Tel#: N/A <br>
                                    Email Address:info@domain.com</p>
                                </address>
								
								<address>
                                    <h5>NokTool</h5>
                                    <p>Mabini <br>
                                    Public Market</p>
                                    <p>Tel#: (043) 487-0845 <br>
                                    Email Address:info@domain.com</p>
                                </address>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->

    <section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Drop Your Message</h2>
                <p class="lead">Feel free to contact us! </p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control">
                        </div>                        
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->

       <?php

include '_includes/footer.php';

?>   