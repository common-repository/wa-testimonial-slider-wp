<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Watestimonialsliderwp
 * @subpackage Watestimonialsliderwp/admin
 * @author     Jordi Catà <jordi.cata@arambee.com>
 */


add_action('wp_ajax_watestimonialssliderwp_testimonial_add', array('Watestimonialsliderwp_Admin', 'process_watestimonialsliderwp_testimonial_add'));
add_action('wp_ajax_watestimonialssliderwp_testimonial_edit', array('Watestimonialsliderwp_Admin', 'process_watestimonialsliderwp_testimonial_edit'));
add_action('wp_ajax_watestimonialssliderwp_testimonial_delete', array('Watestimonialsliderwp_Admin', 'process_watestimonialsliderwp_testimonial_delete'));


add_action( 'admin_enqueue_scripts', array('Watestimonialsliderwp_Admin', 'load_wp_media_files' ));
add_action( 'wp_ajax_myprefix_get_image', array('Watestimonialsliderwp_Admin', 'myprefix_get_image' ));


if( empty( get_option( 'my-watestimonialslider-rating-dismissed' ) ) ) {
	add_action('admin_notices', array('Watestimonialsliderwp_Admin', 'general_admin_notice'));
	add_action( 'wp_ajax_watestimonialslider_rating', array('Watestimonialsliderwp_Admin', 'dismiss_rating' ));
}




class Watestimonialsliderwp_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name = 'WaTestimonialSliderWP';

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version = '1.0.0';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        add_action( 'admin_menu', array($this, 'add_plugin_admin_menu'));
        add_action( 'admin_post_save_watestimonialsliderwp_testimonial', array($this, 'process_watestimonialsliderwp_testimonial_add' ));

    }

    /**
     * process testimonial add via ajax
     */
    public function process_watestimonialsliderwp_testimonial_add()
    {
        $name = sanitize_text_field($_REQUEST[ 'name']);
        $text = sanitize_text_field($_REQUEST[ 'text' ]);
//        $date = $_REQUEST[ 'date' ];
        $published = $_REQUEST[ 'published'] == 1 ? 1 : 0;
        $imageid = $_REQUEST[ 'imageid'];
        $data = array('name' => $name, 'text' => $text, 'date' => $date, 'published' => $published, 'imageid' => $imageid);

        $options = get_option('watestimonialsliderwp_options', array());
        if (!is_array($options)) {
            $options = array();
        }

        $options = array_values($options);
        $options[] = $data;

        update_option( 'watestimonialsliderwp_options', $options);
        wp_json_encode(array('message' => 'ok'));
    }

    /**
     * edit testimonial
     */
    public function process_watestimonialsliderwp_testimonial_edit()
    {
        $id = sanitize_text_field($_REQUEST[ 'id']);
        $name = sanitize_text_field($_REQUEST[ 'name']);
        $text = sanitize_text_field($_REQUEST[ 'text' ]);
//        $date = $_REQUEST[ 'date' ];
        $published = $_REQUEST[ 'published'] == 'true' ? 1 : 0;
	    $imageid = $_REQUEST[ 'imageid'];
        $data = array('name' => $name, 'text' => $text, 'date' => $date, 'published' => $published, 'imageid' => $imageid);

        $options = get_option('watestimonialsliderwp_options', array());
        $options[$id] = $data;

        update_option( 'watestimonialsliderwp_options', $options);

        wp_json_encode(array('message' => 'ok'));
    }

    public function process_watestimonialsliderwp_testimonial_delete()
    {
        $id = sanitize_text_field($_REQUEST[ 'id']);
        $options = get_option('watestimonialsliderwp_options', array());
        unset($options[$id]);

        $options = array_values($options);

        update_option( 'watestimonialsliderwp_options', $options);

        wp_json_encode(array('message' => 'ok'));
    }

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Watestimonialsliderwp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Watestimonialsliderwp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/watestimonialsliderwp-admin.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'jquery-ui-datepicker-style' , '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css');
//		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jquery-ui.css', array(), $this->version, 'all' );

        $screen = get_current_screen();
        if (stristr($screen->id, 'watestimonialslider')) {
            //bootrsap
            wp_enqueue_style('bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
//	        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );

            //fontawesome
            wp_enqueue_style('load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
//	        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), $this->version, 'all' );
        }

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Watestimonialsliderwp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Watestimonialsliderwp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/watestimonialsliderwp-admin.js', array( 'jquery' ), $this->version, false );

//        wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-ui-core' );
        wp_enqueue_script( 'jquery-ui-datepicker' );


        //bootstrap

        $screen = get_current_screen();

        if (stristr($screen->id, 'watestimonialslider')) {
            wp_enqueue_script('bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
//	        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
        }
	}

    /**
     * add admin menu
     */
    function add_plugin_admin_menu()
    {

        add_menu_page(
            __('WaTestimonial Slider', 'watestimonialsliderwp'),
            __('Testimonials', 'watestimonialsliderwp'),
            'manage_options',
            'watestimonialslider-testimonials-all',
            array($this, 'watestimonialsliderwp_testimonials_all'),
            'dashicons-groups'
        );

//        add_submenu_page(
//            'watestimonialslider-testimonials-all',
//            __('All Testimonials' , 'watestimonialsliderwp'),
//            __('All Testimonials' , 'watestimonialsliderwp'),
//            'manage_options',
//            'watestimonialslider-testimonial-all',
//            array($this, 'watestimonialsliderwp_testimonials_all')
//        );

//        add_submenu_page(
//            'watestimonialslider-testimonials-all',
//            __('Add Testimonials' , 'watestimonialsliderwp'),
//            __('Add Testimonials' , 'watestimonialsliderwp'),
//            'manage_options',
//            'watestimonialslider-testimonial-add',
//            array($this, 'watestimonialsliderwp_testimonial_add')
//        );

//        add_submenu_page(
//            'watestimonialslider-testimonials-all',
//            __('Edit Testimonials' , 'watestimonialsliderwp'),
//            __('Edit Testimonials' , 'watestimonialsliderwp'),
//            'manage_options',
//            'watestimonialslider-testimonial-edit',
//            array($this, 'watestimonialsliderwp_testimonial_edit')
//        );
    }

    /**
     * testimonial list
     */
    function watestimonialsliderwp_testimonials_all()
    {
        $options = get_option('watestimonialsliderwp_options', array());
//        $add = add_query_arg( 'page', 'watestimonialslider-testimonial-add') ;
//        $edit = add_query_arg( 'page', 'watestimonialslider-testimonial-edit') ;
//        $delete = add_query_arg( 'page', 'watestimonialslider-testimonial-delete') ;

        include 'partials/list.php';
        include 'partials/modalforms.php';
    }

	function load_wp_media_files( $page ) {
		// change to the $page where you want to enqueue the script
//	if( $page == 'options-general.php' ) {
		// Enqueue WordPress media scripts
		wp_enqueue_media();
		// Enqueue custom script that will interact with wp.media
		wp_enqueue_script( 'myprefix_script', plugins_url( '/js/myscript.js' , __FILE__ ), array('jquery'), '0.1' );
//	}
	}



	function myprefix_get_image() {
		if(isset($_GET['id']) ){
			$image = wp_get_attachment_image( filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT ), 'medium', false, array( 'id' => 'myprefix-preview-image' ) );
			$data = array(
				'image'    => $image,
			);
			wp_send_json_success( $data );
		} else {
			wp_send_json_error();
		}
	}


	function general_admin_notice(){
		global $pagenow;

		if ( $pagenow == 'index.php' ) {
			echo '<div id="watestimonialslider-rating" class="watestimonialslider-rating notice notice-warning is-dismissible">
             <p><strong>Wa Testimonial Slider: </strong>Thanks for use our Testimonial Slider plugin.</p>
             <p>Please if your use our plugin, rate it in <a  target="_blank" href="https://wordpress.org/plugins/wa-testimonial-slider-wp/">Wordpress Extensions</a></p>
         </div>';
		}
	}

	function dismiss_rating()
	{
		add_option( 'my-watestimonialslider-rating-dismissed', true );
		wp_send_json_success( 'ok' );
	}



}
