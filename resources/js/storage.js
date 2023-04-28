let appStorage = {};

function fetchData(url, key) {
  fetch(url)
    .then(response => response.json())
    .then(data => {
      appStorage[key] = data;
      localStorage.setItem(key, JSON.stringify(data));
    })
    .catch(error => console.error(`Error fetching ${key}: `, error));
}

// Fetch all the necessary data when the page loads
window.addEventListener('load', () => {
  fetchData('/api/subjects', 'subjects');
});

export { appStorage };