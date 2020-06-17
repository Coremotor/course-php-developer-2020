



<div class="container">
    <?php
    dump('сообщение тип', checkTypeFile($uploadUserPhotoArr));
    if (!checkTypeFile($uploadUserPhotoArr)): ?>
        <span>Должны быть только картинки</span>
    <?php endif;?>
</div>

//сделать проверку на пустой массив