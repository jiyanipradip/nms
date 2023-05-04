<?php
session_start();
require_once('sessioncheckadmin.php');
include('connection.php');
?>
<div class="topNav">
        <div class="wrapper">
            <div class="welcome"><a href="#" title=""><img src="images/userPic.png" alt="" /></a><span>Welcome , <?php echo $_SESSION['username']?></span></div>
            <div class="userNav">
                <ul>
                    <!--<li><a href="#" title=""><img src="images/icons/topnav/profile.png" alt="" /><span>Profile</span></a></li>
                    <li><a href="#" title=""><img src="images/icons/topnav/tasks.png" alt="" /><span>Tasks</span></a></li>
                    <li class="dd"><a title=""><img src="images/icons/topnav/messages.png" alt="" /><span>Messages</span><span class="numberTop">8</span></a>
                        <ul class="userDropdown">
                            <li><a href="#" title="" class="sAdd">new message for the current document pls check it</a></li>
                            <li><a href="#" title="" class="sInbox">inbox</a></li>
                            <li><a href="#" title="" class="sOutbox">outbox</a></li>
                            <li><a href="#" title="" class="sTrash">trash</a></li>
                        </ul>
                    </li>-->                    
                    <li><a href="logout.php" title=""><img src="images/icons/topnav/logout.png" alt="" /><span>Logout</span></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    
    <!-- Responsive header -->
<!--<div class="resp">
    <div class="respHead">
        <a href="index.html" title=""><img src="images/loginLogo.png" alt="" /></a>
    </div>
    
    <div class="cLine"></div>
    <div class="smalldd">
        <span class="goTo"><img src="images/icons/light/home.png" alt="" />Dashboard</span>
        <ul class="smallDropdown">
            <li><a href="aindex.php" title=""><img src="images/icons/light/home.png" alt="" />Dashboard</a></li>
            <li><a href="#" title="" class="exp"><img src="images/icons/light/frames.png" alt="" />Admin<strong>3</strong></a>
                <ul>
                <li><a href="createadmin.php" title="">Create Admin</a></li>
                <li><a href="listadmin.php" title="">List Admin</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
    <div class="cLine"></div>
</div>-->