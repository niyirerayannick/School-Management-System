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
        getlendNewBook();
      } 
      else if(e.target.parentNode.id == 'listEmployee'){
        viewAllEmployees();
      }
      else if(e.target.parentNode.id == 'addEmployee'){
        addNewEmployee();
      }
      else if(e.target.parentNode.id == 'leaveManagement'){
        getLeaveManagement();
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
 // console.log(e.target.value);
	if(e.target.id == 'viewEvent') {
		getCalendar();
    }
  
    else if(e.target.id == 'listStudents') {
		viewAllStudents();
    }
     //add student submit button
     else if(e.target.id == 'addStudentBtn') {
      addNewStudent();
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
    else if(e.target.id == 'listStudents2') {
      document.querySelector("#loading").style.display = 'block';
      //viewAllStudents();
      }
    else if(e.target.id == 'viewStudentDetails') {

      viewStudentDetails(e.target.value,'viewStudentDetailsBtn');
    }  

    //add class submit btn
   else if(e.target.id == 'addClassBtn') {
    addNewClass();
     }
    //add new class from the view class
   else if(e.target.id == 'newClass') {
   getAddClass();
   }
   else if(e.target.id == 'updateClass') {
   selectUpdateClass(e.target.value,'selectUpdateClass');
    }
    else if(e.target.id == 'updateClassBtn') {
    updateClass();
    }
    else if(e.target.id == 'listClasses') {
      viewAllClasses();
    }
    else if(e.target.id == 'deleteClass') {
    deleteClass(e.target.value,'deleteClassBtn');
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
    else if(e.target.id == 'newHostel') {
      getAddHostel();
    }
    else if(e.target.id == 'addHostelBtn') {
      addHostel();
    }
    else if(e.target.id == 'updateHostel') {
      selectUpdateHostel(e.target.value,'selectUpdatehostel');
    }
    else if(e.target.id == 'deleteHostel') {
      deleteHostel(e.target.value,'deletehostelBtn');
    }
    else if(e.target.id == 'updateHostelBtn') {
      updateHostel();
    }

    else if(e.target.id == 'feesReport') {
      //set timeout for refreshing
      setTimeout(viewFeesCollection)
    }
   
    else if(e.target.id == 'addSubjectBtn') {
      addSubject();
    }
    else if(e.target.id == 'newSubject') {
      addNewSubject();
    }
    else if(e.target.id == 'updateSubject') {
      selectUpdateSubject(e.target.value,'selectUpdateSubject');
    }
    else if(e.target.id == 'deleteSubject') {
      deleteSubject(e.target.value,'deleteSubjectBtn');
    }
    else if(e.target.id == 'updateSubjectBtn') {
      updateSubject();
    }

    
    else if(e.target.id == 'addBankBtn') {
      addBank();
    }
    else if(e.target.id == 'newBank') {
      addNewBank();
    }
    else if(e.target.id == 'updateBank') {
      selectUpdateBank(e.target.value,'selectUpdateBank');
    }
    else if(e.target.id == 'deleteBank') {
      deleteBank(e.target.value,'deleteBankBtn');
    }
    else if(e.target.id == 'updateBankBtn') {
      updateBank();
    }

    else if(e.target.id == 'addEmployeeBtn') {
      addEmployee();
    }
    else if(e.target.id == 'newEmployee') {
      addNewEmployee();
    }
    else if(e.target.id == 'updateEmployee') {
      selectUpdateEmployee(e.target.value,'selectUpdateEmployee');
    }
    else if(e.target.id == 'deleteEmployee') {
      deleteEmployee(e.target.value,'deleteEmployeeBtn');
    }
    else if(e.target.id == 'updateEmployeeBtn') {
      updateEmployee();
    }


    else if(e.target.id == 'changeFeeStructure') {
      changeFeesStructure();
    }

    else if(e.target.id == 'newFees') {
      addNewFees();
    }
    else if(e.target.id == 'updateFees') {
      selectUpdateFees(e.target.value,'selectUpdateFees');
    }
    else if(e.target.id == 'deleteFees') {
      deleteFees(e.target.value,'deleteFeesBtn');
    }
    else if(e.target.id == 'updateFeesBtn') {
      updateFees();
    }

    
    else if(e.target.id == 'lendNewBookBtn') {
      lendNewBook();
    }
    else if(e.target.id == 'newBook') {
      getlendNewBook();
    }
    else if(e.target.id == 'updateLibrary') {
      selectUpdateLibrary(e.target.value,'selectUpdateBook');
    }
    else if(e.target.id == 'deleteLibrary') {
      deleteLibrary(e.target.value,'deleteLibraryBtn');
    }
    else if(e.target.id == 'updateLibraryBtn') {
      updateLibrary();
    }
    else if(e.target.id == 'libraryStatus') {
      getLibraryStatus();
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

