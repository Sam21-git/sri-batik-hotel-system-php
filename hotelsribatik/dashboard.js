window.addEventListener('DOMContentLoaded', function() {
    var tableRows = document.querySelectorAll('#checkoutSoon table tr');
    var checkoutSoon = document.getElementById('checkoutSoon');

    if (tableRows.length < 5) {
        checkoutSoon.style.height = '400px';
    } else {
        checkoutSoon.style.height = 'fit-content';
    }
});