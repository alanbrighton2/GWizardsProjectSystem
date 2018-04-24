<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once("database.php");
require_once("classes/_users.php");
require_once("classes/_terms.php");
require_once("classes/_project.php");
require_once("functions.php");
$session = isset( $_SESSION ) ? $_SESSION : null;

?>
<html class="js applicationcache geolocation history postmessage svg websockets localstorage sessionstorage websqldatabase webworkers hashchange audio canvas canvastext video webgl cssgradients multiplebgs opacity rgba inlinesvg hsla supports svgclippaths smil no-hiddenscroll fontface generatedcontent textshadow indexeddb indexeddb-deletedatabase cssanimations backgroundsize borderimage borderradius boxshadow csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox cssreflections csstransforms csstransforms3d csstransitions no-touchevents" lang="en-US" prefix="og: http://ogp.me/ns#" style="">
	<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<title>GWizards | Project Management System</title>
	<div class="fit-vids-style">&shy;<style> .fluid-width-video-wrapper { width: 100%; position: relative; padding: 0; } .fluid-width-video-wrapper iframe, .fluid-width-video-wrapper object, .fluid-width-video-wrapper embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; } </style></div>

	<link rel="stylesheet" id="alan-google-fonts-css" href="//fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic" type="text/css" media="all">
	<link rel="stylesheet" id="bootstrap-css" href="assets/css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="alan-font-icons-css" href="assets/fonts/style.css" type="text/css" media="all">
	<link rel="stylesheet" id="alan-dynamic-css" href="assets/css/theme.css" type="text/css" media="all">
	<link rel="stylesheet" id="alan-dynamic-css" href="assets/css/main.css" type="text/css" media="all">

	<link rel="stylesheet" id="alan-dynamic-css" href="assets/css/chosen.min.css" type="text/css" media="all">

	
	
	</head>
		<body class="activity just-me buddypress bp-legacy single singular page-template-default page page-parent logged-in js is-user-profile device-lg">
		<!-- Sidemenu Wrapper
		============================================= -->
		<div id="sidemenu-wrapper" class="sidemenu-colors has-sidemenu-footer">
			<div class="sidemenu-inner">
				<div class="sidemenu-header">
					<div class="logo">
						<!--logo standard-->
						<a href="http://localhost/GWizards_Project_System/" class="real-logo standard-logo" https:="" >
						<img src="assets/images/logo1.png" alt="">
						</a>

						<!--mini logo - when sidemenu is minimized-->
						<a href="http://localhost/GWizards_Project_System/" class="mini-logo standard-logo" https:="" >
						<img src="assets/images/logo-mini.png" alt="">
						</a>
					</div>
					<p>Menu</p>
				</div>
				<?php if ( $session ): ?>
				<div class="sidemenu-main">
					<div class="sidemenu-main-inner">
						<div class="scroll-container-wrapper">
							<div class="scroll-container">
								<div class="menu-section click-menu">
									<ul id="menu-side" class="menu-list alan-nav-menu ">
										<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home">
											<a title="Dashboard" href="index.php">
												<i class="icon-buddyapp-dashboard" style="color:#d9a1ee"></i> <span>Dashboard</span>
											</a>
										</li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children has-submenu open">
											<a title="Submit Project" href="project.php"><i class="icon-buddyapp-projects" style="color:#f2be4d"></i> <span>Projects</span></a> <span class="menu-arrow"></span>
											<ul role="menu" class="submenu">
												<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="submit.php"><span>Create Project</span></a>
												</li>
												<?php if ( '0' == $session['role'] ): ?>
													<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="add_category.php"><span>Category</span></a>
													</li>
												<?php endif ?>
											</ul>
										</li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page <?php if ( '0' == $session['role'] ) { echo 'menu-item-has-children has-submenu open'; } ?>">
											<a title="Dashboard" href="user.php">
												<i class="icon-buddyapp-members" style="color: aquamarine;"></i> <span>Users</span>
											</a>
											<?php if ( '0' == $session['role'] ): ?>
												<span class="menu-arrow"></span>
											<?php endif ?>
											<?php if ( '0' == $session['role'] ): ?>
												<ul role="menu" class="submenu">
													<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="add_user.php"><span>Add User</span></a>
													</li>
												</ul>
											<?php endif ?>
										</li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home">
											<a title="Help" href="accessibility.php">
												<i class="icon-buddyapp-all-activity" style="color:#ff3232"></i> <span>Activities</span>
											</a>
										</li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home">
											<a title="Help" href="accessibility.php">
												<i class="icon-accessibility" style="color:#C87D5D"></i> <span>Accessibility</span>
											</a>
										</li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home">
											<a title="Help" href="help.php">
												<i class="icon-help" style="color:#d9a1ee"></i> <span>Help</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>
			</div>
		</div>
		<!-- Document Wrapper
		============================================= -->
		<div id="page-wrapper" class="clearfix">
		<!-- Header
		============================================= -->
			<?php if ( $session ): ?>
			<header id="header" class="header-colors header-layout-01 has-search hover-menu has-language">
				<div id="header-wrap">
					<div class="logo">
						<!-- top-header and mobile logo only-->
						<a href="#" class="mobile-logo standard-logo">
							GWizards Project System Mobile
						</a>
					</div>
					<div class="header-left">
						<a href="#" id="alan-hamburger" class="sidemenu-trigger sidemenu-icon-wrapper">
							<span class="sidemenu-icon">
								<span><i></i><b></b></span>
								<span><i></i><b></b></span>
								<span><i></i><b></b></span>
							</span>
						</a>
					</div>
					<div class="header-right">
						<a href="#" id="alan-3dot" class="second-menu-trigger second-menu-icon-wrapper">
							<span class="second-menu-icon">
							<span></span>
							<span></span>
							<span></span>
							</span>
						</a>
					</div>
					<div class="second-menu">
						<div class="second-menu-main">
							<div class="second-menu-inner">
								<div class="scroll-container-wrapper">
									<div class="scroll-container">
										<div class="second-menu-section">
											<ul id="menu-header-icons" class="basic-menu header-icons alan-nav-menu">
												<?php if ( '0' == $session['role'] ): ?>
												<?php
													$notifications = $project->unapproved_project;
												?>
												<li class="alan-menu alan-tasks-nav has-submenu alan-tasks menu-item menu-item-type-custom menu-item-object-custom">        
													<a href="http://localhost/GWizards_Project_System/project.php?filter=unapproved">
														<i class="icon-tasks-line"></i>
														<?php if ( $notifications ): ?>
															<b class="bubble"><?php echo count( $notifications ) ?></b>
														<?php endif ?>
														
														<span>Projects</span>
													</a>
													<em class="menu-arrow"></em>
													<ul class="submenu">
														<li>
															<ol class="todolist">
																<?php $i = 0; ?>
																<?php foreach ( $notifications as $noti ): ?>
																	<?php 
																	$i++;
																	$class = 'todo-normal';
																	if ( $i%2==0 ) {
																		$class = 'todo-important';
																	}
																	?>
																	<li class="<?php echo $class ?> todo-list"><a href="http://localhost/GWizards_Project_System/project-single.php?id=<?php echo $noti['id'] ?>"><?php echo $noti['title'] ?></a></li>
																<?php endforeach ?>
															</ol>
														</li>
													</ul>
												</li>
												<?php endif; ?>
												<li class="alan-menu alan-notifications-nav has-submenu alan-notifications menu-item menu-item-type-custom menu-item-object-custom">
													<a href="#" title="">
													<i class="icon-notification-line"></i>
													<b class="bubble no-alert">0</b>
													<span>Notifications</span></a>
													<em class="menu-arrow"></em>
													<ul class="submenu">
														<li class="alan-submenu-item">
															<span>No new notifications</span></li>
															<li class="footer-item" style="display: none;">
															<a class="btn btn-link mark-as-read" href="#">Mark all as read</a>
														</li>
													</ul>
												</li>
											</ul>
											<!-- The search form -->
											<div class="search-form-wrapper">
												<?php $seach = isset( $_GET['s'] ) ? $_GET['s'] : '' ?>
												<form id="searchform" class="search-form alan-search-wrap alan-search-form" method="get" action="index.php" data-context="">
													<input id="main-search" class="header-search" autocomplete="off" required="" type="text" name="s" value="<?php echo $seach ?>" placeholder="Search">
													<button type="submit" class="header-search-button"></button>
												</form>                                      
											</div>
											<ul class="basic-menu header-menu">
												<li class="has-submenu alan-user_avatar-nav my-profile-default">
												<a href="#" class="open-submenu">
													<img src="assets/images/a3.png" class="avatar user-33-avatar avatar-50 photo" width="50" height="50" alt="Profile picture of user">
													<span><?php echo $session['display_name']; ?></span>
												</a>
												<span class="menu-arrow"></span>
													<ul class="submenu">
														<li><a href="javascript:void(0)"><i class="icon-my-profile"></i> Profile</a></li>
														<li class="alt">
															<a id="alan-menu-logout" href="modules/logout.php"><i class="icon-logout"></i> Log Out</a>
														</li>
													</ul>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header><!-- #header end -->
		<?php endif; ?>