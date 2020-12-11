function validate() {
    var re = /^[a-zA-Z0-9]{6,12}$/ // 아이디와 패스워드가 적합한지 검사할 정규식
    var re2 = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
    // 이메일이 적합한지 검사할 정규식

    var id = document.getElementById("id");
    var pw = document.getElementById("pw");
    var em = document.getElementById("em");
    var warning = document.getElementById("warning");


    if(!check(re,id,"아이디는 6~12자의 영문 대소문자와 숫자로만 입력해주세요")) {
        return false;
    }

    if(!check(re,pw,"패스워드는 6~12자의 영문 대소문자와 숫자로만 입력해주세요")) {
        return false;
    }


    if(em.value=="") {
        alert("이메일을 입력해 주세요");
        em.focus();
        return false;
    }

    if(!check(re2, em, "올바르지 않은 이메일 형식입니다.")) {
        return false;
    }

 function check(re, what, message) {
  if(re.test(what.value)) {
      return true;
  }
  alert(message);
  what.value = "";
  what.focus();
 }

    firebase.auth().createUserWithEmailAndPassword(em.value, pw.value)
    .then((user) => {
        location.href = "login.html";
    })
    .catch((error) => {
        var errorCode = error.code;
        var errorMessage = error.message;
        if(errorCode == 'auth/email-already-in-use') {
            warning.innerHTML = "이미 사용중인 이메일입니다.";
        }
        console.log(errorCode + " : " +errorMessage);
    });
}


