

const commentOpener = document.getElementById('commentOpener');
const landPage = document.getElementById('land_page');
const commentList = document.getElementById('commentList');
const commentCloser = document.getElementById('commentCloser');
const footer = document.getElementsByName('footer');
const addNewComment = document.getElementById('addNewComment');

if (!commentOpener) return;
if (!commentList) return;
if (!commentCloser) return;
if (!footer) return;


commentOpener.addEventListener('click', (event) => {
    landPage.classList.add('blur-lg')
    // footer.classList.add('blur-lg')
    commentList.classList.remove('hidden')
    console.log('ok shode')
})
commentCloser.addEventListener('click', (event) => {
    landPage.classList.remove('blur-lg')
    // footer.classList.remove('blur-lg')
    commentList.classList.add('hidden')
    console.log('ok shode')
})


addNewComment.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(e.currentTarget, e.submitter);
    // console.log(formData)

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
                
                console.log(res)
               
            },

            // error: (error) => {
            //     // console.log(error); 
            //     // if (res?.commentStatus === 0) {
            //         // setWarningComment(commentsMessage);
            //         // return;
            //     // }
            //     // if (res?.commentStatus === 1) {
            //         setSuccessComment(commentsMessage);
            //         return;
            //     // }

            //     // setErrorComment(commentsMessage);
            // }

        })
    })
})


const setWarningComment = (commentsMessage) => {
    const span = document.createElement('span');
    span.classList.add('bg-amber-200');
    span.innerText = 'کامنت شما با موفقیت ثبت شد و در انتظار تایید است';
    commentsMessage.appendChild(span);
};

const setSuccessComment = (commentsMessage) => {
    const span = document.createElement('span');
    span.classList.add('bg-green-300');
    span.innerText = 'کامنت شما با موفقیت ثبت شد';
    commentsMessage.appendChild(span);
};

const setErrorComment = (commentsMessage) => {
    const span = document.createElement('span');
    span.classList.add('bg-red-400');
    span.innerText = 'خطایی در ثبت کامنت به وجود آمده است!';
    commentsMessage.appendChild(span);
};