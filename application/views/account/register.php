<main id="main">
  <section class="section section1" id="login">
    <div class="section-container">
      <div class="w-800 m-auto pt-30 pb-30">
        <h2 class="fs-1 text-center font-bold font-orange mb-30">회원가입</h2>
        <?php echo validation_errors(); ?>
        <form class="m-t" role="form" action="/auth/register" method="post">
          <div class="form-group row">
            <label class="col-2 text-right p-xs">이메일 <span class="text-danger">* </span></label>
            <div class="col-10">
                <input type="text" id="email" name="email" class="form-control p-sm" value="<?php echo set_value('email'); ?>" placeholder="아이디를 입력해주세요.">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-2 text-right p-xs">비밀번호 <span class="text-danger">* </span></label>
            <div class="col-10">
                <input type="password" id="password" name="password" class="form-control p-sm" value="<?php echo set_value('password'); ?>" placeholder="비밀번호를 입력해주세요.">
            </div>
          </div>
            <div class="form-group row">
            <label class="col-2 text-right p-xs">비밀번호 확인<span class="text-danger">* </span></label>
            <div class="col-10">
                <input type="password" id="re_password" name="re_password" class="form-control p-sm" value="<?php echo set_value('re_password'); ?>" placeholder="비밀번호를 입력해주세요.">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-2 text-right p-xs">닉네임 <span class="text-danger">* </span></label>
            <div class="col-10">
                <input type="text" id="nickname" name="nickname" class="form-control p-sm" value="<?php echo set_value('nickname'); ?>" placeholder="닉네임을 입력해주세요">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-2 text-right p-xs">휴대폰번호 <span class="text-danger">* </span></label>
            <div class="col-10">
                <input type="text" id="phone" name="phone" class="form-control p-sm" value="<?php echo set_value('phone'); ?>" placeholder="휴대폰번호를 입력해주세요">
            </div>
          </div>
          <hr class="hr-line border-danger">
          <div class="form-group row">
            <div class="col-12 text-center">
                <button class="btn btn-warning btn-xl" id="signUp">가입하기</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</main>