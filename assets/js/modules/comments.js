

const commentOpener = document.getElementById('commentOpener');
const landPage = document.getElementById('land_page');
const commentList = document.getElementById('commentList');
const commentCloser = document.getElementById('commentCloser');
const addNewComment = document.getElementById('addNewComment');
const commentsMessage = document.getElementById('commentsMessage');
const overlay = document.getElementById('overlay');



if (!commentOpener) return;
if (!commentList) return;
if (!commentCloser) return;


commentOpener.addEventListener('click', (event) => {
    // landPage.classList.add('blur-lg')
    commentList.classList.remove('hidden')
    // console.log('ok shode')
    overlay.classList.remove('hidden')
    overlay.classList.add('block')
})
commentCloser.addEventListener('click', (event) => {
    overlay.classList.add('hidden')
    overlay.classList.remove('block')
    commentList.classList.add('hidden')
})


addNewComment.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(e.currentTarget, e.submitter);

    jQuery(($) => {
        $.ajax({
            type: 'POST',
            url: restDetails.url + 'cynApi/v1/comments',
            data: formData,
            dataType: "json",
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: (xhr) => {
                xhr.setRequestHeader("X-WP-Nonce", restDetails.nonce);
            },
            success: (res) => {
                if (res.status == true) {
                    console.log(res.status)
                    setSuccessComment(commentsMessage);
                    return;
                }

            },

        })
    })
})



const setSuccessComment = (commentsMessage) => {
    const span = document.createElement('span');
    span.classList.add('comment_alert');
    span.classList.add('bg-alert-success');
    span.classList.add('p-4');
    span.classList.add('rounded-3xl');
    span.classList.add('mb-4');
    span.classList.add('block');
    span.innerText = 'کامنت شما با موفقیت ثبت شد و منتظر تایید ادمین است.';
    commentsMessage.appendChild(span);

};
const fadeAlert = () => {
    document.querySelector('.comment_alert').classList.remove('block')
    document.querySelector('.comment_alert').classList.add('hidden')
}
setTimeout(fadeAlert, 5000);



// window.setTimeout(() => { clearInterval(setWarningComment) }, 3000);
// window.setTimeout(() => { clearInterval(setSuccessComment) }, 3000);
// window.setTimeout(() => { clearInterval(setErrorComment) }, 3000);



///////////////////////////////////////////////////like comment
window.onload = (event) => {
    const userId = Math.round(Math.random() * 100)
    document.cookie = 'usrId=' + JSON.stringify(userId);
};


const commentCounter = document.querySelector('.comment_counter')
const commentLikeIcon = document.querySelectorAll('.comment_like')


commentLikeIcon?.forEach((item) => {
    var isUserLiked = true
    item.addEventListener('click', (e) => {
        let comment_id = item.getAttribute("data-comment-id");


        if (isUserLiked) {
            item.style.color = "red";

            jQuery(($) => {

                $.ajax({
                    type: 'GET',
                    url: restDetails.url + 'cynApi/v1/like',
                    dataType: "json",
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: {comment_id},

                    success: (res) => {
                        e.target.previousElementSibling.innerHTML = +(e.target.previousElementSibling.innerHTML) + 1

                    },

                });
            });
            isUserLiked = false;
        } else {
            item.style.color = "white";

            jQuery(($) => {
                $.ajax({
                    type: 'GET',
                    url: restDetails.url + 'cynApi/v1/like',
                    dataType: "json",
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: comment_id,

                    success: (res) => { 
                        e.target.previousElementSibling.innerHTML = +(e.target.previousElementSibling.innerHTML) - 1
                    },
                });
            });
            isUserLiked = true;
        }
    })
})
