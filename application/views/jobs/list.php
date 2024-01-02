<main id="main">
  <section class="section section1" id="jobsListSection1">
    <div class="section-container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 class="fs-1 fw-bolder">
            우리 동네에서 내용 찾는<br>당근알바
          </h2>
          <p class="fs-4 mt-30">
            걸어서 10분 거리의<br>동네 알바들 여기 다있어요.
          </p>
        </div>
        <div class="col-md-6">
          <div class="img-wrap">
            <img src="/html/images/jobs-main-img.png" alt="jobs-main-img">
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="section section2" id="jobsListSection2">
    <div class="section-container">
      <div class="d-flex justify-content-between mb-30">
        <h3 class="no-margins fs-3 fw-bold">인기 당근알바</h3>
        <a class="float-right btn btn-warning" href="/jobs/jobspush">등록하기</a>
      </div>      
      <div class="row">
        <?php foreach($list as $entry) { ?>         
        <div class="col-md-4">
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