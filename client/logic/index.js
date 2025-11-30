requestBody = {
    "type": "testar"
}
fetch("http://localhost:80/server/controller.php", {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(requestBody),
}).then(res => {
    return res.json()
}).then(data => {
    if (data.status == 5) {
        alert(data.message)
        window.location.pathname = "client/produtos.html"
    }
})
passwordField = document.querySelector("#password")
nameField = document.querySelector("#nome")

btnLogin = document.querySelector("#access")
btnSignup = document.querySelector("#signup")

btnSignup.addEventListener("click", function () {
    window.location.pathname = "client/signup.html"
})
btnLogin.addEventListener("click", function () {
    requestBody = {
        "type": "logar",
        "name": nameField.value,
        "password": passwordField.value
    }
    fetch("http://localhost:80/server/controller.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(requestBody),
    }).then(res => {
        return res.json()
    }).then(data => {
        if (data.status == 1) {
            alert(data.message)
            nameField.focus();
            passwordField = "";
        } else if (data.status == 0) {
            alert(data.message)
        } else if (data.status == 2) {
            alert(data.message)
            passwordField.focus();
        } else if (data.status == 3) {
            alert(data.message);
            window.location.pathname = "/client/produtos.html"
        }
    })
})