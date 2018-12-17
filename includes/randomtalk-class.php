<?php
/**
 * Adds RandomTalk widget.
 */
class randomtalk_chat_widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'randomtalk_widget', // Base ID
            esc_html__( 'Randomtalk Chat Widget', 'randomtalk_domain' ), // Name
            array( 'description' => esc_html__( 'A Chat Widget', 'randomtalk_domain' ), ) // Args
        );

        // Add settings page content and functionality
        add_action( "admin_init", array($this, "setup_settings_page" ));
        // Adds the settings page as sub page to general options
        add_action( "admin_menu", array($this, "add_subpage" ));
    }

    // Add settings page content and functionality
    function setup_settings_page() {

    }

    // Build settings page (front-end with form)
    function settings_page() {
        ?>
        <div class="wrap">
            <h1>RandomTalk Chat Settings</h1>

            <p>Welcome to the Settings Page of this awesome but not functional Widget Plugin!</p>
            <p>Sorry, but there is no settings to play with... at the moment...</p>
            <!-- options.php is a Wordpress file that does most logic -->
            <form method="post" action="options.php">
                <?php
                // Insert section, fields and save button
                do_settings_sections( "customize-randomtalk" );
                settings_fields( "randomtalk_settings" );
//                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    function add_subpage()
    {
        add_submenu_page
        (
            "options-general.php",
            "Customize RandomTalk Chat Settings",
            "Customize RandomTalk",
            "manage_options",
            "customize-randomtalk",
            array($this, "settings_page")
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        $radio = ! empty( $instance['radio'] ) ? $instance['radio'] : false;

        //Before Widget
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        // Widget Content
//        echo "Welcome to RandomTalk Chat!";
        include('layout.php');

        // After Widget
        echo $args['after_widget'];
    }


    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'RandomTalk Chat', 'randomtalk_domain' );
        ?>

        <!-- TITLE -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_attr_e( 'Title:', 'randomtalk_domain' ); ?>
            </label>

            <input
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                type="text"
                value="<?php echo esc_attr( $title ); ?>"
            >
        </p>


        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

        return $instance;
    }

} // class RandomTalk widget