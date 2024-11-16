<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>

<h1>Appendix C. Student Health Profile</h1>
<table style="width:100%">
  <tr>
    <td>Date:</td>
    <td colspan="2"><input type="text"></td>
  </tr>
  <tr>
    <td>College Clinic File Number:</td>
    <td colspan="2"><input type="text"></td>
  </tr>
</table>

<p>Republic of the Philippines<br>
Province of Bukidnon<br>
Northern Bukidnon State College<br>
Municipality of Manolo Fortich<br>
<b>STUDENT HEALTH PROFILE</b></p>

<img src="2x2_picture_with_name_tag.jpg" alt="2x2 Picture with Name Tag">

<h2>PERSONAL PROFILE:</h2>
<table style="width:100%">
  <tr>
    <td>Name:</td>
    <td><input type="text"></td>
    <td><input type="text"></td>
    <td><input type="text"></td>
  </tr>
  <tr>
    <td>Home Address:</td>
    <td colspan="3"><input type="text"></td>
  </tr>
  <tr>
    <td>Municipal Address:</td>
    <td colspan="3"><input type="text"></td>
  </tr>
  <tr>
    <td>Contact Number (s):</td>
    <td colspan="3"><input type="text"></td>
  </tr>
  <tr>
    <td>In Case of Emergency (Please Contact):</td>
    <td colspan="3"><input type="text"></td>
  </tr>
  <tr>
    <td>Complete Name:</td>
    <td colspan="3"><input type="text"></td>
  </tr>
  <tr>
    <td>Address:</td>
    <td><input type="text"></td>
    <td><input type="text"></td>
    <td><input type="text"></td>
  </tr>
  <tr>
    <td>College Course:</td>
    <td colspan="3"><input type="text"></td>
  </tr>
  <tr>
    <td>1 yr</td>
    <td>2 yr</td>
    <td>3 yr</td>
    <td>4 yr</td>
  </tr>
  <tr>
    <td> <input type="radio" name="year" value="1">1
<input type="radio" name="year" value="2">2
<input type="radio" name="year" value="3">3
<input type="radio" name="year" value="4">4
</td>
</tr>
</table>

<h2>HEALTH HISTORY:</h2>
<table style="width:100%">
  <tr>
    <td>Do you smoke?</td>
    <td><input type="radio" name="smoke" value="yes"> Yes</td>
    <td><input type="radio" name="smoke" value="no"> No</td>
  </tr>
  <tr>
    <td>If yes, how many packs per day?</td>
    <td colspan="2"><input type="text"></td>
  </tr>
  <tr>
    <td>Do you drink alcohol?</td>
    <td><input type="radio" name="alcohol" value="yes"> Yes</td>
    <td><input type="radio" name="alcohol" value="no"> No</td>
  </tr>
  <tr>
    <td>How often do you drink alcohol?</td>
    <td colspan="2">
      <select name="alcohol_frequency">
        <option value="occasionally">Occasionally</option>
        <option value="regularly">Regularly</option>
        <option value="never">Never</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>Do you use illegal drugs?</td>
    <td><input type="radio" name="drugs" value="yes"> Yes</td>
    <td><input type="radio" name="drugs" value="no"> No</td>
  </tr>
  <tr>
    <td>If yes, which drugs?</td>
    <td colspan="2"><input type="text"></td>
  </tr>
  <tr>
    <td>Are you sexually active?</td>
    <td><input type="radio" name="sex_active" value="yes"> Yes</td>
    <td><input type="radio" name="sex_active" value="no"> No</td>
  </tr>
  <tr>
    <td>How many sexual partners have you had in the past year?</td>
    <td colspan="2"><input type="number"></td>
  </tr>
</table>

<h2>PAST MEDICAL HISTORY:</h2>
<table style="width:100%">
  <tr>
    <td>Have you ever been diagnosed with any of the following?</td>
  </tr>
  <tr>
    <td>Allergies:</td>
    <td>
      <input type="checkbox" name="allergies" value="food"> Food Allergies
      <div style="margin-left: 20px;">
        <input type="checkbox" name="food_allergy" value="dairy"> Dairy<br>
        <input type="checkbox" name="food_allergy" value="soy"> Soy<br>
        <input type="checkbox" name="food_allergy" value="nuts"> Nuts<br>
        <input type="checkbox" name="food_allergy" value="shellfish"> Shellfish<br>
        <input type="checkbox" name ="food_allergy" value="gluten"> Gluten<br>
        <input type="checkbox" name="food_allergy" value="other"> Other: <input type="text">
      </div>
    </td>
  </tr>
  <tr>
    <td>Other Allergies:</td>
    <td>
      <input type="checkbox" name="other_allergies" value="dust"> Dust<br>
      <input type="checkbox" name="other_allergies" value="pollen"> Pollen<br>
      <input type="checkbox" name="other_allergies" value="mold"> Mold<br>
      <input type="checkbox" name="other_allergies" value="animal_dander"> Animal dander<br>
      <input type="checkbox" name="other_allergies" value="other"> Other: <input type="text">
    </td>
  </tr>
  <tr>
    <td>Asthma:</td>
    <td><input type="radio" name="asthma" value="yes"> Yes</td>
    <td><input type="radio" name="asthma" value="no"> No</td>
  </tr>
  <tr>
    <td>Congenital Heart Disease:</td>
    <td><input type="radio" name="heart_disease" value="yes"> Yes</td>
    <td><input type="radio" name="heart_disease" value="no"> No</td>
  </tr>
  <tr>
    <td>Thyroid Disease:</td>
    <td><input type="radio" name="thyroid_disease" value="yes"> Yes</td>
    <td><input type="radio" name="thyroid_disease" value="no"> No</td>
  </tr>
  <tr>
    <td>Diabetes Mellitus:</td>
    <td><input type="radio" name="diabetes" value="yes"> Yes</td>
    <td><input type="radio" name="diabetes" value="no"> No</td>
  </tr>
  <tr>
    <td>Peptic Ulcer Disease:</td>
    <td><input type="radio" name="peptic_ulcer" value="yes"> Yes</td>
    <td><input type="radio" name="peptic_ulcer" value="no"> No</td>
  </tr>
  <tr>
    <td>Coronary Artery Disease:</td>
    <td><input type="radio" name="coronary_disease" value="yes"> Yes</td>
    <td><input type="radio" name="coronary_disease" value="no"> No</td>
  </tr>
  <tr>
    <td>Skin Disorders:</td>
    <td><input type="radio" name="skin_disorder" value="yes"> Yes</td>
    <td><input type="radio" name="skin_disorder" value="no"> No</td>
  </tr>
  <tr>
    <td>If yes, please specify:</td>
    <td colspan="2"><input type="text"></td>
  </tr>
  <tr>
    <td>Tuberculosis:</td>
    <td><input type="radio" name="tuberculosis" value="yes"> Yes</td>
    <td><input type="radio" name="tuberculosis" value="no"> No</td>
  </tr>
  <tr>
    <td>Hepatitis:</td>
    <td><input type="radio" name="hepatitis" value="yes"> Yes</td>
    <td><input type="radio" name="hepatitis" value="no"> No</td>
  </tr>
  <tr>
    <td>PCOS:</td>
    <td><input type="radio" name="pcos" value="yes"> Yes</td>
    <td><input type="radio" name="pcos" value="no"> No</td>
  </tr>
  <tr>
    <td>Epilepsy/Seizure Disorder:</td>
    <td><input type="radio" name="epilepsy" value="yes"> Yes</td>
    <td><input type="radio" name="epilepsy" value="no"> No</td>
  </tr>
  <tr>
    <td>Cancer:</td>
    <td><input type="radio" name="cancer" value="yes"> Yes</td>
    <td><input type="radio" name="cancer" value="no"> No</td>
 </tr>
    <tr>
      <td>If yes, please specify type:</td>
      <td>
        <input type="checkbox" name="cancer_type" value="breast"> Breast Cancer<br>
        <input type="checkbox" name="cancer_type" value="lung"> Lung Cancer<br>
        <input type="checkbox" name="cancer_type" value="prostate"> Prostate Cancer<br>
        <input type="checkbox" name="cancer_type" value="skin"> Skin Cancer<br>
        <input type="checkbox" name="cancer_type" value="other"> Other: <input type="text">
      </td>
    </tr>
</table>

<h2>CURRENT MEDICATIONS:</h2>
<table style="width:100%">
  <tr>
    <td>Are you currently taking any medications?</td>
    <td><input type="radio" name="medications" value="yes"> Yes</td>
    <td><input type="radio" name="medications" value="no"> No</td>
  </tr>
  <tr>
    <td>If yes, please list them:</td>
    <td colspan="2"><input type="text"></td>
  </tr>
</table>

<h2>LIFESTYLE AND PREFERENCES:</h2>
<table style="width:100%">
  <tr>
    <td>How would you rate your stress level?</td>
    <td>
      <select name="stress_level">
        <option value="low">Low</option>
        <option value="moderate">Moderate</option>
        <option value="high">High</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>What activities do you enjoy for relaxation?</td>
    <td>
      <input type="checkbox" name="relaxation_activities" value="reading"> Reading<br>
      <input type="checkbox" name="relaxation_activities" value="exercise"> Exercise<br>
      <input type="checkbox" name="relaxation_activities" value="meditation"> Meditation<br>
      <input type="checkbox" name="relaxation_activities" value="family_friends"> Spending time with family/friends<br>
      <input type="checkbox" name="relaxation_activities" value="other"> Other: <input type="text">
    </td>
  </tr>
</table>

<h2>ADDITIONAL COMMENTS OR CONCERNS:</h2>
<table style="width:100%">
  <tr>
    <td>Please share any other information you think is important for us to know:</td>
    <td colspan="2"><textarea rows="4" cols="50"></textarea></td>
  </tr>
</table>

<input type="submit" value="Submit">

</body>
</html>