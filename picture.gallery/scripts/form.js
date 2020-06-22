'use strict';

console.log("Hello!!!");

const formElem = document.querySelector('#formSend');

formElem.addEventListener('submit',  async (e) => {
    e.preventDefault();
    const formData = new FormData(formElem);

    await fetch('index.php', {
        method: 'POST',
        body: formData,
    });
});