<?php require "./template/header.php"; ?>

<section class="body">
	<div class="container">
		<div class="page-header">
			<h1>About</h1>
		</div>

		<div class="section-header">
			<h2>Why SteamNotes?</h2>
		</div>
		<p>Hi, I'm Ben, a software developer and graphic designer from Florida. I love puzzle games, RPGs, and survival sims -- the more involved and immersive, the better.</p> 
		<p>Sometimes I'd take an extended break from a particular title, and coming back, I'd lose a good bit of time (and/or lives) just getting oriented again. I'd jot down notes on scraps of paper, but often they'd get misplaced or were too cryptic to be helpful (bad handwriting!).</p> 
		<p>I coded SteamNotes to replace those paper notes. In the process, I found other ways to improve this idea: With access to Steam's Community API, I could get a list of all the games I own, and even which ones I'd played recently. With a database backup, even if I was away from my gaming PC, I could still add or edit my notes. With a little javascript, I could make that process simple and intuitive. And with a little server space, I could share SteamNotes with everybody!</p>
			
		<div class="section-header">
			<h2>How do I make my Steam Profile "Public?"</h2>
		</div>
		<p><i>Via <a href="https://help.steampowered.com/en/faqs/view/588C-C67D-0251-C276" target="_blank">SteamPowered.com</a>:</i></p>
		<p>If you are logged in to Steam, you can change your Privacy Settings by navigating to your <a href="https://steamcommunity.com/my/edit/settings?snr=" target="_blank">Profile Privacy Settings Page</a>.</p>
		<p>Alternatively, you can navigate to the Profile Privacy Settings page manually:</p>
		<ol>
			<li>From your Steam Profile, click the <i>Edit Profile</i> link under your displayed badge.</li>
			<li>Click the <i>My Privacy Settings</i> tab</li>
			<li>Select your privacy state (any settings changed are saved automatically).</li>
		</ol>

		<div class="section-header">
			<h2>Is SteamNotes legit/safe/secure?</h2>
		</div>
		<p>Yes! SteamNotes is served over an encrypted connection. User authentication is handled by Steam (note the <i>https://steamcommunity.com/</i> domain in your browser's address bar when you click the <i>Sign in Through Steam</i> button). The list of your owned and recent games is retrieved via the <i>Steam Web API</i> that Valve has provided for apps like this one -- <a href="https://steamcommunity.com/dev" target="_blank">Read more about Valve's Steam Web API here</a>.</p>

	</div>
</section>

<?php require "./template/footer.php"; ?>