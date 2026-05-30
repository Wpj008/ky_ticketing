document.addEventListener("DOMContentLoaded", () => {// Code pour le menu burger

    const burger = document.getElementById("burger");
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("overlay");
  
    if (burger && sidebar && overlay) {// Vérifier que les éléments existent avant d'ajouter les écouteurs d'événements
  
      burger.addEventListener("click", () => {
        sidebar.classList.toggle("active");
        overlay.classList.toggle("active");
      });
  
      overlay.addEventListener("click", () => {
        sidebar.classList.remove("active");
        overlay.classList.remove("active");
      });
  
    }
  
  });

  function ActivateButton() {

    const inputName = document.getElementById('inputName');
    const inputEmail = document.getElementById('inputEmail');

    const btnValidate = document.getElementById('btnValidate');
    const btnDelete = document.getElementById('btnDelete');

    const btnActivate = document.getElementById('btnActivate');
    const btnDesactivate = document.getElementById('btnDesactivate');

    inputName.disabled = false;
    inputEmail.disabled = false;

    btnValidate.disabled = false;
    btnDelete.disabled = false;

    btnActivate.disabled = true;
    btnDesactivate.disabled = false;
  }

  function DesactivateButton() {

    const inputName = document.getElementById('inputName');
    const inputEmail = document.getElementById('inputEmail');

    const btnValidate = document.getElementById('btnValidate');
    const btnDelete = document.getElementById('btnDelete');

    const btnActivate = document.getElementById('btnActivate');
    const btnDesactivate = document.getElementById('btnDesactivate');

    inputName.disabled = true;
    inputEmail.disabled = true;

    btnValidate.disabled = true;
    btnDelete.disabled = true;

    btnActivate.disabled = false;
    btnDesactivate.disabled = true;
}


