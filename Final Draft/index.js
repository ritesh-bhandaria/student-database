function signIN() {
    document.getElementById("div1").style.display = "block"
    document.getElementById("div2").style.display = "none"
    document.getElementById("div3").style.display = "none"
    document.getElementById("sign").textContent = "Sign In"
}

function teacherLoginPage() {
    document.getElementById("div3").style.display = "block"
    document.getElementById("div1").style.display = "none"
    document.getElementById("div2").style.display = "none"
    document.getElementById("sign").textContent = "Teacher Register"
}

function studentLoginPage() {
    document.getElementById("div2").style.display = "block"
    document.getElementById("div1").style.display = "none"
    document.getElementById("div3").style.display = "none"
    document.getElementById("sign").textContent = "Student Register"
}