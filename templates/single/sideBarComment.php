<?php
// global $cyn_render, $cyn_general;

$id = isset($args['id']) ? $args['id'] : 0;
$post_date = convert_date_for_human($id);
$like_count = get_comment_meta($id, 'like_count', true);



$postsUserLiked = isset($_COOKIE['postsUserLiked']) ? $_COOKIE['postsUserLiked'] : '{}';
$isUserLiked = is_user_likes_this_post($id, $postsUserLiked) ? 'true' : 'false';


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



<div data-active="false" class="comments__list bg-black-1 hidden z-50 h-lvh p-8 fixed top-0 right-0 bottom-0 md:min-w-[40%]" id="commentList">
    <br>
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
    <div class="comments__add-new__massage" id="commentsMessage">

    </div>
    <div class="comments__add-new border-b-[1px] border-gray-3">
        <form action="#" id="addNewComment">
            <div id="parentDiv" class="comments__add-new__parent" data-active="false">
                <div>
                    <span class="comments__add-new__parent-text">
                        <span id="parentText"></span>
                    </span>
                </div>
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
                    <textarea name="content" required oninvalid="this.setCustomValidity('<?php _e('دیدگاه فیلد ضروری است', 'cyn-dm') ?>')" 
                    id="content" placeholder="<?php _e('دیدگاهتان را وارد کنید', 'cyn-dm') ?>"
                     class="py-2 px-4 pr-16 border-[1px] rounded-3xl bg-black-2 w-full my-2 border-gray-3 min-h-[120px]"></textarea>
                </label>
            </div>
            <input type="hidden" id="parentID" name="parent-id" value="">
            <input type="hidden" name="post-id" value="<?= $id ?>">
            <div class="text-start mb-8">
                <button class="btn border-[1px] rounded-full border-[#1dbacf]  px-4 py-2" size="small" variant="primary" type="submit" value="">
                    <i class="icon-send"></i>
                    <?= __('ارسال دیدگاه', 'cyn-dm') ?>
                </button>
            </div>
        </form>
    </div>






    <div class="comments__list__wrapper p-4 border-r-4 border-r-blue-2 relative  overflow-scroll max-h-[64rem] whitespace-nowrap overflow-auto scrollbar-hide">
        <?php if ($comments) : ?>
            <?php foreach ($comments as $comment_id => $comment) : ?>
                <div class="comment mb-8 border-b-[1px] border-gray-3 pb-4">
                    <div class="flex justify-start gap-4 mb-4">
                        <img src="<?php echo get_stylesheet_directory_uri() . './assets/imgs/user.png' ?>" class="w-[50px] h-[50px] rounded-full object-cover" alt="">
                        <div>
                            <div>
                                <?php echo $comment->comment_author ?>
                            </div>
                            <div class="text-gray-1">
                                <p>5 ماه پیش </p>
                            </div>
                        </div>

                    </div>
                    <div class="text-gray-2">
                        <?php echo $comment->comment_content ?>
                    </div>
                    <div class="flex justify-between mt-2 mb-4">
                        <div class="flex text-blue-1">
                            پاسخ
                            <svg class="icon">
                                <use href="#icon-Reply,-Share,-Circle" />
                            </svg>
                        </div>
                        <div class="flex justify-between">
                            <?php
                            $like = get_comment_meta($comment->comment_id, 'users who liked this comment', true);
                            echo $like;
                                                        ?>
                            <span class="comment_counter">
                             
                                0
                            </span>
                            <svg class="icon comment_like" data-comment-id="<?= $comment_id ?>">>
                                <use href="#icon-heart" />
                            </svg>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif ?>
    </div>
</div>