@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-black text-center">Patient List</h1>
    </a>
</header>
<section class="mt-10">
    <div class="overflow-x-auto relative">
        <table class="w-96 mx-auto text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope=col class="py-3 px-6">

                    </th>
                    <th scope=col class="py-3 px-6">
                        First Name
                    </th>
                    <th scope=col class="py-3 px-6">
                        Last Name
                    </th>
                    <th scope=col class="py-3 px-6">
                        email
                    </th>
                    <th scope=col class="py-3 px-6">
                        age
                    </th>
                    <th scope="col">

                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
                <tr class="bg-gray-800 border-b text-white">
                    @php $default_profile = "https://api.dicebear.com/7.x/initials/svg?seed=".$student->first_name."+".$student->last_name; @endphp
                    <td>
                        <img src="{{  $student->student_image  ? asset("storage/student/thumbnail/" .$student->student_image) : $default_profile}}">
                    </td>
                    <td class="py-4 px-6">
                        {{  $student->first_name }}
                    </td>
                    <td class="py-4 px-6">
                        {{  $student->last_name }}
                    </td>
                    <td class="py-4 px-6">
                        {{  $student->email }}
                    </td>
                    <td class="py-4 px-6">
                        {{  $student->age }}
                    </td>
                    <td class="py-4 px-6">
                        <a href="/student/{{$student->id}}" class="bg-sky-600 text-white px-4 py-1 rounded">view</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-auto pt-6 p-4">
            {{$students->links()}}

        </div>
    </div>
</section>

@include('partials.footer')

{{-- <ul>
    @foreach ($students as $student)

    //<li>{{  $student->first_name }} {{  $student->last_name }} {{ $student->age }}</li>
    <li>{{  $student->gender }} {{  $student->gender_count }}</li>

    @endforeach
</ul> --}}