<<<<<<< HEAD
document.getElementById("search").addEventListener("keyup", function () {
    fetch("/library_management_system/public/search.php?q=" + this.value)
        .then(r => r.text())
        .then(d => document.getElementById("results").innerHTML = d);
=======
document.getElementById('search').addEventListener('keyup', function () {
    fetch('/library_management_system/public/search.php?q=' + this.value)
        .then(response => response.text())
        .then(data => {
            document.getElementById('results').innerHTML = data;
        });
>>>>>>> origin/main
});
