$(document).on("click", ".delete-btn", function () {
    var id = $(this).data("userid");
    deleteUser(id);
});

function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
        $.ajax({
            url: "delete_user.php",
            type: "POST",
            data: { user_id: id },
            success: function (response) {
                if (response == "success") {
                    alert("User deleted successfully.");
                    location.reload();
                } else {
                    alert("Failed to delete user.");
                }
            },
            error: function () {
                alert("An error occurred. Please try again.");
            },
        });
    }
}
