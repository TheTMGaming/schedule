let events = document.querySelectorAll('.event');
let body = document.querySelector('body');

for (let event of events)
{
    let popup = event.querySelector('.popup');
    let popupBody = popup.querySelector('.popup-body');
    let openButton = event.querySelector('.button-view');
    let closeButton = popup.querySelector('.popup-close')

    openButton.onclick = function ()
    {
        popup.classList.add('open');
        body.style = 'overflow-y: hidden';
    }

    closeButton.onclick = function ()
    {
        popup.classList.remove('open');
        body.style = 'overflow-y: scroll';
    }
}


