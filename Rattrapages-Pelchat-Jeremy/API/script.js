const API_KEY = 'fab4e7a4d7d8607cbd87aca04a4900be';

function getCurrentWeatherData() {
  const url = `https://api.openweathermap.org/data/2.5/weather?q=Paris&units=metric&lang=fr&appid=${API_KEY}`;

  return fetch(url)
    .then(response => {
      if (!response.ok) {
        throw new Error(`Erreur lors de la requête : ${response.status} ${response.statusText}`);
      }
      return response.json();
    })
    .catch(error => {
      console.error('Une erreur s\'est produite lors de la récupération des données météorologiques actuelles :', error.message);
    });
}

function getForecastWeatherData() {
  const url = `https://api.openweathermap.org/data/2.5/forecast?q=Paris&units=metric&lang=fr&appid=${API_KEY}`;

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

const weatherInfoElement = document.getElementById('weather-info');

function displayWeatherInfo(currentWeatherData, forecastWeatherData) {
  let forecastString = '';

  const currentTemperature = currentWeatherData.main.temp;
  const currentWeatherDescription = currentWeatherData.weather[0].description;
  forecastString += `Temps actuel - Température : ${currentTemperature}°C, Description : ${currentWeatherDescription}<br><br>`;

  let forecastCount = 0;
  for (let i = 0; i < forecastWeatherData.list.length; i++) {
    const forecastDayWeather = forecastWeatherData.list[i];
    const forecastDateTime = new Date(forecastDayWeather.dt_txt);
    const forecastHour = forecastDateTime.getHours();

    if (forecastHour === 12 || forecastHour === 18) {
      forecastCount++;
      if (forecastCount > 10) {
        break;
      }

      const forecastTemperature = forecastDayWeather.main.temp;
      const forecastWeatherDescription = forecastDayWeather.weather[0].description;
      const forecastDateString = forecastDateTime.toLocaleDateString('fr-FR', { weekday: 'long' });
      const forecastTimeString = forecastDateTime.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });

      forecastString += `${forecastDateString} à ${forecastTimeString} - Température : ${forecastTemperature}°C, Description : ${forecastWeatherDescription}<br>`;
    }
  }

  weatherInfoElement.innerHTML = forecastString;
}

Promise.all([getCurrentWeatherData(), getForecastWeatherData()])
  .then(([currentWeatherData, forecastWeatherData]) => {
    displayWeatherInfo(currentWeatherData, forecastWeatherData);
  })
  .catch(error => {
    console.error('Une erreur s\'est produite lors de la récupération des données météorologiques :', error.message);
  });
