<?php require "./template/header.php"; print_r($_SESSION);?>

<section class="body">
    <div class="container">
        <div class="games" id="app">
            <!-- <input v-model="steam_user_id"> -->
            <h2 style="width: 100%;">Games: Recent</h2>
            <div v-for="game in games_recent" class="game" :id="game.appid">
                <a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank">
                    <img :src="'https://cdn.cloudflare.steamstatic.com/steam/apps/' + game.appid + '/header.jpg'">
                </a>
                <h2 class="title">{{game.name}}</h2>
                <!-- <ul>
                    <li>
                        <a :href="'https://www.google.com/search?q=' + game.name + ', '" target="_self">Google: {{game.name}}</a>
                    </li>
                </ul> -->
            </div>
            <h2 style="width: 100%;">Games: All</h2>
            <div v-for="game in games" class="game recent" :id="game.appid">
                <a class="cover" :href="'https://store.steampowered.com/app/' + game.appid + '/'" target="_blank">
                    <img :src="'https://cdn.akamai.steamstatic.com/steam/apps/' + game.appid + '/capsule_231x87.jpg'">
                </a>
                <h2 class="title">{{game.name}}</h2>
                <!-- <ul>
                    <li>
                        <a :href="'https://www.google.com/search?q=' + game.name + ', '" target="_self">Google: {{game.name}}</a>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>
</section>

<?php require "./template/footer.php"; ?>