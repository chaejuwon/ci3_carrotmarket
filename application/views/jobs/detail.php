<main id="main">
	<section class="section section1 m-t-xl" id="jobsDetailSection1">
		<div class="detail-container">
			<div class="img-wrap">
				<img class="item" src="/uploads/<?= $detail->filename ?>" alt="">
			</div>
		</div>
	</section>
	<section class="section section2 m-t-md" id="jobsDetailSection2">
		<div class="detail-container">
			<div class="row no-margins">
				<div class="col-12">
					<div class="d-flex justify-content-between align-items-center">
						<div class="d-flex align-items-center">
							<img style="border-radius:50%;width:40px;height:40px;" src="/html/images/detail_user.png">
							<div class="ml-10 d-inline-block">
								<p class="no-margins"><?= $detail->nickname ?>
								<p class="no-margins"><?= $detail->address ?></p>
							</div>
						</div>
						<?php
						if ($this->session->userdata('isLogin') == true && $this->session->userdata('userid') == $detail->userid) {
							?>
							<div>
								<a href="/jobs/jobspush/<?= $detail->id ?>" class="btn btn-warning">수정하기</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="row no-margins">
				<div class="col-12">
					<h3 class="font-bold no-margins"><?= $detail->title ?></h3>
					<span class="fs-13 d-inline-block mb-8 mt-8">7일전 작성</span>
				</div>
			</div>
			<div class="row no-margins pt-4">
				<div class="col-12">
					<h3 class="fw-bold">정보</h3>
					<div class="d-flex pt-10 pb-10">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
							 data-karrot-ui-icon="true" width="20" height="20">
							<path fill-rule="evenodd" clip-rule="evenodd"
								  d="M6.45322 7.83927C6.76288 7.72131 7.10954 7.87671 7.22751 8.18637L8.40074 11.2661H10.5572L11.4232 8.23513C11.4968 7.97755 11.7323 7.79997 12.0001 7.79997C12.268 7.79997 12.5035 7.97755 12.5771 8.23513L13.4431 11.2661H15.5996L16.7728 8.18637C16.8908 7.87671 17.2374 7.72131 17.5471 7.83927C17.8567 7.95724 18.0121 8.3039 17.8942 8.61356L16.8837 11.2661H18.6665C18.9979 11.2661 19.2665 11.5347 19.2665 11.8661C19.2665 12.1975 18.9979 12.4661 18.6665 12.4661H16.4265L14.8466 16.6136C14.7546 16.855 14.5183 17.0105 14.2602 16.9994C14.002 16.9884 13.7799 16.8133 13.7089 16.5648L12.5379 12.4661H11.4624L10.2913 16.5648C10.2204 16.8133 9.99828 16.9884 9.74013 16.9994C9.48197 17.0105 9.24573 16.855 9.15374 16.6136L7.57376 12.4661H5.33315C5.00178 12.4661 4.73315 12.1975 4.73315 11.8661C4.73315 11.5347 5.00178 11.2661 5.33315 11.2661H7.11661L6.10612 8.61356C5.98815 8.3039 6.14355 7.95724 6.45322 7.83927ZM9.63302 14.5009L8.85788 12.4661H10.2144L9.63302 14.5009ZM12.0001 10.584L12.195 11.2661L11.8053 11.2661L12.0001 10.584ZM14.3673 14.5009L13.7859 12.4661H15.1424L14.3673 14.5009Z"
								  fill="currentColor"></path>
							<path fill-rule="evenodd" clip-rule="evenodd"
								  d="M11.9999 1.3999C6.14568 1.3999 1.3999 6.14568 1.3999 11.9999C1.3999 17.8541 6.14568 22.5999 11.9999 22.5999C17.8541 22.5999 22.5999 17.8541 22.5999 11.9999C22.5999 6.14568 17.8541 1.3999 11.9999 1.3999ZM2.5999 11.9999C2.5999 6.80843 6.80843 2.5999 11.9999 2.5999C17.1914 2.5999 21.3999 6.80843 21.3999 11.9999C21.3999 17.1914 17.1914 21.3999 11.9999 21.3999C6.80843 21.3999 2.5999 17.1914 2.5999 11.9999Z"
								  fill="currentColor"></path>
						</svg>
						<h4 class="pl-5 fw-bold no-margins"><?= $detail->moneytype ?> <?= $detail->money ?></h4>
					</div>
					<div class="d-flex pt-10 pb-10">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
							 data-karrot-ui-icon="true" width="20" height="20">
							<path fill-rule="evenodd" clip-rule="evenodd"
								  d="M11.9999 6.68295C10.1101 6.68295 8.57812 8.21493 8.57812 10.1047C8.57812 11.9945 10.1101 13.5265 11.9999 13.5265C13.8897 13.5265 15.4217 11.9945 15.4217 10.1047C15.4217 8.21493 13.8897 6.68295 11.9999 6.68295ZM9.71871 10.1047C9.71871 8.84487 10.74 7.82354 11.9999 7.82354C13.2598 7.82354 14.2811 8.84487 14.2811 10.1047C14.2811 11.3646 13.2598 12.3859 11.9999 12.3859C10.74 12.3859 9.71871 11.3646 9.71871 10.1047Z"
								  fill="currentColor"></path>
							<path fill-rule="evenodd" clip-rule="evenodd"
								  d="M11.9999 0.97998C6.69797 0.97998 2.3999 5.27805 2.3999 10.58C2.3999 13.8997 4.55425 17.0093 6.71987 19.2351C7.81457 20.3602 8.94028 21.2886 9.85838 21.9389C10.3169 22.2637 10.7306 22.5241 11.0685 22.7061C11.2369 22.7968 11.3948 22.8726 11.5353 22.9272C11.6588 22.9752 11.8289 23.0315 11.9999 23.0315C12.1709 23.0315 12.341 22.9752 12.4645 22.9272C12.605 22.8726 12.7629 22.7968 12.9313 22.7061C13.2692 22.5241 13.6829 22.2637 14.1414 21.9389C15.0595 21.2886 16.1852 20.3602 17.2799 19.2351C19.4456 17.0093 21.5999 13.8997 21.5999 10.58C21.5999 5.27805 17.3018 0.97998 11.9999 0.97998ZM3.5405 10.58C3.5405 5.90798 7.3279 2.12057 11.9999 2.12057C16.6719 2.12057 20.4593 5.90798 20.4593 10.58C20.4593 13.4384 18.5741 16.2694 16.4624 18.4397C15.4185 19.5126 14.3462 20.3961 13.4821 21.0082C13.0496 21.3146 12.6762 21.548 12.3903 21.702C12.2468 21.7793 12.1336 21.8321 12.0514 21.864C12.0299 21.8724 12.0129 21.8784 11.9999 21.8826C11.9869 21.8784 11.9699 21.8724 11.9484 21.864C11.8662 21.8321 11.753 21.7793 11.6095 21.702C11.3236 21.548 10.9502 21.3146 10.5177 21.0082C9.65358 20.3961 8.58128 19.5126 7.53736 18.4397C5.42575 16.2694 3.5405 13.4384 3.5405 10.58Z"
								  fill="currentColor"></path>
						</svg>
						<h4 class="pl-5 no-margins"><?= $detail->address ?></h4>
					</div>
					<div class="d-flex pt-10 pb-10">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
							 data-karrot-ui-icon="true" width="20" height="20">
							<path d="M14.2666 17.8133C14.2666 17.4819 14.5352 17.2133 14.8666 17.2133H17.5333C17.8646 17.2133 18.1333 17.4819 18.1333 17.8133C18.1333 18.1446 17.8646 18.4133 17.5333 18.4133H14.8666C14.5352 18.4133 14.2666 18.1446 14.2666 17.8133Z"
								  fill="currentColor"></path>
							<path fill-rule="evenodd" clip-rule="evenodd"
								  d="M8.5999 2.47988C8.5999 2.14851 8.33127 1.87988 7.9999 1.87988C7.66853 1.87988 7.3999 2.14851 7.3999 2.47988V3.17981H2.99995C2.55812 3.17981 2.19995 3.53798 2.19995 3.97981V19.1298C2.19995 20.7867 3.5431 22.1298 5.19995 22.1298H18.8C20.4568 22.1298 21.8 20.7867 21.8 19.1298V3.97981C21.8 3.53798 21.4418 3.17981 21 3.17981H16.5999V2.47988C16.5999 2.14851 16.3313 1.87988 15.9999 1.87988C15.6685 1.87988 15.3999 2.14851 15.3999 2.47988V3.17981H8.5999V2.47988ZM15.3999 5.47988V4.37981H8.5999V5.47988C8.5999 5.81125 8.33127 6.07988 7.9999 6.07988C7.66853 6.07988 7.3999 5.81125 7.3999 5.47988V4.37981H3.39995V7.37988H20.6V4.37981H16.5999V5.47988C16.5999 5.81125 16.3313 6.07988 15.9999 6.07988C15.6685 6.07988 15.3999 5.81125 15.3999 5.47988ZM20.6 8.57988H3.39995V19.1298C3.39995 20.1239 4.20584 20.9298 5.19995 20.9298H18.8C19.7941 20.9298 20.6 20.1239 20.6 19.1298V8.57988Z"
								  fill="currentColor"></path>
						</svg>
						<h4 class="pl-5 no-margins"><?= $detail->day ?></h4>
					</div>
					<div class="d-flex pt-10 pb-10">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
							 data-karrot-ui-icon="true" width="20" height="20">
							<path fill-rule="evenodd" clip-rule="evenodd"
								  d="M11.9999 5.8999C12.3313 5.8999 12.5999 6.16853 12.5999 6.4999V12.1437L16.7872 13.9732C17.0781 14.1318 17.1853 14.4963 17.0266 14.7872C16.868 15.0781 16.5035 15.1853 16.2126 15.0266L11.3999 12.8561V6.4999C11.3999 6.16853 11.6685 5.8999 11.9999 5.8999Z"
								  fill="currentColor"></path>
							<path fill-rule="evenodd" clip-rule="evenodd"
								  d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM12 3.33333C7.21353 3.33333 3.33333 7.21353 3.33333 12C3.33333 16.7865 7.21353 20.6667 12 20.6667C16.7865 20.6667 20.6667 16.7865 20.6667 12C20.6667 7.21353 16.7865 3.33333 12 3.33333Z"
								  fill="currentColor"></path>
						</svg>
						<h4 class="pl-5 no-margins"><?= $detail->starttime ?>:00 ~ <?= $detail->endtime ?>:00</h4>
					</div>
				</div>
			</div>
			<div class="row no-margins pt-4">
				<div class="col-12">
					<h3 class="fw-bold">상세내용</h3>
					<p class="no-margin"><?= $detail->content ?></p>
				</div>
			</div>
			<div class="row no-margins pt-4">
				<div class="col-12">
					<h3 class="fw-bold">주소</h3>
					<div id="map" style="width:100%;height:300px;" class="mt-20"></div>
					<h4 class="pt-10 no-margins"><?= $detail->address ?></h4>
				</div>
			</div>
			<div class="row no-margins pt-5">
				<div class="col-12">
					<h3 class="fw-bold">근처알바</h3>
				</div>
				<?php foreach ($list as $entry) { ?>
					<div class="col-md-6">
						<a href="/jobs/jobsdetail/<?= $entry->id ?>">
							<div class="d-flex ibox">
								<div class="img-wrap job-img-wrap">
									<img src="/uploads/<?= $entry->filename ?>" alt="cat-img">
								</div>
								<div class="job-text-wrap">
									<h4 class="no-margins"><?= $entry->title ?></h4>
									<span class="d-inline-block jobs-text-margin"><?= $entry->address ?></span>
									<h4 class="no-margins fw-bold"><?= $entry->moneytype ?> <?= $entry->money ?></h4>
								</div>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
</main>
<script>
	var mapContainer = document.getElementById('map'), // 지도를 표시할 div
		mapOption = {
			center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
			level: 3 // 지도의 확대 레벨
		};

	// 지도를 생성합니다
	var map = new kakao.maps.Map(mapContainer, mapOption);

	// 주소-좌표 변환 객체를 생성합니다
	var geocoder = new kakao.maps.services.Geocoder();

	// 주소로 좌표를 검색합니다
	// PHP에서 받아온 주소
	var address = "<?= $detail->address ?>";

	geocoder.addressSearch(address, function (result, status) {
		if (status === kakao.maps.services.Status.OK) {
			var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

			// 중심 좌표 재설정
			map.setCenter(coords);

			// 마커 표시
			var marker = new kakao.maps.Marker({
				map: map,
				position: coords
			});
		}
	});
</script>
