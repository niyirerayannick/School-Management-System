


//declaring elements
let contentWrapper = document.querySelector('#content-wrapper'),
 navbar = document.querySelector('#navBar'),
 dashboard = document.querySelector("#dashboard"),
 Homedashboard = document.querySelector("#homeDashboard"),
 addStudent = document.querySelector('#addStudent'),
 viewStudents = document.querySelector('#viewStudents'),
 viewTeacher = document.querySelector('#viewTeachers'),
 viewClass = document.querySelector("#viewClasses"),
 addClass = document.querySelector("#addClass"),
 timetable = document.querySelector("#timeTable");

navbar.addEventListener("click",function(e){
  console.log(e.target.parentNode.id)
  if(e.target.parentNode.id == 'addhostel') {
		  addNewHostel();
      }
     else if(e.target.parentNode.id == 'viewHostels'){
      viewAllHostels();
      }
     else if(e.target.parentNode.id == 'calendar'){
      getCalendar();
      }  
      else if(e.target.parentNode.id == 'addTeacher'){
        addNewTeacher();
      }
      else if(e.target.parentNode.id == 'highPerformingStudents'){
        viewHighperformingStudents();
      }  
      else if(e.target.parentNode.id == 'ViewClassStream'){
        viewClassStream();
      } 
      else if(e.target.parentNode.id == 'viewExamResult'){
        viewExamResult();
      }  
      else if(e.target.parentNode.id == 'viewBookSubmission'){
        viewBookSubmission();
      } 
      else if(e.target.parentNode.id == 'lendNewBook'){
        lendNewBook();
      } 
      else if(e.target.parentNode.id == 'listEmployee'){
        viewAllEmployees();
      }
      else if(e.target.parentNode.id == 'addEmployee'){
        addNewEmployee();
      }
      else if(e.target.parentNode.id == 'addSubject'){
        addNewSubject();
      }
      else if(e.target.parentNode.id == 'viewSubjects'){
        viewSubjects();
      }
      else if(e.target.parentNode.id == 'recentFeesCollection'){
        viewFeesCollection();
      }
      else if(e.target.parentNode.id == 'changeFeesStructure'){
        changeFeeStructure();
      }
      else if(e.target.parentNode.id == 'viewFeesStructure'){
        viewFeesStructure();
      }
      else if(e.target.parentNode.id == 'addNewBank'){
        addNewBank();
      }
      else if(e.target.parentNode.id == 'viewBanks'){
        viewBanks();
      }
})

contentWrapper.addEventListener('click', function(e) {
	if(e.target.id == 'viewEvent') {
		getCalendar();
    }
    else if(e.target.id == 'listStudents') {
		viewAllStudents();
    }
    else if(e.target.id == 'listTeachers') {
		viewAllTeachers();
    }
    else if(e.target.id == 'listClasses') {
		viewAllClasses();
    }
    else if(e.target.id == 'listbanks') {
		viewAllBanks();
    }
    else if(e.target.id == 'listEmployees') {
		viewAllEmployees();
    }
    else if(e.target.id == 'listStudents2') {
		viewAllStudents();
    }
    else if(e.target.id == 'listHostels') {
      viewAllHostels();
    }
    else if(e.target.id == 'feesReport') {
      //set timeout for refreshing
      setTimeout(viewFeesCollection)
    }
    //add student submit button
    else if(e.target.id == 'addStudentBtn') {
      addNewStudent();
    }
    //add class submit btn
    else if(e.target.id == 'addClassBtn') {
      addNewClass();
    }
        //add new class from the view class
    else if(e.target.id == 'newClass') {
      getAddClass();
    }
        //add new class from the view class
   else if(e.target.id == 'newStudent') {
          getAddStudent();
    }
   else if(e.target.id == 'updateStudent') {
      updateStudent(e.target.value,'selectUpdateStudent');
    }
    else if(e.target.id == 'deleteStudent') {
      deleteStudent(e.target.value,'deleteStudentBtn');
    }
    else if(e.target.id == 'updateClass') {
      updateClass(e.target.value,'selectUpdateStudent');
    }
    else if(e.target.id == 'deleteClass') {
      deleteClass(e.target.value,'deleteStudentBtn');
    }
    else if( e.target.id == 'select2-studentClass-container') {
     //console.log(document.getElementById("select2-studentStream-container"));
     console.log(e.type);
    }
})

//adding event listeners
//student  handling event listeners
addStudent.addEventListener("click", getAddStudent);
viewStudents.addEventListener("click", viewAllStudents);

//teacher handling event listeners
viewTeacher.addEventListener('click', viewAllTeachers);

//classes handling events
viewClass.addEventListener("click", viewAllClasses)
addClass.addEventListener('click',getAddClass)

//time table 
timetable.addEventListener("click",getTimeTable)
//homepage
dashboard.addEventListener("click",loadDashboard)
Homedashboard.addEventListener("click",loadDashboard)


//defining function for handling events
//student handling methods
function getAddStudent(){
  fetch("students/addStudent.php")
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

function updateStudent(value,studentId){
  fetch("students/student-dm.php")
  .then(response =>  response.text())
  .then(html => {
      //contentWrapper.innerHTML = html
      let parser = new DOMParser();
      //let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      $.post("students/student-dm.php", {
        value: value,
        formId: studentId
      }, function(data){
        contentWrapper.innerHTML = data;
      })
        //Initialize Select2 Elements
        $('.select2').select2()
    
        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
})
}

function deleteStudent(value,studentId){
      //contentWrapper.innerHTML = html
      let parser = new DOMParser();
      //let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      $.post("students/student-dm.php", {
        value: value,
        formId: studentId
      },  function(data){
        // Display the returned data in browser
       if(data == 1){
              
        var Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 3000
        });
                    Toast.fire({
            icon: 'error',
            title: 'Student Deleted Successfully'
        });
          viewAllStudents();
       }else {
         contentWrapper.innerHTML = data;
       }
    });
}


function addNewStudent(){
  $("form").submit(function(event){
   // Stop form from submitting normally
   event.preventDefault();
   
   /* Serialize the submitted form control values to be sent to the web server with the request */
   let formValues = $(this).serialize();
   // Send the form data using post
   $.post("students/student-dm.php", formValues, function(data){
       // Display the returned data in browser
      if(data == 1){
             
       var Toast = Swal.mixin({
         toast: true,
         position: 'top',
         showConfirmButton: false,
         timer: 3000
       });
                   Toast.fire({
           icon: 'success',
           title: 'New Student Added Successfully'
       });
         viewAllStudents();
      }else {
        contentWrapper.innerHTML = data;
      }
   });
});
}

function viewAllStudents(){
    fetch("students/viewStudents.php")
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
  })
  }
function  viewHighperformingStudents(){
  fetch("students/viewHighPerformingStudents.php")
  .then(response =>  response.text())
  .then(html => {
      //contentWrapper.innerHTML = html
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
})
}
//teachers handling methods
function viewAllTeachers(){
    fetch("teachers/viewTeachers.php")
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
  })
  }
  
function addNewTeacher(){
    fetch("teachers/addTeacher.php")
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
  })
  }
//classes handling methods
function viewAllClasses(){
    fetch("class/viewClasses.php")
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
  })
  }
  function getAddClass(){
    fetch("class/addClass.php")
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
  })
  }
  function addNewClass(){
         $("form").submit(function(event){
          // Stop form from submitting normally
          event.preventDefault();
          
          /* Serialize the submitted form control values to be sent to the web server with the request */
          let formValues = $(this).serialize();
          // Send the form data using post
          $.post("class/class-dm.php", formValues, function(data){
              // Display the returned data in browser
             if(data == 1){
                    
              var Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000
              });
                          Toast.fire({
                  icon: 'success',
                  title: 'Class Added Successfully'
              });
                viewAllClasses();
             }
          });
      });
  }

  function viewClassStream(){
    fetch("viewStreams.php")
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
  })
  }

  function updateClass(value,classId){
    fetch("class/class-dm.php")
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        //let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        $.post("class/student-dm.php", {
          value: value,
          formId: studentId
        }, function(data){
          contentWrapper.innerHTML = data;
        })
          //Initialize Select2 Elements
          $('.select2').select2()
      
          //Initialize Select2 Elements
          $('.select2bs4').select2({
            theme: 'bootstrap4'
          })
  })
  }
  
  function deleteClass(value,classId){
    fetch("class/class-dm.php")
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        //let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        $.post("students/student-dm.php", {
          value: value,
          formId: studentId
        },  function(data){
          // Display the returned data in browser
         if(data == 1){
                
          var Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000
          });
                      Toast.fire({
              icon: 'error',
              title: 'Student Deleted Successfully'
          });
            viewAllStudents();
         }else {
           contentWrapper.innerHTML = data;
         }
      });
  })
  }
  //get list of Banks
  function viewAllBanks(){
    fetch('viewBanks.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
}

//get list of Employees
function viewAllEmployees(){
    fetch('viewEmployees.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
}

//get list of Hostels
function viewAllHostels(){
  fetch('viewHostels.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}
function addNewHostel(){
  fetch('addNewHostel.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

//get list of Fees Collection
function viewFeesCollection(){
  fetch('school-fees/viewFeesCollection.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function changeFeeStructure(){
  fetch("school-fees/changeFeesStructure.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function viewFeesStructure(){
  fetch("school-fees/ViewFeesStructure.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}
  //get calendar
  function getCalendar(){
      fetch('calendar_view.php')
      .then(response => response.text())
      .then(html =>{
          let parser = new DOMParser();
          let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
          contentWrapper.innerHTML = doc.innerHTML;
      })
  }

  //get time table
  function getTimeTable(){
    fetch('timetable.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
}

//load the homepage after clicking dashboard
function loadDashboard(){
    fetch("index2.php")
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
}

function viewExamResult(){
  fetch("viewExamResult.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function viewBookSubmission(){
  fetch("viewBookSubmission.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function lendNewBook(){
  fetch("lendNewBook.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function addNewEmployee(){
  fetch("addNewEmployee.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function addNewSubject(){
  fetch("subjects/addSubject.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function viewSubjects(){
  fetch("subjects/viewsubjects.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function viewBanks(){
  fetch("viewBanks.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function addNewBank(){
  fetch("addNewBank.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}