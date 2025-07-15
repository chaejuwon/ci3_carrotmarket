<style>
	.hide {
		display: none;
	}
	.show {
		display: block;
	}
</style>
<main id="main">
	<section class="section section1" id="boardDetailSection1">
		<div class="section-container">
			<div class="row no-margins align-items-center">
				<div class="col-md-6 p-md">
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
							<a href="#" class="float-start">
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

			<!-- 공통 답글 입력 폼 -->
			<div id="replyFormTemplate" class="reply-form hide">
				<textarea class="chat-area subcomment" rows="2"></textarea>
				<a href="javascript:" class="btn btn-success subChatBtn">답글 등록</a>
			</div>

			<div class="row mt-30">
				<div class="col-12 text-end">
					<a class="btn btn-w-m btn-success" href="/board/boardlist">목록</a>
				</div>
			</div>
		</div>
	</section>
</main>

<script>
	$('.chatBtn').on('click', function () {
		var dataBoard = $(this).data('click');
		var comment = $('.comment[data-comment="' + dataBoard + '"]').val();
		var board_id = $('.board_id[data-board="' + dataBoard + '"]').val();
		$.ajax({
			type: 'post',
			url: '/board/commentadd',
			data: {
				'comment': comment,
				'board_id': board_id
			},
			success: function (res) {
				$('#comment').val('');
				commentFn();
				alert('등록완료');
			},
			error: function (error) {
				console.log(error);
			}
		});
	});

	function commentFn() {
		var board_id = '<?= $detail->id ?>';

		$.ajax({
			type: 'post',
			url: '/board/commentajax/<?= $detail->id ?>',
			data: { id: board_id },
			success: function (res) {
				var comment = $('.comment-wrap');
				var list = '';

				res.data.forEach(function (item) {
					if (item.parent_id == null) {
						// 1. 부모 댓글 렌더링
						list += '<div class="social-comment" data-id="' + item.cId + '">';
						list += '  <a href="#" class="float-start"><img src="/html/images/profile_small.jpg" alt="image"></a>';
						list += '  <div class="media-body">';
						list += '    <a href="#" class="fw-bold mr-5">' + item.nickname + '</a>' + item.comment + '<br>';
						list += '    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> Like</a> - <small class="text-muted">' + item.created + '</small><br>';
						list += '    <a href="javascript:" class="reply-toggle-btn" data-id="' + item.cId + '">답글 달기</a>';
						list += '    <div class="reply-slot" data-slot="' + item.cId + '"></div>';

						// 2. 이 부모 댓글에 해당하는 자식들만 필터링해서 그 안에 바로 붙임
						res.data.forEach(function (child) {
							if (child.parent_id == item.cId) {
								list += '    <div class="social-comment ms-4">';
								list += '      <a href="#" class="float-start"><img src="/html/images/profile_small.jpg" alt="image"></a>';
								list += '      <div class="media-body">';
								list += '        <a href="#" class="fw-bold mr-5">' + child.nickname + '</a>' + child.comment + '<br>';
								list += '        <a href="#" class="small"><i class="fa fa-thumbs-up"></i> Like</a> - <small class="text-muted">' + child.created + '</small>';
								list += '      </div>';
								list += '    </div>';
							}
						});

						list += '  </div>';
						list += '</div>';
					}
				});

				comment.html(list);

				// 댓글을 다시 그렸으므로 replyFormTemplate도 다시 body에 붙임
				if ($('#replyFormTemplate').length === 0) {
					$('body').append(`
						  <div id="replyFormTemplate" class="reply-form hide">
								<textarea class="chat-area subcomment" rows="2"></textarea>
							<a href="javascript:" class="btn btn-success subChatBtn">답글 등록</a>
						  </div>
					`);
				}
			},
			error: function (error) {
				console.log(error);
			}
		});
	}

	// 답글 폼 이동 및 등록 처리
	$(document).on('click', '.reply-toggle-btn', function () {
		const id = $(this).data('id');
		const slot = $('.reply-slot[data-slot="' + id + '"]');
		const template = $('#replyFormTemplate');
		$('#replyFormTemplate .subcomment').val('');
		$('#replyFormTemplate .subChatBtn').data('parent-id', id);
		slot.append($('#replyFormTemplate'));
		$('#replyFormTemplate').removeClass('hide');
	});

	$(document).on('click', '.subChatBtn', function () {
		const parent_id = $(this).data('parent-id');
		const comment = $('#replyFormTemplate .subcomment').val();
		const board_id = '<?= $detail->id ?>';

		$.post('/board/subcommentadd', {
			comment: comment,
			parent_id: parent_id,
			board_id: board_id
		}, function (res) {
			$('#replyFormTemplate .subcomment').val('');
			commentFn();
			alert('답글이 등록되었습니다');
		});
	});

	commentFn();
</script>
