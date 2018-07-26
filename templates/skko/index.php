<?php defined("_JEXEC") or die();?>
<?php
$templateparams = JFactory::getApplication()->getTemplate(true)->params;
$app  = JFactory::getApplication();

$sitename = $app->get('sitename');
$site_logo = $templateparams->get('site_logo');
$site_name = $templateparams->get('site_name');
$site_desc = $templateparams->get('site_desc');
$headerColor = $templateparams->get('templateHeaderColor');
$templateBackgroundColor = $templateparams->get('templateBackgroundColor');

//print_r($templateparams);

$doc = JFactory::getDocument();
$menu = JFactory::getApplication()->getMenu();

$activePage = $menu->getActive()->id;
$defaultPage = $menu->getDefault()->id;

//Подключение стилей (stylesheets)
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/favicon.png');
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/css/bootstrap.min.css');
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/libs/fancybox/jquery.fancybox.css');
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/libs/owl-carousel2/assets/owl.carousel.css');
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/libs/owl-carousel2/assets/owl.theme.default.css');
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/libs/countdown/jquery.countdown.css');
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/css/fonts.css');
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/css/font-awesome.min.css');
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/css/custom.css');
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/css/main.css');
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/css/media.css');
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/css/animate.min.css');

// Отключение стандартных скриптов Joomla (Конфликтуют с подключаемыми скриптами шаблона)
JHtml::_('jquery.framework');
unset($doc->_scripts[JURI::root(true). '/media/jui/js/jquery.min.js']);
unset($doc->_scripts[JURI::root(true). '/media/jui/js/bootstrap.min.js']);

//Подключение скриптов (scripts)
//$doc->addScript(JUri::base().'templates/'.$doc->template.'/libs/jquery/jquery-1.11.1.min.js');

//Проверяем выводяться ли какие либо модули
if ($doc->countModules('position-0'))
{
	$showSearch = TRUE;
}
if ($doc->countModules('position-1'))
{
	$showPhones = TRUE;
}
if ($doc->countModules('position-2'))
{
	$showButtons = TRUE;
}
if ($doc->countModules('position-3'))
{
	$showMessage = TRUE;
}
if ($doc->countModules('position-4'))
{
	$showMenu = TRUE;
}
if ($doc->countModules('position-5'))
{
	$showUpBanners = TRUE;
}
if ($doc->countModules('position-6'))
{
	$showNewsModule = TRUE;
}
if ($doc->countModules('position-7'))
{
	$showBreadcrumbs  = TRUE;
}

if ($doc->countModules('position-8'))
{
	$showSidebar = TRUE;
}
if ($doc->countModules('position-9'))
{
	$showSubscribeModule = TRUE;
}
if ($doc->countModules('position-10'))
{
	$showLeftModule = TRUE;
}
if ($doc->countModules('position-11'))
{
	$showCenterModule = TRUE;
}
if ($doc->countModules('position-12'))
{
	$showRightModule = TRUE;
}
if ($doc->countModules('position-10 or position-11 or position-12'))
{
	$showRowModules = TRUE;
}

if ($doc->countModules('position-13 or position-14 or position-15'))
{
	$showFooterModules = TRUE;
}
if ($doc->countModules('position-13'))
{
	$showFooterLeftModules = TRUE;
}
if ($doc->countModules('position-14'))
{
	$showFooterCenterModules = TRUE;
}
if ($doc->countModules('position-15'))
{
	$showFooterRightModules = TRUE;
}
if ($doc->countModules('position-16'))
{
	$showFooterBottomLine = TRUE;
}
if ($doc->countModules('position-17'))
{
	$showMobileSearch = TRUE;
}
if ($doc->countModules('position-18'))
{
	$showMobileMenu = TRUE;
}
if ($doc->countModules('position-19'))
{
	$showDownBanners = TRUE;
}

if($templateparams)
{
	$this->addStyleDeclaration('
		@charset "UTF-8";
*::-webkit-input-placeholder {
  color: #666;
  opacity: 1; }

*:-moz-placeholder {
  color: #666;
  opacity: 1; }

*::-moz-placeholder {
  color: #666;
  opacity: 1; }

*:-ms-input-placeholder {
  color: #666;
  opacity: 1; }

body input:focus:required:invalid,
body textarea:focus:required:invalid {
  border: red 2px solid; }

body input:required:valid,
body textarea:required:valid {
  border: '. $templateBackgroundColor .' !important 2px solid; }

body {
  font-family: "RobotoRegular", sans-serif;
  font-size: 16px; }

/* Верхнее меню */
.form_search .form-inline .input-group-addon {
  position: absolute;
  left: 199px;
  top: 0px;
  background-color: '. $headerColor .' !important;
  color: #fff;
  font-size: 18px;
  z-index: 100;
  width: 100px;
  height: 34px; }

.top_main_menu {
  display: none;
  position: absolute;
  top: 50px;
  left: 0px;
  padding: 10px;
  background-color: #505559;
  width: 100%;
  z-index: 1000; }

.top_main_menu ul li {
  display: block;
  margin-left: 0px;
  padding: 5px;
  list-style-type: none;
  width: 100%;
  cursor: pointer;
  border-bottom: 1px dashed #fff;
  font-family: RobotoRegular, sans-serif;
  font-size: 16px;
  font-weight: normal; }
  .top_main_menu ul li a {
    color: #fff; }
  .top_main_menu ul li a:hover {
    color: yellow; }

.top_main_menu ul li:hover {
  background-color: '. $headerColor .' !important; }

.top_main_menu ul li a {
  text-decoration: none;
  background-color: transparent;
  display: block;
  width: 100%; }
  .top_main_menu ul li a :hover {
    text-decoration: none;
    background-color: transparent; }
  .top_main_menu ul li a.active {
    color: yellow; }

.top_main_menu ul li.active {
  background-color: '. $templateBackgroundColor .' !important; }

.menu_icon {
  cursor: pointer; }

.top_menu_mini {
  display: none;
  width: 100%;
  /*height: 100vh;*/
  background-color: #555A5E;
  /*opacity: .9;*/
  margin-left: 0px;
  margin-top: 5px; }

#accordion .panel-info > .panel-heading {
  background-color: '. $templateBackgroundColor .' !important;
  border-color: #fff;
  color: white; }

#accordion .panel-info > .panel-heading > .panel-title a {
  display: block;
  text-transform: uppercase;
  text-decoration: none;
  border: none; }
  #accordion .panel-info > .panel-heading > .panel-title a:hover {
    color: yellow; }
  #accordion .panel-info > .panel-heading > .panel-title a.active {
    color: yellow; }

#accordion .panel-info > .panel-heading > .panel-title a i {
  float: right;
  font-size: 22px; }

#accordion .panel-info .panel-body {
  background-color: '. $headerColor .' !important; }

#accordion .panel-info .panel-body ul {
  display: block;
  margin: 0;
  padding: 0;
  width: 100%; }

.user_info {
  padding: 10px;
  margin: 10px; }

.user_info img {
  width: 120px;
  height: 120px;
  /*	display: inline-block;*/
  margin: 10px;
  padding: 10px;
  float: left; }

.user_greeting {
  display: inline-block;
  height: 120px;
  width: 70%;
  margin-top: 0px; }

.user_greeting h3 {
  /*width: 220px;*/
  margin: 0;
  padding: 5px;
  text-align: center; }

ul.profil_menu li {
  display: block;
  float: left;
  text-transform: none;
  text-align: center;
  width: 150px; }

ul.profil_menu li:hover {
  background-color: transparent; }

ul.profil_menu li a {
  font-size: 16px; }

ul.profil_menu li i {
  padding-right: 5px; }

/* Окончание верхнего меню */
.top_header > .container {
  margin-top: 50px; }

#header_topline.navbar.navbar-fixed-top {
  background-color: #43484C;
  padding: 10px;
  padding-right: 30px;
  color: #fff;
  max-height: 50px;
  text-shadow: 1px 3px 5px rgba(0, 0, 0, 0.6);
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); }

#header_topline .container .row ul {
  padding-left: 15px;
  padding-top: 5px;
  margin-left: 0px; }

#header_topline .container .row ul li {
  display: inline;
  position: relative;
  /*padding: 13px 5px;*/
  padding-right: 10px;
  margin-right: 10px;
  text-transform: uppercase;
  text-shadow: 1px 3px 5px rgba(0, 0, 0, 0.6); }

  #header_topline .container .row ul li:hover {
    color:yellow;
    /*background-color: orange;*/
  }

  #header_topline .container .row ul li i{
    position: absolute;
    top: 3px;
    right: 2px;
  }

#header_topline .container .row ul li ul.dropdown-menu {
  top: 32px;
  background-color: #43484C;
  padding: 1px;
  -webkit-border-radius: 0;
          border-radius: 0;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12); }

#header_topline .container .row ul li ul.dropdown-menu li {
  margin: 0px;
  padding: 2px;
  display: block; }

#header_topline .container .row ul li ul.dropdown-menu li a:hover {
  background-color: '. $templateBackgroundColor .' !important;
  /*border: 1px solid $yellow;*/ }

#header_topline .container .row ul li ul.dropdown-menu li a {
  /*background-color: $green-light;*/
  margin: 0px;
  border-left: 1px solid '. $headerColor .' !important;
  border-bottom: 1px solid '. $headerColor .' !important;
  /*color:$green-light;*/ }

#header_topline .container .row ul li.home.active a {
  color: yellow; }

#header_topline .container .row ul li.active {
  color: yellow; }

 #header_topline .container .row ul li.active a {
  color: yellow; }

#header_topline .dropdown-menu > .active > a {
  background-color: '. $templateBackgroundColor .' !important;
  color: yellow; }

#header_topline .container .row ul li.active a:hover {
  background-color: transparent; }

#header_topline .container .row ul li span.glyphicon-home {
  margin-right: 10px; }

#header_topline a {
  color: #fff; }

#header_topline a:hover {
  color: yellow; }

li.link a:hover {
  text-decoration: none; }

.top_brand {
  display: inline-block; }

.top_brand h1 {
  margin-top: -12px;
  /*font-family:"DisneyParkRegular";*/
  color: #fff;
  font-size: 48px;
  display: inline-block; }

.menu_button {
  background-color: transparent;
  font-size: 24px;
  border: none; }

.icon_search {
  left: 225px;
  position: absolute;
  top: -3px;
  cursor: pointer; }

.top_search {
  display: inline-block;
  position: absolute;
  top: 10px;
  left: 22px; }

.top_search span {
  font-size: 24px;
  position: absolute;
  left: 70px;
  top: 3px;
  /*cursor:pointer;*/
  z-index: 40;
  color: '. $headerColor .' !important; }

.form_find {
  position: absolute;
  top: -4px;
  left: 60px;
  width: 200px;
  height: 50px;
  z-index: 30; }

.form_find .form-inline .form-group input {
  width: 300px;
  padding-left: 45px;
  -webkit-border-top-right-radius: 0.3em;
          border-top-right-radius: 0.3em;
  -webkit-border-bottom-right-radius: 0.3em;
          border-bottom-right-radius: 0.3em; }

.form_find .form-group {
  border: 1px solid yellow;
  -webkit-border-radius: 5px;
          border-radius: 5px; }

.form_find .form-group button.input-group-addon {
  position: absolute;
  font-size: 18px;
  top: 0px;
  right: 0px;
  height: 34px;
  width: 75px;
  background-color: '. $templateBackgroundColor .' !important;
  color: #fff;
  z-index: 30;
  -webkit-border-top-right-radius: 0.3em;
          border-top-right-radius: 0.3em;
  -webkit-border-bottom-right-radius: 0.3em;
          border-bottom-right-radius: 0.3em; }

.form_find .form-group button.input-group-addon:hover {
  color: yellow; }

.top_login {
  display: inline-block; }

.icon_phone {
  display: none; }

.phones {
  font-size: 20px;
  color: yellow;
  text-shadow: 1px 3px 5px rgba(0, 0, 0, 0.6);
  text-align: center;
  margin-top: -15px;
  margin-left: -20px; }

.top_links a:hover {
  text-decoration: none;
  color: yellow;
  text-decoration: underline; }

.top_links a {
  text-decoration: underline; }

.soc_buttons {
  /*float: right;*/
  font-size: 12px;
  margin-top: 30px;
  margin-bottom: 5px;
  text-align: center; }

.soc_buttons a {
  margin-left: 3px; }

.soc_buttons a:hover {
  text-decoration: none; }

.auth_button,
.main_menu_bt {
  border: none;
  background-color: transparent;
  font-size: 24px; }

.wraper_logo {
  /*display:inline-block;*/
  /*width: 100%;*/
  /*padding: 0;*/
  /*margin-bottom: 20px;*/ }

.logo_img {
  width: 250px;
  /*height: 250px;*/
  text-align: center; }

.logo_img a {
  text-decoration: none; }

.logo_img a:hover h1 {
  color: yellow; }

.logo_img h1 {
  text-align: center;
  font-size: 92px;
  font-family: "RobotoBold", sans-serif;
  color: #fff;
  margin-top: 0px;
  text-shadow: 1px 3px 5px rgba(0, 0, 0, 0.6); }

.logo_text {
  margin-top: -55px;
  /*text-align: center;*/ }

.logo_title h1 {
  font-family: "RobotoRegular", sans-serif;
  color: yellow;
  font-size: 50px; }

.logo_title a {
  color: yellow; }

.logo_title a:hover {
  text-decoration: none; }

.logo_title h1:hover {
  color: yellow;
  text-decoration: underline; }

.greeting h3 {
  color: #fff;
  font-family: "RobotoRegular", sans-serif;
  font-size: 30px;
  text-shadow: 1px 3px 5px rgba(0, 0, 0, 0.6);
  margin-top: 75px;
  text-align: left;
  font-size: 32px;
}

.greeting #slog {
  position: absolute;
  color: yellow;
  font-family: "RobotoRegular", sans-serif;
  text-shadow: 1px 3px 5px rgba(0, 0, 0, 0.6);
  font-size: 18px;
  top: 151px; }

.notice {
  border: 2px dashed '. $templateBackgroundColor .' !important;
  margin-top: 10px;
  height: 80px;
  padding: 10px;
  background-color: #fff;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); }

.notice span {
  color: red;
  padding: 3px; }

.wraper_logo .greeting .row .col-md-3 {
  padding-top: 70px;
  padding-right: 0px; }

.wraper_logo .greeting .btn.btn-success {
  background-color: '. $templateBackgroundColor .' !important;
  border: 1px solid white;
  vertical-align: center;
  font-size: 22px;
  margin-top: 5px;
  margin-bottom: 5px;
  padding-bottom: 5px;
  padding: 5px;
  width: 100%;
  /*height: 50px;*/
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  text-shadow: 1px 3px 5px rgba(0, 0, 0, 0.6); 
}

.wraper_logo .greeting #btn_mail.btn.btn-success {
  margin-bottom: 15px; }

.wraper_logo .btn.btn-success:hover {
  color: yellow;
	border:1px solid yellow;
  }

.top_header {
  background-color: '. $headerColor .' !important; }

.main_adsense {
  color: #1d1d1d;
  height: 200px;
  padding: 10px;
  background-color: #fff;
  margin-top: 20px;
  margin-right: -10px;
  margin-bottom: 10px;
  border: 2px solid #31B0D5;
  overflow: hidden;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); }

/*====== Главное меню ======== */
.main_menu {
  top: 40px;
  width: 1170px;
  height: 50px;
  z-index: 100;
  background-color: #43484C;
  color: #fff;
  margin-right: -15px;
  margin-left: -15px;
  margin-top: 10px;
  margin-bottom: 20px;
  /*margin-top: 10px;*/
  -webkit-border-radius: 0.3em;
          border-radius: 0.3em;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  border: 1px solid #fff; }

nav.main_menu.stickytop {
  position: fixed;
  top: 40px; }

/*	.path_links{
		background-color: $blue;
		color: $white;
		width: 100%;
		padding: 5px;
		border-bottom-left-radius:1em;
		border-bottom-right-radius:1em;
		}*/
.path_links {
  background-color: #43484C;
  border: 1px solid #fff;
  -webkit-border-radius: 0.3em;
          border-radius: 0.3em;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  color: #fff;
  padding: 5px;
  width: 100%; }

.path_links p {
  padding-top: 5px;
  margin-left: 40px; }

.path_links a {
  color: #fff; }

.path_links a:hover {
  color: yellow;
  text-decoration: none; }

.path_links span.active {
  color: yellow; }

.main_menu a {
  color: #fff;
  padding: 10px 15px;
  display: block;
  -webkit-transition: all .25s;
  transition: all .25s; }

.main_menu a:hover {
  background-color: '. $templateBackgroundColor .' !important;
  color: yellow;
  text-decoration: none; }

.active a:hover {
  //background-color: '. $headerColor .';
  text-decoration: none; }

.main_menu ul li span.header {
  color: #fff;
  padding: 10px 15px;
  -webkit-transition: all .25s;
  transition: all .25s;
  cursor: pointer; }

.main_menu ul li span.header > i {
  padding-left: 3px; }

.main_menu ul li span.header:hover {
  background-color: '. $templateBackgroundColor .' !important;
  color: yellow;
  text-decoration: none; }

.main_menu ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
  vertical-align: middle;
  text-transform: uppercase; }

.main_menu ul li {
  display: inline-block;
  position: relative;
  margin-left: -3px;
  margin-right: -3px; }

.main_menu ul li a {
  padding-left: 0px;
  padding-right: 0px; }

.main_menu ul li.home a {
  padding-left: 15px;
  padding-right: 15px; }

.main_menu ul li.home a:hover {
  background-color: '. $templateBackgroundColor .' !important;
  -webkit-border-bottom-left-radius: 0.3em;
          border-bottom-left-radius: 0.3em;
  -webkit-border-top-left-radius: 0.3em;
          border-top-left-radius: 0.3em; }

.main_menu ul li.home.active {
  color: yellow;
  background-color: '. $templateBackgroundColor .' !important;
  -webkit-border-bottom-left-radius: 0.3em;
          border-bottom-left-radius: 0.3em;
  -webkit-border-top-left-radius: 0.3em;
          border-top-left-radius: 0.3em; }

.main_menu ul li.home {
  margin-left: 0px;
  margin-right: 0px;
  -webkit-border-bottom-left-radius: 0.3em;
          border-bottom-left-radius: 0.3em;
  -webkit-border-top-left-radius: 0.3em;
          border-top-left-radius: 0.3em; }

.main_menu ul li.home.active a {
  color: yellow; }

.main_menu ul li.active {
  background-color: '. $templateBackgroundColor .' !important;
  /*border:1px solid $yellow;*/ }

.main_menu ul li.active > span {
  color: yellow;
  background-color: '. $templateBackgroundColor .' !important; }

.main_menu ul li ul {
  background-color: '. $templateBackgroundColor .' !important;
  left: 0;
  top: 35px;
  border: 2px solid '. $templateBackgroundColor .' !important; }

.main_menu ul li ul li {
  display: inline-block;
  width: 100%;
  margin-left: 0px;
  margin-right: 0px; }

.main_menu ul li ul li:hover {
  border: 1px solid yellow; }

.main_menu ul li ul li.active a {
  color: yellow;
  background-color: '. $templateBackgroundColor .' !important; }

.main_menu ul li ul li a {
  display: block;
  width: 100%;
  float: left;
  background-color: #fff;
  padding-left: 15px;
  padding-right: 15px; }

.main_menu ul li ul li a:hover {
  background-color: '. $templateBackgroundColor .' !important;
  color: yellow; }

nav.main_menu .run_string {
  display: block;
  padding-top: 10px; }

.icon_chevron {
  display: inline-block; }

.icon_chevron .fa-chevron-right.fa-lg {
  position: absolute;
  top: 18px;
  left: 29px; }

.icon_chevron .fa-chevron-right.fa-2x {
  position: absolute;
  top: 10px;
  left: 12px;
  color: '. $headerColor .' !important; }

.icon_chevron .fa-chevron-right {
  position: absolute;
  top: 18px;
  left: 8px;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
  color: #fff; }

.string_content {
  display: inline-block;
  margin-left: 40px;
  margin-top: -4px;
  color: #06fc23;
  font-size: 24px; }

.string_content span {
  color: yellow; }

.string_content marquee {
  position: absolute;
  top: 7px;
  left: 50px; }

.main_menu_bt {
  color: #fff;
  padding: 3px 10px;
  float: left;
  vertical-align: middle;
  background-color: '. $headerColor .' !important;
  width: 100%; }

section.content {
  -webkit-align-content: right;
      -ms-flex-line-pack: right;
          align-content: right;
  background-color: '. $templateBackgroundColor .' !important; }

/*Стиль слайдера*/
.main_slider {
  padding: 5px;
  background-color: #fff;
  border: 3px solid '. $headerColor .' !important; }

.main_slider img {
  width: 500px;
  height: 300px !important; }

.main_slider .item {
  background-color: #fff; }

.main_slider .carousel-caption {
  /*position: absolute;*/
  top: -35px;
  left: 550px;
  text-align: left;
  width: 550px; }

.main_slider .carousel-caption .item_text {
  text-align: left;
  width: 400px;
  height: 150px;
  overflow: hidden; }

.main_slider .item h3 {
  color: '. $templateBackgroundColor .' !important;
  height: 55px;
  width: 100%;
  overflow: hidden; }

.main_slider .item h3 > a:hover {
  color: '. $headerColor .' !important;
  background-color: transparent;
  text-decoration: underline; }

.main_slider .item p {
  color: #1d1d1d; }

.main_slider .carousel-caption a.btn {
  margin-top: 20px; }

/* Элементы управления слайдером */
.carousel-indicators {
  position: absolute;
  bottom: -47px;
  left: 70%;
  list-style: outside none none;
  margin-left: -30%;
  padding-left: 0;
  text-align: center;
  width: 20%;
  z-index: 15;
  background-color: '. $headerColor .' !important;
  -webkit-border-bottom-right-radius: 1em;
          border-bottom-right-radius: 1em;
  -webkit-border-bottom-left-radius: 1em;
          border-bottom-left-radius: 1em;
  -webkit-border-top-left-radius: 0em;
          border-top-left-radius: 0em;
  -webkit-border-top-right-radius: 0em;
          border-top-right-radius: 0em; }

.carousel-indicators li {
  background-color: #1d1d1d;
  border: 2px solid #fff;
  -webkit-border-radius: 10px;
          border-radius: 10px;
  cursor: pointer;
  display: inline-block;
  height: 20px;
  margin: 1px;
  text-indent: -999px;
  width: 20px;
  margin-top: 5px; }

.carousel-indicators li.active {
  background-color: yellow;
  border: 2px solid #fff;
  -webkit-border-radius: 10px;
          border-radius: 10px;
  cursor: pointer;
  display: inline-block;
  height: 20px;
  margin: 1px;
  text-indent: -999px;
  width: 20px; }

/* Конец стилей слайдера */
/* Слайдер рекламных банеров */
.owl-carousel {
  height: 195px;
  margin-top: 0px;
  margin-bottom: 10px;
  padding-left: 60px;
  padding-right: 40px;
  padding-top: 20px;
  padding-bottom: 20px;
  background-color: #fff;
  text-align: center;
  border: 3px solid '. $headerColor .';
  -webkit-border-radius: 0.3em;
          border-radius: 0.3em;
  -webkit-box-shadow: 0px 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0px 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); }

.owl-carousel .owl-stage-outer {
  margin-left: 8px; }

#bottom_baners.owl-carousel {
  height: 195px;
  margin-top: 20px;
  margin-bottom: 20px;
  padding-left: 65px;
  padding-right: 40px;
  padding-top: 20px;
  padding-bottom: 20px;
  background-color: #fff;
  border: 3px solid #31B0D5;
  -webkit-border-radius: 0.3em;
          border-radius: 0.3em;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); }

.owl-carousel .item {
  width: 220px;
  height: 150px; }

.owl-carousel .item img {
  width: 220px;
  height: 150px; }

.owl-controls {
  position: relative; }

.owl-nav {
  position: relative; }

.owl-prev {
  position: absolute;
  top: -202px;
  left: 0;
  height: 189px;
  width: 65px;
  opacity: .7;
  text-align: center;
  background-image: -webkit-linear-gradient(right, transparent 0px, '. $templateBackgroundColor .' 100%);
  background-image: linear-gradient(to left, transparent 0px, '. $templateBackgroundColor .' 100%);
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
  z-index: 90;
  cursor: pointer; }

.owl-next {
  position: absolute;
  top: -202px;
  right: 0;
  height: 189px;
  width: 65px;
  opacity: .7;
  text-align: center;
  background-image: -webkit-linear-gradient(left, transparent 0px, '. $templateBackgroundColor .'  100%);
  background-image: linear-gradient(to right, transparent 0px, '. $templateBackgroundColor .'  100%);
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
  z-index: 90;
  cursor: pointer; }

#ban_prev.owl-prev {
  height: 195px;
  top: -215px; }

#ban_next.owl-next {
  height: 195px;
  top: -215px; }

.owl-prev:hover {
  opacity: .9;
  cursor: pointer; }

.owl-next:hover {
  opacity: .9;
  cursor: pointer; }

.owl-prev:hover.owl-prev i {
  color: yellow; }

.owl-next:hover.owl-next i {
  color: yellow; }

.owl-prev i {
  margin-top: 85px;
  color: '. $templateBackgroundColor .' !important;
  z-index: 95;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6); }

.owl-next i {
  margin-top: 85px;
  color: '. $templateBackgroundColor .' !important;
  z-index: 95;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6); }

.owl-next i:hover {
  color: yellow; }

.owl-prev i:hover {
  color: yellow; }

.btn-control {
  position: absolute;
  left: 45%;
  bottom: 30px;
  z-index: 20; }

/* Конец стилей Слайдера рекламных банеров */
.hidden {
  display: none; }

.login_form h3 {
  margin: 15px auto;
  color: #31B0D5;
  text-align: center;
  text-transform: uppercase; }

.block_sidebar {
  margin-top: 20px;
  margin-bottom: 20px; }

  .block_sidebar .col-xs-6.col-md-12  {
		padding: 0px;
  }

.header_panel {
  background-color: '. $templateBackgroundColor .' !important;
  border: 1px solid #fff;
  -webkit-border-radius: 0.3em 0.3em 0.5em 0.5em;
          border-radius: 0.3em 0.3em 0.5em 0.5em;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  height: 40px; }

.title_panel {
  color: #fff;
  font-family: "RobotoRegular", sans-serif;
  font-size: 20px;
  margin: 0;
  padding-top: 8px;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
  text-transform: uppercase; }

.body_panel {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background-color: #fff;
  -webkit-border-bottom-left-radius: 0.5em;
          border-bottom-left-radius: 0.5em;
  -webkit-border-bottom-right-radius: 0.5em;
          border-bottom-right-radius: 0.5em;
  border-color: currentcolor '. $templateBackgroundColor .' !important '. $templateBackgroundColor .' !important;
  -webkit-border-image: none;
       -o-border-image: none;
          border-image: none;
  border-style: none solid solid;
  border-width: medium 2px 2px;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  height: 100%;
  margin: 1px 10px;
  padding: 10px; }

.body_panel ul {
  list-style-type: none;
  padding-left: 5px; }

.body_panel ul a {
  display: block;
  padding: 3px;
  padding-left: 8px;
  border-bottom: 1px dashed grey;
  color: '. $templateBackgroundColor .' !important; }

.body_panel ul a:hover {
  background-color: '. $templateBackgroundColor .' !important;
  color: yellow;
  text-decoration: none;
  border-bottom: 1px dashed yellow;
  -webkit-transition: all .35s;
  transition: all .35s; }

.body_panel ul li.active a {
  color: yellow;
  background-color: '. $templateBackgroundColor .' !important; }

.body_panel ul li a img {
  margin-top: 5px;
  padding: 5px;
  width: 180px;
  height: 150px; }

.wrap_panel {
  margin-bottom: 30px;
  height: 100%; }

.ad_posts {
  margin-top: 20px;
  margin-bottom: 20px;
  /*border: $green-light 3px solid;*/
  -webkit-border-radius: 0.3em;
          border-radius: 0.3em;
  padding-top: 40px;
  height: 200px;
  background-color: #fff;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); }

.ad_posts img {
  width: 222px;
  height: 150px; }

.part_links {
  margin-top: 5px;
  margin-bottom: 20px;
  border: '. $headerColor .' 3px solid;
  -webkit-border-radius: 0.3em;
          border-radius: 0.3em;
  /*padding-top: 20px;*/
  /*height: 200px;*/
  background-color: #fff;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); }

.part_links div {
  padding: 5px; 
}

.part_links div img.map {
  width: 100%; }

.part_links h2 {
  color: '. $headerColor .' !important;
  font-family: "RobotoRegular", sans-serif;
  font-size: 20px;
  margin-bottom: 20px;
  margin-top: 20px;
  padding-left: 15px;
  text-transform: uppercase; }

.part_links ul {
  list-style: square outside; }

.part_links ul li {
  color: '. $templateBackgroundColor .' !important; }

.part_links ul li a {
  color: '. $templateBackgroundColor .' !important; }

.list_posts {
  background-color: #fff;
  border: 2px solid '. $templateBackgroundColor .' !important;
  -webkit-border-radius: 0.3em;
          border-radius: 0.3em;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  margin-top: 20px;
  margin-bottom: 20px;
  padding: 5px; }

.post {
  border: '. $headerColor .' !important 1px dashed;
  padding: 5px;
  background-color: #fff;
  margin-bottom: 20px; }

.post_header {
  background-color: '. $templateBackgroundColor .' !important;
  border: 1px solid #fff;
  -webkit-border-radius: 0.1em;
          border-radius: 0.1em;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  margin: 0;
  padding: 10px; }

.post_header h1 {
  display: block;
  color: #fff;
  font-size: 1.17em;
  line-height: 1.37em;
  margin: 0;
  padding-left: 20px;
  padding-top: 5px;
  text-align: left;
  text-transform: uppercase; }

.post_header a {
  text-decoration: none; }

.post_header a h1:hover {
  color: yellow;
  text-decoration: underline; }

.post_content {
  display: block;
  margin: 20px; }

.post_image {
  display: block;
  float: left; }

.post_image img {
  max-width: 250px;
  max-height: 200px;
  margin-right: 20px;
  margin-bottom: 20px;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  border: 1px solid #43484C; }

.post_text {
  display: block;
  margin-bottom: 60px;
  min-height: 200px; }

 .post_text a{
 	color:'. $headerColor .' !important;
 }

.post_info {
  position: relative;
  padding: 10px; }

.post_info button {
  position: absolute;
  right: 20px;
  bottom: -7px;
  display: block;
  padding-top: 10px;
  border: 1px solid #fff;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
  margin-bottom: 30px;
  background-color: '. $templateBackgroundColor .' !important; }

.post_info button:hover {
  background-color: '. $templateBackgroundColor .' !important;
  color: yellow; }

.post_metainfo {
  border: 2px solid '. $templateBackgroundColor .' !important;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  margin-bottom: 10px; }

.post_metainfo ul {
  display: inline-block;
  margin: 0 15px;
  padding: 0; }

.post_metainfo li {
  display: block;
  float: left;
  margin: 0 auto;
  font-size: 0.85em;
  line-height: 2.1em; }

.post_metainfo li span {
  padding-right: 10px;
  padding-left: 10px; }

.post_category {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
      -ms-flex-pack: justify;
          justify-content: space-between;
  margin: 5px auto;
  border-bottom: '. $headerColor .' !important 1px solid;
  width: 95%; }

.post_category img {
  margin-left: 10px; }

.post_category .category a {
  color: '. $templateBackgroundColor .' !important; }

.post_category .btn-group a {
  color: #1d1d1d; }

.post_rating {
  padding-left: 10px; }

.pag_block {
  background-color: #fff;
  border: 2px solid '. $templateBackgroundColor .' !important;
  -webkit-border-radius: 45px;
          border-radius: 45px;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  margin: 10px auto;
  padding: 0;
  margin-bottom: 20px;
  margin-top: 20px; }

.pages {
  display: block;
  margin: 5px auto;
  width: 98%;
  -webkit-border-radius: 35px;
          border-radius: 35px; }

.wraper_ul {
  display: block;
  margin: 0 auto;
  vertical-align: middle;
  text-align: center; }

.pages ul {
  display: inline-block;
  margin-bottom: -6px;
  padding: 0; }

.pages ul li {
  display: block;
  float: left;
  padding: 5px;
  margin: 0 auto; }

.pages ul li a {
  background-color: '. $templateBackgroundColor .' !important;
  border: 3px solid '. $headerColor .' !important;
  -webkit-border-radius: 2em;
          border-radius: 2em;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  color: #fff;
  display: block;
  font-size: 18px;
  padding: 10px;
  text-align: center;
  width: 50px; }

.pages ul li a.first {
  background-color: '. $templateBackgroundColor .' !important;
  border: 3px solid '. $headerColor .' !important;
  -webkit-border-radius: 2em;
          border-radius: 2em;
  color: #fff;
  display: block;
  font-size: 18px;
  padding: 10px;
  text-align: center;
  width: 50px; }

.pages ul li a.end {
  background-color: '. $templateBackgroundColor .' !important;
  border: 3px solid '. $headerColor .' !important;
  -webkit-border-radius: 2em;
          border-radius: 2em;
  color: #fff;
  display: block;
  font-size: 18px;
  padding: 10px;
  text-align: center;
  width: 50px; }

.pages ul li a:hover {
  background-color: '. $templateBackgroundColor .' !important;
  border: 3px dashed yellow;
  color: yellow;
  text-decoration: none; }

.pages ul li a.active {
  background-color: '. $templateBackgroundColor .' !important;
  border: 3px dashed yellow;
  color: yellow; }

.footer_subscribe {
  background-color: #1d1d1d;
  padding: 10px 0;
  color: #fff;
  min-height: 20px;
  text-align: center;
  border-bottom: 1px dashed #fff; }

.footer_subscribe form {
  /*margin-left: 250px;*/ }

.footer_subscribe .form-group {
  margin-left: 10px;
  margin-right: 10px; }

.footer_subscribe label {
  margin-top: 5px;
  margin-right: 5px;
  margin-left: 5px; }

.footer_subscribe button {
  margin-left: 5px; }

.footer_topline {
  background-color: #43484C;
  padding: 10px 0;
  color: '. $headerColor .' !important;
  min-height: 30px; }

.footer_left_block {
  width: 100%;
  float: left; }

.footer_left_block li {
  list-style-type: square; }

.footer_left_block li:hover {
  color: yellow; }

.footer_left_block a {
  text-decoration: none;
  color: #fff; }

.footer_left_block a:hover {
  text-decoration: none;
  color: yellow; }

.footer_center_block {
  width: 100%;
  float: center; }

.footer_center_block p {
  color: #fff; }

.footer_center_block a {
  color: yellow; }

.footer_center_block span {
  font-size: 18px;
  color: yellow; }

.footer_right_block {
  float: right; }

.skype {
  margin: 10px; }

.skype i {
  color: #31B0D5;
  font-size: 20px; }

.skype span {
  margin-left: 10px;
  font-size: 18px;
  color: yellow; }

.mobile {
  margin: 10px; }

.mobile i {
  color: #31B0D5;
  font-size: 24px; }

.mobile span {
  margin-left: 10px;
  font-size: 18px;
  color: yellow; }

.email {
  margin: 10px; }

.email i {
  color: #31B0D5;
  font-size: 18px; }

.email span {
  margin-left: 10px;
  font-size: 18px;
  color: yellow; }

.footer_bottomline {
  background-color: #1d1d1d;
  padding: 10px 0;
  color: #fff;
  min-height: 20px;
  text-align: center;
  border-top: 1px dashed #fff; }

.footer_bottomline span {
  font-size: 14px; }

/* Стили страницы main*/
.modules {
  margin-top: 5px 0;
  border: '. $headerColor .' 3px solid;
  -webkit-border-radius: 0.3em;
          border-radius: 0.3em;
  padding: 5px;
  background-color: #fff;
  width: 100%;
  margin-bottom: 10px; 
}

.main_content {
  margin-top: 5px 0;
  margin-bottom: 10px;
  border: '. $headerColor .' !important 3px solid;
  -webkit-border-radius: 0.3em;
          border-radius: 0.3em;
  padding: 5px;
  background-color: #fff;
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); }

.post-row {
  display: inline-block;
  margin-top: 15px;
  padding: 5px;
  padding-bottom: 55px;
  width: 100%;
  position: relative; }

.post-row h2 {
  font-size: 20px;
  color: '. $headerColor .' !important;
  padding-left: 15px;
  text-transform: uppercase;
  margin-bottom: 10px;
  margin-top: 0;
  font-family: "RobotoRegular", sans-serif; }

.article-row {
  display: inline-block;
  margin-top: 0px;
  padding: 5px;
  /*padding-bottom: 55px;*/
  width: 100%;
  position: relative;
  overflow: hidden; }

.article-row h2 {
  font-size: 20px;
  color: '. $headerColor .' !important;
  padding-left: 15px;
  text-transform: uppercase;
  margin-bottom: 10px;
  margin-top: 0;
  font-family: "RobotoRegular", sans-serif; }

.article-row .col-sm-12 {
  text-align: center; }

.article-row .all_news .btn-success{
	background-color: '. $templateBackgroundColor .' !important;
}

.article-row .all_news .btn-success:hover{
	color: yellow;
}

/* Виджет модуля новости */
.post_widget {
  margin-bottom: 10px;
  border: 1px solid '. $headerColor .' !important;
  padding-top: 0px;
  text-align: center;
  position: relative;
  height: 200px;
  overflow: hidden;
  /* Скрытие контента, если он превышает размер блока */
  -webkit-transition: all .5s;
  transition: all .5s; }

.post_widget:hover {
  /* box-shadow: 0 0 16px rgba(0,0,0, .5); */
  border: none;
  overflow: visible;
  z-index: 30; }

.post_widget > div {
  position: absolute;
  width: 100%;
  top: 0;
  left: 0;
  -webkit-box-shadow: 0 0 16px rgba(0, 0, 255, 0.5);
          box-shadow: 0 0 16px rgba(0, 0, 255, 0.5); }

.post_widget > div:hover {
  border: 1px solid '. $headerColor .' !important; }

.post_widget h3 {
  background-color: '. $headerColor .' !important;
  font-size: .95em;
  font-weight: 300;
  padding: 5px;
  margin-top: 0px;
  margin-bottom: 0px;
  height: 100px;
  width: 100%;
  text-align: auto;
  overflow: hidden; }

.post_widget h3 > a {
  color: #fff; }

.post_widget h3 > a:hover {
  color: yellow;
  text-decoration: none;
  background-color: transparent; }

.post_img {
  /*height: 160px;*/
  padding-top: 0px; }

.post_img img {
  width: 100%;
  height: 100%; }

/* Виджет модуля главной статьи */
.article_main_widget {
  margin-bottom: 0px;
  padding-top: 0px;
  text-align: left;
  position: relative;
  overflow: hidden;
  /* Скрытие контента, если он превышает размер блока */
  border: 1px solid '. $templateBackgroundColor .' !important ;
  height: 342px;
  z-index: 10; }

.article_main_widget:hover {
  border: none;
  overflow: visible;
  z-index: 30; }

.article_main_widget > div {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  -webkit-box-shadow: 0 0 16px rgba(78, 198, 152, 0.5);
          box-shadow: 0 0 16px rgba(78, 198, 152, 0.5);
  overflow: hidden;
  /* Скрытие контента, если он превышает размер блока */ }

.article_main_widget > div:hover {
  border: 1px solid '. $templateBackgroundColor .' !important;
  background-color: #fff; }

.article_main_widget > div:hover .article_main_img {
  border: none; }

.article_main_widget > div:hover .article_main_img img {
  opacity: .2;
  /*visibility:  hidden;*/ }

.article_main_widget h3 {
  font-size: 1.25em;
  font-weight: 300;
  padding: 5px;
  margin-top: 0px;
  margin-bottom: 0px;
  height: 100px;
  text-align: left;
  padding-left: 10px;
  /*overflow: hidden;  Скрытие контента, если он превышает размер блока */ }

.article_main_widget h3 > a {
  color: #1d1d1d; }

.article_main_widget h3 > a:hover {
  color: '. $headerColor .' !important;
  text-decoration: none;
  background-color: transparent; }

.article_main_img {
  /*border: 1px solid #43484C;*/ }

.article_main_img img {
  width: 100%;
  height: 100%;
  padding: 5px; }

.article_main_img a {
  display: block; }

.article_main_img a:hover {
  background-color: #fff; }

.article_main_content {
  position: absolute;
  top: 75%;
  left: 0px;
  width: 100%;
  height: 100%;
  padding: 5px;
  overflow: hidden;
  background-color: #fff;//'. $headerColor .' !important;
  /*opacity:1;*/
  -webkit-transition: all 1s;
  transition: all 1s; }

.article_main_widget > div:hover .article_main_content {
  position: absolute;
  top: 0px;
  /*opacity: 1;*/ }

.article_main_header {
  display: inline-block;
  /*border-bottom: 1px solid '. $templateBackgroundColor .' !important; */
}

.article_main_header .data {
  background-color: '. $templateBackgroundColor .' !important;
  opacity: .7;
  margin-top: -10px;
  text-align: center;
  display: inline-block;
  float: left;
  width: 20%;
  height: 100%; }

.article_main_header .data span.day {
  float: left;
  opacity: 1;
  text-align: center;
  width: 100%;
  font-size: 32px;
  color: yellow; }

.article_main_header .data span.month {
  float: left;
  opacity: 1;
  margin-top: -5px;
  padding: 0;
  text-transform: uppercase;
  text-align: center;
  width: 100%;
  font-size: 16px;
  color: #fff; }

.article_main_header .data span.year {
  float: left;
  margin-top: -5px;
  opacity: 1;
  padding: 0;
  text-transform: uppercase;
  width: 100%;
  font-size: 18px;
  color: yellow; }

.article_main_header h3 {
  margin-top: -5px;
  float: left;
  width: 80%;
  height: 100%; }

.article_main_header h3 a {
  color: #1d1d1d; }

.article_main_header h3 a:hover {
  color: #1d1d1d;
  text-decoration: underline; }

  .article_main_post a{
  	color: '. $headerColor .' !important;
  }

  .article_main_post a:hover{
  	text-decoration:underline;
  	background-color: transparent;
  }

.article_main_post > a {
  color: #1d1d1d; }

.article_main_post > a:hover {
  text-decoration: none;
  background-color: transparent;
  color: #1d1d1d; }

/*Конец вида главной статьи */
/* Виджет модуля статьи */
.article_widget {
  margin-bottom: 20px;
  padding-top: 0px;
  text-align: left;
  position: relative;
  height: 100px;
  overflow: hidden;
  /* Скрытие контента, если он превышает размер блока */
  z-index: 10;
  border: 1px dotted #43484C; }

.article_widget:hover {
  border: none;
  overflow: visible;
  z-index: 30; }

.article_widget:hover .article_img {
  opacity: 0; }

.article_widget:hover .article_header {
  opacity: 0; }

.article_widget:hover .article_post {
  left: 0;
  opacity: 1; }

.article_widget h3 {
  font-size: 1.25em;
  font-weight: 300;
  padding: 5px;
  margin-top: 0px;
  margin-bottom: 0px;
  height: 100px;
  text-align: left;
  overflow: hidden;
  /* Скрытие контента, если он превышает размер блока */ }

.article_widget h3 > a {
  color: #1d1d1d; }

.article_widget h3 > a:hover {
  color: '. $headerColor .' !important;
  text-decoration: none;
  background-color: transparent; }

.article_img {
  padding-top: 0px;
  float: left;
  width: 150px;
  height: 100px;
  -webkit-transition: all .5s;
  transition: all .5s; }

.article_img img {
  width: 100%;
  height: 100%;
  padding: 5px; }

.article_img a {
  display: block;
  width: 150px;
  height: 100px; }

.article_img a:hover {
  background-color: #fff; }

.article_header {
  position: relative;
  float: left;
  height: 100px;
  width: 70%;
  padding: 5px;
  overflow: hidden;
  -webkit-transition: all .5s;
  transition: all .5s; }

.article_header h3 {
  margin-top: 10px; }

.article_header .article_data {
  position: absolute;
  top: 0px;
  left: 10px;
  color: '. $templateBackgroundColor .' !important;
  font-size: 14px; }

.article_post {
  position: absolute;
  top: 0;
  left: 100%;
  height: 100px;
  padding: 7px;
  overflow: hidden;
  opacity: 1;
  -webkit-transition: all .5s;
  transition: all .5s;
  border: 1px dotted #43484C; }

.article_post a {
  color: '. $templateBackgroundColor .' !important; }

.article_post a:hover {
  background-color: transparent; }

/* Стиль Табов */
.tab-content {
  -webkit-box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); }

.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background-color: #fff;
  border-color: #ddd #ddd transparent;
  -webkit-border-image: none;
       -o-border-image: none;
          border-image: none;
  border-style: solid;
  border-width: 1px;
  cursor: default;
  color: yellow;
  font-size: 1.2em;
  background-color: '. $headerColor .' !important;
  /*border-radius: 15px 15px 0 0;*/ }

.nav-tabs > li > a {
  border: 1px solid transparent;
  -webkit-border-radius: 4px 4px 0 0;
          border-radius: 4px 4px 0 0;
  line-height: 1.42857;
  margin-right: 2px;
  font-size: 1.2em;
  text-transform: uppercase;
  background-color: #31B0D5;
  /*border-radius: 15px 15px 0 0;*/
  color: #fff;
  padding: 3px 15px; }

.nav-tabs > li > a:hover {
  background-color: #31B0D5;
  color: yellow;
  /*border-radius: 15px 15px 0 0;*/ }

.tab-content > .active {
  display: block; }

.tab-content {
  border-bottom: 1px solid #ddd;
  border-left: 1px solid #ddd;
  border-right: 1px solid #ddd; }

/* Стили модуля Розыск (wanted) */
.nav-tabs#Wanted > li.active > a, .nav-tabs#Wanted > li.active > a:focus, .nav-tabs#Wanted > li.active > a:hover {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background-color: #fff;
  border-color: #ddd #ddd transparent;
  -webkit-border-image: none;
       -o-border-image: none;
          border-image: none;
  border-style: solid;
  border-width: 1px;
  cursor: default;
  color: yellow;
  font-size: 1.2em;
  background-color: '. $headerColor .' !important;
  /*border-radius: 15px 15px 0 0;*/ }

.tab-content#content_wanted > .active {
  /*border-top: 1px solid $orange;*/
  display: block;
  /*border-radius: 0px 0px 10px 10px;*/ }

.nav-tabs#Wanted > li > a {
  background-color: #31B0D5;
  color: #fff;
  /*border-radius: 15px 15px 0px 0px;*/
  padding: 3px 15px; }

.nav-tabs#Wanted > li > a:hover {
  background-color: #31B0D5;
  color: yellow;
  /*border-radius: 15px 15px 0px 0px;*/ }

/* Виджет модуля розыска */
#content_wanted .post_widget {
  margin-bottom: 10px;
  border: 1px solid #31B0D5;
  padding-top: 0px;
  text-align: center;
  position: relative;
  height: 200px;
  overflow: hidden;
  /* Скрытие контента, если он превышает размер блока */
  -webkit-transition: all .5s;
  transition: all .5s; }

#content_wanted .post_widget:hover {
  /* box-shadow: 0 0 16px rgba(0,0,0, .5); */
  border: none;
  overflow: visible;
  z-index: 30; }

#content_wanted .post_widget > div {
  position: absolute;
  width: 100%;
  top: 0;
  left: 0;
  -webkit-box-shadow: 0 0 24px rgba(0, 0, 255, 0.5);
          box-shadow: 0 0 24px rgba(0, 0, 255, 0.5); }

#content_wanted .post_widget > div:hover {
  border: 1px solid #31B0D5; }

#content_wanted .post_widget h3 {
  background-color: #31B0D5;
  font-size: .95em;
  font-weight: 300;
  padding: 5px;
  margin-top: 0px;
  margin-bottom: 0px;
  height: 100px;
  width: 100%;
  text-align: auto;
  overflow: hidden; }

.post_widget h3 > a {
  color: #fff; }

.post_widget h3 > a:hover {
  color: yellow;
  text-decoration: none;
  background-color: transparent; }

.post_img {
  height: 160px;
  padding-top: 0px; }

.post_img img {
  width: 100%;
  height: 100%; }

.butt_wanted {
  /*padding-top: 0px;
  padding-left: 15px;
  margin: 0;*/
  padding-top: 20px;
  position: absolute;
  bottom: 0px;
  left: 20px; }

.butt_wanted button {
  margin-top: 10px;
  margin-right: 20px; }

/* Стили таба "Последние объявления" */
/* Стили модулей категории "Предложения" */
.modules_offer {
  border: 1px dashed #449d44;
  margin-top: 5px;
  margin-left: 5px;
  margin-right: -10px;
  margin-bottom: 5px;
  -webkit-border-bottom-left-radius: 10px;
          border-bottom-left-radius: 10px;
  -webkit-border-bottom-right-radius: 10px;
          border-bottom-right-radius: 10px;
  padding: 5px; }

.modules_offer h2 {
  margin: 0;
  padding: 3px;
  padding-left: 20px;
  color: #fff;
  font-size: 1.4em;
  background-color: #EC971F;
  border: 2px dashed #fff; }

/* Стили модулей категории "Спрос" */
.modules_demand {
  border: 1px dashed #449d44;
  margin-top: 5px;
  margin-left: -10px;
  margin-right: 5px;
  margin-bottom: 5px;
  -webkit-border-bottom-left-radius: 10px;
          border-bottom-left-radius: 10px;
  -webkit-border-bottom-right-radius: 10px;
          border-bottom-right-radius: 10px;
  padding: 5px; }

.modules_demand h2 {
  margin: 0;
  padding: 3px;
  padding-left: 20px;
  color: #fff;
  font-size: 1.4em;
  background-color: #449d44;
  border: 2px dashed #fff; }

/* Стили слайдера модуля поиска собаки  */
#carousel-wanted_pets {
  /*border: 1px dashed $green-light;*/
  background-color: #fff; }

#carousel-wanted_pets .carousel-inner {
  /*padding: 5px;*/
  height: 100%;
  background-color: #fff; }

#carousel-wanted_pets .carousel-inner .item {
  height: 300px; }

#carousel-wanted_pets .carousel-inner .item img {
  margin: 0px;
  padding: 15px;
  /*border: 1px solid #c1c1c1 ;*/
  height: 310px;
  width: 470px; }

#carousel-wanted_pets .carousel-inner .item .carousel-caption {
  padding: 0px;
  top: 0px;
  left: 50%;
  color: #1d1d1d;
  text-align: left;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
  z-index: 10;
  display: block;
  width: 590px; }

.carousel-caption h3 > a {
  color: '. $templateBackgroundColor .' !important; }

.caption-content {
  margin-left: -80px;
  width: 90%;
  height: 230px;
  overflow: hidden; }

.contact-info {
  margin-top: 10px;
  margin-left: -80px;
  padding: auto 5px;
  width: 109%;
  height: 55px;
  border: 1px solid #c1c1c1; }

.phone {
  display: inline-block;
  padding: 5px;
  float: left;
  font-size: 16px;
  height: 20px; }

.phone span {
  padding-right: 10px; }

#carousel-wanted_pets .contact-info .skype {
  display: inline-block;
  margin: 0;
  padding: 5px;
  float: left;
  font-size: 16px;
  height: 20px; }

#carousel-wanted_pets .contact-info .skype i {
  padding-right: 10px;
  color: #1d1d1d; }

.mail {
  display: inline-block;
  padding: 5px;
  float: left;
  font-size: 16px;
  height: 20px;
  /*width: 200px;*/ }

.mail span {
  padding-right: 10px; }

.mail a {
  color: #1d1d1d; }

.mail a:hover {
  color: red;
  background-color: transparent; }

#carousel-wanted_pets .carousel-inner .item .carousel-caption a.btn {
  margin-top: 10px;
  margin-left: -80px; }

/* Стили контролов*/
#carousel-wanted_pets .carousel-control.right {
  left: 90%;
  top: 15px;
  height: 280px;
  width: 100px;
  background-image: -webkit-linear-gradient(left, #1d1d1d 0px, rgba(0, 0, 0, 0.3) 100%);
  background-image: linear-gradient(to right, #1d1d1d 0px, rgba(0, 0, 0, 0.3) 100%);
  background-repeat: repeat-x;
  -webkit-border-bottom-left-radius: 0;
          border-bottom-left-radius: 0;
  -webkit-border-top-left-radius: 0;
          border-top-left-radius: 0; }

#carousel-wanted_pets .carousel-control.right:hover {
  background-color: #fff;
  -webkit-border-top-right-radius: 0.2em;
          border-top-right-radius: 0.2em;
  -webkit-border-bottom-right-radius: 0.2em;
          border-bottom-right-radius: 0.2em;
  background-image: -webkit-linear-gradient(left, #1d1d1d 0px, rgba(0, 0, 0, 0.5) 100%);
  background-image: linear-gradient(to right, #1d1d1d 0px, rgba(0, 0, 0, 0.5) 100%);
  background-repeat: repeat-x; }

#carousel-wanted_pets .carousel-control.left {
  top: 15px;
  left: 15px;
  height: 280px;
  width: 100px;
  background-image: -webkit-linear-gradient(right, #1d1d1d 0px, rgba(0, 0, 0, 0.3) 100%);
  background-image: linear-gradient(to left, #1d1d1d 0px, rgba(0, 0, 0, 0.3) 100%); }

#carousel-wanted_pets .carousel-control.left:hover {
  background-color: #fff;
  background-image: -webkit-linear-gradient(right, #1d1d1d 0px, rgba(0, 0, 0, 0.5) 100%);
  background-image: linear-gradient(to left, #1d1d1d 0px, rgba(0, 0, 0, 0.5) 100%);
  background-repeat: repeat-x; }

.search{
  border: 2px solid '. $templateBackgroundColor .' !important ;
  border-radius:3px ;
  padding: 20px 40px;
  margin-top: 15px;
  margin-bottom: 15px;
  
}

.subheading-category{
	color:'. $headerColor .' !important;
	padding-left: 10px;
	font-family: "RobotoBold",sant-serif;
	font-size: 24px;
}

		');
}

// Template color
if ($headerColor)
{
	// echo "Цвет установлен";
	$this->addStyleDeclaration('
		.top_header {
			background-color: '. $headerColor .' !important;
		}'
	);
}

if ($templateBackgroundColor)
{
	// echo "Цвет установлен";
	$this->addStyleDeclaration('
		.content {
			background-color: '. $templateBackgroundColor .';
		}'
	);
}


?>
<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<title><?php echo $sitename; ?></title>
	<jdoc:include type="head" />
</head>
<body>
	<header class="top_header">
		<div class="top_main_menu hidden-sm hidden-md hidden-lg">
			<!-- search module -->
			<?php if($showMobileSearch):?>
				<div class="form_search">
					<jdoc:include type="modules" name="position-17"/>
				</div>
			<?php endif;?>
			<!-- end search module -->
			<?php if($showMobileMenu):?>
				<jdoc:include type="modules" name="position-18"/>
			<?php endif;?>
		</div><!-- /.top_main_menu -->	
		<nav id="header_topline" class="navbar navbar-fixed-top">
			<div class="container">
				<div class="row">
					<div id="top" class="menu_icon visible-xs-block">						<i class="fa fa-bars fa-2x" aria-hidden="true"></i>
					</div>
					<?php if($showMessage):?>
						<div class="run_str display-xs-block hidden-sm hidden-md hidden-lg">
							<!-- Блок Внимание!!! -->
							<jdoc:include type="modules" name="position-3" style="message"/>
						</div>
					<?php endif;?>
					<?php if($showMenu):?>
						<!-- Модуль Меню -->
						<jdoc:include type="modules" name="position-4" style="default"/>
					<?php endif;?>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</nav>
		<div class="container">
			<div class="row">
				<div class="wraper_logo">
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php if($activePage == $defaultPage) :?>
							<div class="logo_img wow bounceInDown" data-wow-delay="1.5s">
								<?php else:?>
									<div class="logo_img">
									<?php endif;?>
									<a href="/">
										<h1><?php echo $site_name ?  $site_name : 'СКTA'?></h1>
									</a>
								</div>
								<?php if($activePage == $defaultPage) :?>
									<div class="phones wow fadeInLeft" data-wow-delay="2s">
										<?php else:?>
											<div class="phones">
											<?php endif;?>
											<?php if($showPhones):?>
												<jdoc:include type="modules" name="position-1" style="phones"/>
											<?php endif;?>
										</div>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-8">
										<div class="logo_text">
											<?php if($activePage == $defaultPage) :?>
												<div class="greeting wow bounceInRight" data-wow-duration="2s" data-wow-delay="0.5s" >
													<?php else:?>
														<div class="greeting">
														<?php endif;?>
														<div class="row">
															<div class="col-md-9 col-sm-9">
																<h3>
																	<?php echo $site_desc ?  $site_desc :'Система контроля кассового оборудования'?>
																</h3>
																<span id="slog">Управляйте своим бизнесом через Internet</span>
															</div>

															<!-- Кнопки Войти с ЭЦП и Почта -->
															<?php if ($showButtons):?>
																<div class="col-md-3 col-sm-3">
																	<jdoc:include type="modules" name="position-2"/>
																</div>
															<?php endif;?>
														</div>
													</div>
												</div>
											</div>
										</div><!-- /.wraper_logo -->
									</div>
									<div class="row">
										<div class="col-md-12">
											<nav class="main_menu affix-top" data-spy="affix" data-offset-top="150">
												<div class="col-md-8">
													<div class="run_string">
														<div class="icon_chevron">
															<i class="fa fa-chevron-right fa-2x" aria-hidden="true" ></i>
															<i class="fa fa-chevron-right fa-lg" aria-hidden="true" ></i>
															<i class="fa fa-chevron-right" aria-hidden="true" ></i>
														</div>
														<!-- Блок Внимание!!! Бегущая строка -->
														<?php if($showMessage):?>
															<div class="string_content">

																<jdoc:include type="modules" name="position-3" style="message"/>
															</div>
														<?php endif;?>

													</div>

												</div>
												<div class="col-md-4">
													<!-- search module -->
													<?php if($showSearch):?>
														<jdoc:include type="modules" name="position-0"/>
													<?php endif;?>
													<!-- end search module -->	
												</div>
											</nav>
										</div>
									</div>

								</div>
							</header>
							<section class="content">
								<div class="container">
									<?php if($showUpBanners):?>
										<div class="row">
											<!-- Блок Банеров!!! -->
											<jdoc:include type="modules" name="position-5" style="default"/>
										</div>
									<?php endif;?>
									<?php if($activePage != $defaultPage) :?>
										<div class="row main_content">
											<?php if($showBreadcrumbs):?>
												<div class="col-md-12">
													<!-- Модуль Путь ссылок -->
													<nav class="path_links">
														<jdoc:include type="modules" name="position-7"/>
													</nav>
												</div>
											<?php endif;?>

											<?php if($showSidebar):?>
												<!-- Контент -->
												<div class="col-md-9">
													<jdoc:include type="message" />
													<jdoc:include type="component" />
												</div>
												<!-- Сайдбар -->
												<div class="col-md-3">
													<!-- Модули Сайдбара -->
													<div class="block_sidebar">
														<jdoc:include type="modules" name="position-8"/>
													</div>	
												</div>
												<div class="clearfix"></div>
												<?php else:?>
													<!-- Контент -->
													<div class="col-md-12">
														<jdoc:include type="message" />
														<jdoc:include type="component" />
													</div>
													<div class="clearfix"></div>
												<?php endif;?>

												<!-- Путь ссылок -->
												<?php if($showBreadcrumbs):?>
													<div class="col-md-12">
														<!-- Модуль Путь ссылок -->
														<nav class="path_links">
															<jdoc:include type="modules" name="position-7"/>
														</nav>
													</div>
												<?php endif;?>
											</div><!-- /.row main_content -->
											<?php else :?>
												<div class="row">
													<div class="modules">
														<?php if($showNewsModule): ?>
															<jdoc:include type="modules" name="position-6" style="news"/>
														<?php endif; ?>
													</div><!-- /.modules -->
												</div><!-- /.row -->
											<?php endif;?>
											<?php if($showDownBanners):?>
												<div class="row">
													<!-- Блок Банеров!!! -->
													<jdoc:include type="modules" name="position-19" style="default"/>
												</div>
											<?php endif;?>

											<?php if($showRowModules): ?>
												<div class="row part_links">
													<?php if($showLeftModule): ?>
														<jdoc:include type="modules" name="position-10" style="left_block"/>
													<?php endif;?>
													<?php if($showCenterModule): ?>
														<jdoc:include type="modules" name="position-11" style="center_block"/>
													<?php endif;?>
													<?php if($showRightModule): ?>
														<jdoc:include type="modules" name="position-12" style="right_block"/>
													<?php endif;?>
												</div><!-- /.row part_links-->
											<?php endif;?>
										</div><!-- /.container -->
									</section>
									<footer class="wow pulse">
										<div class="main_footer">
											<div class="footer_subscribe">
												<div class="container">
													<div class="row">
														<?php if($showSubscribeModule): ?>
															<jdoc:include type="modules" name="position-9"/>
														<?php endif;?>
													</div>
												</div>
											</div>
											<?php if($showFooterModules): ?>
												<div class="footer_topline">
													<div class="container">
														<div class="row">
															<?php if($showFooterLeftModules): ?>
																<jdoc:include type="modules" name="position-13" style="footer_left_block"/>
															<?php endif;?>
															<?php if($showFooterCenterModules): ?>
																<jdoc:include type="modules" name="position-14" style="footer_center_block"/>
															<?php endif;?>
															<?php if($showFooterRightModules): ?>
																<jdoc:include type="modules" name="position-15" style="footer_right_block"/>
															<?php endif;?>
														</div><!-- /.row -->
													</div><!-- /.container -->
												</div><!-- /.footer_topline -->
											<?php endif;?>
											<?php if($showFooterBottomLine): ?>
												<div class="footer_bottomline">
													<div class="container">
														<div class="row">
															<jdoc:include type="modules" name="position-16"/>
														</div>
													</div>
												</div>
											<?php endif;?>
											<div class="clearfix"></div>
										</div>
									</footer>
									<div class="hidden">
									</div>
	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
<![endif]-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->

<!-- Подключение скриптов (Scripts) -->
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/libs/jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/libs/jquery-mousewheel/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/libs/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/libs/waypoints/waypoints-1.6.2.min.js"></script>
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/libs/scrollto/jquery.scrollTo.min.js"></script>
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/libs/owl-carousel2/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/libs/countdown/jquery.plugin.js"></script>
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/libs/countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/libs/countdown/jquery.countdown-ru.js"></script>
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/libs/landing-nav/navigation.js"></script>
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo JUri::base();?>templates/<?php echo $doc->template; ?>/js/common.js"></script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
	(function (d, w, c) {
		(w[c] = w[c] || []).push(function() {
			try {
				w.yaCounter47268396 = new Ya.Metrika({
					id:47268396,
					clickmap:true,
					trackLinks:true,
					accurateTrackBounce:true
				});
			} catch(e) { }
		});

		var n = d.getElementsByTagName("script")[0],
		s = d.createElement("script"),
		f = function () { n.parentNode.insertBefore(s, n); };
		s.type = "text/javascript";
		s.async = true;
		s.src = "https://mc.yandex.ru/metrika/watch.js";

		if (w.opera == "[object Opera]") {
			d.addEventListener("DOMContentLoaded", f, false);
		} else { f(); }
	})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/47268396" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Google Analytics counter --><!-- /Google Analytics counter -->
</body>
</html>