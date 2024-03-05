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
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
.label-opt {
    cursor: pointer;
    
}

  </style>

<section id="admission">
    <div class="admission-content">
        <div class="card pe-0">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Add Patient</h4>
              {{-- </form> --}}
                                
                
                
                </div>
                <form action="/add/patient" enctype="multipart/form-data" method="POST" class="flex flex-col">
                    @csrf

                    <div id="patientOptionsOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 10000; display: flex; justify-content: center; align-items: center;">
                        <div id="patientOptions" style="padding: 20px; border-radius: 10px;">
                            <h4 class="font-bold">Add Patient</h4>
                            <p class="mb-4">Is the patient Inpatient or Outpatient?</p>
                            <div class="label">
                                <label class="label-opt bg-custom-100 rounded">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="70" height="70" fill="url(#pattern0)"/>
                                        <defs>
                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_1387_953" transform="scale(0.0078125)"/>
                                        </pattern>
                                        <image id="image0_1387_953" width="128" height="128" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAc4SURBVHic7Z1NrF5FGcf/T/motpdiJRijEIiRjwAFAimtGwmgCxNN1I1xw6Z8SCsLEokbF8YFgQUWxc9EXZAQE9DIRqNFqhtNLcS0aSF8JKDgRyMtpPfeUhsKPxbzYvDN7Zl578z5euf5JTe5yZnzzDMz//PMe545c47kOI7jOI7jOI7jOI4zJwCbgO8AB4Fl4ixPyj4AXNG3/84qAdYCPwDeShj0U3ES+B5wZt/tcWZgMvi7MwZ+midcBCMC+GHBwX+XB/tul5MAYc7PCfun4iRwed/tK82avh1ogVvUTrtOk7StBbu9Mo8C+FSLtj/dou1esL4dKA2wJGmhJfNLZrahJdu9MI8CoOm4mTW2Off8sTGPU4AzAy6AynEBVM7oBEAkt99B/dP42kEXUCa3HxVIjm187aAdKJjbT6irBKNZOxjLFPCApBv6dmIGbpR0f99OpDD4e1pgk6R9KiPWo2b2gUh9i5LOKlDXW5KuMrOnC9hqjTFEgG0q5+fvEso8UaiuuVw76Bzg6ULz8mHgvIT6LgFeK1TngS76KIcxRIDzM89flPSIpKvN7B+xwmb2nKSrJD06OTeHCzLPb50x/AYYdG5+6P7FGEMEcFrEBVA5LoDKcQFUjgugclwAleMCqJwxCGCp6WBCNm4R+BVwSWqFwPnALybnNpLju5MA5VLBrwHRrOJk8I8UqtNTwQV4vJCdjUpbot0p6YOF6izle2sMOk0pSYTHrPYprK7lsmhmZ0fqK7kcfKWZPVPAVmsMPgKY2UFJPypkLmVTR4nBl6TvD33wRwNwJvD7EpNyQl0leBw4o4u+qQaCCB4kPHi5ahLqyeEk4Ynl0Qz+4H8DTEPYor1NYaPmhZpxH2Du1rAVWJb0N0m7JP10bGF/dAKIERtA3xv4/wz+R6DTLi6AynEBVM7pfTvQAktquJdfxY+895L7kOjgmMcI8EqLtl9u0XYvzKMA2sy/72rRtlMC4Aoyk0UNSZ7L+m5faZIiAHA58Bjwn8nfYwz0nXmF1w7eS525feA64PgKV8Rx4Lq+/VsJCq4dTKg3tw/sauiYwc6JlFk7GF1uvzjAUkMHDf6RJ8L09W3gQKQt/2vTpOz9zOGcP000rw3d5caBj0n6hKQtCgs971dY7Dks6XlJz0n6rZnN3e3YYIldLgXsrwVuBp5MuDoB3gb+DNxOzaG5K9oUAPA54JXEgV+J54EvlmqrswJtCABYAB7OGPhpfga8r3TbHZUXALCREMJL8xfg3Db6oGpKCgDYAOxrYfDfZQ+wrq2+mEe6Xgv4icLrV9pii6SHgbl6aqdXSkUA4I4Wr/xpbm6zT6oi1tOJNjaQvt1qP7CD8Lau0wkZvUuB7ZNjKRwCGjeAOIkUEsA3EgbtDeA2GsI3sIYQSf6bYO+bxTqhZnIFQLiKX00Y/Otn8OmGBBG8BMzj8w7dUkAAn4zZAL6yCr+2J9gd0/uFe6H1tQDgXklfbyiyX9I1ZvZ2zJcpu2sUNo1umuW8AfKmwuaSI5JelPSspD2S/mBmh/p0TFKRCBB7zfv2DN++mhAFxsxe4E7gnNX2UYwu5siPRI7vzrCdc+4Y2Czpu5L+DuwEPlq6gi6mgNh++3Vmdjzmxylsr1cIn7VwTNK3JO00szdLGOwiAsT2Hszj3oS2WC/pPkl7gYtLGOxCAK9Hjue8DfzCjHPHzNWSngK+kGuoCwG8FDme8z3eGzPOHTtnSXoUuC3HSBcCeDJy/BZg5vf/EG4Dsxo/B5wm6ce5Imgkdp+ScP5nE253dqzCrx0p91Gra3V3AGcA5wKbgVuBn5PwfsIpTgKfb8vBrA4mLOYcjpg5Adw0g083sfJehZn9GyLAOmAb4ZG3VBaBi9pwJruDgXsTGnCCkNg55XRAWAzaQdpiULJ/Q4UQHe4mUezAXyn9oGyJDgbOAY4mNuIgcBdhj98C4Wq4jJARO5BoYyb/hg6wFfhXYpPvnsV2diJo6MzLO30IXzz7taQrI0WXJV1sZv9OsevLpSNh8sWzz0j6Z6TogqSvJduNFfAIMCyArZL+KGltQ7Fjki4wsyMxex4BRoaZ7ZF0T6TYeklfTrIXK+ARYHgAC5JekPThhmJ7zWxLzJZHgBFiZssKq4JNbAY+FLPlAhgvD6n5iyQmKfpInAtgpJjZMUm/iRTbGrOTvRbf9xw79t8omeyW9KWG45fGDHgEGDf7I8c/HjPgAhg3sWctNsYMuADGzdHI8ei3FFwAI8bMTkSKNGULJbkAqscFUDkugMqZ+7WA2onlaTwCVI4LoHJcAJXjAqgcF0DluAAqxwVQOaN/HqB2cvM0HgEqxwVQOS6AynEBVI4LoHJcAJXjAqgcF0DluAAqxwVQOS6AykkRQNPLmGt6UfNQyRqfFAH8aZXHnG5od3yAawnf9JnmDeDa7AqcLDoZH8Jn235J+Bzbocn/0a3HTjf4+DiO4ziO4ziO4ziOk8I7Swdwm1BOcZMAAAAASUVORK5CYII="/>
                                        </defs>
                                    </svg>                                  
                                    <p class="text-white m-0 font-bold">Inpatient</p>
                                    <input type="radio" name="admission_type" value="Inpatient" class="invisible" onclick="submitForm()">
                                </label>
                                <label class="label-opt bg-custom-100 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="71" viewBox="0 -960 960 960" width="71">
                                        <path fill="#ffffff" d="M720-400v-120H600v-80h120v-120h80v120h120v80H800v120h-80Zm-360-80q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm80-80h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0-80Zm0 400Z"/>
                                      </svg>
                                                                    
                                    <p class="text-white m-0 font-bold">Outpatient</p>
                                    <input type="radio" name="admission_type" value="Outpatient" class="invisible" onclick="submitForm()">
                                </label>
                            </div>
                            <p id="error-message" style="color: red; display: none;">Please select either inpatient or outpatient.</p>
                        </div>
                    </div>
                    <div class="hero-content">
                        <div class="row">
                            <div class="col">
                                <h6 class="text-success">I. Patient Information</h6>
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control bg-light" placeholder="First Name" aria-label="First Name">
                                            <label for="first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control bg-light" placeholder="Last Name" aria-label="Last Name">
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
                                    <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number') }}" class="form-control bg-light my-3" placeholder="Contact Number" aria-label="First name">
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
                                            <input type="text" id="pic_first_name" name="pic_first_name" value="{{ old('pic_first_name') }}" class="form-control bg-light" placeholder="First Name" aria-label="First Name">
                                            <label for="pic_first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="pic_last_name" name="pic_last_name" value="{{ old('pic_last_name') }}" class="form-control bg-light" placeholder="Last Name" aria-label="Last Name">
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
                                    <input type="text" id="pic_contact_number" name="pic_contact_number" value="{{ old('pic_contact_number') }}" class="form-control bg-light my-3" placeholder="Contact Number" aria-label="First name">
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
                                            <input type="text" id="ap_first_name" name="ap_first_name" value="{{ old('ap_first_name') }}" class="form-control bg-light" placeholder="First Name" aria-label="First Name">
                                            <label for="ap_first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="ap_last_name" name="ap_last_name" value="{{ old('ap_last_name') }}" class="form-control bg-light" placeholder="Last Name" aria-label="Last Name">
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
                                <h6 class="text-success">IV. Attending Physician</h6>
                                <div class="form-floating">
                                    <select id="specialist" name="specialist" class="form-select bg-light" aria-label="Specialist">
                                        <option value="" disabled>Select Specialist</option>
                                        @foreach ($physicians as $physician)
                                            <option value="{{ $physician->physician_id }}">{{ 'Dr. ' . $physician->phy_first_name . ' ' . $physician->phy_last_name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="specialist">Specialist</label>
                                </div>
                                
                                
                                <div class="input-group">
                                    @error('specialist') <!-- Update error field to 'specialist' -->
                                    <div class="mr-40">
                                        <p class="text-red-500 text-xs p-1">{{ $message }}</p> <!-- Display the error message -->
                                    </div>
                                    @enderror
                                </div>
                                
                                
                            </div>
                            <div class="col">
                                <h6 class="text-success">ㅤ</h6>
                                <div class="row g-3 align-items-end">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control bg-light" placeholder="Birth Date" aria-label="Birth Date">
                                            <label for="date_of_birth">Birth Date</label>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="number" id="age" name="age" class="form-control bg-light" placeholder="Age" aria-label="Age" readonly>
                                            <label for="age">Age</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="form-floating">
                                            <select name="gender" class="form-select bg-light" aria-label="Gender">
                                                <option value="" {{ old('gender') == "" ? 'selected' : '' }} disabled>Select Gender</option>
                                                <option value="Male" {{ old('gender') == "Male" ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ old('gender') == "Female" ? 'selected' : '' }}>Female</option>
                                            </select>
                                            <label for="gender">Gender</label>
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        @error('date_of_birth')
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
                                    <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control bg-light my-3" placeholder="Address" aria-label="Address">
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
                                    <input type="text" id="pic_relation" name="pic_relation" value="{{ old('pic_relation') }}" class="form-control bg-light mb-3" placeholder="Relation to Patient" aria-label="Relation to Patient">
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
                                    <input type="text" id="ap_contact_number" name="ap_contact_number" value="{{ old('ap_contact_number') }}" class="form-control bg-light mb-3" placeholder="Contact Number" aria-label="Contact Number">
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
                                <div class="form-floating">
                                    <select id="room_number" name="room_number" class="form-select bg-light" aria-label="Room Number">
                                        <option value="" {{ old('room_number') == "" ? 'selected' : '' }} disabled>Select Room Number</option>
                                        @foreach($availableRooms as $room)
                                            <option value="{{ $room }}" {{ old('room_number') == $room ? 'selected' : '' }}>{{ $room }}</option>
                                        @endforeach
                                        <option value="For ER" {{ old('room_number') == "For ER" ? 'selected' : '' }}>For ER</option>
                                    </select>
                                    <label for="room_number">Room Number</label>
                                </div>
                                
                                
                                
                                
                                
                                               
                                <div class="input-group">
                                    @error('room_number')
                                    <div class="ml-2">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="buttons mt-4 flex justify-content-end">
                                <div class="a-btn">
                                    <a href="{{ route('admission.index') }}" class="btn btn-light btn-custom-style btn-cancel">Cancel</a>
                                </div>
                                <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" onclick="showConfirmationModal()">Submit</button>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body m-3">
                                    <div class="modalContent">
                                        <h1 class="text-center text-success">
                                            <span class="material-symbols-outlined bg-custom-color text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: white;">
                                                    <path d="M480-120q-33 0-56.5-23.5T400-200q0-33 23.5-56.5T480-280q33 0 56.5 23.5T560-200q0 33-23.5 56.5T480-120Zm-80-240v-480h160v480H400Z"/>
                                                </svg>
                                                
                                                
                                            </span>
                                        </h1>
                                        <div class="text-center mt-4">
                                            <h4 class="font-bold">Confirm Submission</h4>
                                            <p class="mb-4">The information entered in this form will be saved. <br> Are you sure you want to save this?</p>
                                        </div>
                                        <div class="d-flex justify-content-evenly mt-5">
                                            <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#exampleModal2">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                                    <!-- Second Modal - Password Entry -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body m-3">
                                    <div class="modalContent">
                                        <h1 class="text-center text-success">
                                            <span class="material-symbols-outlined bg-custom-color text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                                    <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z" fill="white"/>
                                                  </svg>
                                                  
                                            </span>
                                        </h1>
                                        <div class="text-center mt-4">
                                            <h4 class="font-bold">Enter Password</h4>
                                            <p class="mb-4">Password is required to save the input.</p>
                                        </div>
                                        <div class="d-flex justify-content-evenly mt-5">
                                            <form id="passwordForm">
                                                <div class="col-auto">
                                                    <label for="inputPassword2" class="visually-hidden">Password</label>
                                                    <input type="password" class="form-control text-success" id="inputPassword2" name="password" placeholder="Password" required>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-success ms-2 btn-custom-style btn-submit" id="submitWithPassword">Enter</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</section>
{{-- #9CCA9E --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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


// function submitForm() {
//     var inpatientChecked = document.querySelector('input[name="admission_type"][value="Inpatient"]');
//     var outpatientChecked = document.querySelector('input[name="admission_type"][value="Outpatient"]');
//     var roomNumberSelect = document.getElementById("room_number");

//     if (!inpatientChecked.checked && !outpatientChecked.checked) {
//         document.getElementById("error-message").style.display = "block";
//         return;
//     }

//     // Change background color of the selected radio button
//     if (inpatientChecked.checked) {
//         inpatientChecked.parentElement.style.backgroundColor = "#9CCA9E"; // Green color for Inpatient
//         outpatientChecked.disabled = true; // Disable the outpatient option
//         roomNumberSelect.querySelector('option[value="For ER"]').disabled = true; // Disable the "For ER" option
//     } else {
//         outpatientChecked.parentElement.style.backgroundColor = "#9CCA9E"; // Green color for Outpatient
//         inpatientChecked.disabled = true; // Disable the inpatient option
//         roomNumberSelect.value = "For ER"; // Set default value to "For ER"
//         roomNumberSelect.disabled = true; // Disable the dropdown selection
//     }

//     // Add a delay of 0.5 seconds before hiding the modal and submitting the form
//     setTimeout(function() {
//         document.getElementById("patientOptionsOverlay").style.display = "none"; // Hide the modal
//         document.getElementById("patientForm").submit(); // Submit the form
//     }, 300); // 300 milliseconds = 0.3 seconds
//     document.getElementById("patientForm").submit(); // Submit the form
// }


function submitForm() {
    var inpatientChecked = document.querySelector('input[name="admission_type"][value="Inpatient"]');
    var outpatientChecked = document.querySelector('input[name="admission_type"][value="Outpatient"]');
    var roomNumberSelect = document.getElementById("room_number");

    if (!inpatientChecked.checked && !outpatientChecked.checked) {
        document.getElementById("error-message").style.display = "block";
        return;
    }

    // Change background color of the selected radio button
    if (inpatientChecked.checked) {
        inpatientChecked.parentElement.style.backgroundColor = "#9CCA9E"; // Green color for Inpatient
        outpatientChecked.disabled = true; // Disable the outpatient option
        roomNumberSelect.value = ""; // Reset the room number to empty value
        roomNumberSelect.disabled = false; // Enable the dropdown selection

        // Show only available rooms for inpatients
        roomNumberSelect.querySelectorAll('option').forEach(function(option) {
            if (option.value === "For ER") {
                option.style.display = "none"; // Hide "For ER" option
            } else {
                option.style.display = "block"; // Show other available rooms
            }
        });
    } else {
        outpatientChecked.parentElement.style.backgroundColor = "#9CCA9E"; // Green color for Outpatient
        inpatientChecked.disabled = true; // Disable the inpatient option
        roomNumberSelect.value = "For ER"; // Set default value to "For ER"
        roomNumberSelect.disabled = true; // Disable the dropdown selection

        // Show only "For ER" option for outpatients
        roomNumberSelect.querySelectorAll('option').forEach(function(option) {
            if (option.value === "For ER") {
                option.style.display = "block"; // Show "For ER" option
            } else {
                option.style.display = "none"; // Hide other available rooms
            }
        });
    }

    // Add a delay of 0.5 seconds before hiding the modal and submitting the form
    setTimeout(function() {
        document.getElementById("patientOptionsOverlay").style.display = "none"; // Hide the modal
        document.getElementById("patientForm").submit(); // Submit the form
    }, 300); // 300 milliseconds = 0.3 seconds
}

    // Clear the value of the select element on page load/refresh
    window.onload = function() {
        document.getElementById("specialist").value = "";
    };


function showConfirmationModal() {
        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
        });
        myModal.show();
}
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('myForm').addEventListener('submit', function () {
        // Disable the submit button to prevent multiple form submissions
        document.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled');
    });
});

document.getElementById('submitButton').addEventListener('click', function() {
    // Trigger the modal
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
        keyboard: false
    });
    myModal.show();
});
    
</script>
@include('partials.footer ')
