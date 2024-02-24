<section id="step1" class="step active hero">
    <form action="/nurse-patients/update-vital-signs/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="hero-content">
            <div class="left">
                <div class="left-1">
                    <h1>Nurses Remarks</h1>
                    <h3>Vital Signs</h3>
                    <p>
                        <label for="vital_date">Vital Sign Date:</label>
                        <input type="date" id="vital_date" name="vital_date" value="{{ optional($patient->vitalSigns->first())->vital_date }}" />
                        @error('vital_date')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </p>
                    
                    
                    <p>
                        <label for="vital_time">Vital Sign Time:</label>
                        <input type="time" id="vital_time" name="vital_time" value="{{ optional($patient->vitalSigns->first())->vital_date }}" />
                        @error('vital_time')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </p>
                    <p>
                        <label for="temperature">Temperature:</label>
                        <input type="text" id="temperature" name="temperature" value="{{ optional($patient->vitalSigns->first())->temperature }}" />
                        @error('temperature')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </p>
                    
                    <p>
                        <label for="heart_rate">Heart Rate:</label>
                        <input type="text" id="heart_rate" name="heart_rate" value="{{ optional($patient->vitalSigns->first())->heart_rate }}" />
                        @error('heart_rate')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                        @enderror
                    
                    <p>
                        <label for="pulse">Pulse:</label>
                        <input type="text" id="pulse" name="pulse" value="{{ optional($patient->vitalSigns->first())->pulse }}" />
                        @error('pulse')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </p>
                    
                    <p>
                        <label for="blood_pressure">Blood Pressure:</label>
                        <input type="text" id="blood_pressure" name="blood_pressure" value="{{ optional($patient->vitalSigns->first())->blood_pressure }}" />
                        @error('blood_pressure')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </p>
                    
                    <p>
                        <label for="respiratory_rate">Respiratory Rate:</label>
                        <input type="text" id="respiratory_rate" name="respiratory_rate" value="{{ optional($patient->vitalSigns->first())->respiratory_rate }}" />
                        @error('respiratory_rate')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </p>
                    
                    <p>
                        <label for="oxygen">Oxygen:</label>
                        <input type="text" id="oxygen" name="oxygen" value="{{ optional($patient->vitalSigns->first())->oxygen }}" />
                        @error('oxygen')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </p>
                        

                    <button type="button" onclick="nextStep()" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Next</button>
                </div>
            </div>
        </div>
        <button type="submit" class="bg-custom-50 hover:bg-custom-50 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Update</button>

    </form>

</section>
