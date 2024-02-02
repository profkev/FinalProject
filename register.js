function submitForm() {
    var name = document.getElementById('name').value;
    var age = document.getElementById('age').value;
    var gender = document.getElementById('gender').value;
    var county = document.getElementById('county').value;
    var subcounty = document.getElementById('subcounty').value;
    var ward = document.getElementById('ward').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    // Perform password match validation
    if (password !== confirmPassword) {
        alert("Password and Confirm Password do not match.");
        return;
    }

    // You can perform further validation or send the data to a server here

    // For now, let's just log the data to the console
    console.log("Name: " + name);
    console.log("Age: " + age);
    console.log("Gender: " + gender);
    console.log("County: " + county);
    console.log("Subcounty: " + subcounty);
    console.log("Ward: " + ward);
    console.log("Password: " + password);

    // You can redirect the user or perform other actions as needed
}
