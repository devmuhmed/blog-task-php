<div class="form-popup" id="editForm">
    <form method="POST" action="post_controler.php" class="form-container">
        <h1>Edit your Post</h1>
        <label for="post"><b>Post</b></label>
        <textarea class="form-control" name="body" id="EdittedPost" style="height: 100px"></textarea>
        <label for="image"><b>Image</b></label>
        <input type="file" name="img">
        <button type="submit" class="btn" name="EdittedPostImg">Edit</button>
        <button type="button" class="btn cancel" onclick="closeEditForm()">Close</button>
    </form>
</div>
