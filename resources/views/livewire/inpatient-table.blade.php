<!-- resources/views/livewire/inpatient-table.blade.php -->

<div>
    <h2 class="text-2xl font-bold mb-4">Inpatient Patients</h2>
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
                    <td class="border px-4 py-2">{{ $patient->id }}</td>
                    <td class="border px-4 py-2">{{ $patient->first_name }} {{ $patient->last_name }}</td>
                    <td class="border px-4 py-2">{{ $patient->specialist }}</td>
                    <td class="border px-4 py-2">{{ $patient->room_number }}</td>
                    <td class="border px-4 py-2">{{ $patient->created_at }}</td>
                    <td class="border px-4 py-2">{{ $patient->discharge_date }}</td>
                    <td class="border px-4 py-2">
                        <a href="/patient/{{ $patient->id }}" class="bg-sky-600 text-white px-4 py-1 rounded">view</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
