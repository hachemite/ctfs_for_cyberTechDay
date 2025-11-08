<?php
	require("conf/level7.conf.php");
	
	$page = isset($_GET['page']) ? $_GET['page'] : 'home';
	$search_query = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Marrakech Heritage Center - Traditional Moroccan Proverbs</title>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}
		
		body {
			font-family: Verdana, Arial, Helvetica, sans-serif;
			font-size: 12px;
			background: #8B4513;
			color: #333;
		}
		
		#header {
			background: #D2691E;
			border-bottom: 3px solid #A0522D;
			padding: 0;
			height: 100px;
		}
		
		#header-content {
			width: 960px;
			margin: 0 auto;
			position: relative;
		}
		
		#logo {
			float: left;
			padding: 20px 0;
		}
		
		#logo h1 {
			color: #FFF;
			font-size: 28px;
			margin: 0;
			text-shadow: 2px 2px 4px #000;
			font-family: Georgia, "Times New Roman", Times, serif;
			font-weight: normal;
			letter-spacing: 1px;
		}
		
		#logo p {
			color: #FFE4B5;
			font-size: 11px;
			margin-top: 5px;
		}
		
		#search-box {
			float: right;
			padding: 35px 0;
		}
		
		#search-box input[type="text"] {
			padding: 5px;
			width: 180px;
			border: 1px solid #8B4513;
			font-size: 11px;
		}
		
		#search-box input[type="submit"] {
			padding: 5px 15px;
			background: #8B4513;
			color: #FFF;
			border: none;
			cursor: pointer;
			font-size: 11px;
		}
		
		#search-box input[type="submit"]:hover {
			background: #654321;
		}
		
		#navigation {
			background: #A0522D;
			border-bottom: 2px solid #8B4513;
			height: 40px;
			overflow: hidden;
		}
		
		#navigation ul {
			width: 960px;
			margin: 0 auto;
			list-style: none;
			height: 40px;
		}
		
		#navigation li {
			float: left;
			height: 40px;
		}
		
		#navigation a {
			display: block;
			padding: 11px 25px;
			color: #FFF;
			text-decoration: none;
			font-size: 13px;
			font-weight: bold;
			border-right: 1px solid #8B4513;
			height: 40px;
			line-height: 18px;
			box-sizing: border-box;
		}
		
		#navigation a:hover, #navigation a.active {
			background: #8B4513;
		}
		
		#container {
			width: 960px;
			margin: 20px auto;
			background: #FFF;
			overflow: hidden;
			min-height: 600px;
		}
		
		#main-content {
			float: left;
			width: 650px;
			padding: 25px;
			min-height: 550px;
		}
		
		#sidebar {
			float: right;
			width: 180px;
			padding: 25px 20px;
			background: #FFF8DC;
			border-left: 1px solid #DEB887;
			min-height: 550px;
		}
		
		#sidebar h3 {
			color: #8B4513;
			font-size: 13px;
			border-bottom: 2px solid #CD853F;
			padding-bottom: 8px;
			margin: 0 0 10px 0;
		}
		
		#sidebar h3:first-child {
			margin-top: 0;
		}
		
		#sidebar h3 + ul {
			margin-bottom: 20px;
		}
		
		#sidebar ul {
			list-style: none;
			padding: 0;
		}
		
		#sidebar li {
			padding: 5px 0;
			border-bottom: 1px dotted #DEB887;
			font-size: 11px;
		}
		
		#sidebar a {
			color: #8B4513;
			text-decoration: none;
		}
		
		#sidebar a:hover {
			color: #D2691E;
		}
		
		.content-box {
			background: #FFFAF0;
			border: 2px solid #DEB887;
			padding: 20px;
			margin: 15px 0;
		}
		
		.content-box h2 {
			color: #8B4513;
			font-size: 18px;
			margin: 0 0 15px 0;
			border-bottom: 2px solid #CD853F;
			padding-bottom: 8px;
		}
		
		.proverb-display {
			background: #FFF;
			border: 3px double #CD853F;
			padding: 40px 20px;
			text-align: center;
			margin: 20px 0;
			min-height: 120px;
		}
		
		.proverb-text {
			font-size: 16px;
			color: #8B4513;
			line-height: 1.8;
			font-style: italic;
			margin: 15px 0;
		}
		
		.proverb-arabic {
			font-size: 14px;
			color: #CD853F;
			margin-top: 15px;
			direction: rtl;
			font-weight: bold;
		}
		
		.button {
			background: #CD853F;
			color: #FFF;
			padding: 10px 25px;
			border: 2px solid #A0522D;
			font-size: 13px;
			font-weight: bold;
			cursor: pointer;
			text-decoration: none;
			display: inline-block;
		}
		
		.button:hover {
			background: #A0522D;
		}
		
		.info-notice {
			background: #FFE4B5;
			border: 1px solid #DEB887;
			padding: 12px;
			margin: 15px 0;
			font-size: 11px;
			line-height: 1.6;
		}
		
		.error {
			color: #8B0000;
			font-weight: bold;
			padding: 30px;
			text-align: center;
		}
		
		#footer {
			clear: both;
			background: #D2691E;
			border-top: 3px solid #A0522D;
			padding: 15px 0;
			color: #FFF;
			text-align: center;
			font-size: 11px;
		}
		
		#footer-content {
			width: 960px;
			margin: 0 auto;
		}
		
		#footer a {
			color: #FFE4B5;
			text-decoration: none;
		}
		
		#footer a:hover {
			text-decoration: underline;
		}
		
		.clearfix:after {
			content: ".";
			display: block;
			clear: both;
			visibility: hidden;
			height: 0;
		}
		
		h2 {
			color: #8B4513;
			font-size: 20px;
			margin: 0 0 15px 0;
		}
		
		p {
			line-height: 1.6;
			margin: 10px 0;
		}
	</style>
</head>

<body>
<div id="header">
	<div id="header-content" class="clearfix">
		<div id="logo">
			<h1>Marrakech Heritage Center</h1>
			<p>Preserving Moroccan Wisdom Since 1987</p>
		</div>
		<div id="search-box">
			<form action="?" method="get">
				<input type="text" name="q" value="Search archive..." onfocus="this.value=''" />
				<input type="submit" value="Search" />
			</form>
		</div>
	</div>
</div>

<div id="navigation">
	<ul class="clearfix">
		<li><a href="?" class="<?php echo ($page=='home')?'active':''; ?>">Home</a></li>
		<li><a href="?page=about" class="<?php echo ($page=='about')?'active':''; ?>">About Us</a></li>
		<li><a href="?page=collection" class="<?php echo ($page=='collection')?'active':''; ?>">Collection</a></li>
		<li><a href="?page=research" class="<?php echo ($page=='research')?'active':''; ?>">Research</a></li>
		<li><a href="?page=gallery" class="<?php echo ($page=='gallery')?'active':''; ?>">Photo Gallery</a></li>
		<li><a href="?page=contact" class="<?php echo ($page=='contact')?'active':''; ?>">Contact</a></li>
	</ul>
</div>

<div id="container" class="clearfix">
	<div id="main-content">
		<?php if ($search_query && $search_query !== 'Search archive...') { ?>
			<h2>Search Results</h2>
			<div class="content-box">
				<p>Your search for <strong>"<?php echo $search_query; ?>"</strong> returned no results.</p>
				<p style="margin-top: 15px;">Suggestions:</p>
				<ul style="margin-left: 20px; line-height: 1.8;">
					<li>Try different keywords</li>
					<li>Check your spelling</li>
					<li>Try more general terms</li>
					<li>Browse our <a href="?page=collection" style="color: #8B4513;">collection categories</a></li>
				</ul>
			</div>
			<p><a href="?" style="color: #8B4513; text-decoration: underline;">Return to homepage</a></p>
			
		<?php } elseif ($page == 'home' || isset($_GET['rec'])) { ?>
			<h2>Traditional Proverb Database</h2>
			
			<div class="info-notice">
				<strong>Welcome to our digital collection!</strong> This database contains proverbs collected from elderly community 
				members across Morocco between 1987-2006. Use the button below to browse random entries from our collection. 
				Each proverb has been transliterated and translated by our cultural preservation team.
			</div>
			
			<div class="proverb-display">
				<?php if (isset($_GET['rec'])) { 
					// Input sanitization - remove dangerous SQL keywords
					$dangerous = array('union', 'select', 'or', 'load_file', 'from', 'where');
					
					foreach ($dangerous as $word) {
						$_GET['rec'] = preg_replace('/' . $word . '/i', '', $_GET['rec']);
					}
					
					// Additional security check
					if (strpos($_GET['rec'], " ") !== false) {
						die("<div class='error'>ERROR: Invalid record identifier format</div>");
					}
					
					$sql = "SELECT saying from heritage_proverbs WHERE rec = " . $_GET['rec'] . ";"; 
					$result = $conn->query($sql);
					
					if ($result && $result->num_rows > 0) {
						$row = $result->fetch_assoc();
				?>
						<div class="proverb-text"><?php echo htmlspecialchars($row['saying']); ?></div>
						<div class="proverb-arabic">
							<?php
							$proverbs_ar = array('الضيف ضيف الله', 'الصبر مفتاح الفرج', 'من جد وجد', 'اللي ما عندو نية ما عندو حيلة', 'الكلام من فضة والسكوت من ذهب', 'خويا خويا ما يغديني ما يعشيني');
							echo $proverbs_ar[array_rand($proverbs_ar)];
							?>
						</div>
				<?php 
					} else {
						echo "<div class='error'>Record not found in database</div>";
					}
				} else { 
				?>
					<p style="padding: 40px 20px; color: #8B4513;">
						<strong>Click the button below to view a random proverb from our collection</strong><br/><br/>
						Our database contains wisdom passed down through generations in Moroccan culture.
					</p>
				<?php } ?>
			</div>
			
			<center>
				<input type="button" class="button" value="View Random Proverb" onclick="loadProverb()" />
			</center>
			
			<div class="content-box">
				<h2>About This Project</h2>
				<p>Professor Hassan El-Mansouri started this digital archive project in 2005 as part of his cultural 
				anthropology research at Mohammed V University. The database system was built by a graduate student 
				using PHP and MySQL to preserve traditional Moroccan wisdom for future generations.</p>
				<p>While the interface may seem outdated by today's standards, the proverbs themselves represent 
				invaluable cultural heritage collected from storytellers, family elders, and community gatherings 
				across Morocco's diverse regions.</p>
				<p><em>Note: Some technical aspects of the site are preserved as-is for historical authenticity.</em></p>
			</div>
			
		<?php } elseif ($page == 'about') { ?>
			<h2>About Marrakech Heritage Center</h2>
			<div class="content-box">
				<h2>Our Mission</h2>
				<p>Founded in 1987, the Marrakech Heritage Center is dedicated to preserving and promoting Moroccan 
				cultural heritage. Our primary focus is documenting traditional proverbs, folk wisdom, and oral 
				traditions that have been passed down through generations.</p>
			</div>
			
			<div class="content-box">
				<h2>History</h2>
				<p>The center was established by Dr. Hassan El-Mansouri following his doctoral research on Moroccan 
				oral traditions. What began as a small collection of 200 proverbs has grown into one of the most 
				comprehensive digital archives of Moroccan wisdom, containing over 2,800 entries from 89 different regions.</p>
			</div>
			
			<div class="content-box">
				<h2>Our Team</h2>
				<p><strong>Dr. Hassan El-Mansouri</strong> - Director & Founder<br/>
				<strong>Fatima Zahra Bennani</strong> - Chief Archivist<br/>
				<strong>Ahmed Khalil</strong> - Translation Coordinator<br/>
				<strong>Samira El-Fassi</strong> - Community Outreach</p>
			</div>
			
		<?php } elseif ($page == 'contact') { ?>
			<h2>Contact Us</h2>
			<div class="content-box">
				<h2>Marrakech Heritage Center</h2>
				<p>
				<strong>Address:</strong><br/>
				Avenue Mohammed V<br/>
				Gueliz, Marrakech 40000<br/>
				Morocco
				</p>
				<p>
				<strong>Phone:</strong> +212 524-123456<br/>
				<strong>Fax:</strong> +212 524-123457<br/>
				<strong>Email:</strong> info@marrakechheritage.ma
				</p>
				<p>
				<strong>Office Hours:</strong><br/>
				Monday - Friday: 9:00 AM - 5:00 PM<br/>
				Saturday: 10:00 AM - 2:00 PM<br/>
				Sunday: Closed
				</p>
			</div>
			
			<div class="content-box">
				<h2>Send Us a Message</h2>
				<form action="contact.php" method="post">
					<p><input type="text" name="name" value="Your Name" style="width: 300px; padding: 5px;" /></p>
					<p><input type="text" name="email" value="Your Email" style="width: 300px; padding: 5px;" /></p>
					<p><textarea name="message" rows="8" style="width: 95%; padding: 5px;">Your Message</textarea></p>
					<p><input type="submit" class="button" value="Send Message" /></p>
				</form>
			</div>
			
		<?php } elseif ($page == 'collection') { ?>
			<h2>Our Collection</h2>
			<div class="content-box">
				<h2>Digital Archive Overview</h2>
				<p>Our collection spans nearly two decades of fieldwork across Morocco. Each entry includes:</p>
				<ul style="margin-left: 20px; line-height: 2;">
					<li>Original Arabic text</li>
					<li>English translation</li>
					<li>Regional origin</li>
					<li>Year collected</li>
					<li>Cultural context notes</li>
					<li>Audio recordings (when available)</li>
				</ul>
			</div>
			
			<div class="content-box">
				<h2>Collection Statistics</h2>
				<p><strong>Total Proverbs:</strong> 2,847<br/>
				<strong>Regions Represented:</strong> 89<br/>
				<strong>Languages:</strong> Arabic, Tamazight, French<br/>
				<strong>Contributors:</strong> 154 community members<br/>
				<strong>Years Active:</strong> 1987 - 2006</p>
			</div>
			
		<?php } elseif ($page == 'research') { ?>
			<h2>Research & Publications</h2>
			<div class="content-box">
				<h2>Academic Work</h2>
				<p>Our center has contributed to numerous academic publications and research projects focused on 
				Moroccan oral traditions, linguistic analysis, and cultural preservation.</p>
			</div>
			
			<div class="content-box">
				<h2>Recent Publications</h2>
				<p><strong>2006:</strong> "Proverbs and Power: Social Wisdom in Moroccan Culture" - Dr. El-Mansouri<br/>
				<strong>2004:</strong> "Digital Preservation of Oral Traditions" - International Journal of Heritage Studies<br/>
				<strong>2003:</strong> "Regional Variations in Moroccan Proverbial Wisdom" - Anthropology Quarterly</p>
			</div>
			
		<?php } elseif ($page == 'gallery') { ?>
			<h2>Photo Gallery</h2>
			<div class="content-box">
				<h2>Coming Soon</h2>
				<p>We are currently digitizing photographs from our field research expeditions. This gallery will 
				feature images of storytellers, community gatherings, and cultural events where these proverbs 
				were traditionally shared.</p>
				<p>Check back soon!</p>
			</div>
		<?php } ?>
	</div>
	
	<div id="sidebar">
		<h3>Quick Links</h3>
		<ul>
			<li><a href="?page=collection">Digital Archive</a></li>
			<li><a href="submit.php">Submit Proverb</a></li>
			<li><a href="newsletter.php">Newsletter</a></li>
			<li><a href="donate.php">Donate</a></li>
			<li><a href="visit.php">Visit Us</a></li>
		</ul>
		
		<h3>Categories</h3>
		<ul>
			<li><a href="?cat=family">Family & Honor</a></li>
			<li><a href="?cat=hospitality">Hospitality</a></li>
			<li><a href="?cat=wisdom">Wisdom & Life</a></li>
			<li><a href="?cat=nature">Nature</a></li>
			<li><a href="?cat=patience">Patience</a></li>
			<li><a href="?cat=community">Community</a></li>
		</ul>
		
		<h3>Statistics</h3>
		<ul>
			<li>2,847 Proverbs</li>
			<li>154 Contributors</li>
			<li>89 Regions</li>
			<li>19 Years Active</li>
		</ul>
		
		<h3>Latest Additions</h3>
		<ul>
			<li><a href="?rec=134">Patience brings roses...</a></li>
			<li><a href="?rec=289">The hand that gives...</a></li>
			<li><a href="?rec=412">A house without...</a></li>
		</ul>
		
		<h3>Partner Organizations</h3>
		<ul>
			<li>Ministry of Culture</li>
			<li>Mohammed V University</li>
			<li>UNESCO Morocco</li>
		</ul>
	</div>
</div>

<div id="footer">
	<div id="footer-content">
		<p>Marrakech Heritage Center © 1987-2007 | Funded by Ministry of Culture, Morocco<br/>
		Database System v2.3 | Best viewed in Internet Explorer 6.0 or Firefox 2.0<br/>
		<a href="?page=about">About</a> | <a href="?page=contact">Contact</a> | <a href="privacy.php">Privacy Policy</a> | <a href="sitemap.php">Site Map</a></p>
	</div>
</div>

<script type="text/javascript">
	function loadProverb() {
		var recordNum = Math.floor(Math.random() * 6);
		window.location.href = "?rec=" + recordNum;
	}
</script>

</body>
</html>