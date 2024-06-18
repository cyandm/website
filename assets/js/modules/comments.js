

const commentOpener = document.getElementById('commentOpener');
const landPage = document.getElementById('land_page');
const commentList = document.getElementById('commentList');
const commentCloser = document.getElementById('commentCloser');
const addNewComment = document.getElementById('addNewComment');

if (!commentOpener) return;
if (!commentList) return;
if (!commentCloser) return;


commentOpener.addEventListener('click', (event) => {
    landPage.classList.add('blur-lg')
    commentList.classList.remove('hidden')
    console.log('ok shode')
})
commentCloser.addEventListener('click', (event) => {
    landPage.classList.remove('blur-lg')
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
                console.log(res.status)

            },

        })
    })
})


const setWarningComment = (commentsMessage) => {
        const span = document.createElement('span');
        span.classList.add('bg-alert-success');
        span.classList.add('p-4');
        span.classList.add('rounded-3xl');
        span.classList.add('mb-4');
        span.classList.add('block');
        span.innerText = 'کامنت شما با موفقیت ثبت شد و در انتظار تایید است';
        commentsMessage.appendChild(span);

};

const setSuccessComment = (commentsMessage) => {
        const span = document.createElement('span');
        span.classList.add('bg-alert-success');
        span.classList.add('p-4');
        span.classList.add('rounded-3xl');
        span.classList.add('mb-4');
        span.classList.add('block');
        span.innerText = 'کامنت شما با موفقیت ثبت شد';
        commentsMessage.appendChild(span);

};

const setErrorComment = (commentsMessage) => {
        const span = document.createElement('span');
        span.classList.add('bg-alert-error');
        span.classList.add('p-4');
        span.classList.add('rounded-3xl');
        span.classList.add('mb-4');
        span.classList.add('block');
        span.innerText = 'خطایی در ثبت کامنت به وجود آمده است!';
        commentsMessage.appendChild(span);

};

// window.setTimeout(() => { clearInterval(setWarningComment) }, 3000);
// window.setTimeout(() => { clearInterval(setSuccessComment) }, 3000);
// window.setTimeout(() => { clearInterval(setErrorComment) }, 3000);