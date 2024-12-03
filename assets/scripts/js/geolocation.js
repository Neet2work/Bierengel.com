// Check if Geolocation is available in the browser
if ("geolocation" in navigator) {
    // Get the current position of the user
    navigator.geolocation.getCurrentPosition(
        function (position) {
            // Success callback
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Output the latitude and longitude
            document.write("Latitude: " + latitude + ", Longitude: " + longitude);
        },
        function (error) {
            // Error callback
            console.error("Error occurred while retrieving location:", error.message);
            document.write("Unable to retrieve location. Error: " + error.message);
        }
    );
} else {
    // Geolocation is not available
    document.write("Geolocation is not supported by this browser.");
}
