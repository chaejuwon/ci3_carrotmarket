<style>
  .hide {
    display:none;
  }
  .show {
    display:block;
  }
</style>
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
          <h2>게시판</h2>
        </div>
      </div>
      <div class="social-feed-separated">
          <div class="social-avatar">
              <a href="javascript:">
                  <img alt="image" src="/html/images/profile_small.jpg">
              </a>
          </div>
          <div class="social-feed-box">
              <div class="social-avatar">
                  <a href="#"><?= $detail->title ?></a>
                  <small class="text-muted d-inline-block ml-5"><?= $detail->created ?></small>
              </div>
              <div class="social-body">
                  <p><?= $detail->content ?></p>
                  <div class="btn-group">
                      <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up fs-5"></i> Like this!</button>
                      <button class="btn btn-white btn-xs"><i class="fa fa-comments fs-5"></i> Comment</button>
                      <button class="btn btn-white btn-xs"><i class="fa fa-share fs-5"></i> Share</button>
                  </div>
              </div>
              <div class="social-footer comment">
                  <div class="comment-wrap"></div>
                  <div class="social-comment">
                      <a href="" class="float-start">
                          <img alt="image" src="/html/images/profile_small.jpg">
                      </a>
                      <div class="media-body">
                          <input type="hidden" name="board_id" class="board_id" id="board_id" data-board="<?= $detail->id ?>" value="<?= $detail->id ?>">
                          <textarea class="chat-area comment" rows='6' id="comment" data-comment="<?= $detail->id ?>" name="comment"></textarea>    
                          <a href="javascript:" style="width:100%" id="chatBtn" data-click="<?= $detail->id ?>" class="btn full-btn btn-success chatBtn">게시</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
<!--       
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
      <div class="comment-wrap"></div>
      </div> -->
      <div class="row mt-30 align-items-start">
        <div class="col-1">
          <img alt="image" class="rounded-circle" src="/html/images/profile_small.jpg">
        </div>
        <div class="col-11">
          <div class="row">
            <form>
              <div class="col-12">
                <input type="hidden" name="board_id" class="board_id" id="board_id" data-board="<?= $detail->id ?>" value="<?= $detail->id ?>">
                <textarea class="chat-area comment" rows='6' id="comment" data-comment="<?= $detail->id ?>" name="comment"></textarea>    
              </div>
              <div class="col-12 d-grid gap-2">
                <a href="javascript:" id="chatBtn" data-click="<?= $detail->id ?>" class="btn full-btn btn-success chatBtn">게시</a>
              </div>  
            </form>            
          </div>          
        </div>
      </div>
      <div class="row mt-30">        
        <div class="col-12 text-end">
          <a class="btn btn-w-m btn-success" href="/board/boardlist">목록</a>
        </div>
      </div>
    </div> -->
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
<script>
// 서버로 데이터 전송
$('.chatBtn').on('click', function() {
  var dataBoard = $(this).data('click');
  var comment = $('.comment[data-comment="' + dataBoard + '"]').val();
  var board_id = $('.board_id[data-board="' + dataBoard + '"]').val();
  $.ajax({
    type:'post',
    url:'/board/commentadd',
    data: {
      'comment' : comment,
      'board_id' : board_id
    },
    datatype: 'json',
    success: function(res) {
        $('#comment').val('');
      
        // 비동기 처리   
        commentFn();
        alert('등록완료');
    },
    error: function(error) {
      console.log(error);
    }
  });
});



function commentFn() {
  var board_id = '<?= $detail->id ?>';

  $.ajax({
    type:'post',
    url:'/board/commentajax/<?= $detail->id ?>',
    data: {
      'id' : board_id
    },
    datatype:'json',
    success: function(res) {
      var comment = $('.comment-wrap');
      var list = '';
      res.data.forEach(function(item, idx) {    
        console.log(item);
        if(item.parent_id == null) { 
        list +=      '<div class="social-comment">';
        list +=           '<a href="" class="float-start">';
        list +=               '<img alt="image" src="/html/images/profile_small.jpg">';
        list +=           '</a>';
        list +=           '<div class="media-body">';
        list +=               '<a href="#" class="fw-bold mr-5">' + item.nickname + '</a>';
        list +=               '' + item.comment + '';
        list +=               '<br>';
        list +=               '<a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> -';
        list +=               '<small class="text-muted">' + item.created + '</small>';
        list +=           '</div>';        
        }
        if (Array.isArray(res.data)) {
          for (const items of res.data) {
            if(items.parent_id === item.cId) {
        list +=      '<div class="social-comment">';
        list +=          '<a href="" class="float-start">';
        list +=              '<img alt="image" src="/html/images/profile_small.jpg">';
        list +=          '</a>';
        list +=          '<div class="media-body">';
        list +=              '<a href="#" class="mr-5 fw-bold">' + items.title + '</a>';
        list +=              '' + items.comment + '';
        list +=              '<br>';
        list +=              '<a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> -';
        list +=              '<small class="text-muted">' + items.created + '</small>';
        list +=          '</div>';
        list +=        '</div>';
            }
          }
        }       
        list +=         '<div class="social-comment">';    
        list +=           '<a href="" class="float-start">';
        list +=             '<img alt="image" src="/html/images/profile_small.jpg">';
        list +=           '</a>';
        list +=           '<div class="media-body">';
        list +=             '<input type="hidden" class="parent_id" name="parent_id" data-parent="' + item.id + '" value="' + item.cId + '">';
        list +=             '<input type="hidden" class="board_id" name="board_id" data-board="' + item.id + '" value="<?= $detail->id ?>">';
        list +=             '<textarea class="chat-area subcomment" rows="2" data-comment="' + item.id + '" name="comment"></textarea>';
        list +=             '<a href="javascript:" style="width:100%" id="subChatBtn" data-click="' + item.id + '" class="btn btn-success subChatBtn">등록</a>';
        list +=            '</div>';
        list +=         '</div></div>';                                                                                          
       });
       comment.html(list);
//         if(item.parent_id == null) { 
//           list += '<div class="row mt-30">';
//           list +=  '<div class="col-11 offset-1">';
//           list +=    '<div class="ibox no-margins">';
//           list +=      '<div class="ibox-content">';
//           list +=        '<div class="row align-items-center">';
//           list +=          '<div class="col-2"><img alt="image" class="rounded-circle" src="/html/images/profile_small.jpg"><span class="d-inlin-block ml-10">글쓴이</span></div>';
//           list +=          '<div class="col-8"><p class="no-margins">' + item.comment + '</p></div>';
//           list +=          '<div class="col-2 d-grid align-items-center"><a href="javascript:" class="toggle-btn btn btn-success">답글등록</a></div>';
//           list +=        '</div>';   
//         }
//         if (Array.isArray(res.data)) {
//           for (const items of res.data) {
//             if(items.parent_id === item.id) {
//               list += '<div class="row align-items-center mt-20">';
//               list +=   '<div class="col-2 offset-1"><img alt="image" class="rounded-circle" src="/html/images/profile_small.jpg"><span class="d-inlin-block ml-10">답변</span></div>';
//               list +=   '<div class="col-9"><p class="no-margins">' + items.comment + '</p></div>';
//               list += '</div>';
//             }
//           }
//         }
//         list +=        '<div class="toggle-area col-12 mt-20 hide">';
//         list +=          '<div class="row">';
//         list +=            '<div class="col-11">';
//         list +=                '<input type="hidden" class="parent_id" name="parent_id" data-parent="' + item.id + '" value="' + item.id + '">';
//         list +=                '<input type="hidden" class="board_id" name="board_id" data-board="' + item.id + '" value="<?= $detail->id ?>">';
//         list +=                '<textarea class="chat-area subcomment" rows="2" data-comment="' + item.id + '" name="comment"></textarea>';
//         list +=            '</div>';
//         list +=            '<div class="col-1 d-grid align-items-center">';
//         list +=              '<a href="javascript:" id="subChatBtn" data-click="' + item.id + '" class="btn btn-success subChatBtn">등록</a>';
//         list +=            '</div></div></div></div></div></div></div>';
//         list +=        '</div>';                                                                                            
//       });
//              comment.html(list);


      $('.toggle-btn').on('click', function(){
        alert('123');
        $(this).closest('.social-feed-box').find('.toggle-area').toggleClass('hide');
      });
        
        $('.subChatBtn').on('click', function() {
        var dataSubBoard = $(this).data('click');
        var comment = $('.subcomment[data-comment="' + dataSubBoard  + '"]').val();
        var parent_id = $('.parent_id[data-parent="' + dataSubBoard + '"]').val();
        var board_id = $('.board_id[data-board="' + dataSubBoard + '"]').val();

        $.ajax({
          type:'post',
          url:'/board/subcommentadd',
          data: {
            'comment' : comment,
            'board_id' : board_id,
            'parent_id' : parent_id
          },
          datatype: 'json',
          success: function(res) {
            $('.subcomment').val('');

            // 비동기 처리       
            commentFn();
            alert("답글등록");     
          },
          error: function(error) {
            console.log(error);
          }
        });
      });
      },
      error: function(error, status) {
        console.log(res + '-' + status);
      }
    });
  }

commentFn();

</script>