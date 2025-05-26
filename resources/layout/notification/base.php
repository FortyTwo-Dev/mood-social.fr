<?php
if (isset($_COOKIE['flash_message_success'])) {

    include_once($root . '/resources/layout/notification/success.php');

} elseif (isset($_COOKIE['flash_message_error'])) {

    include_once($root . '/resources/layout/notification/error.php');

} elseif (isset($_COOKIE['flash_message_info'])) {

    include_once($root . '/resources/layout/notification/info.php');

}
?>

<?php if ( 
    isset($_COOKIE['flash_message_success']) || 
    isset($_COOKIE['flash_message_error']) || 
    isset($_COOKIE['flash_message_info'])): 
?>
    <script>
        const closeInformationPopup = document.getElementById('closePopup');
        const popup = document.getElementById('popup');

        closeInformationPopup.addEventListener('click', function () {
            popup.classList.add('hidden');
        })
    </script>
    <script>
        setTimeout(() => {
            document.getElementById('popup').classList.add('hidden');
        }, 7000);
    </script>
<?php endif; ?>