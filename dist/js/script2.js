
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
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  
          //Initialize Select2 Elements
          $('.select2').select2()
      
          //Initialize Select2 Elements
          $('.select2bs4').select2({
            theme: 'bootstrap4'
          })
  })
  }
  
  function updateStudent(value,studentId){
   
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
        }
  
  function deleteStudent(value,studentId){
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
    $( '#form' )
    .submit( function( e ) {
      $.ajax( {
        url: 'students/student-dm.php',
        type: 'POST',
        data: new FormData( this ),
        processData: false,
        contentType: false,
        success:function(data){
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
          }
          else{
        console.log(data);
          }
        },
        error: function(r) {
        console.log(r);
        }
      } );
      e.preventDefault();
    } );
  
    }
  
  
  function viewAllStudents(){
      fetch("students/viewStudents.php")
      .then(response =>  response.text())
      .then(html => {
          //contentWrapper.innerHTML = html
          let parser = new DOMParser();
          let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
          contentWrapper.innerHTML = doc.innerHTML;
            $('#myTable').DataTable();
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
  
  
  function viewStudentDetails(value,studentId){
    $.post("students/student-dm.php", {
      value: value,
      formId: studentId
    },  function(data){
      // Display the returned data in browser
     if(data == 1){
            
      contentWrapper.innerHTML = data;
      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
      var lineChartOptions = $.extend(true, {}, areaChartOptions)
      var lineChartData = $.extend(true, {}, areaChartData)
      lineChartData.datasets[0].fill = false;
      lineChartData.datasets[1].fill = false;
      lineChartOptions.datasetFill = false
  
      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
      })
  
        //viewAllStudents();
     }else {
       contentWrapper.innerHTML = data;
     }
  });
  }
  
  
  //teachers handling methods
    function viewAllTeachers(){
      getContents("teachers/viewTeachers.php");
    }
    "teachers/viewTeachers.php"
  function getAddNewTeacher(){
    getContents("teachers/addTeacher.php");
    }
  
  
    function addNewTeacher(){
      $("form").submit(function(event){
       // Stop form from submitting normally
       event.preventDefault();
       
       /* Serialize the submitted form control values to be sent to the web server with the request */
       let formValues = $(this).serialize();
       // Send the form data using post
       $.post("teachers/teacher-dm.php", formValues, function(data){
           // Display the returned data in browser
           //console.log(formValues);
           contentWrapper.innerHTML = data;
  
          if(data == 1){
                 
           var Toast = Swal.mixin({
             toast: true,
             position: 'top',
             showConfirmButton: false,
             timer: 3000
           });
                       Toast.fire({
               icon: 'success',
               title: 'Teacher Added Successfully'
           });
             viewAllTeachers();
          }
       });
   });
  }
  
  //classes handling methods
  function viewAllClasses(){
     getContents("class/viewClasses.php");
    }
  
  
  function getAddClass(){
     getContents("class/addClass.php");
           //Initialize Select2 Elements
           $('.select2').select2()
      
           //Initialize Select2 Elements
           $('.select2bs4').select2({
             theme: 'bootstrap4'
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
                //console.log(formValues);
                contentWrapper.innerHTML = data;
  
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
   getContents("class/viewStreams.php");
    }
  
    function selectUpdateClass(value,classId){
  
          $.post("class/class-dm.php", {
            value: value,
            formId: classId
          },
          function(data){
            contentWrapper.innerHTML = data;
          })
            //Initialize Select2 Elements
            $('.select2').select2()
        
            //Initialize Select2 Elements
            $('.select2bs4').select2({
              theme: 'bootstrap4'
            })
          }
  
    function updateClass(){
      $("form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        
        /* Serialize the submitted form control values to be sent to the web server with the request */
        let formValues = $(this).serialize();
        // Send the form data using post
          //let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
          $.post("class/class-dm.php",formValues,function(data){
    /* Display the returned data in browser */  
         if(data == 1){
                      
          var Toast = Swal.mixin({
          toast: true,
           position: 'top',
          showConfirmButton: false,
          timer: 3000
            });
                  Toast.fire({
          icon: 'success',
          title: 'Class Updated Successfully'
      });
        viewAllClasses();
     }        })
           
    })
    }
    
    
    function deleteClass(value,classId){
      $.post("class/class-dm.php", {
        value: value,
        formId: classId
      },
      function(data){
        contentWrapper.innerHTML = data;
  
        if(data == 1){
                      
          var Toast = Swal.mixin({
          toast: true,
           position: 'top',
          showConfirmButton: false,
          timer: 3000
            });
                  Toast.fire({
          icon: 'error',
          title: 'Class Deleted Successfully'
                   });
        viewAllClasses();
           }   
          })
      }
  
     
  function getClassAttendance2(){
    fetch('class_attendance.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#myChart');
  
        var ctx = doc.getContext('2d');
        var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',
  
      // The data for our  dataset
      data: {
          labels: [1,6,67,4], //the variable we created ealier,
          datasets: [{
              label: '',
              borderColor: 'rgb(255, 99, 132)',
              data: [1,6,67,4] //the variable we created ealier
          }]
      },
  
      // Configuration options go here
      options: {
          title: {
              display: true,
              text: 'STUDENT ATTANDANCE'
          },
          tooltips: {
              // Disable the on-canvas tooltip
              enabled: true,
        
          },
          scales: {
          yAxes: [{
              display: true,
              ticks: {
                  beginAtZero: true,
                  min: 0
              }
          }]
      }
      }
  
     });
    
        contentWrapper.innerHTML = chart;
    })
  }
  
  
  function getClassAttendanceForm(){
    fetch('class/getClassAttendance.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
  
       
        contentWrapper.innerHTML = doc.innerHTML;
       
    })
  }
  
  
  function getClassAttendance(){
    fetch('class_attendance.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#myChart');
  
       
        document.querySelector("#classAttendanceChart").innerHTML = doc.innerHTML;
        
  
        $(function () {
        
          var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
          }
        
          var mode = 'index'
          var intersect = false
  
          var $visitorsChart = $('#visitors-chart')
          // eslint-disable-next-line no-unused-vars
          var visitorsChart = new Chart($visitorsChart, {
            data: {
              labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
              datasets: [{
                type: 'line',
                data: [100, 120, 170, 167, 180, 177, 160],
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                pointBorderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                fill: false,
                pointHoverBackgroundColor: '#007bff',
                // pointHoverBorderColor    : '#007bff'
              },
              {
                type: 'line',
                data: [60, 80, 70, 67, 80, 77, 100],
                backgroundColor: 'tansparent',
                borderColor: '#ced4da',
                pointBorderColor: '#ced4da',
                pointBackgroundColor: '#ced4da',
                fill: false
                // pointHoverBackgroundColor: '#ced4da',
                // pointHoverBorderColor    : '#ced4da'
              }]
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                mode: mode,
                intersect: intersect
              },
              hover: {
                mode: mode,
                intersect: intersect
              },
              legend: {
                display: false
              },
              scales: {
                yAxes: [{
                  // display: false,
                  gridLines: {
                    display: true,
                  },
                  ticks: $.extend({
                    beginAtZero: true,
                    suggestedMax: 200
                  }, ticksStyle)
                }],
                xAxes: [{
                  display: true,
                  gridLines: {
                    display: true,
                   
                  },
                  ticks: ticksStyle
                }]
              }
            }
          })      
        
    })
        
    })
  }
  
  
  function getStudentAttendance(){
    fetch('students/student_attendance.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#myChart');
        let doc2 = (parser.parseFromString(html, 'text/html')).querySelector('#labels');
        let doc3 = (parser.parseFromString(html, 'text/html')).querySelector('#data');
       
        document.getElementById("studentAttendance").innerHTML = doc.innerHTML;
       //console.log(doc2.childNodes)
        let labels = [];
        let mainData = [];
        for(index = 1 ; index < doc2.childNodes.length - 1; index++){
  
          if(doc2.childNodes[index].className == 'number_of_attendance'){
             mainData.push(doc2.childNodes[index].innerHTML);
               }
          else{
            labels.push(doc2.childNodes[index].innerHTML);
          }
        }
            console.log(mainData)
            console.log(labels)
  
  
        $(function () {
        
          var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
          }
        
          var mode = 'index'
          var intersect = false
  
          var $visitorsChart = $('#visitors-chart')
          // eslint-disable-next-line no-unused-vars
          var visitorsChart = new Chart($visitorsChart, {
            data: {
              labels: labels,
              datasets: [{
                type: 'line',
                data: mainData,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                pointBorderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                fill: false,
                pointHoverBackgroundColor: '#007bff',
                // pointHoverBorderColor    : '#007bff'
              }]
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                mode: mode,
                intersect: intersect
              },
              hover: {
                mode: mode,
                intersect: intersect
              },
              legend: {
                display: false
              },
              scales: {
                yAxes: [{
                  // display: false,
                  gridLines: {
                    display: true,
                    lineWidth: '4px',
                    color: 'rgba(0, 0, 0, .2)',
                    zeroLineColor: 'transparent'
                  },
                  ticks: $.extend({
                    beginAtZero: true,
                    suggestedMax: 8
                  }, ticksStyle)
                }],
                xAxes: [{
                  display: true,
                  gridLines: {
                    display: true,
                    
                  },
                  ticks: ticksStyle
                }]
              }
            }
          })      
        
    })
     
    })
  }
  
  
  function getClassAttendance1(){
    fetch('class_attendance.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
  
         //decraring x,y axis valiables
         var dates = new Array();
         var num =new Array();
        contentWrapper.innerHTML = doc.innerHTML;
   /*converting php data to json 
  var name = <?php echo json_encode($row['Date']); ?>;
  var numb = <?php echo json_encode($row['N_O_attendance']); ?>;*/
        dates.push(name);
        num.push(numb);
        
  
        var ctx = document.getElementById('myChart').getContext('2d');
      
      
        var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',
  
      // The data for our  dataset
      data: {
          labels: dates, //the variable we created ealier,
          datasets: [{
              label: '',
              borderColor: 'rgb(255, 99, 132)',
              data: num //the variable we created ealier
          }]
      },
  
      // Configuration options go here
      options: {
          title: {
              display: true,
              text: 'STUDENT ATTANDANCE'
          },
          tooltips: {
              // Disable the on-canvas tooltip
              enabled: true,
        
          },
          scales: {
          yAxes: [{
              display: true,
              ticks: {
                  beginAtZero: true,
                  min: 0
              }
          }]
      }
      }
  
     });
  
    })
  }
  
  
  
  //get list of Hostels
  function viewAllHostels(){
    fetch('hostels/viewHostels.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
  
  function getAddHostel(){
    fetch('hostels/addNewHostel.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
  function addHostel(){
    $("form").submit(function(event){
     // Stop form from submitting normally
     event.preventDefault();
     
     /* Serialize the submitted form control values to be sent to the web server with the request */
     let formValues = $(this).serialize();
     // Send the form data using post
     $.post("hostels/hostel-dm.php", formValues, function(data){
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
          title: 'Hostel Added Successfully'
                   });
           viewAllHostels();
           }  
  
     });
  });
  }
  
  function deleteHostel(value,classId){
    $.post("hostels/hostel-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
      contentWrapper.innerHTML = data;
  
      if(data == 1){
                    
        var Toast = Swal.mixin({
        toast: true,
         position: 'top',
        showConfirmButton: false,
        timer: 3000
          });
                Toast.fire({
        icon: 'error',
        title: 'Hostel Deleted Successfully'
                 });
         viewAllHostels();
         }   
        })
  }
  
  function selectUpdateHostel(value,classId){
  
    $.post("hostels/hostel-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
      contentWrapper.innerHTML = data;
    })
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    }
  
  function updateHostel(){
  $("form").submit(function(event){ 
  // Stop form from submitting normally
  event.preventDefault();
  
  /* Serialize the submitted form control values to be sent to the web server with the request */
  let formValues = $(this).serialize();
  // Send the form data using post
    //let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
    $.post("hostels/hostel-dm.php",formValues,function(data){
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
    title: 'Hostel Updated Successfully'
  });
  viewAllHostels();
  }     
  })
     
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
  
  function getChangeFeeStructure(){
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
    
  function addNewFees(){
    fetch("school-fees/changeFeesStructure.php")
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
   
  function changeFeesStructure(){
    //console.log('here we are');
    $("form").submit(function(event){
     // Stop form from submitting normally
     event.preventDefault();
     
     /* Serialize the submitted form control values to be sent to the web server with the request */
     let formValues = $(this).serialize();
     // Send the form data using post
     $.post("school-fees/fees-dm.php", formValues, function(data){
      contentWrapper.innerHTML = data;
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
          title: 'Fees Structure Changed Successfully'
                   });
           viewFeesStructure();
           }  
  
     });
  });
  }
  
  //get list of leaves
  function viewAllLeaves(){
    fetch('hr/viewFeess.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
  
  function getLeaveManagement(){
    fetch("hr/leaveIndex.php")
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
  function deleteFees(value,classId){
    $.post("hr/hr-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
  
      if(data == 1){
                    
        var Toast = Swal.mixin({
        toast: true,
         position: 'top',
        showConfirmButton: false,
        timer: 3000
          });
                Toast.fire({
        icon: 'error',
        title: 'Fees Deleted Successfully'
                 });
         viewAllFeess();
         }   
        })
  }
  
  function deleteFeesStructure(value,classId){
    $.post("school-fees/fees-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
  
      if(data == 1){
                    
        var Toast = Swal.mixin({
        toast: true,
         position: 'top',
        showConfirmButton: false,
        timer: 3000
          });
                Toast.fire({
        icon: 'error',
        title: 'Fees Structure Deleted Successfully'
                 });
         viewFeesStructure();
         }   
        })
  }
  
  
  function selectUpdateFees(value,classId){
  
    $.post("school-fees/fees-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
      contentWrapper.innerHTML = data;
    })
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    }
  
  function updateFees(){
  $("form").submit(function(event){
  // Stop form from submitting normally
  event.preventDefault();
  
  /* Serialize the submitted form control values to be sent to the web server with the request */
  let formValues = $(this).serialize();
  // Send the form data using post
    $.post("hr/hr-dm.php",formValues,function(data){
  // Display the returned data in browser
  console.log(formValues);
   if(data == 1){
                
    var Toast = Swal.mixin({
    toast: true,
     position: 'top',
    showConfirmButton: false,
    timer: 3000
      });
            Toast.fire({
    icon: 'success',
    title: 'Fees Updated Successfully'
  });
  viewAllFeess();
  }     
  contentWrapper.innerHTML = data;
  
  })
     
  })
  }
  
  function updateFeesStructure(){
    $("form").submit(function(event){
    // Stop form from submitting normally
    event.preventDefault();
    
    /* Serialize the submitted form control values to be sent to the web server with the request */
    let formValues = $(this).serialize();
    // Send the form data using post
      $.post("school-fees/fees-dm.php",formValues,function(data){
    // Display the returned data in browser
    console.log(formValues);
     if(data == 1){
                  
      var Toast = Swal.mixin({
      toast: true,
       position: 'top',
      showConfirmButton: false,
      timer: 3000
        });
              Toast.fire({
      icon: 'success',
      title: 'Fees Structure Updated Successfully'
    });
    viewFeesStructure();
    }     
    contentWrapper.innerHTML = data;
    
    })
       
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
      
        
       //contentWrapper.innerHTML = '';
         var calendar = $('#calendarEl').fullCalendar({
          editable:true,
          header:{
           left:'prev,next today',
           center:'title',
           right:'month,agendaWeek,agendaDay'
          },
          events: 'loadKevin.php',
          selectable:true,
          selectHelper:true,
      
          select: function(start, end)
          {
           var title = prompt("Enter Event Title");
           if(title)
           {
            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
            $.ajax({
             url:"insertKevin.php",
             type:"POST",
             data:{title:title, start:start, end:end},
             success:function()
             {
              calendar.fullCalendar('refetchEvents');
              alert("Added Successfully");
             }
            })
           }
          },
          editable:true,
          eventResize:function(event)
          {
           var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
           var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
           var title = event.title;
           var id = event.id;
           $.ajax({
            url:"updateKevin.php",
            type:"POST",
            data:{title:title, start:start, end:end, id:id},
            success:function(){
             calendar.fullCalendar('refetchEvents');
             alert('Event Update');
            }
           })
          },
      
          eventDrop:function(event)
          {
           var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
           var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
           var title = event.title;
           var id = event.id;
           $.ajax({
            url:"updateKevin.php",
            type:"POST",
            data:{title:title, start:start, end:end, id:id},
            success:function()
            {
             calendar.fullCalendar('refetchEvents');
             alert("Event Updated");
            }
           });
          },
      
          eventClick:function(event)
          {
           if(confirm("Are you sure you want to remove it?"))
           {
            var id = event.id;
            console.log(id)
            $.ajax({
             url:"deleteKevin.php",
             type:"POST",
             data: "&id=" + event.id,
             success: function (response) {
                              if(parseInt(response) > 0) {
                                  $('#calendar').fullCalendar('removeEvents', event.id);
                                  displayMessage("Deleted Successfully");
                              }
                          }
            })
           }
          },
      
         });
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
            //Initialize Select2 Elements
    
      })
  }
   
  function addTimeTable(){
      $( '#form' )
      .submit( function( e ) {
        $.ajax( {
          url: 'timetable-dm.php',
          type: 'POST',
          data: new FormData( this ),
          processData: false,
          contentType: false,
          success:function(data){
  
              var Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000
              });
                          Toast.fire({
                  icon: 'success',
                  title: 'New Time Table Added Successfully'
              });
              getViewTimeTables();          
          },
          error: function(r) {
          console.log(r);
          }
        } );
        e.preventDefault();
      } );
  }
  
    //get time table
    function getViewTimeTables(){
      
      fetch('viewAllTimeTables.php')
      .then(response => response.text())
      .then(html =>{
          let parser = new DOMParser();
          let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
          contentWrapper.innerHTML = doc.innerHTML;
            //Initialize Select2 Elements
    
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
    fetch("exam/viewExamResult.php")
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        console.log(doc);
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
  
  function getExamCategories(){
    fetch("exam/viewExamCategories.php")
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        console.log(doc);
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
  
  function viewBookSubmission(){
    fetch("library/viewBookSubmission.php")
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
  function getlendNewBook(){
    fetch("library/lendNewBook.php")
    .then(response => response.text())
    .then(html =>{
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
  
  function getLibraryStatus(){
    fetch("library/libraryStatus.php")
    .then(response => response.text())
    .then(html =>{
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
  
  function lendNewBook(){
  
    $("form").submit(function(event){
     // Stop form from submitting normally
     event.preventDefault();
     console.log("hi");
  
     /* Serialize the submitted form control values to be sent to the web server with the request */
     let formValues = $(this).serialize();
  
     // Send the form data using post
     $.post("library/library-dm.php", formValues, function(data){
             console.log(formValues);
             contentWrapper.innerHTML =data;
  
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
          title: 'New Book Lend Successfully'
                   });
           viewBookSubmission();
           }  
  
     });
  });
  }
  
  function deleteLibrary(value,classId){
    $.post("library/library-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
  console.log(data);
      if(data == 1){
                    
        var Toast = Swal.mixin({
        toast: true,
         position: 'top',
        showConfirmButton: false,
        timer: 3000
          });
                Toast.fire({
        icon: 'error',
        title: 'One book Deleted From Library Deleted Successfully'
                 });
         viewBookSubmission();
         }   
        })
  }
  
  function selectUpdateLibrary(value,classId){
  
    $.post("library/library-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
      
      contentWrapper.innerHTML = data;
    })
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    }
  
  
  function updateLibrary(){
  $("form").submit(function(event){
  // Stop form from submitting normally
  event.preventDefault();
  
  /* Serialize the submitted form control values to be sent to the web server with the request */
  let formValues = $(this).serialize();
  // Send the form data using post
    $.post("library/library-dm.php",formValues,function(data){
  // Display the returned data in browser
  console.log(formValues);
   if(data == 1){
                
    var Toast = Swal.mixin({
    toast: true,
     position: 'top',
    showConfirmButton: false,
    timer: 3000
      });
            Toast.fire({
    icon: 'success',
    title: 'Library Updated Successfully'
  });
  viewBookSubmission();
  }     
  })
     
  })
  }
  
  //get list of Employees
  function viewAllEmployees(){
    fetch('hr/viewEmployees.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
  
  function addNewEmployee(){
    fetch("hr/addNewEmployee.php")
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
   
  function addEmployee(){
    $("form").submit(function(event){
     // Stop form from submitting normally
     event.preventDefault();
     
     /* Serialize the submitted form control values to be sent to the web server with the request */
     let formValues = $(this).serialize();
     // Send the form data using post
     $.post("hr/hr-dm.php", formValues, function(data){
      contentWrapper.innerHTML = data;
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
          title: 'New Employee Added Successfully'
                   });
           viewAllEmployees();
           }  
  
     });
  });
  }
  //get list of Employees
  function viewAllLeaves(){
    fetch('hr/viewEmployees.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
  
  function getLeaveManagement(){
    fetch("hr/leaveIndex.php")
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
    function acceptLeave(value,classId){
      $.post("hr/hr-dm.php", {
        value: value,
        formId: classId
      },
      function(data){
    
        if(data == 1){
                      
          var Toast = Swal.mixin({
          toast: true,
           position: 'left',
          showConfirmButton: false,
          timer: 3000
            });
                  Toast.fire({
          icon: 'success',
          title: 'Employee Leave Accepted'
                   });
           getLeaveManagement();
           }   
          })
    }
  
  
  function deleteEmployee(value,classId){
    $.post("hr/hr-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
  
      if(data == 1){
                    
        var Toast = Swal.mixin({
        toast: true,
         position: 'top',
        showConfirmButton: false,
        timer: 3000
          });
                Toast.fire({
        icon: 'error',
        title: 'Employee Deleted Successfully'
                 });
         viewAllEmployees();
         }   
        })
  }
  
  function selectUpdateEmployee(value,classId){
  
    $.post("hr/hr-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
      contentWrapper.innerHTML = data;
    })
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    }
  
  function updateEmployee(){
  $("form").submit(function(event){
  // Stop form from submitting normally
  event.preventDefault();
  
  /* Serialize the submitted form control values to be sent to the web server with the request */
  let formValues = $(this).serialize();
  // Send the form data using post
    $.post("hr/hr-dm.php",formValues,function(data){
  // Display the returned data in browser
  console.log(formValues);
   if(data == 1){
                
    var Toast = Swal.mixin({
    toast: true,
     position: 'top',
    showConfirmButton: false,
    timer: 3000
      });
            Toast.fire({
    icon: 'success',
    title: 'Employee Updated Successfully'
  });
  viewAllEmployees();
  }     
  contentWrapper.innerHTML = data;
  
  })
     
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
  
  function addSubject(){
    $("form").submit(function(event){
     // Stop form from submitting normally
     event.preventDefault();
     
     /* Serialize the submitted form control values to be sent to the web server with the request */
     let formValues = $(this).serialize();
     // Send the form data using post
     $.post("subjects/subject-dm.php", formValues, function(data){
       console.log(formValues);
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
          title: 'New Subject Added Successfully'
                   });
           viewSubjects();
           }  
  
     });
  });
  }
  
  function deleteSubject(value,classId){
    $.post("subjects/subject-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
  
      if(data == 1){
                    
        var Toast = Swal.mixin({
        toast: true,
         position: 'left',
        showConfirmButton: false,
        timer: 3000
          });
                Toast.fire({
        icon: 'error',
        title: 'subject Deleted Successfully'
                 });
         viewSubjects();
         }   
        })
  }
  
  function selectUpdateSubject(value,classId){
  
    $.post("subjects/subject-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
      contentWrapper.innerHTML = data;
    })
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    }
  
  function updateSubject(){
  $("form").submit(function(event){
  // Stop form from submitting normally
  event.preventDefault();
  
  /* Serialize the submitted form control values to be sent to the web server with the request */
  let formValues = $(this).serialize();
  // Send the form data using post
    $.post("subjects/subject-dm.php",formValues,function(data){
  // Display the returned data in browser
  console.log(formValues);
   if(data == 1){
                
    var Toast = Swal.mixin({
    toast: true,
     position: 'top',
    showConfirmButton: false,
    timer: 3000
      });
            Toast.fire({
    icon: 'success',
    title: 'subject Updated Successfully'
  });
  viewSubjects();
  }     
  })
     
  })
  }
  
  function viewBanks(){
    fetch("banks/viewBanks.php")
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
  }
  
    //get list of Banks
    function viewAllBanks(){
      fetch('banks/viewBanks.php')
      .then(response => response.text())
      .then(html =>{
          let parser = new DOMParser();
          let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
          contentWrapper.innerHTML = doc.innerHTML;
      })
  }
  
  
  function addNewBank(){
    fetch("banks/addNewBank.php")
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
  
  }
    
  function addBank(){
    $("form").submit(function(event){
     // Stop form from submitting normally
     event.preventDefault();
     
     /* Serialize the submitted form control values to be sent to the web server with the request */
     let formValues = $(this).serialize();
     // Send the form data using post
     $.post("banks/bank-dm.php", formValues, function(data){
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
          title: 'New Bank Added Successfully'
                   });
           viewBanks();
           }  
  
     });
  });
  }
  
  function deleteBank(value,classId){
    $.post("banks/bank-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
  
      if(data == 1){
                    
        var Toast = Swal.mixin({
        toast: true,
         position: 'top',
        showConfirmButton: false,
        timer: 3000
          });
                Toast.fire({
        icon: 'error',
        title: 'Bank Deleted Successfully'
                 });
         viewBanks();
         }   
        })
  }
  
  function selectUpdateBank(value,classId){
  
    $.post("banks/bank-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
      contentWrapper.innerHTML = data;
    })
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    }
  
  function updateBank(){
  $("form").submit(function(event){
  // Stop form from submitting normally
  event.preventDefault();
  
  /* Serialize the submitted form control values to be sent to the web server with the request */
  let formValues = $(this).serialize();
  // Send the form data using post
    $.post("Banks/bank-dm.php",formValues,function(data){
  // Display the returned data in browser
  console.log(formValues);
  contentWrapper.innerHTML = data;
  
   if(data == 1){
                
    var Toast = Swal.mixin({
    toast: true,
     position: 'top',
    showConfirmButton: false,
    timer: 3000
      });
            Toast.fire({
    icon: 'success',
    title: 'Bank Updated Successfully'
  });
  viewBanks();
  }     
  })
     
  })
  }
  