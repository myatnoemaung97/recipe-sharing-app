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
      const commentsSection = document.getElementById("comments");
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
          ${data.admin || comment.user_id === data.userSessionId ? `
              <div>
                <i class="pointer-cursor fa-regular fa-pen-to-square me-2" title="Edit comment" onclick="editComment(${comment.id})"></i>
                <i class="pointer-cursor fa-solid fa-trash" title="Delete commment" onclick="deleteComment(${comment.id}, ${data.recipeId})"></i>
              </div>`
            : data.admin || comment.user_id !== data.userSessionId ? `
              <a type="button" data-bs-toggle="modal" data-bs-target="#report-comment-modal${comment.id}">
                        <i class="fa-solid fa-flag text-black" title="Report to admin"></i>
              </a>
                      
              <div class="modal fade" id="report-comment-modal${comment.id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Comment Report</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <select class="form-select mb-2" id="comment-report-type${comment.id}">
                        <option value="" selected>Reason for report</option>
                        <option value="spam">Spam</option>
                        <option value="copyrights_infringement">Copyrights Infringement</option>
                        <option value="inappropriate_content">Inappropriate Content</option>
                        <option value="others">Others</option>
                      </select>
                      <textarea id="comment-report-description${comment.id}" class="form-control" placeholder="Provide additional information"></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-success" onclick="report(${comment.id}, 'comment', ${data.userSessionId}, ${comment.user_id})">Report</button>
                    </div>
                  </div>
                </div>
              </div>
              ` : ''}
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
  if (!confirm("Are you sure you want to delete?")) {
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
      const commentsSection = document.getElementById("comments");
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
          ${data.admin || comment.user_id === data.userSessionId ? `
              <div>
                <i class="pointer-cursor fa-regular fa-pen-to-square me-2" title="Edit comment" onclick="editComment(${comment.id})"></i>
                <i class="pointer-cursor fa-solid fa-trash" title="Delete commment" onclick="deleteComment(${comment.id}, ${data.recipeId})"></i>
              </div>`
            : data.admin || comment.user_id !== data.userSessionId ? `
              <a type="button" data-bs-toggle="modal" data-bs-target="#report-comment-modal${comment.id}">
                        <i class="fa-solid fa-flag text-black" title="Report to admin"></i>
              </a>
                      
              <div class="modal fade" id="report-comment-modal${comment.id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Comment Report</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <select class="form-select mb-2" id="comment-report-type${comment.id}">
                        <option value="" selected>Reason for report</option>
                        <option value="spam">Spam</option>
                        <option value="copyrights_infringement">Copyrights Infringement</option>
                        <option value="inappropriate_content">Inappropriate Content</option>
                        <option value="others">Others</option>
                      </select>
                      <textarea id="comment-report-description${comment.id}" class="form-control" placeholder="Provide additional information"></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-success" onclick="report(${comment.id}, 'comment', ${data.userSessionId}, ${comment.user_id})">Report</button>
                    </div>
                  </div>
                </div>
              </div>
              ` : ''}
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
      const commentsSection = document.getElementById("comments");
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
        ${data.admin || comment.user_id === data.userSessionId ? `
            <div>
              <i class="pointer-cursor fa-regular fa-pen-to-square me-2" title="Edit comment" onclick="editComment(${comment.id})"></i>
              <i class="pointer-cursor fa-solid fa-trash" title="Delete commment" onclick="deleteComment(${comment.id}, ${data.recipeId})"></i>
            </div>`
            : data.admin || comment.user_id !== data.userSessionId ? `
            <a type="button" data-bs-toggle="modal" data-bs-target="#report-comment-modal${comment.id}">
                      <i class="fa-solid fa-flag text-black" title="Report to admin"></i>
            </a>
                    
            <div class="modal fade" id="report-comment-modal${comment.id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Comment Report</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <select class="form-select mb-2" id="comment-report-type${comment.id}">
                      <option value="" selected>Reason for report</option>
                      <option value="spam">Spam</option>
                      <option value="copyrights_infringement">Copyrights Infringement</option>
                      <option value="inappropriate_content">Inappropriate Content</option>
                      <option value="others">Others</option>
                    </select>
                    <textarea id="comment-report-description${comment.id}" class="form-control" placeholder="Provide additional information"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="report(${comment.id}, 'comment', ${data.userSessionId}, ${comment.user_id})">Report</button>
                  </div>
                </div>
              </div>
            </div>
            ` : ''}
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