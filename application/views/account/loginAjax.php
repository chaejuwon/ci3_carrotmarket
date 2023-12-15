<main id="main">
  <section class="section section1" id="login">
    <div class="section-container">
      <div class="middle-box">
        <div>          
            <h2 class="fs-1 text-center font-bold font-orange mb-30">당근마켓 로그인</h2>
            <form class="m-t">
                <div class="form-group">
                    <input type="text" id="email" name="email" class="form-control login-padding" placeholder="이메일을 입력해주세요" required="">
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control login-padding" placeholder="비밀번호를 입력해주세요" required="">
                </div>
                <a class="d-inline-block mb-10" href="#"><small>비밀번호를 잊어버리셨나요?</small></a>
                <button class="btn btn-warning block full-width m-b login-padding" id="loginBtn">로그인</button>
                <a class="btn btn-white block full-width m-b login-padding" href="/main/register">회원가입</a>   
            </form>
          </div>
        </div>
    </div>
  </section>
</main>

<script>

$('#loginBtn').submit(function() {
  var email = $('#email').val();
  var password = $('#password').val();
  
  $.ajax({
    type : 'post',
    url : '/auth/authentication',
    dataType : 'json',
    data : {
      "email" : email,
      "password" : password
    },
    success: function(res) {
      if(email == '') {
        alert('이메일을 입력해주세요.');
        return;
      }
      if(password == '') {
        alert('비밀번호를 입력해주세요.')
        return;
      }
      console.log(res);
      if(res.state == 'success'){
        alert('데이터 전송 완료');
      }
    },
    error : function(error) {
      alert('ajax통신 실패');
    }
  })
  
})  
  

  

</script>