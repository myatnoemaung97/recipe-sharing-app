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