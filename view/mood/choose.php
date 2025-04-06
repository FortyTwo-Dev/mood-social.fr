<main class="w-screen h-screen flex flex-col justify-center items-center">
    <section class="w-full h-full">
        <form action="" class="w-full h-full flex flex-col justify-around items-center">
            <h1 class="text-7xl font-semibold">Choisi ton humeur<span id="mood-span"></span>.</h1>
            <ul class="flex gap-12">
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
            <button id="choose-button" class="max-w-xl w-full py-2 bg-ms-grey rounded-md hover:underline text-ms-white">Je valide</button>
        </form>
    </section>
    <script>
        let colorSelectedBefore = "grey";
        let textColorSelectedBefore = "white";
        const chooseButton = document.getElementById('choose-button');
        const radioButtons = document.querySelectorAll('input[name="mood"]');

        <?= ColorToJS("colors", $moods) ?>

        console.log(colors);
        
        for(const radioButton of radioButtons){
            radioButton.addEventListener('change', showSelected);
        }

        
        function showSelected(e) {
            if (this.checked) {

                const color = this.id;
                
                document.querySelector('#mood-span').innerText = ", " + colors.find(item => item.color === color).name;
                
                chooseButton.classList.remove(`bg-ms-${colorSelectedBefore}`);
                chooseButton.classList.add(`bg-ms-${color}`);
                
                if (textColorSelectedBefore != colors.find(item => item.color === color).text_color) {
                    chooseButton.classList.remove(`text-ms-${textColorSelectedBefore}`);
                    chooseButton.classList.add(`text-ms-${colors.find(item => item.color === color).text_color}`);   
                }                

                textColorSelectedBefore = colors.find(item => item.color === color).text_color;
                colorSelectedBefore = color;
            }
        }
    </script>
</main>