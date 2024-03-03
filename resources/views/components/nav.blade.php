<style>
  span {
    font-size: 0.8750em;
    
  }
  </style>
  
  <nav class="bg-white p-4 flex justify-between">
    <!-- Left side of the navbar -->
    <div class="flex items-center">
      <!-- Navbar brand/logo -->
      <a class="text-xl font-bold text-gray-800" href="#">HIMS</a>
    </div>
  
    <!--navbar -->
    <div class="flex items-center">
      <!-- Notification icon -->
          
  
  
          {{-- <a href="/add/patient" class="btn btn-success btn-custom-style btn-submit ">+ Add Patient</a> --}}
            {{-- <a href="/add/patient" class="btn btn-success btn-submit mr-4">+ Add Patient</a> --}}
            
            <a class="btn btn-success ms-2 btn-custom-style btn-submit mr-4{{ auth()->user()->role !== 'admission' ? ' d-none' : '' }}" style="width: auto;" href="{{ auth()->user()->role === 'admission' ? '/add/patient' : '#' }}">
              {{ auth()->user()->role === 'admission' ? '+ Add Patient' : ''}}
          </a>
          
          <a class="btn btn-success ms-2 btn-custom-style btn-submit mr-4{{ auth()->user()->role !== 'admin' ? ' d-none' : '' }}" style="width: auto;" href="{{ auth()->user()->role === 'admin' ? '/add/specialist' : '#' }}">
            {{ auth()->user()->role === 'admin' ? '+ Add Specialist' : ''}}
        </a>
          
  
  
      <a href="#" class="text-gray-800 hover:text-gray-600">
      <button class="btn btn-light"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.6286 15.9989C20.5508 15.9052 20.4744 15.8114 20.3994 15.7209C19.3682 14.4736 18.7443 13.7208 18.7443 10.1897C18.7443 8.36156 18.3069 6.86156 17.4449 5.73656C16.8093 4.90547 15.9501 4.275 14.8176 3.80906C14.803 3.80096 14.79 3.79032 14.7791 3.77766C14.3718 2.41359 13.2571 1.5 11.9999 1.5C10.7427 1.5 9.62849 2.41359 9.22115 3.77625C9.21027 3.78845 9.19744 3.79875 9.18318 3.80672C6.54036 4.89469 5.25599 6.98203 5.25599 10.1883C5.25599 13.7208 4.63302 14.4736 3.60083 15.7195C3.52583 15.81 3.44943 15.9019 3.37161 15.9975C3.17061 16.2399 3.04326 16.5348 3.00464 16.8473C2.96601 17.1598 3.01772 17.4769 3.15365 17.7609C3.44286 18.3703 4.05927 18.7486 4.76286 18.7486H19.2421C19.9424 18.7486 20.5546 18.3708 20.8447 17.7642C20.9813 17.4801 21.0335 17.1628 20.9952 16.8499C20.9569 16.537 20.8297 16.2417 20.6286 15.9989ZM11.9999 22.5C12.6773 22.4995 13.3418 22.3156 13.9232 21.9679C14.5045 21.6202 14.9809 21.1217 15.3018 20.5252C15.3169 20.4966 15.3244 20.4646 15.3234 20.4322C15.3225 20.3999 15.3133 20.3684 15.2966 20.3407C15.2799 20.313 15.2563 20.2901 15.2281 20.2742C15.2 20.2583 15.1682 20.25 15.1358 20.25H8.8649C8.83252 20.2499 8.80066 20.2582 8.77243 20.274C8.7442 20.2899 8.72055 20.3128 8.7038 20.3405C8.68704 20.3682 8.67774 20.3997 8.67682 20.4321C8.67588 20.4645 8.68335 20.4965 8.69849 20.5252C9.01936 21.1216 9.49567 21.6201 10.0769 21.9678C10.6581 22.3155 11.3226 22.4994 11.9999 22.5Z" fill="#808080"></path>
          </svg>
        </button>    
      </a>
  
      <!-- Sample text on the most right -->
    </div>
  </nav>
  {{-- 
  <nav id="sidebar" class="col-lg-1 bg-success text-white rounded-end-5 text-center position-fixed top-0" style="height: 100vh;">
      <div class="position-sticky">
            <ul class="nav flex-column">
              <li class="nav-item mt-3">
                <a class="btn p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ auth()->user()->role === 'admission' ? '/admission-dashboard' : (auth()->user()->role === 'nurse' ? '/nurse-dashboard' : '#') }}">
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
                  <a class="btn p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="#" disabled>
                      <svg width="60" height="60" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="32.5" cy="32.5" r="32.5" fill="#C9E4CB" />
  
                      </svg>
                  </a>
              </li>       
              <p>
                  {{ (auth()->user()->role === 'admission' ? auth()->user()->first_name : '') . 
                     (auth()->user()->role === 'nurse' ? auth()->user()->first_name : '') .
                     (auth()->user()->role === 'medtech' ? auth()->user()->first_name : '') }}
              </p>
                          
              <li class="nav-item mt-4">
                <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ auth()->user()->role === 'admission' ? '/admission-dashboard' : (auth()->user()->role === 'nurse' ? '/nurse-patients' : (auth()->user()->role === 'medtech' ? '/medtech-dashboard' : '#')) }}">
                  event_available
              </a>
              
                
              </li>
              <a class="text-decoration-none text-white">
                {{ auth()->user()->role === 'admission' ? 'Admission' : (auth()->user()->role === 'nurse' ? 'Patients' : (auth()->user()->role === 'medtech' ? 'MedTech' : 'Fallback Text')) }}
            </a>
            
            <li class="nav-item mt-3">
              <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ auth()->user()->role === 'admission' ? '/admission-patients' : (auth()->user()->role === 'nurse' ? '/nurse/lab-services' : (auth()->user()->role === 'medtech' ? '/medtech-requests' : '#')) }}">
                  clinical_notes
              </a>
          </li>
          
            <a class="text-decoration-none text-white">
              {!! auth()->user()->role === 'admission' ? 'Patients' : (auth()->user()->role === 'nurse' ? 'Laboratory<br>Services' : (auth()->user()->role === 'medtech' ? 'Requests' : 'Fallback Text')) !!}
            </a>           
            
            <li class="nav-item mt-3">
                <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ auth()->user()->role === 'admission' ? '/admission-patients' : (auth()->user()->role === 'nurse' ? '/nurse-laboratory-services' : (auth()->user()->role === 'medtech' ? '/medtech-results' : '#')) }}">
                    local_hospital
                </a>
            </li>
            
            <a class="text-decoration-none text-white">
              {!! auth()->user()->role === 'nurse' ? 'Imaging<br>Services' : (auth()->user()->role === 'medtech' ? 'Results' : (auth()->user()->role === 'radtech' ? 'Results' : 'Fallback Text')) !!}
            </a>  
              <li class="nav-item my-5">
                  <form action="/logout" method="POST">
                  @csrf
                      <button class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="#">
                          logout </button>
                      <p>Logout</p>
                  </form>
              </li>
          </ul>
      </div>
  </nav> --}}
  
  
  <nav id="sidebar" class="col-lg-1 bg-success text-white rounded-end-5 text-center position-fixed top-0" style="height: 100vh;">
    <div class="position-sticky">
          <ul class="nav flex-column">
            <li class="nav-item mt-3">
              <a class="btn p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ 
                auth()->user()->role === 'admission' ? '/admission-dashboard' : 
                (auth()->user()->role === 'nurse' ? '/nurse-dashboard' : 
                (auth()->user()->role === 'medtech' ? '/medtech-dashboard' :
                (auth()->user()->role === 'radtech' ? '/radtech-dashboard' :
                (auth()->user()->role === 'admin' ? '/admin-dashboard' : '#'))))
            }}">
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
                <a class="btn p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="#" disabled>
                    <svg width="60" height="60" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="32.5" cy="32.5" r="32.5" fill="#C9E4CB" />
  
                    </svg>
                </a>
            </li>       
            <p>
                {{ (auth()->user()->role === 'admission' ? auth()->user()->first_name : '') . 
                   (auth()->user()->role === 'nurse' ? auth()->user()->first_name : '') .
                   (auth()->user()->role === 'medtech' ? auth()->user()->first_name : '') .
                   (auth()->user()->role === 'radtech' ? auth()->user()->first_name : '') .
                   (auth()->user()->role === 'admin' ? auth()->user()->first_name : '') }}
            </p>
            @if(auth()->check() && in_array(auth()->user()->role, ['admission', 'nurse', 'medtech', 'radtech']))

            <li class="nav-item mt-4">
              <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ auth()->user()->role === 'admission' ? '/admission-dashboard' : 
              (auth()->user()->role === 'nurse' ? '/nurse-patients' : 
              (auth()->user()->role === 'medtech' ? '/medtech-dashboard' : 
              (auth()->user()->role === 'radtech' ? '/radtech-dashboard' : '#'))) }}">
                  event_available
              </a>
          </li>

            <a class="text-decoration-none text-white">
                {{ auth()->user()->role === 'admission' ? 'Admission' : 
                (auth()->user()->role === 'nurse' ? 'Patients' : 
                (auth()->user()->role === 'medtech' ? 'MedTech' : 
                (auth()->user()->role === 'radtech' ? 'RadTech' : 'Fallback Text'))) }}
            </a>
    
            <li class="nav-item mt-3">
                <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ auth()->user()->role === 'admission' ? '/admission-patients' :
                (auth()->user()->role === 'nurse' ? '/nurse/lab-services' :
                  (auth()->user()->role === 'medtech' ? '/medtech-requests' :
                  (auth()->user()->role === 'radtech' ? '/radtech-requests' : '#'))) }}">
                    clinical_notes
                </a>
            </li>

          <a class="text-decoration-none text-white">
            {!! auth()->user()->role === 'admission' ? 'Patients' : 
            (auth()->user()->role === 'nurse' ? 'Laboratory<br>Services' : 
            (auth()->user()->role === 'medtech' ? 'Requests' :
            (auth()->user()->role === 'radtech' ? 'Requests' :
             'Fallback Text'))) !!}
          </a>
          @endif

          @if(auth()->check() && in_array(auth()->user()->role, ['nurse', 'medtech', 'radtech']))
            <li class="nav-item mt-3">
              <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ auth()->user()->role === 'nurse' ? '/nurse/imaging-services' : 
              (auth()->user()->role === 'medtech' ? '/medtech-results' : 
              (auth()->user()->role === 'radtech' ? '/radtech-results' : '#')) }}">
                  local_hospital
              </a>
          </li>
          <a class="text-decoration-none text-white">
              {{-- {{ auth()->user()->role === 'nurse' ? 'Imaging Services' : (auth()->user()->role === 'medtech' ? 'Results' : (auth()->user()->role === 'radtech' ? 'Results' : 'Fallback Text')) }} --}}
              {!! auth()->user()->role === 'nurse' ? 'Imaging<br>Services' : 
              (auth()->user()->role === 'medtech' ? 'Results' : 
              (auth()->user()->role === 'radtech' ? 'Results' : 'Fallback Text')) !!}

            </a>
        @endif
      
{{-- ADMIN SIDEBAR --}}

      {{-- Doctors --}}
      @if(auth()->user()->role === 'admin')
        <li class="nav-item mt-3">
            <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ auth()->user()->role === 'admin' ? '/doctors-list' : '#' }}">

              <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path fill="white" d="M540-80q-108 0-184-76t-76-184v-23q-86-14-143-80.5T80-600v-240h120v-40h80v160h-80v-40h-40v160q0 66 47 113t113 47q66 0 113-47t47-113v-160h-40v40h-80v-160h80v40h120v240q0 90-57 156.5T360-363v23q0 75 52.5 127.5T540-160q75 0 127.5-52.5T720-340v-67q-35-12-57.5-43T640-520q0-50 35-85t85-35q50 0 85 35t35 85q0 39-22.5 70T800-407v67q0 108-76 184T540-80Zm220-400q17 0 28.5-11.5T800-520q0-17-11.5-28.5T760-560q-17 0-28.5 11.5T720-520q0 17 11.5 28.5T760-480Zm0-40Z"/>
              </svg>
              
              
            </a>
        </li>
        <a class="text-decoration-none text-white">
            {!! auth()->user()->role === 'admin' ? 'Doctors' : 'Fallback Text' !!}
          </a>
      @endif

      {{-- Admissions --}}
      @if(auth()->user()->role === 'admin')
        <li class="nav-item mt-3">
            <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ auth()->user()->role === 'admin' ? '/admissions-list' : '#' }}">

              <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path fill="white" d="M160-80q-33 0-56.5-23.5T80-160v-440q0-33 23.5-56.5T160-680h200v-120q0-33 23.5-56.5T440-880h80q33 0 56.5 23.5T600-800v120h200q33 0 56.5 23.5T880-600v440q0 33-23.5 56.5T800-80H160Zm0-80h640v-440H600q0 33-23.5 56.5T520-520h-80q-33 0-56.5-23.5T360-600H160v440Zm80-80h240v-18q0-17-9.5-31.5T444-312q-20-9-40.5-13.5T360-330q-23 0-43.5 4.5T276-312q-17 8-26.5 22.5T240-258v18Zm320-60h160v-60H560v60Zm-200-60q25 0 42.5-17.5T420-420q0-25-17.5-42.5T360-480q-25 0-42.5 17.5T300-420q0 25 17.5 42.5T360-360Zm200-60h160v-60H560v60ZM440-600h80v-200h-80v200Zm40 220Z"/>
              </svg>
              
            </a>
        </li>
        <a class="text-decoration-none text-white">
            {!! auth()->user()->role === 'admin' ? 'Admissions' : 'Fallback Text' !!}
          </a>
      @endif

      {{-- Nurses --}}
      @if(auth()->user()->role === 'admin')
        <li class="nav-item mt-3">
            <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ auth()->user()->role === 'admin' ? '/nurses-list' : '#' }}">
              <svg width="24" height="24" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="24" height="18.5156" fill="url(#pattern0)"/>
                  <defs>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_1940_5128" transform="scale(0.00195312 0.00253165)"/>
                    </pattern>
                  <image id="image0_1940_5128" width="512" height="395" xlink:href="data:image/png;base64,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"/>
                </defs>
              </svg>
                

            
                  
            </a>
        </li>
        <a class="text-decoration-none text-white">
            {!! auth()->user()->role === 'admin' ? 'Nurses' : 'Fallback Text' !!}
          </a>
      @endif

      {{-- Radtechs --}}
      @if(auth()->user()->role === 'admin')
        <li class="nav-item mt-3">
            <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ auth()->user()->role === 'admin' ? '/medtechs-list' : '#' }}">

              <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white">
                <path d="m320-60-80-60v-160h-40q-33 0-56.5-23.5T120-360v-300q-17 0-28.5-11.5T80-700q0-17 11.5-28.5T120-740h120v-60h-20q-17 0-28.5-11.5T180-840q0-17 11.5-28.5T220-880h120q17 0 28.5 11.5T380-840q0 17-11.5 28.5T340-800h-20v60h120q17 0 28.5 11.5T480-700q0 17-11.5 28.5T440-660v300q0 33-23.5 56.5T360-280h-40v220Zm360-20q-66 0-113-47t-47-113v-320q0-66 47-113t113-47q66 0 113 47t47 113v320q0 66-47 113T680-80ZM200-360h160v-60h-70q-12 0-21-9t-9-21q0-12 9-21t21-9h70v-60h-70q-12 0-21-9t-9-21q0-12 9-21t21-9h70v-60H200v300Zm480-280q-33 0-56.5 23.5T600-560h160q0-33-23.5-56.5T680-640Zm-80 320h160v-160H600v160Zm80 160q33 0 56.5-23.5T760-240H600q0 33 23.5 56.5T680-160Zm0-400Zm0 320Z"/>
            </svg>
                  
            </a>
        </li>
        <a class="text-decoration-none text-white">
          {{-- {{ auth()->user()->role === 'nurse' ? 'Imaging Services' : (auth()->user()->role === 'medtech' ? 'Results' : (auth()->user()->role === 'radtech' ? 'Results' : 'Fallback Text')) }} --}}
          {!! auth()->user()->role === 'admin' ? 'MedTechs' : 'Fallback Text' !!}
        </a>
      @endif

      {{-- Medtechs --}}
      @if(auth()->user()->role === 'admin')
        <li class="nav-item mt-3">
            <a class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="{{ auth()->user()->role === 'admin' ? '/radtechs-list' : '#' }}">
              <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white">
                <path d="M200-80q-50 0-85-35t-35-85q0-17 11.5-28.5T120-240q17 0 28.5 11.5T160-200t11.5 28.5Q183-160 200-160q15 0 33.5-9t38.5-26q20-17 39.5-38.5T350-280q38-51 64-105t26-95v-360q0-17 11.5-28.5T480-880q17 0 28.5 11.5T520-840v360q0 41 26 95t64 105q19 25 38.5 46.5T688-195q20 17 38.5 26t33.5 9q17 0 28.5-11.5T800-200t11.5-28.5Q823-240 840-240t28.5 11.5Q880-217 880-200q0 50-35 85t-85 35q-24 0-54.5-14T643-133q-32-25-63.5-58.5T520-264q-15-21-23.5-28.5T480-300q-8 0-16.5 7.5T440-264q-28 39-59.5 72.5T317-133q-32 25-62.5 39T200-80Zm20-129-90-73q-14-11-22-26.5t-8-33.5q0-18 7-34t21-27q10-8 22-7.5t20 10.5q8 10 7.5 22.5T167-357q-2 2-4.5 6t-2.5 9q0 4 1.5 7.5t5.5 6.5l101 80q-14 13-26 23t-22 16Zm106-102L190-420q-14-11-22-27t-8-34q0-18 7-34.5t21-27.5q10-8 22.5-7t20.5 11q8 10 7 22t-11 20q-3 2-5 7t-2 10q0 4 1.5 7.5t5.5 6.5l133 106q-8 13-16.5 25T326-311Zm69-129L250-557q-14-11-22-28t-8-35q0-19 8-35t22-28q9-8 21.5-7t20.5 11q8 10 7 22t-11 20q-2 2-5 7t-3 11q0 2 8 15l112 91v33q0 10-1.5 20t-3.5 20Zm5-186-92-77q-14-11-21-26.5t-7-32.5q0-32 23-55t55-23q16 0 29 5t13 25q0 20-13 25t-29 5q-8 0-13 6t-5 13q0 4 1.5 7t4.5 5l54 45v78Zm165 186q-2-10-3.5-20t-1.5-20v-33l112-91q4-3 8-15 0-6-3-11t-5-7q-10-8-11-20.5t7-22.5q8-10 20.5-11t22.5 7q14 12 21.5 28.5T740-620q0 18-8 34.5T710-558L565-440Zm-5-186v-78l54-45q3-2 4.5-5t1.5-7q0-8-5-13.5t-13-5.5q-16 0-29-5t-13-25q0-20 13-25t29-5q32 0 55 23t23 55q0 17-7 32.5T652-703l-92 77Zm74 315q-9-12-17.5-24.5T600-361l132-106q3-2 7-15 0-2-6-15-10-8-11-20.5t7-22.5q8-10 20-11t22 7q14 11 21.5 27.5T800-482q0 18-8 34.5T770-420L634-311Zm106 102q-10-6-22-16t-26-23l101-80q3-2 7-14 0-5-2-9t-4-6q-10-8-11-20.5t7-22.5q8-10 20-10.5t22 7.5q14 11 21 27t7 34q0 18-7.5 33.5T831-282l-91 73Z"/>
            </svg>                 
            </a>
        </li>
        <a class="text-decoration-none text-white">
            {!! auth()->user()->role === 'admin' ? 'RadTechs' : 'Fallback Text' !!}
          </a>
      @endif




  
            <li class="nav-item my-5">
                <form action="/logout" method="POST">
                @csrf
                    <button class="btn bg-light p-2 text-dark bg-opacity-25 material-symbols-outlined text-white" href="#">
                        logout </button>
                    <p>Logout</p>
                </form>
            </li>
        </ul>
    </div>
  </nav>