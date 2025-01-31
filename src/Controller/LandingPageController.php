<?php

namespace Drupal\sagres\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\file\Entity\File;

class LandingPageController extends ControllerBase {
  public function content() {

    // LOAD CONFIG
    $config = \Drupal::config('sagres.settings');
    $user = \Drupal::currentUser();

    // Module path
    $module_path = \Drupal::service('extension.list.module')->getPath('sagres');

    $title = $config->get('title') ?? 'Sagres';

    // Load image 1
    $image_1_fid = $config->get('image_1');
    if (!empty($image_1_fid) && is_array($image_1_fid)) {
      $file = File::load($image_1_fid[0]);
      if ($file) {
        $img_1 = file_create_url($file->getFileUri());
      } else {
        $img_1 = base_path() . $module_path . '/images/img1.jpg';
      }
    } else {
      $img_1 = base_path() . $module_path . '/images/img1.jpg';
    }

    // Load image 2
    $image_2_fid = $config->get('image_2');
    if (!empty($image_2_fid) && is_array($image_2_fid)) {
      $file = File::load($image_2_fid[0]);
      if ($file) {
        $img_2 = file_create_url($file->getFileUri());
      } else {
        $img_2 = base_path() . $module_path . '/images/img2.jpg';
      }
    } else {
      $img_2 = base_path() . $module_path . '/images/img2.jpg';
    }

    // Load image 3
    $image_3_fid = $config->get('image_3');
    if (!empty($image_3_fid) && is_array($image_3_fid)) {
      $file = File::load($image_3_fid[0]);
      if ($file) {
        $img_3 = file_create_url($file->getFileUri());
      } else {
        $img_3 = base_path() . $module_path . '/images/img3.jpg';
      }
    } else {
      $img_3 = base_path() . $module_path . '/images/img3.jpg';
    }

    // Load footer logo
    $footer_logo_fid = $config->get('footer_logo');
    if (!empty($footer_logo_fid) && is_array($footer_logo_fid)) {
      $file = File::load($footer_logo_fid[0]);
      if ($file) {
        $footer_logo = file_create_url($file->getFileUri());
      } else {
        $footer_logo = base_path() . $module_path . '/images/footer.png';
      }
    } else {
      $footer_logo = base_path() . $module_path . '/images/footer.png';
    }

    // Buttons definition
    $buttons_col1 = [
      ['icon' => 'fas fa-chart-bar fa-2xl', 'label' => 'Manage Sites', 'url' => 'manage-sites'],
      ['icon' => 'fas fa-magnifying-glass fa-2xl', 'label' => 'Contracts', 'url' => '#'],

    ];

    $buttons_col2 = [
      ['icon' => 'fas fa-chart-bar fa-2xl', 'label' => 'KGR', 'url' => '#'],
      ['icon' => 'fas fa-magnifying-glass fa-2xl', 'label' => 'Social', 'url' => '#'],

    ];

    $buttons_col3 = [
      ['icon' => 'fas fa-chart-bar fa-2xl', 'label' => 'User Management', 'url' => '#'],
      ['icon' => 'fas fa-magnifying-glass fa-2xl', 'label' => 'Social Search', 'url' => '#'],
    ];

    // Check if user is authenticated
    // $current_user = \Drupal::currentUser();
    // if ($current_user->isAuthenticated()) {
    //   // User authenticated: show Profile and Log Out options
    //   $user_profile_url = Url::fromRoute('entity.user.canonical', ['user' => $current_user->id()])->toString();
    //   $logout_url = Url::fromRoute('user.logout')->toString();
    //   $user_links = '
    //     <a class="nav-link text-white" href="' . $user_profile_url . '">Profile</a>&nbsp;|&nbsp;
    //     <a class="nav-link text-white" href="' . $logout_url . '">Log Out</a>
    //   ';
    // } else {
    //   // Anonymous user: show Login and Sign Up options
    //   $login_url = Url::fromRoute('user.login')->toString();
    //   $signup_url = Url::fromRoute('user.register')->toString();
    //   $user_links = '
    //     <a class="nav-link text-white" href="' . $login_url . '?destination=sagres">Login</a>&nbsp;|&nbsp;
    //     <a class="nav-link text-white" href="' . $signup_url . '?destination=sagres">Sign Up</a>
    //   ';
    // }

    // INIT HTML
    $output = '';

    // HTML HEADER
    // $output = '<div id="landing_header" class=" background-portuguese-flag">';
    // $output .= '
    //   <div class="row pt-3">
    //     <div class="col d-flex align-items-center">
    //       <img class="px-5" height="150" src="'.$logo_url.'" />
    //     </div>
    //     <div class="col-8 d-flex align-items-center">
    //       <h1 class="text-black">'.$title.'</h1>
    //     </div>
    //     <div class="col d-flex align-items-center text-align-center text-white">
    //       ' . $user_links . '
    //     </div>
    //   </div>
    // ';
    // $output .= '</div>';

    // // HTML IMAGES ROW
    // $output .= '<div class="container-image">
    //               <div class="row text-center p-0">
    //                 <div class="col-md-4 p-0">
    //                   <img src="'.$img_1.'" class="custom-img" alt="Image 1">
    //                 </div>
    //                 <div class="col-md-4 p-0">
    //                   <img src="'.$img_2.'" class="custom-img" alt="Image 2">
    //                 </div>
    //                 <div class="col-md-4 p-0">
    //                   <img src="'.$img_3.'" class="custom-img" alt="Image 3">
    //                 </div>
    //               </div>
    //             </div>';

    // HTML FOR BUTTONS
    $output .= '<div class="container my-5">';
    $output .= '<div class="row">';

    //USER IS AUTHENTICATED
    if ($user->isAuthenticated()) {
      // Column 1
      $output .= '<div class="col-4 d-flex flex-column justify-content-between">';
      foreach ($buttons_col1 as $button) {
        $output .= '<a href="' . $button['url'] . '" class="btn btn-primary btn-lg my-2 d-flex align-items-center justify-content-center custom-button">';
        $output .= '<i class="' . $button['icon'] . ' me-2"></i>&nbsp;';
        $output .= '<h5>' . $button['label'] . '</h5>';
        $output .= '</a>';
      }
      $output .= '</div>';

      // Column 2
      $output .= '<div class="col-4 d-flex flex-column justify-content-between">';
      foreach ($buttons_col2 as $button) {
        $output .= '<a href="' . $button['url'] . '" class="btn btn-primary btn-lg my-2 d-flex align-items-center justify-content-center custom-button">';
        $output .= '<i class="' . $button['icon'] . ' me-2"></i>&nbsp;';
        $output .= '<h5>' . $button['label'] . '</h5>';
        $output .= '</a>';
      }
      $output .= '</div>';

      // Column 3
      $output .= '<div class="col-4 d-flex flex-column justify-content-between">';
      foreach ($buttons_col3 as $button) {
        $output .= '<a href="' . $button['url'] . '" class="btn btn-primary btn-lg my-2 d-flex align-items-center justify-content-center custom-button">';
        $output .= '<i class="' . $button['icon'] . ' me-2"></i>&nbsp;';
        $output .= '<h5>' . $button['label'] . '</h5>';
        $output .= '</a>';
      }
      $output .= '</div>';
    } else {
      // USER IS NOT AUTHENTICATED

      $output .= '<div class="col-12 text-center">';
      $output .= '      <h2>Welcome to '.$config->get('title').'</h2>';
      $output .= '</div>';

      // CLOSE ROW
      $output .= '</div>';

      $output .= '<div class="row">';
      $output .= '<div class="col-2"></div>';
      $output .= '<div class="col-8 mt-5 text-left" style="margin-top:2rem;">';
      $output .= '  <p>To access the content you must be authenticated</p>';
      $output .= '  ';
      $output .= '</div>';
      $output .= '<div class="col-2"></div>';
    }

    // CLOSE CONTAINER
    $output .= '</div>';

    // HTML FOOTER
    // $output .= '<div id="landing_footer">
    //               <div class="container h-100">
    //                 <div class="row h-100 align-items-center">
    //                   <div class="col text-center">
    //                     <img height="40" src="'.$footer_logo.'" alt="footer logo">
    //                   </div>
    //                 </div>
    //               </div>
    //             </div>';

    // Return HTML
    return [
      '#markup' => $output,
      '#attached' => [
        'library' => [
          'sagres/styles',
        ],
      ],
    ];
  }
}
