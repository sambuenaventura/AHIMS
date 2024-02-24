<section id="step1" class="step active hero">
    <form action="/nurse-patients/update-medication-remark/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="hero-content">
            <div class="left">
                <div class="left-1">
                    <h1>Nurses Remarks</h1>
                    <h3>Medications</h3>
                    <p>
                        <label for="medication_date">Medication Date:</label>
                        <input type="date" id="medication_date" name="medication_date" value="{{ old('medication_date') ?? optional($patient->medicationRemarks->first())->medication_date }}" />
                        @error('medication_date')
                            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                        @enderror
                    </p>
                    <p>
                        <label for="shift">Shift:</label>
                        <select id="shift" name="shift">
                            <option value="7:00am-3:00pm" @if(old('shift', optional($patient->MedicationRemarks->first())->shift) == '7:00am-3:00pm') selected @endif>7:00am-3:00pm</option>
                            <option value="3:00pm-11:00pm" @if(old('shift', optional($patient->MedicationRemarks->first())->shift) == '3:00pm-11:00pm') selected @endif>3:00pm-11:00pm</option>
                            <option value="11:00pm-7:00am" @if(old('shift', optional($patient->MedicationRemarks->first())->shift) == '11:00pm-7:00am') selected @endif>11:00pm-7:00am</option>
                        </select>
                        @error('shift')
                            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                        @enderror
                    </p>
                    <p>
                        <label for="medication">Medication:</label>
                        <input type="text" id="medication" name="medication" value="{{ old('medication', optional($patient->medicationRemarks->first())->medication) }}"/>
                        @error('medication')
                            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                        @enderror
                    </p>
                    <p>
                        <label for="medication_dosage">Dosage:</label>
                        <input type="text" id="medication_dosage" name="medication_dosage" value="{{ old('medication_dosage') ?? optional($patient->medicationRemarks->first())->medication_dosage }}"/>
                        @error('medication_dosage')
                            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                        @enderror
                    </p>
                    <p>
                        <label for="treatment">Treatment:</label>
                        <input type="text" id="treatment" name="treatment" value="{{ old('treatment') ?? optional($patient->medicationRemarks->first())->treatment }}"/>
                        @error('treatment')
                            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                        @enderror
                    </p>
                    <p>
                        <label for="dietary_information">Dietary Information:</label>
                        <input type="text" id="dietary_information" name="dietary_information" value="{{ old('dietary_information') ?? optional($patient->medicationRemarks->first())->dietary_information }}"/>
                        @error('dietary_information')
                            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                        @enderror
                    </p>
                    <div class="flex-col">
                        <label for="remarks_notes">Notes:</label>
                        <input type="text" id="remarks_notes" name="remarks_notes" value="{{ old('remarks_notes') ?? optional($patient->medicationRemarks->first())->remarks_notes }}"/>
                        @error('remarks_notes')
                            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="button" onclick="nextStep()" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Next</button>
                </div>
                
            </div>
        </div>
        <button type="submit" class="bg-custom-50 hover:bg-custom-50 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Update</button>

    </form>

</section>
