<?php

use Automattic\WooCommerce\Admin\API\Reports\Coupons\Query;

if (!class_exists('cyn_api')) {
    class cyn_api
    {
        function __construct()
        {

            add_action('rest_api_init', function () {
                register_rest_route(
                    'cynApi/v1',
                    '/comments',
                    [
                        'methods' => 'POST',
                        'callback' => [$this, 'cyn_handle_post_comments'],
                        'permission_callback' => '__return_true'

                    ]
                );
            });
        }





        public function cyn_handle_post_comments()
        {
            cyn_verify_nonce($_SERVER['HTTP_X_WP_NONCE']);
            $comment = new WP_Query($_POST);
            $response = $this->render_by_query($comment,"comment",[]);
            // wp_send_json_success(
            //     [
            //         'html' => $response,
            //     ],
            //     200
            // );

            $res = new WP_REST_Response(['response' => 'true']);

            return $res;
        }


        public function render_by_query($query, $post_type, array $args = [])
        {
            ob_start();
            if ($query->have_posts()) {
                while ($query->have_posts()):
                    $query->the_post();
                    cyn_get_card($post_type, $args);
                endwhile;
            } else {
                get_template_part('/templates/archive/not-found');
            }
            wp_reset_postdata();
            return ob_get_clean();
        }
    }
}
