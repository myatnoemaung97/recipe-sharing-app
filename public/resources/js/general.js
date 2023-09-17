function confirmDeleteProfile(id, admin = false) {
  if (confirm("Are you sure you want to delete this profile?")) {
    const formData = new FormData();

    formData.append('id', id);
    formData.append('_method', 'DELETE');
  
    fetch("/profiles", {
        method: "POST",
        body: formData
    })
        .then(response => {
            if (response.ok) {
                console.log("Profile deleted successfully");
                if (admin === false) {
                  window.location.href = "/";
                }    
                if (admin === true) {
                  window.location.href = "/home/admin/users"
                }
            } else {
                console.error("Failed to delete profile");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
}
}

function turnPage(page) {
  const recipesSection = document.getElementById("recipes-section");
  recipesSection.innerHTML = '';

  const recipesDiv = document.createElement('div');
  recipesDiv.innerHTML = `
  <?php for ($i = 9; $i <= 10; $i++) : ?>
            <div class="col-12 col-md-4 col-lg-3">
              <a class="no-underline" href="/recipe?id=<?= $recipes[$i]['id'] ?>">
                <div class="recipe-card card mb-3" style="background-color: #ffffcc;">
                  <img src='<?= $recipes[$i]['image'] ?>' class="card-img-top bg-white" alt="recipe" style="height: 210px ;">
                  <div class="card-body lh-1">
                    <p class="heading card-title fs-4 fw-semibold"><?= $recipes[$i]['name'] ?></p>
                    <div class="d-flex flex-row justify-content-between mt-3">
                      <div class="d-flex flex-row gap-2">
                        <p><i class="fa-regular fa-clock me-1"></i><?= htmlspecialchars($recipes[$i]['time']) ?> mins</p>
                        <p><i class="fa-solid fa-trophy me-1"></i><?= htmlspecialchars(intToDifficulty($recipes[$i]['difficulty'])) ?></p>
                      </div>
                      <div>
                        <?php if (isset($recipes[$i]['rating'])) : ?>
                          <?php for ($j = 1; $j <= $recipes[$j]['rating']; $j++) : ?>
                            <i class="star fa-solid fa-star"></i>
                          <?php endfor; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <?php endfor; ?>
  `;

  recipesSection.append(recipesDiv);


}