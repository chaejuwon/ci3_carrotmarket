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
    <h3 class="fs-2 text-center mb-30 font-bold">나의 상품 <?=(isset($detail->id) ? '수정' : '등록')?>하기</h2>
    <div class="detail-container">       
      <form class="form" id="marketForm" action="/market/<?=(isset($detail->id) ? 'productedit' : 'productadd')?>/<?=(isset($detail->id) ? $detail->id : '')?>" method="post">
        <input type="hidden" id="id" name="id">
        <div class="form-group row">
          <label class="col-2 text-right p-xs">제목 <span class="text-danger">* </span></label>
          <div class="col-10">
              <input type="text" id="title" name="title" class="form-control p-sm" placeholder="제목을 입력해주세요.." value="<?=(isset($detail->title) ? $detail->title : '')?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 text-right p-xs">가격 <span class="text-danger">* </span></label>
          <div class="col-10">
              <input type="text" id="price" name="price" class="form-control p-sm" placeholder="가격을 입력해주세요." value="<?=(isset($detail->price) ? $detail->price : '')?>" >
          </div>
        </div>  
          
        
        <div class="form-group row">
          <label class="col-2 text-right p-xs">주소 <span class="text-danger">* </span></label>
          <div class="col-10">
            <div class="row">
              <div class="col-12">
                <div class="input-group mb-10">
                  <input type="text" id="addr" name="addr" class="form-control p-sm"  placeholder="주소를 입력해주세요.">
                  <span class="input-group-append">
                  <button type="button" id="btn-send-sec-num" class="h-100 btn btn-warning" onclick="openZipSearch()">우편번호 찾기</button>
                  </span>
                </div>
              </div>              
              <div class="col-8">
                <input type="text" id="addr_dtl" name="addr_dtl" class="form-control p-sm">
              </div>
            </div>
          </div>
          
        </div> 
        <div class="form-group row">
          <label class="col-2 text-right p-xs">내용 <span class="text-danger">* </span></label>
          <div class="col-10">
              <textarea id="content" name="content" class="form-control p-sm" placeholder="내용을 입력해주세요." cols="30" rows="4"><?=(isset($detail->content) ? $detail->content : '')?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 text-right p-xs">이미지 <span class="text-danger">* </span></label>
          <div class="col-10">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input " id="file">
                    <label class="custom-file-label no-borders" for="file">"<?= isset($detail->filename) ? $detail->filename : '파일을 첨부해주세요' ?>"</label>
                </div>
            </div>
          </div>
        </div>
        <hr class="mb-30 mt-30">
        <div class="row">
          <div class="col-12 text-end">
            <a href="javascript:" class="btn btn-warning btn-w-m submit-btn"><?=(isset($detail->id) ? '수정' : '등록')?></a>
          </div>
        </div>
      </form>      
    </div>
  </section>
</main>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    $(document).ready(function () {
      //첨부파일 파일명을 뜨게한다.
      bsCustomFileInput.init();
  });
  <?php
    if(isset($detail->id)) {
  ?>
      var fullAddress = '<?= $detail->address ?>';
      
      var addresspart = fullAddress.split('/');
      
      var address1 = addresspart[0];
      var address2 = addresspart[1];
  
      document.getElementById('addr').value = address1;
      document.getElementById('addr_dtl').value = address2;
  <?php } ?>
  function openZipSearch() {
      new daum.Postcode({
        oncomplete: function(data) {     
      var addr = ''; 
      if (data.userSelectedType === 'R') { 
        addr = data.roadAddress;
      } else {
        addr = data.jibunAddress;
      }

//       $("#zip_code").val(data.zonecode);
      $("#addr").val(addr);
      $("#addr_dtl").val("");
      $("#addr_dtl").focus();
          }
      }).open();
  }
  
  $('.submit-btn').on('click', function(){
    var formData = new FormData();
    
    var title = $('#title').val();
    var price = $('#price').val();   
    var addr = $('#addr').val();
    var addrDtl = $('#addr_dtl').val();
    var address = addr + '/' + addrDtl;
    var content = $('#content').val();
    var file = $('#file')[0].files[0];
    
    if(title === ''){
      alert('제목을 입력해주세요');
      return;
    }
    if(price === ''){
      alert('가격을 입력해주세요');     
      return;
    }
    if(addr === ''){
      alert('주소를 입력해주세요');     
      return;
    }
    if(content === ''){
      alert('내용을 입력해주세요');
      return;
    }   
    if(!file) {
      alert('파일을 첨부해주세요.');
      return;
    }
    
    formData.append('title', title);
    formData.append('price', price);
    formData.append('address', address);
    formData.append('content', content);

    // 파일이 선택된 경우에만 추가
    if (file) {
      formData.append('file', file);
    }
    
    $.ajax({
      type: 'post',
      contentType: 'multipart/form-data',
      url: '/market/<?=(isset($detail->id) ? 'productedit' : 'productadd')?>/<?=(isset($detail->id) ? $detail->id : '')?>',
      data: formData,
      contentType: false,
      processData: false, // 중요: processData를 false로 설정
      datatype: 'json',
      success: function(res) {
        alert('<?= isset($detail->id) ? '수정' : '등록' ?>되었습니다.');
        window.location.href = '/market/marketlist';
      },
      error: function(error) {
        console.log(error);
      }
    });
  });
</script>