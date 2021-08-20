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
        games_all: {},
        games_pinned: [],
        games_recent: {},
        user: {}
    },
    methods:{
        getSteamData: function(endpoint) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/assets/proxy.php?endpoint=' + endpoint + '&steam_user_id=' + steam_user_id, true);
            xhr.responseType = 'json';
            xhr.onload = function() {
              var status = xhr.status;
              if (status === 200) {
                // callback(null, xhr.response);
                switch(endpoint) {
                    case "GetPlayerSummaries":
                        app.user = this.response.response.players[0];
                        break;
                    // case "GetUserStatsForGame":
                    //     app.maybenotgonnausethis = this.response.playerstats;
                    //     break;
                    case "GetOwnedGames":
                        app.games_all = this.response.response.games;
                        break;
                    case "GetRecentlyPlayedGames":
                        app.games_recent = this.response.response.games;
                        break;
                }
              } else {
                // callback(status, xhr.response);
                console.log('fail');
              }
            };
            xhr.send();
        },
        pin: function(data){
            this.games_pinned.push(data);
        }, 
        update_alert: function() {
            alert('updated!');
        },
    },
    beforeMount(){
        if(steam_user_id){
            this.getSteamData("GetPlayerSummaries");
            // this.getSteamData("GetUserStatsForGame");
            this.getSteamData("GetOwnedGames");
            this.getSteamData("GetRecentlyPlayedGames");
        }
     },
     mounted(){
        // this.clickTest();
        //  this.buildSteamGamesList();
        // console.log(this.games_recent);
     },
     updated(){
        //  this.update_alert();
     }
})

var modalContainer = document.getElementsByClassName("modal-container")[0];
var modalClose = document.getElementById("modal-close");
var modalOpen = document.getElementById("modal-open");
modalContainer.addEventListener('click', function(event){
    if( event.target === this ){
        modalContainer.style.display = 'none';
    }
});
modalClose.addEventListener('click', function(event){
	modalContainer.style.display = 'none';
});
modalOpen.addEventListener('click', function(event){
	modalContainer.style.display = 'flex';
});


