<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<body>
  <div class="container-fluid">
    <div class="position-absolute top-0 end-0 mt-3 me-3">
      <button class="btn btn-light"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <path
            d="M20.6286 15.9989C20.5508 15.9052 20.4744 15.8114 20.3994 15.7209C19.3682 14.4736 18.7443 13.7208 18.7443 10.1897C18.7443 8.36156 18.3069 6.86156 17.4449 5.73656C16.8093 4.90547 15.9501 4.275 14.8176 3.80906C14.803 3.80096 14.79 3.79032 14.7791 3.77766C14.3718 2.41359 13.2571 1.5 11.9999 1.5C10.7427 1.5 9.62849 2.41359 9.22115 3.77625C9.21027 3.78845 9.19744 3.79875 9.18318 3.80672C6.54036 4.89469 5.25599 6.98203 5.25599 10.1883C5.25599 13.7208 4.63302 14.4736 3.60083 15.7195C3.52583 15.81 3.44943 15.9019 3.37161 15.9975C3.17061 16.2399 3.04326 16.5348 3.00464 16.8473C2.96601 17.1598 3.01772 17.4769 3.15365 17.7609C3.44286 18.3703 4.05927 18.7486 4.76286 18.7486H19.2421C19.9424 18.7486 20.5546 18.3708 20.8447 17.7642C20.9813 17.4801 21.0335 17.1628 20.9952 16.8499C20.9569 16.537 20.8297 16.2417 20.6286 15.9989ZM11.9999 22.5C12.6773 22.4995 13.3418 22.3156 13.9232 21.9679C14.5045 21.6202 14.9809 21.1217 15.3018 20.5252C15.3169 20.4966 15.3244 20.4646 15.3234 20.4322C15.3225 20.3999 15.3133 20.3684 15.2966 20.3407C15.2799 20.313 15.2563 20.2901 15.2281 20.2742C15.2 20.2583 15.1682 20.25 15.1358 20.25H8.8649C8.83252 20.2499 8.80066 20.2582 8.77243 20.274C8.7442 20.2899 8.72055 20.3128 8.7038 20.3405C8.68704 20.3682 8.67774 20.3997 8.67682 20.4321C8.67588 20.4645 8.68335 20.4965 8.69849 20.5252C9.01936 21.1216 9.49567 21.6201 10.0769 21.9678C10.6581 22.3155 11.3226 22.4994 11.9999 22.5Z"
            fill="#808080" />
        </svg>
      </button>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebar" class="col-lg-1 bg-success text-white rounded-end-5 text-center">
        <div class="position-sticky">
          <ul class="nav flex-column">
            <li class="nav-item mt-3">
              <a class="mt-5 btn p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="#">
                <svg width="65" height="90" viewBox="0 0 65 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M1.58026 84V65.8182H5.42436V73.32H13.228V65.8182H17.0632V84H13.228V76.4893H5.42436V84H1.58026ZM24.0767 65.8182V84H20.2326V65.8182H24.0767ZM27.2394 65.8182H31.9802L36.9873 78.0341H37.2004L42.2075 65.8182H46.9482V84H43.2195V72.1658H43.0686L38.3634 83.9112H35.8243L31.1191 72.1214H30.9681V84H27.2394V65.8182ZM59.9787 71.0472C59.9077 70.3311 59.6029 69.7747 59.0643 69.3782C58.5257 68.9817 57.7947 68.7834 56.8714 68.7834C56.2441 68.7834 55.7144 68.8722 55.2823 69.0497C54.8503 69.2214 54.5188 69.4611 54.288 69.7688C54.0631 70.0766 53.9506 70.4258 53.9506 70.8164C53.9388 71.1419 54.0069 71.426 54.1548 71.6687C54.3087 71.9113 54.5188 72.1214 54.7852 72.299C55.0515 72.4706 55.3593 72.6216 55.7085 72.7518C56.0576 72.8761 56.4305 72.9826 56.8271 73.0714L58.4606 73.462C59.2537 73.6396 59.9817 73.8763 60.6445 74.1722C61.3074 74.4682 61.8815 74.8321 62.3668 75.2642C62.8522 75.6963 63.228 76.2053 63.4943 76.7912C63.7666 77.3771 63.9057 78.0489 63.9116 78.8065C63.9057 79.9192 63.6216 80.8839 63.0593 81.7006C62.503 82.5115 61.698 83.1418 60.6445 83.5916C59.5969 84.0355 58.3333 84.2575 56.8537 84.2575C55.3859 84.2575 54.1075 84.0326 53.0185 83.5827C51.9354 83.1329 51.089 82.4671 50.4794 81.5852C49.8757 80.6974 49.5591 79.5996 49.5295 78.2915H53.2493C53.2907 78.9012 53.4653 79.4102 53.7731 79.8185C54.0868 80.221 54.504 80.5258 55.0249 80.733C55.5516 80.9342 56.1464 81.0348 56.8093 81.0348C57.4603 81.0348 58.0256 80.9401 58.505 80.7507C58.9903 80.5613 59.3661 80.2979 59.6325 79.9606C59.8988 79.6232 60.032 79.2356 60.032 78.7976C60.032 78.3892 59.9106 78.0459 59.668 77.7678C59.4312 77.4896 59.082 77.2528 58.6204 77.0575C58.1647 76.8622 57.6054 76.6847 56.9425 76.5249L54.9627 76.0277C53.4298 75.6548 52.2195 75.0719 51.3317 74.2788C50.4439 73.4857 50.003 72.4174 50.0089 71.0739C50.003 69.973 50.2959 69.0112 50.8878 68.1886C51.4856 67.3659 52.3053 66.7237 53.3469 66.2621C54.3886 65.8004 55.5723 65.5696 56.8981 65.5696C58.2475 65.5696 59.4253 65.8004 60.4315 66.2621C61.4435 66.7237 62.2307 67.3659 62.793 68.1886C63.3552 69.0112 63.6452 69.9641 63.663 71.0472H59.9787Z"
                    fill="#9CCA9E" />
                  <path
                    d="M26.1358 2.72266L26.0186 3.67188C24.378 10.8789 28.4795 14.0617 28.4795 14.0617L29.7686 12.5383C29.7686 12.5383 26.9561 10.2227 27.6592 5.08984C32.4639 6.44922 34.4561 9.37891 35.1592 10.8086C30.003 12.6555 28.5967 17.5188 25.7842 21.1164L28.2452 20.6594L28.0108 24.3273C28.0108 24.3273 33.167 23.3078 36.0967 26.4016C36.6827 25.3938 37.0342 24.1867 36.7999 22.9797L36.4483 19.675C36.0967 19.5461 35.628 19.3234 35.1592 19.0422C33.753 18.1867 32.2295 16.8039 32.2295 16.8039C31.9952 16.5813 31.9952 16.1945 32.1124 15.8898C32.3467 15.5969 32.6983 15.4563 32.9327 15.5734C32.9327 15.5734 34.2217 15.9836 35.3936 16.3586C36.6827 16.8156 37.7374 18.0344 37.8545 19.4758C37.9717 20.4602 38.2061 21.6906 38.3233 22.7922C38.5577 24.5969 37.9717 26.4016 36.917 27.7961L37.7374 29.9406H42.1905L43.0108 27.7961C41.9561 26.4016 41.3702 24.5969 41.6045 22.7922C41.7217 21.6906 41.9561 20.4602 42.0733 19.4758C42.1905 18.0344 43.2452 16.8156 44.5342 16.3586C45.7061 15.9836 46.9952 15.5734 46.9952 15.5734C47.2295 15.4563 47.5811 15.5969 47.8155 15.8898C47.9327 16.1945 47.9327 16.5813 47.6983 16.8039C47.6983 16.8039 46.1749 18.1867 44.7686 19.0422C44.2999 19.3234 43.8311 19.5461 43.4795 19.675L43.128 22.9797C42.8936 24.1867 43.2452 25.3938 43.8311 26.4016C46.7608 23.3078 51.917 24.3273 51.917 24.3273L51.6827 20.6594L54.1436 21.1164C51.3311 17.5188 49.9249 12.6555 44.7686 10.8086C45.4717 9.37891 47.4639 6.44922 52.2686 5.08984C52.9717 10.2227 50.1592 12.5383 50.1592 12.5383L51.4483 14.0617C51.4483 14.0617 55.5499 10.8789 53.9092 3.67188L53.792 2.72266C48.7178 3.58047 43.7256 6.86758 40.9014 10.0938C40.2569 10.0785 39.671 10.0328 39.0264 10.0938C34.0108 6.02149 31.8428 3.51719 26.1358 2.72266ZM29.0303 26.7766C33.5069 33.0109 18.753 32.2375 11.0292 40.7805C7.96939 44.0617 7.21705 47.3781 7.98814 50.1906C9.42135 55.3469 16.4092 58.7453 24.8702 56.6359C30.7061 55.1125 36.1202 52.8859 40.667 51.9484C44.7803 51.0109 48.1436 51.3625 50.3116 54.7609L52.1045 54.175C51.7647 49.7219 50.417 46.1125 47.8272 43.9211C45.8585 42.257 43.1514 41.343 39.5186 41.4484C36.085 41.5422 31.796 42.5383 26.4874 44.6477C23.3233 45.7609 17.5225 47.8938 14.4874 46.1242C13.421 45.468 13.0928 44.3664 13.1749 43.2766C17.2061 49.3703 27.7178 40.1125 36.4366 39.093C36.4366 39.093 37.21 28.7453 29.0303 26.7766ZM51.1319 26.7766C44.9092 28.2297 43.6202 33.1164 43.4913 39.093C46.5967 39.0695 49.3389 41.8703 49.3389 41.8703C49.3389 41.8703 46.1749 30.3156 51.1319 26.7766ZM39.378 26.9289H40.5499C40.9014 26.9289 41.253 27.257 41.253 27.6672C41.253 28.0656 40.9014 28.3938 40.5499 28.3938H39.378C39.0264 28.3938 38.6749 28.0656 38.6749 27.6672C38.6749 27.257 39.0264 26.9289 39.378 26.9289ZM46.5733 45.4094C48.1788 46.7688 49.1749 48.7844 49.7139 51.2453C47.8624 49.8391 45.6124 49.3703 43.0225 49.6047C40.1983 49.8391 36.9405 50.7766 33.378 51.9484L36.4366 49.0188C33.1202 50.6594 30.2139 51.0109 27.6006 50.425L37.0811 45.7141L29.9092 47.0266C32.6983 44.6594 41.0655 40.9094 46.5733 45.4094Z"
                    fill="#9CCA9E" />
                </svg>

              </a>
            </li>

            <li class="nav-item mt-5">
              <svg width="60" height="60" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="32.5" cy="32.5" r="32.5" fill="#C9E4CB" />
              </svg>

            </li>
            <p>STAFF NAME</p>
            <li class="nav-item mt-5">
              <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="#">
                event_available
              </a>
            </li>
            <p>Admission</p>
            <li class="nav-item mt-4">
              <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="#">
                clinical_notes
              </a>
            </li>
            <p>Patients</p>
            <li class="nav-item my-5 pt-3">
              <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="#">
                logout
              </a>
              <p>Logout</p>
            </li>
          </ul>
        </div>
      </nav>

      <div class="col-10 m-3 ms-5 mt-5 pt-4 mx-auto">
        <div class="card shadow">
          <div class="card-body m-3">
            <div class="row">
              <div class="col">
                <h6 class="text-success">I. Patient Information</h6>
                <input type="text" class="form-control py-3 bg-light" placeholder="First name and Last name" aria-label="First name">
                <input type="text" class="form-control my-3 py-3" placeholder="Contact Number" aria-label="First name">

                <h6 class="text-success">II. Person In-charge Information</h6>
                <input type="text" class="form-control py-3" placeholder="First name and Last name" aria-label="First name">
                <input type="text" class="form-control my-3 py-3" placeholder="Contact Number" aria-label="First name">

                <h6 class="text-success">III. Admit Person Information</h6>
                <input type="text" class="form-control my-3 py-3" placeholder="First name and Last name" aria-label="First name">

                <h6 class="text-success">IV. Attending Physician</h6>
                <input type="text" class="form-control my-3 py-3" placeholder="First name and Last name" aria-label="First name">
              </div>

              <div class="col">
                <h6 class="text-success">ㅤ</h6>
                <div class="row g-3">
                  <div class="col-sm-7">
                    <input type="text" class="form-control py-3" placeholder="Birth Date" aria-label="Birth Date">
                  </div>
                  <div class="col-sm">
                    <input type="number" class="form-control py-3" placeholder="Age" aria-label="Age">
                  </div>
                  <div class="col-sm">
                    <input type="text" class="form-control py-3" placeholder="Sex" aria-label="Sex">
                  </div>
                </div>
                <input type="text" class="form-control my-3 py-3" placeholder="First name and Last name" aria-label="First name">

                <h6 class="text-success">ㅤ</h6>
                <input type="text" class="form-control py-3" placeholder="Relation to patient" aria-label="First name">

                <h6 class="text-success">ㅤ</h6>
                <h6 class="text-success">ㅤ</h6>
                <h6 class="text-success">ㅤ</h6>
                <input type="text" class="form-control mt-5 py-3" placeholder="Contact Number" aria-label="First name">

                <h6 class="text-success">ㅤ</h6>
                <br>
                <input type="text" class="form-control py-3" placeholder="Contact Number" aria-label="First name">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>