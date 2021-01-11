//declaring elements
let contentWrapper = document.querySelector('#content-wrapper'),
 navbar = document.querySelector('#navBar'),
 dashboard = document.querySelector("#dashboard"),
 Homedashboard = document.querySelector("#homeDashboard"),
 addStudent = document.querySelector('#addStudent'),
 viewStudents = document.querySelector('#viewStudents'),
 viewTeacher = document.querySelector('#viewTeachers'),
 timetable = document.querySelector("#timeTable");


 navbar.addEventListener("click",function (e) {
  let ul = e.target.parentNode.parentNode.parentNode;
  if(e.target.tagName == "P" && ul.classList.contains('nav-treeview')){
      let category = e.target.parentNode.parentNode.parentNode
   return getContents(`${category.id}/${e.target.parentNode.id}.php`);
  }
});


contentWrapper.addEventListener('click', function(e) {

  if(e.target.id.substring(0,6) == 'delete'){
    //contruct the location to delete the file from
    let substring = e.target.id.substring(6,e.target.id.length).toLowerCase();
    let location= `${substring}s/${substring}-dm.php`;
    value= e.target.value,
    formId=`${e.target.id}Btn`,
    message = e.target.id.substring(6,e.target.id.length);
   return deleteContents(location,value,formId,message);
  }

 //console.log(e.target.id);
	if(e.target.id == 'viewEvent') {
		getCalendar();
    }
   // else if(e.target.id == 'deleteStudent') {
     // deleteStudent(e.target.value,'deleteStudentBtn');
      //}
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

    else if(e.target.id == 'attendance') {
         getStudentAttendance();
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
    else if(e.target.id == 'viewClassAttendance') {
      getClassAttendance();
      } 
    else if(e.target.id == 'addOptionBtn'){
      addOption();
    }

    else if(e.target.id == 'listTeachers') {
		viewAllTeachers();
    }
    else if(e.target.id == 'newTeacher'){
      getContents("teachers/addTeacher.php");
    }
    else if(e.target.id == 'addNewTeacherBtn') {
      addNewTeacher();
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
    else if(e.target.id == 'approveLeave'){
      acceptLeave(e.target.value,'approveLeave');
    }
    else if(e.target.id == 'rejectLeave'){
      rejectLeave(e.target.value,'rejectLeave');
    }

    else if(e.target.id == 'changeFeeStructure') {
      getChangeFeeStructure();
    }
    else if(e.target.id == 'changeFeeStructureBtn') {
      //console.log(e.target);
      changeFeesStructure();
    }
    else if(e.target.id == 'newFees') {
      addNewFees();
    }
    else if(e.target.id == 'newFeeStructure') {
      addNewFees();
    }
    else if(e.target.id == 'updateFeeStructure') {
      selectUpdateFees(e.target.value,'selectUpdateFees');
    }
    else if(e.target.id == 'deleteFeesStructure') {
      deleteFeesStructure(e.target.value,'deleteFeesStructureBtn');
    }
    else if(e.target.id == 'updateFeeStructureBtn') {
      updateFeesStructure();
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
 
    else if(e.target.id == 'addTimeTable') {
      addTimeTable();
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
viewStudents.addEventListener("click", () =>    getContents("students/viewStudents.php"));

//teacher handling event listeners
viewTeacher.addEventListener('click', viewAllTeachers);

//time table 
timetable.addEventListener("click",getTimeTable)
//homepage
dashboard.addEventListener("click",loadDashboard)
Homedashboard.addEventListener("click",loadDashboard)

document.getElementById('classAttendanceHome').addEventListener("click",getClassAttendanceForm);

