const buttonPost = document.getElementById('button-email');
const postDialog = document.getElementById("email-dialog");

buttonPost.addEventListener('click', () => {
    postDialog.showModal();
    
})


postDialog.addEventListener('click', (e) =>{
    if(e.target === postDialog) {
        postDialog.close();
    }
});
