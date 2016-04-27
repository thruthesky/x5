<?php
get_header();
?>
    <style>
        body {
            position: relative;
        }
        #nav-link {
            position: fixed;
            top: 150px;
            right: 13%;
            height: 126px;
            width: 276px;
            border-radius: 3px;
            background-color: #ff9999;
            z-Index: 12345;
        }

        .nav-item a {
            margin: 14px 0 0 20px;
            color: #FFFFFF;
        }

        #nav-link .active {
            font-weight: 600;
        }

    </style>

    <ul id="nav-link" class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#content-two"><i class="fa fa-angle-right nav-link" aria-hidden="true"></i> <?php _e('Company Information', 'x5')?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#content-three"><i class="fa fa-angle-right nav-link" aria-hidden="true"></i> <?php _e('Send an Inquiry', 'x5')?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#content-four"><i class="fa fa-angle-right nav-link" aria-hidden="true"></i> <?php _e('FAQs', 'x5')?></a>
        </li>
    </ul>
<?php
include 'part/help-content1.php';
include 'part/help-content2.php';
include 'part/help-content3.php';
include 'part/help-content4.php';
get_footer();