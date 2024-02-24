@include('partials.header', ['bgColor' => 'bg-custom-51'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-black text-center">Patient List</h1>
    </a>
</header>
<section class="mt-10">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h2 class="text-2xl font-bold mb-4">Patients</h2>
        <ul id="patientTabs" class="flex mb-8 text-center">
            <li class="mr-6 p-2">
                <a href="{{ route('admission.view') }}" onclick="changeAdmissionType('all')">
                    All Patients
                </a>
            </li>
            <li class="mr-6 p-2">
                <a href="{{ route('admission.view', ['admissionType' => 'inpatient']) }}" onclick="changeAdmissionType('inpatient')">
                    Inpatient
                </a>
            </li>
            <li class="mr-6 p-2">
                <a href="{{ route('admission.view', ['admissionType' => 'outpatient']) }}" onclick="changeAdmissionType('outpatient')">
                    Outpatient
                </a>
            </li>
        </ul>
    <table id="example" class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Patient ID</th>
                <th class="px-4 py-2">Patient Name</th>
                <th class="px-4 py-2">Specialist</th>
                <th class="px-4 py-2">Room Number</th>
                <th class="px-4 py-2">Admission Date</th>
                <th class="px-4 py-2">Discharge Date</th>
                <th class="px-4 py-2">Edit</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($patients as $patient)

            <tr>
                <td class="border px-4 py-2">{{  $patient->id }}</td>
                <td class="border px-4 py-2">{{  $patient->first_name }} {{  $patient->last_name }}</td>
                <td class="border px-4 py-2">{{  $patient->specialist }}</td>
                <td class="border px-4 py-2">{{  $patient->room_number }} </td>
                <td class="border px-4 py-2">{{  $patient->created_at }}</td>
                <td class="border px-4 py-2">{{  $patient->discharge_date }}</td>
                <td class="border px-4 py-2">
                    <a href="/patient/{{$patient->id}}" class="bg-sky-600 text-white px-4 py-1 rounded">view</a>
                </td>            
            </tr>
            @endforeach
            <!-- Add more rows as needed -->
        </tbody>

    </table>
    {{-- <div class="pagination">
        {{ $patients->links() }}
    </div> --}}
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            //order: [[1, 'asc']], // Sort by the second column (Patient ID) in ascending order
        });
    });
</script>
</section>

@include('partials.footer')