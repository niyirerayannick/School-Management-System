contentWrapper.addEventListener('change', function(e) {
    if(e.target.id == 'classTimeTable' || e.target.id == 'studentClass' ) {
 
   let option = e.target.childNodes;
   for (let index = 3; index < option.length-1; index++) {
      if(option[index].value == e.target.value){
           let val = option[index].innerHTML;
           if (val == 's4' || val == 's5' || val == 's6') {
             document.querySelector("#optionDiv").style.display = 'block';
             $.post("class/class-dm.php",{
                 class_id: e.target.value,
                 formId:'getOption'
             }
                  , function(data){
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
           }else{
             document.querySelector("#optionDiv").style.display = 'none';
 
           }
      }
     
   }
 
     }
 
     else if(e.target.id == 'className'){
       if(e.target.value == 's4' || e.target.value == 's5' || e.target.value == 's6'
       || e.target.value == 'S4'||e.target.value == 'S5'||e.target.value == 'S6'){
         document.querySelector("#optionDiv").style.display = 'block';
       }else{
         document.querySelector("#optionDiv").style.display = 'none';
 
       }
     }
 });

 /*
 const ElementIds = {
  student:{
    addStudent:'addStudent.php',
    viewStudents:'students/viewStudents.php',
    highPerformingStudents:'students/viewHighPerformingStudents.php'
  },
  teacher:{
    addTeacher:'teachers/addTeacher.php',
    viewTeachers:'teachers/viewTeachers.php'
  },
  class:{
    addClass:'class/addClass.php',
    viewClasses:'class/viewClasses.php',
    ViewClassStream:'class/viewStreams.php'
  },
  hostel: {
    addhostel:'hostels/addNewHostel.php',
   //viewHostels:viewAllHostels()
  },
  library: {
     libraryStatus:'i am library status',
     lendNewBook:'i am lend new book',
     viewBookSubmission:'i am view book submission'
  },
  exam: {
     viewExamResult:'i am exam results',
     viewExamCategories:'i am exam categories'
  },
  hr:{
    addEmployee:'hr/addNewEmployee.php',
    listEmployee:'hr/viewEmployees.php',
    leaveManagement:'hr/leaveIndex.php'
  },
  subject:{
    viewSubjects:'subjects/viewSubjects.php',
    addSubject:'subjects/addSubject.php'
  },
  school_fees:{
    viewFeesStructure:'school-fees/viewFeesStructure.php',
    changeFeesStructure:'school-fees/changeFeesStructure.php',
    recentFeesCollection:'school-fees/viewFeesCollection.php'
  },
  banks:{
    viewBanks:'banks/viewBanks.php',
    addNewBank:'banks/viewBanks.php'
  },
  fetchPage:function(propertyValue,propertyValue1){
    console.log(`${propertyValue}/${propertyValue1}.php`);
    let El =ElementIds.hasOwnProperty(propertyValue), innerEl =ElementIds[propertyValue];
    return El ? innerEl.hasOwnProperty(propertyValue1)?getContents(`${propertyValue}/${propertyValue1}.php`):'not present' :  'nahh';
    }
  };
    

navbar.addEventListener("click",function(e){
  let target = e.target.parentNode;
 //console.log(target)
 
  switch (target.id) {
    case 'addhostel':
        getContents("hostels/addNewHostel.php");
      break;
    case 'viewHostels':
      viewAllHostels();
      break;
    case 'libraryStatus':
      getLibraryStatus();
    break;
    case 'calendar':
      getContents("loadKevin.php");
      break;
    case 'addTeacher':
      getContents("teachers/addTeacher.php");
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
    case 'viewBookSubmission':
      viewBookSubmission();
    break;
    case 'lendNewBook':
      getContents("library/lendNewBook.php");
      break;
    case 'listEmployee':
      getContents("hr/viewEmployees.php");
      break;
    case 'addEmployee':
      getContents("hr/addNewEmployee.php");
      break;
    case 'leaveManagement':
      getContents("hr/leaveIndex.php");
      break;
    case  'addSubject':  
      getContents("subjects/addSubject.php"); 
      break;
    case  'viewSubjects':
      viewSubjects();
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
    case 'changeFeesStructure':
      getContents("school-fees/changeFeesStructure.php"); 
      break;           
    default:
      break;
  }

})
*/
