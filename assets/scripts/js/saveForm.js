// saveForm.js

async function saveFormData(event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get form data
    const formData = new FormData(document.getElementById("Kontaktformular"));

    // Prepare the data to send
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    // Send data to the server
const response = await fetch("/Bierengel.com/assets/scripts/php/saveToFile.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
});

    if (response.ok) {
        alert("Form data saved successfully!");
    } else {
        alert("Failed to save form data.");
    }
}
