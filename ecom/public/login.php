<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Page Content -->
    <div class="container">

      <header>

          <!-- Message Field; use set_message(); -->
  <h2 class="text-center bg-warning"> <?php display_message(); ?> </h2>

            <h1>Login User</h1>

          

               <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">


                <div class="form-group"><label for="">
                    Benutzer<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="text" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>

                <?php login_user(); ?>

            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->

       <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>