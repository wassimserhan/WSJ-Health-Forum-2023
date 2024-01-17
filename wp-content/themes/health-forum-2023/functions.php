<?php

/**
@ Featured Image and Title Tag Support
*/

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
show_admin_bar( false );
add_filter('acf/settings/remove_wp_meta_box', '__return_false');



/**
@ Create Link ID
*/


function wsj_link_id( $location, $link_text ) {

    global $post;
    $post_slug = $post->post_name;
    $link_id = $post_slug . '-' . sanitize_title( $location ) . '-' . sanitize_title( $link_text );
    return $link_id;
}



function my_customize_rest_cors() {
	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
	add_filter( 'rest_pre_serve_request', function( $value ) {
		header( 'Access-Control-Allow-Origin: *' );
		header( 'Access-Control-Allow-Methods: GET' );
		header( 'Access-Control-Allow-Credentials: true' );
		header( 'Access-Control-Expose-Headers: Link', false );

		return $value;
	} );
}

add_action( 'rest_api_init', 'my_customize_rest_cors', 15 );

/**
@ Template scripts
*/

function get_page_by_title_search($string){
    global $wpdb;
    $title = esc_sql($string);
    if(!$title) return;
    $page = $wpdb->get_results("
        SELECT * 
        FROM $wpdb->posts
        WHERE post_title LIKE '%$title%'
        AND post_type = 'page' 
        AND post_status = 'publish'
        LIMIT 1
    ");
    return $page;
}

function wsj_template_scripts() {

    // CSS STYLES

    $css_version_number = get_field( 'css_version_number', get_option( 'page_on_front' ) );
    wp_register_style( 'wsj-styles', get_template_directory_uri() . '/dist/css/style.css', array(), $css_version_number );
        
    wp_enqueue_style( 'wsj-styles' );

    // wp_register_style( 'wsj-flickity', 'https://npmcdn.com/flickity@2/dist/flickity.css');
    // wp_enqueue_style( 'wsj-flickity' );

   //JS SCRIPTS

    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array(), null, 1);
     wp_script_add_data( 'jquery', array( 'integrity', 'crossorigin' ) , array( 'sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=', 'anonymous' ) );
    // wp_enqueue_script( 'flickity-js', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), null, 1);
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/dist/js/custom.min.js', array(), $css_version_number, 1);

}
add_action( 'wp_enqueue_scripts', 'wsj_template_scripts' );


function remove_bloat() {
    remove_action( 'wp_head', 'rest_output_link_wp_head' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    // filter to remove TinyMCE emojis
    add_filter( 'emoji_svg_url', '__return_false' );
    // filter to remove the DNS prefetch
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
  }

  add_action( 'after_setup_theme', 'remove_bloat' );

    /**
    @ Remove WP Junk from <head>
    */

    show_admin_bar( 0 );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );  
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wp_resource_hints', 2 );


    /**
    @ Remove Default Comments from top bar
    */

    function my_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
    }
    add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );

    /**
    @ Remove Default Post Type & Comments from side menu
    */

    function remove_default_post_type() {
        remove_menu_page( 'edit.php' );
        remove_menu_page( 'edit-comments.php' );
    }

        add_action( 'admin_menu', 'remove_default_post_type' );

    /**
    @ Custom Post Types
    */

    /**
    * Post Type: Speakers.
    */

function cptui_register_my_cpts_speaker() {
    $labels = array(
        "name" => __( "Speakers", "" ),
        "singular_name" => __( "Speaker", "" ),
    );

    $args = array(
        "label" => __( "Speakers", "" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "menu_icon" => 'dashicons-businesswoman',
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "speakers", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "thumbnail", "editor" ),
    );

    register_post_type( "speakers", $args );
}

    add_action( 'init', 'cptui_register_my_cpts_speaker' );



        /**
    * Post Type: Sponsors.
    */

function cptui_register_my_cpts_sponsor() {
    $labels = array(
        "name" => __( "Sponsors", "" ),
        "singular_name" => __( "Sponsor", "" ),
    );

    $args = array(
        "label" => __( "Sponsors", "" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "menu_icon" => 'dashicons-groups',
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "sponsors", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "thumbnail", "editor" ),
    );

    register_post_type( "sponsor", $args );
}

    add_action( 'init', 'cptui_register_my_cpts_sponsor' );

       /**
    * Post Type: Pricing.
    */


    function cptui_register_my_cpts_pricing() {
    $labels = array(
        "name" => __( "Pricing", "" ),
        "singular_name" => __( "Pricing", "" ),
    );

    $args = array(
        "label" => __( "Pricing", "" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "menu_icon" => 'dashicons-money',
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "pricing", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "thumbnail", "editor" ),
    );

    register_post_type( "pricing", $args );
}

    add_action( 'init', 'cptui_register_my_cpts_pricing' );

        /**
    * Post Type: Agenda.
    */


    function cptui_register_my_cpts_agenda() {
    $labels = array(
        "name" => __( "Agenda", "" ),
        "singular_name" => __( "Agenda", "" ),
    );

    $args = array(
        "label" => __( "agenda", "" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "menu_icon" => 'dashicons-calendar-alt',
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "agenda", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "thumbnail", "editor" ),
    );

    register_post_type( "agenda", $args );
}

    add_action( 'init', 'cptui_register_my_cpts_agenda' );


     // add the ajax fetch js
    add_action( 'wp_footer', 'wsju_ajax_fetch' );
    function wsju_ajax_fetch() {
    ?>
<script type="text/javascript">
function IsEmail(email) {
  var emailParts = email.split("@")
  // There must be exactly 2 parts
  if (emailParts.length !== 2) {
    return false
  }
  // Name the parts
  var emailName = emailParts[0]
  var emailDomain = emailParts[1]
  // === Validate the parts ===
  // Must be at least one char before @ and 3 chars after
  if (emailName.length < 1 || emailDomain.length < 3) {
    return false
  }
  // Define valid chars
  var validChars = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t",
    "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q",
    "R", "S", "T", "U", "V", "W", "X", "Y", "Z", ".", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "_", "-"
  ]
  // emailName must only include valid chars
  for (var i = 0; i < emailName.length; i += 1) {
    if (validChars.indexOf(emailName.charAt(i)) < 0) {
      return false
    }
  }
  // emailDomain must only include valid chars
  for (var j = 0; j < emailDomain.length; j += 1) {
    if (validChars.indexOf(emailDomain.charAt(j)) < 0) {
      return false
    }
  }
  // Domain must include but not start with .
  if (emailDomain.indexOf(".") <= 0) {
    return false
  }
  // Domain's last . should be 2 chars or more from the end
  var emailDomainParts = emailDomain.split(".")
  if (emailDomainParts[emailDomainParts.length - 1].length < 2) {
    return false
  }
  return true
}

function fetchform() {

  var email = jQuery('#fe12855').val().trim();
  var firstName = jQuery('#fe14631').val().trim();
  var lastName = jQuery('#fe14632').val().trim();
  var phone = jQuery('#fe14972').val().trim();
  var title = jQuery('#fe14973').val().trim();
  var company = jQuery('#fe14974').val().trim();
  var industry = formIndustry ? formIndustry : "";
  var country = formCountry ? formCountry : "";
  var state = formState ? formState : "";
  var optIn = jQuery("#field100:checked");
  var formId = jQuery('#fe12865').val();
  var formName = jQuery('#fe12864').val().trim();
  var selectOutcome = jQuery('#fe12866').val().trim();
  var redirectUrl = jQuery('#fe12867').val().trim();
  var formType = jQuery('#fe12868').val().trim();
  var document = jQuery('#fe12869').val().trim();

  if (optIn) {
    optIn = optIn.val();
  } else {
    optIn = "";
  }


  if (email && firstName && lastName && phone && title && company && industry && country) {

    if (IsEmail(email)) {
      jQuery('.reg-errors').slideUp();
      jQuery('.form-submit').addClass('hidden');
      jQuery('.form-submit-loading').addClass('loading');
      jQuery('.form-submit-loading').removeClass('hidden');

      jQuery.ajax({
        url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
        type: 'post',
        data: {
          action: 'data_fetch',
          email: email,
          firstName: firstName,
          lastName: lastName,
          phone: phone,
          title: title,
          company: company,
          industry: industry,
          country: country,
          state: state,
          optIn: optIn,
          formId: formId
        },
        success: function(data) {

          if (selectOutcome.toLowerCase() == 'download') {
            jQuery('.videos-form-container').addClass('hidden');
            jQuery('.form-success-div').removeClass('hidden');
            window.open(document,'_blank');

          } else if (selectOutcome.toLowerCase() == 'redirect') {
            window.location.href = redirectUrl;
          } else {
            jQuery('.videos-form-container').addClass('hidden');
            jQuery('.form-success-div').removeClass('hidden');
          }

          utag.link({
            event_name: 'lead_form_complete',
            form_name: formName,
            form_id: formName,
            form_type: formType
          });

        }
      });
    } else {
      jQuery('.reg-errors').html('Please fill a valid email *.').slideDown();
    }

  } else {
    jQuery('.reg-errors').html('Please fill the required fields *.').slideDown();
  }


}

function fetchformAttendee() {

var email = jQuery('#fe12855').val().trim();
var firstName = jQuery('#fe14631').val().trim();
var lastName = jQuery('#fe14632').val().trim();
// var phone = jQuery('#fe14972').val().trim();
var title = jQuery('#fe14973').val().trim();
var company = jQuery('#fe14974').val().trim();
var industry = formIndustry ? formIndustry : "";
var country = formCountry ? formCountry : "";
var state = formState ? formState : "";
var optIn = jQuery("#field100:checked");
var formId = jQuery('#fe12865').val();
var formName = jQuery('#fe12864').val().trim();
var selectOutcome = jQuery('#fe12866').val().trim();
var redirectUrl = jQuery('#fe12867').val().trim();
var formType = jQuery('#fe12868').val().trim();
var document = jQuery('#fe12869').val().trim();

if (optIn) {
  optIn = optIn.val();
} else {
  optIn = "";
}


if (email && firstName && lastName && title && company && industry && country) {

  if (IsEmail(email)) {
    jQuery('.reg-errors').slideUp();
    jQuery('.form-submit').addClass('hidden');
    jQuery('.form-submit-loading').addClass('loading');
    jQuery('.form-submit-loading').removeClass('hidden');

    jQuery.ajax({
      url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
      type: 'post',
      data: {
        action: 'attendeeform_fetch',
        email: email,
        firstName: firstName,
        lastName: lastName,
        // phone: phone,
        title: title,
        company: company,
        industry: industry,
        country: country,
        state: state,
        optIn: optIn,
        formId: formId
      },
      success: function(data) {

        if (selectOutcome.toLowerCase() == 'download') {
          jQuery('.videos-form-container').addClass('hidden');
          jQuery('.form-success-div').removeClass('hidden');
          window.open(document,'_blank');

        } else if (selectOutcome.toLowerCase() == 'redirect') {
          window.location.href = redirectUrl;
        } else {
          jQuery('.videos-form-container').addClass('hidden');
          jQuery('.form-success-div').removeClass('hidden');
        }

        utag.link({
          event_name: 'lead_form_complete',
          form_name: formName,
          form_id: formName,
          form_type: formType
        });

      }
    });
  } else {
    jQuery('.reg-errors').html('Please fill a valid email *.').slideDown();
  }

} else {
  jQuery('.reg-errors').html('Please fill the required fields *.').slideDown();
}


}

function barFormSubmit() {

  var email = jQuery('#bar-form-email').val().trim();
  var formId = jQuery('#bar-form-id').val();
  var formName = jQuery('#bar-form-name').val().trim();

  if (email && formId) {

    if (IsEmail(email)) {
      jQuery('.bar__form--err').slideUp();

      jQuery.ajax({
        url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
        type: 'post',
        data: {
          action: 'barform_fetch',
          email: email,
          formId: formId
        },
        success: function(data) {
          jQuery('.bar__form--success').html('Submitted! Thank you').slideDown();

          utag.link({
            event_name: 'lead_form_complete',
            form_name: formName,
            form_id: formName,
            form_type: 'Sign Up'
          });
          setTimeout(function() { 
            jQuery('.bar__form--success').html('Submitted! Thank you').slideUp();
          }, 3000);

        }
      });
    } else {
      jQuery('.bar__form--err').html('Please fill a valid email *.').slideDown();
    }

  } else {
      jQuery('.bar__form--err').html('Please fill a valid email *.').slideDown();
    } 


}
</script>
<?php }
    // the ajax function
    add_action( 'wp_ajax_data_fetch' , 'data_fetch' );
    add_action( 'wp_ajax_nopriv_data_fetch', 'data_fetch' );
    
    function data_fetch() {
        $email = sanitize_text_field( $_POST['email'] );
        $lastName = sanitize_text_field( $_POST['lastName'] );
        $firstName = sanitize_text_field( $_POST['firstName'] );
        $phone = sanitize_text_field( $_POST['phone'] );
        $title = sanitize_text_field( $_POST['title'] );
        $company = sanitize_text_field( $_POST['company'] );
        $industry = sanitize_text_field( $_POST['industry'] );
        $country = sanitize_text_field( $_POST['country'] );
        $state = sanitize_text_field( $_POST['state'] );
        $optIn = sanitize_text_field( $_POST['optIn'] );
        $formId = $_POST['formId'];
    
        if ( ! $error ) {
            if ($email) {

        
             $url = $formId;
            
    
                $data = array(
                    'emailAddress' => $email,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'busPhone' => $phone,
                    'title' => $title,
                    'company' => $company,
                    'industry1' => $industry,
                    'country' => $country,
                    'stateProv' => $state,
                    'DJ_OptIn_Checkbox' => $optIn
            );
    
                $mch_api = curl_init(); // initialize cURL connection
             
                curl_setopt($mch_api, CURLOPT_URL, $url);
                curl_setopt($mch_api, CURLOPT_POST, 1);
                curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
                curl_setopt($mch_api, CURLOPT_POSTFIELDS, http_build_query($data) ); // send data in query
                $output = curl_exec($mch_api);
                curl_close($mch_api);
                echo $output;
            }
        }
        else {
            echo 'Sorry, we encountered an error with your search.';
          }
            die();
    
    }

    add_action( 'wp_ajax_attendeeform_fetch' , 'attendeeform_fetch' );
    add_action( 'wp_ajax_nopriv_attendeeform_fetch', 'attendeeform_fetch' );
    
    function attendeeform_fetch() {
        $email = sanitize_text_field( $_POST['email'] );
        $lastName = sanitize_text_field( $_POST['lastName'] );
        $firstName = sanitize_text_field( $_POST['firstName'] );
        // $phone = sanitize_text_field( $_POST['phone'] );
        $title = sanitize_text_field( $_POST['title'] );
        $company = sanitize_text_field( $_POST['company'] );
        $industry = sanitize_text_field( $_POST['industry'] );
        $country = sanitize_text_field( $_POST['country'] );
        $state = sanitize_text_field( $_POST['state'] );
        $optIn = sanitize_text_field( $_POST['optIn'] );
        $formId = $_POST['formId'];
    
        if ( ! $error ) {
            if ($email) {

        
             $url = $formId;
            
    
                $data = array(
                    'emailAddress' => $email,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    // 'busPhone' => $phone,
                    'title' => $title,
                    'company' => $company,
                    'industry1' => $industry,
                    'country' => $country,
                    'stateProv' => $state,
                    'DJ_OptIn_Checkbox' => $optIn
            );
    
                $mch_api = curl_init(); // initialize cURL connection
             
                curl_setopt($mch_api, CURLOPT_URL, $url);
                curl_setopt($mch_api, CURLOPT_POST, 1);
                curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
                curl_setopt($mch_api, CURLOPT_POSTFIELDS, http_build_query($data) ); // send data in query
                $output = curl_exec($mch_api);
                curl_close($mch_api);
                echo $output;
            }
        }
        else {
            echo 'Sorry, we encountered an error with your search.';
          }
            die();
    
    }

    add_action( 'wp_ajax_barform_fetch' , 'barform_fetch' );
    add_action( 'wp_ajax_nopriv_barform_fetch', 'barform_fetch' );
    
    function barform_fetch() {
        $email = sanitize_text_field( $_POST['email'] );
        $formId = $_POST['formId'];
    
        if ( ! $error ) {
            if ($email) {

        
             $url = $formId;
            
    
                $data = array(
                    'emailAddress' => $email
            );
    
                $mch_api = curl_init(); // initialize cURL connection
             
                curl_setopt($mch_api, CURLOPT_URL, $url);
                curl_setopt($mch_api, CURLOPT_POST, 1);
                curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
                curl_setopt($mch_api, CURLOPT_POSTFIELDS, http_build_query($data) ); // send data in query
                $output = curl_exec($mch_api);
                curl_close($mch_api);
                echo $output;
            }
        }
        else {
            echo 'Sorry, we encountered an error with your search.';
          }
            die();
    
    }
    