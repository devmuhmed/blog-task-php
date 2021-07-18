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
    // echo "
        //  <div class='panel panel-default'>
        //   <div class='btn-group pull-right postbtn'>
        //     <button type='button' class='dotbtn dropdown-toggle' data-toggle='dropdown' aria-expanded='false'> <span class='dots'></span> </button>
        //     <ul class='dropdown-menu pull-right' role='menu'>
        //       <li><a href='post/editpost.php?id={$post['Post_Id']}'>Edit</a></li>
        //       <li><a href='deletePost.php?id={$post['Post_Id']}'>Delete</a></li>
        //     </ul>
        //   </div>
        //   <div class='col-md-12'>
        //     <div class='media'>
        //       <div class='media-left'> <a href='javascript:void(0)'> <img src='./images/{$user['Profile_Img']}' style='width:50px; height:50px;' alt='' class='media-object'> </a> </div>
        //       <div class='media-body'>
        //         <h4 class='media-heading'>{$user['fname']} {$user['lname']}<br>
        //           <small><i class='fa fa-clock-o'></i> {$post['Date']}</small> </h4>
        //         <p class='mb-3'>{$post['Body']}</p>
        //         <div class='d-flex post-actions mb-3'>
        //         <a href ='post/viewPost.php?id={$post['Post_Id']}'>Read More</a>
        //         </div>";
        //         if($post['Image']){
        //         echo "<img src='images/{$post['Image']}' width='500' height='250' class='mb-4' alt='postImg'> " ;};
        //         echo
        //         "</div>
        //     </div>
        //   </div>
        //   <div class='col-md-12 commentsblock border-top'>
        //     <div class='media mt-3'>
        //       <div class='media-left'> <a href='javascript:void(0)'> <img alt='64x64' src='https://bootdey.com/img/Content/avatar/avatar6.png' style='width:50px; height:50px; border-radius:50% ;' class='mb-3'> </a> </div>
        //       <div class='media-body '>
        //         <h4 class='media-heading'>Jhone Doe</h4>
        //         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus minima delectus nemo unde quae recusandae assumenda</p>
        //       </div>
        //     </div>
        //   </div>
        //   <div class='col-md-12 border-top'>
        //     <div class='status-upload my-2 '>
        //       <form>
        //         <label>Comment</label>
        //         <textarea class='form-control' placeholder='Comment here'></textarea>
        //         <br>
                
        //         <button type='submit' class='btn btn-success pull-right mb-2'> Comment</button>
        //       </form>
        //     </div>
        //     <!-- Status Upload  --> 
            
        //   </div>
        // </div>" ;

echo "
    <div class='card rounded mt-4'>
        <div class='card-header'>
            <div class='d-flex align-items-center justify-content-between'>
                <div class='d-flex align-items-center'>
                    <img class='img-xs rounded-circle' src='../images/{$user['Profile_Img']}' alt=''>
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
                        <a class='dropdown-item d-flex align-items-center' href='post.php'>
                                <span class=''>View Post</span></a>
                        <!-- <a class='dropdown-item d-flex align-items-center' href='' onclick='openEditForm()'>
                                <span class=''>Edit</span></a>-->
                        <a class='dropdown-item d-flex align-items-center' href='post/editpost.php?id={$post['Post_Id']}'>
                                <span class=''>Edit</span></a>
                        <a class='dropdown-item d-flex align-items-center' href='deletePost.php?id={$post['Post_Id']}'>
                                <span class=''>Delete</span></a>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class='card-body'>
            <p class='mb-3 tx-14'>{$post['Body']}</p>
            ";?>
                <?php
                if($post['Image']){
                echo "<img src='images/{$post['Image']}' width='500' height='250' class='class='img-fluid' mb-4' alt='postImg'> " ;};
                echo"
        </div>
        <div class='card-footer'>
            <div class='d-flex post-actions'>
                <a href='post.php'>Read More</a>
            </div>
        </div>
    </div>";}?>
                        <!-- <div class="card-footer">
                            <div class="d-flex post-actions">
                                <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart icon-md">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                    <p class="d-none d-md-block ml-2">Like</p>
                                </a>
                                <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square icon-md">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    <p class="d-none d-md-block ml-2">Comment</p>
                                </a>
                                <a href="javascript:;" class="d-flex align-items-center text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share icon-md">
                                        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                        <polyline points="16 6 12 2 8 6"></polyline>
                                        <line x1="12" y1="2" x2="12" y2="15"></line>
                                    </svg>
                                    <p class="d-none d-md-block ml-2">Share</p>
                                </a>
                            </div>
                        </div>-->
