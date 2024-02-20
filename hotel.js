// for loading screen// > 
const loader = document.querySelector(".box");
window.addEventListener('load', () =>{
    loader.style.opacity = '0';

    setTimeout(()=>{
        loader.style.display = 'none';
    },1000);
});
// ---infinity corosoul

const scrollers = document.querySelectorAll('.scroller');

function addAnimation() {
    scrollers.forEach((scroller) => {
        scroller.setAttribute("data-animated", true);

        const scrollerInner = scroller.querySelector('.scroller_inner');
        const scrollerInnerContent = Array.from(scrollerInner.children);

        scrollerInnerContent.forEach(item => {
            const duplicatedItem = item.cloneNode(true); // Fix typo: 'clloneNode' to 'cloneNode'

            duplicatedItem.setAttribute('aria-hidden', true);

            scrollerInner.appendChild(duplicatedItem);
        });
    });
}
// ----------------this code impact on infinity corosoul 
// addAnimation();
// // for navbar--------
// window.onscroll = function() {
//     var navbar = document.querySelector(".navbar");h
//     var navbarLinks = document.querySelectorAll(".navbar .nav-link");
//     if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
//       navbar.classList.remove("bg-transparent");
//       navbarLinks.forEach(function(link) {
//       div.style.color = "black";
//       });
//     } else {
//       navbar.classList.add("bg-transparent");
//       navbarLinks.forEach(function(link) {
//         div.style.color = "black";
//       });
//     }
//   };

  window.addEventListener('scroll', () =>{
    const navbar = document.querySelector('header');
    if (window.scrollY > 0) {
      navbar.classList.add('header-scrolled');
    } 
    else {
      navbar.classList.remove('header-scrolled');
    }
  });
  
  