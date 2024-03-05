document.addEventListener("DOMContentLoaded", function () {
  var tableBody = document.getElementById("tableBody");
  var openModalBtn = document.getElementById("openModalBtn");
  var addUserModal = document.getElementById("addUserModal");
  var closeModalBtn = document.getElementsByClassName("close")[0];
  var addUserForm = document.getElementById("addUserForm");

  function openModal() {
    addUserModal.style.display = "block";
  }

  function closeModal() {
    addUserModal.style.display = "none";
    addUserForm.reset();
  }

  openModalBtn.addEventListener("click", openModal);

  closeModalBtn.addEventListener("click", closeModal);

  window.addEventListener("click", function (event) {
    if (event.target == addUserModal) {
      closeModal();
    }
  });

  function addUserToTable(event) {
    event.preventDefault();

    var userId = document.getElementById("userId").value;
    var userName = document.getElementById("userName").value;
    var userEmail = document.getElementById("userEmail").value;
    var userPhone = document.getElementById("userPhone").value;
    var userCity = document.getElementById("userCity").value;
    var userCountry = document.getElementById("userCountry").value;

    var row = document.createElement("tr");
    row.innerHTML =
      "<td>" +
      userId +
      "</td>" +
      "<td>" +
      userName +
      "</td>" +
      "<td>" +
      userEmail +
      "</td>" +
      "<td>" +
      userPhone +
      "</td>" +
      "<td>" +
      userCity +
      "</td>" +
      "<td>" +
      userCountry +
      "</td>";

    tableBody.appendChild(row);

    closeModal();
  }

  addUserForm.addEventListener("submit", addUserToTable);
});
