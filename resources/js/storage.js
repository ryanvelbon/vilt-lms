let appStorage = {}

// Fetch all the necessary data when the page loads
window.addEventListener('load', () => {
  fetch('/api/subjects')
    .then(response => response.json())
    .then(data => {
      // appStorage['subjects'] = data
      localStorage.setItem('subjects', JSON.stringify(data))
    })
    .catch(error => console.error("Error!", error))
});


export { appStorage }