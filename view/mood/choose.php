<main class="w-screen h-screen flex flex-col justify-center items-center">
    <section class="w-full h-full">
        <form action="" class="w-full h-full flex flex-col justify-around items-center">
            <h1 class="text-7xl font-semibold">Choisi ton humeur<span>, Joyeux</span>.</h1>
            <ul class="flex gap-8">
                <li> 
                    <input class="hidden peer" type="radio" id="yellow" name="mood">
                    <label for="yellow" class="relative flex items-center justify-center w-20 h-20 overflow-hidden cursor-pointer bg-ms-yellow rounded-full peer-checked:border-2 box-border"></label>
                </li>
                <li> 
                    <input class="hidden peer" type="radio" id="blue" name="mood">
                    <label for="blue" class="relative flex items-center justify-center w-20 h-20 overflow-hidden cursor-pointer bg-ms-blue rounded-full peer-checked:border-2 box-border"></label>
                </li>
                <li>
                    <input class="hidden peer" type="radio" id="purple" name="mood">
                    <label for="purple" class="relative flex items-center justify-center w-20 h-20 overflow-hidden cursor-pointer bg-ms-purple rounded-full peer-checked:border-2 box-border"></label>
                </li>
                <li> 
                    <input class="hidden peer" type="radio" id="red" name="mood">
                    <label for="red" class="relative flex items-center justify-center w-20 h-20 overflow-hidden cursor-pointer bg-ms-red rounded-full peer-checked:border-2 box-border"></label>
                </li>
            </ul>
            <button class="max-w-xl w-full py-2 bg-ms-<?=$color[$i]['color']?> rounded-md hover:underline text-ms-<?=$color[$i]['text']?>">Je valide</button>
        </form>
    </section>
</main>