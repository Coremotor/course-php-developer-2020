'use strict';

console.log("Hello!!!");

if (document.getElementById('formSend')) {
    const formElem = document.getElementById('formSend');

    formElem.addEventListener('submit',  (e) => {
        e.preventDefault();
        const formData = new FormData(formElem);

        formData.append('uploadBtn', 'Отправить');

        fetch('/index.php', {
            method: 'POST',
            body: formData,
        })
            .then(r => r.text())
            .then(t => console.log('TEXT', t))
            .catch(e => console.log('ERROR', e));
    });
}


if (document.getElementById('form-gallery')) {
    const formGalleryElem = document.getElementById('form-gallery');

    formGalleryElem.addEventListener('submit', (e) => {
        e.preventDefault();
        console.log('del');
        const formDataCheckBox = new FormData(formGalleryElem);

        formDataCheckBox.append('deleteListCheckbox', 'pushBtn');

        console.log(formDataCheckBox.getAll('deleteListCheckbox[]'))

        fetch('/lib.php', {
            method: 'POST',
            body: formDataCheckBox,
        })
            .then(r => r.text())
            .then(t => console.log(t))
            .catch(e => console.log(e));
    });
}




