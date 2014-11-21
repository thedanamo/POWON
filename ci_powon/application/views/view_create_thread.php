
<?php echo form_open("controller_thread/createThread/$group_id"); ?>
    <fieldset>
        <legend>Thread Details</legend>
        <label>Thread Name Name</label>
        <input type = "text" name = "name"/><br>
        <label>Post</label>
        <textarea name = "post" rows = "5" cols = "50"></textarea>
    </fieldset><br>
    <input type = "submit" value = "Submit"/>
</form>
