const buttonPost = document.getElementById('button-post');
const postDialog = document.getElementById("post-dialog");

buttonPost.addEventListener('click', () => {
    postDialog.showModal();
    
})

// postDialog.close();