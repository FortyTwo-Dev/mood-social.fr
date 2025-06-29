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

let pressTimers = [];

const shakeClasses = [
    'shake-element-1',
    'shake-element-2',
    'shake-element-3',
    'shake-element-4',
    'shake-element-5'
];

const shakeIntervals = [3000, 5000, 7000, 9000, 11000];

buttonPost.addEventListener("mousedown", () => {
    pressTimers.forEach(timer => clearTimeout(timer));
    pressTimers = [];

    shakeIntervals.forEach((interval, index) => {
        pressTimers.push(setTimeout(() => {
            if (index > 0) {
                buttonPost.classList.remove(shakeClasses[index - 1]);
            }
            buttonPost.classList.add(shakeClasses[index]);
        }, interval));
    });

    pressTimers.push(setTimeout(() => {
        buttonPost.classList.remove(shakeClasses[shakeClasses.length - 1]);
        buttonPost.classList.add('rgb-element');
    }, 14000));
});

buttonPost.addEventListener("mouseup", () => {
    pressTimers.forEach(timer => clearTimeout(timer));
    pressTimers = [];

    shakeClasses.forEach(shakeClass => {
        buttonPost.classList.remove(shakeClass);
    });
});