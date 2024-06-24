const separator = document.querySelector(".separator");
if (separator) {
  separator.innerHTML = `<svg class="icon text-cyn-1 w-[24px]"><use href="#icon-Arrow-6"/></svg>`;
}

function openBoxCat(evt, catName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(catName).style.display = "block";
  evt.currentTarget.className += " active";
}

const FAQ_Tab = document.querySelectorAll(".faqtab");
const FAQ_Content = document.querySelectorAll(".faqcontent");
FAQ_Tab.forEach((elem) => {
  const tab_id = elem.getAttribute("term-id");            
    elem.addEventListener("click", () => {
          elem.classList.remove("color");
      FAQ_Content.forEach((e) => {
      e.classList.remove("active");
      const content_id = e.getAttribute("term-id");
      if (tab_id == content_id) {
        elem.classList.add("color");
        e.classList.add("active");
      }
    });
  });
});
