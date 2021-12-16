var app = new Vue({
    el: '#app',
    data: {
        games_all: [],
        games_pinned: [],
        games_recent: [],
        user: {},
		search: ''
    },
    methods: {
        getSteamData: function(endpoint) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/assets/proxy.php?endpoint=' + endpoint + '&steam_user_id=' + steam_user_id, true);
            xhr.responseType = 'json';
            xhr.onload = function() {
              var status = xhr.status;
              if (status === 200) {
                switch(endpoint) {
                    case "GetPlayerSummaries":
                        app.user = this.response.response.players[0];
                        break;
                    // case "GetUserStatsForGame":
                    //     app.maybenotgonnausethis = this.response.playerstats;
                    //     break;
                    case "GetOwnedGames":
						app.games_all = this.response.response.games;
						app.games_all.sort(function(a, b) {
							var textA = a.name.toUpperCase();
							var textB = b.name.toUpperCase();
							return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
						});
                        break;
                    case "GetRecentlyPlayedGames":
                        app.games_recent = this.response.response.games;
                        break;
                }
              } else {
                // console.log('fail');
              }
            };
            xhr.send();
        },
		flexibleTextareas: function(){
			var textareas = document.getElementsByTagName( "textarea" );
			for( var textarea of textareas ){
				textarea.style.height = textarea.scrollHeight + "px";
				textarea.addEventListener( "input", function(e){
					e.target.style.height = "auto";
					e.target.style.height = e.target.scrollHeight + "px";
				});
			}
		},
		log: function(element){
			console.log(element);
		},
        pin: function(data){
            this.games_pinned.push(data);
			// Save to DB
			app.saveToDB();
        }, 
        confirmUnpin: function(index, event){
            var confirmationDialog = event.target.parentElement.firstChild;
            confirmationDialog.style.display = 'flex';
        },
		cancelUnpin: function(event){
            var confirmationDialog = event.target.parentElement;
            confirmationDialog.style.display = 'none';
        },
        unpin: function(index){
            this.games_pinned.splice(index, 1);
			// Save to DB
			app.saveToDB();
        }, 
        update_alert: function(){
            alert('updated!');
        },
		updateModalPins: function(){
			// Get IDs of all pinned games
			var appid_array = [];
			app.games_pinned.forEach(game_pinned => { 
				appid_array.push(game_pinned.appid); 
			});
			// Get all Modal Game nodes
			var modal = document.getElementsByClassName('modal')[0];
			var modal_games = modal.getElementsByClassName('game');
			// Loop through Modal Game nodes
			for( var modal_game of modal_games ){
				// Identify the Pin button
				var pinButton = modal_game.getElementsByClassName('pin')[0];
				// If their id's matches one of those from the user's pinned games,
				if(appid_array.includes(parseInt(modal_game.id))){
					// Add "pinned" to its class
					modal_game.classList.add('pinned');
					// Disable the Pin button
					pinButton.disabled = true;
				// Otherwise, 
				} else {
					// Remove "pinned" from its class
					modal_game.classList.remove('pinned');
					// Enable the Pin button
					pinButton.disabled = false;
				}
			}
		},
        saveData: function(index, event){
            // Prevent saving on every keypress, by resetting a timer...
            window.clearTimeout(timer);
            timer = window.setTimeout(function(){
				// Save to Vue Data
                app.games_pinned[index].notes = event.target.value;
                // Save to DB
                app.saveToDB();
            }, 3000); 
        },
		saveToDB: function(){
			dataString = JSON.stringify(app.games_pinned);
			var xhr = new XMLHttpRequest();
			xhr.open('GET', '/assets/save.php?data=' + dataString, true);
			xhr.onload = function() {
				var status = xhr.status;
				if (status === 200) {
					// console.log(xhr.responseText);
				} else {
					// console.log('fail');
				}
			};
			xhr.send();
		}
    },
	computed: {
		filteredGames() {
			return this.games_all.filter(game => {
				return game.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1;
			})
		}
	},
    beforeMount(){
        if(steam_user_id){
			this.getSteamData("GetPlayerSummaries");
            this.getSteamData("GetOwnedGames");
            this.getSteamData("GetRecentlyPlayedGames");
			if(user_data){
                this.games_pinned = user_data;
            }
        }
	},
	mounted(){
		this.flexibleTextareas();
     },
     updated(){
		this.flexibleTextareas();
		this.updateModalPins();
     }
})

var timer;
var body = document.getElementsByTagName("body")[0];
var modalContainer = document.getElementsByClassName("modal-container")[0];
var modalClose = document.getElementById("modal-close");
var modalOpen = document.getElementById("modal-open");
if( modalContainer ) {
	modalContainer.addEventListener('click', function(event){
		if( event.target === this ){
			body.classList.remove("modal-open");
		}
	});
	modalClose.addEventListener('click', function(event){
		body.classList.remove("modal-open");
	});
	modalOpen.addEventListener('click', function(event){
		body.classList.add("modal-open");
	});
}
