<?php
class install extends text_generator {


   public static $settings = array();
   public static $files    = array(
      'install.php',
      'assets/js/install.js',
      'assets/css/install.css',
      'includes/install.class.php'
   );


   public static function add_setting($setting, $value) {
      self::$settings[$setting] = urldecode($value);
      return true;
   }


   public static function string_length($string, $min, $max) {
      $string = strlen($string);
      return ($string >= $min && $string <= $max);
   }


   public static function validate_params($method) {
      $errors = array();
      if ( self::add_setting('name', $method['name']) && !self::string_length(self::$settings['name'], 1, 100) ) {
         $errors[] = 'please enter a website name between 1 and 100 characters in length!';
      }
      if ( self::add_setting('email', $method['email']) && !self::string_length(self::$settings['email'], 5, 200) ) {
         $errors[] = 'please enter a contact email between 5 and 200 characters in length!';
      }
      if ( self::add_setting('facebook-url', $method['facebook-url']) && !self::string_length(self::$settings['facebook-url'], 10, 200) ) {
         $errors[] = 'please enter a facebook page url between 10 and 200 characters in length!';
      }
      if ( self::add_setting('twitter-url', $method['twitter-url']) && !self::string_length(self::$settings['twitter-url'], 10, 200) ) {
         $errors[] = 'please enter a twitter page url between 10 and 200 characters in length!';
      }
      if ( self::add_setting('pinterest-url', $method['pinterest-url']) && !self::string_length(self::$settings['pinterest-url'], 10, 200) ) {
         $errors[] = 'please enter a pinterest page url between 10 and 200 characters in length!';
      }
      if ( self::add_setting('google-url', $method['google-url']) && !self::string_length(self::$settings['google-url'], 10, 200) ) {
         $errors[] = 'please enter a google+ page url between 10 and 200 characters in length!';
      }
      if ( self::add_setting('about', $method['about']) && !self::string_length(self::$settings['about'], 1, 1000) ) {
         $errors[] = 'please enter some about us text between 1 and 1000 characters in length!';
      }
      return $errors;
   }


   public static function results($method) {
      $errors = self::validate_params($method);
      if ( empty($errors) ) {
         self::put_json('config', self::$settings);
         foreach ( self::$files as $file ) {
            if ( !unlink(PATH_ABSOLUTE . $file) ) {
               $errors[] = 'we was able to save your website settings but unable to delete the ' . $file . ' file, please delete it manually!';
            }
         }
      }
      return array('status' => (!empty($errors) ? 'error' : 'success'), 'messages' => (!empty($errors) ? $errors : array(
         'successfully installed! Your settings have been saved & the installation page has been automatically deleted.',
      )));
   }


}
?>