<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A1 - Masculino</title>

    <link rel="stylesheet" href="{{ asset('./css/styles.css')}}">
    <link rel="shortcut icon" href="{{ asset('./logo_A1_1.svg')}}" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#8edd65',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-black container mx-auto flex flex-col items-center justify-center w-full overflow-x-hidden pb-[148px]">