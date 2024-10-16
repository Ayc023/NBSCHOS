<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
                .navbar-custom {
            background-color: #003366; 
            padding: auto;
        }

        .navbar-custom .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 0.8rem;
        }

        .navbar-custom .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-custom .navbar-toggler {
            border-color: #fff;
        }

        .navbar-custom .navbar-nav .dropdown-menu {
            background-color: #003366;
        }

        .navbar-custom .dropdown-menu .dropdown-item {
            color: white;
        }

        .navbar-custom .dropdown-menu .dropdown-item:hover {
            background-color: #004080; /* Lighter shade of dark blue */
        }

        .navbar-brand img {
            max-height: 40px;
            width: auto;
        }

        .dropdown-menu {
            background-color: #003366; /* Matching dropdown with navbar */
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .dropdown-item {
            color: white !important;
        }

        .dropdown-item:hover {
            background-color: #1535ee !important; /* DodgerBlue hover */
            color: #fff !important;
        }
    </style>
    <script>
        // Simulated patient data for demonstration
        const patients = {
            '123': { condition: 'Cancer', physician: 'Dr. Kwak', comment: 'N/A' },
            '456': { condition: 'Flu', physician: 'Dr. Smith', comment: 'Follow-up in a week' },
            // Add more patients as needed
        };

        function searchPatient() {
            const patientId = document.getElementById('patient-id').value;
            const result = patients[patientId];
            if (result) {
                document.getElementById('medical-condition').value = result.condition;
                document.getElementById('assigned-physician').value = result.physician;
                document.getElementById('comment').value = result.comment;
            } else {
                alert('Patient not found.');
                clearFields();
            }
        }

        function clearFields() {
            document.getElementById('medical-condition').value = '';
            document.getElementById('assigned-physician').value = '';
            document.getElementById('comment').value = '';
        }

        function setAppointment() {
            const condition = document.getElementById('medical-condition').value;
            const physician = document.getElementById('assigned-physician').value;
            const comment = document.getElementById('comment').value;

            alert(`Appointment Set!\nCondition: ${condition}\nPhysician: ${physician}\nComment: ${comment}`);
            // Here you can add logic to send this data to your server
        }
    </script>
</head>
<body class="bg-gray-100">
<nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">Patient Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="bg-white p-8 rounded-lg shadow-lg w-3/4 mx-auto">
            <div class="flex items-center mb-6">
                <input type="text" id="patient-id" placeholder="Patient ID" class="border border-gray-300 rounded-full px-4 py-2 w-1/3">
                <button class="ml-2 text-gray-500" onclick="searchPatient()"><i class="fas fa-search"></i></button>
            </div>
            <div class="flex">
                <div class="w-2/3">
                    <h2 class="text-lg font-semibold mb-4">Admission Date</h2>
                    <div class="border border-gray-300 rounded-lg p-4">
                        <div class="flex justify-between items-center mb-4">
                            <button class="text-gray-500"><i class="fas fa-chevron-left"></i></butto>
                            <span class="text-lg font-semibold">September</span>
                            <button class="text-gray-500"><i class="fas fa-chevron-right"></i></button>
                        </div>
                        <div class="grid grid-cols-7 text-center text-gray-700">
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                            <div>Sun</div>
                            <!-- Calendar Days -->
                            <div class="py-2">29</div>
                            <div class="py-2">30</div>
                            <div class="py-2">31</div>
                            <div class="py-2">1</div>
                            <div class="py-2">2</div>
                            <div class="py-2">3</div>
                            <div class="py-2">4</div>
                            <div class="py-2">5</div>
                            <div class="py-2">6</div>
                            <div class="py-2">7</div>
                            <div class="py-2">8</div>
                            <div class="py-2">9</div>
                            <div class="py-2">10</div>
                            <div class="py-2">11</div>
                            <div class="py-2">12</div>
                            <div class=" py-2">13</div>
                            <div class="py-2">14</div>
                            <div class="py-2">15</div>
                            <div class="py-2">16</div>
                            <div class="py-2">17</div>
                            <div class="py-2">18</div>
                            <div class="py-2">19</div>
                            <div class="py-2">20</div>
                            <div class="py-2">21</div>
                            <div class="py-2">22</div>
                            <div class="py-2">23</div>
                            <div class="py-2">24</div>
                            <div class="py-2">25</div>
                            <div class="py-2">26</div>
                            <div class="py-2">27</div>
                            <div class="py-2">28</div>
                            <div class="py-2">29</div>
                            <div class="py-2">30</div>
                            <div class="py-2">1</div>
                            <div class="py-2">2</div>
                        </div>
                    </div>
                </div>
                <div class="w-1/3 ml-8">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Medical Condition</label>
                        <input type="text" id="medical-condition" value="" class="border border-gray-300 rounded-lg px-4 py-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Assigned Physician</label>
                        <input type="text" id="assigned-physician" value="" class="border border-gray-300 rounded-lg px-4 py-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Comment</label>
                        <textarea id="comment" class="border border-gray-300 rounded-lg px-4 py-2 w-full h-24"></textarea>
                    </div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg" onclick="setAppointment()">Set Appointment</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>