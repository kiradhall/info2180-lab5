document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("lookup");
    const countrySearch = document.getElementById('country');
    const result = document.getElementById('result');

    btn.addEventListener("click", function(event) {
        event.preventDefault();

        const country = countrySearch.value;

        let url = 'world.php';
        if (country !== '') {
            url += '?country=' + encodeURIComponent(country);
        }

        console.log(url)

        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    result.innerHTML = xhr.responseText;
                } else {
                    result.innerHTML = 'Error';
                }
            }
        };

        xhr.open('GET', url);
        xhr.send();
    });
});