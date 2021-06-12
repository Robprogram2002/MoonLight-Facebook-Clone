<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{asset('css/registerStyle.css')}} ">
    <script src="https://kit.fontawesome.com/8c76382a5a.js" crossorigin="anonymous"></script>
    @livewireStyles
    <title>MoonLight</title>
</head>
<body>
    @livewire('login-register')
    
    <script>
        const sign_in_btn = document.querySelector('#sign-in-btn');
        const sign_up_btn = document.querySelector('#sign-up-btn');
        const container  = document.querySelector('.container-register')


        sign_up_btn.addEventListener('click', () => {
            container.classList.add("sign-up-mode");
        })

        sign_in_btn.addEventListener('click', () => {
            container.classList.remove('sign-up-mode');
        })
    </script>
    @livewireScripts
</body>
</html>