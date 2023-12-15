<main id="main">
  <section class="section section1" id="boardDetailSection1">
    <div class="section-container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 class="fs-1 fw-bolder">
            궁금하신 내용<br>무엇이든 물어보살
          </h2>
          <p class="fs-4 mt-30">
            내가 지금껏 <br>궁금한내용을 물어보세요!
          </p>
        </div>
        <div class="col-md-6">
          <div class="img-wrap">
            <img src="/html/images/board-main-img.png" alt="board-main-img">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section section2" id="boardDetailSection2">
    <div class="section-container">
      <div class="row">
        <div class="col-12">
          <h2>
            공지사항
          </h2>
        </div>
      </div>
      <div class="row mt-30 mb-30 board-title">
        <div class="col-md-6">
          <h3 class="no-margins fw-bold">
            <?= $detail->title ?>
          </h3>
        </div>
        <div class="col-md-6 text-end">
          <small>작성자 : <?= $detail->nickname ?> |</small>
          <small>조회수 : <?= $detail->hit ?></small>      
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <?= $detail->content ?>
        </div>
      </div>
      <hr>
      <div class="row"> 
        <div class="col-12 text-end">
          <a class="btn btn-w-m btn-success" href="/board/boardlist">목록</a>
        </div>
      </div>
    </div>
  </section>
  <section class="section section3" id="boardListSection3">
    <div class="section-container">
      <div class="row">
        <div class="col-2 auto-m">
          <h4 class="font-bold popular">중고 거래 인기 검색어</h2>
        </div>
        <div class="col-10">
          <ul class="row">
            <li class="col p-3 text-center"><a href="javascript:">알바</a></li>
            <li class="col p-3 text-center"><a href="javascript:">순금</a></li>
            <li class="col p-3 text-center"><a href="javascript:">자전거</a></li>
            <li class="col p-3 text-center"><a href="javascript:">나눔</a></li>
            <li class="col p-3 text-center"><a href="javascript:">24k</a></li>
            <li class="col p-3 text-center"><a href="javascript:">당근알바</a></li>
            <li class="col p-3 text-center"><a href="javascript:">아이폰</a></li>
            <li class="col p-3 text-center"><a href="javascript:">의자</a></li>
            <li class="col p-3 text-center"><a href="javascript:">전기자전거</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>