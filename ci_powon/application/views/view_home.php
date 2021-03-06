
<nav>
    <h2>Member Options</h2>
    <ul>
        <li><?php echo anchor('controller_member/viewProfilePage', 'View Profile'); ?></li>
        <li><?php echo anchor('controller_group/createGroupPage', 'Create Group'); ?></li>
        <li><?php echo anchor('controller_group/searchGroupsPage','Search Groups'); ?></li>
        <li><?php echo anchor('controller_member/searchMembersPage', 'Search Members'); ?></li>

        <!-- not yet implemented !-->
        <li><?php echo anchor('controller_email/emailPage', 'View Emails'); ?></li>
        <li><?php echo anchor('home', 'Privacy Settings'); ?></li>

    </ul>
    <?php
        //not implemented yet
        if($this->session->userdata('privilege') == "admin") {
            echo "<h2>Admin Options</h2>";
            echo "<ul>";
            echo "<li>" . anchor('controller_admin/createPublicPostPage', 'Create Public Post') . "</li>";
            echo "<li>" . anchor('controller_admin/editDeleteMembersPage', 'Edit/Delete Member') . "</li>";
            echo "<li>" . anchor('home', 'Edit/Delete Group') . "</li>";
            echo "<ul>";
        }
    ?>
</nav>

<section>
    <h2>Public Posts</h2>
    <?php
    foreach($publicPosts as $row) {
        $content = $row->content;
        $currentDateTime = $row->date;
        $username = $row -> username;
        echo "Admin Username: " . $username;
        echo "<br>";
        echo "Date: " . $currentDateTime;
        echo "<br>";
        echo "Content: " . $content;
        echo "<br>";
        echo "<br>";
    }
    ?>
    <h2>Threads</h2>

    <?php
    // put a foreach that goes through list of threads related to this group

    foreach($membersGroupThreads as $row) {
        $threadName = $row->name;
        $thread_id = $row->thread_id;
        $group_id = $row->group_id;
        echo "<li>" . anchor("controller_thread/threadPage/$thread_id/$group_id", "$threadName") . "</li>";
    }

    ?>
</section>

<section>
    <h2>Groups</h2>
    <ul>
        <?php
        foreach($memberOfGroup as $row) {
            $group_id = $row->group_id;
            $name = $row->name;
            echo "<li>" . anchor("controller_group/groupPage/$group_id", "$name") . "</li>";
            echo "<br>";
        }
        ?>
    </ul>
</section>




