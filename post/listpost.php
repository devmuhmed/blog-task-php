
<div class="panel panel-default">
    <div class="panel-body">
    <div class="status-upload nopaddingbtm">
        <form action="./PostController.php" method="post" enctype="multipart/form-data">
        <textarea class="form-control" name="body" placeholder="What are you doing right now?"></textarea>
        <br>
        <ul class="nav nav-pills pull-left ">
            <!-- <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="glyphicon glyphicon-picture"></i></a></li> -->
            <li><label ><b>Image</b></label></li>
            <li><input type="file" name="postImg"></li>

        </ul>
        <button type="submit" name="addPost" class="btn btn-success pull-right" > Share</button>
        </form>
    </div>
    </div>
</div>

<?php 
    //connection
    require_once("./classes/db.php");
    $conn= new db();
    $allPosts=$conn->getAllData("posts");

    //list all posts
    while($post=$allPosts->fetch(PDO::FETCH_ASSOC)){
    $userData=$conn->getData("fname,lname,Profile_Img","users","User_Id={$post['User_Id']}");
    $user=$userData->fetch(PDO::FETCH_ASSOC);
echo "
    <div class='card rounded mt-4'>
        <div class='card-header'>
            <div class='d-flex align-items-center justify-content-between'>
                <div class='d-flex align-items-center'>
                    <img class='img-xs rounded-circle' src='images/{$user['Profile_Img']}' alt=''>
                    <div class='ml-2'>
                        <p>{$user['fname']} {$user['lname']}</p>
                        <p class='tx-11 text-muted'>{$post['Date']}</p>
                    </div>
                </div>
                <div class='dropdown'>
                    <button class='btn p-0' type='button' id='dropdownMenuButton2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-more-horizontal icon-lg pb-3px'>
                            <circle cx='12' cy='12' r='1'></circle>
                            <circle cx='19' cy='12' r='1'></circle>
                            <circle cx='5' cy='12' r='1'></circle>
                        </svg>
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton2'>
                        <a class='dropdown-item d-flex align-items-center' href='post.php?id={$post['Post_Id']}'>
                                <span class=''>View Post</span></a>
                        <a class='dropdown-item d-flex align-items-center' href='post.php?id={$post['Post_Id']}&action=edit'>
                                <span class=''>Edit</span></a>
                        <a class='dropdown-item d-flex align-items-center' href='deletePost.php?id={$post['Post_Id']}'>
                                <span class=''>Delete</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class='card-body'>
            <p class='mb-3 tx-14'>{$post['Body']}</p>";
            if($post['Image']){
                echo "<img src='images/{$post['Image']}' width='500' height='250' class='mb-4' alt='postImg'> " ;};
                echo"
        </div>
        
        <div class='card-footer'>
            <div class='d-flex post-actions'>
            <a href ='post.php?id={$post['Post_Id']}'>Read More</a>
            </div>
        </div>
    </div>";}?>
