<?php require "./template/header.php"; 
// print_r($_SESSION);

if(!isset($_SESSION['steamid'])) {
    echo "<script type=\"application/javascript\">var steam_user_id = null;</script>";
} else {
    echo "<script type=\"application/javascript\">var steam_user_id = " . $_SESSION['steamid'] . ";</script>";
}

?>

            <section class="body">
                <div class="container">

                    <button id="modal-open">Open</button>
                
                    <h2 style="width: 100%;">Games: Pinned</h2>
                    <div v-for="(game, index) in games_pinned" class="game pinned" :id="'game_' + game.appid" :index="index" :key="game.appid">
                        <!-- a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank" -->
                            <img :src="'https://cdn.cloudflare.steamstatic.com/steam/apps/' + game.appid + '/header.jpg'">
                        <!-- /a -->
                        <h2 class="title">{{game.name}}</h2>
                        <button class="unpin" v-on:click="unpin(index)">X</button>
                        <label :for="'notes_' + game.appid">Notes:</label>
                        <textarea :id="'notes_' + game.appid" :name="'notes_' + game.appid" rows="4" v-on:input="saveData(index, $event)"></textarea>
                    </div>

                </div>
            </section>

            <div class="modal-container">
                <div class="modal">
                    <div class="modal-header">
                        <h1>My Games</h1>
                        <p>Select games here to pin them to your Steam Home Page. From there, you can add links and notes to your pinned games.</p>
                        <button id="modal-close">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="games">
                            <h2 style="width: 100%;">Games: Recent</h2>
                            <div v-for="game in games_recent" class="game recent" :id="game.appid">
                                <!-- a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank" -->
                                    <img :src="'https://cdn.cloudflare.steamstatic.com/steam/apps/' + game.appid + '/header.jpg'">
                                <!-- /a -->
                                <h2 class="title">{{game.name}}</h2>
                                <button class="pin" v-on:click="pin({appid:game.appid, name:game.name})">Pin</button>
                            </div>
                            <h2 style="width: 100%;">Games: All</h2>
                            <div v-for="game in games_all" class="game all" :id="game.appid">
                                <!-- a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank" -->
                                    <img :src="'https://cdn.akamai.steamstatic.com/steam/apps/' + game.appid + '/capsule_231x87.jpg'">
                                <!-- /a -->
                                <h2 class="title">{{game.name}}</h2>
                                <button class="pin" v-on:click="pin({appid:game.appid, name:game.name})">Pin</button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer"></div> -->
                </div>
            </div>
            

<?php require "./template/footer.php"; ?>