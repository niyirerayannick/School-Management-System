//declaring elements
let contentWrapper = document.querySelector('#content-wrapper'),
 navbar = document.querySelector('#navBar'),
 addStudent = document.querySelector('#addStudent'),
 viewStudents = document.querySelector('#viewStudents'),
 viewTeacher = document.querySelector('#viewTeachers'),
 viewClass = document.querySelector("#viewClasses"),
 addClass = document.querySelector("#addClass"),
 timetable = document.querySelector("#timeTable");

//console.log(document.querySelector("#top-nav"));

 document.querySelector("#top-nav").addEventListener("click", e =>{
  // console.log(e.target.id)
  switch(e.target.id){
    case 'requestLeave':
      getRequestLeave();    //Date range as a button

     break;
     case 'classAttendanceHome':
      getContents("class/makeClassAttendance.php");
     break;
     case 'homeDashboard':
      getContents("index2.php");
     break;
  }
});

navbar.addEventListener("click",function(e){
  let target = e.target.parentNode;
    console.log(target)
  switch (target.id) {
    case  'dashboard':  
    getContents("index2.php"); 
    break;
    case  'highPerformingStudents':  
      getContents("students/viewHighPerformingStudents.php"); 
      break;
    case  'ViewClassStream':
      getContents("class/viewStreams.php");
      break;
    case  'viewExamResult':
      getContents("exam/viewExamResult.php");
      break;
    case 'viewExamCategories':
      getContents("exam/viewExamCategories.php"); 
      break;
    case 'leaveManagement':
      getContents("hr/leaveIndex.php");
      break;
    case  'addSubject':  
      getContents("subjects/addSubject.php"); 
      break;
    case  'viewSubjects':
      getContents("subjects/viewSubjects.php");
      break;
    case  'recentFeesCollection':
      getContents("school-fees/viewFeesCollection.php");
      break;
    case 'viewFeesStructure':
      getContents("school-fees/viewFeesStructure.php"); 
      break;
    case 'changeFeesStructure':
      getContents("school-fees/changeFeesStructure.php"); 
      break; 
    case  'addNewBank':
      getContents("banks/addNewBank.php");
      break;
    case 'viewBanks':
      getContents("banks/viewBanks.php"); 
      break;  
    case 'viewClasses':
      getContents("class/viewClasses.php"); 
      break;   
    case 'viewStudents':
      getContents("students/viewStudents.php"); 
      break; 
    case 'addExamResult':
        getContents("exam/addExamResult.php"); 
      break; 
    case 'timeTable':
        getContents("viewAllTimeTables.php"); 
      break;   
      case 'calendar':
       getCalendar();
      break;
    default:
      break;
  }
  
})


contentWrapper.addEventListener('click', function(e) {
 // console.log(e.target.value);
	if(e.target.id == 'viewEvent') {
	  	getCalendar();
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

    else if(e.target.id == 'checkAll'){
      let checkbox = document.querySelectorAll("input[value ='1']");
      let dangerBox = document.querySelectorAll("input[value ='0']");
   
       for(let i =0 ; i<checkbox.length ;i++){
         checkbox[i].checked=true
         dangerBox[i].checked = false;
       }
        }
    else if(e.target.id == 'unCheckAll'){
      let checkbox = document.querySelectorAll("input[value ='1']");
      let dangerBox = document.querySelectorAll("input[value ='0']");

      for(let i =0 ; i<checkbox.length ;i++){
        checkbox[i].checked=false;
        dangerBox[i].checked = false;
      }
    }
        
    else if(e.target.type == 'checkbox'){
           console.log(e.target.type)
           disableCheckbox(e.target);
        } 
    else if(e.target.id == 'selectClassAttendance'){
      getAttandanceTable();
      }

    else if(e.target.id == 'makeAttendanceTable'){
      makeAttendanceTable();
      }

      else if(e.target.id == 'viewSubjectsHome') {
        getContents('subjects/viewSubjects.php');
        }
      
    else if(e.target.id == 'listStudents') {
		viewAllStudents();
    }

    else if(e.target.id == 'listStudents2') {
      //document.querySelector("#loading").style.display = 'block';
      viewAllStudents();
      }
    else if(e.target.id == 'viewStudentDetails') {

      viewStudentDetails(e.target.value,'viewStudentDetailsBtn');
    }  

    //add class submit btn
   else if(e.target.id == 'addExamResultBtn') {
        addExamResult();
     }
    //add new class from the view class
   else if(e.target.id == 'newClass') {
   getAddClass();
   }
   else if(e.target.id == 'updateClass') {
   selectUpdateClass(e.target.value,'selectUpdateClass');
    }

    else if(e.target.id == 'listClasses') {
      viewAllClasses();
    }

    else if(e.target.id == 'viewClassesHome') {
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
    else if(e.target.id == 'feesReport') {
      //set timeout for refreshing
      setTimeout(viewFeesCollection)
    }
   



    else if(e.target.id == 'viewTimeTables') {
      getViewTimeTables();
    }
    else if(e.target.id == 'newTimeTable') {
      getTimeTable();
    }
    /*else if(e.target.id == 'updateTimeTable') {
      selectUpdateLibrary(e.target.value,'selectUpdateBook');
    }
    else if(e.target.id == 'deleteLibrary') {
      deleteLibrary(e.target.value,'deleteLibraryBtn');
    }
    else if(e.target.id == 'updateLibraryBtn') {
      updateLibrary();
    }
*/

    else if( e.target.id == 'select2-studentClass-container') {
     //console.log(document.getElementById("select2-studentStream-container"));
     console.log(e.type);
    }
})

//adding event listeners
//student  handling event listeners
addStudent.addEventListener("click", getAddStudent);
//viewStudents.addEventListener("click", () =>    getContents("teachers/viewTeachers.php"));

//teacher handling event listeners
viewTeacher.addEventListener('click', viewAllTeachers);

//classes handling events
viewClass.addEventListener("click", viewAllClasses)
addClass.addEventListener('click',getAddClass)
//time table 
timetable.addEventListener("click",getTimeTable)


