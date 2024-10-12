<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Assessment Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for a professional look */
        .form-label {
            display: inline-block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .form-input {
            border: 1px solid #000;
            border-radius: 0.25rem;
            padding: 0.5rem;
            width: 100%;
        }
        .form-section {
            margin-bottom: 1.5rem;
        }
        .checkbox-label {
            display: inline-block;
            margin-right: 1rem;
        }
    </style>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto bg-white border border-gray-200 p-8 shadow-md">
        <h1 class="text-center font-bold text-xl mb-6">Medical Assessment Form</h1>
        
        <div class="form-section">
            <h2 class="font-bold text-lg">Maintenance Medication Taken:</h2>
            <h3 class="font-bold">OB/GYNE:</h3>
            <h4 class="font-bold">MENSTRUAL HISTORY:</h4>
            <div class="mb-2">
                <label class="form-label">Menarche (1st Menstruation):</label>
                <input type="text" class="form-input">
            </div>
            <div class="mb-2">
                <label class="form-label">Last Menstrual Period (this Month/last Month):</label>
                <input type="text" class="form-input">
            </div>
            <div class="mb-2 flex justify-between">
                <div class="w-1/3">
                    <label class="form-label">Menstrual Interval:</label>
                    <input type="text" class="form-input">
                </div>
                <div class="w-1/3">
                    <label class="form-label">Interval / Cycle:</label>
                    <input type="text" class="form-input">
                </div>
                <div class="w-1/3">
                    <label class="form-label">No. of pads per day:</label>
                    <input type="text" class="form-input">
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Duration of Sexual Intercourse:</label>
                <input type="text" class="form-input">
            </div>
            <div class="mb-2">
                <label class="form-label">Birth Control Method:</label>
                <input type="text" class="form-input">
            </div>
            <div class="mb-2 flex items-center">
                <label class="form-label">Menopausal Stage?</label>
                <div class="checkbox-label">
                    <input type="checkbox"> YES
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> NO
                </div>
                <label class="form-label">If yes, What age?</label>
                <input type="text" class="form-input w-1/4">
            </div>
        </div>

        <div class="form-section">
            <h3 class="font-bold">PREGNANCY HISTORY:</h3>
            <div class="mb-2 flex items-center">
                <label class="form-label">Are you pregnant now?</label>
                <div class="checkbox-label">
                    <input type="checkbox"> YES
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> NO
                </div>
                <label class="form-label">How many months?</label>
                <input type="text" class="form-input w-1/4">
            </div>
            <div class="mb-2 flex items-center">
                <label class="form-label">Pre-Natal Check-up?</label>
                <div class="checkbox-label">
                    <input type="checkbox"> YES
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> NO
                </div>
                <label class="form-label">Where?</label>
                <input type="text" class="form-input w-1/4">
            </div>
            <div class="mb-2 flex justify-between">
                <div class="w-1/3">
                    <label class="form-label">Gravida:</label>
                    <input type="text" class="form-input">
                </div>
                <div class="w-1/3">
                    <label class="form-label">Para:</label>
                    <input type="text" class="form-input">
                </div>
                <div class="w-1/3">
                    <label class="form-label">Term:</label>
                    <input type="text" class="form-input">
                </div>
                <div class="w-1/3">
                    <label class="form-label">Abortion:</label>
                    <input type="text" class="form-input">
                </div>
            </div>
            <div class="mb-2 flex items-center">
                <label class="form-label">Type of Delivery:</label>
                <div class="checkbox-label">
                    <input type="checkbox"> Normal Vaginal Delivery
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Cesarean Section
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Hospital
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Home Delivery
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Complications:</label>
                <input type="text" class="form-input">
            </div>
            <div class="mb-2">
                <label class="form-label">Family Planning Done, What Type?</label>
                <input type="text" class="form-input">
            </div>
            <div class="mb-2">
                <label class="form-label">No. of Years:</label>
                <input type="text" class="form-input w-1/4">
            </div>
        </div>

        <div class="form-section">
            <h2 class="font-bold">HEAD TO TOE ASSESSMENT:</h2>
            <h3 class="font-bold">NEUROLOGICAL ASSESSMENT:</h3>
            <div class="mb-2 flex items-center">
                <div class="checkbox-label">
                    <input type="checkbox"> Normal thought process
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Normal Emotional Status
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Normal Psychological Status
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Others:</label>
                <input type="text" class="form-input">
            </div>
            <h3 class="font-bold">HEENT:</h3>
            <div class="mb-2 flex items-center">
                <div class="checkbox-label">
                    <input type="checkbox"> Anicteric sclera
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> PERRLA
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Aural Discharge
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Intact Tympanic Membrane
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Nasal Flaring
                </div>
            </div>
            <div class="mb-2 flex items-center">
                <div class="checkbox-label">
                    <input type="checkbox"> Nasal Discharge
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Tonsillopharyngeal congestion
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Hypertropic tonsils
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Palpable mass
                </div>
            </div>
        </div>

        <div class="form-section">
            <h3 class="font-bold">RESPIRATORY ASSESSMENT:</h3>
            <div class="mb-2 flex items-center">
                <div class="checkbox-label">
                    <input type="checkbox"> Breath sounds
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Symmetrical Chest Expansion
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Retractions
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Crackles / Rates
                </div>
            </div>
            <div class="mb-2 flex items-center">
                <div class="checkbox-label">
                    <input type="checkbox"> Rhonchi
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Wheezes
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Others:</label>
                <input type="text" class="form-input">
            </div>
            <h3 class="font-bold">CARDIAC ASSESSMENT:</h3>
            <div class="mb-2 flex items-center">
                <div class="checkbox-label">
                    <input type="checkbox"> Regular heart rate
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> No heart murmur
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Others:</label>
                <input type="text" class="form-input">
            </div>
        </div>

        <div class="form-section">
            <h3 class="font-bold">GASTROINTESTINAL ASSESSMENT:</h3>
            <div class="mb-2 flex items-center">
                <div class="checkbox-label">
                    <input type="checkbox"> Bowel sounds
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Nausea
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Vomiting
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Constipation
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Diarrhea
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Others:</label>
                <input type="text" class="form-input">
            </div>
        </div>

        <div class="form-section">
            <h3 class="font-bold">MUSCULOSKELETAL ASSESSMENT:</h3>
            <div class="mb-2 flex items-center">
                <div class="checkbox-label">
                    <input type="checkbox"> Normal range of motion
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Muscle strength
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> Abnormalities
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Others:</label>
                <input type="text" class="form-input">
            </div>
        </div>

        <div class="form-section">
            <h3 class="font-bold">SKIN ASSESSMENT:</h3>
            <div class="mb-2 flex items-center">
                <div class="checkbox-label">
                    <input type="checkbox"> Normal color
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> No lesions
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> No rashes
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Others:</label>
                <input type="text" class="form-input">
            </div>
        </div>

        <div class="form-section">
            <h3 class="font-bold">GENITOURINARY ASSESSMENT:</h3>
            <div class="mb-2 flex items-center">
                <div class="checkbox-label">
                    <input type="checkbox"> No dysuria
                </div>
                <div class="checkbox-label">
                    <input type="checkbox"> No hematuria
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Others:</label>
                <input type="text" class="form-input">
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Submit</button>
        </div>
    </div>
</body>
</html>
