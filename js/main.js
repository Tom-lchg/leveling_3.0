// Modal edit post
let modalEditPost = document.getElementById('modalEditPost');
let currentPostId = document.getElementById('currentPostId')

modalEditPost.addEventListener('click', () => {
    console.log(modalEditPost.tabIndex);
    window.history.pushState('bite', 'string', `?page=home&updatePost=true&postId=${currentPostId.value}`)
})

let closeModalEditPost = document.getElementById('closeModalEditPost')

closeModalEditPost.addEventListener('click', () => {
    window.history.pushState('bite', 'string', '?page=home')
})
// Modal edit post