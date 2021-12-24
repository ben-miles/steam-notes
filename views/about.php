<?php require "./template/header.php"; ?>

<section class="body">
	<div class="container">
		
		<div class="page-header">
			<h1>About</h1>
		</div>

		<div class="section-header">
			<h2>What is SteamNotes?</h2>
		</div>
		<p><a href="<?php echo $domain; ?>" target="_self" style="font-weight: bold;">SteamNotes</a> is a convenient place to keep notes, links, and reminders for all of your favorite games on <a href="https://steampowered.com/" target="_blank" rel="noopener">Steam</a>.</p>
		<p>Sign in using your Steam account, and SteamNotes will retrieve a list of all your games on Steam. Add (or "pin") games to your notes page, then add notes, links, or reminders. Everything is organized by game, saved automatically, and accessible through any internet-enabled device.</p> 
		<p>By setting SteamNotes as the home page for Steam's Overlay Web Browser, you can have nearly instant access while in-game.</p>
		
		<div class="section-header">
			<h2>Is SteamNotes legit / safe / secure?</h2>
		</div>
		<p style="margin-bottom:0;">Yes! SteamNotes was made with security in mind:</p>
		<ul>
			<li>SteamNotes is served over an encrypted connection (see the padlock icon in your browser's address bar).</li>
			<li>User authentication is handled by Valve's servers, so your login information never touches SteamNotes (see the <i>https://steamcommunity.com/</i> domain in your browser's address bar when you click the <i>Sign in Through Steam</i> button).</li>
			<li>Data is retrieved via the <i>Steam Web API</i> that Valve has provided for apps like this one -- <a href="https://steamcommunity.com/dev" target="_blank" rel="noopener">Read more about Valve's Steam Web API here</a>.</li>
			<li>Only publicly available Steam data is retrieved and stored on SteamNotes, like basic profile info and what games you own which you've played recently.</li>
		</ul>

		<div class="section-header">
			<h2>How do I make my Steam Profile "Public?"</h2>
		</div>
		<p><i>Via <a href="https://help.steampowered.com/en/faqs/view/588C-C67D-0251-C276" target="_blank" rel="noopener">SteamPowered.com</a>:</i></p>
		<div class="quote">
			<p>If you are logged in to Steam, you can change your Privacy Settings by navigating to your <a href="https://steamcommunity.com/my/edit/settings?snr=" target="_blank" rel="noopener">Profile Privacy Settings Page</a>.</p>
			<p style="margin-bottom:0;">Alternatively, you can navigate to the Profile Privacy Settings page manually:</p>
			<ol>
				<li>From your Steam Profile, click the <i>Edit Profile</i> link under your displayed badge.</li>
				<li>Click the <i>My Privacy Settings</i> tab</li>
				<li>Select your privacy state (any settings changed are saved automatically).</li>
			</ol>
		</div>

	</div>
</section>

<?php require "./template/footer.php"; ?>