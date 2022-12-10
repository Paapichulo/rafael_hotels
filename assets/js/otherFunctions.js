
// DASHBOARD TOGGLE BAR
const toggleBtnOpen = document.querySelector('.toggle-btn-open');
const toggleBtnClose = document.querySelector('.toggle-btn-close');
const sideBar = document.querySelector('.left-sidebar');

toggleBtnOpen.addEventListener('click', ()=>{
    sideBar.classList.add('display-side');
});

toggleBtnClose.addEventListener('click', ()=>{
    sideBar.classList.remove('display-side');
    sideBar.style.transition = '1s ease';
});




// BOOKING STATUS COLOR CHANGER
const spanTag = document.querySelectorAll('#span');

    spanTag.forEach(span =>{
        span.style.fontWeight = '700';
        span.style.fontFamily = 'var(--ff-cursive)'
        if(span.textContent == 'Successful'){
            span.style.color = 'var(--green)';
        }else if(span.textContent == 'Pending'){
            span.style.color = 'var(--grey)';
        }else if(span.textContent == 'Canceled'){
            span.style.color = 'var(--red)';
        }else{
            span.style.color = 'var(--dark)';
        }
    });

    



// BOOKED ROOM SETTINGS
const dropDownBtn = document.querySelector('.dropdown-btn');
const dropDownMenu = document.querySelector('.dropdown-menu');

dropDownBtn.onclick = ()=>{
    dropDownMenu.classList.toggle('active')
};



