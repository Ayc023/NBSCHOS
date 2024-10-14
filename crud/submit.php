<?php
session_start();

// Database connection configuration
$host = 'localhost';
$dbname = 'medical';
$username = 'root';
$password = '';

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $inputData = array_map('trim', $_POST);

// Insert data into database
$sql = "INSERT INTO medical_form (
    date,
    college_clinic_file_number,
    college_course,
    year,
    name,
    age_sex,
    birthday,
    home_address,
    religion,
    municipal_address,
    occupation,
    contact_number,
    civil_status,
    emergency_contact_name,
    emergency_contact_number,
    emergency_contact_address,
    emergency_contact_relationship,
    smoking,
    alcohol_drinking,
    illegal_drug_use,
    sexually_active,
    allergy,
    food,
    drug,
    epilepsy_seizure_disorder,
    asthma,
    congenital_heart_disorder,
    thyroid_disease,
    skin_disorder,
    cancer,
    diabetes_mellitus,
    peptic_ulcer,
    tuberculosis,
    coronary_artery_disease,
    pcos,
    hepatitis,
    hypertension_elevated_bp,
    psychological_disorder,
    hospital_admissions_diagnosis,
    hospital_admissions_when,
    past_surgical_history_operation_type,
    past_surgical_history_when,
    person_with_disability,
    willing_to_donate_blood,
    family_history_mother_side,
    family_history_father_side,
    immunizations_completed_newborn_immunizations,
    immunizations_tetanus_toxoid,
    immunizations_influenza,
    immunizations_pneumococcal_vaccine,
    covid_19_brand_name_first_dose,
    covid_19_brand_name_second_dose,
    covid_19_brand_name_first_booster,
    covid_19_brand_name_second_booster,
    unvaccinated_with_covid_19_reason
) VALUES (
    :date,
    :college_clinic_file_number,
    :college_course,
    :year,
    :name,
    :age_sex,
    :birthday,
    :home_address,
    :religion,
    :municipal_address,
    :occupation,
    :contact_number,
    :civil_status,
    :emergency_contact_name,
    :emergency_contact_number,
    :emergency_contact_address,
    :emergency_contact_relationship,
    :smoking,
    :alcohol_drinking,
    :illegal_drug_use,
    :sexually_active,
    :allergy,
    :food,
    :drug,
    :epilepsy_seizure_disorder,
    :asthma,
    :congenital_heart_disorder,
    :thyroid_disease,
    :skin_disorder,
    :cancer,
    :diabetes_mellitus,
    :peptic_ulcer,
    :tuberculosis,
    :coronary_artery_disease,
    :pcos,
    :hepatitis,
    :hypertension_elevated_bp,
    :psychological_disorder,
    :hospital_admissions_diagnosis,
    :hospital_admissions_when,
    :past_surgical_history_operation_type,
    :past_surgical_history_when,
    :person_with_disability,
    :willing_to_donate_blood,
    :family_history_mother_side,
    :family_history_father_side,
    :immunizations_completed_newborn_immunizations,
    :immunizations_tetanus_toxoid,
    :immunizations_influenza,
    :immunizations_pneumococcal_vaccine,
    :covid_19_brand_name_first_dose,
    :covid_19_brand_name_second_dose,
    :covid_19_brand_name_first_booster,
    :covid_19_brand_name_second_booster,
    :unvaccinated_with_covid_19_reason
)";

$stmt = $pdo->prepare($sql);

// Provide a default value for each field
$parameters = [
    'date',
    'college_clinic_file_number',
    'college_course',
    'year',
    'name',
    'age_sex',
    'birthday',
    'home_address',
    'religion',
    'municipal_address',
    'occupation',
    'contact_number',
    'civil_status',
    'emergency_contact_name',
    'emergency_contact_number',
    'emergency_contact_address',
    'emergency_contact_relationship',
    'smoking',
    'alcohol_drinking',
    'illegal_drug_use',
    'sexually_active',
    'allergy',
    'food',
    'drug',
    'epilepsy_seizure_disorder',
    'asthma',
    'congenital_heart_disorder',
    'thyroid_disease',
    'skin_disorder',
    'cancer',
    'diabetes_mellitus',
    'peptic_ulcer',
    'tuberculosis',
    'coronary_artery_disease',
    'pcos',
    'hepatitis',
    'hypertension_elevated_bp',
    'psychological_disorder',
    'hospital_admissions_diagnosis',
    'hospital_admissions_when',
    'past_surgical_history_operation_type',
    'past_surgical_history_when',
    'person_with_disability',
    'willing_to_donate_blood',
    'family_history_mother_side',
    'family_history_father_side',
    'immunizations_completed_newborn_immunizations',
    'immunizations_tetanus_toxoid',
    'immunizations_influenza',
    'immunizations_pneumococcal_vaccine',
    'covid_19_brand_name_first_dose',
    'covid_19_brand_name_second_dose',
    'covid_19_brand_name_first_booster',
    'covid_19_brand_name_second_booster',
    'unvaccinated_with_covid_19_reason'
];

foreach ($parameters as $parameter) {
    $stmt->bindValue(":$parameter", $inputData[$parameter] ?? '');
}

$stmt->execute();

// Redirect back to the form
header('Location: personalhistory.html');
exit;
}
?>