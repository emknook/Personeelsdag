function validateInschrijving() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
      alert("Moet voldoen aan het juiste formaat");
      return false;
    }
  }