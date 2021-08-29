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
        confirmUnpin: function(index, event){
            var thisPinnedGame = document.getElementsByClassName("pinned")[index];
            var confirmationDialogue = thisPinnedGame.getElementsByClassName("confirm-unpin")[0];
            confirmationDialogue.style.display = 'flex';
        },
        unpin: function(index){
            this.games_pinned.splice(index, 1);
        }, 
        update_alert: function(){
            alert('updated!');
        },
        saveData: function(index, event){
            // Prevent saving on every keypress, by resetting a timer...
            window.clearTimeout(timer);
            timer = window.setTimeout(function(){
                // Save to Vue Data
                app.games_pinned[index].notes = event.target.value;
                
                // Save to DB
                dataString = JSON.stringify(app.games_pinned);
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/assets/save.php?data=' + dataString, true);
                xhr.onload = function() {
                    var status = xhr.status;
                    if (status === 200) {
                        console.log(xhr.responseText);
                        // callback(null, xhr.response);
                    } else {
                        // callback(status, xhr.response);
                        console.log('fail');
                    }
                };
                xhr.send();
            }, 3000); 
        }
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

var timer;
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
