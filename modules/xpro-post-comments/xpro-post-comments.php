<?php
/**
 * @class XPROIconBoxModule
 *
 */

if (!class_exists('XPROPostCommentsModule')) {

    class XPROPostCommentsModule extends FLBuilderModule
    {

        /**
         * @method __construct
         *
         */
        public function __construct()
        {
            parent::__construct(array(
                'name'          => __('Post Comments', 'xpro-bb-addons'),
                'description'   => __('An example for coding new modules.', 'xpro-bb-addons'),
                'group'         => XPRO_Plugins_Helper::$branding_modules,
                'category'      => XPRO_Plugins_Helper::$themer_modules,
                'dir'           => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-post-comments/',
                'url'           => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-post-comments/',
                'partial_refresh'     => true,
            ));
        }

        /**
         * @method enqueue_scripts
         *
         */
        public function enqueue_scripts()
        {
            // Already registered
            $this->add_css('font-awesome');
            $this->add_css('font-awesome-5');
            $this->add_css('foundation-icons');
            $this->add_css('ultimate-icons');
        }


        /**
         * Get First/Current Post id
         *
         * @method @get_post_id
         */
        public static function get_post_id($i)
        {

            global $wpdb;
            global $post;

            $post_type = $post->post_type;
            if ($post_type == "xpro-themer") {
                $type = 'post';
                $first_posts = $wpdb->get_results($wpdb->prepare("
                SELECT ID FROM {$wpdb->posts}
                WHERE post_type = %s AND post_status = 'publish' 
                ORDER BY post_date ASC limit 1", $type));

                foreach ($first_posts as $f_post) {
                    $f_post_id = $f_post->ID;
                }
            }

            if ($post->post_type == "xpro-themer") {
                $post_id = $f_post_id;
            } else {
                $post_id = $post->ID;
            }

            return $post_id;
        }

    }

    /**
     * Register the module and its form settings.
     */
    FLBuilder::register_module('XPROPostCommentsModule', array(
        'general'       => array(
            'title'         => __('General', 'xpro-bb-addons'),
            'sections'      => array(
                'content'       => array(
                    'title'         => __('Comments', 'xpro-bb-addons'),
                    'fields'        => array(
                        'comments_type' => array(
                            'type'          => 'select',
                            'label'         => __('Notice', 'xpro-bb-addons'),
                            'default'       => 'info',
                            'help'          => __('When Actual comments will not show it will show the reason', 'xpro-bb-addons'),
                            'options'       => array(
                                'info'      => __('Info', 'xpro-bb-addons'),
                                'danger'      => __('Danger', 'xpro-bb-addons'),
                                'success'      => __('Success', 'xpro-bb-addons'),
                                'warning'      => __('Warning', 'xpro-bb-addons'),
                            ),
                        ),
                    ),
                ),
            )
        ),
    ));
}
