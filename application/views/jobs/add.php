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
    <h3 class="fs-2 text-center mb-30 font-bold">알바 공고 게시하기</h2>
    <div class="detail-container">       
      <form class="form" id="jobsForm" action="" method="post">        
        <div class="form-group row">
          <label class="col-2 text-right p-xs">제목 <span class="text-danger">* </span></label>
          <div class="col-10">
              <input type="text" id="title" name="title" class="form-control p-sm" placeholder="제목을 입력하세요." value="<?= isset($detail->id) ? $detail->title : '' ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 text-right p-xs">급여 <span class="text-danger">* </span></label>
          <div class="col-2">
            <select class="form-control h-100" id="moneytype" name="moneytype">
              <option value="일급" <?= (isset($detail->id) && $detail->moneytype == '일급') ? 'selected' : '' ?>>일급</option>
              <option value="주급" <?= (isset($detail->id) && $detail->moneytype == '주급') ? 'selected' : '' ?>>주급</option>
              <option value="월급" <?= (isset($detail->id) && $detail->moneytype == '월급') ? 'selected' : '' ?>>월급</option>
            </select>
          </div>
          <div class="col-8">
            <input type="text" id="money" name="money" class="form-control p-sm" placeholder="금액을 입력하세요." onKeyup="this.value=this.value.replace(/[^0-9]/g,'');" value="<?= isset($detail->id) ? $detail->money : '' ?>">
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
          <label class="col-2 text-right p-xs">요일 <span class="text-danger">* </span></label>
          <div class="col-10">
          <?php if(isset($detail->id)) {
              $daysOfWeek = array("월요일", "화요일", "수요일", "목요일", "금요일", "토요일", "일요일");
              $selectedDays = explode(',', isset($detail->id) ? $detail->day : '');
              foreach ($daysOfWeek as $day) {
                $isChecked = in_array($day, $selectedDays) ? 'checked' : '';

                echo '<label class="ml-10"><input type="checkbox" name="day[]" value="' . $day . '" ' . $isChecked . ' />' . $day . '</label>';            
           } ?> <?php } else { ?>
            <label class="ml-10"><input type="checkbox" name="day[]" value="월요일" />월요일</label>
            <label class="ml-10"><input type="checkbox" name="day[]" value="화요일" />화요일</label>
            <label class="ml-10"><input type="checkbox" name="day[]" value="수요일" />수요일</label>
            <label class="ml-10"><input type="checkbox" name="day[]" value="목요일" />목요일</label>
            <label class="ml-10"><input type="checkbox" name="day[]" value="금요일" />금요일</label>
            <label class="ml-10"><input type="checkbox" name="day[]" value="토요일" />토요일</label>
            <label class="ml-10"><input type="checkbox" name="day[]" value="일요일" />일요일</label>
          <?php } ?>
                     

            <?php
           
            ?>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 text-right p-xs">알바시간 <span class="text-danger">* </span></label>
          <div class="col">
            <select id="starttime" name="starttime" class="form-control">
              <option value="">시간을 선택해주세요.</option>
              <option value="01" <?= (isset($detail->id) && $detail->starttime == '01') ? 'selected' : '' ?>>01</option>
              <option value="02" <?= (isset($detail->id) && $detail->starttime == '02') ? 'selected' : '' ?>>02</option>
              <option value="03" <?= (isset($detail->id) && $detail->starttime == '03') ? 'selected' : '' ?>>03</option>
              <option value="04" <?= (isset($detail->id) && $detail->starttime == '04') ? 'selected' : '' ?>>04</option>
              <option value="05" <?= (isset($detail->id) && $detail->starttime == '05') ? 'selected' : '' ?>>05</option>
              <option value="06" <?= (isset($detail->id) && $detail->starttime == '06') ? 'selected' : '' ?>>06</option>
              <option value="07" <?= (isset($detail->id) && $detail->starttime == '07') ? 'selected' : '' ?>>07</option>
              <option value="08" <?= (isset($detail->id) && $detail->starttime == '08') ? 'selected' : '' ?>>08</option>
              <option value="09" <?= (isset($detail->id) && $detail->starttime == '09') ? 'selected' : '' ?>>09</option>
              <option value="10" <?= (isset($detail->id) && $detail->starttime == '10') ? 'selected' : '' ?>>10</option>
              <option value="11" <?= (isset($detail->id) && $detail->starttime == '11') ? 'selected' : '' ?>>11</option>
              <option value="12" <?= (isset($detail->id) && $detail->starttime == '12') ? 'selected' : '' ?>>12</option>
              <option value="13" <?= (isset($detail->id) && $detail->starttime == '13') ? 'selected' : '' ?>>13</option>
              <option value="14" <?= (isset($detail->id) && $detail->starttime == '14') ? 'selected' : '' ?>>14</option>
              <option value="15" <?= (isset($detail->id) && $detail->starttime == '15') ? 'selected' : '' ?>>15</option>
              <option value="16" <?= (isset($detail->id) && $detail->starttime == '16') ? 'selected' : '' ?>>16</option>
              <option value="17" <?= (isset($detail->id) && $detail->starttime == '17') ? 'selected' : '' ?>>17</option>
              <option value="18" <?= (isset($detail->id) && $detail->starttime == '18') ? 'selected' : '' ?>>18</option>
              <option value="19" <?= (isset($detail->id) && $detail->starttime == '19') ? 'selected' : '' ?>>19</option>
              <option value="20" <?= (isset($detail->id) && $detail->starttime == '20') ? 'selected' : '' ?>>20</option>
              <option value="21" <?= (isset($detail->id) && $detail->starttime == '21') ? 'selected' : '' ?>>21</option>
              <option value="22" <?= (isset($detail->id) && $detail->starttime == '22') ? 'selected' : '' ?>>22</option>
              <option value="23" <?= (isset($detail->id) && $detail->starttime == '23') ? 'selected' : '' ?>>23</option>            
            </select>
          </div>
          <div class="col-1 text-center">
            <span>-</span>
          </div>
          <div class="col">
            <select id="endtime" name="endtime" class="form-control">
              <option value="">시간을 선택해주세요.</option>
              <option value="01" <?= (isset($detail->id) && $detail->endtime == '01') ? 'selected' : '' ?>>01</option>
              <option value="02" <?= (isset($detail->id) && $detail->endtime == '02') ? 'selected' : '' ?>>02</option>
              <option value="03" <?= (isset($detail->id) && $detail->endtime == '03') ? 'selected' : '' ?>>03</option>
              <option value="04" <?= (isset($detail->id) && $detail->endtime == '04') ? 'selected' : '' ?>>04</option>
              <option value="05" <?= (isset($detail->id) && $detail->endtime == '05') ? 'selected' : '' ?>>05</option>
              <option value="06" <?= (isset($detail->id) && $detail->endtime == '06') ? 'selected' : '' ?>>06</option>
              <option value="07" <?= (isset($detail->id) && $detail->endtime == '07') ? 'selected' : '' ?>>07</option>
              <option value="08" <?= (isset($detail->id) && $detail->endtime == '08') ? 'selected' : '' ?>>08</option>
              <option value="09" <?= (isset($detail->id) && $detail->endtime == '09') ? 'selected' : '' ?>>09</option>
              <option value="10" <?= (isset($detail->id) && $detail->endtime == '10') ? 'selected' : '' ?>>10</option>
              <option value="11" <?= (isset($detail->id) && $detail->endtime == '11') ? 'selected' : '' ?>>11</option>
              <option value="12" <?= (isset($detail->id) && $detail->endtime == '12') ? 'selected' : '' ?>>12</option>
              <option value="13" <?= (isset($detail->id) && $detail->endtime == '13') ? 'selected' : '' ?>>13</option>
              <option value="14" <?= (isset($detail->id) && $detail->endtime == '14') ? 'selected' : '' ?>>14</option>
              <option value="15" <?= (isset($detail->id) && $detail->endtime == '15') ? 'selected' : '' ?>>15</option>
              <option value="16" <?= (isset($detail->id) && $detail->endtime == '16') ? 'selected' : '' ?>>16</option>
              <option value="17" <?= (isset($detail->id) && $detail->endtime == '17') ? 'selected' : '' ?>>17</option>
              <option value="18" <?= (isset($detail->id) && $detail->endtime == '18') ? 'selected' : '' ?>>18</option>
              <option value="19" <?= (isset($detail->id) && $detail->endtime == '19') ? 'selected' : '' ?>>19</option>
              <option value="20" <?= (isset($detail->id) && $detail->endtime == '20') ? 'selected' : '' ?>>20</option>
              <option value="21" <?= (isset($detail->id) && $detail->endtime == '21') ? 'selected' : '' ?>>21</option>
              <option value="22" <?= (isset($detail->id) && $detail->endtime == '22') ? 'selected' : '' ?>>22</option>
              <option value="23" <?= (isset($detail->id) && $detail->endtime == '23') ? 'selected' : '' ?>>23</option>         
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 text-right p-xs">내용 <span class="text-danger">* </span></label>
          <div class="col-10">
              <textarea id="content" name="content" class="summernote" placeholder="내용을 입력해주세요." cols="30" rows="4"><?= isset($detail->id) ? $detail->content : '' ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 text-right p-xs">이미지 <span class="text-danger">* </span></label>
          <div class="col-10">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file">
                    <label class="custom-file-label no-borders" for="file"><?= isset($detail->filename) ? $detail->filename : '파일을 첨부해주세요' ?></label>
                </div>
            </div>
          </div>
        </div>
        <hr class="mb-30 mt-30">
        <div class="row">
          <div class="col-12 text-end">
            <a id="successBtn" class="btn btn-success btn-w-m">등록하기</a>
          </div>
        </div>
      </form>      
    </div>
  </section>
<script>  
  //첨부파일 파일명을 뜨게한다.
  bsCustomFileInput.init();
  
  function openZipSearch() {
      new daum.Postcode({
        oncomplete: function(data) {     
      var addr = ''; 
      if (data.userSelectedType === 'R') { 
        addr = data.roadAddress;
      } else {
        addr = data.jibunAddress;
      }
          
      $("#addr").val(addr);
      $("#addr_dtl").val("");
      $("#addr_dtl").focus();
          }
      }).open();
  }
  // 주소데이터 나누기
  <?php if(isset($detail->id)) { ?>
  var fullAddress = '<?= $detail->address ?>';
  var splitAddress = fullAddress.split('/');
  
//   console.log(splitAddress[0]);
  var address1 = splitAddress[0];
  var address2 = splitAddress[1];
  
  document.querySelector('#addr').value = address1;
  document.querySelector('#addr_dtl').value = address2;
  
  <?php } ?>
  
  $('.summernote').summernote({
    height: 300,                 // 에디터 높이
    minHeight: null,             // 최소 높이
    maxHeight: null,             // 최대 높이
    focus: true,                  // 에디터 로딩후 포커스를 맞출지 여부
    lang: "ko-KR",					// 한글 설정
    placeholder: '최대 2048자까지 쓸 수 있습니다'
  });
  $('#successBtn').on('click', function() {
    var formData = new FormData();
    
    var title = $('#title').val();
    var moneytype = $('#moneytype').val();
    var money = $('#money').val();
    var addr = $('#addr').val();
    var addr_dtl = $('#addr_dtl').val();
    var address = addr + '/' + addr_dtl;
    var day = $('input[name="day[]"]:checked').map(function() {
      return this.value;
    }).get();
    var starttime = $('#starttime').val();
    var endtime = $('#endtime').val();
    var content = $('#content').val();
    var file = $('#file')[0].files[0];
    
    if(title == '') {
      alert('제목을 입력하세요.');
      return;
    }
    if(money == '') {
      alert('금액을 입력하세요');
      return;
    }
    if(addr == '') {
      alert('주소를 입력하세요.');
      return;
    }
    if(day == '') {
      alert('요일을 선택하세요.');
      return;
    }
    if(starttime == '') {
      alert('시작시간을 선택하세요');
      return;
    }
    if(endtime == '') {
      alert('종료시간을 선택하세요');
      return;
    }
    if(content == '') {
      alert('내용을 입력하세요');
      return;
    }
    if(!file) {
      alert('파일을 첨부하세요');
      return;
    }
    
    formData.append('title', title);
    formData.append('moneytype', moneytype);
    formData.append('money', money);
    formData.append('address', address);
    formData.append('day', day);
    formData.append('starttime', starttime);
    formData.append('endtime', endtime);
    formData.append('content', content);
    
    if (file) {
      formData.append('file', file);
    }
    $.ajax({
      type: 'post',
      url: '/jobs/<?= isset($detail->id) ? 'jobsmodify' : 'jobsadd' ?>/<?= isset($detail->id) ? $detail->id : '' ?>',
      data: formData,
      contentType: false,
      processData: false, // 중요: processData를 false로 설정
      dataType: 'json',
      success: function(res){
        console.log(res);        
        alert('등록되었습니다.');                 
        window.location.href = '/jobs/jobslist';
      },
      error: function(error){
        console.log(error);
      }
    });
    
  });
</script>