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

function confirmDeleteRecipe(recipeId, admin = false) {
    if (confirm("Are you sure you want to delete this recipe?")) {
        const formData = new FormData();

        formData.append('id', recipeId);
        formData.append('_method', 'DELETE');

        fetch("/recipes", {
            method: "POST",
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    console.log("Recipe deleted successfully");
                    if (admin === false) {
                        window.location.href = "/recipes";
                    }
                    if (admin === true) {
                        window.location.href = "/home/admin/recipes"
                    }
                } else {
                    console.error("Failed to delete recipe");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    }
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

function changePhoto() {
    const changePhotoButton = document.getElementById("change-photo-button");
    const changePhotoSection = document.getElementById("change-photo-section");

    changePhotoButton.classList.add("hide");
    changePhotoSection.classList.remove("hide");
    changePhotoSection.classList.add("show");
}
