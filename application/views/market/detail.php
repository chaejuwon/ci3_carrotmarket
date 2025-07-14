<main id="main">
	<input type="hidden" value="<?= $detail->id ?>" id="pid">
	<section class="section section1" id="marketDetailSection1">
		<div class="detail-container">
			<div>
				<div class="img-wrap">
					<img class="item" src="/uploads/<?= $detail->filename ?>" alt="">
				</div>
			</div>
		</div>
	</section>
	<section class="section section2" id="marketDetailSection2">
		<div class="detail-container">
			<div class="row no-margins mt-20">
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
								<a href="/market/marketpush/<?= $detail->id ?>" class="btn btn-warning">수정하기</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<hr>
			<div class="row no-margins">
				<div class="col-12">
					<h3 class="font-bold no-margins"><?= $detail->title ?></h3>
					<span class="fs-13 d-inline-block mb-8 mt-8">디지털기기·9시간 전</span>
					<h3 class="font-bold  no-margins"><?= $detail->price ?>원</h3>
					<p class="fs-18 mt-20">
						<?= $detail->content ?>
					</p>
					<span class="fs-13 d-inline-block mb-8 mt-8">관심7 · 채팅12 · 조회325</span>
				</div>
			</div>
		</div>
	</section>

	<section class="section section3" id="marketDetailSection3">
		<div class="detail-container">
			<hr>
			<div class="row no-margins align-items-center justify-content-between">
				<div class="col-6">
					<h3 class="font-bold">당근 인기중고</h3>
				</div>
				<div class="col-6 text-right">
					<a href="javascrpt:" class="">더 구경하기</a>
				</div>
			</div>
			<div class="row no-margins" id="itemWrap">
				<?php foreach ($list as $entry) { ?>
					<div class="col-md-4">
						<a href="https://cjw02141.cafe24.com/market/marketdetail/<?= $entry->id ?>">
							<div class="ibox no-margins">
								<div class="ibox-content no-borders">
									<div class="itemImg"><img src="/uploads/<?= $entry->filename ?>" alt="item1"></div>
									<div class="row">
										<div class="col-12 mt-20"><h4 class="fs-15 no-margins"><?= $entry->title ?></h4>
										</div>
										<div class="col-12"><h4 class="font-bold"><?= $entry->price ?>원</h4></div>
										<div class="col-12"><h4
													class="fs-15 no-margins text-truncate"><?= $entry->address ?></h4>
										</div>
										<div class="col-12"><span class="fs-13">관심 <?= $entry->id ?></span><span
													class="fs-13">채팅 <?= $entry->id + 10 ?></span></div>
									</div>
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
	$(function () {
		$('#slider-div').slick({
			slide: 'div',
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			speed: 500,
			arrows: true,
			dots: true,
			autoplay: true,
			autoplaySpeed: 10000,
			pauseOnHover: true,
			vertical: false,
			prevArrow: "<button type='button' class='slick-prev'>Previous</button>",
			nextArrow: "<button type='button' class='slick-next'>Next</button>",
			dotsClass: "slick-dots",
			draggable: true,
			fade: true,
			cssEase: 'linear',

			responsive: [
				{
					breakpoint: 960,
					settings: {
						slidesToShow: 3
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2
					}
				}
			]

		});
	})


</script>
