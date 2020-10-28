
<!-- Configuration-->

<?php require_once("../resources/config.php"); ?>


<!-- Header-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>


  
         <!-- Contact Section -->

        <div class="container">
              <h2 class="text-center bg-warning"> <?php display_message(); ?> </h2>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted"></h3>

                     <!-- Message Field; use set_message(); -->


                </div>
            </div>

<form name="sentmessage" id=contactForm method="post">



            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" name="name">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                
                            </div>
                            <div class="col-md-6">

<div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter subject">
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>

                                   <?php send_contact_form(); ?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button name="submit" type="submit" class="btn btn-xl">Abschicken</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>