<?php

	 
			 
class FirmSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_submenu_page(
        	'edit.php?post_type=firms',
        	'Landing Page Settings',
        	'Custom Settings',
        	'edit_posts',
        	basename(__FILE__),
        	array( $this, 'create_admin_page' )
        	);
         
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'lfsh_firm_options_name' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Firms</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'lfsh_firm_options_group' );   
                do_settings_sections( 'lfsh-firms-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'lfsh_firm_options_group', // Option group
            'lfsh_firm_options_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Enter page header and intro text below. ', // Title
            array( $this, 'print_section_info' ), // Callback
            'lfsh-firms-setting-admin' // Page
        );  

        add_settings_field(
            'firm_settings_page_header', // ID
            'Page Header', // Title 
            array( $this, 'firm_settings_page_header_callback' ), // Callback
            'lfsh-firms-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'title', 
            'Title', 
            array( $this, 'title_callback' ), 
            'lfsh-firms-setting-admin', 
            'setting_section_id'
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['firm_settings_page_header'] ) )
            $new_input['firm_settings_page_header'] = absint( $input['firm_settings_page_header'] );

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'This will appear in the firms page.';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function firm_settings_page_header_callback()
    {
        printf(
            '<input type="text" id="firm_settings_page_header" name="lfsh_firm_options_name[firm_settings_page_header]" value="%s" />',
            isset( $this->options['firm_settings_page_header'] ) ? esc_attr( $this->options['firm_settings_page_header']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function title_callback()
    {
        	/* ADDING WP EDITOR TO BODY FIELD

        	$content = '';
			$editor_id = 'mycustomeditor';

			wp_editor( $content, $editor_id );

			*/

        printf(
            '<input type="text" id="title" name="lfsh_firm_options_name[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
        );
    }
}

if( is_admin() )
    $lfsh_firms_settings_page = new FirmSettingsPage();


?>