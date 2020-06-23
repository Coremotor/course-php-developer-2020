'use strict';

console.log("Hello!!!");

const formElem = document.querySelector('#formSend');

formElem.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(formElem);
    console.log(typeof(formData));
    console.log(formData);

    await fetch('fetch.php', {
        method: 'POST',
        body: formData,
    });
});