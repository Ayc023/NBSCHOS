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

// Set default values for checkboxes
$epilepsy_seizure_disorder = isset($_POST['epilepsy_seizure_disorder']) ? 1 : 0;
$asthma = isset($_POST['asthma']) ? 1 : 0;
$congenital_heart_disorder = isset($_POST['congenital_heart_disorder']) ? 1 : 0;
$thyroid_disease = isset($_POST['thyroid_disease']) ? 1 : 0;
$skin_disorder = isset($_POST['skin_disorder']) ? 1 : 0;
$cancer = isset($_POST['cancer']) ? 1 : 0;
$diabetes_mellitus = isset($_POST['diabetes_mellitus']) ? 1 : 0;
$peptic_ulcer = isset($_POST['peptic_ulcer']) ? 1 : 0;
$tuberculosis = isset($_POST['tuberculosis']) ? 1 : 0;
$coronary_artery_disease = isset($_POST['coronary_artery_disease']) ? 1 : 0;
$pcos = isset($_POST['pcos']) ? 1 : 0;
$hepatitis = isset($_POST['hepatitis']) ? 1 : 0;
$hypertension_elevated_bp = isset($_POST['hypertension_elevated_bp']) ? 1 : 0;
$psychological_disorder = isset($_POST['psychological_disorder']) ? 1 : 0;

// Insert data into database
$sql = "INSERT INTO medical_form (
    form_date,
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
    :form_date,
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

$stmt->bindValue(':epilepsy_seizure_disorder', $epilepsy_seizure_disorder);
$stmt->bindValue(':asthma', $asthma);
$stmt->bindValue(':congenital_heart_disorder', $congenital_heart_disorder);
$stmt->bindValue(':thyroid_disease', $thyroid_disease);
$stmt->bindValue(':skin_disorder', $skin_disorder);
$stmt->bindValue(':cancer', $cancer);
$stmt->bindValue(':diabetes_mellitus', $diabetes_mellitus);
$stmt->bindValue(':peptic_ulcer', $peptic_ulcer);
$stmt->bindValue(':tuberculosis', $tuberculosis);
$stmt->bindValue(':coronary_artery_disease', $coronary_artery_disease);
$stmt->bindValue(':pcos', $pcos);
$stmt->bindValue(':hepatitis', $hepatitis);
$stmt->bindValue(':hypertension_elevated_bp', $hypertension_elevated_bp);
$stmt->bindValue(':psychological_disorder', $psychological_disorder);

// Provide a default value for each field
$parameters = [
    'form_date',
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