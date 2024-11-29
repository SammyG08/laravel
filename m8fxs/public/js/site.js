
let odds = document.getElementById("freeOdds");
let showBtn = document.getElementById("showBtn");
let showBballOdds = document.getElementById('showBballOdds');
let showPreviousTickets = document.getElementById('showPreviousTickets');

showBtn.addEventListener('click', function() {
    // odds.style.display = 'table';
    showBtn.dataset.count = Number(showBtn.dataset.count) + 1;
    console.log(showBtn.dataset.count);
    if (showBtn.dataset.count % 2 != 0) {
        // console.log('hi');
        showBtn.classList.replace("bi-caret-down-fill", "bi-caret-up-fill");
    } else {
        // console.log('hi');
        showBtn.classList.replace("bi-caret-up-fill", "bi-caret-down-fill");
    }
});
showBballOdds.addEventListener('click', function() {
    // odds.style.display = 'table';
    showBballOdds.dataset.count = Number(showBballOdds.dataset.count) + 1;
    // console.log(showBballOdds.dataset.count);
    if (showBballOdds.dataset.count % 2 != 0) {
        // console.log('hi');
        showBballOdds.classList.replace("bi-caret-down-fill", "bi-caret-up-fill");
    } else {
        // console.log('hi');
        showBballOdds.classList.replace("bi-caret-up-fill", "bi-caret-down-fill");
    }
});
showPreviousTickets.addEventListener('click', function() {
    // odds.style.display = 'table';
    showPreviousTickets.dataset.count = Number(showPreviousTickets.dataset.count) + 1;
    // console.log(showBballOdds.dataset.count);
    if (showPreviousTickets.dataset.count % 2 != 0) {
        // console.log('hi');
        showPreviousTickets.classList.replace("bi-caret-down-fill", "bi-caret-up-fill");
    } else {
        // console.log('hi');
        showPreviousTickets.classList.replace("bi-caret-up-fill", "bi-caret-down-fill");
    }
});


