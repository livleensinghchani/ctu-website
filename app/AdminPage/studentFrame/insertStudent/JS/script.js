//NOTE - JS File For insertStudent.php
//LINK - app\AdminPage\studentFrame\insertStudent\insertStudent.php

function schoolSelect(selection) {
    console.log(selection);

    let programListDiv = document.getElementsByClassName("programOption");

    for (let index1 = 0; index1 < programListDiv.length; index1++) {
        let programList = programListDiv[index1].getElementsByTagName('input');

        for (let index2 = 0; index2 < programList.length; index2++) {
            if(programList[index2].id != selection) {
                programListDiv[index1].style.display = "none";
            } else {
                programListDiv[index1].style.display = "block";
            }
        }
    }
}