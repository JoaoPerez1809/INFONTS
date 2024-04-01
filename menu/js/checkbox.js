document.addEventListener('DOMContentLoaded', function() {
    var selectElement = document.getElementById('categories');

    selectElement.addEventListener('mousedown', function(event) {
        event.preventDefault();

        var option = event.target;

        if (option.tagName === 'OPTION') {
            option.selected = !option.selected;
        }
    });
});