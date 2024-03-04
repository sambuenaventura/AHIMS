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
     <script src="https://cdn.tailwindcss.com"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

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



        /* Extend Theme Configuration */
        .bg-custom-50 { background-color: #418363; }
        .bg-custom-51 { background-color: #F9F8F5; }
        .bg-custom-52 { background-color: #F6F6F6; }
        .bg-custom-100 { background-color: #5DA07F; }
        .bg-custom-101 { background-color: #DCEDDD; }
        .bg-custom-102 { background-color: #9CCA9E; }
        .bg-custom-103 { background-color: #D8DFD8; }
        .bg-custom-150 { background-color: #A4DEC4; }
        .bg-custom-200 { background-color: #418363; }
        .bg-custom-300 { background-color: #E7E7E7; }
        .bg-custom-400 { background-color: #5C9F7F; }
        .bg-custom-500 { background-color: #91C794; }
        .bg-custom-600 { background-color: #00AB98; }
        .bg-custom-700 { background-color: #F9F8F5; }
        .bg-custom-800 { background-color: #1f2937; }
        .bg-custom-900 { background-color: #111827; }
        .bg-custom-901 { background-color: #D8DFD8; }
        /* Define Custom Colors */
        .text-custom { color: #418363; }



body,h1,h2,h3,h4,h5,p, span  {
    font-family: "Inter", sans-serif !important;
    
}

/* Target only the <h4> elements inside .card-body */
.card-body h4 {
    font-size: 1.5rem !important; /* Adjust the font size as needed */
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
h1,h2,h3,h4,h5,h6,p, ul {
    margin-bottom: 1rem !important;
}
.btn-custom-style {
    width: 102.95px;
    height: 38.67px;
    font-size: 0.8750em;

}
.btn-submit {
    background: #418363 !important;
    color: #FFFFFF !important;
    font-weight: 700;
    font-size: 0.8750em;

}

a,button {
    transition: background-color 0.3s ease, color 0.3s ease; /* Transition for background-color and color */

}

a:not(.btn-cancel, .d-flex, .flex-row, .gap-2, .text-success, .font-bold):hover {
    /* Add your hover styles here */
    background-color: #3b7057 !important; /* Hover background color */
    color: white; /* Hover text color */
}

button:hover {
    background-color:   #3b7057 !important; /* Hover background color */
    color: white; /* Hover text color */
}

.decline:hover {
    background-color:   #a32532 !important; /* Hover background color */

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
.notif:hover {
    background-color: #bdbdbd !important; /* Hover background color */

}

.btn-cancel:hover {
    background-color: #bdbdbd !important; /* Hover background color */

}

.bg-custom-color {
    background-color: #418363;
}
.text-custom-color {
    color: #418363;
}
.nav-link {
    border-radius: 0.25rem;
    padding: 0.75rem 0.5rem !important;
    font-weight: 700;
    color: #418363 !important;
    border-bottom: none !important;
    font-size: 0.95em;
}

.nav-link:hover {
    background-color: #418363;
    border-radius: 0.35rem;
    color: white !important;
    font-weight: 700;
    padding: 0.75rem 0.5rem;

}
.active {
    color: white !important;

}
.btn-succes{
    background-color: #418363 !important;

}


/* Style for the datePlaceholder */
#datePlaceholder {
  color: grey; /* Set text color to grey */
  font-size: 0.75em !important; /* Adjust font size as needed */
}
hr {
    margin-bottom: 2rem !important;
}
/* Style for the timePlaceholder */
#timePlaceholder {
  font-size: 1.9em !important; /* Adjust font size as needed */
}

.flex-col h1 {
    font-size: 2rem;
}

td {
    width: 50px;
    height: 50px;
}
td {
    vertical-align: middle;
}
.left-top-1 h4 {
    font-size: 1.5em;
}
.small, small {
    font-size: .875em !important;
}
/* .vertical-center {
    vertical-align: middle;
} */
</style>
<body class="{{ isset($bgColor) ? $bgColor : 'bg-custom-500' }} min-h-screen background-with-image"> 
    {{-- pt-12 pb-6 px-2 --}}
    <x-messages />
    <x-error />

