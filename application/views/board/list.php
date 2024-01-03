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
<!--   </section> -->
  <section class="section section2" id="boardListSection2">
    <div class="section-container">
      <div class="row mb-20 justify-content-between align-items-center">
        <div class="col-6">
          <form id="bd_search" method="get" action="/board/boardlist">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="검색어(제목)을 입력해주세요." name="search" id="search" aria-describedby="search-btn" value="<?= $this->input->get('search') ?>">
                <div class="input-group-append">
                  <button class="btn btn-success" type="submit" id="search-btn">검색</button>
                </div>  
            </div>
          </form>            
        </div>
        <div class="col-2 text-end">
          <a href="/board/boardcreate" class="btn btn-success">등록하기</a>  
        </div>
      </div>
      <table class="text-center">
        <colgroup>
          <col width="5%" />
          <col width="35%" />
          <col width="10%" />
          <col width="20%" />
          <col width="10%" />
          <col width="10%" />
          <col width="10%" />
        </colgroup>
        <thead>
          <th>번호</th>
          <th>제목</th>
          <th>글쓴이</th>
          <th>작성시간</th>
          <th>조회수</th>
          <th>수정</th>
          <th>삭제</th>
        </thead>
        <tbody>
          <?php if($search_term = $this->input->get('search')){ ?>
            <?php if (!empty($search)): ?>
                <?php foreach ($search as $slist): ?>
                    <tr>
                        <td><?= $slist->id ?></td>
                        <td><a href="/board/boarddetail/<?= $slist->id ?>"><?= $slist->title ?></a></td>
                        <td><?= $slist->nickname ?></td>
                        <td><?= $slist->created ?></td>
                        <td><?= $slist->hit?></td>
                        <td>
                            <?php
                            if ($slist->user_id == $this->session->userdata('userid')) {
                                echo '<a class="fw-bold" href="/board/boardcreate/' . $slist->id . '">수정</a>';
                            } else {
                                echo '<span>내글아님</span>';
                            }
                            ?>                  
                        </td>
                        <td><a class="fw-bold" href="/board/boarddelete/<?= $slist->id ?>">삭제</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php elseif(empty($search)): ?>
            <tr><td colspan="7">검색결과가 없습니다.</td></tr>                
            <?php endif; ?>    
          <?php } else { ?>
            <?php foreach($list as $entry): ?>
                    <tr>
                        <td><?= $entry->id ?></td>
                        <td><a href="/board/boarddetail/<?= $entry->id ?>"><?= $entry->title ?></a></td>
                        <td><?= $entry->nickname ?></td>
                        <td><?= $entry->created ?></td>
                        <td><?= $entry->hit?></td>
                        <td>
                            <?php
                            if ($entry->user_id == $this->session->userdata('userid')) {
                                echo '<a class="fw-bold" href="/board/boardcreate/' . $entry->id . '">수정</a>';
                            } else {
                                echo '<span>내글아님</span>';
                            }
                            ?>                  
                        </td>
                        <td><a class="fw-bold" href="/board/boarddelete/<?= $entry->id ?>">삭제</a></td>
                    </tr>
                <?php endforeach; ?>
          <?php } ?>                  
        </tbody>        
      </table>
      <nav aria-label="Page navigation example" class="text-center">
        <ul class="pagination">
          <?= $pagination_links; ?>          
        </ul>
      </nav>
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
<script>
  
</script>