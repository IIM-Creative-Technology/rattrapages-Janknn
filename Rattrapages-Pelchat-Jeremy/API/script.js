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
const weatherDateElement = document.getElementById('weather-date');
const weatherTempElement = document.getElementById('weather-temp');
const weatherDescriptionElement = document.getElementById('weather-description');
const weatherAffluenceElement = document.getElementById('weather-affluence');

function getAffluence(description,temp) {
  let affluence = '';

  if (description.includes('pluie')) {
    if (temp < 5) {
      affluence = 'très faible affluence';
    } else {
      affluence = 'faible affluence';
    }
  } else if (description.includes('couvert')) {
    if (temp < 10) {
      affluence = 'faible affluence';
    } else {
      affluence = 'moyenne affluence';
    }
  } else if (description.includes('nuageux')) {
    if (temp < 20) {
      affluence = 'moyenne affluence';
    } else {
      affluence = 'forte affluence';
    }
  } else if (description.includes('ciel dégagé')) {
    affluence = 'forte affluence';
  }

  return affluence;
}

function displayWeatherInfo(currentWeatherData, forecastWeatherData) {
  const forecastElement = document.getElementById('forecast');
  forecastElement.innerHTML = '';

  const currentTemperature = currentWeatherData.main.temp;
  const currentWeatherDescription = currentWeatherData.weather[0].description;
  const currentAffluence = getAffluence(currentWeatherDescription, currentTemperature);

  const currentForecastElement = createForecastElement(new Date(), currentTemperature, currentWeatherDescription, currentAffluence);
  forecastElement.appendChild(currentForecastElement);

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
      const forecastAffluence = getAffluence(forecastWeatherDescription, forecastTemperature);

      const forecastForecastElement = createForecastElement(forecastDateTime, forecastTemperature, forecastWeatherDescription, forecastAffluence);
      forecastElement.appendChild(forecastForecastElement);
    }
  }
}

function createForecastElement(date, temperature, description, affluence) {
  const forecastElement = document.createElement('div');
  forecastElement.classList.add('forecast');
  forecastElement.classList.add('flex','flex-col','items-center','border-2','w-80','rounded-xl','justify-center','h-40','mb-16')

  const dateElement = document.createElement('div');
  dateElement.classList.add('weather-date');
  dateElement.textContent = date.toLocaleDateString('fr-FR', { weekday: 'long', hour: '2-digit', minute: '2-digit' });

  const temperatureElement = document.createElement('div');
  temperatureElement.classList.add('weather-temp');
  temperatureElement.textContent = `Température : ${temperature}°C`;

  const descriptionElement = document.createElement('div');
  descriptionElement.classList.add('weather-description');
  descriptionElement.textContent = `Description : ${description}`;

  const affluenceElement = document.createElement('div');
  affluenceElement.classList.add('weather-affluence');
  affluenceElement.textContent = `Affluence : ${affluence}`;

  forecastElement.appendChild(dateElement);
  forecastElement.appendChild(temperatureElement);
  forecastElement.appendChild(descriptionElement);
  forecastElement.appendChild(affluenceElement);

  return forecastElement;
}

Promise.all([getCurrentWeatherData(), getForecastWeatherData()])
  .then(([currentWeatherData, forecastWeatherData]) => {
    displayWeatherInfo(currentWeatherData, forecastWeatherData);
  })
  .catch(error => {
    console.error('Une erreur s\'est produite lors de la récupération des données météorologiques :', error.message);
  });
