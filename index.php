<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Latest compiled and minified bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="assets/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Buy your pixel no</title>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <h1 class="main-title">Buy your pixel now</h1>

  <div class="pixel-container">
    
      <?php for( $i = 0; $i < 100; $i++): ?>
            <?php if ( isset($_SESSION['url'][$i]) ) : ?>
            <a target="_blank" href="<?php echo $_SESSION['url'][$i]?>">
            <?php endif;?>
            
            <div class="single-pixel" style="background-color:<?php echo isset($_SESSION['color'][$i]) ? $_SESSION['color'][$i] : "blue" ?>" id="<?php echo $i; ?>"
             data-placement="top"  title="<?php  echo isset($_SESSION['description'][$i]) ? $_SESSION['description'][$i] : 'Buy this piece of history now' ?>" data-toggle="tooltip" ></div>
            
            <?php if ( isset($_SESSION['url'][$i]) ) : ?>
            </a>
            <?php endif;?>
   
  <?php endfor;?>
  </div>


    <!-- Modal html-->
    <div class="modal fade" id="buyPixel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Specify a url to redirect when the user clicks on your tile</h4>
          </div>
          <div class="modal-body">
            <form id="save_my_pixel" method="get" action="" enctype="application/x-www-form-urlencoded">
              <p>URL:</p><input class="form-control" value="" id="user_url" type="text">
              <p>Color:</p>
              <div class="input-group color-picker">
                  <input type="text" value="#00aabb" id="user-color-picker" class="form-control" />
                  <span class="input-group-addon"><i></i></span>
              </div>
              <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" rows="5" id="user_comment"></textarea>
              </div>
              <input id="pixel_id" value="" type="hidden">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="buy_now">Buy now</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified Bootstrap´s JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified colorpicker  Bootstrap´s JavaScript -->
    <script src="assets/js/bootstrap-colorpicker.min.js"></script>
    <script src="assets/js/main.js"></script>

  </body>
</html>
