<?php require "./template/header.php"; ?>

<section class="body">
	<div class="container">

		<div class="page-header">
			<h1>My Notes</h1>
			<button class="svg-button green-button" id="modal-open">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="6.5 294.5 30 30" enable-background="new 6.5 294.5 30 30" xml:space="preserve">
					<path d="M32.106,298.894c-5.858-5.858-15.355-5.858-21.213,0c-5.859,5.858-5.858,15.354,0,21.213c5.858,5.858,15.354,5.858,21.213,0
						C37.964,314.249,37.965,304.752,32.106,298.894z M12.484,318.516c-4.971-4.971-4.971-13.061,0-18.031s13.06-4.971,18.031,0
						s4.971,13.061,0,18.031S17.456,323.486,12.484,318.516z M27.274,310.626h-4.65v4.649c0,0.621-0.503,1.125-1.125,1.125
						c-0.311,0-0.591-0.126-0.795-0.33c-0.204-0.203-0.33-0.484-0.329-0.796l0-4.649h-4.651c-0.311,0-0.591-0.127-0.795-0.33
						c-0.204-0.204-0.33-0.484-0.329-0.796c-0.001-0.621,0.503-1.125,1.125-1.125h4.65v-4.649c0-0.621,0.503-1.125,1.125-1.125
						s1.125,0.503,1.124,1.126l0,4.649h4.651c0.622,0,1.125,0.503,1.124,1.126C28.4,310.122,27.896,310.626,27.274,310.626z"/>
				</svg>
				<span>Add Games</span>
			</button>
		</div>

		<div v-if="games_pinned.length > 0" class="games">
			<div v-for="(game, index) in games_pinned" class="game pinned" :id="'game_' + game.appid" :index="index" :key="game.appid">
				<div class="confirm-unpin">
					<h3>Unpin this game?</h3>
					<p>This cannot be undone.</p>
					<button v-on:click="unpin(index)">Confirm Unpin</button>
					<button v-on:click="cancelUnpin($event)">Cancel</button>
				</div>
				<a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank">
					<img :src="'https://media.steampowered.com/steamcommunity/public/images/apps/' + game.appid + '/' + game.img_logo_url + '.jpg'">
				</a>
				<h4 class="title">{{game.name}}</h4>
				<button class="svg-button unpin" v-on:click="confirmUnpin(index, $event)" aria-label="Unpin">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
						<path d="M125,110.983l-14.468-14.468l0.016-19.059l-11.273,0.031l0.021-24.793l102.312-0.254l-0.024,24.784l-11.273,0.032
							l-0.045,55.996c15.242,10.813,25.865,27.671,28.311,47.11l-24.131,0.065L137.5,123.483V75H125V110.983z M157.555,196.571
							l-0.047,62.478c-0.006,6.582-3.26,11.99-7.236,11.995c-3.965,0.009-7.222-5.364-7.211-11.96l0.066-76.941L157.555,196.571z
							M141.547,180.563l-59.424,0.151c1.974-15.502,9.136-29.383,19.677-39.898L141.547,180.563z M64.017,67.678L233.08,236.742
							l-8.838,8.838L55.178,76.517L64.017,67.678z"/>
					</svg>
				</button>
				<label :for="'notes_' + game.appid">Notes:</label>
				<textarea class="notes" :id="'notes_' + game.appid" :name="'notes_' + game.appid" v-on:input="saveData(index, $event)" spellcheck="false" placeholder="Your notes here...">{{game.notes}}</textarea>
			</div>
		</div>
		<div v-else style="margin-top:30px;padding:50px;backdrop-filter:blur(20px);background-color:rgba(0,0,0,0.3);border-radius:3px;">
			<h3 style="text-align:center;"><b>To get started,</b> click the green "Add Games" button, and pin games to the home page.</h3>
		</div>

	</div>
</section>

<div class="modal-container">
	<div class="modal">
		<div class="modal-header">
			<h1>My Games</h1>
			<p>Select games here to Pin them to your home page.</p>
			<h3>Filter</h3>
			<input id="filter" type="text" v-model="search" placeholder="Filter Games by Title">
			<button class="svg-button" id="modal-close">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="6.5 294.5 30 30" enable-background="new 6.5 294.5 30 30" xml:space="preserve">
					<path d="M21.5,294.5c-8.285,0-15,6.716-15,15c0,8.285,6.715,15,15,15s15-6.715,15-15C36.5,301.216,29.785,294.5,21.5,294.5z
						M21.5,322.25c-7.03,0-12.75-5.72-12.75-12.75s5.72-12.75,12.75-12.75s12.75,5.72,12.75,12.75S28.53,322.25,21.5,322.25z
						M26.379,306.213l-3.289,3.288l3.288,3.288c0.439,0.438,0.439,1.151,0,1.591c-0.22,0.22-0.507,0.329-0.795,0.329
						s-0.576-0.109-0.795-0.33l-3.287-3.288l-3.289,3.288c-0.22,0.22-0.507,0.329-0.795,0.329s-0.576-0.109-0.795-0.33
						c-0.439-0.438-0.439-1.151,0-1.591l3.289-3.288l-3.288-3.288c-0.439-0.438-0.439-1.151,0-1.591s1.151-0.44,1.591,0.001l3.287,3.288
						l3.289-3.288c0.439-0.439,1.151-0.44,1.591,0.001C26.819,305.061,26.819,305.773,26.379,306.213z"/>
				</svg>
			</button>
		</div>
		<div class="modal-body">
			<div class="games">
				<div class="section-subheader">
					<h3>Recently Played</h3>
				</div>
				<div v-for="game in games_recent" class="game recent" :id="game.appid">
					<a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank">
						<img :src="'https://media.steampowered.com/steamcommunity/public/images/apps/' + game.appid + '/' + game.img_logo_url + '.jpg'">
					</a>
					<h4 class="title">{{game.name}}</h2>
					<button class="svg-button pin" v-on:click="pin(game)" aria-label="Pin">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
							<path d="M190.264,133.251l0.045-55.996l11.273-0.032l0.024-24.784L99.295,52.694l-0.021,24.793l11.114-0.031l0.045,55.795 
								c-15.242,10.813-25.865,27.671-28.311,47.11h0.053c-0.016,0.118-0.038,0.235-0.053,0.354l60.985-0.156l-0.048,78.525
								c-0.01,6.596,3.247,11.969,7.211,11.96c3.977-0.005,7.23-5.413,7.236-11.995l0.04-78.527l61.026-0.16
								C216.129,160.923,205.506,144.064,190.264,133.251z M110.395,77.457l0.153,0l-0.01,5.049L110.395,77.457z M125,75h12.5v53.08
								l-12.5,1.655V75z"/>
						</svg>
					</button>
				</div>
				<div class="section-subheader">
					<h3>All Owned Games</h3>
				</div>
				<div v-for="game in filteredGames" class="game all" :id="game.appid">
					<a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank">
						<img :src="'https://media.steampowered.com/steamcommunity/public/images/apps/' + game.appid + '/' + game.img_logo_url + '.jpg'">
					</a>
					<h4 class="title">{{game.name}}</h2>
					<button class="svg-button pin" v-on:click="pin(game)" aria-label="Pin">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
							<path d="M190.264,133.251l0.045-55.996l11.273-0.032l0.024-24.784L99.295,52.694l-0.021,24.793l11.114-0.031l0.045,55.795 
								c-15.242,10.813-25.865,27.671-28.311,47.11h0.053c-0.016,0.118-0.038,0.235-0.053,0.354l60.985-0.156l-0.048,78.525
								c-0.01,6.596,3.247,11.969,7.211,11.96c3.977-0.005,7.23-5.413,7.236-11.995l0.04-78.527l61.026-0.16
								C216.129,160.923,205.506,144.064,190.264,133.251z M110.395,77.457l0.153,0l-0.01,5.049L110.395,77.457z M125,75h12.5v53.08
								l-12.5,1.655V75z"/>
						</svg>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require "./template/footer.php"; ?>