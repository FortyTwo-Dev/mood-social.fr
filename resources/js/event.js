const buttonEvent = document.getElementById('button-event');
const eventDialog = document.getElementById("event-dialog");

buttonEvent.addEventListener('click', () => {
    eventDialog.showModal();
    
})

eventDialog.addEventListener('click', (e) =>{
    if(e.target === eventDialog) {
        eventDialog.close();
    }
});
