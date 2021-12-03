
let buttons = document.querySelectorAll('.toggle-password');
let images = document.querySelectorAll('.eye');
let password_fields = document.querySelectorAll('.password');

for (let i = 0; i < buttons.length; i++)
{
    buttons[i].onclick = function ()
    {
        if (password_fields[i].type === 'password')
        {
            password_fields[i].type = 'text';
            images[i].src = 'images/opened_eye.png'
            return;
        }
        images[i].src = 'images/closed_eye.png';
        password_fields[i].type = 'password';
    }
}
