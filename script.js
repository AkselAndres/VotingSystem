document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Make AJAX request to check_login.php
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'check_login.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    window.location.href = 'dashboard.php'; // Redirect to dashboard
                } else {
                    document.getElementById('errorMessage').innerText = 'Invalid username or password';
                }
            } else {
                console.error('AJAX request failed');
            }
        }
    };
    xhr.send('username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password));
});

