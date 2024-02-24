@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])
<style>
    .tables-container {
    display: flex;
    flex-direction: column;
    gap: 20px; /* Adjust the gap as needed */
}

/* Add any other styling as needed for individual tables */
#vital-signs-table,
#medication-remarks-table {
    /* Add your table styles here */
}
th {
    width: 50px;
}

    h1 {
        font-size: 1.6rem;
        font-weight: 700
    }
    h3 {
        font-size: 1rem;
        font-weight: 700
    }
    #hero {
    /* height: 100vh;*/
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f8f8;
    border: 1px dotted red;
    margin-top: 2rem;
    }
    input, select {
    border: 1px solid rgb(119, 119, 119);
    border-radius: 8px; /* Adjust the value for desired roundness */
    }
    .bg-card {
    background-color: #dceddd;
    }
    .flexi {
    display: flex;
    gap: 2rem;
    align-items: flex-start
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
    width: 250px; /* Adjust the width as needed for your layout */
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
    width: 40rem;
    height: 25rem;
    overflow: hidden; /* This prevents the child from overflowing */
    }
    .right {
    border: 1px dotted cyan;
    width: 100rem;
    height: auto;
    overflow: ; /* This prevents the child from overflowing */
}
.bg-card {
    padding: 2rem;
    border-radius: 25px;
}

</style>
<main class="bg-custom-901 mt-20">
    <section id="hero">
        <div class="hero-content">
        <div class="left">
            <div class="left-top bg-card">
            <div class="left-top-1">
                <h1>{{  $patient->first_name }} {{  $patient->last_name }}</h1>
                <h3>{{  $patient->patient_id }}</h3>
            </div>
            <div class="left-top-2 flexi">
                <p>{{ Carbon\Carbon::parse($patient->date_of_birth)->age }}</p>
                <p>{{  $patient->gender }}</p>
            </div>
            <div class="left-top-3 flexi">
                <p>Height</p>
                <p>Weight</p>
                <p>Blood</p>
            </div>
            </div>
            <div class="left-bottom">
            <div class="left-bottom-top">
                <h3>Patient Information</h3>
                <div class="flexi">
                <p>XXXX</p>
                <p>XXXX</p>
                </div>
            </div>
            <div class="left-bottom-bottom">
                <h3>Person In-charge Information</h3>
                <div class="flexi">
                <p>{{  $patient->pic_first_name }} {{  $patient->pic_last_name }}</p>
                </div>
                <div class="flexi">
                <p>{{  $patient->pic_relation }} {{  $patient->pic_contact_number }}</p>
                </div>
            </div>
            </div>
        </div>
        <div class="right">
            <div class="right-1">
            <div class="right-header">
                <div class="flex-only">
                    <h1>Patient Complete History</h1>
                    <a href="/nurse-patients/edit/{{$patient->patient_id}}" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Edit</a>                
                </div>
            </div>
            <div class="right-content">
                <h3>Medical History</h3>
                <p>
                <label for="completeHistory">Complete History:</label>
                <input
                    type="text"
                    id="completeHistory"
                    name="completeHistory"
                />
                </p>
                <p>
                <label for="pastMedicalHistory">Past Medical History:</label>
                <input
                    type="text"
                    id="pastMedicalHistory"
                    name="pastMedicalHistory"
                />
                </p>
                <p>
                <label for="previousHistory">Previous History:</label>
                <input
                    type="text"
                    id="previousHistory"
                    name="previousHistory"
                />
                </p>
                <p>
                <label for="familyHistory">Family History:</label>
                <input type="text" id="familyHistory" name="familyHistory" />
                </p>
                <p>
                <label for="personalSocialHistory"
                    >Personal/Social History:</label
                >
                <input
                    type="text"
                    id="personalSocialHistory"
                    name="personalSocialHistory"
                />
                </p>
                <p>
                <label for="obstetricalHistory">For Obstetrical History:</label>
                <input
                    type="text"
                    id="obstetricalHistory"
                    name="obstetricalHistory"
                />
                </p>
                <p>
                <label for="pediatricMedicalHistory"
                    >Pediatric Medical History:</label
                >
                <input
                    type="text"
                    id="pediatricMedicalHistory"
                    name="pediatricMedicalHistory"
                />
                </p>
                <p>
                <label for="reviewOfSystems">Review of Systems:</label>
                <input
                    type="text"
                    id="reviewOfSystems"
                    name="reviewOfSystems"
                />
                </p>
                <p>
                <label for="clinicalImpression">Clinical Impression:</label>
                <input
                    type="text"
                    id="clinicalImpression"
                    name="clinicalImpression"
                />
                </p>
                <p>
                <label for="workUp">Work Up:</label>
                <input type="text" id="workUp" name="workUp" />
                </p>
                <h3>Medical History</h3>
                <p>
                <label for="medicationDosage"
                    >Name of Medication and Dosage:</label
                >
                <input
                    type="text"
                    id="medicationDosage"
                    name="medicationDosage"
                />
                </p>
                <div class="flexi">
                    <p>
                    <label for="frequency">Frequency:</label>
                    <input type="text" id="frequency" name="frequency" />
                    </p>
                    <p>
                    <label for="prescribingPhysician">Submitted by:</label>
                    <input
                        type="text"
                        id="prescribingPhysician"
                        name="prescribingPhysician"
                    />
                    </p>
                </div>
                <div class="flexi">
                    <p>
                    <label for="frequency">Prescribing Physician:</label>
                    <input type="text" id="frequency" name="frequency" />
                    </p>
                    <p>
                    <label for="prescribingPhysician">Date & Time:</label>
                    <input
                        type="text"
                        id="prescribingPhysician"
                        name="prescribingPhysician"
                    />
                    </p>
                </div>
            </div>
            </div>
            <div class="right-2">
            <div class="right-header">
                <div class="flex-only">
                <h1>Nurses Remarks</h1>
                <a href="/nurse-patients/add-remark/{{$patient->patient_id}}" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Add Remark</a>                
                </div>
            </div>
            <div class="right-content">
                <h3>Vital Signs</h3>
                <div class="tables-container">
                    <table id="vital-signs-table" class="table-auto w-full text-left">
                        <thead>
                          <tr>
                            <th class="px-4 py-2"></th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Time</th>
                            <th class="px-4 py-2">Specialist</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($patient->vitalSigns as $vitalSign)
                                <tr>
                                    <td class="border px-4 py-2">{{ $vitalSign->vital_signs_id ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $vitalSign->vital_date ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $vitalSign->vital_time ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $patient->specialist ?? 'N/A' }}</td>
                                    <!-- Add other fields as needed -->
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    <h3>Medications, Treaments & etc.</h3>
                    <table id="vital-signs-table" class="table-auto w-full text-left">
                        <thead>
                            <tr>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2">Date</th>
                                <th class="px-4 py-2">Shift</th>
                                <th class="px-4 py-2">Specialist</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patient->medicationRemarks as $medicationRemark)
                                <tr>
                                    <td class="border px-4 py-2">{{ $medicationRemark->medication_remark_id ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $medicationRemark->medication_date ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $medicationRemark->shift ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $patient->specialist ?? 'N/A' }}</td>
                                    <!-- Add other fields as needed -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
              </div>
            </div>




            <div class="right-3">
            <div class="right-header">
                <div class="flex-only">
                <h1>Progress Notes</h1>
                <a href="" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Add Progress Notes</a>                
            </div>
            </div>
            {{-- <div class="right-content">
                <p class="flex-col">
                <label for="focus">Focus:</label>
                <input type="text" id="focus" name="focus" />
                </p>
                <p class="flex-col">
                <label for="notes">Notes:</label>
                <input type="text" id="notes" name="notes" />
                </p>
                <p>
                    <label for="respiratoryRate">Submitted by:</label>
                    <input
                        type="text"
                        id="respiratoryRate"
                        name="respiratoryRate"
                    />
                </p>
                <p>
                    <label for="Oxygen">Date & Time:</label>
                    <input type="text" id="Oxygen" name="Oxygen" />
                </p>
            </div> --}}
            </div>
        </div>
        </div>
    </section>
</main>






@include('partials.footer ')
