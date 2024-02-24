@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])

<link rel="stylesheet" href="{{ asset('css/mainFormStyles.css') }}">

<main class="bg-custom-901 mt-20">
    <section id="step1" class="step active hero">
        <form action="/nurse-patients/update-progress-notes/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="hero-content">
                <div class="left">
                    <div class="left-1">
                        <h1>Progress Notes</h1>
                        <p>
                            <label for="progress_date">Progress Date:</label>
                            <input type="date" id="progress_date" name="progress_date" value="{{ old('progress_date') ?? optional($patient->progressNotes->first())->progress_date }}" />
                            @error('progress_date')
                                <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                            @enderror
                        </p>
                        <p>
                            <label for="shift">Shift:</label>
                            <select id="shift" name="shift">
                                <option value="7:00am-3:00pm" @if(old('shift', optional($patient->progressNotes->first())->shift) == '7:00am-3:00pm') selected @endif>7:00am-3:00pm</option>
                                <option value="3:00pm-11:00pm" @if(old('shift', optional($patient->progressNotes->first())->shift) == '3:00pm-11:00pm') selected @endif>3:00pm-11:00pm</option>
                                <option value="11:00pm-7:00am" @if(old('shift', optional($patient->progressNotes->first())->shift) == '11:00pm-7:00am') selected @endif>11:00pm-7:00am</option>
                            </select>
                            @error('shift')
                                <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                            @enderror
                        </p>
                        
                        
                        <h3>Focus</h3>
                        <p>
                            <input type="text" id="focus" name="focus" value="{{ optional($patient->progressNotes->first())->focus }}" />
                            @error('focus')
                            <p class="text-red-500 text-xs p-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </p>
                        <h3>Notes</h3>
                        <p>
                            <input type="text" id="prog_notes" name="prog_notes" value="{{ optional($patient->progressNotes->first())->prog_notes }}" />
                            @error('prog_notes')
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
    
</main>




<script src="{{ asset('js/mainFormScripts.js') }}"></script>


@include('partials.footer ')
