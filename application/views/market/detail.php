<main id="main">
  <input type="hidden" value="<?= $detail->id ?>" id="pid">
  <section class="section section1" id="marketDetailSection1">
    <div class="detail-container">
      <div style="height:600px;overflow:hidden;border-radius:20px;">
        <div id="slider-div">
          <div class="img-wrap">
            <img class="item" src="/uploads/<?= $detail->filename ?>" alt="">
          </div>
          <div class="img-wrap">
            <img src="/html/images/item2.jpg" alt="">
          </div>
          <div class="img-wrap">
            <img src="/html/images/item3.jpg" alt="">
          </div>
        </div>
	    </div>
    </div>
  </section>
  <section class="section section2" id="marketDetailSection2">
    <div class="detail-container">
      <div class="row mt-20">
        <div class="col-12">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
              <img style="border-radius:50%;width:40px;height:40px;" src="/html/images/detail_user.png">
              <div class="ml-10 d-inline-block">
                <p class="no-margins">배방토박12</p>
                <p class="no-margins"><?= $detail->address ?></p>
              </div>
            </div>
            <div>
              <a href="/market/marketpush/<?= $detail->id ?>" class="btn btn-warning">수정하기</a>  
            </div>
          </div>
          </div>
        </div>
      <hr>
      <div class="row">
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
      <div class="pt-20 d-flex align-items-center justify-content-between">        
        <h3 class="font-bold">당근 인기중고</h3>
        <a href="" class="">더 구경하기</a>
      </div>
      <div class="row" id="itemWrap">
        <?php foreach($list as $entry) { ?>
        <div class="col-md-4">
            <a href="https://cjw02141.cafe24.com/market/marketdetail/<?=$entry->id ?>">
              <div class="ibox no-margins">
                <div class="ibox-content no-borders">
                  <div class="itemImg"><img src="/uploads/<?= $entry->filename ?>" alt="item1"></div>
                  <div class="row">
                    <div class="col-12 mt-20"><h4 class="fs-15 no-margins"><?=$entry->title ?></h4></div>
                    <div class="col-12"><h4 class="font-bold"><?=$entry->price ?>원</h4></div>
                    <div class="col-12"><h4 class="fs-15 no-margins text-truncate"><?=$entry->address ?></h4></div>
                    <div class="col-12"><span class="fs-13">관심 16</span><span class="fs-13">채팅 19</span></div>
                  </div>
                </div>
              </div>
          </a>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <hr>
</main>
<script>
// var itemWrap = $('#itemWrap');
// var itemDiv;
// var itemContent = '';

// for(var i = 1; i <= 6; i++){
//   itemDiv = document.createElement('div');
//   itemDiv.setAttribute('class', 'col-md-4');
  
//   itemContent = '<a href="https://cjw02141.cafe24.com/main/marketDetail">';
//   itemContent += '<div class="ibox no-margins">';
//   itemContent += '<div class="ibox-content no-borders">';
//   itemContent += '<div class="itemImg"><img src="/html/images/item'+ i + '.jpg" alt="item1"></div>';
//   itemContent += '<div class="row">';
//   itemContent += '<div class="col-12 mt-20"><h4 class="fs-15 no-margins">맥스 싸게 가져가용~</h4></div>';
//   itemContent += '<div class="col-12"><h4 class="font-bold">100,000원</h4></div>';
//   itemContent += '<div class="col-12"><h4 class="fs-15 no-margins">부산 남구 대연제1동</h4></div>';
//   itemContent += '<div class="col-12"><span class="fs-13">관심 16</span><span class="fs-13">채팅 19</span></div>';
//   itemContent += '</div></div></div></a>';
  
//   itemDiv.innerHTML = itemContent;
//   itemWrap.append(itemDiv); 
// }

  $(function(){
			$('#slider-div').slick({
				slide: 'div',		//슬라이드 되어야 할 태그 ex) div, li 
				infinite : true, 	//무한 반복 옵션	 
				slidesToShow : 1,		// 한 화면에 보여질 컨텐츠 개수
				slidesToScroll : 1,		//스크롤 한번에 움직일 컨텐츠 개수
				speed : 500,	 // 다음 버튼 누르고 다음 화면 뜨는데까지 걸리는 시간(ms)
				arrows : true, 		// 옆으로 이동하는 화살표 표시 여부
				dots : true, 		// 스크롤바 아래 점으로 페이지네이션 여부
				autoplay : true,			// 자동 스크롤 사용 여부
				autoplaySpeed : 10000, 		// 자동 스크롤 시 다음으로 넘어가는데 걸리는 시간 (ms)
				pauseOnHover : true,		// 슬라이드 이동	시 마우스 호버하면 슬라이더 멈추게 설정
				vertical : false,		// 세로 방향 슬라이드 옵션
				prevArrow : "<button type='button' class='slick-prev'>Previous</button>",		// 이전 화살표 모양 설정
				nextArrow : "<button type='button' class='slick-next'>Next</button>",		// 다음 화살표 모양 설정
				dotsClass : "slick-dots", 	//아래 나오는 페이지네이션(점) css class 지정
				draggable : true, 	//드래그 가능 여부 
        fade: true,
        cssEase: 'linear',
				
				responsive: [ // 반응형 웹 구현 옵션
					{  
						breakpoint: 960, //화면 사이즈 960px
						settings: {
							//위에 옵션이 디폴트 , 여기에 추가하면 그걸로 변경
							slidesToShow:3 
						} 
					},
					{ 
						breakpoint: 768, //화면 사이즈 768px
						settings: {	
							//위에 옵션이 디폴트 , 여기에 추가하면 그걸로 변경
							slidesToShow:2 
						} 
					}
				]

			});
  		})
  
  
</script>