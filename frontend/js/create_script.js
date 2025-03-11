document.getElementById('profile').addEventListener('change', function(e) {
    const fileName = e.target.files.length > 0 ? e.target.files[0].name : 'No file chosen';
    document.getElementById('fileName').textContent = fileName;
});

document.getElementById('createAccountForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        return;
    }

    alert('Account created successfully!');
    // Here you can add further logic for form submission (e.g., sending data to a server)
    this.reset();
});