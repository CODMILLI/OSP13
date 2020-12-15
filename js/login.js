firebase.auth().onAuthStateChanged(function(user) {
    var user_name = document.getElementById('user-name');
    var b=document.getElementById("frame");
    if (user) {
        console.log("Alright!");

        var user = firebase.auth().currentUser;

        if (user) {
          b.src="php/home.php?user="+user.email;
            user_name.innerHTML = user.email;
        } else {
        // No user is signed in.
        }
    } else {
        console.log("Damn...");
    }
  });

function login() {
    var userID = document.getElementById('input_id').value;
    var userPW = document.getElementById('input_pw').value;

    firebase.auth().signInWithEmailAndPassword(userID, userPW)
    .then((user) => {
        location.href = "realindex.php?user="+userID;
    })
    .catch((error) => {
        var errorCode = error.code;
        var errorMessage = error.message;
        console.log(errorCode + " : " +errorMessage);
    });

}

function logout() {
    firebase.auth().signOut().then(function() {
        location.href = "login.html";
      }).catch(function(error) {
        alert("failed to logout.");
      });
}
