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
  //console.log(e.target.parentNode.id)
  if(e.target.parentNode.id == 'addhostel') {
		  getAddHostel();
      }
     else if(e.target.parentNode.id == 'viewHostels'){
      viewAllHostels();
      }
      else if(e.target.parentNode.id == 'libraryStatus'){
        getLibraryStatus();
        }
     else if(e.target.parentNode.id == 'calendar'){
      getCalendar();
      }  
    
      else if(e.target.parentNode.id == 'timetable') {
        getTimeTable();
      }
      else if(e.target.parentNode.id == 'addTeacher'){
       getAddNewTeacher();
      }
      else if(e.target.parentNode.id == 'highPerformingStudents'){
        viewHighperformingStudents();
      }  
      else if(e.target.parentNode.id == 'ViewClassStream'){
        viewClassStream();
      } 

      else if(e.target.parentNode.id == 'viewExams'){
           getContents("exam/exams.php");
      } 
      else if(e.target.parentNode.id == 'viewFees'){
        getContents("school-fees/viewFeesCollection.php");
      }
      else if(e.target.parentNode.id == 'viewSubject'){
        getContents("subjects/viewSubjects.php");
      }
      else if(e.target.parentNode.id == 'viewStudents'){
        getContents("students/viewStudents.php");
      }
      else if(e.target.parentNode.id == 'dashboard'){
        getContents("index2.php");
      }
      else if(e.target.parentNode.id == 'viewBanks'){
        getContents("viewBanks.php");
      }
      else if(e.target.parentNode.id == 'viewSubjects'){
        viewSubjects();
      }
      else if(e.target.parentNode.id == 'recentFeesCollection'){
        viewFeesCollection();
      }
      else if(e.target.parentNode.id == 'changeFeesStructure'){
        getChangeFeeStructure();
      }
      else if(e.target.parentNode.id == 'viewFeesStructure'){
        viewFeesStructure();
      }   
})

contentWrapper.addEventListener('click', function(e) {
 /* console.log(e.target.value);
 let target = e.target.id;
 switch (target) {
   case "viewEvent":
    getCalendar();
     break;
   case "viewEvent":
      getCalendar();
    break;   
    case "viewEvent":
      getCalendar();
    break;
   default:
     console.log('no target');
     break;
 }
*/
	if(e.target.id == 'viewFees') {
		getContents("school-fees/viewFeesCollection.php");
    }
  
        //displaying image as a modal when a user clicks on it
        else if(e.target.id == 'myImg') {
          // Get the modal
          var modal = document.getElementById("myModal");
          var modalImg = document.getElementById("img01");
    
          modal.style.display = "block";
          modalImg.src = e.target.src;
    
           // Get the image and insert it inside the modal - use its "alt" text as a caption
          var img = document.getElementById("myImg");
          var modalImg = document.getElementById("img01");
          var captionText = document.getElementById("caption");
          }
    
         else if(e.target.className == 'close'){
         // When the user clicks on <span> (x), close the modal
          var modal = document.getElementById("myModal");
           modal.style.display = "none";
         }

         
    else if(e.target.id == 'listStudents') {
		viewAllStudents();
    }
    else if(e.target.id == 'viewStudentDetails') {

      viewStudentDetails(e.target.value,'viewStudentDetailsBtn');
    }  

    else if(e.target.id == 'listClasses') {
      viewAllClasses();
    }
 


    else if(e.target.id == 'listTeachers') {
		viewAllTeachers();
    }


    else if(e.target.id == 'listbanks') {
		viewAllBanks();
    }
    else if(e.target.id == 'listEmployees') {
		viewAllEmployees();
    }
    

    else if(e.target.id == 'listHostels') {
      viewAllHostels();
    }
    else if(e.target.id == 'viewExamResultHome'){
       viewExam();
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
Homedashboard.addEventListener("click",getContents("index2.php"))

document.getElementById('classAttendanceHome').addEventListener("click",getClassAttendance)

