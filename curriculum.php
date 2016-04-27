<?php
get_header();
?>
<style>
    body {
        position: relative;
    }
    #nav-link {
        position: fixed;
        top: 120px;
        height: 126px;
        width: 276px;
        background-color: #ff9999;
        z-Index: 12345;
    }
    #nav-link .active {
        color: red;
        background-color: yellow;
    }

</style>
    <!--ul id="nav-link" class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#nav1">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#nav2">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#nav3">Another link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#nav4">Another Menu</a>
        </li>
    </ul-->

<!--h4 id="nav1">Nav 1</h4-->
<?php
include 'part/curriculum-content1.php';
?>
<!--h4 id="nav2">Nav 2</h4-->
<?php
include 'part/curriculum-content2.php';
?>

<!--h4-- id="nav3">Nav 3</h4-->
<?php
include 'part/curriculum-content3.php';
?>
<!--h4 id="nav4">Nav 4</h4-->
<?php
include 'part/curriculum-content4.php';
include 'part/curriculum-content5.php';
get_footer();

