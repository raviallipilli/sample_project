<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/session/loginSession.php';?>
<link rel="stylesheet" href="/sample_project/css/header.css">
<br>
<br>
<form>
    <div class="scrollmenu">
            <a href="/sample_project/dashboard/companies/companyList.php">Companies</a>
            <a href="/sample_project/dashboard/manufacturer/manufacturerList.php">Manufacturer</a>
                <a href="/sample_project/dashboard/users/userList.php">Users</a>
            <a href="/sample_project/dashboard/tools/toolsList.php">Tools</a>
            <a href="/sample_project/dashboard/permissions/permissionsList.php">Permissions</a>
            <a href="/sample_project/dashboard/support/support.php">Support</a>

            <!-- <a href="#about">About</a>
            <a href="#blog">Blog</a> 
            <a href="#base">Base</a>
            <a href="#custom">Custom</a>
            <a href="#more">More</a>
            <a href="#logo">Logo</a>
            <a href="#friends">Friends</a>
            <a href="#partners">Partners</a>
            <a href="#people">People</a> -->
            <a style="float: right;" href="/sample_project/login/login/index.php">LOGOUT</a>
    </div>
</form>
