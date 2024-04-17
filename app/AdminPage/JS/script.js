
function sideBar(selection) {
    let dataPanel = document.getElementById('dataPanel');
    switch (selection) {
        case "Student":
            console.log("STUDENT");
            //LINK - app\AdminPage\studentFrame\studentF.html
            dataPanel.innerHTML = 
            ('<iframe src="studentFrame/studentF.html" frameborder="0"></iframe>');
            break;
        case "Staff":
            console.log("STAFF");
            break;
        case "Admin":
            console.log("ADMIN");
            break;
        default:
            console.error("Bad Selection in Side bar");
            break;
    }
}