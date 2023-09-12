document.addEventListener("DOMContentLoaded", function () {
    const infoTab = document.querySelector(".info-tab");
    const commentsTab = document.querySelector(".comments-tab");
    const infoSection = document.getElementById("info-section");
    const commentsSection = document.getElementById("comments-section");
    const infoButton = document.getElementById("info-button");
    const commentsButton = document.getElementById("comments-button");

    infoTab.addEventListener("click", function () {
        infoSection.style.display = "block";
        commentsSection.style.display = "none";
        commentsSection.classList.remove("hide");
        commentsButton.classList.remove("active");
        infoButton.classList.add("active");
    });

    commentsTab.addEventListener("click", function () {
        commentsSection.style.display = "block";
        infoSection.style.display = "none";
        commentsSection.classList.remove("hide");
        infoButton.classList.remove("active");
        commentsButton.classList.add("active");
    });
});

function confirmDelete(recipeId) {
    if (confirm("Are you sure you want to delete this recipe?")) {
        const formData = new FormData();

        formData.append('recipeId', recipeId);
        formData.append('_method', 'DELETE');

        fetch("/recipe/delete", {
            method: "POST",
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    console.log("Recipe deleted successfully");
                    window.location.href = "/recipes";
                } else {
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

    alert('Photo saved!');
}

function favourite(recipeId) {
    const formData = new FormData();

    formData.append('recipeId', recipeId);

    fetch("/favourites", {
        method: "POST",
        body: formData
    })
        .then(response => {
            if (response.ok) {
                const favBtn = document.getElementById(`fav-btn`);
                const unfavBtn = document.getElementById(`unfav-btn`);

                if (favBtn && unfavBtn) {
                    favBtn.classList.add('hide');
                    favBtn.classList.remove('show');
                    unfavBtn.classList.remove('hide');
                    unfavBtn.classList.add('show')
                }
            }
        });
}

function unfavourite(recipeId) {
    const formData = new FormData();

    formData.append('recipeId', recipeId);
    formData.append('_method', 'DELETE');

    fetch("/favourites", {
        method: "POST",
        body: formData
    })
        .then(response => {
            if (response.ok) {
                const favBtn = document.getElementById(`fav-btn`);
                const unfavBtn = document.getElementById(`unfav-btn`);

                if (favBtn && unfavBtn) {
                    favBtn.classList.add('show');
                    favBtn.classList.remove('hide');
                    unfavBtn.classList.remove('show');
                    unfavBtn.classList.add('hide')
                }
            }
        });
}

