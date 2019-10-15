var mymap = L.map('mapid').setView([58.349540, 15.289505], 15);
var marker = L.marker([58.349540, 15.289505]).addTo(mymap);     

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoib2xvYWhyNjQyIiwiYSI6ImNqcGk2a2pwYjAwZjIza3J1bHlvdTl6Y3MifQ.wVvSpDZ2B-ZKUwIuKL8T_Q', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1Ijoib2xvYWhyNjQyIiwiYSI6ImNqcGk2a2pwYjAwZjIza3J1bHlvdTl6Y3MifQ.wVvSpDZ2B-ZKUwIuKL8T_Q'
}).addTo(mymap);

// var Thunderforest_SpinalMap = L.tileLayer('https://{s}.tile.thunderforest.com/spinal-map/{z}/{x}/{y}.png?apikey=pk.eyJ1Ijoib2xvYWhyNjQyIiwiYSI6ImNqcGk2a2pwYjAwZjIza3J1bHlvdTl6Y3MifQ.wVvSpDZ2B-ZKUwIuKL8T_Q', {
// 	attribution: '&copy; <a href="http://www.thunderforest.com/">Thunderforest</a>, &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
// 	apikey: 'pk.eyJ1Ijoib2xvYWhyNjQyIiwiYSI6ImNqcGk2a2pwYjAwZjIza3J1bHlvdTl6Y3MifQ.wVvSpDZ2B-ZKUwIuKL8T_Q',
// 	maxZoom: 22
// });




// var mymap = L.map('mapid').setView([58.349540, 15.289505], 15);
//         var marker = L.marker([58.349540, 15.289505]).addTo(mymap);
        
//         58.349540, 15.289505
    
//         L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoib2xvYWhyNjQyIiwiYSI6ImNqcGk2a2pwYjAwZjIza3J1bHlvdTl6Y3MifQ.wVvSpDZ2B-ZKUwIuKL8T_Q', {
//         attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
//         maxZoom: 18,
//         id: 'mapbox.streets',
//         accessToken: 'pk.eyJ1Ijoib2xvYWhyNjQyIiwiYSI6ImNqcGk2a2pwYjAwZjIza3J1bHlvdTl6Y3MifQ.wVvSpDZ2B-ZKUwIuKL8T_Q'
//         }).addTo(mymap);
        
        
        
        
        
