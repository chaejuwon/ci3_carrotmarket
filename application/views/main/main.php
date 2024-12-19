<main id="main">
  <section class="section section1" id="mainSection1">
    <div class="section-container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 class="font-bold">당신 근처의<br>지역 생활 커뮤니티123456</h2>
          <p class="fs-4 mb-20 mt-20">동네라서 가능한 모든 것<br>당근에서 가까운 이웃과 함께해요.</p>
          <div class="d-flex">
              <a class="btn btn-orange d-flex align-items-center text-white justify-content-center" href="javascript:" alt="App Store"><i class="mr-5 fs-5 fa fa-apple"></i><span>App Store</span></a>
              <a class="ml-20 btn btn-orange d-flex align-items-center text-white justify-content-center" href="javascript:" alt="Google Play"><i class="mr-5 fs-5 fa fa-play"></i>Google Play</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-wrap">
            <img src="/html/images/main1.png" alt="main1-image">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section section2" id="mainSection2">
    <div class="section-container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="img-wrap">
            <img src="/html/images/main2.png" alt="main2-image">
          </div>
        </div>
        <div class="col-md-6">
          <h4 class="font-bold text-danger">중고거래</h4>
          <h2 class="font-bold">믿을만한<br>이웃 간 중고거래</h2>
          <p class="fs-4 mb-20 mt-20">동네 주민들과 가깝고 따듯한 거래를<br>지금 경험해보세요.</p>
          <div class="d-flex">
              <a class="btn btn-gray" href="javascript:" alt="App Store"><span>인기매물 보기</span></a>
              <a class="ml-20 btn btn-gray " href="javascript:" alt="Google Play">믿을 수 있는 중고거래</a>
          </div>
        </div>
      </div>      
    </div>
  </section>
  <section class="section section3" id="mainSection3">
    <div class="section-container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h4 class="font-bold text-danger">동네생활</h4>
          <h2 class="font-bold">이웃만 아는<br>동네 정보와 이야기</h2>
          <p class="fs-4 mb-20 mt-20">우리동네의 다양한 정보와 이야기를<br>공감과 댓글로 나누어요.</p>
          <div class="row">
            <div class="col-3">
              <p class="icon-wrap d-flex justify-content-center align-items-center"><i class="icon-orange fs-3 fa fa-user"></i></p>
              <p>동네모임</p>
              <span class="fs-13">근처 이웃들과<br>동네 이야기를 해보세요.</span>
            </div>
            <div class="col-3">
              <p class="icon-wrap d-flex justify-content-center align-items-center"><i class="icon-orange fs-3 fa fa-question-circle"></i></p>
              <p>동네질문</p>
              <span class="fs-13">궁금한게 있을 땐<br>이웃에 물어보세요.</span>
            </div>
            <div class="col-3">
              <p class="icon-wrap d-flex justify-content-center align-items-center"><i class="icon-orange fs-4 fa fa-suitcase"></i></p>
              <p>동네분실센터</p>
              <span class="fs-13">무언가를 잃어버렸다면<br>글을 올려보세요.</span>
            </div>
          </div>         
        </div>
        <div class="col-md-6">
          <div class="img-wrap">
            <img src="/html/images/main3.png" alt="main3-image">
          </div>
        </div>
      </div>    
    </div>
  </section>
  <section class="section section4" id="mainSection4">
    <div class="section-container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="img-wrap">
            <img src="/html/images/main4.png" alt="main4-image">
          </div>     
        </div>
        <div class="col-md-6">
          <h4 class="font-bold text-danger">알바</h4>
          <h2 class="font-bold">걸어서 10분!<br>동네 알바 구하기</h2>
          <p class="fs-4 mb-20 mt-20">당근하듯 쉽고, 편하게<br>단근 알바로 동네 알바를 구할 수 있어요.</p>
          <div class="d-flex">
              <a class="btn btn-gray" href="javascript:" alt="App Store"><span>내근처 알아 보기</span></a>
          </div>
        </div>
      </div>    
    </div>
  </section>
    <section class="section section5" id="mainSection5">
    <div class="section-container">
      <div class="row align-items-center">
        <div class="col-md-6">
           <h4 class="font-bold text-danger">동네업체</h4>
          <h2 class="font-bold">내 근처에서 찾는<br>동네업체</h2>
          <p class="fs-4 mb-20 mt-20">이웃들의 추천 후기를 확인하고<br>동네 곳곳의 업체들을 찾을 수 있어요.</p>
          <div class="d-flex">
              <a class="btn btn-gray" href="javascript:" alt="App Store"><span>당근 동네업체 보기</span></a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-wrap">
            <img src="/html/images/main5.png" alt="main5-image">
          </div>  
        </div>
      </div>    
    </div>
  </section>
</main>
<script>
var itemWrap = $('#itemWrap');
var itemDiv;
var itemContent = '';

for(var i = 1; i <= 10; i++){
  itemDiv = document.createElement('div');
  itemDiv.setAttribute('class', 'col-md-3');
  
  itemContent = '<a href="javascript:">';
  itemContent += '<div class="ibox">';
  itemContent += '<div class="ibox-content no-borders">';
  itemContent += '<div class="itemImg"><img src="/html/images/item'+ i + '.jpg" alt="item1"></div>';
  itemContent += '<div class="row">';
  itemContent += '<div class="col-12 mt-20"><h4>맥스 싸게 가져가용~</h4></div>';
  itemContent += '<div class="col-12"><h4 class="font-bold">100,000원</h4></div>';
  itemContent += '<div class="col-12"><h4>부산 남구 대연제1동</h4></div>';
  itemContent += '<div class="col-12"><span>관심 16</span><span>채팅 19</span></div>';
  itemContent += '</div></div></div></a>';
  
  itemDiv.innerHTML = itemContent;
  itemWrap.append(itemDiv); 
}

</script>
