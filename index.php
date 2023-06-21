<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Raleway" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">

  <style>
  /*General Styles*/

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

html {
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
	color: #555;
}

ul,
nav {
	list-style: none;
}

a {
	text-decoration: none;
	font-weight:900;
	color: #462d88;
}

a:hover {
	opacity: 1;
}

a.btn {
	border-radius: 4px;
	text-transform: uppercase;
	font-weight: bold;
	text-align: center;
	background-color: #e07e7b;
	opacity: 1;
	transition: all 400ms;
}

a.btn:hover {
	background-color: #ce5856;
}

section {
	display: flex;
	flex-direction: column;
	align-items: center;
	padding: 100px 0px;
}

section:not(.hero):nth-child(even) {
	background-color: #E9E0FF;
    margin:0;
}

.grid {
	width: 100%;
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
    
}

hr {
	width: 250px;
	height: 3px;
	background-color: #e07e7b;
	border: 0;
	margin-bottom: 50px;
}





section h3.title {
	text-transform: capitalize;
	font-family: Arial, Helvetica, sans-serif;
    font-size:48px;
	margin-bottom: 30px;
	text-align: center;
    font-weight:600;
    text-shadow: none;
    color:#462d88;
}

section p {
	max-width: 775px;
	line-height: 2;
	padding: 0 20px;
	margin-bottom: 30px;
	text-align: center;
}

@media (max-width: 800px) {
	section {
		padding: 50px 20px;
	}
}

/*Header Styles*/

header {
	position: absolute;
	width: 100%;
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 35px 100px 0;
	animation: 1s fadein 0.5s forwards;
	opacity: 0;
	color: #fff;
	z-index: 2;
}

@keyframes fadein {
	100% {
		opacity: 1;
	}
}

header h2 {
	font-family: Arial, Helvetica, sans-serif;
}

header nav {
	display: flex;
	margin-right: -15px;
}

header nav li {
	margin: 0 15px;
}

@media (max-width: 800px) {
	header {
		padding: 20px 50px;
		flex-direction: column;
	}

	header h2 {
		margin-bottom: 15px;
	}
}

/*Hero Styles*/

.hero {
	position: relative;
	justify-content: center;
	text-align: center;
	min-height: 100vh;
	color: #fff;
}

.hero .background-image {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color:white;
	background-size: cover;
	z-index: -1;
	
}

.hero h1 {
	
    font-family: Arial, Helvetica, sans-serif;
    font-size: 35px;
	font-weight:900;
	margin-bottom: 15px;
    color: #462d88;
}

@media (max-width: 700px){
    .hero h1 {
	padding: 200px 0px 0px 0px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 35px;
	font-weight:750;
	margin-bottom: 15px;
    color: #462d88;
}
.hero p {
	
    font-family: Arial, Helvetica, sans-serif;
    
	font-weight:100;
    font-size:10px;
    line-height:30px;

    color: black;
}
}

.hero p {
	
    font-family: Arial, Helvetica, sans-serif;
    
	font-weight:100;
    font-size:20px;
    line-height:30px;

    color: black;
}

.hero h3 {
	font-family: Arial, Helvetica, sans-serif;
    font-size: 28px;
	font-weight: 300;
	text-shadow: 2px 2px rgba(0, 0, 0, 0.3);
	margin-bottom: 40px;
}

.hero a.btn {
	padding: 20px 46px;
}

.hero-content-area {
	opacity: 0;
	margin-top: 100px;
	animation: 1s slidefade 1s forwards;
}

@keyframes slidefade {
	100% {
		opacity: 1;
		margin: 0;
	}
}

@media (max-width: 800px) {
	.hero {
		min-height: 600px;
	}

	
	.hero h3 {
		font-size: 24px;
	}

	.hero a.btn {
		padding: 15px 40px;
	}
}

/*Destinations Section*/

.destinations .grid li {
	height: 350px;
	padding: 20px;
	background-clip: content-box;
	background-size: cover;
	background-position: center;
}

.destinations .grid li.small {
	flex-basis: 30%;
}

.destinations .grid li.large {
	flex-basis: 70%;
}

@media (max-width: 1100px) {
	.destinations .grid li.small,
	.destinations .grid li.large {
		flex-basis: 50%;
	}
}

@media (max-width: 800px) {
	.destinations .grid li.small,
	.destinations .grid li.large {
		flex-basis: 100%;
	}
}

/*Packages Section*/

.packages .grid li {
	padding: 50px 0 0 0;
	flex-basis: 50%;
	text-align: center;
}


.packages .grid li i {
	color: #e07e7b;
}

.packages .grid li h4 {
	font-size: 30px;
	margin: 25px 0;
}

@media (max-width: 800px) {
	.packages .grid li {
		flex-basis: 100%;
		padding: 20px 0 0 0;
	}
}

/*Testimonials Section*/

.testimonials .quote {
	font-size: 22px;
	font-weight: 300;
	line-height: 1.5;
	margin: 40px 0 25px;
}

@media (max-width: 800px) {
	.testimonials .quote {
		font-size: 18px;
		margin: 15px 0;
	}

	.testimonials .author {
		font-size: 14px;
	}
}

/*Contact Section*/

.contact form {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
	width: 60%;
}

.contact form .btn {
	padding: 18px 42px;
}

.contact form input {
	padding: 15px;
	margin-right: 30px;
	font-size: 18px;
	color: #555;
	flex: 1;
}

@media (max-width: 1000px) {
	.contact form input {
		flex-basis: 100%;
		margin: 0 0 20px 0;
	}
}

/*Footer Section*/

footer {
	display: flex;
	align-items: center;
	justify-content: space-around;
	background-color: #555;
	color: #fff;
	padding: 20px 0;
}

footer ul {
	display: flex;
}

footer ul li {
	margin-left: 16px;
}

footer p {
	text-transform: uppercase;
	font-size: 14px;
	opacity: 0.6;
	align-self: center;
}
.btnn{
    background-color: #462d88;
    color:white;
    padding:10px 50px 10px 50px;
    font-weight: 500;
    font-size: 20px;
    border-radius: 50px;
}

.btnn:hover{
    background-color: #fff;
    color:#462d88;
    padding:10px 50px 10px 50px;
    font-weight: 500;
    font-size: 20px;
    border: 2px solid #462d88;
}

@media (max-width: 1100px) {
	footer {
		flex-direction: column;
	}

	footer p {
		text-align: center;
		margin-bottom: 20px;
	}

	footer ul li {
		margin: 0 8px;
	}
    .nav{
        color: #462d88;
    }
}
.imgg{
    width:500px;
    height: 500px;
}

.dropdown {
  
  overflow: hidden;
}

.card{
    background-color: white;
    border-radius: 20px;
    margin: 2px;
}

.card h4{
    color: black;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  font-weight:900;
  border-radius: 50px;
  color: white;
  padding: 6px 20px 6px 20px;
  margin: 0 15px;
  background-color: #462d88;
  font-family: inherit;
  margin: 0;
}

.dropbtn{
	background: #462d88;
	color: white;
	padding: 3px 10px;
	border-radius: 8px;
}

.dropbtn:hover{
	background: white;
	color: white;
	padding: 3px 10px;
	border-radius: 8px;
}

.dropbtn a{

	color: white;
}

.dropbtn a:hover{

color: #462d88;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: #462d88;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #462d88;
  color: white;
}

.dropdown:hover .dropdown-content {
  display: block;
}

  </style>
</head>
<body>
  <!-- Forked from a template on Tutorialzine: https://tutorialzine.com/2016/06/freebie-landing-page-template-with-flexbox -->
  <header>
    <h2><a href="#">Word Solvo</a></h2>
    <nav class="navlinks">
      <li><a href="#">Home</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">About</a></li>
      <li class="dropbtn"><a href="./task_management/index.php">Login</a></li>
    </nav>
  </header>

  <section class="hero">
    <div class="background-image"></div>
    <div class="hero-content-area">
      <h1>Unlock the Power of Words with Word Solvo: <br>
Your Premier Destination for Exceptional <br>
Content Solutions!</h1>
      <p>Elevate Your Content Game and Inspire Your Readers with Word Solvo's <br>
Unparalleled Writing Expertise and Impeccable Attention to Detail!</p>
      <a href="#" class="btnn">About Us</a>
     
    </div>
    <img src="herr.png" class="imgg">
    


  <section class="packages">
    <h3 class="title">Services</h3>
    

    <ul class="grid">
      <li class="card">
        
        <h4>Essay</h4>
        <p>Impress your professors with compelling and insightful essays crafted by our skilled writers, reflecting your unique perspective.</p>
      </li>
      <li class="card">
        
        <h4>Essay</h4>
        <p>Impress your professors with compelling and insightful essays crafted by our skilled writers, reflecting your unique perspective.</p>
      </li>
      <li class="card">
        
        <h4>Essay</h4>
        <p>Impress your professors with compelling and insightful essays crafted by our skilled writers, reflecting your unique perspective.</p>
      </li>
      <li class="card">
        
        <h4>Essay</h4>
        <p>Impress your professors with compelling and insightful essays crafted by our skilled writers, reflecting your unique perspective.</p>
      </li>
    </ul>
  </section>

  <section class="testimonials">
    <h3 class="title">Testimonials from our adventurers:</h3>
    <hr>
    <p class="quote">Wow! This tour made me realize how much I love being outside with my friends. After going on one of these tours, I can safely say that beer pong is my favorite game all time, also the cultural programs were really interesting!</p>
    <p class="author">- Albert Herter</p>
    <p class="quote">Wow, this really blew my mind. We had so much fun at the beach, and also some hidden secrets revealed. Come on, I'm living in this city for 5 years. Amazing!</p>
    <p class="author">- Sharon Rosenberg</p>
    <p class="quote">If you want to understand your friends better, head to the mountains. I mean, seriously. It's like sitting next to a campfire and just talk in the sunset, woah. You know? It's like that.</p>
    <p class="author">- Luis Mendoza</p>
  </section>

  

  
