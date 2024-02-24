<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title !== "" ? $title : 'HIMS System' }}</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<style> 
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
/* Style for the scrollbar track */

::-webkit-scrollbar {
    width: 8px; /* Width of the scrollbar */
}

/* Style for the scrollbar thumb */
::-webkit-scrollbar-thumb {
    background-color: #888; /* Color of the scrollbar thumb */
    border-radius: 6px; /* Border radius of the scrollbar thumb */
}

/* Style for the scrollbar track on hover */
::-webkit-scrollbar-thumb:hover {
    background-color: #555; /* Color of the scrollbar thumb on hover */
}

/* Style for the scrollbar track when scrolling */
::-webkit-scrollbar-thumb:active {
    background-color: #333; /* Color of the scrollbar thumb when scrolling */
}

/* .background-with-image {
    background-image: url('/storage/image/snams-logo.png');
    background-repeat: no-repeat;
    background-size: 40%; 
    background-position: 50% 50%; 
    
} */







body,h1,h2,h3,h4,h5,p, span  {
    font-family: "Inter", sans-serif !important;
    
}

a,
h1,
h2,
h3,
h4,
h5,
span {
    text-decoration: none;
}
/* Override Bootstrap's default checkbox styles for checked state */
.form-check-input:checked {
    background-color: #418363;
    border-color: #418363;
}

.modal-backdrop {
    background-color: #043c20 !important;
}

.btn-custom-style {
    width: 102.95px;
    height: 38.67px;
}
.btn-submit {
    background: #418363;
    color: #FFFFFF;

}
.btn-cancel {
    background: #E7E7E7;
    color: #717171;

}
.a-btn {
    display: flex;
    align-items: center;
    justify-content: center;
}

.bg-custom-color {
    background-color: #418363;
}
.text-custom-color {
    color: #418363;
}

</style>
<body class="{{ isset($bgColor) ? $bgColor : 'bg-custom-500' }} min-h-screen background-with-image"> 
    {{-- pt-12 pb-6 px-2 --}}
    <x-messages />
    <x-error />

