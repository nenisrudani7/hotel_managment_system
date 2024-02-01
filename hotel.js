// > 
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

addAnimation();
