function resolve(authorId, contentId, contentType, action) {
  if (contentType === 'recipe' && action === 'ban') {
    formData = new FormData();
    formData.append('authorId', authorId);

    fetch("/bans", {
      method: "POST",
      body: formData
    })
      .then(() => {
        window.location.href = "/home/admin/reports";
      });
  }
  else if (contentType === 'recipe' && action === 'delete') {
    formData = new FormData();
    formData.append('contentId', contentId);
    formData.append('_method', "DELETE");

    fetch("/recipes", {
      method: "POST",
      body: formData
    })
      .then(() => {
        window.location.href = "/home/admin/reports";
      });
  }
}