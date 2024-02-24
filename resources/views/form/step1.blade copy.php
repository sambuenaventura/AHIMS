@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])
<style>
h1 {
  font-size: 1.6rem;
  font-weight: 700;
}
h3 {
  font-size: 1rem;
  font-weight: 700;
}
.step {
  display: none;
}

.step.active {
  display: flex;
}
.hero {
  /* height: 100vh;*/
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #f8f8f8;
  border: 1px dotted red;
  margin-top: 2rem;
}

.bg-card {
  background-color: #dceddd;
}
.flexi {
  display: flex;
  gap: 2rem;
  align-items: flex-start;
}
.flex-col {
  display: flex;
  flex-direction: column;
}
.flex-only {
  display: flex;
  justify-content: space-between; /* Center items horizontally within the container */
  /* align-items: flex-start; */
}
.flex-col input[type="text"] {
  width: 40rem; /* Adjust the width as needed */
  padding: 8px;
  font-size: 16px;
}
#button {
  background-color: #dceddd;
}
label {
  display: inline-block;
  width: 160px; /* Adjust the width as needed for your layout */
  margin-bottom: 5px;
}

.label-nospace {
  display: inline-block;
  width: auto; /* Adjust the width as needed for your layout */
  margin-bottom: 5px;
}

.hero-content {
  display: flex;
  /* align-items: center; */
  justify-content: center;
  width: 100%;
  max-width: 90rem;
  padding: 1.8rem 1.2rem;
  gap: 2.5rem;
  border: 1px dotted red;
}
.left {
  border: 1px dotted cyan;
  width: 80rem;
  height: auto;
  overflow: hidden; /* This prevents the child from overflowing */
}
.right {
  border: 1px dotted cyan;
  width: 40rem;
  height: 25rem;
  /* overflow: ;  This prevents the child from overflowing */
}
.bg-card {
  padding: 2rem;
  border-radius: 25px;
}


</style>
<main class="bg-custom-901 mt-20">
    <section id="step1" class="step active hero">
        <div class="hero-content">
          <div class="left">
            <div class="left-1">
              <h1>Edit Patient Complete History - Step 1</h1>
              <h3>I. Medical History</h3>
              <h5 class="flex-col">
                <label for="medication">Complete History</label>
                <input type="text" id="medication" name="medication" />
              </h5>
  
              <h5>Family History</h5>
              <div class="checkboxes">
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="hypertension"
                    name="pastMedicalHistory"
                    value="hypertension"
                  />
                  <label for="hypertension">Hypertension</label>
                  <input
                    type="checkbox"
                    id="diabetes"
                    name="pastMedicalHistory"
                    value="diabetes"
                  />
                  <label for="diabetes">Diabetes</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                </p>
              </div>
              <h5>Past Medical History</h5>
              <div class="checkboxes">
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                </p>
              </div>
              <h5>Personal/Social History</h5>
              <div class="checkboxes">
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="xxx">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                </p>
              </div>
              <h5>Menstrual History</h5>
              <div class="">
                <p>
                  <label for="Oxygen">Date & Time:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
                <p>
                  <label for="Oxygen">Date & Time:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
                <p>
                  <label for="Oxygen">Date & Time:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
              </div>
  
              <h5>For Obstetrical History</h5>
              <div class="">
                <p class="flexi">
                  <label class="label-nospace" for="Oxygen">LMP:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
  
                  <label class="label-nospace" for="Oxygen">PMP:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
                <p class="flexi">
                  <label class="label-nospace" for="Oxygen">AOG:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
  
                  <label class="label-nospace" for="Oxygen">EDC:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
                <p>
                  <label for="Oxygen">Prenatal Check-ups:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
                <p class="flexi">
                  <label class="label-nospace" for="Oxygen"
                    >The Patient is Gravida:</label
                  >
                  <input type="text" id="Oxygen" name="Oxygen" />
  
                  <label class="label-nospace" for="Oxygen">Para:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
              </div>
              <h5>First Pregnancy</h5>
              <div class="">
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen">Delivered on</label>
                  <input type="date" id="Oxygen" name="Oxygen" />
                  <label class="label-nospace" for="Oxygen">to a</label>
                  <select id="cars" name="cars">
                    <option value="tem">tem</option>
                    <option value="pretem">pretem</option>
                  </select>
                </div>
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen">birth living</label>
                  <select id="cars" name="cars">
                    <option value="boy">boy</option>
                    <option value="girl">girl</option>
                  </select>
                  <label class="label-nospace" for="Oxygen">via</label>
                  <select id="cars" name="cars">
                    <option value="NSD">NSD</option>
                    <option value="CS">CS</option>
                  </select>
                  <label class="label-nospace" for="Oxygen">at a</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                </div>
              </div>
              <h5>Pediatric Medical History</h5>
              <div class="">
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen">Term</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                  <label class="label-nospace" for="Oxygen">Preterm</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                </div>
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen">Postterm</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                  <p>(AOG)</p>
                </div>
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen"
                    >Age of mother at pregnancy:</label
                  >
                  <input type="input" id="Oxygen" name="Oxygen" />
                </div>
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen"
                    >No. of pregnancy:</label
                  >
                  <input type="input" id="Oxygen" name="Oxygen" />
                  <label class="label-nospace" for="Oxygen">first</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                </div>
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen">second</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                  <label class="label-nospace" for="Oxygen">third</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                  <label class="label-nospace" for="Oxygen">others</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                </div>
                <h5 class="flex-col">
                  <label for="medication"
                    >Maternal Complication during pregancy:</label
                  >
                  <input type="text" id="medication" name="medication" />
                </h5>
                <h5 class="flex-col">
                  <label for="medication">Immunizations:</label>
                  <input type="text" id="medication" name="medication" />
                </h5>
              </div>
              <button onclick="nextStep()" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Next</button>
            </div>
          </div>
        </div>
      </section>
  
      <section id="step2" class="hero step" style="display: none">
        <div class="hero-content">
          <div class="left">
            <div class="left-1">
              <h1>Edit Patient Complete History - Step 2</h1>
              <h3>I. Medical History</h3>
              <h5 class="flex-col">
                <label for="medication">Complete History</label>
                <input type="text" id="medication" name="medication" />
              </h5>
  
              <h5>Family History</h5>
              <div class="checkboxes">
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="hypertension"
                    name="pastMedicalHistory"
                    value="hypertension"
                  />
                  <label for="hypertension">Hypertension</label>
                  <input
                    type="checkbox"
                    id="diabetes"
                    name="pastMedicalHistory"
                    value="diabetes"
                  />
                  <label for="diabetes">Diabetes</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                </p>
              </div>
              <h5>Past Medical History</h5>
              <div class="checkboxes">
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="allergy">xxxxx</label>
                </p>
              </div>
              <h5>Personal/Social History</h5>
              <div class="checkboxes">
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="allergy"
                    name="pastMedicalHistory"
                    value="allergy"
                  />
                  <label for="xxx">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                </p>
                <p class="flexi">
                  <input
                    type="checkbox"
                    id="xxx"
                    name="pastMedicalHistory"
                    value="xxx"
                  />
                  <label for="xxx">xxxxx</label>
                </p>
              </div>
              <h5>Menstrual History</h5>
              <div class="">
                <p>
                  <label for="Oxygen">Date & Time:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
                <p>
                  <label for="Oxygen">Date & Time:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
                <p>
                  <label for="Oxygen">Date & Time:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
              </div>
  
              <h5>For Obstetrical History</h5>
              <div class="">
                <p class="flexi">
                  <label class="label-nospace" for="Oxygen">LMP:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
  
                  <label class="label-nospace" for="Oxygen">PMP:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
                <p class="flexi">
                  <label class="label-nospace" for="Oxygen">AOG:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
  
                  <label class="label-nospace" for="Oxygen">EDC:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
                <p>
                  <label for="Oxygen">Prenatal Check-ups:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
                <p class="flexi">
                  <label class="label-nospace" for="Oxygen"
                    >The Patient is Gravida:</label
                  >
                  <input type="text" id="Oxygen" name="Oxygen" />
  
                  <label class="label-nospace" for="Oxygen">Para:</label>
                  <input type="text" id="Oxygen" name="Oxygen" />
                </p>
              </div>
              <h5>First Pregnancy</h5>
              <div class="">
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen">Delivered on</label>
                  <input type="date" id="Oxygen" name="Oxygen" />
                  <label class="label-nospace" for="Oxygen">to a</label>
                  <select id="cars" name="cars">
                    <option value="tem">tem</option>
                    <option value="pretem">pretem</option>
                  </select>
                </div>
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen">birth living</label>
                  <select id="cars" name="cars">
                    <option value="boy">boy</option>
                    <option value="girl">girl</option>
                  </select>
                  <label class="label-nospace" for="Oxygen">via</label>
                  <select id="cars" name="cars">
                    <option value="NSD">NSD</option>
                    <option value="CS">CS</option>
                  </select>
                  <label class="label-nospace" for="Oxygen">at a</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                </div>
              </div>
              <h5>Pediatric Medical History</h5>
              <div class="">
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen">Term</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                  <label class="label-nospace" for="Oxygen">Preterm</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                </div>
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen">Postterm</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                  <p>(AOG)</p>
                </div>
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen"
                    >Age of mother at pregnancy:</label
                  >
                  <input type="input" id="Oxygen" name="Oxygen" />
                </div>
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen"
                    >No. of pregnancy:</label
                  >
                  <input type="input" id="Oxygen" name="Oxygen" />
                  <label class="label-nospace" for="Oxygen">first</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                </div>
                <div class="flexi">
                  <label class="label-nospace" for="Oxygen">second</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                  <label class="label-nospace" for="Oxygen">third</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                  <label class="label-nospace" for="Oxygen">others</label>
                  <input type="input" id="Oxygen" name="Oxygen" />
                </div>
                <h5 class="flex-col">
                  <label for="medication"
                    >Maternal Complication during pregancy:</label
                  >
                  <input type="text" id="medication" name="medication" />
                </h5>
                <h5 class="flex-col">
                  <label for="medication">Immunizations:</label>
                  <input type="text" id="medication" name="medication" />
                </h5>
              </div>
              <button onclick="prevStep()">Previous</button>
              <button onclick="submitForm()">Submit</button>
            </div>
          </div>
        </div>
      </section>
</main>

<script>
    let currentStep = 1;

function nextStep() {
  document.getElementById(`step${currentStep}`).style.display = "none";
  currentStep++;
  document.getElementById(`step${currentStep}`).style.display = "flex";
}

function prevStep() {
  document.getElementById(`step${currentStep}`).style.display = "none";
  currentStep--;
  document.getElementById(`step${currentStep}`).style.display = "flex";
}

function submitForm() {
  // Handle form submission logic
  alert("Form submitted!");
}

</script>




@include('partials.footer ')
