const barCtx = document.getElementById('myChart');
const pieCtx = document.getElementById('pieChart');
const lineCtx = document.getElementById('lineChart'); 
const areaCtx = document.getElementById('areaChart'); 

const monthNames = [
  'January', 'February', 'March', 'April', 'May', 'June', 
  'July', 'August', 'September', 'October', 'November', 'December'
];

fetch('fetch_data.php')
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok ' + response.statusText);
    }
    return response.json();
  })
  .then(data => {
    // Extract the age data from the fetched JSON
    const ages = data.data.map(item => item.basic_info_age);
    const labels = data.data.map(item => item.basic_info_firstname); // You can use first names as labels

    // Create the bar chart
    new Chart(barCtx, {
      type: 'bar',
      data: {
        labels: labels,  // First names as labels
        datasets: [{
          label: 'Ages of Patients',
          data: ages,     // Ages of the patients
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    // Create the pie chart
    new Chart(pieCtx, {
      type: 'pie',
      data: {
        labels: labels,
        datasets: [{
          label: 'Ages of Patients',
          data: ages,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
          }
        }
      }
    });

    // Prepare data for line and area charts
    const counts = Array(12).fill(0); // For 12 months
    data.data.forEach(item => {
      const date = new Date(item.basic_info_date);
      if (!isNaN(date)) {
        const month = date.getMonth(); // Get month as 0-11
        counts[month]++; // Increment the count for the month
      }
    });

    // Create the line chart
    new Chart(lineCtx, {
      type: 'line',
      data: {
        labels: monthNames, // Use month names as labels
        datasets: [{
          label: 'Patients per Month',
          data: counts,
          borderColor: 'rgba(75, 192, 192, 1)',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          fill: false,
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    // Create the area chart
    new Chart(areaCtx, {
      type: 'line',
      data: {
        labels: monthNames, // Use month names as labels
        datasets: [{
          label: 'Patients per Month (Area)',
          data: counts,
          borderColor: 'rgba(54, 162, 235, 1)',
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          fill: true,
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  })
  .catch(error => {
    console.error('There has been a problem with your fetch operation:', error);
  });
