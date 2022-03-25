<?php
// require the website config & install class files.
require_once('includes/config.php');
require_once('includes/install.class.php');

// on install submit.
if ( isset($_REQUEST['install']) ) {
   header('content-type: application/json');
   echo json_encode(install::results($_POST));
   exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>

      <!-- website meta tags -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title><?php echo $website['name'];?> installation v<?php echo $website['version'];?></title>

      <!-- website stylesheets -->
      <link href="<?php echo $website['url'];?>assets/css/styles.css?v=<?php echo $website['version'];?>" type="text/css" rel="stylesheet" />
      <link href="<?php echo $website['url'];?>assets/css/install.css?v=<?php echo $website['version'];?>" type="text/css" rel="stylesheet" />

   </head>
   <body>

      <?php // include the website header.?>
      <?php include_once(PATH_HTML . 'header.php');?>

      <!-- website hero -->
      <div id="hero">
         <div class="row container">
            <div class="col12">
               <h1><?php echo $website['name'];?> installation v<?php echo $website['version'];?></h1>
               <p>welcome to the <?php echo $website['name'];?> page, please fill out the website settings below and click install to finalize the installation.</p>
            </div>
         </div>
      </div>

      <!-- website main -->
      <div id="main">
         <div>
            <div class="row container">
               <div class="col12">
                  <label for="name">website name:</label>
                  <input id="name" type="text" placeholder="e.g: <?php echo $website['name'];?>" value="<?php echo $website['name'];?>" />
               </div>
               <div class="col12">
                  <label for="email">contact email:</label>
                  <input id="email" type="text" placeholder="e.g: <?php echo $website['email'];?>" value="<?php echo $website['email'];?>" />
               </div>
               <div class="col12">
                  <label for="facebook-url">facebook page url:</label>
                  <input id="facebook-url" type="text" placeholder="e.g: <?php echo $website['facebook-url'];?>" value="<?php echo $website['facebook-url'];?>" />
               </div>
               <div class="col12">
                  <label for="twitter-url">twitter page url:</label>
                  <input id="twitter-url" type="text" placeholder="e.g: <?php echo $website['twitter-url'];?>" value="<?php echo $website['twitter-url'];?>" />
               </div>
               <div class="col12">
                  <label for="pinterest-url">pinterest page url:</label>
                  <input id="pinterest-url" type="text" placeholder="e.g: <?php echo $website['pinterest-url'];?>" value="<?php echo $website['pinterest-url'];?>" />
               </div>
               <div class="col12">
                  <label for="google-url">google+ page url:</label>
                  <input id="google-url" type="text" placeholder="e.g: <?php echo $website['google-url'];?>" value="<?php echo $website['google-url'];?>" />
               </div>
               <div class="col12">
                  <label for="about">about us:</label>
                  <input id="about" type="text" placeholder="e.g: <?php echo $website['about'];?>" value="<?php echo $website['about'];?>" />
                  <input id="install" type="hidden" value="true" />
               </div>
            </div>
         </div>
         <div>
            <div class="row container">
               <div class="col12">
                  <button id="install-button" class="blue-btn">install Font Style Generator</button>
               </div>
               <div id="install-messages" class="col12"></div>
            </div>
         </div>
      </div>

      <?php // include the website footer.?>
      <?php include_once(PATH_HTML . 'footer.php');?>

      <!-- website javascript -->
      <script src="<?php echo $website['url'];?>assets/js/install.js?v=<?php echo $website['version'];?>" type="text/javascript"></script>

   </body>
</html>
