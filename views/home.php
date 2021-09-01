<?php require "./template/header.php"; ?>

            <section class="body">
                <div class="container">
                    <h2 style="width: 100%;">Games: Pinned</h2>
                    <div v-for="(game, index) in games_pinned" class="game pinned" :id="'game_' + game.appid" :index="index" :key="game.appid">
                        <div class="confirm-unpin">
                            <h3>Unpin this game?</h3>
                            <p>This cannot be undone.</p>
                            <button v-on:click="unpin(index)">Confirm Unpin</button><button v-on:click="cancelUnpin($event)">Cancel</button>
                        </div>
                        <!-- a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank" -->
							<img :src="'https://media.steampowered.com/steamcommunity/public/images/apps/' + game.appid + '/' + game.img_logo_url + '.jpg'">
                        <!-- /a -->
                        <h2 class="title">{{game.name}}</h2>
                        <label :for="'notes_' + game.appid">Notes:</label>
                        <textarea :id="'notes_' + game.appid" :name="'notes_' + game.appid" rows="4" v-on:input="saveData(index, $event)">{{game.notes}}</textarea>
                        <button class="unpin" v-on:click="confirmUnpin(index, $event)">X</button>
                    </div>

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
                                <button class="pin" v-on:click="pin(game)">Pin</button>
                            </div>
                            <h2 style="width: 100%;">Games: All</h2>
                            <!-- <div v-for="game in games_all" class="game all" :id="game.appid"> -->
                            <div v-for="game in filteredGames" class="game all" :id="game.appid">
                                <!-- a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank" -->
                                    <img :src="'https://media.steampowered.com/steamcommunity/public/images/apps/' + game.appid + '/' + game.img_logo_url + '.jpg'">
                                <!-- /a -->
                                <h2 class="title">{{game.name}}</h2>
                                <button class="pin" v-on:click="pin(game)">Pin</button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer"></div> -->
                </div>
            </div>
            

<?php require "./template/footer.php"; ?>