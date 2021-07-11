var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!'
    }
})

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
let gamesContainer = document.getElementsByClassName("games")[0];
for(let i = 0; i < games.length; i++) {

    let game = document.createElement("div");
    game.className = "game";
    game.id = games[i].title.toLowerCase().replace(/[ ':]/g, "");
    gamesContainer.appendChild(game);

    let coverLink = document.createElement("a");
    coverLink.className = "cover";
    coverLink.href = `https://store.steampowered.com/app/${games[i].steamId}/`;
    coverLink.target = "_blank"
    game.appendChild(coverLink);

    let coverImage = document.createElement("img");
    coverImage.src = `https://cdn.cloudflare.steamstatic.com/steam/apps/${games[i].steamId}/header.jpg`;
    coverLink.appendChild(coverImage);

    let title = document.createElement("h2");
    title.className = "title";
    title.innerHTML = games[i].title;
    game.appendChild(title);

    let links = document.createElement("ul");
    game.appendChild(links);

    for(let ii = 0; ii < games[i].links.length; ii++) {

        let link = document.createElement("li");
        links.appendChild(link);

        let url = document.createElement("a");
        url.href = games[i].links[ii].url;
        url.target="_blank";
        url.innerHTML = games[i].links[ii].label;
        link.appendChild(url);

    }

    let link = document.createElement("li");
    links.appendChild(link); 

    let googleLink = document.createElement("a");
    googleLink.href = `https://www.google.com/search?q=${games[i].title}, `
    googleLink.target="_self";
    googleLink.innerHTML = `Google: ${games[i].title}`;
    link.appendChild(googleLink);

};

function getSteamData(endpoint, steam_user_id = "76561197995679405"){ // TODO: make this a more universal ajax function... accept ENDPOINT, STEAM_USER_ID
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
            // var gamesList = [];
            // for(const game of games){
            //     console.log(game);
            //     var gameObj = {};
            //     gameObj.appID = game.getElementsByTagName("appID")[0].textContent;
            //     gameObj.name = game.getElementsByTagName("name")[0].textContent;
            //     gameObj.logo = game.getElementsByTagName("logo")[0].textContent;
            //     gameObj.storeLink = game.getElementsByTagName("storeLink")[0].textContent;
            //     gameObj.statsLink = game.getElementsByTagName("statsLink").length > 0 ? game.getElementsByTagName("statsLink")[0].textContent : null;
            //     gameObj.globalStatsLink = game.getElementsByTagName("globalStatsLink").length > 0 ? game.getElementsByTagName("globalStatsLink")[0].textContent : null;
            //     gameObj.hoursOnRecord = game.getElementsByTagName("hoursOnRecord").length > 0 ? game.getElementsByTagName("hoursOnRecord")[0].textContent : null;
            //     gameObj.hoursLast2Weeks = game.getElementsByTagName("hoursLast2Weeks").length > 0 ? game.getElementsByTagName("hoursLast2Weeks")[0].textContent : null;
            //     gamesList.push(gameObj);
            // }
            // console.log(gamesList);
        }
        // TODO: else, throw connection error
    };
    
    
}

getSteamData("GetPlayerSummaries");
getSteamData("GetUserStatsForGame");
getSteamData("GetOwnedGames");
getSteamData("GetRecentlyPlayedGames");
