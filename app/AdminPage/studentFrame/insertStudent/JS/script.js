//NOTE - JS File For insertStudent.php
//LINK - app\AdminPage\studentFrame\insertStudent\insertStudent.php

let filterContainer = document.getElementById("filterList");
let filterSchool = document.getElementById("filterSchool");
let filterProgram = document.getElementById("filterProgram");

function checkIfExist(element) { // Checking if the element exist in the Filter
  if(element.name == 'schoolSelect') {
    if(filterSchool.querySelector('#'+element.id)) {
      // console.log('Filter Exist');
      filterSchool.querySelector('#'+element.id).remove();
      return 0;
    } else {
      // console.log('Filter Not Exist');
      return 1;
    }
  } else if(element.name == 'programSelect') {
    if(filterProgram.querySelector('#'+element.id)) {
      // console.log('Filter Exist');
      filterProgram.querySelector('#'+element.id).remove();
      return 0;
    } else {
      // console.log('Filter Not Exist');
      return 1;
    }
  }
}

//SECTION - School Bases Program Available
function addToFilter(objectSelected) {
  if(checkIfExist(objectSelected)) {
    if(objectSelected.name == 'schoolSelect') {
      filterSchool.innerHTML += '<div class="schoolDivFilter" id="'+ objectSelected.id +'">'+ objectSelected.id +'</div>';
    } else if(objectSelected.name == 'programSelect') {
      filterProgram.innerHTML += '<div class="programDivFilter" id="'+ objectSelected.id +'">'+ objectSelected.id +'</div>';
    }
  }
}