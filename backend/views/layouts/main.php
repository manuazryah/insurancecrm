<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
        <head>
                <meta charset="<?= Yii::$app->charset ?>">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">

                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <meta name="description" content="Xenon Boostrap Admin Panel" />
                <meta name="author" content="" />
                <title>Insurance CRM</title>
                <script src="<?= Yii::$app->homeUrl; ?>/js/jquery-1.11.1.min.js"></script>
                <script type="text/javascript">
                        var homeUrl = '<?= Yii::$app->homeUrl; ?>';
                        var basePath = '<?= Yii::$app->basePath; ?>';
                </script>
                <?= Html::csrfMetaTags() ?>
                <?php $this->head() ?>
        </head>
        <body>
                <?php $this->beginBody() ?>

                <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

                        <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
                        <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
                        <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
                        <div class="sidebar-menu toggle-others fixed collapsed" id="side-menuss">

                                <div class="sidebar-menu-inner">

                                        <header class="logo-env">

                                                <!-- logo -->
                                                <div class="logo">
                                                        <a href="dashboard-1.html" class="logo-expanded">
                                                                <img src="<?= Yii::$app->homeUrl; ?>images/logo@2x.png" width="80" alt="" />
                                                        </a>

                                                        <a href="dashboard-1.html" class="logo-collapsed">
                                                                <img src="<?= Yii::$app->homeUrl; ?>images/logo-collapsed@2x.png" width="40" alt="" />
                                                        </a>
                                                </div>

                                                <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                                                <div class="mobile-menu-toggle visible-xs">
                                                        <a href="#" data-toggle="user-info-menu">
                                                                <i class="fa-bell-o"></i>
                                                                <span class="badge badge-success">7</span>
                                                        </a>

                                                        <a href="#" data-toggle="mobile-menu">
                                                                <i class="fa-bars"></i>
                                                        </a>
                                                </div>

                                                <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
                                        </header>



                                        <ul id="main-menu" class="main-menu">
                                                <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                                                <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                                                <li class="active opened active">
                                                        <a href="">
                                                                <i class="linecons-cog"></i>
                                                                <span class="title">Administrator</span>
                                                        </a>
                                                        <ul>
                                                                <li>
                                                                        <?= Html::a('Access Powers', ['/admin/admin-posts/index'], ['class' => 'title']) ?>
                                                                </li>

                                                                <li>
                                                                        <?= Html::a('Admin Users', ['/admin/admin-users/index'], ['class' => 'title']) ?>
                                                                </li>
                                                        </ul>
                                                </li>

                                                <li class="active opened active">
                                                        <a href="">
                                                                <i class="linecons-database"></i>
                                                                <span class="title">Masters</span>
                                                        </a>
                                                        <ul>
                                                                <li>
                                                                        <?= Html::a('Country', ['/masters/country/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
                                                                        <?= Html::a('State', ['/masters/state/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
                                                                        <?= Html::a('City', ['/masters/city/index'], ['class' => 'title']) ?>
                                                                </li>
                                                        </ul>
                                                </li>

                                                <li class="active opened active">
                                                        <a href="">
                                                                <i class="fa fa-building-o"></i>
                                                                <span class="title">Company</span>
                                                        </a>
                                                        <ul>
                                                                <li>
                                                                        <?= Html::a('Company Details', ['/company/company-details/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
                                                                        <?= Html::a('Company Contacts', ['/company/company-contacts/index'], ['class' => 'title']) ?>
                                                                </li>
                                                        </ul>
                                                </li>

                                        </ul>

                                </div>

                        </div>

                        <div class="main-content">
                                <nav class="navbar user-info-navbar"  role="navigation"><!-- User Info, Notifications and Menu Bar -->

                                        <!-- Left links for user info navbar -->
                                        <ul class="user-info-menu left-links list-inline list-unstyled">

                                                <li class="hidden-sm hidden-xs">
                                                        <a href="#" data-toggle="sidebar">
                                                                <i class="fa-bars"></i>
                                                        </a>
                                                </li>

                                                <li class="dropdown hover-line">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="fa-envelope-o"></i>
                                                                <span class="badge badge-green">15</span>
                                                        </a>

                                                        <ul class="dropdown-menu messages">
                                                                <li>

                                                                        <ul class="dropdown-menu-list list-unstyled ps-scrollbar">

                                                                                <li class="active"><!-- "active" class means message is unread -->
                                                                                        <a href="#">
                                                                                                <span class="line">
                                                                                                        <strong>Luc Chartier</strong>
                                                                                                        <span class="light small">- yesterday</span>
                                                                                                </span>

                                                                                                <span class="line desc small">
                                                                                                        This ain’t our first item, it is the best of the rest.
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li class="active">
                                                                                        <a href="#">
                                                                                                <span class="line">
                                                                                                        <strong>Salma Nyberg</strong>
                                                                                                        <span class="light small">- 2 days ago</span>
                                                                                                </span>

                                                                                                <span class="line desc small">
                                                                                                        Oh he decisively impression attachment friendship so if everything.
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li>
                                                                                        <a href="#">
                                                                                                <span class="line">
                                                                                                        Hayden Cartwright
                                                                                                        <span class="light small">- a week ago</span>
                                                                                                </span>

                                                                                                <span class="line desc small">
                                                                                                        Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li>
                                                                                        <a href="#">
                                                                                                <span class="line">
                                                                                                        Sandra Eberhardt
                                                                                                        <span class="light small">- 16 days ago</span>
                                                                                                </span>

                                                                                                <span class="line desc small">
                                                                                                        On so attention necessary at by provision otherwise existence direction.
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <!-- Repeated -->

                                                                                <li class="active"><!-- "active" class means message is unread -->
                                                                                        <a href="#">
                                                                                                <span class="line">
                                                                                                        <strong>Luc Chartier</strong>
                                                                                                        <span class="light small">- yesterday</span>
                                                                                                </span>

                                                                                                <span class="line desc small">
                                                                                                        This ain’t our first item, it is the best of the rest.
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li class="active">
                                                                                        <a href="#">
                                                                                                <span class="line">
                                                                                                        <strong>Salma Nyberg</strong>
                                                                                                        <span class="light small">- 2 days ago</span>
                                                                                                </span>

                                                                                                <span class="line desc small">
                                                                                                        Oh he decisively impression attachment friendship so if everything.
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li>
                                                                                        <a href="#">
                                                                                                <span class="line">
                                                                                                        Hayden Cartwright
                                                                                                        <span class="light small">- a week ago</span>
                                                                                                </span>

                                                                                                <span class="line desc small">
                                                                                                        Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li>
                                                                                        <a href="#">
                                                                                                <span class="line">
                                                                                                        Sandra Eberhardt
                                                                                                        <span class="light small">- 16 days ago</span>
                                                                                                </span>

                                                                                                <span class="line desc small">
                                                                                                        On so attention necessary at by provision otherwise existence direction.
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                        </ul>

                                                                </li>

                                                                <li class="external">
                                                                        <a href="mailbox-main.html">
                                                                                <span>All Messages</span>
                                                                                <i class="fa-link-ext"></i>
                                                                        </a>
                                                                </li>
                                                        </ul>
                                                </li>

                                                <li class="dropdown hover-line">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="fa-bell-o"></i>
                                                                <span class="badge badge-purple">7</span>
                                                        </a>

                                                        <ul class="dropdown-menu notifications">
                                                                <li class="top">
                                                                        <p class="small">
                                                                                <a href="#" class="pull-right">Mark all Read</a>
                                                                                You have <strong>3</strong> new notifications.
                                                                        </p>
                                                                </li>

                                                                <li>
                                                                        <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                                                                <li class="active notification-success">
                                                                                        <a href="#">
                                                                                                <i class="fa-user"></i>

                                                                                                <span class="line">
                                                                                                        <strong>New user registered</strong>
                                                                                                </span>

                                                                                                <span class="line small time">
                                                                                                        30 seconds ago
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li class="active notification-secondary">
                                                                                        <a href="#">
                                                                                                <i class="fa-lock"></i>

                                                                                                <span class="line">
                                                                                                        <strong>Privacy settings have been changed</strong>
                                                                                                </span>

                                                                                                <span class="line small time">
                                                                                                        3 hours ago
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li class="notification-primary">
                                                                                        <a href="#">
                                                                                                <i class="fa-thumbs-up"></i>

                                                                                                <span class="line">
                                                                                                        <strong>Someone special liked this</strong>
                                                                                                </span>

                                                                                                <span class="line small time">
                                                                                                        2 minutes ago
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li class="notification-danger">
                                                                                        <a href="#">
                                                                                                <i class="fa-calendar"></i>

                                                                                                <span class="line">
                                                                                                        John cancelled the event
                                                                                                </span>

                                                                                                <span class="line small time">
                                                                                                        9 hours ago
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li class="notification-info">
                                                                                        <a href="#">
                                                                                                <i class="fa-database"></i>

                                                                                                <span class="line">
                                                                                                        The server is status is stable
                                                                                                </span>

                                                                                                <span class="line small time">
                                                                                                        yesterday at 10:30am
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li class="notification-warning">
                                                                                        <a href="#">
                                                                                                <i class="fa-envelope-o"></i>

                                                                                                <span class="line">
                                                                                                        New comments waiting approval
                                                                                                </span>

                                                                                                <span class="line small time">
                                                                                                        last week
                                                                                                </span>
                                                                                        </a>
                                                                                </li>
                                                                        </ul>
                                                                </li>

                                                                <li class="external">
                                                                        <a href="#">
                                                                                <span>View all notifications</span>
                                                                                <i class="fa-link-ext"></i>
                                                                        </a>
                                                                </li>
                                                        </ul>
                                                </li>

                                                <!-- Added in v1.2 -->


                                        </ul>


                                        <!-- Right links for user info navbar -->
                                        <ul class="user-info-menu right-links list-inline list-unstyled">

                                                <li>
                                                        <a href="<?= Yii::$app->homeUrl; ?>site/home"><i class="fa-home"></i>Home</a>
                                                </li>

                                                <li class="dropdown user-profile">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <img src="<?= Yii::$app->homeUrl; ?>images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
                                                                <span>
                                                                        <?= Yii::$app->session['user_data']['name'] ?>
                                                                        <i class="fa-angle-down"></i>
                                                                </span>
                                                        </a>

                                                        <ul class="dropdown-menu user-profile-menu list-unstyled">
                                                                <li>
                                                                        <a href="<?= Yii::$app->homeUrl; ?>admin/admin-users/change-password?id=<?= Yii::$app->user->identity->id ?>">
                                                                                <i class="fa-wrench"></i>
                                                                                Change Password
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="<?= Yii::$app->homeUrl; ?>admin/admin-users/update?id=<?= Yii::$app->user->identity->id ?>">
                                                                                <i class="fa-user"></i>
                                                                                Profile
                                                                        </a>
                                                                </li>
                                                                <!--<li class="last">-->
                                                                <span>
                                                                        <?php
                                                                        echo '<li class="last">'
                                                                        . Html::beginForm(['/site/logout'], 'post') . '<a>'
                                                                        . Html::submitButton(
                                                                                '<i class="fa fa-power-off"></i> Logout (' . Yii::$app->user->identity->user_name . ')', ['class' => 'btn btn-link linker']
                                                                        ) . '</a>'
                                                                        . Html::endForm();
                                                                        ?>
                                                                        <?php // Yii::$app->user->identity->name   ?>
                                                                </span>
                                                                <!--</li>-->
                                                        </ul>
                                                </li>

                                        </ul>

                                </nav>

                                <div class="row">


                                        <?= $content; ?>


                                </div>



                                <!-- Main Footer -->
                                <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
                                <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
                                <!-- Or class "fixed" to  always fix the footer to the end of page -->
                                <footer class="main-footer sticky footer-type-1">

                                        <div class="footer-inner">

                                                <!-- Add your copyright text here -->
                                                <div class="footer-text">
                                                        &copy;2017
                                                        <strong>Azryah</strong>
                                                        All rights reserved.
                                                </div>


                                                <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                                                <div class="go-up">

                                                        <a href="#" rel="go-top">
                                                                <i class="fa-angle-up"></i>
                                                        </a>

                                                </div>

                                        </div>

                                </footer>
                        </div>


                        <div id="chat" class="fixed"><!-- start: Chat Section -->

                                <div class="chat-inner">


                                        <h2 class="chat-header">
                                                <a  href="#" class="chat-close" data-toggle="chat">
                                                        <i class="fa-plus-circle rotate-45deg"></i>
                                                </a>

                                                Chat
                                                <span class="badge badge-success is-hidden">0</span>
                                        </h2>

                                        <script type="text/javascript">
                                                // Here is just a sample how to open chat conversation box
                                                jQuery(document).ready(function ($)
                                                {
                                                        var $chat_conversation = $(".chat-conversation");

                                                        $(".chat-group a").on('click', function (ev)
                                                        {
                                                                ev.preventDefault();

                                                                $chat_conversation.toggleClass('is-open');

                                                                $(".chat-conversation textarea").trigger('autosize.resize').focus();
                                                        });

                                                        $(".conversation-close").on('click', function (ev)
                                                        {
                                                                ev.preventDefault();
                                                                $chat_conversation.removeClass('is-open');
                                                        });
                                                });
                                        </script>


                                        <div class="chat-group">
                                                <strong>Favorites</strong>

                                                <a href="#"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
                                                <a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
                                                <a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
                                                <a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
                                                <a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
                                        </div>


                                        <div class="chat-group">
                                                <strong>Work</strong>

                                                <a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
                                                <a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
                                                <a href="#"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
                                        </div>


                                        <div class="chat-group">
                                                <strong>Other</strong>

                                                <a href="#"><span class="user-status is-online"></span> <em>Dennis E. Johnson</em></a>
                                                <a href="#"><span class="user-status is-online"></span> <em>Stuart A. Shire</em></a>
                                                <a href="#"><span class="user-status is-online"></span> <em>Janet I. Matas</em></a>
                                                <a href="#"><span class="user-status is-online"></span> <em>Mindy A. Smith</em></a>
                                                <a href="#"><span class="user-status is-busy"></span> <em>Herman S. Foltz</em></a>
                                                <a href="#"><span class="user-status is-busy"></span> <em>Gregory E. Robie</em></a>
                                                <a href="#"><span class="user-status is-busy"></span> <em>Nellie T. Foreman</em></a>
                                                <a href="#"><span class="user-status is-busy"></span> <em>William R. Miller</em></a>
                                                <a href="#"><span class="user-status is-idle"></span> <em>Vivian J. Hall</em></a>
                                                <a href="#"><span class="user-status is-offline"></span> <em>Melinda A. Anderson</em></a>
                                                <a href="#"><span class="user-status is-offline"></span> <em>Gary M. Mooneyham</em></a>
                                                <a href="#"><span class="user-status is-offline"></span> <em>Robert C. Medina</em></a>
                                                <a href="#"><span class="user-status is-offline"></span> <em>Dylan C. Bernal</em></a>
                                                <a href="#"><span class="user-status is-offline"></span> <em>Marc P. Sanborn</em></a>
                                                <a href="#"><span class="user-status is-offline"></span> <em>Kenneth M. Rochester</em></a>
                                                <a href="#"><span class="user-status is-offline"></span> <em>Rachael D. Carpenter</em></a>
                                        </div>

                                </div>

                                <!-- conversation template -->
                                <div class="chat-conversation">

                                        <div class="conversation-header">
                                                <a href="#" class="conversation-close">
                                                        &times;
                                                </a>

                                                <span class="user-status is-online"></span>
                                                <span class="display-name">Arlind Nushi</span>
                                                <small>Online</small>
                                        </div>

                                        <ul class="conversation-body">
                                                <li>
                                                        <span class="user">Arlind Nushi</span>
                                                        <span class="time">09:00</span>
                                                        <p>Are you here?</p>
                                                </li>
                                                <li class="odd">
                                                        <span class="user">Brandon S. Young</span>
                                                        <span class="time">09:25</span>
                                                        <p>This message is pre-queued.</p>
                                                </li>
                                                <li>
                                                        <span class="user">Brandon S. Young</span>
                                                        <span class="time">09:26</span>
                                                        <p>Whohoo!</p>
                                                </li>
                                                <li class="odd">
                                                        <span class="user">Arlind Nushi</span>
                                                        <span class="time">09:27</span>
                                                        <p>Do you like it?</p>
                                                </li>
                                        </ul>

                                        <div class="chat-textarea">
                                                <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
                                        </div>

                                </div>

                                <!-- end: Chat Section -->
                        </div>

                </div>

                <div class="footer-sticked-chat"><!-- Start: Footer Sticked Chat -->

                        <script type="text/javascript">
                                function showLoader() {
                                        $('.page-loading-overlay').removeClass('loaded');
                                }
                                function hideLoader() {
                                        $('.page-loading-overlay').addClass('loaded');
                                }

                                function toggleSampleChatWindow()
                                {
                                        var $chat_win = jQuery("#sample-chat-window");

                                        $chat_win.toggleClass('open');

                                        if ($chat_win.hasClass('open'))
                                        {
                                                var $messages = $chat_win.find('.ps-scrollbar');

                                                if ($.isFunction($.fn.perfectScrollbar))
                                                {
                                                        $messages.perfectScrollbar('destroy');

                                                        setTimeout(function () {
                                                                $messages.perfectScrollbar();
                                                                $chat_win.find('.form-control').focus();
                                                        }, 300);
                                                }
                                        }

                                        jQuery("#sample-chat-window form").on('submit', function (ev)
                                        {
                                                ev.preventDefault();
                                        });
                                }

                                jQuery(document).ready(function ($)
                                {
                                        $(".footer-sticked-chat .chat-user, .other-conversations-list a").on('click', function (ev)
                                        {
                                                ev.preventDefault();
                                                toggleSampleChatWindow();
                                        });

                                        $(".mobile-chat-toggle").on('click', function (ev)
                                        {
                                                ev.preventDefault();

                                                $(".footer-sticked-chat").toggleClass('mobile-is-visible');
                                        });
                                });
                        </script>

                        <script type="text/javascript">
                                jQuery(document).ready(function ($)
                                {
                                        if ($(window).width() < 900) {
                                                $("#side-menuss").removeClass("collapsed");
                                        } else {

                                                $("#side-menuss").addClass('collapsed');
                                        }
                                        ;

                                });
                        </script>




                        <a href="#" class="mobile-chat-toggle">
                                <i class="linecons-comment"></i>
                                <span class="num">6</span>
                                <span class="badge badge-purple">4</span>
                        </a>

                        <!-- End: Footer Sticked Chat -->
                </div>

                <!-- Page Loading Overlay -->
                <div class="page-loading-overlay">
                        <div class="loader-2"></div>
                </div>

                <?php $this->endBody() ?>
        </body>
</html>
<?php $this->endPage() ?>
