let currentStep = 1;

function nextStep() {
    document.getElementById(`step${currentStep}`).style.display = "none";
    currentStep++;
    if (currentStep === 3) {
        document.getElementById(`step${currentStep}`).style.display = "block";
    } else {
        document.getElementById(`step${currentStep}`).style.display = "block";
    }
}

function prevStep() {
    document.getElementById(`step${currentStep}`).style.display = "none";
    currentStep--;
    if (currentStep === 3) {
        document.getElementById(`step${currentStep}`).style.display = "block";
    } else {
        document.getElementById(`step${currentStep}`).style.display = "block";
    }
}

function submitForm() {
    // Handle form submission logic
    alert("Form submitted!");
}

// document.addEventListener("DOMContentLoaded", function () {
//     // Function to enable or disable input based on checkbox state
//     function handleCheckboxChange(checkboxId, inputId) {
//         var checkbox = document.getElementById(checkboxId);
//         var input = document.getElementById(inputId);

//         // Function to update input state based on checkbox state
//         function updateInputState() {
//             input.disabled = !checkbox.checked;
//         }

//         // Set initial state
//         updateInputState();

//         // Add an event listener to the checkbox
//         checkbox.addEventListener("change", updateInputState);
//     }

//     // Example for hypertension checkbox
//     handleCheckboxChange("hypertension", "hypertension_years");
//     handleCheckboxChange("diabetes", "diabetes_years");
//     handleCheckboxChange("asthma", "asthma_years");
//     handleCheckboxChange("previous_hospitalization", "hospitalization_details");
//     handleCheckboxChange("allergies", "allergies_details");
//     handleCheckboxChange("cvd", "cvd_year");
//     handleCheckboxChange("stroke", "stroke_year");
//     handleCheckboxChange(
//         "mental_neuropsychiatric_illness",
//         "mental_neuropsychiatric_illness_details"
//     );
//     handleCheckboxChange("medications", "medications_details");
//     handleCheckboxChange("others_checkbox", "others_details");
//     handleCheckboxChange("family_others_checkbox", "family_others_details");
// });

// Function to show the specified step and hide all others

document.addEventListener("DOMContentLoaded", function () {
    // Function to enable or disable input based on checkbox state
    function handleCheckboxChange(checkboxId, inputId) {
        var checkbox = document.getElementById(checkboxId);
        var input = document.getElementById(inputId);

        // Function to update input state based on checkbox state
        function updateInputState() {
            input.disabled = !checkbox.checked;
            if (!checkbox.checked) {
                input.value = ""; // Clear input value when checkbox is unchecked
            }
        }

        // Set initial state
        updateInputState();

        // Add an event listener to the checkbox
        checkbox.addEventListener("change", updateInputState);
    }

    // Example for others checkbox
    handleCheckboxChange("others_checkbox", "others_details");
    handleCheckboxChange("family_others_checkbox", "family_others_details");
});

function showStep(stepId) {
    // Hide all steps
    document.querySelectorAll(".step").forEach(function (step) {
        step.style.display = "none";
    });

    // Show the specified step
    document.getElementById(stepId).style.display = "block";
}

function toggleInput(checkbox, inputId) {
    var input = document.getElementById(inputId);
    if (!checkbox.checked) {
        input.value = ""; // Clear the input value if checkbox is unchecked
    }
    input.disabled = !checkbox.checked; // Disable the input based on checkbox state
}
