<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<head>
  <link rel="icon" href="/icon.jpg" type="image/icon type">
  <meta name="title" content="החיפושית המופלאה ישראל">
  <meta name="description" content="פרקים מדובבים ומתורגמים לעברית של החיפושית המופלאה, קומיקסים ועדכונים לגבי פרקים חדשים.">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Heebo:wght@500&family=Open+Sans:wght@400;500;600;700;800&display=swap');
h2 {
  vertical-align: center;
  text-align: center;
  -webkit-text-stroke: 1px black;
}

html, body {
  margin: 0;
  height: 100%;
  direction: rtl;
  color: white;
}
body {
  background-image: radial-gradient(#212121cc 20%, transparent 20%),
     radial-gradient(#212121cc 20%, transparent 20%);
  background-color: #e53935cc;
  background-position: 0 0, 50px 50px;
  background-size: 100px 100px;
  height: 200px;
  width: 100%;
}

h1 {
    -webkit-text-stroke: 1px black;
}
/* new */
h2, h3, h4, h5, h6 {
    -webkit-text-stroke: 1px black;
}
/* end new */


* {
  font-family: "Open Sans";
  box-sizing: border-box;
}

.top-nav {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  background-color: #00BAF0;
  background: linear-gradient(to left, #f46b45, #eea849);
  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  color: #FFF;
  height: 50px;
  padding: 1em;
}

.menu {
  display: flex;
  flex-direction: row;
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.menu > li {
  margin: 0 1rem;
  overflow: hidden;
}

.menu-button-container {
  display: none;
  height: 100%;
  width: 30px;
  cursor: pointer;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

#menu-toggle {
  display: none;
}

.menu-button,
.menu-button::before,
.menu-button::after {
  display: block;
  background-color: #fff;
  position: absolute;
  height: 4px;
  width: 30px;
  transition: transform 400ms cubic-bezier(0.23, 1, 0.32, 1);
  border-radius: 2px;
}

.menu-button::before {
  content: "";
  margin-top: -8px;
}

.menu-button::after {
  content: "";
  margin-top: 8px;
}

#menu-toggle:checked + .menu-button-container .menu-button::before {
  margin-top: 0px;
  transform: rotate(405deg);
}

#menu-toggle:checked + .menu-button-container .menu-button {
  background: rgba(255, 255, 255, 0);
}

#menu-toggle:checked + .menu-button-container .menu-button::after {
  margin-top: 0px;
  transform: rotate(-405deg);
}
/* mine */
#content {
    margin: auto;
    width: 100%;
    text-align: center;
}
#content video {
    width: 90%;
    margin: auto;
}
.down {
    margin-top: 50px;
}
a {
    color: white;
    text-decoration: none;
}
/* end mine */
@media (max-width: 700px) {
  .menu-button-container {
    display: flex;
  }

  .menu {
    position: absolute;
    top: 0;
    margin-top: 50px;
    left: 0;
    flex-direction: column;
    width: 100%;
    justify-content: center;
    align-items: center;
  }

  #menu-toggle ~ .menu li {
    height: 0;
    margin: 0;
    padding: 0;
    border: 0;
    transition: height 400ms cubic-bezier(0.23, 1, 0.32, 1);
  }

  #menu-toggle:checked ~ .menu li {
    border: 1px solid #333;
    height: 2.5em;
    padding: 0.5em;
    transition: height 400ms cubic-bezier(0.23, 1, 0.32, 1);
    .content {
        margin-top:200px;
    }
  }

  .menu > li {
    display: flex;
    justify-content: center;
    margin: 0;
    padding: 0.5em 0;
    width: 100%;
    color: white;
    background-color: #222;
  }

  .menu > li:not(:last-child) {
    border-bottom: 1px solid #444;
  }
}
</style>
<script>
    function down(){
        var content = document.getElementById('content')
        content.classList.toggle('down');
        if(content.classList.contains("down")){
            var a = document.getElementsByTagName('li').length;
            var num = a * 2.5 + 1;
            content.style.marginTop = num + "em";
        }
        else{
            content.style.marginTop = "auto";
        }
    }
</script>
<body>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <section class="top-nav">
        <div>
            <a href="/control/"><img width="20%" src="https://static-3.bitchute.com/live/channel_images/3HIIOWM4HUKS/V82VTa5d7zybi7tJyLH0ha8K_small.jpg" alt="Logo"></a>
        </div>
        <input id="menu-toggle" type="checkbox" onclick="down()" />
        <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
        </label>
        <ul class="menu">
            <li><a href="/">דף הבית</a></li>
            <li><a href="/episodes/">פרקים</a></li>
            <li><a href="/episode_names/">שמות הפרקים</a></li>
            <li><a href="/posts/">פוסטים</a></li>
            <li><a href="/logout.php">התנתקות</a></li>
            <li><a href="https://beacons.ai/miraculousladybugisrael">קישורים</a></li>
        </ul>
    </section>
    <div id="content">