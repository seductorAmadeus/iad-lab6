function validateForm() {
    var text = "";
    var y = document.forms["form"]["y"].value;
    if (!isNan(y)) {
        text = "Input not valid! ";
        document.getElementById("answerValid").innerHTML = text;
        return false;
    }
    document.getElementById("answerValid").innerHTML = text;
    return true;
};