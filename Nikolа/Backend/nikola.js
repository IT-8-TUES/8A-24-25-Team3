let mybutton = document.getElementById("scroll-to-top");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

const btnElList = document.querySelectorAll('.emoji');

btnElList.forEach(btnEl => {
  btnEl.addEventListener('click', () => {
    document.querySelector('.special')?.classList.remove('special');
    btnEl.classList.add('special');
  });
});