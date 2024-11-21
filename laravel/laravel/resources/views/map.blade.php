<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta dan Informasi Cuaca</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-geosearch/dist/geosearch.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-geosearch/dist/geosearch.umd.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        #map {
            height: 600px;
            width: 80%;
            margin: 20px auto;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #search-container {
            display: flex; 
            justify-content: flex-start; 
            align-items: center;
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #search-container input[type="text"] {
            flex-grow: 1;
            height: 40px;
            padding: 10px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #search-container button {
            width: 100px;
            height: 40px;
            padding: 10px;
            font-size: 18px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px; 
        }
        #search-container button:hover {
            background-color: #3e8e41;
        }
        #weather-info {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; margin-top: 20px;">Peta dan Informasi Cuaca</h1>
    <div id="search-container">
        <input type="text" id="location" placeholder="Masukkan nama lokasi" />
        <button id="search-button">Cari</button>
    </div>
    <div id="map"></div>
    <div id="weather-info"></div>

    <script>
        const apiKey = '1d7259159f3ed0ad3ffbcc46e76ce5c0'; 

        var map = L.map('map').setView([0, 0], 2); 

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        function getWeather(lat, lon) {
            fetch(`/weather?lat=${lat}&lon=${lon}`)
                .then(response => response.json())
                .then(data => {
                    var weatherInfo = `
                    <h2>Informasi Cuaca</h2>
                    <table>
                        <tr>
                            <th>Lokasi</th>
                            <td>${data.name}</td>
                        </tr>
                        <tr>
                            <th>Cuaca</th>
                            <td>${data.weather[0].description}</td>
                        </tr>
                        <tr>
                            <th>Suhu</th>
                            <td>${data.main.temp}°C</td>
                        </tr>
                        <tr>
                            <th>Kelembaban</th>
                            <td>${data.main.humidity}%</td>
                        </tr>
                    </table>
                    `;
                    document.getElementById('weather-info').innerHTML = weatherInfo;
                })
                .catch(error => console.error('Error:', error));
        }

        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lon = e.latlng.lng;
            getWeather(lat, lon);
        });

        const search = new GeoSearch.OpenStreetMapProvider();

        document.getElementById('search-button').addEventListener('click', function() {
            var location = document.getElementById('location').value;

            search.search({ query: location }).then(function(result) {
                if (result.length > 0) {
                    var lat = result[0].y;
                    var lon = result[0].x;

                    map.setView([lat, lon], 10);
                    L.marker([lat, lon]).addTo(map).bindPopup(location).openPopup();

                    getWeather(lat, lon);
                } else {
                    alert('Lokasi tidak ditemukan!');
                }
            });
        });
    </script>
</body>
</html>
