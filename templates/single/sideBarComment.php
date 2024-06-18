<?php
    $id = isset($args['id']) ? $args['id'] : 0;

    $comments_query = new WP_Comment_Query([
        'count' => false,
        'no_found_rows' => false,
        'number' => 100, //@need Load More
        'post_id' => $id,
        'status' => '1'

    ]);
    $comments = $comments_query->comments;
    $comments_count = sprintf(
        '<h3 class="comments__count text-white-1">%s %s</h3>',
        $comments_query->found_comments,
        __('دیدگاه', 'cyn-dm')
    );

    ?>



<!-- <div class="blur_box w-full z-40 p-8 h-lvh absolute bottom-0"> -->
<div data-active="false" class="comments__list bg-black-1 hidden z-50 h-lvh p-8 fixed top-0 right-0 bottom-0 md:min-w-[50%]" id="commentList">
    <div class="comments__action">
        <div id="commentCloser" class="border-white-1 rounded-full border-[1px] text-center w-8 h-8 flex justify-center align-middle  items-center">
            <svg class="icon">
                <use href="#icon-Arrow-23" class="" />
            </svg>
        </div>

        <div class="comments__text my-4">
            <?= $comments_count ?>
            <?php _e('شما هم توی این بحث شرکت کنید', 'cyn-dm') ?>
        </div>

    </div>

    <div class="comments__add-new">
        <form action="#" id="addNewComment">
            <div id="parentDiv" class="comments__add-new__parent" data-active="false">

                <div>
                    <span class="comments__add-new__parent-text">
                        <?php //_e('پاسخ به:', 'cyn-dm') 
                        ?>
                        <span id="parentText"></span>
                    </span>
                    <!-- <i class="icon-close" id="closeReply"></i> -->
                </div>
            </div>
            <div class="comments__add-new__massage" id="commentsMessage">

            </div>
            <div class="relative">
                <label for="name">
                    <svg class="icon absolute top-[0.5rem] right-[1.5rem]">
                        <use href="#icon-user-profile-circle-3" />
                    </svg>
                    <input type="text" name="author-name" required id="name" oninvalid="this.setCustomValidity('<?php _e('نام فیلد ضروری است', 'cyn-dm') ?>')" value="<?= is_user_logged_in() ? wp_get_current_user()->display_name : '' ?>" placeholder="<?php _e('نام', 'cyn-dm') ?>" class="py-2 px-4 pr-16 border-[1px] rounded-3xl border-gray-3 bg-black-2 w-full ">
                </label>
            </div>
            <div class="relative">
                <label for="content">
                    <svg class="icon absolute  top-[1.5rem] right-[1.5rem]">
                        <use href="#icon-Messages,-Chat-9" />
                    </svg>
                    <textarea name="content" required oninvalid="this.setCustomValidity('<?php _e('دیدگاه فیلد ضروری است', 'cyn-dm') ?>')" id="content" placeholder="<?php _e('دیدگاهتان را وارد کنید', 'cyn-dm') ?>" class="py-2 px-4 pr-16 border-[1px] rounded-3xl bg-black-2 w-full my-4 border-gray-3"></textarea>
                </label>
            </div>
            <input type="hidden" id="parentID" name="parent-id" value="">

            <input type="hidden" name="post-id" value="<?= $id ?>">
            <div class="text-center">
                <button class="btn border-[1px] rounded-full border-[#1dbacf]  px-8 py-4" size="small" variant="primary" type="submit" value="">
                    <i class="icon-send"></i>
                    <?= __('ارسال دیدگاه', 'cyn-dm') ?>
                </button>
            </div>

        </form>
    </div>


    <div class="comments__list__wrapper">
        <?php
        if ($comments) {

            foreach ($comments as $comment) {

                global $cyn_general, $cyn_render;

                $comment = isset($args['comment']) ? $args['comment'] : null;
                $children = isset($args['children']) ? $args['children'] : [];

                if (!$comment)
                    return;


                if (!function_exists('render_single_comment')) {
                    function render_single_comment($comment)
                    {
                        global $cyn_general, $cyn_render;
                        $children = $comment->get_children();
                        $author_id = $comment->user_id;
                        $date = $cyn_general->convert_date_for_human($comment->comment_ID, 'comment');
                        $content = $comment->comment_content;

        ?>

                        <div class="comment">

                            <div class="comment__author">
                                <?php $cyn_render->render_author($author_id, $date) ?>
                            </div>

                            <div class="comment__content">
                                <?= $content ?>

                            </div>

                            <div class="comment_actions">

                                <div class="comment__reply" data-comment-text="<?= $comment->comment_content ?>" data-comment-id="<?= $comment->comment_ID ?>">

                                    <span><?php 'reply' ?></span>
                                    <i class="icon-reply"></i>

                                </div>

                                <div class="comment_like">

                                </div>

                            </div>

                            <div class="comment__children">
                                <?php
                                if ($children !== null) {
                                    foreach ($children as $child) {
                                        render_single_comment($child);
                                    }
                                }
                                ?>
                            </div>

                        </div>

        <?php
                    }
                }


                if ($comment->comment_parent == 0) {
                    render_single_comment($comment);
                }
            }
        } else {
            _e('هیج دیدگاهی یافت نشد!', 'cyn-dm');
        }
        ?>
    </div>

</div>
<!-- </div> -->