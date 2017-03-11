<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
<link rel="icon" type="image/png" href="images/DB_16х16.png">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Material Lite</title>

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="yes">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Material Design Lite">

<!-- Tile icon for Win8 (144x144 + tile color) -->
<meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
<meta name="msapplication-TileColor" content="#3372DF">

<!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
<!--
    <link rel="canonical" href="http://www.example.com/">
    -->

<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
          type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- inject:css -->
<link rel="stylesheet" href="css/lib/getmdl-select.min.css">
<link rel="stylesheet" href="css/lib/nv.d3.css">
<link rel="stylesheet" href="css/application.css">
<!-- endinject -->

</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <div class="mdl-layout-spacer"></div>
      <!-- Search-->
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
        <label class="mdl-button mdl-js-button mdl-button--icon" for="search"> <i class="material-icons">search</i> </label>
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" id="search"/>
          <label class="mdl-textfield__label" for="search">Enter your query...</label>
        </div>
      </div>
      <div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon notification" id="notification"
                 data-badge="23"> shopping </div>
      <!-- Notifications dropdown-->
      
      <div class="avatar-dropdown" id="icon"> <span>Luke</span> <img src="images/Icon_header.png"> </div>
      <!-- Account dropdawn-->
      <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
                for="icon">
        <li class="mdl-list__item mdl-list__item--two-line"> <span class="mdl-list__item-primary-content"> <span class="material-icons mdl-list__item-avatar"></span> <span>Luke</span> <span class="mdl-list__item-sub-title">Luke@skywalker.com</span> </span> </li>
        <li class="list__item--border-top"></li>
        <li class="mdl-menu__item mdl-list__item">
        	<a href="login.html"> 
        		<span class="mdl-list__item-primary-content"> <i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i> Log out </span>
        	</a> 
        </li>
      </ul>
      <button id="more"
                    class="mdl-button mdl-js-button mdl-button--icon"> <i class="material-icons">more_vert</i> </button>
      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp settings-dropdown"
                for="more">
        <li class="mdl-menu__item"> Settings </li>
        <a class="mdl-menu__item" href="https://github.com/CreativeIT/getmdl-dashboard/issues"> Support </a>
        <li class="mdl-menu__item"> F.A.Q. </li>
      </ul>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <header>Menu</header>
    <nav class="mdl-navigation"> <a class="mdl-navigation__link mdl-navigation__link--current" href="index.html"> <i class="material-icons" role="presentation">book</i> Thực đơn </a> <a class="mdl-navigation__link" href="thongtinnhahang.html"> <i class="material-icons" role="presentation">book</i> Thông tin nhà hàng </a> <a class="mdl-navigation__link" href="thongtingiamgia.html"> <i class="material-icons">view_comfy</i> Thông tin khuyến mại </a><a class="mdl-navigation__link" href="forms.html"> <i class="material-icons" role="presentation">person</i> Account </a>
      <div class="mdl-layout-spacer"></div>
      <a class="mdl-navigation__link" href="https://github.com/CreativeIT/getmdl-dashboard"> <i class="material-icons" role="presentation">link</i> GitHub </a> </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="mdl-grid mdl-grid--no-spacing">
      <div class="mdl-grid mdl-cell mdl-cell--12-col"> 
        <!-- Pie chart-->
        <div class="mdl-cell mdl-cell--6-col" st>
          <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title" style="background: url(restaurant.jpg); height: 600px">
              <h2 class="mdl-card__title-text"></h2>
            </div>
            <div class="mdl-card__supporting-text">
              <p>Nhà hàng Hoàng Yến thiết kế theo phong cách vừa truyền thống vừa mang nét hiện đại. Kiến trúc sang trọng kết hợp với khung cảnh thiên nhiên.</p>
            </div>
          </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col">
          <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title" style="background: url(restaurant2.jpg); height: 600px">
              <h2 class="mdl-card__title-text"></h2>
            </div>
            <div class="mdl-card__supporting-text">
              <p>Nhà hàng có sức chứa 50 khách và có đội ngũ được đào tạo phong cách phục vụ chuyên nghiệp. Thực đơn của nhà hàng cũng đa dạng đáp ứng nhiều nhu cầu của du khách. </p>
            </div>
          </div>
        </div>
      </div>
      <div class="mdl-cell mdl-cell--12-col">
        <div class="mdl-card mdl-shadow--2dp">
          <div class="mdl-card__title" >
            <h2 class="mdl-card__title-text"> Thông tin chi tiết</h2>
          </div>
          <div class="mdl-card__supporting-text">
            <p>Tên</p>
				<p>Địa chỉ</p>
				<p>Giờ mở cửa</p>
				<p>Mô tả</p>
				<p>Liên hệ</p>
          </div>
        </div>
        
      </div>
    </div>
  </main>
  <footer class="mdl-mini-footer">
    <div class="mdl-mini-footer__left-section">
      <div class="mdl-logo">Title</div>
      <ul class="mdl-mini-footer__link-list">
        <li><a href="#">Help</a></li>
        <li><a href="#">Privacy & Terms</a></li>
      </ul>
    </div>
  </footer>
</div>

<!-- inject:js --> 
<script src="js/d3.js"></script> 
<script src="js/getmdl-select.min.js"></script> 
<script src="js/material.js"></script> 
<script src="js/nv.d3.js"></script> 
<script src="js/widgets/employer-form/employer-form.js"></script> 
<script src="js/widgets/line-chart/line-chart-nvd3.js"></script> 
<!-- <script src="js/widgets/map/maps.js"></script> --> 
<script src="js/widgets/pie-chart/pie-chart-nvd3.js"></script> 
<script src="js/widgets/table/table.js"></script> 
<script src="js/widgets/todo/todo.js"></script> 
<!-- endinject -->

</body>
</html>
