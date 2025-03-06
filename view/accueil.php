<!-- Non validé W3C -->

<?php
#text-ms-grey bg-ms-grey border-ms-grey shadow-ms-grey
?>
<?php include( $root . '/resources/layout/head.php' ) ?>

<body class="relative text-ms-<?=$color[$i]['text']?> dark:text-ms-white bg-ms-white dark:bg-ms-black">
    
    <?php include( $root . '/resources/layout/header.php' ) ?>

    <input type="hidden" class="text-ms-grey bg-ms-grey border-ms-grey shadow-ms-grey">
    <input type="hidden" class="text-ms-yellow bg-ms-yellow border-ms-yellow shadow-ms-yellow">
    <input type="hidden" class="text-ms-purple bg-ms-purple border-ms-purple shadow-ms-purple">
    <input type="hidden" class="text-ms-red bg-ms-red border-ms-red shadow-ms-red">
    <input type="hidden" class="text-ms-blue bg-ms-blue border-ms-blue shadow-ms-blue">
    <input type="hidden" class="text-ms-white bg-ms-white border-ms-white shadow-ms-white">
    <input type="hidden" class="text-ms-black bg-ms-black border-ms-black shadow-ms-black">

    <main class="">

        <section class="h-svh flex flex-col gap-8 items-center justify-center bg-ms-white dark:bg-ms-black">
            <h1 class="flex flex-col items-center text-7xl font-semibold"><span>MoodSocial</span><span>Ton émotion, ton réseau.</span></h1>
            <p class=" text-4xl">Parce que chaque jour est différent, ton fil aussi.</p>
            <div class="flex gap-8">
                <a href="/auth/register/" class="text-base text-ms-<?=$color[$i]['text']?> px-12 py-2 font-semibold bg-ms-<?=$color[$i]['color']?> hover:underline rounded-md shadow shadow-ms-<?=$color[$i]['color']?> hover:shadow-none">S'inscrire</a>
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
                        <a href="/auth/register/" class="text-base text-ms-black px-4 py-2 font-semibold bg-ms-white hover:underline rounded-md shadow shadow-ms-white hover:shadow-none">Commencer à discuter</a>
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
                                <p class="text-lg">Pour se créer un compte, il vous suffit de  cliquer sur ce lien : <a href="/auth/register/" class="underline">se créer un compte</a>.</p>
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
                    <p class="text-xl">Vous pouvez les envoyer en cliquant sur le bouton juste en dessous</p>
                    <div>
                        <a href="" class="text-sm px-6 py-2 font-semibold border-ms-<?=$color[$i]['text']?> border-2 uppercase hover:underline rounded-md" >Contactez-nous</a>
                    </div>
                </div>

            </div>
        </section> 

    </main>

    <?php include( $root . '/resources/layout/footer.php' ) ?>

</body>

</html>