const buttonPost = document.getElementById('button-post');
const postDialog = document.getElementById("post-dialog");

buttonPost.addEventListener('click', () => {
    postDialog.showModal();
    
})


postDialog.addEventListener('click', (e) =>{
    if(e.target === postDialog) {
        postDialog.close();
    }
});
