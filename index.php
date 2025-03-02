<?php
$color = [
    [
        'color' => "grey",
        'text' => "white"
    ],
    [
        'color' => "yellow",
        'text' => "black"
    ],
    [
        'color' => "red",
        'text' => "white"
    ],
    [
        'color' => "purple",
        'text' => "white"
    ],
    [
        'color' => "blue",
        'text' => "black"
    ],
];
#text-ms-grey bg-ms-grey border-ms-grey shadow-ms-grey
$i = rand(0,4);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoodSocial</title>
    <link href="/resources/css/style.css" rel="stylesheet">
</head>
<body class="relative text-ms-<?=$color[$i]['text']?> dark:text-ms-white bg-ms-white dark:bg-ms-black">
    <header class="relative">
        <nav class="w-full fixed bg-ms-white dark:bg-ms-black p-5 border-b border-ms-<?=$color[$i]['color']?>">
            <div class="w-full flex justify-center items-center">
                <div class="w-full flex justify-between items-center max-w-7xl text-lg">
                    <div class="flex gap-4 items-center justify-center">
                        <img class="w-8 h-8" src="/resources/assets/svg/logo.svg" alt="Logo MoodSocal"/>
                        <span class="text-xl font-bold">MoodSocial</span>
                    </div>
                    <ul class="flex gap-8 font-medium">
                        <li class="hover:underline"><a href="">Acceuil</a></li>
                        <li class="hover:underline"><a href="">Tarif</a></li>
                        <li class="hover:underline"><a href="">Connexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="">

        <section class="h-svh flex flex-col gap-8 items-center justify-center bg-ms-white dark:bg-ms-black">
            <h1 class="flex flex-col items-center text-7xl font-semibold"><span>MoodSocial</span><span>Ton émotion, ton réseau.</span></h1>
            <p class=" text-4xl">Parce que chaque jour est différent, ton fil aussi.</p>
            <div class="flex gap-8">
                <a href="" class="text-base text-ms-<?=$color[$i]['text']?> px-12 py-2 font-semibold bg-ms-<?=$color[$i]['color']?> hover:underline rounded-md shadow shadow-ms-<?=$color[$i]['color']?> hover:shadow-none">S'inscrire</a>
                <a href="" class="text-sm px-6 py-2 font-semibold border-ms-<?=$color[$i]['color']?> border-2 uppercase hover:underline rounded-md" >En savoir plus</a>
            </div>
        </section>

        <section class="h-svh flex w-full items-center justify-center gap-8 bg-ms-<?=$color[$i]['color']?> text-ms-<?=$color[$i]['text']?>">
            <div class="max-w-7xl h-full flex items-center justify-center gap-8">
                <div class="basis-1/2">
                    <div class=" bg-ms-white w-2xl h-[672px]">
    
                    </div>
                </div>
                <div class="basis-1/2 flex flex-col gap-8">
                    <div class="flex flex-col gap-4">
                        <h2 class="text-5xl font-semibold">Comment ça fonctionne ?</h2>
                        <p class="text-2xl">Il vous suffit de 3 étapes pour discuter avec des personnes qui se sentent comme vous !</p>
                    </div>
                    <div class=" flex flex-col gap-6">
                        <p class="text-2xl">1. Je me crée un compte.</p>
                        <p class="text-2xl">2. Je choisis mon humeur.</p>
                        <p class="text-2xl">3. Je discute !</p>
                    </div>
                    <div class="flex gap-8">
                        <a href="" class="text-base text-ms-black px-4 py-2 font-semibold bg-ms-white hover:underline rounded-md shadow shadow-ms-white hover:shadow-none">Commencer à discuter</a>
                    </div>
                </div>
            </div>
        </section>

        <section class=" h-[610px] flex w-full items-center justify-center gap-8">
            <div class="max-w-7xl h-full flex items-center justify-center gap-8">
                <div class="basis-1/2 flex flex-col gap-8">
                    <div class="flex flex-col gap-4">
                        <h2 class="text-5xl font-semibold">Envis de changer d’humeur sans limite ?</h2>
                        <p class="text-2xl">Pour cela vous pouvez prendre l’abonnement MoodSocial+</p>
                    </div>
                    <div class="flex gap-8">
                        <a href="" class="text-base text-ms-<?=$color[$i]['text']?> px-12 py-2 font-semibold bg-ms-<?=$color[$i]['color']?> hover:underline rounded-md shadow shadow-ms-<?=$color[$i]['color']?> hover:shadow-none">S'abonner</a>
                        <a href="" class="text-sm px-6 py-2 font-semibold border-ms-<?=$color[$i]['color']?> border-2 uppercase  hover:underline rounded-md" >En savoir plus</a>
                    </div>
                </div>
                <div class="basis-1/2">
                    <div class=" bg-ms-<?=$color[$i]['color']?> w-[550px] h-[450px]">
    
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-ms-<?=$color[$i]['color']?> py-16 text-ms-<?=$color[$i]['text']?>">
            <div class="flex flex-col justify-center items-center mx-auto px-4 gap-4">

                <h3 class="text-5xl font-semibold text-center">FAQs</h3>
                <p class="text-xl">Toutes les questions que vous pouvez vous poser sont ici.</p>

                <div class="max-w-4xl flex flex-col justify-center">

                    <label class="relative w-full h-auto p-4 overflow-hidden cursor-pointer border-b border-<?=$color[$i]['text']?>">
                        <input class="peer hidden" type="checkbox" >
                        <svg class="stroke-2 stroke-<?=$color[$i]['text']?> absolute top-5 right-0 mr-4 transition delay-100 peer-checked:rotate-180" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl">Comment je peux me créer un compte ?</h3>
                        </div>
                        <div class="max-h-0 overflow-hidden transition-all duration-500 peer-checked:max-h-96 cursor-default">
                            <div class="flex flex-col items-start gap-4 mt-6">
                                <p class="text-lg">Pour se créer un compte, il vous suffit de  cliquer sur ce lien : <a href="" class="underline">se créer un compte</a>.</p>
                            </div>
                        </div>
                    </label>

                    <label class="relative w-full h-auto p-4 overflow-hidden cursor-pointer border-b border-<?=$color[$i]['text']?>">
                        <input class="peer hidden" type="checkbox" >
                        <svg class="stroke-2 stroke-<?=$color[$i]['text']?> absolute top-5 right-0 mr-4 transition delay-100 peer-checked:rotate-180" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl">Est-ce que l'application est gratuite ?</h3>
                        </div>
                        <div class="max-h-0 overflow-hidden transition-all duration-500 peer-checked:max-h-96 cursor-default">
                            <div class="flex flex-col items-start gap-4 mt-6">
                                <p class="text-lg">Oui, l'application est gratuite, mais vous pouvez aussi souscrire à l'abonnement <a href="" class="underline">MoodSocial+</a> pour plus d'avantages.</p>
                            </div>
                        </div>
                    </label>

                    <label class="relative w-full h-auto p-4 overflow-hidden cursor-pointer border-b border-<?=$color[$i]['text']?>">
                        <input class="peer hidden" type="checkbox" >
                        <svg class="stroke-2 stroke-<?=$color[$i]['text']?> absolute top-5 right-0 mr-4 transition delay-100 peer-checked:rotate-180" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl">Combien de fois je peux changer d’humeur ?</h3>
                        </div>
                        <div class="max-h-0 overflow-hidden transition-all duration-500 peer-checked:max-h-96 cursor-default">
                            <div class="flex flex-col items-start gap-4 mt-6">
                                <p class="text-lg">Chaque jour, l'application vous demandera votre humeur, ce qui vous permettra donc de changer d'humeur, mais vous pouvez souscrire à l'abonnement <a href="" class="underline">MoodSocial+</a>pour changer d'humeur quand bon vous semble.</p>
                            </div>
                        </div>
                    </label>

                    <label class="relative w-full h-auto p-4 overflow-hidden cursor-pointer border-b border-<?=$color[$i]['text']?>">
                        <input class="peer hidden" type="checkbox" >
                        <svg class="stroke-2 stroke-<?=$color[$i]['text']?> absolute top-5 right-0 mr-4 transition delay-100 peer-checked:rotate-180" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl">Pourquoi le site web est tout gris ?</h3>
                        </div>
                        <div class="max-h-0 overflow-hidden transition-all duration-500 peer-checked:max-h-96 cursor-default">
                            <div class="flex flex-col items-start gap-4 mt-6">
                                <p class="text-lg">Bah, parce que tu es neutre.</p>
                            </div>
                        </div>
                    </label>

                    <label class="relative w-full h-auto p-4 overflow-hidden cursor-pointer border-b border-<?=$color[$i]['text']?>">
                        <input class="peer hidden" type="checkbox" >
                        <svg class="stroke-2 stroke-<?=$color[$i]['text']?> absolute top-5 right-0 mr-4 transition delay-100 peer-checked:rotate-180" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl">Pourquoi je ne vois que des personnes neutres ?</h3>
                        </div>
                        <div class="max-h-0 overflow-hidden transition-all duration-500 peer-checked:max-h-96 cursor-default">
                            <div class="flex flex-col items-start gap-4 mt-6">
                                <p class="text-lg">Bah, parce que tu es neutre.</p>
                            </div>
                        </div>
                    </label>

                </div>

                <div class="flex flex-col justify-center text-center gap-4">
                    <h3 class="text-3xl font-semibold text-center">Vous avez d'autres questions ?</h3>
                    <p class="text-xl">Vous pouvez les envoyer en cliquant sur le bouton juste en desous</p>
                    <div>
                        <a href="" class="text-sm px-6 py-2 font-semibold border-ms-<?=$color[$i]['text']?> border-2 uppercase hover:underline rounded-md" >Contactez-nous</a>
                    </div>
                </div>

            </div>
        </section> 

    </main>

    <footer class="h-24 border-t border-ms-<?=$color[$i]['color']?>">
        <div class="w-full flex flex-col gap-4 my-6">
            <nav class="w-full flex justify-center items-center">
                <ul class="w-full flex justify-center items-center gap-8">
                    <li> <a href="">Privacy Policy</a></li>
                    <li><a href="">Terms of Service</a></li>
                    <li><a href="">Cookies Settings</a></li>
                </ul>
            </nav>
            <div class="w-full flex justify-center items-center">
                <span class=" font-medium">MoodSocial | All Right Reserved</span>
            </div>
        </div>
    </footer>

</body>

</html>