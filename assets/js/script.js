
// Validar o formulário de login
function validateLogin() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    if (!email || !password) {
        errorMessage.textContent = 'Por favor, preencha todos os campos.';
        return false;
    }

    // Validação de email
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        errorMessage.textContent = 'Por favor, insira um email válido.';
        return false;
    }

    errorMessage.textContent = '';
    return true;
}

// Link para a tela de menu depois do login
function redirectToMenu() {
    if (validateLogin()) {
        window.location.href = 'menu.html';
    }
}

// Validação do formulário de cadastro de despesas
function validateExpenseForm() {
    const description = document.getElementById('description').value;
    const value = document.getElementById('value').value;
    const date = document.getElementById('date').value;
    const category = document.getElementById('category').value;
    const errorMessage = document.getElementById('error-message');

    if (!description || !value || !date || !category) {
        errorMessage.textContent = 'Por favor, preencha todos os campos.';
        return false;
    }

    errorMessage.textContent = '';
    return true;
}

// Salvar a despesa
function saveExpense() {
    if (validateExpenseForm()) {
        // 
        alert('Despesa cadastrada com sucesso!');
        // 
    }
}

// Informações do usuário
function loadProfile() {
    // 
    const user = {
        name: 'Guilherme',
        email: 'guilherme@example.com',
        photo: 'path/to/photo.jpg'
    };

    document.getElementById('user-name').textContent = user.name;
    document.getElementById('user-email').textContent = user.email;
    document.getElementById('user-photo').src = user.photo;
}

// Editar o perfil
function editProfile() {
    const newName = prompt('Digite seu novo nome:');
    const newPhoto = prompt('Digite o caminho da nova foto:');

    if (newName) {
        document.getElementById('user-name').textContent = newName;
    }

    if (newPhoto) {
        document.getElementById('user-photo').src = newPhoto;
    }

    alert('Perfil atualizado com sucesso!');
}

