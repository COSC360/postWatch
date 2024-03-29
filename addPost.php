<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>addpost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <script src="https://kit.fontawesome.com/ff48066121.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        integrity="sha512-TNjCaZG8XT9Yi+a51/qH0PCv1nWnkz8oACaA0MwJ+IaZoydP8Cl9Ok40J51fEySWtTzI+1fTJnoh75AIrDMPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./css/styles.css" />
</head>

<body>
    <div class="modal modal-sheet d-block bg-secondary" tabindex="-1" role="dialog" id="modalSheet">
        <div class="modal-dialog my-5 py-5" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Add Post</h1>
                    <a href="userHomepage.php" class="text-decoration-none">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </a>
                </div>
                <form action="insert-posts.php" method="POST" enctype="multipart/form-data" id="postForm">
                    <div class="modal-body py-0">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" />

                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="3"
                            placeholder="Content"></textarea>

                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Upload Image" />
                        <p class="h6">Only add landscape images</p>

                    </div>

                    <div class="modal-footer flex-column border-top-0">
                        <button type="submit" class="btn btn-lg btn-primary w-100 mx-0 mb-2">
                            Post
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#postForm").submit(function (e) {
                e.preventDefault();
                var title = $("#title").val().trim();
                var content = $("#content").val().trim();
                var image = $("#image").val().trim();
                if (title == "" || content == "" || image == "") {
                    alert("Please fill out all fields.");
                } else {
                    this.submit();
                }
            });
        });
    </script>
</body>

</html>