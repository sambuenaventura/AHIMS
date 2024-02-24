@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])
<style>
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
        <h1 class="text-4xl font-bold text-black text-center pt-24">Edit {{$patient->first_name}} {{$patient->last_name}}</h1>
    </a>
</header> --}}
<main class="bg-custom-901 mt-20">

    <section id="hero">

            <div class="hero-content">
            <div class="left">
                <form action="/patient/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="left-1">
                        <h1>View Patient</h1>
                        <h3>I. Patient Information</h3>
                        <p>
                            <label for="first_name">First Name:</label>
                            <input type="text" id="first_name" name="first_name" value="{{$patient->first_name}}" />
                            @error('first_name')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </p>
                        <p>
                            <label for="last_name">Last Name:</label>
                            <input type="text" id="last_name" name="last_name" value="{{$patient->last_name}}" />
                            @error('last_name')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </p>
                        <p>
                            <label for="date_of_birth">Date of Birth:</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" value="{{$patient->date_of_birth}}" />
                            @error('date_of_birth')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </p>
                        <p>
                            <label for="gender">Sex:</label>
                            <select name="gender">
                                <option value="" {{ old('gender', $patient->gender) == "" ? 'selected' : '' }}></option>
                                <option value="Male" {{ old('gender', $patient->gender) == "Male" ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $patient->gender) == "Female" ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </p>
                        
                        <p>
                            <label for="contact_number">Contact Number:</label>
                            <input type="number" id="contact_number" name="contact_number" value="{{$patient->contact_number}}" />
                            @error('contact_number')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </p>
                        <p>
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" value="{{$patient->address}}" />
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
                            <input type="text" id="pic_first_name" name="pic_first_name" value="{{$patient->pic_first_name}}" />
                            @error('pic_first_name')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </p>
                        <p>
                            <label for="pic_last_name">Last Name:</label>
                            <input type="text" id="pic_last_name" name="pic_last_name" value="{{$patient->pic_last_name}}" />
                            @error('pic_last_name')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </p>
                        <p>
                            <label for="pic_relation">Relation to patient:</label>
                            <input type="text" id="pic_relation" name="pic_relation" value="{{$patient->pic_relation}}" />
                            @error('pic_relation')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </p>
                        <p>
                            <label for="pic_contact_number">Contact Number:</label>
                            <input type="number" id="pic_contact_number" name="pic_contact_number" value="{{$patient->pic_contact_number}}" />
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
                            <input type="text" id="ap_first_name" name="ap_first_name" value="{{$patient->ap_first_name}}" />
                            @error('ap_first_name')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </p>
                        <p>
                            <label for="ap_last_name">Last Name:</label>
                            <input type="text" id="ap_last_name" name="ap_last_name" value="{{$patient->ap_last_name}}" />
                            @error('ap_last_name')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </p>
                        <p>
                            <label for="ap_contact_number">Contact Number:</label>
                            <input type="number" id="ap_contact_number" name="ap_contact_number" value="{{$patient->ap_contact_number}}" />
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
                            <input type="text" id="specialist" name="specialist" value="{{$patient->specialist}}" />
                            @error('specialist')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </p>
                    </div>
                <button type="submit" class="bg-custom-50 hover:bg-custom-50-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Update</button>
            </form>
            <form action="/patient/{{$patient->patient_id}}" method="POST">
                @method('delete')
                @csrf 
                <button type="submit" class="w-full mt-2 bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Delete</button>
            </form>
            </div>
            <div class="right">
            </div>
            </div>

    </section>

</main>
@include('partials.footer ')
