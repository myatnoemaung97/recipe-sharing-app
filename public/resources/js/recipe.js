document.addEventListener("DOMContentLoaded", function () {
  const infoTab = document.querySelector(".info-tab");
  const commentsTab = document.querySelector(".comments-tab");
  const infoSection = document.getElementById("info-section");
  const commentsSection = document.getElementById("comments-section");

  infoTab.addEventListener("click", function () {
    infoTab.classList.add("active");
    commentsTab.classList.remove("active");
    infoSection.style.display = "block";
    commentsSection.style.display = "none";
  });

  commentsTab.addEventListener("click", function () {
    commentsTab.classList.add("active");
    infoTab.classList.remove("active");
    commentsSection.style.display = "block";
    infoSection.style.display = "none";
  });
});

function confirmDelete(recipeId) {
  if (confirm("Are you sure you want to delete this recipe?")) {
    // Create a FormData object to send data with the POST request (if needed)
    const formData = new FormData();

    // Add any data you need to send with the POST request using formData.append()
    // For example, you might want to send the recipe ID
    formData.append('recipeId', recipeId);
    formData.append('_method', 'DELETE');

    console.log("hi");

    fetch("/recipe/delete", {
      method: "POST",
      body: formData
    })
      .then(response => {
        if (response.ok) {
          // Successful response, you can redirect or handle it as needed
          console.log("Recipe deleted successfully");
          window.location.href = "/recipes";
        } else {
          // Handle errors or show an error message
          console.error("Failed to delete recipe");
        }
      })
      .catch(error => {
        console.error("Error:", error);
      });
  }
}

function updateImagePreview() {
  const input = document.getElementById('image-upload');
  const image = document.getElementById('recipe-image');
  const saveButton = document.getElementById('save-photo-button');

  if (input.files && input.files[0]) {
    const reader = new FileReader();

    reader.onload = function (e) {
      image.src = e.target.result;
      // Show the "Save Photo" button
      saveButton.classList.remove('d-none');
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function savePhoto() {
  // Add logic here to save the photo (e.g., make a POST request to the server)
  // You can also hide the "Save Photo" button after saving if needed
  alert('Photo saved!');
}