@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])
<style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      background-color: #eee;
    }
  
    #admission {
      height: 100vh;
      display: flex;
      justify-content: center;
      /* background-color: #f8f8f8; */
      margin-left: 10rem;
    }
    .admission-content {
      /* display: flex; */
      /* align-items: center; */
      /* justify-content: center; */
      width: 100%;
      max-width: 100rem;
      padding: 1.8rem 1.2rem;
      gap: 3rem;
    }
    .boxes {
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      grid-template-rows: repeat(1, 1fr);
      grid-gap: 20px;
      justify-content: space-evenly;
    }
  
    .box {
      /* Add styling for the boxes as needed */
      padding: 20px;
    }
  
    #datePlaceholder {
      font-size: 0.9rem;
  
    }
  
    .boxes .box {
      border-radius: 10px;
      color: black;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      font-family: sans-serif;
      gap: 2rem;
    }
    .box1 {
      gap: 0 !important;
  
    }.smaller-label {
    font-size: 0.8rem; /* Adjust the font size as needed */
}

    .left {
      width: 50rem;
      height: 50rem;
      overflow: hidden; /* This prevents the child from overflowing */
    }
    .right {
      width: 170rem;
      height: 50rem;
      overflow: auto; /* This prevents the child from overflowing */
    }
    .personnel {
    }
    #patientOptionsOverlay {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* background-color: rgba(38, 77, 56, 0.8) !important; */
    background-color: rgb(23 73 46 / 56%) !important;
    z-index: 10000;
}
.label {
    display: flex;
    gap: 2rem;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}
.label-opt {
    display: flex;
    width: 12rem;
    height: 12rem;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
#patientOptions {
    width: 40rem; /* Adjust this value to modify the width of the modal */
    height: 22rem;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    display: flex; 
    flex-direction: column;
    align-items: center;
    justify-content: center; /* Adjust this value to change the vertical spacing */
    
}
.flexi {
    display: flex;
    flex-direction: row;
    gap: 2rem;
}

#patientOptions label {
    /* Styles for labels inside the modal */
}

#patientOptions button {
    /* Styles for button inside the modal */
}

#patientOptions p#error-message {
    color: red;
    display: none;
    /* Additional styles for error message inside the modal */
}

  </style>


{{-- <header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-black text-center pt-24">Add Patient</h1>
    </a>
</header> --}}
<section id="admission">
    <div class="admission-content">
        <div class="card pe-0">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">View Patient</h4>
              </form>
                
                </div>
                <form action="/add/patient" enctype="multipart/form-data" method="POST" class="flex flex-col">
                    @csrf
                    <div class="hero-content">
                        <div class="row">
                            <div class="col">
                                <h6 class="text-success">I. Patient Information</h6>
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="first_name" name="first_name" value="{{$patient->first_name}}" class="form-control bg-light" placeholder="First Name" aria-label="First Name" disabled>
                                            <label for="first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="last_name" name="last_name" value="{{$patient->last_name}}" class="form-control bg-light" placeholder="Last Name" aria-label="Last Name" disabled>
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    @error('first_name')
                                    <div class="mr-40">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                    @error('last_name')
                                    <div class="">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <input type="text" id="contact_number" name="contact_number" value="{{$patient->contact_number}}" class="form-control bg-light my-3" placeholder="Contact Number" aria-label="First name" disabled>
                                    <label for="contact_number">Contact Number</label>
                                </div>
                                <div class="input-group">
                                    @error('contact_number')
                                    <div class="">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>
                                <h6 class="text-success">II. Person In-charge Information</h6>
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="pic_first_name" name="pic_first_name" value="{{$patient->pic_first_name}}" class="form-control bg-light" placeholder="First Name" aria-label="First Name" disabled>
                                            <label for="pic_first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="pic_last_name" name="pic_last_name" value="{{$patient->pic_last_name}}" class="form-control bg-light" placeholder="Last Name" aria-label="Last Name" disabled>
                                            <label for="pic_last_name">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    @error('pic_first_name')
                                    <div class="mr-40">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                    @error('pic_last_name')
                                    <div class="">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <input type="text" id="pic_contact_number" name="pic_contact_number" value="{{$patient->pic_contact_number}}" class="form-control bg-light my-3" placeholder="Contact Number" aria-label="First name" disabled>
                                    <label for="pic_contact_number">Contact Number</label>
                                </div>
                                <div class="input-group">
                                    @error('pic_contact_number')
                                    <div class="">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>
                                <h6 class="text-success">III. Admit Person Information</h6>
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="ap_first_name" name="ap_first_name" value="{{$patient->ap_first_name}}" class="form-control bg-light" placeholder="First Name" aria-label="First Name" disabled>
                                            <label for="ap_first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="ap_last_name" name="ap_last_name" value="{{$patient->ap_last_name}}" class="form-control bg-light" placeholder="Last Name" aria-label="Last Name" disabled>
                                            <label for="ap_last_name">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    @error('ap_first_name')
                                    <div class="mr-40">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                    @error('ap_last_name')
                                    <div class="">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>
                                {{-- <h6 class="text-success">IV. Attending Physician</h6>
                                <div class="form-floating">
                                    <input type="text" id="specialist" name="specialist" value="{{ $physician->phy_first_name }} {{ $physician->phy_last_name }}" class="form-control bg-light mb-3" placeholder="Specialist" aria-label="Specialist" disabled>
                                    <label for="specialist">Specialist</label>
                                    
                                </div>
                                <div class="input-group">
                                    @error('specialist')
                                    <div class="mr-40">
                                        <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div> --}}
                                <h6 class="text-success">IV. Attending Physician</h6>
                                    <div class="form-floating">
                                        <input type="text" id="specialist" name="specialist" value="Dr. {{ $physician->phy_first_name }} {{ $physician->phy_last_name }}" class="form-control bg-light mb-3" placeholder="Specialist" aria-label="Specialist" disabled>
                                        <label for="specialist">Attending Physician</label>
                                    </div>
                                    <div class="input-group">
                                        @error('physician_id')
                                        <div class="mr-40">
                                            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                            </div>
                            <div class="col">
                                <h6 class="text-success">ㅤ</h6>
                                <div class="row g-3 align-items-end">
                                    <div class="col">
                                        <div class="form-floating">
                                        <input type="date" id="date_of_birth" name="date_of_birth" value="{{$patient->date_of_birth}}" class="form-control bg-light" placeholder="Birth Date" aria-label="Birth Date" disabled>
                                        <label for="date_of_birth">Date of Birth</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">

                                        <input type="number" id="age" name="age" class="form-control bg-light" disabled placeholder="Age" aria-label="Age" readonly>
                                        <label for="age">Age</label>
                                    </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">

                                        <input type="text" id="gender" name="gender" value="{{$patient->gender}}" class="form-control bg-light" placeholder="Birth Date" aria-label="Birth Date" disabled>
                                        <label for="gender">Sex</label>
                                    </div>
                                    </div>
                                    <div class="input-group">
                                        @error('gender')
                                        <div class="ml-2 mr-64">
                                            <p class="text-red-500 text-xs p-1">
                                                {{ $message }}
                                            </p>
                                        </div>
                                        @enderror
                                        @error('gender')
                                        <div class="">
                                            <p class="text-red-500 text-xs p-1">
                                                {{ $message }}
                                            </p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <input type="text" id="address" name="address" value="{{$patient->address}}" class="form-control bg-light my-3" disabled placeholder="Address" aria-label="Address">
                                    <label for="address">Address</label>
                                </div>
                                <div class="input-group">
                                    @error('address')
                                    <div class="ml-2 mr-64">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>
                                <h6 class="text-success">ㅤ</h6>
                                <div class="form-floating">
                                    <input type="text" id="pic_relation" name="pic_relation" value="{{$patient->pic_relation}}" class="form-control bg-light mb-3" disabled placeholder="Relation to Patient" aria-label="Relation to Patient">
                                    <label for="pic_relation">Relation to Patient</label>
                                </div>
                                <div class="input-group">
                                    @error('pic_relation')
                                    <div class="ml-2">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>
                                <input type="text" class="form-control bg-light my-3 py-3 invisible" placeholder="pic_relation" aria-label="Address">
                                <h6 class="text-success">ㅤ</h6>
                                <div class="form-floating">
                                    <input type="text" id="ap_contact_number" name="ap_contact_number" value="{{$patient->ap_contact_number}}" class="form-control bg-light mb-3" disabled placeholder="Contact Number" aria-label="Contact Number">
                                    <label for="ap_contact_number">Contact Number</label>
                                </div>
                                <div class="input-group">
                                    @error('ap_contact_number')
                                    <div class="ml-2">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>
                                <h6 class="text-success">ㅤ</h6>
                                {{-- <div class="form-floating">
                                    <input type="text" id="room_number" name="room_number" value="{{ old('room_number') }}" class="form-control bg-light py-3" placeholder="Room Number" aria-label="Room Number">
                                    <label for="room_number">Room Number</label>
                                </div> --}}
                                @if($patient->admission_type != 'archived')
                                <div class="form-floating">
                                    <input type="text" id="room_number" name="room_number" value="{{$patient->room_number}}" class="form-control bg-light mb-3" disabled placeholder="Room Number" aria-label="Room Number">
                                    <label for="room_number">Room Number</label>
                                </div>
                                @endif
                                   
                                <div class="input-group">
                                    @error('room_number')
                                    <div class="ml-2">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>
                                {{-- <div class="buttons mt-4 float-end">
                                    <a href="{{ route('admission.index') }}" class="btn btn-light">Cancel</a>
                                    <button type="submit" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const dateOfBirthInput = document.getElementById('date_of_birth');
    const ageInput = document.getElementById('age');

    // Function to calculate age
    function calculateAge() {
        console.log('Date of birth changed');

        // Get the selected date of birth
        const dob = new Date(dateOfBirthInput.value);
        // Get the current date
        const today = new Date();
        // Calculate the age
        let age = today.getFullYear() - dob.getFullYear();
        // Adjust age if the birthday hasn't occurred yet this year
        if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
            age--;
        }
        // Update the age input field
        ageInput.value = age;
    }

    // Calculate age on date of birth change
    dateOfBirthInput.addEventListener('change', calculateAge);

    // Calculate age on DOMContentLoaded (page load)
    calculateAge();
});
</script>
@include('partials.footer ')
