
document.getElementById("addSection").addEventListener("click", function () {
    var dynamicSections = document.getElementById("dynamicSections");
    var newSection = dynamicSections.children[0].cloneNode(true);
    newSection.querySelector("input[name='photo_names[]']").value = "";
    newSection.querySelector("input[name='photo[]']").value = ""; 
    dynamicSections.appendChild(newSection);
    // Enable remove buttons for all sections except the first one
    var removeButtons = document.querySelectorAll('.removeSection');
    for (var i = 1; i < removeButtons.length; i++) {
        removeButtons[i].removeAttribute('disabled');
    }
});


document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("removeSection")) {
        e.target.closest(".dynamic-section").remove();
    }
});