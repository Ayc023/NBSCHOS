<?php
include 'admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Record Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #003366;
            color: #fff;
            padding: 0.8rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000; /* Ensure navbar is above other content */
        }
        .content {
            margin-top: 80px; /* Adjust this value to move the form lower */
        }
    </style>
</head>
<body class="bg-white p-8">
    <nav class="navbar">
        <div class="flex items-center">
            <img src="../src/Nbsc_logo-removebg-preview.png" alt="Logo" class="w-8 h-8 mr-2" />
            <a href="../welcome.php" class="text-lg font-bold">Dental Record Form</a>
        </div>
        <ul class="flex space-x-4">
            <li><a href="../welcome.php" class="text-white hover:text-gray-200">Home</a></li>
        </ul>
    </nav>
    <div class="max-w-4xl mx-auto bg-white p-8 border border-gray-300 content">
        <form method="post" action="submit.php">
            <div class="mb-4">
                <label class="block text-gray-700">Date:</label>
                <input type="date" class="border border-gray-300 p-1 w-full" id="date" name="date" required>
            </div>
            <h2 class="text -lg font-bold">Patient Information:</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">Surname:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="surname" name="surname" required>
                </div>
                <div>
                    <label class="block text-gray-700">Given Name:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="given_name" name="given_name" required>
                </div>
                <div>
                    <label class="block text-gray-700">Middle Name:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="middle_name" name="middle_name">
                </div>
                <div>
                    <label class="block text-gray-700">Address:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="address" name="address" required>
                </div>
                <div>
                    <label class="block text-gray-700">Course Taken & Year:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="course_year" name="course_year" required>
                </div>
                <div>
                    <label class="block text-gray-700">Sex:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="sex" name="sex" required>
                </div>
                <div>
                    <label class="block text-gray-700">Civil Status:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="civil_status" name="civil_status">
                </div>
                <div>
                    <label class="block text-gray-700">Age:</label>
                    <input type="number" class="border border-gray-300 p-1 w-full" id="age" name="age" required>
                </div>
                <div>
                    <label class="block text-gray-700">Tel No:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="tel_no" name="tel_no">
                </div>
                <div>
                    <label class="block text-gray-700">Date of Birth:</label>
                    <input type="date" class="border border-gray-300 p-1 w-full" id="dob" name="dob" required>
                </div>
            </div>
            <h2 class="text-lg font-bold">History:</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">Allergy to Medication/Food:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="allergy" name="allergy">
                </div>
                <div>
                    <label class="block text-gray-700">Medical Treatment:</label>
                    <div class="flex space-x-4">
                        <label><input type="radio" id="medical_treatment" name="medical_treatment" class="mr-2">Yes</label>
                        <label><input type="radio" id="medical_treatment" name="medical_treatment" class="mr-2">No</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Allergic Food/Medicine:</label>
                    <div class="flex space-x-4">
                        <label><input type="radio" id="allergic_food_medicine" name="allergic_food_medicine" class="mr-2">Yes</label>
                        <label><input type="radio" id="allergic_food_medicine" name="allergic_food_medicine" class="mr-2">No</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Taking Drugs/Medication:</label>
                    <div class="flex space-x-4">
                        <label><input type="radio" id="taking_drugs" name="taking_drugs" class="mr-2">Yes</label>
                        <label><input type="radio" id="taking_drugs" name="taking_drugs" class="mr-2">No</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Special Diet:</label>
                    <div class="flex space-x-4">
                        <label><input type="radio" id="special_diet" name ="special_diet" class="mr-2">Yes</label>
                        <label><input type="radio" id="special_diet" name="special_diet" class="mr-2">No</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Shortness of Breath:</label>
                    <div class="flex space-x-4">
                        <label><input type="radio" id="shortness_breath" name="shortness_breath" class="mr-2">Yes</label>
                        <label><input type="radio" id="shortness_breath" name="shortness_breath" class="mr-2">No</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Complication with Healing:</label>
                    <div class="flex space-x-4">
                        <label><input type="radio" id="complication_healing" name="complication_healing" class="mr-2">Yes</label>
                        <label><input type="radio" id="complication_healing" name="complication_healing" class="mr-2">No</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">General Health:</label>
                    <div class="flex space-x-4">
                        <label><input type="radio" id="general_health" name="general_health" class="mr-2">Yes</label>
                        <label><input type="radio" id="general_health" name="general_health" class="mr-2">No</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Pregnant:</label>
                    <div class="flex space-x-4">
                        <label><input type="radio" id="pregnant" name="pregnant" class="mr-2">Yes</label>
                        <label><input type="radio" id="pregnant" name="pregnant" class="mr-2">No</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Profuse Bleeding:</label>
                    <div class="flex space-x-4">
                        <label><input type="radio" id="profuse_bleeding" name="profuse_bleeding" class="mr-2">Yes</label>
                        <label><input type="radio" id="profuse_bleeding" name="profuse_bleeding" class="mr-2">No</label>
                    </div>
                </div>
            </div>
            <h2 class="text-lg font-bold">Medical History:</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">Heart Ailment:</label>
                    <div class="flex space-x-4">
                        <label><input type="checkbox" id="heart_ailment" name="heart_ailment" class="mr-2">Yes</label>
                        <label><input type="checkbox" id="heart_ailment" name="heart_ailment" class="mr-2">No</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">High Blood Pressure:</label>
                    <div class="flex space-x-4">
                        <label><input type="checkbox" id="high_blood_pressure" name="high_blood_pressure" class="mr-2">Yes</label>
                        <label><input type="checkbox" id="high_blood_pressure" name="high_blood_pressure" class="mr-2">No</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Diabetes:</label>
                    <div class="flex space-x-4">
                        <label><input type="checkbox" id="diabetes" name="diabetes" class="mr-2">Yes</label>
                        <label><input type="checkbox" id="diabetes" name="diabetes" class="mr-2">No</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Rheumatic Fever:</label>
                    <div class="flex space-x-4">
                        <label><input type="checkbox" id="rheumatic_fever" name="rheumatic_fever" class="mr-2">Yes</label>
                        <label><input type="checkbox" id="rheumatic_fever" name="rheumatic_fever" class="mr-2">No</label>
                    </ div>
                </div>
                <div>
                    <label class="block text-gray-700">Lung Disease:</label>
                    <div class="flex space-x-4">
                        <label><input type="checkbox" id="lung_disease" name="lung_disease" class="mr-2">Yes</label>
                        <label><input type="checkbox" id="lung_disease" name="lung_disease" class="mr-2">No</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Liver Disease:</label>
                    <div class="flex space-x-4">
                        <label><input type="checkbox" id="liver_disease" name="liver_disease" class="mr-2">Yes</label>
                        <label><input type="checkbox" id="liver_disease" name="liver_disease" class="mr-2">No</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
    </div>
</body>
</html>