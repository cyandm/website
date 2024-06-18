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





        public function cyn_handle_post_comments(WP_REST_Request $req)
        {

            //  cyn_verify_nonce($_SERVER['HTTP_X_WP_NONCE']);

            $author = $req->get_param('author-name');
            $content = $req->get_param('content');
            $parent_Id = $req->get_param('parent-id');
            $post_Id = $req->get_param('post-id');



            $comment_id = wp_insert_comment([
                'comment_author' => $author,
                'comment_content' => $content,
                'comment_post_ID' => $post_Id,
                'comment_parent' => $parent_Id ?? 0,
            ]);

            if (false === $comment_id) {
                return new WP_REST_Response(['status' => false, 'message' => 'something went wrong!'], 500);
            } else {
                return new WP_REST_Response(['status' => true, 'message' => 'comment created', 'comment-id' => $comment_id], 20);
            }
        }


        public function render_by_query($query, $post_type, array $args = [])
        {
            ob_start();
            if ($query->have_posts()) {
                while ($query->have_posts()) :
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
