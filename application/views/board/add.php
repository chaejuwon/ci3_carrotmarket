<main id="main">
  <section class="section section1" id="boardListSection1">
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
  <section class="section section2" id="boardListSection2">
    <h3 class="fs-2 text-center mb-30 font-bold">게시판 글 <?= isset($detail->id) ? '수정' : '등록' ?>하기</h2>
    <div class="detail-container">       
      <form class="form" id="boardForm" action="" method="post">
<!--         <input type="hidden" name="id" value="<?= $detail->user_id ?>"> -->
        
        <div class="form-group row">
          <label class="col-2 text-right p-xs">제목 <span class="text-danger">* </span></label>
          <div class="col-10">
              <input type="text" id="title" name="title" class="form-control p-sm" value="<?= isset($detail->title) ? $detail->title : '' ?>" placeholder="제목을 입력해주세요..">
          </div>
        </div>  
<!--         <div class="form-group row">
          <label class="col-2 text-right p-xs">작성자 <span class="text-danger">* </span></label>
          <div class="col-10">
              <input type="text" id="name" name="name" class="form-control p-sm" value="<?= isset($detail->name) ? $detail->name : '' ?>" placeholder="작성자명을 입력해주세요.">
          </div>
        </div>   -->
        <div class="form-group row">
          <label class="col-2 text-right p-xs">내용 <span class="text-danger">* </span></label>
          <div class="col-10">
<!--             <div id="summernote" name="content"></div> -->
              <textarea id="content" name="content" class="summernote" placeholder="내용을 입력해주세요." cols="30" rows="4"><?= isset($detail->content) ? $detail->content : '' ?></textarea>
          </div>
        </div>
        <hr class="mb-30 mt-30">
        <div class="row">
          <div class="col-12 text-end">
            <a id="successBtn" class="btn btn-success btn-w-m"><?= isset($detail->id) ? '수정' : '등록' ?></a>
          </div>
        </div>
      </form>      
    </div>
  </section>
<script>
  $('.summernote').summernote({
    height: 300,                 // 에디터 높이
    minHeight: null,             // 최소 높이
    maxHeight: null,             // 최대 높이
    focus: true,                  // 에디터 로딩후 포커스를 맞출지 여부
    lang: "ko-KR",					// 한글 설정
    placeholder: '최대 2048자까지 쓸 수 있습니다'
  });
  
  $('#successBtn').on('click', function() {
    var datas = $("#boardForm").serialize();
    
    $.ajax({
      type: 'post',
      url: '/board/<?= isset($detail->id) ? 'boardupdate' : 'boardadd' ?>/<?= isset($detail->id) ? $detail->id : '' ?>',
      data: datas,
      dataType: 'json',
      success: function(res){
        console.log(res);        
        alert('<?= isset($detail->id) ? '수정' : '등록' ?>되었습니다.');                 
        window.location.href = '/board/boardlist';
      },
      error: function(error){
        console.log(error);
      }
    });
    
  });
</script>