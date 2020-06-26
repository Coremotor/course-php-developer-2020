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
                    messagesBlock.classList.remove('error');
                    messagesBlock.classList.add('done');
                    messagesBlock.textContent = t;
                } else {
                    messagesBlock.classList.remove('done');
                    messagesBlock.classList.add('error');
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
            .catch(e => console.log(e));
    });
}




