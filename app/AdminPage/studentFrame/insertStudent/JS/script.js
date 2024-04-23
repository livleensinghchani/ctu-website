//NOTE - JS File For insertStudent.php
//LINK - app\AdminPage\studentFrame\insertStudent\insertStudent.php

let filterContainer = document.getElementById("filterList");
let filterSchool = document.getElementById("filterSchool");
let filterProgram = document.getElementById("filterProgram");

function multiCheck(school, boxChecked) {
  let programArray = document.getElementsByClassName(school+'_filter');

  if(boxChecked) {
    for (let index = 0; index < programArray.length; index++) {
      const element = programArray[index];
      if(!element.checked) {
        addToFilter(element);
        element.checked = 1;
      }
    }
  } else {
    for (let index = 0; index < programArray.length; index++) {
      const element = programArray[index];
      if(element.checked) {
        addToFilter(element);
        element.checked = 0;
      }
    }
  }
}

// If all Checked under one school, School should also be checked and vise versa.
function clumpCheck(element) {
  let schoolName = element.className.replace("_filter", "");
  let selectedTags = document.getElementsByClassName(element.className);
  let schoolFilter = document.getElementById(schoolName+"_select");
  console.log(schoolFilter);

  let allChecked = true;
  for (let index = 0; index < selectedTags.length; index++) {
    const element = selectedTags[index];
    if(!element.checked) {
      allChecked = false;
    }
  }
  console.log(allChecked);
  for (let index = 0; index < selectedTags.length; index++) {
    const element = selectedTags[index];
    if(allChecked) {
      
    } else {
      // schoolFilter.style.display = 'block'; 
    }
  }
}

// We need this because without this duplicate entries will show up in Filter
function checkIfExist(element) { // Checking if the element exist in the Filter
  if(element.name == 'schoolSelect') {
    if(filterSchool.querySelector('#'+element.id+'_select')) {
      multiCheck(element.id, element.checked);
      filterSchool.querySelector('#'+element.id+'_select').remove();
      // Returns 0 if ('Filter Exist');
      return 0;
    } else {
      multiCheck(element.id, element.checked);
      // Returns 1 if ('Filter Not Exist');
      return 1;
    }
  } else if(element.name == 'programSelect') {
    if(filterProgram.querySelector('#'+element.id+'_select')) {
      filterProgram.querySelector('#'+element.id+'_select').remove();
      // Returns 0 if ('Filter Exist');
      return 0;
    } else {
      // Returns 1 if ('Filter Not Exist');
      return 1;
    }
  }
}

//SECTION - School Bases Program Available
function addToFilter(objectSelected) {
  if(checkIfExist(objectSelected)) {
    if(objectSelected.name == 'schoolSelect') {
      filterSchool.innerHTML += '<div class="schoolDivFilter" id="'+ objectSelected.id +'_select">'+ objectSelected.id +'</div>';
    } else if(objectSelected.name == 'programSelect') {
      filterProgram.innerHTML += '<div class="programDivFilter" id="'+ objectSelected.id +'_select">'+ objectSelected.id +'</div>';
    }
  }
  clumpCheck(objectSelected);
}