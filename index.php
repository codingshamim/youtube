<?php
session_start();
include "conn.php";
$user = $_SESSION['auth'];

$userSql = "select * from users where id = '$user'";
$userQuery  = mysqli_query($conn,$userSql);
$users = mysqli_fetch_assoc($userQuery);

if(isset($_POST['upload'])){
    $username  = $users['name'];
    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $des = mysqli_real_escape_string($conn,$_POST['des']);
    $videoName = $_FILES['video']['name'];
    $vidTmp = $_FILES['video']['tmp_name'];
    $folder = 'video/';
    $file = 'img/thumb/';

    $thubname = $_FILES['thumb']['name'];
    $thumbTmp = $_FILES['thumb']['tmp_name'];

    move_uploaded_file($thumbTmp, $file.$thubname);
    move_uploaded_file($vidTmp, $folder.$videoName);

    $insert = "INSERT INTO `video` ( `vidThumb`, `vid`, `title`, `des`, `user`) VALUES ('$thubname', '$videoName', '$title', '$des', '$username')";
    $queryTwo = mysqli_query($conn,$insert);

   
   
    
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Youtube Clone</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- upload video overlay start  -->
    <div class="upload-main">
        <form action="index.php" method="post" class="upload-wrapper" enctype="multipart/form-data">
            <button class="btn closeOverlay">Close</button>
            <h1>Upload Your Video</h1>
            <div class="form-group">
                <div class="form-control">
                    <label for="">Select Your video</label>
                    <input type="file" name="video">
                </div>
                <div class="form-control">
                    <label for="">Select Your Thumbnail</label>
                    <input type="file" name="thumb">
                </div>
                <div class="form-control">
                   <input type="text" placeholder="Title" name="title">
                </div>
                <div class="form-control">
                    <textarea  id="" cols="20" rows="5" name="des">Description</textarea>

                 </div>
                 <div class="form-control">
                    <button  name="upload" class="btn">Upload</button>
                 </div>
            </div>
        </form>
    </div>
    <!-- upload video overlay end  -->
    <!-- apperance start  -->
    <div class="apperance"> 
        <button class="btn-sm">Back</button>
        <ul>
            <li class="darkBtn">Dark</li>
            <li>Light</li>
        </ul>
    </div>
    <!-- apperance end  -->
   <!-- right sidebar start  -->
   <div class="side-bar">
        <div class="row justi_center">
            <div class="users">
                <div class="user-img">
                    <img src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg" alt="">
                </div>
                <div class="user-text">
                    <h2 ><?php echo $users['name'] ?></h2>
                    <p class="desc"><?php echo $users['email'] ?></p>
                </div>
            </div>
            <div class="side-text">
                <ul>
                    <li><svg viewBox="0 0 24 24" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;">
                        <path d="M3,3v18h18V3H3z M4.99,20c0.39-2.62,2.38-5.1,7.01-5.1s6.62,2.48,7.01,5.1H4.99z M9,10c0-1.65,1.35-3,3-3s3,1.35,3,3 c0,1.65-1.35,3-3,3S9,11.65,9,10z M12.72,13.93C14.58,13.59,16,11.96,16,10c0-2.21-1.79-4-4-4c-2.21,0-4,1.79-4,4 c0,1.96,1.42,3.59,3.28,3.93c-4.42,0.25-6.84,2.8-7.28,6V4h16v15.93C19.56,16.73,17.14,14.18,12.72,13.93z"></path>
                      </svg>Your Channel
                    </li>
                    <li ><svg enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;"><path d="M20 3v18H8v-1h11V4H8V3h12zm-8.9 12.1.7.7 4.4-4.4L11.8 7l-.7.7 3.1 3.1H3v1h11.3l-3.2 3.3z"></path></svg>Sign Out
                    </li>
                    <li class="theme-changer"><svg viewBox="0 0 24 24" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;">
                        <path d="M12 22C10.93 22 9.86998 21.83 8.83998 21.48L7.41998 21.01L8.83998 20.54C12.53 19.31 15 15.88 15 12C15 8.12 12.53 4.69 8.83998 3.47L7.41998 2.99L8.83998 2.52C9.86998 2.17 10.93 2 12 2C17.51 2 22 6.49 22 12C22 17.51 17.51 22 12 22ZM10.58 20.89C11.05 20.96 11.53 21 12 21C16.96 21 21 16.96 21 12C21 7.04 16.96 3 12 3C11.53 3 11.05 3.04 10.58 3.11C13.88 4.81 16 8.21 16 12C16 15.79 13.88 19.19 10.58 20.89Z"></path>
                      </svg>Appearance : Light Theme
                    </li>
                </ul>
          
            </div>
             
        </div>
   </div>
   <!-- right sidebar end  -->
    <!-- header section start  -->
    <div class="container">
        <header>
            <div class="row res-row justi_between items_center">
                <div class="menus">
                    <div class="menu-btn">
                      <span></span>
                    </div>
                  <div class="logo">
                    <img src="img/logo.png" alt=""> 
                  </div>
              
                    
                </div>
                <div class="search-box">
                    <input type="text" placeholder="Search">
                    <div class="search-icon">
                        <ion-icon name="search-outline"></ion-icon>
                     
                    </div>
                  
                </div>
                <div class="branding row justi_center items_center">
                    <?php
                    if($user){

                 
                    ?>
                    <div class="icon-col">
                        <ion-icon class="openOverlay" name="add-circle-outline"></ion-icon>
                    </div>
                    <div class="icon-col">
                        <ion-icon name="notifications-outline"></ion-icon>
                    </div>
                    <div class="icon-col">
                     <img class="user-account" src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg" alt="">
                    </div>
                    <?php
                       }else{

                     
                    
                    ?>
                    <a href="signup.php" class="btn">Sign  Up</a>
                    <?php 
                      }
                    ?>
                </div>
            </div>
        </header>
        
    </div>
    <!-- header section end  -->

    <!-- home content start  -->
    <div class="container">
        <div class="row ">
            <div class="left  scroll">
                <ul>
                    <li class="active"><svg enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;"><g><path d="M4 21V10.08l8-6.96 8 6.96V21h-6v-6h-4v6H4z"></path></g></svg><a href="">Home</a></li>
                    <li><svg height="24" viewBox="0 0 24 24" width="24" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;"><path d="M10 14.65v-5.3L15 12l-5 2.65zm7.77-4.33-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zm-.23 5.86-8.5 4.5c-1.34.71-3.01.2-3.72-1.14-.71-1.34-.2-3.01 1.14-3.72l2.04-1.08v-1.21l-.69-.28-1.11-.46c-.99-.41-1.65-1.35-1.7-2.41-.05-1.06.52-2.06 1.46-2.56l8.5-4.5c1.34-.71 3.01-.2 3.72 1.14.71 1.34.2 3.01-1.14 3.72L15.5 9.26v1.21l1.8.74c.99.41 1.65 1.35 1.7 2.41.05 1.06-.52 2.06-1.46 2.56z"></path></svg><a href="">Shorts</a></li>
                    <li><svg enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;"><path d="M10 18v-6l5 3-5 3zm7-15H7v1h10V3zm3 3H4v1h16V6zm2 3H2v12h20V9zM3 10h18v10H3V10z"></path></svg><a href="">Subscriptions</a></li>
                </ul>
               <ul class="break">
                <li><svg enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;"><path d="m11 7 6 3.5-6 3.5V7zm7 13H4V6H3v15h15v-1zm3-2H6V3h15v15zM7 17h13V4H7v13z"></path></svg><a href="">Library</a></li>
                <li><svg height="24" style="pointer-events: none; display: block; width: 100%; height: 100%;" viewBox="0 0 24 24" width="24" focusable="false"><g><path d="M14.97 16.95 10 13.87V7h2v5.76l4.03 2.49-1.06 1.7zM22 12c0 5.51-4.49 10-10 10S2 17.51 2 12h1c0 4.96 4.04 9 9 9s9-4.04 9-9-4.04-9-9-9C8.81 3 5.92 4.64 4.28 7.38c-.11.18-.22.37-.31.56L3.94 8H8v1H1.96V3h1v4.74c.04-.09.07-.17.11-.25.11-.22.23-.42.35-.63C5.22 3.86 8.51 2 12 2c5.51 0 10 4.49 10 10z"></path></g></svg><a href="">History</a></li>
                <li><svg enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;"><path d="m10 8 6 4-6 4V8zm11-5v18H3V3h18zm-1 1H4v16h16V4z"></path></svg><a href="">Your Videos</a></li>
                <li><svg height="24" viewBox="0 0 24 24" width="24" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;"><path d="M14.97 16.95 10 13.87V7h2v5.76l4.03 2.49-1.06 1.7zM12 3c-4.96 0-9 4.04-9 9s4.04 9 9 9 9-4.04 9-9-4.04-9-9-9m0-1c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2z"></path></svg><a href="">Watch Later</a></li>
                <li><svg enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;"><path d="M18.77,11h-4.23l1.52-4.94C16.38,5.03,15.54,4,14.38,4c-0.58,0-1.14,0.24-1.52,0.65L7,11H3v10h4h1h9.43 c1.06,0,1.98-0.67,2.19-1.61l1.34-6C21.23,12.15,20.18,11,18.77,11z M7,20H4v-8h3V20z M19.98,13.17l-1.34,6 C18.54,19.65,18.03,20,17.43,20H8v-8.61l5.6-6.06C13.79,5.12,14.08,5,14.38,5c0.26,0,0.5,0.11,0.63,0.3 c0.07,0.1,0.15,0.26,0.09,0.47l-1.52,4.94L13.18,12h1.35h4.23c0.41,0,0.8,0.17,1.03,0.46C19.92,12.61,20.05,12.86,19.98,13.17z"></path></svg><a href="">Liked Videos</a></li>
               </ul>
               
            </div>
            <div class="right">
                <div class="row flex-col">
                    <div class="top-cate">
                        <ul>
                            <li class="active">All</li>
                            <li>Music</li>
                            <li>Sports</li>
                            <li>News</li>
                            <li>Love Music</li>
                            <li>Live</li>
                            <li>Tahsan</li>
                            <li>Imran</li>
                            <li>Arijit</li>
                            <li>Tanvir Evan</li>
                        </ul>
                    </div>
                    <div class="article">
                       <ul class="scroll">
                        <?php 
                        $vidSql = "select * from video";
                        $vidQuery = mysqli_query($conn,$vidSql);
                        while($video = mysqli_fetch_assoc($vidQuery)){

                      
                        ?>
                        <li>
                            <img src="img/thumb/<?php echo $video['vidThumb'] ?>" alt="">
                            <h2 class="title"><?php echo $video['title'] ?></h2>
                            <p class="times"><?php echo $video['user'] ?></p>
                                <p class="times">46K views
                                    2 years ago</p>
                               
                        </li>

                        <?php 
                          }
                        ?>
                    
                       </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- home content end  -->

    <!-- icons start  -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- icons end  -->

    <!-- js file link start  -->
    <script src="js/main.js"></script>
    <!-- js file link end  -->
</body>
</html>