let editing = [];

function comment(recipeId) {
  const commentInput = document.getElementById("comment-input");

  const formData = new FormData();
  formData.append('recipeId', recipeId);
  formData.append('comment', commentInput.value);

  fetch("/comments", {
    method: "POST",
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      const commentsSection = document.getElementById("comments-section");
      commentsSection.innerHTML = '';

      data.comments.forEach(comment => {
        const commentDiv = document.createElement("div");
        commentDiv.innerHTML = `
        <div class="d-flex flex-row justify-content-between">
          <div class="lh-1">
              <p class="fw-bold text-success" style="font-size: 18px;">${comment.user_name}</p>
              <p style="margin-top: -10px; font-size: 12px; color: rgba(0, 0, 0, 0.7);">${comment.created}</p>
              <p style="font-size: 14px;">${comment.comment}</p>
          </div>
          ${comment.user_id === data.userSessionId ? `
              <div>
                <i class="pointer-cursor fa-regular fa-pen-to-square me-2" title="Edit comment" onclick="editComment(${comment.id})"></i>
                <i class="pointer-cursor fa-solid fa-trash" title="Delete commment" onclick="deleteComment(${comment.id}, ${data.recipeId})"></i>
              </div>` : ''}
        </div>
        <div id="comment-edit${comment.id}" class="hide">
          <textarea id="edit-input${comment.id}" class="form-control mb-2" placeholder="Leave a comment about the recipe...">${comment.comment}</textarea>
          <button class="btn btn-sm btn-success" onclick="updateComment(${comment.id}, ${data.recipeId})">Save</button>
        </div>
        <hr>
        `;

        commentsSection.appendChild(commentDiv);
      })

      const element = document.getElementById("comment-count");
      element.textContent = data.commentCount;
    });

  commentInput.value = "";
}

function deleteComment(commentId, recipeId) {
  if (! confirm("Are you sure you want to delete?")) {
    return;
  }
  
  const formData = new FormData();
  formData.append('id', commentId);
  formData.append('recipeId', recipeId);
  formData.append('_method', "DELETE");

  fetch("/comments", {
    method: "POST",
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      const commentsSection = document.getElementById("comments-section");
      commentsSection.innerHTML = "";

      data.comments.forEach(comment => {
        const commentDiv = document.createElement("div");
        commentDiv.innerHTML = `
        <div class="d-flex flex-row justify-content-between">
          <div class="lh-1">
              <p class="fw-bold text-success" style="font-size: 18px;">${comment.user_name}</p>
              <p style="margin-top: -10px; font-size: 12px; color: rgba(0, 0, 0, 0.7);">${comment.created}</p>
              <p style="font-size: 14px;">${comment.comment}</p>
          </div>
          ${comment.user_id === data.userSessionId ? `
              <div>
                <i class="pointer-cursor fa-regular fa-pen-to-square me-2" title="Edit comment" onclick="editComment(${comment.id})"></i>
                <i class="pointer-cursor fa-solid fa-trash" title="Delete commment" onclick="deleteComment(${comment.id}, ${data.recipeId})"></i>
              </div>` : ''}
        </div>
        <div id="comment-edit${comment.id}" class="hide">
          <textarea id="edit-input${comment.id}" class="form-control mb-2" placeholder="Leave a comment about the recipe...">${comment.comment}</textarea>
          <button class="btn btn-sm btn-success" onclick="updateComment(${comment.id}, ${data.recipeId})">Save</button>
        </div>
        <hr>
        `;

        commentsSection.appendChild(commentDiv);
      });

      const element = document.getElementById("comment-count");
      element.textContent = data.commentCount;
    });
}

function editComment(id) {
  const element = document.getElementById(`comment-edit${id}`);

  if (editing.includes(id)) {
    element.classList.add("hide");
    editing = editing.filter((element) => element !== id);
    return;
  }

  element.classList.remove("hide");
  editing.push(id);
}

function updateComment(id, recipeId) {
  const element = document.getElementById(`edit-input${id}`);
  const comment = element.value;

  const formData = new FormData();
  formData.append("comment", comment);
  formData.append("id", id);
  formData.append("recipeId", recipeId);
  formData.append("_method", "PATCH")

  fetch("/comment", {
    method: "POST",
    body: formData
  }).then(response => response.json())
    .then(data => {
      const commentsSection = document.getElementById("comments-section");
      commentsSection.innerHTML = "";

      data.comments.forEach(comment => {
        const commentDiv = document.createElement("div");
        commentDiv.innerHTML = `
        <div class="d-flex flex-row justify-content-between">
        <div class="lh-1">
            <p class="fw-bold text-success" style="font-size: 18px;">${comment.user_name}</p>
            <p style="margin-top: -10px; font-size: 12px; color: rgba(0, 0, 0, 0.7);">${comment.created}</p>
            <p style="font-size: 14px;">${comment.comment}</p>
        </div>
        ${comment.user_id === data.userSessionId ? `
            <div>
              <i class="pointer-cursor fa-regular fa-pen-to-square me-2" title="Edit comment" onclick="editComment(${comment.id})"></i>
              <i class="pointer-cursor fa-solid fa-trash" title="Delete commment" onclick="deleteComment(${comment.id}, ${data.recipeId})"></i>
            </div>` : ''}
      </div>
      <div id="comment-edit${comment.id}" class="hide">
        <textarea id="edit-input${comment.id}" class="form-control mb-2" placeholder="Leave a comment about the recipe...">${comment.comment}</textarea>
        <button class="btn btn-sm btn-success" onclick="updateComment(${comment.id}, ${data.recipeId})">Save</button>
      </div>
      <hr>
      `;

        commentsSection.appendChild(commentDiv);
      });

      const element = document.getElementById("comment-count");
      element.textContent = data.commentCount;
    });
}