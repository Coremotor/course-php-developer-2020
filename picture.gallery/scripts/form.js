'use strict';

console.log("Hello!!!");

if (document.getElementById('formSend')) {
    const formElem = document.getElementById('formSend');

    formElem.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(formElem);

        formData.append('uploadBtn', 'Отправить');

        await fetch('/index.php', {
            method: 'POST',
            body: formData,
        });
    });
}


if (document.getElementById('form-gallery')) {
    const formGalleryElem = document.getElementById('form-gallery');

    formGalleryElem.addEventListener('submit', async (e) => {
        e.preventDefault();
        console.log('del');
        const formDataCheckBox = new FormData(formGalleryElem);

        for (let pair of formDataCheckBox.entries()) {
            console.log(pair[0]+ ', ' + pair[1]);
        }

        formDataCheckBox.append('deleteListCheckbox', 'pushBtn');
        console.log(formDataCheckBox.getAll('deleteListCheckbox[]'));

        await fetch('/lib.php', {
            method: 'POST',
            body: formDataCheckBox,
        });
    });
}




