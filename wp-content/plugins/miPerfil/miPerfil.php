<?php
/**
Plugin Name: miPerfil
Plugin URI:  http://www,de3.mx
Description: Plugin de prueba para LAS
Version:     1.1
Author:      Juan Miguel Rolland
Author URI:   http://www.de3.mx
 **/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
class WPPluign{

    function  __construct()
    {
        add_action( 'init', array( $this, 'register_custom_post_type' ) );
        add_action( 'admin_print_scripts', 'admin_inline_js' );

        add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ) );
         add_action( 'save_post', array( $this, 'save_meta_boxes' ) );

    }

    /**
     * Registers a Meta Box on our Contact Custom Post Type, called 'Contact Details'
     */
    function register_meta_boxes() {
        add_meta_box( 'contact-details', 'Contact Details', array( $this, 'output_meta_box' ), 'contact', 'normal', 'high' );
    }

    /**
     * Output a Contact Details meta box
     *
     * @param WP_Post $post WordPress Post object
     */
    function output_meta_box($post) {
        $email = get_post_meta( $post->ID, '_contact_email', true );

        // Add a nonce field so we can check for it later.
        wp_nonce_field( 'save_contact', 'contacts_nonce' );

        // Output label and field
        echo ( '<label for="contact_email">' . __( 'Email Address', 'tuts-crm' ) . '</label>' );
        echo ( '<input type="text" name="contact_email" id="contact_email" value="' . esc_attr( $email ) . '" />' );
    }
    function register_custom_post_type() {
        register_post_type( 'contact', array(
            'labels' => array(
                'name'               => _x( 'Contacts', 'post type general name', 'tuts-crm' ),
                'singular_name'      => _x( 'Contact', 'post type singular name', 'tuts-crm' ),
                'menu_name'          => _x( 'Contacts', 'admin menu', 'tuts-crm' ),
                'name_admin_bar'     => _x( 'Contact', 'add new on admin bar', 'tuts-crm' ),
                'add_new'            => _x( 'Add New', 'contact', 'tuts-crm' ),
                'add_new_item'       => __( 'Add New Contact', 'tuts-crm' ),
                'new_item'           => __( 'New Contact', 'tuts-crm' ),
                'edit_item'          => __( 'Edit Contact', 'tuts-crm' ),
                'view_item'          => __( 'View Contact', 'tuts-crm' ),
                'all_items'          => __( 'All Contacts', 'tuts-crm' ),
                'search_items'       => __( 'Search Contacts', 'tuts-crm' ),
                'parent_item_colon'  => __( 'Parent Contacts:', 'tuts-crm' ),
                'not_found'          => __( 'No conttacts found.', 'tuts-crm' ),
                'not_found_in_trash' => __( 'No contacts found in Trash.', 'tuts-crm' ),
            ),

            // Frontend
            'has_archive'        => false,
            'public'             => true,
            'publicly_queryable' => true,

            // Admin
            'capability_type' => 'post',
            'menu_icon'     => 'dashicons-businessman',
            'menu_position' => 10,
            'query_var'     => true,
            'show_in_menu'  => true,
            'show_ui'       => true,
            'supports'      => array(
                'title',
                'excerpt',
                'thumbnail',
                'editor'
              /*  'author',*/
              /*  'comments',*/
            ),
        ) );
    }

    /**
     * Saves the meta box field data
     *
     * @param int $post_id Post ID
     */
    function save_meta_boxes( $post_id ) {

        // Check this is the Contact Custom Post Type
        if ( 'contact' != $_POST['post_type'] ) {
            return $post_id;
        }

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $_POST['contacts_nonce'], 'save_contact' ) ) {
            return $post_id;
        }


        // Check the logged in user has permission to edit this post
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }

        // OK to save meta data
        $email = sanitize_text_field( $_POST['contact_email'] );
        update_post_meta( $post_id, '_contact_email', $email );

    }



    function admin_inline_js(){
        echo "<script type='text/javascript'>\n";
        echo 'var pluginUrl = ' . wp_json_encode( WP_PLUGIN_URL . '/my_plugin/' ) . ';';
        echo "\n</script>";
    }

    function check_textarea_length() {
      //  ?>
        <script type="text/javascript">
            jQuery( document ).ready( function($) {
                var editor_char_limit = 50;

                $('.mceStatusbar').append('<span class="word-count-message">Reduce word count!</span>');

                tinyMCE.activeEditor.onKeyUp.add( function() {
                    // Strip HTML tags, WordPress shortcodes and white space
                    editor_content = this.getContent().replace(/(<[a-zA-Z\/][^<>]*>|\[([^\]]+)\])|(\s+)/ig,'');

                    if ( editor_content.length > editor_char_limit ) {
                        $('#content_tbl').addClass('toomanychars');
                    } else {
                        $('#content_tbl').removeClass('toomanychars');
                    }
                });
            });
        </script>

        <style type="text/css">
            .wp_themeSkin .word-count-message { font-size:1.1em; display:none; float:right; color:#fff; font-weight:bold; margin-top:2px; }
            .wp_themeSkin .toomanychars .mceStatusbar { background:red; }
            .wp_themeSkin .toomanychars .word-count-message { display:block; }
        </style>
        <?php
    }

}



$wpTuto= new WPPluign;
