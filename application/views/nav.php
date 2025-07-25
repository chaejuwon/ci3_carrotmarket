<!-- 깃 푸쉬 해보자 -->
<header id="header" class="bg-white bg-shadow">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light pc-version">
      <div class="container-fluid align-items-center row">
        <div class="col-6">
          <a href="/">
            <svg width="65" height="36" viewBox="0 0 65 36" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_47_13130)"><path d="M9.23186 11.6511C4.1335 11.6511 0 15.6932 0 20.7962C0 27.847 9.25838 31.5884 9.23186 31.5783C9.20661 31.5884 18.4637 27.847 18.4637 20.7962C18.4637 15.6969 14.3302 11.6511 9.23186 11.6511ZM9.23186 24.4985C8.54053 24.498 7.86486 24.2924 7.2903 23.9079C6.71573 23.5233 6.26807 22.977 6.00391 22.338C5.73975 21.6991 5.67096 20.9961 5.80623 20.318C5.9415 19.6399 6.27476 19.0171 6.76388 18.5285C7.25299 18.0398 7.87599 17.7072 8.55411 17.5726C9.23223 17.438 9.93502 17.5076 10.5736 17.7725C11.2122 18.0374 11.7579 18.4857 12.1418 19.0608C12.5256 19.6359 12.7304 20.3119 12.7301 21.0034C12.731 21.4632 12.6411 21.9187 12.4656 22.3437C12.2901 22.7687 12.0325 23.1549 11.7075 23.4802C11.3825 23.8055 10.9966 24.0634 10.5718 24.2392C10.1469 24.415 9.69161 24.5053 9.23186 24.5048V24.4985Z" fill="#FF6F0F"></path><path d="M11.3103 0C9.15573 0 7.6554 1.50565 7.41923 3.28415C4.54738 2.4909 2.29688 4.67359 2.29688 7.07354C2.29688 8.9114 3.55978 10.3956 5.24324 10.8781C6.60087 11.2659 9.04586 10.9766 9.04586 10.9766C9.03323 10.383 9.58007 9.73118 10.4237 9.13751C12.8232 7.44996 14.6999 6.65419 14.9891 4.35276C15.2922 1.94523 13.5052 0 11.3103 0Z" fill="#00A05B"></path><path d="M36.7873 14.8305C34.8374 15.4431 31.4616 15.769 28.2905 15.769V11.9114H34.8399V9.03906H24.7783V18.8208C30.2808 18.8208 35.0849 18.1576 37.1132 17.5298L36.7873 14.8305Z" fill="#FF6F0F"></path><path d="M41.4104 7.89453H37.9033V19.1402H41.4104V15.6148H44.2393V12.5467H41.4104V7.89453Z" fill="#FF6F0F"></path><path d="M34.8969 19.1138C31.1814 19.1138 28.4561 21.1613 28.4561 24.1663C28.4561 27.1713 31.1839 29.2188 34.8969 29.2188C38.6098 29.2188 41.3377 27.17 41.3377 24.1663C41.3377 21.1626 38.6124 19.1138 34.8969 19.1138ZM34.8969 26.4058C33.2223 26.4058 31.9657 25.6025 31.9657 24.1613C31.9657 22.72 33.2223 21.9179 34.8969 21.9179C36.5715 21.9179 37.8281 22.7213 37.8281 24.1613C37.8281 25.6012 36.5728 26.4058 34.8969 26.4058Z" fill="#FF6F0F"></path><path d="M51.0698 20.6055H47.4844V28.2133H61.735V25.202H51.0698V20.6055Z" fill="#FF6F0F"></path><path d="M61.2902 8.83301H47.3224V11.8443H57.7692C57.7692 12.5921 57.8046 14.3706 57.4623 16.3916H44.6514V19.5065H64.1002V16.3966H60.6347C61.0995 13.8426 61.2321 11.8519 61.2902 8.83301Z" fill="#FF6F0F"></path></g><defs><clipPath id="clip0_47_13130"><rect width="64.1053" height="36" fill="white"></rect></clipPath></defs></svg>
          </a>
          <ul class="navbar-nav mb-2 mb-lg-0">           
            <li class="nav-item ml-5">
              <a class="nav-link active" aria-current="page" href="/market/marketlist" data-path="market">중고거래</a>
            </li>
<!--            <li class="nav-item ml-5">-->
<!--              <a class="nav-link" href="/market/imgpush" data-path="imgpush">이미지업로드</a>-->
<!--            </li>-->
            <li class="nav-item ml-5">
              <a class="nav-link" href="/jobs/jobslist" data-path="jobs">구인/구직</a>
            </li>
            <li class="nav-item ml-5">
              <a class="nav-link" href="/board/boardlist" data-path="board">커뮤니티</a>
            </li>
          </ul>
        </div>
        <div class="col-3">
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="물품이나 동네를 검색해보세요" aria-label="Search">
          </form>
        </div>
        <div class="col-2 text-end">
          <?php
            if($this->session->userdata('isLogin') == true){
          ?>
            <a href="/auth/logout" class="btn btn-outline-success">로그아웃</a>
          <?php } else { ?>             
            <a href="/auth/login" class="btn btn-outline-success">로그인</a>
            <a href="/auth/register" class="btn btn-outline-success">회원가입</a>
          <?php } ?>                        
        </div>
      </div>
    </nav>
	<nav class="navbar navbar-expand-lg navbar-light bg-light mo-version">
		  <div class="container-fluid">
			  <a class="navbar-brand" href="/">
				  <svg width="65" height="36" viewBox="0 0 65 36" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_47_13130)"><path d="M9.23186 11.6511C4.1335 11.6511 0 15.6932 0 20.7962C0 27.847 9.25838 31.5884 9.23186 31.5783C9.20661 31.5884 18.4637 27.847 18.4637 20.7962C18.4637 15.6969 14.3302 11.6511 9.23186 11.6511ZM9.23186 24.4985C8.54053 24.498 7.86486 24.2924 7.2903 23.9079C6.71573 23.5233 6.26807 22.977 6.00391 22.338C5.73975 21.6991 5.67096 20.9961 5.80623 20.318C5.9415 19.6399 6.27476 19.0171 6.76388 18.5285C7.25299 18.0398 7.87599 17.7072 8.55411 17.5726C9.23223 17.438 9.93502 17.5076 10.5736 17.7725C11.2122 18.0374 11.7579 18.4857 12.1418 19.0608C12.5256 19.6359 12.7304 20.3119 12.7301 21.0034C12.731 21.4632 12.6411 21.9187 12.4656 22.3437C12.2901 22.7687 12.0325 23.1549 11.7075 23.4802C11.3825 23.8055 10.9966 24.0634 10.5718 24.2392C10.1469 24.415 9.69161 24.5053 9.23186 24.5048V24.4985Z" fill="#FF6F0F"></path><path d="M11.3103 0C9.15573 0 7.6554 1.50565 7.41923 3.28415C4.54738 2.4909 2.29688 4.67359 2.29688 7.07354C2.29688 8.9114 3.55978 10.3956 5.24324 10.8781C6.60087 11.2659 9.04586 10.9766 9.04586 10.9766C9.03323 10.383 9.58007 9.73118 10.4237 9.13751C12.8232 7.44996 14.6999 6.65419 14.9891 4.35276C15.2922 1.94523 13.5052 0 11.3103 0Z" fill="#00A05B"></path><path d="M36.7873 14.8305C34.8374 15.4431 31.4616 15.769 28.2905 15.769V11.9114H34.8399V9.03906H24.7783V18.8208C30.2808 18.8208 35.0849 18.1576 37.1132 17.5298L36.7873 14.8305Z" fill="#FF6F0F"></path><path d="M41.4104 7.89453H37.9033V19.1402H41.4104V15.6148H44.2393V12.5467H41.4104V7.89453Z" fill="#FF6F0F"></path><path d="M34.8969 19.1138C31.1814 19.1138 28.4561 21.1613 28.4561 24.1663C28.4561 27.1713 31.1839 29.2188 34.8969 29.2188C38.6098 29.2188 41.3377 27.17 41.3377 24.1663C41.3377 21.1626 38.6124 19.1138 34.8969 19.1138ZM34.8969 26.4058C33.2223 26.4058 31.9657 25.6025 31.9657 24.1613C31.9657 22.72 33.2223 21.9179 34.8969 21.9179C36.5715 21.9179 37.8281 22.7213 37.8281 24.1613C37.8281 25.6012 36.5728 26.4058 34.8969 26.4058Z" fill="#FF6F0F"></path><path d="M51.0698 20.6055H47.4844V28.2133H61.735V25.202H51.0698V20.6055Z" fill="#FF6F0F"></path><path d="M61.2902 8.83301H47.3224V11.8443H57.7692C57.7692 12.5921 57.8046 14.3706 57.4623 16.3916H44.6514V19.5065H64.1002V16.3966H60.6347C61.0995 13.8426 61.2321 11.8519 61.2902 8.83301Z" fill="#FF6F0F"></path></g><defs><clipPath id="clip0_47_13130"><rect width="64.1053" height="36" fill="white"></rect></clipPath></defs></svg>
			  </a>
			  <button class="btn btn-outline-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
				  ☰
			  </button>
		  </div>
	  </nav>
	  <!-- 오프캔버스 메뉴 -->
	  <div class="offcanvas offcanvas-end mo-version" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
		  <div class="offcanvas-header">
			  <h5 id="offcanvasMenuLabel"></h5>
			  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="닫기"></button>
		  </div>
		  <div class="offcanvas-body">
			  <ul class="nav flex-column">
				  <li class="nav-item"><a class="nav-link" href="/">메인화면</a></li>
				  <li class="nav-item"><a class="nav-link" href="/market/marketlist">중고거래</a></li>
				  <li class="nav-item"><a class="nav-link" href="/jobs/jobslist">구인/구직</a></li>
				  <li class="nav-item"><a class="nav-link" href="/board/boardlist">커뮤니티</a></li>
			  </ul>
		  </div>
	  </div>
  </div>
</header>
<script>
	const path = window.location.pathname;
	const realPath  = path.split('/');
	console.log(realPath);
	$('.nav-link').each(function (){
		const dataPath = $(this).data('path');

		if(dataPath === realPath[1]) {
			$('.nav-link').removeClass('active');
			$(this).addClass('active');
		}
	})
</script>
