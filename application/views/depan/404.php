<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">


<?php foreach ( $setting as $set ) {
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Page Not Found | <?php echo $set->nama_sekolah; ?></title>
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/'.$set->logo_sekolah.''?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.min.css'?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/font-awesome.min.css'?>">
    <!-- Simple Line Font -->
    <!-- Main CSS -->
    <link href="<?php echo base_url().'theme/css/style.css'?>" rel="stylesheet">
    <?php
        function limit_words($string, $word_limit){
            $words = explode(" ",$string);
            return implode(" ",array_splice($words,0,$word_limit));
        }
    ?>
</head>
<style type="text/css">
    #bgn {
        background-image: url(<?php echo base_url('assets/images/empty.jpg') ?>);
        width: 100%; 
        background-position: center; 
        background-repeat: no-repeat; 
        background-size: cover;
        filter:alpha(opacity=40);
    }
</style>

<body style="background: #000">
    <!--============================= HEADER =============================-->
    <div data-toggle="affix">
      </div>
      <section>
</section>
<!--//END HEADER -->

    <section id="bgn">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center style="color: #fff; padding: 25%;">
                    <h1>OOPS !!!</h1>
                    <h1>404 Page Not Found</h1>
                    <h1><a href="<?php echo base_url(); ?>" class="btn btn-primary">Back To Home</a></h1>
                    <p><?php echo date('Y');?> © <?php echo $set->nama_sekolah;  ?> All rights reserved.</p>
                    </center>
                </div>
            </div>
        </div>
    </section>

    <!--//End Style 2 -->
    <!--============================= FOOTER =============================-->

        <!--//END FOOTER -->
        <!-- jQuery, Bootstrap JS. -->
    </body>

    </html>
<?php } ?>