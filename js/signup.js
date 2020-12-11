function signup() {
    var userID = document.getElementById('input_em').value;
    var userPW = document.getElementById('input_pw').value;

    firebase.auth().createUserWithEmailAndPassword(userID, userPW)
    .then((user) => {
        location.href = "login.html";
    })
    .catch((error) => {
        var errorCode = error.code;
        var errorMessage = error.message;
        console.log(errorCode + " : " +errorMessage);
    });
}