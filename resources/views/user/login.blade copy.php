@include('partials.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    /* Default styles */
    .container-fluid {
    height: 100vh;
}

.card {
    width: 100%;
}

.card img {
    width: 100%;
    max-width: 28.5rem;
    height: auto;
}

/* Media queries */
@media all and (min-width: 1024px) and (max-width: 1280px) {
    /* Styles for screens between 1024px and 1280px */
}

@media all and (min-width: 768px) and (max-width: 1024px) {
     img {
        width: 10rem !important;
    }
    .col-6 h3 {
        font-size: 1.5em;
    }
    .row > div {
        /* Remove the col-6 class */
        width: 100%; /* Set the width to 100% to make it a full-width column */
    }
/* Show the image */
.row > .col-6 > img {
    display: block; /* Make sure the image is displayed */
    width: 80% !important; /* Set the width to 80% */
    max-width: 100%; /* Ensure the image does not exceed its container's width */
    margin: 0 auto; /* Center the image horizontally */
    margin-bottom: 2rem;
}


    /* Define font-size for text elements within the remember-forgot div */
    .remember-forgot label,
    .remember-forgot a {
        font-size: 0.8em; /* Adjust font size as needed */
    }
    
    /* Define font-size for the button */
    .d-grid button {
        font-size: 0.8m; /* Adjust font size as needed */
    }
}

@media all and (min-width: 480px) and (max-width: 768px) {
     img {
        width: 10rem !important;
    }
    .col-6 h3 {
        font-size: 1.5em;
    }
    .row > div {
        /* Remove the col-6 class */
        width: 100%; /* Set the width to 100% to make it a full-width column */
    }
        .row > .col-6 > img {
        display: none; /* Hide the img element */
    }
    /* Define font-size for text elements within the remember-forgot div */
    .remember-forgot label,
    .remember-forgot a {
        font-size: 0.8em; /* Adjust font size as needed */
    }
    
    /* Define font-size for the button */
    .d-grid button {
        font-size: 0.8m; /* Adjust font size as needed */
    }
}

@media all and (max-width: 480px) {
     img {
        width: 10rem !important;
    }
    .col-6 h3 {
        font-size: 1.5em;
    }
    .row > div {
        /* Remove the col-6 class */
        width: 100%; /* Set the width to 100% to make it a full-width column */
    }
        .row > .col-6 > img {
        display: none; /* Hide the img element */
    }
    /* Define font-size for text elements within the remember-forgot div */
    .remember-forgot label,
    .remember-forgot a {
        font-size: 0.6em; /* Adjust font size as needed */
    }
    
    /* Define font-size for the button */
    .d-grid button {
        font-size: 16px; /* Adjust font size as needed */
    }
    /* Target all input elements */
input {
    /* Adjust the width and height of input elements */
    width: 100%;
    height: 1rem; /* Adjust height as needed */
    /* Additional styling */
    padding: 0.5rem; /* Add padding for better visual appearance */
    border: 1px solid #ccc; /* Add border for better visual appearance */
    border-radius: 5px; /* Add border radius for rounded corners */
    font-size: 16px; /* Adjust font size as needed */
    /* Add any other styles as desired */
}
/* Target the placeholder text in input elements */
input::placeholder {
    /* Adjust the placeholder text color */
    color: #999; /* Example color, adjust as needed */
    /* Additional styling */
    font-size: 0.5em; /* Adjust font size as needed */
    /* Add any other styles as desired */
}
button {
    /* Adjust the width and height of input elements */
    width: 100%;
    height: 1rem; /* Adjust height as needed */
    /* Additional styling */
    padding: 0.5rem; /* Add padding for better visual appearance */
    border: 1px solid #ccc; /* Add border for better visual appearance */
    border-radius: 5px; /* Add border radius for rounded corners */
        font-size: 0.3em !important; /* Adjust font size as needed */
    /* Add any other styles as desired */
}

}
    
    @media all and (max-width: 390px) {
     img {
        width: 10rem !important;
    }
    .col-6 h3 {
        font-size: 1em;
    }
    .row > div {
        /* Remove the col-6 class */
        width: 100%; /* Set the width to 100% to make it a full-width column */
    }
        .row > .col-6 > img {
        display: none; /* Hide the img element */
    }
    /* Define font-size for text elements within the remember-forgot div */
    .remember-forgot label,
    .remember-forgot a {
        font-size: 0.4em; /* Adjust font size as needed */
    }
    
    /* Define font-size for the button */
    .d-grid button {
        font-size: 0.2em; /* Adjust font size as needed */
    }
    input::placeholder {
    /* Adjust the placeholder text color */
    color: #999; /* Example color, adjust as needed */
    /* Additional styling */
    font-size: 0.4em; /* Adjust font size as needed */
    /* Add any other styles as desired */
}

}
</style>

    <main class="bg-white">
        <section class="">
            <form action="/login/process" method="POST" class="flex flex-col">
                @csrf

                <div class="container-fluid vh-100 d-flex justify-content-center align-items-center bg-success bg-opacity-75">
                    <div class="col-8">
                      <div class="card shadow p-5">
                        <div class="card-body p-3">
                          <div class="row">
                            <div class="col-6">
                              <img src="{{ asset('storage/image/login-bg.png') }}" alt="Imaging Image" class="img-fluid">
                
                            </div>
                            <div class="col-6">
                              <h3 class="text-center fw-bold pb-3">
                                Hospital Information Management System
                              </h3>
                
                              <input type="email" name="email" class="form-control mb-2" placeholder="Email Address"/>
                              @error('email')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                            @enderror
                              <input type="password" name="password" class="form-control mb-2" placeholder="Password" />
                              @error('password')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                            @enderror
                
                              <div class="remember-forgot d-flex align-items-center justify-content-between mt-3">
                                <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="rememberMe" />
                                  <label class="form-check-label mb-3" htmlFor="rememberMe">
                                    Remember me
                                  </label>
                                </div>
                                <a class="form-check-label mb-3 text-decoration-none" htmlFor="rememberMe">
                                  Forgot Password?
                                </a>
                              </div>
                
                              <div class="d-grid gap-2">
                                <button class="btn btn-success" type="submit">
                                  Sign In
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </form>
        </section>
    </main>
@include('partials.footer')
