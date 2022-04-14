<?php

class Nannynina_Api
{
    public function __construct()
    {
        // Register Route
        add_action('rest_api_init', function () {
            register_rest_route('nannynina/v1', 'faqs', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_alL_faq'),
            ));
        });
    }


    /**
     * Get all FAQ posts
     *
     * @return int[]|WP_Post[] All faq posts * or null if none.
     */
    public function get_alL_faq()
    {
        $posts = get_posts(array(
            'post_type' => 'faq',
            'numberposts' => -1
        ));

        if (empty($posts)) {
            return null;
        }

        return $posts;
    }
}
