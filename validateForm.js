function validateForm() {
    var text = "";
    var x = document.forms["form"]["x"].value;
    var y = document.forms["form"]["y"].value;
    var radius = document.forms["form"]["radius"].value;
    if (!(isNumeric(x) && isNumeric(y) && isNumeric(radius))) {
        text = "Input not valid! ";
        document.getElementById("answerValid").innerHTML = text;
        return false;
    }
    document.getElementById("answerValid").innerHTML = text;
    return true;
};

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}