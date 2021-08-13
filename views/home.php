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
            </div>

<?php require "./template/footer.php"; ?>