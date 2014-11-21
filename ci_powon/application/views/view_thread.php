<section>
    <h2>Posts</h2>
   <?php
   //anchor add post

    //loop through to show posts
    // put a foreach that goes through list of threads related to this group

    foreach($postInfo as $row) {
        $username = $row->username;
        $date = $row->date;
        $postMessage = $row->content;
        echo "<li> " . $username . " - " . $date .  "
        <table border='1' style='width:100%'><td>" . $postMessage . "</td></table></li><br>";
    }


    //anchor add post
    ?>
    <?php echo form_open("controller_post/createPost/$group_id/$thread_id"); ?>
    <fieldset>
        <legend>Add Post</legend>
        <label>Post</label>
        <textarea name = "post" rows = "5" cols = "50"></textarea>
    </fieldset><br>
    <input type = "submit" value = "Submit"/>
    </form>

</section>