<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header 
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome!</h1>
           
        </header>

        <hr>
        -->

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <p><h1>Gesamter Katalog</h1><br/></p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <?php
         get_products_in_shop();

            ?>

        </div>
        <!-- /.row -->

        

       

    </div>
    <!-- /.container -->

   <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>