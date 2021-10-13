<?php require "./template/header.php"; ?>

            <section class="body">
                <div class="container">

					<?php if(isset($_SESSION['steamid'])) { ?>
                    <h2 style="width: 100%;">Games: Pinned</h2>
                    <div v-for="(game, index) in games_pinned" class="game pinned" :id="'game_' + game.appid" :index="index" :key="game.appid">
                        <div class="confirm-unpin">
                            <h3>Unpin this game?</h3>
                            <p>This cannot be undone.</p>
                            <button v-on:click="unpin(index)">Confirm Unpin</button>
							<button v-on:click="cancelUnpin($event)">Cancel</button>
                        </div>
                        <!-- a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank" -->
							<img :src="'https://media.steampowered.com/steamcommunity/public/images/apps/' + game.appid + '/' + game.img_logo_url + '.jpg'">
                        <!-- /a -->
                        <h2 class="title">{{game.name}}</h2>
                        <label :for="'notes_' + game.appid">Notes:</label>
                        <textarea :id="'notes_' + game.appid" :name="'notes_' + game.appid" rows="4" v-on:input="saveData(index, $event)">{{game.notes}}</textarea>
                        <button class="unpin" v-on:click="confirmUnpin(index, $event)" aria-label="Unpin">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
								<path d="M125,110.983l-14.468-14.468l0.016-19.059l-11.273,0.031l0.021-24.793l102.312-0.254l-0.024,24.784l-11.273,0.032
									l-0.045,55.996c15.242,10.813,25.865,27.671,28.311,47.11l-24.131,0.065L137.5,123.483V75H125V110.983z M157.555,196.571
									l-0.047,62.478c-0.006,6.582-3.26,11.99-7.236,11.995c-3.965,0.009-7.222-5.364-7.211-11.96l0.066-76.941L157.555,196.571z
									M141.547,180.563l-59.424,0.151c1.974-15.502,9.136-29.383,19.677-39.898L141.547,180.563z M64.017,67.678L233.08,236.742
									l-8.838,8.838L55.178,76.517L64.017,67.678z"/>
							</svg>
						</button>
                    </div>
					<?php } else { ?>
						<h2 style="width: 100%;">Welcome!</h2>
						<p>Steam Browser Home Page is a custom home page for your Steam Browser (or any browser, really!). Steam Browser Home Page is made for streamers, casual gamers, and total noobs alike.</p> 
						<p>It's a central location for your favorite online guides or maps. It's a convenient place to jot notes on character stats or points of interest, or reminders for your next session. It's an instantly-at-hand reference for your short and long-game strategies.</p> 
						<ol>
							<li><b>Sign in</b> with your Steam account (you will be redirected to Steam to sign in, then returned here).</li>
							<li><b>Pin your games</b> to your home page to create and save notes.</li>
							<li><b>Notes are automatically saved</b> everytime you add or remove a game, and as you type.</li>
							<li><b>Your notes are backed up</b> to a database, so you can access them from any browser on any device.</li>
						</ol>
						<p><b>NOTE:</b> In order for this app to access your list of Steam games, your Steam Profile must be set to "Public." Go to your <a href="https://steamcommunity.com/my/edit/settings?snr=" target="_blank">Steam Profile Privacy Settings Page</a> and make sure that both "My profile" and "Game details" are set to "Public."</p>
					<?php } ?>

                </div>
            </section>

            <div class="modal-container">
                <div class="modal">
                    <div class="modal-header">
                        <h1>My Games</h1>
                        <p>Select games here to pin them to your Steam Home Page. From there, you can add links and notes to your pinned games.</p>
						<input type="text" v-model="search">
                        <button id="modal-close">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="games">
                            <h2 style="width: 100%;">Games: Recent</h2>
                            <div v-for="game in games_recent" class="game recent" :id="game.appid">
                                <!-- a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank" -->
									<img :src="'https://media.steampowered.com/steamcommunity/public/images/apps/' + game.appid + '/' + game.img_logo_url + '.jpg'">
                                <!-- /a -->
                                <h2 class="title">{{game.name}}</h2>
                                <button class="pin" v-on:click="pin(game)" aria-label="Pin">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
										<path d="M190.264,133.251l0.045-55.996l11.273-0.032l0.024-24.784L99.295,52.694l-0.021,24.793l11.114-0.031l0.045,55.795 
											c-15.242,10.813-25.865,27.671-28.311,47.11h0.053c-0.016,0.118-0.038,0.235-0.053,0.354l60.985-0.156l-0.048,78.525
											c-0.01,6.596,3.247,11.969,7.211,11.96c3.977-0.005,7.23-5.413,7.236-11.995l0.04-78.527l61.026-0.16
											C216.129,160.923,205.506,144.064,190.264,133.251z M110.395,77.457l0.153,0l-0.01,5.049L110.395,77.457z M125,75h12.5v53.08
											l-12.5,1.655V75z"/>
									</svg>
								</button>
                            </div>
                            <h2 style="width: 100%;">Games: All</h2>
                            <!-- <div v-for="game in games_all" class="game all" :id="game.appid"> -->
                            <div v-for="game in filteredGames" class="game all" :id="game.appid">
                                <!-- a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank" -->
                                    <img :src="'https://media.steampowered.com/steamcommunity/public/images/apps/' + game.appid + '/' + game.img_logo_url + '.jpg'">
                                <!-- /a -->
                                <h2 class="title">{{game.name}}</h2>
                                <button class="pin" v-on:click="pin(game)" aria-label="Pin">
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
                    <!-- <div class="modal-footer"></div> -->
                </div>
            </div>
            

<?php require "./template/footer.php"; ?>