<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>addpost</title>
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap.min.css" />

    <script src="https://kit.fontawesome.com/ff48066121.js" crossorigin="anonymous"></script>
    <script src="./css/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/styles.css" />
</head>

<div class="modal modal-sheet d-block bg-secondary" tabindex="-1" role="dialog" id="modalSheet">
    <div class="modal-dialog my-5 py-5" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-5">Add Post</h1>
                <a href="postsUser.php" class="text-decoration-none">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </a>
            </div>
            <div class="modal-body py-0">
                <p>
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Title" />

                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" rows="3" placeholder="Content"></textarea>
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" placeholder="Upload Image" />
                </p>
            </div>
            <div class="modal-footer flex-column border-top-0">
                <button type="button" class="btn btn-lg btn-primary w-100 mx-0 mb-2">
                    Post
                </button>
                <button type="button" class="btn btn-lg btn-light w-100 mx-0" data-bs-dismiss="modal">
                    <a href="postsUser.php" class="text-decoration-none"> Close </a>
                </button>
            </div>
        </div>
    </div>
</div>

</html>