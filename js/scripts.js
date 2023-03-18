$(document).on("click", ".suspend-btn", function () {
    var id = $(this).data("userid");
    suspendUser(id);
});

function suspendUser(id) {
    if (confirm("Are you sure you want to suspend this user?")) {
        $.ajax({
            url: "suspend_user.php",
            type: "POST",
            data: { id: id },
            success: function (response) {
                if (response == "success") {
                    alert("User suspended successfully.");
                    location.reload();
                } else {
                    alert("An error occurred. Please try again.");
                }
            },
            error: function () {
                alert("An error occurred. Please try again.");
            },
        });
    }
}
