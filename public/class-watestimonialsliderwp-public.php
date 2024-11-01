<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       webactualizable.com
 * @since      1.0.0
 *
 * @package    Watestimonialsliderwp
 * @subpackage Watestimonialsliderwp/public
 * @author     Jordi Catà <jordi.cata@arambee.com>
 */
class Watestimonialsliderwp_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        add_shortcode( 'watestimonialsliderwp', array($this, 'watestimonialsliderwp_div' ));


    }

    /**
     * setup shortcode
     * @param $atts
     * @param $content
     * @return string
     */
    public function watestimonialsliderwp_div( $atts, $content )
    {
        $testimonials = get_option('watestimonialsliderwp_options', array());
        ?>

        <div class="container">
            <div class="page-header">
                <h2 class="text-center">Testimonials</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">

                        <div class="carousel-inner text-center">
                            <?php
                            $i = 0;
                            $published = 0;
                            foreach ($testimonials as $key => $testimonial) {

                                if (isset($testimonial['published']) && $testimonial['published']) {
	                                $published++;
                                ?>

                                <div class="item <?php if ($i == 0) { echo " active "; } ?> ">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <?php
                                                if ($testimonial['imageid'] != "") {
	                                                $image = wp_get_attachment_image( $testimonial['imageid']);
	                                                echo $image;
                                                }
                                               // if ($testimonial['text'] != "") { ?>
                                                    <p>
                                                        <?php echo $testimonial['text']; ?>
                                                    </p>
                                                <?php //} ?>

                                                <?php //if ($params->get('show_testimonial_name')) {
                                                   // if ($testimonial['name']) { ?>
                                                        <small>
                                                            <?php echo $testimonial['name']; ?>
                                                        </small>
                                                    <?php //} ?>
                                                <?php //} ?>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                            <?php
                                }
                                $i++;
                            } ?>

                        </div>
                        <?php if ($published > 1){ ?>
                        <!-- Carousel Slides / Quotes -->
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">

                            <?php /*foreach ($testimonials as $key => $testimonial) { ?>
                                <?php //if ($testimonial->text != "") { ?>
                                <li data-target="#quote-carousel" data-slide-to="<?php echo $key + 1; ?>" class="<?php if ($key == 0) { echo " active "; } ?>">
                                    <?php //if ($params->get('show_testimonial_photo')) { ?>
                                        <img class="img-responsive " src="<?php echo $testimonial->photo;?> " alt="">
                                    <?php //} ?>
                                </li>
                                <?php //} ?>
                            <?php }  */?>
                        </ol>

                        <!-- Carousel Buttons Next/Prev -->
                        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    <?php }

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/watestimonialsliderwp-public.css', array(), $this->version, 'all' );

		//bootrsap
        wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
//		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );

        //fontawesome
        wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
//		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/watestimonialsliderwp-public.js', array( 'jquery' ), $this->version, false );

		//bootstrap
        wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
//		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
	}

}
