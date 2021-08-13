<?php require "./template/header.php"; 
// print_r($_SESSION);

if(!isset($_SESSION['steamid'])) {
    echo "<script>var steam_user_id = null;</script>";
} else {
    echo "<script>var steam_user_id = " . $_SESSION['steamid'] . ";</script>";
}

?>

            <section class="body">
                <div class="container">
                <h2 style="width: 100%;">Games: Pinned</h2>
                        <div v-for="(game, index) in games_pinned" class="game" :id="game.appid" v-bind:index="index" v-bind:key="game.appid">
                            <!-- a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank" -->
                                <img :src="'https://cdn.cloudflare.steamstatic.com/steam/apps/' + game.appid + '/header.jpg'">
                            <!-- /a -->
                            <h2 class="title">{{game.name}}</h2>
                        </div>
                </div>
            </section>

            <div class="modal-container" style="position:absolute;top:0;bottom:0;left:0;right:0;background:rgba(0,0,0,0.5);display:none;flex-direction: column;flex-wrap: nowrap;justify-content: flex-start;align-items: center;align-content: center;overflow: hidden;">
                <div class="modal" style="background:#171a21;width:1100px;height:720px;margin-top:100px;overflow-y: scroll;">
                    <button id="modal-close">X</button>
                    <h1>My Games</h1>
                    <p>Select games here to pin them to your Steam Home Page. From there, you can add links and notes to your pinned games.</p>
                    <div class="games">
                        <h2 style="width: 100%;">Games: Recent</h2>
                        <div v-for="game in games_recent" class="game recent" :id="game.appid" v-on:click="pin({appid:game.appid, name:game.name})">
                            <!-- a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank" -->
                                <img :src="'https://cdn.cloudflare.steamstatic.com/steam/apps/' + game.appid + '/header.jpg'">
                            <!-- /a -->
                            <h2 class="title">{{game.name}}</h2>
                        </div>
                        <h2 style="width: 100%;">Games: All</h2>
                        <div v-for="game in games_all" class="game" :id="game.appid" v-on:click="pin([game.appid, game.name])">
                            <!-- a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank" -->
                                <img :src="'https://cdn.akamai.steamstatic.com/steam/apps/' + game.appid + '/capsule_231x87.jpg'">
                            <!-- /a -->
                            <h2 class="title">{{game.name}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <button id="modal-open">Open</button>

<?php require "./template/footer.php"; ?>