const API_KEY = 'fab4e7a4d7d8607cbd87aca04a4900be';

function getWeatherData() {
  const url = `https://api.openweathermap.org/data/2.5/weather?q=Paris&units=metric&appid=${API_KEY}`;

  return fetch(url)
    .then(response => {
      if (!response.ok) {
        throw new Error(`Erreur lors de la requête : ${response.status} ${response.statusText}`);
      }
      return response.json();
    })
    .catch(error => {
      console.error('Une erreur s\'est produite lors de la récupération des données météorologiques :', error.message);
    });
}

getWeatherData()
  .then(weatherData => {
    displayWeatherInfo(weatherData);
  })
  .catch(error => {
    console.error('Une erreur s\'est produite lors de la récupération des données météorologiques :', error.message);
  });
