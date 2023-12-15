<main id="main">
  <section class="section section1" id="marketListSection1">
    <div class="section-container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 class="fs-1 fw-bolder">
            소요한 물건<br>한번 올려보자
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
    <h3 class="fs-2 text-center mb-30 font-bold">이미지 업로드</h2>
    <div class="detail-container">       
      <form class="form" id="marketImgForm">
        <div class="form-group row">
          <label class="col-2 text-right p-xs">이미지 <span class="text-danger">* </span></label>
          <div class="col-10">
            <div class="input-group">
              <input type="file" class="form-control" id="file" name="file">
              <label class="input-group-text" for="file">Upload</label>
            </div>
          </div>
        </div>
        <hr class="mb-30 mt-30">
        <div class="row">
          <div class="col-12 text-end">
            <a href="javascript:" class="btn btn-warning btn-w-m submit-btn">등록</a>
          </div>
        </div>
      </form>      
    </div>
  </section>
</main>
<script>
  $('.submit-btn').on('click', function () {
    var formData = new FormData();
    var file = $('#file')[0].files[0];
    formData.append('file', file);

    $.ajax({
        type: 'post',
        url: '/market/imgaddi',
        data: formData,
        processData: false,  // 데이터 처리를 jQuery에게 맡기지 않음
        contentType: false,  // content-type 헤더를 false로 설정하여 jQuery가 설정하지 않음
        dataType: 'json',
        success: function (res) {
          console.log('등록되었습니다.', res);
          window.location.href = '/main/index';
        },
        error: function (error) {
          console.log(error);
        }
    });
});
</script>