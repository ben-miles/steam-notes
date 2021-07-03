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

// get game data from steam api
// var steam = {};
// steam.id = 76561197995679405;
// steam.key = "432CE48D69015FC4CDC221371382DF51";
// steam.url = `https://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=${steam.key}&steamid=${steam.id}&format=json`;

// fetch(steam.url)
// 	.then((response) => {
// 		console.log(response.json);
// 		// return response.json();
// 	})
// 	.then((data) => {
// 		// Work with JSON data here
// 		console.log(data);
// 	})
// 	.catch((err) => {
// 		// Do something for an error here
// 	});