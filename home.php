<?php require_once 'users/init.php';
header_remove('Pragma');
header_remove('Expires');
header('Cache-Control: public, max-age=300');

// require_once ('php/functions.php');
// require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';
if (isset($user) && $user->isLoggedIn()) {}

  require 'sections/header.php';

  require 'sections/hero.php';
    require 'sections/featured-1.php';
    require 'sections/about.php';
    require 'sections/featured-5.php';
    // require 'sections/all-cruises.php';
    require 'sections/newsletter.php';
    //require 'sections/testimonials.php';
    //require 'sections/stats.php';
    //require 'sections/recent-news.php';
    //require 'sections/events.php';
    require 'sections/contact-form.php';

  require 'sections/footer.php'; ?>
