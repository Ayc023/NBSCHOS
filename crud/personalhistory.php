<?php
include 'admin.php';
?>
<html>
<head>
    <title>Medical Form</title>
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
            <a href="../welcome.php" class="text-lg font-bold">Medical Form</a>
        </div>
        <ul class="flex space-x-4">
            <li><a href="../welcome.php" class="text-white hover:text-gray-200">Home</a></li>
        </ul>
    </nav>
    <div class="max-w-4xl mx-auto bg-white p-8 border border-gray-300 content">
        <form method="post" action="submit.php">
            <div class="flex justify-between mb-4">
                <div>
                    <label class="block text-gray-700">Date:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="date" name="date">
                </div>
                <div>
                    <label class="block text-gray-700">College Clinic File Number:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="college_clinic_file_number" name="college_clinic_file_number">
                </div>
                <div>
                    <label class="block text-gray-700">College Course:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="college_course" name="college_course">
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Year:</label>
                <input type="text" class="border border-gray-300 p-1 w-full mt-2" placeholder="Year level" id="year" name="year">
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-bold">PERSONAL PROFILE:</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Name:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="name" name="name">
                    </div>
                    <div>
                        <label class="block text-gray-700">Age/Sex:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="age_sex" name="age_sex">
                    </div>
                    <div>
                        <label class="block text-gray-700">Birthday:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="birthday" name="birthday" >
                    </div>
                    <div>
                        <label class="block text-gray-700">Home Address:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="home_address" name="home_address">
                    </div>
                    <div>
                        <label class="block text-gray-700">Religion:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="religion" name="religion" >
                    </div>
                    <div>
                        <label class="block text-gray-700">Municipal Address:</label>
                        <input type="text" class="border border-gray-300 p-1 w -full" id="municipal_address" name="municipal_address">
                    </div>
                    <div>
                        <label class="block text-gray-700">Occupation:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="occupation" name="occupation">
                    </div>
                    <div>
                        <label class="block text-gray-700">Contact Number(s):</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="contact_number" name="contact_number">
                    </div>
                    <div>
                        <label class="block text-gray-700">Civil Status:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="civil_status" name="civil_status">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-bold">In Case of Emergency (Please Contact):</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Complete Name:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="emergency_contact_name" name="emergency_contact_name">
                    </div>
                    <div>
                        <label class="block text-gray-700">Contact Number:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="emergency_contact_number" name="emergency_contact_number">
                    </div>
                    <div>
                        <label class="block text-gray-700">Address:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="emergency_contact_address" name="emergency_contact_address">
                    </div>
                    <div>
                        <label class="block text-gray-700">Relationship:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="emergency_contact_relationship" name="emergency_contact_relationship">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-bold">PERSONAL/ SOCIAL HISTORY:</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Smoking</label>
                        <input type="text" class="border border-gray-300 p-1 w-full mt-2" placeholder="If yes how many packs/sticks a day? how many years you've been smoking?" id="smoking" name="smoking">
                    </div>
                    <div>
                        <label class="block text-gray-700">Alcohol Drinking</label>
                        <input type="text" class="border border-gray-300 p-1 w-full mt-2" placeholder="If yes how many bottles? (occasionally/monthly)" id="alcohol_drinking" name="alcohol_drinking">
                    </div>
                    <div>
                        <label class="block text-gray-700">Illegal Drug Use</label>
                        <input type="text" class="border border-gray-300 p-1 w-full mt-2" placeholder="If yes what kind? (YES) (NO) (QUITTED) " id="illegal_drug_use" name="illegal_drug_use">
                    </div>
                    <div>
                        <label class="block text-gray-700">Sexually Active</label>
                        <input type="text" class="border border-gray-300 p-1 w-full mt-2" placeholder="How many sexual partners within this year? (male) (female) (both)" id="sexually_active" name="sexually_active">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-bold">PAST MEDICAL HISTORY:</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <div class="flex space-x-4">
                            <label><input type="checkbox" id="food" name="food" class="mr-2">Food</label>
                            <label><input type="checkbox" id="drug" name="drug" class="mr-2">Drug</label>
                        </div>
                        <input type="text" class="border border-gray-300 p-1 w-full mt-2" placeholder="what is your allergy?" id="allergy?" name="allergy?">
                    </div>
                    <div>
                        <label class="block text-gray-700">Epilepsy/Seizure Disorder:</label>
                        <input type="checkbox" name="epilepsy_seizure_disorder" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">Asthma:</label>
                        <input type="checkbox" name="asthma" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">Congenital Heart Disorder:</label>
                        <input type="checkbox" name="congenital_heart_disorder" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">Thyroid Disease:</label>
                        <input type="checkbox" name="thyroid_disease" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">Skin Disorder:</label>
                        <input type="checkbox" name="skin_disorder" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">Cancer:</label>
                        <input type="checkbox" name="cancer" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">Diabetes Mellitus:</label>
                        <input type="checkbox" name="diabetes_mellitus" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">Peptic Ulcer:</label>
                        <input type="checkbox" name="peptic_ulcer" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">Tuberculosis:</label>
                        <input type="checkbox" name="tuberculosis" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">Coronary Artery Disease:</label>
                        <input type="checkbox" name="coronary_artery_disease" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">PCOS:</label>
                        <input type="checkbox" name="pcos" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">Hepatitis:</label>
                        <input type="checkbox" name="hepatitis" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">Hypertension/ Elevated BP:</label>
                        <input type="checkbox" name="hypertension_elevated_bp" class="mr-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">Psychological Disorder:</label>
                        <input type="checkbox" name="psychological_disorder" class="mr-2">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-bold">Hospital admissions:</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Diagnosis:</label>
                        <input type="text" class="border border-gray- 300 p-1 w-full" id="hospital_admissions_diagnosis" name="hospital_admissions_diagnosis">
                    </div>
                    <div>
                        <label class="block text-gray-700">When?</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="hospital_admissions_when" name="hospital_admissions_when">
                    </div>
                    <div>
                        <label class="block text-gray-700">Diagnosis:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="hospital_admissions_diagnosis" name="hospital_admissions_diagnosis">
                    </div>
                    <div>
                        <label class="block text-gray-700">When?</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="hospital_admissions_when" name="hospital_admissions_when">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-bold">PAST SURGICAL HISTORY:</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Operation type:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="past_surgical_history_operation_type" name="past_surgical_history_operation_type">
                    </div>
                    <div>
                        <label class="block text-gray-700">When?</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="past_surgical_history_when" name="past_surgical_history_when">
                    </div>
                    <div>
                        <label class="block text-gray-700">Operation type:</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="past_surgical_history_operation_type" name="past_surgical_history_operation_type">
                    </div>
                    <div>
                        <label class="block text-gray-700">When?</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="past_surgical_history_when" name="past_surgical_history_when">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Person with Disability: Specify</label>
                <input type="text" class="border border-gray-300 p-1 w-full">
                <div class="flex space-x-4 mt-2">
                    <label><input type="radio" name="person_with_disability" class="mr-2">Registered</label>
                    <label><input type="radio" name="person_with_disability" class="mr-2">Not Registered</label>
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-bold">WILLING TO DONATE BLOOD:</h2>
                <div class="flex space-x-4">
                    <label><input type="radio" name="willing_to_donate_blood" class="mr-2">YES</label>
                    <label><input type="radio" name="willing_to_donate_blood" class="mr-2">NO</label>
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-bold">Family History:</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Mother side (Please enumerate)</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="family_history_mother_side" name="family_history_mother_side">
                    </div>
                    <div>
                        <label class="block text-gray-700">Father side (Please enumerate)</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="family_history_father_side" name="family_history_father_side">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-bold">Immunizations:</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Completed Newborn Immunizations during childhood</label>
                        <div class="flex space-x-4">
                            <label><input type="radio" id="immunizations_completed_newborn_immunizations" name="immunizations_completed_newborn_immunizations" class="mr-2 ">Yes</label>
                            <label><input type="radio" id="immunizations_completed_newborn_immunizations"  name="immunizations_completed_newborn_immunizations" class="mr-2">No</label>
                            <label><input type="radio" id="immunizations_completed_newborn_immunizations" name="immunizations_completed_newborn_immunizations" class="mr-2">Unknown</label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700">Tetanus toxoid How many doses?</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="immunizations_tetanus_toxoid" name="immunizations_tetanus_toxoid">
                    </div>
                    <div>
                        <label class="block text-gray-700">Influenza/Flu (year)</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="immunizations_influenza" name="immunizations_influenza">
                    </div>
                    <div>
                        <label class="block text-gray-700">Pneumococcal Vaccine How many doses?</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="immunizations_pneumococcal_vaccine" name="immunizations_pneumococcal_vaccine">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-bold">COVID-19 Brand Name:</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">1<sup>st</sup> Dose</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="covid_19_brand_name_first_dose" name="covid_19_brand_name_first_dose">
                    </div>
                    <div>
                        <label class="block text-gray-700">2<sup>nd</sup> Dose</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="covid_19_brand_name_second_dose" name="covid_19_brand_name_second_dose">
                    </div>
                    <div>
                        <label class="block text-gray-700">1<sup>st</sup> Booster</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="covid_19_brand_name_first_booster" name="covid_19_brand_name_first_booster">
                    </div>
                    <div>
                        <label class="block text-gray-700">2<sup>nd</sup> Booster</label>
                        <input type="text" class="border border-gray-300 p-1 w-full" id="covid_19_brand_name_second_booster" name="covid_19_brand_name_second_booster">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Unvaccinated w/ Covid-19: Reason</label>
                <input type="text" class="border border-gray-300 p-1 w-full" id="unvaccinated_with_covid_19_reason" name="unvaccinated_with_covid_19_reason">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button> 
        </form>
    </div>
</body>
</html>