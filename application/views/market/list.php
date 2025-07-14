<main id="main">
  <section class="section section1" id="marketListSection1">
    <div class="section-container">
      <div class="row no-margins align-items-center">
        <div class="col-md-6 p-md">
          <h2 class="fs-1 fw-bolder">
            믿을만한<br>이웃 간 중고거래
          </h2>
          <p class="fs-4 mt-30">
            동네 주민들과 가깝고 따뜻한<br>거래를 지금 경험해보세요.
          </p>
        </div>
        <div class="col-md-6">
          <div class="img-wrap">
            <img src="/html/images/sec1-main-img.png" alt="section1-main-image">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section section2" id="marketListSection2">
    <h2 class="text-center mb-30 font-bold">중고거래 인기매물</h2>
    <div class="section-container">
      <?php
        if($this->session->userdata('isLogin') == true){
      ?>
      <div class="text-end mb-30 mr-20">
        <a href="/market/marketpush" class="btn btn-warning">등록하기</a>
      </div>  
      <?php } ?>
      <div class="row no-margins" id="itemWrap">
        <?php foreach($list as $entry) { ?>
        <div class="col-md-3">
            <a href="https://cjw02141.cafe24.com/market/marketdetail/<?=$entry->id ?>">
              <div class="ibox no-margins">
                <div class="ibox-content no-borders">
                  <div class="itemImg"><img src="/uploads/<?= $entry->filename ?>" alt="<?= $entry->filename ?>"></div>
                  <div class="row no-margins">
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
      <nav aria-label="Page navigation example" class="text-center">
        <ul class="pagination">
          <?= $pagination_links; ?>          
        </ul>
      </nav>
    </div>
  </section>
