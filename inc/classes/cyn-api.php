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
                        'callback' => [$this, 'handle_post_comments'],
                        'permission_callback' => '__return_true'

                    ]
                );
            });

            add_action('rest_api_init', function () {
                register_rest_route(
                    'cynApi/v1',
                    '/like',
                    [
                        'methods' => 'GET',
                        'callback' => [$this, 'handle_like'],
                        'permission_callback' => '__return_true'

                    ]
                );
            });
        }



        public function handle_like(WP_REST_Request $req)
        {
            var_dump($req);
            $post_Id = $req->get_param('post-id');
            add_comment_meta(5, 'users who liked this comment', "", $unique = true);
            return new WP_REST_Response(['status' => true, 'message' => 'liked', 'comment-id' => ""], 200);
        }

        public function handle_post_comments(WP_REST_Request $req)
        {
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
                return new WP_REST_Response(['status' => true, 'message' => 'comment created', 'comment-id' => $comment_id], 200);
            }
        }
    }
}
