firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      console.log("Alright!");
    } else {
        console.log("Damn...");
    }
  });

function login() {
    var userID = document.getElementById('input_id').value;
    var userPW = document.getElementById('input_pw').value;

    firebase.auth().createUserWithEmailAndPassword(userID, userPW)
    .then((user) => {
        alert(userID + " " + userPW);
    })
    .catch((error) => {
        var errorCode = error.code;
        var errorMessage = error.message;
        console.log(errorCode + " : " +errorMessage);
    });

    
}
