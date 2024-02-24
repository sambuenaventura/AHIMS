@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])
<style>
    .hospital-number-picker label {
    position: relative;
}

.hospital-number-picker input[type="checkbox"] {
    position: absolute;
    top: -9999px;
    left: -9999px;
}

.checkmark {
    fill: none;
    stroke: white;
    stroke-width: 3px;
}

.hospital-number-picker input[type="checkbox"]:checked + span + svg.checkmark {
    display: block;
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
    /* position: relative; */
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
    input, select {
    border: 1px solid rgb(119, 119, 119);
    border-radius: 8px; /* Adjust the value for desired roundness */
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
    width: 100rem;
    height: auto;
    /*overflow: hidden;  This prevents the child from overflowing */
    }
    .right {
    border: 1px dotted cyan;
    width: 40rem;
    height: auto;
    overflow: ; /* This prevents the child from overflowing */
}
.bg-card {
    padding: 2rem;
    border-radius: 25px;
}

</style>

{{-- <header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-black text-center pt-24">Add Patient</h1>
    </a>
</header> --}}
<main class="bg-custom-901 mt-20">

    <section id="hero">
        <form action="/add/patient" enctype="multipart/form-data" method="POST" class="flex flex-col">
            @csrf
        <div class="hero-content">
        <div class="left">
            <div class="left-1">
                <h1>Add Patient</h1>
                <h3>I. Patient Information</h3>
                <p>
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" />
                    @error('first_name')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
                <p>
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" />
                    @error('last_name')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
                <p>
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" />
                    @error('date_of_birth')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
                <p>
                    <label for="gender">Sex</label>
                    <select name="gender">
                        <option value="" {{old('gender') == "" ? 'selected' : ''}}></option>
                        <option value="Male" {{old('gender') == "Male" ? 'selected' : ''}}>Male</option>
                        <option value="Female" {{old('gender') == "Female" ? 'selected' : ''}}>Female</option>
                    </select>                    @error('gender')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
                <p>
                    <label for="contact_number">Contact Number:</label>
                    <input type="number" id="contact_number" name="contact_number" value="{{ old('contact_number') }}" />
                    @error('contact_number')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
                <p>
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}" />
                    @error('address')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
            </div>
            <div class="left-2">
                <h3>II. Person In-charge Information</h3>
                <p>
                    <label for="pic_first_name">First Name:</label>
                    <input type="text" id="pic_first_name" name="pic_first_name" value="{{ old('pic_first_name') }}" />
                    @error('pic_first_name')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
                <p>
                    <label for="pic_last_name">Last Name:</label>
                    <input type="text" id="pic_last_name" name="pic_last_name" value="{{ old('pic_last_name') }}" />
                    @error('pic_last_name')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
                <p>
                    <label for="pic_relation">Relation to patient:</label>
                    <input type="text" id="pic_relation" name="pic_relation" value="{{ old('pic_relation') }}" />
                    @error('pic_relation')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
                <p>
                    <label for="pic_contact_number">Contact Number:</label>
                    <input type="number" id="pic_contact_number" name="pic_contact_number" value="{{ old('pic_contact_number') }}" />
                    @error('pic_contact_number')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
            </div>
            <div class="left-3">
                <h3>III. Admit Person Information</h3>
                <p>
                    <label for="ap_first_name">First Name:</label>
                    <input type="text" id="ap_first_name" name="ap_first_name" value="{{ old('ap_first_name') }}" />
                    @error('ap_first_name')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
                <p>
                    <label for="ap_last_name">Last Name:</label>
                    <input type="text" id="ap_last_name" name="ap_last_name" value="{{ old('ap_last_name') }}" />
                    @error('ap_last_name')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
                <p>
                    <label for="ap_contact_number">Contact Number:</label>
                    <input type="number" id="ap_contact_number" name="ap_contact_number" value="{{ old('ap_contact_number') }}" />
                    @error('ap_contact_number')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
            </div>
            <div class="left-4">
                <h3>IV. Attending Physician</h3>
                <p>
                    <label for="specialist">Specialist:</label>
                    <input type="text" id="specialist" name="specialist" value="{{ old('specialist') }}" />
                    @error('specialist')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </p>
            </div>
            <div class="left-5">
                <div class="hospital-number-picker grid grid-cols-3 gap-4">
                    @for ($i = 1; $i <= 20; $i++)
                        @php
                            $disabled = in_array($i, $assignedRooms) ? 'disabled' : '';
                        @endphp
                        <label for="hospital_number{{$i}}" class="block text-center cursor-pointer bg-gray-200 p-4 rounded-lg relative {{$disabled}}">
                            <input type="checkbox" id="hospital_number{{$i}}" name="hospital_number[]" value="{{$i}}" class="hidden hospital-number-checkbox" {{$disabled}} />
                            <span class="text-lg font-semibold">{{$i}}</span>
                            <svg class="checkmark hidden absolute top-0 left-0 m-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path class="fill-current text-green-500" d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                            </svg>
                        </label>
                    @endfor
                </div>
                
                
                
                
            </div>
        </div>
        
        <div class="right">
        </div>
        </div>
        <button type="submit" class="bg-custom-50 hover:bg-custom-50-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Add New</button>    
        </form>
    </section>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.hospital-number-checkbox');
    const assignedRooms = {!! json_encode($assignedRooms) !!};

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Uncheck all checkboxes except the current one
            checkboxes.forEach(cb => {
                if (cb !== checkbox) {
                    cb.checked = false;
                    cb.nextElementSibling.nextElementSibling.classList.add('hidden');
                }
            });

            // Show checkmark if checkbox is checked
            if (checkbox.checked) {
                checkbox.nextElementSibling.nextElementSibling.classList.remove('hidden');
            } else {
                checkbox.nextElementSibling.nextElementSibling.classList.add('hidden');
            }
        });

        // Disable checkboxes for assigned rooms
        if (assignedRooms.includes(parseInt(checkbox.value))) {
            checkbox.disabled = true;
            checkbox.nextElementSibling.classList.add('text-gray-500');
        }
    });
});


</script>
@include('partials.footer ')
