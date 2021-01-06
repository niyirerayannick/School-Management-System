const  signUpButton = document.getElementById("signUp");
const  signInButton = document.getElementById("signIn");
const  container = document.getElementById("container");
signUpButton.addEventListener("click", () => 
container.classList.add('right-panel-active'));

signInButton.addEventListener("click", () => 
container.classList.remove('right-panel-active'));

function getContents(location){
    fetch(location)
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
       theme: 'bootstrap4'
      })
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
