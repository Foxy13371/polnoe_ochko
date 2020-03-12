pass = 'admin';
ans = prompt ("Введите пароль:");
if (pass===ans){
    alert ("Склоняяяюсь перед вашей волей");
} else {
    alert("Нет доступа к базе данных!");
    window.location.href = 'airbase.php';
}