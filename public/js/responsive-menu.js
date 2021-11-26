document.querySelector('[data-toggle-hide]').addEventListener('click', function() {
    document
        .querySelector(this.dataset.toggleHide)
        .classList
        .toggle('hidden');
});
