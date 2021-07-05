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

// See : https://www.reddit.com/r/Steam/comments/1u4h90/api_to_get_the_steam_banners_for_games/
// use : http://steamcommunity.com/profiles/<steam_id_64>/games?tab=all&xml=1
// where :  steam_id_64 = 76561197995679405 (my steamid64)
function getSteamGames(){
    var xml = "https://steamcommunity.com/profiles/76561197995679405/games?tab=all&xml=1";
    var xmlencoded = encodeURIComponent(xml);
    // console.log(xmlencoded);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
            var parser = new DOMParser();
            var xmlDoc = parser.parseFromString(this.responseText, "text/xml");
            // console.log("Success: ", this.responseText);
            // console.log("xmldoc: ", xmlDoc);
            // console.log(xmlDoc.getElementsByTagName("name")[2].childNodes[0].nodeValue);
        var games = xmlDoc.getElementsByTagName("game");
        var gamesList = [];
        for(const game of games){
            // console.log(game);
            var gameObj = {};
            gameObj.appID = game.getElementsByTagName("appID")[0].textContent;
            gameObj.name = game.getElementsByTagName("name")[0].textContent;
            gameObj.logo = game.getElementsByTagName("logo")[0].textContent;
            gameObj.storeLink = game.getElementsByTagName("storeLink")[0].textContent;

            gameObj.statsLink = game.getElementsByTagName("statsLink").length > 0 ? game.getElementsByTagName("statsLink")[0].textContent : null;
            gameObj.globalStatsLink = game.getElementsByTagName("globalStatsLink").length > 0 ? game.getElementsByTagName("globalStatsLink")[0].textContent : null;
            gameObj.hoursOnRecord = game.getElementsByTagName("hoursOnRecord").length > 0 ? game.getElementsByTagName("hoursOnRecord")[0].textContent : null;
            gameObj.hoursLast2Weeks = game.getElementsByTagName("hoursLast2Weeks").length > 0 ? game.getElementsByTagName("hoursLast2Weeks")[0].textContent : null;

            gamesList.push(gameObj);
            // if(hoursLast2Weeks){
            //     console.log(name);
            // }
            // if(hoursOnRecord>100){
            //     console.log(name, hoursOnRecord);
            // }
          }
          console.log(gamesList);
        }
        // else {
        //   console.log("Error code: ", this.status);
        // }
      };
 
    xhttp.open("GET", "http://steam-browser-home-page.test/assets/ba-simple-proxy.php?url=" + xmlencoded + "&mode=native", true);
    xhttp.send();
}

getSteamGames();

