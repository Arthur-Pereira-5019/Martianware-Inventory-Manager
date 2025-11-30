passwordField = document.querySelector("#password")
nameField = document.querySelector("#nome")

btnReturn = document.querySelector("#return")
btnSignup = document.querySelector("#signup")

btnReturn.addEventListener("click", function () {
    window.location.pathname = "client"
})
btnSignup.addEventListener("click", function () {
    requestBody = {
        "type": "cadastrar",
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
        return res.json();
    }).then(
        data => {
            if(data.status == 4) {
                alert("Usuário cadastrado com sucesso!")
                window.location.pathname = "client/produtos.html";
            } else if(data.status == 5) {
                alert("Você já está logado! Faça logout antes de se cadastrar!")
            }
        }
    )
})