@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-black text-center">Patient List</h1>
    </a>
</header>
<section class="mt-10">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-bold mb-4">Example Datatable</h2>
    <table id="example" class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Patient Name</th>
                <th class="px-4 py-2">Patient ID</th>
                <th class="px-4 py-2">Gender</th>
                <th class="px-4 py-2">Age</th>
                <th class="px-4 py-2">Height</th>
                <th class="px-4 py-2">Weight</th>
                <th class="px-4 py-2">Blood</th>
                <th class="px-4 py-2">Phone Number</th>
                <th class="px-4 py-2">Address</th>
                <th class="px-4 py-2">Specialist</th>
                <th class="px-4 py-2">Room Number</th>
                <th class="px-4 py-2">Admission Date</th>
                <th class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)

            <tr>
                <td class="border px-4 py-2">{{  $student->first_name }} {{  $student->last_name }}</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">{{  $student->age }}</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
            </tr>
            @endforeach
            <!-- Add more rows as needed -->
        </tbody>
    </table>
    
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            // Add any customization options here
        });
    });
</script>
</section>

@include('partials.footer')

{{-- <ul>
    @foreach ($students as $student)

    //<li>{{  $student->first_name }} {{  $student->last_name }} {{ $student->age }}</li>
    <li>{{  $student->gender }} {{  $student->gender_count }}</li>

    @endforeach
</ul> --}}