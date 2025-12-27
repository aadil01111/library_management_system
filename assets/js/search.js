document.getElementById('search').addEventListener('keyup', function () {
    fetch('/library_management_system/public/search.php?q=' + this.value)
        .then(response => response.text())
        .then(data => {
            document.getElementById('results').innerHTML = data;
        });
});
