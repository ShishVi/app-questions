
function changePaddingTop(paddinElem) {
    let buttons = document.getElementsByClassName('accordion-button');

    let arrButtons = Array.prototype.slice.call( buttons );

    arrButtons.forEach(function(item){
    let elementPaddingTop = parseInt(getComputedStyle(item).paddingTop);
    item.style.paddingTop = elementPaddingTop + paddinElem + 'px';});
    
}



