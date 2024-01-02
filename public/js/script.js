

// const navLinks = document.querySelectorAll('.nav-link');
        
//         navLinks.forEach(link => {
//             link.addEventListener("click", function (event) {
//                 event.preventDefault(); 
//                 const tabPaneId = link.getAttribute("href");
//                 if (link.getAttribute("data-bs-toggle") == "dropdown") {
//                     return;
//                 }
//                 document.querySelectorAll(".tab-pane").forEach(pane => {
//                     pane.classList.remove("active");
//                 });
//                 document.querySelector(tabPaneId).classList.add("active");
//             });
//         });
    
//     const dropdownLinks = document.querySelectorAll('.dropdown-item');
            
//         dropdownLinks.forEach(link => {
//             link.addEventListener("click", function (event) {
//                 event.preventDefault(); 
//                 const tabPaneId = link.getAttribute("href");
//                 document.querySelectorAll(".tab-pane").forEach(pane => {
//                     pane.classList.remove("active");
//                 });
//                 document.querySelector(tabPaneId).classList.add("active");
//             });
//         });
    
    function contact() {
        document.querySelectorAll(".tab-pane").forEach(pane => {
            pane.classList.remove("active");
        });
        document.querySelector("#contact").classList.add("active");
    }
    
    
    function validateForm() {
        var password = document.getElementById("floatingPasswordS").value;
        var confirmPassword = document.getElementById("floatingConfirmPassword").value;
        var errorDiv = document.getElementById("passwordMatchError");
        var errorDivLength = document.getElementById("passwordLength")
    
        if (password !== confirmPassword) {
          errorDivLength.style.display = "none";
          errorDiv.style.display = "block";
          return false;
        } else {
          errorDiv.style.display = "none";
          if (password.length < 8 || password.length > 20) {
            errorDivLength.style.display = "block";
            return false;
          }
          return true; 
        }
      }
    
    function searchPage() {
        console.log("Search function is triggered!");
        var searchId = document.getElementsByClassName("form-control")[0].value.toLowerCase().replace(/\s/g, '');
        document.querySelectorAll(".tab-pane").forEach(pane => {
            pane.classList.remove("active");
        });
        document.querySelector("#" + searchId).classList.add("active");
    }