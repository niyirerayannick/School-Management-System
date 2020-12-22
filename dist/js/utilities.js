const  signUpButton = document.getElementById("signUp");
const  signInButton = document.getElementById("signIn");
const  container = document.getElementById("container");
signUpButton.addEventListener("click", () => 
container.classList.add('right-panel-active'));

signInButton.addEventListener("click", () => 
container.classList.remove('right-panel-active'));
/*
$("#signInBtn").click(function(){
    $("form").submit(function(event){
        event.preventDefault();
        let formData = $(this).serialize();
        $.post("login.php",formData)
    });

})
*/
function getContents(location){
    fetch(location)
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
  })
  }

function updateContents(location){
    fetch(location)
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
  })
  }
