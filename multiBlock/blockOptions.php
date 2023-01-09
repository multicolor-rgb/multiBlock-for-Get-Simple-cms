<form action="#" method="post">

    <h3>Multiblock settings</h3>

    <div style="width:100%;background:#fafafa;opacity:1;border:solid 1px #ddd; padding:10px;box-sizing:border-box;">
        <p>Disable Delete sections</p>
        <input type="checkbox" class="hidedelete" name="hidedelete">
    </div>

    <div style="width:100%;background:#fafafa;opacity:1;border:solid 1px #ddd; padding:10px;box-sizing:border-box;margin-top:10px">
        <p>Disable Add new sections</p>
        <input type="checkbox"  class="hideaddnew" name="hideaddnew">
    </div> 

    <input type="submit" name="saveSettings" value="Save settings" style="background:#000; color:#fff;padding:0.5rem 1rem;border:none; margin-top:20px;">
</form>

<?php
    global $folder;
    global $fileDelete;
    global $fileAddNew;
    $folder = GSDATAOTHERPATH.'/multiBlockSettings/';
    $fileDelete = $folder.'hideDelete.txt';
    $fileAddNew = $folder.'hideAddNew.txt';

	if (isset($_POST['saveSettings'])) {
		$hideDelete = @$_POST['hidedelete'];
		$hideAddNew = @$_POST['hideaddnew'];
		$chmod = 0755;
		$fileExist = file_exists($folder) || mkdir($folder, $chmod);

		if ($fileExist) {

			file_put_contents($fileDelete, $hideDelete);
			file_put_contents($fileAddNew, $hideAddNew);
		}
	}; 
?>

<script>
    if ('<?php echo file_get_contents($fileDelete); ?>' == 'on') {
        const hideDelete = document.querySelector('.hidedelete').checked = true;
    };

    if ('<?php echo file_get_contents($fileAddNew); ?>' == 'on') {
        const hideDelete = document.querySelector('.hideaddnew').checked = true;
    };
</script>