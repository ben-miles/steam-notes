let games = [
    {
        title: "No Man's Sky",
        steamId: 275850,
        links: [
            {
                label: "No Man's Sky Wiki",
                url: "https://nomanssky.gamepedia.com/"
            },
            {
                label: "No Man's Sky Subreddit",
                url: "https://www.reddit.com/r/NoMansSkyTheGame/"
            }
        ]
    },
    {
        title: "The Long Dark",
        steamId: 305620,
        links: [
            {
                label: "The Long Dark Wiki",
                url: "https://thelongdark.fandom.com/wiki/The_Long_Dark_Wiki/"
            },
            {
                label: "The Long Dark Subreddit",
                url: "https://www.reddit.com/r/thelongdark/"
            }
        ]
    },
    {
        title: "Subnautica",
        steamId: 264710,
        links: [
            {
                label: "Subnautica Map",
                url: "http://subnauticamap.io/"
            },
            {
                label: "Subnautica Wiki",
                url: "http://subnautica.wikia.com/"
            },
            {
                label: "Subnautica Subreddit",
                url: "https://www.reddit.com/r/subnautica/"
            }
        ]
    },
    {
        title: "The Forest",
        steamId: 242760,
        links: []
    },
    {
        title: "Raft",
        steamId: 648800,
        links: []
    },
    {
        title: "Stardew Valley",
        steamId: 413150,
        links: []
    },
    {
        title: "The Elder Scrolls V: Skyrim",
        steamId: 489830,
        links: []
    },
    {
        title: "Star Wars Battlefront II",
        steamId: 1237950,
        links: []
    },
    {
        title: "Portal 2",
        steamId: 620,
        links: []
    },
    {
        title: "Fallout 76",
        steamId: 1151340,
        links: []
    },
    {
        title: "Fallout New Vegas",
        steamId: 22380,
        links: []
    },
    {
        title: "Cuphead",
        steamId: 268910,
        links: []
    }
];

var app = new Vue({
    el: '#app',
    data: {
        games: games
    },
    methods:{
        getSteamData: function(endpoint, steam_user_id = "76561197995679405") {
            var request = new XMLHttpRequest();
            request.open("POST", "/assets/proxy.php", true);
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            request.responseType = "json";
            request.send("endpoint=" + endpoint + "&steam_user_id=" + steam_user_id);
            request.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    // TODO: If not JSON (if first char != "{"), throw unexepected result error
                    switch(endpoint) {
                        case "GetPlayerSummaries":
                            var data = this.response.response.players;
                            break;
                        case "GetUserStatsForGame":
                            var data = this.response.playerstats;
                            break;
                        case "GetOwnedGames":
                            var data = this.response.response.games;
                            break;
                        case "GetRecentlyPlayedGames":
                            var data = this.response.response.games;
                            break;
                    }
                    console.log(endpoint, data);
                }
                // TODO: else, throw connection error
            };
        },
    },
    beforeMount(){
        this.getSteamData("GetPlayerSummaries"),
        this.getSteamData("GetUserStatsForGame");
        this.getSteamData("GetOwnedGames");
        this.getSteamData("GetRecentlyPlayedGames");
     },
     mounted(){
         this.buildSteamGamesList();
     }
})

var modalContainer = document.getElementsByClassName("modal-container")[0];
var modalClose = document.getElementById("modal-close");
var modalOpen = document.getElementById("modal-open");
modalClose.addEventListener('click', function(event){
	modalContainer.style.display = 'none';
});
modalOpen.addEventListener('click', function(event){
	modalContainer.style.display = 'flex';
});


