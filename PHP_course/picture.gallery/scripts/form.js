'use strict';

console.log("Hello!!!");

const messagesBlock = document.getElementById('messages');

if (document.getElementById('formSend')) {
    const formElem = document.getElementById('formSend');

    formElem.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(formElem);

        formData.append('uploadBtn', 'Отправить');

        fetch('/lib.php', {
            method: 'POST',
            body: formData,
        })
            .then(r => r.text())
            .then(t => {
                console.log('TEXT', t);
                if (t === 'Файлы отправлены') {
                    messagesBlock.classList.remove('uk-alert-danger');
                    messagesBlock.classList.add('uk-alert-success');
                    messagesBlock.textContent = t;
                } else {
                    messagesBlock.classList.remove('uk-alert-success');
                    messagesBlock.classList.add('uk-alert-danger');
                    messagesBlock.textContent = t;
                }
            })
            .catch(e => console.log('ERROR', e))
    });
}


if (document.getElementById('form-gallery')) {

    const formGalleryElem = document.getElementById('form-gallery');

    formGalleryElem.addEventListener('submit', (e) => {
        e.preventDefault();

        const formDataCheckBox = new FormData(formGalleryElem);

        formDataCheckBox.append('deleteBtn', 'pushBtn');

        fetch('/lib.php', {
            method: 'POST',
            body: formDataCheckBox,
        })
            .then(r => r.text())
            .then(t => console.log(t))
            .then(() => getCheckedCheckBoxes())
            .catch(e => console.log(e));
    });
}


function getCheckedCheckBoxes() {
    const selectedCheckBoxes = document.querySelectorAll('input.img-cb:checked');

    selectedCheckBoxes.forEach((node) => {
        let parentNode = node.parentNode;
        parentNode.remove();
    })
}






