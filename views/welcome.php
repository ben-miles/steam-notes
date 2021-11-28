<?php require "./template/header.php"; ?>

<section id="welcome" class="body">
	<div class="container">
		<div id="hero">
			<div class="introduction">
				<div class="page-header">
					<h1>Welcome to SteamNotes!</h1>
				</div>
				<p style="margin-bottom: 20px;"><a href="#" style="font-weight: bold;">SteamNotes</a> is a convenient place to keep notes, links, and reminders for all of your favorite games on <a href="https://steampowered.com/" target="_blank">Steam</a>.</p> 
				<p style="margin-bottom: 50px;">Create and edit notes from any web browser, on any device -- All your changes are automatically backed-up.</p>
			</div>
			<div class="screenshot">
				<img class="mobile" src="assets/mobile.png" />
				<img class="desktop" src="assets/desktop.png" />
			</div>
		</div>
		<div class="section-header">
			<h2>Getting Started</h2>
		</div>
		<div id="getting-started">
			<div class="card">
				<div class="flag">1.</div>
				<img class="cover" src="assets/bookmark.jpg" />
				<div class="text">
					<h3>Bookmark</h3>
					<p>For the fastest and easiest access, click below to set SteamNotes as the Home Page in your Steam Overlay's Browser.</p>
					<a class="svg-button green-button" href="steam://settings/browser" target="_blank">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
							<path id="steam_1_" fill="#FFFFFF" d="M14.975,0C7.081,0,0.614,6.076,0,13.796l8.053,3.324c0.683-0.467,1.506-0.738,2.395-0.738
								c0.079,0,0.159,0.005,0.237,0.007l3.581-5.18c0-0.026,0-0.052,0-0.075c0-3.119,2.542-5.657,5.667-5.657S25.6,8.016,25.6,11.134
								c0,3.121-2.542,5.658-5.667,5.658c-0.041,0-0.086,0-0.13-0.003l-5.108,3.64c0.003,0.064,0.006,0.133,0.006,0.202
								c0,2.339-1.908,4.243-4.253,4.243c-2.061,0-3.78-1.466-4.171-3.41l-5.758-2.378C2.3,25.383,8.095,30,14.975,30
								C23.272,30,30,23.284,30,15.001C30,6.716,23.272,0,14.975,0L14.975,0z M9.416,22.76L7.57,21.997
								c0.327,0.681,0.893,1.252,1.645,1.565c1.624,0.675,3.496-0.097,4.173-1.717c0.329-0.787,0.331-1.654,0.005-2.439
								c-0.325-0.789-0.937-1.401-1.724-1.73c-0.779-0.321-1.616-0.313-2.352-0.034l1.905,0.787c1.2,0.499,1.765,1.872,1.266,3.068
								C11.99,22.692,10.613,23.258,9.416,22.76L9.416,22.76z M23.707,11.134c0-2.08-1.692-3.77-3.776-3.77c-2.081,0-3.775,1.69-3.775,3.77
								c0,2.078,1.694,3.767,3.775,3.767C22.015,14.901,23.707,13.212,23.707,11.134L23.707,11.134z M17.101,11.128
								c0-1.563,1.27-2.832,2.838-2.832c1.567,0,2.837,1.269,2.837,2.832c0,1.564-1.27,2.831-2.837,2.831
								C18.37,13.959,17.101,12.691,17.101,11.128L17.101,11.128z"/>
							</svg>
						<span>Open <b>STEAM</b> Settings</span>
					</a>
				</div>
			</div>
			<div class="card">
				<div class="flag">2.</div>
				<img class="cover" src="assets/signin.jpg" />
				<div class="text">
					<h3>Sign In</h3>
					<p>Sign into SteamNotes using your existing Steam account.</p>
					<p><i>Your profile will need to be set to Public. See: <a href="/about" target="_self" style="text-decoration: underline;">How to make your Steam Profile Public</a>.</i></p>
					<a class="svg-button green-button" href="/steamauth/steamauth.php?login" target="_self">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
							<path id="steam_1_" fill="#FFFFFF" d="M14.975,0C7.081,0,0.614,6.076,0,13.796l8.053,3.324c0.683-0.467,1.506-0.738,2.395-0.738
								c0.079,0,0.159,0.005,0.237,0.007l3.581-5.18c0-0.026,0-0.052,0-0.075c0-3.119,2.542-5.657,5.667-5.657S25.6,8.016,25.6,11.134
								c0,3.121-2.542,5.658-5.667,5.658c-0.041,0-0.086,0-0.13-0.003l-5.108,3.64c0.003,0.064,0.006,0.133,0.006,0.202
								c0,2.339-1.908,4.243-4.253,4.243c-2.061,0-3.78-1.466-4.171-3.41l-5.758-2.378C2.3,25.383,8.095,30,14.975,30
								C23.272,30,30,23.284,30,15.001C30,6.716,23.272,0,14.975,0L14.975,0z M9.416,22.76L7.57,21.997
								c0.327,0.681,0.893,1.252,1.645,1.565c1.624,0.675,3.496-0.097,4.173-1.717c0.329-0.787,0.331-1.654,0.005-2.439
								c-0.325-0.789-0.937-1.401-1.724-1.73c-0.779-0.321-1.616-0.313-2.352-0.034l1.905,0.787c1.2,0.499,1.765,1.872,1.266,3.068
								C11.99,22.692,10.613,23.258,9.416,22.76L9.416,22.76z M23.707,11.134c0-2.08-1.692-3.77-3.776-3.77c-2.081,0-3.775,1.69-3.775,3.77
								c0,2.078,1.694,3.767,3.775,3.767C22.015,14.901,23.707,13.212,23.707,11.134L23.707,11.134z M17.101,11.128
								c0-1.563,1.27-2.832,2.838-2.832c1.567,0,2.837,1.269,2.837,2.832c0,1.564-1.27,2.831-2.837,2.831
								C18.37,13.959,17.101,12.691,17.101,11.128L17.101,11.128z"/>
							</svg>
						<span>Sign in through <b>STEAM</b></span>
					</a>
				</div>
			</div>
			<div class="card">
				<div class="flag">3.</div>
				<img class="cover" src="assets/steambrowser.jpg" />
				<div class="text">
					<h3>Have fun!</h3>
					<p>Next time you're playing a game on Steam and need to jot something down, head to <a href="#" style="font-weight: bold;">SteamNotes</a>. All of your notes will be automatically saved for next time!</p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require "./template/footer.php"; ?>